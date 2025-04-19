<?php

declare(strict_types=1);

namespace MediaFolders\Database\Contracts;

interface DatabaseManagerInterface
{
    /**
     * Install or update database tables.
     *
     * @return void
     * @throws \RuntimeException If table creation fails
     */
    public function installTables(): void;

    /**
     * Get the current database version.
     *
     * @return string
     */
    public function getVersion(): string;

    /**
     * Update the database version.
     *
     * @param string $version Version to set
     * @return void
     */
    public function setVersion(string $version): void;

    /**
     * Check if database needs upgrade.
     *
     * @return bool
     */
    public function needsUpgrade(): bool;
}