<?php

namespace MediaFolders\Core\Providers;

use MediaFolders\Core\Logging\ImageLogger;

class LoggingServiceProvider
{
    public function register($container): void
    {
        $container->singleton(ImageLogger::class, function() {
            return new ImageLogger();
        });
    }
}