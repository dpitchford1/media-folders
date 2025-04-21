<?php
/**
 * Media Folders - Index Screen Template
 *
 * @package MediaFolders
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>

<div class="wrap media-folders-index">
    <h1><?php _e('Media Folders - Index Images', 'media-folders'); ?></h1>

    <!-- Header Navigation -->
    <nav class="nav-tab-wrapper">
        <a href="?page=media-folders-welcome" class="nav-tab"><?php _e('Welcome', 'media-folders'); ?></a>
        <a href="?page=media-folders-index" class="nav-tab nav-tab-active"><?php _e('Index Images', 'media-folders'); ?></a>
    </nav>

    <!-- Index Status -->
    <div class="index-status">
        <?php if ($this->indexer->is_running()): ?>
            <div class="notice notice-info">
                <h2>
                    <?php _e('Indexing in Progress', 'media-folders'); ?>
                    <span class="spinner is-active"></span>
                </h2>
                
                <div class="progress-bar">
                    <div class="progress" style="width: <?php echo esc_attr($this->indexer->get_progress()); ?>%"></div>
                </div>
                
                <p class="description">
                    <?php printf(
                        __('Processed: %1$d of %2$d images', 'media-folders'),
                        $this->indexer->get_processed_count(),
                        $this->indexer->get_total_count()
                    ); ?>
                </p>
            </div>
        <?php else: ?>
            <div class="notice notice-warning">
                <h2><?php _e('Images Not Indexed', 'media-folders'); ?></h2>
                <p>
                    <?php _e('Your media library needs to be indexed to enable folder organization.', 'media-folders'); ?>
                </p>
                
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <?php wp_nonce_field('media_folders_index_action', 'media_folders_nonce'); ?>
                    <input type="hidden" name="action" value="media_folders_start_index">
                    
                    <button type="submit" class="button button-primary">
                        <span class="dashicons dashicons-download"></span>
                        <?php _e('Start Indexing', 'media-folders'); ?>
                    </button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <!-- Folder Structure (shows after indexing starts) -->
    <?php if ($this->indexer->has_indexed_files()): ?>
        <div class="folder-structure">
            <h2><?php _e('Current Folder Structure', 'media-folders'); ?></h2>
            <?php $this->render_folder_tree(); ?>
        </div>
    <?php endif; ?>
</div>