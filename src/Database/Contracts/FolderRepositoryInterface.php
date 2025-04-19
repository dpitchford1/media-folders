<?php

declare(strict_types=1);

namespace MediaFolders\Database\Contracts;

use MediaFolders\Models\Folder;
use RuntimeException;

interface FolderRepositoryInterface
{
    /**
     * Find a folder by ID.
     *
     * @param int $id Folder ID
     * @return Folder|null
     */
    public function find(int $id): ?Folder;

    /**
     * Create a new folder.
     *
     * @param array $data Folder data
     * @return Folder
     * @throws RuntimeException If creation fails
     */
    public function create(array $data): Folder;

    /**
     * Update an existing folder.
     *
     * @param int $id Folder ID
     * @param array $data Updated folder data
     * @return bool
     * @throws RuntimeException If update fails
     */
    public function update(int $id, array $data): bool;

    /**
     * Delete a folder.
     *
     * @param int $id Folder ID
     * @return bool
     * @throws RuntimeException If deletion fails
     */
    public function delete(int $id): bool;

    /**
     * Get all folders.
     *
     * @param array $args Query arguments
     * @return array<Folder>
     */
    public function all(array $args = []): array;

    /**
     * Get child folders.
     *
     * @param int $parentId Parent folder ID
     * @return array<Folder>
     */
    public function children(int $parentId): array;
}