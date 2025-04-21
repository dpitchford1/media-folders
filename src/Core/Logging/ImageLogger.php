<?php

namespace MediaFolders\Core\Logging;

/**
 * Handles logging for the image indexing system
 */
class ImageLogger
{
    /**
     * Log levels following PSR-3 standards
     */
    const EMERGENCY = 'emergency';
    const ALERT     = 'alert';
    const CRITICAL  = 'critical';
    const ERROR     = 'error';
    const WARNING   = 'warning';
    const NOTICE    = 'notice';
    const INFO      = 'info';
    const DEBUG     = 'debug';

    /**
     * @var string Log file path
     */
    private $logFile;

    /**
     * @var bool Whether debug mode is enabled
     */
    private $debug;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->logFile = WP_CONTENT_DIR . '/media-folders/logs/indexing.log';
        $this->debug = defined('WP_DEBUG') && WP_DEBUG;
        $this->ensureLogDirectoryExists();
    }

    /**
     * Log processing of an image
     * 
     * @param int $attachmentId WordPress attachment ID
     * @param string $status Processing status
     * @param array $metadata Additional metadata
     */
    public function logImageProcessing(int $attachmentId, string $status, array $metadata = []): void
    {
        $this->log(
            self::INFO,
            sprintf(
                'Processing image (ID: %d) - Status: %s',
                $attachmentId,
                $status
            ),
            array_merge(['attachment_id' => $attachmentId], $metadata)
        );
    }

    /**
     * Log a performance metric
     * 
     * @param string $operation Operation being measured
     * @param float $duration Duration in seconds
     * @param array $context Additional context
     */
    public function logPerformance(string $operation, float $duration, array $context = []): void
    {
        $this->log(
            self::DEBUG,
            sprintf(
                'Performance: %s took %.4f seconds',
                $operation,
                $duration
            ),
            array_merge(['duration' => $duration], $context)
        );
    }

    /**
     * Log an error
     * 
     * @param string $message Error message
     * @param array $context Error context
     */
    public function logError(string $message, array $context = []): void
    {
        $this->log(self::ERROR, $message, $context);
    }

    /**
     * Main logging method
     * 
     * @param string $level Log level
     * @param string $message Log message
     * @param array $context Additional context
     */
    private function log(string $level, string $message, array $context = []): void
    {
        if ($level === self::DEBUG && !$this->debug) {
            return;
        }

        $timestamp = date('Y-m-d H:i:s');
        $contextJson = !empty($context) ? json_encode($context) : '';
        
        $logEntry = sprintf(
            "[%s] %s: %s %s\n",
            $timestamp,
            strtoupper($level),
            $message,
            $contextJson
        );

        error_log($logEntry, 3, $this->logFile);
    }

    /**
     * Ensure the log directory exists and is writable
     */
    private function ensureLogDirectoryExists(): void
    {
        $logDir = dirname($this->logFile);
        
        if (!file_exists($logDir)) {
            wp_mkdir_p($logDir);
        }

        // Add .htaccess to protect logs
        $htaccess = $logDir . '/.htaccess';
        if (!file_exists($htaccess)) {
            file_put_contents($htaccess, "Deny from all");
        }
    }

    /**
     * Get the current log file path
     * 
     * @return string
     */
    public function getLogFile(): string
    {
        return $this->logFile;
    }
}