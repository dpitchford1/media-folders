<?php

declare(strict_types=1);

namespace MediaFolders\Core\Contracts;

/**
 * Cache Interface
 * 
 * @package MediaFolders\Core\Contracts
 * @author dpitchford1
 * @since 2.0.0
 * @created 2025-04-19 20:41:42
 */
interface CacheInterface
{
    /**
     * Get an item from the cache.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null);

    /**
     * Store an item in the cache.
     *
     * @param string $key
     * @param mixed $value
     * @param int $ttl Time to live in seconds
     * @return bool
     */
    public function set(string $key, $value, int $ttl = 3600): bool;

    /**
     * Get an item from the cache, or store it if it doesn't exist.
     *
     * @param string $key
     * @param int $ttl
     * @param callable $callback
     * @return mixed
     */
    public function remember(string $key, int $ttl, callable $callback);

    /**
     * Remove an item from the cache.
     *
     * @param string $key
     * @return bool
     */
    public function delete(string $key): bool;
}