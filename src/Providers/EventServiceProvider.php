<?php

declare(strict_types=1);

namespace MediaFolders\Providers;

use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\EventDispatcherInterface;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Core\EventDispatcher;
use MediaFolders\Events\AttachmentAddedToFolder;
use MediaFolders\Events\FolderCreated;
use MediaFolders\Events\FolderDeleted;

class EventServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function register(Container $container): void
    {
        $container->singleton(EventDispatcherInterface::class, EventDispatcher::class);
    }

    /**
     * {@inheritDoc}
     */
    public function boot(Container $container): void
    {
        /** @var EventDispatcherInterface $dispatcher */
        $dispatcher = $container->get(EventDispatcherInterface::class);

        // Register default listeners
        $this->registerFolderListeners($dispatcher);
        $this->registerAttachmentListeners($dispatcher);
    }

    /**
     * Register folder-related event listeners.
     *
     * @param EventDispatcherInterface $dispatcher
     * @return void
     */
    private function registerFolderListeners(EventDispatcherInterface $dispatcher): void
    {
        // Log folder creation
        $dispatcher->addListener(FolderCreated::class, function(FolderCreated $event) {
            $folder = $event->getFolder();
            $user = get_userdata($event->getUserId());
            error_log(sprintf(
                'Folder "%s" (ID: %d) created by %s',
                $folder->getName(),
                $folder->getId(),
                $user ? $user->user_login : 'Unknown'
            ));
        });

        // Log folder deletion
        $dispatcher->addListener(FolderDeleted::class, function(FolderDeleted $event) {
            $user = get_userdata($event->getUserId());
            error_log(sprintf(
                'Folder (ID: %d) deleted by %s',
                $event->getFolderId(),
                $user ? $user->user_login : 'Unknown'
            ));
        });
    }

    /**
     * Register attachment-related event listeners.
     *
     * @param EventDispatcherInterface $dispatcher
     * @return void
     */
    private function registerAttachmentListeners(EventDispatcherInterface $dispatcher): void
    {
        // Log attachment additions to folders
        $dispatcher->addListener(AttachmentAddedToFolder::class, function(AttachmentAddedToFolder $event) {
            $user = get_userdata($event->getUserId());
            error_log(sprintf(
                'Attachment (ID: %d) added to folder (ID: %d) by %s',
                $event->getAttachmentId(),
                $event->getFolderId(),
                $user ? $user->user_login : 'Unknown'
            ));
        });
    }
}