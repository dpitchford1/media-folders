<?php

declare(strict_types=1);

namespace MediaFolders\Models;

class Attachment
{
    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var array
     */
    private array $meta;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = (int) ($data['ID'] ?? 0);
        $this->title = $data['post_title'] ?? '';
        $this->url = wp_get_attachment_url($this->id) ?: '';
        $this->type = get_post_mime_type($this->id) ?: '';
        $this->meta = wp_get_attachment_metadata($this->id) ?: [];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * Convert attachment to array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'type' => $this->type,
            'meta' => $this->meta,
        ];
    }
}