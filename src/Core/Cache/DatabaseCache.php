<?php

declare(strict_types=1);

namespace MediaFolders\Core\Cache;

use MediaFolders\Core\Contracts\CacheInterface;
use wpdb;

/**
 * Database Cache Implementation
 * 
 * @package MediaFolders\Core\Cache
 * @author dpitchford1
 * @since 2.0.0
 * @created 2025-04-19 20:41:42
 */
class DatabaseCache implements CacheInterface
{
    private wpdb $wpdb;
    private string $table;

    public function __construct(wpdb $wpdb)
    {
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . 'media_folder_cache';
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $key, $default = null)
    {
        $row = $this->wpdb->get_row(
            $this->wpdb->prepare(
                "SELECT `value`, `expiry` FROM {$this->table} WHERE `key` = %s",
                $key
            )
        );

        if (!$row || strtotime($row->expiry) < time()) {
            if ($row) {
                $this->delete($key);
            }
            return $default;
        }

        return unserialize($row->value);
    }

    /**
     * {@inheritDoc}
     */
    public function set(string $key, $value, int $ttl = 3600): bool
    {
        $expiry = date('Y-m-d H:i:s', time() + $ttl);
        $serialized = serialize($value);

        return (bool) $this->wpdb->replace(
            $this->table,
            [
                'key' => $key,
                'value' => $serialized,
                'expiry' => $expiry,
            ],
            [
                '%s',
                '%s',
                '%s',
            ]
        );
    }

    /**
     * {@inheritDoc}
     */
    public function remember(string $key, int $ttl, callable $callback)
    {
        $value = $this->get($key);

        if ($value !== null) {
            return $value;
        }

        $value = $callback();
        $this->set($key, $value, $ttl);

        return $value;
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $key): bool
    {
        return (bool) $this->wpdb->delete(
            $this->table,
            ['key' => $key],
            ['%s']
        );
    }
}