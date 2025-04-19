<?php

declare(strict_types=1);

namespace MediaFolders\Events;

abstract class Event
{
    /**
     * @var \DateTimeImmutable
     */
    private \DateTimeImmutable $timestamp;

    public function __construct()
    {
        $this->timestamp = new \DateTimeImmutable();
    }

    /**
     * Get event timestamp.
     *
     * @return \DateTimeImmutable
     */
    public function getTimestamp(): \DateTimeImmutable
    {
        return $this->timestamp;
    }
}