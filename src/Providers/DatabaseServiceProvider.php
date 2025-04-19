<?php

declare(strict_types=1);

namespace MediaFolders\Providers;

use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Database\AttachmentRepository;
use MediaFolders\Database\CacheRepository;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Database\Contracts\CacheRepositoryInterface;
use MediaFolders\Database\Contracts\DatabaseManagerInterface;
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Database\DatabaseManager;
use MediaFolders\Database\FolderRepository;

class DatabaseServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Container $container): void
    {
        global $wpdb;

        // Register core database services
        $container->singleton(DatabaseManagerInterface::class, function() use ($wpdb) {
            return new DatabaseManager($wpdb);
        });

        // Register repositories
        $container->singleton(FolderRepositoryInterface::class, function() use ($wpdb) {
            return new FolderRepository($wpdb);
        });

        $container->singleton(AttachmentRepositoryInterface::class, function() use ($wpdb) {
            return new AttachmentRepository($wpdb);
        });

        $container->singleton(CacheRepositoryInterface::class, function() use ($wpdb) {
            return new CacheRepository($wpdb);
        });
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Container $container): void
    {
        // Perform any necessary bootstrapping
    }
}