<?php

declare(strict_types=1);

namespace MediaFolders\Core;

use Psr\Container\ContainerInterface;

/**
 * Plugin Bootstrap
 *
 * @package MediaFolders\Core
 * @since 2.0.0
 */
class Bootstrap
{
    /**
     * The dependency injection container.
     *
     * @var ContainerInterface
     */
    private ContainerInterface $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container The dependency injection container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Initialize the plugin.
     *
     * @return void
     */
    public function init(): void
    {
        $this->registerServices();
        $this->initializeComponents();
    }

    /**
     * Register service bindings in the container.
     *
     * @return void
     */
    private function registerServices(): void
    {
        // Register core services
        $this->container->singleton(Plugin::class);
        
        // Database services will be registered here
        
        // Admin services will be registered here
        
        // API services will be registered here
    }

    /**
     * Initialize plugin components.
     *
     * @return void
     */
    private function initializeComponents(): void
    {
        // Initialize the main plugin class
        $plugin = $this->container->get(Plugin::class);
        $plugin->boot();
    }
}