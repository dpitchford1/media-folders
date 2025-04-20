<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use Closure;
use RuntimeException;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $bindings = [];
    private array $instances = [];

    public function bind(string $abstract, $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function singleton(string $abstract, $concrete): void
    {
        if (!isset($this->instances[$abstract])) {
            $this->instances[$abstract] = $concrete instanceof Closure 
                ? $concrete($this)
                : $concrete;
        }
    }

    public function get(string $id)
    {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        if (!isset($this->bindings[$id])) {
            throw new RuntimeException("No binding found for {$id}");
        }

        $concrete = $this->bindings[$id];
        return $concrete instanceof Closure ? $concrete($this) : $concrete;
    }

    public function has(string $id): bool
    {
        return isset($this->bindings[$id]) || isset($this->instances[$id]);
    }
}