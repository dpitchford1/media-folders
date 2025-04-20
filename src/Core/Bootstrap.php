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

    /**
     * Bootstrap constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Initialize the application.
     *
     * @return void
     */
    public function init(): void
    {
        // Register service providers
        foreach ($this->providers as $provider) {
            if (class_exists($provider)) {
                $providerInstance = new $provider();
                $providerInstance->register($this->container);
            }
        }

        // Boot service providers
        foreach ($this->providers as $provider) {
            if (class_exists($provider)) {
                $providerInstance = new $provider();
                if (method_exists($providerInstance, 'boot')) {
                    $providerInstance->boot($this->container);
                }
            }
        }
    }
}