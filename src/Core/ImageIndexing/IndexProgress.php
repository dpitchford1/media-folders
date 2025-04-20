<?php

declare(strict_types=1);

namespace MediaFolders\Core\ImageIndexing;

class IndexProgress
{
    private const OPTION_KEY = 'media_folders_index_progress';
    
    /**
     * Get current indexing progress.
     *
     * @return array{total: int, processed: int, last_run: int}
     */
    public function getProgress(): array
    {
        $progress = get_option(self::OPTION_KEY, [
            'total' => 0,
            'processed' => 0,
            'last_run' => 0,
        ]);
        
        if ($progress['total'] === 0) {
            $progress['total'] = $this->countTotalImages();
            update_option(self::OPTION_KEY, $progress);
        }
        
        return $progress;
    }
    
    /**
     * Calculate percentage of completion.
     *
     * @return float
     */
    public function getPercentComplete(): float
    {
        $progress = $this->getProgress();
        
        if ($progress['total'] === 0) {
            return 0.0;
        }
        
        return round(($progress['processed'] / $progress['total']) * 100, 2);
    }
    
    /**
     * Count total images in the media library.
     *
     * @return int
     */
    private function countTotalImages(): int
    {
        global $wpdb;
        
        return (int) $wpdb->get_var("
            SELECT COUNT(*)
            FROM {$wpdb->posts}
            WHERE post_type = 'attachment'
            AND post_mime_type LIKE 'image/%'
        ");
    }
}