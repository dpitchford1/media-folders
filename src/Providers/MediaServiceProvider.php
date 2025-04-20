<?php

declare(strict_types=1);

namespace MediaFolders\Providers;

use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\MediaHandler;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use MediaFolders\Core\ImageIndexing\IndexProgress;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Http\RestRouter; // Add this
use MediaFolders\Database\Contracts\FolderRepositoryInterface; // Add this

class MediaServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        // First, register the RestRouter
        $container->singleton(RestRouter::class, function($container) {
            error_log('MediaFolders: Registering RestRouter in container');
            return new RestRouter(
                $container->get(FolderRepositoryInterface::class),
                $container->get(AttachmentRepositoryInterface::class)
            );
        });

        // Your existing registrations...
        $container->singleton(MediaHandler::class, function($container) {
            return new MediaHandler(
                $container->get(CacheInterface::class),
                $container->get(AttachmentRepositoryInterface::class)
            );
        });

        $container->singleton(ImageIndexer::class, function($container) {
            return new ImageIndexer(
                $container->get(CacheInterface::class),
                $container->get(AttachmentRepositoryInterface::class)
            );
        });

        $container->singleton(IndexProgress::class, function() {
            return new IndexProgress();
        });
    }

    public function boot(Container $container): void
    {
        // Register REST routes first
        add_action('rest_api_init', function() use ($container) {
            error_log('MediaFolders: rest_api_init hook fired');
            try {
                $router = $container->get(RestRouter::class);
                error_log('MediaFolders: Got router instance');
                $router->register();
                error_log('MediaFolders: Routes registered successfully');
            } catch (\Exception $e) {
                error_log('MediaFolders ERROR: ' . $e->getMessage());
            }
        }, 10);

        // Your existing boot code...
        $indexer = $container->get(ImageIndexer::class);
        $indexer->init();

        add_action('add_attachment', function($attachmentId) use ($container) {
            $indexer = $container->get(ImageIndexer::class);
            wp_schedule_single_event(time(), 'media_folders_process_image_index');
        });

        add_action('admin_notices', function() use ($container) {
            if (!current_user_can('manage_options')) {
                return;
            }

            $progress = $container->get(IndexProgress::class);
            $percent = $progress->getPercentComplete();

            if ($percent < 100) {
                $class = 'notice notice-info';
                $message = sprintf(
                    __('Media Folders: Indexing images (%s%% complete)', 'media-folders'),
                    $percent
                );
                printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
            }
        });
    }
}