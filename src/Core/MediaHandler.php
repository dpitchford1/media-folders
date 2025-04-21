<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\Logging\ImageLogger;
use MediaFolders\Models\Attachment;

class MediaHandler
{
    private CacheInterface $cache;
    private AttachmentRepositoryInterface $attachmentRepository;
    private ImageLogger $logger;
    
    public function __construct(
        CacheInterface $cache,
        AttachmentRepositoryInterface $attachmentRepository,
        ImageLogger $logger
    ) {
        $this->cache = $cache;
        $this->attachmentRepository = $attachmentRepository;
        $this->logger = $logger;
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
            $this->logger->logInfo('Fetching media items', [
                'folder_id' => $args['folder_id'] ?? 0,
                'args' => $args
            ]);
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
        $this->logger->logInfo('Moving attachments to folder', [
            'attachment_ids' => $attachmentIds,
            'folder_id' => $folderId
        ]);

        $success = true;
        foreach ($attachmentIds as $attachmentId) {
            try {
                $this->attachmentRepository->addToFolder((int)$attachmentId, $folderId);
            } catch (\Exception $e) {
                $success = false;
                $this->logger->logError(
                    "Failed to move attachment to folder", 
                    [
                        'attachment_id' => $attachmentId,
                        'folder_id' => $folderId,
                        'error' => $e->getMessage()
                    ]
                );
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
        $this->logger->logInfo('Removing attachments from folder', [
            'attachment_ids' => $attachmentIds,
            'folder_id' => $folderId
        ]);

        $success = true;
        foreach ($attachmentIds as $attachmentId) {
            try {
                $this->attachmentRepository->removeFromFolder((int)$attachmentId, $folderId);
            } catch (\Exception $e) {
                $success = false;
                $this->logger->logError(
                    "Failed to remove attachment from folder",
                    [
                        'attachment_id' => $attachmentId,
                        'folder_id' => $folderId,
                        'error' => $e->getMessage()
                    ]
                );
            }
        }
        return $success;
    }
}