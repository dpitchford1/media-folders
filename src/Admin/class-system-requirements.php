<?php
/**
 * System Requirements Check Class
 *
 * @package MediaFolders
 * @since 1.0.0
 */

namespace MediaFolders\Admin;

if (!defined('ABSPATH')) {
    exit;
}

class SystemRequirements {
    /**
     * Store any system requirement issues
     *
     * @var array
     */
    private $issues = array();

    /**
     * Check if the system meets all requirements
     *
     * @return bool
     */
    public function is_compatible() {
        $this->check_wp_version();
        $this->check_php_version();
        $this->check_php_extensions();
        $this->check_file_permissions();
        
        return empty($this->issues);
    }

    /**
     * Get list of identified issues
     *
     * @return array
     */
    public function get_issues() {
        return $this->issues;
    }

    /**
     * Check WordPress version
     */
    private function check_wp_version() {
        global $wp_version;
        
        if (version_compare($wp_version, '6.5', '<')) {
            $this->issues[] = sprintf(
                __('WordPress %s or higher is required. Current version: %s', 'media-folders'),
                '6.5',
                $wp_version
            );
        }
    }

    /**
     * Check PHP version
     */
    private function check_php_version() {
        if (version_compare(PHP_VERSION, '7.4', '<')) {
            $this->issues[] = sprintf(
                __('PHP %s or higher is required. Current version: %s', 'media-folders'),
                '7.4',
                PHP_VERSION
            );
        }
    }

    /**
     * Check required PHP extensions
     */
    private function check_php_extensions() {
        $required_extensions = array(
            'gd' => __('GD Library for image processing', 'media-folders'),
            'json' => __('JSON extension for data handling', 'media-folders'),
            'mysqli' => __('MySQLi for database operations', 'media-folders')
        );

        foreach ($required_extensions as $ext => $description) {
            if (!extension_loaded($ext)) {
                $this->issues[] = sprintf(
                    __('Required PHP extension missing: %s (%s)', 'media-folders'),
                    $ext,
                    $description
                );
            }
        }
    }

    /**
     * Check file permissions
     */
    private function check_file_permissions() {
        $upload_dir = wp_upload_dir();
        
        if (!wp_is_writable($upload_dir['basedir'])) {
            $this->issues[] = sprintf(
                __('Upload directory is not writable: %s', 'media-folders'),
                $upload_dir['basedir']
            );
        }
    }
}