<?php

declare(strict_types=1);

namespace MediaFolders\Http\Contracts;

interface RestRouterInterface
{
    /**
     * Register REST API routes.
     *
     * @return void
     */
    public function register(): void;
}