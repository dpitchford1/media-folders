<?php

declare(strict_types=1);

use MediaFolders\Admin\AdminPage;
use MediaFolders\Core\Container;
use MediaFolders\Database\AttachmentRepository;
use MediaFolders\Database\CacheRepository;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Database\Contracts\CacheRepositoryInterface;
use MediaFolders\Database\Contracts\DatabaseManagerInterface;
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Database\DatabaseManager;
use MediaFolders\Database\FolderRepository;
use MediaFolders\Core\Contracts\EventDispatcherInterface;
use MediaFolders\Core\EventDispatcher;
use MediaFolders\Http\Contracts\RestRouterInterface;
use MediaFolders\Http\RestRouter;

return [
    // Core Services
    EventDispatcherInterface::class => EventDispatcher::class,
    RestRouterInterface::class => RestRouter::class,
    
    // Database Services
    DatabaseManagerInterface::class => function (Container $container) {
        global $wpdb;
        return new DatabaseManager($wpdb);
    },
    
    FolderRepositoryInterface::class => function (Container $container) {
        global $wpdb;
        return new FolderRepository($wpdb);
    },
    
    AttachmentRepositoryInterface::class => function (Container $container) {
        global $wpdb;
        return new AttachmentRepository($wpdb);
    },
    
    CacheRepositoryInterface::class => function (Container $container) {
        global $wpdb;
        return new CacheRepository($wpdb);
    },
    
    // Admin Services
    AdminPage::class => function (Container $container) {
        return new AdminPage(
            $container->get(FolderRepositoryInterface::class)
        );
    },
];