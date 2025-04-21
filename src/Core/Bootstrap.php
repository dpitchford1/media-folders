<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Providers\MediaServiceProvider;
use MediaFolders\Http\RestRouter;
use MediaFolders\Database\FolderRepository;
use MediaFolders\Database\AttachmentRepository;
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\Cache\DatabaseCache;

class Bootstrap
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function init(): void
    {
        error_log('Media Folders Bootstrap init() called');
        $this->registerServices();
        $this->initializeWordPress();
    }

    private function registerServices(): void
    {
        error_log('MediaFolders: Registering services');
        
        // Register core services
        global $wpdb;
        
        $this->container->singleton(Container::class, $this->container);
        
        // Register database services
        $this->container->singleton('wpdb', $wpdb);

        // Register cache implementation
        $this->container->singleton(CacheInterface::class, function($container) {
            return new DatabaseCache($container->get('wpdb'));
        });
        
        // Register repositories
        $this->container->bind(
            FolderRepositoryInterface::class,
            function($container) {
                return new FolderRepository($container->get('wpdb'));
            }
        );

        $this->container->bind(
            AttachmentRepositoryInterface::class,
            function($container) {
                return new AttachmentRepository($container->get('wpdb'));
            }
        );

        // Register REST Router
        $this->container->singleton(RestRouter::class, function($container) {
            return new RestRouter(
                $container->get(FolderRepositoryInterface::class),
                $container->get(AttachmentRepositoryInterface::class)
            );
        });

        // Register and boot the MediaServiceProvider
        $provider = new MediaServiceProvider();
        $provider->register($this->container);
        $provider->boot($this->container);

        error_log('MediaFolders: Services registered');
    }

    private function initializeWordPress(): void
    {
        error_log('MediaFolders: Initializing WordPress integration');

        // Register REST API routes
        add_action('rest_api_init', function() {
            error_log('MediaFolders: Registering REST routes');
            try {
                $router = $this->container->get(RestRouter::class);
                $router->register();
                error_log('MediaFolders: REST routes registered successfully');
            } catch (\Exception $e) {
                error_log('MediaFolders ERROR: ' . $e->getMessage());
            }
        });

        // Initialize admin page
        $adminPage = new \MediaFolders\Admin\AdminPage(
            $this->container->get(FolderRepositoryInterface::class)
        );
        $adminPage->init();

        error_log('MediaFolders: WordPress integration initialized');
    }
}