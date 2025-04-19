# Media Folders WordPress Plugin

A WordPress plugin for organizing media files into folders with advanced caching and image indexing capabilities.

## Features

- Organize media files into folders
- Advanced caching system for improved performance
- Automatic image indexing and metadata generation
- Integration with WordPress media library
- Bulk organization tools

## Requirements

- WordPress 5.9 or higher
- PHP 7.4 or higher
- MySQL 5.7 or higher

## Installation

1. Upload the plugin files to `/wp-content/plugins/media-folders`
2. Activate the plugin through the WordPress admin interface
3. The plugin will automatically create required database tables
4. Configure plugin settings under Settings > Media Folders

## Development

### Setup

```bash
# Install dependencies
composer install

# Install development dependencies
composer install --dev
```

### Running Tests

```bash
# Run all tests
composer test

# Run specific test suite
composer test:unit
```

### Building Assets

```bash
# Install npm dependencies
npm install

# Build assets
npm run build
```

## Documentation

### Cache System

The plugin implements a database-backed cache system for storing frequently accessed data:

```php
use MediaFolders\Core\Cache\DatabaseCache;

$cache = new DatabaseCache($wpdb);
$data = $cache->get('key');
$cache->set('key', $value, 3600); // Cache for 1 hour
```

### Image Indexing

The plugin automatically indexes images and generates metadata:

```php
use MediaFolders\Core\ImageIndexing\ImageIndexer;

$indexer = new ImageIndexer($cache, $attachmentRepository);
$indexer->init(); // Start background indexing process
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is licensed under the GPL v2 or later - see the [LICENSE](LICENSE) file for details.