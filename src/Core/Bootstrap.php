<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Providers\DatabaseServiceProvider;
use MediaFolders\Providers\HttpServiceProvider;

class Bootstrap
{
    /**
     * @var Container
     */
    private Container $container;

    /**
     * @var array
     */
    private array $providers = [
        DatabaseServiceProvider::class,
        HttpServiceProvider::class,
    ];

    // ... rest of the class remains the same
}