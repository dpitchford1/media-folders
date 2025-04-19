<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Core\Contracts\EventDispatcherInterface;

class EventDispatcher implements EventDispatcherInterface
{
    /**
     * @var array<string, array<callable>>
     */
    private array $listeners = [];

    /**
     * {@inheritDoc}
     */
    public function dispatch(object $event): void
    {
        $eventClass = get_class($event);

        if (!isset($this->listeners[$eventClass])) {
            return;
        }

        foreach ($this->listeners[$eventClass] as $listener) {
            $listener($event);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function addListener(string $event, callable $listener): void
    {
        $this->listeners[$event][] = $listener;
    }
}