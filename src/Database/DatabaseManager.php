<?php

declare(strict_types=1);

namespace MediaFolders\Database;

use MediaFolders\Database\Contracts\DatabaseManagerInterface;
use RuntimeException;
use wpdb;

class DatabaseManager implements DatabaseManagerInterface
{
    /**
     * WordPress database instance.
     *
     * @var wpdb
     */
    private wpdb $wpdb;

    /**
     * Database version option name.
     *
     * @var string
     */
    private const VERSION_OPTION = 'media_folders_db_version';

    /**
     * Constructor.
     *
     * @param wpdb $wpdb WordPress database instance
     */
    public function __construct(wpdb $wpdb)
    {
        $this->wpdb = $wpdb;
    }

    /**
     * {@inheritDoc}
     */
    public function installTables(): void
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $tables = Schema::getTables();
        $charset_collate = $this->wpdb->get_charset_collate();

        foreach ($tables as $table => $schema) {
            if (!dbDelta($schema . $charset_collate)) {
                throw new RuntimeException(
                    sprintf('Failed to create table: %s', $table)
                );
            }
        }

        $this->setVersion(MEDIA_FOLDERS_VERSION);
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(): string
    {
        return get_option(self::VERSION_OPTION, '0.0.0');
    }

    /**
     * {@inheritDoc}
     */
    public function setVersion(string $version): void
    {
        update_option(self::VERSION_OPTION, $version);
    }

    /**
     * {@inheritDoc}
     */
    public function needsUpgrade(): bool
    {
        return version_compare($this->getVersion(), MEDIA_FOLDERS_VERSION, '<');
    }
}