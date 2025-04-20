# Development Guide

## Architecture

### Core Components

#### Cache System

The cache system is implemented using a database table for persistence:

```php
wp_media_folders_cache
├── key (VARCHAR 255)
├── value (LONGTEXT)
└── expiry (BIGINT)
```

The `DatabaseCache` class implements the `CacheInterface`:

```php
interface CacheInterface
{
    public function get(string $key, $default = null);
    public function set(string $key, $value, int $ttl = 3600): bool;
    public function remember(string $key, int $ttl, callable $callback);
    public function delete(string $key): bool;
}
```

#### Image Indexing

The image indexing system processes media attachments in the background:

1. `ImageIndexer` - Manages the indexing process
2. `IndexProgress` - Tracks indexing progress
3. WordPress Cron - Handles background processing

### Testing

The plugin uses PHPUnit for testing:

```
tests/
├── bootstrap.php - Test suite initialization
├── php/
│   └── Unit/    - Unit tests
└── js/          - JavaScript tests
```

#### Running Tests

```bash
# Run all tests
composer test

# Run specific test suite
composer test:unit

# Run with coverage
composer test:coverage
```

### Coding Standards

The project follows PSR-12 coding standards. Use PHP_CodeSniffer to check:

```bash
composer cs:check
composer cs:fix
```

## Release Process

1. Update version in:
   - plugin.php
   - readme.txt
   - CHANGELOG.md
2. Run tests: `composer test`
3. Build assets: `npm run build`
4. Commit changes
5. Tag release
6. Push to GitHub

## Troubleshooting

### Common Issues

1. Cache table not created
   - Check WordPress database permissions
   - Run activation hook manually

2. Images not being indexed
   - Verify WordPress cron is running
   - Check server memory limits