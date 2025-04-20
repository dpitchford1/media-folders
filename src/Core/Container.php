<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use Closure;
use ReflectionClass;
use ReflectionException;
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
     * @throws ReflectionException
     */
    public function get(string $id)
    {
        if (isset($this->instances[$id])) {
            return $this->instances[$id];
        }

        $concrete = $this->bindings[$id] ?? $id;

        if ($concrete instanceof Closure) {
            $instance = $concrete($this);
        } else {
            $instance = $this->build($concrete);
        }

        // If this is a singleton, store the instance
        if (isset($this->bindings[$id])) {
            $this->instances[$id] = $instance;
        }

        return $instance;
    }

    /**
     * Build a concrete instance with dependencies.
     *
     * @param string $concrete
     * @return mixed
     * @throws ReflectionException
     */
    private function build(string $concrete)
    {
        $reflector = new ReflectionClass($concrete);

        if (!$reflector->isInstantiable()) {
            throw new InvalidArgumentException("Class {$concrete} is not instantiable");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return new $concrete();
        }

        $dependencies = [];
        foreach ($constructor->getParameters() as $parameter) {
            if ($parameter->getType() && !$parameter->getType()->isBuiltin()) {
                $dependencies[] = $this->get($parameter->getType()->getName());
            } else if ($parameter->isDefaultValueAvailable()) {
                $dependencies[] = $parameter->getDefaultValue();
            } else {
                throw new InvalidArgumentException(
                    "Cannot resolve parameter {$parameter->getName()} of class {$concrete}"
                );
            }
        }

        return $reflector->newInstanceArgs($dependencies);
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