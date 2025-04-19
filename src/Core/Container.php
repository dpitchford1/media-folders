<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use Exception;
use Psr\Container\ContainerInterface;

/**
 * Simple Dependency Injection Container
 *
 * @package MediaFolders\Core
 * @since 2.0.0
 */
class Container implements ContainerInterface
{
    /**
     * The container's bindings.
     *
     * @var array<string, mixed>
     */
    private array $bindings = [];

    /**
     * The container's shared instances.
     *
     * @var array<string, mixed>
     */
    private array $instances = [];

    /**
     * Bind a type into the container.
     *
     * @param string $abstract The abstract type
     * @param mixed  $concrete The concrete type
     * @param bool   $shared   Whether the binding should be shared
     * @return void
     */
    public function bind(string $abstract, $concrete = null, bool $shared = false): void
    {
        $this->bindings[$abstract] = [
            'concrete' => $concrete ?? $abstract,
            'shared' => $shared,
        ];
    }

    /**
     * Register a shared binding in the container.
     *
     * @param string $abstract The abstract type
     * @param mixed  $concrete The concrete type
     * @return void
     */
    public function singleton(string $abstract, $concrete = null): void
    {
        $this->bind($abstract, $concrete, true);
    }

    /**
     * Resolve the given type from the container.
     *
     * @param string $id Identifier of the entry to look for
     * @return mixed Entry
     * @throws Exception Error while retrieving the entry
     */
    public function get($id)
    {
        if ($this->has($id)) {
            return $this->resolve($id);
        }

        throw new Exception("No binding found for {$id}");
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     *
     * @param string $id Identifier of the entry to look for
     * @return bool
     */
    public function has($id): bool
    {
        return isset($this->bindings[$id]) || isset($this->instances[$id]);
    }

    /**
     * Resolve the given type from the container.
     *
     * @param string $abstract The abstract type
     * @return mixed
     * @throws Exception
     */
    private function resolve(string $abstract)
    {
        // If we've already resolved this type as a singleton, return the instance
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        $binding = $this->bindings[$abstract];
        $concrete = $binding['concrete'];

        // If the concrete type is a closure, resolve it
        if ($concrete instanceof \Closure) {
            $object = $concrete($this);
        } else {
            $object = new $concrete();
        }

        // If this is a singleton, store the instance
        if ($binding['shared']) {
            $this->instances[$abstract] = $object;
        }

        return $object;
    }
}