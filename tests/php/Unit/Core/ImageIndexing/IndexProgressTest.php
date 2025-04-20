<?php

declare(strict_types=1);

namespace MediaFolders\Tests\Unit\Core\ImageIndexing;

use MediaFolders\Core\ImageIndexing\IndexProgress;
use PHPUnit\Framework\TestCase;

class IndexProgressTest extends TestCase
{
    private $progress;

    protected function setUp(): void
    {
        parent::setUp();
        $this->progress = new IndexProgress();
    }

    public function testGetProgressReturnsDefaultValuesWhenNoOptionExists(): void
    {
        \WP_Mock::userFunction('get_option', [
            'args' => ['media_folders_index_progress', []],
            'return' => false
        ]);

        $result = $this->progress->getProgress();
        
        $this->assertEquals([
            'total' => 0,
            'processed' => 0,
            'last_run' => 0
        ], $result);
    }

    public function testUpdateProgressStoresNewValues(): void
    {
        $data = [
            'total' => 100,
            'processed' => 50,
            'last_run' => time()
        ];

        \WP_Mock::userFunction('update_option', [
            'times' => 1,
            'args' => ['media_folders_index_progress', $data],
            'return' => true
        ]);

        $result = $this->progress->updateProgress($data);
        
        $this->assertTrue($result);
    }

    public function testGetPercentageCalculatesCorrectly(): void
    {
        \WP_Mock::userFunction('get_option', [
            'return' => [
                'total' => 200,
                'processed' => 50
            ]
        ]);

        $percentage = $this->progress->getPercentage();
        
        $this->assertEquals(25, $percentage);
    }

    public function testGetPercentageReturnsZeroWhenTotalIsZero(): void
    {
        \WP_Mock::userFunction('get_option', [
            'return' => [
                'total' => 0,
                'processed' => 0
            ]
        ]);

        $percentage = $this->progress->getPercentage();
        
        $this->assertEquals(0, $percentage);
    }

    public function testIsCompleteReturnsTrueWhenAllProcessed(): void
    {
        \WP_Mock::userFunction('get_option', [
            'return' => [
                'total' => 100,
                'processed' => 100
            ]
        ]);

        $result = $this->progress->isComplete();
        
        $this->assertTrue($result);
    }
}