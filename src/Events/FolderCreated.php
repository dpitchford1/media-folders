<?php

declare(strict_types=1);

namespace MediaFolders\Events;

use MediaFolders\Models\Folder;

class FolderCreated extends Event
{
    /**
     * @var Folder
     */
    private Folder $folder;

    /**
     * @var int
     */
    private int $userId;

    /**
     * @param Folder $folder
     * @param int $userId
     */
    public function __construct(Folder $folder, int $userId)
    {
        parent::__construct();
        $this->folder = $folder;
        $this->userId = $userId;
    }

    /**
     * @return Folder
     */
    public function getFolder(): Folder
    {
        return $this->folder;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }
}