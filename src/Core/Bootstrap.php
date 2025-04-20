<?php

declare(strict_types=1);

namespace MediaFolders\Core;

class Bootstrap
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function init(): void
    {
        $this->registerServices();
        $this->initializeWordPress();
    }

    private function registerServices(): void
    {
        // Register core services
        global $wpdb;
        
        $this->container->singleton(Container::class, $this->container);
        
        // Register database services
        $this->container->singleton('wpdb', $wpdb);
        
        // Register repositories
        $this->container->bind(
            \MediaFolders\Database\Contracts\FolderRepositoryInterface::class,
            function($container) {
                return new \MediaFolders\Database\FolderRepository($container->get('wpdb'));
            }
        );
    }

    private function initializeWordPress(): void
    {
        // Add menu page
        add_action('admin_menu', function() {
            add_media_page(
                'Media Folders',
                'Folders',
                'upload_files',
                'media-folders',
                function() {
                    $page = new \MediaFolders\Admin\AdminPage(
                        $this->container->get(\MediaFolders\Database\Contracts\FolderRepositoryInterface::class)
                    );
                    $page->render();
                }
            );
        });
    }
}