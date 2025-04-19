<?php

declare(strict_types=1);

namespace MediaFolders\Database;

use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Models\Folder;
use RuntimeException;
use wpdb;

class FolderRepository implements FolderRepositoryInterface
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
    public function find(int $id): ?Folder
    {
        $row = $this->wpdb->get_row(
            $this->wpdb->prepare(
                "SELECT * FROM {$this->wpdb->prefix}media_folders WHERE id = %d",
                $id
            ),
            ARRAY_A
        );

        return $row ? new Folder($row) : null;
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $data): Folder
    {
        $now = current_time('mysql');
        
        $result = $this->wpdb->insert(
            $this->wpdb->prefix . 'media_folders',
            array_merge($data, [
                'created_at' => $now,
                'updated_at' => $now,
            ]),
            ['%s', '%s', '%d', '%s', '%s']
        );

        if (!$result) {
            throw new RuntimeException('Failed to create folder');
        }

        return $this->find((int) $this->wpdb->insert_id);
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, array $data): bool
    {
        $data['updated_at'] = current_time('mysql');

        return (bool) $this->wpdb->update(
            $this->wpdb->prefix . 'media_folders',
            $data,
            ['id' => $id],
            ['%s', '%s', '%d', '%s'],
            ['%d']
        );
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): bool
    {
        return (bool) $this->wpdb->delete(
            $this->wpdb->prefix . 'media_folders',
            ['id' => $id],
            ['%d']
        );
    }

    /**
     * {@inheritDoc}
     */
    public function all(array $args = []): array
    {
        $query = "SELECT * FROM {$this->wpdb->prefix}media_folders";
        $params = [];

        if (!empty($args['search'])) {
            $query .= ' WHERE name LIKE %s';
            $params[] = '%' . $this->wpdb->esc_like($args['search']) . '%';
        }

        if (!empty($args['orderby'])) {
            $query .= ' ORDER BY ' . esc_sql($args['orderby']);
            $query .= !empty($args['order']) ? ' ' . esc_sql($args['order']) : ' ASC';
        }

        $rows = $this->wpdb->get_results(
            $params ? $this->wpdb->prepare($query, ...$params) : $query,
            ARRAY_A
        );

        return array_map(fn($row) => new Folder($row), $rows ?: []);
    }

    /**
     * {@inheritDoc}
     */
    public function children(int $parentId): array
    {
        $rows = $this->wpdb->get_results(
            $this->wpdb->prepare(
                "SELECT * FROM {$this->wpdb->prefix}media_folders WHERE parent_id = %d ORDER BY name ASC",
                $parentId
            ),
            ARRAY_A
        );

        return array_map(fn($row) => new Folder($row), $rows ?: []);
    }
}