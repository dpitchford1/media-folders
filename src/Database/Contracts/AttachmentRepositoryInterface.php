<?php

declare(strict_types=1);

namespace MediaFolders\Database\Contracts;

use MediaFolders\Models\Attachment;
use RuntimeException;

interface AttachmentRepositoryInterface
{
    /**
     * Add attachment to folder.
     *
     * @param int $attachmentId WordPress attachment ID
     * @param int $folderId Folder ID
     * @return bool
     * @throws RuntimeException If operation fails
     */
    public function addToFolder(int $attachmentId, int $folderId): bool;

    /**
     * Remove attachment from folder.
     *
     * @param int $attachmentId WordPress attachment ID
     * @param int $folderId Folder ID
     * @return bool
     */
    public function removeFromFolder(int $attachmentId, int $folderId): bool;

    /**
     * Get all attachments in folder.
     *
     * @param int $folderId Folder ID
     * @param array $args Query arguments
     * @return array<Attachment>
     */
    public function getByFolder(int $folderId, array $args = []): array;

    /**
     * Get all folders for attachment.
     *
     * @param int $attachmentId WordPress attachment ID
     * @return array<int>
     */
    public function getFolderIds(int $attachmentId): array;

    /**
     * Check if attachment exists in folder.
     *
     * @param int $attachmentId WordPress attachment ID
     * @param int $folderId Folder ID
     * @return bool
     */
    public function existsInFolder(int $attachmentId, int $folderId): bool;
}