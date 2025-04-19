<?php

declare(strict_types=1);

namespace MediaFolders\Http;

use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Http\Contracts\RestRouterInterface;
use WP_REST_Request;
use WP_REST_Response;
use WP_Error;

class RestRouter implements RestRouterInterface
{
    private const API_NAMESPACE = 'media-folders/v1';

    /**
     * @var FolderRepositoryInterface
     */
    private FolderRepositoryInterface $folders;

    /**
     * @var AttachmentRepositoryInterface
     */
    private AttachmentRepositoryInterface $attachments;

    /**
     * @param FolderRepositoryInterface $folders
     * @param AttachmentRepositoryInterface $attachments
     */
    public function __construct(
        FolderRepositoryInterface $folders,
        AttachmentRepositoryInterface $attachments
    ) {
        $this->folders = $folders;
        $this->attachments = $attachments;
    }

    /**
     * {@inheritDoc}
     */
    public function register(): void
    {
        register_rest_route(
            self::API_NAMESPACE,
            '/folders',
            [
                [
                    'methods' => 'GET',
                    'callback' => [$this, 'getFolders'],
                    'permission_callback' => [$this, 'checkPermission'],
                ],
                [
                    'methods' => 'POST',
                    'callback' => [$this, 'createFolder'],
                    'permission_callback' => [$this, 'checkPermission'],
                    'args' => [
                        'name' => [
                            'required' => true,
                            'type' => 'string',
                            'sanitize_callback' => 'sanitize_text_field',
                        ],
                        'parent_id' => [
                            'required' => false,
                            'type' => 'integer',
                        ],
                    ],
                ],
            ]
        );

        register_rest_route(
            self::API_NAMESPACE,
            '/folders/(?P<id>\d+)',
            [
                [
                    'methods' => 'GET',
                    'callback' => [$this, 'getFolder'],
                    'permission_callback' => [$this, 'checkPermission'],
                ],
                [
                    'methods' => 'PUT',
                    'callback' => [$this, 'updateFolder'],
                    'permission_callback' => [$this, 'checkPermission'],
                    'args' => [
                        'name' => [
                            'required' => true,
                            'type' => 'string',
                            'sanitize_callback' => 'sanitize_text_field',
                        ],
                    ],
                ],
                [
                    'methods' => 'DELETE',
                    'callback' => [$this, 'deleteFolder'],
                    'permission_callback' => [$this, 'checkPermission'],
                ],
            ]
        );

        register_rest_route(
            self::API_NAMESPACE,
            '/folders/(?P<id>\d+)/attachments',
            [
                [
                    'methods' => 'GET',
                    'callback' => [$this, 'getFolderAttachments'],
                    'permission_callback' => [$this, 'checkPermission'],
                ],
                [
                    'methods' => 'POST',
                    'callback' => [$this, 'addAttachmentToFolder'],
                    'permission_callback' => [$this, 'checkPermission'],
                    'args' => [
                        'attachment_id' => [
                            'required' => true,
                            'type' => 'integer',
                        ],
                    ],
                ],
                [
                    'methods' => 'DELETE',
                    'callback' => [$this, 'removeAttachmentFromFolder'],
                    'permission_callback' => [$this, 'checkPermission'],
                    'args' => [
                        'attachment_id' => [
                            'required' => true,
                            'type' => 'integer',
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Get all folders.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    public function getFolders(WP_REST_Request $request)
    {
        try {
            $folders = $this->folders->all();
            return new WP_REST_Response(['folders' => $folders], 200);
        } catch (\Exception $e) {
            return new WP_Error('folder_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Get a specific folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    public function getFolder(WP_REST_Request $request)
    {
        try {
            $folder = $this->folders->find((int) $request['id']);
            
            if (!$folder) {
                return new WP_Error('folder_not_found', 'Folder not found', ['status' => 404]);
            }

            return new WP_REST_Response(['folder' => $folder], 200);
        } catch (\Exception $e) {
            return new WP_Error('folder_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Create a new folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    public function createFolder(WP_REST_Request $request)
    {
        try {
            $folder = $this->folders->create([
                'name' => $request['name'],
                'parent_id' => $request['parent_id'] ?? null,
            ]);

            return new WP_REST_Response(['folder' => $folder], 201);
        } catch (\Exception $e) {
            return new WP_Error('folder_creation_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Update a folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    public function updateFolder(WP_REST_Request $request)
    {
        try {
            $updated = $this->folders->update((int) $request['id'], [
                'name' => $request['name'],
            ]);

            if (!$updated) {
                return new WP_Error('folder_update_failed', 'Failed to update folder', ['status' => 400]);
            }

            return new WP_REST_Response(['success' => true], 200);
        } catch (\Exception $e) {
            return new WP_Error('folder_update_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Delete a folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    public function deleteFolder(WP_REST_Request $request)
    {
        try {
            $deleted = $this->folders->delete((int) $request['id']);

            if (!$deleted) {
                return new WP_Error('folder_deletion_failed', 'Failed to delete folder', ['status' => 400]);
            }

            return new WP_REST_Response(['success' => true], 200);
        } catch (\Exception $e) {
            return new WP_Error('folder_deletion_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Get folder attachments.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    public function getFolderAttachments(WP_REST_Request $request)
    {
        try {
            $attachments = $this->attachments->getByFolder((int) $request['id']);
            return new WP_REST_Response(['attachments' => $attachments], 200);
        } catch (\Exception $e) {
            return new WP_Error('attachment_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Add attachment to folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    public function addAttachmentToFolder(WP_REST_Request $request)
    {
        try {
            $success = $this->attachments->addToFolder(
                (int) $request['attachment_id'],
                (int) $request['id']
            );

            if (!$success) {
                return new WP_Error('attachment_add_failed', 'Failed to add attachment to folder', ['status' => 400]);
            }

            return new WP_REST_Response(['success' => true], 200);
        } catch (\Exception $e) {
            return new WP_Error('attachment_add_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Remove attachment from folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    public function removeAttachmentFromFolder(WP_REST_Request $request)
    {
        try {
            $success = $this->attachments->removeFromFolder(
                (int) $request['attachment_id'],
                (int) $request['id']
            );

            if (!$success) {
                return new WP_Error('attachment_remove_failed', 'Failed to remove attachment from folder', ['status' => 400]);
            }

            return new WP_REST_Response(['success' => true], 200);
        } catch (\Exception $e) {
            return new WP_Error('attachment_remove_error', $e->getMessage(), ['status' => 500]);
        }
    }

    /**
     * Check if user has permission to manage folders.
     *
     * @return bool
     */
    public function checkPermission(): bool
    {
        return current_user_can('upload_files');
    }
}