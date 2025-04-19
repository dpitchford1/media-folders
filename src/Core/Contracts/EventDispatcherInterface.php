<?php

declare(strict_types=1);

namespace MediaFolders\Core\Contracts;

interface EventDispatcherInterface
{
    /**
     * Dispatch an event.
     *
     * @param object $event
     * @return void
     */
    public function dispatch(object $event): void;

    /**
     * Add an event listener.
     *
     * @param string $event Event class name
     * @param callable $listener
     * @return void
     */
    public function addListener(string $event, callable $listener): void;
}