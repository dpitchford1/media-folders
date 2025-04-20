<?php

declare(strict_types=1);

namespace MediaFolders\Admin;

use MediaFolders\Database\Contracts\FolderRepositoryInterface;

class AdminPage
{
    /**
     * @var string
     */
    private const ASSETS_VERSION = '1.0.0';

    /**
     * @var FolderRepositoryInterface
     */
    private FolderRepositoryInterface $folders;

    /**
     * @param FolderRepositoryInterface $folders
     */
    public function __construct(FolderRepositoryInterface $folders)
    {
        $this->folders = $folders;
    }

    /**
     * Initialize admin page.
     *
     * @return void
     */
    public function init(): void
    {
        error_log('MediaFolders: AdminPage init() called');
        add_action('admin_menu', [$this, 'registerMenuPage']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAssets']);
        add_filter('media_library_infinite_scrolling', '__return_true');
    }

    /**
     * Register the menu page.
     *
     * @return void
     */
    public function registerMenuPage(): void
    {
        error_log('MediaFolders: Registering menu page');
        add_media_page(
            __('Media Folders', 'media-folders'),
            __('Folders', 'media-folders'),
            'upload_files',
            'media-folders',
            [$this, 'renderPage']
        );
    }

    /**
     * Enqueue admin assets.
     *
     * @param string $hook
     * @return void
     */
    public function enqueueAssets(string $hook): void
    {
        if (!$this->isMediaFoldersPage($hook)) {
            return;
        }

        error_log('MediaFolders: Enqueuing assets for hook: ' . $hook);

        wp_enqueue_style(
            'media-folders-admin',
            $this->getAssetUrl('css/admin.css'),
            [],
            self::ASSETS_VERSION
        );

        wp_enqueue_script('wp-api-fetch');
        wp_enqueue_script('wp-element');
        wp_enqueue_script('wp-components');
        wp_enqueue_script('wp-i18n');

        wp_enqueue_script(
            'media-folders-admin',
            $this->getAssetUrl('js/admin.js'),
            ['jquery', 'wp-api', 'wp-element', 'wp-components'],
            self::ASSETS_VERSION,
            true
        );

        $nonce = wp_create_nonce('wp_rest');
        error_log(sprintf(
            'MediaFolders: Setting up admin script with nonce and user: %s',
            wp_get_current_user()->user_login
        ));

        wp_localize_script('media-folders-admin', 'MediaFoldersAdmin', [
            'nonce' => $nonce,
            'apiRoot' => esc_url_raw(rest_url()),
            'apiNamespace' => 'media-folders/v1',
            'debug' => [
                'currentUser' => wp_get_current_user()->user_login,
                'currentTime' => current_time('mysql'),
                'isAdmin' => current_user_can('manage_options'),
            ],
            'permissions' => [
                'canCreate' => current_user_can('upload_files'),
                'canEdit' => current_user_can('upload_files'),
                'canDelete' => current_user_can('upload_files'),
            ],
        ]);

        // Add test script for API connectivity
        wp_add_inline_script('media-folders-admin', "
            console.log('MediaFolders: Testing API connectivity...');
            fetch(MediaFoldersAdmin.apiRoot + 'media-folders/v1/test', {
                headers: {
                    'X-WP-Nonce': MediaFoldersAdmin.nonce
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('MediaFolders API Test:', data);
            })
            .catch(error => {
                console.error('MediaFolders API Error:', error);
            });

            // Test folders endpoint
            fetch(MediaFoldersAdmin.apiRoot + 'media-folders/v1/folders', {
                headers: {
                    'X-WP-Nonce': MediaFoldersAdmin.nonce
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('MediaFolders Folders Test:', data);
            })
            .catch(error => {
                console.error('MediaFolders Folders Error:', error);
            });
        ", 'after');
    }

    /**
     * Render the admin page.
     *
     * @return void
     */
    public function renderPage(): void
    {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <div id="media-folders-root">
                <div class="media-folders-debug">
                    <h2>Debug Information</h2>
                    <pre><?php 
                        echo esc_html(sprintf(
                            "User: %s\nCan Upload: %s\nNonce: %s\nAPI Root: %s",
                            wp_get_current_user()->user_login,
                            current_user_can('upload_files') ? 'Yes' : 'No',
                            wp_create_nonce('wp_rest'),
                            esc_url_raw(rest_url('media-folders/v1'))
                        )); 
                    ?></pre>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Check if current page is media folders page.
     *
     * @param string $hook
     * @return bool
     */
    private function isMediaFoldersPage(string $hook): bool
    {
        error_log('MediaFolders: Checking page hook: ' . $hook);
        return in_array($hook, [
            'media_page_media-folders',
            'upload.php',
        ], true);
    }

    /**
     * Get asset URL.
     *
     * @param string $path
     * @return string
     */
    private function getAssetUrl(string $path): string
    {
        // For JS files, always look in build directory
        if (strpos($path, 'js/') === 0) {
            $url = plugins_url('build/' . basename($path), dirname(__DIR__));
            error_log('MediaFolders: Loading JS from: ' . $url);
            return $url;
        }
        
        // For CSS files, check if built version exists, otherwise use assets
        if (strpos($path, 'css/') === 0) {
            $builtCss = 'build/' . basename($path);
            if (file_exists(dirname(__DIR__, 2) . '/' . $builtCss)) {
                $url = plugins_url($builtCss, dirname(__DIR__));
                error_log('MediaFolders: Loading built CSS from: ' . $url);
                return $url;
            }
            $url = plugins_url('assets/' . $path, dirname(__DIR__));
            error_log('MediaFolders: Loading CSS from assets: ' . $url);
            return $url;
        }
        
        $url = plugins_url('assets/' . $path, dirname(__DIR__));
        error_log('MediaFolders: Loading asset from: ' . $url);
        return $url;
    }
}