<?php

declare(strict_types=1);

namespace MediaFolders\Tests\Unit;

use MediaFolders\Core\MediaHandler;
use MediaFolders\Core\Plugin;
use MediaFolders\Core\Cache\DatabaseCache;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use PHPUnit\Framework\TestCase;

class PluginTest extends TestCase
{
    private $plugin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->plugin = new Plugin();
    }

    public function testBootInitializesComponents(): void
    {
        global $wpdb;
        $wpdb = $this->createMock(\wpdb::class);
        $wpdb->prefix = 'wp_';

        // Mock WordPress functions
        \WP_Mock::userFunction('add_action', [
            'times' => '0+'
        ]);

        \WP_Mock::userFunction('register_activation_hook', [
            'times' => 1
        ]);

        \WP_Mock::userFunction('register_deactivation_hook', [
            'times' => 1
        ]);

        $this->plugin->boot();

        // Verify service container has required services
        $this->assertInstanceOf(
            DatabaseCache::class,
            $this->plugin->getContainer()->get(DatabaseCache::class)
        );

        $this->assertInstanceOf(
            ImageIndexer::class,
            $this->plugin->getContainer()->get(ImageIndexer::class)
        );

        $this->assertInstanceOf(
            MediaHandler::class,
            $this->plugin->getContainer()->get(MediaHandler::class)
        );
    }

    public function testActivateCreatesRequiredTables(): void
    {
        global $wpdb;
        $wpdb = $this->createMock(\wpdb::class);
        $wpdb->prefix = 'wp_';

        // Expect dbDelta to be called
        \WP_Mock::userFunction('dbDelta', [
            'times' => 1,
            'args' => [$this->stringContains('CREATE TABLE')]
        ]);

        $this->plugin->activate();
    }

    public function testDeactivateCleanupTables(): void
    {
        global $wpdb;
        $wpdb = $this->createMock(\wpdb::class);
        $wpdb->prefix = 'wp_';

        $wpdb->expects($this->atLeastOnce())
            ->method('query')
            ->with($this->stringContains('DROP TABLE'));

        $this->plugin->deactivate();
    }
}