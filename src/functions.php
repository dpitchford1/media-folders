<?php
// Global functions for Media Folders plugin
if (!function_exists('media_folders_log')) {
    function media_folders_log($message) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            if (is_array($message) || is_object($message)) {
                error_log(print_r($message, true));
            } else {
                error_log($message);
            }
        }
    }
}