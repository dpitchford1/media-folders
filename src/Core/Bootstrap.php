<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Providers\AdminServiceProvider;
use MediaFolders\Providers\DatabaseServiceProvider;
use MediaFolders\Providers\EventServiceProvider;
use MediaFolders\Providers\HttpServiceProvider;
use MediaFolders\Core\Contracts\ServiceProviderInterface;

class Bootstrap
{
    /**
     * @var Container
     */
    private Container $container;

    /**
     * @var ServiceProviderInterface[]
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
        $this->registerServiceProviders();
        $this->bootServiceProviders();
    }

    /**
     * Register service providers.
     *
     * @return void
     */
    private function registerServiceProviders(): void
    {
        foreach ($this->providers as $providerClass) {
            if (class_exists($providerClass)) {
                $provider = new $providerClass();
                if ($provider instanceof ServiceProviderInterface) {
                    $provider->register($this->container);
                }
            }
        }
    }

    /**
     * Boot service providers.
     *
     * @return void
     */
    private function bootServiceProviders(): void
    {
        foreach ($this->providers as $providerClass) {
            if (class_exists($providerClass)) {
                $provider = new $providerClass();
                if ($provider instanceof ServiceProviderInterface) {
                    $provider->boot($this->container);
                }
            }
        }
    }
}