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

/**
 * Media Service Provider
 * 
 * @package MediaFolders\Providers
 * @author dpitchford1
 * @since 2.0.0
 * @created 2025-04-19 20:41:42
 */
class MediaServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Container $container): void
    {
        // Register core media services
        $container->singleton(MediaHandler::class, function($container) {
            return new MediaHandler(
                $container->get(CacheInterface::class),
                $container->get(AttachmentRepositoryInterface::class)
            );
        });

        // Register image indexing services
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

    /**
     * {@inheritDoc}
     */
    public function boot(Container $container): void
    {
        // Initialize image indexer
        $indexer = $container->get(ImageIndexer::class);
        $indexer->init();

        // Register hooks for media operations
        add_action('add_attachment', function($attachmentId) use ($container) {
            $indexer = $container->get(ImageIndexer::class);
            wp_schedule_single_event(time(), 'media_folders_process_image_index');
        });

        // Add admin notice for indexing progress
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