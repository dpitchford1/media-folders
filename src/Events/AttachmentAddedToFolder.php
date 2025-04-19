<?php

declare(strict_types=1);

namespace MediaFolders\Events;

class AttachmentAddedToFolder extends Event
{
    /**
     * @var int
     */
    private int $attachmentId;

    /**
     * @var int
     */
    private int $folderId;

    /**
     * @var int
     */
    private int $userId;

    /**
     * @param int $attachmentId
     * @param int $folderId
     * @param int $userId
     */
    public function __construct(int $attachmentId, int $folderId, int $userId)
    {
        parent::__construct();
        $this->attachmentId = $attachmentId;
        $this->folderId = $folderId;
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getAttachmentId(): int
    {
        return $this->attachmentId;
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