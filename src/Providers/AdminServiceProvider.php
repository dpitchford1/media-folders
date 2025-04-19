<?php

declare(strict_types=1);

namespace MediaFolders\Providers;

use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;

class AdminServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Container $container): void
    {
        // Register admin services
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Container $container): void
    {
        add_action('admin_menu', [$this, 'registerAdminMenu']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAssets']);
    }

    /**
     * Register admin menu items.
     *
     * @return void
     */
    public function registerAdminMenu(): void
    {
        // Register menu items
    }

    /**
     * Enqueue admin assets.
     *
     * @return void
     */
    public function enqueueAssets(): void
    {
        // Enqueue scripts and styles
    }
}