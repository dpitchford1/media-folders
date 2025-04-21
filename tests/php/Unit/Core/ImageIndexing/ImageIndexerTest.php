<?php

declare(strict_types=1);

namespace MediaFolders\Tests\Unit\Core\ImageIndexing;

use MediaFolders\Core\ImageIndexing\ImageIndexer;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\Logging\ImageLogger;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Mockery;
use WP_Error;

class ImageIndexerTest extends TestCase
{
    private $cache;
    private $attachmentRepository;
    private $logger;
    private $indexer;
    private $wpdb;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create mocks
        $this->cache = Mockery::mock(CacheInterface::class);
        $this->attachmentRepository = Mockery::mock(AttachmentRepositoryInterface::class);
        $this->logger = Mockery::mock(ImageLogger::class);
        
        // Mock WPDB
        $this->wpdb = Mockery::mock();
        $this->wpdb->posts = 'wp_posts';
        $this->wpdb->prefix = 'wp_';
        global $wpdb;
        $wpdb = $this->wpdb;
        
        // Create indexer instance with mocks
        $this->indexer = new ImageIndexer(
            $this->cache,
            $this->attachmentRepository,
            $this->logger
        );
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_init_schedules_cron_when_not_scheduled()
    {
        // Mock WordPress functions
        \Brain\Monkey\Functions\expect('wp_next_scheduled')
            ->once()
            ->with('media_folders_process_image_index')
            ->andReturn(false);

        \Brain\Monkey\Functions\expect('wp_schedule_event')
            ->once()
            ->with(Mockery::type('int'), 'every_5_minutes', 'media_folders_process_image_index');

        \Brain\Monkey\Functions\expect('add_action')
            ->once()
            ->with('media_folders_process_image_index', Mockery::type('array'));

        $this->logger->shouldReceive('logInfo')
            ->once()
            ->with('Scheduling initial indexing cron job');

        $this->indexer->init();
    }

    public function test_init_does_not_schedule_cron_when_already_scheduled()
    {
        // Mock WordPress functions
        \Brain\Monkey\Functions\expect('wp_next_scheduled')
            ->once()
            ->with('media_folders_process_image_index')
            ->andReturn(12345);

        \Brain\Monkey\Functions\expect('wp_schedule_event')
            ->never();

        \Brain\Monkey\Functions\expect('add_action')
            ->once()
            ->with('media_folders_process_image_index', Mockery::type('array'));

        $this->indexer->init();
    }

    public function test_process_batch_handles_empty_image_list()
    {
        // Mock database query
        $this->wpdb->shouldReceive('prepare')
            ->once()
            ->andReturn('PREPARED_QUERY');

        $this->wpdb->shouldReceive('get_results')
            ->once()
            ->with('PREPARED_QUERY')
            ->andReturn([]);

        // Expect logging
        $this->logger->shouldReceive('logInfo')
            ->once()
            ->with('No unprocessed images found');

        // Mock WordPress functions for cron check
        \Brain\Monkey\Functions\expect('wp_next_scheduled')
            ->once()
            ->andReturn(12345);

        \Brain\Monkey\Functions\expect('wp_unschedule_event')
            ->once()
            ->with(12345, 'media_folders_process_image_index');

        $this->indexer->processBatch();
    }

    public function test_process_batch_processes_images_successfully()
    {
        // Mock images data
        $images = [
            (object)[
                'ID' => 1,
                'post_title' => 'Test Image 1',
                'guid' => 'http://example.com/test1.jpg'
            ],
            (object)[
                'ID' => 2,
                'post_title' => 'Test Image 2',
                'guid' => 'http://example.com/test2.jpg'
            ]
        ];

        // Mock database query
        $this->wpdb->shouldReceive('prepare')
            ->once()
            ->andReturn('PREPARED_QUERY');

        $this->wpdb->shouldReceive('get_results')
            ->once()
            ->with('PREPARED_QUERY')
            ->andReturn($images);

        // Mock WordPress functions
        \Brain\Monkey\Functions\expect('get_attached_file')
            ->twice()
            ->andReturn('/path/to/image.jpg');

        \Brain\Monkey\Functions\expect('wp_generate_attachment_metadata')
            ->twice()
            ->andReturn(['width' => 800, 'height' => 600]);

        \Brain\Monkey\Functions\expect('wp_update_attachment_metadata')
            ->twice();

        \Brain\Monkey\Functions\expect('get_option')
            ->once()
            ->with('media_folders_index_progress', Mockery::type('array'))
            ->andReturn(['total' => 10, 'processed' => 5, 'last_run' => 0]);

        \Brain\Monkey\Functions\expect('update_option')
            ->once()
            ->with('media_folders_index_progress', Mockery::type('array'));

        // Mock cache
        $this->cache->shouldReceive('set')
            ->twice();

        // Expect logging calls
        $this->logger->shouldReceive('logInfo')
            ->once()
            ->with(Mockery::pattern('/Starting batch processing/'));

        $this->logger->shouldReceive('logImageProcessing')
            ->times(4); // Start and complete for each image

        $this->logger->shouldReceive('logPerformance')
            ->times(3); // Once for each image and once for the batch

        $this->logger->shouldReceive('logInfo')
            ->once()
            ->with('Updated indexing progress', Mockery::type('array'));

        $this->indexer->processBatch();
    }

    public function test_process_image_handles_wp_error()
    {
        $image = (object)[
            'ID' => 1,
            'post_title' => 'Test Image',
            'guid' => 'http://example.com/test.jpg'
        ];

        // Mock WordPress functions
        \Brain\Monkey\Functions\expect('get_attached_file')
            ->once()
            ->andReturn('/path/to/image.jpg');

        \Brain\Monkey\Functions\expect('wp_generate_attachment_metadata')
            ->once()
            ->andReturn(new WP_Error('test_error', 'Test error message'));

        // Expect logging calls
        $this->logger->shouldReceive('logImageProcessing')
            ->once()
            ->with(1, 'started', Mockery::type('array'));

        $this->logger->shouldReceive('logError')
            ->once()
            ->with('Failed to generate attachment metadata', Mockery::type('array'));

        $result = $this->indexer->processImage($image);
        $this->assertFalse($result);
    }
}