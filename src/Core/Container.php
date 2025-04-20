<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use Closure;
use InvalidArgumentException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    /**
     * @var array
     */
    private array $bindings = [];

    /**
     * @var array
     */
    private array $instances = [];

    /**
     * Bind an abstract to a concrete implementation.
     *
     * @param string $abstract
     * @param mixed $concrete
     * @return void
     */
    public function bind(string $abstract, $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }

    /**
     * Register a shared binding in the container.
     *
     * @param string $abstract
     * @param mixed|null $concrete
     * @return void
     */
    public function singleton(string $abstract, $concrete = null): void
    {
        $this->bind($abstract, $concrete ?? $abstract);
    }

    /**
     * Resolve the given type from the container.
     *
     * @param string $id
     * @return mixed
     */
    public function get(string $id)
    {
        if ($this->has($id)) {
            if (isset($this->instances[$id])) {
                return $this->instances[$id];
            }

            $concrete = $this->bindings[$id] ?? $id;
            
            if ($concrete instanceof Closure) {
                $instance = $concrete($this);
            } else {
                $instance = new $concrete();
            }

            $this->instances[$id] = $instance;

            return $instance;
        }

        throw new InvalidArgumentException("No binding found for {$id}");
    }

    /**
     * Determine if the given abstract type has been bound.
     *
     * @param string $id
     * @return bool
     */
    public function has(string $id): bool
    {
        return isset($this->bindings[$id]) || isset($this->instances[$id]);
    }
}