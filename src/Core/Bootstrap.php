<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Providers\AdminServiceProvider;
use MediaFolders\Providers\DatabaseServiceProvider;
use MediaFolders\Providers\EventServiceProvider;
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
        EventServiceProvider::class,
        HttpServiceProvider::class,
        AdminServiceProvider::class,
    ];

    // ... rest of the class remains the same
}