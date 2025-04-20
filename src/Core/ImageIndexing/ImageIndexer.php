<?php

declare(strict_types=1);

namespace MediaFolders\Core\ImageIndexing;

use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;

class ImageIndexer
{
    private const BATCH_SIZE = 50;
    private const CRON_HOOK = 'media_folders_process_image_index';
    
    private CacheInterface $cache;
    private AttachmentRepositoryInterface $attachmentRepository;
    
    public function __construct(
        CacheInterface $cache,
        AttachmentRepositoryInterface $attachmentRepository
    ) {
        $this->cache = $cache;
        $this->attachmentRepository = $attachmentRepository;
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
            wp_schedule_event(time(), 'every_5_minutes', self::CRON_HOOK);
        }
    }
    
    /**
     * Process a batch of images.
     */
    public function processBatch(): void
    {
        // Get unprocessed images
        $images = $this->getUnprocessedImages();
        
        if (empty($images)) {
            $this->maybeDisableCron();
            return;
        }
        
        foreach ($images as $image) {
            $this->processImage($image);
        }
        
        // Update progress
        $this->updateProgress(count($images));
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
     */
    private function processImage(object $image): void
    {
        // Generate image metadata
        $metadata = wp_generate_attachment_metadata($image->ID, get_attached_file($image->ID));
        
        if (!is_wp_error($metadata)) {
            wp_update_attachment_metadata($image->ID, $metadata);
        }
        
        // Store in cache for quick access
        $cacheKey = 'media_image_' . $image->ID;
        $this->cache->set($cacheKey, [
            'id' => $image->ID,
            'title' => $image->post_title,
            'metadata' => $metadata,
        ], 3600);
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
    }
    
    /**
     * Disable cron if indexing is complete.
     */
    private function maybeDisableCron(): void
    {
        $timestamp = wp_next_scheduled(self::CRON_HOOK);
        if ($timestamp) {
            wp_unschedule_event($timestamp, self::CRON_HOOK);
        }
    }
}