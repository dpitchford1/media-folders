<?php

declare(strict_types=1);

namespace MediaFolders\Database;

use MediaFolders\Database\Contracts\CacheRepositoryInterface;
use wpdb;

class CacheRepository implements CacheRepositoryInterface
{
    /**
     * @var wpdb
     */
    private wpdb $wpdb;

    /**
     * @var string
     */
    private string $table;

    /**
     * @param wpdb $wpdb
     */
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
        $this->cleanup();

        $row = $this->wpdb->get_row(
            $this->wpdb->prepare(
                "SELECT `value` FROM {$this->table} WHERE `key` = %s AND expiry > %s",
                $key,
                current_time('mysql')
            )
        );

        if (!$row) {
            return $default;
        }

        return maybe_unserialize($row->value);
    }

    /**
     * {@inheritDoc}
     */
    public function set(string $key, $value, int $ttl = 3600): bool
    {
        $this->delete($key);

        return (bool) $this->wpdb->insert(
            $this->table,
            [
                'key' => $key,
                'value' => maybe_serialize($value),
                'expiry' => gmdate('Y-m-d H:i:s', time() + $ttl),
            ],
            ['%s', '%s', '%s']
        );
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

    /**
     * {@inheritDoc}
     */
    public function has(string $key): bool
    {
        $this->cleanup();

        return (bool) $this->wpdb->get_var(
            $this->wpdb->prepare(
                "SELECT 1 FROM {$this->table} WHERE `key` = %s AND expiry > %s",
                $key,
                current_time('mysql')
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function clear(): bool
    {
        return (bool) $this->wpdb->query("TRUNCATE TABLE {$this->table}");
    }

    /**
     * Clean up expired cache entries.
     *
     * @return void
     */
    private function cleanup(): void
    {
        $this->wpdb->query(
            $this->wpdb->prepare(
                "DELETE FROM {$this->table} WHERE expiry <= %s",
                current_time('mysql')
            )
        );
    }
}