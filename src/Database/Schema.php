<?php
namespace MediaFolders\Database;

/**
 * Database Schema Handler
 * 
 * @since 1.0.0
 */
class Schema {
    /**
     * Get tables schema
     *
     * @return array
     */
    public static function getTables(): array {
        global $wpdb;
        
        return [
            $wpdb->prefix . 'media_folders' => "
                CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}media_folders` (
                    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                    `name` varchar(255) NOT NULL,
                    `slug` varchar(255) NOT NULL,
                    `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
                    `created_at` datetime NOT NULL,
                    `updated_at` datetime NOT NULL,
                    PRIMARY KEY (`id`),
                    KEY `parent_id` (`parent_id`),
                    KEY `slug` (`slug`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            ",
            
            $wpdb->prefix . 'media_folder_relationships' => "
                CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}media_folder_relationships` (
                    `attachment_id` bigint(20) UNSIGNED NOT NULL,
                    `folder_id` bigint(20) UNSIGNED NOT NULL,
                    `created_at` datetime NOT NULL,
                    PRIMARY KEY (`attachment_id`, `folder_id`),
                    KEY `folder_id` (`folder_id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            ",
            
            $wpdb->prefix . 'media_folder_cache' => "
                CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}media_folder_cache` (
                    `key` varchar(255) NOT NULL,
                    `value` longtext NOT NULL,
                    `expiry` datetime NOT NULL,
                    PRIMARY KEY (`key`),
                    KEY `expiry` (`expiry`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            "
        ];
    }
}