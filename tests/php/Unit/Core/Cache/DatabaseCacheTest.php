<?php

declare(strict_types=1);

namespace MediaFolders\Tests\Unit\Core\Cache;

use MediaFolders\Core\Cache\DatabaseCache;
use PHPUnit\Framework\TestCase;
use wpdb;

class DatabaseCacheTest extends TestCase
{
    private $wpdb;
    private $cache;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Mock wpdb
        $this->wpdb = $this->createMock(wpdb::class);
        $this->wpdb->prefix = 'wp_';
        
        // Create cache instance
        $this->cache = new DatabaseCache($this->wpdb);
    }

    public function testGetReturnsNullWhenKeyNotFound(): void
    {
        $this->wpdb->expects($this->once())
            ->method('get_row')
            ->willReturn(null);

        $result = $this->cache->get('non_existent_key');
        
        $this->assertNull($result);
    }

    public function testGetReturnsValueWhenKeyExists(): void
    {
        $expected = ['test' => 'value'];
        $cacheRow = (object)[
            'value' => serialize($expected),
            'expiry' => time() + 3600
        ];

        $this->wpdb->expects($this->once())
            ->method('get_row')
            ->willReturn($cacheRow);

        $result = $this->cache->get('existing_key');
        
        $this->assertEquals($expected, $result);
    }

    public function testSetStoresValueInDatabase(): void
    {
        $key = 'test_key';
        $value = ['test' => 'value'];
        $ttl = 3600;

        $this->wpdb->expects($this->once())
            ->method('replace')
            ->with(
                'wp_media_folders_cache',
                [
                    'key' => $key,
                    'value' => serialize($value),
                    'expiry' => $this->anything()
                ],
                ['%s', '%s', '%d']
            )
            ->willReturn(1);

        $result = $this->cache->set($key, $value, $ttl);
        
        $this->assertTrue($result);
    }

    public function testDeleteRemovesKeyFromDatabase(): void
    {
        $key = 'test_key';

        $this->wpdb->expects($this->once())
            ->method('delete')
            ->with(
                'wp_media_folders_cache',
                ['key' => $key],
                ['%s']
            )
            ->willReturn(1);

        $result = $this->cache->delete($key);
        
        $this->assertTrue($result);
    }

    public function testRememberReturnsExistingValue(): void
    {
        $key = 'test_key';
        $existing = ['cached' => 'value'];
        $cacheRow = (object)[
            'value' => serialize($existing),
            'expiry' => time() + 3600
        ];

        $this->wpdb->expects($this->once())
            ->method('get_row')
            ->willReturn($cacheRow);

        // Callback should not be called
        $callback = function() {
            $this->fail('Callback should not be called when value exists');
        };

        $result = $this->cache->remember($key, 3600, $callback);
        
        $this->assertEquals($existing, $result);
    }

    public function testRememberStoresAndReturnsCallbackValue(): void
    {
        $key = 'test_key';
        $value = ['new' => 'value'];
        $ttl = 3600;

        // No existing value
        $this->wpdb->expects($this->once())
            ->method('get_row')
            ->willReturn(null);

        // Should store new value
        $this->wpdb->expects($this->once())
            ->method('replace')
            ->willReturn(1);

        $result = $this->cache->remember($key, $ttl, function() use ($value) {
            return $value;
        });
        
        $this->assertEquals($value, $result);
    }
}