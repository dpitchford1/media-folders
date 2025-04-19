<?php

declare(strict_types=1);

namespace MediaFolders\Core;

/**
 * Main Plugin Class
 *
 * @package MediaFolders\Core
 * @since 2.0.0
 */
class Plugin
{
    /**
     * Boot the plugin.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerHooks();
    }

    /**
     * Register WordPress hooks.
     *
     * @return void
     */
    private function registerHooks(): void
    {
        // Register activation hook
        register_activation_hook(MEDIA_FOLDERS_PATH . 'media-folders.php', [$this, 'activate']);
        
        // Register deactivation hook
        register_deactivation_hook(MEDIA_FOLDERS_PATH . 'media-folders.php', [$this, 'deactivate']);
        
        // Initialize admin if in admin context
        if (is_admin()) {
            add_action('admin_init', [$this, 'initAdmin']);
        }
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

        // Create database tables
        // This will be implemented in the Database component
    }

    /**
     * Plugin deactivation handler.
     *
     * @return void
     */
    public function deactivate(): void
    {
        // Cleanup tasks if needed
    }

    /**
     * Initialize admin functionality.
     *
     * @return void
     */
    public function initAdmin(): void
    {
        // Admin initialization will be implemented here
    }
}