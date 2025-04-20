<?php

declare(strict_types=1);

namespace MediaFolders\Tests\Unit\Core;

use MediaFolders\Core\MediaHandler;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use PHPUnit\Framework\TestCase;

class MediaHandlerTest extends TestCase
{
    private $cache;
    private $indexer;
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->cache = $this->createMock(CacheInterface::class);
        $this->indexer = $this->createMock(ImageIndexer::class);
        
        $this->handler = new MediaHandler($this->cache, $this->indexer);
    }

    public function testInitializesComponents(): void
    {
        $this->indexer->expects($this->once())
            ->method('init');

        $this->handler->init();
    }

    public function testHandleAttachmentUpload(): void
    {
        $attachment = [
            'ID' => 123,
            'post_type' => 'attachment',
            'post_mime_type' => 'image/jpeg'
        ];

        $this->cache->expects($this->once())
            ->method('delete')
            ->with($this->stringContains('media_image_123'));

        $result = $this->handler->handleAttachmentUpload($attachment);
        
        $this->assertTrue($result);
    }

    public function testHandleAttachmentDelete(): void
    {
        $attachmentId = 123;

        $this->cache->expects($this->exactly(2))
            ->method('delete')
            ->withConsecutive(
                [$this->stringContains('media_image_123')],
                [$this->stringContains('media_folders_123')]
            );

        $result = $this->handler->handleAttachmentDelete($attachmentId);
        
        $this->assertTrue($result);
    }

    public function testGetAttachmentMetadata(): void
    {
        $attachmentId = 123;
        $metadata = ['width' => 800, 'height' => 600];

        $this->cache->expects($this->once())
            ->method('remember')
            ->with(
                $this->stringContains('media_image_123'),
                3600,
                $this->callback(function($callback) {
                    return is_callable($callback);
                })
            )
            ->willReturn($metadata);

        $result = $this->handler->getAttachmentMetadata($attachmentId);
        
        $this->assertEquals($metadata, $result);
    }

    public function testRegisterHooksAddsAllRequiredWordPressHooks(): void
    {
        global $wp_actions;
        $wp_actions = [];

        $this->handler->registerHooks();

        $this->assertTrue(has_action('add_attachment') !== false);
        $this->assertTrue(has_action('delete_attachment') !== false);
        $this->assertTrue(has_filter('wp_get_attachment_metadata') !== false);
    }
}