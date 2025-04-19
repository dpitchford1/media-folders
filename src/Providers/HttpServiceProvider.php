<?php

declare(strict_types=1);

namespace MediaFolders\Providers;

use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Http\Contracts\RestRouterInterface;
use MediaFolders\Http\RestRouter;

class HttpServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Container $container): void
    {
        $container->singleton(RestRouterInterface::class, RestRouter::class);
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Container $container): void
    {
        add_action('rest_api_init', function() use ($container) {
            $router = $container->get(RestRouterInterface::class);
            $router->register();
        });
    }
}