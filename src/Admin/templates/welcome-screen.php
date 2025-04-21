<?php
/**
 * Media Folders - Welcome Screen Template
 *
 * @package MediaFolders
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

<div class="wrap media-folders-welcome">
    <h1><?php _e('Welcome to Media Folders', 'media-folders'); ?></h1>

    <!-- Header Navigation -->
    <nav class="nav-tab-wrapper">
        <a href="?page=media-folders-welcome" class="nav-tab nav-tab-active"><?php _e('Welcome', 'media-folders'); ?></a>
        <a href="?page=media-folders-index" class="nav-tab"><?php _e('Index Images', 'media-folders'); ?></a>
    </nav>

    <!-- System Status Check -->
    <?php if (!$this->system_check->is_compatible()): ?>
        <div class="notice notice-error">
            <h2><?php _e('System Requirements Not Met', 'media-folders'); ?></h2>
            <ul class="system-status">
                <?php foreach ($this->system_check->get_issues() as $issue): ?>
                    <li class="status-item status-error">
                        <span class="dashicons dashicons-warning"></span>
                        <?php echo esc_html($issue); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <!-- Welcome Content -->
        <div class="welcome-content">
            <h2><?php _e('Get Started with Media Folders', 'media-folders'); ?></h2>
            <p class="about-description">
                <?php _e('Organize your WordPress media library into folders automatically.', 'media-folders'); ?>
            </p>

            <div class="welcome-actions">
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <?php wp_nonce_field('media_folders_index_action', 'media_folders_nonce'); ?>
                    <input type="hidden" name="action" value="media_folders_start_index">
                    
                    <button type="submit" class="button button-primary button-hero">
                        <span class="dashicons dashicons-download"></span>
                        <?php _e('Index Current Files', 'media-folders'); ?>
                    </button>
                    
                    <a href="<?php echo esc_url(admin_url('admin.php?page=media-folders&skip_index=1')); ?>" 
                       class="button button-secondary button-hero">
                        <?php _e('Skip Indexing', 'media-folders'); ?>
                    </a>
                </div>

                <div class="welcome-help">
                    <p>
                        <?php _e('You can always start indexing later from the Index Images tab.', 'media-folders'); ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>