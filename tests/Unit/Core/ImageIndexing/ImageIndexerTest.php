<?php

namespace MediaFolders\Tests\Unit\Core\ImageIndexing;

use MediaFolders\Core\ImageIndexing\ImageIndexer;
use MediaFolders\Core\ImageIndexing\IndexProgress;
use MediaFolders\Core\Logging\ImageLogger;
use PHPUnit\Framework\TestCase;
use Mockery;

class ImageIndexerTest extends TestCase
{
    private $logger;
    private $progress;
    private $indexer;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create mocks
        $this->logger = Mockery::mock(ImageLogger::class);
        $this->progress = Mockery::mock(IndexProgress::class);
        
        // Create indexer instance with mocks
        $this->indexer = new ImageIndexer($this->logger, $this->progress);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_process_image_logs_start_and_completion()
    {
        // Mock progress percentage
        $this->progress->shouldReceive('getPercentComplete')
            ->twice()
            ->andReturn(45.5);

        // Expect logging calls
        $this->logger->shouldReceive('logImageProcessing')
            ->once()
            ->with(123, 'started', Mockery::subset(['total_progress' => 45.5]));

        $this->logger->shouldReceive('logPerformance')
            ->once()
            ->with('image_processing', Mockery::type('float'), Mockery::type('array'));

        $this->logger->shouldReceive('logImageProcessing')
            ->once()
            ->with(123, 'completed', Mockery::type('array'));

        // Mock WordPress function
        global $wp_mock_functions;
        $wp_mock_functions['wp_get_attachment_metadata'] = function() {
            return ['width' => 800, 'height' => 600];
        };

        $result = $this->indexer->processImage(123);
        $this->assertTrue($result);
    }

    public function test_process_image_handles_missing_metadata()
    {
        // Mock progress percentage
        $this->progress->shouldReceive('getPercentComplete')
            ->once()
            ->andReturn(45.5);

        // Expect logging calls
        $this->logger->shouldReceive('logImageProcessing')
            ->once()
            ->with(123, 'started', Mockery::type('array'));

        $this->logger->shouldReceive('logError')
            ->once()
            ->with('Failed to get attachment metadata', ['attachment_id' => 123]);

        // Mock WordPress function to return false
        global $wp_mock_functions;
        $wp_mock_functions['wp_get_attachment_metadata'] = function() {
            return false;
        };

        $result = $this->indexer->processImage(123);
        $this->assertFalse($result);
    }

    public function test_process_batch_logs_performance()
    {
        $batchSize = 5;
        
        // Mock progress percentage
        $this->progress->shouldReceive('getPercentComplete')
            ->times(5)
            ->andReturn(50.0);

        // Expect individual image processing logs
        $this->logger->shouldReceive('logImageProcessing')
            ->times(10); // 2 times per image (start and completion)

        $this->logger->shouldReceive('logPerformance')
            ->times(5) // Once per image
            ->with('image_processing', Mockery::type('float'), Mockery::type('array'));

        // Expect batch performance log
        $this->logger->shouldReceive('logPerformance')
            ->once()
            ->with('batch_processing', Mockery::type('float'), Mockery::subset([
                'batch_size' => $batchSize,
                'processed' => $batchSize,
                'total_progress' => 50.0
            ]));

        // Mock WordPress function
        global $wp_mock_functions;
        $wp_mock_functions['wp_get_attachment_metadata'] = function() {
            return ['width' => 800, 'height' => 600];
        };

        $processed = $this->indexer->processBatch($batchSize);
        $this->assertEquals($batchSize, $processed);
    }

    public function test_process_batch_handles_errors()
    {
        $batchSize = 3;

        // Mock progress percentage
        $this->progress->shouldReceive('getPercentComplete')
            ->times(3)
            ->andReturn(60.0);

        // Expect error logging
        $this->logger->shouldReceive('logImageProcessing')
            ->times(6); // 2 times per image

        $this->logger->shouldReceive('logPerformance')
            ->times(3) // Once per image
            ->with('image_processing', Mockery::type('float'), Mockery::type('array'));

        $this->logger->shouldReceive('logPerformance')
            ->once()
            ->with('batch_processing', Mockery::type('float'), Mockery::subset([
                'batch_size' => $batchSize,
                'processed' => $batchSize
            ]));

        // Mock WordPress function
        global $wp_mock_functions;
        $wp_mock_functions['wp_get_attachment_metadata'] = function() {
            return ['width' => 800, 'height' => 600];
        };

        $processed = $this->indexer->processBatch($batchSize);
        $this->assertEquals($batchSize, $processed);
    }
}