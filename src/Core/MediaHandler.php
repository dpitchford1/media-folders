<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Models\Attachment;

class MediaHandler
{
    private CacheInterface $cache;
    private AttachmentRepositoryInterface $attachmentRepository;
    
    public function __construct(
        CacheInterface $cache,
        AttachmentRepositoryInterface $attachmentRepository
    ) {
        $this->cache = $cache;
        $this->attachmentRepository = $attachmentRepository;
    }
    
    /**
     * Get media items with caching.
     *
     * @param array $args Query arguments
     * @return array<Attachment>
     */
    public function getMediaItems(array $args): array
    {
        $cacheKey = 'media_items_' . md5(serialize($args));
        
        return $this->cache->remember($cacheKey, 3600, function() use ($args) {
            return $this->attachmentRepository->getByFolder($args['folder_id'] ?? 0, $args);
        });
    }

    /**
     * Move media items to a folder.
     *
     * @param array $attachmentIds
     * @param int $folderId
     * @return bool
     */
    public function moveToFolder(array $attachmentIds, int $folderId): bool
    {
        $success = true;
        foreach ($attachmentIds as $attachmentId) {
            try {
                $this->attachmentRepository->addToFolder((int)$attachmentId, $folderId);
            } catch (\Exception $e) {
                $success = false;
                error_log("Failed to move attachment {$attachmentId} to folder {$folderId}: " . $e->getMessage());
            }
        }
        return $success;
    }

    /**
     * Remove media items from a folder.
     *
     * @param array $attachmentIds
     * @param int $folderId
     * @return bool
     */
    public function removeFromFolder(array $attachmentIds, int $folderId): bool
    {
        $success = true;
        foreach ($attachmentIds as $attachmentId) {
            try {
                $this->attachmentRepository->removeFromFolder((int)$attachmentId, $folderId);
            } catch (\Exception $e) {
                $success = false;
                error_log("Failed to remove attachment {$attachmentId} from folder {$folderId}: " . $e->getMessage());
            }
        }
        return $success;
    }
}