<?php
/**
 * Plugin Name: Media Folders
 * Plugin URI: https://github.com/dpitchford1/media-folders
 * Description: Efficient media library organization for WordPress
 * Version: 2.0.0
 * Requires at least: 6.5
 * Requires PHP: 7.4
 * Author: David Pitchford
 * Author URI: https://github.com/dpitchford1
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: media-folders
 * Domain Path: /languages
 *
 * @package MediaFolders
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// Plugin version.
if (!defined('MEDIA_FOLDERS_VERSION')) {
    define('MEDIA_FOLDERS_VERSION', '2.0.0');
}

// Plugin base path.
if (!defined('MEDIA_FOLDERS_PATH')) {
    define('MEDIA_FOLDERS_PATH', plugin_dir_path(__FILE__));
}

// Plugin base URL.
if (!defined('MEDIA_FOLDERS_URL')) {
    define('MEDIA_FOLDERS_URL', plugin_dir_url(__FILE__));
}

// Autoload dependencies.
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Bootstrap the plugin.
add_action('plugins_loaded', function() {
    try {
        $container = new MediaFolders\Core\Container();
        $container->singleton(MediaFolders\Core\Container::class, $container);
        
        $bootstrap = new MediaFolders\Core\Bootstrap($container);
        $bootstrap->init();
    } catch (Exception $e) {
        // Log error and display admin notice
        add_action('admin_notices', function() use ($e) {
            $message = sprintf(
                /* translators: %s: Error message */
                __('Media Folders Error: %s', 'media-folders'),
                $e->getMessage()
            );
            printf('<div class="notice notice-error"><p>%s</p></div>', esc_html($message));
        });
    }
});