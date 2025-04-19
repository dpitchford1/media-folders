<?php

declare(strict_types=1);

namespace MediaFolders\Core\Contracts;

use MediaFolders\Core\Container;

interface ServiceProviderInterface
{
    /**
     * Register services into the container.
     *
     * @param Container $container
     * @return void
     */
    public function register(Container $container): void;

    /**
     * Bootstrap any application services.
     *
     * @param Container $container
     * @return void
     */
    public function boot(Container $container): void;
}