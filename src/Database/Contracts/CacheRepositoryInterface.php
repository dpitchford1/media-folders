<?php

declare(strict_types=1);

namespace MediaFolders\Database\Contracts;

interface CacheRepositoryInterface
{
    /**
     * Get a value from cache.
     *
     * @param string $key Cache key
     * @param mixed $default Default value if key doesn't exist
     * @return mixed
     */
    public function get(string $key, $default = null);

    /**
     * Set a value in cache.
     *
     * @param string $key Cache key
     * @param mixed $value Value to cache
     * @param int $ttl Time to live in seconds
     * @return bool
     */
    public function set(string $key, $value, int $ttl = 3600): bool;

    /**
     * Delete a value from cache.
     *
     * @param string $key Cache key
     * @return bool
     */
    public function delete(string $key): bool;

    /**
     * Check if key exists in cache.
     *
     * @param string $key Cache key
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * Clear all cached items.
     *
     * @return bool
     */
    public function clear(): bool;
}