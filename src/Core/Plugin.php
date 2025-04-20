<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Providers\MediaServiceProvider;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\Cache\DatabaseCache;

/**
 * Main Plugin Class
 * 
 * @package MediaFolders\Core
 * @author dpitchford1 
 * @since 2.0.0
 * @updated 2025-04-19 20:41:42
 */
class Plugin
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    /**
     * Boot the plugin.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerServices();
        $this->registerHooks();
    }

    /**
     * Register services with the container.
     *
     * @return void
     */
    private function registerServices(): void
    {
        // Register cache implementation
        $this->container->singleton(CacheInterface::class, function() {
            global $wpdb;
            return new DatabaseCache($wpdb);
        });

        // Register service providers
        $providers = [
            MediaServiceProvider::class,
            // ... other providers
        ];

        foreach ($providers as $provider) {
            $instance = new $provider();
            $instance->register($this->container);
            $instance->boot($this->container);
        }
    }

    /**
     * Register WordPress hooks.
     *
     * @return void
     */
    private function registerHooks(): void
    {
        // Register activation hook
        register_activation_hook(
            MEDIA_FOLDERS_PATH . 'media-folders.php',
            [$this, 'activate']
        );
        
        // Register deactivation hook
        register_deactivation_hook(
            MEDIA_FOLDERS_PATH . 'media-folders.php',
            [$this, 'deactivate']
        );
        
        // Initialize admin if in admin context
        if (is_admin()) {
            add_action('admin_init', [$this, 'initAdmin']);
        }

        // Schedule cleanup of expired cache entries
        if (!wp_next_scheduled('media_folders_cache_cleanup')) {
            wp_schedule_event(time(), 'daily', 'media_folders_cache_cleanup');
        }

        add_action('media_folders_cache_cleanup', function() {
            global $wpdb;
            $wpdb->query(
                "DELETE FROM {$wpdb->prefix}media_folder_cache WHERE expiry < NOW()"
            );
        });
    }

    /**
     * Plugin activation handler.
     *
     * @return void
     */
    public function activate(): void
    {
        // Version check
        if (version_compare($GLOBALS['wp_version'], '6.5', '<')) {
            wp_die(
                esc_html__('Media Folders requires WordPress 6.5 or higher.', 'media-folders'),
                esc_html__('Plugin Activation Error', 'media-folders'),
                ['back_link' => true]
            );
        }

        // Create/update database tables
        $this->container->get(DatabaseManager::class)->installTables();

        // Schedule initial image indexing
        wp_schedule_single_event(time(), 'media_folders_process_image_index');
    }

    /**
     * Plugin deactivation handler.
     *
     * @return void
     */
    public function deactivate(): void
    {
        // Clear scheduled events
        wp_clear_scheduled_hook('media_folders_process_image_index');
        wp_clear_scheduled_hook('media_folders_cache_cleanup');
    }
}