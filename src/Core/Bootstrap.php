<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use MediaFolders\Providers\DatabaseServiceProvider;

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
    ];

    public function __construct()
    {
        $this->container = new Container();
        $this->registerProviders();
        $this->bootProviders();
    }

    /**
     * Register service providers.
     *
     * @return void
     */
    private function registerProviders(): void
    {
        foreach ($this->providers as $provider) {
            $provider = new $provider();
            $provider->register($this->container);
        }
    }

    /**
     * Boot service providers.
     *
     * @return void
     */
    private function bootProviders(): void
    {
        foreach ($this->providers as $provider) {
            $provider = new $provider();
            $provider->boot($this->container);
        }
    }

    /**
     * Get the service container.
     *
     * @return Container
     */
    public function getContainer(): Container
    {
        return $this->container;
    }
}