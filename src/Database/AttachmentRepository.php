<?php

declare(strict_types=1);

namespace MediaFolders\Database;

use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Models\Attachment;
use RuntimeException;
use wpdb;
use WP_Query;

class AttachmentRepository implements AttachmentRepositoryInterface
{
    /**
     * @var wpdb
     */
    private wpdb $wpdb;

    /**
     * @param wpdb $wpdb
     */
    public function __construct(wpdb $wpdb)
    {
        $this->wpdb = $wpdb;
    }

    /**
     * {@inheritDoc}
     */
    public function addToFolder(int $attachmentId, int $folderId): bool
    {
        if ($this->existsInFolder($attachmentId, $folderId)) {
            return true;
        }

        $result = $this->wpdb->insert(
            $this->wpdb->prefix . 'media_folder_relationships',
            [
                'attachment_id' => $attachmentId,
                'folder_id' => $folderId,
                'created_at' => current_time('mysql'),
            ],
            ['%d', '%d', '%s']
        );

        if (!$result) {
            throw new RuntimeException('Failed to add attachment to folder');
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function removeFromFolder(int $attachmentId, int $folderId): bool
    {
        return (bool) $this->wpdb->delete(
            $this->wpdb->prefix . 'media_folder_relationships',
            [
                'attachment_id' => $attachmentId,
                'folder_id' => $folderId,
            ],
            ['%d', '%d']
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getByFolder(int $folderId, array $args = []): array
    {
        $defaults = [
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ];

        $args = wp_parse_args($args, $defaults);

        // Get attachment IDs in folder
        $attachmentIds = $this->wpdb->get_col(
            $this->wpdb->prepare(
                "SELECT attachment_id FROM {$this->wpdb->prefix}media_folder_relationships WHERE folder_id = %d",
                $folderId
            )
        );

        if (empty($attachmentIds)) {
            return [];
        }

        $args['post__in'] = $attachmentIds;

        $query = new WP_Query($args);
        
        return array_map(
            fn($post) => new Attachment((array) $post),
            $query->posts
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getFolderIds(int $attachmentId): array
    {
        return array_map(
            'intval',
            $this->wpdb->get_col(
                $this->wpdb->prepare(
                    "SELECT folder_id FROM {$this->wpdb->prefix}media_folder_relationships WHERE attachment_id = %d",
                    $attachmentId
                )
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function existsInFolder(int $attachmentId, int $folderId): bool
    {
        return (bool) $this->wpdb->get_var(
            $this->wpdb->prepare(
                "SELECT 1 FROM {$this->wpdb->prefix}media_folder_relationships WHERE attachment_id = %d AND folder_id = %d LIMIT 1",
                $attachmentId,
                $folderId
            )
        );
    }
}