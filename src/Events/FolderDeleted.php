<?php

declare(strict_types=1);

namespace MediaFolders\Events;

class FolderDeleted extends Event
{
    /**
     * @var int
     */
    private int $folderId;

    /**
     * @var int
     */
    private int $userId;

    /**
     * @param int $folderId
     * @param int $userId
     */
    public function __construct(int $folderId, int $userId)
    {
        parent::__construct();
        $this->folderId = $folderId;
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getFolderId(): int
    {
        return $this->folderId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
}