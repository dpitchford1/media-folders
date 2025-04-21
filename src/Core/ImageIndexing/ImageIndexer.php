<?php

declare(strict_types=1);

namespace MediaFolders\Core\ImageIndexing;

use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\Logging\ImageLogger;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;

class ImageIndexer
{
    private const BATCH_SIZE = 50;
    private const CRON_HOOK = 'media_folders_process_image_index';
    
    private CacheInterface $cache;
    private AttachmentRepositoryInterface $attachmentRepository;
    private ImageLogger $logger;
    
    public function __construct(
        CacheInterface $cache,
        AttachmentRepositoryInterface $attachmentRepository,
        ImageLogger $logger
    ) {
        $this->cache = $cache;
        $this->attachmentRepository = $attachmentRepository;
        $this->logger = $logger;
    }
    
    /**
     * Initialize the indexer.
     */
    public function init(): void
    {
        // Register cron event
        add_action(self::CRON_HOOK, [$this, 'processBatch']);
        
        // Schedule initial indexing if needed
        if (!wp_next_scheduled(self::CRON_HOOK)) {
            $this->logger->logInfo('Scheduling initial indexing cron job');
            wp_schedule_event(time(), 'every_5_minutes', self::CRON_HOOK);
        }
    }
    
    /**
     * Process a batch of images.
     */
    public function processBatch(): void
    {
        $startTime = microtime(true);
        
        // Get unprocessed images
        $images = $this->getUnprocessedImages();
        
        if (empty($images)) {
            $this->logger->logInfo('No unprocessed images found');
            $this->maybeDisableCron();
            return;
        }
        
        $this->logger->logInfo(
            sprintf('Starting batch processing of %d images', count($images))
        );
        
        $processed = 0;
        foreach ($images as $image) {
            if ($this->processImage($image)) {
                $processed++;
            }
        }
        
        // Update progress
        $this->updateProgress($processed);
        
        // Log batch performance
        $duration = microtime(true) - $startTime;
        $this->logger->logPerformance(
            'batch_processing',
            $duration,
            [
                'batch_size' => count($images),
                'processed' => $processed
            ]
        );
    }
    
    /**
     * Get unprocessed images.
     *
     * @return array
     */
    private function getUnprocessedImages(): array
    {
        global $wpdb;
        
        return $wpdb->get_results($wpdb->prepare("
            SELECT ID, post_title, guid 
            FROM {$wpdb->posts} 
            WHERE post_type = 'attachment' 
            AND post_mime_type LIKE 'image/%'
            AND ID NOT IN (
                SELECT attachment_id 
                FROM {$wpdb->prefix}media_folder_relationships
            )
            LIMIT %d
        ", self::BATCH_SIZE));
    }
    
    /**
     * Process a single image.
     *
     * @param object $image
     * @return bool
     */
    private function processImage(object $image): bool
    {
        $startTime = microtime(true);
        
        $this->logger->logImageProcessing(
            $image->ID,
            'started',
            ['title' => $image->post_title]
        );
        
        try {
            // Generate image metadata
            $metadata = wp_generate_attachment_metadata($image->ID, get_attached_file($image->ID));
            
            if (is_wp_error($metadata)) {
                $this->logger->logError(
                    'Failed to generate attachment metadata',
                    [
                        'attachment_id' => $image->ID,
                        'error' => $metadata->get_error_message()
                    ]
                );
                return false;
            }
            
            wp_update_attachment_metadata($image->ID, $metadata);
            
            // Store in cache for quick access
            $cacheKey = 'media_image_' . $image->ID;
            $this->cache->set($cacheKey, [
                'id' => $image->ID,
                'title' => $image->post_title,
                'metadata' => $metadata,
            ], 3600);
            
            $duration = microtime(true) - $startTime;
            $this->logger->logPerformance(
                'image_processing',
                $duration,
                ['attachment_id' => $image->ID]
            );
            
            $this->logger->logImageProcessing(
                $image->ID,
                'completed',
                ['duration' => $duration]
            );
            
            return true;
            
        } catch (\Exception $e) {
            $this->logger->logError(
                'Image processing failed: ' . $e->getMessage(),
                [
                    'attachment_id' => $image->ID,
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            );
            return false;
        }
    }
    
    /**
     * Update indexing progress.
     *
     * @param int $processedCount
     */
    private function updateProgress(int $processedCount): void
    {
        $progress = get_option('media_folders_index_progress', [
            'total' => 0,
            'processed' => 0,
            'last_run' => 0,
        ]);
        
        $progress['processed'] += $processedCount;
        $progress['last_run'] = time();
        
        update_option('media_folders_index_progress', $progress);
        
        $this->logger->logInfo(
            'Updated indexing progress',
            [
                'processed_count' => $processedCount,
                'total_processed' => $progress['processed']
            ]
        );
    }
    
    /**
     * Disable cron if indexing is complete.
     */
    private function maybeDisableCron(): void
    {
        $timestamp = wp_next_scheduled(self::CRON_HOOK);
        if ($timestamp) {
            $this->logger->logInfo('Disabling indexing cron job - no more images to process');
            wp_unschedule_event($timestamp, self::CRON_HOOK);
        }
    }
}