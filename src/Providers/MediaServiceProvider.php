<?php

declare(strict_types=1);

namespace MediaFolders\Providers;

use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\MediaHandler;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use MediaFolders\Core\ImageIndexing\IndexProgress;
use MediaFolders\Core\Logging\ImageLogger;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Http\RestRouter;
use MediaFolders\Database\Contracts\FolderRepositoryInterface;

class MediaServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        // Register ImageLogger first since ImageIndexer depends on it
        $container->singleton(ImageLogger::class, function() {
            error_log('MediaFolders: Registering ImageLogger in container');
            return new ImageLogger();
        });

        // Register RestRouter
        $container->singleton(RestRouter::class, function($container) {
            error_log('MediaFolders: Registering RestRouter in container');
            return new RestRouter(
                $container->get(FolderRepositoryInterface::class),
                $container->get(AttachmentRepositoryInterface::class)
            );
        });

        // Register MediaHandler
        $container->singleton(MediaHandler::class, function($container) {
            return new MediaHandler(
                $container->get(CacheInterface::class),
                $container->get(AttachmentRepositoryInterface::class),
		$container->get(ImageLogger::class)    // Added the logger dependency
            );
        });

        // Register ImageIndexer with all three required dependencies
        $container->singleton(ImageIndexer::class, function($container) {
            return new ImageIndexer(
                $container->get(CacheInterface::class),
                $container->get(AttachmentRepositoryInterface::class),
                $container->get(ImageLogger::class)    // Added the logger dependency
            );
        });

        // Register IndexProgress
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

        // Initialize the indexer
        try {
            $indexer = $container->get(ImageIndexer::class);
            $indexer->init();
        } catch (\Exception $e) {
            error_log('MediaFolders ERROR: Failed to initialize ImageIndexer - ' . $e->getMessage());
        }

        // Handle new attachments
        add_action('add_attachment', function($attachmentId) use ($container) {
            try {
                $indexer = $container->get(ImageIndexer::class);
                wp_schedule_single_event(time(), 'media_folders_process_image_index');
            } catch (\Exception $e) {
                error_log('MediaFolders ERROR: Failed to handle new attachment - ' . $e->getMessage());
            }
        });

        // Admin notices for indexing progress
        add_action('admin_notices', function() use ($container) {
            // Only show on media pages or our plugin page
            $screen = get_current_screen();
            if (!$screen || !in_array($screen->id, ['upload', 'media_page_media-folders'])) {
                return;
            }

            if (!current_user_can('manage_options')) {
                return;
            }

            try {
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
            } catch (\Exception $e) {
                error_log('MediaFolders ERROR: Failed to show indexing progress - ' . $e->getMessage());
            }
        });
    }
}