<?php

declare(strict_types=1);

namespace MediaFolders\Tests\Unit\Core\ImageIndexing;

use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ImageIndexerTest extends TestCase
{
    private $cache;
    private $attachmentRepository;
    private $indexer;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create mocks
        $this->cache = $this->createMock(CacheInterface::class);
        $this->attachmentRepository = $this->createMock(AttachmentRepositoryInterface::class);
        
        // Create indexer instance
        $this->indexer = new ImageIndexer(
            $this->cache,
            $this->attachmentRepository
        );
    }

    public function testInitRegistersWordPressCronHook(): void
    {
        // Setup expectations for WordPress functions
        global $wp_actions;
        $wp_actions = [];

        $this->indexer->init();
        
        $this->assertTrue(
            has_action('media_folders_process_image_index') !== false,
            'Cron hook should be registered'
        );
    }

    public function testProcessBatchHandlesEmptyImageList(): void
    {
        global $wpdb;
        $wpdb = $this->createMock(wpdb::class);
        
        // Mock empty results
        $wpdb->expects($this->once())
            ->method('get_results')
            ->willReturn([]);

        $this->indexer->processBatch();
        
        // Verify cache was not called
        $this->cache->expects($this->never())
            ->method('set');
    }

    public function testProcessBatchProcessesImages(): void
    {
        global $wpdb;
        $wpdb = $this->createMock(wpdb::class);
        
        // Mock image data
        $images = [
            (object)[
                'ID' => 1,
                'post_title' => 'Test Image',
                'guid' => 'http://example.com/test.jpg'
            ]
        ];
        
        $wpdb->expects($this->once())
            ->method('get_results')
            ->willReturn($images);

        // Expect cache to be called for each image
        $this->cache->expects($this->once())
            ->method('set')
            ->with(
                'media_image_1',
                $this->callback(function($value) {
                    return isset($value['id']) 
                        && isset($value['title'])
                        && isset($value['metadata']);
                }),
                3600
            );

        $this->indexer->processBatch();
    }

    public function testProcessBatchUpdatesProgress(): void
    {
        global $wpdb;
        $wpdb = $this->createMock(wpdb::class);
        
        // Mock single image
        $wpdb->expects($this->once())
            ->method('get_results')
            ->willReturn([
                (object)[
                    'ID' => 1,
                    'post_title' => 'Test Image'
                ]
            ]);

        // Mock WordPress options
        $progress = [
            'total' => 10,
            'processed' => 5,
            'last_run' => time() - 300
        ];
        
        \WP_Mock::userFunction('get_option', [
            'args' => ['media_folders_index_progress', $this->anything()],
            'return' => $progress
        ]);
        
        \WP_Mock::userFunction('update_option', [
            'times' => 1,
            'args' => [
                'media_folders_index_progress',
                $this->callback(function($value) use ($progress) {
                    return $value['processed'] === $progress['processed'] + 1
                        && $value['last_run'] > $progress['last_run'];
                })
            ]
        ]);

        $this->indexer->processBatch();
    }
}