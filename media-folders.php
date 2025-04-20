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
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('MEDIA_FOLDERS_VERSION', '2.0.0');
define('MEDIA_FOLDERS_FILE', __FILE__);
define('MEDIA_FOLDERS_PATH', plugin_dir_path(__FILE__));
define('MEDIA_FOLDERS_URL', plugin_dir_url(__FILE__));

// Composer autoloader
$autoloader = __DIR__ . '/vendor/autoload.php';

if (!file_exists($autoloader)) {
    add_action('admin_notices', function() {
        $message = sprintf(
            /* translators: %s: Composer command */
            __('Media Folders requires Composer autoloader. Please run: %s', 'media-folders'),
            '<code>composer install</code>'
        );
        printf('<div class="notice notice-error"><p>%s</p></div>', wp_kses_post($message));
    });
    return;
}

try {
    require_once $autoloader;
} catch (Throwable $e) {
    add_action('admin_notices', function() use ($e) {
        $message = sprintf(
            /* translators: %s: Error message */
            __('Media Folders autoloader error: %s', 'media-folders'),
            $e->getMessage()
        );
        printf('<div class="notice notice-error"><p>%s</p></div>', esc_html($message));
    });
    return;
}

// Initialize plugin
add_action('plugins_loaded', function() {
    try {
        // Basic class existence check
        if (!class_exists('MediaFolders\\Core\\Container')) {
            throw new RuntimeException('Core classes not found. Please check autoloader configuration.');
        }

        $container = new MediaFolders\Core\Container();
        $bootstrap = new MediaFolders\Core\Bootstrap($container);
        $bootstrap->init();
    } catch (Throwable $e) {
        add_action('admin_notices', function() use ($e) {
            $message = sprintf(
                /* translators: %s: Error message */
                __('Media Folders initialization error: %s', 'media-folders'),
                $e->getMessage()
            );
            printf('<div class="notice notice-error"><p>%s</p></div>', esc_html($message));
            if (defined('WP_DEBUG') && WP_DEBUG) {
                printf('<div class="notice notice-error"><pre>%s</pre></div>', esc_html($e->getTraceAsString()));
            }
        });
    }
}, 5);