<?php

namespace MediaFolders\Providers;

use Illuminate\Support\ServiceProvider;
use MediaFolders\Core\Logging\ImageLogger;

class LoggingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ImageLogger::class, function() {
            return new ImageLogger();
        });
    }
}