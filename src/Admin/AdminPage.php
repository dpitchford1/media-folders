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

        wp_enqueue_style(
            'media-folders-admin',
            $this->getAssetUrl('css/admin.css'),
            [],
            self::ASSETS_VERSION
        );

        wp_enqueue_script(
            'media-folders-admin',
            $this->getAssetUrl('js/admin.js'),
            ['jquery', 'wp-api', 'wp-element', 'wp-components'],
            self::ASSETS_VERSION,
            true
        );

        wp_localize_script('media-folders-admin', 'MediaFoldersAdmin', [
            'nonce' => wp_create_nonce('wp_rest'),
            'apiRoot' => esc_url_raw(rest_url()),
            'apiNamespace' => 'media-folders/v1',
            'permissions' => [
                'canCreate' => current_user_can('upload_files'),
                'canEdit' => current_user_can('upload_files'),
                'canDelete' => current_user_can('upload_files'),
            ],
        ]);
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
            <div id="media-folders-root"></div>
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
            return plugins_url('build/' . basename($path), dirname(__DIR__));
        }
        
        // For CSS files, check if built version exists, otherwise use assets
        if (strpos($path, 'css/') === 0) {
            $builtCss = 'build/' . basename($path);
            if (file_exists(dirname(__DIR__, 2) . '/' . $builtCss)) {
                return plugins_url($builtCss, dirname(__DIR__));
            }
            return plugins_url('assets/' . $path, dirname(__DIR__));
        }
        
        return plugins_url('assets/' . $path, dirname(__DIR__));
    }
}