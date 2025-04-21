<?php
/**
 * Media Folders Admin Class
 *
 * @package MediaFolders
 * @since 1.0.0
 */

namespace MediaFolders\Admin;

if (!defined('ABSPATH')) {
    exit;
}

class Admin {
    /**
     * Instance of the system requirements checker
     *
     * @var SystemRequirements
     */
    private $system_check;

    /**
     * Initialize the admin class
     */
    public function __construct() {
        $this->system_check = new SystemRequirements();
        
        add_action('admin_menu', array($this, 'add_menu_pages'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
        add_action('admin_init', array($this, 'handle_actions'));
    }

    /**
     * Add menu pages to WordPress admin
     */
    public function add_menu_pages() {
        add_media_page(
            __('Media Folders', 'media-folders'),
            __('Media Folders', 'media-folders'),
            'manage_options',
            'media-folders',
            array($this, 'render_main_page')
        );
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function enqueue_admin_assets() {
        $screen = get_current_screen();
        
        if (!$screen || !strpos($screen->id, 'media-folders')) {
            return;
        }

        wp_enqueue_style(
            'media-folders-admin',
            MEDIA_FOLDERS_URL . 'assets/css/media-folders-admin.css',
            array(),
            MEDIA_FOLDERS_VERSION
        );

        wp_enqueue_script(
            'media-folders-admin',
            MEDIA_FOLDERS_URL . 'assets/js/media-folders-admin.js',
            array('jquery'),
            MEDIA_FOLDERS_VERSION,
            true
        );

        wp_localize_script('media-folders-admin', 'mediaFoldersAdmin', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('media-folders-admin'),
            'i18n' => array(
                'indexing' => __('Indexing in progress...', 'media-folders'),
                'indexComplete' => __('Indexing complete!', 'media-folders'),
                'indexError' => __('Error during indexing', 'media-folders'),
            )
        ));
    }

    /**
     * Handle admin actions
     */
    public function handle_actions() {
        if (!isset($_POST['action']) || !current_user_can('manage_options')) {
            return;
        }

        if ($_POST['action'] === 'media_folders_start_index') {
            check_admin_referer('media_folders_index_action', 'media_folders_nonce');
            $this->start_indexing();
        }
    }

    /**
     * Render the main admin page
     */
    public function render_main_page() {
        $tab = isset($_GET['tab']) ? sanitize_key($_GET['tab']) : 'welcome';
        
        switch ($tab) {
            case 'index':
                require_once MEDIA_FOLDERS_PATH . 'templates/admin/index-screen.php';
                break;
            case 'welcome':
            default:
                require_once MEDIA_FOLDERS_PATH . 'templates/admin/welcome-screen.php';
                break;
        }
    }

    /**
     * Start the indexing process
     */
    private function start_indexing() {
        // Initialize indexing process
        $indexer = new Indexer();
        $indexer->start();

        wp_redirect(admin_url('upload.php?page=media-folders&tab=index'));
        exit;
    }
}