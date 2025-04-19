<?php

declare(strict_types=1);

namespace MediaFolders\Providers;

use MediaFolders\Admin\AdminPage;
use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;

class AdminServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Container $container): void
    {
        $container->singleton(AdminPage::class);
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Container $container): void
    {
        if (is_admin()) {
            $adminPage = $container->get(AdminPage::class);
            $adminPage->init();
        }
    }
}