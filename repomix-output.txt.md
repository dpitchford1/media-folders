This file is a merged representation of a subset of the codebase, containing files not matching ignore patterns, combined into a single document by Repomix.
The content has been processed where content has been compressed (code blocks are separated by ⋮---- delimiter).

# File Summary

## Purpose
This file contains a packed representation of the entire repository's contents.
It is designed to be easily consumable by AI systems for analysis, code review,
or other automated processes.

## File Format
The content is organized as follows:
1. This summary section
2. Repository information
3. Directory structure
4. Multiple file entries, each consisting of:
  a. A header with the file path (## File: path/to/file)
  b. The full contents of the file in a code block

## Usage Guidelines
- This file should be treated as read-only. Any changes should be made to the
  original repository files, not this packed version.
- When processing this file, use the file path to distinguish
  between different files in the repository.
- Be aware that this file may contain sensitive information. Handle it with
  the same level of security as you would the original repository.

## Notes
- Some files may have been excluded based on .gitignore rules and Repomix's configuration
- Binary files are not included in this packed representation. Please refer to the Repository Structure section for a complete list of file paths, including binary files
- Files matching these patterns are excluded: /assets/, **/*.css, **/*.js
- Files matching patterns in .gitignore are excluded
- Files matching default ignore patterns are excluded
- Content has been compressed - code blocks are separated by ⋮---- delimiter
- Files are sorted by Git change count (files with more changes are at the bottom)

## Additional Info

# Directory Structure
```
.repomix/
  bundles.json
assets/
  css/
    admin.scss
config/
  services.php
docs/
  architecture/
    docs_architecture_0000-adr-template.md
    docs_architecture_0001-modern-plugin-architecture.md
  rebuild/
    MEDIA-FOLDERS-REBUILD-PLAN.md
  DEVELOPMENT.md
  docs_README.md
  wordpress-plugin-dev-summary.md
Old Plugin/
  includes/
    attachments.php
    maxgalleria-media-library-hooks.php
    media-folders.php
    media-library.php
    mlf-image-seo.php
    mlf-settings.php
    mlf-support-articles.php
    mlf-support-sys-info.php
    mlf-support-tips.php
    mlf-support.php
    mlf-thumbnails.php
    mlfp-bda-options.php
  js/
    jstree/
      LICENSE-MIT
    select2/
      LICENSE.md
  languages/
    maxgalleria-media-library-da_DK.po
    maxgalleria-media-library-es_ES.po
    maxgalleria-media-library-fr_FR.po
    maxgalleria-media-library-it_IT.po
    maxgalleria-media-library-nl_BE.po
    maxgalleria-media-library-nl_NL.po
    maxgalleria-media-library-ru_RU.po
    maxgalleria-media-library.pot
    mlp-reset-nl_NL.po
    mlp-reset.pot
  libs/
    fontawesome-free-6.0.0-web/
      less/
        _animated.less
        _bordered-pulled.less
        _core.less
        _fixed-width.less
        _icons.less
        _list.less
        _mixins.less
        _rotated-flipped.less
        _screen-reader.less
        _shims.less
        _sizing.less
        _stacked.less
        _variables.less
        brands.less
        fontawesome.less
        regular.less
        solid.less
        v4-shims.less
      scss/
        _animated.scss
        _bordered-pulled.scss
        _core.scss
        _fixed-width.scss
        _functions.scss
        _icons.scss
        _list.scss
        _mixins.scss
        _rotated-flipped.scss
        _screen-reader.scss
        _shims.scss
        _sizing.scss
        _stacked.scss
        _variables.scss
        brands.scss
        fontawesome.scss
        regular.scss
        solid.scss
        v4-shims.scss
      LICENSE.txt
  media-library-plus.php
  mlp-reset.php
  page-mlfp-download.php
src/
  Admin/
    AdminPage.php
  Core/
    Cache/
      DatabaseCache.php
    Contracts/
      CacheInterface.php
      EventDispatcherInterface.php
      ServiceProviderInterface.php
    ImageIndexing/
      ImageIndexer.php
      IndexProgress.php
    Bootstrap.php
    Container.php
    EventDispatcher.php
    MediaHandler.php
    Plugin.php
  Database/
    Contracts/
      AttachmentRepositoryInterface.php
      CacheRepositoryInterface.php
      DatabaseManagerInterface.php
      FolderRepositoryInterface.php
    AttachmentRepository.php
    CacheRepository.php
    DatabaseManager.php
    FolderRepository.php
    Schema.php
  Events/
    AttachmentAddedToFolder.php
    Event.php
    FolderCreated.php
    FolderDeleted.php
  Http/
    Contracts/
      RestRouterInterface.php
    RestRouter.php
  Models/
    Attachment.php
    Folder.php
  Providers/
    AdminServiceProvider.php
    DatabaseServiceProvider.php
    EventServiceProvider.php
    HttpServiceProvider.php
    MediaServiceProvider.php
  functions.php
tests/
  php/
    Unit/
      Core/
        Cache/
          DatabaseCacheTest.php
        ImageIndexing/
          ImageIndexerTest.php
          IndexProgressTest.php
        MediaHandlerTest.php
      Database/
        FolderTest.php
      PluginTest.php
  bootstrap.php
build-plugin.sh
media-folders.code-workspace
media-folders.php
package.json
phpcs.xml.dist
phpunit.xml.dist
README.md
readme.txt
TESTING.md
```

# Files

## File: .repomix/bundles.json
````json
{
  "bundles": {}
}
````

## File: media-folders.code-workspace
````
{
	"folders": [
		{
			"path": "."
		}
    ],
    "settings": {}
}
````

## File: assets/css/admin.scss
````scss
.media-folders {
    &-container {
        display: flex;
        min-height: 400px;
        margin: 20px 0;
    }

    &-sidebar {
        width: 300px;
        padding: 20px;
        background: #fff;
        border: 1px solid #ccd0d4;
    }

    &-content {
        flex: 1;
        margin-left: 20px;
        padding: 20px;
        background: #fff;
        border: 1px solid #ccd0d4;
    }

    &-loading {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 200px;
    }
}
````

## File: config/services.php
````php
use MediaFolders\Admin\AdminPage;
use MediaFolders\Core\Container;
use MediaFolders\Database\AttachmentRepository;
use MediaFolders\Database\CacheRepository;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Database\Contracts\CacheRepositoryInterface;
use MediaFolders\Database\Contracts\DatabaseManagerInterface;
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Database\DatabaseManager;
use MediaFolders\Database\FolderRepository;
use MediaFolders\Core\Contracts\EventDispatcherInterface;
use MediaFolders\Core\EventDispatcher;
use MediaFolders\Http\Contracts\RestRouterInterface;
use MediaFolders\Http\RestRouter;
⋮----
// Core Services
⋮----
// Database Services
⋮----
// Admin Services
⋮----
$container->get(FolderRepositoryInterface::class)
````

## File: docs/architecture/docs_architecture_0000-adr-template.md
````markdown
# ADR Template

> Date: 2025-04-19 14:49:08 UTC  
> Author: [@dpitchford1](https://github.com/dpitchford1)  
> Status: Draft  
> Deciders: [@dpitchford1](https://github.com/dpitchford1)  
> ADR Number: 0000

## Title

Architecture Decision Record (ADR) template for Media Folders Plugin rebuild.

## Context

This is a template for creating ADRs. Each ADR should be saved in the `docs/architecture` directory with the format `NNNN-title-with-dashes.md` where `NNNN` is a sequential number starting from 0001.

## Decision

When creating a new ADR, copy this template and follow these guidelines:

### Metadata
```yaml
Date: YYYY-MM-DD HH:MM:SS UTC
Author: [@username](https://github.com/username)
Status: [Proposed | Accepted | Deprecated | Superseded]
Deciders: [@username](https://github.com/username)
ADR Number: NNNN
Technical Story: [description | ticket/issue URL]
```

### Required Sections

#### Context
What is the issue that we're seeing that is motivating this decision or change?

#### Decision
What is the change that we're proposing and/or doing?

#### Consequences
What becomes easier or more difficult to do because of this change?

### Optional Sections

#### Alternatives Considered
What other options were considered and why weren't they chosen?

#### Implementation Notes
Any specific notes on the implementation that might be helpful.

#### Related Decisions
List any related architecture decisions with their ADR numbers.

#### References
Any external references, articles, documentation, etc.

## Example Usage

```markdown
# 0001 Use WordPress REST API for Media Operations

> Date: 2025-04-19 14:49:08 UTC
> Author: [@dpitchford1](https://github.com/dpitchford1)
> Status: Proposed
> Deciders: [@dpitchford1](https://github.com/dpitchford1)
> ADR Number: 0001
> Technical Story: Improve media operation performance

## Context

Current media operations are using direct database queries and admin-ajax.php, 
leading to performance issues with large media libraries.

## Decision

We will migrate all media operations to use the WordPress REST API with custom 
endpoints for folder operations.

## Consequences

### Positive
- Better performance through modern HTTP caching
- Standardized API interface
- Better error handling
- Easier to test

### Negative
- Need to implement proper authentication
- Migration effort for existing functionality
- Additional learning curve for team

## Implementation Notes

1. Create new REST API endpoints under `/wp-json/media-folders/v1/`
2. Implement proper nonce verification
3. Add rate limiting for large operations
```

## Notes

- Keep each ADR focused and concise
- Use clear, unambiguous language
- Include code examples when relevant
- Update the status as the decision evolves
- Link to related issues or pull requests
- Use proper Markdown formatting

## References

- [Michael Nygard's ADR Template](https://github.com/joelparkerhenderson/architecture-decision-record/blob/main/templates/decision-record-template-by-michael-nygard/index.md)
- [MADR Template](https://adr.github.io/madr/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)

---

This template is based on established ADR formats, adapted for WordPress plugin development.
````

## File: docs/architecture/docs_architecture_0001-modern-plugin-architecture.md
````markdown
# 0001 Modern Plugin Architecture Implementation

> Date: 2025-04-19 14:49:08 UTC  
> Author: [@dpitchford1](https://github.com/dpitchford1)  
> Status: Proposed  
> Deciders: [@dpitchford1](https://github.com/dpitchford1)  
> ADR Number: 0001  
> Technical Story: Implement modern plugin architecture for Media Folders rebuild

## Context

The current Media Folders plugin uses an outdated architecture that makes maintenance difficult and impacts performance. We need to implement a modern, maintainable, and performant architecture for the rebuild.

## Decision

We will implement a modern plugin architecture with the following structure:

```
src/
├── Core/
│   ├── Plugin.php
│   └── Bootstrap.php
├── Database/
│   ├── Schema.php
│   └── Migrations/
├── Admin/
│   ├── AdminController.php
│   └── Views/
└── API/
    ├── REST/
    └── Internal/
```

### Key Components

1. **Dependency Injection Container**
```php
namespace MediaFolders\Core;

class Container implements ContainerInterface {
    private $services = [];
    
    public function get($id) {
        if (!$this->has($id)) {
            throw new NotFoundException();
        }
        return $this->services[$id];
    }
    
    public function has($id): bool {
        return isset($this->services[$id]);
    }
}
```

2. **Plugin Bootstrap**
```php
namespace MediaFolders\Core;

class Bootstrap {
    private $container;
    
    public function __construct(Container $container) {
        $this->container = $container;
    }
    
    public function init(): void {
        $this->registerServices();
        $this->initializeComponents();
    }
}
```

## Consequences

### Positive
- Clear separation of concerns
- Testable components
- Maintainable codebase
- Better performance through optimized loading
- Modern development practices

### Negative
- Complete rewrite required
- Learning curve for contributors
- Migration path needed for existing data

## Implementation Notes

1. Use Composer for autoloading and dependencies
2. Implement PSR-4 autoloading
3. Use WordPress coding standards
4. Implement unit testing from the start
5. Use TypeScript for admin interface

## Related Decisions

- ADR 0002: Database Schema Design (to be created)
- ADR 0003: Frontend Architecture (to be created)

## References

- [PSR-4 Autoloading Standard](https://www.php-fig.org/psr/psr-4/)
- [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)
- [Modern PHP Guide](https://phptherightway.com/)

---

This ADR establishes the foundation for the Media Folders plugin rebuild.
````

## File: docs/rebuild/MEDIA-FOLDERS-REBUILD-PLAN.md
````markdown
# Media Folders Plugin Rebuild Plan
**Project:** Media Folders (dpitchford1/media-folders)
**Created:** 2025-04-19 14:34:15 UTC
**Author:** dpitchford1
**WordPress Version Target:** 6.5+
**Image Handling Target:** 5000+ images

## Table of Contents
- [Current State Analysis](#current-state-analysis)
- [Rebuild Master Plan](#rebuild-master-plan)
- [Implementation Timeline](#implementation-timeline)
- [Technical Specifications](#technical-specifications)
- [Performance Goals](#performance-goals)

## Current State Analysis

### Architecture Issues

#### 1. Database Layer
- ❌ Inefficient queries causing Admin slowdown
- ❌ No proper indexing structure for 5000+ images
- ❌ Direct database queries instead of WordPress APIs
- ❌ Missing caching layer

#### 2. Code Organization
- ❌ Mixed concerns in classes
- ❌ Lack of modern PHP practices
- ❌ Outdated WordPress integration patterns

### Performance Bottlenecks

#### 1. Database Operations
- Full table scans on media queries
- Unoptimized JOIN operations
- Missing prepared statements
- No query caching

#### 2. Asset Loading
- Blocking JavaScript loads
- Unminified resources
- Non-selective admin asset loading

#### 3. Media Processing
- Synchronous image processing
- Inefficient metadata handling
- Memory-intensive operations

## Rebuild Master Plan

### Phase 1: Foundation (2 weeks)

#### Modern Architecture Setup
```
project/
├── src/
│   ├── Core/
│   │   ├── Plugin.php
│   │   └── Bootstrap.php
│   ├── Database/
│   │   ├── Schema.php
│   │   └── Migrations/
│   ├── Admin/
│   │   ├── AdminController.php
│   │   └── Views/
│   └── API/
│       ├── REST/
│       └── Internal/
├── assets/
│   ├── js/
│   │   └── src/
│   └── css/
│       └── src/
└── tests/
```

#### Database Schema
```sql
-- Media Folders Table
CREATE TABLE `wp_media_folders` (
    `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `parent_id` (`parent_id`),
    KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Media Relationships Table
CREATE TABLE `wp_media_folder_relationships` (
    `attachment_id` bigint(20) UNSIGNED NOT NULL,
    `folder_id` bigint(20) UNSIGNED NOT NULL,
    `created_at` datetime NOT NULL,
    PRIMARY KEY (`attachment_id`, `folder_id`),
    KEY `folder_id` (`folder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Media Folder Cache Table
CREATE TABLE `wp_media_folder_cache` (
    `key` varchar(255) NOT NULL,
    `value` longtext NOT NULL,
    `expiry` datetime NOT NULL,
    PRIMARY KEY (`key`),
    KEY `expiry` (`expiry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Phase 2: Core Functionality (3 weeks)

#### Media Management Implementation
```php
namespace MediaFolders\Core;

class MediaHandler {
    private $cache;
    private $db;
    
    public function __construct(CacheInterface $cache, DatabaseInterface $db) {
        $this->cache = $cache;
        $this->db = $db;
    }
    
    public function getMediaItems(array $args): array {
        $cacheKey = 'media_items_' . md5(serialize($args));
        
        return $this->cache->remember($cacheKey, 3600, function() use ($args) {
            return $this->db->getMediaItems($args);
        });
    }
}
```

#### Image Indexing System
- Async indexing using WordPress cron
- Batch processing (50 images per batch)
- Progress tracking and status updates
- Index table optimization

### Phase 3: Admin Interface (2 weeks)

#### Modern JavaScript Implementation
```typescript
// MediaManager.tsx
import { useState, useEffect } from '@wordpress/element';
import { useSelect } from '@wordpress/data';
import { MediaFolder } from './components';
import { createCache } from './utils/cache';

const mediaCache = createCache({
    maxAge: 5 * 60 * 1000 // 5 minutes
});

export const MediaManager: React.FC = () => {
    const [folders, setFolders] = useState([]);
    const [loading, setLoading] = useState(true);

    // Implementation using WordPress data layer
    const mediaItems = useSelect(select => 
        select('core').getMediaItems()
    );

    // ... rest of implementation
};
```

### Phase 4: Performance Optimization (2 weeks)

#### Caching Implementation
```php
namespace MediaFolders\Cache;

class MediaCache implements CacheInterface {
    public function remember(string $key, int $ttl, callable $callback) {
        $cached = wp_cache_get($key, 'media-folders');
        
        if (false !== $cached) {
            return $cached;
        }
        
        $value = $callback();
        wp_cache_set($key, $value, 'media-folders', $ttl);
        
        return $value;
    }
}
```

### Phase 5: Testing & Documentation (1 week)

#### Testing Suite Structure
```
tests/
├── Unit/
│   ├── MediaHandlerTest.php
│   ├── CacheTest.php
│   └── DatabaseTest.php
├── Integration/
│   ├── WordPressIntegrationTest.php
│   └── AdminInterfaceTest.php
└── E2E/
    └── AdminFlowTest.php
```

## Implementation Timeline

1. **Week 1-2: Foundation**
   - Project structure setup
   - Database schema implementation
   - Basic plugin architecture

2. **Week 3-5: Core Functionality**
   - Media handling implementation
   - Image indexing system
   - Basic caching layer

3. **Week 6-7: Admin Interface**
   - React-based admin UI
   - Asset optimization
   - WordPress integration

4. **Week 8-9: Performance**
   - Query optimization
   - Caching implementation
   - Performance testing

5. **Week 10: Testing & Documentation**
   - Testing suite implementation
   - Documentation
   - Final optimizations

## Technical Specifications

### Backend Requirements
- PHP 7.4+
- WordPress 6.5+
- MySQL 5.7+ or MariaDB 10.3+
- PHP Memory Limit: 256M minimum

### Frontend Requirements
- Node.js 16+
- React 18+
- TypeScript 4.5+
- @wordpress/scripts 19+

### Performance Goals
- Admin page load time: < 2 seconds
- Media query response time: < 500ms
- Image indexing rate: 100 images/minute
- Memory usage: < 128MB peak

## Development Guidelines

### Coding Standards
- PSR-12 for PHP
- WordPress Coding Standards
- ESLint with @wordpress/eslint-plugin
- Prettier for JavaScript/TypeScript

### Version Control
- Feature branches
- Semantic versioning
- Conventional commits

### Testing Requirements
- 80% code coverage minimum
- E2E tests for critical paths
- Performance benchmarks
- WordPress integration tests

## Maintenance Plan

### Regular Maintenance
- Weekly performance monitoring
- Monthly dependency updates
- Quarterly security audits

### Monitoring
- Query performance logging
- Error tracking
- Usage statistics
- Performance metrics

---

**Note:** This document should be updated as the project progresses. All architectural decisions should be documented as ADRs (Architecture Decision Records) in the project repository.

Created by Copilot for dpitchford1
Last Updated: 2025-04-19 14:34:15 UTC
````

## File: docs/DEVELOPMENT.md
````markdown
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
````

## File: docs/docs_README.md
````markdown
# Media Folders Plugin Documentation

> Last Updated: 2025-04-19 14:45:09 UTC  
> Maintainer: [@dpitchford1](https://github.com/dpitchford1)

## Documentation Structure

```
docs/
├── rebuild/           # Rebuild project documentation
│   └── MEDIA-FOLDERS-REBUILD-PLAN.md
├── architecture/      # Architecture decisions and design documents
└── README.md         # This file
```

## Quick Links

- [Rebuild Plan](./rebuild/MEDIA-FOLDERS-REBUILD-PLAN.md) - Comprehensive plan for rebuilding the plugin
- [Architecture](./architecture/) - Architecture decisions and technical specifications

## Documentation Guidelines

1. **File Organization**
   - Use appropriate subdirectories for different types of documentation
   - Keep filenames descriptive and use kebab-case
   - Include date and author information in documents

2. **Content Structure**
   - Start each document with a clear title and description
   - Include a table of contents for longer documents
   - Use proper Markdown formatting
   - Include code examples where relevant

3. **Maintenance**
   - Update documentation when making significant changes
   - Review documentation quarterly
   - Keep timestamps current
   - Mark outdated documentation appropriately

## Contributing

When adding or updating documentation:

1. Create a new branch for documentation changes
2. Follow the existing formatting and structure
3. Update the timestamp and author information
4. Submit a pull request for review

## Version Control

Documentation versions follow the main plugin's versioning. Major changes to implementation should be reflected in documentation updates.

---

For questions or suggestions about documentation, please open an issue in the repository.
````

## File: docs/wordpress-plugin-dev-summary.md
````markdown
# WordPress Plugin Development Workflow Summary

## **The Issue at Hand**
You are currently developing a WordPress plugin using a modern build system (`webpack`, `package.json`, `wp-scripts`, `node/npm tasks`) and working outside of a WordPress instance. Your workflow involves:
- Building the plugin.
- Porting it to a WordPress instance for testing (which takes ~10 minutes per iteration).
- Repeating this process for every feature or bug fix.

This workflow is time-consuming and inefficient, especially for iterative development. You are seeking a way to simplify and streamline the process, ideally developing in a live environment with hot reloading.

You are also at a critical decision point:
- The plugin is still early in development, and its history (mostly project setup and architecture) isn’t crucial at this stage.
- However, future development may require preserving history if the plugin becomes a standalone project or is reused elsewhere.

---

## **Options for Simplifying the Workflow**

### **Option 1: Develop the Plugin Within a WordPress Theme**
- Move the plugin code into an active WordPress theme’s directory (e.g., `wp-content/themes/your-theme/plugin-code`).
- Integrate it into the theme’s `functions.php` and use hot reloading for live development.
- Treat the plugin as part of the theme during development.

### **Option 2: Keep the Plugin Standalone but Symlink It**
- Keep the plugin in its own repository.
- Use a symbolic link (symlink) to link the plugin directory to the `wp-content/plugins` folder of a local WordPress installation.
- Develop the plugin as a standalone project while benefiting from a live WordPress environment.

### **Option 3: Merge the Plugin Repository Into the Theme Repository**
- Merge the plugin’s repository into the theme’s repository, preserving its history.
- Move the plugin code into the theme’s directory structure.
- Develop the plugin as part of the theme while keeping its history intact.

### **Option 4: Copy the Plugin Without Preserving History**
- Simply copy the plugin code into the theme’s directory (without copying the `.git` folder).
- Start fresh in the theme’s repository, without merging or preserving the plugin’s history.

### **Option 5: Use Git Submodules**
- Add the plugin repository as a Git submodule in the theme repository.
- Keep the plugin’s history intact while maintaining a clear separation between the theme and plugin.

---

## **Cost / Benefit Analysis of Each Option**

### **Option 1: Develop Within a Theme**
- **Cost**: Minimal setup; requires integrating the plugin into the theme.
- **Benefit**: Simplifies development with hot reloading and eliminates the need for porting.

### **Option 2: Keep Standalone but Symlink**
- **Cost**: Requires symlink setup and possibly minor adjustments for paths in the plugin code.
- **Benefit**: Preserves the plugin’s independence while enabling live development in WordPress.

### **Option 3: Merge Repositories**
- **Cost**: Requires merging histories; may result in a cluttered Git history.
- **Benefit**: Retains plugin history and integrates it into the theme for streamlined development.

### **Option 4: Copy Without Preserving History**
- **Cost**: Loses plugin history (but the original repository can serve as a backup).
- **Benefit**: Simple and quick; ideal if history isn’t critical at this stage.

### **Option 5: Use Submodules**
- **Cost**: Slightly more complex workflow; additional steps to manage submodules.
- **Benefit**: Keeps plugin and theme repositories separate while maintaining history.

---

## **Pros and Cons of Each Option**

### **Option 1: Develop Within a Theme**
- **Pros**:
  - Simplifies development (hot reloading enabled).
  - Easy setup for testing in a live WordPress environment.
  - No need to port code between projects.
- **Cons**:
  - Tight coupling between plugin and theme.
  - May complicate future separation of the plugin from the theme.

### **Option 2: Keep Standalone but Symlink**
- **Pros**:
  - Preserves the plugin’s modularity and independence.
  - Allows live development without porting.
  - Compatible with hot reloading.
- **Cons**:
  - Requires symlink setup.
  - Paths in plugin code may need adjustment (e.g., file includes).

### **Option 3: Merge Repositories**
- **Pros**:
  - Retains plugin history for future traceability.
  - Integrates the plugin into the theme for streamlined development.
- **Cons**:
  - Merging histories can be complex.
  - Clutters the theme repository with plugin-specific commits.
  - Tight coupling between plugin and theme.

### **Option 4: Copy Without Preserving History**
- **Pros**:
  - Clean slate for plugin development.
  - Simple and quick to implement.
  - Ideal for early-stage projects with minimal history.
- **Cons**:
  - Loses plugin history (setup, architecture decisions, etc.).
  - May complicate future reuse or extraction of the plugin.

### **Option 5: Use Submodules**
- **Pros**:
  - Keeps plugin and theme repositories independent.
  - Retains plugin history while allowing integration into the theme.
  - Easier to update or replace the plugin in the future.
- **Cons**:
  - More complex than other options.
  - Requires managing submodule references and updates.

---

## **Final Thoughts**
The decision ultimately depends on your priorities:
1. **Short-Term Simplicity**: Options 1 and 4 are the easiest to implement now but may require more effort later to separate the plugin.
2. **Long-Term Flexibility**: Options 2, 3, and 5 preserve the plugin’s modularity and history, making it easier to scale or reuse in the future.

If you expect the plugin to grow in complexity or be reused in other projects, **Option 2 (symlink)** or **Option 5 (submodules)** offers the best balance of flexibility and streamlined development.

Take time to evaluate your goals, and feel free to revisit this document as a reference when making your decision.
````

## File: Old Plugin/includes/attachments.php
````php
/**
	 * Report whether a string (`$str`) begins with another (`$prefix`).
	 *
	 * @param string $str String to check.
	 * @param string $prefix
	 * @param boolean (optional) $insensitive if TRUE, comparison is case insensitive.
	 *
	 * @returns boolean
	 */
function str_begins_with($str, $prefix, $insensitive=FALSE) {
⋮----
# TRUE iff both strings are empty
⋮----
/* Should this function throw exceptions to distinguish "no record of attachment file" from "file doesn't exist" and "file can't be an attachment"? It would be useful when this function is being used as `attachment_exists()`. */
/**
	 * If a given file is an attachment, return its post ID.
	 *
	 * @param string $pathname Path to file, absolute or relative (to uploads dir, content dir, home, ...)
	 *
	 * @returns int|NULL
	 */
function get_file_attachment_id($pathname) {
⋮----
// first, determine full path
⋮----
// assume $pathname is relative; try each directory in uploads path as a path prefix
⋮----
// file doesn't exist
⋮----
// second, ensure file lives in uploads & get path relative to uploads
⋮----
// $pathname isn't an upload
⋮----
// third, look up file in database
⋮----
$query = $wpdb->prepare($stmt, $subpath);
$id = $wpdb->get_var($query);
````

## File: Old Plugin/includes/maxgalleria-media-library-hooks.php
````php

````

## File: Old Plugin/includes/media-folders.php
````php
<?php echo $this->display_mlfp_header() ?>
⋮----
//Get the active tab from the $_GET param
⋮----
<?php $this->media_library(); ?>
````

## File: Old Plugin/includes/media-library.php
````php
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
$this->activate();
⋮----
//$disable_ft = get_user_meta( $current_user->ID, MAXGALLERIA_MLP_DISABLE_FT, true );
⋮----
$current_folder = $this->get_folder_name($current_folder_id);
⋮----
$current_folder_id = $this->fetch_uploads_folder_id();
⋮----
$current_folder = $this->lookup_uploads_folder_name($current_folder_id);
⋮----
//$folder_location = $this->get_folder_path($current_folder_id);
⋮----
$parents = $this->get_parents($current_folder_id);
⋮----
<?php $this->display_folder_contents ($current_folder_id); ?>
⋮----
$gallery_list = $this->get_maxgalleria_galleries();
````

## File: Old Plugin/includes/mlf-image-seo.php
````php
<?php echo $this->display_mlfp_header() ?>
````

## File: Old Plugin/includes/mlf-settings.php
````php
<?php echo $this->display_mlfp_header() ?>
⋮----
//Get the active tab from the $_GET param
⋮----
$this->bda_help();
⋮----
$this->block_access_settings();
⋮----
$this->mlpp_settings();
````

## File: Old Plugin/includes/mlf-support-articles.php
````php

````

## File: Old Plugin/includes/mlf-support-sys-info.php
````php
$browser = $this->get_browser();
⋮----
$mysql_version = $wpdb->db_version();
⋮----
- <?php echo esc_html($theme->get('Name')) ?> <?php echo esc_html($theme->get('Version') . "\n"); ?>
<?php echo esc_html($theme->get('ThemeURI') . "\n"); ?>
⋮----
// Only show active plugins
````

## File: Old Plugin/includes/mlf-support-tips.php
````php

````

## File: Old Plugin/includes/mlf-support.php
````php
<?php echo $this->display_mlfp_header() ?>
⋮----
//Get the active tab from the $_GET param
⋮----
$this->support_articles();
⋮----
$this->support_sys_info();
⋮----
$this->support_tips();
````

## File: Old Plugin/includes/mlf-thumbnails.php
````php
<?php echo $this->display_mlfp_header() ?>
⋮----
// If the button was clicked
⋮----
// Capability check
⋮----
// Form nonce check
⋮----
// Create the list of image IDs
⋮----
if ( ! $images = $wpdb->get_results( "SELECT ID FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type LIKE 'image/%' ORDER BY ID DESC" ) ) {
⋮----
// Generate the list of IDs
⋮----
$('#regenthumbs-stop').val("<?php echo $this->esc_quotes( esc_html__( 'Stopping...', 'maxgalleria-media-library' ) ); ?>");
⋮----
// No button click? Display the form.
⋮----
} // End if button
````

## File: Old Plugin/includes/mlfp-bda-options.php
````php
<?php $ip_addresses = $this->get_blocked_ips(); ?>
⋮----
<?php $pages = $this->get_all_pages() ?>
````

## File: Old Plugin/js/jstree/LICENSE-MIT
````
Copyright (c) 2014 Ivan Bozhanov

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
````

## File: Old Plugin/js/select2/LICENSE.md
````markdown
The MIT License (MIT)

Copyright (c) 2012-2017 Kevin Brown, Igor Vaynberg, and Select2 contributors

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
````

## File: Old Plugin/languages/maxgalleria-media-library-da_DK.po
````
msgid ""
msgstr ""
"Project-Id-Version: maxgalleria-media-library\n"
"POT-Creation-Date: 2017-07-05 14:31+0200\n"
"PO-Revision-Date: 2018-02-03 10:26+0000\n"
"Language-Team: Danish\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Loco - https://localise.biz/\n"
"X-Poedit-Basepath: .\n"
"Plural-Forms: nplurals=2; plural=n != 1\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"Last-Translator: Humorguden <humorguden@humorhimlen.dk>\n"
"Language: da-DK\n"
"X-Poedit-SearchPath-0: ..\n"
"Report-Msgid-Bugs-To: "

#: ../maxgalleria-media-library.php:430 ../maxgalleria-media-library.php:1341
#: ../maxgalleria-media-library.php:1396 ../maxgalleria-media-library.php:1425
#: ../maxgalleria-media-library.php:1444 ../maxgalleria-media-library.php:2073
#: ../maxgalleria-media-library.php:2245 ../maxgalleria-media-library.php:2358
#: ../maxgalleria-media-library.php:2607 ../maxgalleria-media-library.php:2691
#: ../maxgalleria-media-library.php:2862 ../maxgalleria-media-library.php:2990
#: ../maxgalleria-media-library.php:3018 ../maxgalleria-media-library.php:3307
#: ../maxgalleria-media-library.php:3504 ../maxgalleria-media-library.php:3729
#: ../maxgalleria-media-library.php:3742 ../maxgalleria-media-library.php:4155
#: ../maxgalleria-media-library.php:4404
msgid "missing nonce!"
msgstr "mangler nonce!"

#: ../maxgalleria-media-library.php:738 ../maxgalleria-media-library.php:866
msgid "Media Library Folders"
msgstr "Media Library Folders"

#: ../maxgalleria-media-library.php:741
msgid "Check For New Folders"
msgstr "Check for nye mapper"

#: ../maxgalleria-media-library.php:744
msgid "Upgrade to Pro"
msgstr "Opgrader til Pro"

#: ../maxgalleria-media-library.php:745 ../maxgalleria-media-library.php:981
#: ../maxgalleria-media-library.php:3809
msgid "Regenerate Thumbnails"
msgstr "Regenerere miniaturebilleder"

#: ../maxgalleria-media-library.php:746 ../maxgalleria-media-library.php:4080
msgid "Image SEO"
msgstr "Billede SEO"

#: ../maxgalleria-media-library.php:747
msgid "Support"
msgstr "Support"

#: ../maxgalleria-media-library.php:872 ../maxgalleria-media-library.php:3814
#: ../maxgalleria-media-library.php:4085 ../maxgalleria-media-library.php:4293
msgid "Makers of"
msgstr "producenter af"

#: ../maxgalleria-media-library.php:872 ../maxgalleria-media-library.php:3814
#: ../maxgalleria-media-library.php:4085 ../maxgalleria-media-library.php:4293
msgid "and"
msgstr "og"

#: ../maxgalleria-media-library.php:874 ../maxgalleria-media-library.php:3816
#: ../maxgalleria-media-library.php:4087 ../maxgalleria-media-library.php:4295
msgid "Need help? Click here for"
msgstr "Brug for hjælp? Klik her for"

#: ../maxgalleria-media-library.php:874 ../maxgalleria-media-library.php:3816
#: ../maxgalleria-media-library.php:4087 ../maxgalleria-media-library.php:4295
msgid "Awesome Support!"
msgstr "Awesome Support!"

#: ../maxgalleria-media-library.php:875 ../maxgalleria-media-library.php:3817
#: ../maxgalleria-media-library.php:4088 ../maxgalleria-media-library.php:4296
msgid "Or Email Us at"
msgstr "Eller mail os på"

#: ../maxgalleria-media-library.php:880
msgid "Click here to learn about the Media Library Folders Pro"
msgstr "Klik her for at lære om Media Library Folders Pro"

#: ../maxgalleria-media-library.php:892
msgid "Current PHP version, "
msgstr "Nuværende PHP-version,"

#: ../maxgalleria-media-library.php:892
msgid ", is outdated. Please upgrade to version 5.6."
msgstr ", er forældet. Opgrader venligst til version 5.6."

#: ../maxgalleria-media-library.php:912 ../maxgalleria-media-library.php:1298
msgid "Location:"
msgstr "Sted:"

#: ../maxgalleria-media-library.php:926
msgid "Upload new files."
msgstr "Upload nye filer."

#: ../maxgalleria-media-library.php:926
msgid "Add File"
msgstr "Tilføj fil"

#: ../maxgalleria-media-library.php:928
msgid ""
"Create a new folder. Type in a folder name (do not use spaces, single or "
"double quote marks) and click Create Folder."
msgstr ""
"Opret en ny mappe. Indtast et mappenavn (brug ikke mellemrum, enkelt eller "
"dobbelt citat) og klik på Opret mappe."

#: ../maxgalleria-media-library.php:928
msgid "Add Folder"
msgstr "Tilføj mappe"

#: ../maxgalleria-media-library.php:937
msgid ""
"When moving/copying to a new folder place your pointer, not the image, on "
"the folder where you want the file(s) to go."
msgstr ""
"Når du flytter / kopierer til en ny mappe, skal du placere din pointer, ikke "
"billedet, i den mappe, hvor du vil have filen / filerne."

#: ../maxgalleria-media-library.php:938
msgid ""
"To drag multiple images, check the box under the files you want to move and "
"then drag one of the images to the desired folder."
msgstr ""
"Hvis du vil trække flere billeder, skal du markere feltet under de filer, du "
"vil flytte, og træk derefter et af billederne til den ønskede mappe."

#: ../maxgalleria-media-library.php:939
msgid ""
"To move/copy to a folder nested under the top level folder click the "
"triangle to the left of the folder to show the nested folder that is your "
"target."
msgstr ""
"Hvis du vil flytte / kopiere til en mappe, der er nestet under øverste "
"niveau, skal du klikke på trekanten til venstre for mappen for at vise den "
"nestede mappe, der er dit mål."

#: ../maxgalleria-media-library.php:940
msgid ""
"To delete a folder, right click on the folder and a popup menu will appear. "
"Click on the option, \"Delete this folder?\" If the folder is empty, it will "
"be deleted."
msgstr ""
"For at slette en mappe skal du højreklikke på mappen og en pop op-menu vises."
" Klik på indstillingen \"Slet denne mappe?\" Hvis mappen er tom, slettes den."

#: ../maxgalleria-media-library.php:941
msgid ""
"To hide a folder and all its sub folders and files, right click on a folder, "
"On the popup menu that appears, click \"Hide this folder?\" and those "
"folders and files will be removed from the Media Library, but not from the "
"server."
msgstr ""
"For at skjule en mappe og alle dens undermapper og filer skal du højreklikke "
"på en mappe. På den pop op-menu, der vises, skal du klikke på \"Skjul denne "
"mappe?\" og disse mapper og filer fjernes fra mediebiblioteket, men ikke fra "
"serveren."

#: ../maxgalleria-media-library.php:942
msgid ""
"If you click on an image and end up in WordPress Media Library please "
"backclick two times to return to MLP"
msgstr ""
"Hvis du klikker på et billede og ender i WordPress Media Library, skal du "
"vende tilbage to gange for at vende tilbage til MLP"

#: ../maxgalleria-media-library.php:953
msgid ""
"Move/Copy Toggle. Move or copy selected files to a different folder. When "
"move is selected, images links in posts and pages will be updated. <span "
"class='mlp-warning'>Images IDs used in Jetpack Gallery shortcodes will not "
"be updated.</span>"
msgstr ""
"Flyt / Kopier Toggle. Flyt eller kopier valgte filer til en anden mappe. Når "
"flyt er valgt, opdateres billeder i indlæg og sider. <span class = 'mlp-"
"warning'> Billeder ID'er, der bruges i Jetpack Gallery-kortkoder, opdateres "
"ikke. </ span>"

#: ../maxgalleria-media-library.php:962
msgid ""
"Rename a file; select only one file. Folders cannot be renamed. Type in a "
"new name with no spaces and without the extention and click Rename."
msgstr ""
"Omdøb en fil; vælg kun en fil. Mapper kan ikke omdøbes. Indtast et nyt navn "
"uden mellemrum og uden udvidelsen, og klik på Omdøb."

#: ../maxgalleria-media-library.php:962 ../maxgalleria-media-library.php:1021
msgid "Rename"
msgstr "Omdøb"

#: ../maxgalleria-media-library.php:964
msgid "Delete selected files."
msgstr "Slet valgte filer."

#: ../maxgalleria-media-library.php:964
msgid "Delete"
msgstr "Slet"

#: ../maxgalleria-media-library.php:966
msgid "Select or unselect all files in the folder."
msgstr "Vælg eller fravælg alle filer i mappen."

#: ../maxgalleria-media-library.php:966
msgid "Select/Unselect All"
msgstr "Vælg / Fravælg alle"

#: ../maxgalleria-media-library.php:969
msgid "Sort by Name"
msgstr "Sorter efter navn"

#: ../maxgalleria-media-library.php:970
msgid "Sort by Date"
msgstr "Sorter efter Dato"

#: ../maxgalleria-media-library.php:977
msgid "Sync the contents of the current folder with the server"
msgstr "Synkroniser indholdet af den aktuelle mappe med serveren"

#: ../maxgalleria-media-library.php:977
msgid "Sync"
msgstr "Sync"

#: ../maxgalleria-media-library.php:981
msgid "Regenerates the thumbnails of selected images"
msgstr "Regenererer miniaturebilleder af valgte billeder"

#: ../maxgalleria-media-library.php:984
msgid ""
"Add images to an existing MaxGalleria gallery. Folders can not be added to a "
"gallery. Images already in the gallery will not be added. "
msgstr ""
"Tilføj billeder til et eksisterende MaxGalleria-galleri. Mapper kan ikke "
"føjes til et galleri. Billeder allerede i galleriet vil ikke blive tilføjet."

#: ../maxgalleria-media-library.php:984
msgid "Add to MaxGalleria Gallery"
msgstr "Tilføj til MaxGalleria Gallery"

#: ../maxgalleria-media-library.php:1020
msgid "File Name: "
msgstr "Filnavn:"

#: ../maxgalleria-media-library.php:1056
msgid "Add Images"
msgstr "Tilføj billeder"

#: ../maxgalleria-media-library.php:1067
msgid "Folder Name: "
msgstr "Mappenavn:"

#: ../maxgalleria-media-library.php:1068
msgid "Create Folder"
msgstr "Opret mappe"

#: ../maxgalleria-media-library.php:1645
msgid "You cannot delete the currently open folder."
msgstr "Du kan ikke slette den aktuelt åbne mappe."

#: ../maxgalleria-media-library.php:1686
msgid "You cannot hide the currently open folder."
msgstr "Du kan ikke skjule den aktuelt åbne mappe."

#: ../maxgalleria-media-library.php:1965
msgid "No files were found."
msgstr "Der blev ikke fundet nogen filer."

#: ../maxgalleria-media-library.php:2124
msgid "The folder was created."
msgstr "Mappen blev oprettet."

#: ../maxgalleria-media-library.php:2130
msgid "There was a problem creating the folder."
msgstr "Der opstod et problem med oprettelsen af mappen."

#: ../maxgalleria-media-library.php:2137
msgid "The folder already exists."
msgstr "Mappen eksisterer allerede."

#: ../maxgalleria-media-library.php:2289
msgid "The folder, "
msgstr "Mappen"

#: ../maxgalleria-media-library.php:2289
msgid ", is not empty. Please delete or move files from the folder"
msgstr ", er ikke tom. Fjern eller flyt filer fra mappen"

#: ../maxgalleria-media-library.php:2305 ../maxgalleria-media-library.php:2318
msgid "The folder was deleted."
msgstr "Mappen blev slettet."

#: ../maxgalleria-media-library.php:2307
msgid "The folder could not be deleted."
msgstr "Mappen kunne ikke slettes."

#: ../maxgalleria-media-library.php:2328
msgid "The file(s) were deleted"
msgstr "Den fil (er) blev slettet"

#: ../maxgalleria-media-library.php:2330
msgid "The file(s) were not deleted"
msgstr "Den fil (er) blev ikke slettet"

#: ../maxgalleria-media-library.php:2432
msgid "Unable to copy the file; please check the folder and file permissions."
msgstr "Kan ikke kopiere filen Kontroller mappen og filtilladelserne."

#: ../maxgalleria-media-library.php:2525
msgid "Updating attachment links, please wait..."
msgstr "Opdatering af vedhæftede links, vent venligst ..."

#: ../maxgalleria-media-library.php:2530
msgid ""
"Unable to move the file(s); please check the folder and file permissions."
msgstr "Kan ikke flytte filen / filerne Kontroller mappen og filtilladelserne."

#: ../maxgalleria-media-library.php:2537
msgid "The destination is not a folder: "
msgstr "Destinationen er ikke en mappe:"

#: ../maxgalleria-media-library.php:2543
msgid "Cannot find destination folder: "
msgstr "Kan ikke finde destinationsmappe:"

#: ../maxgalleria-media-library.php:2549
msgid "Coping or moving a folder is not allowed."
msgstr "Det er ikke tilladt at kopiere eller flytte en mappe."

#: ../maxgalleria-media-library.php:2555
msgid "Cannot find the file: "
msgstr "Kan ikke finde filen:"

#: ../maxgalleria-media-library.php:2562
msgid "The file(s) were copied to "
msgstr "Den fil (er) blev kopieret til"

#: ../maxgalleria-media-library.php:2564
msgid "The file(s) were not copied."
msgstr "Den fil (er) blev ikke kopieret."

#: ../maxgalleria-media-library.php:2568
msgid "The file(s) were moved to "
msgstr "The file(s) were moved to "

#: ../maxgalleria-media-library.php:2570
msgid "The file(s) were not moved."
msgstr "Den fil (er) blev ikke flyttet."

#: ../maxgalleria-media-library.php:2680
msgid "The images were added."
msgstr "Billederne blev tilføjet."

#: ../maxgalleria-media-library.php:2732 ../maxgalleria-media-library.php:2832
msgid "No files were found matching that name."
msgstr "Der blev ikke fundet nogen filer, der matchede det pågældende navn."

#: ../maxgalleria-media-library.php:2979
msgid "Updating attachment links, please wait...The file was renamed"
msgstr "Opdatering af vedhæftede links, vent venligst ... Filen blev omdøbt"

#: ../maxgalleria-media-library.php:3002
msgid "Sorting by date."
msgstr "Sortering efter dato."

#: ../maxgalleria-media-library.php:3006
msgid "Sorting by name."
msgstr "Sortering efter navn."

#: ../maxgalleria-media-library.php:3060
msgid "Scaning for new folders in "
msgstr "Scanning efter nye mapper i"

#: ../maxgalleria-media-library.php:3087 ../maxgalleria-media-library.php:3115
#: ../maxgalleria-media-library.php:3136 ../maxgalleria-media-library.php:3171
msgid "Adding"
msgstr "Tilføjelse af"

#: ../maxgalleria-media-library.php:3149
msgid "No new folders were found."
msgstr "Der blev ikke fundet nye mapper."

#: ../maxgalleria-media-library.php:3268
msgid "Rate us Please!"
msgstr "Bedøm os venligst!"

#: ../maxgalleria-media-library.php:3269
msgid ""
"Your rating is the simplest way to support Media Library Folders. We really "
"appreciate it!"
msgstr ""
"Din vurdering er den enkleste måde at støtte mediebibliotek mapper. Vi "
"sætter pris på det!"

#: ../maxgalleria-media-library.php:3272
msgid "I've already left a review"
msgstr "Jeg har allerede forladt en anmeldelse"

#: ../maxgalleria-media-library.php:3273
msgid "Maybe Later"
msgstr "Måske senere"

#: ../maxgalleria-media-library.php:3274
msgid "Sure! I'd love to!"
msgstr "Jo da! Jeg ville meget gerne!"

#: ../maxgalleria-media-library.php:3775
msgid "Error: "
msgstr "Fejl:"

#: ../maxgalleria-media-library.php:3779
msgid "Unknown error with "
msgstr "Ukendt fejl med"

#: ../maxgalleria-media-library.php:3830
msgid "Cheatin&#8217; uh?"
msgstr "Cheatin&#8217; uh?"

#: ../maxgalleria-media-library.php:3841
#, php-format
msgid "Unable to find any images. Are you sure <a href='%s'>some exist</a>?"
msgstr ""
"Kunne ikke finde nogen billeder. Er du sikker på, at <a href='%s'> nogle "
"findes </a>?"

#: ../maxgalleria-media-library.php:3852
msgid ""
"Please wait while the thumbnails are regenerated. This may take a while."
msgstr ""
"Vent venligst mens miniaturerne regenereres. Det kan tage et stykke tid."

#: ../maxgalleria-media-library.php:3856
#, php-format
msgid "To go back to the previous page, <a href=\"%s\">click here</a>."
msgstr "For at gå tilbage til forrige side, <a href=\"%s\"> klik her </a>."

#: ../maxgalleria-media-library.php:3857
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a "
"href=\"%4$s\">click here</a>. %5$s"
msgstr ""
"Helt færdig! %1$s billede (er) blev ændret med succes i %2$s sekunder, og "
"der var fejl i%3$s . For at prøve at genoprette de fejlede billeder igen, <a "
"href=\"%4$s\"> klik her </a>. %5$s"

#: ../maxgalleria-media-library.php:3858
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""
"Helt færdig! %1$s billede (er) blev ændret med succes i %2$s sekunder, og "
"der var 0 fejl. %3$s"

#: ../maxgalleria-media-library.php:3862 ../maxgalleria-media-library.php:4008
msgid "You must enable Javascript in order to proceed!"
msgstr "Du skal aktivere Javascript for at kunne fortsætte!"

#: ../maxgalleria-media-library.php:3868
msgid "Abort Resizing Images"
msgstr "Afbryd ændring af billedstørrelser"

#: ../maxgalleria-media-library.php:3870
msgid "Debugging Information"
msgstr "Debugging Information"

#: ../maxgalleria-media-library.php:3873
#, php-format
msgid "Total Images: %s"
msgstr "Total Billeder: %s"

#: ../maxgalleria-media-library.php:3874
#, php-format
msgid "Images Resized: %s"
msgstr "Billeder ændret: %s"

#: ../maxgalleria-media-library.php:3875
#, php-format
msgid "Resize Failures: %s"
msgstr "RÆndre størrelsesfejl: %s"

#: ../maxgalleria-media-library.php:3906
msgid "Stopping..."
msgstr "Stopper ..."

#: ../maxgalleria-media-library.php:3958
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""
"Forstørrelsesforespørgslen blev afbrudt abnormt (ID %s). Dette skyldes "
"sandsynligvis billedet, der overskrider ledig hukommelse eller en anden form "
"for dødelig fejl."

#: ../maxgalleria-media-library.php:4001
msgid ""
"Click the button below to regenerate thumbnails for all images in the Media "
"Library. This is helpful if you have added new thumbnail sizes to your site. "
"Existing thumbnails will not be removed to prevent breaking any links."
msgstr ""
"Klik på knappen nedenfor for at regenerere miniaturebilleder for alle "
"billeder i mediebiblioteket. Dette er nyttigt, hvis du har tilføjet nye "
"miniaturebilleder til dit websted. Eksisterende miniaturebilleder fjernes "
"ikke for at forhindre brud på nogen links."

#: ../maxgalleria-media-library.php:4003
msgid ""
"You can regenerate thumbnails for individual images from the Media Library "
"Folders page by checking the box below one or more images and clicking the "
"Regenerate Thumbnails button. The regenerate operation is not reversible but "
"you can always generate the sizes you need by adding additional thumbnail "
"sizes to your theme."
msgstr ""
"Du kan regenerere miniaturebilleder til individuelle billeder fra Media "
"Library Folders-siden ved at markere feltet under et eller flere billeder og "
"klikke på knappen Regenerere miniaturebilleder. Regenereringsoperationen er "
"ikke reversibel, men du kan altid generere de størrelser du har brug for ved "
"at tilføje yderligere miniaturestørrelser til dit tema."

#: ../maxgalleria-media-library.php:4006
msgid "Regenerate All Thumbnails"
msgstr "Regenerere alle miniaturebilleder"

#: ../maxgalleria-media-library.php:4032
#, php-format
msgid "Failed resize: %s is an invalid image ID."
msgstr "Mislykket størrelse: %s er et ugyldigt billed-id."

#: ../maxgalleria-media-library.php:4035
msgid "Your user account doesn't have permission to resize images"
msgstr "Din brugerkonto har ikke tilladelse til at ændre størrelse på billeder"

#: ../maxgalleria-media-library.php:4040
#, php-format
msgid "The originally uploaded image file cannot be found at %s"
msgstr "Den oprindeligt uploadede billedfil kan ikke findes på %s"

#: ../maxgalleria-media-library.php:4049
msgid "Unknown failure reason."
msgstr "Ukendt fejlårsag."

#: ../maxgalleria-media-library.php:4054
#, php-format
msgid "&quot;%1$s&quot; (ID %2$s) was successfully resized in %3$s seconds."
msgstr "&quot;%1$s&quot; (ID %2$s) blev ændret med succes på %3$s sekunder."

#: ../maxgalleria-media-library.php:4060
#, php-format
msgid ""
"&quot;%1$s&quot; (ID %2$s) failed to resize. The error message was: %3$s"
msgstr ""
"&quot;%1$s&quot; (ID %2$s) mislykkedes at ændre størrelse. Fejlmeddelelsen "
"var: %3$s"

#: ../maxgalleria-media-library.php:4095
msgid ""
"When Image SEO is enabled Media Library Folders automatically adds  ALT and "
"Title attributes with the default settings defined below to all your images "
"as they are uploaded."
msgstr ""
"Når Image SEO er aktiveret Media Library Mapper tilføjer automatisk ALT og "
"Title attributter med de standardindstillinger, der er defineret nedenfor, "
"til alle dine billeder, som de uploades."

#: ../maxgalleria-media-library.php:4096
msgid ""
"You can easily override the Image SEO default settings when you  are "
"uploading new images. When Image SEO is enabled you will see two fields  "
"under the Upload Box when you add a file - Image Title Text and Image ALT "
"Text.  Whatever you type into these fields overrides the default settings "
"for the  current upload or sync operations."
msgstr ""
"Du kan nemt tilsidesætte standardindstillingerne for Image SEO, når du "
"uploader nye billeder. Når Image SEO er aktiveret, vil du se to felter under "
"Upload Box, når du tilføjer en fil - Image Title Text og Image ALT Text. "
"Uanset hvad du skriver i disse felter, tilsidesætter standardindstillingerne "
"for de aktuelle upload- eller synkroniseringsoperationer."

#: ../maxgalleria-media-library.php:4097
msgid ""
"To change the settings on an individual image simply click on  the image and "
"change the settings on the far right.  Save and then back click to return to "
"Media  Library Plus or MLPP."
msgstr ""
"For at ændre indstillingerne på et enkelt billede skal du blot klikke på "
"billedet og ændre indstillingerne helt til højre. Gem og klik derefter "
"tilbage for at vende tilbage til Media Library Plus eller MLPP."

#: ../maxgalleria-media-library.php:4098
msgid "Image SEO supports two special tags:"
msgstr "Billede SEO understøtter to specielle tags:"

#: ../maxgalleria-media-library.php:4099
#, php-format
msgid "%filename - replaces image file name ( without extension )"
msgstr "%filename - erstatter billedfilnavn (uden udvidelse)"

#: ../maxgalleria-media-library.php:4100
#, php-format
msgid "%foldername - replaces image folder name"
msgstr "%foldername  - erstatter navnet på billedmappen"

#: ../maxgalleria-media-library.php:4116
msgid "Settings"
msgstr "Indstillinger"

#: ../maxgalleria-media-library.php:4121
msgid "Turn on Image SEO:"
msgstr "Aktivér Billede SEO:"

#: ../maxgalleria-media-library.php:4126
msgid "Image ALT attribute:"
msgstr "Billede ALT attribut:"

#: ../maxgalleria-media-library.php:4128 ../maxgalleria-media-library.php:4133
msgid "example"
msgstr "eksempel"

#: ../maxgalleria-media-library.php:4131
msgid "Image Title attribute:"
msgstr "Egenskab for billedtitel:"

#: ../maxgalleria-media-library.php:4136
msgid "Update Settings"
msgstr "Opdater indstillinger"

#: ../maxgalleria-media-library.php:4179
msgid "The Image SEO setting have been updated "
msgstr "Indstillingen Billede SEO er blevet opdateret"

#: ../maxgalleria-media-library.php:4288
msgid "Support - System Information"
msgstr "Support - Systemoplysninger"

#: ../maxgalleria-media-library.php:4302
msgid ""
"You may be asked to provide the information below to help troubleshoot your "
"issue."
msgstr ""
"Du bliver muligvis bedt om at give nedenstående oplysninger for at hjælpe "
"med at fejre dit problem."

#: ../maxgalleria-media-library.php:4438
msgid "The selected folder, subfolders and thier files have been hidden."
msgstr "Den valgte mappe, undermapper og deres filer er blevet skjult."
````

## File: Old Plugin/languages/maxgalleria-media-library-es_ES.po
````
msgid ""
msgstr ""
"Project-Id-Version: maxgalleria-media-library\n"
"POT-Creation-Date: 2018-05-16 10:09-0400\n"
"PO-Revision-Date: 2019-12-24 10:20-0300\n"
"Language-Team: \n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Poedit 1.6.9\n"
"X-Poedit-Basepath: .\n"
"Plural-Forms: nplurals=2; plural=(n != 1);\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"Last-Translator: Alan Pasho <apasho@gmail.com>\n"
"Language: es_ES\n"
"X-Poedit-SearchPath-0: ..\n"

#: ../includes/mlf_support.php:14 ../maxgalleria-media-library.php:802
msgid "Support"
msgstr "Soporte"

#: ../includes/mlf_support.php:19 ../maxgalleria-media-library.php:928
#: ../maxgalleria-media-library.php:4046 ../maxgalleria-media-library.php:4317
msgid "Makers of"
msgstr "Fabricantes de"

#: ../includes/mlf_support.php:19 ../maxgalleria-media-library.php:928
#: ../maxgalleria-media-library.php:4046 ../maxgalleria-media-library.php:4317
msgid "and"
msgstr "y"

#: ../includes/mlf_support.php:20 ../maxgalleria-media-library.php:929
#: ../maxgalleria-media-library.php:4047 ../maxgalleria-media-library.php:4318
msgid "Click here to"
msgstr "Haga clic aquí para"

#: ../includes/mlf_support.php:20 ../maxgalleria-media-library.php:929
#: ../maxgalleria-media-library.php:4047 ../maxgalleria-media-library.php:4318
msgid "Fix Common Problems"
msgstr "Solucionar problemas comunes"

#: ../includes/mlf_support.php:21 ../maxgalleria-media-library.php:930
#: ../maxgalleria-media-library.php:4048 ../maxgalleria-media-library.php:4319
msgid "Need help? Click here for"
msgstr "¿Necesita ayuda? Haga clic aquí para"

#: ../includes/mlf_support.php:21 ../maxgalleria-media-library.php:930
#: ../maxgalleria-media-library.php:4048 ../maxgalleria-media-library.php:4319
msgid "Awesome Support!"
msgstr "¡Increíble apoyo!"

#: ../includes/mlf_support.php:22 ../maxgalleria-media-library.php:931
#: ../maxgalleria-media-library.php:4049 ../maxgalleria-media-library.php:4320
msgid "Or Email Us at"
msgstr "O envíenos un correo electrónico"

#: ../includes/mlf_support.php:32
msgid "Troubleshooting Tips"
msgstr "Consejos para solucionar problemas"

#: ../includes/mlf_support.php:33
msgid "Troubleshooting Articles"
msgstr "Artículos de solución de problemas"

#: ../includes/mlf_support.php:34
msgid "System Information</a>"
msgstr "Información del sistema"

#: ../includes/mlf_support.php:40
msgid "Folder Tree Not Loading"
msgstr "El árbol de carpetas no se está cargando"

#: ../includes/mlf_support.php:42
msgid ""
"Usually a Java Script error is displayed when there is a problem loading the "
"folder tree. If this is not the case, then try a different browsers, such as "
"Chrome, as some browsers cannot handle a large number of folders in the "
"folder tree. When there is a Java Script error, users who report this issue "
"can usually fix it by running the Media Library Folders Reset plugin that "
"comes with Media Library Folders"
msgstr ""
"Por lo general, se muestra un error de Java Script cuando hay un problema al "
"cargar el árbol de carpetas. Si este no es el caso, pruebe con otros "
"navegadores, como Chrome, ya que algunos navegadores no pueden manejar una "
"gran cantidad de carpetas en el árbol de carpetas. Cuando hay un error de "
"Java Script, los usuarios que informan sobre este problema generalmente lo "
"pueden arreglar ejecutando el plugin Media Library Folders Reset que "
"acompaña Media Library Folders"

#: ../includes/mlf_support.php:44
msgid ""
"1. First make sure you have installed the latest version of Media Library "
"Folders."
msgstr ""
"1. Primero asegúrate de haber instalado la última versión de Media Library "
"Folders."

#: ../includes/mlf_support.php:45
msgid ""
"2. Deactivate Media Library Folders and activate Media Library Folders Reset "
"and run the Reset Database option from the Media Library Folders Reset sub "
"menu in the dashboard."
msgstr ""
"2. Desactive Media Library Folders y active Media Library Folders Reset y "
"ejecute la opción Restablecer Base de Datos del panel de Media Library "
"Folders Reset."

#: ../includes/mlf_support.php:46
msgid ""
"3. After that, reactivate Media Library Folders. It will do a fresh scan of "
"your media library database and no changes will be made to the files or "
"folders on your site."
msgstr ""
"3. Después de eso, reactive Media Library Folders. Hará un nuevo escaneo de "
"su base de datos de la biblioteca multimedia y no se realizarán cambios en "
"los archivos o carpetas de su sitio."

#: ../includes/mlf_support.php:48
msgid ""
"Note that resetting the folder data is not a cure for all Media Library "
"Folders problems; it is specifically used when the folder tree does not load."
msgstr ""
"Tenga en cuenta que restablecer los datos de Media Library Folders no es "
"remedio para todas las curas, se usa específicamente cuando el árbol de "
"carpetas no se carga."

#: ../includes/mlf_support.php:50
msgid "How to Unhide a Hidden Folder"
msgstr "Cómo mostrar una carpeta oculta"

#: ../includes/mlf_support.php:53
msgid ""
"1. Go to the hidden folder via your cPanel or FTP and remove the file ‘mlpp-"
"hidden"
msgstr ""
"1. Vaya a la carpeta oculta a través de su cPanel o FTP y elimine el archivo "
"'mlpp-hidden"

#: ../includes/mlf_support.php:54
msgid ""
"2. In the Media Library Folders Menu, click the Check for New folders link. "
"This will add the folder back into Media Library Folders."
msgstr ""
"2. En el menú Media Library Folders, haga clic en el enlace Buscar nuevas "
"carpetas. Esto volverá a agregar la carpeta a Media Library Folders."

#: ../includes/mlf_support.php:55
msgid ""
"3. Visit the unhidden folder in Media Library Folders and click the Sync "
"button to add contents of the folder. Before doing this, check to see that "
"there are no thumbnail images in the current folder since these will be "
"regenerated automatically; these usually have file names such as image-"
"name-150×150.jpg, etc."
msgstr ""
"3. Visite la carpeta oculta en  Media Library Folders y haga clic en el "
"botón Sincronizar para agregar el contenido de la carpeta. Antes de hacer "
"esto, verifique que no haya imágenes en miniatura en la carpeta actual, ya "
"que se regenerarán automáticamente; estos generalmente tienen nombres de "
"archivo como image-name-150×150.jpg, etc."

#: ../includes/mlf_support.php:56
msgid "4. Repeat step 3 for each sub folder."
msgstr "4. Repita el paso 3 para cada subcarpeta."

#: ../includes/mlf_support.php:59
msgid ""
"Folders and images added to the site by FTP are not showing up in Media "
"Library Folders"
msgstr ""
"Las carpetas e imágenes agregadas al sitio por FTP no se muestran en Media "
"Library Folders"

#: ../includes/mlf_support.php:61
msgid ""
"Media Library Folders does not work like the file manager on your computer. "
"It only display images and folders that have been added to the Media Library "
"database. To display new folders that have not been added through the Media "
"Library Folders you can click the Check for new folders option in the  Media "
"Library Folders submenu in the Wordpress Dashboard. If you allow Wordpress "
"to store images by year and month folders, then you should click the option "
"once each month to add these auto-generated folders."
msgstr ""
"Media Library Folders no funciona como el administrador de archivos en su "
"computadora. Solo muestra imágenes y carpetas que se han agregado a la base "
"de datos de la Biblioteca multimedia. Para mostrar las carpetas nuevas que "
"no se han agregado a través de Media Library Folders, puede hacer clic en la "
"opción Buscar nuevas carpetas en el submenú Media Library Folders en el "
"Panel de Wordpress. Si permite que Wordpress almacene imágenes por carpetas "
"de año y mes, entonces debe hacer clic en la opción una vez al mes para "
"agregar estas carpetas generadas automáticamente."

#: ../includes/mlf_support.php:63
msgid ""
"To add images that were upload to the site via the cPanel or by FTP, "
"navigate to the folder containing the images in  Media Library Folders and "
"click the Sync button. This will scan the folder looking images not "
"currently found in the Media Library for that folder. The Sync function only "
"scans the current folder. If there are subfolders, you will need to "
"individually sync them."
msgstr ""
"Para agregar imágenes que se cargaron al sitio a través de cPanel o mediante "
"FTP, navegue hasta la carpeta que contiene las imágenes en Media Library "
"Folders y haga clic en el botón Sincronizar. Esto escaneará la carpeta "
"buscando imágenes que actualmente no se encuentran en Media Library Folders "
"para esa carpeta. La función de sincronización solo escanea la carpeta "
"actual. Si hay subcarpetas, deberá sincronizarlas individualmente."

#: ../includes/mlf_support.php:65
msgid "Folders Loads Indefinitely"
msgstr "Carpetas en carga Indefinidamente"

#: ../includes/mlf_support.php:67
msgid ""
"This happens when a parent folder is missing from the folder data. To fix "
"this you will need to perform a reset of the Media Library Folders database. "
"To do this, deactivate Media Library Folders and activate Media Library "
"Folders Reset and select the Reset Database option. Once the reset has "
"completed, reactivate Media Library Folders and it will do a fresh scan of "
"the Media Library data."
msgstr ""
"Esto ocurre cuando falta una carpeta principal de los datos de la carpeta. "
"Para solucionarlo, deberá realizar un restablecimiento de la base de datos "
"de Media Library Folders. Para ello, desactive Media Library Folders y "
"active Media Library Folders Reset y seleccione la opción Restablecer base "
"de datos. Una vez que se haya completado el reinicio, reactive Media Library "
"Folders y realizará un nuevo escaneo de los datos de la Biblioteca de Medios."

#: ../includes/mlf_support.php:69
msgid "Unable to Insert files from Media Library Folders into Posts or Pages"
msgstr ""
"No se pueden insertar archivos de Media Library Folders  en publicaciones o "
"páginas"

#: ../includes/mlf_support.php:71
msgid ""
"For inserting images and files into posts and pages you will have to use the "
"existing Media Library. The ability to insert items from the Media Library "
"Folders user interface is only available in"
msgstr ""
"Para insertar imágenes y archivos en publicaciones y páginas, deberá usar la "
"Biblioteca multimedia existente. La capacidad de insertar elementos desde la "
"interfaz de usuario de Media Library Folders solo está disponible en"

#: ../includes/mlf_support.php:71
msgid ""
"This does not mean you cannot insert files added to Media Library Folders "
"into any Wordpress posts or pages. Media Library Folders adds a folder user "
"interface and file operations to the existing media library and it does not "
"add a second media library. Since all the images are in the same media "
"library there is no obstacle to inserting them anywhere Wordpress allows "
"media files to be inserted. There is just no folder tree available in the "
"media library insert window for locating images in a particular folder. We "
"chose to include the folder tree for inserting images in posts and page in "
"the Pro version along with other features in order to fund the cost of "
"providing free technical support and continued development of the plugin."
msgstr ""
"Esto no significa que no pueda insertar archivos agregados a Media Library "
"Foldersen ninguna publicación o página de Wordpress. Media Library Folders "
"agrega una interfaz de usuario de carpeta y operaciones de archivo a la "
"biblioteca de medios existente y no agrega una segunda biblioteca de medios. "
"Dado que todas las imágenes se encuentran en la misma biblioteca de medios, "
"no hay ningún obstáculo para insertarlas en cualquier lugar. Wordpress "
"permite insertar archivos multimedia. Simplemente no hay ningún árbol de "
"carpetas disponible en la ventana de inserción de la biblioteca de medios "
"para localizar imágenes en una carpeta en particular. Elegimos incluir el "
"árbol de carpetas para insertar imágenes en publicaciones y páginas en la "
"versión Pro junto con otras características para financiar el costo de "
"proporcionar asistencia técnica gratuita y el desarrollo continuo del "
"complemento."

#: ../includes/mlf_support.php:73
msgid "Unable to Update Media Library Folders Reset"
msgstr "No se puede actualizar  Media Library Folders Reset"

#: ../includes/mlf_support.php:75
msgid ""
"Media Library Folders Reset is maintenance and diagnostic plugin that is "
"included with Media Library Folders. It automatically updates when Media "
"Library Folders is updated. There is no need to updated it  separately. "
"Users should leave the reset plugin deactivated until it is needed in order "
"to avoid accidentally deleting your site's folder data."
msgstr ""
"Media Library Folders Reset es el complemento de mantenimiento y diagnóstico "
"que se incluye con Media Library Folders. Se actualiza automáticamente "
"cuando se actualiza Media Library Folders. No es necesario actualizarlo por "
"separado. Los usuarios deben dejar el complemento de restablecimiento "
"desactivado hasta que sea necesario para evitar borrar accidentalmente los "
"datos de la carpeta de su sitio."

#: ../includes/mlf_support.php:77
msgid "Images Not Found After Changing the Location of Uploads Folder"
msgstr ""
"Imágenes no encontradas después de cambiar la ubicación de la carpeta de "
"subidas"

#: ../includes/mlf_support.php:79
msgid ""
"If you change the location of the uploads folder, your existing files and "
"images will not be moved to the new location. You will need to delete them "
"from media library and upload them again. Also you will need to perform a "
"reset of the Media Library Folders database. To do this, deactivate Media "
"Library Folders and activate Media Library Folders Reset and select the "
"Reset Database option. Once the reset has completed, reactivate Media "
"Library Folders and it will do a fresh scan of the Media Library data."
msgstr ""
"Si cambia la ubicación de la carpeta de carga, sus archivos e imágenes "
"existentes no se moverán a la nueva ubicación. Tendrá que eliminarlos de la "
"biblioteca de medios y subirlos de nuevo. También deberá realizar un reset "
"de la base de datos de Media Library Folders. Para ello, desactive Media "
"Library Folders y active Media Library Folders Reset y seleccione la opción "
"Restablecer base de datos. Una vez que se haya completado el reinicio, "
"reactive Media Library Folders y realizará un nuevo escaneo de los datos de "
"la Biblioteca de Medios."

#: ../includes/mlf_support.php:81
msgid "Difficulties Uploading or Dragging and Dropping a Large Number of Files"
msgstr ""
"Dificultades cargando o arrastrando y soltando una gran cantidad de archivos"

#: ../includes/mlf_support.php:83
msgid ""
"There is a limit to the number of files that can be uploaded with dragged "
"and dropped at one time into media library folders. You can either reduce "
"the number of files that your are trying to simultaneously upload or you can "
"try uploading to a folder through the Wordpress Media page."
msgstr ""
"Existe un límite para la cantidad de archivos que se pueden cargar con "
"arrastrar y soltar a la vez en las carpetas de la biblioteca multimedia. "
"Puede reducir la cantidad de archivos que está intentando cargar de forma "
"simultánea o puede intentar cargar en una carpeta a través de la página de "
"Wordpress Media."

#: ../includes/mlf_support.php:85
msgid "How to Delete a Folder?"
msgstr "¿Cómo eliminar una carpeta?"

#: ../includes/mlf_support.php:87
msgid ""
"To delete a folder, right click (Ctrl-click with Macs) on a folder. A popup "
"menu will appear with the options, 'Delete this folder?' and 'Hide this "
"folder?'. Click the delete option."
msgstr ""
"Para eliminar una carpeta, haga clic con el botón derecho (Ctrl-clic con "
"Macs) en una carpeta. Aparecerá un menú emergente con las opciones, "
"'¿Eliminar esta carpeta?' y '¿Ocultar esta carpeta?'. Haga clic en la opción "
"Eliminar."

#: ../includes/mlf_support.php:89
msgid "Fatal error: Maximum execution time exceeded "
msgstr "Error fatal: se excedió el tiempo máximo de ejecución "

#: ../includes/mlf_support.php:91
msgid ""
"The Maximum execution time error takes place when moving, syncing or "
"uploading too many files at one time. The web site’s server has a setting "
"for how long it can be busy with a task. Depending on your server, size of "
"files and the transmission speed of your internet, you may need to reduce "
"the number of files you upload or move at one time."
msgstr ""
"El error máximo de tiempo de ejecución tiene lugar al mover, sincronizar o "
"cargar demasiados archivos a la vez. El servidor del sitio web tiene una "
"configuración de cuánto tiempo puede estar ocupado con una tarea. "
"Dependiendo de su servidor, el tamaño de los archivos y la velocidad de "
"transmisión de su internet, es posible que deba reducir el número de "
"archivos que carga o carga al mismo tiempo."

#: ../includes/mlf_support.php:92
msgid ""
"It is possible to change the maximum execution time either with a plugin "
"such as <a href=“http://wordpress.org/plugins/wp-maximum-execution-time-"
"exceeded/” target=“_blank”>WP Maximum Execution Time Exceeded</a> or by "
"editing your site’s .htaccess file and adding this line:"
msgstr ""
"Es posible cambiar el tiempo máximo de ejecución con un complemento como <a "
"href=“http://wordpress.org/plugins/wp-maximum-execution-time-exceeded/” "
"target=“_blank”> WP Maximum Execution Tiempo excedido </a> o editando el "
"archivo .htaccess de su sitio y agregando esta línea:"

#: ../includes/mlf_support.php:93
msgid "php_value max_execution_time 300"
msgstr "php_value max_execution_time 300"

#: ../includes/mlf_support.php:94
msgid "Which will raise the maximum execution time to five minutes."
msgstr "Lo cual elevará el tiempo máximo de ejecución a cinco minutos."

#: ../includes/mlf_support.php:112
msgid ""
"You may be asked to provide the information below to help troubleshoot your "
"issue."
msgstr ""
"Es posible que se le solicite que proporcione la información a continuación "
"para ayudar a solucionar su problema."

#: ../maxgalleria-media-library.php:428
msgid "This folder was not found: "
msgstr "Esta carpeta no fue encontrada: "

#: ../maxgalleria-media-library.php:471 ../maxgalleria-media-library.php:1456
#: ../maxgalleria-media-library.php:1511 ../maxgalleria-media-library.php:1540
#: ../maxgalleria-media-library.php:1559 ../maxgalleria-media-library.php:2224
#: ../maxgalleria-media-library.php:2398 ../maxgalleria-media-library.php:2511
#: ../maxgalleria-media-library.php:2760 ../maxgalleria-media-library.php:2844
#: ../maxgalleria-media-library.php:3015 ../maxgalleria-media-library.php:3145
#: ../maxgalleria-media-library.php:3173 ../maxgalleria-media-library.php:3684
#: ../maxgalleria-media-library.php:3912 ../maxgalleria-media-library.php:3975
#: ../maxgalleria-media-library.php:4387 ../maxgalleria-media-library.php:4546
#: ../maxgalleria-media-library.php:4736 ../maxgalleria-media-library.php:4748
#: ../maxgalleria-media-library.php:4858 ../maxgalleria-media-library.php:4975
msgid "missing nonce!"
msgstr "¡Falta de nada!"

#: ../maxgalleria-media-library.php:793 ../maxgalleria-media-library.php:922
msgid "Media Library Folders"
msgstr "Media Library Folders"

#: ../maxgalleria-media-library.php:794 ../maxgalleria-media-library.php:796
msgid "Check For New Folders"
msgstr "Buscar nuevas carpetas"

#: ../maxgalleria-media-library.php:795
msgid "Search Library"
msgstr "Biblioteca de búsqueda"

#: ../maxgalleria-media-library.php:799
msgid "Upgrade to Pro"
msgstr "Actualiza a Pro"

#: ../maxgalleria-media-library.php:800 ../maxgalleria-media-library.php:1044
#: ../maxgalleria-media-library.php:4041
msgid "Regenerate Thumbnails"
msgstr "Regenerar miniaturas"

#: ../maxgalleria-media-library.php:801 ../maxgalleria-media-library.php:4312
msgid "Image SEO"
msgstr "Imagen SEO"

#: ../maxgalleria-media-library.php:803 ../maxgalleria-media-library.php:4348
msgid "Settings"
msgstr "Configuraciones"

#: ../maxgalleria-media-library.php:936
msgid "Click here to learn about the Media Library Folders Pro"
msgstr ""
"Haga clic aquí para obtener más información sobre Media Library Folders Pro"

#: ../maxgalleria-media-library.php:948
msgid "Current PHP version, "
msgstr "Versión actual de PHP, "

#: ../maxgalleria-media-library.php:948
msgid ", is outdated. Please upgrade to version 5.6."
msgstr ", está anticuada. Actualice a la versión 5.6."

#: ../maxgalleria-media-library.php:968 ../maxgalleria-media-library.php:1413
msgid "Location:"
msgstr "Ubicación:"

#: ../maxgalleria-media-library.php:982
msgid "Upload new files."
msgstr "Sube nuevos archivos."

#: ../maxgalleria-media-library.php:982
msgid "Add File"
msgstr "Agregar archivo"

#: ../maxgalleria-media-library.php:984
msgid ""
"Create a new folder. Type in a folder name (do not use spaces, single or "
"double quote marks) and click Create Folder."
msgstr ""
"Crear una nueva carpeta. Escriba un nombre de carpeta (no use espacios, "
"comillas simples o dobles) y haga clic en Crear carpeta."

#: ../maxgalleria-media-library.php:984
msgid "Add Folder"
msgstr "Agregar carpeta"

#: ../maxgalleria-media-library.php:997
msgid ""
"When moving/copying to a new folder place your pointer, not the image, on "
"the folder where you want the file(s) to go."
msgstr ""
"Cuando mueva/copie a una nueva carpeta, coloque su puntero -no la imagen- en "
"la carpeta donde desea que vayan los archivos."

#: ../maxgalleria-media-library.php:998
msgid ""
"To drag multiple images, check the box under the files you want to move and "
"then drag one of the images to the desired folder."
msgstr ""
"Para arrastrar varias imágenes, marque la casilla debajo de los archivos que "
"desea mover y luego arrastre una de las imágenes a la carpeta deseada."

#: ../maxgalleria-media-library.php:999
msgid ""
"To move/copy to a folder nested under the top level folder click the "
"triangle to the left of the folder to show the nested folder that is your "
"target."
msgstr ""
"Para mover/copiar a una carpeta anidada debajo de la carpeta de nivel "
"superior, haga clic en el triángulo a la izquierda de la carpeta para "
"mostrar la carpeta anidada que es su destino."

#: ../maxgalleria-media-library.php:1000
msgid ""
"To delete a folder, right click on the folder and a popup menu will appear. "
"Click on the option, \"Delete this folder?\" If the folder is empty, it will "
"be deleted."
msgstr ""
"Para eliminar una carpeta, haga clic con el botón derecho en la carpeta y "
"aparecerá un menú emergente. Haga clic en la opción, \"¿Eliminar esta "
"carpeta?\" Si la carpeta está vacía, se eliminará."

#: ../maxgalleria-media-library.php:1001
msgid ""
"To hide a folder and all its sub folders and files, right click on a folder, "
"On the popup menu that appears, click \"Hide this folder?\" and those "
"folders and files will be removed from the Media Library, but not from the "
"server."
msgstr ""
"Para ocultar una carpeta y todas sus subcarpetas y archivos, haga clic con "
"el botón derecho en una carpeta. En el menú emergente que aparece, haga clic "
"en \"¿Ocultar esta carpeta?\" y esas carpetas y archivos se eliminarán de "
"Media Library, pero no del servidor."

#: ../maxgalleria-media-library.php:1002
msgid ""
"For selecting multiple adjacent files, check the checkbox of the first file "
"and then while holding the shift key down, check the check box for the last "
"file."
msgstr ""
"Para seleccionar varios archivos adyacentes, marque la casilla de "
"verificación del primer archivo y luego, mientras mantiene presionada la "
"tecla Mayúsculas, marque la casilla de verificación para el último archivo."

#: ../maxgalleria-media-library.php:1016
msgid ""
"Move/Copy Toggle. Move or copy selected files to a different folder.<br> "
"When move is selected, images links in posts and pages will be updated.<br> "
"<span class='mlp-warning'>Images IDs used in Jetpack Gallery shortcodes will "
"not be updated.</span>"
msgstr ""
"Mover/Copiar alternar. Mueva o copie los archivos seleccionados a una "
"carpeta diferente. <br> Cuando se selecciona mover, se actualizarán los "
"enlaces de imágenes en publicaciones y páginas. <br> <span class='mlp-"
"warning'> Los ID de imágenes utilizados en los códigos abreviados de Jetpack "
"Gallery no ser actualizado. </span>"

#: ../maxgalleria-media-library.php:1025
msgid ""
"Rename a file; select only one file. Folders cannot be renamed. Type in a "
"new name with no spaces and without the extention and click Rename."
msgstr ""
"Cambiar el nombre de un archivo; selecciona solo un archivo. Las carpetas no "
"pueden ser renombradas. Escriba un nuevo nombre sin espacios y sin la "
"extensión y haga clic en Cambiar nombre."

#: ../maxgalleria-media-library.php:1025 ../maxgalleria-media-library.php:1084
msgid "Rename"
msgstr "Renombrar"

#: ../maxgalleria-media-library.php:1027
msgid "Delete selected files."
msgstr "Eliminar los archivos seleccionados."

#: ../maxgalleria-media-library.php:1027
msgid "Delete"
msgstr "Eliminar"

#: ../maxgalleria-media-library.php:1029
msgid "Select or unselect all files in the folder."
msgstr "Seleccione o deseleccione todos los archivos en la carpeta."

#: ../maxgalleria-media-library.php:1029
msgid "Select/Unselect All"
msgstr "Seleccionar/Deseleccionar todo"

#: ../maxgalleria-media-library.php:1032
msgid "Sort by Name"
msgstr "Ordenar por Nombre"

#: ../maxgalleria-media-library.php:1033
msgid "Sort by Date"
msgstr "Ordenar por Fecha"

#: ../maxgalleria-media-library.php:1037
msgid "Search"
msgstr "Buscar"

#: ../maxgalleria-media-library.php:1040
msgid "Sync the contents of the current folder with the server"
msgstr "Sincroniza el contenido de la carpeta actual con el servidor"

#: ../maxgalleria-media-library.php:1040
msgid "Sync"
msgstr "Sincronizar"

#: ../maxgalleria-media-library.php:1044
msgid "Regenerates the thumbnails of selected images"
msgstr "Regenera las miniaturas de las imágenes seleccionadas"

#: ../maxgalleria-media-library.php:1047
msgid ""
"Add images to an existing MaxGalleria gallery. Folders can not be added to a "
"gallery. Images already in the gallery will not be added. "
msgstr ""
"Agregue imágenes a una galería existente de MaxGalleria. Las carpetas no se "
"pueden agregar a una galería. Las imágenes que ya están en la galería no se "
"agregarán. "

#: ../maxgalleria-media-library.php:1047
msgid "Add to MaxGalleria Gallery"
msgstr "Agregar a la Galería MaxGalleria"

#: ../maxgalleria-media-library.php:1068
msgid "Drag & Drop Files Here"
msgstr "Arrastre y suelte archivos aquí"

#: ../maxgalleria-media-library.php:1069
msgid "or select a file or image to upload:"
msgstr "o seleccione un archivo o imagen para cargar:"

#: ../maxgalleria-media-library.php:1072
msgid "Upload Image"
msgstr "Cargar imagen"

#: ../maxgalleria-media-library.php:1075
msgid "Image Title Text:"
msgstr "Texto del título de la imagen:"

#: ../maxgalleria-media-library.php:1076
msgid "Image ALT Text:"
msgstr "Texto ALT de la imagen:"

#: ../maxgalleria-media-library.php:1083
msgid "File Name: "
msgstr "Nombre del archivo: "

#: ../maxgalleria-media-library.php:1119
msgid "Add Images"
msgstr "Añadir imágenes"

#: ../maxgalleria-media-library.php:1130
msgid "Folder Name: "
msgstr "Nombre de la carpeta: "

#: ../maxgalleria-media-library.php:1131
msgid "Create Folder"
msgstr "Crear carpeta"

#: ../maxgalleria-media-library.php:1774
msgid "Delete this folder?"
msgstr "¿Eliminar esta carpeta?"

#: ../maxgalleria-media-library.php:1783
msgid "Are you sure you want to delete the selected folder?"
msgstr "¿Seguro que quieres eliminar la carpeta seleccionada?"

#: ../maxgalleria-media-library.php:1815
msgid "Hide this folder?"
msgstr "¿Ocultar esta carpeta?"

#: ../maxgalleria-media-library.php:1821
msgid ""
"Are you sure you want to hide the selected folder and all its sub folders "
"and files?"
msgstr ""
"¿Seguro que quieres ocultar la carpeta seleccionada y todas sus subcarpetas "
"y archivos?"

#: ../maxgalleria-media-library.php:2116
msgid "No files were found."
msgstr "No se encontraron archivos."

#: ../maxgalleria-media-library.php:2277
msgid "The folder was created."
msgstr "La carpeta fue creada."

#: ../maxgalleria-media-library.php:2283
msgid "There was a problem creating the folder."
msgstr "Hubo un problema al crear la carpeta."

#: ../maxgalleria-media-library.php:2290
msgid "The folder already exists."
msgstr "La carpeta ya existe."

#: ../maxgalleria-media-library.php:2442
msgid "The folder, "
msgstr "La carpeta, "

#: ../maxgalleria-media-library.php:2442
msgid ", is not empty. Please delete or move files from the folder"
msgstr ", no está vacío. Elimine o mueva archivos de la carpeta"

#: ../maxgalleria-media-library.php:2458 ../maxgalleria-media-library.php:2471
msgid "The folder was deleted."
msgstr "La carpeta fue eliminada."

#: ../maxgalleria-media-library.php:2460
msgid "The folder could not be deleted."
msgstr "La carpeta fue eliminada."

#: ../maxgalleria-media-library.php:2481
msgid "The file(s) were deleted"
msgstr "El archivo/s fue eliminado"

#: ../maxgalleria-media-library.php:2483
msgid "The file(s) were not deleted"
msgstr "El archivo(s) no fue eliminado"

#: ../maxgalleria-media-library.php:2585 ../maxgalleria-media-library.php:5104
msgid "Unable to copy the file; please check the folder and file permissions."
msgstr ""
"No se puede copiar el archivo; por favor revise la carpeta y los permisos de "
"archivos."

#: ../maxgalleria-media-library.php:2678 ../maxgalleria-media-library.php:5195
msgid "Updating attachment links, please wait..."
msgstr "Actualizando enlaces de archivos adjuntos, espere ..."

#: ../maxgalleria-media-library.php:2683
msgid ""
"Unable to move the file(s); please check the folder and file permissions."
msgstr ""
"No se puede copiar el archivo(s); por favor revise la carpeta y los permisos "
"de archivos."

#: ../maxgalleria-media-library.php:2690 ../maxgalleria-media-library.php:5206
msgid "The destination is not a folder: "
msgstr "El destino no es una carpeta: "

#: ../maxgalleria-media-library.php:2696 ../maxgalleria-media-library.php:5211
msgid "Cannot find destination folder: "
msgstr "No se puede encontrar la carpeta de destino: "

#: ../maxgalleria-media-library.php:2702 ../maxgalleria-media-library.php:5216
msgid "Coping or moving a folder is not allowed."
msgstr "No se permite copiar o mover una carpeta."

#: ../maxgalleria-media-library.php:2708 ../maxgalleria-media-library.php:5221
msgid "Cannot find the file: "
msgstr "No puedo encontrar el archivo: "

#: ../maxgalleria-media-library.php:2715
msgid "The file(s) were copied to "
msgstr "El archivo(s) fue copiado a "

#: ../maxgalleria-media-library.php:2717
msgid "The file(s) were not copied."
msgstr "El archivo(s) no se copió."

#: ../maxgalleria-media-library.php:2721
msgid "The file(s) were moved to "
msgstr "El archivo(s) se movió a "

#: ../maxgalleria-media-library.php:2723
msgid "The file(s) were not moved."
msgstr "El archivo(s) no se movió."

#: ../maxgalleria-media-library.php:2833
msgid "The images were added."
msgstr "Las imágenes fueron agregadas."

#: ../maxgalleria-media-library.php:2885 ../maxgalleria-media-library.php:2985
msgid "No files were found matching that name."
msgstr "No se encontraron archivos que coincidan con ese nombre."

#: ../maxgalleria-media-library.php:2903
msgid "Back to Media Library Folders"
msgstr "Volver a Media Library Folders"

#: ../maxgalleria-media-library.php:2908
msgid ""
"Click on an image to go to its folder or a on folder to view its contents."
msgstr ""
"Haga clic en una imagen para ir a su carpeta o en una carpeta para ver su "
"contenido."

#: ../maxgalleria-media-library.php:2911
msgid "Search results for: "
msgstr "Resultados de búsqueda para: "

#: ../maxgalleria-media-library.php:3037
msgid "Invalid file name."
msgstr "Nombre de archivo inválido."

#: ../maxgalleria-media-library.php:3042
msgid "The file name cannot contain spaces or tabs."
msgstr "El nombre del archivo no puede contener espacios o pestañas."

#: ../maxgalleria-media-library.php:3134
msgid "Updating attachment links, please wait...The file was renamed"
msgstr ""
"Actualizando enlaces de archivos adjuntos, espere ... Se cambió el nombre "
"del archivo"

#: ../maxgalleria-media-library.php:3157
msgid "Sorting by date."
msgstr "Ordenando por fecha."

#: ../maxgalleria-media-library.php:3161
msgid "Sorting by name."
msgstr "Ordenando por nombre."

#: ../maxgalleria-media-library.php:3215
msgid "Scaning for new folders in "
msgstr "Buscando nuevas carpetas en "

#: ../maxgalleria-media-library.php:3242 ../maxgalleria-media-library.php:3270
#: ../maxgalleria-media-library.php:3291 ../maxgalleria-media-library.php:3326
msgid "Adding"
msgstr "Añadiendo"

#: ../maxgalleria-media-library.php:3304
msgid "No new folders were found."
msgstr "No se encontraron nuevas carpetas."

#: ../maxgalleria-media-library.php:3423
msgid "Rate us Please!"
msgstr "Califícanos por favor!"

#: ../maxgalleria-media-library.php:3424
msgid ""
"Your rating is the simplest way to support Media Library Folders. We really "
"appreciate it!"
msgstr ""
"Su calificación es la forma más sencilla de admitir Media Library Folders. "
"¡Nosotros realmente lo apreciamos!"

#: ../maxgalleria-media-library.php:3427
msgid "I've already left a review"
msgstr "Ya he dejado una reseña"

#: ../maxgalleria-media-library.php:3428
msgid "Maybe Later"
msgstr "Quizás más tarde"

#: ../maxgalleria-media-library.php:3429
msgid "Sure! I'd love to!"
msgstr "¡Por supuesto! ¡Me encantaría!"

#: ../maxgalleria-media-library.php:3926
msgid "Media Library Folders Settings"
msgstr "Configuración de Media Library Folders"

#: ../maxgalleria-media-library.php:3934
msgid "Disable floating file tree"
msgstr "Deshabilitar árbol de archivos flotantes"

#: ../maxgalleria-media-library.php:4008
msgid "Error: "
msgstr "Error: "

#: ../maxgalleria-media-library.php:4012
#, php-format
msgid "Unknown error with %s"
msgstr "Error desconocido con %s"

#: ../maxgalleria-media-library.php:4023
#, php-format
msgid "Thumbnails have been regenerated for %d image(s)"
msgstr "Las miniaturas se han regenerado para %d imagen(es)"

#: ../maxgalleria-media-library.php:4062
msgid "Cheatin&#8217; uh?"
msgstr "Cheatin&#8217; ¿eh?"

#: ../maxgalleria-media-library.php:4073
#, php-format
msgid "Unable to find any images. Are you sure <a href='%s'>some exist</a>?"
msgstr ""
"No se puede encontrar ninguna imagen. ¿Estás seguro de que <a href='%s'> "
"algunos existen </a>?"

#: ../maxgalleria-media-library.php:4084
msgid ""
"Please wait while the thumbnails are regenerated. This may take a while."
msgstr ""
"Espere mientras se regeneran las miniaturas. Esto puede tardar un rato."

#: ../maxgalleria-media-library.php:4088
#, php-format
msgid "To go back to the previous page, <a href=\"%s\">click here</a>."
msgstr "Para volver a ala página anterior, <a href=\"%s\">haga clic aquí </a>."

#: ../maxgalleria-media-library.php:4089
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a href="
"\"%4$s\">click here</a>. %5$s"
msgstr ""
"¡Todo listo! %1$s imagen(es) se cambiaron de tamaño correctamente en  %2$s "
"segudnos y hubo %3$s fallo(s). Para intentar volver a generar las imágenes "
"fallidas, <a href=\"%4$s\"> haga clic aquí </a>. %5$s"

#: ../maxgalleria-media-library.php:4090
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""
"¡Todo listo! %1$s imagen(es) se cambiaron de tamaño correctamente en %2$s "
"segundos y no hubo fallos. %3$s"

#: ../maxgalleria-media-library.php:4094 ../maxgalleria-media-library.php:4240
msgid "You must enable Javascript in order to proceed!"
msgstr "¡Debes habilitar Javascript para continuar!"

#: ../maxgalleria-media-library.php:4100
msgid "Abort Resizing Images"
msgstr "Anular el cambio de tamaño de las imágenes"

#: ../maxgalleria-media-library.php:4102
msgid "Debugging Information"
msgstr "Información de depuración"

#: ../maxgalleria-media-library.php:4105
#, php-format
msgid "Total Images: %s"
msgstr "Total de imágenes: %s"

#: ../maxgalleria-media-library.php:4106
#, php-format
msgid "Images Resized: %s"
msgstr "Imágenes redimensionadas: %s"

#: ../maxgalleria-media-library.php:4107
#, php-format
msgid "Resize Failures: %s"
msgstr "Fallos de cambio de tamaño: % s"

#: ../maxgalleria-media-library.php:4138
msgid "Stopping..."
msgstr "Parando..."

#: ../maxgalleria-media-library.php:4190
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""
"La solicitud de cambio de tamaño se canceló anormalmente (ID %s). Es "
"probable que esto se deba a que la imagen excede la memoria disponible o "
"algún otro tipo de error fatal."

#: ../maxgalleria-media-library.php:4233
msgid ""
"Click the button below to regenerate thumbnails for all images in the Media "
"Library. This is helpful if you have added new thumbnail sizes to your site. "
"Existing thumbnails will not be removed to prevent breaking any links."
msgstr ""
"Haga clic en el botón a continuación para regenerar las miniaturas de todas "
"las imágenes en la Biblioteca multimedia. Esto es útil si ha agregado nuevos "
"tamaños de miniaturas a su sitio. Las miniaturas existentes no se eliminarán "
"para evitar que se rompan los enlaces."

#: ../maxgalleria-media-library.php:4235
msgid ""
"You can regenerate thumbnails for individual images from the Media Library "
"Folders page by checking the box below one or more images and clicking the "
"Regenerate Thumbnails button. The regenerate operation is not reversible but "
"you can always generate the sizes you need by adding additional thumbnail "
"sizes to your theme."
msgstr ""
"Puede regenerar miniaturas para imágenes individuales desde la página Media "
"Library Folders marcando la casilla debajo de una o más imágenes y haciendo "
"clic en el botón Regenerar miniaturas. La operación de regeneración no es "
"reversible, pero siempre puede generar los tamaños que necesita agregando "
"tamaños de miniaturas adicionales a su tema."

#: ../maxgalleria-media-library.php:4238
msgid "Regenerate All Thumbnails"
msgstr "Regenerar todas las miniaturas"

#: ../maxgalleria-media-library.php:4264
#, php-format
msgid "Failed resize: %s is an invalid image ID."
msgstr "Error al cambiar el tamaño: %s es una ID de imagen no válida."

#: ../maxgalleria-media-library.php:4267
msgid "Your user account doesn't have permission to resize images"
msgstr ""
"Su cuenta de usuario no tiene permiso para cambiar el tamaño de las imágenes"

#: ../maxgalleria-media-library.php:4272
#, php-format
msgid "The originally uploaded image file cannot be found at %s"
msgstr "El archivo de imagen cargado originalmente no se puede encontrar en %s"

#: ../maxgalleria-media-library.php:4281
msgid "Unknown failure reason."
msgstr "Fallo desconocido."

#: ../maxgalleria-media-library.php:4286
#, php-format
msgid "&quot;%1$s&quot; (ID %2$s) was successfully resized in %3$s seconds."
msgstr ""
"&quot;%1$s&quot; (ID %2$s) se redimensionó correctamente en %3$s segundos."

#: ../maxgalleria-media-library.php:4292
#, php-format
msgid ""
"&quot;%1$s&quot; (ID %2$s) failed to resize. The error message was: %3$s"
msgstr ""
"&quot;%1$s&quot; (ID %2$s) no se pudo cambiar el tamaño. El mensaje de error "
"fue:: %3$s"

#: ../maxgalleria-media-library.php:4327
msgid ""
"When Image SEO is enabled Media Library Folders automatically adds  ALT and "
"Title attributes with the default settings defined below to all your images "
"as they are uploaded."
msgstr ""
"Cuando se habilita Image SEO, Media Library Folders agrega automáticamente "
"los atributos ALT y Title con la configuración predeterminada definida a "
"continuación a todas sus imágenes a medida que se cargan."

#: ../maxgalleria-media-library.php:4328
msgid ""
"You can easily override the Image SEO default settings when you  are "
"uploading new images. When Image SEO is enabled you will see two fields  "
"under the Upload Box when you add a file - Image Title Text and Image ALT "
"Text.  Whatever you type into these fields overrides the default settings "
"for the  current upload or sync operations."
msgstr ""
"Puede anular fácilmente la configuración predeterminada de Image SEO cuando "
"está cargando imágenes nuevas. Cuando se habilita Image SEO, verá dos campos "
"debajo del cuadro Cargar cuando agregue un archivo: texto de título de "
"imagen e texto ALT de imagen. Cualquier cosa que escriba en estos campos "
"anula la configuración predeterminada para las operaciones actuales de carga "
"o sincronización."

#: ../maxgalleria-media-library.php:4329
msgid ""
"To change the settings on an individual image simply click on  the image and "
"change the settings on the far right.  Save and then back click to return to "
"Media  Library Plus or MLPP."
msgstr ""
"Para cambiar la configuración de una imagen individual, simplemente haga "
"clic en la imagen y cambie la configuración en el extremo derecho. Guarde y "
"luego haga clic atrás para regresar a Media Library Plus o MLPP."

#: ../maxgalleria-media-library.php:4330
msgid "Image SEO supports two special tags:"
msgstr "Image SEO admite dos etiquetas especiales:"

#: ../maxgalleria-media-library.php:4331
#, php-format
msgid "%filename - replaces image file name ( without extension )"
msgstr "%filename - reemplaza el nombre del archivo de imagen (sin extensión)"

#: ../maxgalleria-media-library.php:4332
#, php-format
msgid "%foldername - replaces image folder name"
msgstr "%foldername - reemplaza el nombre de la carpeta de la imagen"

#: ../maxgalleria-media-library.php:4353
msgid "Turn on Image SEO:"
msgstr "Activar Image SEO:"

#: ../maxgalleria-media-library.php:4358
msgid "Image ALT attribute:"
msgstr "Atributo ALT de la imagen:"

#: ../maxgalleria-media-library.php:4360 ../maxgalleria-media-library.php:4365
msgid "example"
msgstr "ejemplo"

#: ../maxgalleria-media-library.php:4363
msgid "Image Title attribute:"
msgstr "Atributo Título de imagen:"

#: ../maxgalleria-media-library.php:4368
msgid "Update Settings"
msgstr "Ajustes de actualización"

#: ../maxgalleria-media-library.php:4411
msgid "The Image SEO setting have been updated "
msgstr "La configuración de Image SEO ha sido actualizada "

#: ../maxgalleria-media-library.php:4580
msgid "The selected folder, subfolders and thier files have been hidden."
msgstr ""
"La carpeta seleccionada, las subcarpetas y sus archivos se han ocultado."

#: ../maxgalleria-media-library.php:4903
msgid "Scanning for new files and folders...please wait."
msgstr "Buscando nuevos archivos y carpetas ... espere."

#: ../maxgalleria-media-library.php:4908
msgid "Syncing finished."
msgstr "Sincronización terminada."

#: ../maxgalleria-media-library.php:4929
msgid "Adding "
msgstr "Añadiendo "

#: ../maxgalleria-media-library.php:5040
msgid "Finished copying files. "
msgstr "Copia de archivos terminada. "

#: ../maxgalleria-media-library.php:5042
msgid "Finished moving files. "
msgstr "Movimiento de archivos terminado. "

#: ../maxgalleria-media-library.php:5200
msgid "Unable to move "
msgstr "Incapaz de moverse "

#: ../maxgalleria-media-library.php:5200
msgid "; please check the folder and file permissions."
msgstr "; por favor revise la carpeta y los permisos de archivos."

#: ../maxgalleria-media-library.php:5228
msgid " was copied to "
msgstr " fue copiado a "

#: ../maxgalleria-media-library.php:5230
msgid " was not copied."
msgstr " no fue copiado."

#: ../maxgalleria-media-library.php:5234
msgid " was moved to "
msgstr " fue movido a "

#: ../maxgalleria-media-library.php:5236
msgid " was not moved."
msgstr " no se movió."
````

## File: Old Plugin/languages/maxgalleria-media-library-fr_FR.po
````
msgid ""
msgstr ""
"Project-Id-Version: maxgalleria-media-library\n"
"POT-Creation-Date: 2017-07-05 14:31+0200\n"
"PO-Revision-Date: 2017-07-30 13:33+0200\n"
"Language-Team: \n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Poedit 2.0.3\n"
"X-Poedit-Basepath: .\n"
"Plural-Forms: nplurals=2; plural=(n > 1);\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"Last-Translator: Frédéric Chamsseddine <contact@shemzone.com>\n"
"Language: fr_FR\n"
"X-Poedit-SearchPath-0: ..\n"

#: ../maxgalleria-media-library.php:430 ../maxgalleria-media-library.php:1341
#: ../maxgalleria-media-library.php:1396 ../maxgalleria-media-library.php:1425
#: ../maxgalleria-media-library.php:1444 ../maxgalleria-media-library.php:2073
#: ../maxgalleria-media-library.php:2245 ../maxgalleria-media-library.php:2358
#: ../maxgalleria-media-library.php:2607 ../maxgalleria-media-library.php:2691
#: ../maxgalleria-media-library.php:2862 ../maxgalleria-media-library.php:2990
#: ../maxgalleria-media-library.php:3018 ../maxgalleria-media-library.php:3307
#: ../maxgalleria-media-library.php:3504 ../maxgalleria-media-library.php:3729
#: ../maxgalleria-media-library.php:3742 ../maxgalleria-media-library.php:4155
#: ../maxgalleria-media-library.php:4404
msgid "missing nonce!"
msgstr "Paramètre nonce manquant !"

#: ../maxgalleria-media-library.php:738 ../maxgalleria-media-library.php:866
msgid "Media Library Folders"
msgstr "Media Library Folders"

#: ../maxgalleria-media-library.php:741
msgid "Check For New Folders"
msgstr "Vérifier les nouveaux dossiers"

#: ../maxgalleria-media-library.php:744
msgid "Upgrade to Pro"
msgstr "Passer à la version Pro"

#: ../maxgalleria-media-library.php:745 ../maxgalleria-media-library.php:981
#: ../maxgalleria-media-library.php:3809
msgid "Regenerate Thumbnails"
msgstr "Régénérer les miniatures"

#: ../maxgalleria-media-library.php:746 ../maxgalleria-media-library.php:4080
msgid "Image SEO"
msgstr "SEO sur les images"

#: ../maxgalleria-media-library.php:747
msgid "Support"
msgstr "Support technique"

#: ../maxgalleria-media-library.php:872 ../maxgalleria-media-library.php:3814
#: ../maxgalleria-media-library.php:4085 ../maxgalleria-media-library.php:4293
msgid "Makers of"
msgstr "Créateurs de"

#: ../maxgalleria-media-library.php:872 ../maxgalleria-media-library.php:3814
#: ../maxgalleria-media-library.php:4085 ../maxgalleria-media-library.php:4293
msgid "and"
msgstr "et"

#: ../maxgalleria-media-library.php:874 ../maxgalleria-media-library.php:3816
#: ../maxgalleria-media-library.php:4087 ../maxgalleria-media-library.php:4295
msgid "Need help? Click here for"
msgstr "Besoin d'aide ? Cliquez ici pour un "

#: ../maxgalleria-media-library.php:874 ../maxgalleria-media-library.php:3816
#: ../maxgalleria-media-library.php:4087 ../maxgalleria-media-library.php:4295
msgid "Awesome Support!"
msgstr "Support de folie !"

#: ../maxgalleria-media-library.php:875 ../maxgalleria-media-library.php:3817
#: ../maxgalleria-media-library.php:4088 ../maxgalleria-media-library.php:4296
msgid "Or Email Us at"
msgstr "Ou envoyez un email à"

#: ../maxgalleria-media-library.php:880
msgid "Click here to learn about the Media Library Folders Pro"
msgstr "Cliquez ici pour en savoir plus sur Media Library Folders Pro"

#: ../maxgalleria-media-library.php:892
msgid "Current PHP version, "
msgstr "Version actuelle de PHP,"

#: ../maxgalleria-media-library.php:892
msgid ", is outdated. Please upgrade to version 5.6."
msgstr ", est obsolète. Passez à la version 5.6."

#: ../maxgalleria-media-library.php:912 ../maxgalleria-media-library.php:1298
msgid "Location:"
msgstr "Emplacement :"

#: ../maxgalleria-media-library.php:926
msgid "Upload new files."
msgstr "Envoyer de nouveaux fichiers."

#: ../maxgalleria-media-library.php:926
msgid "Add File"
msgstr "Ajouter un fichier"

#: ../maxgalleria-media-library.php:928
msgid ""
"Create a new folder. Type in a folder name (do not use spaces, single or "
"double quote marks) and click Create Folder."
msgstr ""
"Créer un nouveau dossier. Saisissez un nom de dossier (n'utilisez ni "
"espaces, ni apostrophes, ni guillemets) et cliquez sur Créer un dossier."

#: ../maxgalleria-media-library.php:928
msgid "Add Folder"
msgstr "Ajouter un dossier"

#: ../maxgalleria-media-library.php:937
msgid ""
"When moving/copying to a new folder place your pointer, not the image, on "
"the folder where you want the file(s) to go."
msgstr ""
"Lorsque vous déplacez / copiez dans un nouveau dossier, placez votre "
"pointeur, et non l'image, sur le dossier où vous souhaitez que les fichiers "
"soient déplacés ou copiés."

#: ../maxgalleria-media-library.php:938
msgid ""
"To drag multiple images, check the box under the files you want to move and "
"then drag one of the images to the desired folder."
msgstr ""
"Pour faire glisser plusieurs images, cochez la case sous les fichiers que "
"vous souhaitez déplacer, puis faites glisser une des images vers le dossier "
"souhaité."

#: ../maxgalleria-media-library.php:939
msgid ""
"To move/copy to a folder nested under the top level folder click the "
"triangle to the left of the folder to show the nested folder that is your "
"target."
msgstr ""
"Pour déplacer / copier dans un dossier imbriqué dans le dossier de niveau "
"supérieur, cliquez sur le triangle à gauche du dossier pour afficher le "
"dossier imbriqué ciblé."

#: ../maxgalleria-media-library.php:940
msgid ""
"To delete a folder, right click on the folder and a popup menu will appear. "
"Click on the option, \"Delete this folder?\" If the folder is empty, it will "
"be deleted."
msgstr ""
"Pour supprimer un dossier, faites un clic droit sur le dossier pour faire "
"apparaître un menu contextuel. Cliquez sur l'option \"Supprimer ce dossier"
"\" ? Si le dossier est vide, il sera supprimé."

#: ../maxgalleria-media-library.php:941
msgid ""
"To hide a folder and all its sub folders and files, right click on a folder, "
"On the popup menu that appears, click \"Hide this folder?\" and those "
"folders and files will be removed from the Media Library, but not from the "
"server."
msgstr ""
"Pour cacher un dossier et tous ses sous-dossiers et fichiers, faites un clic "
"droit sur le dossier pour faire apparaître un menu contextuel. Cliquez sur "
"l'option \"Masquer ce dossier ?\" et ces dossiers et fichiers seront "
"supprimés de la bibliothèque multimédia, mais pas du serveur."

#: ../maxgalleria-media-library.php:942
msgid ""
"If you click on an image and end up in WordPress Media Library please "
"backclick two times to return to MLP"
msgstr ""
"Si vous cliquez sur une image et que vous vous retrouvez dans la "
"bibliothèque multimédia WordPress, faites un retour en arrière deux fois "
"pour retourner à MLP"

#: ../maxgalleria-media-library.php:953
msgid ""
"Move/Copy Toggle. Move or copy selected files to a different folder. When "
"move is selected, images links in posts and pages will be updated. <span "
"class='mlp-warning'>Images IDs used in Jetpack Gallery shortcodes will not "
"be updated.</span>"
msgstr ""
"Déplacer / Copier. Déplacez ou copiez les fichiers sélectionnés dans un "
"autre dossier. Lorsque le déplacement est sélectionné, les liens d'images "
"dans les publications et les pages seront mis à jour. <span class='mlp-"
"warning'>Les identifiants d'images utilisés dans les shortcodes de Jetpack "
"Gallery ne seront pas mis à jour.</span>"

#: ../maxgalleria-media-library.php:962
msgid ""
"Rename a file; select only one file. Folders cannot be renamed. Type in a "
"new name with no spaces and without the extention and click Rename."
msgstr ""
"Renommer un fichier. Sélectionnez un seul fichier. Les dossiers ne peuvent "
"pas être renommés. Saisissez un nouveau nom sans espace et sans extension "
"puis cliquez sur Renommer."

#: ../maxgalleria-media-library.php:962 ../maxgalleria-media-library.php:1021
msgid "Rename"
msgstr "Renommer"

#: ../maxgalleria-media-library.php:964
msgid "Delete selected files."
msgstr "Supprimer les fichiers sélectionnés."

#: ../maxgalleria-media-library.php:964
msgid "Delete"
msgstr "Supprimer"

#: ../maxgalleria-media-library.php:966
msgid "Select or unselect all files in the folder."
msgstr ""
"Sélectionne ou désélectionne tous les fichiers afin d'appliquer la même "
"option en une fois."

#: ../maxgalleria-media-library.php:966
msgid "Select/Unselect All"
msgstr "Sélection / Désélection"

#: ../maxgalleria-media-library.php:969
msgid "Sort by Name"
msgstr "Trier par nom"

#: ../maxgalleria-media-library.php:970
msgid "Sort by Date"
msgstr "Trier par date"

#: ../maxgalleria-media-library.php:977
msgid "Sync the contents of the current folder with the server"
msgstr "Synchroniser le contenu du dossier actuel avec le serveur"

#: ../maxgalleria-media-library.php:977
msgid "Sync"
msgstr "Synchroniser"

#: ../maxgalleria-media-library.php:981
msgid "Regenerates the thumbnails of selected images"
msgstr "Régénère les miniatures des images sélectionnées"

#: ../maxgalleria-media-library.php:984
msgid ""
"Add images to an existing MaxGalleria gallery. Folders can not be added to a "
"gallery. Images already in the gallery will not be added. "
msgstr ""
"Ajouter des images à une galerie MaxGalleria existante. Les dossiers ne "
"peuvent être ajoutés à une galerie. Les images déjà présentes dans la "
"galerie ne seront pas ajoutées. "

#: ../maxgalleria-media-library.php:984
msgid "Add to MaxGalleria Gallery"
msgstr "Ajouter à la galerie MaxGalleria"

#: ../maxgalleria-media-library.php:1020
msgid "File Name: "
msgstr "Nom du fichier : "

#: ../maxgalleria-media-library.php:1056
msgid "Add Images"
msgstr "Ajouter des images"

#: ../maxgalleria-media-library.php:1067
msgid "Folder Name: "
msgstr "Nom du dossier : "

#: ../maxgalleria-media-library.php:1068
msgid "Create Folder"
msgstr "Création d'un dossier"

#: ../maxgalleria-media-library.php:1645
msgid "You cannot delete the currently open folder."
msgstr "Vous ne pouvez pas supprimer le dossier actuellement ouvert."

#: ../maxgalleria-media-library.php:1686
msgid "You cannot hide the currently open folder."
msgstr "Vous ne pouvez pas masquer le dossier actuellement ouvert."

#: ../maxgalleria-media-library.php:1965
msgid "No files were found."
msgstr "Aucun fichier trouvé."

#: ../maxgalleria-media-library.php:2124
msgid "The folder was created."
msgstr "Le dossier a été créé."

#: ../maxgalleria-media-library.php:2130
msgid "There was a problem creating the folder."
msgstr "Il y a eu un problème lors de la création du dossier."

#: ../maxgalleria-media-library.php:2137
msgid "The folder already exists."
msgstr "Le dossier existe déjà."

#: ../maxgalleria-media-library.php:2289
msgid "The folder, "
msgstr "Le dossier, "

#: ../maxgalleria-media-library.php:2289
msgid ", is not empty. Please delete or move files from the folder"
msgstr ""
", n'est pas vide. Supprimez ou déplacez les fichiers qui se trouve dans ce "
"dossier"

#: ../maxgalleria-media-library.php:2305 ../maxgalleria-media-library.php:2318
msgid "The folder was deleted."
msgstr "Le dossier a été supprimé."

#: ../maxgalleria-media-library.php:2307
msgid "The folder could not be deleted."
msgstr "Le dossier n'a pas pu être supprimé."

#: ../maxgalleria-media-library.php:2328
msgid "The file(s) were deleted"
msgstr "Les fichiers ont été supprimés"

#: ../maxgalleria-media-library.php:2330
msgid "The file(s) were not deleted"
msgstr "Les fichiers n'ont pas été supprimés"

#: ../maxgalleria-media-library.php:2432
msgid "Unable to copy the file; please check the folder and file permissions."
msgstr ""
"Impossible de copier le fichier. Vérifiez les autorisations de dossier et de "
"fichier."

#: ../maxgalleria-media-library.php:2525
msgid "Updating attachment links, please wait..."
msgstr "Mise à jour des liens d'attachement, veuillez patienter..."

#: ../maxgalleria-media-library.php:2530
msgid ""
"Unable to move the file(s); please check the folder and file permissions."
msgstr ""
"Impossible de déplacer le(s) fichier(s). Vérifiez les autorisations de "
"dossier et de fichier."

#: ../maxgalleria-media-library.php:2537
msgid "The destination is not a folder: "
msgstr "La destination n’est pas un dossier : "

#: ../maxgalleria-media-library.php:2543
msgid "Cannot find destination folder: "
msgstr "Impossible de trouver le dossier de destination : "

#: ../maxgalleria-media-library.php:2549
msgid "Coping or moving a folder is not allowed."
msgstr "Copier ou déplacer un dossier n'est pas autorisé."

#: ../maxgalleria-media-library.php:2555
msgid "Cannot find the file: "
msgstr "Impossible de trouver le fichier : "

#: ../maxgalleria-media-library.php:2562
msgid "The file(s) were copied to "
msgstr "Les fichiers ont été copiés dans "

#: ../maxgalleria-media-library.php:2564
msgid "The file(s) were not copied."
msgstr "Les fichiers n'ont pas été copiés."

#: ../maxgalleria-media-library.php:2568
msgid "The file(s) were moved to "
msgstr "Les fichiers ont été déplacés vers "

#: ../maxgalleria-media-library.php:2570
msgid "The file(s) were not moved."
msgstr "Les fichiers n'ont pas été déplacés."

#: ../maxgalleria-media-library.php:2680
msgid "The images were added."
msgstr "Les images ont été ajoutées."

#: ../maxgalleria-media-library.php:2732 ../maxgalleria-media-library.php:2832
msgid "No files were found matching that name."
msgstr "Aucun fichier correspondant à votre recherche n'a été trouvé."

#: ../maxgalleria-media-library.php:2979
msgid "Updating attachment links, please wait...The file was renamed"
msgstr ""
"Mise à jour des liens de pièces jointes, veuillez patienter... Le fichier a "
"été renommé"

#: ../maxgalleria-media-library.php:3002
msgid "Sorting by date."
msgstr "Tri par date."

#: ../maxgalleria-media-library.php:3006
msgid "Sorting by name."
msgstr "Tri par nom."

#: ../maxgalleria-media-library.php:3060
msgid "Scaning for new folders in "
msgstr "Recherche de nouveaux dossiers dans "

#: ../maxgalleria-media-library.php:3087 ../maxgalleria-media-library.php:3115
#: ../maxgalleria-media-library.php:3136 ../maxgalleria-media-library.php:3171
msgid "Adding"
msgstr "Ajouter"

#: ../maxgalleria-media-library.php:3149
msgid "No new folders were found."
msgstr "Aucun nouveau dossier n'a été trouvé."

#: ../maxgalleria-media-library.php:3268
msgid "Rate us Please!"
msgstr "Notez-nous s'il vous plaît !"

#: ../maxgalleria-media-library.php:3269
msgid ""
"Your rating is the simplest way to support Media Library Folders. We really "
"appreciate it!"
msgstr ""
"Votre évaluation est le moyen le plus simple de supporter Media Library "
"Folders. Ça nous encourage vraiment !"

#: ../maxgalleria-media-library.php:3272
msgid "I've already left a review"
msgstr "J'ai déjà laissé un avis"

#: ../maxgalleria-media-library.php:3273
msgid "Maybe Later"
msgstr "Peut-être plus tard"

#: ../maxgalleria-media-library.php:3274
msgid "Sure! I'd love to!"
msgstr "Pas de problème ! J'adorerais !"

#: ../maxgalleria-media-library.php:3775
msgid "Error: "
msgstr "Erreur :"

#: ../maxgalleria-media-library.php:3779
msgid "Unknown error with "
msgstr "Erreur inconnue avec "

#: ../maxgalleria-media-library.php:3830
msgid "Cheatin&#8217; uh?"
msgstr "Alors, on triche hein ?"

#: ../maxgalleria-media-library.php:3841
#, php-format
msgid "Unable to find any images. Are you sure <a href='%s'>some exist</a>?"
msgstr ""
"Impossible de trouver des images. Êtes-vous sûr <a href='%s'>qu'il y en a</"
"a> ?"

#: ../maxgalleria-media-library.php:3852
msgid ""
"Please wait while the thumbnails are regenerated. This may take a while."
msgstr ""
"Veuillez patienter pendant que les miniatures se régénèrent. Cela peut "
"prendre un peu de temps."

#: ../maxgalleria-media-library.php:3856
#, php-format
msgid "To go back to the previous page, <a href=\"%s\">click here</a>."
msgstr "Pour revenir à la page précédente, <a href=\"%s\">cliquez ici</a>."

#: ../maxgalleria-media-library.php:3857
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a href="
"\"%4$s\">click here</a>. %5$s"
msgstr ""
"Terminé ! %1$s image(s) ont été retaillées en %2$s secondes et il y a eu "
"%3$s échec(s). Pour essayer de retailler les images qui ont échoué, <a href="
"\"%4$s\">clicker ici</a>. %5$s"

#: ../maxgalleria-media-library.php:3858
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""
"Terminé ! %1$s image(s) ont été retaillée(s) en %2$s secondes et il n'y a "
"aucun échec. %3$s"

#: ../maxgalleria-media-library.php:3862 ../maxgalleria-media-library.php:4008
msgid "You must enable Javascript in order to proceed!"
msgstr "Vous devez activer Javascript pour continuer !"

#: ../maxgalleria-media-library.php:3868
msgid "Abort Resizing Images"
msgstr "Annuler le redimensionnement des images"

#: ../maxgalleria-media-library.php:3870
msgid "Debugging Information"
msgstr "Rapport de debogage"

#: ../maxgalleria-media-library.php:3873
#, php-format
msgid "Total Images: %s"
msgstr "Total des images :%s"

#: ../maxgalleria-media-library.php:3874
#, php-format
msgid "Images Resized: %s"
msgstr "Images redimensionnées :%s"

#: ../maxgalleria-media-library.php:3875
#, php-format
msgid "Resize Failures: %s"
msgstr "Redimensionnements échoués :%s"

#: ../maxgalleria-media-library.php:3906
msgid "Stopping..."
msgstr "Arrêt en cours…"

#: ../maxgalleria-media-library.php:3958
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""
"L'opération de redimensionnement ne s'est pas correctement terminée (ID% s). "
"Cela est probablement dû au poids de l'image qui dépasse la mémoire "
"disponible ou un autre type d'erreur fatale."

#: ../maxgalleria-media-library.php:4001
msgid ""
"Click the button below to regenerate thumbnails for all images in the Media "
"Library. This is helpful if you have added new thumbnail sizes to your site. "
"Existing thumbnails will not be removed to prevent breaking any links."
msgstr ""
"Cliquez sur le bouton ci-dessous pour régénérer les miniatures pour toutes "
"les images de la bibliothèque multimédia. C'est utile si vous avez ajouté de "
"nouvelles tailles de miniatures à votre site. Les miniatures existantes ne "
"seront pas supprimées pour éviter de briser les liens."

#: ../maxgalleria-media-library.php:4003
msgid ""
"You can regenerate thumbnails for individual images from the Media Library "
"Folders page by checking the box below one or more images and clicking the "
"Regenerate Thumbnails button. The regenerate operation is not reversible but "
"you can always generate the sizes you need by adding additional thumbnail "
"sizes to your theme."
msgstr ""
"Vous pouvez régénérer les miniatures pour les images individuellement à "
"partir de la page Media Library Folders en cochant la case ci-dessous sur "
"une ou plusieurs images et en cliquant sur le bouton Régénérer les "
"miniatures. L'opération de régénération n'est pas réversible, mais vous "
"pouvez toujours générer les tailles dont vous avez besoin en ajoutant des "
"formats de miniatures supplémentaires à votre thème."

#: ../maxgalleria-media-library.php:4006
msgid "Regenerate All Thumbnails"
msgstr "Régénérer toutes les miniatures"

#: ../maxgalleria-media-library.php:4032
#, php-format
msgid "Failed resize: %s is an invalid image ID."
msgstr "Échec du redimensionnement : %s est un identifiant d'image invalide."

#: ../maxgalleria-media-library.php:4035
msgid "Your user account doesn't have permission to resize images"
msgstr ""
"Votre compte utilisateur n'a pas les autorisations suffisantes pour "
"redimensionner les images"

#: ../maxgalleria-media-library.php:4040
#, php-format
msgid "The originally uploaded image file cannot be found at %s"
msgstr "Le fichier image initialement téléchargé n'a pas été trouvé sur %s"

#: ../maxgalleria-media-library.php:4049
msgid "Unknown failure reason."
msgstr "Raison de l'échec inconnu."

#: ../maxgalleria-media-library.php:4054
#, php-format
msgid "&quot;%1$s&quot; (ID %2$s) was successfully resized in %3$s seconds."
msgstr ""
"&quot;%1$s&quot; (ID %2$s) a été redimensionnée avec succès en %3$s secondes."

#: ../maxgalleria-media-library.php:4060
#, php-format
msgid ""
"&quot;%1$s&quot; (ID %2$s) failed to resize. The error message was: %3$s"
msgstr ""
"&quot;%1$s&quot; (ID %2$s) n'a pas pu être redimensionnée. Le message "
"d'erreur était : %3$s"

#: ../maxgalleria-media-library.php:4095
msgid ""
"When Image SEO is enabled Media Library Folders automatically adds  ALT and "
"Title attributes with the default settings defined below to all your images "
"as they are uploaded."
msgstr ""
"Lorsque le SEO sur les images est activé, Media Library Folders ajoute "
"automatiquement aux attributs ALT et TITLE les paramètres définis par défaut "
"ci-dessous à toutes vos images au moment de leur téléchargement."

#: ../maxgalleria-media-library.php:4096
msgid ""
"You can easily override the Image SEO default settings when you  are "
"uploading new images. When Image SEO is enabled you will see two fields  "
"under the Upload Box when you add a file - Image Title Text and Image ALT "
"Text.  Whatever you type into these fields overrides the default settings "
"for the  current upload or sync operations."
msgstr ""
"Vous pouvez aisément remplacer les paramètres par défaut du SEO sur les "
"images lorsque vous téléchargez de nouvelles images. Lorsque le SEO sur les "
"images est activé, vous verrez deux champs sous la zone de téléchargement "
"lorsque vous ajoutez un fichier - Titre de l'image (attribut TITLE) et "
"Alternative textuelle de l'image (attribut ALT). Tout ce que vous saisirez "
"dans ces champs remplacera les paramètres par défaut pour les opérations de "
"chargement ou de synchronisation en cours."

#: ../maxgalleria-media-library.php:4097
msgid ""
"To change the settings on an individual image simply click on  the image and "
"change the settings on the far right.  Save and then back click to return to "
"Media  Library Plus or MLPP."
msgstr ""
"Pour modifier les paramètres d'une image individuellement, cliquez "
"simplement sur l'image et modifiez ses paramètres à droite. Enregistrez, "
"puis revenez en arrière pour revenir à Media Library Plus ou MLPP."

#: ../maxgalleria-media-library.php:4098
msgid "Image SEO supports two special tags:"
msgstr "Le SEO sur les images prend en charge deux attributs spécifiques :"

#: ../maxgalleria-media-library.php:4099
#, php-format
msgid "%filename - replaces image file name ( without extension )"
msgstr "%filename - remplace le nom du fichier image (sans extension)"

#: ../maxgalleria-media-library.php:4100
#, php-format
msgid "%foldername - replaces image folder name"
msgstr "%foldername  - remplace le nom du dossier des images"

#: ../maxgalleria-media-library.php:4116
msgid "Settings"
msgstr "Réglages"

#: ../maxgalleria-media-library.php:4121
msgid "Turn on Image SEO:"
msgstr "Activer le SEO sur les images :"

#: ../maxgalleria-media-library.php:4126
msgid "Image ALT attribute:"
msgstr "Image - Alternative textuelle (attribut ALT) :"

#: ../maxgalleria-media-library.php:4128 ../maxgalleria-media-library.php:4133
msgid "example"
msgstr "exemple"

#: ../maxgalleria-media-library.php:4131
msgid "Image Title attribute:"
msgstr "Image - Titre (attribut TITLE) :"

#: ../maxgalleria-media-library.php:4136
msgid "Update Settings"
msgstr "Mettre à jour les réglages"

#: ../maxgalleria-media-library.php:4179
msgid "The Image SEO setting have been updated "
msgstr "Le paramètre de SEO sur les images a été mis à jour "

#: ../maxgalleria-media-library.php:4288
msgid "Support - System Information"
msgstr "Support - Information système"

#: ../maxgalleria-media-library.php:4302
msgid ""
"You may be asked to provide the information below to help troubleshoot your "
"issue."
msgstr ""
"Vous devrez peut-être fournir les informations ci-dessous pour nous aider à "
"résoudre votre problème."

#: ../maxgalleria-media-library.php:4438
msgid "The selected folder, subfolders and thier files have been hidden."
msgstr ""
"Le dossier sélectionné, ses sous-dossiers et ses fichiers ont été masqués."
````

## File: Old Plugin/languages/maxgalleria-media-library-it_IT.po
````
msgid ""
msgstr ""
"Project-Id-Version: Media Library Folders\n"
"Report-Msgid-Bugs-To: \n"
"POT-Creation-Date: 2018-03-30 10:02+0200\n"
"PO-Revision-Date: 2018-03-30 11:39+0200\n"
"Last-Translator: Adriano Fabri\n"
"Language-Team: Italian (Italy)\n"
"Language: it-IT\n"
"Plural-Forms: nplurals=2; plural=n != 1;\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Loco https://localise.biz\n"
"X-Loco-Source-Locale: en\n"
"X-Loco-Project-Id: 45067\n"
"X-Loco-Api-Version: 1.0.19 20180328-1"

#: ../includes/mlf_support.php:14 ../maxgalleria-media-library.php:790
#: loco:5abe0565a39ff346778b4567
msgid "Support"
msgstr "Supporto"

#: ../includes/mlf_support.php:19 ../maxgalleria-media-library.php:916
#: ../maxgalleria-media-library.php:3981 ../maxgalleria-media-library.php:4252
#: loco:5abe0565a39ff346778b4568
msgid "Makers of"
msgstr "Produttori di"

#: ../includes/mlf_support.php:19 ../maxgalleria-media-library.php:916
#: ../maxgalleria-media-library.php:3981 ../maxgalleria-media-library.php:4252
#: loco:5abe0565a39ff346778b4569
msgid "and"
msgstr "e"

#: ../includes/mlf_support.php:20 ../maxgalleria-media-library.php:917
#: ../maxgalleria-media-library.php:3982 ../maxgalleria-media-library.php:4253
#: loco:5abe0565a39ff346778b456a
msgid "Click here to"
msgstr "Clicca qui per"

#: ../includes/mlf_support.php:20 ../maxgalleria-media-library.php:917
#: ../maxgalleria-media-library.php:3982 ../maxgalleria-media-library.php:4253
#: loco:5abe0565a39ff346778b456b
msgid "Fix Common Problems"
msgstr "Risolvi Problemi Comuni"

#: ../includes/mlf_support.php:21 ../maxgalleria-media-library.php:918
#: ../maxgalleria-media-library.php:3983 ../maxgalleria-media-library.php:4254
#: loco:5abe0565a39ff346778b456c
msgid "Need help? Click here for"
msgstr "Hai bisogno di aiuto? Clicca qui per"

#: ../includes/mlf_support.php:21 ../maxgalleria-media-library.php:918
#: ../maxgalleria-media-library.php:3983 ../maxgalleria-media-library.php:4254
#: loco:5abe0565a39ff346778b456d
msgid "Awesome Support!"
msgstr "Supporto Incredibile!"

#: ../includes/mlf_support.php:22 ../maxgalleria-media-library.php:919
#: ../maxgalleria-media-library.php:3984 ../maxgalleria-media-library.php:4255
#: loco:5abe0565a39ff346778b456e
msgid "Or Email Us at"
msgstr "Oppure inviaci una email a"

#: ../includes/mlf_support.php:32 loco:5abe0565a39ff346778b456f
msgid "Troubleshooting Tips"
msgstr "Suggerimenti per la risoluzione dei problemi"

#: ../includes/mlf_support.php:33 loco:5abe0565a39ff346778b4570
msgid "Troubleshooting Articles"
msgstr "Articoli per la risoluzione dei problemi"

#: ../includes/mlf_support.php:34 loco:5abe0565a39ff346778b4571
msgid "System Information</a>"
msgstr "Informazioni di Sistema</a>"

#: ../includes/mlf_support.php:40 loco:5abe0565a39ff346778b4572
msgid "Folder Tree Not Loading"
msgstr "L'albero delle cartelle non si carica"

#: ../includes/mlf_support.php:42 loco:5abe0565a39ff346778b4573
msgid ""
"Users who report this issue can usually fix it by running the Media Library "
"Folders Reset plugin that comes with Media Library Folders."
msgstr ""
"Gli utenti che segnalano questo problema in genere possono risolverlo "
"eseguendo il plug-in Media Library Folders Reset fornito con Media Library "
"Folders."

#: ../includes/mlf_support.php:44 loco:5abe0565a39ff346778b4574
msgid ""
"1. First make sure you have installed the latest version of Media Library "
"Folders."
msgstr ""
"1. Prima assicurati di avere installato la versione più recente di Media "
"Library Folders."

#: ../includes/mlf_support.php:45 loco:5abe0565a39ff346778b4575
msgid ""
"2. Deactivate Media Library Folders and activate Media Library Folders Reset "
"and run the Reset Database option from the Media Library Folders Reset sub "
"menu in the dashboard."
msgstr ""
"2. Disattivare Media Library Folders e attivare Media Library Folders Reset "
"ed eseguire l'opzione Ripristina database dal sottomenu Media Library "
"Folders Reset nella dashboard."

#: ../includes/mlf_support.php:46 loco:5abe0565a39ff346778b4576
msgid ""
"3. After that, reactivate Media Library Folders. It will do a fresh scan of "
"your media library database and no changes will be made to the files or "
"folders on your site."
msgstr ""
"3. Successivamente, riattivare Media Library Folders. Effettuerà una nuova "
"scansione del database della tua libreria multimediale e non verranno "
"apportate modifiche ai file o alle cartelle sul tuo sito."

#: ../includes/mlf_support.php:49 loco:5abe0565a39ff346778b4577
msgid "How to Unhide a Hidden Folder"
msgstr "Come visualizzare una cartella nascosta"

#: ../includes/mlf_support.php:52 loco:5abe0565a39ff346778b4578
msgid ""
"1. Go to the hidden folder via your cPanel or FTP and remove the file ‘mlpp-"
"hidden"
msgstr ""
"1. Vai alla cartella nascosta tramite il tuo cPanel o FTP e rimuovi il file "
"'mlpp-hidden"

#: ../includes/mlf_support.php:53 loco:5abe0565a39ff346778b4579
msgid ""
"2. In the Media Library Folders Menu, click the Check for New folders link. "
"This will add the folder back into Media Library Folders."
msgstr ""
"2. Nel menu Media Library Folders, fare clic sul collegamento Verifica nuove "
"cartelle. Ciò aggiungerà nuovamente la cartella in Media Library Folders."

#: ../includes/mlf_support.php:54 loco:5abe0565a39ff346778b457a
msgid ""
"3. Visit the unhidden folder in Media Library Folders and click the Sync "
"button to add contents of the folder. Before doing this, check to see that "
"there are no thumbnail images in the current folder since these will be "
"regenerated automatically; these usually have file names such as image-name-"
"150×150.jpg, etc."
msgstr ""
"3. Visitare la cartella non nascosta in Media Library Folders e fare clic "
"sul pulsante Sincronizza per aggiungere il contenuto della cartella. Prima "
"di fare ciò, verificare che non ci siano immagini in miniatura nella "
"cartella corrente poiché queste verranno rigenerate automaticamente; questi "
"di solito hanno nomi di file come nome immagine-150×150.jpg, ecc."

#: ../includes/mlf_support.php:55 loco:5abe0565a39ff346778b457b
msgid "4. Repeat step 3 for each sub folder."
msgstr "4. Ripeti lo step 3 per ogni cartella."

#: ../includes/mlf_support.php:58 loco:5abe0565a39ff346778b457c
msgid ""
"Folders and images added to the site by FTP are not showing up in Media "
"Library Folders"
msgstr ""
"Cartelle e immagini aggiunte al sito tramite FTP non vengono visualizzate in "
"Media Library Folders"

#: ../includes/mlf_support.php:60 loco:5abe0565a39ff346778b457d
msgid ""
"Media Library Folders does not work like the file manager on you computer. "
"It only display images and folders that have been added to the Media Library "
"database. To display new folders that have not been added through the Media "
"Library Folders you can click the Check for new folders option in the  Media "
"Library Folders submenu in the Wordpress Dashboard. If you allow Wordpress "
"to store images by year and month folders, then you should click the option "
"once each month to add these auto-generated folders."
msgstr ""
"Media Library Folders non funziona come il file manager sul tuo computer. "
"Visualizza solo immagini e cartelle che sono state aggiunte al database "
"della libreria multimediale. Per visualizzare nuove cartelle che non sono "
"state aggiunte tramite Media Library Folders, è possibile fare clic "
"sull'opzione Cerca nuove cartelle nel sottomenu Media Library Folders nella "
"dashboard di Wordpress. Se si consente a Wordpress di memorizzare immagini "
"per cartelle anno e mese, è necessario fare clic sull'opzione una volta al "
"mese per aggiungere queste cartelle generate automaticamente."

#: ../includes/mlf_support.php:62 loco:5abe0565a39ff346778b457e
msgid ""
"To add images that were upload to the site via the cPanel or by FTP, "
"navigate to the folder containing the images in  Media Library Folders and "
"click the Sync button. This will scan the folder looking images not "
"currently found in the Media Library for that folder. The Sync function only "
"scans the current folder. If there are subfolders, you will need to "
"individually sync them."
msgstr ""
"Per aggiungere immagini che sono state caricate sul sito tramite cPanel o "
"tramite FTP, accedere alla cartella contenente le immagini in Media Library "
"Folders e fare clic sul pulsante Sincronizza. Scansionerà la cartella alla "
"ricerca di immagini che non si trovano attualmente nel Catalogo multimediale "
"per quella cartella. La funzione di sincronizzazione esegue solo la "
"scansione della cartella corrente. Se ci sono sottocartelle, dovrai "
"sincronizzarle individualmente."

#: ../includes/mlf_support.php:64 loco:5abe0565a39ff346778b457f
msgid "Folders Loads Indefinitely"
msgstr "Le cartelle vengono caricate a tempo indeterminato"

#: ../includes/mlf_support.php:66 loco:5abe0565a39ff346778b4580
msgid ""
"This happens when a parent folder is missing from the folder data. To fix "
"this you will need to perform a reset of the Media Library Folders database. "
"To do this, deactivate Media Library Folders and activate Media Library "
"Folders Reset and select the Reset Database option. Once the reset has "
"completed, reactivate Media Library Folders and it will do a fresh scan of "
"the Media Library data."
msgstr ""
"Ciò accade quando manca una cartella principale dai dati della cartella. Per "
"risolvere questo problema è necessario eseguire un ripristino del database "
"di Media Library Folders. Per fare ciò, disattivare le cartelle della "
"libreria multimediale e attivare Media Library Folders Reset e selezionare "
"l'opzione Ripristina database. Una volta completato il ripristino, "
"riattivare Media Library Folders e eseguirà una nuova scansione dei dati "
"della libreria multimediale."

#: ../includes/mlf_support.php:68 loco:5abe0565a39ff346778b4581
msgid "Unable to Insert files from Media Library Folders into Posts or Pages"
msgstr "Impossibile inserire file da Media Library Folders in post o pagine"

#: ../includes/mlf_support.php:70 loco:5abe0565a39ff346778b4582
msgid ""
"For inserting images and files into posts and pages you will have to use the "
"existing Media Library. The ability to insert items from the Media Library "
"Folders user interface is only available in"
msgstr ""
"Per inserire immagini e file in post e pagine è necessario utilizzare la "
"libreria multimediale esistente. La possibilità di inserire elementi "
"dall'interfaccia utente di Media Library Folders è disponibile solo in"

#: ../includes/mlf_support.php:70 loco:5abe0565a39ff346778b4583
msgid ""
"This does not mean you cannot insert files added to Media Library Folders "
"into any Wordpress posts or pages. Media Library Folders adds a folder user "
"interface and file operations to the existing media library and it does not "
"add a second media library. Since all the images are in the same media "
"library there is no obstacle to inserting them anywhere Wordpress allows "
"media files to be inserted. There is just no folder tree available in the "
"media library insert window for locating images in a particular folder. We "
"chose to include the folder tree for inserting images in posts and page in "
"the Pro version along with other features in order to fund the cost of "
"providing free technical support and continued development of the plugin."
msgstr ""
"Ciò non significa che non è possibile inserire file aggiunti a Media Library "
"Folders in qualsiasi post o pagina di Wordpress. Media Library Folders "
"aggiunge un'interfaccia utente della cartella e operazioni sui file alla "
"libreria multimediale esistente e non aggiunge una seconda libreria "
"multimediale. Poiché tutte le immagini si trovano nella stessa libreria "
"multimediale, non vi è alcun ostacolo ad inserirle ovunque Wordpress "
"consente l'inserimento di file multimediali. Non c'è solo albero delle "
"cartelle disponibile nella finestra di inserimento della libreria "
"multimediale per localizzare le immagini in una particolare cartella. "
"Abbiamo scelto di includere l'albero delle cartelle per l'inserimento delle "
"immagini nei post e nella pagina nella versione Pro insieme ad altre "
"funzionalità al fine di finanziare il costo di fornire supporto tecnico "
"gratuito e lo sviluppo continuo del plug-in."

#: ../includes/mlf_support.php:72 loco:5abe0565a39ff346778b4584
msgid "Unable to Update Media Library Folders Reset"
msgstr "Impossibile aggiornare Media Library Folders Reset"

#: ../includes/mlf_support.php:74 loco:5abe0565a39ff346778b4585
msgid ""
"Media Library Folders Reset is maintenance and diagnostic plugin that is "
"included with Media Library Folders. It automatically updates when Media "
"Library Folders is updated. There is no need to updated it  separately. "
"Users should leave the reset plugin deactivated until it is needed in order "
"to avoid accidentally deleting your site's folder data."
msgstr ""
"Media Library Folders Reset è un plug-in di manutenzione e diagnostica "
"incluso con Media Library Folders. Si aggiorna automaticamente quando le "
"cartelle della libreria multimediale vengono aggiornate. Non è necessario "
"aggiornarlo separatamente. Gli utenti devono lasciare disattivato il plug-in "
"di ripristino fino a quando non è necessario per evitare di eliminare "
"accidentalmente i dati delle cartelle del proprio sito."

#: ../includes/mlf_support.php:76 loco:5abe0565a39ff346778b4586
msgid "Images Not Found After Changing the Location of Uploads Folder"
msgstr ""
"Immagini non trovate dopo aver cambiato la posizione della cartella Uploads"

#: ../includes/mlf_support.php:78 loco:5abe0565a39ff346778b4587
msgid ""
"If you change the location of the uploads folder, your existing files and "
"images will not be moved to the new location. You will need to delete them "
"from media library and upload them again. Also you will need to perform a "
"reset of the Media Library Folders database. To do this, deactivate Media "
"Library Folders and activate Media Library Folders Reset and select the "
"Reset Database option. Once the reset has completed, reactivate Media "
"Library Folders and it will do a fresh scan of the Media Library data."
msgstr ""
"Se si modifica la posizione della cartella di upload, i file e le immagini "
"esistenti non verranno spostati nella nuova posizione. Dovrai eliminarli "
"dalla libreria multimediale e caricarli di nuovo. Inoltre, sarà necessario "
"eseguire un ripristino del database di Media Library Folders. Per fare ciò, "
"disattivare Media Library Folders e attivare Media Library Folders Reset e "
"selezionare l'opzione Ripristina database. Una volta completato il "
"ripristino, riattivare Media Library Folders e eseguirà una nuova scansione "
"dei dati della libreria multimediale."

#: ../includes/mlf_support.php:80 loco:5abe0565a39ff346778b4588
msgid "Difficulties Uploading or Dragging and Dropping a Large Number of Files"
msgstr "Difficoltà Caricamento o trascinamento di un numero elevato di file"

#: ../includes/mlf_support.php:82 loco:5abe0565a39ff346778b4589
msgid ""
"Limitations on web server processing time may cause dragging and dropping a "
"large number of files to fail. An error is generated when it takes to longer "
"then 30 seconds to move, copy or upload files. This time limitation can be "
"increased by changing the max_execution_time setting in your site's php.ini "
"file."
msgstr ""
"Limitazioni sul tempo di elaborazione del server Web possono causare il "
"trascinamento e il rilascio di un numero elevato di file. Viene generato un "
"errore quando si impiegano più di 30 secondi per spostare, copiare o "
"caricare file. Questa limitazione di tempo può essere aumentata modificando "
"l'impostazione max_execution_time nel file php.ini del tuo sito."

#: ../includes/mlf_support.php:84 loco:5abe0565a39ff346778b458a
msgid "How to Delete a Folder?"
msgstr "Come cancellare una cartella?"

#: ../includes/mlf_support.php:86 loco:5abe0565a39ff346778b458b
msgid ""
"To delete a folder, right click (Ctrl-click with Macs) on a folder. A popup "
"menu will appear with the options, 'Delete this folder?' and 'Hide this "
"folder?'. Click the delete option."
msgstr ""
"Per eliminare una cartella, fare clic con il pulsante destro del mouse (Ctrl-"
"clic con Mac) su una cartella. Un menu popup apparirà con le opzioni, "
"'Elimina questa cartella?' e 'Nascondi questa cartella?'. Fare clic "
"sull'opzione di eliminazione."

#: ../includes/mlf_support.php:105 loco:5abe0565a39ff346778b458c
msgid ""
"You may be asked to provide the information below to help troubleshoot your "
"issue."
msgstr ""
"È possibile che venga richiesto di fornire le seguenti informazioni per "
"aiutare a risolvere il problema."

#: ../maxgalleria-media-library.php:416 loco:5abe0565a39ff346778b458d
msgid "This folder was not found: "
msgstr "Questa cartella non è stata trovata: "

#: ../maxgalleria-media-library.php:459 ../maxgalleria-media-library.php:1443
#: ../maxgalleria-media-library.php:1498 ../maxgalleria-media-library.php:1527
#: ../maxgalleria-media-library.php:1546 ../maxgalleria-media-library.php:2197
#: ../maxgalleria-media-library.php:2371 ../maxgalleria-media-library.php:2484
#: ../maxgalleria-media-library.php:2733 ../maxgalleria-media-library.php:2817
#: ../maxgalleria-media-library.php:2988 ../maxgalleria-media-library.php:3118
#: ../maxgalleria-media-library.php:3146 ../maxgalleria-media-library.php:3435
#: ../maxgalleria-media-library.php:3619 ../maxgalleria-media-library.php:3847
#: ../maxgalleria-media-library.php:3910 ../maxgalleria-media-library.php:4322
#: ../maxgalleria-media-library.php:4481 ../maxgalleria-media-library.php:4671
#: ../maxgalleria-media-library.php:4683 loco:5abe0565a39ff346778b458e
msgid "missing nonce!"
msgstr "non manca nulla!"

#: ../maxgalleria-media-library.php:781 ../maxgalleria-media-library.php:910
#: loco:5abe0565a39ff346778b458f
msgid "Media Library Folders"
msgstr "Media Library Folders"

#: ../maxgalleria-media-library.php:782 ../maxgalleria-media-library.php:784
#: loco:5abe0565a39ff346778b4590
msgid "Check For New Folders"
msgstr "Controlla nuove cartelle"

#: ../maxgalleria-media-library.php:783 loco:5abe0565a39ff346778b4591
msgid "Search Library"
msgstr "Cerca nella libreria"

#: ../maxgalleria-media-library.php:787 loco:5abe0565a39ff346778b4592
msgid "Upgrade to Pro"
msgstr "Aggiorna a Pro"

#: ../maxgalleria-media-library.php:788 ../maxgalleria-media-library.php:1031
#: ../maxgalleria-media-library.php:3976 loco:5abe0565a39ff346778b4593
msgid "Regenerate Thumbnails"
msgstr "Rigenera i Thumbnails"

#: ../maxgalleria-media-library.php:789 ../maxgalleria-media-library.php:4247
#: loco:5abe0565a39ff346778b4594
msgid "Image SEO"
msgstr "Immagine SEO"

#: ../maxgalleria-media-library.php:791 ../maxgalleria-media-library.php:4283
#: loco:5abe0565a39ff346778b4595
msgid "Settings"
msgstr "Impostazioni"

#: ../maxgalleria-media-library.php:924 loco:5abe0565a39ff346778b4596
msgid "Click here to learn about the Media Library Folders Pro"
msgstr "Clicca qui per saperne di più riguardo Media Library Folders Pro"

#: ../maxgalleria-media-library.php:936 loco:5abe0565a39ff346778b4597
msgid "Current PHP version, "
msgstr "Versione PHP corrente, "

#: ../maxgalleria-media-library.php:936 loco:5abe0565a39ff346778b4598
msgid ", is outdated. Please upgrade to version 5.6."
msgstr ", è vecchio. Si prega di aggiornare alla versione 5.6."

#: ../maxgalleria-media-library.php:956 ../maxgalleria-media-library.php:1400
#: loco:5abe0565a39ff346778b4599
msgid "Location:"
msgstr "Percorso:"

#: ../maxgalleria-media-library.php:970 loco:5abe0565a39ff346778b459a
msgid "Upload new files."
msgstr "Carica file."

#: ../maxgalleria-media-library.php:970 loco:5abe0565a39ff346778b459b
msgid "Add File"
msgstr "Aggiungi File"

#: ../maxgalleria-media-library.php:972 loco:5abe0565a39ff346778b459c
msgid ""
"Create a new folder. Type in a folder name (do not use spaces, single or "
"double quote marks) and click Create Folder."
msgstr ""
"Crea una nuova cartella. Il nome non può contenere spazi, apici e virgolette."

#: ../maxgalleria-media-library.php:972 loco:5abe0565a39ff346778b459d
msgid "Add Folder"
msgstr "Aggiungi Cartella"

#: ../maxgalleria-media-library.php:985 loco:5abe0565a39ff346778b459e
msgid ""
"When moving/copying to a new folder place your pointer, not the image, on "
"the folder where you want the file(s) to go."
msgstr ""
"Quando si sposta/copia in una nuova cartella, posizionare il puntatore, non "
"l'immagine, sulla cartella in cui si desidera che i file vadano."

#: ../maxgalleria-media-library.php:986 loco:5abe0565a39ff346778b459f
msgid ""
"To drag multiple images, check the box under the files you want to move and "
"then drag one of the images to the desired folder."
msgstr ""
"Per trascinare più immagini, selezionare la casella sotto i file che si "
"desidera spostare e quindi trascinare una delle immagini nella cartella "
"desiderata."

#: ../maxgalleria-media-library.php:987 loco:5abe0565a39ff346778b45a0
msgid ""
"To move/copy to a folder nested under the top level folder click the "
"triangle to the left of the folder to show the nested folder that is your "
"target."
msgstr ""
"Per spostare/copiare in una cartella annidata sotto la cartella di livello "
"superiore, fai clic sul triangolo a sinistra della cartella per mostrare la "
"cartella nidificata che è il tuo obiettivo."

#: ../maxgalleria-media-library.php:988 loco:5abe0565a39ff346778b45a1
msgid ""
"To delete a folder, right click on the folder and a popup menu will appear. "
"Click on the option, \"Delete this folder?\" If the folder is empty, it will "
"be deleted."
msgstr ""
"Per eliminare una cartella, fare clic con il tasto destro sulla cartella e "
"verrà visualizzato un menu a comparsa. Fai clic sull'opzione \"Elimina "
"questa cartella?\" Se la cartella è vuota, verrà eliminata."

#: ../maxgalleria-media-library.php:989 loco:5abe0565a39ff346778b45a2
msgid ""
"To hide a folder and all its sub folders and files, right click on a folder, "
"On the popup menu that appears, click \"Hide this folder?\" and those "
"folders and files will be removed from the Media Library, but not from the "
"server."
msgstr ""
"Per nascondere una cartella e tutte le sue sottocartelle e file, fai clic "
"con il tasto destro su una cartella, Nel menu popup che appare, fai clic su "
"\"Nascondi questa cartella?\" e tali cartelle e file verranno rimossi dalla "
"libreria multimediale, ma non dal server."

#: ../maxgalleria-media-library.php:1003 loco:5abe0565a39ff346778b45a3
msgid ""
"Move/Copy Toggle. Move or copy selected files to a different folder.<br> "
"When move is selected, images links in posts and pages will be updated.<br> "
"<span class='mlp-warning'>Images IDs used in Jetpack Gallery shortcodes will "
"not be updated.</span>"
msgstr ""
"Interruttore Sposta/Copia. Sposta o copia i file selezionati in una cartella "
"diversa. <br> Quando viene selezionato lo spostamento, verranno aggiornati i "
"collegamenti delle immagini nei post e nelle pagine. <br> <span class='mlp-"
"warning'> Gli ID delle immagini utilizzati negli shortcode della Galleria "
"Jetpack non saranno aggiornati.</ span>"

#: ../maxgalleria-media-library.php:1012 loco:5abe0565a39ff346778b45a4
msgid ""
"Rename a file; select only one file. Folders cannot be renamed. Type in a "
"new name with no spaces and without the extention and click Rename."
msgstr ""
"Rinomina un file: selezionare solo un file. Le cartelle non possono essere "
"rinominate. Il nome non può contenere spazi, apici e virgolette."

#: ../maxgalleria-media-library.php:1012 ../maxgalleria-media-library.php:1071
#: loco:5abe0565a39ff346778b45a5
msgid "Rename"
msgstr "Rinomina"

#: ../maxgalleria-media-library.php:1014 loco:5abe0565a39ff346778b45a6
msgid "Delete selected files."
msgstr "Cancella i files selezionati."

#: ../maxgalleria-media-library.php:1014 loco:5abe0565a39ff346778b45a7
msgid "Delete"
msgstr "Cancella"

#: ../maxgalleria-media-library.php:1016 loco:5abe0565a39ff346778b45a8
msgid "Select or unselect all files in the folder."
msgstr "Seleziona o deseleziona tutti i file nella cartella."

#: ../maxgalleria-media-library.php:1016 loco:5abe0565a39ff346778b45a9
msgid "Select/Unselect All"
msgstr "Seleziona/Deseleziona tutti"

#: ../maxgalleria-media-library.php:1019 loco:5abe0565a39ff346778b45aa
msgid "Sort by Name"
msgstr "Ordina per Nome"

#: ../maxgalleria-media-library.php:1020 loco:5abe0565a39ff346778b45ab
msgid "Sort by Date"
msgstr "Ordina per Data"

#: ../maxgalleria-media-library.php:1024 loco:5abe0565a39ff346778b45ac
msgid "Search"
msgstr "Cerca"

#: ../maxgalleria-media-library.php:1027 loco:5abe0565a39ff346778b45ad
msgid "Sync the contents of the current folder with the server"
msgstr "Sincronizza il contenuto della cartella corrente con il server"

#: ../maxgalleria-media-library.php:1027 loco:5abe0565a39ff346778b45ae
msgid "Sync"
msgstr "Sincronizza"

#: ../maxgalleria-media-library.php:1031 loco:5abe0565a39ff346778b45af
msgid "Regenerates the thumbnails of selected images"
msgstr "Rigenera i Thumbnails delle immagini selezionate"

#: ../maxgalleria-media-library.php:1034 loco:5abe0565a39ff346778b45b0
msgid ""
"Add images to an existing MaxGalleria gallery. Folders can not be added to a "
"gallery. Images already in the gallery will not be added. "
msgstr ""
"Aggiungi immagini a una galleria MaxGallery esistente. Le cartelle non "
"possono essere aggiunte a una galleria. Le immagini già nella galleria non "
"verranno aggiunte. "

#: ../maxgalleria-media-library.php:1034 loco:5abe0565a39ff346778b45b1
msgid "Add to MaxGalleria Gallery"
msgstr "Aggiungi alla galleria MaxGallery"

#: ../maxgalleria-media-library.php:1055 loco:5abe0565a39ff346778b45b2
msgid "Drag & Drop Files Here"
msgstr "Drag & Drop dei Files"

#: ../maxgalleria-media-library.php:1056 loco:5abe0565a39ff346778b45b3
msgid "or select a file or image to upload:"
msgstr "o seleziona un file o un'immagine da caricare:"

#: ../maxgalleria-media-library.php:1059 loco:5abe0565a39ff346778b45b4
msgid "Upload Image"
msgstr "Carica immagine"

#: ../maxgalleria-media-library.php:1062 loco:5abe0565a39ff346778b45b5
msgid "Image Title Text:"
msgstr "Testo \"Title\" dell'Immagine:"

#: ../maxgalleria-media-library.php:1063 loco:5abe0565a39ff346778b45b6
msgid "Image ALT Text:"
msgstr "Testo \"ALT\" dell'Immagine:"

#: ../maxgalleria-media-library.php:1070 loco:5abe0565a39ff346778b45b7
msgid "File Name: "
msgstr "Nome del File: "

#: ../maxgalleria-media-library.php:1106 loco:5abe0565a39ff346778b45b8
msgid "Add Images"
msgstr "Aggiungi Immagini"

#: ../maxgalleria-media-library.php:1117 loco:5abe0565a39ff346778b45b9
msgid "Folder Name: "
msgstr "Nome della Cartella: "

#: ../maxgalleria-media-library.php:1118 loco:5abe0565a39ff346778b45ba
msgid "Create Folder"
msgstr "Crea nuova cartella"

#: ../maxgalleria-media-library.php:1735 loco:5abe0565a39ff346778b45bb
msgid "Delete this folder?"
msgstr "Cancellare questa cartella?"

#: ../maxgalleria-media-library.php:1744 loco:5abe0565a39ff346778b45bc
msgid "Are you sure you want to delete the selected folder?"
msgstr "Sei sicuro di voler cancellare la cartella selezionata?"

#: ../maxgalleria-media-library.php:1776 loco:5abe0565a39ff346778b45bd
msgid "Hide this folder?"
msgstr "Nascondere questa cartella?"

#: ../maxgalleria-media-library.php:1782 loco:5abe0565a39ff346778b45be
msgid ""
"Are you sure you want to hide the selected folder and all its sub folders "
"and files?"
msgstr ""
"Sei sicuro di vole nascondere la cartella selezionata e tutto il suo "
"contenuto?"

#: ../maxgalleria-media-library.php:2089 loco:5abe0565a39ff346778b45bf
msgid "No files were found."
msgstr "Nessun file è stato trovato."

#: ../maxgalleria-media-library.php:2250 loco:5abe0565a39ff346778b45c0
msgid "The folder was created."
msgstr "La cartella è stata creata."

#: ../maxgalleria-media-library.php:2256 loco:5abe0565a39ff346778b45c1
msgid "There was a problem creating the folder."
msgstr "C'è stato un problema durante la creazione della cartella."

#: ../maxgalleria-media-library.php:2263 loco:5abe0565a39ff346778b45c2
msgid "The folder already exists."
msgstr "La cartella già esiste."

#: ../maxgalleria-media-library.php:2415 loco:5abe0565a39ff346778b45c3
msgid "The folder, "
msgstr "La cartella, "

#: ../maxgalleria-media-library.php:2415 loco:5abe0565a39ff346778b45c4
msgid ", is not empty. Please delete or move files from the folder"
msgstr ""
", non è vuota. Si prega di cancellare o spostare i files contenuti nella "
"cartella"

#: ../maxgalleria-media-library.php:2431 ../maxgalleria-media-library.php:2444
#: loco:5abe0565a39ff346778b45c5
msgid "The folder was deleted."
msgstr "La cartella è stata cancellata."

#: ../maxgalleria-media-library.php:2433 loco:5abe0565a39ff346778b45c6
msgid "The folder could not be deleted."
msgstr "La cartella non può essere cancellata."

#: ../maxgalleria-media-library.php:2454 loco:5abe0565a39ff346778b45c7
msgid "The file(s) were deleted"
msgstr "I files sono stati cancellati"

#: ../maxgalleria-media-library.php:2456 loco:5abe0565a39ff346778b45c8
msgid "The file(s) were not deleted"
msgstr "I files non sono stati cancellati"

#: ../maxgalleria-media-library.php:2558 loco:5abe0565a39ff346778b45c9
msgid "Unable to copy the file; please check the folder and file permissions."
msgstr "Unable to copy the file; please check the folder and file permissions."

#: ../maxgalleria-media-library.php:2651 loco:5abe0565a39ff346778b45ca
msgid "Updating attachment links, please wait..."
msgstr "Aggiornamento dei collegamenti degli allegati, attendere ..."

#: ../maxgalleria-media-library.php:2656 loco:5abe0565a39ff346778b45cb
msgid ""
"Unable to move the file(s); please check the folder and file permissions."
msgstr ""
"Impossibile spostare i files; per favore controlla la cartella e i permessi "
"dei file."

#: ../maxgalleria-media-library.php:2663 loco:5abe0565a39ff346778b45cc
msgid "The destination is not a folder: "
msgstr "La destinazione non è una cartella: "

#: ../maxgalleria-media-library.php:2669 loco:5abe0565a39ff346778b45cd
msgid "Cannot find destination folder: "
msgstr "La cartella di destinazione non è stata trovata: "

#: ../maxgalleria-media-library.php:2675 loco:5abe0565a39ff346778b45ce
msgid "Coping or moving a folder is not allowed."
msgstr "La copia o lo spostamento di una cartella non è consentito."

#: ../maxgalleria-media-library.php:2681 loco:5abe0565a39ff346778b45cf
msgid "Cannot find the file: "
msgstr "Il file non è stato trovato: "

#: ../maxgalleria-media-library.php:2688 loco:5abe0565a39ff346778b45d0
msgid "The file(s) were copied to "
msgstr "I files sono stati copiati nella cartella: "

#: ../maxgalleria-media-library.php:2690 loco:5abe0565a39ff346778b45d1
msgid "The file(s) were not copied."
msgstr "I files non sono stati copiati."

#: ../maxgalleria-media-library.php:2694 loco:5abe0565a39ff346778b45d2
msgid "The file(s) were moved to "
msgstr "I files sono stati spostati nella cartella: "

#: ../maxgalleria-media-library.php:2696 loco:5abe0565a39ff346778b45d3
msgid "The file(s) were not moved."
msgstr "I file non sono stati spostati."

#: ../maxgalleria-media-library.php:2806 loco:5abe0565a39ff346778b45d4
msgid "The images were added."
msgstr "Le immagini sono state aggiunte."

#: ../maxgalleria-media-library.php:2858 ../maxgalleria-media-library.php:2958
#: loco:5abe0565a39ff346778b45d5
msgid "No files were found matching that name."
msgstr "Nessun file con quel nome è stato trovato."

#: ../maxgalleria-media-library.php:2876 loco:5abe0565a39ff346778b45d6
msgid "Back to Media Library Folders"
msgstr "Torna a Media Library Folders"

#: ../maxgalleria-media-library.php:2881 loco:5abe0565a39ff346778b45d7
msgid ""
"Click on an image to go to its folder or a on folder to view its contents."
msgstr ""
"Clicca sull'immagine per andare nella relativa cartella oppure su una "
"cartella per vedere il suo contenuto."

#: ../maxgalleria-media-library.php:2884 loco:5abe0565a39ff346778b45d8
msgid "Search results for: "
msgstr "Risultati per: "

#: ../maxgalleria-media-library.php:3010 loco:5abe0565a39ff346778b45d9
msgid "Invalid file name."
msgstr "Nome di file non valido."

#: ../maxgalleria-media-library.php:3015 loco:5abe0565a39ff346778b45da
msgid "The file name cannot contain spaces or tabs."
msgstr "Il nome del file non può contenere spazi o tabulazioni."

#: ../maxgalleria-media-library.php:3107 loco:5abe0565a39ff346778b45db
msgid "Updating attachment links, please wait...The file was renamed"
msgstr ""
"Aggiornamento dei collegamenti degli allegati, attendere ... Il file è stato "
"rinominato"

#: ../maxgalleria-media-library.php:3130 loco:5abe0565a39ff346778b45dc
msgid "Sorting by date."
msgstr "Ordinamento per data."

#: ../maxgalleria-media-library.php:3134 loco:5abe0565a39ff346778b45dd
msgid "Sorting by name."
msgstr "Ordinamento per nome."

#: ../maxgalleria-media-library.php:3188 loco:5abe0565a39ff346778b45de
msgid "Scaning for new folders in "
msgstr "Ricerca per nuove cartelle "

#: ../maxgalleria-media-library.php:3215 ../maxgalleria-media-library.php:3243
#: ../maxgalleria-media-library.php:3264 ../maxgalleria-media-library.php:3299
#: loco:5abe0565a39ff346778b45df
msgid "Adding"
msgstr "Aggiungendo"

#: ../maxgalleria-media-library.php:3277 loco:5abe0565a39ff346778b45e0
msgid "No new folders were found."
msgstr "Nessuna nuova cartella è stata trovata."

#: ../maxgalleria-media-library.php:3396 loco:5abe0565a39ff346778b45e1
msgid "Rate us Please!"
msgstr "Vota per Noi!"

#: ../maxgalleria-media-library.php:3397 loco:5abe0565a39ff346778b45e2
msgid ""
"Your rating is the simplest way to support Media Library Folders. We really "
"appreciate it!"
msgstr ""
"La tua valutazione è il modo più semplice per supportare le cartelle della "
"libreria multimediale. Lo apprezziamo davvero!"

#: ../maxgalleria-media-library.php:3400 loco:5abe0565a39ff346778b45e3
msgid "I've already left a review"
msgstr "Ho già lasciato una recensione"

#: ../maxgalleria-media-library.php:3401 loco:5abe0565a39ff346778b45e4
msgid "Maybe Later"
msgstr "Forse dopo"

#: ../maxgalleria-media-library.php:3402 loco:5abe0565a39ff346778b45e5
msgid "Sure! I'd love to!"
msgstr "Sicuro! Lo amo!"

#: ../maxgalleria-media-library.php:3861 loco:5abe0565a39ff346778b45e6
msgid "Media Library Folders Settings"
msgstr "Media Library Folders - Impostazioni"

#: ../maxgalleria-media-library.php:3869 loco:5abe0565a39ff346778b45e7
msgid "Disable floating file tree"
msgstr "Disabilita albero dei file mobile"

#: ../maxgalleria-media-library.php:3943 loco:5abe0565a39ff346778b45e8
msgid "Error: "
msgstr "Errore: "

#: ../maxgalleria-media-library.php:3947 loco:5abe0565a39ff346778b45e9
#, php-format
msgid "Unknown error with %s"
msgstr "Errore sconosciuto con %s"

#: ../maxgalleria-media-library.php:3958 loco:5abe0565a39ff346778b45ea
#, php-format
msgid "Thumbnails have been regenerated for %d image(s)"
msgstr "Il Thumbnail è stato generato per le seguenti immagini %d"

#: ../maxgalleria-media-library.php:3997 loco:5abe0565a39ff346778b45eb
msgid "Cheatin&#8217; uh?"
msgstr "Ti ho ingannato?"

#: ../maxgalleria-media-library.php:4008 loco:5abe0565a39ff346778b45ec
#, php-format
msgid "Unable to find any images. Are you sure <a href='%s'>some exist</a>?"
msgstr ""
"Impossibile trovare immagini. Sei sicuro <a href='%s'>che ne esista "
"qualcuna</a>?"

#: ../maxgalleria-media-library.php:4019 loco:5abe0565a39ff346778b45ed
msgid ""
"Please wait while the thumbnails are regenerated. This may take a while."
msgstr ""
"Attendere finché i thumbnails non sono stati rigenerati. Ci potrebbe volere "
"qualche minuto dipende dalla quantità di immagini contenute nel sito."

#: ../maxgalleria-media-library.php:4023 loco:5abe0565a39ff346778b45ee
#, php-format
msgid "To go back to the previous page, <a href=\"%s\">click here</a>."
msgstr "Per tornare alla pagina precedente, <a href=\"%s\">clicca qui</a>."

#: ../maxgalleria-media-library.php:4024 loco:5abe0565a39ff346778b45ef
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a "
"href=\"%4$s\">click here</a>. %5$s"
msgstr ""
"Tutto fatto! Le immagini %1$s sono state correttamente ridimensionate in "
"%2$s secondi e ci sono stati %3$s errori. Per provare nuovamente a "
"rigenerare le immagini <a href=\"%4$s\">clicca qui</a>. %5$s"

#: ../maxgalleria-media-library.php:4025 loco:5abe0565a39ff346778b45f0
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""
"Tutto fatto! Le immagini %1$s sono state correttamente ridimensionate in "
"%2$s secondi e non ci sono stati errori. %3$s"

#: ../maxgalleria-media-library.php:4029 ../maxgalleria-media-library.php:4175
#: loco:5abe0565a39ff346778b45f1
msgid "You must enable Javascript in order to proceed!"
msgstr "Devi abilitare Javascript per poter procedere!"

#: ../maxgalleria-media-library.php:4035 loco:5abe0565a39ff346778b45f2
msgid "Abort Resizing Images"
msgstr "Annullato ridimensionamento dell'immagine"

#: ../maxgalleria-media-library.php:4037 loco:5abe0565a39ff346778b45f3
msgid "Debugging Information"
msgstr "Informazioni di Debug"

#: ../maxgalleria-media-library.php:4040 loco:5abe0565a39ff346778b45f4
#, php-format
msgid "Total Images: %s"
msgstr "Immagini totali: %s"

#: ../maxgalleria-media-library.php:4041 loco:5abe0565a39ff346778b45f5
#, php-format
msgid "Images Resized: %s"
msgstr "Immagine ridimensionata: %s"

#: ../maxgalleria-media-library.php:4042 loco:5abe0565a39ff346778b45f6
#, php-format
msgid "Resize Failures: %s"
msgstr "Errori di ridimensionamento: %s"

#: ../maxgalleria-media-library.php:4073 loco:5abe0565a39ff346778b45f7
msgid "Stopping..."
msgstr "Sto arrestando..."

#: ../maxgalleria-media-library.php:4125 loco:5abe0565a39ff346778b45f8
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""
"La richiesta di ridimensionamento è stata interrotta (ID %s). Questo "
"probabilmente è dovuto alla dimensione dell'immagine che supera la memoria "
"disponibile o qualche altro tipo di errore fatale."

#: ../maxgalleria-media-library.php:4168 loco:5abe0565a39ff346778b45f9
msgid ""
"Click the button below to regenerate thumbnails for all images in the Media "
"Library. This is helpful if you have added new thumbnail sizes to your site. "
"Existing thumbnails will not be removed to prevent breaking any links."
msgstr ""
"Clicca il seguente pulsante per rigenerare i thumbnails per tutte le "
"immagini."

#: ../maxgalleria-media-library.php:4170 loco:5abe0565a39ff346778b45fa
msgid ""
"You can regenerate thumbnails for individual images from the Media Library "
"Folders page by checking the box below one or more images and clicking the "
"Regenerate Thumbnails button. The regenerate operation is not reversible but "
"you can always generate the sizes you need by adding additional thumbnail "
"sizes to your theme."
msgstr ""
"È possibile rigenerare le anteprime per le singole immagini dalla pagina "
"Cartelle libreria multimediale selezionando la casella sotto una o più "
"immagini e facendo clic sul pulsante Rigenera anteprime. L'operazione di "
"rigenerazione non è reversibile, ma puoi sempre generare le dimensioni "
"necessarie aggiungendo dimensioni di anteprima aggiuntive al tema."

#: ../maxgalleria-media-library.php:4173 loco:5abe0565a39ff346778b45fb
msgid "Regenerate All Thumbnails"
msgstr "Rigenera tutti i Thumbnails"

#: ../maxgalleria-media-library.php:4199 loco:5abe0565a39ff346778b45fc
#, php-format
msgid "Failed resize: %s is an invalid image ID."
msgstr "Ridimensionamento fallito: %s è un ID non valido per una immagine."

#: ../maxgalleria-media-library.php:4202 loco:5abe0565a39ff346778b45fd
msgid "Your user account doesn't have permission to resize images"
msgstr "Il tuo account utente non ha il permesso di ridimensionare le immagini"

#: ../maxgalleria-media-library.php:4207 loco:5abe0565a39ff346778b45fe
#, php-format
msgid "The originally uploaded image file cannot be found at %s"
msgstr "L'immagine originale caricata, non è stata trovata in %s"

#: ../maxgalleria-media-library.php:4216 loco:5abe0565a39ff346778b45ff
msgid "Unknown failure reason."
msgstr "Motivo del fallimento sconosciuto."

#: ../maxgalleria-media-library.php:4221 loco:5abe0565a39ff346778b4600
#, php-format
msgid "&quot;%1$s&quot; (ID %2$s) was successfully resized in %3$s seconds."
msgstr ""
"&quot;%1$s&quot; (ID %2$s) è stato correttamente ridimensionato in %3$s "
"secondi."

#: ../maxgalleria-media-library.php:4227 loco:5abe0565a39ff346778b4601
#, php-format
msgid ""
"&quot;%1$s&quot; (ID %2$s) failed to resize. The error message was: %3$s"
msgstr ""
"&quot;%1$s&quot; (ID %2$s) ha fallito durante il tentativo di "
"ridimensionamento. Il messaggio di errore è: %3$s"

#: ../maxgalleria-media-library.php:4262 loco:5abe0565a39ff346778b4602
msgid ""
"When Image SEO is enabled Media Library Folders automatically adds  ALT and "
"Title attributes with the default settings defined below to all your images "
"as they are uploaded."
msgstr ""
"Quando Immagine SEO è abilitato, le cartelle della libreria multimediale "
"aggiungono automaticamente gli attributi ALT e Titolo con le impostazioni "
"predefinite definite di seguito a tutte le immagini che vengono caricate."

#: ../maxgalleria-media-library.php:4263 loco:5abe0565a39ff346778b4603
msgid ""
"You can easily override the Image SEO default settings when you  are "
"uploading new images. When Image SEO is enabled you will see two fields  "
"under the Upload Box when you add a file - Image Title Text and Image ALT "
"Text.  Whatever you type into these fields overrides the default settings "
"for the  current upload or sync operations."
msgstr ""
"Puoi facilmente sovrascrivere le impostazioni predefinite di Image SEO "
"quando carichi nuove immagini. Quando Immagine SEO è abilitato, vedrai due "
"campi sotto la Casella di caricamento quando aggiungi un file - Testo del "
"titolo dell'immagine e Testo ALT dell'immagine. Qualunque cosa si digiti in "
"questi campi sovrascrive le impostazioni predefinite per le operazioni di "
"caricamento o sincronizzazione correnti."

#: ../maxgalleria-media-library.php:4264 loco:5abe0565a39ff346778b4604
msgid ""
"To change the settings on an individual image simply click on  the image and "
"change the settings on the far right.  Save and then back click to return to "
"Media  Library Plus or MLPP."
msgstr ""
"Per modificare le impostazioni su una singola immagine è sufficiente fare "
"clic sull'immagine e modificare le impostazioni all'estrema destra. Salva e "
"poi fai di nuovo clic per tornare a Media Library Plus o MLPP."

#: ../maxgalleria-media-library.php:4265 loco:5abe0565a39ff346778b4605
msgid "Image SEO supports two special tags:"
msgstr "L'Immagine SEO supporta due tag speciali:"

#: ../maxgalleria-media-library.php:4266 loco:5abe0565a39ff346778b4606
#, php-format
msgid "%filename - replaces image file name ( without extension )"
msgstr "%filename - sostituisce il nome dell'immagine (senza estensione)"

#: ../maxgalleria-media-library.php:4267 loco:5abe0565a39ff346778b4607
#, php-format
msgid "%foldername - replaces image folder name"
msgstr "%foldername - sostituisce il nome della cartella dell'immagine"

#: ../maxgalleria-media-library.php:4288 loco:5abe0565a39ff346778b4608
msgid "Turn on Image SEO:"
msgstr "Abilita l'immagine SEO:"

#: ../maxgalleria-media-library.php:4293 loco:5abe0565a39ff346778b4609
msgid "Image ALT attribute:"
msgstr "Attributo \"ALT\" dell'Immagine:"

#: ../maxgalleria-media-library.php:4295 ../maxgalleria-media-library.php:4300
#: loco:5abe0565a39ff346778b460a
msgid "example"
msgstr "esempio"

#: ../maxgalleria-media-library.php:4298 loco:5abe0565a39ff346778b460b
msgid "Image Title attribute:"
msgstr "Attributo \"Title\" dell'Immagine:"

#: ../maxgalleria-media-library.php:4303 loco:5abe0565a39ff346778b460c
msgid "Update Settings"
msgstr "Aggiorna le Impostazioni"

#: ../maxgalleria-media-library.php:4346 loco:5abe0565a39ff346778b460d
msgid "The Image SEO setting have been updated "
msgstr "L'impostazione dell'immagine SEO è stata aggiornata "

#: ../maxgalleria-media-library.php:4515 loco:5abe0565a39ff346778b460e
msgid "The selected folder, subfolders and thier files have been hidden."
msgstr ""
"La cartella selezionata, le sottocartelle e i file sono stati nascosti."
````

## File: Old Plugin/languages/maxgalleria-media-library-nl_BE.po
````
msgid ""
msgstr ""
"Project-Id-Version: maxgalleria-media-library\n"
"POT-Creation-Date: 2017-07-05 14:31+0200\n"
"PO-Revision-Date: 2018-04-01 17:46-0400\n"
"Language-Team: Dutch (Belgium)\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Poedit 1.6.9\n"
"X-Poedit-Basepath: .\n"
"Plural-Forms: nplurals=2; plural=(n > 1);\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"Last-Translator: Alan Pasho <apasho@gmail.com>\n"
"Language: fr_FR\n"
"Report-Msgid-Bugs-To: \n"
"X-Poedit-SearchPath-0: ..\n"

#: ../maxgalleria-media-library.php:430 ../maxgalleria-media-library.php:1341
#: ../maxgalleria-media-library.php:1396 ../maxgalleria-media-library.php:1425
#: ../maxgalleria-media-library.php:1444 ../maxgalleria-media-library.php:2073
#: ../maxgalleria-media-library.php:2245 ../maxgalleria-media-library.php:2358
#: ../maxgalleria-media-library.php:2607 ../maxgalleria-media-library.php:2691
#: ../maxgalleria-media-library.php:2862 ../maxgalleria-media-library.php:2990
#: ../maxgalleria-media-library.php:3018 ../maxgalleria-media-library.php:3307
#: ../maxgalleria-media-library.php:3504 ../maxgalleria-media-library.php:3729
#: ../maxgalleria-media-library.php:3742 ../maxgalleria-media-library.php:4155
#: ../maxgalleria-media-library.php:4404
msgid "missing nonce!"
msgstr "ontbrekende nonce !"

#: ../maxgalleria-media-library.php:738 ../maxgalleria-media-library.php:866
msgid "Media Library Folders"
msgstr "Media Library Folders"

#: ../maxgalleria-media-library.php:741
msgid "Check For New Folders"
msgstr "Controleer op nieuwe mappen"

#: ../maxgalleria-media-library.php:744
msgid "Upgrade to Pro"
msgstr "Upgraden naar Pro"

#: ../maxgalleria-media-library.php:745 ../maxgalleria-media-library.php:981
#: ../maxgalleria-media-library.php:3809
msgid "Regenerate Thumbnails"
msgstr "Regenereer Miniaturen"

#: ../maxgalleria-media-library.php:746 ../maxgalleria-media-library.php:4080
msgid "Image SEO"
msgstr "Afbeelding SEO"

#: ../maxgalleria-media-library.php:747
msgid "Support"
msgstr "Ondersteuning"

#: ../maxgalleria-media-library.php:872 ../maxgalleria-media-library.php:3814
#: ../maxgalleria-media-library.php:4085 ../maxgalleria-media-library.php:4293
msgid "Makers of"
msgstr "Makers van"

#: ../maxgalleria-media-library.php:872 ../maxgalleria-media-library.php:3814
#: ../maxgalleria-media-library.php:4085 ../maxgalleria-media-library.php:4293
msgid "and"
msgstr "en"

#: ../maxgalleria-media-library.php:874 ../maxgalleria-media-library.php:3816
#: ../maxgalleria-media-library.php:4087 ../maxgalleria-media-library.php:4295
msgid "Need help? Click here for"
msgstr "Hulp nodig? Klik hier voor"

#: ../maxgalleria-media-library.php:874 ../maxgalleria-media-library.php:3816
#: ../maxgalleria-media-library.php:4087 ../maxgalleria-media-library.php:4295
msgid "Awesome Support!"
msgstr "Geweldige ondersteuning!"

#: ../maxgalleria-media-library.php:875 ../maxgalleria-media-library.php:3817
#: ../maxgalleria-media-library.php:4088 ../maxgalleria-media-library.php:4296
msgid "Or Email Us at"
msgstr "Of e-mail ons op"

#: ../maxgalleria-media-library.php:880
msgid "Click here to learn about the Media Library Folders Pro"
msgstr "Klik hier voor meer informatie over Media Library Folders Pro"

#: ../maxgalleria-media-library.php:892
msgid "Current PHP version, "
msgstr "Huidige PHP-versie, "

#: ../maxgalleria-media-library.php:892
msgid ", is outdated. Please upgrade to version 5.6."
msgstr ", is verouderd. Voer een upgrade uit naar versie 5.6."

#: ../maxgalleria-media-library.php:912 ../maxgalleria-media-library.php:1298
msgid "Location:"
msgstr "Locatie:"

#: ../maxgalleria-media-library.php:926
msgid "Upload new files."
msgstr "Upload nieuwe bestanden."

#: ../maxgalleria-media-library.php:926
msgid "Add File"
msgstr "Voeg bestand toe"

#: ../maxgalleria-media-library.php:928
msgid ""
"Create a new folder. Type in a folder name (do not use spaces, single or "
"double quote marks) and click Create Folder."
msgstr ""
"Maak een nieuwe map. Voer een mapnaam in (gebruik geen spaties, enkele "
"ofdubbele aanhalingstekens) en klik op Map maken."

#: ../maxgalleria-media-library.php:928
msgid "Add Folder"
msgstr "Map toevoegen"

#: ../maxgalleria-media-library.php:937
msgid ""
"When moving/copying to a new folder place your pointer, not the image, on "
"the folder where you want the file(s) to go."
msgstr ""
"Plaats bij het verplaatsen / kopiëren naar een nieuwe map de aanwijzer, niet "
"de afbeelding, op de map waar u het bestand wilt hebben."

#: ../maxgalleria-media-library.php:938
msgid ""
"To drag multiple images, check the box under the files you want to move and "
"then drag one of the images to the desired folder."
msgstr ""
"Om meerdere afbeeldingen te slepen selecteert u het vakje onder de bestanden "
"die u wilt verplaatsen en sleept u vervolgens een van de afbeeldingen naar "
"de gewenste map."

#: ../maxgalleria-media-library.php:939
msgid ""
"To move/copy to a folder nested under the top level folder click the "
"triangle to the left of the folder to show the nested folder that is your "
"target."
msgstr ""
"Om te verplaatsen/kopiëren naar een map genest onder de map op het hoogste "
"niveau, klikt u op driehoek links van de map om de geneste map te tonen die "
"uw doel is."

#: ../maxgalleria-media-library.php:940
msgid ""
"To delete a folder, right click on the folder and a popup menu will appear. "
"Click on the option, \"Delete this folder?\" If the folder is empty, it will "
"be deleted."
msgstr ""
"Om een map te verwijderen, klikt u met de rechtermuisknop op de map en er "
"verschijnt een pop-upmenu. Klik op de optie, \"Deze map verwijderen?\". Als "
"de map leeg is, zal deze verwijderd worden."

#: ../maxgalleria-media-library.php:941
msgid ""
"To hide a folder and all its sub folders and files, right click on a folder, "
"On the popup menu that appears, click \"Hide this folder?\" and those "
"folders and files will be removed from the Media Library, but not from the "
"server."
msgstr ""
"Om een map en al zijn submappen en bestanden te verbergen, klikt u met de "
"rechtermuisknop op een map. Klik in het pop-upmenu dat verschijnt op \"Deze "
"map verbergen?\" en deze mappen en bestanden worden verwijderd uit de Media "
"Library, maar niet van de server."

#: ../maxgalleria-media-library.php:942
msgid ""
"If you click on an image and end up in WordPress Media Library please "
"backclick two times to return to MLP"
msgstr ""
"Als u op een afbeelding klikt en in WordPress Media Library terechtkomt klik "
"dan alsjeblieft twee keer op back om terug te keren naar MLP"

#: ../maxgalleria-media-library.php:1003
msgid ""
"Move/Copy Toggle. Move or copy selected files to a different folder. When "
"move is selected, images links in posts and pages will be updated. <span "
"class='mlp-warning'>Images IDs used in Jetpack Gallery shortcodes will not "
"be updated.</span>"
msgstr ""
"Verplaats/Kopieer Wisseltoets. Verplaats of kopieer geselecteerde bestanden "
"naar een andere map. Wanneer verplaatsen is geselecteerd, worden "
"beeldkoppelingen in berichten en pagina's bijgewerkt. <span class = 'mlp-"
"warning'> Afbeelding IDs gebruikt in de shortcodes van Jetpack Gallery "
"worden niet bijgewerkt.</ span>"

#: ../maxgalleria-media-library.php:962
msgid ""
"Rename a file; select only one file. Folders cannot be renamed. Type in a "
"new name with no spaces and without the extention and click Rename."
msgstr ""
"Hernoem een bestand; selecteer slechts één bestand. Mappen kunnen niet "
"worden hernoemd. Tik eennieuwe naam in zonder spaties en zonder de extensie "
"en klik op Hernoem."

#: ../maxgalleria-media-library.php:962 ../maxgalleria-media-library.php:1021
msgid "Rename"
msgstr "Hernoem"

#: ../maxgalleria-media-library.php:964
msgid "Delete selected files."
msgstr "Wis geselecteerde bestanden."

#: ../maxgalleria-media-library.php:964
msgid "Delete"
msgstr "Wis"

#: ../maxgalleria-media-library.php:966
msgid "Select or unselect all files in the folder."
msgstr "Selecteer of deselecteer alle bestanden in de map."

#: ../maxgalleria-media-library.php:966
msgid "Select/Unselect All"
msgstr "Selecteer/Deselecteer Alle"

#: ../maxgalleria-media-library.php:969
msgid "Sort by Name"
msgstr "Sorteer op Naam"

#: ../maxgalleria-media-library.php:970
msgid "Sort by Date"
msgstr "Sorteer op Datum"

#: ../maxgalleria-media-library.php:977
msgid "Sync the contents of the current folder with the server"
msgstr "Sync de inhoud van de huidige map met de server"

#: ../maxgalleria-media-library.php:977
msgid "Sync"
msgstr "Sync"

#: ../maxgalleria-media-library.php:981
msgid "Regenerates the thumbnails of selected images"
msgstr "Regenereert de miniaturen van geselecteerde afbeeldingen"

#: ../maxgalleria-media-library.php:984
msgid ""
"Add images to an existing MaxGalleria gallery. Folders can not be added to a "
"gallery. Images already in the gallery will not be added. "
msgstr ""
"Voeg afbeeldingen toe aan een bestaande MaxGalleria galerij. Mappen kunnen "
"niet worden toegevoegd aan een galerij. Afbeeldingen die al in de galerij "
"staan, worden niet toegevoegd. "

#: ../maxgalleria-media-library.php:984
msgid "Add to MaxGalleria Gallery"
msgstr "Voeg toe aan MaxGalleria galerij"

#: ../maxgalleria-media-library.php:1020
msgid "File Name: "
msgstr "Bestand Naam : "

#: ../maxgalleria-media-library.php:1056
msgid "Add Images"
msgstr "Voeg Afbeeldingen toe"

#: ../maxgalleria-media-library.php:1067
msgid "Folder Name: "
msgstr "Map Naam : "

#: ../maxgalleria-media-library.php:1068
msgid "Create Folder"
msgstr "Maak Map"

#: ../maxgalleria-media-library.php:1645
msgid "You cannot delete the currently open folder."
msgstr "U kan de momenteel geopende map niet verwijderen."

#: ../maxgalleria-media-library.php:1686
msgid "You cannot hide the currently open folder."
msgstr "U kan de momenteel geopende map niet verbergen."

#: ../maxgalleria-media-library.php:1965
msgid "No files were found."
msgstr "Geen bestanden gevonden."

#: ../maxgalleria-media-library.php:2124
msgid "The folder was created."
msgstr "De map werd gemaakt."

#: ../maxgalleria-media-library.php:2130
msgid "There was a problem creating the folder."
msgstr "Er is een probleem opgetreden bij het maken van de map."

#: ../maxgalleria-media-library.php:2137
msgid "The folder already exists."
msgstr "De map bestaat reeds."

#: ../maxgalleria-media-library.php:2289
msgid "The folder, "
msgstr "De map, "

#: ../maxgalleria-media-library.php:2289
msgid ", is not empty. Please delete or move files from the folder"
msgstr ", is niet leeg. Verwijder of verplaats bestanden uit de map"

#: ../maxgalleria-media-library.php:2305 ../maxgalleria-media-library.php:2318
msgid "The folder was deleted."
msgstr "De map werd verwijderd."

#: ../maxgalleria-media-library.php:2307
msgid "The folder could not be deleted."
msgstr "De map kon niet verwijderd worden."

#: ../maxgalleria-media-library.php:2328
msgid "The file(s) were deleted"
msgstr "De bestand(en) werden verwijderd"

#: ../maxgalleria-media-library.php:2330
msgid "The file(s) were not deleted"
msgstr "De bestand(en) werden niet verwijderd"

#: ../maxgalleria-media-library.php:2432
msgid "Unable to copy the file; please check the folder and file permissions."
msgstr "Kon het bestand niet kopiëren; controleer de map- en bestandsrechten."

#: ../maxgalleria-media-library.php:2525
msgid "Updating attachment links, please wait..."
msgstr "Bijlagen aan het bijwerken, een ogenblik geduld alsjeblieft..."

#: ../maxgalleria-media-library.php:2530
msgid ""
"Unable to move the file(s); please check the folder and file permissions."
msgstr ""
"Kon het bestand niet verplaatsen; controleer de map- en bestandsrechten."

#: ../maxgalleria-media-library.php:2537
msgid "The destination is not a folder: "
msgstr "De bestemming is geen map: "

#: ../maxgalleria-media-library.php:2543
msgid "Cannot find destination folder: "
msgstr "Kan de bestemming niet vinden: "

#: ../maxgalleria-media-library.php:2549
msgid "Coping or moving a folder is not allowed."
msgstr "Het kopiëren of verplaatsen van een map is niet toegestaan."

#: ../maxgalleria-media-library.php:2555
msgid "Cannot find the file: "
msgstr "Kan het bestand niet vinden: "

#: ../maxgalleria-media-library.php:2562
msgid "The file(s) were copied to "
msgstr "De bestand(en) zijn gekopieerd naar"

#: ../maxgalleria-media-library.php:2564
msgid "The file(s) were not copied."
msgstr "De bestand(en) werden niet gekopieerd."

#: ../maxgalleria-media-library.php:2568
msgid "The file(s) were moved to "
msgstr "De bestand(en) werden verplaatst naar "

#: ../maxgalleria-media-library.php:2570
msgid "The file(s) were not moved."
msgstr "De bestand(en) werden niet verplaatst."

#: ../maxgalleria-media-library.php:2680
msgid "The images were added."
msgstr "De afbeeldingen werden toegevoegd."

#: ../maxgalleria-media-library.php:2732 ../maxgalleria-media-library.php:2832
msgid "No files were found matching that name."
msgstr "Er werden geen bestanden gevonden die overeenkomen met die naam."

#: ../maxgalleria-media-library.php:2979
msgid "Updating attachment links, please wait...The file was renamed"
msgstr ""
"Bijlagelinks aan het bijwerken, even geduld alsjeblieft... Het bestand werd "
"hernoemd "

#: ../maxgalleria-media-library.php:3002
msgid "Sorting by date."
msgstr "Sortering op datum."

#: ../maxgalleria-media-library.php:3006
msgid "Sorting by name."
msgstr "Sortering op naam."

#: ../maxgalleria-media-library.php:3060
msgid "Scaning for new folders in "
msgstr "Zoeken naar nieuwe mappen in"

#: ../maxgalleria-media-library.php:3087 ../maxgalleria-media-library.php:3115
#: ../maxgalleria-media-library.php:3136 ../maxgalleria-media-library.php:3171
msgid "Adding"
msgstr "Toevoeging"

#: ../maxgalleria-media-library.php:3149
msgid "No new folders were found."
msgstr "Er werden geen nieuwe mappen gevonden."

#: ../maxgalleria-media-library.php:3268
msgid "Rate us Please!"
msgstr "Beoordeel ons alsjeblieft!"

#: ../maxgalleria-media-library.php:3269
msgid ""
"Your rating is the simplest way to support Media Library Folders. We really "
"appreciate it!"
msgstr ""
"Uw beoordeling is de eenvoudigste manier om Media Library Folders te "
"ondersteunen. We waarderen dit echt!"

#: ../maxgalleria-media-library.php:3272
msgid "I've already left a review"
msgstr "Ik heb al een beoordeling achtergelaten"

#: ../maxgalleria-media-library.php:3273
msgid "Maybe Later"
msgstr "Misschien later"

#: ../maxgalleria-media-library.php:3274
msgid "Sure! I'd love to!"
msgstr "Zeker! Ik zou graag!"

#: ../maxgalleria-media-library.php:3775
msgid "Error: "
msgstr "Fout :"

#: ../maxgalleria-media-library.php:3779
msgid "Unknown error with "
msgstr "Onbekende fout met "

#: ../maxgalleria-media-library.php:3830
msgid "Cheatin&#8217; uh?"
msgstr "Vals aan het spelen dus?"

#: ../maxgalleria-media-library.php:3841
#, php-format
msgid "Unable to find any images. Are you sure <a href='%s'>some exist</a>?"
msgstr ""
"Kan geen afbeeldingen vinden. Weet je zeker dat <a href='%s'> sommige "
"bestaan </a>?"

#: ../maxgalleria-media-library.php:3852
msgid ""
"Please wait while the thumbnails are regenerated. This may take a while."
msgstr ""
"Wacht even alsjeblieft terwijl de miniaturen worden geregenereerd. Dit kan "
"een tijdje duren."

#: ../maxgalleria-media-library.php:3856
#, php-format
msgid "To go back to the previous page, <a href=\"%s\">click here</a>."
msgstr "Om terug te gaan naar de vorige pagina, <a href=\"%s\">klik hier</a>."

#: ../maxgalleria-media-library.php:3857
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a href="
"\"%4$s\">click here</a>. %5$s"
msgstr ""
"Klaar! %1$s afbeelding(en) zijn opnieuw geschaald in %2$s seconden en er "
"waren%3$s mislukking(en). Om te proberen de grootte van mislukte "
"afbeeldingen te wijzigen, <a href=\"%4$s\">klik hier</a>. %5$s"

#: ../maxgalleria-media-library.php:3858
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""
"Helemaal klaar! %1$s afbeelding(en) zijn met succes herschaald in %2$s "
"seconden en er waren 0 mislukkingen. %3$s"

#: ../maxgalleria-media-library.php:3862 ../maxgalleria-media-library.php:4008
msgid "You must enable Javascript in order to proceed!"
msgstr "U moet Javascript inschakelen om door te gaan!"

#: ../maxgalleria-media-library.php:3868
msgid "Abort Resizing Images"
msgstr "Herschalen Afbeeldingen Onderbreken"

#: ../maxgalleria-media-library.php:3870
msgid "Debugging Information"
msgstr "Foutopsoring Informatie"

#: ../maxgalleria-media-library.php:3873
#, php-format
msgid "Total Images: %s"
msgstr "Afbeeldingen Totaal:%s"

#: ../maxgalleria-media-library.php:3874
#, php-format
msgid "Images Resized: %s"
msgstr "Afbeeldingen Herschaald :%s"

#: ../maxgalleria-media-library.php:3875
#, php-format
msgid "Resize Failures: %s"
msgstr "Herschaling Mislukkingen :%s"

#: ../maxgalleria-media-library.php:3906
msgid "Stopping..."
msgstr "Stoppen..."

#: ../maxgalleria-media-library.php:3958
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""
"De herschaling werd abnormaal beëindigd (ID %s). Dit komt waarschijnlijk "
"doordat het beeld het beschikbare geheugen overschrijdt of door een ander "
"type fatale fout."

#: ../maxgalleria-media-library.php:4001
msgid ""
"Click the button below to regenerate thumbnails for all images in the Media "
"Library. This is helpful if you have added new thumbnail sizes to your site. "
"Existing thumbnails will not be removed to prevent breaking any links."
msgstr ""
"Klik op de onderstaande knop om miniaturen voor alle afbeeldingen in de "
"Media Library te genereren. Dit is handig als u nieuwe miniaturen op uw site "
"hebt toegevoegd. Bestaande miniaturen worden niet verwijderd om te voorkomen "
"dat links worden verbroken."

#: ../maxgalleria-media-library.php:4003
msgid ""
"You can regenerate thumbnails for individual images from the Media Library "
"Folders page by checking the box below one or more images and clicking the "
"Regenerate Thumbnails button. The regenerate operation is not reversible but "
"you can always generate the sizes you need by adding additional thumbnail "
"sizes to your theme."
msgstr ""
"U kan opnieuw miniaturen genereren voor afzonderlijke afbeeldingen van de "
"Media Library Folders pagina door het vakje onder een of meer afbeeldingen "
"aan te vinken en op de knop Regenereer Miniaturen te klikken. De "
"regeneratiebewerking is niet omkeerbaar, maaru kan altijd de gewenste "
"formaten genereren door een extra miniatuurmaten toe te voegenvoor uw thema."

#: ../maxgalleria-media-library.php:4006
msgid "Regenerate All Thumbnails"
msgstr "Regenereer Alle Miniaturen"

#: ../maxgalleria-media-library.php:4032
#, php-format
msgid "Failed resize: %s is an invalid image ID."
msgstr "Mislukte herschaling: %s is een ongeldige afbeelding ID."

#: ../maxgalleria-media-library.php:4035
msgid "Your user account doesn't have permission to resize images"
msgstr ""
"Uw gebruikersaccount heeft geen toestemming om het formaat van afbeeldingen "
"te wijzigen"

#: ../maxgalleria-media-library.php:4040
#, php-format
msgid "The originally uploaded image file cannot be found at %s"
msgstr ""
"Het oorspronkelijk geüploade afbeeldingsbestand is niet te vinden op %s"

#: ../maxgalleria-media-library.php:4049
msgid "Unknown failure reason."
msgstr "Onbekende reden voor mislukking."

#: ../maxgalleria-media-library.php:4054
#, php-format
msgid "&quot;%1$s&quot; (ID %2$s) was successfully resized in %3$s seconds."
msgstr "&quot;%1$s&quot; (ID %2$s) is met succes verkleind in %3$s seconden."

#: ../maxgalleria-media-library.php:4060
#, php-format
msgid ""
"&quot;%1$s&quot; (ID %2$s) failed to resize. The error message was: %3$s"
msgstr ""
"&quot;%1$s&quot; (ID %2$s) kon niet herschaald worden. Het foutbericht was: "
"%3$s"

#: ../maxgalleria-media-library.php:4095
msgid ""
"When Image SEO is enabled Media Library Folders automatically adds  ALT and "
"Title attributes with the default settings defined below to all your images "
"as they are uploaded."
msgstr ""
"Wanneer Image SEO is ingeschakeld, voegt Media Library Folders tijdens het "
"uploaden automatisch ALT en Titel kenmerken toe met de standaardinstellingen "
"zoals hieronder voor al uw afbeeldingen gedefinieerd."

#: ../maxgalleria-media-library.php:4096
msgid ""
"You can easily override the Image SEO default settings when you  are "
"uploading new images. When Image SEO is enabled you will see two fields  "
"under the Upload Box when you add a file - Image Title Text and Image ALT "
"Text.  Whatever you type into these fields overrides the default settings "
"for the  current upload or sync operations."
msgstr ""
"U kan de standaardinstellingen voor Image SEO gemakkelijk overschrijven "
"tijdenshet uploaden van nieuwe afbeeldingen. Wanneer Image SEO is "
"ingeschakeld, ziet u twee velden onder het Upload Kader wanneer u een "
"bestand toevoegt - Afbeelding Titel Tekst en Afbeelding ALT Tekst. Wat u in "
"deze velden typt overschrijft de standaardinstellingenvoor de huidige upload "
"of sync bewerkingen."

#: ../maxgalleria-media-library.php:4097
msgid ""
"To change the settings on an individual image simply click on  the image and "
"change the settings on the far right.  Save and then back click to return to "
"Media  Library Plus or MLPP."
msgstr ""
"Klik op een afzonderlijke afbeelding om haar instellingen te wijzigen en "
"verander de instellingen helemaal rechts. Sla op en klik op terug om terug "
"te keren naarMedia Library Plus of MLPP."

#: ../maxgalleria-media-library.php:4098
msgid "Image SEO supports two special tags:"
msgstr "Afbeelding SEO ondersteunt twee speciale tags:"

#: ../maxgalleria-media-library.php:4099
#, php-format
msgid "%filename - replaces image file name ( without extension )"
msgstr "%filename - vervangt afbeelding bestandsnaam (zonder extensie)"

#: ../maxgalleria-media-library.php:4100
#, php-format
msgid "%foldername - replaces image folder name"
msgstr "%foldername  - vervangt afbeelding mapnaam"

#: ../maxgalleria-media-library.php:4116
msgid "Settings"
msgstr "Instellingen"

#: ../maxgalleria-media-library.php:4121
msgid "Turn on Image SEO:"
msgstr "Afbeelding SEO Inschakelen:"

#: ../maxgalleria-media-library.php:4126
msgid "Image ALT attribute:"
msgstr "Afbeelding ALT eigenschap:"

#: ../maxgalleria-media-library.php:4128 ../maxgalleria-media-library.php:4133
msgid "example"
msgstr "voorbeeld"

#: ../maxgalleria-media-library.php:4131
msgid "Image Title attribute:"
msgstr "Afbeelding Titel eigenschap:"

#: ../maxgalleria-media-library.php:4136
msgid "Update Settings"
msgstr "Bijwerken Instellingen"

#: ../maxgalleria-media-library.php:4179
msgid "The Image SEO setting have been updated "
msgstr "De Afbeelding SEO instelling werd bijgewerkt "

#: ../maxgalleria-media-library.php:4288
msgid "Support - System Information"
msgstr "Ondersteuning - Systeem Informatie"

#: ../maxgalleria-media-library.php:4302
msgid ""
"You may be asked to provide the information below to help troubleshoot your "
"issue."
msgstr ""
"Mogelijk wordt u gevraagd om onderstaande informatie te verstrekken om te "
"helpen bij het oplossen van uw probleem."

#: ../maxgalleria-media-library.php:4438
msgid "The selected folder, subfolders and thier files have been hidden."
msgstr "De geselecteerde map, submappen en hun bestanden werden verborgen."
````

## File: Old Plugin/languages/maxgalleria-media-library-nl_NL.po
````
msgid ""
msgstr ""
"Project-Id-Version: maxgalleria-media-library\n"
"POT-Creation-Date: 2022-10-03 10:38-0300\n"
"PO-Revision-Date: 2022-10-03 18:56+0200\n"
"Last-Translator: Peter Smits <peter@psmits.com>\n"
"Language-Team: \n"
"Language: nl_NL\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"Plural-Forms: nplurals=2; plural=(n != 1);\n"
"X-Generator: Poedit 3.1.1\n"
"X-Poedit-Basepath: .\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"X-Poedit-SearchPath-0: ..\n"

#: ../includes/media-library.php:83
msgid "Current PHP version, "
msgstr "Huidige PHP versie, "

#: ../includes/media-library.php:83
msgid ", is outdated. Please upgrade to version 7.4."
msgstr ", is verouderd. Voer een upgrade uit naar versie 7.4."

#: ../includes/media-library.php:105
msgid "Location:"
msgstr "Locatie:"

#: ../includes/mlf-settings.php:29
msgid "Add an index to the postmeta table"
msgstr "Een index toevoegen aan de postmeta tabel"

#: ../includes/mlf-settings.php:29
msgid ""
"For sites with a large number of media files, check this option to create a "
"new index fro the postmeta table to speed by the loading of the Media "
"Library Folders Pro page."
msgstr ""
"Voor sites met een groot aantal mediabestanden, vink je deze optie aan om "
"een nieuwe index te maken voor de postmeta tabel, om sneller te laden door "
"de pagina Media Library Folders Pro te laden."

#: ../includes/mlf-thumbnails.php:70 ../media-library-plus.php:3947
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a href="
"\"%4$s\">click here</a>. %5$s"
msgstr ""
"Klaar! %1$s afbeelding(en) zijn opnieuw geschaald in %2$s seconden en er "
"waren %3$s mislukking(en). Om te proberen de grootte van mislukte "
"afbeeldingen opnieuw te wijzigen, <a href=\"%4$s\">klik hier</a>. %5$s"

#: ../includes/mlf-thumbnails.php:71 ../media-library-plus.php:3948
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""
"Helemaal klaar! %1$s afbeelding(en) zijn met succes herschaald in %2$s "
"seconden en er waren 0 mislukkingen. %3$s"

#: ../includes/mlf-thumbnails.php:85 ../media-library-plus.php:3962
msgid "Total Images: "
msgstr "Totaal aantal afbeeldingen:"

#: ../includes/mlf-thumbnails.php:172 ../media-library-plus.php:4049
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""
"De herschaling werd abnormaal beëindigd (ID %s). Dit komt waarschijnlijk "
"doordat omvang van de afbeelding het beschikbare geheugen overschrijdt of "
"door een ander type fatale fout."

#: ../media-library-plus.php:14
msgid ""
"You must deactivate Media Library Folders before activating Media Library "
"Folders Pro"
msgstr ""
"Je moet Media Library Folders deactiveren voordat je Media Library Folders "
"Pro activeert"

#: ../media-library-plus.php:400
msgid "Media Library Folders"
msgstr "Media Library Folders"

#: ../media-library-plus.php:401
msgid "Folders & Files"
msgstr "Mappen & bestanden"

#: ../media-library-plus.php:402
msgid "Thumbnails"
msgstr "Thumbnails"

#: ../media-library-plus.php:403
msgid "Image SEO"
msgstr "SEO voor afbeeldingen"

#: ../media-library-plus.php:404
msgid "Settings"
msgstr "Instellingen"

#: ../media-library-plus.php:405
msgid "Support"
msgstr "Ondersteuning"

#: ../media-library-plus.php:458
msgid "Brought to you by "
msgstr "Gebracht aan je door"

#: ../media-library-plus.php:459
msgid "Makers of"
msgstr "Makers van"

#: ../media-library-plus.php:459
msgid "and"
msgstr "en"

#: ../media-library-plus.php:464
msgid "Click here to"
msgstr "Klik hier om"

#: ../media-library-plus.php:464
msgid "Fix Common Problems"
msgstr "Veelvoorkomende problemen oplossen"

#: ../media-library-plus.php:465
msgid "Need more help? Check out our "
msgstr "Meer hulp nodig? Bekijk onze "

#: ../media-library-plus.php:465
msgid "Support Forums"
msgstr "Support Forums"

#: ../media-library-plus.php:466
msgid "Or Email Us at"
msgstr "Of stuur een e-mail naar"

#: ../media-library-plus.php:576 ../media-library-plus.php:2705
#: ../media-library-plus.php:2730 ../media-library-plus.php:2776
#: ../media-library-plus.php:3316
msgid "missing nonce!"
msgstr "ontbrekende nonce!"

#: ../media-library-plus.php:1214 ../media-library-plus.php:1269
#: ../media-library-plus.php:1298 ../media-library-plus.php:1317
#: ../media-library-plus.php:1917 ../media-library-plus.php:2345
#: ../media-library-plus.php:2524 ../media-library-plus.php:2755
#: ../media-library-plus.php:4177
msgid "missing nonce! Please refresh this page."
msgstr "ontbrekende nonce! Vernieuw deze pagina."

#: ../media-library-plus.php:1960
msgid "The folder was created."
msgstr "De map is gemaakt."

#: ../media-library-plus.php:1966
msgid "There was a problem creating the folder."
msgstr "Er is een probleem opgetreden bij het maken van de map."

#: ../media-library-plus.php:1972
msgid "The folder already exists."
msgstr "De map bestaat al."

#: ../media-library-plus.php:2012
msgid "The URL to the folder or image is not correct: "
msgstr "De URL naar de map of afbeelding is niet correct"

#: ../media-library-plus.php:2104
msgid "The uploads folder cannot be deleted."
msgstr "De map uploads kan niet worden verwijderd."

#: ../media-library-plus.php:2134
msgid "The folder, "
msgstr "De map, "

#: ../media-library-plus.php:2134
msgid ", is not empty. Please delete or move files from the folder"
msgstr ", is niet leeg. Verwijder of verplaats bestanden uit de map"

#: ../media-library-plus.php:2150
msgid "The folder could not be deleted."
msgstr "De map kan niet worden verwijderd."

#: ../media-library-plus.php:2153
msgid "The folder is not empty and could not be deleted."
msgstr "De map is niet leeg en kan niet worden verwijderd."

#: ../media-library-plus.php:2162
msgid "The folder was deleted."
msgstr "De map is verwijderd."

#: ../media-library-plus.php:2182
msgid "The file(s) were deleted"
msgstr "De bestanden zijn verwijderd"

#: ../media-library-plus.php:2200
msgid "The file(s) were not deleted"
msgstr "De bestanden zijn niet verwijderd"

#: ../media-library-plus.php:2414
msgid "Search results for: "
msgstr "Zoekresultaten voor: "

#: ../media-library-plus.php:2799
msgid "Added"
msgstr "Toegevoegd"

#: ../media-library-plus.php:2819
msgid "Scanning for new folders in "
msgstr "Scannen op nieuwe mappen in "

#: ../media-library-plus.php:2844 ../media-library-plus.php:2878
#: ../media-library-plus.php:2909 ../media-library-plus.php:2958
msgid "Adding"
msgstr "Toevoegen"

#: ../media-library-plus.php:3728
msgid ""
"Add an index to the postmeta table. <em>Recommend for sites with a high "
"number of media files. Uncheck to remove the index.</em>"
msgstr ""
"Voeg een index toe aan de postmeta tabel. <em>Aanbevolen voor sites met een "
"groot aantal mediabestanden. Verwijder het vinkje om de index te "
"verwijderen.</em>"

#: ../media-library-plus.php:4688
msgid "Scanning for new files and folders...please wait."
msgstr "Zoeken naar nieuwe bestanden en mappen ... even geduld."

#: ../media-library-plus.php:4693
msgid "Syncing finished."
msgstr "Synchronisatie voltooid."

#: ../media-library-plus.php:4719
msgid "Adding "
msgstr "Toevoegen "

#: ../media-library-plus.php:4722
msgid " is not an allowed file type. It was not added."
msgstr " is geen toegestaan ​​bestandstype. Het is niet toegevoegd."

#: ../media-library-plus.php:4846
msgid "Finished copying files. "
msgstr "Klaar met het kopiëren van bestanden. "

#: ../media-library-plus.php:4848
msgid "Finished moving files. "
msgstr "Klaar met het verplaatsen van bestanden. "

#: ../media-library-plus.php:5085
msgid "Unable to move "
msgstr "Kan niet verplaatsen "

#: ../media-library-plus.php:5085
msgid "; please check the folder and file permissions."
msgstr "; controleer de map en bestandsrechten."

#: ../media-library-plus.php:5091
msgid "The destination is not a folder: "
msgstr "De bestemming is geen map: "

#: ../media-library-plus.php:5096
msgid "Cannot find destination folder: "
msgstr "Kan doelmap niet vinden: "

#: ../media-library-plus.php:5106
msgid "Cannot find the file: "
msgstr "Kan het bestand niet vinden: "

#: ../media-library-plus.php:5113
msgid " was copied to "
msgstr " is gekopieerd naar "

#: ../media-library-plus.php:5115
msgid " was not copied."
msgstr " is niet gekopieerd."

#: ../media-library-plus.php:5119
msgid " was moved to "
msgstr " is verplaatst naar "

#: ../media-library-plus.php:5121
msgid " was not moved."
msgstr " werd niet verplaatst."

#: ../mlp-reset.php:199
msgid "Number of attachments"
msgstr "Aantal bijlagen"
````

## File: Old Plugin/languages/maxgalleria-media-library-ru_RU.po
````
msgid ""
msgstr ""
"Project-Id-Version: maxgalleria-media-library\n"
"POT-Creation-Date: 2018-02-19 10:04+0800\n"
"PO-Revision-Date: 2018-02-19 10:05+0800\n"
"Last-Translator: Maxgalleria <support@maxfoundry.com>\n"
"Language-Team: \n"
"Language: ru_RU\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Poedit 1.6.9\n"
"X-Poedit-Basepath: .\n"
"Plural-Forms: nplurals=3; plural=(n%10==1 && n%100!=11 ? 0 : n%10>=2 && n"
"%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2);\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"X-Poedit-SearchPath-0: ..\n"

#: ../maxgalleria-media-library.php:415
msgid "This folder was not found: "
msgstr "Папка не найдена: "

#: ../maxgalleria-media-library.php:458 ../maxgalleria-media-library.php:1442
#: ../maxgalleria-media-library.php:1497 ../maxgalleria-media-library.php:1526
#: ../maxgalleria-media-library.php:1545 ../maxgalleria-media-library.php:2196
#: ../maxgalleria-media-library.php:2370 ../maxgalleria-media-library.php:2483
#: ../maxgalleria-media-library.php:2732 ../maxgalleria-media-library.php:2816
#: ../maxgalleria-media-library.php:2987 ../maxgalleria-media-library.php:3117
#: ../maxgalleria-media-library.php:3145 ../maxgalleria-media-library.php:3434
#: ../maxgalleria-media-library.php:3618 ../maxgalleria-media-library.php:3846
#: ../maxgalleria-media-library.php:3909 ../maxgalleria-media-library.php:4321
#: ../maxgalleria-media-library.php:4570 ../maxgalleria-media-library.php:4760
#: ../maxgalleria-media-library.php:4772
msgid "missing nonce!"
msgstr "отсутствует nonce!"

#: ../maxgalleria-media-library.php:780 ../maxgalleria-media-library.php:909
msgid "Media Library Folders"
msgstr "Media Library Folders"

#: ../maxgalleria-media-library.php:781 ../maxgalleria-media-library.php:783
msgid "Check For New Folders"
msgstr "Поиск новых папок"

#: ../maxgalleria-media-library.php:782
msgid "Search Library"
msgstr ""

#: ../maxgalleria-media-library.php:786
msgid "Upgrade to Pro"
msgstr "Обновить до Про версии"

#: ../maxgalleria-media-library.php:787 ../maxgalleria-media-library.php:1030
#: ../maxgalleria-media-library.php:3975
msgid "Regenerate Thumbnails"
msgstr "Пересоздать Эскизы"

#: ../maxgalleria-media-library.php:788 ../maxgalleria-media-library.php:4246
msgid "Image SEO"
msgstr "SEO изображений"

#: ../maxgalleria-media-library.php:789
msgid "Support"
msgstr "Поддержка"

#: ../maxgalleria-media-library.php:790 ../maxgalleria-media-library.php:4282
msgid "Settings"
msgstr "Настройки"

#: ../maxgalleria-media-library.php:915 ../maxgalleria-media-library.php:3980
#: ../maxgalleria-media-library.php:4251 ../maxgalleria-media-library.php:4459
msgid "Makers of"
msgstr "От создателей"

#: ../maxgalleria-media-library.php:915 ../maxgalleria-media-library.php:3980
#: ../maxgalleria-media-library.php:4251 ../maxgalleria-media-library.php:4459
msgid "and"
msgstr "и"

#: ../maxgalleria-media-library.php:916 ../maxgalleria-media-library.php:3981
#: ../maxgalleria-media-library.php:4252 ../maxgalleria-media-library.php:4460
#, fuzzy
msgid "Click here to"
msgstr "Нужна помощь? Вам сюда"

#: ../maxgalleria-media-library.php:916 ../maxgalleria-media-library.php:3981
#: ../maxgalleria-media-library.php:4252 ../maxgalleria-media-library.php:4460
msgid "Fix Common Problems"
msgstr ""

#: ../maxgalleria-media-library.php:917 ../maxgalleria-media-library.php:3982
#: ../maxgalleria-media-library.php:4253 ../maxgalleria-media-library.php:4461
msgid "Need help? Click here for"
msgstr "Нужна помощь? Вам сюда"

#: ../maxgalleria-media-library.php:917 ../maxgalleria-media-library.php:3982
#: ../maxgalleria-media-library.php:4253 ../maxgalleria-media-library.php:4461
msgid "Awesome Support!"
msgstr "Наилучшая техподдержка!"

#: ../maxgalleria-media-library.php:918 ../maxgalleria-media-library.php:3983
#: ../maxgalleria-media-library.php:4254 ../maxgalleria-media-library.php:4462
msgid "Or Email Us at"
msgstr "Или напишите нам на"

#: ../maxgalleria-media-library.php:923
msgid "Click here to learn about the Media Library Folders Pro"
msgstr "Нажмите здесь чтобы узнать про Media Library Folders Pro"

#: ../maxgalleria-media-library.php:935
msgid "Current PHP version, "
msgstr "Текущая версия PHP, "

#: ../maxgalleria-media-library.php:935
msgid ", is outdated. Please upgrade to version 5.6."
msgstr ", устарела. Пожалуйста, обновите до версии 5.6."

#: ../maxgalleria-media-library.php:955 ../maxgalleria-media-library.php:1399
msgid "Location:"
msgstr "Путь:"

#: ../maxgalleria-media-library.php:969
msgid "Upload new files."
msgstr "Загрузить новые файлы."

#: ../maxgalleria-media-library.php:969
msgid "Add File"
msgstr "Добавить файл"

#: ../maxgalleria-media-library.php:971
msgid ""
"Create a new folder. Type in a folder name (do not use spaces, single or "
"double quote marks) and click Create Folder."
msgstr ""
"Создать новую папку. Введите имя папки (без пробелов, двойных или одинарных "
"кавычек) и нажмите Создать Папку."

#: ../maxgalleria-media-library.php:971
msgid "Add Folder"
msgstr "Создать Папку"

#: ../maxgalleria-media-library.php:984
msgid ""
"When moving/copying to a new folder place your pointer, not the image, on "
"the folder where you want the file(s) to go."
msgstr ""
"При перемещении/копировании в новую папку, просто перетащите изображение в "
"нужную папку, указывая на неё мышью (а не картинкой)."

#: ../maxgalleria-media-library.php:985
msgid ""
"To drag multiple images, check the box under the files you want to move and "
"then drag one of the images to the desired folder."
msgstr ""
"Чтобы перенести несколько изображений, отметьте их галочками и перетащите "
"любую из них в нужную папку."

#: ../maxgalleria-media-library.php:986
msgid ""
"To move/copy to a folder nested under the top level folder click the "
"triangle to the left of the folder to show the nested folder that is your "
"target."
msgstr ""
"Чтобы перенести в подпапку, нажмите на треугольник слева от папки, чтобы "
"увидеть нужную подпапку."

#: ../maxgalleria-media-library.php:987
msgid ""
"To delete a folder, right click on the folder and a popup menu will appear. "
"Click on the option, \"Delete this folder?\" If the folder is empty, it will "
"be deleted."
msgstr ""
"Чтобы удалить папку, нажмите правой кнопкой мыши на папке и выберите в "
"выпадающем меню. \"Удалить папку?\". Папка удалится, если она пуста."

#: ../maxgalleria-media-library.php:988
msgid ""
"To hide a folder and all its sub folders and files, right click on a folder, "
"On the popup menu that appears, click \"Hide this folder?\" and those "
"folders and files will be removed from the Media Library, but not from the "
"server."
msgstr ""
"Чтобы скрыть папку с подпапками и файлами, нажмите правой кнопкой мыши на "
"папке и выберите в выпадающем меню \"Скрыть папку?\". Папка удалится из "
"Media Library, но останется на сервере."

#: ../maxgalleria-media-library.php:1002
msgid ""
"Move/Copy Toggle. Move or copy selected files to a different folder. When "
"move is selected, images links in posts and pages will be updated. <span "
"class='mlp-warning'>Images IDs used in Jetpack Gallery shortcodes will not "
"be updated.</span>"
msgstr ""
"Перенести(Move)/Скопировать(Copy). Перенести или скропировать выбранные "
"файлы в другую папку. Когда выбрано Move, ссылки на изображения в постах и "
"на страницах обновятся. <span class='mlp-warning'>ID картинок, используемые "
"в шорткодах Jetpack Gallery не изменятся.</span>"

#: ../maxgalleria-media-library.php:1011
msgid ""
"Rename a file; select only one file. Folders cannot be renamed. Type in a "
"new name with no spaces and without the extention and click Rename."
msgstr ""
"Переименовать файл; выберите только один файл. Папки нельзя переименовать. "
"Введите новое имя без пробелов и без расширения и нажмите Переименовать."

#: ../maxgalleria-media-library.php:1011 ../maxgalleria-media-library.php:1070
msgid "Rename"
msgstr "Переименовать"

#: ../maxgalleria-media-library.php:1013
msgid "Delete selected files."
msgstr "Удалить выбранные файлы."

#: ../maxgalleria-media-library.php:1013
msgid "Delete"
msgstr "Удалить"

#: ../maxgalleria-media-library.php:1015
msgid "Select or unselect all files in the folder."
msgstr "Выбрать все файлы в папке."

#: ../maxgalleria-media-library.php:1015
msgid "Select/Unselect All"
msgstr "Выбрать все/снять выделение"

#: ../maxgalleria-media-library.php:1018
msgid "Sort by Name"
msgstr "по Имени"

#: ../maxgalleria-media-library.php:1019
msgid "Sort by Date"
msgstr "по Дате"

#: ../maxgalleria-media-library.php:1023
msgid "Search"
msgstr ""

#: ../maxgalleria-media-library.php:1026
msgid "Sync the contents of the current folder with the server"
msgstr "Синхронизировать содержимое текущей папки с сервером"

#: ../maxgalleria-media-library.php:1026
msgid "Sync"
msgstr "Синхронизировать"

#: ../maxgalleria-media-library.php:1030
msgid "Regenerates the thumbnails of selected images"
msgstr "Пересоздать эскизы выбранных изображений"

#: ../maxgalleria-media-library.php:1033
msgid ""
"Add images to an existing MaxGalleria gallery. Folders can not be added to a "
"gallery. Images already in the gallery will not be added. "
msgstr ""
"Добавить изображения в существующую галерею MaxGalleria. Папки нельзя "
"добавить в галерею. Изображения уже имеющиеся в галерее не добавятся. "

#: ../maxgalleria-media-library.php:1033
msgid "Add to MaxGalleria Gallery"
msgstr "Добавить в галерею MaxGalleria"

#: ../maxgalleria-media-library.php:1054
msgid "Drag & Drop Files Here"
msgstr ""

#: ../maxgalleria-media-library.php:1055
msgid "or select an image to upload:"
msgstr ""

#: ../maxgalleria-media-library.php:1058
#, fuzzy
msgid "Upload Image"
msgstr "Добавить изображения"

#: ../maxgalleria-media-library.php:1061
#, fuzzy
msgid "Image Title Text:"
msgstr "TITLE атрибут изображения:"

#: ../maxgalleria-media-library.php:1062
#, fuzzy
msgid "Image ALT Text:"
msgstr "ALT атрибут изображения:"

#: ../maxgalleria-media-library.php:1069
msgid "File Name: "
msgstr "Имя файла: "

#: ../maxgalleria-media-library.php:1105
msgid "Add Images"
msgstr "Добавить изображения"

#: ../maxgalleria-media-library.php:1116
msgid "Folder Name: "
msgstr "Имя папки: "

#: ../maxgalleria-media-library.php:1117
msgid "Create Folder"
msgstr "Создать Папку"

#: ../maxgalleria-media-library.php:1734
msgid "Delete this folder?"
msgstr "Удалить папку?"

#: ../maxgalleria-media-library.php:1743
msgid "Are you sure you want to delete the selected folder?"
msgstr "Вы уверены, что хотите удалить выбранную папку?"

#: ../maxgalleria-media-library.php:1775
msgid "Hide this folder?"
msgstr "Скрыть папку?"

#: ../maxgalleria-media-library.php:1781
msgid ""
"Are you sure you want to hide the selected folder and all its sub folders "
"and files?"
msgstr "Вы уверены, что хотите скрыть выбранную папку с подпапками и файлами?"

#: ../maxgalleria-media-library.php:2088
msgid "No files were found."
msgstr "Файлов не найдено."

#: ../maxgalleria-media-library.php:2249
msgid "The folder was created."
msgstr "Папка создана."

#: ../maxgalleria-media-library.php:2255
msgid "There was a problem creating the folder."
msgstr "Возникла проблема про создании папки."

#: ../maxgalleria-media-library.php:2262
msgid "The folder already exists."
msgstr "Папка уже существует."

#: ../maxgalleria-media-library.php:2414
msgid "The folder, "
msgstr "Папка, "

#: ../maxgalleria-media-library.php:2414
msgid ", is not empty. Please delete or move files from the folder"
msgstr ", не пуста. Пожауйста, удалите или переместите содержимое папки"

#: ../maxgalleria-media-library.php:2430 ../maxgalleria-media-library.php:2443
msgid "The folder was deleted."
msgstr "Папка удалена."

#: ../maxgalleria-media-library.php:2432
msgid "The folder could not be deleted."
msgstr "Папку нельзя удалить."

#: ../maxgalleria-media-library.php:2453
msgid "The file(s) were deleted"
msgstr "Файл(ы) удален(ы)"

#: ../maxgalleria-media-library.php:2455
msgid "The file(s) were not deleted"
msgstr "Файл(ы) не удален(ы)"

#: ../maxgalleria-media-library.php:2557
msgid "Unable to copy the file; please check the folder and file permissions."
msgstr ""
"Не удаётся скопировать файл. Пожауйста, проверьте права на папку или файл."

#: ../maxgalleria-media-library.php:2650
msgid "Updating attachment links, please wait..."
msgstr "Обновление ссылок, пожалуйста подождите..."

#: ../maxgalleria-media-library.php:2655
msgid ""
"Unable to move the file(s); please check the folder and file permissions."
msgstr ""
"Не удаётся переместить файл(ы). Пожауйста, проверьте права на папку или файл."

#: ../maxgalleria-media-library.php:2662
msgid "The destination is not a folder: "
msgstr "Назначение не является папкой: "

#: ../maxgalleria-media-library.php:2668
msgid "Cannot find destination folder: "
msgstr "Указанная папка не найдена: "

#: ../maxgalleria-media-library.php:2674
msgid "Coping or moving a folder is not allowed."
msgstr "Копирование или перемещение папки запрещено."

#: ../maxgalleria-media-library.php:2680
msgid "Cannot find the file: "
msgstr "Файл не найден: "

#: ../maxgalleria-media-library.php:2687
msgid "The file(s) were copied to "
msgstr "Файл(ы) скопирован(ы) в "

#: ../maxgalleria-media-library.php:2689
msgid "The file(s) were not copied."
msgstr "Файл(ы) не скопирован(ы)."

#: ../maxgalleria-media-library.php:2693
msgid "The file(s) were moved to "
msgstr "Файл(ы) перемещен(ы) в "

#: ../maxgalleria-media-library.php:2695
msgid "The file(s) were not moved."
msgstr "Файл(ы) не перемещен(ы)."

#: ../maxgalleria-media-library.php:2805
msgid "The images were added."
msgstr "Изображения добавлены."

#: ../maxgalleria-media-library.php:2857 ../maxgalleria-media-library.php:2957
msgid "No files were found matching that name."
msgstr "Файлов с таким именем не найдено."

#: ../maxgalleria-media-library.php:2875
msgid "Back to Media Library Folders"
msgstr "Назад к Media Library Folders"

#: ../maxgalleria-media-library.php:2880
msgid ""
"Click on an image to go to its folder or a on folder to view its contents."
msgstr ""
"Нажмите на изображение, чтобы к перейти к содержащей его папке, или на "
"папку, чтобы увидеть содержимое."

#: ../maxgalleria-media-library.php:2883
msgid "Search results for: "
msgstr "Результат поиска для: "

#: ../maxgalleria-media-library.php:3009
msgid "Invalid file name."
msgstr "Некорректное имя файла."

#: ../maxgalleria-media-library.php:3014
msgid "The file name cannot contain spaces or tabs."
msgstr "Имя файла не должно содержать пробелы или табуляцию."

#: ../maxgalleria-media-library.php:3106
msgid "Updating attachment links, please wait...The file was renamed"
msgstr "Обновление ссылок"

#: ../maxgalleria-media-library.php:3129
msgid "Sorting by date."
msgstr "Сортировка по дате."

#: ../maxgalleria-media-library.php:3133
msgid "Sorting by name."
msgstr "Сортировка по имени."

#: ../maxgalleria-media-library.php:3187
msgid "Scaning for new folders in "
msgstr "Поиск новых папок в "

#: ../maxgalleria-media-library.php:3214 ../maxgalleria-media-library.php:3242
#: ../maxgalleria-media-library.php:3263 ../maxgalleria-media-library.php:3298
msgid "Adding"
msgstr "Добавление"

#: ../maxgalleria-media-library.php:3276
msgid "No new folders were found."
msgstr "Новых папок не найдено."

#: ../maxgalleria-media-library.php:3395
msgid "Rate us Please!"
msgstr "Оцените нас, пожалуйста!"

#: ../maxgalleria-media-library.php:3396
msgid ""
"Your rating is the simplest way to support Media Library Folders. We really "
"appreciate it!"
msgstr ""
"Ваша оценка - простейший способ поддержать Media Library Folders. Будем вам "
"искренне благодарны!"

#: ../maxgalleria-media-library.php:3399
msgid "I've already left a review"
msgstr "Я уже оставил отзыв"

#: ../maxgalleria-media-library.php:3400
msgid "Maybe Later"
msgstr "Возможно, позже"

#: ../maxgalleria-media-library.php:3401
msgid "Sure! I'd love to!"
msgstr "Конечно, с удовольствием!"

#: ../maxgalleria-media-library.php:3860
msgid "Media Library Folders Settings"
msgstr "Настройки Media Library Folders"

#: ../maxgalleria-media-library.php:3868
msgid "Disable floating file tree"
msgstr "Отключить плавающее дерево файлов"

#: ../maxgalleria-media-library.php:3942
msgid "Error: "
msgstr "Ошибка: "

#: ../maxgalleria-media-library.php:3946
#, php-format
msgid "Unknown error with %s"
msgstr "Неизвестная ошибка в %s"

#: ../maxgalleria-media-library.php:3957
#, php-format
msgid "Thumbnails have been regenerated for %d image(s)"
msgstr "Эскизы пересозданы для %d изображений(я)"

#: ../maxgalleria-media-library.php:3996
msgid "Cheatin&#8217; uh?"
msgstr "Хакер, да?"

#: ../maxgalleria-media-library.php:4007
#, php-format
msgid "Unable to find any images. Are you sure <a href='%s'>some exist</a>?"
msgstr ""
"Не найдено ни одной картинки. Вы уверены, что <a href='%s'>они есть</a>?"

#: ../maxgalleria-media-library.php:4018
msgid ""
"Please wait while the thumbnails are regenerated. This may take a while."
msgstr "Подождите, пока эскизы пересоздадутся. Это займет некоторое время."

#: ../maxgalleria-media-library.php:4022
#, php-format
msgid "To go back to the previous page, <a href=\"%s\">click here</a>."
msgstr ""
"Чтобы вернуться к предыдущей странице, <a href=\"%s\">нажмите здесь</a>."

#: ../maxgalleria-media-library.php:4023
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a href="
"\"%4$s\">click here</a>. %5$s"
msgstr ""
"Готово! %1$s изображений(я) успешно отмасштабированы(о) за %2$s сек.; число "
"ошибок: %3$s . Чтобы пересоздать неудавшиеся изображения, <a href=\"%4$s"
"\">нажмите здесь</a>. %5$s"

#: ../maxgalleria-media-library.php:4024
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""
"Готово! %1$s изображений(я) успешно отмасштабированы(о) за %2$s сек. без "
"ошибок. %3$s"

#: ../maxgalleria-media-library.php:4028 ../maxgalleria-media-library.php:4174
msgid "You must enable Javascript in order to proceed!"
msgstr "Чтобы продолжить, включите JavaScript!"

#: ../maxgalleria-media-library.php:4034
msgid "Abort Resizing Images"
msgstr "Отменить масштабирование изображений"

#: ../maxgalleria-media-library.php:4036
msgid "Debugging Information"
msgstr "Информация для отладки"

#: ../maxgalleria-media-library.php:4039
#, php-format
msgid "Total Images: %s"
msgstr "Всего изображений: %s"

#: ../maxgalleria-media-library.php:4040
#, php-format
msgid "Images Resized: %s"
msgstr "Изображений отмасштабировано: %s"

#: ../maxgalleria-media-library.php:4041
#, php-format
msgid "Resize Failures: %s"
msgstr "Масштабирование не удалось: %s"

#: ../maxgalleria-media-library.php:4072
msgid "Stopping..."
msgstr "Остановка..."

#: ../maxgalleria-media-library.php:4124
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""
"Масштабирование было экстренно завершено (ID %s). Возможно изображение не "
"уместилось в памяти или возникла другая критическая ошибка."

#: ../maxgalleria-media-library.php:4167
msgid ""
"Click the button below to regenerate thumbnails for all images in the Media "
"Library. This is helpful if you have added new thumbnail sizes to your site. "
"Existing thumbnails will not be removed to prevent breaking any links."
msgstr ""
"Нажмите на кнопку внизу, чтобы пересоздать эскизы для всех изображений в "
"Библиотеке Медиафайлов. Это удобно, когда вы добавили новый размер эскизов "
"на Ваш сайт. Существующие эскизы не удалятся, чтобы не сломать существующие "
"ссылки."

#: ../maxgalleria-media-library.php:4169
msgid ""
"You can regenerate thumbnails for individual images from the Media Library "
"Folders page by checking the box below one or more images and clicking the "
"Regenerate Thumbnails button. The regenerate operation is not reversible but "
"you can always generate the sizes you need by adding additional thumbnail "
"sizes to your theme."
msgstr ""
"Вы можете пересоздать эскизы отдельно для каждого изображения, просто "
"отметьте нужные галочкой и нажмите кнопку Пересоздать Эскизы. Операция "
"пересоздания необратима, но вы всегда можете добавить нужные размеры, "
"добавив дополнительные размеры эскизов в Вашей теме."

#: ../maxgalleria-media-library.php:4172
msgid "Regenerate All Thumbnails"
msgstr "Пересоздать Все Эскизы"

#: ../maxgalleria-media-library.php:4198
#, php-format
msgid "Failed resize: %s is an invalid image ID."
msgstr "Масштабирование не удалось: %s - некорректный ID изображения."

#: ../maxgalleria-media-library.php:4201
msgid "Your user account doesn't have permission to resize images"
msgstr "Ваш аккаунт не имеет прав на масштабирование изображений"

#: ../maxgalleria-media-library.php:4206
#, php-format
msgid "The originally uploaded image file cannot be found at %s"
msgstr "Исходный файл не найден в %s"

#: ../maxgalleria-media-library.php:4215
msgid "Unknown failure reason."
msgstr "Неизвестная ошибка."

#: ../maxgalleria-media-library.php:4220
#, php-format
msgid "&quot;%1$s&quot; (ID %2$s) was successfully resized in %3$s seconds."
msgstr "&quot;%1$s&quot; (ID %2$s) успешно отмасштабировано за %3$s сек."

#: ../maxgalleria-media-library.php:4226
#, php-format
msgid ""
"&quot;%1$s&quot; (ID %2$s) failed to resize. The error message was: %3$s"
msgstr ""
"&quot;%1$s&quot; (ID %2$s) не удалось отмасштабировать. Текст ошибки: %3$s"

#: ../maxgalleria-media-library.php:4261
msgid ""
"When Image SEO is enabled Media Library Folders automatically adds  ALT and "
"Title attributes with the default settings defined below to all your images "
"as they are uploaded."
msgstr ""
"Когда SEO изображений включено Media Library Folders автоматически добавит "
"атрибуты ALT и Title с заданными ниже настройками по умолчанию ко всем "
"изображениям, которые вы загрузите."

#: ../maxgalleria-media-library.php:4262
msgid ""
"You can easily override the Image SEO default settings when you  are "
"uploading new images. When Image SEO is enabled you will see two fields  "
"under the Upload Box when you add a file - Image Title Text and Image ALT "
"Text.  Whatever you type into these fields overrides the default settings "
"for the  current upload or sync operations."
msgstr ""
"Вы можете легко переопределить настройки по умолчанию, когда вы загружаете "
"новые изображения. Когда SEO изображений включено, вы увидите два поля под "
"окном загрузки изображения - Image Title Text и Image ALT Text. То что Вы "
"напишете в эти поля, переопределит настройки по умолчанию для текущих "
"операций загрузки или синхронизации."

#: ../maxgalleria-media-library.php:4263
msgid ""
"To change the settings on an individual image simply click on  the image and "
"change the settings on the far right.  Save and then back click to return to "
"Media  Library Plus or MLPP."
msgstr ""
"Чтобы изменить настройки для конкретного изображения, просто нажмите на "
"изображение и измените настройки на панели справа. Сохраните и вернитесь "
"назад к Media Library Folders."

#: ../maxgalleria-media-library.php:4264
msgid "Image SEO supports two special tags:"
msgstr "SEO изображений поддерживает два специальных тэга:"

#: ../maxgalleria-media-library.php:4265
#, php-format
msgid "%filename - replaces image file name ( without extension )"
msgstr "%filename - заменяет имя файла (без расширения)"

#: ../maxgalleria-media-library.php:4266
#, php-format
msgid "%foldername - replaces image folder name"
msgstr "%foldername - заменяет имя папки"

#: ../maxgalleria-media-library.php:4287
msgid "Turn on Image SEO:"
msgstr "Включить SEO изображений:"

#: ../maxgalleria-media-library.php:4292
msgid "Image ALT attribute:"
msgstr "ALT атрибут изображения:"

#: ../maxgalleria-media-library.php:4294 ../maxgalleria-media-library.php:4299
msgid "example"
msgstr "пример"

#: ../maxgalleria-media-library.php:4297
msgid "Image Title attribute:"
msgstr "TITLE атрибут изображения:"

#: ../maxgalleria-media-library.php:4302
msgid "Update Settings"
msgstr "Применить настройки"

#: ../maxgalleria-media-library.php:4345
msgid "The Image SEO setting have been updated "
msgstr "Настройки SEO изображений были успешно обновлены "

#: ../maxgalleria-media-library.php:4454
msgid "Support - System Information"
msgstr "Поддержка - Системная информация"

#: ../maxgalleria-media-library.php:4468
msgid ""
"You may be asked to provide the information below to help troubleshoot your "
"issue."
msgstr ""
"Вас могут попросить предоставить следующую информацию, чтобы помочь решить "
"Вашу проблему."

#: ../maxgalleria-media-library.php:4604
msgid "The selected folder, subfolders and thier files have been hidden."
msgstr "Выбранная папка, её подпапки и файлы успешно скрыты."
````

## File: Old Plugin/languages/maxgalleria-media-library.pot
````
msgid ""
msgstr ""
"Project-Id-Version: maxgalleria-media-library\n"
"POT-Creation-Date: 2025-02-04 09:20-0300\n"
"PO-Revision-Date: 2025-02-04 09:20-0300\n"
"Last-Translator: Alan Pasho <apasho@gmail.com>\n"
"Language-Team: \n"
"Language: en_US\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Poedit 1.6.9\n"
"X-Poedit-Basepath: .\n"
"Plural-Forms: nplurals=2; plural=(n != 1);\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"X-Poedit-SearchPath-0: ..\n"

#: ../includes/media-library.php:82
msgid "Current PHP version, "
msgstr ""

#: ../includes/media-library.php:82
msgid ", is outdated. Please upgrade to version 7.4."
msgstr ""

#: ../includes/media-library.php:104
msgid "Location:"
msgstr ""

#: ../includes/mlf-thumbnails.php:70 ../media-library-plus.php:4729
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a href="
"\"%4$s\">click here</a>. %5$s"
msgstr ""

#: ../includes/mlf-thumbnails.php:71 ../media-library-plus.php:4730
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""

#: ../includes/mlf-thumbnails.php:85 ../media-library-plus.php:4744
msgid "Total Images: "
msgstr ""

#: ../includes/mlf-thumbnails.php:172 ../media-library-plus.php:4831
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""

#: ../media-library-plus.php:725
msgid ""
"Folder names may only include the following punctuation marks: period, dash, "
"underscore, and tilde."
msgstr ""

#: ../media-library-plus.php:1133
msgid "You do not have permission to upload files."
msgstr ""

#: ../media-library-plus.php:1285
msgid "An unequal number of items were sent to update_links function."
msgstr ""

#: ../media-library-plus.php:2972 ../media-library-plus.php:4968
msgid "missing nonce!"
msgstr ""

#: ../media-library-plus.php:3021
#, php-format
msgid "%d images were added."
msgstr ""

#: ../media-library-plus.php:3100
msgid "Media Library Folders Search Results"
msgstr ""

#: ../media-library-plus.php:3103
msgid "Search"
msgstr ""

#: ../media-library-plus.php:3107
msgid ""
"Click on an image to go to its folder or a on folder to view its contents."
msgstr ""

#: ../media-library-plus.php:3109
msgid "Search results for: "
msgstr ""

#: ../media-library-plus.php:3608
msgid "Scanning for new folders in "
msgstr ""

#: ../media-library-plus.php:3633 ../media-library-plus.php:3667
#: ../media-library-plus.php:3698
msgid "Adding"
msgstr ""

#: ../media-library-plus.php:5981
msgid "Unable to move "
msgstr ""

#: ../media-library-plus.php:5981
msgid "; please check the folder and file permissions."
msgstr ""

#: ../media-library-plus.php:5987
msgid "The destination is not a folder: "
msgstr ""

#: ../media-library-plus.php:5992
msgid "Cannot find destination folder: "
msgstr ""

#: ../media-library-plus.php:6002
msgid "Cannot find the file: "
msgstr ""

#: ../media-library-plus.php:6009
msgid " was copied to "
msgstr ""

#: ../media-library-plus.php:6011
msgid " was not copied."
msgstr ""

#: ../media-library-plus.php:6015
msgid " was moved to "
msgstr ""

#: ../media-library-plus.php:6017
msgid " was not moved."
msgstr ""

#: ../media-library-plus.php:7017
msgid "Copy Link"
msgstr ""

#: ../media-library-plus.php:7029
msgid "Missing nonce! Please refresh this page."
msgstr ""

#: ../mlp-reset.php:240
msgid "Number of attachments"
msgstr ""

#: ../mlp-reset.php:492
msgid "missing nonce! Please refresh this page."
msgstr ""
````

## File: Old Plugin/languages/mlp-reset-nl_NL.po
````
msgid ""
msgstr ""
"Project-Id-Version: mlp-reset\n"
"POT-Creation-Date: 2022-10-03 10:38-0300\n"
"PO-Revision-Date: 2022-10-03 19:02+0200\n"
"Last-Translator: Peter Smits <peter@psmits.com>\n"
"Language-Team: \n"
"Language: nl_NL\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"Plural-Forms: nplurals=2; plural=(n != 1);\n"
"X-Generator: Poedit 3.1.1\n"
"X-Poedit-Basepath: .\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"X-Poedit-SearchPath-0: ..\n"

#: ../includes/media-library.php:83
msgid "Current PHP version, "
msgstr "Huidige PHP versie, "

#: ../includes/media-library.php:83
msgid ", is outdated. Please upgrade to version 7.4."
msgstr ", is verouderd. Voer een upgrade uit naar versie 7.4."

#: ../includes/media-library.php:105
msgid "Location:"
msgstr "Locatie:"

#: ../includes/mlf-settings.php:29
msgid "Add an index to the postmeta table"
msgstr "Een index toevoegen aan de postmeta tabel"

#: ../includes/mlf-settings.php:29
msgid ""
"For sites with a large number of media files, check this option to create a "
"new index fro the postmeta table to speed by the loading of the Media "
"Library Folders Pro page."
msgstr ""
"Voor sites met een groot aantal mediabestanden, vink je deze optie aan om "
"een nieuwe index te maken voor de postmeta tabel, om sneller te laden door "
"de pagina Media Library Folders Pro te laden."

#: ../includes/mlf-thumbnails.php:70 ../media-library-plus.php:3947
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a href="
"\"%4$s\">click here</a>. %5$s"
msgstr ""
"Helemaal klaar! %1$s afbeelding(en) zijn opnieuw geschaald in %2$s seconden "
"en er waren %3$s mislukking(en). Om te proberen de grootte van mislukte "
"afbeeldingen opnieuw te wijzigen, <a href=\"%4$s\">klik hier</a>. %5$s"

#: ../includes/mlf-thumbnails.php:71 ../media-library-plus.php:3948
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""
"Helemaal klaar! %1$s afbeelding(en) zijn met succes herschaald in %2$s "
"seconden en er waren 0 mislukkingen. %3$s"

#: ../includes/mlf-thumbnails.php:85 ../media-library-plus.php:3962
msgid "Total Images: "
msgstr "Totaal aantal afbeeldingen:"

#: ../includes/mlf-thumbnails.php:172 ../media-library-plus.php:4049
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""
"De herschaling werd abnormaal beëindigd (ID %s). Dit komt waarschijnlijk "
"doordat omvang van de afbeelding het beschikbare geheugen overschrijdt of "
"door een ander type fatale fout."

#: ../media-library-plus.php:14
msgid ""
"You must deactivate Media Library Folders before activating Media Library "
"Folders Pro"
msgstr ""
"Je moet Media Library Folders deactiveren voordat je Media Library Folders "
"Pro activeert"

#: ../media-library-plus.php:400
msgid "Media Library Folders"
msgstr "Media Library Folders"

#: ../media-library-plus.php:401
msgid "Folders & Files"
msgstr "Mappen & bestanden"

#: ../media-library-plus.php:402
msgid "Thumbnails"
msgstr "Thumbnails"

#: ../media-library-plus.php:403
msgid "Image SEO"
msgstr "SEO voor afbeeldingen"

#: ../media-library-plus.php:404
msgid "Settings"
msgstr "Instellingen"

#: ../media-library-plus.php:405
msgid "Support"
msgstr "Ondersteuning"

#: ../media-library-plus.php:458
msgid "Brought to you by "
msgstr "Gebracht aan je door"

#: ../media-library-plus.php:459
msgid "Makers of"
msgstr "Makers van"

#: ../media-library-plus.php:459
msgid "and"
msgstr "en"

#: ../media-library-plus.php:464
msgid "Click here to"
msgstr "Klik hier om"

#: ../media-library-plus.php:464
msgid "Fix Common Problems"
msgstr "Veelvoorkomende problemen oplossen"

#: ../media-library-plus.php:465
msgid "Need more help? Check out our "
msgstr "Meer hulp nodig? Bekijk onze "

#: ../media-library-plus.php:465
msgid "Support Forums"
msgstr "Support Forums"

#: ../media-library-plus.php:466
msgid "Or Email Us at"
msgstr "Of stuur een e-mail naar"

#: ../media-library-plus.php:576 ../media-library-plus.php:2705
#: ../media-library-plus.php:2730 ../media-library-plus.php:2776
#: ../media-library-plus.php:3316
msgid "missing nonce!"
msgstr "ontbrekende nonce!"

#: ../media-library-plus.php:1214 ../media-library-plus.php:1269
#: ../media-library-plus.php:1298 ../media-library-plus.php:1317
#: ../media-library-plus.php:1917 ../media-library-plus.php:2345
#: ../media-library-plus.php:2524 ../media-library-plus.php:2755
#: ../media-library-plus.php:4177
msgid "missing nonce! Please refresh this page."
msgstr "ontbrekende nonce! Vernieuw deze pagina."

#: ../media-library-plus.php:1960
msgid "The folder was created."
msgstr "De map is gemaakt."

#: ../media-library-plus.php:1966
msgid "There was a problem creating the folder."
msgstr "Er is een probleem opgetreden bij het maken van de map."

#: ../media-library-plus.php:1972
msgid "The folder already exists."
msgstr "De map bestaat al."

#: ../media-library-plus.php:2012
msgid "The URL to the folder or image is not correct: "
msgstr "De URL naar de map of afbeelding is niet correct"

#: ../media-library-plus.php:2104
msgid "The uploads folder cannot be deleted."
msgstr "De map uploads kan niet worden verwijderd."

#: ../media-library-plus.php:2134
msgid "The folder, "
msgstr "De map, "

#: ../media-library-plus.php:2134
msgid ", is not empty. Please delete or move files from the folder"
msgstr ", is niet leeg. Verwijder of verplaats bestanden uit de map"

#: ../media-library-plus.php:2150
msgid "The folder could not be deleted."
msgstr "De map kan niet worden verwijderd."

#: ../media-library-plus.php:2153
msgid "The folder is not empty and could not be deleted."
msgstr "De map is niet leeg en kan niet worden verwijderd."

#: ../media-library-plus.php:2162
msgid "The folder was deleted."
msgstr "De map is verwijderd."

#: ../media-library-plus.php:2182
msgid "The file(s) were deleted"
msgstr "De bestanden zijn verwijderd"

#: ../media-library-plus.php:2200
msgid "The file(s) were not deleted"
msgstr "De bestanden zijn niet verwijderd"

#: ../media-library-plus.php:2414
msgid "Search results for: "
msgstr "Zoekresultaten voor: "

#: ../media-library-plus.php:2799
msgid "Added"
msgstr "Toegevoegd"

#: ../media-library-plus.php:2819
msgid "Scanning for new folders in "
msgstr "Scannen op nieuwe mappen in "

#: ../media-library-plus.php:2844 ../media-library-plus.php:2878
#: ../media-library-plus.php:2909 ../media-library-plus.php:2958
msgid "Adding"
msgstr "Aan het toevoegen"

#: ../media-library-plus.php:3728
msgid ""
"Add an index to the postmeta table. <em>Recommend for sites with a high "
"number of media files. Uncheck to remove the index.</em>"
msgstr ""
"Voeg een index toe aan de postmeta tabel. <em>Aanbevolen voor sites met een "
"groot aantal mediabestanden. Verwijder het vinkje om de index te "
"verwijderen.</em>"

#: ../media-library-plus.php:4688
msgid "Scanning for new files and folders...please wait."
msgstr "Zoeken naar nieuwe bestanden en mappen ... even geduld."

#: ../media-library-plus.php:4693
msgid "Syncing finished."
msgstr "Synchronisatie voltooid."

#: ../media-library-plus.php:4719
msgid "Adding "
msgstr "Aan het toevoegen "

#: ../media-library-plus.php:4722
msgid " is not an allowed file type. It was not added."
msgstr " is geen toegestaan ​​bestandstype. Het is niet toegevoegd."

#: ../media-library-plus.php:4846
msgid "Finished copying files. "
msgstr "Klaar met het kopiëren van bestanden. "

#: ../media-library-plus.php:4848
msgid "Finished moving files. "
msgstr "Klaar met het verplaatsen van bestanden. "

#: ../media-library-plus.php:5085
msgid "Unable to move "
msgstr "Kan niet verplaatsen "

#: ../media-library-plus.php:5085
msgid "; please check the folder and file permissions."
msgstr "; controleer de map en bestandsrechten."

#: ../media-library-plus.php:5091
msgid "The destination is not a folder: "
msgstr "De bestemming is geen map: "

#: ../media-library-plus.php:5096
msgid "Cannot find destination folder: "
msgstr "Kan doelmap niet vinden: "

#: ../media-library-plus.php:5106
msgid "Cannot find the file: "
msgstr "Kan het bestand niet vinden: "

#: ../media-library-plus.php:5113
msgid " was copied to "
msgstr " is gekopieerd naar "

#: ../media-library-plus.php:5115
msgid " was not copied."
msgstr " is niet gekopieerd."

#: ../media-library-plus.php:5119
msgid " was moved to "
msgstr " is verplaatst naar "

#: ../media-library-plus.php:5121
msgid " was not moved."
msgstr " werd niet verplaatst."

#: ../mlp-reset.php:199
msgid "Number of attachments"
msgstr "Aantal bijlagen"

msgid "Unable to Update Media Library Folders Reset"
msgstr "Kan Media Library Folders Reset niet updaten"

msgid "Media Library Folders Search Results"
msgstr "Media Library Folders zoekresultaten"

msgid "Back to Media Library Folders"
msgstr "Terug naar Media Library Folders"

msgid "Media Library Folders Settings"
msgstr "Media Library Folders instellingen"

msgid "Media Library Folders Reset"
msgstr "Reset MLF"
````

## File: Old Plugin/languages/mlp-reset.pot
````
msgid ""
msgstr ""
"Project-Id-Version: mlp-reset\n"
"POT-Creation-Date: 2025-02-04 09:21-0300\n"
"PO-Revision-Date: 2025-02-04 09:21-0300\n"
"Last-Translator: Alan Pasho <apasho@gmail.com>\n"
"Language-Team: \n"
"Language: en_US\n"
"MIME-Version: 1.0\n"
"Content-Type: text/plain; charset=UTF-8\n"
"Content-Transfer-Encoding: 8bit\n"
"X-Generator: Poedit 1.6.9\n"
"X-Poedit-Basepath: .\n"
"Plural-Forms: nplurals=2; plural=(n != 1);\n"
"X-Poedit-SourceCharset: UTF-8\n"
"X-Poedit-KeywordsList: __;_e\n"
"X-Poedit-SearchPath-0: ..\n"

#: ../includes/media-library.php:82
msgid "Current PHP version, "
msgstr ""

#: ../includes/media-library.php:82
msgid ", is outdated. Please upgrade to version 7.4."
msgstr ""

#: ../includes/media-library.php:104
msgid "Location:"
msgstr ""

#: ../includes/mlf-thumbnails.php:70 ../media-library-plus.php:4729
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were %3$s failure(s). To try regenerating the failed images again, <a href="
"\"%4$s\">click here</a>. %5$s"
msgstr ""

#: ../includes/mlf-thumbnails.php:71 ../media-library-plus.php:4730
#, php-format
msgid ""
"All done! %1$s image(s) were successfully resized in %2$s seconds and there "
"were 0 failures. %3$s"
msgstr ""

#: ../includes/mlf-thumbnails.php:85 ../media-library-plus.php:4744
msgid "Total Images: "
msgstr ""

#: ../includes/mlf-thumbnails.php:172 ../media-library-plus.php:4831
#, php-format
msgid ""
"The resize request was abnormally terminated (ID %s). This is likely due to "
"the image exceeding available memory or some other type of fatal error."
msgstr ""

#: ../media-library-plus.php:725
msgid ""
"Folder names may only include the following punctuation marks: period, dash, "
"underscore, and tilde."
msgstr ""

#: ../media-library-plus.php:1133
msgid "You do not have permission to upload files."
msgstr ""

#: ../media-library-plus.php:1285
msgid "An unequal number of items were sent to update_links function."
msgstr ""

#: ../media-library-plus.php:2972 ../media-library-plus.php:4968
msgid "missing nonce!"
msgstr ""

#: ../media-library-plus.php:3021
#, php-format
msgid "%d images were added."
msgstr ""

#: ../media-library-plus.php:3100
#, fuzzy
msgid "Media Library Folders Search Results"
msgstr "Reset MLF"

#: ../media-library-plus.php:3103
msgid "Search"
msgstr ""

#: ../media-library-plus.php:3107
msgid ""
"Click on an image to go to its folder or a on folder to view its contents."
msgstr ""

#: ../media-library-plus.php:3109
msgid "Search results for: "
msgstr ""

#: ../media-library-plus.php:3608
msgid "Scanning for new folders in "
msgstr ""

#: ../media-library-plus.php:3633 ../media-library-plus.php:3667
#: ../media-library-plus.php:3698
msgid "Adding"
msgstr ""

#: ../media-library-plus.php:5981
msgid "Unable to move "
msgstr ""

#: ../media-library-plus.php:5981
msgid "; please check the folder and file permissions."
msgstr ""

#: ../media-library-plus.php:5987
msgid "The destination is not a folder: "
msgstr ""

#: ../media-library-plus.php:5992
msgid "Cannot find destination folder: "
msgstr ""

#: ../media-library-plus.php:6002
msgid "Cannot find the file: "
msgstr ""

#: ../media-library-plus.php:6009
msgid " was copied to "
msgstr ""

#: ../media-library-plus.php:6011
msgid " was not copied."
msgstr ""

#: ../media-library-plus.php:6015
msgid " was moved to "
msgstr ""

#: ../media-library-plus.php:6017
msgid " was not moved."
msgstr ""

#: ../media-library-plus.php:7017
msgid "Copy Link"
msgstr ""

#: ../media-library-plus.php:7029
msgid "Missing nonce! Please refresh this page."
msgstr ""

#: ../mlp-reset.php:240
msgid "Number of attachments"
msgstr ""

#: ../mlp-reset.php:492
msgid "missing nonce! Please refresh this page."
msgstr ""

#, fuzzy
#~ msgid "Media Library Folders"
#~ msgstr "Reset MLF"

#, fuzzy
#~ msgid "Unable to Update Media Library Folders Reset"
#~ msgstr "Reset MLF"

#, fuzzy
#~ msgid "Back to Media Library Folders"
#~ msgstr "Reset MLF"

#, fuzzy
#~ msgid "Media Library Folders Settings"
#~ msgstr "Reset MLF"

#~ msgid "Media Library Folders Reset"
#~ msgstr "Reset MLF"
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_animated.less
````
// animating icons
// --------------------------

.@{fa-css-prefix}-beat {
  animation-name: ~'@{fa-css-prefix}-beat';
  animation-delay: ~'var(--@{fa-css-prefix}-animation-delay, 0)';
  animation-direction: ~'var(--@{fa-css-prefix}-animation-direction, normal)';
  animation-duration: ~'var(--@{fa-css-prefix}-animation-duration, 1s)';
  animation-iteration-count: ~'var(--@{fa-css-prefix}-animation-iteration-count, infinite)';
  animation-timing-function: ~'var(--@{fa-css-prefix}-animation-timing, ease-in-out)';
}

.@{fa-css-prefix}-bounce {
  animation-name: ~'@{fa-css-prefix}-beat';
  animation-delay: ~'var(--@{fa-css-prefix}-animation-delay, 0)';
  animation-direction: ~'var(--@{fa-css-prefix}-animation-direction, normal)';
  animation-duration: ~'var(--@{fa-css-prefix}-animation-duration, 1s)';
  animation-iteration-count: ~'var(--@{fa-css-prefix}-animation-iteration-count, infinite)';
  animation-timing-function: ~'var(--@{fa-css-prefix}-animation-timing, cubic-bezier(0.280, 0.840, 0.420, 1))';
}

.@{fa-css-prefix}-fade {
  animation-name: ~'@{fa-css-prefix}-fade';
  animation-delay: ~'var(--@{fa-css-prefix}-animation-delay, 0)';
  animation-direction: ~'var(--@{fa-css-prefix}-animation-direction, normal)';
  animation-duration: ~'var(--@{fa-css-prefix}-animation-duration, 1s)';
  animation-iteration-count: ~'var(--@{fa-css-prefix}-animation-iteration-count, infinite)';
  animation-timing-function: ~'var(--@{fa-css-prefix}-animation-timing, cubic-bezier(.4,0,.6,1))';
}

.@{fa-css-prefix}-beat-fade {
  animation-name: ~'@{fa-css-prefix}-beat-fade';
  animation-delay: ~'var(--@{fa-css-prefix}-animation-delay, 0)';
  animation-direction: ~'var(--@{fa-css-prefix}-animation-direction, normal)';
  animation-duration: ~'var(--@{fa-css-prefix}-animation-duration, 1s)';
  animation-iteration-count: ~'var(--@{fa-css-prefix}-animation-iteration-count, infinite)';
  animation-timing-function: ~'var(--@{fa-css-prefix}-animation-timing, cubic-bezier(.4,0,.6,1))';
}

.@{fa-css-prefix}-flip {
  animation-name: ~'@{fa-css-prefix}-flip';
  animation-delay: ~'var(--@{fa-css-prefix}-animation-delay, 0)';
  animation-direction: ~'var(--@{fa-css-prefix}-animation-direction, normal)';
  animation-duration: ~'var(--@{fa-css-prefix}-animation-duration, 1s)';
  animation-iteration-count: ~'var(--@{fa-css-prefix}-animation-iteration-count, infinite)';
  animation-timing-function: ~'var(--@{fa-css-prefix}-animation-timing, ease-in-out)';
}

.@{fa-css-prefix}-shake {
  animation-name: ~'@{fa-css-prefix}-shake';
  animation-delay: ~'var(--@{fa-css-prefix}-animation-delay, 0)';
  animation-direction: ~'var(--@{fa-css-prefix}-animation-direction, normal)';
  animation-duration: ~'var(--@{fa-css-prefix}-animation-duration, 1s)';
  animation-iteration-count: ~'var(--@{fa-css-prefix}-animation-iteration-count, infinite)';
  animation-timing-function: ~'var(--@{fa-css-prefix}-animation-timing, ease-in-out)';
}

.@{fa-css-prefix}-spin {
  animation-name: ~'@{fa-css-prefix}-spin';
  animation-delay: ~'var(--@{fa-css-prefix}-animation-delay, 0)';
  animation-direction: ~'var(--@{fa-css-prefix}-animation-direction, normal)';
  animation-duration: ~'var(--@{fa-css-prefix}-animation-duration, 2s)';
  animation-iteration-count: ~'var(--@{fa-css-prefix}-animation-iteration-count, infinite)';
  animation-timing-function: ~'var(--@{fa-css-prefix}-animation-timing, linear)';
}

.@{fa-css-prefix}-spin-reverse {
  --@{fa-css-prefix}-animation-direction: reverse;
}

// if agent or operating system prefers reduced motion, disable animations
// see: https://www.smashingmagazine.com/2020/09/design-reduced-motion-sensitivities/
// see: https://developer.mozilla.org/en-US/docs/Web/CSS/@media/prefers-reduced-motion
@media (prefers-reduced-motion: reduce) {
  .@{fa-css-prefix}-beat,
  .@{fa-css-prefix}-bounce,
  .@{fa-css-prefix}-fade,
  .@{fa-css-prefix}-beat-fade,
  .@{fa-css-prefix}-flip,
  .@{fa-css-prefix}-pulse,
  .@{fa-css-prefix}-shake,
  .@{fa-css-prefix}-spin,
  .@{fa-css-prefix}-spin-pulse {
    animation-delay: -1ms;
    animation-duration: 1ms;
    animation-iteration-count: 1;
    transition-delay: 0s;
    transition-duration: 0s;
  }
}

@keyframes ~'@{fa-css-prefix}-beat' {
  0%, 90% { transform: scale(1); }
  45% { transform: ~'scale(var(--@{fa-css-prefix}-beat-scale, 1.25))'; }
}

@keyframes  ~'@{fa-css-prefix}-bounce' {
  0%   { transform: scale(1,1) translateY(0); }
  10%  { transform: ~'scale(var(--#{$fa-css-prefix}-bounce-start-scale-x, 1.1),var(--#{$fa-css-prefix}-bounce-start-scale-y, 0.9))' translateY(0); }
  30%  { transform: ~'scale(var(--#{$fa-css-prefix}-bounce-jump-scale-x, 0.9),var(--#{$fa-css-prefix}-bounce-jump-scale-y, 1.1))' ~'translateY(var(--#{$fa-css-prefix}-bounce-height, -0.5em))'; }
  50%  { transform: ~'scale(var(--#{$fa-css-prefix}-bounce-land-scale-x, 1.05),var(--#{$fa-css-prefix}-bounce-land-scale-y, 0.95))' translateY(0); }
  57%  { transform: ~'scale(1,1) translateY(var(--#{$fa-css-prefix}-bounce-rebound, -0.125em))'; }
  64%  { transform: scale(1,1) translateY(0); }
  100% { transform: scale(1,1) translateY(0); }
}

@keyframes ~'@{fa-css-prefix}-fade' {
  50% { opacity: ~'var(--@{fa-css-prefix}-fade-opacity, 0.4)'; }
}

@keyframes ~'@{fa-css-prefix}-beat-fade' {
  0%, 100% {
    opacity: ~'var(--@{fa-css-prefix}-beat-fade-opacity, 0.4)';
    transform: scale(1);
  }
  50% {
    opacity: 1;
    transform: ~'scale(var(--@{fa-css-prefix}-beat-fade-scale, 1.125))';
  }
}

@keyframes ~'@{fa-css-prefix}-flip' {
  50% {
    transform: ~'rotate3d(var(--@{fa-css-prefix}-flip-x, 0), var(--@{fa-css-prefix}-flip-y, 1), var(--@{fa-css-prefix}-flip-z, 0), var(--@{fa-css-prefix}-flip-angle, -180deg))';
  }
}

@keyframes ~'@{fa-css-prefix}-shake' {
  0% { transform: rotate(-15deg); }
  4% { transform: rotate(15deg); }
  8%, 24% { transform: rotate(-18deg); }
  12%, 28% { transform: rotate(18deg); }
  16% { transform: rotate(-22deg); }
  20% { transform: rotate(22deg); }
  32% { transform: rotate(-12deg); }
  36% { transform: rotate(12deg); }
  40%, 100% { transform: rotate(0deg); }
}

@keyframes ~'@{fa-css-prefix}-spin' {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_bordered-pulled.less
````
// bordered + pulled icons
// -------------------------

.@{fa-css-prefix}-border {
  border-color: ~'var(--@{fa-css-prefix}-border-color, @{fa-border-color})';
  border-radius: ~'var(--@{fa-css-prefix}-border-radius, @{fa-border-radius})';
  border-style: ~'var(--@{fa-css-prefix}-border-style, @{fa-border-style})';
  border-width: ~'var(--@{fa-css-prefix}-border-width, @{fa-border-width})';
  padding: ~'var(--@{fa-css-prefix}-border-padding, @{fa-border-padding})';
}

.@{fa-css-prefix}-pull-left { 
  float: left;
  margin-right: ~'var(--@{fa-css-prefix}-pull-margin, @{fa-pull-margin})'; 
}

.@{fa-css-prefix}-pull-right { 
  float: right;
  margin-left: ~'var(--@{fa-css-prefix}-pull-margin, @{fa-pull-margin})'; 
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_core.less
````
// base icon class definition
// -------------------------

@{fa-css-prefix} {
  font-family: ~'var(--@{fa-css-prefix}-style-family, @{fa-style-family})';
  font-weight: ~'var(--@{fa-css-prefix}-style, @{fa-style})';
}

.@{fa-css-prefix},
.fas,
.fa-solid,
.far,
.fa-regular,
.fal,
.fa-light,
.fat,
.fa-thin,
.fad,
.fa-duotone,
.fab,
.fa-brands {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  display: ~'var(--@{fa-css-prefix}-display, @{fa-display})';
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_fixed-width.less
````
// fixed-width icons
// -------------------------

.@{fa-css-prefix}-fw {
  text-align: center;
  width: @fa-fw-width;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_icons.less
````
// specific icon class definition
// -------------------------

/* Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
   readers do not read off random characters that represent icons */

each(.fa-icons(), {
  .@{fa-css-prefix}-@{key}::before { content: @value; }
});
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_list.less
````
// icons in a list
// -------------------------

.@{fa-css-prefix}-ul {
  list-style-type: none;
  margin-left: ~'var(--@{fa-css-prefix}-li-margin, @{fa-li-margin})';
  padding-left: 0;

  > li { position: relative; }
}

.@{fa-css-prefix}-li {
  left: calc(~'var(--@{fa-css-prefix}-li-width, @{fa-li-width})' * -1);
  position: absolute;
  text-align: center;
  width: ~'var(--@{fa-css-prefix}-li-width, @{fa-li-width})';
  line-height: inherit;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_mixins.less
````
// mixins
// --------------------------

// base rendering for an icon
.fa-icon() {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  font-weight: normal;
  line-height: 1;
}

// sets relative font-sizing and alignment (in _sizing)
.fa-size(@font-size) {
  font-size: (@font-size / @fa-size-scale-base) * 1em; // converts step in sizing scale into an em-based value that's relative to the scale's base
  line-height: (1 / @font-size) * 1em; // sets the line-height of the icon back to that of it's parent
  vertical-align: ((6 / @font-size) - (3 / 8)) * 1em; // vertically centers the icon taking into account the surrounding text's descender
}

// only display content to screen readers
// see: https://www.a11yproject.com/posts/2013-01-11-how-to-hide-content/
// see: https://hugogiraudel.com/2016/10/13/css-hide-and-seek/
.fa-sr-only() {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

// use in conjunction with .sr-only to only display content when it's focused
.fa-sr-only-focusable() {
  &:not(:focus) {
    .fa-sr-only();
  }
}

// convenience mixins for declaring pseudo-elements by CSS variable,
// including all style-specific font properties, and both the ::before
// and ::after elements in the duotone case.
.fa-icon-solid(@fa-var) {
  .fa-icon;
  .fa-solid;

  &::before {
    content: @fa-var;
  }
}

.fa-icon-regular(@fa-var) {
  .fa-icon;
  .fa-regular;

  &::before {
    content: @fa-var;
  }
}

.fa-icon-brands(@fa-var) {
  .fa-icon;
  .fa-brands;

  &::before {
    content: @fa-var;
  }
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_rotated-flipped.less
````
// rotating + flipping icons
// -------------------------

.@{fa-css-prefix}-rotate-90 {
  transform: rotate(90deg);
}

.@{fa-css-prefix}-rotate-180 {
  transform: rotate(180deg);
}

.@{fa-css-prefix}-rotate-270 {
  transform: rotate(270deg);
}

.@{fa-css-prefix}-flip-horizontal {
  transform: scale(-1, 1);
}

.@{fa-css-prefix}-flip-vertical {
  transform: scale(1, -1);
}

.@{fa-css-prefix}-flip-both,
.@{fa-css-prefix}-flip-horizontal.@{fa-css-prefix}-flip-vertical { 
  transform: scale(-1, -1);
}

.@{fa-css-prefix}-rotate-by {
  transform: rotate(~'var(--@{fa-css-prefix}-rotate-angle, none)');
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_screen-reader.less
````
// screen-reader utilities
// -------------------------

// only display content to screen readers
.sr-only,
.fa-sr-only {
  .fa-sr-only();
}

// use in conjunction with .sr-only to only display content when it's focused
.sr-only-focusable,
.fa-sr-only-focusable {
  .fa-sr-only-focusable();
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_shims.less
````
.@{fa-css-prefix}.@{fa-css-prefix}-glass:before { content: @fa-var-martini-glass-empty; }

.@{fa-css-prefix}.@{fa-css-prefix}-envelope-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-envelope-o:before { content: @fa-var-envelope; }

.@{fa-css-prefix}.@{fa-css-prefix}-star-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-star-o:before { content: @fa-var-star; }

.@{fa-css-prefix}.@{fa-css-prefix}-remove:before { content: @fa-var-xmark; }

.@{fa-css-prefix}.@{fa-css-prefix}-close:before { content: @fa-var-xmark; }

.@{fa-css-prefix}.@{fa-css-prefix}-gear:before { content: @fa-var-gear; }

.@{fa-css-prefix}.@{fa-css-prefix}-trash-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-trash-o:before { content: @fa-var-trash-can; }

.@{fa-css-prefix}.@{fa-css-prefix}-home:before { content: @fa-var-house; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-o:before { content: @fa-var-file; }

.@{fa-css-prefix}.@{fa-css-prefix}-clock-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-clock-o:before { content: @fa-var-clock; }

.@{fa-css-prefix}.@{fa-css-prefix}-arrow-circle-o-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-arrow-circle-o-down:before { content: @fa-var-circle-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-arrow-circle-o-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-arrow-circle-o-up:before { content: @fa-var-circle-up; }

.@{fa-css-prefix}.@{fa-css-prefix}-play-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-play-circle-o:before { content: @fa-var-circle-play; }

.@{fa-css-prefix}.@{fa-css-prefix}-repeat:before { content: @fa-var-arrow-rotate-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-rotate-right:before { content: @fa-var-arrow-rotate-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-refresh:before { content: @fa-var-arrows-rotate; }

.@{fa-css-prefix}.@{fa-css-prefix}-list-alt {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-list-alt:before { content: @fa-var-rectangle-list; }

.@{fa-css-prefix}.@{fa-css-prefix}-dedent:before { content: @fa-var-outdent; }

.@{fa-css-prefix}.@{fa-css-prefix}-video-camera:before { content: @fa-var-video; }

.@{fa-css-prefix}.@{fa-css-prefix}-picture-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-picture-o:before { content: @fa-var-image; }

.@{fa-css-prefix}.@{fa-css-prefix}-photo {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-photo:before { content: @fa-var-image; }

.@{fa-css-prefix}.@{fa-css-prefix}-image {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-image:before { content: @fa-var-image; }

.@{fa-css-prefix}.@{fa-css-prefix}-map-marker:before { content: @fa-var-location-dot; }

.@{fa-css-prefix}.@{fa-css-prefix}-pencil-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-pencil-square-o:before { content: @fa-var-pen-to-square; }

.@{fa-css-prefix}.@{fa-css-prefix}-edit {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-edit:before { content: @fa-var-pen-to-square; }

.@{fa-css-prefix}.@{fa-css-prefix}-share-square-o:before { content: @fa-var-share-from-square; }

.@{fa-css-prefix}.@{fa-css-prefix}-check-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-check-square-o:before { content: @fa-var-square-check; }

.@{fa-css-prefix}.@{fa-css-prefix}-arrows:before { content: @fa-var-up-down-left-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-times-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-times-circle-o:before { content: @fa-var-circle-xmark; }

.@{fa-css-prefix}.@{fa-css-prefix}-check-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-check-circle-o:before { content: @fa-var-circle-check; }

.@{fa-css-prefix}.@{fa-css-prefix}-mail-forward:before { content: @fa-var-share; }

.@{fa-css-prefix}.@{fa-css-prefix}-expand:before { content: @fa-var-up-right-and-down-left-from-center; }

.@{fa-css-prefix}.@{fa-css-prefix}-compress:before { content: @fa-var-down-left-and-up-right-to-center; }

.@{fa-css-prefix}.@{fa-css-prefix}-eye {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-eye-slash {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-warning:before { content: @fa-var-triangle-exclamation; }

.@{fa-css-prefix}.@{fa-css-prefix}-calendar:before { content: @fa-var-calendar-days; }

.@{fa-css-prefix}.@{fa-css-prefix}-arrows-v:before { content: @fa-var-up-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-arrows-h:before { content: @fa-var-left-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-bar-chart:before { content: @fa-var-chart-column; }

.@{fa-css-prefix}.@{fa-css-prefix}-bar-chart-o:before { content: @fa-var-chart-column; }

.@{fa-css-prefix}.@{fa-css-prefix}-twitter-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-facebook-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-gears:before { content: @fa-var-gears; }

.@{fa-css-prefix}.@{fa-css-prefix}-thumbs-o-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-thumbs-o-up:before { content: @fa-var-thumbs-up; }

.@{fa-css-prefix}.@{fa-css-prefix}-thumbs-o-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-thumbs-o-down:before { content: @fa-var-thumbs-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-heart-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-heart-o:before { content: @fa-var-heart; }

.@{fa-css-prefix}.@{fa-css-prefix}-sign-out:before { content: @fa-var-right-from-bracket; }

.@{fa-css-prefix}.@{fa-css-prefix}-linkedin-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-linkedin-square:before { content: @fa-var-linkedin; }

.@{fa-css-prefix}.@{fa-css-prefix}-thumb-tack:before { content: @fa-var-thumbtack; }

.@{fa-css-prefix}.@{fa-css-prefix}-external-link:before { content: @fa-var-up-right-from-square; }

.@{fa-css-prefix}.@{fa-css-prefix}-sign-in:before { content: @fa-var-right-to-bracket; }

.@{fa-css-prefix}.@{fa-css-prefix}-github-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-lemon-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-lemon-o:before { content: @fa-var-lemon; }

.@{fa-css-prefix}.@{fa-css-prefix}-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-square-o:before { content: @fa-var-square; }

.@{fa-css-prefix}.@{fa-css-prefix}-bookmark-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-bookmark-o:before { content: @fa-var-bookmark; }

.@{fa-css-prefix}.@{fa-css-prefix}-twitter {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-facebook {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-facebook:before { content: @fa-var-facebook-f; }

.@{fa-css-prefix}.@{fa-css-prefix}-facebook-f {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-facebook-f:before { content: @fa-var-facebook-f; }

.@{fa-css-prefix}.@{fa-css-prefix}-github {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-credit-card {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-feed:before { content: @fa-var-rss; }

.@{fa-css-prefix}.@{fa-css-prefix}-hdd-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hdd-o:before { content: @fa-var-hard-drive; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-o-right {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-o-right:before { content: @fa-var-hand-point-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-o-left {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-o-left:before { content: @fa-var-hand-point-left; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-o-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-o-up:before { content: @fa-var-hand-point-up; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-o-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-o-down:before { content: @fa-var-hand-point-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-globe:before { content: @fa-var-earth-americas; }

.@{fa-css-prefix}.@{fa-css-prefix}-tasks:before { content: @fa-var-bars-progress; }

.@{fa-css-prefix}.@{fa-css-prefix}-arrows-alt:before { content: @fa-var-maximize; }

.@{fa-css-prefix}.@{fa-css-prefix}-group:before { content: @fa-var-users; }

.@{fa-css-prefix}.@{fa-css-prefix}-chain:before { content: @fa-var-link; }

.@{fa-css-prefix}.@{fa-css-prefix}-cut:before { content: @fa-var-scissors; }

.@{fa-css-prefix}.@{fa-css-prefix}-files-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-files-o:before { content: @fa-var-copy; }

.@{fa-css-prefix}.@{fa-css-prefix}-floppy-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-floppy-o:before { content: @fa-var-floppy-disk; }

.@{fa-css-prefix}.@{fa-css-prefix}-save {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-save:before { content: @fa-var-floppy-disk; }

.@{fa-css-prefix}.@{fa-css-prefix}-navicon:before { content: @fa-var-bars; }

.@{fa-css-prefix}.@{fa-css-prefix}-reorder:before { content: @fa-var-bars; }

.@{fa-css-prefix}.@{fa-css-prefix}-magic:before { content: @fa-var-wand-magic-sparkles; }

.@{fa-css-prefix}.@{fa-css-prefix}-pinterest {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-pinterest-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-google-plus-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-google-plus {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-google-plus:before { content: @fa-var-google-plus-g; }

.@{fa-css-prefix}.@{fa-css-prefix}-money:before { content: @fa-var-money-bill-1; }

.@{fa-css-prefix}.@{fa-css-prefix}-unsorted:before { content: @fa-var-sort; }

.@{fa-css-prefix}.@{fa-css-prefix}-sort-desc:before { content: @fa-var-sort-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-sort-asc:before { content: @fa-var-sort-up; }

.@{fa-css-prefix}.@{fa-css-prefix}-linkedin {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-linkedin:before { content: @fa-var-linkedin-in; }

.@{fa-css-prefix}.@{fa-css-prefix}-rotate-left:before { content: @fa-var-arrow-rotate-left; }

.@{fa-css-prefix}.@{fa-css-prefix}-legal:before { content: @fa-var-gavel; }

.@{fa-css-prefix}.@{fa-css-prefix}-tachometer:before { content: @fa-var-gauge-high; }

.@{fa-css-prefix}.@{fa-css-prefix}-dashboard:before { content: @fa-var-gauge-high; }

.@{fa-css-prefix}.@{fa-css-prefix}-comment-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-comment-o:before { content: @fa-var-comment; }

.@{fa-css-prefix}.@{fa-css-prefix}-comments-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-comments-o:before { content: @fa-var-comments; }

.@{fa-css-prefix}.@{fa-css-prefix}-flash:before { content: @fa-var-bolt; }

.@{fa-css-prefix}.@{fa-css-prefix}-clipboard:before { content: @fa-var-paste; }

.@{fa-css-prefix}.@{fa-css-prefix}-lightbulb-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-lightbulb-o:before { content: @fa-var-lightbulb; }

.@{fa-css-prefix}.@{fa-css-prefix}-exchange:before { content: @fa-var-right-left; }

.@{fa-css-prefix}.@{fa-css-prefix}-cloud-download:before { content: @fa-var-cloud-arrow-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-cloud-upload:before { content: @fa-var-cloud-arrow-up; }

.@{fa-css-prefix}.@{fa-css-prefix}-bell-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-bell-o:before { content: @fa-var-bell; }

.@{fa-css-prefix}.@{fa-css-prefix}-cutlery:before { content: @fa-var-utensils; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-text-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-text-o:before { content: @fa-var-file-lines; }

.@{fa-css-prefix}.@{fa-css-prefix}-building-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-building-o:before { content: @fa-var-building; }

.@{fa-css-prefix}.@{fa-css-prefix}-hospital-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hospital-o:before { content: @fa-var-hospital; }

.@{fa-css-prefix}.@{fa-css-prefix}-tablet:before { content: @fa-var-tablet-screen-button; }

.@{fa-css-prefix}.@{fa-css-prefix}-mobile:before { content: @fa-var-mobile-screen-button; }

.@{fa-css-prefix}.@{fa-css-prefix}-mobile-phone:before { content: @fa-var-mobile-screen-button; }

.@{fa-css-prefix}.@{fa-css-prefix}-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-circle-o:before { content: @fa-var-circle; }

.@{fa-css-prefix}.@{fa-css-prefix}-mail-reply:before { content: @fa-var-reply; }

.@{fa-css-prefix}.@{fa-css-prefix}-github-alt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-folder-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-folder-o:before { content: @fa-var-folder; }

.@{fa-css-prefix}.@{fa-css-prefix}-folder-open-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-folder-open-o:before { content: @fa-var-folder-open; }

.@{fa-css-prefix}.@{fa-css-prefix}-smile-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-smile-o:before { content: @fa-var-face-smile; }

.@{fa-css-prefix}.@{fa-css-prefix}-frown-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-frown-o:before { content: @fa-var-face-frown; }

.@{fa-css-prefix}.@{fa-css-prefix}-meh-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-meh-o:before { content: @fa-var-face-meh; }

.@{fa-css-prefix}.@{fa-css-prefix}-keyboard-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-keyboard-o:before { content: @fa-var-keyboard; }

.@{fa-css-prefix}.@{fa-css-prefix}-flag-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-flag-o:before { content: @fa-var-flag; }

.@{fa-css-prefix}.@{fa-css-prefix}-mail-reply-all:before { content: @fa-var-reply-all; }

.@{fa-css-prefix}.@{fa-css-prefix}-star-half-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-star-half-o:before { content: @fa-var-star-half-stroke; }

.@{fa-css-prefix}.@{fa-css-prefix}-star-half-empty {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-star-half-empty:before { content: @fa-var-star-half-stroke; }

.@{fa-css-prefix}.@{fa-css-prefix}-star-half-full {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-star-half-full:before { content: @fa-var-star-half-stroke; }

.@{fa-css-prefix}.@{fa-css-prefix}-code-fork:before { content: @fa-var-code-branch; }

.@{fa-css-prefix}.@{fa-css-prefix}-chain-broken:before { content: @fa-var-link-slash; }

.@{fa-css-prefix}.@{fa-css-prefix}-unlink:before { content: @fa-var-link-slash; }

.@{fa-css-prefix}.@{fa-css-prefix}-calendar-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-calendar-o:before { content: @fa-var-calendar; }

.@{fa-css-prefix}.@{fa-css-prefix}-maxcdn {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-html5 {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-css3 {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-unlock-alt:before { content: @fa-var-unlock; }

.@{fa-css-prefix}.@{fa-css-prefix}-minus-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-minus-square-o:before { content: @fa-var-square-minus; }

.@{fa-css-prefix}.@{fa-css-prefix}-level-up:before { content: @fa-var-turn-up; }

.@{fa-css-prefix}.@{fa-css-prefix}-level-down:before { content: @fa-var-turn-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-pencil-square:before { content: @fa-var-square-pen; }

.@{fa-css-prefix}.@{fa-css-prefix}-external-link-square:before { content: @fa-var-square-up-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-compass {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-caret-square-o-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-caret-square-o-down:before { content: @fa-var-square-caret-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-toggle-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-toggle-down:before { content: @fa-var-square-caret-down; }

.@{fa-css-prefix}.@{fa-css-prefix}-caret-square-o-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-caret-square-o-up:before { content: @fa-var-square-caret-up; }

.@{fa-css-prefix}.@{fa-css-prefix}-toggle-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-toggle-up:before { content: @fa-var-square-caret-up; }

.@{fa-css-prefix}.@{fa-css-prefix}-caret-square-o-right {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-caret-square-o-right:before { content: @fa-var-square-caret-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-toggle-right {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-toggle-right:before { content: @fa-var-square-caret-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-eur:before { content: @fa-var-euro-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-euro:before { content: @fa-var-euro-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-gbp:before { content: @fa-var-sterling-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-usd:before { content: @fa-var-dollar-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-dollar:before { content: @fa-var-dollar-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-inr:before { content: @fa-var-indian-rupee-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-rupee:before { content: @fa-var-indian-rupee-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-jpy:before { content: @fa-var-yen-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-cny:before { content: @fa-var-yen-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-rmb:before { content: @fa-var-yen-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-yen:before { content: @fa-var-yen-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-rub:before { content: @fa-var-ruble-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-ruble:before { content: @fa-var-ruble-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-rouble:before { content: @fa-var-ruble-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-krw:before { content: @fa-var-won-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-won:before { content: @fa-var-won-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-btc {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-bitcoin {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-bitcoin:before { content: @fa-var-btc; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-text:before { content: @fa-var-file-lines; }

.@{fa-css-prefix}.@{fa-css-prefix}-sort-alpha-asc:before { content: @fa-var-arrow-down-a-z; }

.@{fa-css-prefix}.@{fa-css-prefix}-sort-alpha-desc:before { content: @fa-var-arrow-down-z-a; }

.@{fa-css-prefix}.@{fa-css-prefix}-sort-amount-asc:before { content: @fa-var-arrow-down-short-wide; }

.@{fa-css-prefix}.@{fa-css-prefix}-sort-amount-desc:before { content: @fa-var-arrow-down-wide-short; }

.@{fa-css-prefix}.@{fa-css-prefix}-sort-numeric-asc:before { content: @fa-var-arrow-down-1-9; }

.@{fa-css-prefix}.@{fa-css-prefix}-sort-numeric-desc:before { content: @fa-var-arrow-down-9-1; }

.@{fa-css-prefix}.@{fa-css-prefix}-youtube-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-youtube {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-xing {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-xing-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-youtube-play {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-youtube-play:before { content: @fa-var-youtube; }

.@{fa-css-prefix}.@{fa-css-prefix}-dropbox {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-stack-overflow {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-instagram {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-flickr {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-adn {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-bitbucket {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-bitbucket-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-bitbucket-square:before { content: @fa-var-bitbucket; }

.@{fa-css-prefix}.@{fa-css-prefix}-tumblr {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-tumblr-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-long-arrow-down:before { content: @fa-var-down-long; }

.@{fa-css-prefix}.@{fa-css-prefix}-long-arrow-up:before { content: @fa-var-up-long; }

.@{fa-css-prefix}.@{fa-css-prefix}-long-arrow-left:before { content: @fa-var-left-long; }

.@{fa-css-prefix}.@{fa-css-prefix}-long-arrow-right:before { content: @fa-var-right-long; }

.@{fa-css-prefix}.@{fa-css-prefix}-apple {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-windows {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-android {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-linux {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-dribbble {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-skype {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-foursquare {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-trello {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-gratipay {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-gittip {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-gittip:before { content: @fa-var-gratipay; }

.@{fa-css-prefix}.@{fa-css-prefix}-sun-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-sun-o:before { content: @fa-var-sun; }

.@{fa-css-prefix}.@{fa-css-prefix}-moon-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-moon-o:before { content: @fa-var-moon; }

.@{fa-css-prefix}.@{fa-css-prefix}-vk {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-weibo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-renren {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-pagelines {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-stack-exchange {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-arrow-circle-o-right {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-arrow-circle-o-right:before { content: @fa-var-circle-right; }

.@{fa-css-prefix}.@{fa-css-prefix}-arrow-circle-o-left {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-arrow-circle-o-left:before { content: @fa-var-circle-left; }

.@{fa-css-prefix}.@{fa-css-prefix}-caret-square-o-left {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-caret-square-o-left:before { content: @fa-var-square-caret-left; }

.@{fa-css-prefix}.@{fa-css-prefix}-toggle-left {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-toggle-left:before { content: @fa-var-square-caret-left; }

.@{fa-css-prefix}.@{fa-css-prefix}-dot-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-dot-circle-o:before { content: @fa-var-circle-dot; }

.@{fa-css-prefix}.@{fa-css-prefix}-vimeo-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-try:before { content: @fa-var-turkish-lira-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-turkish-lira:before { content: @fa-var-turkish-lira-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-plus-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-plus-square-o:before { content: @fa-var-square-plus; }

.@{fa-css-prefix}.@{fa-css-prefix}-slack {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-wordpress {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-openid {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-institution:before { content: @fa-var-building-columns; }

.@{fa-css-prefix}.@{fa-css-prefix}-bank:before { content: @fa-var-building-columns; }

.@{fa-css-prefix}.@{fa-css-prefix}-mortar-board:before { content: @fa-var-graduation-cap; }

.@{fa-css-prefix}.@{fa-css-prefix}-yahoo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-google {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-reddit {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-reddit-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-stumbleupon-circle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-stumbleupon {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-delicious {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-digg {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-pied-piper-pp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-pied-piper-alt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-drupal {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-joomla {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-behance {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-behance-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-steam {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-steam-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-automobile:before { content: @fa-var-car; }

.@{fa-css-prefix}.@{fa-css-prefix}-cab:before { content: @fa-var-taxi; }

.@{fa-css-prefix}.@{fa-css-prefix}-spotify {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-deviantart {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-soundcloud {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-file-pdf-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-pdf-o:before { content: @fa-var-file-pdf; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-word-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-word-o:before { content: @fa-var-file-word; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-excel-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-excel-o:before { content: @fa-var-file-excel; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-powerpoint-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-powerpoint-o:before { content: @fa-var-file-powerpoint; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-image-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-image-o:before { content: @fa-var-file-image; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-photo-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-photo-o:before { content: @fa-var-file-image; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-picture-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-picture-o:before { content: @fa-var-file-image; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-archive-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-archive-o:before { content: @fa-var-file-zipper; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-zip-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-zip-o:before { content: @fa-var-file-zipper; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-audio-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-audio-o:before { content: @fa-var-file-audio; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-sound-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-sound-o:before { content: @fa-var-file-audio; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-video-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-video-o:before { content: @fa-var-file-video; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-movie-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-movie-o:before { content: @fa-var-file-video; }

.@{fa-css-prefix}.@{fa-css-prefix}-file-code-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-file-code-o:before { content: @fa-var-file-code; }

.@{fa-css-prefix}.@{fa-css-prefix}-vine {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-codepen {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-jsfiddle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-life-bouy:before { content: @fa-var-life-ring; }

.@{fa-css-prefix}.@{fa-css-prefix}-life-buoy:before { content: @fa-var-life-ring; }

.@{fa-css-prefix}.@{fa-css-prefix}-life-saver:before { content: @fa-var-life-ring; }

.@{fa-css-prefix}.@{fa-css-prefix}-support:before { content: @fa-var-life-ring; }

.@{fa-css-prefix}.@{fa-css-prefix}-circle-o-notch:before { content: @fa-var-circle-notch; }

.@{fa-css-prefix}.@{fa-css-prefix}-rebel {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-ra {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-ra:before { content: @fa-var-rebel; }

.@{fa-css-prefix}.@{fa-css-prefix}-resistance {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-resistance:before { content: @fa-var-rebel; }

.@{fa-css-prefix}.@{fa-css-prefix}-empire {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-ge {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-ge:before { content: @fa-var-empire; }

.@{fa-css-prefix}.@{fa-css-prefix}-git-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-git {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-hacker-news {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-y-combinator-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-y-combinator-square:before { content: @fa-var-hacker-news; }

.@{fa-css-prefix}.@{fa-css-prefix}-yc-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-yc-square:before { content: @fa-var-hacker-news; }

.@{fa-css-prefix}.@{fa-css-prefix}-tencent-weibo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-qq {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-weixin {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-wechat {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-wechat:before { content: @fa-var-weixin; }

.@{fa-css-prefix}.@{fa-css-prefix}-send:before { content: @fa-var-paper-plane; }

.@{fa-css-prefix}.@{fa-css-prefix}-paper-plane-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-paper-plane-o:before { content: @fa-var-paper-plane; }

.@{fa-css-prefix}.@{fa-css-prefix}-send-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-send-o:before { content: @fa-var-paper-plane; }

.@{fa-css-prefix}.@{fa-css-prefix}-circle-thin {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-circle-thin:before { content: @fa-var-circle; }

.@{fa-css-prefix}.@{fa-css-prefix}-header:before { content: @fa-var-heading; }

.@{fa-css-prefix}.@{fa-css-prefix}-futbol-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-futbol-o:before { content: @fa-var-futbol; }

.@{fa-css-prefix}.@{fa-css-prefix}-soccer-ball-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-soccer-ball-o:before { content: @fa-var-futbol; }

.@{fa-css-prefix}.@{fa-css-prefix}-slideshare {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-twitch {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-yelp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-newspaper-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-newspaper-o:before { content: @fa-var-newspaper; }

.@{fa-css-prefix}.@{fa-css-prefix}-paypal {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-google-wallet {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-cc-visa {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-cc-mastercard {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-cc-discover {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-cc-amex {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-cc-paypal {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-cc-stripe {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-bell-slash-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-bell-slash-o:before { content: @fa-var-bell-slash; }

.@{fa-css-prefix}.@{fa-css-prefix}-trash:before { content: @fa-var-trash-can; }

.@{fa-css-prefix}.@{fa-css-prefix}-copyright {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-eyedropper:before { content: @fa-var-eye-dropper; }

.@{fa-css-prefix}.@{fa-css-prefix}-area-chart:before { content: @fa-var-chart-area; }

.@{fa-css-prefix}.@{fa-css-prefix}-pie-chart:before { content: @fa-var-chart-pie; }

.@{fa-css-prefix}.@{fa-css-prefix}-line-chart:before { content: @fa-var-chart-line; }

.@{fa-css-prefix}.@{fa-css-prefix}-lastfm {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-lastfm-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-ioxhost {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-angellist {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-cc {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-cc:before { content: @fa-var-closed-captioning; }

.@{fa-css-prefix}.@{fa-css-prefix}-ils:before { content: @fa-var-shekel-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-shekel:before { content: @fa-var-shekel-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-sheqel:before { content: @fa-var-shekel-sign; }

.@{fa-css-prefix}.@{fa-css-prefix}-buysellads {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-connectdevelop {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-dashcube {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-forumbee {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-leanpub {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-sellsy {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-shirtsinbulk {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-simplybuilt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-skyatlas {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-diamond {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-diamond:before { content: @fa-var-gem; }

.@{fa-css-prefix}.@{fa-css-prefix}-transgender:before { content: @fa-var-mars-and-venus; }

.@{fa-css-prefix}.@{fa-css-prefix}-intersex:before { content: @fa-var-mars-and-venus; }

.@{fa-css-prefix}.@{fa-css-prefix}-transgender-alt:before { content: @fa-var-transgender; }

.@{fa-css-prefix}.@{fa-css-prefix}-facebook-official {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-facebook-official:before { content: @fa-var-facebook; }

.@{fa-css-prefix}.@{fa-css-prefix}-pinterest-p {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-whatsapp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-hotel:before { content: @fa-var-bed; }

.@{fa-css-prefix}.@{fa-css-prefix}-viacoin {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-medium {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-y-combinator {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-yc {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-yc:before { content: @fa-var-y-combinator; }

.@{fa-css-prefix}.@{fa-css-prefix}-optin-monster {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-opencart {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-expeditedssl {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-battery-4:before { content: @fa-var-battery-full; }

.@{fa-css-prefix}.@{fa-css-prefix}-battery:before { content: @fa-var-battery-full; }

.@{fa-css-prefix}.@{fa-css-prefix}-battery-3:before { content: @fa-var-battery-three-quarters; }

.@{fa-css-prefix}.@{fa-css-prefix}-battery-2:before { content: @fa-var-battery-half; }

.@{fa-css-prefix}.@{fa-css-prefix}-battery-1:before { content: @fa-var-battery-quarter; }

.@{fa-css-prefix}.@{fa-css-prefix}-battery-0:before { content: @fa-var-battery-empty; }

.@{fa-css-prefix}.@{fa-css-prefix}-object-group {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-object-ungroup {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-sticky-note-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-sticky-note-o:before { content: @fa-var-note-sticky; }

.@{fa-css-prefix}.@{fa-css-prefix}-cc-jcb {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-cc-diners-club {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-clone {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-hourglass-o:before { content: @fa-var-hourglass-empty; }

.@{fa-css-prefix}.@{fa-css-prefix}-hourglass-1:before { content: @fa-var-hourglass-start; }

.@{fa-css-prefix}.@{fa-css-prefix}-hourglass-half:before { content: @fa-var-hourglass; }

.@{fa-css-prefix}.@{fa-css-prefix}-hourglass-2:before { content: @fa-var-hourglass; }

.@{fa-css-prefix}.@{fa-css-prefix}-hourglass-3:before { content: @fa-var-hourglass-end; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-rock-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-rock-o:before { content: @fa-var-hand-back-fist; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-grab-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-grab-o:before { content: @fa-var-hand-back-fist; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-paper-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-paper-o:before { content: @fa-var-hand; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-stop-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-stop-o:before { content: @fa-var-hand; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-scissors-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-scissors-o:before { content: @fa-var-hand-scissors; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-lizard-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-lizard-o:before { content: @fa-var-hand-lizard; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-spock-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-spock-o:before { content: @fa-var-hand-spock; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-pointer-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-pointer-o:before { content: @fa-var-hand-pointer; }

.@{fa-css-prefix}.@{fa-css-prefix}-hand-peace-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-hand-peace-o:before { content: @fa-var-hand-peace; }

.@{fa-css-prefix}.@{fa-css-prefix}-registered {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-creative-commons {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-gg {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-gg-circle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-odnoklassniki {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-odnoklassniki-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-get-pocket {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-wikipedia-w {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-safari {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-chrome {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-firefox {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-opera {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-internet-explorer {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-television:before { content: @fa-var-tv; }

.@{fa-css-prefix}.@{fa-css-prefix}-contao {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-500px {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-amazon {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-calendar-plus-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-calendar-plus-o:before { content: @fa-var-calendar-plus; }

.@{fa-css-prefix}.@{fa-css-prefix}-calendar-minus-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-calendar-minus-o:before { content: @fa-var-calendar-minus; }

.@{fa-css-prefix}.@{fa-css-prefix}-calendar-times-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-calendar-times-o:before { content: @fa-var-calendar-xmark; }

.@{fa-css-prefix}.@{fa-css-prefix}-calendar-check-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-calendar-check-o:before { content: @fa-var-calendar-check; }

.@{fa-css-prefix}.@{fa-css-prefix}-map-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-map-o:before { content: @fa-var-map; }

.@{fa-css-prefix}.@{fa-css-prefix}-commenting:before { content: @fa-var-comment-dots; }

.@{fa-css-prefix}.@{fa-css-prefix}-commenting-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-commenting-o:before { content: @fa-var-comment-dots; }

.@{fa-css-prefix}.@{fa-css-prefix}-houzz {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-vimeo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-vimeo:before { content: @fa-var-vimeo-v; }

.@{fa-css-prefix}.@{fa-css-prefix}-black-tie {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-fonticons {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-reddit-alien {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-edge {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-credit-card-alt:before { content: @fa-var-credit-card; }

.@{fa-css-prefix}.@{fa-css-prefix}-codiepie {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-modx {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-fort-awesome {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-usb {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-product-hunt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-mixcloud {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-scribd {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-pause-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-pause-circle-o:before { content: @fa-var-circle-pause; }

.@{fa-css-prefix}.@{fa-css-prefix}-stop-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-stop-circle-o:before { content: @fa-var-circle-stop; }

.@{fa-css-prefix}.@{fa-css-prefix}-bluetooth {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-bluetooth-b {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-gitlab {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-wpbeginner {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-wpforms {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-envira {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-wheelchair-alt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-wheelchair-alt:before { content: @fa-var-accessible-icon; }

.@{fa-css-prefix}.@{fa-css-prefix}-question-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-question-circle-o:before { content: @fa-var-circle-question; }

.@{fa-css-prefix}.@{fa-css-prefix}-volume-control-phone:before { content: @fa-var-phone-volume; }

.@{fa-css-prefix}.@{fa-css-prefix}-asl-interpreting:before { content: @fa-var-hands-asl-interpreting; }

.@{fa-css-prefix}.@{fa-css-prefix}-deafness:before { content: @fa-var-ear-deaf; }

.@{fa-css-prefix}.@{fa-css-prefix}-hard-of-hearing:before { content: @fa-var-ear-deaf; }

.@{fa-css-prefix}.@{fa-css-prefix}-glide {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-glide-g {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-signing:before { content: @fa-var-hands; }

.@{fa-css-prefix}.@{fa-css-prefix}-viadeo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-viadeo-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-snapchat {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-snapchat-ghost {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-snapchat-ghost:before { content: @fa-var-snapchat; }

.@{fa-css-prefix}.@{fa-css-prefix}-snapchat-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-pied-piper {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-first-order {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-yoast {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-themeisle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-google-plus-official {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-google-plus-official:before { content: @fa-var-google-plus; }

.@{fa-css-prefix}.@{fa-css-prefix}-google-plus-circle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-google-plus-circle:before { content: @fa-var-google-plus; }

.@{fa-css-prefix}.@{fa-css-prefix}-font-awesome {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-fa {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-fa:before { content: @fa-var-font-awesome; }

.@{fa-css-prefix}.@{fa-css-prefix}-handshake-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-handshake-o:before { content: @fa-var-handshake; }

.@{fa-css-prefix}.@{fa-css-prefix}-envelope-open-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-envelope-open-o:before { content: @fa-var-envelope-open; }

.@{fa-css-prefix}.@{fa-css-prefix}-linode {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-address-book-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-address-book-o:before { content: @fa-var-address-book; }

.@{fa-css-prefix}.@{fa-css-prefix}-vcard:before { content: @fa-var-address-card; }

.@{fa-css-prefix}.@{fa-css-prefix}-address-card-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-address-card-o:before { content: @fa-var-address-card; }

.@{fa-css-prefix}.@{fa-css-prefix}-vcard-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-vcard-o:before { content: @fa-var-address-card; }

.@{fa-css-prefix}.@{fa-css-prefix}-user-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-user-circle-o:before { content: @fa-var-circle-user; }

.@{fa-css-prefix}.@{fa-css-prefix}-user-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-user-o:before { content: @fa-var-user; }

.@{fa-css-prefix}.@{fa-css-prefix}-id-badge {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-drivers-license:before { content: @fa-var-id-card; }

.@{fa-css-prefix}.@{fa-css-prefix}-id-card-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-id-card-o:before { content: @fa-var-id-card; }

.@{fa-css-prefix}.@{fa-css-prefix}-drivers-license-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-drivers-license-o:before { content: @fa-var-id-card; }

.@{fa-css-prefix}.@{fa-css-prefix}-quora {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-free-code-camp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-telegram {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-thermometer-4:before { content: @fa-var-temperature-full; }

.@{fa-css-prefix}.@{fa-css-prefix}-thermometer:before { content: @fa-var-temperature-full; }

.@{fa-css-prefix}.@{fa-css-prefix}-thermometer-3:before { content: @fa-var-temperature-three-quarters; }

.@{fa-css-prefix}.@{fa-css-prefix}-thermometer-2:before { content: @fa-var-temperature-half; }

.@{fa-css-prefix}.@{fa-css-prefix}-thermometer-1:before { content: @fa-var-temperature-quarter; }

.@{fa-css-prefix}.@{fa-css-prefix}-thermometer-0:before { content: @fa-var-temperature-empty; }

.@{fa-css-prefix}.@{fa-css-prefix}-bathtub:before { content: @fa-var-bath; }

.@{fa-css-prefix}.@{fa-css-prefix}-s15:before { content: @fa-var-bath; }

.@{fa-css-prefix}.@{fa-css-prefix}-window-maximize {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-window-restore {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-times-rectangle:before { content: @fa-var-rectangle-xmark; }

.@{fa-css-prefix}.@{fa-css-prefix}-window-close-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-window-close-o:before { content: @fa-var-rectangle-xmark; }

.@{fa-css-prefix}.@{fa-css-prefix}-times-rectangle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-times-rectangle-o:before { content: @fa-var-rectangle-xmark; }

.@{fa-css-prefix}.@{fa-css-prefix}-bandcamp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-grav {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-etsy {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-imdb {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-ravelry {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-eercast {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-eercast:before { content: @fa-var-sellcast; }

.@{fa-css-prefix}.@{fa-css-prefix}-snowflake-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.@{fa-css-prefix}.@{fa-css-prefix}-snowflake-o:before { content: @fa-var-snowflake; }

.@{fa-css-prefix}.@{fa-css-prefix}-superpowers {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-wpexplorer {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.@{fa-css-prefix}.@{fa-css-prefix}-meetup {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_sizing.less
````
// sizing icons
// -------------------------

// literal magnification scale
.sizes-literal(@factor) when (@factor > 0) {
  .sizes-literal((@factor - 1));

  .@{fa-css-prefix}-@{factor}x {
    font-size: (@factor * 1em);
  }
}
.sizes-literal(10);

// step-based scale (with alignment)
each(.fa-sizes(), {
  .@{fa-css-prefix}-@{key} {
    .fa-size(@value);
  }
});
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_stacked.less
````
// stacking icons
// -------------------------

.@{fa-css-prefix}-stack {
  display: inline-block;
  height: 2em;
  line-height: 2em;
  position: relative;
  vertical-align: @fa-stack-vertical-align;
  width: @fa-stack-width;
}

.@{fa-css-prefix}-stack-1x, .@{fa-css-prefix}-stack-2x {
  left: 0;
  position: absolute;
  text-align: center;
  width: 100%;
  z-index: ~'var(--@{fa-css-prefix}-stack-z-index, @{fa-stack-z-index})';
}

.@{fa-css-prefix}-stack-1x { 
  line-height: inherit; 
}

.@{fa-css-prefix}-stack-2x { 
  font-size: 2em; 
}

.@{fa-css-prefix}-inverse { 
  color: ~'var(--@{fa-css-prefix}-inverse, @{fa-inverse})';
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/_variables.less
````
// variables
// --------------------------

@fa-css-prefix          : fa;
@fa-style               : 900;
@fa-style-family        : "Font Awesome 6 Free";

@fa-display             : inline-block;

@fa-fw-width            : (20em / 16);
@fa-inverse             : #fff;

@fa-border-color        : #eee;
@fa-border-padding      : .2em .25em .15em;
@fa-border-radius       : .1em;
@fa-border-style        : solid;
@fa-border-width        : .08em;

@fa-size-scale-2xs      : 10;
@fa-size-scale-xs       : 12;
@fa-size-scale-sm       : 14;
@fa-size-scale-base     : 16;
@fa-size-scale-lg       : 20;
@fa-size-scale-xl       : 24;
@fa-size-scale-2xl      : 32;

.fa-sizes() {
  2xs                   : @fa-size-scale-2xs;
  xs                    : @fa-size-scale-xs;
  sm                    : @fa-size-scale-sm;
  lg                    : @fa-size-scale-lg;
  xl                    : @fa-size-scale-xl;
  2xl                   : @fa-size-scale-2xl;
}

@fa-li-width            : 2em;
@fa-li-margin           : (@fa-li-width * 5/4);

@fa-pull-margin         : .3em;

@fa-primary-opacity     : 1;
@fa-secondary-opacity   : .4;

@fa-stack-vertical-align: middle;
@fa-stack-width         : (@fa-fw-width * 2);
@fa-stack-z-index       : auto;

@fa-font-display        : block;
@fa-font-path           : "../webfonts";

@fa-var-0: "\30";
@fa-var-1: "\31";
@fa-var-2: "\32";
@fa-var-3: "\33";
@fa-var-4: "\34";
@fa-var-5: "\35";
@fa-var-6: "\36";
@fa-var-7: "\37";
@fa-var-8: "\38";
@fa-var-9: "\39";
@fa-var-a: "\41";
@fa-var-address-book: "\f2b9";
@fa-var-contact-book: "\f2b9";
@fa-var-address-card: "\f2bb";
@fa-var-contact-card: "\f2bb";
@fa-var-vcard: "\f2bb";
@fa-var-align-center: "\f037";
@fa-var-align-justify: "\f039";
@fa-var-align-left: "\f036";
@fa-var-align-right: "\f038";
@fa-var-anchor: "\f13d";
@fa-var-angle-down: "\f107";
@fa-var-angle-left: "\f104";
@fa-var-angle-right: "\f105";
@fa-var-angle-up: "\f106";
@fa-var-angles-down: "\f103";
@fa-var-angle-double-down: "\f103";
@fa-var-angles-left: "\f100";
@fa-var-angle-double-left: "\f100";
@fa-var-angles-right: "\f101";
@fa-var-angle-double-right: "\f101";
@fa-var-angles-up: "\f102";
@fa-var-angle-double-up: "\f102";
@fa-var-ankh: "\f644";
@fa-var-apple-whole: "\f5d1";
@fa-var-apple-alt: "\f5d1";
@fa-var-archway: "\f557";
@fa-var-arrow-down: "\f063";
@fa-var-arrow-down-1-9: "\f162";
@fa-var-sort-numeric-asc: "\f162";
@fa-var-sort-numeric-down: "\f162";
@fa-var-arrow-down-9-1: "\f886";
@fa-var-sort-numeric-desc: "\f886";
@fa-var-sort-numeric-down-alt: "\f886";
@fa-var-arrow-down-a-z: "\f15d";
@fa-var-sort-alpha-asc: "\f15d";
@fa-var-sort-alpha-down: "\f15d";
@fa-var-arrow-down-long: "\f175";
@fa-var-long-arrow-down: "\f175";
@fa-var-arrow-down-short-wide: "\f884";
@fa-var-sort-amount-desc: "\f884";
@fa-var-sort-amount-down-alt: "\f884";
@fa-var-arrow-down-wide-short: "\f160";
@fa-var-sort-amount-asc: "\f160";
@fa-var-sort-amount-down: "\f160";
@fa-var-arrow-down-z-a: "\f881";
@fa-var-sort-alpha-desc: "\f881";
@fa-var-sort-alpha-down-alt: "\f881";
@fa-var-arrow-left: "\f060";
@fa-var-arrow-left-long: "\f177";
@fa-var-long-arrow-left: "\f177";
@fa-var-arrow-pointer: "\f245";
@fa-var-mouse-pointer: "\f245";
@fa-var-arrow-right: "\f061";
@fa-var-arrow-right-arrow-left: "\f0ec";
@fa-var-exchange: "\f0ec";
@fa-var-arrow-right-from-bracket: "\f08b";
@fa-var-sign-out: "\f08b";
@fa-var-arrow-right-long: "\f178";
@fa-var-long-arrow-right: "\f178";
@fa-var-arrow-right-to-bracket: "\f090";
@fa-var-sign-in: "\f090";
@fa-var-arrow-rotate-left: "\f0e2";
@fa-var-arrow-left-rotate: "\f0e2";
@fa-var-arrow-rotate-back: "\f0e2";
@fa-var-arrow-rotate-backward: "\f0e2";
@fa-var-undo: "\f0e2";
@fa-var-arrow-rotate-right: "\f01e";
@fa-var-arrow-right-rotate: "\f01e";
@fa-var-arrow-rotate-forward: "\f01e";
@fa-var-redo: "\f01e";
@fa-var-arrow-trend-down: "\e097";
@fa-var-arrow-trend-up: "\e098";
@fa-var-arrow-turn-down: "\f149";
@fa-var-level-down: "\f149";
@fa-var-arrow-turn-up: "\f148";
@fa-var-level-up: "\f148";
@fa-var-arrow-up: "\f062";
@fa-var-arrow-up-1-9: "\f163";
@fa-var-sort-numeric-up: "\f163";
@fa-var-arrow-up-9-1: "\f887";
@fa-var-sort-numeric-up-alt: "\f887";
@fa-var-arrow-up-a-z: "\f15e";
@fa-var-sort-alpha-up: "\f15e";
@fa-var-arrow-up-from-bracket: "\e09a";
@fa-var-arrow-up-long: "\f176";
@fa-var-long-arrow-up: "\f176";
@fa-var-arrow-up-right-from-square: "\f08e";
@fa-var-external-link: "\f08e";
@fa-var-arrow-up-short-wide: "\f885";
@fa-var-sort-amount-up-alt: "\f885";
@fa-var-arrow-up-wide-short: "\f161";
@fa-var-sort-amount-up: "\f161";
@fa-var-arrow-up-z-a: "\f882";
@fa-var-sort-alpha-up-alt: "\f882";
@fa-var-arrows-left-right: "\f07e";
@fa-var-arrows-h: "\f07e";
@fa-var-arrows-rotate: "\f021";
@fa-var-refresh: "\f021";
@fa-var-sync: "\f021";
@fa-var-arrows-up-down: "\f07d";
@fa-var-arrows-v: "\f07d";
@fa-var-arrows-up-down-left-right: "\f047";
@fa-var-arrows: "\f047";
@fa-var-asterisk: "\2a";
@fa-var-at: "\40";
@fa-var-atom: "\f5d2";
@fa-var-audio-description: "\f29e";
@fa-var-austral-sign: "\e0a9";
@fa-var-award: "\f559";
@fa-var-b: "\42";
@fa-var-baby: "\f77c";
@fa-var-baby-carriage: "\f77d";
@fa-var-carriage-baby: "\f77d";
@fa-var-backward: "\f04a";
@fa-var-backward-fast: "\f049";
@fa-var-fast-backward: "\f049";
@fa-var-backward-step: "\f048";
@fa-var-step-backward: "\f048";
@fa-var-bacon: "\f7e5";
@fa-var-bacteria: "\e059";
@fa-var-bacterium: "\e05a";
@fa-var-bag-shopping: "\f290";
@fa-var-shopping-bag: "\f290";
@fa-var-bahai: "\f666";
@fa-var-baht-sign: "\e0ac";
@fa-var-ban: "\f05e";
@fa-var-cancel: "\f05e";
@fa-var-ban-smoking: "\f54d";
@fa-var-smoking-ban: "\f54d";
@fa-var-bandage: "\f462";
@fa-var-band-aid: "\f462";
@fa-var-barcode: "\f02a";
@fa-var-bars: "\f0c9";
@fa-var-navicon: "\f0c9";
@fa-var-bars-progress: "\f828";
@fa-var-tasks-alt: "\f828";
@fa-var-bars-staggered: "\f550";
@fa-var-reorder: "\f550";
@fa-var-stream: "\f550";
@fa-var-baseball: "\f433";
@fa-var-baseball-ball: "\f433";
@fa-var-baseball-bat-ball: "\f432";
@fa-var-basket-shopping: "\f291";
@fa-var-shopping-basket: "\f291";
@fa-var-basketball: "\f434";
@fa-var-basketball-ball: "\f434";
@fa-var-bath: "\f2cd";
@fa-var-bathtub: "\f2cd";
@fa-var-battery-empty: "\f244";
@fa-var-battery-0: "\f244";
@fa-var-battery-full: "\f240";
@fa-var-battery: "\f240";
@fa-var-battery-5: "\f240";
@fa-var-battery-half: "\f242";
@fa-var-battery-3: "\f242";
@fa-var-battery-quarter: "\f243";
@fa-var-battery-2: "\f243";
@fa-var-battery-three-quarters: "\f241";
@fa-var-battery-4: "\f241";
@fa-var-bed: "\f236";
@fa-var-bed-pulse: "\f487";
@fa-var-procedures: "\f487";
@fa-var-beer-mug-empty: "\f0fc";
@fa-var-beer: "\f0fc";
@fa-var-bell: "\f0f3";
@fa-var-bell-concierge: "\f562";
@fa-var-concierge-bell: "\f562";
@fa-var-bell-slash: "\f1f6";
@fa-var-bezier-curve: "\f55b";
@fa-var-bicycle: "\f206";
@fa-var-binoculars: "\f1e5";
@fa-var-biohazard: "\f780";
@fa-var-bitcoin-sign: "\e0b4";
@fa-var-blender: "\f517";
@fa-var-blender-phone: "\f6b6";
@fa-var-blog: "\f781";
@fa-var-bold: "\f032";
@fa-var-bolt: "\f0e7";
@fa-var-zap: "\f0e7";
@fa-var-bolt-lightning: "\e0b7";
@fa-var-bomb: "\f1e2";
@fa-var-bone: "\f5d7";
@fa-var-bong: "\f55c";
@fa-var-book: "\f02d";
@fa-var-book-atlas: "\f558";
@fa-var-atlas: "\f558";
@fa-var-book-bible: "\f647";
@fa-var-bible: "\f647";
@fa-var-book-journal-whills: "\f66a";
@fa-var-journal-whills: "\f66a";
@fa-var-book-medical: "\f7e6";
@fa-var-book-open: "\f518";
@fa-var-book-open-reader: "\f5da";
@fa-var-book-reader: "\f5da";
@fa-var-book-quran: "\f687";
@fa-var-quran: "\f687";
@fa-var-book-skull: "\f6b7";
@fa-var-book-dead: "\f6b7";
@fa-var-bookmark: "\f02e";
@fa-var-border-all: "\f84c";
@fa-var-border-none: "\f850";
@fa-var-border-top-left: "\f853";
@fa-var-border-style: "\f853";
@fa-var-bowling-ball: "\f436";
@fa-var-box: "\f466";
@fa-var-box-archive: "\f187";
@fa-var-archive: "\f187";
@fa-var-box-open: "\f49e";
@fa-var-box-tissue: "\e05b";
@fa-var-boxes-stacked: "\f468";
@fa-var-boxes: "\f468";
@fa-var-boxes-alt: "\f468";
@fa-var-braille: "\f2a1";
@fa-var-brain: "\f5dc";
@fa-var-brazilian-real-sign: "\e46c";
@fa-var-bread-slice: "\f7ec";
@fa-var-briefcase: "\f0b1";
@fa-var-briefcase-medical: "\f469";
@fa-var-broom: "\f51a";
@fa-var-broom-ball: "\f458";
@fa-var-quidditch: "\f458";
@fa-var-quidditch-broom-ball: "\f458";
@fa-var-brush: "\f55d";
@fa-var-bug: "\f188";
@fa-var-bug-slash: "\e490";
@fa-var-building: "\f1ad";
@fa-var-building-columns: "\f19c";
@fa-var-bank: "\f19c";
@fa-var-institution: "\f19c";
@fa-var-museum: "\f19c";
@fa-var-university: "\f19c";
@fa-var-bullhorn: "\f0a1";
@fa-var-bullseye: "\f140";
@fa-var-burger: "\f805";
@fa-var-hamburger: "\f805";
@fa-var-bus: "\f207";
@fa-var-bus-simple: "\f55e";
@fa-var-bus-alt: "\f55e";
@fa-var-business-time: "\f64a";
@fa-var-briefcase-clock: "\f64a";
@fa-var-c: "\43";
@fa-var-cake-candles: "\f1fd";
@fa-var-birthday-cake: "\f1fd";
@fa-var-cake: "\f1fd";
@fa-var-calculator: "\f1ec";
@fa-var-calendar: "\f133";
@fa-var-calendar-check: "\f274";
@fa-var-calendar-day: "\f783";
@fa-var-calendar-days: "\f073";
@fa-var-calendar-alt: "\f073";
@fa-var-calendar-minus: "\f272";
@fa-var-calendar-plus: "\f271";
@fa-var-calendar-week: "\f784";
@fa-var-calendar-xmark: "\f273";
@fa-var-calendar-times: "\f273";
@fa-var-camera: "\f030";
@fa-var-camera-alt: "\f030";
@fa-var-camera-retro: "\f083";
@fa-var-camera-rotate: "\e0d8";
@fa-var-campground: "\f6bb";
@fa-var-candy-cane: "\f786";
@fa-var-cannabis: "\f55f";
@fa-var-capsules: "\f46b";
@fa-var-car: "\f1b9";
@fa-var-automobile: "\f1b9";
@fa-var-car-battery: "\f5df";
@fa-var-battery-car: "\f5df";
@fa-var-car-crash: "\f5e1";
@fa-var-car-rear: "\f5de";
@fa-var-car-alt: "\f5de";
@fa-var-car-side: "\f5e4";
@fa-var-caravan: "\f8ff";
@fa-var-caret-down: "\f0d7";
@fa-var-caret-left: "\f0d9";
@fa-var-caret-right: "\f0da";
@fa-var-caret-up: "\f0d8";
@fa-var-carrot: "\f787";
@fa-var-cart-arrow-down: "\f218";
@fa-var-cart-flatbed: "\f474";
@fa-var-dolly-flatbed: "\f474";
@fa-var-cart-flatbed-suitcase: "\f59d";
@fa-var-luggage-cart: "\f59d";
@fa-var-cart-plus: "\f217";
@fa-var-cart-shopping: "\f07a";
@fa-var-shopping-cart: "\f07a";
@fa-var-cash-register: "\f788";
@fa-var-cat: "\f6be";
@fa-var-cedi-sign: "\e0df";
@fa-var-cent-sign: "\e3f5";
@fa-var-certificate: "\f0a3";
@fa-var-chair: "\f6c0";
@fa-var-chalkboard: "\f51b";
@fa-var-blackboard: "\f51b";
@fa-var-chalkboard-user: "\f51c";
@fa-var-chalkboard-teacher: "\f51c";
@fa-var-champagne-glasses: "\f79f";
@fa-var-glass-cheers: "\f79f";
@fa-var-charging-station: "\f5e7";
@fa-var-chart-area: "\f1fe";
@fa-var-area-chart: "\f1fe";
@fa-var-chart-bar: "\f080";
@fa-var-bar-chart: "\f080";
@fa-var-chart-column: "\e0e3";
@fa-var-chart-gantt: "\e0e4";
@fa-var-chart-line: "\f201";
@fa-var-line-chart: "\f201";
@fa-var-chart-pie: "\f200";
@fa-var-pie-chart: "\f200";
@fa-var-check: "\f00c";
@fa-var-check-double: "\f560";
@fa-var-check-to-slot: "\f772";
@fa-var-vote-yea: "\f772";
@fa-var-cheese: "\f7ef";
@fa-var-chess: "\f439";
@fa-var-chess-bishop: "\f43a";
@fa-var-chess-board: "\f43c";
@fa-var-chess-king: "\f43f";
@fa-var-chess-knight: "\f441";
@fa-var-chess-pawn: "\f443";
@fa-var-chess-queen: "\f445";
@fa-var-chess-rook: "\f447";
@fa-var-chevron-down: "\f078";
@fa-var-chevron-left: "\f053";
@fa-var-chevron-right: "\f054";
@fa-var-chevron-up: "\f077";
@fa-var-child: "\f1ae";
@fa-var-church: "\f51d";
@fa-var-circle: "\f111";
@fa-var-circle-arrow-down: "\f0ab";
@fa-var-arrow-circle-down: "\f0ab";
@fa-var-circle-arrow-left: "\f0a8";
@fa-var-arrow-circle-left: "\f0a8";
@fa-var-circle-arrow-right: "\f0a9";
@fa-var-arrow-circle-right: "\f0a9";
@fa-var-circle-arrow-up: "\f0aa";
@fa-var-arrow-circle-up: "\f0aa";
@fa-var-circle-check: "\f058";
@fa-var-check-circle: "\f058";
@fa-var-circle-chevron-down: "\f13a";
@fa-var-chevron-circle-down: "\f13a";
@fa-var-circle-chevron-left: "\f137";
@fa-var-chevron-circle-left: "\f137";
@fa-var-circle-chevron-right: "\f138";
@fa-var-chevron-circle-right: "\f138";
@fa-var-circle-chevron-up: "\f139";
@fa-var-chevron-circle-up: "\f139";
@fa-var-circle-dollar-to-slot: "\f4b9";
@fa-var-donate: "\f4b9";
@fa-var-circle-dot: "\f192";
@fa-var-dot-circle: "\f192";
@fa-var-circle-down: "\f358";
@fa-var-arrow-alt-circle-down: "\f358";
@fa-var-circle-exclamation: "\f06a";
@fa-var-exclamation-circle: "\f06a";
@fa-var-circle-h: "\f47e";
@fa-var-hospital-symbol: "\f47e";
@fa-var-circle-half-stroke: "\f042";
@fa-var-adjust: "\f042";
@fa-var-circle-info: "\f05a";
@fa-var-info-circle: "\f05a";
@fa-var-circle-left: "\f359";
@fa-var-arrow-alt-circle-left: "\f359";
@fa-var-circle-minus: "\f056";
@fa-var-minus-circle: "\f056";
@fa-var-circle-notch: "\f1ce";
@fa-var-circle-pause: "\f28b";
@fa-var-pause-circle: "\f28b";
@fa-var-circle-play: "\f144";
@fa-var-play-circle: "\f144";
@fa-var-circle-plus: "\f055";
@fa-var-plus-circle: "\f055";
@fa-var-circle-question: "\f059";
@fa-var-question-circle: "\f059";
@fa-var-circle-radiation: "\f7ba";
@fa-var-radiation-alt: "\f7ba";
@fa-var-circle-right: "\f35a";
@fa-var-arrow-alt-circle-right: "\f35a";
@fa-var-circle-stop: "\f28d";
@fa-var-stop-circle: "\f28d";
@fa-var-circle-up: "\f35b";
@fa-var-arrow-alt-circle-up: "\f35b";
@fa-var-circle-user: "\f2bd";
@fa-var-user-circle: "\f2bd";
@fa-var-circle-xmark: "\f057";
@fa-var-times-circle: "\f057";
@fa-var-xmark-circle: "\f057";
@fa-var-city: "\f64f";
@fa-var-clapperboard: "\e131";
@fa-var-clipboard: "\f328";
@fa-var-clipboard-check: "\f46c";
@fa-var-clipboard-list: "\f46d";
@fa-var-clock: "\f017";
@fa-var-clock-four: "\f017";
@fa-var-clock-rotate-left: "\f1da";
@fa-var-history: "\f1da";
@fa-var-clone: "\f24d";
@fa-var-closed-captioning: "\f20a";
@fa-var-cloud: "\f0c2";
@fa-var-cloud-arrow-down: "\f0ed";
@fa-var-cloud-download: "\f0ed";
@fa-var-cloud-download-alt: "\f0ed";
@fa-var-cloud-arrow-up: "\f0ee";
@fa-var-cloud-upload: "\f0ee";
@fa-var-cloud-upload-alt: "\f0ee";
@fa-var-cloud-meatball: "\f73b";
@fa-var-cloud-moon: "\f6c3";
@fa-var-cloud-moon-rain: "\f73c";
@fa-var-cloud-rain: "\f73d";
@fa-var-cloud-showers-heavy: "\f740";
@fa-var-cloud-sun: "\f6c4";
@fa-var-cloud-sun-rain: "\f743";
@fa-var-clover: "\e139";
@fa-var-code: "\f121";
@fa-var-code-branch: "\f126";
@fa-var-code-commit: "\f386";
@fa-var-code-compare: "\e13a";
@fa-var-code-fork: "\e13b";
@fa-var-code-merge: "\f387";
@fa-var-code-pull-request: "\e13c";
@fa-var-coins: "\f51e";
@fa-var-colon-sign: "\e140";
@fa-var-comment: "\f075";
@fa-var-comment-dollar: "\f651";
@fa-var-comment-dots: "\f4ad";
@fa-var-commenting: "\f4ad";
@fa-var-comment-medical: "\f7f5";
@fa-var-comment-slash: "\f4b3";
@fa-var-comment-sms: "\f7cd";
@fa-var-sms: "\f7cd";
@fa-var-comments: "\f086";
@fa-var-comments-dollar: "\f653";
@fa-var-compact-disc: "\f51f";
@fa-var-compass: "\f14e";
@fa-var-compass-drafting: "\f568";
@fa-var-drafting-compass: "\f568";
@fa-var-compress: "\f066";
@fa-var-computer-mouse: "\f8cc";
@fa-var-mouse: "\f8cc";
@fa-var-cookie: "\f563";
@fa-var-cookie-bite: "\f564";
@fa-var-copy: "\f0c5";
@fa-var-copyright: "\f1f9";
@fa-var-couch: "\f4b8";
@fa-var-credit-card: "\f09d";
@fa-var-credit-card-alt: "\f09d";
@fa-var-crop: "\f125";
@fa-var-crop-simple: "\f565";
@fa-var-crop-alt: "\f565";
@fa-var-cross: "\f654";
@fa-var-crosshairs: "\f05b";
@fa-var-crow: "\f520";
@fa-var-crown: "\f521";
@fa-var-crutch: "\f7f7";
@fa-var-cruzeiro-sign: "\e152";
@fa-var-cube: "\f1b2";
@fa-var-cubes: "\f1b3";
@fa-var-d: "\44";
@fa-var-database: "\f1c0";
@fa-var-delete-left: "\f55a";
@fa-var-backspace: "\f55a";
@fa-var-democrat: "\f747";
@fa-var-desktop: "\f390";
@fa-var-desktop-alt: "\f390";
@fa-var-dharmachakra: "\f655";
@fa-var-diagram-next: "\e476";
@fa-var-diagram-predecessor: "\e477";
@fa-var-diagram-project: "\f542";
@fa-var-project-diagram: "\f542";
@fa-var-diagram-successor: "\e47a";
@fa-var-diamond: "\f219";
@fa-var-diamond-turn-right: "\f5eb";
@fa-var-directions: "\f5eb";
@fa-var-dice: "\f522";
@fa-var-dice-d20: "\f6cf";
@fa-var-dice-d6: "\f6d1";
@fa-var-dice-five: "\f523";
@fa-var-dice-four: "\f524";
@fa-var-dice-one: "\f525";
@fa-var-dice-six: "\f526";
@fa-var-dice-three: "\f527";
@fa-var-dice-two: "\f528";
@fa-var-disease: "\f7fa";
@fa-var-divide: "\f529";
@fa-var-dna: "\f471";
@fa-var-dog: "\f6d3";
@fa-var-dollar-sign: "\24";
@fa-var-dollar: "\24";
@fa-var-usd: "\24";
@fa-var-dolly: "\f472";
@fa-var-dolly-box: "\f472";
@fa-var-dong-sign: "\e169";
@fa-var-door-closed: "\f52a";
@fa-var-door-open: "\f52b";
@fa-var-dove: "\f4ba";
@fa-var-down-left-and-up-right-to-center: "\f422";
@fa-var-compress-alt: "\f422";
@fa-var-down-long: "\f309";
@fa-var-long-arrow-alt-down: "\f309";
@fa-var-download: "\f019";
@fa-var-dragon: "\f6d5";
@fa-var-draw-polygon: "\f5ee";
@fa-var-droplet: "\f043";
@fa-var-tint: "\f043";
@fa-var-droplet-slash: "\f5c7";
@fa-var-tint-slash: "\f5c7";
@fa-var-drum: "\f569";
@fa-var-drum-steelpan: "\f56a";
@fa-var-drumstick-bite: "\f6d7";
@fa-var-dumbbell: "\f44b";
@fa-var-dumpster: "\f793";
@fa-var-dumpster-fire: "\f794";
@fa-var-dungeon: "\f6d9";
@fa-var-e: "\45";
@fa-var-ear-deaf: "\f2a4";
@fa-var-deaf: "\f2a4";
@fa-var-deafness: "\f2a4";
@fa-var-hard-of-hearing: "\f2a4";
@fa-var-ear-listen: "\f2a2";
@fa-var-assistive-listening-systems: "\f2a2";
@fa-var-earth-africa: "\f57c";
@fa-var-globe-africa: "\f57c";
@fa-var-earth-americas: "\f57d";
@fa-var-earth: "\f57d";
@fa-var-earth-america: "\f57d";
@fa-var-globe-americas: "\f57d";
@fa-var-earth-asia: "\f57e";
@fa-var-globe-asia: "\f57e";
@fa-var-earth-europe: "\f7a2";
@fa-var-globe-europe: "\f7a2";
@fa-var-earth-oceania: "\e47b";
@fa-var-globe-oceania: "\e47b";
@fa-var-egg: "\f7fb";
@fa-var-eject: "\f052";
@fa-var-elevator: "\e16d";
@fa-var-ellipsis: "\f141";
@fa-var-ellipsis-h: "\f141";
@fa-var-ellipsis-vertical: "\f142";
@fa-var-ellipsis-v: "\f142";
@fa-var-envelope: "\f0e0";
@fa-var-envelope-open: "\f2b6";
@fa-var-envelope-open-text: "\f658";
@fa-var-envelopes-bulk: "\f674";
@fa-var-mail-bulk: "\f674";
@fa-var-equals: "\3d";
@fa-var-eraser: "\f12d";
@fa-var-ethernet: "\f796";
@fa-var-euro-sign: "\f153";
@fa-var-eur: "\f153";
@fa-var-euro: "\f153";
@fa-var-exclamation: "\21";
@fa-var-expand: "\f065";
@fa-var-eye: "\f06e";
@fa-var-eye-dropper: "\f1fb";
@fa-var-eye-dropper-empty: "\f1fb";
@fa-var-eyedropper: "\f1fb";
@fa-var-eye-low-vision: "\f2a8";
@fa-var-low-vision: "\f2a8";
@fa-var-eye-slash: "\f070";
@fa-var-f: "\46";
@fa-var-face-angry: "\f556";
@fa-var-angry: "\f556";
@fa-var-face-dizzy: "\f567";
@fa-var-dizzy: "\f567";
@fa-var-face-flushed: "\f579";
@fa-var-flushed: "\f579";
@fa-var-face-frown: "\f119";
@fa-var-frown: "\f119";
@fa-var-face-frown-open: "\f57a";
@fa-var-frown-open: "\f57a";
@fa-var-face-grimace: "\f57f";
@fa-var-grimace: "\f57f";
@fa-var-face-grin: "\f580";
@fa-var-grin: "\f580";
@fa-var-face-grin-beam: "\f582";
@fa-var-grin-beam: "\f582";
@fa-var-face-grin-beam-sweat: "\f583";
@fa-var-grin-beam-sweat: "\f583";
@fa-var-face-grin-hearts: "\f584";
@fa-var-grin-hearts: "\f584";
@fa-var-face-grin-squint: "\f585";
@fa-var-grin-squint: "\f585";
@fa-var-face-grin-squint-tears: "\f586";
@fa-var-grin-squint-tears: "\f586";
@fa-var-face-grin-stars: "\f587";
@fa-var-grin-stars: "\f587";
@fa-var-face-grin-tears: "\f588";
@fa-var-grin-tears: "\f588";
@fa-var-face-grin-tongue: "\f589";
@fa-var-grin-tongue: "\f589";
@fa-var-face-grin-tongue-squint: "\f58a";
@fa-var-grin-tongue-squint: "\f58a";
@fa-var-face-grin-tongue-wink: "\f58b";
@fa-var-grin-tongue-wink: "\f58b";
@fa-var-face-grin-wide: "\f581";
@fa-var-grin-alt: "\f581";
@fa-var-face-grin-wink: "\f58c";
@fa-var-grin-wink: "\f58c";
@fa-var-face-kiss: "\f596";
@fa-var-kiss: "\f596";
@fa-var-face-kiss-beam: "\f597";
@fa-var-kiss-beam: "\f597";
@fa-var-face-kiss-wink-heart: "\f598";
@fa-var-kiss-wink-heart: "\f598";
@fa-var-face-laugh: "\f599";
@fa-var-laugh: "\f599";
@fa-var-face-laugh-beam: "\f59a";
@fa-var-laugh-beam: "\f59a";
@fa-var-face-laugh-squint: "\f59b";
@fa-var-laugh-squint: "\f59b";
@fa-var-face-laugh-wink: "\f59c";
@fa-var-laugh-wink: "\f59c";
@fa-var-face-meh: "\f11a";
@fa-var-meh: "\f11a";
@fa-var-face-meh-blank: "\f5a4";
@fa-var-meh-blank: "\f5a4";
@fa-var-face-rolling-eyes: "\f5a5";
@fa-var-meh-rolling-eyes: "\f5a5";
@fa-var-face-sad-cry: "\f5b3";
@fa-var-sad-cry: "\f5b3";
@fa-var-face-sad-tear: "\f5b4";
@fa-var-sad-tear: "\f5b4";
@fa-var-face-smile: "\f118";
@fa-var-smile: "\f118";
@fa-var-face-smile-beam: "\f5b8";
@fa-var-smile-beam: "\f5b8";
@fa-var-face-smile-wink: "\f4da";
@fa-var-smile-wink: "\f4da";
@fa-var-face-surprise: "\f5c2";
@fa-var-surprise: "\f5c2";
@fa-var-face-tired: "\f5c8";
@fa-var-tired: "\f5c8";
@fa-var-fan: "\f863";
@fa-var-faucet: "\e005";
@fa-var-fax: "\f1ac";
@fa-var-feather: "\f52d";
@fa-var-feather-pointed: "\f56b";
@fa-var-feather-alt: "\f56b";
@fa-var-file: "\f15b";
@fa-var-file-arrow-down: "\f56d";
@fa-var-file-download: "\f56d";
@fa-var-file-arrow-up: "\f574";
@fa-var-file-upload: "\f574";
@fa-var-file-audio: "\f1c7";
@fa-var-file-code: "\f1c9";
@fa-var-file-contract: "\f56c";
@fa-var-file-csv: "\f6dd";
@fa-var-file-excel: "\f1c3";
@fa-var-file-export: "\f56e";
@fa-var-arrow-right-from-file: "\f56e";
@fa-var-file-image: "\f1c5";
@fa-var-file-import: "\f56f";
@fa-var-arrow-right-to-file: "\f56f";
@fa-var-file-invoice: "\f570";
@fa-var-file-invoice-dollar: "\f571";
@fa-var-file-lines: "\f15c";
@fa-var-file-alt: "\f15c";
@fa-var-file-text: "\f15c";
@fa-var-file-medical: "\f477";
@fa-var-file-pdf: "\f1c1";
@fa-var-file-powerpoint: "\f1c4";
@fa-var-file-prescription: "\f572";
@fa-var-file-signature: "\f573";
@fa-var-file-video: "\f1c8";
@fa-var-file-waveform: "\f478";
@fa-var-file-medical-alt: "\f478";
@fa-var-file-word: "\f1c2";
@fa-var-file-zipper: "\f1c6";
@fa-var-file-archive: "\f1c6";
@fa-var-fill: "\f575";
@fa-var-fill-drip: "\f576";
@fa-var-film: "\f008";
@fa-var-filter: "\f0b0";
@fa-var-filter-circle-dollar: "\f662";
@fa-var-funnel-dollar: "\f662";
@fa-var-filter-circle-xmark: "\e17b";
@fa-var-fingerprint: "\f577";
@fa-var-fire: "\f06d";
@fa-var-fire-extinguisher: "\f134";
@fa-var-fire-flame-curved: "\f7e4";
@fa-var-fire-alt: "\f7e4";
@fa-var-fire-flame-simple: "\f46a";
@fa-var-burn: "\f46a";
@fa-var-fish: "\f578";
@fa-var-flag: "\f024";
@fa-var-flag-checkered: "\f11e";
@fa-var-flag-usa: "\f74d";
@fa-var-flask: "\f0c3";
@fa-var-floppy-disk: "\f0c7";
@fa-var-save: "\f0c7";
@fa-var-florin-sign: "\e184";
@fa-var-folder: "\f07b";
@fa-var-folder-minus: "\f65d";
@fa-var-folder-open: "\f07c";
@fa-var-folder-plus: "\f65e";
@fa-var-folder-tree: "\f802";
@fa-var-font: "\f031";
@fa-var-football: "\f44e";
@fa-var-football-ball: "\f44e";
@fa-var-forward: "\f04e";
@fa-var-forward-fast: "\f050";
@fa-var-fast-forward: "\f050";
@fa-var-forward-step: "\f051";
@fa-var-step-forward: "\f051";
@fa-var-franc-sign: "\e18f";
@fa-var-frog: "\f52e";
@fa-var-futbol: "\f1e3";
@fa-var-futbol-ball: "\f1e3";
@fa-var-soccer-ball: "\f1e3";
@fa-var-g: "\47";
@fa-var-gamepad: "\f11b";
@fa-var-gas-pump: "\f52f";
@fa-var-gauge: "\f624";
@fa-var-dashboard: "\f624";
@fa-var-gauge-med: "\f624";
@fa-var-tachometer-alt-average: "\f624";
@fa-var-gauge-high: "\f625";
@fa-var-tachometer-alt: "\f625";
@fa-var-tachometer-alt-fast: "\f625";
@fa-var-gauge-simple: "\f629";
@fa-var-gauge-simple-med: "\f629";
@fa-var-tachometer-average: "\f629";
@fa-var-gauge-simple-high: "\f62a";
@fa-var-tachometer: "\f62a";
@fa-var-tachometer-fast: "\f62a";
@fa-var-gavel: "\f0e3";
@fa-var-legal: "\f0e3";
@fa-var-gear: "\f013";
@fa-var-cog: "\f013";
@fa-var-gears: "\f085";
@fa-var-cogs: "\f085";
@fa-var-gem: "\f3a5";
@fa-var-genderless: "\f22d";
@fa-var-ghost: "\f6e2";
@fa-var-gift: "\f06b";
@fa-var-gifts: "\f79c";
@fa-var-glasses: "\f530";
@fa-var-globe: "\f0ac";
@fa-var-golf-ball-tee: "\f450";
@fa-var-golf-ball: "\f450";
@fa-var-gopuram: "\f664";
@fa-var-graduation-cap: "\f19d";
@fa-var-mortar-board: "\f19d";
@fa-var-greater-than: "\3e";
@fa-var-greater-than-equal: "\f532";
@fa-var-grip: "\f58d";
@fa-var-grip-horizontal: "\f58d";
@fa-var-grip-lines: "\f7a4";
@fa-var-grip-lines-vertical: "\f7a5";
@fa-var-grip-vertical: "\f58e";
@fa-var-guarani-sign: "\e19a";
@fa-var-guitar: "\f7a6";
@fa-var-gun: "\e19b";
@fa-var-h: "\48";
@fa-var-hammer: "\f6e3";
@fa-var-hamsa: "\f665";
@fa-var-hand: "\f256";
@fa-var-hand-paper: "\f256";
@fa-var-hand-back-fist: "\f255";
@fa-var-hand-rock: "\f255";
@fa-var-hand-dots: "\f461";
@fa-var-allergies: "\f461";
@fa-var-hand-fist: "\f6de";
@fa-var-fist-raised: "\f6de";
@fa-var-hand-holding: "\f4bd";
@fa-var-hand-holding-dollar: "\f4c0";
@fa-var-hand-holding-usd: "\f4c0";
@fa-var-hand-holding-droplet: "\f4c1";
@fa-var-hand-holding-water: "\f4c1";
@fa-var-hand-holding-heart: "\f4be";
@fa-var-hand-holding-medical: "\e05c";
@fa-var-hand-lizard: "\f258";
@fa-var-hand-middle-finger: "\f806";
@fa-var-hand-peace: "\f25b";
@fa-var-hand-point-down: "\f0a7";
@fa-var-hand-point-left: "\f0a5";
@fa-var-hand-point-right: "\f0a4";
@fa-var-hand-point-up: "\f0a6";
@fa-var-hand-pointer: "\f25a";
@fa-var-hand-scissors: "\f257";
@fa-var-hand-sparkles: "\e05d";
@fa-var-hand-spock: "\f259";
@fa-var-hands: "\f2a7";
@fa-var-sign-language: "\f2a7";
@fa-var-signing: "\f2a7";
@fa-var-hands-asl-interpreting: "\f2a3";
@fa-var-american-sign-language-interpreting: "\f2a3";
@fa-var-asl-interpreting: "\f2a3";
@fa-var-hands-american-sign-language-interpreting: "\f2a3";
@fa-var-hands-bubbles: "\e05e";
@fa-var-hands-wash: "\e05e";
@fa-var-hands-clapping: "\e1a8";
@fa-var-hands-holding: "\f4c2";
@fa-var-hands-praying: "\f684";
@fa-var-praying-hands: "\f684";
@fa-var-handshake: "\f2b5";
@fa-var-handshake-angle: "\f4c4";
@fa-var-hands-helping: "\f4c4";
@fa-var-handshake-simple-slash: "\e05f";
@fa-var-handshake-alt-slash: "\e05f";
@fa-var-handshake-slash: "\e060";
@fa-var-hanukiah: "\f6e6";
@fa-var-hard-drive: "\f0a0";
@fa-var-hdd: "\f0a0";
@fa-var-hashtag: "\23";
@fa-var-hat-cowboy: "\f8c0";
@fa-var-hat-cowboy-side: "\f8c1";
@fa-var-hat-wizard: "\f6e8";
@fa-var-head-side-cough: "\e061";
@fa-var-head-side-cough-slash: "\e062";
@fa-var-head-side-mask: "\e063";
@fa-var-head-side-virus: "\e064";
@fa-var-heading: "\f1dc";
@fa-var-header: "\f1dc";
@fa-var-headphones: "\f025";
@fa-var-headphones-simple: "\f58f";
@fa-var-headphones-alt: "\f58f";
@fa-var-headset: "\f590";
@fa-var-heart: "\f004";
@fa-var-heart-crack: "\f7a9";
@fa-var-heart-broken: "\f7a9";
@fa-var-heart-pulse: "\f21e";
@fa-var-heartbeat: "\f21e";
@fa-var-helicopter: "\f533";
@fa-var-helmet-safety: "\f807";
@fa-var-hard-hat: "\f807";
@fa-var-hat-hard: "\f807";
@fa-var-highlighter: "\f591";
@fa-var-hippo: "\f6ed";
@fa-var-hockey-puck: "\f453";
@fa-var-holly-berry: "\f7aa";
@fa-var-horse: "\f6f0";
@fa-var-horse-head: "\f7ab";
@fa-var-hospital: "\f0f8";
@fa-var-hospital-alt: "\f0f8";
@fa-var-hospital-wide: "\f0f8";
@fa-var-hospital-user: "\f80d";
@fa-var-hot-tub-person: "\f593";
@fa-var-hot-tub: "\f593";
@fa-var-hotdog: "\f80f";
@fa-var-hotel: "\f594";
@fa-var-hourglass: "\f254";
@fa-var-hourglass-2: "\f254";
@fa-var-hourglass-half: "\f254";
@fa-var-hourglass-empty: "\f252";
@fa-var-hourglass-end: "\f253";
@fa-var-hourglass-3: "\f253";
@fa-var-hourglass-start: "\f251";
@fa-var-hourglass-1: "\f251";
@fa-var-house: "\f015";
@fa-var-home: "\f015";
@fa-var-home-alt: "\f015";
@fa-var-home-lg-alt: "\f015";
@fa-var-house-chimney: "\e3af";
@fa-var-home-lg: "\e3af";
@fa-var-house-chimney-crack: "\f6f1";
@fa-var-house-damage: "\f6f1";
@fa-var-house-chimney-medical: "\f7f2";
@fa-var-clinic-medical: "\f7f2";
@fa-var-house-chimney-user: "\e065";
@fa-var-house-chimney-window: "\e00d";
@fa-var-house-crack: "\e3b1";
@fa-var-house-laptop: "\e066";
@fa-var-laptop-house: "\e066";
@fa-var-house-medical: "\e3b2";
@fa-var-house-user: "\e1b0";
@fa-var-home-user: "\e1b0";
@fa-var-hryvnia-sign: "\f6f2";
@fa-var-hryvnia: "\f6f2";
@fa-var-i: "\49";
@fa-var-i-cursor: "\f246";
@fa-var-ice-cream: "\f810";
@fa-var-icicles: "\f7ad";
@fa-var-icons: "\f86d";
@fa-var-heart-music-camera-bolt: "\f86d";
@fa-var-id-badge: "\f2c1";
@fa-var-id-card: "\f2c2";
@fa-var-drivers-license: "\f2c2";
@fa-var-id-card-clip: "\f47f";
@fa-var-id-card-alt: "\f47f";
@fa-var-igloo: "\f7ae";
@fa-var-image: "\f03e";
@fa-var-image-portrait: "\f3e0";
@fa-var-portrait: "\f3e0";
@fa-var-images: "\f302";
@fa-var-inbox: "\f01c";
@fa-var-indent: "\f03c";
@fa-var-indian-rupee-sign: "\e1bc";
@fa-var-indian-rupee: "\e1bc";
@fa-var-inr: "\e1bc";
@fa-var-industry: "\f275";
@fa-var-infinity: "\f534";
@fa-var-info: "\f129";
@fa-var-italic: "\f033";
@fa-var-j: "\4a";
@fa-var-jedi: "\f669";
@fa-var-jet-fighter: "\f0fb";
@fa-var-fighter-jet: "\f0fb";
@fa-var-joint: "\f595";
@fa-var-k: "\4b";
@fa-var-kaaba: "\f66b";
@fa-var-key: "\f084";
@fa-var-keyboard: "\f11c";
@fa-var-khanda: "\f66d";
@fa-var-kip-sign: "\e1c4";
@fa-var-kit-medical: "\f479";
@fa-var-first-aid: "\f479";
@fa-var-kiwi-bird: "\f535";
@fa-var-l: "\4c";
@fa-var-landmark: "\f66f";
@fa-var-language: "\f1ab";
@fa-var-laptop: "\f109";
@fa-var-laptop-code: "\f5fc";
@fa-var-laptop-medical: "\f812";
@fa-var-lari-sign: "\e1c8";
@fa-var-layer-group: "\f5fd";
@fa-var-leaf: "\f06c";
@fa-var-left-long: "\f30a";
@fa-var-long-arrow-alt-left: "\f30a";
@fa-var-left-right: "\f337";
@fa-var-arrows-alt-h: "\f337";
@fa-var-lemon: "\f094";
@fa-var-less-than: "\3c";
@fa-var-less-than-equal: "\f537";
@fa-var-life-ring: "\f1cd";
@fa-var-lightbulb: "\f0eb";
@fa-var-link: "\f0c1";
@fa-var-chain: "\f0c1";
@fa-var-link-slash: "\f127";
@fa-var-chain-broken: "\f127";
@fa-var-chain-slash: "\f127";
@fa-var-unlink: "\f127";
@fa-var-lira-sign: "\f195";
@fa-var-list: "\f03a";
@fa-var-list-squares: "\f03a";
@fa-var-list-check: "\f0ae";
@fa-var-tasks: "\f0ae";
@fa-var-list-ol: "\f0cb";
@fa-var-list-1-2: "\f0cb";
@fa-var-list-numeric: "\f0cb";
@fa-var-list-ul: "\f0ca";
@fa-var-list-dots: "\f0ca";
@fa-var-litecoin-sign: "\e1d3";
@fa-var-location-arrow: "\f124";
@fa-var-location-crosshairs: "\f601";
@fa-var-location: "\f601";
@fa-var-location-dot: "\f3c5";
@fa-var-map-marker-alt: "\f3c5";
@fa-var-location-pin: "\f041";
@fa-var-map-marker: "\f041";
@fa-var-lock: "\f023";
@fa-var-lock-open: "\f3c1";
@fa-var-lungs: "\f604";
@fa-var-lungs-virus: "\e067";
@fa-var-m: "\4d";
@fa-var-magnet: "\f076";
@fa-var-magnifying-glass: "\f002";
@fa-var-search: "\f002";
@fa-var-magnifying-glass-dollar: "\f688";
@fa-var-search-dollar: "\f688";
@fa-var-magnifying-glass-location: "\f689";
@fa-var-search-location: "\f689";
@fa-var-magnifying-glass-minus: "\f010";
@fa-var-search-minus: "\f010";
@fa-var-magnifying-glass-plus: "\f00e";
@fa-var-search-plus: "\f00e";
@fa-var-manat-sign: "\e1d5";
@fa-var-map: "\f279";
@fa-var-map-location: "\f59f";
@fa-var-map-marked: "\f59f";
@fa-var-map-location-dot: "\f5a0";
@fa-var-map-marked-alt: "\f5a0";
@fa-var-map-pin: "\f276";
@fa-var-marker: "\f5a1";
@fa-var-mars: "\f222";
@fa-var-mars-and-venus: "\f224";
@fa-var-mars-double: "\f227";
@fa-var-mars-stroke: "\f229";
@fa-var-mars-stroke-right: "\f22b";
@fa-var-mars-stroke-h: "\f22b";
@fa-var-mars-stroke-up: "\f22a";
@fa-var-mars-stroke-v: "\f22a";
@fa-var-martini-glass: "\f57b";
@fa-var-glass-martini-alt: "\f57b";
@fa-var-martini-glass-citrus: "\f561";
@fa-var-cocktail: "\f561";
@fa-var-martini-glass-empty: "\f000";
@fa-var-glass-martini: "\f000";
@fa-var-mask: "\f6fa";
@fa-var-mask-face: "\e1d7";
@fa-var-masks-theater: "\f630";
@fa-var-theater-masks: "\f630";
@fa-var-maximize: "\f31e";
@fa-var-expand-arrows-alt: "\f31e";
@fa-var-medal: "\f5a2";
@fa-var-memory: "\f538";
@fa-var-menorah: "\f676";
@fa-var-mercury: "\f223";
@fa-var-message: "\f27a";
@fa-var-comment-alt: "\f27a";
@fa-var-meteor: "\f753";
@fa-var-microchip: "\f2db";
@fa-var-microphone: "\f130";
@fa-var-microphone-lines: "\f3c9";
@fa-var-microphone-alt: "\f3c9";
@fa-var-microphone-lines-slash: "\f539";
@fa-var-microphone-alt-slash: "\f539";
@fa-var-microphone-slash: "\f131";
@fa-var-microscope: "\f610";
@fa-var-mill-sign: "\e1ed";
@fa-var-minimize: "\f78c";
@fa-var-compress-arrows-alt: "\f78c";
@fa-var-minus: "\f068";
@fa-var-subtract: "\f068";
@fa-var-mitten: "\f7b5";
@fa-var-mobile: "\f3ce";
@fa-var-mobile-android: "\f3ce";
@fa-var-mobile-phone: "\f3ce";
@fa-var-mobile-button: "\f10b";
@fa-var-mobile-screen-button: "\f3cd";
@fa-var-mobile-alt: "\f3cd";
@fa-var-money-bill: "\f0d6";
@fa-var-money-bill-1: "\f3d1";
@fa-var-money-bill-alt: "\f3d1";
@fa-var-money-bill-1-wave: "\f53b";
@fa-var-money-bill-wave-alt: "\f53b";
@fa-var-money-bill-wave: "\f53a";
@fa-var-money-check: "\f53c";
@fa-var-money-check-dollar: "\f53d";
@fa-var-money-check-alt: "\f53d";
@fa-var-monument: "\f5a6";
@fa-var-moon: "\f186";
@fa-var-mortar-pestle: "\f5a7";
@fa-var-mosque: "\f678";
@fa-var-motorcycle: "\f21c";
@fa-var-mountain: "\f6fc";
@fa-var-mug-hot: "\f7b6";
@fa-var-mug-saucer: "\f0f4";
@fa-var-coffee: "\f0f4";
@fa-var-music: "\f001";
@fa-var-n: "\4e";
@fa-var-naira-sign: "\e1f6";
@fa-var-network-wired: "\f6ff";
@fa-var-neuter: "\f22c";
@fa-var-newspaper: "\f1ea";
@fa-var-not-equal: "\f53e";
@fa-var-note-sticky: "\f249";
@fa-var-sticky-note: "\f249";
@fa-var-notes-medical: "\f481";
@fa-var-o: "\4f";
@fa-var-object-group: "\f247";
@fa-var-object-ungroup: "\f248";
@fa-var-oil-can: "\f613";
@fa-var-om: "\f679";
@fa-var-otter: "\f700";
@fa-var-outdent: "\f03b";
@fa-var-dedent: "\f03b";
@fa-var-p: "\50";
@fa-var-pager: "\f815";
@fa-var-paint-roller: "\f5aa";
@fa-var-paintbrush: "\f1fc";
@fa-var-paint-brush: "\f1fc";
@fa-var-palette: "\f53f";
@fa-var-pallet: "\f482";
@fa-var-panorama: "\e209";
@fa-var-paper-plane: "\f1d8";
@fa-var-paperclip: "\f0c6";
@fa-var-parachute-box: "\f4cd";
@fa-var-paragraph: "\f1dd";
@fa-var-passport: "\f5ab";
@fa-var-paste: "\f0ea";
@fa-var-file-clipboard: "\f0ea";
@fa-var-pause: "\f04c";
@fa-var-paw: "\f1b0";
@fa-var-peace: "\f67c";
@fa-var-pen: "\f304";
@fa-var-pen-clip: "\f305";
@fa-var-pen-alt: "\f305";
@fa-var-pen-fancy: "\f5ac";
@fa-var-pen-nib: "\f5ad";
@fa-var-pen-ruler: "\f5ae";
@fa-var-pencil-ruler: "\f5ae";
@fa-var-pen-to-square: "\f044";
@fa-var-edit: "\f044";
@fa-var-pencil: "\f303";
@fa-var-pencil-alt: "\f303";
@fa-var-people-arrows-left-right: "\e068";
@fa-var-people-arrows: "\e068";
@fa-var-people-carry-box: "\f4ce";
@fa-var-people-carry: "\f4ce";
@fa-var-pepper-hot: "\f816";
@fa-var-percent: "\25";
@fa-var-percentage: "\25";
@fa-var-person: "\f183";
@fa-var-male: "\f183";
@fa-var-person-biking: "\f84a";
@fa-var-biking: "\f84a";
@fa-var-person-booth: "\f756";
@fa-var-person-dots-from-line: "\f470";
@fa-var-diagnoses: "\f470";
@fa-var-person-dress: "\f182";
@fa-var-female: "\f182";
@fa-var-person-hiking: "\f6ec";
@fa-var-hiking: "\f6ec";
@fa-var-person-praying: "\f683";
@fa-var-pray: "\f683";
@fa-var-person-running: "\f70c";
@fa-var-running: "\f70c";
@fa-var-person-skating: "\f7c5";
@fa-var-skating: "\f7c5";
@fa-var-person-skiing: "\f7c9";
@fa-var-skiing: "\f7c9";
@fa-var-person-skiing-nordic: "\f7ca";
@fa-var-skiing-nordic: "\f7ca";
@fa-var-person-snowboarding: "\f7ce";
@fa-var-snowboarding: "\f7ce";
@fa-var-person-swimming: "\f5c4";
@fa-var-swimmer: "\f5c4";
@fa-var-person-walking: "\f554";
@fa-var-walking: "\f554";
@fa-var-person-walking-with-cane: "\f29d";
@fa-var-blind: "\f29d";
@fa-var-peseta-sign: "\e221";
@fa-var-peso-sign: "\e222";
@fa-var-phone: "\f095";
@fa-var-phone-flip: "\f879";
@fa-var-phone-alt: "\f879";
@fa-var-phone-slash: "\f3dd";
@fa-var-phone-volume: "\f2a0";
@fa-var-volume-control-phone: "\f2a0";
@fa-var-photo-film: "\f87c";
@fa-var-photo-video: "\f87c";
@fa-var-piggy-bank: "\f4d3";
@fa-var-pills: "\f484";
@fa-var-pizza-slice: "\f818";
@fa-var-place-of-worship: "\f67f";
@fa-var-plane: "\f072";
@fa-var-plane-arrival: "\f5af";
@fa-var-plane-departure: "\f5b0";
@fa-var-plane-slash: "\e069";
@fa-var-play: "\f04b";
@fa-var-plug: "\f1e6";
@fa-var-plus: "\2b";
@fa-var-add: "\2b";
@fa-var-plus-minus: "\e43c";
@fa-var-podcast: "\f2ce";
@fa-var-poo: "\f2fe";
@fa-var-poo-storm: "\f75a";
@fa-var-poo-bolt: "\f75a";
@fa-var-poop: "\f619";
@fa-var-power-off: "\f011";
@fa-var-prescription: "\f5b1";
@fa-var-prescription-bottle: "\f485";
@fa-var-prescription-bottle-medical: "\f486";
@fa-var-prescription-bottle-alt: "\f486";
@fa-var-print: "\f02f";
@fa-var-pump-medical: "\e06a";
@fa-var-pump-soap: "\e06b";
@fa-var-puzzle-piece: "\f12e";
@fa-var-q: "\51";
@fa-var-qrcode: "\f029";
@fa-var-question: "\3f";
@fa-var-quote-left: "\f10d";
@fa-var-quote-left-alt: "\f10d";
@fa-var-quote-right: "\f10e";
@fa-var-quote-right-alt: "\f10e";
@fa-var-r: "\52";
@fa-var-radiation: "\f7b9";
@fa-var-rainbow: "\f75b";
@fa-var-receipt: "\f543";
@fa-var-record-vinyl: "\f8d9";
@fa-var-rectangle-ad: "\f641";
@fa-var-ad: "\f641";
@fa-var-rectangle-list: "\f022";
@fa-var-list-alt: "\f022";
@fa-var-rectangle-xmark: "\f410";
@fa-var-rectangle-times: "\f410";
@fa-var-times-rectangle: "\f410";
@fa-var-window-close: "\f410";
@fa-var-recycle: "\f1b8";
@fa-var-registered: "\f25d";
@fa-var-repeat: "\f363";
@fa-var-reply: "\f3e5";
@fa-var-mail-reply: "\f3e5";
@fa-var-reply-all: "\f122";
@fa-var-mail-reply-all: "\f122";
@fa-var-republican: "\f75e";
@fa-var-restroom: "\f7bd";
@fa-var-retweet: "\f079";
@fa-var-ribbon: "\f4d6";
@fa-var-right-from-bracket: "\f2f5";
@fa-var-sign-out-alt: "\f2f5";
@fa-var-right-left: "\f362";
@fa-var-exchange-alt: "\f362";
@fa-var-right-long: "\f30b";
@fa-var-long-arrow-alt-right: "\f30b";
@fa-var-right-to-bracket: "\f2f6";
@fa-var-sign-in-alt: "\f2f6";
@fa-var-ring: "\f70b";
@fa-var-road: "\f018";
@fa-var-robot: "\f544";
@fa-var-rocket: "\f135";
@fa-var-rotate: "\f2f1";
@fa-var-sync-alt: "\f2f1";
@fa-var-rotate-left: "\f2ea";
@fa-var-rotate-back: "\f2ea";
@fa-var-rotate-backward: "\f2ea";
@fa-var-undo-alt: "\f2ea";
@fa-var-rotate-right: "\f2f9";
@fa-var-redo-alt: "\f2f9";
@fa-var-rotate-forward: "\f2f9";
@fa-var-route: "\f4d7";
@fa-var-rss: "\f09e";
@fa-var-feed: "\f09e";
@fa-var-ruble-sign: "\f158";
@fa-var-rouble: "\f158";
@fa-var-rub: "\f158";
@fa-var-ruble: "\f158";
@fa-var-ruler: "\f545";
@fa-var-ruler-combined: "\f546";
@fa-var-ruler-horizontal: "\f547";
@fa-var-ruler-vertical: "\f548";
@fa-var-rupee-sign: "\f156";
@fa-var-rupee: "\f156";
@fa-var-rupiah-sign: "\e23d";
@fa-var-s: "\53";
@fa-var-sailboat: "\e445";
@fa-var-satellite: "\f7bf";
@fa-var-satellite-dish: "\f7c0";
@fa-var-scale-balanced: "\f24e";
@fa-var-balance-scale: "\f24e";
@fa-var-scale-unbalanced: "\f515";
@fa-var-balance-scale-left: "\f515";
@fa-var-scale-unbalanced-flip: "\f516";
@fa-var-balance-scale-right: "\f516";
@fa-var-school: "\f549";
@fa-var-scissors: "\f0c4";
@fa-var-cut: "\f0c4";
@fa-var-screwdriver: "\f54a";
@fa-var-screwdriver-wrench: "\f7d9";
@fa-var-tools: "\f7d9";
@fa-var-scroll: "\f70e";
@fa-var-scroll-torah: "\f6a0";
@fa-var-torah: "\f6a0";
@fa-var-sd-card: "\f7c2";
@fa-var-section: "\e447";
@fa-var-seedling: "\f4d8";
@fa-var-sprout: "\f4d8";
@fa-var-server: "\f233";
@fa-var-shapes: "\f61f";
@fa-var-triangle-circle-square: "\f61f";
@fa-var-share: "\f064";
@fa-var-arrow-turn-right: "\f064";
@fa-var-mail-forward: "\f064";
@fa-var-share-from-square: "\f14d";
@fa-var-share-square: "\f14d";
@fa-var-share-nodes: "\f1e0";
@fa-var-share-alt: "\f1e0";
@fa-var-shekel-sign: "\f20b";
@fa-var-ils: "\f20b";
@fa-var-shekel: "\f20b";
@fa-var-sheqel: "\f20b";
@fa-var-sheqel-sign: "\f20b";
@fa-var-shield: "\f132";
@fa-var-shield-blank: "\f3ed";
@fa-var-shield-alt: "\f3ed";
@fa-var-shield-virus: "\e06c";
@fa-var-ship: "\f21a";
@fa-var-shirt: "\f553";
@fa-var-t-shirt: "\f553";
@fa-var-tshirt: "\f553";
@fa-var-shoe-prints: "\f54b";
@fa-var-shop: "\f54f";
@fa-var-store-alt: "\f54f";
@fa-var-shop-slash: "\e070";
@fa-var-store-alt-slash: "\e070";
@fa-var-shower: "\f2cc";
@fa-var-shrimp: "\e448";
@fa-var-shuffle: "\f074";
@fa-var-random: "\f074";
@fa-var-shuttle-space: "\f197";
@fa-var-space-shuttle: "\f197";
@fa-var-sign-hanging: "\f4d9";
@fa-var-sign: "\f4d9";
@fa-var-signal: "\f012";
@fa-var-signal-5: "\f012";
@fa-var-signal-perfect: "\f012";
@fa-var-signature: "\f5b7";
@fa-var-signs-post: "\f277";
@fa-var-map-signs: "\f277";
@fa-var-sim-card: "\f7c4";
@fa-var-sink: "\e06d";
@fa-var-sitemap: "\f0e8";
@fa-var-skull: "\f54c";
@fa-var-skull-crossbones: "\f714";
@fa-var-slash: "\f715";
@fa-var-sleigh: "\f7cc";
@fa-var-sliders: "\f1de";
@fa-var-sliders-h: "\f1de";
@fa-var-smog: "\f75f";
@fa-var-smoking: "\f48d";
@fa-var-snowflake: "\f2dc";
@fa-var-snowman: "\f7d0";
@fa-var-snowplow: "\f7d2";
@fa-var-soap: "\e06e";
@fa-var-socks: "\f696";
@fa-var-solar-panel: "\f5ba";
@fa-var-sort: "\f0dc";
@fa-var-unsorted: "\f0dc";
@fa-var-sort-down: "\f0dd";
@fa-var-sort-desc: "\f0dd";
@fa-var-sort-up: "\f0de";
@fa-var-sort-asc: "\f0de";
@fa-var-spa: "\f5bb";
@fa-var-spaghetti-monster-flying: "\f67b";
@fa-var-pastafarianism: "\f67b";
@fa-var-spell-check: "\f891";
@fa-var-spider: "\f717";
@fa-var-spinner: "\f110";
@fa-var-splotch: "\f5bc";
@fa-var-spoon: "\f2e5";
@fa-var-utensil-spoon: "\f2e5";
@fa-var-spray-can: "\f5bd";
@fa-var-spray-can-sparkles: "\f5d0";
@fa-var-air-freshener: "\f5d0";
@fa-var-square: "\f0c8";
@fa-var-square-arrow-up-right: "\f14c";
@fa-var-external-link-square: "\f14c";
@fa-var-square-caret-down: "\f150";
@fa-var-caret-square-down: "\f150";
@fa-var-square-caret-left: "\f191";
@fa-var-caret-square-left: "\f191";
@fa-var-square-caret-right: "\f152";
@fa-var-caret-square-right: "\f152";
@fa-var-square-caret-up: "\f151";
@fa-var-caret-square-up: "\f151";
@fa-var-square-check: "\f14a";
@fa-var-check-square: "\f14a";
@fa-var-square-envelope: "\f199";
@fa-var-envelope-square: "\f199";
@fa-var-square-full: "\f45c";
@fa-var-square-h: "\f0fd";
@fa-var-h-square: "\f0fd";
@fa-var-square-minus: "\f146";
@fa-var-minus-square: "\f146";
@fa-var-square-parking: "\f540";
@fa-var-parking: "\f540";
@fa-var-square-pen: "\f14b";
@fa-var-pen-square: "\f14b";
@fa-var-pencil-square: "\f14b";
@fa-var-square-phone: "\f098";
@fa-var-phone-square: "\f098";
@fa-var-square-phone-flip: "\f87b";
@fa-var-phone-square-alt: "\f87b";
@fa-var-square-plus: "\f0fe";
@fa-var-plus-square: "\f0fe";
@fa-var-square-poll-horizontal: "\f682";
@fa-var-poll-h: "\f682";
@fa-var-square-poll-vertical: "\f681";
@fa-var-poll: "\f681";
@fa-var-square-root-variable: "\f698";
@fa-var-square-root-alt: "\f698";
@fa-var-square-rss: "\f143";
@fa-var-rss-square: "\f143";
@fa-var-square-share-nodes: "\f1e1";
@fa-var-share-alt-square: "\f1e1";
@fa-var-square-up-right: "\f360";
@fa-var-external-link-square-alt: "\f360";
@fa-var-square-xmark: "\f2d3";
@fa-var-times-square: "\f2d3";
@fa-var-xmark-square: "\f2d3";
@fa-var-stairs: "\e289";
@fa-var-stamp: "\f5bf";
@fa-var-star: "\f005";
@fa-var-star-and-crescent: "\f699";
@fa-var-star-half: "\f089";
@fa-var-star-half-stroke: "\f5c0";
@fa-var-star-half-alt: "\f5c0";
@fa-var-star-of-david: "\f69a";
@fa-var-star-of-life: "\f621";
@fa-var-sterling-sign: "\f154";
@fa-var-gbp: "\f154";
@fa-var-pound-sign: "\f154";
@fa-var-stethoscope: "\f0f1";
@fa-var-stop: "\f04d";
@fa-var-stopwatch: "\f2f2";
@fa-var-stopwatch-20: "\e06f";
@fa-var-store: "\f54e";
@fa-var-store-slash: "\e071";
@fa-var-street-view: "\f21d";
@fa-var-strikethrough: "\f0cc";
@fa-var-stroopwafel: "\f551";
@fa-var-subscript: "\f12c";
@fa-var-suitcase: "\f0f2";
@fa-var-suitcase-medical: "\f0fa";
@fa-var-medkit: "\f0fa";
@fa-var-suitcase-rolling: "\f5c1";
@fa-var-sun: "\f185";
@fa-var-superscript: "\f12b";
@fa-var-swatchbook: "\f5c3";
@fa-var-synagogue: "\f69b";
@fa-var-syringe: "\f48e";
@fa-var-t: "\54";
@fa-var-table: "\f0ce";
@fa-var-table-cells: "\f00a";
@fa-var-th: "\f00a";
@fa-var-table-cells-large: "\f009";
@fa-var-th-large: "\f009";
@fa-var-table-columns: "\f0db";
@fa-var-columns: "\f0db";
@fa-var-table-list: "\f00b";
@fa-var-th-list: "\f00b";
@fa-var-table-tennis-paddle-ball: "\f45d";
@fa-var-ping-pong-paddle-ball: "\f45d";
@fa-var-table-tennis: "\f45d";
@fa-var-tablet: "\f3fb";
@fa-var-tablet-android: "\f3fb";
@fa-var-tablet-button: "\f10a";
@fa-var-tablet-screen-button: "\f3fa";
@fa-var-tablet-alt: "\f3fa";
@fa-var-tablets: "\f490";
@fa-var-tachograph-digital: "\f566";
@fa-var-digital-tachograph: "\f566";
@fa-var-tag: "\f02b";
@fa-var-tags: "\f02c";
@fa-var-tape: "\f4db";
@fa-var-taxi: "\f1ba";
@fa-var-cab: "\f1ba";
@fa-var-teeth: "\f62e";
@fa-var-teeth-open: "\f62f";
@fa-var-temperature-empty: "\f2cb";
@fa-var-temperature-0: "\f2cb";
@fa-var-thermometer-0: "\f2cb";
@fa-var-thermometer-empty: "\f2cb";
@fa-var-temperature-full: "\f2c7";
@fa-var-temperature-4: "\f2c7";
@fa-var-thermometer-4: "\f2c7";
@fa-var-thermometer-full: "\f2c7";
@fa-var-temperature-half: "\f2c9";
@fa-var-temperature-2: "\f2c9";
@fa-var-thermometer-2: "\f2c9";
@fa-var-thermometer-half: "\f2c9";
@fa-var-temperature-high: "\f769";
@fa-var-temperature-low: "\f76b";
@fa-var-temperature-quarter: "\f2ca";
@fa-var-temperature-1: "\f2ca";
@fa-var-thermometer-1: "\f2ca";
@fa-var-thermometer-quarter: "\f2ca";
@fa-var-temperature-three-quarters: "\f2c8";
@fa-var-temperature-3: "\f2c8";
@fa-var-thermometer-3: "\f2c8";
@fa-var-thermometer-three-quarters: "\f2c8";
@fa-var-tenge-sign: "\f7d7";
@fa-var-tenge: "\f7d7";
@fa-var-terminal: "\f120";
@fa-var-text-height: "\f034";
@fa-var-text-slash: "\f87d";
@fa-var-remove-format: "\f87d";
@fa-var-text-width: "\f035";
@fa-var-thermometer: "\f491";
@fa-var-thumbs-down: "\f165";
@fa-var-thumbs-up: "\f164";
@fa-var-thumbtack: "\f08d";
@fa-var-thumb-tack: "\f08d";
@fa-var-ticket: "\f145";
@fa-var-ticket-simple: "\f3ff";
@fa-var-ticket-alt: "\f3ff";
@fa-var-timeline: "\e29c";
@fa-var-toggle-off: "\f204";
@fa-var-toggle-on: "\f205";
@fa-var-toilet: "\f7d8";
@fa-var-toilet-paper: "\f71e";
@fa-var-toilet-paper-slash: "\e072";
@fa-var-toolbox: "\f552";
@fa-var-tooth: "\f5c9";
@fa-var-torii-gate: "\f6a1";
@fa-var-tower-broadcast: "\f519";
@fa-var-broadcast-tower: "\f519";
@fa-var-tractor: "\f722";
@fa-var-trademark: "\f25c";
@fa-var-traffic-light: "\f637";
@fa-var-trailer: "\e041";
@fa-var-train: "\f238";
@fa-var-train-subway: "\f239";
@fa-var-subway: "\f239";
@fa-var-train-tram: "\f7da";
@fa-var-tram: "\f7da";
@fa-var-transgender: "\f225";
@fa-var-transgender-alt: "\f225";
@fa-var-trash: "\f1f8";
@fa-var-trash-arrow-up: "\f829";
@fa-var-trash-restore: "\f829";
@fa-var-trash-can: "\f2ed";
@fa-var-trash-alt: "\f2ed";
@fa-var-trash-can-arrow-up: "\f82a";
@fa-var-trash-restore-alt: "\f82a";
@fa-var-tree: "\f1bb";
@fa-var-triangle-exclamation: "\f071";
@fa-var-exclamation-triangle: "\f071";
@fa-var-warning: "\f071";
@fa-var-trophy: "\f091";
@fa-var-truck: "\f0d1";
@fa-var-truck-fast: "\f48b";
@fa-var-shipping-fast: "\f48b";
@fa-var-truck-medical: "\f0f9";
@fa-var-ambulance: "\f0f9";
@fa-var-truck-monster: "\f63b";
@fa-var-truck-moving: "\f4df";
@fa-var-truck-pickup: "\f63c";
@fa-var-truck-ramp-box: "\f4de";
@fa-var-truck-loading: "\f4de";
@fa-var-tty: "\f1e4";
@fa-var-teletype: "\f1e4";
@fa-var-turkish-lira-sign: "\e2bb";
@fa-var-try: "\e2bb";
@fa-var-turkish-lira: "\e2bb";
@fa-var-turn-down: "\f3be";
@fa-var-level-down-alt: "\f3be";
@fa-var-turn-up: "\f3bf";
@fa-var-level-up-alt: "\f3bf";
@fa-var-tv: "\f26c";
@fa-var-television: "\f26c";
@fa-var-tv-alt: "\f26c";
@fa-var-u: "\55";
@fa-var-umbrella: "\f0e9";
@fa-var-umbrella-beach: "\f5ca";
@fa-var-underline: "\f0cd";
@fa-var-universal-access: "\f29a";
@fa-var-unlock: "\f09c";
@fa-var-unlock-keyhole: "\f13e";
@fa-var-unlock-alt: "\f13e";
@fa-var-up-down: "\f338";
@fa-var-arrows-alt-v: "\f338";
@fa-var-up-down-left-right: "\f0b2";
@fa-var-arrows-alt: "\f0b2";
@fa-var-up-long: "\f30c";
@fa-var-long-arrow-alt-up: "\f30c";
@fa-var-up-right-and-down-left-from-center: "\f424";
@fa-var-expand-alt: "\f424";
@fa-var-up-right-from-square: "\f35d";
@fa-var-external-link-alt: "\f35d";
@fa-var-upload: "\f093";
@fa-var-user: "\f007";
@fa-var-user-astronaut: "\f4fb";
@fa-var-user-check: "\f4fc";
@fa-var-user-clock: "\f4fd";
@fa-var-user-doctor: "\f0f0";
@fa-var-user-md: "\f0f0";
@fa-var-user-gear: "\f4fe";
@fa-var-user-cog: "\f4fe";
@fa-var-user-graduate: "\f501";
@fa-var-user-group: "\f500";
@fa-var-user-friends: "\f500";
@fa-var-user-injured: "\f728";
@fa-var-user-large: "\f406";
@fa-var-user-alt: "\f406";
@fa-var-user-large-slash: "\f4fa";
@fa-var-user-alt-slash: "\f4fa";
@fa-var-user-lock: "\f502";
@fa-var-user-minus: "\f503";
@fa-var-user-ninja: "\f504";
@fa-var-user-nurse: "\f82f";
@fa-var-user-pen: "\f4ff";
@fa-var-user-edit: "\f4ff";
@fa-var-user-plus: "\f234";
@fa-var-user-secret: "\f21b";
@fa-var-user-shield: "\f505";
@fa-var-user-slash: "\f506";
@fa-var-user-tag: "\f507";
@fa-var-user-tie: "\f508";
@fa-var-user-xmark: "\f235";
@fa-var-user-times: "\f235";
@fa-var-users: "\f0c0";
@fa-var-users-gear: "\f509";
@fa-var-users-cog: "\f509";
@fa-var-users-slash: "\e073";
@fa-var-utensils: "\f2e7";
@fa-var-cutlery: "\f2e7";
@fa-var-v: "\56";
@fa-var-van-shuttle: "\f5b6";
@fa-var-shuttle-van: "\f5b6";
@fa-var-vault: "\e2c5";
@fa-var-vector-square: "\f5cb";
@fa-var-venus: "\f221";
@fa-var-venus-double: "\f226";
@fa-var-venus-mars: "\f228";
@fa-var-vest: "\e085";
@fa-var-vest-patches: "\e086";
@fa-var-vial: "\f492";
@fa-var-vials: "\f493";
@fa-var-video: "\f03d";
@fa-var-video-camera: "\f03d";
@fa-var-video-slash: "\f4e2";
@fa-var-vihara: "\f6a7";
@fa-var-virus: "\e074";
@fa-var-virus-covid: "\e4a8";
@fa-var-virus-covid-slash: "\e4a9";
@fa-var-virus-slash: "\e075";
@fa-var-viruses: "\e076";
@fa-var-voicemail: "\f897";
@fa-var-volleyball: "\f45f";
@fa-var-volleyball-ball: "\f45f";
@fa-var-volume-high: "\f028";
@fa-var-volume-up: "\f028";
@fa-var-volume-low: "\f027";
@fa-var-volume-down: "\f027";
@fa-var-volume-off: "\f026";
@fa-var-volume-xmark: "\f6a9";
@fa-var-volume-mute: "\f6a9";
@fa-var-volume-times: "\f6a9";
@fa-var-vr-cardboard: "\f729";
@fa-var-w: "\57";
@fa-var-wallet: "\f555";
@fa-var-wand-magic: "\f0d0";
@fa-var-magic: "\f0d0";
@fa-var-wand-magic-sparkles: "\e2ca";
@fa-var-magic-wand-sparkles: "\e2ca";
@fa-var-wand-sparkles: "\f72b";
@fa-var-warehouse: "\f494";
@fa-var-water: "\f773";
@fa-var-water-ladder: "\f5c5";
@fa-var-ladder-water: "\f5c5";
@fa-var-swimming-pool: "\f5c5";
@fa-var-wave-square: "\f83e";
@fa-var-weight-hanging: "\f5cd";
@fa-var-weight-scale: "\f496";
@fa-var-weight: "\f496";
@fa-var-wheelchair: "\f193";
@fa-var-whiskey-glass: "\f7a0";
@fa-var-glass-whiskey: "\f7a0";
@fa-var-wifi: "\f1eb";
@fa-var-wifi-3: "\f1eb";
@fa-var-wifi-strong: "\f1eb";
@fa-var-wind: "\f72e";
@fa-var-window-maximize: "\f2d0";
@fa-var-window-minimize: "\f2d1";
@fa-var-window-restore: "\f2d2";
@fa-var-wine-bottle: "\f72f";
@fa-var-wine-glass: "\f4e3";
@fa-var-wine-glass-empty: "\f5ce";
@fa-var-wine-glass-alt: "\f5ce";
@fa-var-won-sign: "\f159";
@fa-var-krw: "\f159";
@fa-var-won: "\f159";
@fa-var-wrench: "\f0ad";
@fa-var-x: "\58";
@fa-var-x-ray: "\f497";
@fa-var-xmark: "\f00d";
@fa-var-close: "\f00d";
@fa-var-multiply: "\f00d";
@fa-var-remove: "\f00d";
@fa-var-times: "\f00d";
@fa-var-y: "\59";
@fa-var-yen-sign: "\f157";
@fa-var-cny: "\f157";
@fa-var-jpy: "\f157";
@fa-var-rmb: "\f157";
@fa-var-yen: "\f157";
@fa-var-yin-yang: "\f6ad";
@fa-var-z: "\5a";

@fa-var-42-group: "\e080";
@fa-var-innosoft: "\e080";
@fa-var-500px: "\f26e";
@fa-var-accessible-icon: "\f368";
@fa-var-accusoft: "\f369";
@fa-var-adn: "\f170";
@fa-var-adversal: "\f36a";
@fa-var-affiliatetheme: "\f36b";
@fa-var-airbnb: "\f834";
@fa-var-algolia: "\f36c";
@fa-var-alipay: "\f642";
@fa-var-amazon: "\f270";
@fa-var-amazon-pay: "\f42c";
@fa-var-amilia: "\f36d";
@fa-var-android: "\f17b";
@fa-var-angellist: "\f209";
@fa-var-angrycreative: "\f36e";
@fa-var-angular: "\f420";
@fa-var-app-store: "\f36f";
@fa-var-app-store-ios: "\f370";
@fa-var-apper: "\f371";
@fa-var-apple: "\f179";
@fa-var-apple-pay: "\f415";
@fa-var-artstation: "\f77a";
@fa-var-asymmetrik: "\f372";
@fa-var-atlassian: "\f77b";
@fa-var-audible: "\f373";
@fa-var-autoprefixer: "\f41c";
@fa-var-avianex: "\f374";
@fa-var-aviato: "\f421";
@fa-var-aws: "\f375";
@fa-var-bandcamp: "\f2d5";
@fa-var-battle-net: "\f835";
@fa-var-behance: "\f1b4";
@fa-var-behance-square: "\f1b5";
@fa-var-bilibili: "\e3d9";
@fa-var-bimobject: "\f378";
@fa-var-bitbucket: "\f171";
@fa-var-bitcoin: "\f379";
@fa-var-bity: "\f37a";
@fa-var-black-tie: "\f27e";
@fa-var-blackberry: "\f37b";
@fa-var-blogger: "\f37c";
@fa-var-blogger-b: "\f37d";
@fa-var-bluetooth: "\f293";
@fa-var-bluetooth-b: "\f294";
@fa-var-bootstrap: "\f836";
@fa-var-bots: "\e340";
@fa-var-btc: "\f15a";
@fa-var-buffer: "\f837";
@fa-var-buromobelexperte: "\f37f";
@fa-var-buy-n-large: "\f8a6";
@fa-var-buysellads: "\f20d";
@fa-var-canadian-maple-leaf: "\f785";
@fa-var-cc-amazon-pay: "\f42d";
@fa-var-cc-amex: "\f1f3";
@fa-var-cc-apple-pay: "\f416";
@fa-var-cc-diners-club: "\f24c";
@fa-var-cc-discover: "\f1f2";
@fa-var-cc-jcb: "\f24b";
@fa-var-cc-mastercard: "\f1f1";
@fa-var-cc-paypal: "\f1f4";
@fa-var-cc-stripe: "\f1f5";
@fa-var-cc-visa: "\f1f0";
@fa-var-centercode: "\f380";
@fa-var-centos: "\f789";
@fa-var-chrome: "\f268";
@fa-var-chromecast: "\f838";
@fa-var-cloudflare: "\e07d";
@fa-var-cloudscale: "\f383";
@fa-var-cloudsmith: "\f384";
@fa-var-cloudversify: "\f385";
@fa-var-cmplid: "\e360";
@fa-var-codepen: "\f1cb";
@fa-var-codiepie: "\f284";
@fa-var-confluence: "\f78d";
@fa-var-connectdevelop: "\f20e";
@fa-var-contao: "\f26d";
@fa-var-cotton-bureau: "\f89e";
@fa-var-cpanel: "\f388";
@fa-var-creative-commons: "\f25e";
@fa-var-creative-commons-by: "\f4e7";
@fa-var-creative-commons-nc: "\f4e8";
@fa-var-creative-commons-nc-eu: "\f4e9";
@fa-var-creative-commons-nc-jp: "\f4ea";
@fa-var-creative-commons-nd: "\f4eb";
@fa-var-creative-commons-pd: "\f4ec";
@fa-var-creative-commons-pd-alt: "\f4ed";
@fa-var-creative-commons-remix: "\f4ee";
@fa-var-creative-commons-sa: "\f4ef";
@fa-var-creative-commons-sampling: "\f4f0";
@fa-var-creative-commons-sampling-plus: "\f4f1";
@fa-var-creative-commons-share: "\f4f2";
@fa-var-creative-commons-zero: "\f4f3";
@fa-var-critical-role: "\f6c9";
@fa-var-css3: "\f13c";
@fa-var-css3-alt: "\f38b";
@fa-var-cuttlefish: "\f38c";
@fa-var-d-and-d: "\f38d";
@fa-var-d-and-d-beyond: "\f6ca";
@fa-var-dailymotion: "\e052";
@fa-var-dashcube: "\f210";
@fa-var-deezer: "\e077";
@fa-var-delicious: "\f1a5";
@fa-var-deploydog: "\f38e";
@fa-var-deskpro: "\f38f";
@fa-var-dev: "\f6cc";
@fa-var-deviantart: "\f1bd";
@fa-var-dhl: "\f790";
@fa-var-diaspora: "\f791";
@fa-var-digg: "\f1a6";
@fa-var-digital-ocean: "\f391";
@fa-var-discord: "\f392";
@fa-var-discourse: "\f393";
@fa-var-dochub: "\f394";
@fa-var-docker: "\f395";
@fa-var-draft2digital: "\f396";
@fa-var-dribbble: "\f17d";
@fa-var-dribbble-square: "\f397";
@fa-var-dropbox: "\f16b";
@fa-var-drupal: "\f1a9";
@fa-var-dyalog: "\f399";
@fa-var-earlybirds: "\f39a";
@fa-var-ebay: "\f4f4";
@fa-var-edge: "\f282";
@fa-var-edge-legacy: "\e078";
@fa-var-elementor: "\f430";
@fa-var-ello: "\f5f1";
@fa-var-ember: "\f423";
@fa-var-empire: "\f1d1";
@fa-var-envira: "\f299";
@fa-var-erlang: "\f39d";
@fa-var-ethereum: "\f42e";
@fa-var-etsy: "\f2d7";
@fa-var-evernote: "\f839";
@fa-var-expeditedssl: "\f23e";
@fa-var-facebook: "\f09a";
@fa-var-facebook-f: "\f39e";
@fa-var-facebook-messenger: "\f39f";
@fa-var-facebook-square: "\f082";
@fa-var-fantasy-flight-games: "\f6dc";
@fa-var-fedex: "\f797";
@fa-var-fedora: "\f798";
@fa-var-figma: "\f799";
@fa-var-firefox: "\f269";
@fa-var-firefox-browser: "\e007";
@fa-var-first-order: "\f2b0";
@fa-var-first-order-alt: "\f50a";
@fa-var-firstdraft: "\f3a1";
@fa-var-flickr: "\f16e";
@fa-var-flipboard: "\f44d";
@fa-var-fly: "\f417";
@fa-var-font-awesome: "\f2b4";
@fa-var-font-awesome-flag: "\f2b4";
@fa-var-font-awesome-logo-full: "\f2b4";
@fa-var-fonticons: "\f280";
@fa-var-fonticons-fi: "\f3a2";
@fa-var-fort-awesome: "\f286";
@fa-var-fort-awesome-alt: "\f3a3";
@fa-var-forumbee: "\f211";
@fa-var-foursquare: "\f180";
@fa-var-free-code-camp: "\f2c5";
@fa-var-freebsd: "\f3a4";
@fa-var-fulcrum: "\f50b";
@fa-var-galactic-republic: "\f50c";
@fa-var-galactic-senate: "\f50d";
@fa-var-get-pocket: "\f265";
@fa-var-gg: "\f260";
@fa-var-gg-circle: "\f261";
@fa-var-git: "\f1d3";
@fa-var-git-alt: "\f841";
@fa-var-git-square: "\f1d2";
@fa-var-github: "\f09b";
@fa-var-github-alt: "\f113";
@fa-var-github-square: "\f092";
@fa-var-gitkraken: "\f3a6";
@fa-var-gitlab: "\f296";
@fa-var-gitter: "\f426";
@fa-var-glide: "\f2a5";
@fa-var-glide-g: "\f2a6";
@fa-var-gofore: "\f3a7";
@fa-var-golang: "\e40f";
@fa-var-goodreads: "\f3a8";
@fa-var-goodreads-g: "\f3a9";
@fa-var-google: "\f1a0";
@fa-var-google-drive: "\f3aa";
@fa-var-google-pay: "\e079";
@fa-var-google-play: "\f3ab";
@fa-var-google-plus: "\f2b3";
@fa-var-google-plus-g: "\f0d5";
@fa-var-google-plus-square: "\f0d4";
@fa-var-google-wallet: "\f1ee";
@fa-var-gratipay: "\f184";
@fa-var-grav: "\f2d6";
@fa-var-gripfire: "\f3ac";
@fa-var-grunt: "\f3ad";
@fa-var-guilded: "\e07e";
@fa-var-gulp: "\f3ae";
@fa-var-hacker-news: "\f1d4";
@fa-var-hacker-news-square: "\f3af";
@fa-var-hackerrank: "\f5f7";
@fa-var-hashnode: "\e499";
@fa-var-hips: "\f452";
@fa-var-hire-a-helper: "\f3b0";
@fa-var-hive: "\e07f";
@fa-var-hooli: "\f427";
@fa-var-hornbill: "\f592";
@fa-var-hotjar: "\f3b1";
@fa-var-houzz: "\f27c";
@fa-var-html5: "\f13b";
@fa-var-hubspot: "\f3b2";
@fa-var-ideal: "\e013";
@fa-var-imdb: "\f2d8";
@fa-var-instagram: "\f16d";
@fa-var-instagram-square: "\e055";
@fa-var-instalod: "\e081";
@fa-var-intercom: "\f7af";
@fa-var-internet-explorer: "\f26b";
@fa-var-invision: "\f7b0";
@fa-var-ioxhost: "\f208";
@fa-var-itch-io: "\f83a";
@fa-var-itunes: "\f3b4";
@fa-var-itunes-note: "\f3b5";
@fa-var-java: "\f4e4";
@fa-var-jedi-order: "\f50e";
@fa-var-jenkins: "\f3b6";
@fa-var-jira: "\f7b1";
@fa-var-joget: "\f3b7";
@fa-var-joomla: "\f1aa";
@fa-var-js: "\f3b8";
@fa-var-js-square: "\f3b9";
@fa-var-jsfiddle: "\f1cc";
@fa-var-kaggle: "\f5fa";
@fa-var-keybase: "\f4f5";
@fa-var-keycdn: "\f3ba";
@fa-var-kickstarter: "\f3bb";
@fa-var-kickstarter-k: "\f3bc";
@fa-var-korvue: "\f42f";
@fa-var-laravel: "\f3bd";
@fa-var-lastfm: "\f202";
@fa-var-lastfm-square: "\f203";
@fa-var-leanpub: "\f212";
@fa-var-less: "\f41d";
@fa-var-line: "\f3c0";
@fa-var-linkedin: "\f08c";
@fa-var-linkedin-in: "\f0e1";
@fa-var-linode: "\f2b8";
@fa-var-linux: "\f17c";
@fa-var-lyft: "\f3c3";
@fa-var-magento: "\f3c4";
@fa-var-mailchimp: "\f59e";
@fa-var-mandalorian: "\f50f";
@fa-var-markdown: "\f60f";
@fa-var-mastodon: "\f4f6";
@fa-var-maxcdn: "\f136";
@fa-var-mdb: "\f8ca";
@fa-var-medapps: "\f3c6";
@fa-var-medium: "\f23a";
@fa-var-medium-m: "\f23a";
@fa-var-medrt: "\f3c8";
@fa-var-meetup: "\f2e0";
@fa-var-megaport: "\f5a3";
@fa-var-mendeley: "\f7b3";
@fa-var-microblog: "\e01a";
@fa-var-microsoft: "\f3ca";
@fa-var-mix: "\f3cb";
@fa-var-mixcloud: "\f289";
@fa-var-mixer: "\e056";
@fa-var-mizuni: "\f3cc";
@fa-var-modx: "\f285";
@fa-var-monero: "\f3d0";
@fa-var-napster: "\f3d2";
@fa-var-neos: "\f612";
@fa-var-nimblr: "\f5a8";
@fa-var-node: "\f419";
@fa-var-node-js: "\f3d3";
@fa-var-npm: "\f3d4";
@fa-var-ns8: "\f3d5";
@fa-var-nutritionix: "\f3d6";
@fa-var-octopus-deploy: "\e082";
@fa-var-odnoklassniki: "\f263";
@fa-var-odnoklassniki-square: "\f264";
@fa-var-old-republic: "\f510";
@fa-var-opencart: "\f23d";
@fa-var-openid: "\f19b";
@fa-var-opera: "\f26a";
@fa-var-optin-monster: "\f23c";
@fa-var-orcid: "\f8d2";
@fa-var-osi: "\f41a";
@fa-var-padlet: "\e4a0";
@fa-var-page4: "\f3d7";
@fa-var-pagelines: "\f18c";
@fa-var-palfed: "\f3d8";
@fa-var-patreon: "\f3d9";
@fa-var-paypal: "\f1ed";
@fa-var-perbyte: "\e083";
@fa-var-periscope: "\f3da";
@fa-var-phabricator: "\f3db";
@fa-var-phoenix-framework: "\f3dc";
@fa-var-phoenix-squadron: "\f511";
@fa-var-php: "\f457";
@fa-var-pied-piper: "\f2ae";
@fa-var-pied-piper-alt: "\f1a8";
@fa-var-pied-piper-hat: "\f4e5";
@fa-var-pied-piper-pp: "\f1a7";
@fa-var-pied-piper-square: "\e01e";
@fa-var-pinterest: "\f0d2";
@fa-var-pinterest-p: "\f231";
@fa-var-pinterest-square: "\f0d3";
@fa-var-pix: "\e43a";
@fa-var-playstation: "\f3df";
@fa-var-product-hunt: "\f288";
@fa-var-pushed: "\f3e1";
@fa-var-python: "\f3e2";
@fa-var-qq: "\f1d6";
@fa-var-quinscape: "\f459";
@fa-var-quora: "\f2c4";
@fa-var-r-project: "\f4f7";
@fa-var-raspberry-pi: "\f7bb";
@fa-var-ravelry: "\f2d9";
@fa-var-react: "\f41b";
@fa-var-reacteurope: "\f75d";
@fa-var-readme: "\f4d5";
@fa-var-rebel: "\f1d0";
@fa-var-red-river: "\f3e3";
@fa-var-reddit: "\f1a1";
@fa-var-reddit-alien: "\f281";
@fa-var-reddit-square: "\f1a2";
@fa-var-redhat: "\f7bc";
@fa-var-renren: "\f18b";
@fa-var-replyd: "\f3e6";
@fa-var-researchgate: "\f4f8";
@fa-var-resolving: "\f3e7";
@fa-var-rev: "\f5b2";
@fa-var-rocketchat: "\f3e8";
@fa-var-rockrms: "\f3e9";
@fa-var-rust: "\e07a";
@fa-var-safari: "\f267";
@fa-var-salesforce: "\f83b";
@fa-var-sass: "\f41e";
@fa-var-schlix: "\f3ea";
@fa-var-scribd: "\f28a";
@fa-var-searchengin: "\f3eb";
@fa-var-sellcast: "\f2da";
@fa-var-sellsy: "\f213";
@fa-var-servicestack: "\f3ec";
@fa-var-shirtsinbulk: "\f214";
@fa-var-shopify: "\e057";
@fa-var-shopware: "\f5b5";
@fa-var-simplybuilt: "\f215";
@fa-var-sistrix: "\f3ee";
@fa-var-sith: "\f512";
@fa-var-sitrox: "\e44a";
@fa-var-sketch: "\f7c6";
@fa-var-skyatlas: "\f216";
@fa-var-skype: "\f17e";
@fa-var-slack: "\f198";
@fa-var-slack-hash: "\f198";
@fa-var-slideshare: "\f1e7";
@fa-var-snapchat: "\f2ab";
@fa-var-snapchat-ghost: "\f2ab";
@fa-var-snapchat-square: "\f2ad";
@fa-var-soundcloud: "\f1be";
@fa-var-sourcetree: "\f7d3";
@fa-var-speakap: "\f3f3";
@fa-var-speaker-deck: "\f83c";
@fa-var-spotify: "\f1bc";
@fa-var-square-font-awesome: "\f425";
@fa-var-square-font-awesome-stroke: "\f35c";
@fa-var-font-awesome-alt: "\f35c";
@fa-var-squarespace: "\f5be";
@fa-var-stack-exchange: "\f18d";
@fa-var-stack-overflow: "\f16c";
@fa-var-stackpath: "\f842";
@fa-var-staylinked: "\f3f5";
@fa-var-steam: "\f1b6";
@fa-var-steam-square: "\f1b7";
@fa-var-steam-symbol: "\f3f6";
@fa-var-sticker-mule: "\f3f7";
@fa-var-strava: "\f428";
@fa-var-stripe: "\f429";
@fa-var-stripe-s: "\f42a";
@fa-var-studiovinari: "\f3f8";
@fa-var-stumbleupon: "\f1a4";
@fa-var-stumbleupon-circle: "\f1a3";
@fa-var-superpowers: "\f2dd";
@fa-var-supple: "\f3f9";
@fa-var-suse: "\f7d6";
@fa-var-swift: "\f8e1";
@fa-var-symfony: "\f83d";
@fa-var-teamspeak: "\f4f9";
@fa-var-telegram: "\f2c6";
@fa-var-telegram-plane: "\f2c6";
@fa-var-tencent-weibo: "\f1d5";
@fa-var-the-red-yeti: "\f69d";
@fa-var-themeco: "\f5c6";
@fa-var-themeisle: "\f2b2";
@fa-var-think-peaks: "\f731";
@fa-var-tiktok: "\e07b";
@fa-var-trade-federation: "\f513";
@fa-var-trello: "\f181";
@fa-var-tumblr: "\f173";
@fa-var-tumblr-square: "\f174";
@fa-var-twitch: "\f1e8";
@fa-var-twitter: "\f099";
@fa-var-twitter-square: "\f081";
@fa-var-typo3: "\f42b";
@fa-var-uber: "\f402";
@fa-var-ubuntu: "\f7df";
@fa-var-uikit: "\f403";
@fa-var-umbraco: "\f8e8";
@fa-var-uncharted: "\e084";
@fa-var-uniregistry: "\f404";
@fa-var-unity: "\e049";
@fa-var-unsplash: "\e07c";
@fa-var-untappd: "\f405";
@fa-var-ups: "\f7e0";
@fa-var-usb: "\f287";
@fa-var-usps: "\f7e1";
@fa-var-ussunnah: "\f407";
@fa-var-vaadin: "\f408";
@fa-var-viacoin: "\f237";
@fa-var-viadeo: "\f2a9";
@fa-var-viadeo-square: "\f2aa";
@fa-var-viber: "\f409";
@fa-var-vimeo: "\f40a";
@fa-var-vimeo-square: "\f194";
@fa-var-vimeo-v: "\f27d";
@fa-var-vine: "\f1ca";
@fa-var-vk: "\f189";
@fa-var-vnv: "\f40b";
@fa-var-vuejs: "\f41f";
@fa-var-watchman-monitoring: "\e087";
@fa-var-waze: "\f83f";
@fa-var-weebly: "\f5cc";
@fa-var-weibo: "\f18a";
@fa-var-weixin: "\f1d7";
@fa-var-whatsapp: "\f232";
@fa-var-whatsapp-square: "\f40c";
@fa-var-whmcs: "\f40d";
@fa-var-wikipedia-w: "\f266";
@fa-var-windows: "\f17a";
@fa-var-wirsindhandwerk: "\e2d0";
@fa-var-wsh: "\e2d0";
@fa-var-wix: "\f5cf";
@fa-var-wizards-of-the-coast: "\f730";
@fa-var-wodu: "\e088";
@fa-var-wolf-pack-battalion: "\f514";
@fa-var-wordpress: "\f19a";
@fa-var-wordpress-simple: "\f411";
@fa-var-wpbeginner: "\f297";
@fa-var-wpexplorer: "\f2de";
@fa-var-wpforms: "\f298";
@fa-var-wpressr: "\f3e4";
@fa-var-xbox: "\f412";
@fa-var-xing: "\f168";
@fa-var-xing-square: "\f169";
@fa-var-y-combinator: "\f23b";
@fa-var-yahoo: "\f19e";
@fa-var-yammer: "\f840";
@fa-var-yandex: "\f413";
@fa-var-yandex-international: "\f414";
@fa-var-yarn: "\f7e3";
@fa-var-yelp: "\f1e9";
@fa-var-yoast: "\f2b1";
@fa-var-youtube: "\f167";
@fa-var-youtube-square: "\f431";
@fa-var-zhihu: "\f63f";

.fa-icons() {
  0: @fa-var-0;
  1: @fa-var-1;
  2: @fa-var-2;
  3: @fa-var-3;
  4: @fa-var-4;
  5: @fa-var-5;
  6: @fa-var-6;
  7: @fa-var-7;
  8: @fa-var-8;
  9: @fa-var-9;
  a: @fa-var-a;
  address-book: @fa-var-address-book;
  contact-book: @fa-var-contact-book;
  address-card: @fa-var-address-card;
  contact-card: @fa-var-contact-card;
  vcard: @fa-var-vcard;
  align-center: @fa-var-align-center;
  align-justify: @fa-var-align-justify;
  align-left: @fa-var-align-left;
  align-right: @fa-var-align-right;
  anchor: @fa-var-anchor;
  angle-down: @fa-var-angle-down;
  angle-left: @fa-var-angle-left;
  angle-right: @fa-var-angle-right;
  angle-up: @fa-var-angle-up;
  angles-down: @fa-var-angles-down;
  angle-double-down: @fa-var-angle-double-down;
  angles-left: @fa-var-angles-left;
  angle-double-left: @fa-var-angle-double-left;
  angles-right: @fa-var-angles-right;
  angle-double-right: @fa-var-angle-double-right;
  angles-up: @fa-var-angles-up;
  angle-double-up: @fa-var-angle-double-up;
  ankh: @fa-var-ankh;
  apple-whole: @fa-var-apple-whole;
  apple-alt: @fa-var-apple-alt;
  archway: @fa-var-archway;
  arrow-down: @fa-var-arrow-down;
  arrow-down-1-9: @fa-var-arrow-down-1-9;
  sort-numeric-asc: @fa-var-sort-numeric-asc;
  sort-numeric-down: @fa-var-sort-numeric-down;
  arrow-down-9-1: @fa-var-arrow-down-9-1;
  sort-numeric-desc: @fa-var-sort-numeric-desc;
  sort-numeric-down-alt: @fa-var-sort-numeric-down-alt;
  arrow-down-a-z: @fa-var-arrow-down-a-z;
  sort-alpha-asc: @fa-var-sort-alpha-asc;
  sort-alpha-down: @fa-var-sort-alpha-down;
  arrow-down-long: @fa-var-arrow-down-long;
  long-arrow-down: @fa-var-long-arrow-down;
  arrow-down-short-wide: @fa-var-arrow-down-short-wide;
  sort-amount-desc: @fa-var-sort-amount-desc;
  sort-amount-down-alt: @fa-var-sort-amount-down-alt;
  arrow-down-wide-short: @fa-var-arrow-down-wide-short;
  sort-amount-asc: @fa-var-sort-amount-asc;
  sort-amount-down: @fa-var-sort-amount-down;
  arrow-down-z-a: @fa-var-arrow-down-z-a;
  sort-alpha-desc: @fa-var-sort-alpha-desc;
  sort-alpha-down-alt: @fa-var-sort-alpha-down-alt;
  arrow-left: @fa-var-arrow-left;
  arrow-left-long: @fa-var-arrow-left-long;
  long-arrow-left: @fa-var-long-arrow-left;
  arrow-pointer: @fa-var-arrow-pointer;
  mouse-pointer: @fa-var-mouse-pointer;
  arrow-right: @fa-var-arrow-right;
  arrow-right-arrow-left: @fa-var-arrow-right-arrow-left;
  exchange: @fa-var-exchange;
  arrow-right-from-bracket: @fa-var-arrow-right-from-bracket;
  sign-out: @fa-var-sign-out;
  arrow-right-long: @fa-var-arrow-right-long;
  long-arrow-right: @fa-var-long-arrow-right;
  arrow-right-to-bracket: @fa-var-arrow-right-to-bracket;
  sign-in: @fa-var-sign-in;
  arrow-rotate-left: @fa-var-arrow-rotate-left;
  arrow-left-rotate: @fa-var-arrow-left-rotate;
  arrow-rotate-back: @fa-var-arrow-rotate-back;
  arrow-rotate-backward: @fa-var-arrow-rotate-backward;
  undo: @fa-var-undo;
  arrow-rotate-right: @fa-var-arrow-rotate-right;
  arrow-right-rotate: @fa-var-arrow-right-rotate;
  arrow-rotate-forward: @fa-var-arrow-rotate-forward;
  redo: @fa-var-redo;
  arrow-trend-down: @fa-var-arrow-trend-down;
  arrow-trend-up: @fa-var-arrow-trend-up;
  arrow-turn-down: @fa-var-arrow-turn-down;
  level-down: @fa-var-level-down;
  arrow-turn-up: @fa-var-arrow-turn-up;
  level-up: @fa-var-level-up;
  arrow-up: @fa-var-arrow-up;
  arrow-up-1-9: @fa-var-arrow-up-1-9;
  sort-numeric-up: @fa-var-sort-numeric-up;
  arrow-up-9-1: @fa-var-arrow-up-9-1;
  sort-numeric-up-alt: @fa-var-sort-numeric-up-alt;
  arrow-up-a-z: @fa-var-arrow-up-a-z;
  sort-alpha-up: @fa-var-sort-alpha-up;
  arrow-up-from-bracket: @fa-var-arrow-up-from-bracket;
  arrow-up-long: @fa-var-arrow-up-long;
  long-arrow-up: @fa-var-long-arrow-up;
  arrow-up-right-from-square: @fa-var-arrow-up-right-from-square;
  external-link: @fa-var-external-link;
  arrow-up-short-wide: @fa-var-arrow-up-short-wide;
  sort-amount-up-alt: @fa-var-sort-amount-up-alt;
  arrow-up-wide-short: @fa-var-arrow-up-wide-short;
  sort-amount-up: @fa-var-sort-amount-up;
  arrow-up-z-a: @fa-var-arrow-up-z-a;
  sort-alpha-up-alt: @fa-var-sort-alpha-up-alt;
  arrows-left-right: @fa-var-arrows-left-right;
  arrows-h: @fa-var-arrows-h;
  arrows-rotate: @fa-var-arrows-rotate;
  refresh: @fa-var-refresh;
  sync: @fa-var-sync;
  arrows-up-down: @fa-var-arrows-up-down;
  arrows-v: @fa-var-arrows-v;
  arrows-up-down-left-right: @fa-var-arrows-up-down-left-right;
  arrows: @fa-var-arrows;
  asterisk: @fa-var-asterisk;
  at: @fa-var-at;
  atom: @fa-var-atom;
  audio-description: @fa-var-audio-description;
  austral-sign: @fa-var-austral-sign;
  award: @fa-var-award;
  b: @fa-var-b;
  baby: @fa-var-baby;
  baby-carriage: @fa-var-baby-carriage;
  carriage-baby: @fa-var-carriage-baby;
  backward: @fa-var-backward;
  backward-fast: @fa-var-backward-fast;
  fast-backward: @fa-var-fast-backward;
  backward-step: @fa-var-backward-step;
  step-backward: @fa-var-step-backward;
  bacon: @fa-var-bacon;
  bacteria: @fa-var-bacteria;
  bacterium: @fa-var-bacterium;
  bag-shopping: @fa-var-bag-shopping;
  shopping-bag: @fa-var-shopping-bag;
  bahai: @fa-var-bahai;
  baht-sign: @fa-var-baht-sign;
  ban: @fa-var-ban;
  cancel: @fa-var-cancel;
  ban-smoking: @fa-var-ban-smoking;
  smoking-ban: @fa-var-smoking-ban;
  bandage: @fa-var-bandage;
  band-aid: @fa-var-band-aid;
  barcode: @fa-var-barcode;
  bars: @fa-var-bars;
  navicon: @fa-var-navicon;
  bars-progress: @fa-var-bars-progress;
  tasks-alt: @fa-var-tasks-alt;
  bars-staggered: @fa-var-bars-staggered;
  reorder: @fa-var-reorder;
  stream: @fa-var-stream;
  baseball: @fa-var-baseball;
  baseball-ball: @fa-var-baseball-ball;
  baseball-bat-ball: @fa-var-baseball-bat-ball;
  basket-shopping: @fa-var-basket-shopping;
  shopping-basket: @fa-var-shopping-basket;
  basketball: @fa-var-basketball;
  basketball-ball: @fa-var-basketball-ball;
  bath: @fa-var-bath;
  bathtub: @fa-var-bathtub;
  battery-empty: @fa-var-battery-empty;
  battery-0: @fa-var-battery-0;
  battery-full: @fa-var-battery-full;
  battery: @fa-var-battery;
  battery-5: @fa-var-battery-5;
  battery-half: @fa-var-battery-half;
  battery-3: @fa-var-battery-3;
  battery-quarter: @fa-var-battery-quarter;
  battery-2: @fa-var-battery-2;
  battery-three-quarters: @fa-var-battery-three-quarters;
  battery-4: @fa-var-battery-4;
  bed: @fa-var-bed;
  bed-pulse: @fa-var-bed-pulse;
  procedures: @fa-var-procedures;
  beer-mug-empty: @fa-var-beer-mug-empty;
  beer: @fa-var-beer;
  bell: @fa-var-bell;
  bell-concierge: @fa-var-bell-concierge;
  concierge-bell: @fa-var-concierge-bell;
  bell-slash: @fa-var-bell-slash;
  bezier-curve: @fa-var-bezier-curve;
  bicycle: @fa-var-bicycle;
  binoculars: @fa-var-binoculars;
  biohazard: @fa-var-biohazard;
  bitcoin-sign: @fa-var-bitcoin-sign;
  blender: @fa-var-blender;
  blender-phone: @fa-var-blender-phone;
  blog: @fa-var-blog;
  bold: @fa-var-bold;
  bolt: @fa-var-bolt;
  zap: @fa-var-zap;
  bolt-lightning: @fa-var-bolt-lightning;
  bomb: @fa-var-bomb;
  bone: @fa-var-bone;
  bong: @fa-var-bong;
  book: @fa-var-book;
  book-atlas: @fa-var-book-atlas;
  atlas: @fa-var-atlas;
  book-bible: @fa-var-book-bible;
  bible: @fa-var-bible;
  book-journal-whills: @fa-var-book-journal-whills;
  journal-whills: @fa-var-journal-whills;
  book-medical: @fa-var-book-medical;
  book-open: @fa-var-book-open;
  book-open-reader: @fa-var-book-open-reader;
  book-reader: @fa-var-book-reader;
  book-quran: @fa-var-book-quran;
  quran: @fa-var-quran;
  book-skull: @fa-var-book-skull;
  book-dead: @fa-var-book-dead;
  bookmark: @fa-var-bookmark;
  border-all: @fa-var-border-all;
  border-none: @fa-var-border-none;
  border-top-left: @fa-var-border-top-left;
  border-style: @fa-var-border-style;
  bowling-ball: @fa-var-bowling-ball;
  box: @fa-var-box;
  box-archive: @fa-var-box-archive;
  archive: @fa-var-archive;
  box-open: @fa-var-box-open;
  box-tissue: @fa-var-box-tissue;
  boxes-stacked: @fa-var-boxes-stacked;
  boxes: @fa-var-boxes;
  boxes-alt: @fa-var-boxes-alt;
  braille: @fa-var-braille;
  brain: @fa-var-brain;
  brazilian-real-sign: @fa-var-brazilian-real-sign;
  bread-slice: @fa-var-bread-slice;
  briefcase: @fa-var-briefcase;
  briefcase-medical: @fa-var-briefcase-medical;
  broom: @fa-var-broom;
  broom-ball: @fa-var-broom-ball;
  quidditch: @fa-var-quidditch;
  quidditch-broom-ball: @fa-var-quidditch-broom-ball;
  brush: @fa-var-brush;
  bug: @fa-var-bug;
  bug-slash: @fa-var-bug-slash;
  building: @fa-var-building;
  building-columns: @fa-var-building-columns;
  bank: @fa-var-bank;
  institution: @fa-var-institution;
  museum: @fa-var-museum;
  university: @fa-var-university;
  bullhorn: @fa-var-bullhorn;
  bullseye: @fa-var-bullseye;
  burger: @fa-var-burger;
  hamburger: @fa-var-hamburger;
  bus: @fa-var-bus;
  bus-simple: @fa-var-bus-simple;
  bus-alt: @fa-var-bus-alt;
  business-time: @fa-var-business-time;
  briefcase-clock: @fa-var-briefcase-clock;
  c: @fa-var-c;
  cake-candles: @fa-var-cake-candles;
  birthday-cake: @fa-var-birthday-cake;
  cake: @fa-var-cake;
  calculator: @fa-var-calculator;
  calendar: @fa-var-calendar;
  calendar-check: @fa-var-calendar-check;
  calendar-day: @fa-var-calendar-day;
  calendar-days: @fa-var-calendar-days;
  calendar-alt: @fa-var-calendar-alt;
  calendar-minus: @fa-var-calendar-minus;
  calendar-plus: @fa-var-calendar-plus;
  calendar-week: @fa-var-calendar-week;
  calendar-xmark: @fa-var-calendar-xmark;
  calendar-times: @fa-var-calendar-times;
  camera: @fa-var-camera;
  camera-alt: @fa-var-camera-alt;
  camera-retro: @fa-var-camera-retro;
  camera-rotate: @fa-var-camera-rotate;
  campground: @fa-var-campground;
  candy-cane: @fa-var-candy-cane;
  cannabis: @fa-var-cannabis;
  capsules: @fa-var-capsules;
  car: @fa-var-car;
  automobile: @fa-var-automobile;
  car-battery: @fa-var-car-battery;
  battery-car: @fa-var-battery-car;
  car-crash: @fa-var-car-crash;
  car-rear: @fa-var-car-rear;
  car-alt: @fa-var-car-alt;
  car-side: @fa-var-car-side;
  caravan: @fa-var-caravan;
  caret-down: @fa-var-caret-down;
  caret-left: @fa-var-caret-left;
  caret-right: @fa-var-caret-right;
  caret-up: @fa-var-caret-up;
  carrot: @fa-var-carrot;
  cart-arrow-down: @fa-var-cart-arrow-down;
  cart-flatbed: @fa-var-cart-flatbed;
  dolly-flatbed: @fa-var-dolly-flatbed;
  cart-flatbed-suitcase: @fa-var-cart-flatbed-suitcase;
  luggage-cart: @fa-var-luggage-cart;
  cart-plus: @fa-var-cart-plus;
  cart-shopping: @fa-var-cart-shopping;
  shopping-cart: @fa-var-shopping-cart;
  cash-register: @fa-var-cash-register;
  cat: @fa-var-cat;
  cedi-sign: @fa-var-cedi-sign;
  cent-sign: @fa-var-cent-sign;
  certificate: @fa-var-certificate;
  chair: @fa-var-chair;
  chalkboard: @fa-var-chalkboard;
  blackboard: @fa-var-blackboard;
  chalkboard-user: @fa-var-chalkboard-user;
  chalkboard-teacher: @fa-var-chalkboard-teacher;
  champagne-glasses: @fa-var-champagne-glasses;
  glass-cheers: @fa-var-glass-cheers;
  charging-station: @fa-var-charging-station;
  chart-area: @fa-var-chart-area;
  area-chart: @fa-var-area-chart;
  chart-bar: @fa-var-chart-bar;
  bar-chart: @fa-var-bar-chart;
  chart-column: @fa-var-chart-column;
  chart-gantt: @fa-var-chart-gantt;
  chart-line: @fa-var-chart-line;
  line-chart: @fa-var-line-chart;
  chart-pie: @fa-var-chart-pie;
  pie-chart: @fa-var-pie-chart;
  check: @fa-var-check;
  check-double: @fa-var-check-double;
  check-to-slot: @fa-var-check-to-slot;
  vote-yea: @fa-var-vote-yea;
  cheese: @fa-var-cheese;
  chess: @fa-var-chess;
  chess-bishop: @fa-var-chess-bishop;
  chess-board: @fa-var-chess-board;
  chess-king: @fa-var-chess-king;
  chess-knight: @fa-var-chess-knight;
  chess-pawn: @fa-var-chess-pawn;
  chess-queen: @fa-var-chess-queen;
  chess-rook: @fa-var-chess-rook;
  chevron-down: @fa-var-chevron-down;
  chevron-left: @fa-var-chevron-left;
  chevron-right: @fa-var-chevron-right;
  chevron-up: @fa-var-chevron-up;
  child: @fa-var-child;
  church: @fa-var-church;
  circle: @fa-var-circle;
  circle-arrow-down: @fa-var-circle-arrow-down;
  arrow-circle-down: @fa-var-arrow-circle-down;
  circle-arrow-left: @fa-var-circle-arrow-left;
  arrow-circle-left: @fa-var-arrow-circle-left;
  circle-arrow-right: @fa-var-circle-arrow-right;
  arrow-circle-right: @fa-var-arrow-circle-right;
  circle-arrow-up: @fa-var-circle-arrow-up;
  arrow-circle-up: @fa-var-arrow-circle-up;
  circle-check: @fa-var-circle-check;
  check-circle: @fa-var-check-circle;
  circle-chevron-down: @fa-var-circle-chevron-down;
  chevron-circle-down: @fa-var-chevron-circle-down;
  circle-chevron-left: @fa-var-circle-chevron-left;
  chevron-circle-left: @fa-var-chevron-circle-left;
  circle-chevron-right: @fa-var-circle-chevron-right;
  chevron-circle-right: @fa-var-chevron-circle-right;
  circle-chevron-up: @fa-var-circle-chevron-up;
  chevron-circle-up: @fa-var-chevron-circle-up;
  circle-dollar-to-slot: @fa-var-circle-dollar-to-slot;
  donate: @fa-var-donate;
  circle-dot: @fa-var-circle-dot;
  dot-circle: @fa-var-dot-circle;
  circle-down: @fa-var-circle-down;
  arrow-alt-circle-down: @fa-var-arrow-alt-circle-down;
  circle-exclamation: @fa-var-circle-exclamation;
  exclamation-circle: @fa-var-exclamation-circle;
  circle-h: @fa-var-circle-h;
  hospital-symbol: @fa-var-hospital-symbol;
  circle-half-stroke: @fa-var-circle-half-stroke;
  adjust: @fa-var-adjust;
  circle-info: @fa-var-circle-info;
  info-circle: @fa-var-info-circle;
  circle-left: @fa-var-circle-left;
  arrow-alt-circle-left: @fa-var-arrow-alt-circle-left;
  circle-minus: @fa-var-circle-minus;
  minus-circle: @fa-var-minus-circle;
  circle-notch: @fa-var-circle-notch;
  circle-pause: @fa-var-circle-pause;
  pause-circle: @fa-var-pause-circle;
  circle-play: @fa-var-circle-play;
  play-circle: @fa-var-play-circle;
  circle-plus: @fa-var-circle-plus;
  plus-circle: @fa-var-plus-circle;
  circle-question: @fa-var-circle-question;
  question-circle: @fa-var-question-circle;
  circle-radiation: @fa-var-circle-radiation;
  radiation-alt: @fa-var-radiation-alt;
  circle-right: @fa-var-circle-right;
  arrow-alt-circle-right: @fa-var-arrow-alt-circle-right;
  circle-stop: @fa-var-circle-stop;
  stop-circle: @fa-var-stop-circle;
  circle-up: @fa-var-circle-up;
  arrow-alt-circle-up: @fa-var-arrow-alt-circle-up;
  circle-user: @fa-var-circle-user;
  user-circle: @fa-var-user-circle;
  circle-xmark: @fa-var-circle-xmark;
  times-circle: @fa-var-times-circle;
  xmark-circle: @fa-var-xmark-circle;
  city: @fa-var-city;
  clapperboard: @fa-var-clapperboard;
  clipboard: @fa-var-clipboard;
  clipboard-check: @fa-var-clipboard-check;
  clipboard-list: @fa-var-clipboard-list;
  clock: @fa-var-clock;
  clock-four: @fa-var-clock-four;
  clock-rotate-left: @fa-var-clock-rotate-left;
  history: @fa-var-history;
  clone: @fa-var-clone;
  closed-captioning: @fa-var-closed-captioning;
  cloud: @fa-var-cloud;
  cloud-arrow-down: @fa-var-cloud-arrow-down;
  cloud-download: @fa-var-cloud-download;
  cloud-download-alt: @fa-var-cloud-download-alt;
  cloud-arrow-up: @fa-var-cloud-arrow-up;
  cloud-upload: @fa-var-cloud-upload;
  cloud-upload-alt: @fa-var-cloud-upload-alt;
  cloud-meatball: @fa-var-cloud-meatball;
  cloud-moon: @fa-var-cloud-moon;
  cloud-moon-rain: @fa-var-cloud-moon-rain;
  cloud-rain: @fa-var-cloud-rain;
  cloud-showers-heavy: @fa-var-cloud-showers-heavy;
  cloud-sun: @fa-var-cloud-sun;
  cloud-sun-rain: @fa-var-cloud-sun-rain;
  clover: @fa-var-clover;
  code: @fa-var-code;
  code-branch: @fa-var-code-branch;
  code-commit: @fa-var-code-commit;
  code-compare: @fa-var-code-compare;
  code-fork: @fa-var-code-fork;
  code-merge: @fa-var-code-merge;
  code-pull-request: @fa-var-code-pull-request;
  coins: @fa-var-coins;
  colon-sign: @fa-var-colon-sign;
  comment: @fa-var-comment;
  comment-dollar: @fa-var-comment-dollar;
  comment-dots: @fa-var-comment-dots;
  commenting: @fa-var-commenting;
  comment-medical: @fa-var-comment-medical;
  comment-slash: @fa-var-comment-slash;
  comment-sms: @fa-var-comment-sms;
  sms: @fa-var-sms;
  comments: @fa-var-comments;
  comments-dollar: @fa-var-comments-dollar;
  compact-disc: @fa-var-compact-disc;
  compass: @fa-var-compass;
  compass-drafting: @fa-var-compass-drafting;
  drafting-compass: @fa-var-drafting-compass;
  compress: @fa-var-compress;
  computer-mouse: @fa-var-computer-mouse;
  mouse: @fa-var-mouse;
  cookie: @fa-var-cookie;
  cookie-bite: @fa-var-cookie-bite;
  copy: @fa-var-copy;
  copyright: @fa-var-copyright;
  couch: @fa-var-couch;
  credit-card: @fa-var-credit-card;
  credit-card-alt: @fa-var-credit-card-alt;
  crop: @fa-var-crop;
  crop-simple: @fa-var-crop-simple;
  crop-alt: @fa-var-crop-alt;
  cross: @fa-var-cross;
  crosshairs: @fa-var-crosshairs;
  crow: @fa-var-crow;
  crown: @fa-var-crown;
  crutch: @fa-var-crutch;
  cruzeiro-sign: @fa-var-cruzeiro-sign;
  cube: @fa-var-cube;
  cubes: @fa-var-cubes;
  d: @fa-var-d;
  database: @fa-var-database;
  delete-left: @fa-var-delete-left;
  backspace: @fa-var-backspace;
  democrat: @fa-var-democrat;
  desktop: @fa-var-desktop;
  desktop-alt: @fa-var-desktop-alt;
  dharmachakra: @fa-var-dharmachakra;
  diagram-next: @fa-var-diagram-next;
  diagram-predecessor: @fa-var-diagram-predecessor;
  diagram-project: @fa-var-diagram-project;
  project-diagram: @fa-var-project-diagram;
  diagram-successor: @fa-var-diagram-successor;
  diamond: @fa-var-diamond;
  diamond-turn-right: @fa-var-diamond-turn-right;
  directions: @fa-var-directions;
  dice: @fa-var-dice;
  dice-d20: @fa-var-dice-d20;
  dice-d6: @fa-var-dice-d6;
  dice-five: @fa-var-dice-five;
  dice-four: @fa-var-dice-four;
  dice-one: @fa-var-dice-one;
  dice-six: @fa-var-dice-six;
  dice-three: @fa-var-dice-three;
  dice-two: @fa-var-dice-two;
  disease: @fa-var-disease;
  divide: @fa-var-divide;
  dna: @fa-var-dna;
  dog: @fa-var-dog;
  dollar-sign: @fa-var-dollar-sign;
  dollar: @fa-var-dollar;
  usd: @fa-var-usd;
  dolly: @fa-var-dolly;
  dolly-box: @fa-var-dolly-box;
  dong-sign: @fa-var-dong-sign;
  door-closed: @fa-var-door-closed;
  door-open: @fa-var-door-open;
  dove: @fa-var-dove;
  down-left-and-up-right-to-center: @fa-var-down-left-and-up-right-to-center;
  compress-alt: @fa-var-compress-alt;
  down-long: @fa-var-down-long;
  long-arrow-alt-down: @fa-var-long-arrow-alt-down;
  download: @fa-var-download;
  dragon: @fa-var-dragon;
  draw-polygon: @fa-var-draw-polygon;
  droplet: @fa-var-droplet;
  tint: @fa-var-tint;
  droplet-slash: @fa-var-droplet-slash;
  tint-slash: @fa-var-tint-slash;
  drum: @fa-var-drum;
  drum-steelpan: @fa-var-drum-steelpan;
  drumstick-bite: @fa-var-drumstick-bite;
  dumbbell: @fa-var-dumbbell;
  dumpster: @fa-var-dumpster;
  dumpster-fire: @fa-var-dumpster-fire;
  dungeon: @fa-var-dungeon;
  e: @fa-var-e;
  ear-deaf: @fa-var-ear-deaf;
  deaf: @fa-var-deaf;
  deafness: @fa-var-deafness;
  hard-of-hearing: @fa-var-hard-of-hearing;
  ear-listen: @fa-var-ear-listen;
  assistive-listening-systems: @fa-var-assistive-listening-systems;
  earth-africa: @fa-var-earth-africa;
  globe-africa: @fa-var-globe-africa;
  earth-americas: @fa-var-earth-americas;
  earth: @fa-var-earth;
  earth-america: @fa-var-earth-america;
  globe-americas: @fa-var-globe-americas;
  earth-asia: @fa-var-earth-asia;
  globe-asia: @fa-var-globe-asia;
  earth-europe: @fa-var-earth-europe;
  globe-europe: @fa-var-globe-europe;
  earth-oceania: @fa-var-earth-oceania;
  globe-oceania: @fa-var-globe-oceania;
  egg: @fa-var-egg;
  eject: @fa-var-eject;
  elevator: @fa-var-elevator;
  ellipsis: @fa-var-ellipsis;
  ellipsis-h: @fa-var-ellipsis-h;
  ellipsis-vertical: @fa-var-ellipsis-vertical;
  ellipsis-v: @fa-var-ellipsis-v;
  envelope: @fa-var-envelope;
  envelope-open: @fa-var-envelope-open;
  envelope-open-text: @fa-var-envelope-open-text;
  envelopes-bulk: @fa-var-envelopes-bulk;
  mail-bulk: @fa-var-mail-bulk;
  equals: @fa-var-equals;
  eraser: @fa-var-eraser;
  ethernet: @fa-var-ethernet;
  euro-sign: @fa-var-euro-sign;
  eur: @fa-var-eur;
  euro: @fa-var-euro;
  exclamation: @fa-var-exclamation;
  expand: @fa-var-expand;
  eye: @fa-var-eye;
  eye-dropper: @fa-var-eye-dropper;
  eye-dropper-empty: @fa-var-eye-dropper-empty;
  eyedropper: @fa-var-eyedropper;
  eye-low-vision: @fa-var-eye-low-vision;
  low-vision: @fa-var-low-vision;
  eye-slash: @fa-var-eye-slash;
  f: @fa-var-f;
  face-angry: @fa-var-face-angry;
  angry: @fa-var-angry;
  face-dizzy: @fa-var-face-dizzy;
  dizzy: @fa-var-dizzy;
  face-flushed: @fa-var-face-flushed;
  flushed: @fa-var-flushed;
  face-frown: @fa-var-face-frown;
  frown: @fa-var-frown;
  face-frown-open: @fa-var-face-frown-open;
  frown-open: @fa-var-frown-open;
  face-grimace: @fa-var-face-grimace;
  grimace: @fa-var-grimace;
  face-grin: @fa-var-face-grin;
  grin: @fa-var-grin;
  face-grin-beam: @fa-var-face-grin-beam;
  grin-beam: @fa-var-grin-beam;
  face-grin-beam-sweat: @fa-var-face-grin-beam-sweat;
  grin-beam-sweat: @fa-var-grin-beam-sweat;
  face-grin-hearts: @fa-var-face-grin-hearts;
  grin-hearts: @fa-var-grin-hearts;
  face-grin-squint: @fa-var-face-grin-squint;
  grin-squint: @fa-var-grin-squint;
  face-grin-squint-tears: @fa-var-face-grin-squint-tears;
  grin-squint-tears: @fa-var-grin-squint-tears;
  face-grin-stars: @fa-var-face-grin-stars;
  grin-stars: @fa-var-grin-stars;
  face-grin-tears: @fa-var-face-grin-tears;
  grin-tears: @fa-var-grin-tears;
  face-grin-tongue: @fa-var-face-grin-tongue;
  grin-tongue: @fa-var-grin-tongue;
  face-grin-tongue-squint: @fa-var-face-grin-tongue-squint;
  grin-tongue-squint: @fa-var-grin-tongue-squint;
  face-grin-tongue-wink: @fa-var-face-grin-tongue-wink;
  grin-tongue-wink: @fa-var-grin-tongue-wink;
  face-grin-wide: @fa-var-face-grin-wide;
  grin-alt: @fa-var-grin-alt;
  face-grin-wink: @fa-var-face-grin-wink;
  grin-wink: @fa-var-grin-wink;
  face-kiss: @fa-var-face-kiss;
  kiss: @fa-var-kiss;
  face-kiss-beam: @fa-var-face-kiss-beam;
  kiss-beam: @fa-var-kiss-beam;
  face-kiss-wink-heart: @fa-var-face-kiss-wink-heart;
  kiss-wink-heart: @fa-var-kiss-wink-heart;
  face-laugh: @fa-var-face-laugh;
  laugh: @fa-var-laugh;
  face-laugh-beam: @fa-var-face-laugh-beam;
  laugh-beam: @fa-var-laugh-beam;
  face-laugh-squint: @fa-var-face-laugh-squint;
  laugh-squint: @fa-var-laugh-squint;
  face-laugh-wink: @fa-var-face-laugh-wink;
  laugh-wink: @fa-var-laugh-wink;
  face-meh: @fa-var-face-meh;
  meh: @fa-var-meh;
  face-meh-blank: @fa-var-face-meh-blank;
  meh-blank: @fa-var-meh-blank;
  face-rolling-eyes: @fa-var-face-rolling-eyes;
  meh-rolling-eyes: @fa-var-meh-rolling-eyes;
  face-sad-cry: @fa-var-face-sad-cry;
  sad-cry: @fa-var-sad-cry;
  face-sad-tear: @fa-var-face-sad-tear;
  sad-tear: @fa-var-sad-tear;
  face-smile: @fa-var-face-smile;
  smile: @fa-var-smile;
  face-smile-beam: @fa-var-face-smile-beam;
  smile-beam: @fa-var-smile-beam;
  face-smile-wink: @fa-var-face-smile-wink;
  smile-wink: @fa-var-smile-wink;
  face-surprise: @fa-var-face-surprise;
  surprise: @fa-var-surprise;
  face-tired: @fa-var-face-tired;
  tired: @fa-var-tired;
  fan: @fa-var-fan;
  faucet: @fa-var-faucet;
  fax: @fa-var-fax;
  feather: @fa-var-feather;
  feather-pointed: @fa-var-feather-pointed;
  feather-alt: @fa-var-feather-alt;
  file: @fa-var-file;
  file-arrow-down: @fa-var-file-arrow-down;
  file-download: @fa-var-file-download;
  file-arrow-up: @fa-var-file-arrow-up;
  file-upload: @fa-var-file-upload;
  file-audio: @fa-var-file-audio;
  file-code: @fa-var-file-code;
  file-contract: @fa-var-file-contract;
  file-csv: @fa-var-file-csv;
  file-excel: @fa-var-file-excel;
  file-export: @fa-var-file-export;
  arrow-right-from-file: @fa-var-arrow-right-from-file;
  file-image: @fa-var-file-image;
  file-import: @fa-var-file-import;
  arrow-right-to-file: @fa-var-arrow-right-to-file;
  file-invoice: @fa-var-file-invoice;
  file-invoice-dollar: @fa-var-file-invoice-dollar;
  file-lines: @fa-var-file-lines;
  file-alt: @fa-var-file-alt;
  file-text: @fa-var-file-text;
  file-medical: @fa-var-file-medical;
  file-pdf: @fa-var-file-pdf;
  file-powerpoint: @fa-var-file-powerpoint;
  file-prescription: @fa-var-file-prescription;
  file-signature: @fa-var-file-signature;
  file-video: @fa-var-file-video;
  file-waveform: @fa-var-file-waveform;
  file-medical-alt: @fa-var-file-medical-alt;
  file-word: @fa-var-file-word;
  file-zipper: @fa-var-file-zipper;
  file-archive: @fa-var-file-archive;
  fill: @fa-var-fill;
  fill-drip: @fa-var-fill-drip;
  film: @fa-var-film;
  filter: @fa-var-filter;
  filter-circle-dollar: @fa-var-filter-circle-dollar;
  funnel-dollar: @fa-var-funnel-dollar;
  filter-circle-xmark: @fa-var-filter-circle-xmark;
  fingerprint: @fa-var-fingerprint;
  fire: @fa-var-fire;
  fire-extinguisher: @fa-var-fire-extinguisher;
  fire-flame-curved: @fa-var-fire-flame-curved;
  fire-alt: @fa-var-fire-alt;
  fire-flame-simple: @fa-var-fire-flame-simple;
  burn: @fa-var-burn;
  fish: @fa-var-fish;
  flag: @fa-var-flag;
  flag-checkered: @fa-var-flag-checkered;
  flag-usa: @fa-var-flag-usa;
  flask: @fa-var-flask;
  floppy-disk: @fa-var-floppy-disk;
  save: @fa-var-save;
  florin-sign: @fa-var-florin-sign;
  folder: @fa-var-folder;
  folder-minus: @fa-var-folder-minus;
  folder-open: @fa-var-folder-open;
  folder-plus: @fa-var-folder-plus;
  folder-tree: @fa-var-folder-tree;
  font: @fa-var-font;
  football: @fa-var-football;
  football-ball: @fa-var-football-ball;
  forward: @fa-var-forward;
  forward-fast: @fa-var-forward-fast;
  fast-forward: @fa-var-fast-forward;
  forward-step: @fa-var-forward-step;
  step-forward: @fa-var-step-forward;
  franc-sign: @fa-var-franc-sign;
  frog: @fa-var-frog;
  futbol: @fa-var-futbol;
  futbol-ball: @fa-var-futbol-ball;
  soccer-ball: @fa-var-soccer-ball;
  g: @fa-var-g;
  gamepad: @fa-var-gamepad;
  gas-pump: @fa-var-gas-pump;
  gauge: @fa-var-gauge;
  dashboard: @fa-var-dashboard;
  gauge-med: @fa-var-gauge-med;
  tachometer-alt-average: @fa-var-tachometer-alt-average;
  gauge-high: @fa-var-gauge-high;
  tachometer-alt: @fa-var-tachometer-alt;
  tachometer-alt-fast: @fa-var-tachometer-alt-fast;
  gauge-simple: @fa-var-gauge-simple;
  gauge-simple-med: @fa-var-gauge-simple-med;
  tachometer-average: @fa-var-tachometer-average;
  gauge-simple-high: @fa-var-gauge-simple-high;
  tachometer: @fa-var-tachometer;
  tachometer-fast: @fa-var-tachometer-fast;
  gavel: @fa-var-gavel;
  legal: @fa-var-legal;
  gear: @fa-var-gear;
  cog: @fa-var-cog;
  gears: @fa-var-gears;
  cogs: @fa-var-cogs;
  gem: @fa-var-gem;
  genderless: @fa-var-genderless;
  ghost: @fa-var-ghost;
  gift: @fa-var-gift;
  gifts: @fa-var-gifts;
  glasses: @fa-var-glasses;
  globe: @fa-var-globe;
  golf-ball-tee: @fa-var-golf-ball-tee;
  golf-ball: @fa-var-golf-ball;
  gopuram: @fa-var-gopuram;
  graduation-cap: @fa-var-graduation-cap;
  mortar-board: @fa-var-mortar-board;
  greater-than: @fa-var-greater-than;
  greater-than-equal: @fa-var-greater-than-equal;
  grip: @fa-var-grip;
  grip-horizontal: @fa-var-grip-horizontal;
  grip-lines: @fa-var-grip-lines;
  grip-lines-vertical: @fa-var-grip-lines-vertical;
  grip-vertical: @fa-var-grip-vertical;
  guarani-sign: @fa-var-guarani-sign;
  guitar: @fa-var-guitar;
  gun: @fa-var-gun;
  h: @fa-var-h;
  hammer: @fa-var-hammer;
  hamsa: @fa-var-hamsa;
  hand: @fa-var-hand;
  hand-paper: @fa-var-hand-paper;
  hand-back-fist: @fa-var-hand-back-fist;
  hand-rock: @fa-var-hand-rock;
  hand-dots: @fa-var-hand-dots;
  allergies: @fa-var-allergies;
  hand-fist: @fa-var-hand-fist;
  fist-raised: @fa-var-fist-raised;
  hand-holding: @fa-var-hand-holding;
  hand-holding-dollar: @fa-var-hand-holding-dollar;
  hand-holding-usd: @fa-var-hand-holding-usd;
  hand-holding-droplet: @fa-var-hand-holding-droplet;
  hand-holding-water: @fa-var-hand-holding-water;
  hand-holding-heart: @fa-var-hand-holding-heart;
  hand-holding-medical: @fa-var-hand-holding-medical;
  hand-lizard: @fa-var-hand-lizard;
  hand-middle-finger: @fa-var-hand-middle-finger;
  hand-peace: @fa-var-hand-peace;
  hand-point-down: @fa-var-hand-point-down;
  hand-point-left: @fa-var-hand-point-left;
  hand-point-right: @fa-var-hand-point-right;
  hand-point-up: @fa-var-hand-point-up;
  hand-pointer: @fa-var-hand-pointer;
  hand-scissors: @fa-var-hand-scissors;
  hand-sparkles: @fa-var-hand-sparkles;
  hand-spock: @fa-var-hand-spock;
  hands: @fa-var-hands;
  sign-language: @fa-var-sign-language;
  signing: @fa-var-signing;
  hands-asl-interpreting: @fa-var-hands-asl-interpreting;
  american-sign-language-interpreting: @fa-var-american-sign-language-interpreting;
  asl-interpreting: @fa-var-asl-interpreting;
  hands-american-sign-language-interpreting: @fa-var-hands-american-sign-language-interpreting;
  hands-bubbles: @fa-var-hands-bubbles;
  hands-wash: @fa-var-hands-wash;
  hands-clapping: @fa-var-hands-clapping;
  hands-holding: @fa-var-hands-holding;
  hands-praying: @fa-var-hands-praying;
  praying-hands: @fa-var-praying-hands;
  handshake: @fa-var-handshake;
  handshake-angle: @fa-var-handshake-angle;
  hands-helping: @fa-var-hands-helping;
  handshake-simple-slash: @fa-var-handshake-simple-slash;
  handshake-alt-slash: @fa-var-handshake-alt-slash;
  handshake-slash: @fa-var-handshake-slash;
  hanukiah: @fa-var-hanukiah;
  hard-drive: @fa-var-hard-drive;
  hdd: @fa-var-hdd;
  hashtag: @fa-var-hashtag;
  hat-cowboy: @fa-var-hat-cowboy;
  hat-cowboy-side: @fa-var-hat-cowboy-side;
  hat-wizard: @fa-var-hat-wizard;
  head-side-cough: @fa-var-head-side-cough;
  head-side-cough-slash: @fa-var-head-side-cough-slash;
  head-side-mask: @fa-var-head-side-mask;
  head-side-virus: @fa-var-head-side-virus;
  heading: @fa-var-heading;
  header: @fa-var-header;
  headphones: @fa-var-headphones;
  headphones-simple: @fa-var-headphones-simple;
  headphones-alt: @fa-var-headphones-alt;
  headset: @fa-var-headset;
  heart: @fa-var-heart;
  heart-crack: @fa-var-heart-crack;
  heart-broken: @fa-var-heart-broken;
  heart-pulse: @fa-var-heart-pulse;
  heartbeat: @fa-var-heartbeat;
  helicopter: @fa-var-helicopter;
  helmet-safety: @fa-var-helmet-safety;
  hard-hat: @fa-var-hard-hat;
  hat-hard: @fa-var-hat-hard;
  highlighter: @fa-var-highlighter;
  hippo: @fa-var-hippo;
  hockey-puck: @fa-var-hockey-puck;
  holly-berry: @fa-var-holly-berry;
  horse: @fa-var-horse;
  horse-head: @fa-var-horse-head;
  hospital: @fa-var-hospital;
  hospital-alt: @fa-var-hospital-alt;
  hospital-wide: @fa-var-hospital-wide;
  hospital-user: @fa-var-hospital-user;
  hot-tub-person: @fa-var-hot-tub-person;
  hot-tub: @fa-var-hot-tub;
  hotdog: @fa-var-hotdog;
  hotel: @fa-var-hotel;
  hourglass: @fa-var-hourglass;
  hourglass-2: @fa-var-hourglass-2;
  hourglass-half: @fa-var-hourglass-half;
  hourglass-empty: @fa-var-hourglass-empty;
  hourglass-end: @fa-var-hourglass-end;
  hourglass-3: @fa-var-hourglass-3;
  hourglass-start: @fa-var-hourglass-start;
  hourglass-1: @fa-var-hourglass-1;
  house: @fa-var-house;
  home: @fa-var-home;
  home-alt: @fa-var-home-alt;
  home-lg-alt: @fa-var-home-lg-alt;
  house-chimney: @fa-var-house-chimney;
  home-lg: @fa-var-home-lg;
  house-chimney-crack: @fa-var-house-chimney-crack;
  house-damage: @fa-var-house-damage;
  house-chimney-medical: @fa-var-house-chimney-medical;
  clinic-medical: @fa-var-clinic-medical;
  house-chimney-user: @fa-var-house-chimney-user;
  house-chimney-window: @fa-var-house-chimney-window;
  house-crack: @fa-var-house-crack;
  house-laptop: @fa-var-house-laptop;
  laptop-house: @fa-var-laptop-house;
  house-medical: @fa-var-house-medical;
  house-user: @fa-var-house-user;
  home-user: @fa-var-home-user;
  hryvnia-sign: @fa-var-hryvnia-sign;
  hryvnia: @fa-var-hryvnia;
  i: @fa-var-i;
  i-cursor: @fa-var-i-cursor;
  ice-cream: @fa-var-ice-cream;
  icicles: @fa-var-icicles;
  icons: @fa-var-icons;
  heart-music-camera-bolt: @fa-var-heart-music-camera-bolt;
  id-badge: @fa-var-id-badge;
  id-card: @fa-var-id-card;
  drivers-license: @fa-var-drivers-license;
  id-card-clip: @fa-var-id-card-clip;
  id-card-alt: @fa-var-id-card-alt;
  igloo: @fa-var-igloo;
  image: @fa-var-image;
  image-portrait: @fa-var-image-portrait;
  portrait: @fa-var-portrait;
  images: @fa-var-images;
  inbox: @fa-var-inbox;
  indent: @fa-var-indent;
  indian-rupee-sign: @fa-var-indian-rupee-sign;
  indian-rupee: @fa-var-indian-rupee;
  inr: @fa-var-inr;
  industry: @fa-var-industry;
  infinity: @fa-var-infinity;
  info: @fa-var-info;
  italic: @fa-var-italic;
  j: @fa-var-j;
  jedi: @fa-var-jedi;
  jet-fighter: @fa-var-jet-fighter;
  fighter-jet: @fa-var-fighter-jet;
  joint: @fa-var-joint;
  k: @fa-var-k;
  kaaba: @fa-var-kaaba;
  key: @fa-var-key;
  keyboard: @fa-var-keyboard;
  khanda: @fa-var-khanda;
  kip-sign: @fa-var-kip-sign;
  kit-medical: @fa-var-kit-medical;
  first-aid: @fa-var-first-aid;
  kiwi-bird: @fa-var-kiwi-bird;
  l: @fa-var-l;
  landmark: @fa-var-landmark;
  language: @fa-var-language;
  laptop: @fa-var-laptop;
  laptop-code: @fa-var-laptop-code;
  laptop-medical: @fa-var-laptop-medical;
  lari-sign: @fa-var-lari-sign;
  layer-group: @fa-var-layer-group;
  leaf: @fa-var-leaf;
  left-long: @fa-var-left-long;
  long-arrow-alt-left: @fa-var-long-arrow-alt-left;
  left-right: @fa-var-left-right;
  arrows-alt-h: @fa-var-arrows-alt-h;
  lemon: @fa-var-lemon;
  less-than: @fa-var-less-than;
  less-than-equal: @fa-var-less-than-equal;
  life-ring: @fa-var-life-ring;
  lightbulb: @fa-var-lightbulb;
  link: @fa-var-link;
  chain: @fa-var-chain;
  link-slash: @fa-var-link-slash;
  chain-broken: @fa-var-chain-broken;
  chain-slash: @fa-var-chain-slash;
  unlink: @fa-var-unlink;
  lira-sign: @fa-var-lira-sign;
  list: @fa-var-list;
  list-squares: @fa-var-list-squares;
  list-check: @fa-var-list-check;
  tasks: @fa-var-tasks;
  list-ol: @fa-var-list-ol;
  list-1-2: @fa-var-list-1-2;
  list-numeric: @fa-var-list-numeric;
  list-ul: @fa-var-list-ul;
  list-dots: @fa-var-list-dots;
  litecoin-sign: @fa-var-litecoin-sign;
  location-arrow: @fa-var-location-arrow;
  location-crosshairs: @fa-var-location-crosshairs;
  location: @fa-var-location;
  location-dot: @fa-var-location-dot;
  map-marker-alt: @fa-var-map-marker-alt;
  location-pin: @fa-var-location-pin;
  map-marker: @fa-var-map-marker;
  lock: @fa-var-lock;
  lock-open: @fa-var-lock-open;
  lungs: @fa-var-lungs;
  lungs-virus: @fa-var-lungs-virus;
  m: @fa-var-m;
  magnet: @fa-var-magnet;
  magnifying-glass: @fa-var-magnifying-glass;
  search: @fa-var-search;
  magnifying-glass-dollar: @fa-var-magnifying-glass-dollar;
  search-dollar: @fa-var-search-dollar;
  magnifying-glass-location: @fa-var-magnifying-glass-location;
  search-location: @fa-var-search-location;
  magnifying-glass-minus: @fa-var-magnifying-glass-minus;
  search-minus: @fa-var-search-minus;
  magnifying-glass-plus: @fa-var-magnifying-glass-plus;
  search-plus: @fa-var-search-plus;
  manat-sign: @fa-var-manat-sign;
  map: @fa-var-map;
  map-location: @fa-var-map-location;
  map-marked: @fa-var-map-marked;
  map-location-dot: @fa-var-map-location-dot;
  map-marked-alt: @fa-var-map-marked-alt;
  map-pin: @fa-var-map-pin;
  marker: @fa-var-marker;
  mars: @fa-var-mars;
  mars-and-venus: @fa-var-mars-and-venus;
  mars-double: @fa-var-mars-double;
  mars-stroke: @fa-var-mars-stroke;
  mars-stroke-right: @fa-var-mars-stroke-right;
  mars-stroke-h: @fa-var-mars-stroke-h;
  mars-stroke-up: @fa-var-mars-stroke-up;
  mars-stroke-v: @fa-var-mars-stroke-v;
  martini-glass: @fa-var-martini-glass;
  glass-martini-alt: @fa-var-glass-martini-alt;
  martini-glass-citrus: @fa-var-martini-glass-citrus;
  cocktail: @fa-var-cocktail;
  martini-glass-empty: @fa-var-martini-glass-empty;
  glass-martini: @fa-var-glass-martini;
  mask: @fa-var-mask;
  mask-face: @fa-var-mask-face;
  masks-theater: @fa-var-masks-theater;
  theater-masks: @fa-var-theater-masks;
  maximize: @fa-var-maximize;
  expand-arrows-alt: @fa-var-expand-arrows-alt;
  medal: @fa-var-medal;
  memory: @fa-var-memory;
  menorah: @fa-var-menorah;
  mercury: @fa-var-mercury;
  message: @fa-var-message;
  comment-alt: @fa-var-comment-alt;
  meteor: @fa-var-meteor;
  microchip: @fa-var-microchip;
  microphone: @fa-var-microphone;
  microphone-lines: @fa-var-microphone-lines;
  microphone-alt: @fa-var-microphone-alt;
  microphone-lines-slash: @fa-var-microphone-lines-slash;
  microphone-alt-slash: @fa-var-microphone-alt-slash;
  microphone-slash: @fa-var-microphone-slash;
  microscope: @fa-var-microscope;
  mill-sign: @fa-var-mill-sign;
  minimize: @fa-var-minimize;
  compress-arrows-alt: @fa-var-compress-arrows-alt;
  minus: @fa-var-minus;
  subtract: @fa-var-subtract;
  mitten: @fa-var-mitten;
  mobile: @fa-var-mobile;
  mobile-android: @fa-var-mobile-android;
  mobile-phone: @fa-var-mobile-phone;
  mobile-button: @fa-var-mobile-button;
  mobile-screen-button: @fa-var-mobile-screen-button;
  mobile-alt: @fa-var-mobile-alt;
  money-bill: @fa-var-money-bill;
  money-bill-1: @fa-var-money-bill-1;
  money-bill-alt: @fa-var-money-bill-alt;
  money-bill-1-wave: @fa-var-money-bill-1-wave;
  money-bill-wave-alt: @fa-var-money-bill-wave-alt;
  money-bill-wave: @fa-var-money-bill-wave;
  money-check: @fa-var-money-check;
  money-check-dollar: @fa-var-money-check-dollar;
  money-check-alt: @fa-var-money-check-alt;
  monument: @fa-var-monument;
  moon: @fa-var-moon;
  mortar-pestle: @fa-var-mortar-pestle;
  mosque: @fa-var-mosque;
  motorcycle: @fa-var-motorcycle;
  mountain: @fa-var-mountain;
  mug-hot: @fa-var-mug-hot;
  mug-saucer: @fa-var-mug-saucer;
  coffee: @fa-var-coffee;
  music: @fa-var-music;
  n: @fa-var-n;
  naira-sign: @fa-var-naira-sign;
  network-wired: @fa-var-network-wired;
  neuter: @fa-var-neuter;
  newspaper: @fa-var-newspaper;
  not-equal: @fa-var-not-equal;
  note-sticky: @fa-var-note-sticky;
  sticky-note: @fa-var-sticky-note;
  notes-medical: @fa-var-notes-medical;
  o: @fa-var-o;
  object-group: @fa-var-object-group;
  object-ungroup: @fa-var-object-ungroup;
  oil-can: @fa-var-oil-can;
  om: @fa-var-om;
  otter: @fa-var-otter;
  outdent: @fa-var-outdent;
  dedent: @fa-var-dedent;
  p: @fa-var-p;
  pager: @fa-var-pager;
  paint-roller: @fa-var-paint-roller;
  paintbrush: @fa-var-paintbrush;
  paint-brush: @fa-var-paint-brush;
  palette: @fa-var-palette;
  pallet: @fa-var-pallet;
  panorama: @fa-var-panorama;
  paper-plane: @fa-var-paper-plane;
  paperclip: @fa-var-paperclip;
  parachute-box: @fa-var-parachute-box;
  paragraph: @fa-var-paragraph;
  passport: @fa-var-passport;
  paste: @fa-var-paste;
  file-clipboard: @fa-var-file-clipboard;
  pause: @fa-var-pause;
  paw: @fa-var-paw;
  peace: @fa-var-peace;
  pen: @fa-var-pen;
  pen-clip: @fa-var-pen-clip;
  pen-alt: @fa-var-pen-alt;
  pen-fancy: @fa-var-pen-fancy;
  pen-nib: @fa-var-pen-nib;
  pen-ruler: @fa-var-pen-ruler;
  pencil-ruler: @fa-var-pencil-ruler;
  pen-to-square: @fa-var-pen-to-square;
  edit: @fa-var-edit;
  pencil: @fa-var-pencil;
  pencil-alt: @fa-var-pencil-alt;
  people-arrows-left-right: @fa-var-people-arrows-left-right;
  people-arrows: @fa-var-people-arrows;
  people-carry-box: @fa-var-people-carry-box;
  people-carry: @fa-var-people-carry;
  pepper-hot: @fa-var-pepper-hot;
  percent: @fa-var-percent;
  percentage: @fa-var-percentage;
  person: @fa-var-person;
  male: @fa-var-male;
  person-biking: @fa-var-person-biking;
  biking: @fa-var-biking;
  person-booth: @fa-var-person-booth;
  person-dots-from-line: @fa-var-person-dots-from-line;
  diagnoses: @fa-var-diagnoses;
  person-dress: @fa-var-person-dress;
  female: @fa-var-female;
  person-hiking: @fa-var-person-hiking;
  hiking: @fa-var-hiking;
  person-praying: @fa-var-person-praying;
  pray: @fa-var-pray;
  person-running: @fa-var-person-running;
  running: @fa-var-running;
  person-skating: @fa-var-person-skating;
  skating: @fa-var-skating;
  person-skiing: @fa-var-person-skiing;
  skiing: @fa-var-skiing;
  person-skiing-nordic: @fa-var-person-skiing-nordic;
  skiing-nordic: @fa-var-skiing-nordic;
  person-snowboarding: @fa-var-person-snowboarding;
  snowboarding: @fa-var-snowboarding;
  person-swimming: @fa-var-person-swimming;
  swimmer: @fa-var-swimmer;
  person-walking: @fa-var-person-walking;
  walking: @fa-var-walking;
  person-walking-with-cane: @fa-var-person-walking-with-cane;
  blind: @fa-var-blind;
  peseta-sign: @fa-var-peseta-sign;
  peso-sign: @fa-var-peso-sign;
  phone: @fa-var-phone;
  phone-flip: @fa-var-phone-flip;
  phone-alt: @fa-var-phone-alt;
  phone-slash: @fa-var-phone-slash;
  phone-volume: @fa-var-phone-volume;
  volume-control-phone: @fa-var-volume-control-phone;
  photo-film: @fa-var-photo-film;
  photo-video: @fa-var-photo-video;
  piggy-bank: @fa-var-piggy-bank;
  pills: @fa-var-pills;
  pizza-slice: @fa-var-pizza-slice;
  place-of-worship: @fa-var-place-of-worship;
  plane: @fa-var-plane;
  plane-arrival: @fa-var-plane-arrival;
  plane-departure: @fa-var-plane-departure;
  plane-slash: @fa-var-plane-slash;
  play: @fa-var-play;
  plug: @fa-var-plug;
  plus: @fa-var-plus;
  add: @fa-var-add;
  plus-minus: @fa-var-plus-minus;
  podcast: @fa-var-podcast;
  poo: @fa-var-poo;
  poo-storm: @fa-var-poo-storm;
  poo-bolt: @fa-var-poo-bolt;
  poop: @fa-var-poop;
  power-off: @fa-var-power-off;
  prescription: @fa-var-prescription;
  prescription-bottle: @fa-var-prescription-bottle;
  prescription-bottle-medical: @fa-var-prescription-bottle-medical;
  prescription-bottle-alt: @fa-var-prescription-bottle-alt;
  print: @fa-var-print;
  pump-medical: @fa-var-pump-medical;
  pump-soap: @fa-var-pump-soap;
  puzzle-piece: @fa-var-puzzle-piece;
  q: @fa-var-q;
  qrcode: @fa-var-qrcode;
  question: @fa-var-question;
  quote-left: @fa-var-quote-left;
  quote-left-alt: @fa-var-quote-left-alt;
  quote-right: @fa-var-quote-right;
  quote-right-alt: @fa-var-quote-right-alt;
  r: @fa-var-r;
  radiation: @fa-var-radiation;
  rainbow: @fa-var-rainbow;
  receipt: @fa-var-receipt;
  record-vinyl: @fa-var-record-vinyl;
  rectangle-ad: @fa-var-rectangle-ad;
  ad: @fa-var-ad;
  rectangle-list: @fa-var-rectangle-list;
  list-alt: @fa-var-list-alt;
  rectangle-xmark: @fa-var-rectangle-xmark;
  rectangle-times: @fa-var-rectangle-times;
  times-rectangle: @fa-var-times-rectangle;
  window-close: @fa-var-window-close;
  recycle: @fa-var-recycle;
  registered: @fa-var-registered;
  repeat: @fa-var-repeat;
  reply: @fa-var-reply;
  mail-reply: @fa-var-mail-reply;
  reply-all: @fa-var-reply-all;
  mail-reply-all: @fa-var-mail-reply-all;
  republican: @fa-var-republican;
  restroom: @fa-var-restroom;
  retweet: @fa-var-retweet;
  ribbon: @fa-var-ribbon;
  right-from-bracket: @fa-var-right-from-bracket;
  sign-out-alt: @fa-var-sign-out-alt;
  right-left: @fa-var-right-left;
  exchange-alt: @fa-var-exchange-alt;
  right-long: @fa-var-right-long;
  long-arrow-alt-right: @fa-var-long-arrow-alt-right;
  right-to-bracket: @fa-var-right-to-bracket;
  sign-in-alt: @fa-var-sign-in-alt;
  ring: @fa-var-ring;
  road: @fa-var-road;
  robot: @fa-var-robot;
  rocket: @fa-var-rocket;
  rotate: @fa-var-rotate;
  sync-alt: @fa-var-sync-alt;
  rotate-left: @fa-var-rotate-left;
  rotate-back: @fa-var-rotate-back;
  rotate-backward: @fa-var-rotate-backward;
  undo-alt: @fa-var-undo-alt;
  rotate-right: @fa-var-rotate-right;
  redo-alt: @fa-var-redo-alt;
  rotate-forward: @fa-var-rotate-forward;
  route: @fa-var-route;
  rss: @fa-var-rss;
  feed: @fa-var-feed;
  ruble-sign: @fa-var-ruble-sign;
  rouble: @fa-var-rouble;
  rub: @fa-var-rub;
  ruble: @fa-var-ruble;
  ruler: @fa-var-ruler;
  ruler-combined: @fa-var-ruler-combined;
  ruler-horizontal: @fa-var-ruler-horizontal;
  ruler-vertical: @fa-var-ruler-vertical;
  rupee-sign: @fa-var-rupee-sign;
  rupee: @fa-var-rupee;
  rupiah-sign: @fa-var-rupiah-sign;
  s: @fa-var-s;
  sailboat: @fa-var-sailboat;
  satellite: @fa-var-satellite;
  satellite-dish: @fa-var-satellite-dish;
  scale-balanced: @fa-var-scale-balanced;
  balance-scale: @fa-var-balance-scale;
  scale-unbalanced: @fa-var-scale-unbalanced;
  balance-scale-left: @fa-var-balance-scale-left;
  scale-unbalanced-flip: @fa-var-scale-unbalanced-flip;
  balance-scale-right: @fa-var-balance-scale-right;
  school: @fa-var-school;
  scissors: @fa-var-scissors;
  cut: @fa-var-cut;
  screwdriver: @fa-var-screwdriver;
  screwdriver-wrench: @fa-var-screwdriver-wrench;
  tools: @fa-var-tools;
  scroll: @fa-var-scroll;
  scroll-torah: @fa-var-scroll-torah;
  torah: @fa-var-torah;
  sd-card: @fa-var-sd-card;
  section: @fa-var-section;
  seedling: @fa-var-seedling;
  sprout: @fa-var-sprout;
  server: @fa-var-server;
  shapes: @fa-var-shapes;
  triangle-circle-square: @fa-var-triangle-circle-square;
  share: @fa-var-share;
  arrow-turn-right: @fa-var-arrow-turn-right;
  mail-forward: @fa-var-mail-forward;
  share-from-square: @fa-var-share-from-square;
  share-square: @fa-var-share-square;
  share-nodes: @fa-var-share-nodes;
  share-alt: @fa-var-share-alt;
  shekel-sign: @fa-var-shekel-sign;
  ils: @fa-var-ils;
  shekel: @fa-var-shekel;
  sheqel: @fa-var-sheqel;
  sheqel-sign: @fa-var-sheqel-sign;
  shield: @fa-var-shield;
  shield-blank: @fa-var-shield-blank;
  shield-alt: @fa-var-shield-alt;
  shield-virus: @fa-var-shield-virus;
  ship: @fa-var-ship;
  shirt: @fa-var-shirt;
  t-shirt: @fa-var-t-shirt;
  tshirt: @fa-var-tshirt;
  shoe-prints: @fa-var-shoe-prints;
  shop: @fa-var-shop;
  store-alt: @fa-var-store-alt;
  shop-slash: @fa-var-shop-slash;
  store-alt-slash: @fa-var-store-alt-slash;
  shower: @fa-var-shower;
  shrimp: @fa-var-shrimp;
  shuffle: @fa-var-shuffle;
  random: @fa-var-random;
  shuttle-space: @fa-var-shuttle-space;
  space-shuttle: @fa-var-space-shuttle;
  sign-hanging: @fa-var-sign-hanging;
  sign: @fa-var-sign;
  signal: @fa-var-signal;
  signal-5: @fa-var-signal-5;
  signal-perfect: @fa-var-signal-perfect;
  signature: @fa-var-signature;
  signs-post: @fa-var-signs-post;
  map-signs: @fa-var-map-signs;
  sim-card: @fa-var-sim-card;
  sink: @fa-var-sink;
  sitemap: @fa-var-sitemap;
  skull: @fa-var-skull;
  skull-crossbones: @fa-var-skull-crossbones;
  slash: @fa-var-slash;
  sleigh: @fa-var-sleigh;
  sliders: @fa-var-sliders;
  sliders-h: @fa-var-sliders-h;
  smog: @fa-var-smog;
  smoking: @fa-var-smoking;
  snowflake: @fa-var-snowflake;
  snowman: @fa-var-snowman;
  snowplow: @fa-var-snowplow;
  soap: @fa-var-soap;
  socks: @fa-var-socks;
  solar-panel: @fa-var-solar-panel;
  sort: @fa-var-sort;
  unsorted: @fa-var-unsorted;
  sort-down: @fa-var-sort-down;
  sort-desc: @fa-var-sort-desc;
  sort-up: @fa-var-sort-up;
  sort-asc: @fa-var-sort-asc;
  spa: @fa-var-spa;
  spaghetti-monster-flying: @fa-var-spaghetti-monster-flying;
  pastafarianism: @fa-var-pastafarianism;
  spell-check: @fa-var-spell-check;
  spider: @fa-var-spider;
  spinner: @fa-var-spinner;
  splotch: @fa-var-splotch;
  spoon: @fa-var-spoon;
  utensil-spoon: @fa-var-utensil-spoon;
  spray-can: @fa-var-spray-can;
  spray-can-sparkles: @fa-var-spray-can-sparkles;
  air-freshener: @fa-var-air-freshener;
  square: @fa-var-square;
  square-arrow-up-right: @fa-var-square-arrow-up-right;
  external-link-square: @fa-var-external-link-square;
  square-caret-down: @fa-var-square-caret-down;
  caret-square-down: @fa-var-caret-square-down;
  square-caret-left: @fa-var-square-caret-left;
  caret-square-left: @fa-var-caret-square-left;
  square-caret-right: @fa-var-square-caret-right;
  caret-square-right: @fa-var-caret-square-right;
  square-caret-up: @fa-var-square-caret-up;
  caret-square-up: @fa-var-caret-square-up;
  square-check: @fa-var-square-check;
  check-square: @fa-var-check-square;
  square-envelope: @fa-var-square-envelope;
  envelope-square: @fa-var-envelope-square;
  square-full: @fa-var-square-full;
  square-h: @fa-var-square-h;
  h-square: @fa-var-h-square;
  square-minus: @fa-var-square-minus;
  minus-square: @fa-var-minus-square;
  square-parking: @fa-var-square-parking;
  parking: @fa-var-parking;
  square-pen: @fa-var-square-pen;
  pen-square: @fa-var-pen-square;
  pencil-square: @fa-var-pencil-square;
  square-phone: @fa-var-square-phone;
  phone-square: @fa-var-phone-square;
  square-phone-flip: @fa-var-square-phone-flip;
  phone-square-alt: @fa-var-phone-square-alt;
  square-plus: @fa-var-square-plus;
  plus-square: @fa-var-plus-square;
  square-poll-horizontal: @fa-var-square-poll-horizontal;
  poll-h: @fa-var-poll-h;
  square-poll-vertical: @fa-var-square-poll-vertical;
  poll: @fa-var-poll;
  square-root-variable: @fa-var-square-root-variable;
  square-root-alt: @fa-var-square-root-alt;
  square-rss: @fa-var-square-rss;
  rss-square: @fa-var-rss-square;
  square-share-nodes: @fa-var-square-share-nodes;
  share-alt-square: @fa-var-share-alt-square;
  square-up-right: @fa-var-square-up-right;
  external-link-square-alt: @fa-var-external-link-square-alt;
  square-xmark: @fa-var-square-xmark;
  times-square: @fa-var-times-square;
  xmark-square: @fa-var-xmark-square;
  stairs: @fa-var-stairs;
  stamp: @fa-var-stamp;
  star: @fa-var-star;
  star-and-crescent: @fa-var-star-and-crescent;
  star-half: @fa-var-star-half;
  star-half-stroke: @fa-var-star-half-stroke;
  star-half-alt: @fa-var-star-half-alt;
  star-of-david: @fa-var-star-of-david;
  star-of-life: @fa-var-star-of-life;
  sterling-sign: @fa-var-sterling-sign;
  gbp: @fa-var-gbp;
  pound-sign: @fa-var-pound-sign;
  stethoscope: @fa-var-stethoscope;
  stop: @fa-var-stop;
  stopwatch: @fa-var-stopwatch;
  stopwatch-20: @fa-var-stopwatch-20;
  store: @fa-var-store;
  store-slash: @fa-var-store-slash;
  street-view: @fa-var-street-view;
  strikethrough: @fa-var-strikethrough;
  stroopwafel: @fa-var-stroopwafel;
  subscript: @fa-var-subscript;
  suitcase: @fa-var-suitcase;
  suitcase-medical: @fa-var-suitcase-medical;
  medkit: @fa-var-medkit;
  suitcase-rolling: @fa-var-suitcase-rolling;
  sun: @fa-var-sun;
  superscript: @fa-var-superscript;
  swatchbook: @fa-var-swatchbook;
  synagogue: @fa-var-synagogue;
  syringe: @fa-var-syringe;
  t: @fa-var-t;
  table: @fa-var-table;
  table-cells: @fa-var-table-cells;
  th: @fa-var-th;
  table-cells-large: @fa-var-table-cells-large;
  th-large: @fa-var-th-large;
  table-columns: @fa-var-table-columns;
  columns: @fa-var-columns;
  table-list: @fa-var-table-list;
  th-list: @fa-var-th-list;
  table-tennis-paddle-ball: @fa-var-table-tennis-paddle-ball;
  ping-pong-paddle-ball: @fa-var-ping-pong-paddle-ball;
  table-tennis: @fa-var-table-tennis;
  tablet: @fa-var-tablet;
  tablet-android: @fa-var-tablet-android;
  tablet-button: @fa-var-tablet-button;
  tablet-screen-button: @fa-var-tablet-screen-button;
  tablet-alt: @fa-var-tablet-alt;
  tablets: @fa-var-tablets;
  tachograph-digital: @fa-var-tachograph-digital;
  digital-tachograph: @fa-var-digital-tachograph;
  tag: @fa-var-tag;
  tags: @fa-var-tags;
  tape: @fa-var-tape;
  taxi: @fa-var-taxi;
  cab: @fa-var-cab;
  teeth: @fa-var-teeth;
  teeth-open: @fa-var-teeth-open;
  temperature-empty: @fa-var-temperature-empty;
  temperature-0: @fa-var-temperature-0;
  thermometer-0: @fa-var-thermometer-0;
  thermometer-empty: @fa-var-thermometer-empty;
  temperature-full: @fa-var-temperature-full;
  temperature-4: @fa-var-temperature-4;
  thermometer-4: @fa-var-thermometer-4;
  thermometer-full: @fa-var-thermometer-full;
  temperature-half: @fa-var-temperature-half;
  temperature-2: @fa-var-temperature-2;
  thermometer-2: @fa-var-thermometer-2;
  thermometer-half: @fa-var-thermometer-half;
  temperature-high: @fa-var-temperature-high;
  temperature-low: @fa-var-temperature-low;
  temperature-quarter: @fa-var-temperature-quarter;
  temperature-1: @fa-var-temperature-1;
  thermometer-1: @fa-var-thermometer-1;
  thermometer-quarter: @fa-var-thermometer-quarter;
  temperature-three-quarters: @fa-var-temperature-three-quarters;
  temperature-3: @fa-var-temperature-3;
  thermometer-3: @fa-var-thermometer-3;
  thermometer-three-quarters: @fa-var-thermometer-three-quarters;
  tenge-sign: @fa-var-tenge-sign;
  tenge: @fa-var-tenge;
  terminal: @fa-var-terminal;
  text-height: @fa-var-text-height;
  text-slash: @fa-var-text-slash;
  remove-format: @fa-var-remove-format;
  text-width: @fa-var-text-width;
  thermometer: @fa-var-thermometer;
  thumbs-down: @fa-var-thumbs-down;
  thumbs-up: @fa-var-thumbs-up;
  thumbtack: @fa-var-thumbtack;
  thumb-tack: @fa-var-thumb-tack;
  ticket: @fa-var-ticket;
  ticket-simple: @fa-var-ticket-simple;
  ticket-alt: @fa-var-ticket-alt;
  timeline: @fa-var-timeline;
  toggle-off: @fa-var-toggle-off;
  toggle-on: @fa-var-toggle-on;
  toilet: @fa-var-toilet;
  toilet-paper: @fa-var-toilet-paper;
  toilet-paper-slash: @fa-var-toilet-paper-slash;
  toolbox: @fa-var-toolbox;
  tooth: @fa-var-tooth;
  torii-gate: @fa-var-torii-gate;
  tower-broadcast: @fa-var-tower-broadcast;
  broadcast-tower: @fa-var-broadcast-tower;
  tractor: @fa-var-tractor;
  trademark: @fa-var-trademark;
  traffic-light: @fa-var-traffic-light;
  trailer: @fa-var-trailer;
  train: @fa-var-train;
  train-subway: @fa-var-train-subway;
  subway: @fa-var-subway;
  train-tram: @fa-var-train-tram;
  tram: @fa-var-tram;
  transgender: @fa-var-transgender;
  transgender-alt: @fa-var-transgender-alt;
  trash: @fa-var-trash;
  trash-arrow-up: @fa-var-trash-arrow-up;
  trash-restore: @fa-var-trash-restore;
  trash-can: @fa-var-trash-can;
  trash-alt: @fa-var-trash-alt;
  trash-can-arrow-up: @fa-var-trash-can-arrow-up;
  trash-restore-alt: @fa-var-trash-restore-alt;
  tree: @fa-var-tree;
  triangle-exclamation: @fa-var-triangle-exclamation;
  exclamation-triangle: @fa-var-exclamation-triangle;
  warning: @fa-var-warning;
  trophy: @fa-var-trophy;
  truck: @fa-var-truck;
  truck-fast: @fa-var-truck-fast;
  shipping-fast: @fa-var-shipping-fast;
  truck-medical: @fa-var-truck-medical;
  ambulance: @fa-var-ambulance;
  truck-monster: @fa-var-truck-monster;
  truck-moving: @fa-var-truck-moving;
  truck-pickup: @fa-var-truck-pickup;
  truck-ramp-box: @fa-var-truck-ramp-box;
  truck-loading: @fa-var-truck-loading;
  tty: @fa-var-tty;
  teletype: @fa-var-teletype;
  turkish-lira-sign: @fa-var-turkish-lira-sign;
  try: @fa-var-try;
  turkish-lira: @fa-var-turkish-lira;
  turn-down: @fa-var-turn-down;
  level-down-alt: @fa-var-level-down-alt;
  turn-up: @fa-var-turn-up;
  level-up-alt: @fa-var-level-up-alt;
  tv: @fa-var-tv;
  television: @fa-var-television;
  tv-alt: @fa-var-tv-alt;
  u: @fa-var-u;
  umbrella: @fa-var-umbrella;
  umbrella-beach: @fa-var-umbrella-beach;
  underline: @fa-var-underline;
  universal-access: @fa-var-universal-access;
  unlock: @fa-var-unlock;
  unlock-keyhole: @fa-var-unlock-keyhole;
  unlock-alt: @fa-var-unlock-alt;
  up-down: @fa-var-up-down;
  arrows-alt-v: @fa-var-arrows-alt-v;
  up-down-left-right: @fa-var-up-down-left-right;
  arrows-alt: @fa-var-arrows-alt;
  up-long: @fa-var-up-long;
  long-arrow-alt-up: @fa-var-long-arrow-alt-up;
  up-right-and-down-left-from-center: @fa-var-up-right-and-down-left-from-center;
  expand-alt: @fa-var-expand-alt;
  up-right-from-square: @fa-var-up-right-from-square;
  external-link-alt: @fa-var-external-link-alt;
  upload: @fa-var-upload;
  user: @fa-var-user;
  user-astronaut: @fa-var-user-astronaut;
  user-check: @fa-var-user-check;
  user-clock: @fa-var-user-clock;
  user-doctor: @fa-var-user-doctor;
  user-md: @fa-var-user-md;
  user-gear: @fa-var-user-gear;
  user-cog: @fa-var-user-cog;
  user-graduate: @fa-var-user-graduate;
  user-group: @fa-var-user-group;
  user-friends: @fa-var-user-friends;
  user-injured: @fa-var-user-injured;
  user-large: @fa-var-user-large;
  user-alt: @fa-var-user-alt;
  user-large-slash: @fa-var-user-large-slash;
  user-alt-slash: @fa-var-user-alt-slash;
  user-lock: @fa-var-user-lock;
  user-minus: @fa-var-user-minus;
  user-ninja: @fa-var-user-ninja;
  user-nurse: @fa-var-user-nurse;
  user-pen: @fa-var-user-pen;
  user-edit: @fa-var-user-edit;
  user-plus: @fa-var-user-plus;
  user-secret: @fa-var-user-secret;
  user-shield: @fa-var-user-shield;
  user-slash: @fa-var-user-slash;
  user-tag: @fa-var-user-tag;
  user-tie: @fa-var-user-tie;
  user-xmark: @fa-var-user-xmark;
  user-times: @fa-var-user-times;
  users: @fa-var-users;
  users-gear: @fa-var-users-gear;
  users-cog: @fa-var-users-cog;
  users-slash: @fa-var-users-slash;
  utensils: @fa-var-utensils;
  cutlery: @fa-var-cutlery;
  v: @fa-var-v;
  van-shuttle: @fa-var-van-shuttle;
  shuttle-van: @fa-var-shuttle-van;
  vault: @fa-var-vault;
  vector-square: @fa-var-vector-square;
  venus: @fa-var-venus;
  venus-double: @fa-var-venus-double;
  venus-mars: @fa-var-venus-mars;
  vest: @fa-var-vest;
  vest-patches: @fa-var-vest-patches;
  vial: @fa-var-vial;
  vials: @fa-var-vials;
  video: @fa-var-video;
  video-camera: @fa-var-video-camera;
  video-slash: @fa-var-video-slash;
  vihara: @fa-var-vihara;
  virus: @fa-var-virus;
  virus-covid: @fa-var-virus-covid;
  virus-covid-slash: @fa-var-virus-covid-slash;
  virus-slash: @fa-var-virus-slash;
  viruses: @fa-var-viruses;
  voicemail: @fa-var-voicemail;
  volleyball: @fa-var-volleyball;
  volleyball-ball: @fa-var-volleyball-ball;
  volume-high: @fa-var-volume-high;
  volume-up: @fa-var-volume-up;
  volume-low: @fa-var-volume-low;
  volume-down: @fa-var-volume-down;
  volume-off: @fa-var-volume-off;
  volume-xmark: @fa-var-volume-xmark;
  volume-mute: @fa-var-volume-mute;
  volume-times: @fa-var-volume-times;
  vr-cardboard: @fa-var-vr-cardboard;
  w: @fa-var-w;
  wallet: @fa-var-wallet;
  wand-magic: @fa-var-wand-magic;
  magic: @fa-var-magic;
  wand-magic-sparkles: @fa-var-wand-magic-sparkles;
  magic-wand-sparkles: @fa-var-magic-wand-sparkles;
  wand-sparkles: @fa-var-wand-sparkles;
  warehouse: @fa-var-warehouse;
  water: @fa-var-water;
  water-ladder: @fa-var-water-ladder;
  ladder-water: @fa-var-ladder-water;
  swimming-pool: @fa-var-swimming-pool;
  wave-square: @fa-var-wave-square;
  weight-hanging: @fa-var-weight-hanging;
  weight-scale: @fa-var-weight-scale;
  weight: @fa-var-weight;
  wheelchair: @fa-var-wheelchair;
  whiskey-glass: @fa-var-whiskey-glass;
  glass-whiskey: @fa-var-glass-whiskey;
  wifi: @fa-var-wifi;
  wifi-3: @fa-var-wifi-3;
  wifi-strong: @fa-var-wifi-strong;
  wind: @fa-var-wind;
  window-maximize: @fa-var-window-maximize;
  window-minimize: @fa-var-window-minimize;
  window-restore: @fa-var-window-restore;
  wine-bottle: @fa-var-wine-bottle;
  wine-glass: @fa-var-wine-glass;
  wine-glass-empty: @fa-var-wine-glass-empty;
  wine-glass-alt: @fa-var-wine-glass-alt;
  won-sign: @fa-var-won-sign;
  krw: @fa-var-krw;
  won: @fa-var-won;
  wrench: @fa-var-wrench;
  x: @fa-var-x;
  x-ray: @fa-var-x-ray;
  xmark: @fa-var-xmark;
  close: @fa-var-close;
  multiply: @fa-var-multiply;
  remove: @fa-var-remove;
  times: @fa-var-times;
  y: @fa-var-y;
  yen-sign: @fa-var-yen-sign;
  cny: @fa-var-cny;
  jpy: @fa-var-jpy;
  rmb: @fa-var-rmb;
  yen: @fa-var-yen;
  yin-yang: @fa-var-yin-yang;
  z: @fa-var-z;
}

.fa-brand-icons() {
  42-group: @fa-var-42-group;
  innosoft: @fa-var-innosoft;
  500px: @fa-var-500px;
  accessible-icon: @fa-var-accessible-icon;
  accusoft: @fa-var-accusoft;
  adn: @fa-var-adn;
  adversal: @fa-var-adversal;
  affiliatetheme: @fa-var-affiliatetheme;
  airbnb: @fa-var-airbnb;
  algolia: @fa-var-algolia;
  alipay: @fa-var-alipay;
  amazon: @fa-var-amazon;
  amazon-pay: @fa-var-amazon-pay;
  amilia: @fa-var-amilia;
  android: @fa-var-android;
  angellist: @fa-var-angellist;
  angrycreative: @fa-var-angrycreative;
  angular: @fa-var-angular;
  app-store: @fa-var-app-store;
  app-store-ios: @fa-var-app-store-ios;
  apper: @fa-var-apper;
  apple: @fa-var-apple;
  apple-pay: @fa-var-apple-pay;
  artstation: @fa-var-artstation;
  asymmetrik: @fa-var-asymmetrik;
  atlassian: @fa-var-atlassian;
  audible: @fa-var-audible;
  autoprefixer: @fa-var-autoprefixer;
  avianex: @fa-var-avianex;
  aviato: @fa-var-aviato;
  aws: @fa-var-aws;
  bandcamp: @fa-var-bandcamp;
  battle-net: @fa-var-battle-net;
  behance: @fa-var-behance;
  behance-square: @fa-var-behance-square;
  bilibili: @fa-var-bilibili;
  bimobject: @fa-var-bimobject;
  bitbucket: @fa-var-bitbucket;
  bitcoin: @fa-var-bitcoin;
  bity: @fa-var-bity;
  black-tie: @fa-var-black-tie;
  blackberry: @fa-var-blackberry;
  blogger: @fa-var-blogger;
  blogger-b: @fa-var-blogger-b;
  bluetooth: @fa-var-bluetooth;
  bluetooth-b: @fa-var-bluetooth-b;
  bootstrap: @fa-var-bootstrap;
  bots: @fa-var-bots;
  btc: @fa-var-btc;
  buffer: @fa-var-buffer;
  buromobelexperte: @fa-var-buromobelexperte;
  buy-n-large: @fa-var-buy-n-large;
  buysellads: @fa-var-buysellads;
  canadian-maple-leaf: @fa-var-canadian-maple-leaf;
  cc-amazon-pay: @fa-var-cc-amazon-pay;
  cc-amex: @fa-var-cc-amex;
  cc-apple-pay: @fa-var-cc-apple-pay;
  cc-diners-club: @fa-var-cc-diners-club;
  cc-discover: @fa-var-cc-discover;
  cc-jcb: @fa-var-cc-jcb;
  cc-mastercard: @fa-var-cc-mastercard;
  cc-paypal: @fa-var-cc-paypal;
  cc-stripe: @fa-var-cc-stripe;
  cc-visa: @fa-var-cc-visa;
  centercode: @fa-var-centercode;
  centos: @fa-var-centos;
  chrome: @fa-var-chrome;
  chromecast: @fa-var-chromecast;
  cloudflare: @fa-var-cloudflare;
  cloudscale: @fa-var-cloudscale;
  cloudsmith: @fa-var-cloudsmith;
  cloudversify: @fa-var-cloudversify;
  cmplid: @fa-var-cmplid;
  codepen: @fa-var-codepen;
  codiepie: @fa-var-codiepie;
  confluence: @fa-var-confluence;
  connectdevelop: @fa-var-connectdevelop;
  contao: @fa-var-contao;
  cotton-bureau: @fa-var-cotton-bureau;
  cpanel: @fa-var-cpanel;
  creative-commons: @fa-var-creative-commons;
  creative-commons-by: @fa-var-creative-commons-by;
  creative-commons-nc: @fa-var-creative-commons-nc;
  creative-commons-nc-eu: @fa-var-creative-commons-nc-eu;
  creative-commons-nc-jp: @fa-var-creative-commons-nc-jp;
  creative-commons-nd: @fa-var-creative-commons-nd;
  creative-commons-pd: @fa-var-creative-commons-pd;
  creative-commons-pd-alt: @fa-var-creative-commons-pd-alt;
  creative-commons-remix: @fa-var-creative-commons-remix;
  creative-commons-sa: @fa-var-creative-commons-sa;
  creative-commons-sampling: @fa-var-creative-commons-sampling;
  creative-commons-sampling-plus: @fa-var-creative-commons-sampling-plus;
  creative-commons-share: @fa-var-creative-commons-share;
  creative-commons-zero: @fa-var-creative-commons-zero;
  critical-role: @fa-var-critical-role;
  css3: @fa-var-css3;
  css3-alt: @fa-var-css3-alt;
  cuttlefish: @fa-var-cuttlefish;
  d-and-d: @fa-var-d-and-d;
  d-and-d-beyond: @fa-var-d-and-d-beyond;
  dailymotion: @fa-var-dailymotion;
  dashcube: @fa-var-dashcube;
  deezer: @fa-var-deezer;
  delicious: @fa-var-delicious;
  deploydog: @fa-var-deploydog;
  deskpro: @fa-var-deskpro;
  dev: @fa-var-dev;
  deviantart: @fa-var-deviantart;
  dhl: @fa-var-dhl;
  diaspora: @fa-var-diaspora;
  digg: @fa-var-digg;
  digital-ocean: @fa-var-digital-ocean;
  discord: @fa-var-discord;
  discourse: @fa-var-discourse;
  dochub: @fa-var-dochub;
  docker: @fa-var-docker;
  draft2digital: @fa-var-draft2digital;
  dribbble: @fa-var-dribbble;
  dribbble-square: @fa-var-dribbble-square;
  dropbox: @fa-var-dropbox;
  drupal: @fa-var-drupal;
  dyalog: @fa-var-dyalog;
  earlybirds: @fa-var-earlybirds;
  ebay: @fa-var-ebay;
  edge: @fa-var-edge;
  edge-legacy: @fa-var-edge-legacy;
  elementor: @fa-var-elementor;
  ello: @fa-var-ello;
  ember: @fa-var-ember;
  empire: @fa-var-empire;
  envira: @fa-var-envira;
  erlang: @fa-var-erlang;
  ethereum: @fa-var-ethereum;
  etsy: @fa-var-etsy;
  evernote: @fa-var-evernote;
  expeditedssl: @fa-var-expeditedssl;
  facebook: @fa-var-facebook;
  facebook-f: @fa-var-facebook-f;
  facebook-messenger: @fa-var-facebook-messenger;
  facebook-square: @fa-var-facebook-square;
  fantasy-flight-games: @fa-var-fantasy-flight-games;
  fedex: @fa-var-fedex;
  fedora: @fa-var-fedora;
  figma: @fa-var-figma;
  firefox: @fa-var-firefox;
  firefox-browser: @fa-var-firefox-browser;
  first-order: @fa-var-first-order;
  first-order-alt: @fa-var-first-order-alt;
  firstdraft: @fa-var-firstdraft;
  flickr: @fa-var-flickr;
  flipboard: @fa-var-flipboard;
  fly: @fa-var-fly;
  font-awesome: @fa-var-font-awesome;
  font-awesome-flag: @fa-var-font-awesome-flag;
  font-awesome-logo-full: @fa-var-font-awesome-logo-full;
  fonticons: @fa-var-fonticons;
  fonticons-fi: @fa-var-fonticons-fi;
  fort-awesome: @fa-var-fort-awesome;
  fort-awesome-alt: @fa-var-fort-awesome-alt;
  forumbee: @fa-var-forumbee;
  foursquare: @fa-var-foursquare;
  free-code-camp: @fa-var-free-code-camp;
  freebsd: @fa-var-freebsd;
  fulcrum: @fa-var-fulcrum;
  galactic-republic: @fa-var-galactic-republic;
  galactic-senate: @fa-var-galactic-senate;
  get-pocket: @fa-var-get-pocket;
  gg: @fa-var-gg;
  gg-circle: @fa-var-gg-circle;
  git: @fa-var-git;
  git-alt: @fa-var-git-alt;
  git-square: @fa-var-git-square;
  github: @fa-var-github;
  github-alt: @fa-var-github-alt;
  github-square: @fa-var-github-square;
  gitkraken: @fa-var-gitkraken;
  gitlab: @fa-var-gitlab;
  gitter: @fa-var-gitter;
  glide: @fa-var-glide;
  glide-g: @fa-var-glide-g;
  gofore: @fa-var-gofore;
  golang: @fa-var-golang;
  goodreads: @fa-var-goodreads;
  goodreads-g: @fa-var-goodreads-g;
  google: @fa-var-google;
  google-drive: @fa-var-google-drive;
  google-pay: @fa-var-google-pay;
  google-play: @fa-var-google-play;
  google-plus: @fa-var-google-plus;
  google-plus-g: @fa-var-google-plus-g;
  google-plus-square: @fa-var-google-plus-square;
  google-wallet: @fa-var-google-wallet;
  gratipay: @fa-var-gratipay;
  grav: @fa-var-grav;
  gripfire: @fa-var-gripfire;
  grunt: @fa-var-grunt;
  guilded: @fa-var-guilded;
  gulp: @fa-var-gulp;
  hacker-news: @fa-var-hacker-news;
  hacker-news-square: @fa-var-hacker-news-square;
  hackerrank: @fa-var-hackerrank;
  hashnode: @fa-var-hashnode;
  hips: @fa-var-hips;
  hire-a-helper: @fa-var-hire-a-helper;
  hive: @fa-var-hive;
  hooli: @fa-var-hooli;
  hornbill: @fa-var-hornbill;
  hotjar: @fa-var-hotjar;
  houzz: @fa-var-houzz;
  html5: @fa-var-html5;
  hubspot: @fa-var-hubspot;
  ideal: @fa-var-ideal;
  imdb: @fa-var-imdb;
  instagram: @fa-var-instagram;
  instagram-square: @fa-var-instagram-square;
  instalod: @fa-var-instalod;
  intercom: @fa-var-intercom;
  internet-explorer: @fa-var-internet-explorer;
  invision: @fa-var-invision;
  ioxhost: @fa-var-ioxhost;
  itch-io: @fa-var-itch-io;
  itunes: @fa-var-itunes;
  itunes-note: @fa-var-itunes-note;
  java: @fa-var-java;
  jedi-order: @fa-var-jedi-order;
  jenkins: @fa-var-jenkins;
  jira: @fa-var-jira;
  joget: @fa-var-joget;
  joomla: @fa-var-joomla;
  js: @fa-var-js;
  js-square: @fa-var-js-square;
  jsfiddle: @fa-var-jsfiddle;
  kaggle: @fa-var-kaggle;
  keybase: @fa-var-keybase;
  keycdn: @fa-var-keycdn;
  kickstarter: @fa-var-kickstarter;
  kickstarter-k: @fa-var-kickstarter-k;
  korvue: @fa-var-korvue;
  laravel: @fa-var-laravel;
  lastfm: @fa-var-lastfm;
  lastfm-square: @fa-var-lastfm-square;
  leanpub: @fa-var-leanpub;
  less: @fa-var-less;
  line: @fa-var-line;
  linkedin: @fa-var-linkedin;
  linkedin-in: @fa-var-linkedin-in;
  linode: @fa-var-linode;
  linux: @fa-var-linux;
  lyft: @fa-var-lyft;
  magento: @fa-var-magento;
  mailchimp: @fa-var-mailchimp;
  mandalorian: @fa-var-mandalorian;
  markdown: @fa-var-markdown;
  mastodon: @fa-var-mastodon;
  maxcdn: @fa-var-maxcdn;
  mdb: @fa-var-mdb;
  medapps: @fa-var-medapps;
  medium: @fa-var-medium;
  medium-m: @fa-var-medium-m;
  medrt: @fa-var-medrt;
  meetup: @fa-var-meetup;
  megaport: @fa-var-megaport;
  mendeley: @fa-var-mendeley;
  microblog: @fa-var-microblog;
  microsoft: @fa-var-microsoft;
  mix: @fa-var-mix;
  mixcloud: @fa-var-mixcloud;
  mixer: @fa-var-mixer;
  mizuni: @fa-var-mizuni;
  modx: @fa-var-modx;
  monero: @fa-var-monero;
  napster: @fa-var-napster;
  neos: @fa-var-neos;
  nimblr: @fa-var-nimblr;
  node: @fa-var-node;
  node-js: @fa-var-node-js;
  npm: @fa-var-npm;
  ns8: @fa-var-ns8;
  nutritionix: @fa-var-nutritionix;
  octopus-deploy: @fa-var-octopus-deploy;
  odnoklassniki: @fa-var-odnoklassniki;
  odnoklassniki-square: @fa-var-odnoklassniki-square;
  old-republic: @fa-var-old-republic;
  opencart: @fa-var-opencart;
  openid: @fa-var-openid;
  opera: @fa-var-opera;
  optin-monster: @fa-var-optin-monster;
  orcid: @fa-var-orcid;
  osi: @fa-var-osi;
  padlet: @fa-var-padlet;
  page4: @fa-var-page4;
  pagelines: @fa-var-pagelines;
  palfed: @fa-var-palfed;
  patreon: @fa-var-patreon;
  paypal: @fa-var-paypal;
  perbyte: @fa-var-perbyte;
  periscope: @fa-var-periscope;
  phabricator: @fa-var-phabricator;
  phoenix-framework: @fa-var-phoenix-framework;
  phoenix-squadron: @fa-var-phoenix-squadron;
  php: @fa-var-php;
  pied-piper: @fa-var-pied-piper;
  pied-piper-alt: @fa-var-pied-piper-alt;
  pied-piper-hat: @fa-var-pied-piper-hat;
  pied-piper-pp: @fa-var-pied-piper-pp;
  pied-piper-square: @fa-var-pied-piper-square;
  pinterest: @fa-var-pinterest;
  pinterest-p: @fa-var-pinterest-p;
  pinterest-square: @fa-var-pinterest-square;
  pix: @fa-var-pix;
  playstation: @fa-var-playstation;
  product-hunt: @fa-var-product-hunt;
  pushed: @fa-var-pushed;
  python: @fa-var-python;
  qq: @fa-var-qq;
  quinscape: @fa-var-quinscape;
  quora: @fa-var-quora;
  r-project: @fa-var-r-project;
  raspberry-pi: @fa-var-raspberry-pi;
  ravelry: @fa-var-ravelry;
  react: @fa-var-react;
  reacteurope: @fa-var-reacteurope;
  readme: @fa-var-readme;
  rebel: @fa-var-rebel;
  red-river: @fa-var-red-river;
  reddit: @fa-var-reddit;
  reddit-alien: @fa-var-reddit-alien;
  reddit-square: @fa-var-reddit-square;
  redhat: @fa-var-redhat;
  renren: @fa-var-renren;
  replyd: @fa-var-replyd;
  researchgate: @fa-var-researchgate;
  resolving: @fa-var-resolving;
  rev: @fa-var-rev;
  rocketchat: @fa-var-rocketchat;
  rockrms: @fa-var-rockrms;
  rust: @fa-var-rust;
  safari: @fa-var-safari;
  salesforce: @fa-var-salesforce;
  sass: @fa-var-sass;
  schlix: @fa-var-schlix;
  scribd: @fa-var-scribd;
  searchengin: @fa-var-searchengin;
  sellcast: @fa-var-sellcast;
  sellsy: @fa-var-sellsy;
  servicestack: @fa-var-servicestack;
  shirtsinbulk: @fa-var-shirtsinbulk;
  shopify: @fa-var-shopify;
  shopware: @fa-var-shopware;
  simplybuilt: @fa-var-simplybuilt;
  sistrix: @fa-var-sistrix;
  sith: @fa-var-sith;
  sitrox: @fa-var-sitrox;
  sketch: @fa-var-sketch;
  skyatlas: @fa-var-skyatlas;
  skype: @fa-var-skype;
  slack: @fa-var-slack;
  slack-hash: @fa-var-slack-hash;
  slideshare: @fa-var-slideshare;
  snapchat: @fa-var-snapchat;
  snapchat-ghost: @fa-var-snapchat-ghost;
  snapchat-square: @fa-var-snapchat-square;
  soundcloud: @fa-var-soundcloud;
  sourcetree: @fa-var-sourcetree;
  speakap: @fa-var-speakap;
  speaker-deck: @fa-var-speaker-deck;
  spotify: @fa-var-spotify;
  square-font-awesome: @fa-var-square-font-awesome;
  square-font-awesome-stroke: @fa-var-square-font-awesome-stroke;
  font-awesome-alt: @fa-var-font-awesome-alt;
  squarespace: @fa-var-squarespace;
  stack-exchange: @fa-var-stack-exchange;
  stack-overflow: @fa-var-stack-overflow;
  stackpath: @fa-var-stackpath;
  staylinked: @fa-var-staylinked;
  steam: @fa-var-steam;
  steam-square: @fa-var-steam-square;
  steam-symbol: @fa-var-steam-symbol;
  sticker-mule: @fa-var-sticker-mule;
  strava: @fa-var-strava;
  stripe: @fa-var-stripe;
  stripe-s: @fa-var-stripe-s;
  studiovinari: @fa-var-studiovinari;
  stumbleupon: @fa-var-stumbleupon;
  stumbleupon-circle: @fa-var-stumbleupon-circle;
  superpowers: @fa-var-superpowers;
  supple: @fa-var-supple;
  suse: @fa-var-suse;
  swift: @fa-var-swift;
  symfony: @fa-var-symfony;
  teamspeak: @fa-var-teamspeak;
  telegram: @fa-var-telegram;
  telegram-plane: @fa-var-telegram-plane;
  tencent-weibo: @fa-var-tencent-weibo;
  the-red-yeti: @fa-var-the-red-yeti;
  themeco: @fa-var-themeco;
  themeisle: @fa-var-themeisle;
  think-peaks: @fa-var-think-peaks;
  tiktok: @fa-var-tiktok;
  trade-federation: @fa-var-trade-federation;
  trello: @fa-var-trello;
  tumblr: @fa-var-tumblr;
  tumblr-square: @fa-var-tumblr-square;
  twitch: @fa-var-twitch;
  twitter: @fa-var-twitter;
  twitter-square: @fa-var-twitter-square;
  typo3: @fa-var-typo3;
  uber: @fa-var-uber;
  ubuntu: @fa-var-ubuntu;
  uikit: @fa-var-uikit;
  umbraco: @fa-var-umbraco;
  uncharted: @fa-var-uncharted;
  uniregistry: @fa-var-uniregistry;
  unity: @fa-var-unity;
  unsplash: @fa-var-unsplash;
  untappd: @fa-var-untappd;
  ups: @fa-var-ups;
  usb: @fa-var-usb;
  usps: @fa-var-usps;
  ussunnah: @fa-var-ussunnah;
  vaadin: @fa-var-vaadin;
  viacoin: @fa-var-viacoin;
  viadeo: @fa-var-viadeo;
  viadeo-square: @fa-var-viadeo-square;
  viber: @fa-var-viber;
  vimeo: @fa-var-vimeo;
  vimeo-square: @fa-var-vimeo-square;
  vimeo-v: @fa-var-vimeo-v;
  vine: @fa-var-vine;
  vk: @fa-var-vk;
  vnv: @fa-var-vnv;
  vuejs: @fa-var-vuejs;
  watchman-monitoring: @fa-var-watchman-monitoring;
  waze: @fa-var-waze;
  weebly: @fa-var-weebly;
  weibo: @fa-var-weibo;
  weixin: @fa-var-weixin;
  whatsapp: @fa-var-whatsapp;
  whatsapp-square: @fa-var-whatsapp-square;
  whmcs: @fa-var-whmcs;
  wikipedia-w: @fa-var-wikipedia-w;
  windows: @fa-var-windows;
  wirsindhandwerk: @fa-var-wirsindhandwerk;
  wsh: @fa-var-wsh;
  wix: @fa-var-wix;
  wizards-of-the-coast: @fa-var-wizards-of-the-coast;
  wodu: @fa-var-wodu;
  wolf-pack-battalion: @fa-var-wolf-pack-battalion;
  wordpress: @fa-var-wordpress;
  wordpress-simple: @fa-var-wordpress-simple;
  wpbeginner: @fa-var-wpbeginner;
  wpexplorer: @fa-var-wpexplorer;
  wpforms: @fa-var-wpforms;
  wpressr: @fa-var-wpressr;
  xbox: @fa-var-xbox;
  xing: @fa-var-xing;
  xing-square: @fa-var-xing-square;
  y-combinator: @fa-var-y-combinator;
  yahoo: @fa-var-yahoo;
  yammer: @fa-var-yammer;
  yandex: @fa-var-yandex;
  yandex-international: @fa-var-yandex-international;
  yarn: @fa-var-yarn;
  yelp: @fa-var-yelp;
  yoast: @fa-var-yoast;
  youtube: @fa-var-youtube;
  youtube-square: @fa-var-youtube-square;
  zhihu: @fa-var-zhihu;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/brands.less
````
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
@import "_variables.less";

:root, :host {
  --@{fa-css-prefix}-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
}

@font-face {
  font-family: 'Font Awesome 6 Brands';
  font-style: normal;
  font-weight: 400;
  font-display: @fa-font-display;
  src: url('@{fa-font-path}/fa-brands-400.woff2') format('woff2'),
    url('@{fa-font-path}/fa-brands-400.ttf') format('truetype');
}

.fab,
.fa-brands {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

each(.fa-brand-icons(), {
  .@{fa-css-prefix}-@{key}:before { content: @value; }
});
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/fontawesome.less
````
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
// Font Awesome core compile (Web Fonts-based)
// -------------------------

@import "_variables.less";
@import "_mixins.less";
@import "_core.less";
@import "_sizing.less";
@import "_fixed-width.less";
@import "_list.less";
@import "_bordered-pulled.less";
@import "_animated.less";
@import "_rotated-flipped.less";
@import "_stacked.less";
@import "_icons.less";
@import "_screen-reader.less";
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/regular.less
````
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
@import "_variables.less";

:root, :host {
  --@{fa-css-prefix}-font-regular: normal 400 1em/1 "@{fa-style-family}";
}

@font-face {
  font-family: 'Font Awesome 6 Free';
  font-style: normal;
  font-weight: 400;
  font-display: @fa-font-display;
  src: url('@{fa-font-path}/fa-regular-400.woff2') format('woff2'),
    url('@{fa-font-path}/fa-regular-400.ttf') format('truetype');
}

.far,
.fa-regular {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/solid.less
````
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
@import "_variables.less";

:root, :host {
  --@{fa-css-prefix}-font-solid: normal 900 1em/1 "@{fa-style-family}";
}

@font-face {
  font-family: 'Font Awesome 6 Free';
  font-style: normal;
  font-weight: 900;
  font-display: @fa-font-display;
  src: url('@{fa-font-path}/fa-solid-900.woff2') format('woff2'),
    url('@{fa-font-path}/fa-solid-900.ttf') format('truetype');
}


.fas,
.fa-solid {
  font-family: 'Font Awesome 6 Free';
  font-weight: 900;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/less/v4-shims.less
````
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
// V4 shims compile (Web Fonts-based)
// -------------------------

@import '_variables.less';
@import '_shims.less';
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_animated.scss
````scss
// animating icons
// --------------------------

.#{$fa-css-prefix}-beat {
  animation-name: #{$fa-css-prefix}-beat;
  animation-delay: var(--#{$fa-css-prefix}-animation-delay, 0);
  animation-direction: var(--#{$fa-css-prefix}-animation-direction, normal);
  animation-duration: var(--#{$fa-css-prefix}-animation-duration, 1s);
  animation-iteration-count: var(--#{$fa-css-prefix}-animation-iteration-count, infinite);
  animation-timing-function: var(--#{$fa-css-prefix}-animation-timing, ease-in-out);
}

.#{$fa-css-prefix}-bounce {
  animation-name: #{$fa-css-prefix}-bounce;
  animation-delay: var(--#{$fa-css-prefix}-animation-delay, 0);
  animation-direction: var(--#{$fa-css-prefix}-animation-direction, normal);
  animation-duration: var(--#{$fa-css-prefix}-animation-duration, 1s);
  animation-iteration-count: var(--#{$fa-css-prefix}-animation-iteration-count, infinite);
  animation-timing-function: var(--#{$fa-css-prefix}-animation-timing, cubic-bezier(0.280, 0.840, 0.420, 1));
}

.#{$fa-css-prefix}-fade {
  animation-name: #{$fa-css-prefix}-fade;
  animation-delay: var(--#{$fa-css-prefix}-animation-delay, 0);
  animation-direction: var(--#{$fa-css-prefix}-animation-direction, normal);
  animation-duration: var(--#{$fa-css-prefix}-animation-duration, 1s);
  animation-iteration-count: var(--#{$fa-css-prefix}-animation-iteration-count, infinite);
  animation-timing-function: var(--#{$fa-css-prefix}-animation-timing, cubic-bezier(.4,0,.6,1));
}

.#{$fa-css-prefix}-beat-fade {
  animation-name: #{$fa-css-prefix}-beat-fade;
  animation-delay: var(--#{$fa-css-prefix}-animation-delay, 0);
  animation-direction: var(--#{$fa-css-prefix}-animation-direction, normal);
  animation-duration: var(--#{$fa-css-prefix}-animation-duration, 1s);
  animation-iteration-count: var(--#{$fa-css-prefix}-animation-iteration-count, infinite);
  animation-timing-function: var(--#{$fa-css-prefix}-animation-timing, cubic-bezier(.4,0,.6,1));
}

.#{$fa-css-prefix}-flip {
  animation-name: #{$fa-css-prefix}-flip;
  animation-delay: var(--#{$fa-css-prefix}-animation-delay, 0);
  animation-direction: var(--#{$fa-css-prefix}-animation-direction, normal);
  animation-duration: var(--#{$fa-css-prefix}-animation-duration, 1s);
  animation-iteration-count: var(--#{$fa-css-prefix}-animation-iteration-count, infinite);
  animation-timing-function: var(--#{$fa-css-prefix}-animation-timing, ease-in-out);
}

.#{$fa-css-prefix}-shake {
  animation-name: #{$fa-css-prefix}-shake;
  animation-delay: var(--#{$fa-css-prefix}-animation-delay, 0);
  animation-direction: var(--#{$fa-css-prefix}-animation-direction, normal);
  animation-duration: var(--#{$fa-css-prefix}-animation-duration, 1s);
  animation-iteration-count: var(--#{$fa-css-prefix}-animation-iteration-count, infinite);
  animation-timing-function: var(--#{$fa-css-prefix}-animation-timing, linear);
}

.#{$fa-css-prefix}-spin {
  animation-name: #{$fa-css-prefix}-spin;
  animation-delay: var(--#{$fa-css-prefix}-animation-delay, 0);
  animation-direction: var(--#{$fa-css-prefix}-animation-direction, normal);
  animation-duration: var(--#{$fa-css-prefix}-animation-duration, 2s);
  animation-iteration-count: var(--#{$fa-css-prefix}-animation-iteration-count, infinite);
  animation-timing-function: var(--#{$fa-css-prefix}-animation-timing, linear);
}

.#{$fa-css-prefix}-spin-reverse {
  --#{$fa-css-prefix}-animation-direction: reverse;
}

.#{$fa-css-prefix}-pulse,
.#{$fa-css-prefix}-spin-pulse {
  animation-name: #{$fa-css-prefix}-spin;
  animation-direction: var(--#{$fa-css-prefix}-animation-direction, normal);
  animation-duration: var(--#{$fa-css-prefix}-animation-duration, 1s);
  animation-iteration-count: var(--#{$fa-css-prefix}-animation-iteration-count, infinite);
  animation-timing-function: var(--#{$fa-css-prefix}-animation-timing, steps(8));
}

// if agent or operating system prefers reduced motion, disable animations
// see: https://www.smashingmagazine.com/2020/09/design-reduced-motion-sensitivities/
// see: https://developer.mozilla.org/en-US/docs/Web/CSS/@media/prefers-reduced-motion
@media (prefers-reduced-motion: reduce) {
  .#{$fa-css-prefix}-beat,
  .#{$fa-css-prefix}-bounce,
  .#{$fa-css-prefix}-fade,
  .#{$fa-css-prefix}-beat-fade,
  .#{$fa-css-prefix}-flip,
  .#{$fa-css-prefix}-pulse,
  .#{$fa-css-prefix}-shake,
  .#{$fa-css-prefix}-spin,
  .#{$fa-css-prefix}-spin-pulse {
    animation-delay: -1ms;
    animation-duration: 1ms;
    animation-iteration-count: 1;
    transition-delay: 0s;
    transition-duration: 0s;
  }
}

@keyframes #{$fa-css-prefix}-beat {
  0%, 90% { transform: scale(1); }
  45% { transform: scale(var(--#{$fa-css-prefix}-beat-scale, 1.25)); }
}

@keyframes #{$fa-css-prefix}-bounce {
  0%   { transform: scale(1,1) translateY(0); }
  10%  { transform: scale(var(--#{$fa-css-prefix}-bounce-start-scale-x, 1.1),var(--#{$fa-css-prefix}-bounce-start-scale-y, 0.9)) translateY(0); }
  30%  { transform: scale(var(--#{$fa-css-prefix}-bounce-jump-scale-x, 0.9),var(--#{$fa-css-prefix}-bounce-jump-scale-y, 1.1)) translateY(var(--#{$fa-css-prefix}-bounce-height, -0.5em)); }
  50%  { transform: scale(var(--#{$fa-css-prefix}-bounce-land-scale-x, 1.05),var(--#{$fa-css-prefix}-bounce-land-scale-y, 0.95)) translateY(0); }
  57%  { transform: scale(1,1) translateY(var(--#{$fa-css-prefix}-bounce-rebound, -0.125em)); }
  64%  { transform: scale(1,1) translateY(0); }
  100% { transform: scale(1,1) translateY(0); }
}

@keyframes #{$fa-css-prefix}-fade {
  50% { opacity: var(--#{$fa-css-prefix}-fade-opacity, 0.4); }
}

@keyframes #{$fa-css-prefix}-beat-fade {
  0%, 100% {
    opacity: var(--#{$fa-css-prefix}-beat-fade-opacity, 0.4);
    transform: scale(1);
  }
  50% {
    opacity: 1;
    transform: scale(var(--#{$fa-css-prefix}-beat-fade-scale, 1.125));
  }
}

@keyframes #{$fa-css-prefix}-flip {
  50% {
    transform: rotate3d(var(--#{$fa-css-prefix}-flip-x, 0), var(--#{$fa-css-prefix}-flip-y, 1), var(--#{$fa-css-prefix}-flip-z, 0), var(--#{$fa-css-prefix}-flip-angle, -180deg));
  }
}

@keyframes #{$fa-css-prefix}-shake {
  0% { transform: rotate(-15deg); }
  4% { transform: rotate(15deg); }
  8%, 24% { transform: rotate(-18deg); }
  12%, 28% { transform: rotate(18deg); }
  16% { transform: rotate(-22deg); }
  20% { transform: rotate(22deg); }
  32% { transform: rotate(-12deg); }
  36% { transform: rotate(12deg); }
  40%, 100% { transform: rotate(0deg); }
}

@keyframes #{$fa-css-prefix}-spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_bordered-pulled.scss
````scss
// bordered + pulled icons
// -------------------------

.#{$fa-css-prefix}-border {
  border-color: var(--#{$fa-css-prefix}-border-color, #{$fa-border-color});
  border-radius: var(--#{$fa-css-prefix}-border-radius, #{$fa-border-radius});
  border-style: var(--#{$fa-css-prefix}-border-style, #{$fa-border-style});
  border-width: var(--#{$fa-css-prefix}-border-width, #{$fa-border-width});
  padding: var(--#{$fa-css-prefix}-border-padding, #{$fa-border-padding});
}

.#{$fa-css-prefix}-pull-left { 
  float: left;
  margin-right: var(--#{$fa-css-prefix}-pull-margin, #{$fa-pull-margin}); 
}

.#{$fa-css-prefix}-pull-right { 
  float: right;
  margin-left: var(--#{$fa-css-prefix}-pull-margin, #{$fa-pull-margin}); 
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_core.scss
````scss
// base icon class definition
// -------------------------

.#{$fa-css-prefix} {
  font-family: var(--#{$fa-css-prefix}-style-family, '#{$fa-style-family}');
  font-weight: var(--#{$fa-css-prefix}-style, #{$fa-style});
}

.#{$fa-css-prefix},
.fas,
.fa-solid,
.far,
.fa-regular,
.fal,
.fa-light,
.fat,
.fa-thin,
.fad,
.fa-duotone,
.fab,
.fa-brands {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  display: var(--#{$fa-css-prefix}-display, #{$fa-display});
  font-style: normal;
  font-variant: normal;
  line-height: 1;
  text-rendering: auto;
}

%fa-icon {
  @include fa-icon;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_fixed-width.scss
````scss
// fixed-width icons
// -------------------------

.#{$fa-css-prefix}-fw {
  text-align: center;
  width: $fa-fw-width;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_functions.scss
````scss
// functions
// --------------------------

// Originally obtained from the Bootstrap https://github.com/twbs/bootstrap
//
// Licensed under: The MIT License (MIT)
//
// Copyright (c) 2011-2021 Twitter, Inc.
// Copyright (c) 2011-2021 The Bootstrap Authors
//
// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:
//
// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.
@function fa-divide($dividend, $divisor, $precision: 10) {
  $sign: if($dividend > 0 and $divisor > 0, 1, -1);
  $dividend: abs($dividend);
  $divisor: abs($divisor);
  $quotient: 0;
  $remainder: $dividend;
  @if $dividend == 0 {
    @return 0;
  }
  @if $divisor == 0 {
    @error "Cannot divide by 0";
  }
  @if $divisor == 1 {
    @return $dividend;
  }
  @while $remainder >= $divisor {
    $quotient: $quotient + 1;
    $remainder: $remainder - $divisor;
  }
  @if $remainder > 0 and $precision > 0 {
    $remainder: fa-divide($remainder * 10, $divisor, $precision - 1) * .1;
  }
  @return ($quotient + $remainder) * $sign;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_icons.scss
````scss
// specific icon class definition
// -------------------------

/* Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
readers do not read off random characters that represent icons */

@each $name, $icon in $fa-icons {
  .#{$fa-css-prefix}-#{$name}::before { content: fa-content($icon); }
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_list.scss
````scss
// icons in a list
// -------------------------

.#{$fa-css-prefix}-ul {
  list-style-type: none;
  margin-left: var(--#{$fa-css-prefix}-li-margin, #{$fa-li-margin});
  padding-left: 0;

  > li { position: relative; }
}

.#{$fa-css-prefix}-li {
  left: calc(var(--#{$fa-css-prefix}-li-width, #{$fa-li-width}) * -1);
  position: absolute;
  text-align: center;
  width: var(--#{$fa-css-prefix}-li-width, #{$fa-li-width});
  line-height: inherit;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_mixins.scss
````scss
// mixins
// --------------------------

// base rendering for an icon
@mixin fa-icon {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  font-weight: normal;
  line-height: 1;
}

// sets relative font-sizing and alignment (in _sizing)
@mixin fa-size ($font-size) {
  font-size: fa-divide($font-size, $fa-size-scale-base) * 1em; // converts step in sizing scale into an em-based value that's relative to the scale's base
  line-height: fa-divide(1, $font-size) * 1em; // sets the line-height of the icon back to that of it's parent
  vertical-align: (fa-divide(6, $font-size) - fa-divide(3, 8)) * 1em; // vertically centers the icon taking into account the surrounding text's descender
}

// only display content to screen readers
// see: https://www.a11yproject.com/posts/2013-01-11-how-to-hide-content/
// see: https://hugogiraudel.com/2016/10/13/css-hide-and-seek/
@mixin fa-sr-only() {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

// use in conjunction with .sr-only to only display content when it's focused
@mixin fa-sr-only-focusable() {
  &:not(:focus) {
    @include fa-sr-only();
  }
}

// convenience mixins for declaring pseudo-elements by CSS variable,
// including all style-specific font properties, and both the ::before
// and ::after elements in the duotone case.
@mixin fa-icon-solid($fa-var) {
  @extend %fa-icon;
  @extend .fa-solid;

  &::before {
    content: unquote("\"#{ $fa-var }\"");
  }
}

@mixin fa-icon-regular($fa-var) {
  @extend %fa-icon;
  @extend .fa-regular;

  &::before {
    content: unquote("\"#{ $fa-var }\"");
  }
}

@mixin fa-icon-brands($fa-var) {
  @extend %fa-icon;
  @extend .fa-brands;

  &::before {
    content: unquote("\"#{ $fa-var }\"");
  }
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_rotated-flipped.scss
````scss
// rotating + flipping icons
// -------------------------

.#{$fa-css-prefix}-rotate-90 {
  transform: rotate(90deg);
}

.#{$fa-css-prefix}-rotate-180 {
  transform: rotate(180deg);
}

.#{$fa-css-prefix}-rotate-270 {
  transform: rotate(270deg);
}

.#{$fa-css-prefix}-flip-horizontal {
  transform: scale(-1, 1);
}

.#{$fa-css-prefix}-flip-vertical {
  transform: scale(1, -1);
}

.#{$fa-css-prefix}-flip-both,
.#{$fa-css-prefix}-flip-horizontal.#{$fa-css-prefix}-flip-vertical { 
  transform: scale(-1, -1);
}

.#{$fa-css-prefix}-rotate-by {
  transform: rotate(var(--#{$fa-css-prefix}-rotate-angle, none));
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_screen-reader.scss
````scss
// screen-reader utilities
// -------------------------

// only display content to screen readers
.sr-only,
.fa-sr-only {
  @include fa-sr-only; 
}

// use in conjunction with .sr-only to only display content when it's focused
.sr-only-focusable,
.fa-sr-only-focusable {
  @include fa-sr-only-focusable; 
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_shims.scss
````scss
.#{$fa-css-prefix}.#{$fa-css-prefix}-glass:before { content: fa-content($fa-var-martini-glass-empty); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-envelope-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-envelope-o:before { content: fa-content($fa-var-envelope); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-star-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-star-o:before { content: fa-content($fa-var-star); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-remove:before { content: fa-content($fa-var-xmark); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-close:before { content: fa-content($fa-var-xmark); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-gear:before { content: fa-content($fa-var-gear); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-trash-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-trash-o:before { content: fa-content($fa-var-trash-can); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-home:before { content: fa-content($fa-var-house); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-o:before { content: fa-content($fa-var-file); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-clock-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-clock-o:before { content: fa-content($fa-var-clock); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-arrow-circle-o-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-arrow-circle-o-down:before { content: fa-content($fa-var-circle-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-arrow-circle-o-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-arrow-circle-o-up:before { content: fa-content($fa-var-circle-up); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-play-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-play-circle-o:before { content: fa-content($fa-var-circle-play); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-repeat:before { content: fa-content($fa-var-arrow-rotate-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-rotate-right:before { content: fa-content($fa-var-arrow-rotate-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-refresh:before { content: fa-content($fa-var-arrows-rotate); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-list-alt {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-list-alt:before { content: fa-content($fa-var-rectangle-list); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-dedent:before { content: fa-content($fa-var-outdent); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-video-camera:before { content: fa-content($fa-var-video); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-picture-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-picture-o:before { content: fa-content($fa-var-image); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-photo {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-photo:before { content: fa-content($fa-var-image); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-image {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-image:before { content: fa-content($fa-var-image); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-map-marker:before { content: fa-content($fa-var-location-dot); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-pencil-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-pencil-square-o:before { content: fa-content($fa-var-pen-to-square); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-edit {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-edit:before { content: fa-content($fa-var-pen-to-square); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-share-square-o:before { content: fa-content($fa-var-share-from-square); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-check-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-check-square-o:before { content: fa-content($fa-var-square-check); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-arrows:before { content: fa-content($fa-var-up-down-left-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-times-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-times-circle-o:before { content: fa-content($fa-var-circle-xmark); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-check-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-check-circle-o:before { content: fa-content($fa-var-circle-check); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-mail-forward:before { content: fa-content($fa-var-share); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-expand:before { content: fa-content($fa-var-up-right-and-down-left-from-center); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-compress:before { content: fa-content($fa-var-down-left-and-up-right-to-center); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-eye {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-eye-slash {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-warning:before { content: fa-content($fa-var-triangle-exclamation); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar:before { content: fa-content($fa-var-calendar-days); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-arrows-v:before { content: fa-content($fa-var-up-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-arrows-h:before { content: fa-content($fa-var-left-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-bar-chart:before { content: fa-content($fa-var-chart-column); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-bar-chart-o:before { content: fa-content($fa-var-chart-column); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-twitter-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-facebook-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-gears:before { content: fa-content($fa-var-gears); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-thumbs-o-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-thumbs-o-up:before { content: fa-content($fa-var-thumbs-up); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-thumbs-o-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-thumbs-o-down:before { content: fa-content($fa-var-thumbs-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-heart-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-heart-o:before { content: fa-content($fa-var-heart); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sign-out:before { content: fa-content($fa-var-right-from-bracket); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-linkedin-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-linkedin-square:before { content: fa-content($fa-var-linkedin); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-thumb-tack:before { content: fa-content($fa-var-thumbtack); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-external-link:before { content: fa-content($fa-var-up-right-from-square); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sign-in:before { content: fa-content($fa-var-right-to-bracket); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-github-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-lemon-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-lemon-o:before { content: fa-content($fa-var-lemon); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-square-o:before { content: fa-content($fa-var-square); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-bookmark-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-bookmark-o:before { content: fa-content($fa-var-bookmark); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-twitter {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-facebook {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-facebook:before { content: fa-content($fa-var-facebook-f); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-facebook-f {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-facebook-f:before { content: fa-content($fa-var-facebook-f); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-github {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-credit-card {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-feed:before { content: fa-content($fa-var-rss); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hdd-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hdd-o:before { content: fa-content($fa-var-hard-drive); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-o-right {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-o-right:before { content: fa-content($fa-var-hand-point-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-o-left {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-o-left:before { content: fa-content($fa-var-hand-point-left); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-o-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-o-up:before { content: fa-content($fa-var-hand-point-up); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-o-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-o-down:before { content: fa-content($fa-var-hand-point-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-globe:before { content: fa-content($fa-var-earth-americas); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-tasks:before { content: fa-content($fa-var-bars-progress); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-arrows-alt:before { content: fa-content($fa-var-maximize); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-group:before { content: fa-content($fa-var-users); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-chain:before { content: fa-content($fa-var-link); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-cut:before { content: fa-content($fa-var-scissors); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-files-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-files-o:before { content: fa-content($fa-var-copy); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-floppy-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-floppy-o:before { content: fa-content($fa-var-floppy-disk); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-save {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-save:before { content: fa-content($fa-var-floppy-disk); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-navicon:before { content: fa-content($fa-var-bars); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-reorder:before { content: fa-content($fa-var-bars); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-magic:before { content: fa-content($fa-var-wand-magic-sparkles); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-pinterest {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-pinterest-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-google-plus-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-google-plus {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-google-plus:before { content: fa-content($fa-var-google-plus-g); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-money:before { content: fa-content($fa-var-money-bill-1); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-unsorted:before { content: fa-content($fa-var-sort); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sort-desc:before { content: fa-content($fa-var-sort-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sort-asc:before { content: fa-content($fa-var-sort-up); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-linkedin {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-linkedin:before { content: fa-content($fa-var-linkedin-in); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-rotate-left:before { content: fa-content($fa-var-arrow-rotate-left); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-legal:before { content: fa-content($fa-var-gavel); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-tachometer:before { content: fa-content($fa-var-gauge-high); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-dashboard:before { content: fa-content($fa-var-gauge-high); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-comment-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-comment-o:before { content: fa-content($fa-var-comment); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-comments-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-comments-o:before { content: fa-content($fa-var-comments); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-flash:before { content: fa-content($fa-var-bolt); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-clipboard:before { content: fa-content($fa-var-paste); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-lightbulb-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-lightbulb-o:before { content: fa-content($fa-var-lightbulb); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-exchange:before { content: fa-content($fa-var-right-left); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-cloud-download:before { content: fa-content($fa-var-cloud-arrow-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-cloud-upload:before { content: fa-content($fa-var-cloud-arrow-up); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-bell-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-bell-o:before { content: fa-content($fa-var-bell); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-cutlery:before { content: fa-content($fa-var-utensils); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-text-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-text-o:before { content: fa-content($fa-var-file-lines); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-building-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-building-o:before { content: fa-content($fa-var-building); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hospital-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hospital-o:before { content: fa-content($fa-var-hospital); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-tablet:before { content: fa-content($fa-var-tablet-screen-button); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-mobile:before { content: fa-content($fa-var-mobile-screen-button); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-mobile-phone:before { content: fa-content($fa-var-mobile-screen-button); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-circle-o:before { content: fa-content($fa-var-circle); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-mail-reply:before { content: fa-content($fa-var-reply); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-github-alt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-folder-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-folder-o:before { content: fa-content($fa-var-folder); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-folder-open-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-folder-open-o:before { content: fa-content($fa-var-folder-open); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-smile-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-smile-o:before { content: fa-content($fa-var-face-smile); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-frown-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-frown-o:before { content: fa-content($fa-var-face-frown); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-meh-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-meh-o:before { content: fa-content($fa-var-face-meh); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-keyboard-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-keyboard-o:before { content: fa-content($fa-var-keyboard); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-flag-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-flag-o:before { content: fa-content($fa-var-flag); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-mail-reply-all:before { content: fa-content($fa-var-reply-all); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-star-half-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-star-half-o:before { content: fa-content($fa-var-star-half-stroke); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-star-half-empty {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-star-half-empty:before { content: fa-content($fa-var-star-half-stroke); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-star-half-full {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-star-half-full:before { content: fa-content($fa-var-star-half-stroke); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-code-fork:before { content: fa-content($fa-var-code-branch); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-chain-broken:before { content: fa-content($fa-var-link-slash); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-unlink:before { content: fa-content($fa-var-link-slash); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-o:before { content: fa-content($fa-var-calendar); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-maxcdn {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-html5 {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-css3 {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-unlock-alt:before { content: fa-content($fa-var-unlock); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-minus-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-minus-square-o:before { content: fa-content($fa-var-square-minus); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-level-up:before { content: fa-content($fa-var-turn-up); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-level-down:before { content: fa-content($fa-var-turn-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-pencil-square:before { content: fa-content($fa-var-square-pen); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-external-link-square:before { content: fa-content($fa-var-square-up-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-compass {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-caret-square-o-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-caret-square-o-down:before { content: fa-content($fa-var-square-caret-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-toggle-down {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-toggle-down:before { content: fa-content($fa-var-square-caret-down); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-caret-square-o-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-caret-square-o-up:before { content: fa-content($fa-var-square-caret-up); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-toggle-up {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-toggle-up:before { content: fa-content($fa-var-square-caret-up); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-caret-square-o-right {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-caret-square-o-right:before { content: fa-content($fa-var-square-caret-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-toggle-right {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-toggle-right:before { content: fa-content($fa-var-square-caret-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-eur:before { content: fa-content($fa-var-euro-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-euro:before { content: fa-content($fa-var-euro-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-gbp:before { content: fa-content($fa-var-sterling-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-usd:before { content: fa-content($fa-var-dollar-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-dollar:before { content: fa-content($fa-var-dollar-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-inr:before { content: fa-content($fa-var-indian-rupee-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-rupee:before { content: fa-content($fa-var-indian-rupee-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-jpy:before { content: fa-content($fa-var-yen-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-cny:before { content: fa-content($fa-var-yen-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-rmb:before { content: fa-content($fa-var-yen-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-yen:before { content: fa-content($fa-var-yen-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-rub:before { content: fa-content($fa-var-ruble-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-ruble:before { content: fa-content($fa-var-ruble-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-rouble:before { content: fa-content($fa-var-ruble-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-krw:before { content: fa-content($fa-var-won-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-won:before { content: fa-content($fa-var-won-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-btc {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-bitcoin {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-bitcoin:before { content: fa-content($fa-var-btc); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-text:before { content: fa-content($fa-var-file-lines); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sort-alpha-asc:before { content: fa-content($fa-var-arrow-down-a-z); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sort-alpha-desc:before { content: fa-content($fa-var-arrow-down-z-a); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sort-amount-asc:before { content: fa-content($fa-var-arrow-down-short-wide); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sort-amount-desc:before { content: fa-content($fa-var-arrow-down-wide-short); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sort-numeric-asc:before { content: fa-content($fa-var-arrow-down-1-9); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sort-numeric-desc:before { content: fa-content($fa-var-arrow-down-9-1); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-youtube-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-youtube {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-xing {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-xing-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-youtube-play {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-youtube-play:before { content: fa-content($fa-var-youtube); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-dropbox {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-stack-overflow {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-instagram {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-flickr {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-adn {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-bitbucket {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-bitbucket-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-bitbucket-square:before { content: fa-content($fa-var-bitbucket); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-tumblr {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-tumblr-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-long-arrow-down:before { content: fa-content($fa-var-down-long); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-long-arrow-up:before { content: fa-content($fa-var-up-long); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-long-arrow-left:before { content: fa-content($fa-var-left-long); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-long-arrow-right:before { content: fa-content($fa-var-right-long); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-apple {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-windows {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-android {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-linux {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-dribbble {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-skype {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-foursquare {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-trello {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-gratipay {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-gittip {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-gittip:before { content: fa-content($fa-var-gratipay); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sun-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-sun-o:before { content: fa-content($fa-var-sun); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-moon-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-moon-o:before { content: fa-content($fa-var-moon); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-vk {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-weibo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-renren {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-pagelines {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-stack-exchange {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-arrow-circle-o-right {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-arrow-circle-o-right:before { content: fa-content($fa-var-circle-right); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-arrow-circle-o-left {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-arrow-circle-o-left:before { content: fa-content($fa-var-circle-left); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-caret-square-o-left {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-caret-square-o-left:before { content: fa-content($fa-var-square-caret-left); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-toggle-left {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-toggle-left:before { content: fa-content($fa-var-square-caret-left); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-dot-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-dot-circle-o:before { content: fa-content($fa-var-circle-dot); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-vimeo-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-try:before { content: fa-content($fa-var-turkish-lira-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-turkish-lira:before { content: fa-content($fa-var-turkish-lira-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-plus-square-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-plus-square-o:before { content: fa-content($fa-var-square-plus); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-slack {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-wordpress {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-openid {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-institution:before { content: fa-content($fa-var-building-columns); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-bank:before { content: fa-content($fa-var-building-columns); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-mortar-board:before { content: fa-content($fa-var-graduation-cap); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-yahoo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-google {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-reddit {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-reddit-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-stumbleupon-circle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-stumbleupon {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-delicious {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-digg {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-pied-piper-pp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-pied-piper-alt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-drupal {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-joomla {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-behance {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-behance-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-steam {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-steam-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-automobile:before { content: fa-content($fa-var-car); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-cab:before { content: fa-content($fa-var-taxi); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-spotify {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-deviantart {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-soundcloud {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-pdf-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-pdf-o:before { content: fa-content($fa-var-file-pdf); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-word-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-word-o:before { content: fa-content($fa-var-file-word); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-excel-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-excel-o:before { content: fa-content($fa-var-file-excel); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-powerpoint-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-powerpoint-o:before { content: fa-content($fa-var-file-powerpoint); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-image-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-image-o:before { content: fa-content($fa-var-file-image); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-photo-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-photo-o:before { content: fa-content($fa-var-file-image); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-picture-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-picture-o:before { content: fa-content($fa-var-file-image); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-archive-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-archive-o:before { content: fa-content($fa-var-file-zipper); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-zip-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-zip-o:before { content: fa-content($fa-var-file-zipper); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-audio-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-audio-o:before { content: fa-content($fa-var-file-audio); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-sound-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-sound-o:before { content: fa-content($fa-var-file-audio); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-video-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-video-o:before { content: fa-content($fa-var-file-video); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-movie-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-movie-o:before { content: fa-content($fa-var-file-video); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-file-code-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-file-code-o:before { content: fa-content($fa-var-file-code); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-vine {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-codepen {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-jsfiddle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-life-bouy:before { content: fa-content($fa-var-life-ring); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-life-buoy:before { content: fa-content($fa-var-life-ring); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-life-saver:before { content: fa-content($fa-var-life-ring); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-support:before { content: fa-content($fa-var-life-ring); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-circle-o-notch:before { content: fa-content($fa-var-circle-notch); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-rebel {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-ra {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-ra:before { content: fa-content($fa-var-rebel); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-resistance {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-resistance:before { content: fa-content($fa-var-rebel); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-empire {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-ge {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-ge:before { content: fa-content($fa-var-empire); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-git-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-git {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-hacker-news {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-y-combinator-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-y-combinator-square:before { content: fa-content($fa-var-hacker-news); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-yc-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-yc-square:before { content: fa-content($fa-var-hacker-news); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-tencent-weibo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-qq {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-weixin {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-wechat {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-wechat:before { content: fa-content($fa-var-weixin); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-send:before { content: fa-content($fa-var-paper-plane); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-paper-plane-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-paper-plane-o:before { content: fa-content($fa-var-paper-plane); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-send-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-send-o:before { content: fa-content($fa-var-paper-plane); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-circle-thin {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-circle-thin:before { content: fa-content($fa-var-circle); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-header:before { content: fa-content($fa-var-heading); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-futbol-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-futbol-o:before { content: fa-content($fa-var-futbol); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-soccer-ball-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-soccer-ball-o:before { content: fa-content($fa-var-futbol); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-slideshare {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-twitch {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-yelp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-newspaper-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-newspaper-o:before { content: fa-content($fa-var-newspaper); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-paypal {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-google-wallet {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc-visa {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc-mastercard {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc-discover {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc-amex {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc-paypal {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc-stripe {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-bell-slash-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-bell-slash-o:before { content: fa-content($fa-var-bell-slash); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-trash:before { content: fa-content($fa-var-trash-can); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-copyright {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-eyedropper:before { content: fa-content($fa-var-eye-dropper); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-area-chart:before { content: fa-content($fa-var-chart-area); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-pie-chart:before { content: fa-content($fa-var-chart-pie); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-line-chart:before { content: fa-content($fa-var-chart-line); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-lastfm {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-lastfm-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-ioxhost {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-angellist {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-cc:before { content: fa-content($fa-var-closed-captioning); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-ils:before { content: fa-content($fa-var-shekel-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-shekel:before { content: fa-content($fa-var-shekel-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-sheqel:before { content: fa-content($fa-var-shekel-sign); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-buysellads {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-connectdevelop {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-dashcube {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-forumbee {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-leanpub {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-sellsy {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-shirtsinbulk {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-simplybuilt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-skyatlas {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-diamond {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-diamond:before { content: fa-content($fa-var-gem); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-transgender:before { content: fa-content($fa-var-mars-and-venus); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-intersex:before { content: fa-content($fa-var-mars-and-venus); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-transgender-alt:before { content: fa-content($fa-var-transgender); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-facebook-official {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-facebook-official:before { content: fa-content($fa-var-facebook); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-pinterest-p {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-whatsapp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-hotel:before { content: fa-content($fa-var-bed); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-viacoin {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-medium {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-y-combinator {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-yc {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-yc:before { content: fa-content($fa-var-y-combinator); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-optin-monster {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-opencart {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-expeditedssl {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-battery-4:before { content: fa-content($fa-var-battery-full); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-battery:before { content: fa-content($fa-var-battery-full); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-battery-3:before { content: fa-content($fa-var-battery-three-quarters); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-battery-2:before { content: fa-content($fa-var-battery-half); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-battery-1:before { content: fa-content($fa-var-battery-quarter); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-battery-0:before { content: fa-content($fa-var-battery-empty); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-object-group {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-object-ungroup {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-sticky-note-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-sticky-note-o:before { content: fa-content($fa-var-note-sticky); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc-jcb {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-cc-diners-club {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-clone {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-hourglass-o:before { content: fa-content($fa-var-hourglass-empty); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hourglass-1:before { content: fa-content($fa-var-hourglass-start); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hourglass-half:before { content: fa-content($fa-var-hourglass); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hourglass-2:before { content: fa-content($fa-var-hourglass); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hourglass-3:before { content: fa-content($fa-var-hourglass-end); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-rock-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-rock-o:before { content: fa-content($fa-var-hand-back-fist); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-grab-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-grab-o:before { content: fa-content($fa-var-hand-back-fist); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-paper-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-paper-o:before { content: fa-content($fa-var-hand); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-stop-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-stop-o:before { content: fa-content($fa-var-hand); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-scissors-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-scissors-o:before { content: fa-content($fa-var-hand-scissors); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-lizard-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-lizard-o:before { content: fa-content($fa-var-hand-lizard); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-spock-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-spock-o:before { content: fa-content($fa-var-hand-spock); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-pointer-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-pointer-o:before { content: fa-content($fa-var-hand-pointer); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-peace-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-hand-peace-o:before { content: fa-content($fa-var-hand-peace); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-registered {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-creative-commons {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-gg {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-gg-circle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-odnoklassniki {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-odnoklassniki-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-get-pocket {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-wikipedia-w {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-safari {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-chrome {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-firefox {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-opera {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-internet-explorer {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-television:before { content: fa-content($fa-var-tv); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-contao {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-500px {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-amazon {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-plus-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-plus-o:before { content: fa-content($fa-var-calendar-plus); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-minus-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-minus-o:before { content: fa-content($fa-var-calendar-minus); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-times-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-times-o:before { content: fa-content($fa-var-calendar-xmark); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-check-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-calendar-check-o:before { content: fa-content($fa-var-calendar-check); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-map-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-map-o:before { content: fa-content($fa-var-map); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-commenting:before { content: fa-content($fa-var-comment-dots); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-commenting-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-commenting-o:before { content: fa-content($fa-var-comment-dots); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-houzz {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-vimeo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-vimeo:before { content: fa-content($fa-var-vimeo-v); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-black-tie {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-fonticons {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-reddit-alien {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-edge {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-credit-card-alt:before { content: fa-content($fa-var-credit-card); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-codiepie {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-modx {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-fort-awesome {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-usb {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-product-hunt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-mixcloud {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-scribd {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-pause-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-pause-circle-o:before { content: fa-content($fa-var-circle-pause); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-stop-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-stop-circle-o:before { content: fa-content($fa-var-circle-stop); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-bluetooth {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-bluetooth-b {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-gitlab {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-wpbeginner {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-wpforms {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-envira {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-wheelchair-alt {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-wheelchair-alt:before { content: fa-content($fa-var-accessible-icon); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-question-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-question-circle-o:before { content: fa-content($fa-var-circle-question); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-volume-control-phone:before { content: fa-content($fa-var-phone-volume); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-asl-interpreting:before { content: fa-content($fa-var-hands-asl-interpreting); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-deafness:before { content: fa-content($fa-var-ear-deaf); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-hard-of-hearing:before { content: fa-content($fa-var-ear-deaf); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-glide {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-glide-g {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-signing:before { content: fa-content($fa-var-hands); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-viadeo {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-viadeo-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-snapchat {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-snapchat-ghost {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-snapchat-ghost:before { content: fa-content($fa-var-snapchat); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-snapchat-square {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-pied-piper {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-first-order {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-yoast {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-themeisle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-google-plus-official {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-google-plus-official:before { content: fa-content($fa-var-google-plus); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-google-plus-circle {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-google-plus-circle:before { content: fa-content($fa-var-google-plus); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-font-awesome {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-fa {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-fa:before { content: fa-content($fa-var-font-awesome); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-handshake-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-handshake-o:before { content: fa-content($fa-var-handshake); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-envelope-open-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-envelope-open-o:before { content: fa-content($fa-var-envelope-open); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-linode {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-address-book-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-address-book-o:before { content: fa-content($fa-var-address-book); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-vcard:before { content: fa-content($fa-var-address-card); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-address-card-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-address-card-o:before { content: fa-content($fa-var-address-card); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-vcard-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-vcard-o:before { content: fa-content($fa-var-address-card); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-user-circle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-user-circle-o:before { content: fa-content($fa-var-circle-user); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-user-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-user-o:before { content: fa-content($fa-var-user); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-id-badge {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-drivers-license:before { content: fa-content($fa-var-id-card); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-id-card-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-id-card-o:before { content: fa-content($fa-var-id-card); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-drivers-license-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-drivers-license-o:before { content: fa-content($fa-var-id-card); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-quora {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-free-code-camp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-telegram {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-thermometer-4:before { content: fa-content($fa-var-temperature-full); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-thermometer:before { content: fa-content($fa-var-temperature-full); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-thermometer-3:before { content: fa-content($fa-var-temperature-three-quarters); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-thermometer-2:before { content: fa-content($fa-var-temperature-half); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-thermometer-1:before { content: fa-content($fa-var-temperature-quarter); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-thermometer-0:before { content: fa-content($fa-var-temperature-empty); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-bathtub:before { content: fa-content($fa-var-bath); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-s15:before { content: fa-content($fa-var-bath); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-window-maximize {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-window-restore {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-times-rectangle:before { content: fa-content($fa-var-rectangle-xmark); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-window-close-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-window-close-o:before { content: fa-content($fa-var-rectangle-xmark); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-times-rectangle-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-times-rectangle-o:before { content: fa-content($fa-var-rectangle-xmark); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-bandcamp {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-grav {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-etsy {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-imdb {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-ravelry {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-eercast {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-eercast:before { content: fa-content($fa-var-sellcast); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-snowflake-o {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
.#{$fa-css-prefix}.#{$fa-css-prefix}-snowflake-o:before { content: fa-content($fa-var-snowflake); }

.#{$fa-css-prefix}.#{$fa-css-prefix}-superpowers {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-wpexplorer {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

.#{$fa-css-prefix}.#{$fa-css-prefix}-meetup {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_sizing.scss
````scss
// sizing icons
// -------------------------

// literal magnification scale
@for $i from 1 through 10 {
  .#{$fa-css-prefix}-#{$i}x {
    font-size: $i * 1em;
  }
}

// step-based scale (with alignment)
@each $size, $value in $fa-sizes {
  .#{$fa-css-prefix}-#{$size} {
     @include fa-size($value);
  }
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_stacked.scss
````scss
// stacking icons
// -------------------------

.#{$fa-css-prefix}-stack {
  display: inline-block;
  height: 2em;
  line-height: 2em;
  position: relative;
  vertical-align: $fa-stack-vertical-align;
  width: $fa-stack-width;
}

.#{$fa-css-prefix}-stack-1x,
.#{$fa-css-prefix}-stack-2x {
  left: 0;
  position: absolute;
  text-align: center;
  width: 100%;
  z-index: var(--#{$fa-css-prefix}-stack-z-index, #{$fa-stack-z-index});
}

.#{$fa-css-prefix}-stack-1x {
  line-height: inherit;
}

.#{$fa-css-prefix}-stack-2x {
  font-size: 2em;
}

.#{$fa-css-prefix}-inverse {
  color: var(--#{$fa-css-prefix}-inverse, #{$fa-inverse});
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/_variables.scss
````scss
// variables
// --------------------------

$fa-css-prefix          : fa !default;
$fa-style               : 900 !default;
$fa-style-family        : "Font Awesome 6 Free" !default;

$fa-display             : inline-block !default;

$fa-fw-width            : fa-divide(20em, 16);
$fa-inverse             : #fff !default;

$fa-border-color        : #eee !default;
$fa-border-padding      : .2em .25em .15em !default;
$fa-border-radius       : .1em !default;
$fa-border-style        : solid !default;
$fa-border-width        : .08em !default;

$fa-size-scale-2xs      : 10 !default;
$fa-size-scale-xs       : 12 !default;
$fa-size-scale-sm       : 14 !default;
$fa-size-scale-base     : 16 !default;
$fa-size-scale-lg       : 20 !default;
$fa-size-scale-xl       : 24 !default;
$fa-size-scale-2xl      : 32 !default;

$fa-sizes: (
  "2xs"                 : $fa-size-scale-2xs,
  "xs"                  : $fa-size-scale-xs,
  "sm"                  : $fa-size-scale-sm,
  "lg"                  : $fa-size-scale-lg,
  "xl"                  : $fa-size-scale-xl,
  "2xl"                 : $fa-size-scale-2xl
) !default;

$fa-li-width            : 2em !default;
$fa-li-margin           : $fa-li-width * fa-divide(5, 4) !default;

$fa-pull-margin         : .3em !default;

$fa-primary-opacity     : 1 !default;
$fa-secondary-opacity   : .4 !default;

$fa-stack-vertical-align: middle !default;
$fa-stack-width         : ($fa-fw-width * 2) !default;
$fa-stack-z-index       : auto !default;

$fa-font-display        : block !default;
$fa-font-path           : "../webfonts" !default;

// convenience function used to set content property
@function fa-content($fa-var) {
  @return unquote("\"#{ $fa-var }\"");
}

$fa-var-0: \30;
$fa-var-1: \31;
$fa-var-2: \32;
$fa-var-3: \33;
$fa-var-4: \34;
$fa-var-5: \35;
$fa-var-6: \36;
$fa-var-7: \37;
$fa-var-8: \38;
$fa-var-9: \39;
$fa-var-a: \41;
$fa-var-address-book: \f2b9;
$fa-var-contact-book: \f2b9;
$fa-var-address-card: \f2bb;
$fa-var-contact-card: \f2bb;
$fa-var-vcard: \f2bb;
$fa-var-align-center: \f037;
$fa-var-align-justify: \f039;
$fa-var-align-left: \f036;
$fa-var-align-right: \f038;
$fa-var-anchor: \f13d;
$fa-var-angle-down: \f107;
$fa-var-angle-left: \f104;
$fa-var-angle-right: \f105;
$fa-var-angle-up: \f106;
$fa-var-angles-down: \f103;
$fa-var-angle-double-down: \f103;
$fa-var-angles-left: \f100;
$fa-var-angle-double-left: \f100;
$fa-var-angles-right: \f101;
$fa-var-angle-double-right: \f101;
$fa-var-angles-up: \f102;
$fa-var-angle-double-up: \f102;
$fa-var-ankh: \f644;
$fa-var-apple-whole: \f5d1;
$fa-var-apple-alt: \f5d1;
$fa-var-archway: \f557;
$fa-var-arrow-down: \f063;
$fa-var-arrow-down-1-9: \f162;
$fa-var-sort-numeric-asc: \f162;
$fa-var-sort-numeric-down: \f162;
$fa-var-arrow-down-9-1: \f886;
$fa-var-sort-numeric-desc: \f886;
$fa-var-sort-numeric-down-alt: \f886;
$fa-var-arrow-down-a-z: \f15d;
$fa-var-sort-alpha-asc: \f15d;
$fa-var-sort-alpha-down: \f15d;
$fa-var-arrow-down-long: \f175;
$fa-var-long-arrow-down: \f175;
$fa-var-arrow-down-short-wide: \f884;
$fa-var-sort-amount-desc: \f884;
$fa-var-sort-amount-down-alt: \f884;
$fa-var-arrow-down-wide-short: \f160;
$fa-var-sort-amount-asc: \f160;
$fa-var-sort-amount-down: \f160;
$fa-var-arrow-down-z-a: \f881;
$fa-var-sort-alpha-desc: \f881;
$fa-var-sort-alpha-down-alt: \f881;
$fa-var-arrow-left: \f060;
$fa-var-arrow-left-long: \f177;
$fa-var-long-arrow-left: \f177;
$fa-var-arrow-pointer: \f245;
$fa-var-mouse-pointer: \f245;
$fa-var-arrow-right: \f061;
$fa-var-arrow-right-arrow-left: \f0ec;
$fa-var-exchange: \f0ec;
$fa-var-arrow-right-from-bracket: \f08b;
$fa-var-sign-out: \f08b;
$fa-var-arrow-right-long: \f178;
$fa-var-long-arrow-right: \f178;
$fa-var-arrow-right-to-bracket: \f090;
$fa-var-sign-in: \f090;
$fa-var-arrow-rotate-left: \f0e2;
$fa-var-arrow-left-rotate: \f0e2;
$fa-var-arrow-rotate-back: \f0e2;
$fa-var-arrow-rotate-backward: \f0e2;
$fa-var-undo: \f0e2;
$fa-var-arrow-rotate-right: \f01e;
$fa-var-arrow-right-rotate: \f01e;
$fa-var-arrow-rotate-forward: \f01e;
$fa-var-redo: \f01e;
$fa-var-arrow-trend-down: \e097;
$fa-var-arrow-trend-up: \e098;
$fa-var-arrow-turn-down: \f149;
$fa-var-level-down: \f149;
$fa-var-arrow-turn-up: \f148;
$fa-var-level-up: \f148;
$fa-var-arrow-up: \f062;
$fa-var-arrow-up-1-9: \f163;
$fa-var-sort-numeric-up: \f163;
$fa-var-arrow-up-9-1: \f887;
$fa-var-sort-numeric-up-alt: \f887;
$fa-var-arrow-up-a-z: \f15e;
$fa-var-sort-alpha-up: \f15e;
$fa-var-arrow-up-from-bracket: \e09a;
$fa-var-arrow-up-long: \f176;
$fa-var-long-arrow-up: \f176;
$fa-var-arrow-up-right-from-square: \f08e;
$fa-var-external-link: \f08e;
$fa-var-arrow-up-short-wide: \f885;
$fa-var-sort-amount-up-alt: \f885;
$fa-var-arrow-up-wide-short: \f161;
$fa-var-sort-amount-up: \f161;
$fa-var-arrow-up-z-a: \f882;
$fa-var-sort-alpha-up-alt: \f882;
$fa-var-arrows-left-right: \f07e;
$fa-var-arrows-h: \f07e;
$fa-var-arrows-rotate: \f021;
$fa-var-refresh: \f021;
$fa-var-sync: \f021;
$fa-var-arrows-up-down: \f07d;
$fa-var-arrows-v: \f07d;
$fa-var-arrows-up-down-left-right: \f047;
$fa-var-arrows: \f047;
$fa-var-asterisk: \2a;
$fa-var-at: \40;
$fa-var-atom: \f5d2;
$fa-var-audio-description: \f29e;
$fa-var-austral-sign: \e0a9;
$fa-var-award: \f559;
$fa-var-b: \42;
$fa-var-baby: \f77c;
$fa-var-baby-carriage: \f77d;
$fa-var-carriage-baby: \f77d;
$fa-var-backward: \f04a;
$fa-var-backward-fast: \f049;
$fa-var-fast-backward: \f049;
$fa-var-backward-step: \f048;
$fa-var-step-backward: \f048;
$fa-var-bacon: \f7e5;
$fa-var-bacteria: \e059;
$fa-var-bacterium: \e05a;
$fa-var-bag-shopping: \f290;
$fa-var-shopping-bag: \f290;
$fa-var-bahai: \f666;
$fa-var-baht-sign: \e0ac;
$fa-var-ban: \f05e;
$fa-var-cancel: \f05e;
$fa-var-ban-smoking: \f54d;
$fa-var-smoking-ban: \f54d;
$fa-var-bandage: \f462;
$fa-var-band-aid: \f462;
$fa-var-barcode: \f02a;
$fa-var-bars: \f0c9;
$fa-var-navicon: \f0c9;
$fa-var-bars-progress: \f828;
$fa-var-tasks-alt: \f828;
$fa-var-bars-staggered: \f550;
$fa-var-reorder: \f550;
$fa-var-stream: \f550;
$fa-var-baseball: \f433;
$fa-var-baseball-ball: \f433;
$fa-var-baseball-bat-ball: \f432;
$fa-var-basket-shopping: \f291;
$fa-var-shopping-basket: \f291;
$fa-var-basketball: \f434;
$fa-var-basketball-ball: \f434;
$fa-var-bath: \f2cd;
$fa-var-bathtub: \f2cd;
$fa-var-battery-empty: \f244;
$fa-var-battery-0: \f244;
$fa-var-battery-full: \f240;
$fa-var-battery: \f240;
$fa-var-battery-5: \f240;
$fa-var-battery-half: \f242;
$fa-var-battery-3: \f242;
$fa-var-battery-quarter: \f243;
$fa-var-battery-2: \f243;
$fa-var-battery-three-quarters: \f241;
$fa-var-battery-4: \f241;
$fa-var-bed: \f236;
$fa-var-bed-pulse: \f487;
$fa-var-procedures: \f487;
$fa-var-beer-mug-empty: \f0fc;
$fa-var-beer: \f0fc;
$fa-var-bell: \f0f3;
$fa-var-bell-concierge: \f562;
$fa-var-concierge-bell: \f562;
$fa-var-bell-slash: \f1f6;
$fa-var-bezier-curve: \f55b;
$fa-var-bicycle: \f206;
$fa-var-binoculars: \f1e5;
$fa-var-biohazard: \f780;
$fa-var-bitcoin-sign: \e0b4;
$fa-var-blender: \f517;
$fa-var-blender-phone: \f6b6;
$fa-var-blog: \f781;
$fa-var-bold: \f032;
$fa-var-bolt: \f0e7;
$fa-var-zap: \f0e7;
$fa-var-bolt-lightning: \e0b7;
$fa-var-bomb: \f1e2;
$fa-var-bone: \f5d7;
$fa-var-bong: \f55c;
$fa-var-book: \f02d;
$fa-var-book-atlas: \f558;
$fa-var-atlas: \f558;
$fa-var-book-bible: \f647;
$fa-var-bible: \f647;
$fa-var-book-journal-whills: \f66a;
$fa-var-journal-whills: \f66a;
$fa-var-book-medical: \f7e6;
$fa-var-book-open: \f518;
$fa-var-book-open-reader: \f5da;
$fa-var-book-reader: \f5da;
$fa-var-book-quran: \f687;
$fa-var-quran: \f687;
$fa-var-book-skull: \f6b7;
$fa-var-book-dead: \f6b7;
$fa-var-bookmark: \f02e;
$fa-var-border-all: \f84c;
$fa-var-border-none: \f850;
$fa-var-border-top-left: \f853;
$fa-var-border-style: \f853;
$fa-var-bowling-ball: \f436;
$fa-var-box: \f466;
$fa-var-box-archive: \f187;
$fa-var-archive: \f187;
$fa-var-box-open: \f49e;
$fa-var-box-tissue: \e05b;
$fa-var-boxes-stacked: \f468;
$fa-var-boxes: \f468;
$fa-var-boxes-alt: \f468;
$fa-var-braille: \f2a1;
$fa-var-brain: \f5dc;
$fa-var-brazilian-real-sign: \e46c;
$fa-var-bread-slice: \f7ec;
$fa-var-briefcase: \f0b1;
$fa-var-briefcase-medical: \f469;
$fa-var-broom: \f51a;
$fa-var-broom-ball: \f458;
$fa-var-quidditch: \f458;
$fa-var-quidditch-broom-ball: \f458;
$fa-var-brush: \f55d;
$fa-var-bug: \f188;
$fa-var-bug-slash: \e490;
$fa-var-building: \f1ad;
$fa-var-building-columns: \f19c;
$fa-var-bank: \f19c;
$fa-var-institution: \f19c;
$fa-var-museum: \f19c;
$fa-var-university: \f19c;
$fa-var-bullhorn: \f0a1;
$fa-var-bullseye: \f140;
$fa-var-burger: \f805;
$fa-var-hamburger: \f805;
$fa-var-bus: \f207;
$fa-var-bus-simple: \f55e;
$fa-var-bus-alt: \f55e;
$fa-var-business-time: \f64a;
$fa-var-briefcase-clock: \f64a;
$fa-var-c: \43;
$fa-var-cake-candles: \f1fd;
$fa-var-birthday-cake: \f1fd;
$fa-var-cake: \f1fd;
$fa-var-calculator: \f1ec;
$fa-var-calendar: \f133;
$fa-var-calendar-check: \f274;
$fa-var-calendar-day: \f783;
$fa-var-calendar-days: \f073;
$fa-var-calendar-alt: \f073;
$fa-var-calendar-minus: \f272;
$fa-var-calendar-plus: \f271;
$fa-var-calendar-week: \f784;
$fa-var-calendar-xmark: \f273;
$fa-var-calendar-times: \f273;
$fa-var-camera: \f030;
$fa-var-camera-alt: \f030;
$fa-var-camera-retro: \f083;
$fa-var-camera-rotate: \e0d8;
$fa-var-campground: \f6bb;
$fa-var-candy-cane: \f786;
$fa-var-cannabis: \f55f;
$fa-var-capsules: \f46b;
$fa-var-car: \f1b9;
$fa-var-automobile: \f1b9;
$fa-var-car-battery: \f5df;
$fa-var-battery-car: \f5df;
$fa-var-car-crash: \f5e1;
$fa-var-car-rear: \f5de;
$fa-var-car-alt: \f5de;
$fa-var-car-side: \f5e4;
$fa-var-caravan: \f8ff;
$fa-var-caret-down: \f0d7;
$fa-var-caret-left: \f0d9;
$fa-var-caret-right: \f0da;
$fa-var-caret-up: \f0d8;
$fa-var-carrot: \f787;
$fa-var-cart-arrow-down: \f218;
$fa-var-cart-flatbed: \f474;
$fa-var-dolly-flatbed: \f474;
$fa-var-cart-flatbed-suitcase: \f59d;
$fa-var-luggage-cart: \f59d;
$fa-var-cart-plus: \f217;
$fa-var-cart-shopping: \f07a;
$fa-var-shopping-cart: \f07a;
$fa-var-cash-register: \f788;
$fa-var-cat: \f6be;
$fa-var-cedi-sign: \e0df;
$fa-var-cent-sign: \e3f5;
$fa-var-certificate: \f0a3;
$fa-var-chair: \f6c0;
$fa-var-chalkboard: \f51b;
$fa-var-blackboard: \f51b;
$fa-var-chalkboard-user: \f51c;
$fa-var-chalkboard-teacher: \f51c;
$fa-var-champagne-glasses: \f79f;
$fa-var-glass-cheers: \f79f;
$fa-var-charging-station: \f5e7;
$fa-var-chart-area: \f1fe;
$fa-var-area-chart: \f1fe;
$fa-var-chart-bar: \f080;
$fa-var-bar-chart: \f080;
$fa-var-chart-column: \e0e3;
$fa-var-chart-gantt: \e0e4;
$fa-var-chart-line: \f201;
$fa-var-line-chart: \f201;
$fa-var-chart-pie: \f200;
$fa-var-pie-chart: \f200;
$fa-var-check: \f00c;
$fa-var-check-double: \f560;
$fa-var-check-to-slot: \f772;
$fa-var-vote-yea: \f772;
$fa-var-cheese: \f7ef;
$fa-var-chess: \f439;
$fa-var-chess-bishop: \f43a;
$fa-var-chess-board: \f43c;
$fa-var-chess-king: \f43f;
$fa-var-chess-knight: \f441;
$fa-var-chess-pawn: \f443;
$fa-var-chess-queen: \f445;
$fa-var-chess-rook: \f447;
$fa-var-chevron-down: \f078;
$fa-var-chevron-left: \f053;
$fa-var-chevron-right: \f054;
$fa-var-chevron-up: \f077;
$fa-var-child: \f1ae;
$fa-var-church: \f51d;
$fa-var-circle: \f111;
$fa-var-circle-arrow-down: \f0ab;
$fa-var-arrow-circle-down: \f0ab;
$fa-var-circle-arrow-left: \f0a8;
$fa-var-arrow-circle-left: \f0a8;
$fa-var-circle-arrow-right: \f0a9;
$fa-var-arrow-circle-right: \f0a9;
$fa-var-circle-arrow-up: \f0aa;
$fa-var-arrow-circle-up: \f0aa;
$fa-var-circle-check: \f058;
$fa-var-check-circle: \f058;
$fa-var-circle-chevron-down: \f13a;
$fa-var-chevron-circle-down: \f13a;
$fa-var-circle-chevron-left: \f137;
$fa-var-chevron-circle-left: \f137;
$fa-var-circle-chevron-right: \f138;
$fa-var-chevron-circle-right: \f138;
$fa-var-circle-chevron-up: \f139;
$fa-var-chevron-circle-up: \f139;
$fa-var-circle-dollar-to-slot: \f4b9;
$fa-var-donate: \f4b9;
$fa-var-circle-dot: \f192;
$fa-var-dot-circle: \f192;
$fa-var-circle-down: \f358;
$fa-var-arrow-alt-circle-down: \f358;
$fa-var-circle-exclamation: \f06a;
$fa-var-exclamation-circle: \f06a;
$fa-var-circle-h: \f47e;
$fa-var-hospital-symbol: \f47e;
$fa-var-circle-half-stroke: \f042;
$fa-var-adjust: \f042;
$fa-var-circle-info: \f05a;
$fa-var-info-circle: \f05a;
$fa-var-circle-left: \f359;
$fa-var-arrow-alt-circle-left: \f359;
$fa-var-circle-minus: \f056;
$fa-var-minus-circle: \f056;
$fa-var-circle-notch: \f1ce;
$fa-var-circle-pause: \f28b;
$fa-var-pause-circle: \f28b;
$fa-var-circle-play: \f144;
$fa-var-play-circle: \f144;
$fa-var-circle-plus: \f055;
$fa-var-plus-circle: \f055;
$fa-var-circle-question: \f059;
$fa-var-question-circle: \f059;
$fa-var-circle-radiation: \f7ba;
$fa-var-radiation-alt: \f7ba;
$fa-var-circle-right: \f35a;
$fa-var-arrow-alt-circle-right: \f35a;
$fa-var-circle-stop: \f28d;
$fa-var-stop-circle: \f28d;
$fa-var-circle-up: \f35b;
$fa-var-arrow-alt-circle-up: \f35b;
$fa-var-circle-user: \f2bd;
$fa-var-user-circle: \f2bd;
$fa-var-circle-xmark: \f057;
$fa-var-times-circle: \f057;
$fa-var-xmark-circle: \f057;
$fa-var-city: \f64f;
$fa-var-clapperboard: \e131;
$fa-var-clipboard: \f328;
$fa-var-clipboard-check: \f46c;
$fa-var-clipboard-list: \f46d;
$fa-var-clock: \f017;
$fa-var-clock-four: \f017;
$fa-var-clock-rotate-left: \f1da;
$fa-var-history: \f1da;
$fa-var-clone: \f24d;
$fa-var-closed-captioning: \f20a;
$fa-var-cloud: \f0c2;
$fa-var-cloud-arrow-down: \f0ed;
$fa-var-cloud-download: \f0ed;
$fa-var-cloud-download-alt: \f0ed;
$fa-var-cloud-arrow-up: \f0ee;
$fa-var-cloud-upload: \f0ee;
$fa-var-cloud-upload-alt: \f0ee;
$fa-var-cloud-meatball: \f73b;
$fa-var-cloud-moon: \f6c3;
$fa-var-cloud-moon-rain: \f73c;
$fa-var-cloud-rain: \f73d;
$fa-var-cloud-showers-heavy: \f740;
$fa-var-cloud-sun: \f6c4;
$fa-var-cloud-sun-rain: \f743;
$fa-var-clover: \e139;
$fa-var-code: \f121;
$fa-var-code-branch: \f126;
$fa-var-code-commit: \f386;
$fa-var-code-compare: \e13a;
$fa-var-code-fork: \e13b;
$fa-var-code-merge: \f387;
$fa-var-code-pull-request: \e13c;
$fa-var-coins: \f51e;
$fa-var-colon-sign: \e140;
$fa-var-comment: \f075;
$fa-var-comment-dollar: \f651;
$fa-var-comment-dots: \f4ad;
$fa-var-commenting: \f4ad;
$fa-var-comment-medical: \f7f5;
$fa-var-comment-slash: \f4b3;
$fa-var-comment-sms: \f7cd;
$fa-var-sms: \f7cd;
$fa-var-comments: \f086;
$fa-var-comments-dollar: \f653;
$fa-var-compact-disc: \f51f;
$fa-var-compass: \f14e;
$fa-var-compass-drafting: \f568;
$fa-var-drafting-compass: \f568;
$fa-var-compress: \f066;
$fa-var-computer-mouse: \f8cc;
$fa-var-mouse: \f8cc;
$fa-var-cookie: \f563;
$fa-var-cookie-bite: \f564;
$fa-var-copy: \f0c5;
$fa-var-copyright: \f1f9;
$fa-var-couch: \f4b8;
$fa-var-credit-card: \f09d;
$fa-var-credit-card-alt: \f09d;
$fa-var-crop: \f125;
$fa-var-crop-simple: \f565;
$fa-var-crop-alt: \f565;
$fa-var-cross: \f654;
$fa-var-crosshairs: \f05b;
$fa-var-crow: \f520;
$fa-var-crown: \f521;
$fa-var-crutch: \f7f7;
$fa-var-cruzeiro-sign: \e152;
$fa-var-cube: \f1b2;
$fa-var-cubes: \f1b3;
$fa-var-d: \44;
$fa-var-database: \f1c0;
$fa-var-delete-left: \f55a;
$fa-var-backspace: \f55a;
$fa-var-democrat: \f747;
$fa-var-desktop: \f390;
$fa-var-desktop-alt: \f390;
$fa-var-dharmachakra: \f655;
$fa-var-diagram-next: \e476;
$fa-var-diagram-predecessor: \e477;
$fa-var-diagram-project: \f542;
$fa-var-project-diagram: \f542;
$fa-var-diagram-successor: \e47a;
$fa-var-diamond: \f219;
$fa-var-diamond-turn-right: \f5eb;
$fa-var-directions: \f5eb;
$fa-var-dice: \f522;
$fa-var-dice-d20: \f6cf;
$fa-var-dice-d6: \f6d1;
$fa-var-dice-five: \f523;
$fa-var-dice-four: \f524;
$fa-var-dice-one: \f525;
$fa-var-dice-six: \f526;
$fa-var-dice-three: \f527;
$fa-var-dice-two: \f528;
$fa-var-disease: \f7fa;
$fa-var-divide: \f529;
$fa-var-dna: \f471;
$fa-var-dog: \f6d3;
$fa-var-dollar-sign: \24;
$fa-var-dollar: \24;
$fa-var-usd: \24;
$fa-var-dolly: \f472;
$fa-var-dolly-box: \f472;
$fa-var-dong-sign: \e169;
$fa-var-door-closed: \f52a;
$fa-var-door-open: \f52b;
$fa-var-dove: \f4ba;
$fa-var-down-left-and-up-right-to-center: \f422;
$fa-var-compress-alt: \f422;
$fa-var-down-long: \f309;
$fa-var-long-arrow-alt-down: \f309;
$fa-var-download: \f019;
$fa-var-dragon: \f6d5;
$fa-var-draw-polygon: \f5ee;
$fa-var-droplet: \f043;
$fa-var-tint: \f043;
$fa-var-droplet-slash: \f5c7;
$fa-var-tint-slash: \f5c7;
$fa-var-drum: \f569;
$fa-var-drum-steelpan: \f56a;
$fa-var-drumstick-bite: \f6d7;
$fa-var-dumbbell: \f44b;
$fa-var-dumpster: \f793;
$fa-var-dumpster-fire: \f794;
$fa-var-dungeon: \f6d9;
$fa-var-e: \45;
$fa-var-ear-deaf: \f2a4;
$fa-var-deaf: \f2a4;
$fa-var-deafness: \f2a4;
$fa-var-hard-of-hearing: \f2a4;
$fa-var-ear-listen: \f2a2;
$fa-var-assistive-listening-systems: \f2a2;
$fa-var-earth-africa: \f57c;
$fa-var-globe-africa: \f57c;
$fa-var-earth-americas: \f57d;
$fa-var-earth: \f57d;
$fa-var-earth-america: \f57d;
$fa-var-globe-americas: \f57d;
$fa-var-earth-asia: \f57e;
$fa-var-globe-asia: \f57e;
$fa-var-earth-europe: \f7a2;
$fa-var-globe-europe: \f7a2;
$fa-var-earth-oceania: \e47b;
$fa-var-globe-oceania: \e47b;
$fa-var-egg: \f7fb;
$fa-var-eject: \f052;
$fa-var-elevator: \e16d;
$fa-var-ellipsis: \f141;
$fa-var-ellipsis-h: \f141;
$fa-var-ellipsis-vertical: \f142;
$fa-var-ellipsis-v: \f142;
$fa-var-envelope: \f0e0;
$fa-var-envelope-open: \f2b6;
$fa-var-envelope-open-text: \f658;
$fa-var-envelopes-bulk: \f674;
$fa-var-mail-bulk: \f674;
$fa-var-equals: \3d;
$fa-var-eraser: \f12d;
$fa-var-ethernet: \f796;
$fa-var-euro-sign: \f153;
$fa-var-eur: \f153;
$fa-var-euro: \f153;
$fa-var-exclamation: \21;
$fa-var-expand: \f065;
$fa-var-eye: \f06e;
$fa-var-eye-dropper: \f1fb;
$fa-var-eye-dropper-empty: \f1fb;
$fa-var-eyedropper: \f1fb;
$fa-var-eye-low-vision: \f2a8;
$fa-var-low-vision: \f2a8;
$fa-var-eye-slash: \f070;
$fa-var-f: \46;
$fa-var-face-angry: \f556;
$fa-var-angry: \f556;
$fa-var-face-dizzy: \f567;
$fa-var-dizzy: \f567;
$fa-var-face-flushed: \f579;
$fa-var-flushed: \f579;
$fa-var-face-frown: \f119;
$fa-var-frown: \f119;
$fa-var-face-frown-open: \f57a;
$fa-var-frown-open: \f57a;
$fa-var-face-grimace: \f57f;
$fa-var-grimace: \f57f;
$fa-var-face-grin: \f580;
$fa-var-grin: \f580;
$fa-var-face-grin-beam: \f582;
$fa-var-grin-beam: \f582;
$fa-var-face-grin-beam-sweat: \f583;
$fa-var-grin-beam-sweat: \f583;
$fa-var-face-grin-hearts: \f584;
$fa-var-grin-hearts: \f584;
$fa-var-face-grin-squint: \f585;
$fa-var-grin-squint: \f585;
$fa-var-face-grin-squint-tears: \f586;
$fa-var-grin-squint-tears: \f586;
$fa-var-face-grin-stars: \f587;
$fa-var-grin-stars: \f587;
$fa-var-face-grin-tears: \f588;
$fa-var-grin-tears: \f588;
$fa-var-face-grin-tongue: \f589;
$fa-var-grin-tongue: \f589;
$fa-var-face-grin-tongue-squint: \f58a;
$fa-var-grin-tongue-squint: \f58a;
$fa-var-face-grin-tongue-wink: \f58b;
$fa-var-grin-tongue-wink: \f58b;
$fa-var-face-grin-wide: \f581;
$fa-var-grin-alt: \f581;
$fa-var-face-grin-wink: \f58c;
$fa-var-grin-wink: \f58c;
$fa-var-face-kiss: \f596;
$fa-var-kiss: \f596;
$fa-var-face-kiss-beam: \f597;
$fa-var-kiss-beam: \f597;
$fa-var-face-kiss-wink-heart: \f598;
$fa-var-kiss-wink-heart: \f598;
$fa-var-face-laugh: \f599;
$fa-var-laugh: \f599;
$fa-var-face-laugh-beam: \f59a;
$fa-var-laugh-beam: \f59a;
$fa-var-face-laugh-squint: \f59b;
$fa-var-laugh-squint: \f59b;
$fa-var-face-laugh-wink: \f59c;
$fa-var-laugh-wink: \f59c;
$fa-var-face-meh: \f11a;
$fa-var-meh: \f11a;
$fa-var-face-meh-blank: \f5a4;
$fa-var-meh-blank: \f5a4;
$fa-var-face-rolling-eyes: \f5a5;
$fa-var-meh-rolling-eyes: \f5a5;
$fa-var-face-sad-cry: \f5b3;
$fa-var-sad-cry: \f5b3;
$fa-var-face-sad-tear: \f5b4;
$fa-var-sad-tear: \f5b4;
$fa-var-face-smile: \f118;
$fa-var-smile: \f118;
$fa-var-face-smile-beam: \f5b8;
$fa-var-smile-beam: \f5b8;
$fa-var-face-smile-wink: \f4da;
$fa-var-smile-wink: \f4da;
$fa-var-face-surprise: \f5c2;
$fa-var-surprise: \f5c2;
$fa-var-face-tired: \f5c8;
$fa-var-tired: \f5c8;
$fa-var-fan: \f863;
$fa-var-faucet: \e005;
$fa-var-fax: \f1ac;
$fa-var-feather: \f52d;
$fa-var-feather-pointed: \f56b;
$fa-var-feather-alt: \f56b;
$fa-var-file: \f15b;
$fa-var-file-arrow-down: \f56d;
$fa-var-file-download: \f56d;
$fa-var-file-arrow-up: \f574;
$fa-var-file-upload: \f574;
$fa-var-file-audio: \f1c7;
$fa-var-file-code: \f1c9;
$fa-var-file-contract: \f56c;
$fa-var-file-csv: \f6dd;
$fa-var-file-excel: \f1c3;
$fa-var-file-export: \f56e;
$fa-var-arrow-right-from-file: \f56e;
$fa-var-file-image: \f1c5;
$fa-var-file-import: \f56f;
$fa-var-arrow-right-to-file: \f56f;
$fa-var-file-invoice: \f570;
$fa-var-file-invoice-dollar: \f571;
$fa-var-file-lines: \f15c;
$fa-var-file-alt: \f15c;
$fa-var-file-text: \f15c;
$fa-var-file-medical: \f477;
$fa-var-file-pdf: \f1c1;
$fa-var-file-powerpoint: \f1c4;
$fa-var-file-prescription: \f572;
$fa-var-file-signature: \f573;
$fa-var-file-video: \f1c8;
$fa-var-file-waveform: \f478;
$fa-var-file-medical-alt: \f478;
$fa-var-file-word: \f1c2;
$fa-var-file-zipper: \f1c6;
$fa-var-file-archive: \f1c6;
$fa-var-fill: \f575;
$fa-var-fill-drip: \f576;
$fa-var-film: \f008;
$fa-var-filter: \f0b0;
$fa-var-filter-circle-dollar: \f662;
$fa-var-funnel-dollar: \f662;
$fa-var-filter-circle-xmark: \e17b;
$fa-var-fingerprint: \f577;
$fa-var-fire: \f06d;
$fa-var-fire-extinguisher: \f134;
$fa-var-fire-flame-curved: \f7e4;
$fa-var-fire-alt: \f7e4;
$fa-var-fire-flame-simple: \f46a;
$fa-var-burn: \f46a;
$fa-var-fish: \f578;
$fa-var-flag: \f024;
$fa-var-flag-checkered: \f11e;
$fa-var-flag-usa: \f74d;
$fa-var-flask: \f0c3;
$fa-var-floppy-disk: \f0c7;
$fa-var-save: \f0c7;
$fa-var-florin-sign: \e184;
$fa-var-folder: \f07b;
$fa-var-folder-minus: \f65d;
$fa-var-folder-open: \f07c;
$fa-var-folder-plus: \f65e;
$fa-var-folder-tree: \f802;
$fa-var-font: \f031;
$fa-var-football: \f44e;
$fa-var-football-ball: \f44e;
$fa-var-forward: \f04e;
$fa-var-forward-fast: \f050;
$fa-var-fast-forward: \f050;
$fa-var-forward-step: \f051;
$fa-var-step-forward: \f051;
$fa-var-franc-sign: \e18f;
$fa-var-frog: \f52e;
$fa-var-futbol: \f1e3;
$fa-var-futbol-ball: \f1e3;
$fa-var-soccer-ball: \f1e3;
$fa-var-g: \47;
$fa-var-gamepad: \f11b;
$fa-var-gas-pump: \f52f;
$fa-var-gauge: \f624;
$fa-var-dashboard: \f624;
$fa-var-gauge-med: \f624;
$fa-var-tachometer-alt-average: \f624;
$fa-var-gauge-high: \f625;
$fa-var-tachometer-alt: \f625;
$fa-var-tachometer-alt-fast: \f625;
$fa-var-gauge-simple: \f629;
$fa-var-gauge-simple-med: \f629;
$fa-var-tachometer-average: \f629;
$fa-var-gauge-simple-high: \f62a;
$fa-var-tachometer: \f62a;
$fa-var-tachometer-fast: \f62a;
$fa-var-gavel: \f0e3;
$fa-var-legal: \f0e3;
$fa-var-gear: \f013;
$fa-var-cog: \f013;
$fa-var-gears: \f085;
$fa-var-cogs: \f085;
$fa-var-gem: \f3a5;
$fa-var-genderless: \f22d;
$fa-var-ghost: \f6e2;
$fa-var-gift: \f06b;
$fa-var-gifts: \f79c;
$fa-var-glasses: \f530;
$fa-var-globe: \f0ac;
$fa-var-golf-ball-tee: \f450;
$fa-var-golf-ball: \f450;
$fa-var-gopuram: \f664;
$fa-var-graduation-cap: \f19d;
$fa-var-mortar-board: \f19d;
$fa-var-greater-than: \3e;
$fa-var-greater-than-equal: \f532;
$fa-var-grip: \f58d;
$fa-var-grip-horizontal: \f58d;
$fa-var-grip-lines: \f7a4;
$fa-var-grip-lines-vertical: \f7a5;
$fa-var-grip-vertical: \f58e;
$fa-var-guarani-sign: \e19a;
$fa-var-guitar: \f7a6;
$fa-var-gun: \e19b;
$fa-var-h: \48;
$fa-var-hammer: \f6e3;
$fa-var-hamsa: \f665;
$fa-var-hand: \f256;
$fa-var-hand-paper: \f256;
$fa-var-hand-back-fist: \f255;
$fa-var-hand-rock: \f255;
$fa-var-hand-dots: \f461;
$fa-var-allergies: \f461;
$fa-var-hand-fist: \f6de;
$fa-var-fist-raised: \f6de;
$fa-var-hand-holding: \f4bd;
$fa-var-hand-holding-dollar: \f4c0;
$fa-var-hand-holding-usd: \f4c0;
$fa-var-hand-holding-droplet: \f4c1;
$fa-var-hand-holding-water: \f4c1;
$fa-var-hand-holding-heart: \f4be;
$fa-var-hand-holding-medical: \e05c;
$fa-var-hand-lizard: \f258;
$fa-var-hand-middle-finger: \f806;
$fa-var-hand-peace: \f25b;
$fa-var-hand-point-down: \f0a7;
$fa-var-hand-point-left: \f0a5;
$fa-var-hand-point-right: \f0a4;
$fa-var-hand-point-up: \f0a6;
$fa-var-hand-pointer: \f25a;
$fa-var-hand-scissors: \f257;
$fa-var-hand-sparkles: \e05d;
$fa-var-hand-spock: \f259;
$fa-var-hands: \f2a7;
$fa-var-sign-language: \f2a7;
$fa-var-signing: \f2a7;
$fa-var-hands-asl-interpreting: \f2a3;
$fa-var-american-sign-language-interpreting: \f2a3;
$fa-var-asl-interpreting: \f2a3;
$fa-var-hands-american-sign-language-interpreting: \f2a3;
$fa-var-hands-bubbles: \e05e;
$fa-var-hands-wash: \e05e;
$fa-var-hands-clapping: \e1a8;
$fa-var-hands-holding: \f4c2;
$fa-var-hands-praying: \f684;
$fa-var-praying-hands: \f684;
$fa-var-handshake: \f2b5;
$fa-var-handshake-angle: \f4c4;
$fa-var-hands-helping: \f4c4;
$fa-var-handshake-simple-slash: \e05f;
$fa-var-handshake-alt-slash: \e05f;
$fa-var-handshake-slash: \e060;
$fa-var-hanukiah: \f6e6;
$fa-var-hard-drive: \f0a0;
$fa-var-hdd: \f0a0;
$fa-var-hashtag: \23;
$fa-var-hat-cowboy: \f8c0;
$fa-var-hat-cowboy-side: \f8c1;
$fa-var-hat-wizard: \f6e8;
$fa-var-head-side-cough: \e061;
$fa-var-head-side-cough-slash: \e062;
$fa-var-head-side-mask: \e063;
$fa-var-head-side-virus: \e064;
$fa-var-heading: \f1dc;
$fa-var-header: \f1dc;
$fa-var-headphones: \f025;
$fa-var-headphones-simple: \f58f;
$fa-var-headphones-alt: \f58f;
$fa-var-headset: \f590;
$fa-var-heart: \f004;
$fa-var-heart-crack: \f7a9;
$fa-var-heart-broken: \f7a9;
$fa-var-heart-pulse: \f21e;
$fa-var-heartbeat: \f21e;
$fa-var-helicopter: \f533;
$fa-var-helmet-safety: \f807;
$fa-var-hard-hat: \f807;
$fa-var-hat-hard: \f807;
$fa-var-highlighter: \f591;
$fa-var-hippo: \f6ed;
$fa-var-hockey-puck: \f453;
$fa-var-holly-berry: \f7aa;
$fa-var-horse: \f6f0;
$fa-var-horse-head: \f7ab;
$fa-var-hospital: \f0f8;
$fa-var-hospital-alt: \f0f8;
$fa-var-hospital-wide: \f0f8;
$fa-var-hospital-user: \f80d;
$fa-var-hot-tub-person: \f593;
$fa-var-hot-tub: \f593;
$fa-var-hotdog: \f80f;
$fa-var-hotel: \f594;
$fa-var-hourglass: \f254;
$fa-var-hourglass-2: \f254;
$fa-var-hourglass-half: \f254;
$fa-var-hourglass-empty: \f252;
$fa-var-hourglass-end: \f253;
$fa-var-hourglass-3: \f253;
$fa-var-hourglass-start: \f251;
$fa-var-hourglass-1: \f251;
$fa-var-house: \f015;
$fa-var-home: \f015;
$fa-var-home-alt: \f015;
$fa-var-home-lg-alt: \f015;
$fa-var-house-chimney: \e3af;
$fa-var-home-lg: \e3af;
$fa-var-house-chimney-crack: \f6f1;
$fa-var-house-damage: \f6f1;
$fa-var-house-chimney-medical: \f7f2;
$fa-var-clinic-medical: \f7f2;
$fa-var-house-chimney-user: \e065;
$fa-var-house-chimney-window: \e00d;
$fa-var-house-crack: \e3b1;
$fa-var-house-laptop: \e066;
$fa-var-laptop-house: \e066;
$fa-var-house-medical: \e3b2;
$fa-var-house-user: \e1b0;
$fa-var-home-user: \e1b0;
$fa-var-hryvnia-sign: \f6f2;
$fa-var-hryvnia: \f6f2;
$fa-var-i: \49;
$fa-var-i-cursor: \f246;
$fa-var-ice-cream: \f810;
$fa-var-icicles: \f7ad;
$fa-var-icons: \f86d;
$fa-var-heart-music-camera-bolt: \f86d;
$fa-var-id-badge: \f2c1;
$fa-var-id-card: \f2c2;
$fa-var-drivers-license: \f2c2;
$fa-var-id-card-clip: \f47f;
$fa-var-id-card-alt: \f47f;
$fa-var-igloo: \f7ae;
$fa-var-image: \f03e;
$fa-var-image-portrait: \f3e0;
$fa-var-portrait: \f3e0;
$fa-var-images: \f302;
$fa-var-inbox: \f01c;
$fa-var-indent: \f03c;
$fa-var-indian-rupee-sign: \e1bc;
$fa-var-indian-rupee: \e1bc;
$fa-var-inr: \e1bc;
$fa-var-industry: \f275;
$fa-var-infinity: \f534;
$fa-var-info: \f129;
$fa-var-italic: \f033;
$fa-var-j: \4a;
$fa-var-jedi: \f669;
$fa-var-jet-fighter: \f0fb;
$fa-var-fighter-jet: \f0fb;
$fa-var-joint: \f595;
$fa-var-k: \4b;
$fa-var-kaaba: \f66b;
$fa-var-key: \f084;
$fa-var-keyboard: \f11c;
$fa-var-khanda: \f66d;
$fa-var-kip-sign: \e1c4;
$fa-var-kit-medical: \f479;
$fa-var-first-aid: \f479;
$fa-var-kiwi-bird: \f535;
$fa-var-l: \4c;
$fa-var-landmark: \f66f;
$fa-var-language: \f1ab;
$fa-var-laptop: \f109;
$fa-var-laptop-code: \f5fc;
$fa-var-laptop-medical: \f812;
$fa-var-lari-sign: \e1c8;
$fa-var-layer-group: \f5fd;
$fa-var-leaf: \f06c;
$fa-var-left-long: \f30a;
$fa-var-long-arrow-alt-left: \f30a;
$fa-var-left-right: \f337;
$fa-var-arrows-alt-h: \f337;
$fa-var-lemon: \f094;
$fa-var-less-than: \3c;
$fa-var-less-than-equal: \f537;
$fa-var-life-ring: \f1cd;
$fa-var-lightbulb: \f0eb;
$fa-var-link: \f0c1;
$fa-var-chain: \f0c1;
$fa-var-link-slash: \f127;
$fa-var-chain-broken: \f127;
$fa-var-chain-slash: \f127;
$fa-var-unlink: \f127;
$fa-var-lira-sign: \f195;
$fa-var-list: \f03a;
$fa-var-list-squares: \f03a;
$fa-var-list-check: \f0ae;
$fa-var-tasks: \f0ae;
$fa-var-list-ol: \f0cb;
$fa-var-list-1-2: \f0cb;
$fa-var-list-numeric: \f0cb;
$fa-var-list-ul: \f0ca;
$fa-var-list-dots: \f0ca;
$fa-var-litecoin-sign: \e1d3;
$fa-var-location-arrow: \f124;
$fa-var-location-crosshairs: \f601;
$fa-var-location: \f601;
$fa-var-location-dot: \f3c5;
$fa-var-map-marker-alt: \f3c5;
$fa-var-location-pin: \f041;
$fa-var-map-marker: \f041;
$fa-var-lock: \f023;
$fa-var-lock-open: \f3c1;
$fa-var-lungs: \f604;
$fa-var-lungs-virus: \e067;
$fa-var-m: \4d;
$fa-var-magnet: \f076;
$fa-var-magnifying-glass: \f002;
$fa-var-search: \f002;
$fa-var-magnifying-glass-dollar: \f688;
$fa-var-search-dollar: \f688;
$fa-var-magnifying-glass-location: \f689;
$fa-var-search-location: \f689;
$fa-var-magnifying-glass-minus: \f010;
$fa-var-search-minus: \f010;
$fa-var-magnifying-glass-plus: \f00e;
$fa-var-search-plus: \f00e;
$fa-var-manat-sign: \e1d5;
$fa-var-map: \f279;
$fa-var-map-location: \f59f;
$fa-var-map-marked: \f59f;
$fa-var-map-location-dot: \f5a0;
$fa-var-map-marked-alt: \f5a0;
$fa-var-map-pin: \f276;
$fa-var-marker: \f5a1;
$fa-var-mars: \f222;
$fa-var-mars-and-venus: \f224;
$fa-var-mars-double: \f227;
$fa-var-mars-stroke: \f229;
$fa-var-mars-stroke-right: \f22b;
$fa-var-mars-stroke-h: \f22b;
$fa-var-mars-stroke-up: \f22a;
$fa-var-mars-stroke-v: \f22a;
$fa-var-martini-glass: \f57b;
$fa-var-glass-martini-alt: \f57b;
$fa-var-martini-glass-citrus: \f561;
$fa-var-cocktail: \f561;
$fa-var-martini-glass-empty: \f000;
$fa-var-glass-martini: \f000;
$fa-var-mask: \f6fa;
$fa-var-mask-face: \e1d7;
$fa-var-masks-theater: \f630;
$fa-var-theater-masks: \f630;
$fa-var-maximize: \f31e;
$fa-var-expand-arrows-alt: \f31e;
$fa-var-medal: \f5a2;
$fa-var-memory: \f538;
$fa-var-menorah: \f676;
$fa-var-mercury: \f223;
$fa-var-message: \f27a;
$fa-var-comment-alt: \f27a;
$fa-var-meteor: \f753;
$fa-var-microchip: \f2db;
$fa-var-microphone: \f130;
$fa-var-microphone-lines: \f3c9;
$fa-var-microphone-alt: \f3c9;
$fa-var-microphone-lines-slash: \f539;
$fa-var-microphone-alt-slash: \f539;
$fa-var-microphone-slash: \f131;
$fa-var-microscope: \f610;
$fa-var-mill-sign: \e1ed;
$fa-var-minimize: \f78c;
$fa-var-compress-arrows-alt: \f78c;
$fa-var-minus: \f068;
$fa-var-subtract: \f068;
$fa-var-mitten: \f7b5;
$fa-var-mobile: \f3ce;
$fa-var-mobile-android: \f3ce;
$fa-var-mobile-phone: \f3ce;
$fa-var-mobile-button: \f10b;
$fa-var-mobile-screen-button: \f3cd;
$fa-var-mobile-alt: \f3cd;
$fa-var-money-bill: \f0d6;
$fa-var-money-bill-1: \f3d1;
$fa-var-money-bill-alt: \f3d1;
$fa-var-money-bill-1-wave: \f53b;
$fa-var-money-bill-wave-alt: \f53b;
$fa-var-money-bill-wave: \f53a;
$fa-var-money-check: \f53c;
$fa-var-money-check-dollar: \f53d;
$fa-var-money-check-alt: \f53d;
$fa-var-monument: \f5a6;
$fa-var-moon: \f186;
$fa-var-mortar-pestle: \f5a7;
$fa-var-mosque: \f678;
$fa-var-motorcycle: \f21c;
$fa-var-mountain: \f6fc;
$fa-var-mug-hot: \f7b6;
$fa-var-mug-saucer: \f0f4;
$fa-var-coffee: \f0f4;
$fa-var-music: \f001;
$fa-var-n: \4e;
$fa-var-naira-sign: \e1f6;
$fa-var-network-wired: \f6ff;
$fa-var-neuter: \f22c;
$fa-var-newspaper: \f1ea;
$fa-var-not-equal: \f53e;
$fa-var-note-sticky: \f249;
$fa-var-sticky-note: \f249;
$fa-var-notes-medical: \f481;
$fa-var-o: \4f;
$fa-var-object-group: \f247;
$fa-var-object-ungroup: \f248;
$fa-var-oil-can: \f613;
$fa-var-om: \f679;
$fa-var-otter: \f700;
$fa-var-outdent: \f03b;
$fa-var-dedent: \f03b;
$fa-var-p: \50;
$fa-var-pager: \f815;
$fa-var-paint-roller: \f5aa;
$fa-var-paintbrush: \f1fc;
$fa-var-paint-brush: \f1fc;
$fa-var-palette: \f53f;
$fa-var-pallet: \f482;
$fa-var-panorama: \e209;
$fa-var-paper-plane: \f1d8;
$fa-var-paperclip: \f0c6;
$fa-var-parachute-box: \f4cd;
$fa-var-paragraph: \f1dd;
$fa-var-passport: \f5ab;
$fa-var-paste: \f0ea;
$fa-var-file-clipboard: \f0ea;
$fa-var-pause: \f04c;
$fa-var-paw: \f1b0;
$fa-var-peace: \f67c;
$fa-var-pen: \f304;
$fa-var-pen-clip: \f305;
$fa-var-pen-alt: \f305;
$fa-var-pen-fancy: \f5ac;
$fa-var-pen-nib: \f5ad;
$fa-var-pen-ruler: \f5ae;
$fa-var-pencil-ruler: \f5ae;
$fa-var-pen-to-square: \f044;
$fa-var-edit: \f044;
$fa-var-pencil: \f303;
$fa-var-pencil-alt: \f303;
$fa-var-people-arrows-left-right: \e068;
$fa-var-people-arrows: \e068;
$fa-var-people-carry-box: \f4ce;
$fa-var-people-carry: \f4ce;
$fa-var-pepper-hot: \f816;
$fa-var-percent: \25;
$fa-var-percentage: \25;
$fa-var-person: \f183;
$fa-var-male: \f183;
$fa-var-person-biking: \f84a;
$fa-var-biking: \f84a;
$fa-var-person-booth: \f756;
$fa-var-person-dots-from-line: \f470;
$fa-var-diagnoses: \f470;
$fa-var-person-dress: \f182;
$fa-var-female: \f182;
$fa-var-person-hiking: \f6ec;
$fa-var-hiking: \f6ec;
$fa-var-person-praying: \f683;
$fa-var-pray: \f683;
$fa-var-person-running: \f70c;
$fa-var-running: \f70c;
$fa-var-person-skating: \f7c5;
$fa-var-skating: \f7c5;
$fa-var-person-skiing: \f7c9;
$fa-var-skiing: \f7c9;
$fa-var-person-skiing-nordic: \f7ca;
$fa-var-skiing-nordic: \f7ca;
$fa-var-person-snowboarding: \f7ce;
$fa-var-snowboarding: \f7ce;
$fa-var-person-swimming: \f5c4;
$fa-var-swimmer: \f5c4;
$fa-var-person-walking: \f554;
$fa-var-walking: \f554;
$fa-var-person-walking-with-cane: \f29d;
$fa-var-blind: \f29d;
$fa-var-peseta-sign: \e221;
$fa-var-peso-sign: \e222;
$fa-var-phone: \f095;
$fa-var-phone-flip: \f879;
$fa-var-phone-alt: \f879;
$fa-var-phone-slash: \f3dd;
$fa-var-phone-volume: \f2a0;
$fa-var-volume-control-phone: \f2a0;
$fa-var-photo-film: \f87c;
$fa-var-photo-video: \f87c;
$fa-var-piggy-bank: \f4d3;
$fa-var-pills: \f484;
$fa-var-pizza-slice: \f818;
$fa-var-place-of-worship: \f67f;
$fa-var-plane: \f072;
$fa-var-plane-arrival: \f5af;
$fa-var-plane-departure: \f5b0;
$fa-var-plane-slash: \e069;
$fa-var-play: \f04b;
$fa-var-plug: \f1e6;
$fa-var-plus: \2b;
$fa-var-add: \2b;
$fa-var-plus-minus: \e43c;
$fa-var-podcast: \f2ce;
$fa-var-poo: \f2fe;
$fa-var-poo-storm: \f75a;
$fa-var-poo-bolt: \f75a;
$fa-var-poop: \f619;
$fa-var-power-off: \f011;
$fa-var-prescription: \f5b1;
$fa-var-prescription-bottle: \f485;
$fa-var-prescription-bottle-medical: \f486;
$fa-var-prescription-bottle-alt: \f486;
$fa-var-print: \f02f;
$fa-var-pump-medical: \e06a;
$fa-var-pump-soap: \e06b;
$fa-var-puzzle-piece: \f12e;
$fa-var-q: \51;
$fa-var-qrcode: \f029;
$fa-var-question: \3f;
$fa-var-quote-left: \f10d;
$fa-var-quote-left-alt: \f10d;
$fa-var-quote-right: \f10e;
$fa-var-quote-right-alt: \f10e;
$fa-var-r: \52;
$fa-var-radiation: \f7b9;
$fa-var-rainbow: \f75b;
$fa-var-receipt: \f543;
$fa-var-record-vinyl: \f8d9;
$fa-var-rectangle-ad: \f641;
$fa-var-ad: \f641;
$fa-var-rectangle-list: \f022;
$fa-var-list-alt: \f022;
$fa-var-rectangle-xmark: \f410;
$fa-var-rectangle-times: \f410;
$fa-var-times-rectangle: \f410;
$fa-var-window-close: \f410;
$fa-var-recycle: \f1b8;
$fa-var-registered: \f25d;
$fa-var-repeat: \f363;
$fa-var-reply: \f3e5;
$fa-var-mail-reply: \f3e5;
$fa-var-reply-all: \f122;
$fa-var-mail-reply-all: \f122;
$fa-var-republican: \f75e;
$fa-var-restroom: \f7bd;
$fa-var-retweet: \f079;
$fa-var-ribbon: \f4d6;
$fa-var-right-from-bracket: \f2f5;
$fa-var-sign-out-alt: \f2f5;
$fa-var-right-left: \f362;
$fa-var-exchange-alt: \f362;
$fa-var-right-long: \f30b;
$fa-var-long-arrow-alt-right: \f30b;
$fa-var-right-to-bracket: \f2f6;
$fa-var-sign-in-alt: \f2f6;
$fa-var-ring: \f70b;
$fa-var-road: \f018;
$fa-var-robot: \f544;
$fa-var-rocket: \f135;
$fa-var-rotate: \f2f1;
$fa-var-sync-alt: \f2f1;
$fa-var-rotate-left: \f2ea;
$fa-var-rotate-back: \f2ea;
$fa-var-rotate-backward: \f2ea;
$fa-var-undo-alt: \f2ea;
$fa-var-rotate-right: \f2f9;
$fa-var-redo-alt: \f2f9;
$fa-var-rotate-forward: \f2f9;
$fa-var-route: \f4d7;
$fa-var-rss: \f09e;
$fa-var-feed: \f09e;
$fa-var-ruble-sign: \f158;
$fa-var-rouble: \f158;
$fa-var-rub: \f158;
$fa-var-ruble: \f158;
$fa-var-ruler: \f545;
$fa-var-ruler-combined: \f546;
$fa-var-ruler-horizontal: \f547;
$fa-var-ruler-vertical: \f548;
$fa-var-rupee-sign: \f156;
$fa-var-rupee: \f156;
$fa-var-rupiah-sign: \e23d;
$fa-var-s: \53;
$fa-var-sailboat: \e445;
$fa-var-satellite: \f7bf;
$fa-var-satellite-dish: \f7c0;
$fa-var-scale-balanced: \f24e;
$fa-var-balance-scale: \f24e;
$fa-var-scale-unbalanced: \f515;
$fa-var-balance-scale-left: \f515;
$fa-var-scale-unbalanced-flip: \f516;
$fa-var-balance-scale-right: \f516;
$fa-var-school: \f549;
$fa-var-scissors: \f0c4;
$fa-var-cut: \f0c4;
$fa-var-screwdriver: \f54a;
$fa-var-screwdriver-wrench: \f7d9;
$fa-var-tools: \f7d9;
$fa-var-scroll: \f70e;
$fa-var-scroll-torah: \f6a0;
$fa-var-torah: \f6a0;
$fa-var-sd-card: \f7c2;
$fa-var-section: \e447;
$fa-var-seedling: \f4d8;
$fa-var-sprout: \f4d8;
$fa-var-server: \f233;
$fa-var-shapes: \f61f;
$fa-var-triangle-circle-square: \f61f;
$fa-var-share: \f064;
$fa-var-arrow-turn-right: \f064;
$fa-var-mail-forward: \f064;
$fa-var-share-from-square: \f14d;
$fa-var-share-square: \f14d;
$fa-var-share-nodes: \f1e0;
$fa-var-share-alt: \f1e0;
$fa-var-shekel-sign: \f20b;
$fa-var-ils: \f20b;
$fa-var-shekel: \f20b;
$fa-var-sheqel: \f20b;
$fa-var-sheqel-sign: \f20b;
$fa-var-shield: \f132;
$fa-var-shield-blank: \f3ed;
$fa-var-shield-alt: \f3ed;
$fa-var-shield-virus: \e06c;
$fa-var-ship: \f21a;
$fa-var-shirt: \f553;
$fa-var-t-shirt: \f553;
$fa-var-tshirt: \f553;
$fa-var-shoe-prints: \f54b;
$fa-var-shop: \f54f;
$fa-var-store-alt: \f54f;
$fa-var-shop-slash: \e070;
$fa-var-store-alt-slash: \e070;
$fa-var-shower: \f2cc;
$fa-var-shrimp: \e448;
$fa-var-shuffle: \f074;
$fa-var-random: \f074;
$fa-var-shuttle-space: \f197;
$fa-var-space-shuttle: \f197;
$fa-var-sign-hanging: \f4d9;
$fa-var-sign: \f4d9;
$fa-var-signal: \f012;
$fa-var-signal-5: \f012;
$fa-var-signal-perfect: \f012;
$fa-var-signature: \f5b7;
$fa-var-signs-post: \f277;
$fa-var-map-signs: \f277;
$fa-var-sim-card: \f7c4;
$fa-var-sink: \e06d;
$fa-var-sitemap: \f0e8;
$fa-var-skull: \f54c;
$fa-var-skull-crossbones: \f714;
$fa-var-slash: \f715;
$fa-var-sleigh: \f7cc;
$fa-var-sliders: \f1de;
$fa-var-sliders-h: \f1de;
$fa-var-smog: \f75f;
$fa-var-smoking: \f48d;
$fa-var-snowflake: \f2dc;
$fa-var-snowman: \f7d0;
$fa-var-snowplow: \f7d2;
$fa-var-soap: \e06e;
$fa-var-socks: \f696;
$fa-var-solar-panel: \f5ba;
$fa-var-sort: \f0dc;
$fa-var-unsorted: \f0dc;
$fa-var-sort-down: \f0dd;
$fa-var-sort-desc: \f0dd;
$fa-var-sort-up: \f0de;
$fa-var-sort-asc: \f0de;
$fa-var-spa: \f5bb;
$fa-var-spaghetti-monster-flying: \f67b;
$fa-var-pastafarianism: \f67b;
$fa-var-spell-check: \f891;
$fa-var-spider: \f717;
$fa-var-spinner: \f110;
$fa-var-splotch: \f5bc;
$fa-var-spoon: \f2e5;
$fa-var-utensil-spoon: \f2e5;
$fa-var-spray-can: \f5bd;
$fa-var-spray-can-sparkles: \f5d0;
$fa-var-air-freshener: \f5d0;
$fa-var-square: \f0c8;
$fa-var-square-arrow-up-right: \f14c;
$fa-var-external-link-square: \f14c;
$fa-var-square-caret-down: \f150;
$fa-var-caret-square-down: \f150;
$fa-var-square-caret-left: \f191;
$fa-var-caret-square-left: \f191;
$fa-var-square-caret-right: \f152;
$fa-var-caret-square-right: \f152;
$fa-var-square-caret-up: \f151;
$fa-var-caret-square-up: \f151;
$fa-var-square-check: \f14a;
$fa-var-check-square: \f14a;
$fa-var-square-envelope: \f199;
$fa-var-envelope-square: \f199;
$fa-var-square-full: \f45c;
$fa-var-square-h: \f0fd;
$fa-var-h-square: \f0fd;
$fa-var-square-minus: \f146;
$fa-var-minus-square: \f146;
$fa-var-square-parking: \f540;
$fa-var-parking: \f540;
$fa-var-square-pen: \f14b;
$fa-var-pen-square: \f14b;
$fa-var-pencil-square: \f14b;
$fa-var-square-phone: \f098;
$fa-var-phone-square: \f098;
$fa-var-square-phone-flip: \f87b;
$fa-var-phone-square-alt: \f87b;
$fa-var-square-plus: \f0fe;
$fa-var-plus-square: \f0fe;
$fa-var-square-poll-horizontal: \f682;
$fa-var-poll-h: \f682;
$fa-var-square-poll-vertical: \f681;
$fa-var-poll: \f681;
$fa-var-square-root-variable: \f698;
$fa-var-square-root-alt: \f698;
$fa-var-square-rss: \f143;
$fa-var-rss-square: \f143;
$fa-var-square-share-nodes: \f1e1;
$fa-var-share-alt-square: \f1e1;
$fa-var-square-up-right: \f360;
$fa-var-external-link-square-alt: \f360;
$fa-var-square-xmark: \f2d3;
$fa-var-times-square: \f2d3;
$fa-var-xmark-square: \f2d3;
$fa-var-stairs: \e289;
$fa-var-stamp: \f5bf;
$fa-var-star: \f005;
$fa-var-star-and-crescent: \f699;
$fa-var-star-half: \f089;
$fa-var-star-half-stroke: \f5c0;
$fa-var-star-half-alt: \f5c0;
$fa-var-star-of-david: \f69a;
$fa-var-star-of-life: \f621;
$fa-var-sterling-sign: \f154;
$fa-var-gbp: \f154;
$fa-var-pound-sign: \f154;
$fa-var-stethoscope: \f0f1;
$fa-var-stop: \f04d;
$fa-var-stopwatch: \f2f2;
$fa-var-stopwatch-20: \e06f;
$fa-var-store: \f54e;
$fa-var-store-slash: \e071;
$fa-var-street-view: \f21d;
$fa-var-strikethrough: \f0cc;
$fa-var-stroopwafel: \f551;
$fa-var-subscript: \f12c;
$fa-var-suitcase: \f0f2;
$fa-var-suitcase-medical: \f0fa;
$fa-var-medkit: \f0fa;
$fa-var-suitcase-rolling: \f5c1;
$fa-var-sun: \f185;
$fa-var-superscript: \f12b;
$fa-var-swatchbook: \f5c3;
$fa-var-synagogue: \f69b;
$fa-var-syringe: \f48e;
$fa-var-t: \54;
$fa-var-table: \f0ce;
$fa-var-table-cells: \f00a;
$fa-var-th: \f00a;
$fa-var-table-cells-large: \f009;
$fa-var-th-large: \f009;
$fa-var-table-columns: \f0db;
$fa-var-columns: \f0db;
$fa-var-table-list: \f00b;
$fa-var-th-list: \f00b;
$fa-var-table-tennis-paddle-ball: \f45d;
$fa-var-ping-pong-paddle-ball: \f45d;
$fa-var-table-tennis: \f45d;
$fa-var-tablet: \f3fb;
$fa-var-tablet-android: \f3fb;
$fa-var-tablet-button: \f10a;
$fa-var-tablet-screen-button: \f3fa;
$fa-var-tablet-alt: \f3fa;
$fa-var-tablets: \f490;
$fa-var-tachograph-digital: \f566;
$fa-var-digital-tachograph: \f566;
$fa-var-tag: \f02b;
$fa-var-tags: \f02c;
$fa-var-tape: \f4db;
$fa-var-taxi: \f1ba;
$fa-var-cab: \f1ba;
$fa-var-teeth: \f62e;
$fa-var-teeth-open: \f62f;
$fa-var-temperature-empty: \f2cb;
$fa-var-temperature-0: \f2cb;
$fa-var-thermometer-0: \f2cb;
$fa-var-thermometer-empty: \f2cb;
$fa-var-temperature-full: \f2c7;
$fa-var-temperature-4: \f2c7;
$fa-var-thermometer-4: \f2c7;
$fa-var-thermometer-full: \f2c7;
$fa-var-temperature-half: \f2c9;
$fa-var-temperature-2: \f2c9;
$fa-var-thermometer-2: \f2c9;
$fa-var-thermometer-half: \f2c9;
$fa-var-temperature-high: \f769;
$fa-var-temperature-low: \f76b;
$fa-var-temperature-quarter: \f2ca;
$fa-var-temperature-1: \f2ca;
$fa-var-thermometer-1: \f2ca;
$fa-var-thermometer-quarter: \f2ca;
$fa-var-temperature-three-quarters: \f2c8;
$fa-var-temperature-3: \f2c8;
$fa-var-thermometer-3: \f2c8;
$fa-var-thermometer-three-quarters: \f2c8;
$fa-var-tenge-sign: \f7d7;
$fa-var-tenge: \f7d7;
$fa-var-terminal: \f120;
$fa-var-text-height: \f034;
$fa-var-text-slash: \f87d;
$fa-var-remove-format: \f87d;
$fa-var-text-width: \f035;
$fa-var-thermometer: \f491;
$fa-var-thumbs-down: \f165;
$fa-var-thumbs-up: \f164;
$fa-var-thumbtack: \f08d;
$fa-var-thumb-tack: \f08d;
$fa-var-ticket: \f145;
$fa-var-ticket-simple: \f3ff;
$fa-var-ticket-alt: \f3ff;
$fa-var-timeline: \e29c;
$fa-var-toggle-off: \f204;
$fa-var-toggle-on: \f205;
$fa-var-toilet: \f7d8;
$fa-var-toilet-paper: \f71e;
$fa-var-toilet-paper-slash: \e072;
$fa-var-toolbox: \f552;
$fa-var-tooth: \f5c9;
$fa-var-torii-gate: \f6a1;
$fa-var-tower-broadcast: \f519;
$fa-var-broadcast-tower: \f519;
$fa-var-tractor: \f722;
$fa-var-trademark: \f25c;
$fa-var-traffic-light: \f637;
$fa-var-trailer: \e041;
$fa-var-train: \f238;
$fa-var-train-subway: \f239;
$fa-var-subway: \f239;
$fa-var-train-tram: \f7da;
$fa-var-tram: \f7da;
$fa-var-transgender: \f225;
$fa-var-transgender-alt: \f225;
$fa-var-trash: \f1f8;
$fa-var-trash-arrow-up: \f829;
$fa-var-trash-restore: \f829;
$fa-var-trash-can: \f2ed;
$fa-var-trash-alt: \f2ed;
$fa-var-trash-can-arrow-up: \f82a;
$fa-var-trash-restore-alt: \f82a;
$fa-var-tree: \f1bb;
$fa-var-triangle-exclamation: \f071;
$fa-var-exclamation-triangle: \f071;
$fa-var-warning: \f071;
$fa-var-trophy: \f091;
$fa-var-truck: \f0d1;
$fa-var-truck-fast: \f48b;
$fa-var-shipping-fast: \f48b;
$fa-var-truck-medical: \f0f9;
$fa-var-ambulance: \f0f9;
$fa-var-truck-monster: \f63b;
$fa-var-truck-moving: \f4df;
$fa-var-truck-pickup: \f63c;
$fa-var-truck-ramp-box: \f4de;
$fa-var-truck-loading: \f4de;
$fa-var-tty: \f1e4;
$fa-var-teletype: \f1e4;
$fa-var-turkish-lira-sign: \e2bb;
$fa-var-try: \e2bb;
$fa-var-turkish-lira: \e2bb;
$fa-var-turn-down: \f3be;
$fa-var-level-down-alt: \f3be;
$fa-var-turn-up: \f3bf;
$fa-var-level-up-alt: \f3bf;
$fa-var-tv: \f26c;
$fa-var-television: \f26c;
$fa-var-tv-alt: \f26c;
$fa-var-u: \55;
$fa-var-umbrella: \f0e9;
$fa-var-umbrella-beach: \f5ca;
$fa-var-underline: \f0cd;
$fa-var-universal-access: \f29a;
$fa-var-unlock: \f09c;
$fa-var-unlock-keyhole: \f13e;
$fa-var-unlock-alt: \f13e;
$fa-var-up-down: \f338;
$fa-var-arrows-alt-v: \f338;
$fa-var-up-down-left-right: \f0b2;
$fa-var-arrows-alt: \f0b2;
$fa-var-up-long: \f30c;
$fa-var-long-arrow-alt-up: \f30c;
$fa-var-up-right-and-down-left-from-center: \f424;
$fa-var-expand-alt: \f424;
$fa-var-up-right-from-square: \f35d;
$fa-var-external-link-alt: \f35d;
$fa-var-upload: \f093;
$fa-var-user: \f007;
$fa-var-user-astronaut: \f4fb;
$fa-var-user-check: \f4fc;
$fa-var-user-clock: \f4fd;
$fa-var-user-doctor: \f0f0;
$fa-var-user-md: \f0f0;
$fa-var-user-gear: \f4fe;
$fa-var-user-cog: \f4fe;
$fa-var-user-graduate: \f501;
$fa-var-user-group: \f500;
$fa-var-user-friends: \f500;
$fa-var-user-injured: \f728;
$fa-var-user-large: \f406;
$fa-var-user-alt: \f406;
$fa-var-user-large-slash: \f4fa;
$fa-var-user-alt-slash: \f4fa;
$fa-var-user-lock: \f502;
$fa-var-user-minus: \f503;
$fa-var-user-ninja: \f504;
$fa-var-user-nurse: \f82f;
$fa-var-user-pen: \f4ff;
$fa-var-user-edit: \f4ff;
$fa-var-user-plus: \f234;
$fa-var-user-secret: \f21b;
$fa-var-user-shield: \f505;
$fa-var-user-slash: \f506;
$fa-var-user-tag: \f507;
$fa-var-user-tie: \f508;
$fa-var-user-xmark: \f235;
$fa-var-user-times: \f235;
$fa-var-users: \f0c0;
$fa-var-users-gear: \f509;
$fa-var-users-cog: \f509;
$fa-var-users-slash: \e073;
$fa-var-utensils: \f2e7;
$fa-var-cutlery: \f2e7;
$fa-var-v: \56;
$fa-var-van-shuttle: \f5b6;
$fa-var-shuttle-van: \f5b6;
$fa-var-vault: \e2c5;
$fa-var-vector-square: \f5cb;
$fa-var-venus: \f221;
$fa-var-venus-double: \f226;
$fa-var-venus-mars: \f228;
$fa-var-vest: \e085;
$fa-var-vest-patches: \e086;
$fa-var-vial: \f492;
$fa-var-vials: \f493;
$fa-var-video: \f03d;
$fa-var-video-camera: \f03d;
$fa-var-video-slash: \f4e2;
$fa-var-vihara: \f6a7;
$fa-var-virus: \e074;
$fa-var-virus-covid: \e4a8;
$fa-var-virus-covid-slash: \e4a9;
$fa-var-virus-slash: \e075;
$fa-var-viruses: \e076;
$fa-var-voicemail: \f897;
$fa-var-volleyball: \f45f;
$fa-var-volleyball-ball: \f45f;
$fa-var-volume-high: \f028;
$fa-var-volume-up: \f028;
$fa-var-volume-low: \f027;
$fa-var-volume-down: \f027;
$fa-var-volume-off: \f026;
$fa-var-volume-xmark: \f6a9;
$fa-var-volume-mute: \f6a9;
$fa-var-volume-times: \f6a9;
$fa-var-vr-cardboard: \f729;
$fa-var-w: \57;
$fa-var-wallet: \f555;
$fa-var-wand-magic: \f0d0;
$fa-var-magic: \f0d0;
$fa-var-wand-magic-sparkles: \e2ca;
$fa-var-magic-wand-sparkles: \e2ca;
$fa-var-wand-sparkles: \f72b;
$fa-var-warehouse: \f494;
$fa-var-water: \f773;
$fa-var-water-ladder: \f5c5;
$fa-var-ladder-water: \f5c5;
$fa-var-swimming-pool: \f5c5;
$fa-var-wave-square: \f83e;
$fa-var-weight-hanging: \f5cd;
$fa-var-weight-scale: \f496;
$fa-var-weight: \f496;
$fa-var-wheelchair: \f193;
$fa-var-whiskey-glass: \f7a0;
$fa-var-glass-whiskey: \f7a0;
$fa-var-wifi: \f1eb;
$fa-var-wifi-3: \f1eb;
$fa-var-wifi-strong: \f1eb;
$fa-var-wind: \f72e;
$fa-var-window-maximize: \f2d0;
$fa-var-window-minimize: \f2d1;
$fa-var-window-restore: \f2d2;
$fa-var-wine-bottle: \f72f;
$fa-var-wine-glass: \f4e3;
$fa-var-wine-glass-empty: \f5ce;
$fa-var-wine-glass-alt: \f5ce;
$fa-var-won-sign: \f159;
$fa-var-krw: \f159;
$fa-var-won: \f159;
$fa-var-wrench: \f0ad;
$fa-var-x: \58;
$fa-var-x-ray: \f497;
$fa-var-xmark: \f00d;
$fa-var-close: \f00d;
$fa-var-multiply: \f00d;
$fa-var-remove: \f00d;
$fa-var-times: \f00d;
$fa-var-y: \59;
$fa-var-yen-sign: \f157;
$fa-var-cny: \f157;
$fa-var-jpy: \f157;
$fa-var-rmb: \f157;
$fa-var-yen: \f157;
$fa-var-yin-yang: \f6ad;
$fa-var-z: \5a;

$fa-var-42-group: \e080;
$fa-var-innosoft: \e080;
$fa-var-500px: \f26e;
$fa-var-accessible-icon: \f368;
$fa-var-accusoft: \f369;
$fa-var-adn: \f170;
$fa-var-adversal: \f36a;
$fa-var-affiliatetheme: \f36b;
$fa-var-airbnb: \f834;
$fa-var-algolia: \f36c;
$fa-var-alipay: \f642;
$fa-var-amazon: \f270;
$fa-var-amazon-pay: \f42c;
$fa-var-amilia: \f36d;
$fa-var-android: \f17b;
$fa-var-angellist: \f209;
$fa-var-angrycreative: \f36e;
$fa-var-angular: \f420;
$fa-var-app-store: \f36f;
$fa-var-app-store-ios: \f370;
$fa-var-apper: \f371;
$fa-var-apple: \f179;
$fa-var-apple-pay: \f415;
$fa-var-artstation: \f77a;
$fa-var-asymmetrik: \f372;
$fa-var-atlassian: \f77b;
$fa-var-audible: \f373;
$fa-var-autoprefixer: \f41c;
$fa-var-avianex: \f374;
$fa-var-aviato: \f421;
$fa-var-aws: \f375;
$fa-var-bandcamp: \f2d5;
$fa-var-battle-net: \f835;
$fa-var-behance: \f1b4;
$fa-var-behance-square: \f1b5;
$fa-var-bilibili: \e3d9;
$fa-var-bimobject: \f378;
$fa-var-bitbucket: \f171;
$fa-var-bitcoin: \f379;
$fa-var-bity: \f37a;
$fa-var-black-tie: \f27e;
$fa-var-blackberry: \f37b;
$fa-var-blogger: \f37c;
$fa-var-blogger-b: \f37d;
$fa-var-bluetooth: \f293;
$fa-var-bluetooth-b: \f294;
$fa-var-bootstrap: \f836;
$fa-var-bots: \e340;
$fa-var-btc: \f15a;
$fa-var-buffer: \f837;
$fa-var-buromobelexperte: \f37f;
$fa-var-buy-n-large: \f8a6;
$fa-var-buysellads: \f20d;
$fa-var-canadian-maple-leaf: \f785;
$fa-var-cc-amazon-pay: \f42d;
$fa-var-cc-amex: \f1f3;
$fa-var-cc-apple-pay: \f416;
$fa-var-cc-diners-club: \f24c;
$fa-var-cc-discover: \f1f2;
$fa-var-cc-jcb: \f24b;
$fa-var-cc-mastercard: \f1f1;
$fa-var-cc-paypal: \f1f4;
$fa-var-cc-stripe: \f1f5;
$fa-var-cc-visa: \f1f0;
$fa-var-centercode: \f380;
$fa-var-centos: \f789;
$fa-var-chrome: \f268;
$fa-var-chromecast: \f838;
$fa-var-cloudflare: \e07d;
$fa-var-cloudscale: \f383;
$fa-var-cloudsmith: \f384;
$fa-var-cloudversify: \f385;
$fa-var-cmplid: \e360;
$fa-var-codepen: \f1cb;
$fa-var-codiepie: \f284;
$fa-var-confluence: \f78d;
$fa-var-connectdevelop: \f20e;
$fa-var-contao: \f26d;
$fa-var-cotton-bureau: \f89e;
$fa-var-cpanel: \f388;
$fa-var-creative-commons: \f25e;
$fa-var-creative-commons-by: \f4e7;
$fa-var-creative-commons-nc: \f4e8;
$fa-var-creative-commons-nc-eu: \f4e9;
$fa-var-creative-commons-nc-jp: \f4ea;
$fa-var-creative-commons-nd: \f4eb;
$fa-var-creative-commons-pd: \f4ec;
$fa-var-creative-commons-pd-alt: \f4ed;
$fa-var-creative-commons-remix: \f4ee;
$fa-var-creative-commons-sa: \f4ef;
$fa-var-creative-commons-sampling: \f4f0;
$fa-var-creative-commons-sampling-plus: \f4f1;
$fa-var-creative-commons-share: \f4f2;
$fa-var-creative-commons-zero: \f4f3;
$fa-var-critical-role: \f6c9;
$fa-var-css3: \f13c;
$fa-var-css3-alt: \f38b;
$fa-var-cuttlefish: \f38c;
$fa-var-d-and-d: \f38d;
$fa-var-d-and-d-beyond: \f6ca;
$fa-var-dailymotion: \e052;
$fa-var-dashcube: \f210;
$fa-var-deezer: \e077;
$fa-var-delicious: \f1a5;
$fa-var-deploydog: \f38e;
$fa-var-deskpro: \f38f;
$fa-var-dev: \f6cc;
$fa-var-deviantart: \f1bd;
$fa-var-dhl: \f790;
$fa-var-diaspora: \f791;
$fa-var-digg: \f1a6;
$fa-var-digital-ocean: \f391;
$fa-var-discord: \f392;
$fa-var-discourse: \f393;
$fa-var-dochub: \f394;
$fa-var-docker: \f395;
$fa-var-draft2digital: \f396;
$fa-var-dribbble: \f17d;
$fa-var-dribbble-square: \f397;
$fa-var-dropbox: \f16b;
$fa-var-drupal: \f1a9;
$fa-var-dyalog: \f399;
$fa-var-earlybirds: \f39a;
$fa-var-ebay: \f4f4;
$fa-var-edge: \f282;
$fa-var-edge-legacy: \e078;
$fa-var-elementor: \f430;
$fa-var-ello: \f5f1;
$fa-var-ember: \f423;
$fa-var-empire: \f1d1;
$fa-var-envira: \f299;
$fa-var-erlang: \f39d;
$fa-var-ethereum: \f42e;
$fa-var-etsy: \f2d7;
$fa-var-evernote: \f839;
$fa-var-expeditedssl: \f23e;
$fa-var-facebook: \f09a;
$fa-var-facebook-f: \f39e;
$fa-var-facebook-messenger: \f39f;
$fa-var-facebook-square: \f082;
$fa-var-fantasy-flight-games: \f6dc;
$fa-var-fedex: \f797;
$fa-var-fedora: \f798;
$fa-var-figma: \f799;
$fa-var-firefox: \f269;
$fa-var-firefox-browser: \e007;
$fa-var-first-order: \f2b0;
$fa-var-first-order-alt: \f50a;
$fa-var-firstdraft: \f3a1;
$fa-var-flickr: \f16e;
$fa-var-flipboard: \f44d;
$fa-var-fly: \f417;
$fa-var-font-awesome: \f2b4;
$fa-var-font-awesome-flag: \f2b4;
$fa-var-font-awesome-logo-full: \f2b4;
$fa-var-fonticons: \f280;
$fa-var-fonticons-fi: \f3a2;
$fa-var-fort-awesome: \f286;
$fa-var-fort-awesome-alt: \f3a3;
$fa-var-forumbee: \f211;
$fa-var-foursquare: \f180;
$fa-var-free-code-camp: \f2c5;
$fa-var-freebsd: \f3a4;
$fa-var-fulcrum: \f50b;
$fa-var-galactic-republic: \f50c;
$fa-var-galactic-senate: \f50d;
$fa-var-get-pocket: \f265;
$fa-var-gg: \f260;
$fa-var-gg-circle: \f261;
$fa-var-git: \f1d3;
$fa-var-git-alt: \f841;
$fa-var-git-square: \f1d2;
$fa-var-github: \f09b;
$fa-var-github-alt: \f113;
$fa-var-github-square: \f092;
$fa-var-gitkraken: \f3a6;
$fa-var-gitlab: \f296;
$fa-var-gitter: \f426;
$fa-var-glide: \f2a5;
$fa-var-glide-g: \f2a6;
$fa-var-gofore: \f3a7;
$fa-var-golang: \e40f;
$fa-var-goodreads: \f3a8;
$fa-var-goodreads-g: \f3a9;
$fa-var-google: \f1a0;
$fa-var-google-drive: \f3aa;
$fa-var-google-pay: \e079;
$fa-var-google-play: \f3ab;
$fa-var-google-plus: \f2b3;
$fa-var-google-plus-g: \f0d5;
$fa-var-google-plus-square: \f0d4;
$fa-var-google-wallet: \f1ee;
$fa-var-gratipay: \f184;
$fa-var-grav: \f2d6;
$fa-var-gripfire: \f3ac;
$fa-var-grunt: \f3ad;
$fa-var-guilded: \e07e;
$fa-var-gulp: \f3ae;
$fa-var-hacker-news: \f1d4;
$fa-var-hacker-news-square: \f3af;
$fa-var-hackerrank: \f5f7;
$fa-var-hashnode: \e499;
$fa-var-hips: \f452;
$fa-var-hire-a-helper: \f3b0;
$fa-var-hive: \e07f;
$fa-var-hooli: \f427;
$fa-var-hornbill: \f592;
$fa-var-hotjar: \f3b1;
$fa-var-houzz: \f27c;
$fa-var-html5: \f13b;
$fa-var-hubspot: \f3b2;
$fa-var-ideal: \e013;
$fa-var-imdb: \f2d8;
$fa-var-instagram: \f16d;
$fa-var-instagram-square: \e055;
$fa-var-instalod: \e081;
$fa-var-intercom: \f7af;
$fa-var-internet-explorer: \f26b;
$fa-var-invision: \f7b0;
$fa-var-ioxhost: \f208;
$fa-var-itch-io: \f83a;
$fa-var-itunes: \f3b4;
$fa-var-itunes-note: \f3b5;
$fa-var-java: \f4e4;
$fa-var-jedi-order: \f50e;
$fa-var-jenkins: \f3b6;
$fa-var-jira: \f7b1;
$fa-var-joget: \f3b7;
$fa-var-joomla: \f1aa;
$fa-var-js: \f3b8;
$fa-var-js-square: \f3b9;
$fa-var-jsfiddle: \f1cc;
$fa-var-kaggle: \f5fa;
$fa-var-keybase: \f4f5;
$fa-var-keycdn: \f3ba;
$fa-var-kickstarter: \f3bb;
$fa-var-kickstarter-k: \f3bc;
$fa-var-korvue: \f42f;
$fa-var-laravel: \f3bd;
$fa-var-lastfm: \f202;
$fa-var-lastfm-square: \f203;
$fa-var-leanpub: \f212;
$fa-var-less: \f41d;
$fa-var-line: \f3c0;
$fa-var-linkedin: \f08c;
$fa-var-linkedin-in: \f0e1;
$fa-var-linode: \f2b8;
$fa-var-linux: \f17c;
$fa-var-lyft: \f3c3;
$fa-var-magento: \f3c4;
$fa-var-mailchimp: \f59e;
$fa-var-mandalorian: \f50f;
$fa-var-markdown: \f60f;
$fa-var-mastodon: \f4f6;
$fa-var-maxcdn: \f136;
$fa-var-mdb: \f8ca;
$fa-var-medapps: \f3c6;
$fa-var-medium: \f23a;
$fa-var-medium-m: \f23a;
$fa-var-medrt: \f3c8;
$fa-var-meetup: \f2e0;
$fa-var-megaport: \f5a3;
$fa-var-mendeley: \f7b3;
$fa-var-microblog: \e01a;
$fa-var-microsoft: \f3ca;
$fa-var-mix: \f3cb;
$fa-var-mixcloud: \f289;
$fa-var-mixer: \e056;
$fa-var-mizuni: \f3cc;
$fa-var-modx: \f285;
$fa-var-monero: \f3d0;
$fa-var-napster: \f3d2;
$fa-var-neos: \f612;
$fa-var-nimblr: \f5a8;
$fa-var-node: \f419;
$fa-var-node-js: \f3d3;
$fa-var-npm: \f3d4;
$fa-var-ns8: \f3d5;
$fa-var-nutritionix: \f3d6;
$fa-var-octopus-deploy: \e082;
$fa-var-odnoklassniki: \f263;
$fa-var-odnoklassniki-square: \f264;
$fa-var-old-republic: \f510;
$fa-var-opencart: \f23d;
$fa-var-openid: \f19b;
$fa-var-opera: \f26a;
$fa-var-optin-monster: \f23c;
$fa-var-orcid: \f8d2;
$fa-var-osi: \f41a;
$fa-var-padlet: \e4a0;
$fa-var-page4: \f3d7;
$fa-var-pagelines: \f18c;
$fa-var-palfed: \f3d8;
$fa-var-patreon: \f3d9;
$fa-var-paypal: \f1ed;
$fa-var-perbyte: \e083;
$fa-var-periscope: \f3da;
$fa-var-phabricator: \f3db;
$fa-var-phoenix-framework: \f3dc;
$fa-var-phoenix-squadron: \f511;
$fa-var-php: \f457;
$fa-var-pied-piper: \f2ae;
$fa-var-pied-piper-alt: \f1a8;
$fa-var-pied-piper-hat: \f4e5;
$fa-var-pied-piper-pp: \f1a7;
$fa-var-pied-piper-square: \e01e;
$fa-var-pinterest: \f0d2;
$fa-var-pinterest-p: \f231;
$fa-var-pinterest-square: \f0d3;
$fa-var-pix: \e43a;
$fa-var-playstation: \f3df;
$fa-var-product-hunt: \f288;
$fa-var-pushed: \f3e1;
$fa-var-python: \f3e2;
$fa-var-qq: \f1d6;
$fa-var-quinscape: \f459;
$fa-var-quora: \f2c4;
$fa-var-r-project: \f4f7;
$fa-var-raspberry-pi: \f7bb;
$fa-var-ravelry: \f2d9;
$fa-var-react: \f41b;
$fa-var-reacteurope: \f75d;
$fa-var-readme: \f4d5;
$fa-var-rebel: \f1d0;
$fa-var-red-river: \f3e3;
$fa-var-reddit: \f1a1;
$fa-var-reddit-alien: \f281;
$fa-var-reddit-square: \f1a2;
$fa-var-redhat: \f7bc;
$fa-var-renren: \f18b;
$fa-var-replyd: \f3e6;
$fa-var-researchgate: \f4f8;
$fa-var-resolving: \f3e7;
$fa-var-rev: \f5b2;
$fa-var-rocketchat: \f3e8;
$fa-var-rockrms: \f3e9;
$fa-var-rust: \e07a;
$fa-var-safari: \f267;
$fa-var-salesforce: \f83b;
$fa-var-sass: \f41e;
$fa-var-schlix: \f3ea;
$fa-var-scribd: \f28a;
$fa-var-searchengin: \f3eb;
$fa-var-sellcast: \f2da;
$fa-var-sellsy: \f213;
$fa-var-servicestack: \f3ec;
$fa-var-shirtsinbulk: \f214;
$fa-var-shopify: \e057;
$fa-var-shopware: \f5b5;
$fa-var-simplybuilt: \f215;
$fa-var-sistrix: \f3ee;
$fa-var-sith: \f512;
$fa-var-sitrox: \e44a;
$fa-var-sketch: \f7c6;
$fa-var-skyatlas: \f216;
$fa-var-skype: \f17e;
$fa-var-slack: \f198;
$fa-var-slack-hash: \f198;
$fa-var-slideshare: \f1e7;
$fa-var-snapchat: \f2ab;
$fa-var-snapchat-ghost: \f2ab;
$fa-var-snapchat-square: \f2ad;
$fa-var-soundcloud: \f1be;
$fa-var-sourcetree: \f7d3;
$fa-var-speakap: \f3f3;
$fa-var-speaker-deck: \f83c;
$fa-var-spotify: \f1bc;
$fa-var-square-font-awesome: \f425;
$fa-var-square-font-awesome-stroke: \f35c;
$fa-var-font-awesome-alt: \f35c;
$fa-var-squarespace: \f5be;
$fa-var-stack-exchange: \f18d;
$fa-var-stack-overflow: \f16c;
$fa-var-stackpath: \f842;
$fa-var-staylinked: \f3f5;
$fa-var-steam: \f1b6;
$fa-var-steam-square: \f1b7;
$fa-var-steam-symbol: \f3f6;
$fa-var-sticker-mule: \f3f7;
$fa-var-strava: \f428;
$fa-var-stripe: \f429;
$fa-var-stripe-s: \f42a;
$fa-var-studiovinari: \f3f8;
$fa-var-stumbleupon: \f1a4;
$fa-var-stumbleupon-circle: \f1a3;
$fa-var-superpowers: \f2dd;
$fa-var-supple: \f3f9;
$fa-var-suse: \f7d6;
$fa-var-swift: \f8e1;
$fa-var-symfony: \f83d;
$fa-var-teamspeak: \f4f9;
$fa-var-telegram: \f2c6;
$fa-var-telegram-plane: \f2c6;
$fa-var-tencent-weibo: \f1d5;
$fa-var-the-red-yeti: \f69d;
$fa-var-themeco: \f5c6;
$fa-var-themeisle: \f2b2;
$fa-var-think-peaks: \f731;
$fa-var-tiktok: \e07b;
$fa-var-trade-federation: \f513;
$fa-var-trello: \f181;
$fa-var-tumblr: \f173;
$fa-var-tumblr-square: \f174;
$fa-var-twitch: \f1e8;
$fa-var-twitter: \f099;
$fa-var-twitter-square: \f081;
$fa-var-typo3: \f42b;
$fa-var-uber: \f402;
$fa-var-ubuntu: \f7df;
$fa-var-uikit: \f403;
$fa-var-umbraco: \f8e8;
$fa-var-uncharted: \e084;
$fa-var-uniregistry: \f404;
$fa-var-unity: \e049;
$fa-var-unsplash: \e07c;
$fa-var-untappd: \f405;
$fa-var-ups: \f7e0;
$fa-var-usb: \f287;
$fa-var-usps: \f7e1;
$fa-var-ussunnah: \f407;
$fa-var-vaadin: \f408;
$fa-var-viacoin: \f237;
$fa-var-viadeo: \f2a9;
$fa-var-viadeo-square: \f2aa;
$fa-var-viber: \f409;
$fa-var-vimeo: \f40a;
$fa-var-vimeo-square: \f194;
$fa-var-vimeo-v: \f27d;
$fa-var-vine: \f1ca;
$fa-var-vk: \f189;
$fa-var-vnv: \f40b;
$fa-var-vuejs: \f41f;
$fa-var-watchman-monitoring: \e087;
$fa-var-waze: \f83f;
$fa-var-weebly: \f5cc;
$fa-var-weibo: \f18a;
$fa-var-weixin: \f1d7;
$fa-var-whatsapp: \f232;
$fa-var-whatsapp-square: \f40c;
$fa-var-whmcs: \f40d;
$fa-var-wikipedia-w: \f266;
$fa-var-windows: \f17a;
$fa-var-wirsindhandwerk: \e2d0;
$fa-var-wsh: \e2d0;
$fa-var-wix: \f5cf;
$fa-var-wizards-of-the-coast: \f730;
$fa-var-wodu: \e088;
$fa-var-wolf-pack-battalion: \f514;
$fa-var-wordpress: \f19a;
$fa-var-wordpress-simple: \f411;
$fa-var-wpbeginner: \f297;
$fa-var-wpexplorer: \f2de;
$fa-var-wpforms: \f298;
$fa-var-wpressr: \f3e4;
$fa-var-xbox: \f412;
$fa-var-xing: \f168;
$fa-var-xing-square: \f169;
$fa-var-y-combinator: \f23b;
$fa-var-yahoo: \f19e;
$fa-var-yammer: \f840;
$fa-var-yandex: \f413;
$fa-var-yandex-international: \f414;
$fa-var-yarn: \f7e3;
$fa-var-yelp: \f1e9;
$fa-var-yoast: \f2b1;
$fa-var-youtube: \f167;
$fa-var-youtube-square: \f431;
$fa-var-zhihu: \f63f;

$fa-icons: (
  "0": $fa-var-0,
  "1": $fa-var-1,
  "2": $fa-var-2,
  "3": $fa-var-3,
  "4": $fa-var-4,
  "5": $fa-var-5,
  "6": $fa-var-6,
  "7": $fa-var-7,
  "8": $fa-var-8,
  "9": $fa-var-9,
  "a": $fa-var-a,
  "address-book": $fa-var-address-book,
  "contact-book": $fa-var-contact-book,
  "address-card": $fa-var-address-card,
  "contact-card": $fa-var-contact-card,
  "vcard": $fa-var-vcard,
  "align-center": $fa-var-align-center,
  "align-justify": $fa-var-align-justify,
  "align-left": $fa-var-align-left,
  "align-right": $fa-var-align-right,
  "anchor": $fa-var-anchor,
  "angle-down": $fa-var-angle-down,
  "angle-left": $fa-var-angle-left,
  "angle-right": $fa-var-angle-right,
  "angle-up": $fa-var-angle-up,
  "angles-down": $fa-var-angles-down,
  "angle-double-down": $fa-var-angle-double-down,
  "angles-left": $fa-var-angles-left,
  "angle-double-left": $fa-var-angle-double-left,
  "angles-right": $fa-var-angles-right,
  "angle-double-right": $fa-var-angle-double-right,
  "angles-up": $fa-var-angles-up,
  "angle-double-up": $fa-var-angle-double-up,
  "ankh": $fa-var-ankh,
  "apple-whole": $fa-var-apple-whole,
  "apple-alt": $fa-var-apple-alt,
  "archway": $fa-var-archway,
  "arrow-down": $fa-var-arrow-down,
  "arrow-down-1-9": $fa-var-arrow-down-1-9,
  "sort-numeric-asc": $fa-var-sort-numeric-asc,
  "sort-numeric-down": $fa-var-sort-numeric-down,
  "arrow-down-9-1": $fa-var-arrow-down-9-1,
  "sort-numeric-desc": $fa-var-sort-numeric-desc,
  "sort-numeric-down-alt": $fa-var-sort-numeric-down-alt,
  "arrow-down-a-z": $fa-var-arrow-down-a-z,
  "sort-alpha-asc": $fa-var-sort-alpha-asc,
  "sort-alpha-down": $fa-var-sort-alpha-down,
  "arrow-down-long": $fa-var-arrow-down-long,
  "long-arrow-down": $fa-var-long-arrow-down,
  "arrow-down-short-wide": $fa-var-arrow-down-short-wide,
  "sort-amount-desc": $fa-var-sort-amount-desc,
  "sort-amount-down-alt": $fa-var-sort-amount-down-alt,
  "arrow-down-wide-short": $fa-var-arrow-down-wide-short,
  "sort-amount-asc": $fa-var-sort-amount-asc,
  "sort-amount-down": $fa-var-sort-amount-down,
  "arrow-down-z-a": $fa-var-arrow-down-z-a,
  "sort-alpha-desc": $fa-var-sort-alpha-desc,
  "sort-alpha-down-alt": $fa-var-sort-alpha-down-alt,
  "arrow-left": $fa-var-arrow-left,
  "arrow-left-long": $fa-var-arrow-left-long,
  "long-arrow-left": $fa-var-long-arrow-left,
  "arrow-pointer": $fa-var-arrow-pointer,
  "mouse-pointer": $fa-var-mouse-pointer,
  "arrow-right": $fa-var-arrow-right,
  "arrow-right-arrow-left": $fa-var-arrow-right-arrow-left,
  "exchange": $fa-var-exchange,
  "arrow-right-from-bracket": $fa-var-arrow-right-from-bracket,
  "sign-out": $fa-var-sign-out,
  "arrow-right-long": $fa-var-arrow-right-long,
  "long-arrow-right": $fa-var-long-arrow-right,
  "arrow-right-to-bracket": $fa-var-arrow-right-to-bracket,
  "sign-in": $fa-var-sign-in,
  "arrow-rotate-left": $fa-var-arrow-rotate-left,
  "arrow-left-rotate": $fa-var-arrow-left-rotate,
  "arrow-rotate-back": $fa-var-arrow-rotate-back,
  "arrow-rotate-backward": $fa-var-arrow-rotate-backward,
  "undo": $fa-var-undo,
  "arrow-rotate-right": $fa-var-arrow-rotate-right,
  "arrow-right-rotate": $fa-var-arrow-right-rotate,
  "arrow-rotate-forward": $fa-var-arrow-rotate-forward,
  "redo": $fa-var-redo,
  "arrow-trend-down": $fa-var-arrow-trend-down,
  "arrow-trend-up": $fa-var-arrow-trend-up,
  "arrow-turn-down": $fa-var-arrow-turn-down,
  "level-down": $fa-var-level-down,
  "arrow-turn-up": $fa-var-arrow-turn-up,
  "level-up": $fa-var-level-up,
  "arrow-up": $fa-var-arrow-up,
  "arrow-up-1-9": $fa-var-arrow-up-1-9,
  "sort-numeric-up": $fa-var-sort-numeric-up,
  "arrow-up-9-1": $fa-var-arrow-up-9-1,
  "sort-numeric-up-alt": $fa-var-sort-numeric-up-alt,
  "arrow-up-a-z": $fa-var-arrow-up-a-z,
  "sort-alpha-up": $fa-var-sort-alpha-up,
  "arrow-up-from-bracket": $fa-var-arrow-up-from-bracket,
  "arrow-up-long": $fa-var-arrow-up-long,
  "long-arrow-up": $fa-var-long-arrow-up,
  "arrow-up-right-from-square": $fa-var-arrow-up-right-from-square,
  "external-link": $fa-var-external-link,
  "arrow-up-short-wide": $fa-var-arrow-up-short-wide,
  "sort-amount-up-alt": $fa-var-sort-amount-up-alt,
  "arrow-up-wide-short": $fa-var-arrow-up-wide-short,
  "sort-amount-up": $fa-var-sort-amount-up,
  "arrow-up-z-a": $fa-var-arrow-up-z-a,
  "sort-alpha-up-alt": $fa-var-sort-alpha-up-alt,
  "arrows-left-right": $fa-var-arrows-left-right,
  "arrows-h": $fa-var-arrows-h,
  "arrows-rotate": $fa-var-arrows-rotate,
  "refresh": $fa-var-refresh,
  "sync": $fa-var-sync,
  "arrows-up-down": $fa-var-arrows-up-down,
  "arrows-v": $fa-var-arrows-v,
  "arrows-up-down-left-right": $fa-var-arrows-up-down-left-right,
  "arrows": $fa-var-arrows,
  "asterisk": $fa-var-asterisk,
  "at": $fa-var-at,
  "atom": $fa-var-atom,
  "audio-description": $fa-var-audio-description,
  "austral-sign": $fa-var-austral-sign,
  "award": $fa-var-award,
  "b": $fa-var-b,
  "baby": $fa-var-baby,
  "baby-carriage": $fa-var-baby-carriage,
  "carriage-baby": $fa-var-carriage-baby,
  "backward": $fa-var-backward,
  "backward-fast": $fa-var-backward-fast,
  "fast-backward": $fa-var-fast-backward,
  "backward-step": $fa-var-backward-step,
  "step-backward": $fa-var-step-backward,
  "bacon": $fa-var-bacon,
  "bacteria": $fa-var-bacteria,
  "bacterium": $fa-var-bacterium,
  "bag-shopping": $fa-var-bag-shopping,
  "shopping-bag": $fa-var-shopping-bag,
  "bahai": $fa-var-bahai,
  "baht-sign": $fa-var-baht-sign,
  "ban": $fa-var-ban,
  "cancel": $fa-var-cancel,
  "ban-smoking": $fa-var-ban-smoking,
  "smoking-ban": $fa-var-smoking-ban,
  "bandage": $fa-var-bandage,
  "band-aid": $fa-var-band-aid,
  "barcode": $fa-var-barcode,
  "bars": $fa-var-bars,
  "navicon": $fa-var-navicon,
  "bars-progress": $fa-var-bars-progress,
  "tasks-alt": $fa-var-tasks-alt,
  "bars-staggered": $fa-var-bars-staggered,
  "reorder": $fa-var-reorder,
  "stream": $fa-var-stream,
  "baseball": $fa-var-baseball,
  "baseball-ball": $fa-var-baseball-ball,
  "baseball-bat-ball": $fa-var-baseball-bat-ball,
  "basket-shopping": $fa-var-basket-shopping,
  "shopping-basket": $fa-var-shopping-basket,
  "basketball": $fa-var-basketball,
  "basketball-ball": $fa-var-basketball-ball,
  "bath": $fa-var-bath,
  "bathtub": $fa-var-bathtub,
  "battery-empty": $fa-var-battery-empty,
  "battery-0": $fa-var-battery-0,
  "battery-full": $fa-var-battery-full,
  "battery": $fa-var-battery,
  "battery-5": $fa-var-battery-5,
  "battery-half": $fa-var-battery-half,
  "battery-3": $fa-var-battery-3,
  "battery-quarter": $fa-var-battery-quarter,
  "battery-2": $fa-var-battery-2,
  "battery-three-quarters": $fa-var-battery-three-quarters,
  "battery-4": $fa-var-battery-4,
  "bed": $fa-var-bed,
  "bed-pulse": $fa-var-bed-pulse,
  "procedures": $fa-var-procedures,
  "beer-mug-empty": $fa-var-beer-mug-empty,
  "beer": $fa-var-beer,
  "bell": $fa-var-bell,
  "bell-concierge": $fa-var-bell-concierge,
  "concierge-bell": $fa-var-concierge-bell,
  "bell-slash": $fa-var-bell-slash,
  "bezier-curve": $fa-var-bezier-curve,
  "bicycle": $fa-var-bicycle,
  "binoculars": $fa-var-binoculars,
  "biohazard": $fa-var-biohazard,
  "bitcoin-sign": $fa-var-bitcoin-sign,
  "blender": $fa-var-blender,
  "blender-phone": $fa-var-blender-phone,
  "blog": $fa-var-blog,
  "bold": $fa-var-bold,
  "bolt": $fa-var-bolt,
  "zap": $fa-var-zap,
  "bolt-lightning": $fa-var-bolt-lightning,
  "bomb": $fa-var-bomb,
  "bone": $fa-var-bone,
  "bong": $fa-var-bong,
  "book": $fa-var-book,
  "book-atlas": $fa-var-book-atlas,
  "atlas": $fa-var-atlas,
  "book-bible": $fa-var-book-bible,
  "bible": $fa-var-bible,
  "book-journal-whills": $fa-var-book-journal-whills,
  "journal-whills": $fa-var-journal-whills,
  "book-medical": $fa-var-book-medical,
  "book-open": $fa-var-book-open,
  "book-open-reader": $fa-var-book-open-reader,
  "book-reader": $fa-var-book-reader,
  "book-quran": $fa-var-book-quran,
  "quran": $fa-var-quran,
  "book-skull": $fa-var-book-skull,
  "book-dead": $fa-var-book-dead,
  "bookmark": $fa-var-bookmark,
  "border-all": $fa-var-border-all,
  "border-none": $fa-var-border-none,
  "border-top-left": $fa-var-border-top-left,
  "border-style": $fa-var-border-style,
  "bowling-ball": $fa-var-bowling-ball,
  "box": $fa-var-box,
  "box-archive": $fa-var-box-archive,
  "archive": $fa-var-archive,
  "box-open": $fa-var-box-open,
  "box-tissue": $fa-var-box-tissue,
  "boxes-stacked": $fa-var-boxes-stacked,
  "boxes": $fa-var-boxes,
  "boxes-alt": $fa-var-boxes-alt,
  "braille": $fa-var-braille,
  "brain": $fa-var-brain,
  "brazilian-real-sign": $fa-var-brazilian-real-sign,
  "bread-slice": $fa-var-bread-slice,
  "briefcase": $fa-var-briefcase,
  "briefcase-medical": $fa-var-briefcase-medical,
  "broom": $fa-var-broom,
  "broom-ball": $fa-var-broom-ball,
  "quidditch": $fa-var-quidditch,
  "quidditch-broom-ball": $fa-var-quidditch-broom-ball,
  "brush": $fa-var-brush,
  "bug": $fa-var-bug,
  "bug-slash": $fa-var-bug-slash,
  "building": $fa-var-building,
  "building-columns": $fa-var-building-columns,
  "bank": $fa-var-bank,
  "institution": $fa-var-institution,
  "museum": $fa-var-museum,
  "university": $fa-var-university,
  "bullhorn": $fa-var-bullhorn,
  "bullseye": $fa-var-bullseye,
  "burger": $fa-var-burger,
  "hamburger": $fa-var-hamburger,
  "bus": $fa-var-bus,
  "bus-simple": $fa-var-bus-simple,
  "bus-alt": $fa-var-bus-alt,
  "business-time": $fa-var-business-time,
  "briefcase-clock": $fa-var-briefcase-clock,
  "c": $fa-var-c,
  "cake-candles": $fa-var-cake-candles,
  "birthday-cake": $fa-var-birthday-cake,
  "cake": $fa-var-cake,
  "calculator": $fa-var-calculator,
  "calendar": $fa-var-calendar,
  "calendar-check": $fa-var-calendar-check,
  "calendar-day": $fa-var-calendar-day,
  "calendar-days": $fa-var-calendar-days,
  "calendar-alt": $fa-var-calendar-alt,
  "calendar-minus": $fa-var-calendar-minus,
  "calendar-plus": $fa-var-calendar-plus,
  "calendar-week": $fa-var-calendar-week,
  "calendar-xmark": $fa-var-calendar-xmark,
  "calendar-times": $fa-var-calendar-times,
  "camera": $fa-var-camera,
  "camera-alt": $fa-var-camera-alt,
  "camera-retro": $fa-var-camera-retro,
  "camera-rotate": $fa-var-camera-rotate,
  "campground": $fa-var-campground,
  "candy-cane": $fa-var-candy-cane,
  "cannabis": $fa-var-cannabis,
  "capsules": $fa-var-capsules,
  "car": $fa-var-car,
  "automobile": $fa-var-automobile,
  "car-battery": $fa-var-car-battery,
  "battery-car": $fa-var-battery-car,
  "car-crash": $fa-var-car-crash,
  "car-rear": $fa-var-car-rear,
  "car-alt": $fa-var-car-alt,
  "car-side": $fa-var-car-side,
  "caravan": $fa-var-caravan,
  "caret-down": $fa-var-caret-down,
  "caret-left": $fa-var-caret-left,
  "caret-right": $fa-var-caret-right,
  "caret-up": $fa-var-caret-up,
  "carrot": $fa-var-carrot,
  "cart-arrow-down": $fa-var-cart-arrow-down,
  "cart-flatbed": $fa-var-cart-flatbed,
  "dolly-flatbed": $fa-var-dolly-flatbed,
  "cart-flatbed-suitcase": $fa-var-cart-flatbed-suitcase,
  "luggage-cart": $fa-var-luggage-cart,
  "cart-plus": $fa-var-cart-plus,
  "cart-shopping": $fa-var-cart-shopping,
  "shopping-cart": $fa-var-shopping-cart,
  "cash-register": $fa-var-cash-register,
  "cat": $fa-var-cat,
  "cedi-sign": $fa-var-cedi-sign,
  "cent-sign": $fa-var-cent-sign,
  "certificate": $fa-var-certificate,
  "chair": $fa-var-chair,
  "chalkboard": $fa-var-chalkboard,
  "blackboard": $fa-var-blackboard,
  "chalkboard-user": $fa-var-chalkboard-user,
  "chalkboard-teacher": $fa-var-chalkboard-teacher,
  "champagne-glasses": $fa-var-champagne-glasses,
  "glass-cheers": $fa-var-glass-cheers,
  "charging-station": $fa-var-charging-station,
  "chart-area": $fa-var-chart-area,
  "area-chart": $fa-var-area-chart,
  "chart-bar": $fa-var-chart-bar,
  "bar-chart": $fa-var-bar-chart,
  "chart-column": $fa-var-chart-column,
  "chart-gantt": $fa-var-chart-gantt,
  "chart-line": $fa-var-chart-line,
  "line-chart": $fa-var-line-chart,
  "chart-pie": $fa-var-chart-pie,
  "pie-chart": $fa-var-pie-chart,
  "check": $fa-var-check,
  "check-double": $fa-var-check-double,
  "check-to-slot": $fa-var-check-to-slot,
  "vote-yea": $fa-var-vote-yea,
  "cheese": $fa-var-cheese,
  "chess": $fa-var-chess,
  "chess-bishop": $fa-var-chess-bishop,
  "chess-board": $fa-var-chess-board,
  "chess-king": $fa-var-chess-king,
  "chess-knight": $fa-var-chess-knight,
  "chess-pawn": $fa-var-chess-pawn,
  "chess-queen": $fa-var-chess-queen,
  "chess-rook": $fa-var-chess-rook,
  "chevron-down": $fa-var-chevron-down,
  "chevron-left": $fa-var-chevron-left,
  "chevron-right": $fa-var-chevron-right,
  "chevron-up": $fa-var-chevron-up,
  "child": $fa-var-child,
  "church": $fa-var-church,
  "circle": $fa-var-circle,
  "circle-arrow-down": $fa-var-circle-arrow-down,
  "arrow-circle-down": $fa-var-arrow-circle-down,
  "circle-arrow-left": $fa-var-circle-arrow-left,
  "arrow-circle-left": $fa-var-arrow-circle-left,
  "circle-arrow-right": $fa-var-circle-arrow-right,
  "arrow-circle-right": $fa-var-arrow-circle-right,
  "circle-arrow-up": $fa-var-circle-arrow-up,
  "arrow-circle-up": $fa-var-arrow-circle-up,
  "circle-check": $fa-var-circle-check,
  "check-circle": $fa-var-check-circle,
  "circle-chevron-down": $fa-var-circle-chevron-down,
  "chevron-circle-down": $fa-var-chevron-circle-down,
  "circle-chevron-left": $fa-var-circle-chevron-left,
  "chevron-circle-left": $fa-var-chevron-circle-left,
  "circle-chevron-right": $fa-var-circle-chevron-right,
  "chevron-circle-right": $fa-var-chevron-circle-right,
  "circle-chevron-up": $fa-var-circle-chevron-up,
  "chevron-circle-up": $fa-var-chevron-circle-up,
  "circle-dollar-to-slot": $fa-var-circle-dollar-to-slot,
  "donate": $fa-var-donate,
  "circle-dot": $fa-var-circle-dot,
  "dot-circle": $fa-var-dot-circle,
  "circle-down": $fa-var-circle-down,
  "arrow-alt-circle-down": $fa-var-arrow-alt-circle-down,
  "circle-exclamation": $fa-var-circle-exclamation,
  "exclamation-circle": $fa-var-exclamation-circle,
  "circle-h": $fa-var-circle-h,
  "hospital-symbol": $fa-var-hospital-symbol,
  "circle-half-stroke": $fa-var-circle-half-stroke,
  "adjust": $fa-var-adjust,
  "circle-info": $fa-var-circle-info,
  "info-circle": $fa-var-info-circle,
  "circle-left": $fa-var-circle-left,
  "arrow-alt-circle-left": $fa-var-arrow-alt-circle-left,
  "circle-minus": $fa-var-circle-minus,
  "minus-circle": $fa-var-minus-circle,
  "circle-notch": $fa-var-circle-notch,
  "circle-pause": $fa-var-circle-pause,
  "pause-circle": $fa-var-pause-circle,
  "circle-play": $fa-var-circle-play,
  "play-circle": $fa-var-play-circle,
  "circle-plus": $fa-var-circle-plus,
  "plus-circle": $fa-var-plus-circle,
  "circle-question": $fa-var-circle-question,
  "question-circle": $fa-var-question-circle,
  "circle-radiation": $fa-var-circle-radiation,
  "radiation-alt": $fa-var-radiation-alt,
  "circle-right": $fa-var-circle-right,
  "arrow-alt-circle-right": $fa-var-arrow-alt-circle-right,
  "circle-stop": $fa-var-circle-stop,
  "stop-circle": $fa-var-stop-circle,
  "circle-up": $fa-var-circle-up,
  "arrow-alt-circle-up": $fa-var-arrow-alt-circle-up,
  "circle-user": $fa-var-circle-user,
  "user-circle": $fa-var-user-circle,
  "circle-xmark": $fa-var-circle-xmark,
  "times-circle": $fa-var-times-circle,
  "xmark-circle": $fa-var-xmark-circle,
  "city": $fa-var-city,
  "clapperboard": $fa-var-clapperboard,
  "clipboard": $fa-var-clipboard,
  "clipboard-check": $fa-var-clipboard-check,
  "clipboard-list": $fa-var-clipboard-list,
  "clock": $fa-var-clock,
  "clock-four": $fa-var-clock-four,
  "clock-rotate-left": $fa-var-clock-rotate-left,
  "history": $fa-var-history,
  "clone": $fa-var-clone,
  "closed-captioning": $fa-var-closed-captioning,
  "cloud": $fa-var-cloud,
  "cloud-arrow-down": $fa-var-cloud-arrow-down,
  "cloud-download": $fa-var-cloud-download,
  "cloud-download-alt": $fa-var-cloud-download-alt,
  "cloud-arrow-up": $fa-var-cloud-arrow-up,
  "cloud-upload": $fa-var-cloud-upload,
  "cloud-upload-alt": $fa-var-cloud-upload-alt,
  "cloud-meatball": $fa-var-cloud-meatball,
  "cloud-moon": $fa-var-cloud-moon,
  "cloud-moon-rain": $fa-var-cloud-moon-rain,
  "cloud-rain": $fa-var-cloud-rain,
  "cloud-showers-heavy": $fa-var-cloud-showers-heavy,
  "cloud-sun": $fa-var-cloud-sun,
  "cloud-sun-rain": $fa-var-cloud-sun-rain,
  "clover": $fa-var-clover,
  "code": $fa-var-code,
  "code-branch": $fa-var-code-branch,
  "code-commit": $fa-var-code-commit,
  "code-compare": $fa-var-code-compare,
  "code-fork": $fa-var-code-fork,
  "code-merge": $fa-var-code-merge,
  "code-pull-request": $fa-var-code-pull-request,
  "coins": $fa-var-coins,
  "colon-sign": $fa-var-colon-sign,
  "comment": $fa-var-comment,
  "comment-dollar": $fa-var-comment-dollar,
  "comment-dots": $fa-var-comment-dots,
  "commenting": $fa-var-commenting,
  "comment-medical": $fa-var-comment-medical,
  "comment-slash": $fa-var-comment-slash,
  "comment-sms": $fa-var-comment-sms,
  "sms": $fa-var-sms,
  "comments": $fa-var-comments,
  "comments-dollar": $fa-var-comments-dollar,
  "compact-disc": $fa-var-compact-disc,
  "compass": $fa-var-compass,
  "compass-drafting": $fa-var-compass-drafting,
  "drafting-compass": $fa-var-drafting-compass,
  "compress": $fa-var-compress,
  "computer-mouse": $fa-var-computer-mouse,
  "mouse": $fa-var-mouse,
  "cookie": $fa-var-cookie,
  "cookie-bite": $fa-var-cookie-bite,
  "copy": $fa-var-copy,
  "copyright": $fa-var-copyright,
  "couch": $fa-var-couch,
  "credit-card": $fa-var-credit-card,
  "credit-card-alt": $fa-var-credit-card-alt,
  "crop": $fa-var-crop,
  "crop-simple": $fa-var-crop-simple,
  "crop-alt": $fa-var-crop-alt,
  "cross": $fa-var-cross,
  "crosshairs": $fa-var-crosshairs,
  "crow": $fa-var-crow,
  "crown": $fa-var-crown,
  "crutch": $fa-var-crutch,
  "cruzeiro-sign": $fa-var-cruzeiro-sign,
  "cube": $fa-var-cube,
  "cubes": $fa-var-cubes,
  "d": $fa-var-d,
  "database": $fa-var-database,
  "delete-left": $fa-var-delete-left,
  "backspace": $fa-var-backspace,
  "democrat": $fa-var-democrat,
  "desktop": $fa-var-desktop,
  "desktop-alt": $fa-var-desktop-alt,
  "dharmachakra": $fa-var-dharmachakra,
  "diagram-next": $fa-var-diagram-next,
  "diagram-predecessor": $fa-var-diagram-predecessor,
  "diagram-project": $fa-var-diagram-project,
  "project-diagram": $fa-var-project-diagram,
  "diagram-successor": $fa-var-diagram-successor,
  "diamond": $fa-var-diamond,
  "diamond-turn-right": $fa-var-diamond-turn-right,
  "directions": $fa-var-directions,
  "dice": $fa-var-dice,
  "dice-d20": $fa-var-dice-d20,
  "dice-d6": $fa-var-dice-d6,
  "dice-five": $fa-var-dice-five,
  "dice-four": $fa-var-dice-four,
  "dice-one": $fa-var-dice-one,
  "dice-six": $fa-var-dice-six,
  "dice-three": $fa-var-dice-three,
  "dice-two": $fa-var-dice-two,
  "disease": $fa-var-disease,
  "divide": $fa-var-divide,
  "dna": $fa-var-dna,
  "dog": $fa-var-dog,
  "dollar-sign": $fa-var-dollar-sign,
  "dollar": $fa-var-dollar,
  "usd": $fa-var-usd,
  "dolly": $fa-var-dolly,
  "dolly-box": $fa-var-dolly-box,
  "dong-sign": $fa-var-dong-sign,
  "door-closed": $fa-var-door-closed,
  "door-open": $fa-var-door-open,
  "dove": $fa-var-dove,
  "down-left-and-up-right-to-center": $fa-var-down-left-and-up-right-to-center,
  "compress-alt": $fa-var-compress-alt,
  "down-long": $fa-var-down-long,
  "long-arrow-alt-down": $fa-var-long-arrow-alt-down,
  "download": $fa-var-download,
  "dragon": $fa-var-dragon,
  "draw-polygon": $fa-var-draw-polygon,
  "droplet": $fa-var-droplet,
  "tint": $fa-var-tint,
  "droplet-slash": $fa-var-droplet-slash,
  "tint-slash": $fa-var-tint-slash,
  "drum": $fa-var-drum,
  "drum-steelpan": $fa-var-drum-steelpan,
  "drumstick-bite": $fa-var-drumstick-bite,
  "dumbbell": $fa-var-dumbbell,
  "dumpster": $fa-var-dumpster,
  "dumpster-fire": $fa-var-dumpster-fire,
  "dungeon": $fa-var-dungeon,
  "e": $fa-var-e,
  "ear-deaf": $fa-var-ear-deaf,
  "deaf": $fa-var-deaf,
  "deafness": $fa-var-deafness,
  "hard-of-hearing": $fa-var-hard-of-hearing,
  "ear-listen": $fa-var-ear-listen,
  "assistive-listening-systems": $fa-var-assistive-listening-systems,
  "earth-africa": $fa-var-earth-africa,
  "globe-africa": $fa-var-globe-africa,
  "earth-americas": $fa-var-earth-americas,
  "earth": $fa-var-earth,
  "earth-america": $fa-var-earth-america,
  "globe-americas": $fa-var-globe-americas,
  "earth-asia": $fa-var-earth-asia,
  "globe-asia": $fa-var-globe-asia,
  "earth-europe": $fa-var-earth-europe,
  "globe-europe": $fa-var-globe-europe,
  "earth-oceania": $fa-var-earth-oceania,
  "globe-oceania": $fa-var-globe-oceania,
  "egg": $fa-var-egg,
  "eject": $fa-var-eject,
  "elevator": $fa-var-elevator,
  "ellipsis": $fa-var-ellipsis,
  "ellipsis-h": $fa-var-ellipsis-h,
  "ellipsis-vertical": $fa-var-ellipsis-vertical,
  "ellipsis-v": $fa-var-ellipsis-v,
  "envelope": $fa-var-envelope,
  "envelope-open": $fa-var-envelope-open,
  "envelope-open-text": $fa-var-envelope-open-text,
  "envelopes-bulk": $fa-var-envelopes-bulk,
  "mail-bulk": $fa-var-mail-bulk,
  "equals": $fa-var-equals,
  "eraser": $fa-var-eraser,
  "ethernet": $fa-var-ethernet,
  "euro-sign": $fa-var-euro-sign,
  "eur": $fa-var-eur,
  "euro": $fa-var-euro,
  "exclamation": $fa-var-exclamation,
  "expand": $fa-var-expand,
  "eye": $fa-var-eye,
  "eye-dropper": $fa-var-eye-dropper,
  "eye-dropper-empty": $fa-var-eye-dropper-empty,
  "eyedropper": $fa-var-eyedropper,
  "eye-low-vision": $fa-var-eye-low-vision,
  "low-vision": $fa-var-low-vision,
  "eye-slash": $fa-var-eye-slash,
  "f": $fa-var-f,
  "face-angry": $fa-var-face-angry,
  "angry": $fa-var-angry,
  "face-dizzy": $fa-var-face-dizzy,
  "dizzy": $fa-var-dizzy,
  "face-flushed": $fa-var-face-flushed,
  "flushed": $fa-var-flushed,
  "face-frown": $fa-var-face-frown,
  "frown": $fa-var-frown,
  "face-frown-open": $fa-var-face-frown-open,
  "frown-open": $fa-var-frown-open,
  "face-grimace": $fa-var-face-grimace,
  "grimace": $fa-var-grimace,
  "face-grin": $fa-var-face-grin,
  "grin": $fa-var-grin,
  "face-grin-beam": $fa-var-face-grin-beam,
  "grin-beam": $fa-var-grin-beam,
  "face-grin-beam-sweat": $fa-var-face-grin-beam-sweat,
  "grin-beam-sweat": $fa-var-grin-beam-sweat,
  "face-grin-hearts": $fa-var-face-grin-hearts,
  "grin-hearts": $fa-var-grin-hearts,
  "face-grin-squint": $fa-var-face-grin-squint,
  "grin-squint": $fa-var-grin-squint,
  "face-grin-squint-tears": $fa-var-face-grin-squint-tears,
  "grin-squint-tears": $fa-var-grin-squint-tears,
  "face-grin-stars": $fa-var-face-grin-stars,
  "grin-stars": $fa-var-grin-stars,
  "face-grin-tears": $fa-var-face-grin-tears,
  "grin-tears": $fa-var-grin-tears,
  "face-grin-tongue": $fa-var-face-grin-tongue,
  "grin-tongue": $fa-var-grin-tongue,
  "face-grin-tongue-squint": $fa-var-face-grin-tongue-squint,
  "grin-tongue-squint": $fa-var-grin-tongue-squint,
  "face-grin-tongue-wink": $fa-var-face-grin-tongue-wink,
  "grin-tongue-wink": $fa-var-grin-tongue-wink,
  "face-grin-wide": $fa-var-face-grin-wide,
  "grin-alt": $fa-var-grin-alt,
  "face-grin-wink": $fa-var-face-grin-wink,
  "grin-wink": $fa-var-grin-wink,
  "face-kiss": $fa-var-face-kiss,
  "kiss": $fa-var-kiss,
  "face-kiss-beam": $fa-var-face-kiss-beam,
  "kiss-beam": $fa-var-kiss-beam,
  "face-kiss-wink-heart": $fa-var-face-kiss-wink-heart,
  "kiss-wink-heart": $fa-var-kiss-wink-heart,
  "face-laugh": $fa-var-face-laugh,
  "laugh": $fa-var-laugh,
  "face-laugh-beam": $fa-var-face-laugh-beam,
  "laugh-beam": $fa-var-laugh-beam,
  "face-laugh-squint": $fa-var-face-laugh-squint,
  "laugh-squint": $fa-var-laugh-squint,
  "face-laugh-wink": $fa-var-face-laugh-wink,
  "laugh-wink": $fa-var-laugh-wink,
  "face-meh": $fa-var-face-meh,
  "meh": $fa-var-meh,
  "face-meh-blank": $fa-var-face-meh-blank,
  "meh-blank": $fa-var-meh-blank,
  "face-rolling-eyes": $fa-var-face-rolling-eyes,
  "meh-rolling-eyes": $fa-var-meh-rolling-eyes,
  "face-sad-cry": $fa-var-face-sad-cry,
  "sad-cry": $fa-var-sad-cry,
  "face-sad-tear": $fa-var-face-sad-tear,
  "sad-tear": $fa-var-sad-tear,
  "face-smile": $fa-var-face-smile,
  "smile": $fa-var-smile,
  "face-smile-beam": $fa-var-face-smile-beam,
  "smile-beam": $fa-var-smile-beam,
  "face-smile-wink": $fa-var-face-smile-wink,
  "smile-wink": $fa-var-smile-wink,
  "face-surprise": $fa-var-face-surprise,
  "surprise": $fa-var-surprise,
  "face-tired": $fa-var-face-tired,
  "tired": $fa-var-tired,
  "fan": $fa-var-fan,
  "faucet": $fa-var-faucet,
  "fax": $fa-var-fax,
  "feather": $fa-var-feather,
  "feather-pointed": $fa-var-feather-pointed,
  "feather-alt": $fa-var-feather-alt,
  "file": $fa-var-file,
  "file-arrow-down": $fa-var-file-arrow-down,
  "file-download": $fa-var-file-download,
  "file-arrow-up": $fa-var-file-arrow-up,
  "file-upload": $fa-var-file-upload,
  "file-audio": $fa-var-file-audio,
  "file-code": $fa-var-file-code,
  "file-contract": $fa-var-file-contract,
  "file-csv": $fa-var-file-csv,
  "file-excel": $fa-var-file-excel,
  "file-export": $fa-var-file-export,
  "arrow-right-from-file": $fa-var-arrow-right-from-file,
  "file-image": $fa-var-file-image,
  "file-import": $fa-var-file-import,
  "arrow-right-to-file": $fa-var-arrow-right-to-file,
  "file-invoice": $fa-var-file-invoice,
  "file-invoice-dollar": $fa-var-file-invoice-dollar,
  "file-lines": $fa-var-file-lines,
  "file-alt": $fa-var-file-alt,
  "file-text": $fa-var-file-text,
  "file-medical": $fa-var-file-medical,
  "file-pdf": $fa-var-file-pdf,
  "file-powerpoint": $fa-var-file-powerpoint,
  "file-prescription": $fa-var-file-prescription,
  "file-signature": $fa-var-file-signature,
  "file-video": $fa-var-file-video,
  "file-waveform": $fa-var-file-waveform,
  "file-medical-alt": $fa-var-file-medical-alt,
  "file-word": $fa-var-file-word,
  "file-zipper": $fa-var-file-zipper,
  "file-archive": $fa-var-file-archive,
  "fill": $fa-var-fill,
  "fill-drip": $fa-var-fill-drip,
  "film": $fa-var-film,
  "filter": $fa-var-filter,
  "filter-circle-dollar": $fa-var-filter-circle-dollar,
  "funnel-dollar": $fa-var-funnel-dollar,
  "filter-circle-xmark": $fa-var-filter-circle-xmark,
  "fingerprint": $fa-var-fingerprint,
  "fire": $fa-var-fire,
  "fire-extinguisher": $fa-var-fire-extinguisher,
  "fire-flame-curved": $fa-var-fire-flame-curved,
  "fire-alt": $fa-var-fire-alt,
  "fire-flame-simple": $fa-var-fire-flame-simple,
  "burn": $fa-var-burn,
  "fish": $fa-var-fish,
  "flag": $fa-var-flag,
  "flag-checkered": $fa-var-flag-checkered,
  "flag-usa": $fa-var-flag-usa,
  "flask": $fa-var-flask,
  "floppy-disk": $fa-var-floppy-disk,
  "save": $fa-var-save,
  "florin-sign": $fa-var-florin-sign,
  "folder": $fa-var-folder,
  "folder-minus": $fa-var-folder-minus,
  "folder-open": $fa-var-folder-open,
  "folder-plus": $fa-var-folder-plus,
  "folder-tree": $fa-var-folder-tree,
  "font": $fa-var-font,
  "football": $fa-var-football,
  "football-ball": $fa-var-football-ball,
  "forward": $fa-var-forward,
  "forward-fast": $fa-var-forward-fast,
  "fast-forward": $fa-var-fast-forward,
  "forward-step": $fa-var-forward-step,
  "step-forward": $fa-var-step-forward,
  "franc-sign": $fa-var-franc-sign,
  "frog": $fa-var-frog,
  "futbol": $fa-var-futbol,
  "futbol-ball": $fa-var-futbol-ball,
  "soccer-ball": $fa-var-soccer-ball,
  "g": $fa-var-g,
  "gamepad": $fa-var-gamepad,
  "gas-pump": $fa-var-gas-pump,
  "gauge": $fa-var-gauge,
  "dashboard": $fa-var-dashboard,
  "gauge-med": $fa-var-gauge-med,
  "tachometer-alt-average": $fa-var-tachometer-alt-average,
  "gauge-high": $fa-var-gauge-high,
  "tachometer-alt": $fa-var-tachometer-alt,
  "tachometer-alt-fast": $fa-var-tachometer-alt-fast,
  "gauge-simple": $fa-var-gauge-simple,
  "gauge-simple-med": $fa-var-gauge-simple-med,
  "tachometer-average": $fa-var-tachometer-average,
  "gauge-simple-high": $fa-var-gauge-simple-high,
  "tachometer": $fa-var-tachometer,
  "tachometer-fast": $fa-var-tachometer-fast,
  "gavel": $fa-var-gavel,
  "legal": $fa-var-legal,
  "gear": $fa-var-gear,
  "cog": $fa-var-cog,
  "gears": $fa-var-gears,
  "cogs": $fa-var-cogs,
  "gem": $fa-var-gem,
  "genderless": $fa-var-genderless,
  "ghost": $fa-var-ghost,
  "gift": $fa-var-gift,
  "gifts": $fa-var-gifts,
  "glasses": $fa-var-glasses,
  "globe": $fa-var-globe,
  "golf-ball-tee": $fa-var-golf-ball-tee,
  "golf-ball": $fa-var-golf-ball,
  "gopuram": $fa-var-gopuram,
  "graduation-cap": $fa-var-graduation-cap,
  "mortar-board": $fa-var-mortar-board,
  "greater-than": $fa-var-greater-than,
  "greater-than-equal": $fa-var-greater-than-equal,
  "grip": $fa-var-grip,
  "grip-horizontal": $fa-var-grip-horizontal,
  "grip-lines": $fa-var-grip-lines,
  "grip-lines-vertical": $fa-var-grip-lines-vertical,
  "grip-vertical": $fa-var-grip-vertical,
  "guarani-sign": $fa-var-guarani-sign,
  "guitar": $fa-var-guitar,
  "gun": $fa-var-gun,
  "h": $fa-var-h,
  "hammer": $fa-var-hammer,
  "hamsa": $fa-var-hamsa,
  "hand": $fa-var-hand,
  "hand-paper": $fa-var-hand-paper,
  "hand-back-fist": $fa-var-hand-back-fist,
  "hand-rock": $fa-var-hand-rock,
  "hand-dots": $fa-var-hand-dots,
  "allergies": $fa-var-allergies,
  "hand-fist": $fa-var-hand-fist,
  "fist-raised": $fa-var-fist-raised,
  "hand-holding": $fa-var-hand-holding,
  "hand-holding-dollar": $fa-var-hand-holding-dollar,
  "hand-holding-usd": $fa-var-hand-holding-usd,
  "hand-holding-droplet": $fa-var-hand-holding-droplet,
  "hand-holding-water": $fa-var-hand-holding-water,
  "hand-holding-heart": $fa-var-hand-holding-heart,
  "hand-holding-medical": $fa-var-hand-holding-medical,
  "hand-lizard": $fa-var-hand-lizard,
  "hand-middle-finger": $fa-var-hand-middle-finger,
  "hand-peace": $fa-var-hand-peace,
  "hand-point-down": $fa-var-hand-point-down,
  "hand-point-left": $fa-var-hand-point-left,
  "hand-point-right": $fa-var-hand-point-right,
  "hand-point-up": $fa-var-hand-point-up,
  "hand-pointer": $fa-var-hand-pointer,
  "hand-scissors": $fa-var-hand-scissors,
  "hand-sparkles": $fa-var-hand-sparkles,
  "hand-spock": $fa-var-hand-spock,
  "hands": $fa-var-hands,
  "sign-language": $fa-var-sign-language,
  "signing": $fa-var-signing,
  "hands-asl-interpreting": $fa-var-hands-asl-interpreting,
  "american-sign-language-interpreting": $fa-var-american-sign-language-interpreting,
  "asl-interpreting": $fa-var-asl-interpreting,
  "hands-american-sign-language-interpreting": $fa-var-hands-american-sign-language-interpreting,
  "hands-bubbles": $fa-var-hands-bubbles,
  "hands-wash": $fa-var-hands-wash,
  "hands-clapping": $fa-var-hands-clapping,
  "hands-holding": $fa-var-hands-holding,
  "hands-praying": $fa-var-hands-praying,
  "praying-hands": $fa-var-praying-hands,
  "handshake": $fa-var-handshake,
  "handshake-angle": $fa-var-handshake-angle,
  "hands-helping": $fa-var-hands-helping,
  "handshake-simple-slash": $fa-var-handshake-simple-slash,
  "handshake-alt-slash": $fa-var-handshake-alt-slash,
  "handshake-slash": $fa-var-handshake-slash,
  "hanukiah": $fa-var-hanukiah,
  "hard-drive": $fa-var-hard-drive,
  "hdd": $fa-var-hdd,
  "hashtag": $fa-var-hashtag,
  "hat-cowboy": $fa-var-hat-cowboy,
  "hat-cowboy-side": $fa-var-hat-cowboy-side,
  "hat-wizard": $fa-var-hat-wizard,
  "head-side-cough": $fa-var-head-side-cough,
  "head-side-cough-slash": $fa-var-head-side-cough-slash,
  "head-side-mask": $fa-var-head-side-mask,
  "head-side-virus": $fa-var-head-side-virus,
  "heading": $fa-var-heading,
  "header": $fa-var-header,
  "headphones": $fa-var-headphones,
  "headphones-simple": $fa-var-headphones-simple,
  "headphones-alt": $fa-var-headphones-alt,
  "headset": $fa-var-headset,
  "heart": $fa-var-heart,
  "heart-crack": $fa-var-heart-crack,
  "heart-broken": $fa-var-heart-broken,
  "heart-pulse": $fa-var-heart-pulse,
  "heartbeat": $fa-var-heartbeat,
  "helicopter": $fa-var-helicopter,
  "helmet-safety": $fa-var-helmet-safety,
  "hard-hat": $fa-var-hard-hat,
  "hat-hard": $fa-var-hat-hard,
  "highlighter": $fa-var-highlighter,
  "hippo": $fa-var-hippo,
  "hockey-puck": $fa-var-hockey-puck,
  "holly-berry": $fa-var-holly-berry,
  "horse": $fa-var-horse,
  "horse-head": $fa-var-horse-head,
  "hospital": $fa-var-hospital,
  "hospital-alt": $fa-var-hospital-alt,
  "hospital-wide": $fa-var-hospital-wide,
  "hospital-user": $fa-var-hospital-user,
  "hot-tub-person": $fa-var-hot-tub-person,
  "hot-tub": $fa-var-hot-tub,
  "hotdog": $fa-var-hotdog,
  "hotel": $fa-var-hotel,
  "hourglass": $fa-var-hourglass,
  "hourglass-2": $fa-var-hourglass-2,
  "hourglass-half": $fa-var-hourglass-half,
  "hourglass-empty": $fa-var-hourglass-empty,
  "hourglass-end": $fa-var-hourglass-end,
  "hourglass-3": $fa-var-hourglass-3,
  "hourglass-start": $fa-var-hourglass-start,
  "hourglass-1": $fa-var-hourglass-1,
  "house": $fa-var-house,
  "home": $fa-var-home,
  "home-alt": $fa-var-home-alt,
  "home-lg-alt": $fa-var-home-lg-alt,
  "house-chimney": $fa-var-house-chimney,
  "home-lg": $fa-var-home-lg,
  "house-chimney-crack": $fa-var-house-chimney-crack,
  "house-damage": $fa-var-house-damage,
  "house-chimney-medical": $fa-var-house-chimney-medical,
  "clinic-medical": $fa-var-clinic-medical,
  "house-chimney-user": $fa-var-house-chimney-user,
  "house-chimney-window": $fa-var-house-chimney-window,
  "house-crack": $fa-var-house-crack,
  "house-laptop": $fa-var-house-laptop,
  "laptop-house": $fa-var-laptop-house,
  "house-medical": $fa-var-house-medical,
  "house-user": $fa-var-house-user,
  "home-user": $fa-var-home-user,
  "hryvnia-sign": $fa-var-hryvnia-sign,
  "hryvnia": $fa-var-hryvnia,
  "i": $fa-var-i,
  "i-cursor": $fa-var-i-cursor,
  "ice-cream": $fa-var-ice-cream,
  "icicles": $fa-var-icicles,
  "icons": $fa-var-icons,
  "heart-music-camera-bolt": $fa-var-heart-music-camera-bolt,
  "id-badge": $fa-var-id-badge,
  "id-card": $fa-var-id-card,
  "drivers-license": $fa-var-drivers-license,
  "id-card-clip": $fa-var-id-card-clip,
  "id-card-alt": $fa-var-id-card-alt,
  "igloo": $fa-var-igloo,
  "image": $fa-var-image,
  "image-portrait": $fa-var-image-portrait,
  "portrait": $fa-var-portrait,
  "images": $fa-var-images,
  "inbox": $fa-var-inbox,
  "indent": $fa-var-indent,
  "indian-rupee-sign": $fa-var-indian-rupee-sign,
  "indian-rupee": $fa-var-indian-rupee,
  "inr": $fa-var-inr,
  "industry": $fa-var-industry,
  "infinity": $fa-var-infinity,
  "info": $fa-var-info,
  "italic": $fa-var-italic,
  "j": $fa-var-j,
  "jedi": $fa-var-jedi,
  "jet-fighter": $fa-var-jet-fighter,
  "fighter-jet": $fa-var-fighter-jet,
  "joint": $fa-var-joint,
  "k": $fa-var-k,
  "kaaba": $fa-var-kaaba,
  "key": $fa-var-key,
  "keyboard": $fa-var-keyboard,
  "khanda": $fa-var-khanda,
  "kip-sign": $fa-var-kip-sign,
  "kit-medical": $fa-var-kit-medical,
  "first-aid": $fa-var-first-aid,
  "kiwi-bird": $fa-var-kiwi-bird,
  "l": $fa-var-l,
  "landmark": $fa-var-landmark,
  "language": $fa-var-language,
  "laptop": $fa-var-laptop,
  "laptop-code": $fa-var-laptop-code,
  "laptop-medical": $fa-var-laptop-medical,
  "lari-sign": $fa-var-lari-sign,
  "layer-group": $fa-var-layer-group,
  "leaf": $fa-var-leaf,
  "left-long": $fa-var-left-long,
  "long-arrow-alt-left": $fa-var-long-arrow-alt-left,
  "left-right": $fa-var-left-right,
  "arrows-alt-h": $fa-var-arrows-alt-h,
  "lemon": $fa-var-lemon,
  "less-than": $fa-var-less-than,
  "less-than-equal": $fa-var-less-than-equal,
  "life-ring": $fa-var-life-ring,
  "lightbulb": $fa-var-lightbulb,
  "link": $fa-var-link,
  "chain": $fa-var-chain,
  "link-slash": $fa-var-link-slash,
  "chain-broken": $fa-var-chain-broken,
  "chain-slash": $fa-var-chain-slash,
  "unlink": $fa-var-unlink,
  "lira-sign": $fa-var-lira-sign,
  "list": $fa-var-list,
  "list-squares": $fa-var-list-squares,
  "list-check": $fa-var-list-check,
  "tasks": $fa-var-tasks,
  "list-ol": $fa-var-list-ol,
  "list-1-2": $fa-var-list-1-2,
  "list-numeric": $fa-var-list-numeric,
  "list-ul": $fa-var-list-ul,
  "list-dots": $fa-var-list-dots,
  "litecoin-sign": $fa-var-litecoin-sign,
  "location-arrow": $fa-var-location-arrow,
  "location-crosshairs": $fa-var-location-crosshairs,
  "location": $fa-var-location,
  "location-dot": $fa-var-location-dot,
  "map-marker-alt": $fa-var-map-marker-alt,
  "location-pin": $fa-var-location-pin,
  "map-marker": $fa-var-map-marker,
  "lock": $fa-var-lock,
  "lock-open": $fa-var-lock-open,
  "lungs": $fa-var-lungs,
  "lungs-virus": $fa-var-lungs-virus,
  "m": $fa-var-m,
  "magnet": $fa-var-magnet,
  "magnifying-glass": $fa-var-magnifying-glass,
  "search": $fa-var-search,
  "magnifying-glass-dollar": $fa-var-magnifying-glass-dollar,
  "search-dollar": $fa-var-search-dollar,
  "magnifying-glass-location": $fa-var-magnifying-glass-location,
  "search-location": $fa-var-search-location,
  "magnifying-glass-minus": $fa-var-magnifying-glass-minus,
  "search-minus": $fa-var-search-minus,
  "magnifying-glass-plus": $fa-var-magnifying-glass-plus,
  "search-plus": $fa-var-search-plus,
  "manat-sign": $fa-var-manat-sign,
  "map": $fa-var-map,
  "map-location": $fa-var-map-location,
  "map-marked": $fa-var-map-marked,
  "map-location-dot": $fa-var-map-location-dot,
  "map-marked-alt": $fa-var-map-marked-alt,
  "map-pin": $fa-var-map-pin,
  "marker": $fa-var-marker,
  "mars": $fa-var-mars,
  "mars-and-venus": $fa-var-mars-and-venus,
  "mars-double": $fa-var-mars-double,
  "mars-stroke": $fa-var-mars-stroke,
  "mars-stroke-right": $fa-var-mars-stroke-right,
  "mars-stroke-h": $fa-var-mars-stroke-h,
  "mars-stroke-up": $fa-var-mars-stroke-up,
  "mars-stroke-v": $fa-var-mars-stroke-v,
  "martini-glass": $fa-var-martini-glass,
  "glass-martini-alt": $fa-var-glass-martini-alt,
  "martini-glass-citrus": $fa-var-martini-glass-citrus,
  "cocktail": $fa-var-cocktail,
  "martini-glass-empty": $fa-var-martini-glass-empty,
  "glass-martini": $fa-var-glass-martini,
  "mask": $fa-var-mask,
  "mask-face": $fa-var-mask-face,
  "masks-theater": $fa-var-masks-theater,
  "theater-masks": $fa-var-theater-masks,
  "maximize": $fa-var-maximize,
  "expand-arrows-alt": $fa-var-expand-arrows-alt,
  "medal": $fa-var-medal,
  "memory": $fa-var-memory,
  "menorah": $fa-var-menorah,
  "mercury": $fa-var-mercury,
  "message": $fa-var-message,
  "comment-alt": $fa-var-comment-alt,
  "meteor": $fa-var-meteor,
  "microchip": $fa-var-microchip,
  "microphone": $fa-var-microphone,
  "microphone-lines": $fa-var-microphone-lines,
  "microphone-alt": $fa-var-microphone-alt,
  "microphone-lines-slash": $fa-var-microphone-lines-slash,
  "microphone-alt-slash": $fa-var-microphone-alt-slash,
  "microphone-slash": $fa-var-microphone-slash,
  "microscope": $fa-var-microscope,
  "mill-sign": $fa-var-mill-sign,
  "minimize": $fa-var-minimize,
  "compress-arrows-alt": $fa-var-compress-arrows-alt,
  "minus": $fa-var-minus,
  "subtract": $fa-var-subtract,
  "mitten": $fa-var-mitten,
  "mobile": $fa-var-mobile,
  "mobile-android": $fa-var-mobile-android,
  "mobile-phone": $fa-var-mobile-phone,
  "mobile-button": $fa-var-mobile-button,
  "mobile-screen-button": $fa-var-mobile-screen-button,
  "mobile-alt": $fa-var-mobile-alt,
  "money-bill": $fa-var-money-bill,
  "money-bill-1": $fa-var-money-bill-1,
  "money-bill-alt": $fa-var-money-bill-alt,
  "money-bill-1-wave": $fa-var-money-bill-1-wave,
  "money-bill-wave-alt": $fa-var-money-bill-wave-alt,
  "money-bill-wave": $fa-var-money-bill-wave,
  "money-check": $fa-var-money-check,
  "money-check-dollar": $fa-var-money-check-dollar,
  "money-check-alt": $fa-var-money-check-alt,
  "monument": $fa-var-monument,
  "moon": $fa-var-moon,
  "mortar-pestle": $fa-var-mortar-pestle,
  "mosque": $fa-var-mosque,
  "motorcycle": $fa-var-motorcycle,
  "mountain": $fa-var-mountain,
  "mug-hot": $fa-var-mug-hot,
  "mug-saucer": $fa-var-mug-saucer,
  "coffee": $fa-var-coffee,
  "music": $fa-var-music,
  "n": $fa-var-n,
  "naira-sign": $fa-var-naira-sign,
  "network-wired": $fa-var-network-wired,
  "neuter": $fa-var-neuter,
  "newspaper": $fa-var-newspaper,
  "not-equal": $fa-var-not-equal,
  "note-sticky": $fa-var-note-sticky,
  "sticky-note": $fa-var-sticky-note,
  "notes-medical": $fa-var-notes-medical,
  "o": $fa-var-o,
  "object-group": $fa-var-object-group,
  "object-ungroup": $fa-var-object-ungroup,
  "oil-can": $fa-var-oil-can,
  "om": $fa-var-om,
  "otter": $fa-var-otter,
  "outdent": $fa-var-outdent,
  "dedent": $fa-var-dedent,
  "p": $fa-var-p,
  "pager": $fa-var-pager,
  "paint-roller": $fa-var-paint-roller,
  "paintbrush": $fa-var-paintbrush,
  "paint-brush": $fa-var-paint-brush,
  "palette": $fa-var-palette,
  "pallet": $fa-var-pallet,
  "panorama": $fa-var-panorama,
  "paper-plane": $fa-var-paper-plane,
  "paperclip": $fa-var-paperclip,
  "parachute-box": $fa-var-parachute-box,
  "paragraph": $fa-var-paragraph,
  "passport": $fa-var-passport,
  "paste": $fa-var-paste,
  "file-clipboard": $fa-var-file-clipboard,
  "pause": $fa-var-pause,
  "paw": $fa-var-paw,
  "peace": $fa-var-peace,
  "pen": $fa-var-pen,
  "pen-clip": $fa-var-pen-clip,
  "pen-alt": $fa-var-pen-alt,
  "pen-fancy": $fa-var-pen-fancy,
  "pen-nib": $fa-var-pen-nib,
  "pen-ruler": $fa-var-pen-ruler,
  "pencil-ruler": $fa-var-pencil-ruler,
  "pen-to-square": $fa-var-pen-to-square,
  "edit": $fa-var-edit,
  "pencil": $fa-var-pencil,
  "pencil-alt": $fa-var-pencil-alt,
  "people-arrows-left-right": $fa-var-people-arrows-left-right,
  "people-arrows": $fa-var-people-arrows,
  "people-carry-box": $fa-var-people-carry-box,
  "people-carry": $fa-var-people-carry,
  "pepper-hot": $fa-var-pepper-hot,
  "percent": $fa-var-percent,
  "percentage": $fa-var-percentage,
  "person": $fa-var-person,
  "male": $fa-var-male,
  "person-biking": $fa-var-person-biking,
  "biking": $fa-var-biking,
  "person-booth": $fa-var-person-booth,
  "person-dots-from-line": $fa-var-person-dots-from-line,
  "diagnoses": $fa-var-diagnoses,
  "person-dress": $fa-var-person-dress,
  "female": $fa-var-female,
  "person-hiking": $fa-var-person-hiking,
  "hiking": $fa-var-hiking,
  "person-praying": $fa-var-person-praying,
  "pray": $fa-var-pray,
  "person-running": $fa-var-person-running,
  "running": $fa-var-running,
  "person-skating": $fa-var-person-skating,
  "skating": $fa-var-skating,
  "person-skiing": $fa-var-person-skiing,
  "skiing": $fa-var-skiing,
  "person-skiing-nordic": $fa-var-person-skiing-nordic,
  "skiing-nordic": $fa-var-skiing-nordic,
  "person-snowboarding": $fa-var-person-snowboarding,
  "snowboarding": $fa-var-snowboarding,
  "person-swimming": $fa-var-person-swimming,
  "swimmer": $fa-var-swimmer,
  "person-walking": $fa-var-person-walking,
  "walking": $fa-var-walking,
  "person-walking-with-cane": $fa-var-person-walking-with-cane,
  "blind": $fa-var-blind,
  "peseta-sign": $fa-var-peseta-sign,
  "peso-sign": $fa-var-peso-sign,
  "phone": $fa-var-phone,
  "phone-flip": $fa-var-phone-flip,
  "phone-alt": $fa-var-phone-alt,
  "phone-slash": $fa-var-phone-slash,
  "phone-volume": $fa-var-phone-volume,
  "volume-control-phone": $fa-var-volume-control-phone,
  "photo-film": $fa-var-photo-film,
  "photo-video": $fa-var-photo-video,
  "piggy-bank": $fa-var-piggy-bank,
  "pills": $fa-var-pills,
  "pizza-slice": $fa-var-pizza-slice,
  "place-of-worship": $fa-var-place-of-worship,
  "plane": $fa-var-plane,
  "plane-arrival": $fa-var-plane-arrival,
  "plane-departure": $fa-var-plane-departure,
  "plane-slash": $fa-var-plane-slash,
  "play": $fa-var-play,
  "plug": $fa-var-plug,
  "plus": $fa-var-plus,
  "add": $fa-var-add,
  "plus-minus": $fa-var-plus-minus,
  "podcast": $fa-var-podcast,
  "poo": $fa-var-poo,
  "poo-storm": $fa-var-poo-storm,
  "poo-bolt": $fa-var-poo-bolt,
  "poop": $fa-var-poop,
  "power-off": $fa-var-power-off,
  "prescription": $fa-var-prescription,
  "prescription-bottle": $fa-var-prescription-bottle,
  "prescription-bottle-medical": $fa-var-prescription-bottle-medical,
  "prescription-bottle-alt": $fa-var-prescription-bottle-alt,
  "print": $fa-var-print,
  "pump-medical": $fa-var-pump-medical,
  "pump-soap": $fa-var-pump-soap,
  "puzzle-piece": $fa-var-puzzle-piece,
  "q": $fa-var-q,
  "qrcode": $fa-var-qrcode,
  "question": $fa-var-question,
  "quote-left": $fa-var-quote-left,
  "quote-left-alt": $fa-var-quote-left-alt,
  "quote-right": $fa-var-quote-right,
  "quote-right-alt": $fa-var-quote-right-alt,
  "r": $fa-var-r,
  "radiation": $fa-var-radiation,
  "rainbow": $fa-var-rainbow,
  "receipt": $fa-var-receipt,
  "record-vinyl": $fa-var-record-vinyl,
  "rectangle-ad": $fa-var-rectangle-ad,
  "ad": $fa-var-ad,
  "rectangle-list": $fa-var-rectangle-list,
  "list-alt": $fa-var-list-alt,
  "rectangle-xmark": $fa-var-rectangle-xmark,
  "rectangle-times": $fa-var-rectangle-times,
  "times-rectangle": $fa-var-times-rectangle,
  "window-close": $fa-var-window-close,
  "recycle": $fa-var-recycle,
  "registered": $fa-var-registered,
  "repeat": $fa-var-repeat,
  "reply": $fa-var-reply,
  "mail-reply": $fa-var-mail-reply,
  "reply-all": $fa-var-reply-all,
  "mail-reply-all": $fa-var-mail-reply-all,
  "republican": $fa-var-republican,
  "restroom": $fa-var-restroom,
  "retweet": $fa-var-retweet,
  "ribbon": $fa-var-ribbon,
  "right-from-bracket": $fa-var-right-from-bracket,
  "sign-out-alt": $fa-var-sign-out-alt,
  "right-left": $fa-var-right-left,
  "exchange-alt": $fa-var-exchange-alt,
  "right-long": $fa-var-right-long,
  "long-arrow-alt-right": $fa-var-long-arrow-alt-right,
  "right-to-bracket": $fa-var-right-to-bracket,
  "sign-in-alt": $fa-var-sign-in-alt,
  "ring": $fa-var-ring,
  "road": $fa-var-road,
  "robot": $fa-var-robot,
  "rocket": $fa-var-rocket,
  "rotate": $fa-var-rotate,
  "sync-alt": $fa-var-sync-alt,
  "rotate-left": $fa-var-rotate-left,
  "rotate-back": $fa-var-rotate-back,
  "rotate-backward": $fa-var-rotate-backward,
  "undo-alt": $fa-var-undo-alt,
  "rotate-right": $fa-var-rotate-right,
  "redo-alt": $fa-var-redo-alt,
  "rotate-forward": $fa-var-rotate-forward,
  "route": $fa-var-route,
  "rss": $fa-var-rss,
  "feed": $fa-var-feed,
  "ruble-sign": $fa-var-ruble-sign,
  "rouble": $fa-var-rouble,
  "rub": $fa-var-rub,
  "ruble": $fa-var-ruble,
  "ruler": $fa-var-ruler,
  "ruler-combined": $fa-var-ruler-combined,
  "ruler-horizontal": $fa-var-ruler-horizontal,
  "ruler-vertical": $fa-var-ruler-vertical,
  "rupee-sign": $fa-var-rupee-sign,
  "rupee": $fa-var-rupee,
  "rupiah-sign": $fa-var-rupiah-sign,
  "s": $fa-var-s,
  "sailboat": $fa-var-sailboat,
  "satellite": $fa-var-satellite,
  "satellite-dish": $fa-var-satellite-dish,
  "scale-balanced": $fa-var-scale-balanced,
  "balance-scale": $fa-var-balance-scale,
  "scale-unbalanced": $fa-var-scale-unbalanced,
  "balance-scale-left": $fa-var-balance-scale-left,
  "scale-unbalanced-flip": $fa-var-scale-unbalanced-flip,
  "balance-scale-right": $fa-var-balance-scale-right,
  "school": $fa-var-school,
  "scissors": $fa-var-scissors,
  "cut": $fa-var-cut,
  "screwdriver": $fa-var-screwdriver,
  "screwdriver-wrench": $fa-var-screwdriver-wrench,
  "tools": $fa-var-tools,
  "scroll": $fa-var-scroll,
  "scroll-torah": $fa-var-scroll-torah,
  "torah": $fa-var-torah,
  "sd-card": $fa-var-sd-card,
  "section": $fa-var-section,
  "seedling": $fa-var-seedling,
  "sprout": $fa-var-sprout,
  "server": $fa-var-server,
  "shapes": $fa-var-shapes,
  "triangle-circle-square": $fa-var-triangle-circle-square,
  "share": $fa-var-share,
  "arrow-turn-right": $fa-var-arrow-turn-right,
  "mail-forward": $fa-var-mail-forward,
  "share-from-square": $fa-var-share-from-square,
  "share-square": $fa-var-share-square,
  "share-nodes": $fa-var-share-nodes,
  "share-alt": $fa-var-share-alt,
  "shekel-sign": $fa-var-shekel-sign,
  "ils": $fa-var-ils,
  "shekel": $fa-var-shekel,
  "sheqel": $fa-var-sheqel,
  "sheqel-sign": $fa-var-sheqel-sign,
  "shield": $fa-var-shield,
  "shield-blank": $fa-var-shield-blank,
  "shield-alt": $fa-var-shield-alt,
  "shield-virus": $fa-var-shield-virus,
  "ship": $fa-var-ship,
  "shirt": $fa-var-shirt,
  "t-shirt": $fa-var-t-shirt,
  "tshirt": $fa-var-tshirt,
  "shoe-prints": $fa-var-shoe-prints,
  "shop": $fa-var-shop,
  "store-alt": $fa-var-store-alt,
  "shop-slash": $fa-var-shop-slash,
  "store-alt-slash": $fa-var-store-alt-slash,
  "shower": $fa-var-shower,
  "shrimp": $fa-var-shrimp,
  "shuffle": $fa-var-shuffle,
  "random": $fa-var-random,
  "shuttle-space": $fa-var-shuttle-space,
  "space-shuttle": $fa-var-space-shuttle,
  "sign-hanging": $fa-var-sign-hanging,
  "sign": $fa-var-sign,
  "signal": $fa-var-signal,
  "signal-5": $fa-var-signal-5,
  "signal-perfect": $fa-var-signal-perfect,
  "signature": $fa-var-signature,
  "signs-post": $fa-var-signs-post,
  "map-signs": $fa-var-map-signs,
  "sim-card": $fa-var-sim-card,
  "sink": $fa-var-sink,
  "sitemap": $fa-var-sitemap,
  "skull": $fa-var-skull,
  "skull-crossbones": $fa-var-skull-crossbones,
  "slash": $fa-var-slash,
  "sleigh": $fa-var-sleigh,
  "sliders": $fa-var-sliders,
  "sliders-h": $fa-var-sliders-h,
  "smog": $fa-var-smog,
  "smoking": $fa-var-smoking,
  "snowflake": $fa-var-snowflake,
  "snowman": $fa-var-snowman,
  "snowplow": $fa-var-snowplow,
  "soap": $fa-var-soap,
  "socks": $fa-var-socks,
  "solar-panel": $fa-var-solar-panel,
  "sort": $fa-var-sort,
  "unsorted": $fa-var-unsorted,
  "sort-down": $fa-var-sort-down,
  "sort-desc": $fa-var-sort-desc,
  "sort-up": $fa-var-sort-up,
  "sort-asc": $fa-var-sort-asc,
  "spa": $fa-var-spa,
  "spaghetti-monster-flying": $fa-var-spaghetti-monster-flying,
  "pastafarianism": $fa-var-pastafarianism,
  "spell-check": $fa-var-spell-check,
  "spider": $fa-var-spider,
  "spinner": $fa-var-spinner,
  "splotch": $fa-var-splotch,
  "spoon": $fa-var-spoon,
  "utensil-spoon": $fa-var-utensil-spoon,
  "spray-can": $fa-var-spray-can,
  "spray-can-sparkles": $fa-var-spray-can-sparkles,
  "air-freshener": $fa-var-air-freshener,
  "square": $fa-var-square,
  "square-arrow-up-right": $fa-var-square-arrow-up-right,
  "external-link-square": $fa-var-external-link-square,
  "square-caret-down": $fa-var-square-caret-down,
  "caret-square-down": $fa-var-caret-square-down,
  "square-caret-left": $fa-var-square-caret-left,
  "caret-square-left": $fa-var-caret-square-left,
  "square-caret-right": $fa-var-square-caret-right,
  "caret-square-right": $fa-var-caret-square-right,
  "square-caret-up": $fa-var-square-caret-up,
  "caret-square-up": $fa-var-caret-square-up,
  "square-check": $fa-var-square-check,
  "check-square": $fa-var-check-square,
  "square-envelope": $fa-var-square-envelope,
  "envelope-square": $fa-var-envelope-square,
  "square-full": $fa-var-square-full,
  "square-h": $fa-var-square-h,
  "h-square": $fa-var-h-square,
  "square-minus": $fa-var-square-minus,
  "minus-square": $fa-var-minus-square,
  "square-parking": $fa-var-square-parking,
  "parking": $fa-var-parking,
  "square-pen": $fa-var-square-pen,
  "pen-square": $fa-var-pen-square,
  "pencil-square": $fa-var-pencil-square,
  "square-phone": $fa-var-square-phone,
  "phone-square": $fa-var-phone-square,
  "square-phone-flip": $fa-var-square-phone-flip,
  "phone-square-alt": $fa-var-phone-square-alt,
  "square-plus": $fa-var-square-plus,
  "plus-square": $fa-var-plus-square,
  "square-poll-horizontal": $fa-var-square-poll-horizontal,
  "poll-h": $fa-var-poll-h,
  "square-poll-vertical": $fa-var-square-poll-vertical,
  "poll": $fa-var-poll,
  "square-root-variable": $fa-var-square-root-variable,
  "square-root-alt": $fa-var-square-root-alt,
  "square-rss": $fa-var-square-rss,
  "rss-square": $fa-var-rss-square,
  "square-share-nodes": $fa-var-square-share-nodes,
  "share-alt-square": $fa-var-share-alt-square,
  "square-up-right": $fa-var-square-up-right,
  "external-link-square-alt": $fa-var-external-link-square-alt,
  "square-xmark": $fa-var-square-xmark,
  "times-square": $fa-var-times-square,
  "xmark-square": $fa-var-xmark-square,
  "stairs": $fa-var-stairs,
  "stamp": $fa-var-stamp,
  "star": $fa-var-star,
  "star-and-crescent": $fa-var-star-and-crescent,
  "star-half": $fa-var-star-half,
  "star-half-stroke": $fa-var-star-half-stroke,
  "star-half-alt": $fa-var-star-half-alt,
  "star-of-david": $fa-var-star-of-david,
  "star-of-life": $fa-var-star-of-life,
  "sterling-sign": $fa-var-sterling-sign,
  "gbp": $fa-var-gbp,
  "pound-sign": $fa-var-pound-sign,
  "stethoscope": $fa-var-stethoscope,
  "stop": $fa-var-stop,
  "stopwatch": $fa-var-stopwatch,
  "stopwatch-20": $fa-var-stopwatch-20,
  "store": $fa-var-store,
  "store-slash": $fa-var-store-slash,
  "street-view": $fa-var-street-view,
  "strikethrough": $fa-var-strikethrough,
  "stroopwafel": $fa-var-stroopwafel,
  "subscript": $fa-var-subscript,
  "suitcase": $fa-var-suitcase,
  "suitcase-medical": $fa-var-suitcase-medical,
  "medkit": $fa-var-medkit,
  "suitcase-rolling": $fa-var-suitcase-rolling,
  "sun": $fa-var-sun,
  "superscript": $fa-var-superscript,
  "swatchbook": $fa-var-swatchbook,
  "synagogue": $fa-var-synagogue,
  "syringe": $fa-var-syringe,
  "t": $fa-var-t,
  "table": $fa-var-table,
  "table-cells": $fa-var-table-cells,
  "th": $fa-var-th,
  "table-cells-large": $fa-var-table-cells-large,
  "th-large": $fa-var-th-large,
  "table-columns": $fa-var-table-columns,
  "columns": $fa-var-columns,
  "table-list": $fa-var-table-list,
  "th-list": $fa-var-th-list,
  "table-tennis-paddle-ball": $fa-var-table-tennis-paddle-ball,
  "ping-pong-paddle-ball": $fa-var-ping-pong-paddle-ball,
  "table-tennis": $fa-var-table-tennis,
  "tablet": $fa-var-tablet,
  "tablet-android": $fa-var-tablet-android,
  "tablet-button": $fa-var-tablet-button,
  "tablet-screen-button": $fa-var-tablet-screen-button,
  "tablet-alt": $fa-var-tablet-alt,
  "tablets": $fa-var-tablets,
  "tachograph-digital": $fa-var-tachograph-digital,
  "digital-tachograph": $fa-var-digital-tachograph,
  "tag": $fa-var-tag,
  "tags": $fa-var-tags,
  "tape": $fa-var-tape,
  "taxi": $fa-var-taxi,
  "cab": $fa-var-cab,
  "teeth": $fa-var-teeth,
  "teeth-open": $fa-var-teeth-open,
  "temperature-empty": $fa-var-temperature-empty,
  "temperature-0": $fa-var-temperature-0,
  "thermometer-0": $fa-var-thermometer-0,
  "thermometer-empty": $fa-var-thermometer-empty,
  "temperature-full": $fa-var-temperature-full,
  "temperature-4": $fa-var-temperature-4,
  "thermometer-4": $fa-var-thermometer-4,
  "thermometer-full": $fa-var-thermometer-full,
  "temperature-half": $fa-var-temperature-half,
  "temperature-2": $fa-var-temperature-2,
  "thermometer-2": $fa-var-thermometer-2,
  "thermometer-half": $fa-var-thermometer-half,
  "temperature-high": $fa-var-temperature-high,
  "temperature-low": $fa-var-temperature-low,
  "temperature-quarter": $fa-var-temperature-quarter,
  "temperature-1": $fa-var-temperature-1,
  "thermometer-1": $fa-var-thermometer-1,
  "thermometer-quarter": $fa-var-thermometer-quarter,
  "temperature-three-quarters": $fa-var-temperature-three-quarters,
  "temperature-3": $fa-var-temperature-3,
  "thermometer-3": $fa-var-thermometer-3,
  "thermometer-three-quarters": $fa-var-thermometer-three-quarters,
  "tenge-sign": $fa-var-tenge-sign,
  "tenge": $fa-var-tenge,
  "terminal": $fa-var-terminal,
  "text-height": $fa-var-text-height,
  "text-slash": $fa-var-text-slash,
  "remove-format": $fa-var-remove-format,
  "text-width": $fa-var-text-width,
  "thermometer": $fa-var-thermometer,
  "thumbs-down": $fa-var-thumbs-down,
  "thumbs-up": $fa-var-thumbs-up,
  "thumbtack": $fa-var-thumbtack,
  "thumb-tack": $fa-var-thumb-tack,
  "ticket": $fa-var-ticket,
  "ticket-simple": $fa-var-ticket-simple,
  "ticket-alt": $fa-var-ticket-alt,
  "timeline": $fa-var-timeline,
  "toggle-off": $fa-var-toggle-off,
  "toggle-on": $fa-var-toggle-on,
  "toilet": $fa-var-toilet,
  "toilet-paper": $fa-var-toilet-paper,
  "toilet-paper-slash": $fa-var-toilet-paper-slash,
  "toolbox": $fa-var-toolbox,
  "tooth": $fa-var-tooth,
  "torii-gate": $fa-var-torii-gate,
  "tower-broadcast": $fa-var-tower-broadcast,
  "broadcast-tower": $fa-var-broadcast-tower,
  "tractor": $fa-var-tractor,
  "trademark": $fa-var-trademark,
  "traffic-light": $fa-var-traffic-light,
  "trailer": $fa-var-trailer,
  "train": $fa-var-train,
  "train-subway": $fa-var-train-subway,
  "subway": $fa-var-subway,
  "train-tram": $fa-var-train-tram,
  "tram": $fa-var-tram,
  "transgender": $fa-var-transgender,
  "transgender-alt": $fa-var-transgender-alt,
  "trash": $fa-var-trash,
  "trash-arrow-up": $fa-var-trash-arrow-up,
  "trash-restore": $fa-var-trash-restore,
  "trash-can": $fa-var-trash-can,
  "trash-alt": $fa-var-trash-alt,
  "trash-can-arrow-up": $fa-var-trash-can-arrow-up,
  "trash-restore-alt": $fa-var-trash-restore-alt,
  "tree": $fa-var-tree,
  "triangle-exclamation": $fa-var-triangle-exclamation,
  "exclamation-triangle": $fa-var-exclamation-triangle,
  "warning": $fa-var-warning,
  "trophy": $fa-var-trophy,
  "truck": $fa-var-truck,
  "truck-fast": $fa-var-truck-fast,
  "shipping-fast": $fa-var-shipping-fast,
  "truck-medical": $fa-var-truck-medical,
  "ambulance": $fa-var-ambulance,
  "truck-monster": $fa-var-truck-monster,
  "truck-moving": $fa-var-truck-moving,
  "truck-pickup": $fa-var-truck-pickup,
  "truck-ramp-box": $fa-var-truck-ramp-box,
  "truck-loading": $fa-var-truck-loading,
  "tty": $fa-var-tty,
  "teletype": $fa-var-teletype,
  "turkish-lira-sign": $fa-var-turkish-lira-sign,
  "try": $fa-var-try,
  "turkish-lira": $fa-var-turkish-lira,
  "turn-down": $fa-var-turn-down,
  "level-down-alt": $fa-var-level-down-alt,
  "turn-up": $fa-var-turn-up,
  "level-up-alt": $fa-var-level-up-alt,
  "tv": $fa-var-tv,
  "television": $fa-var-television,
  "tv-alt": $fa-var-tv-alt,
  "u": $fa-var-u,
  "umbrella": $fa-var-umbrella,
  "umbrella-beach": $fa-var-umbrella-beach,
  "underline": $fa-var-underline,
  "universal-access": $fa-var-universal-access,
  "unlock": $fa-var-unlock,
  "unlock-keyhole": $fa-var-unlock-keyhole,
  "unlock-alt": $fa-var-unlock-alt,
  "up-down": $fa-var-up-down,
  "arrows-alt-v": $fa-var-arrows-alt-v,
  "up-down-left-right": $fa-var-up-down-left-right,
  "arrows-alt": $fa-var-arrows-alt,
  "up-long": $fa-var-up-long,
  "long-arrow-alt-up": $fa-var-long-arrow-alt-up,
  "up-right-and-down-left-from-center": $fa-var-up-right-and-down-left-from-center,
  "expand-alt": $fa-var-expand-alt,
  "up-right-from-square": $fa-var-up-right-from-square,
  "external-link-alt": $fa-var-external-link-alt,
  "upload": $fa-var-upload,
  "user": $fa-var-user,
  "user-astronaut": $fa-var-user-astronaut,
  "user-check": $fa-var-user-check,
  "user-clock": $fa-var-user-clock,
  "user-doctor": $fa-var-user-doctor,
  "user-md": $fa-var-user-md,
  "user-gear": $fa-var-user-gear,
  "user-cog": $fa-var-user-cog,
  "user-graduate": $fa-var-user-graduate,
  "user-group": $fa-var-user-group,
  "user-friends": $fa-var-user-friends,
  "user-injured": $fa-var-user-injured,
  "user-large": $fa-var-user-large,
  "user-alt": $fa-var-user-alt,
  "user-large-slash": $fa-var-user-large-slash,
  "user-alt-slash": $fa-var-user-alt-slash,
  "user-lock": $fa-var-user-lock,
  "user-minus": $fa-var-user-minus,
  "user-ninja": $fa-var-user-ninja,
  "user-nurse": $fa-var-user-nurse,
  "user-pen": $fa-var-user-pen,
  "user-edit": $fa-var-user-edit,
  "user-plus": $fa-var-user-plus,
  "user-secret": $fa-var-user-secret,
  "user-shield": $fa-var-user-shield,
  "user-slash": $fa-var-user-slash,
  "user-tag": $fa-var-user-tag,
  "user-tie": $fa-var-user-tie,
  "user-xmark": $fa-var-user-xmark,
  "user-times": $fa-var-user-times,
  "users": $fa-var-users,
  "users-gear": $fa-var-users-gear,
  "users-cog": $fa-var-users-cog,
  "users-slash": $fa-var-users-slash,
  "utensils": $fa-var-utensils,
  "cutlery": $fa-var-cutlery,
  "v": $fa-var-v,
  "van-shuttle": $fa-var-van-shuttle,
  "shuttle-van": $fa-var-shuttle-van,
  "vault": $fa-var-vault,
  "vector-square": $fa-var-vector-square,
  "venus": $fa-var-venus,
  "venus-double": $fa-var-venus-double,
  "venus-mars": $fa-var-venus-mars,
  "vest": $fa-var-vest,
  "vest-patches": $fa-var-vest-patches,
  "vial": $fa-var-vial,
  "vials": $fa-var-vials,
  "video": $fa-var-video,
  "video-camera": $fa-var-video-camera,
  "video-slash": $fa-var-video-slash,
  "vihara": $fa-var-vihara,
  "virus": $fa-var-virus,
  "virus-covid": $fa-var-virus-covid,
  "virus-covid-slash": $fa-var-virus-covid-slash,
  "virus-slash": $fa-var-virus-slash,
  "viruses": $fa-var-viruses,
  "voicemail": $fa-var-voicemail,
  "volleyball": $fa-var-volleyball,
  "volleyball-ball": $fa-var-volleyball-ball,
  "volume-high": $fa-var-volume-high,
  "volume-up": $fa-var-volume-up,
  "volume-low": $fa-var-volume-low,
  "volume-down": $fa-var-volume-down,
  "volume-off": $fa-var-volume-off,
  "volume-xmark": $fa-var-volume-xmark,
  "volume-mute": $fa-var-volume-mute,
  "volume-times": $fa-var-volume-times,
  "vr-cardboard": $fa-var-vr-cardboard,
  "w": $fa-var-w,
  "wallet": $fa-var-wallet,
  "wand-magic": $fa-var-wand-magic,
  "magic": $fa-var-magic,
  "wand-magic-sparkles": $fa-var-wand-magic-sparkles,
  "magic-wand-sparkles": $fa-var-magic-wand-sparkles,
  "wand-sparkles": $fa-var-wand-sparkles,
  "warehouse": $fa-var-warehouse,
  "water": $fa-var-water,
  "water-ladder": $fa-var-water-ladder,
  "ladder-water": $fa-var-ladder-water,
  "swimming-pool": $fa-var-swimming-pool,
  "wave-square": $fa-var-wave-square,
  "weight-hanging": $fa-var-weight-hanging,
  "weight-scale": $fa-var-weight-scale,
  "weight": $fa-var-weight,
  "wheelchair": $fa-var-wheelchair,
  "whiskey-glass": $fa-var-whiskey-glass,
  "glass-whiskey": $fa-var-glass-whiskey,
  "wifi": $fa-var-wifi,
  "wifi-3": $fa-var-wifi-3,
  "wifi-strong": $fa-var-wifi-strong,
  "wind": $fa-var-wind,
  "window-maximize": $fa-var-window-maximize,
  "window-minimize": $fa-var-window-minimize,
  "window-restore": $fa-var-window-restore,
  "wine-bottle": $fa-var-wine-bottle,
  "wine-glass": $fa-var-wine-glass,
  "wine-glass-empty": $fa-var-wine-glass-empty,
  "wine-glass-alt": $fa-var-wine-glass-alt,
  "won-sign": $fa-var-won-sign,
  "krw": $fa-var-krw,
  "won": $fa-var-won,
  "wrench": $fa-var-wrench,
  "x": $fa-var-x,
  "x-ray": $fa-var-x-ray,
  "xmark": $fa-var-xmark,
  "close": $fa-var-close,
  "multiply": $fa-var-multiply,
  "remove": $fa-var-remove,
  "times": $fa-var-times,
  "y": $fa-var-y,
  "yen-sign": $fa-var-yen-sign,
  "cny": $fa-var-cny,
  "jpy": $fa-var-jpy,
  "rmb": $fa-var-rmb,
  "yen": $fa-var-yen,
  "yin-yang": $fa-var-yin-yang,
  "z": $fa-var-z,
);

$fa-brand-icons: (
  "42-group": $fa-var-42-group,
  "innosoft": $fa-var-innosoft,
  "500px": $fa-var-500px,
  "accessible-icon": $fa-var-accessible-icon,
  "accusoft": $fa-var-accusoft,
  "adn": $fa-var-adn,
  "adversal": $fa-var-adversal,
  "affiliatetheme": $fa-var-affiliatetheme,
  "airbnb": $fa-var-airbnb,
  "algolia": $fa-var-algolia,
  "alipay": $fa-var-alipay,
  "amazon": $fa-var-amazon,
  "amazon-pay": $fa-var-amazon-pay,
  "amilia": $fa-var-amilia,
  "android": $fa-var-android,
  "angellist": $fa-var-angellist,
  "angrycreative": $fa-var-angrycreative,
  "angular": $fa-var-angular,
  "app-store": $fa-var-app-store,
  "app-store-ios": $fa-var-app-store-ios,
  "apper": $fa-var-apper,
  "apple": $fa-var-apple,
  "apple-pay": $fa-var-apple-pay,
  "artstation": $fa-var-artstation,
  "asymmetrik": $fa-var-asymmetrik,
  "atlassian": $fa-var-atlassian,
  "audible": $fa-var-audible,
  "autoprefixer": $fa-var-autoprefixer,
  "avianex": $fa-var-avianex,
  "aviato": $fa-var-aviato,
  "aws": $fa-var-aws,
  "bandcamp": $fa-var-bandcamp,
  "battle-net": $fa-var-battle-net,
  "behance": $fa-var-behance,
  "behance-square": $fa-var-behance-square,
  "bilibili": $fa-var-bilibili,
  "bimobject": $fa-var-bimobject,
  "bitbucket": $fa-var-bitbucket,
  "bitcoin": $fa-var-bitcoin,
  "bity": $fa-var-bity,
  "black-tie": $fa-var-black-tie,
  "blackberry": $fa-var-blackberry,
  "blogger": $fa-var-blogger,
  "blogger-b": $fa-var-blogger-b,
  "bluetooth": $fa-var-bluetooth,
  "bluetooth-b": $fa-var-bluetooth-b,
  "bootstrap": $fa-var-bootstrap,
  "bots": $fa-var-bots,
  "btc": $fa-var-btc,
  "buffer": $fa-var-buffer,
  "buromobelexperte": $fa-var-buromobelexperte,
  "buy-n-large": $fa-var-buy-n-large,
  "buysellads": $fa-var-buysellads,
  "canadian-maple-leaf": $fa-var-canadian-maple-leaf,
  "cc-amazon-pay": $fa-var-cc-amazon-pay,
  "cc-amex": $fa-var-cc-amex,
  "cc-apple-pay": $fa-var-cc-apple-pay,
  "cc-diners-club": $fa-var-cc-diners-club,
  "cc-discover": $fa-var-cc-discover,
  "cc-jcb": $fa-var-cc-jcb,
  "cc-mastercard": $fa-var-cc-mastercard,
  "cc-paypal": $fa-var-cc-paypal,
  "cc-stripe": $fa-var-cc-stripe,
  "cc-visa": $fa-var-cc-visa,
  "centercode": $fa-var-centercode,
  "centos": $fa-var-centos,
  "chrome": $fa-var-chrome,
  "chromecast": $fa-var-chromecast,
  "cloudflare": $fa-var-cloudflare,
  "cloudscale": $fa-var-cloudscale,
  "cloudsmith": $fa-var-cloudsmith,
  "cloudversify": $fa-var-cloudversify,
  "cmplid": $fa-var-cmplid,
  "codepen": $fa-var-codepen,
  "codiepie": $fa-var-codiepie,
  "confluence": $fa-var-confluence,
  "connectdevelop": $fa-var-connectdevelop,
  "contao": $fa-var-contao,
  "cotton-bureau": $fa-var-cotton-bureau,
  "cpanel": $fa-var-cpanel,
  "creative-commons": $fa-var-creative-commons,
  "creative-commons-by": $fa-var-creative-commons-by,
  "creative-commons-nc": $fa-var-creative-commons-nc,
  "creative-commons-nc-eu": $fa-var-creative-commons-nc-eu,
  "creative-commons-nc-jp": $fa-var-creative-commons-nc-jp,
  "creative-commons-nd": $fa-var-creative-commons-nd,
  "creative-commons-pd": $fa-var-creative-commons-pd,
  "creative-commons-pd-alt": $fa-var-creative-commons-pd-alt,
  "creative-commons-remix": $fa-var-creative-commons-remix,
  "creative-commons-sa": $fa-var-creative-commons-sa,
  "creative-commons-sampling": $fa-var-creative-commons-sampling,
  "creative-commons-sampling-plus": $fa-var-creative-commons-sampling-plus,
  "creative-commons-share": $fa-var-creative-commons-share,
  "creative-commons-zero": $fa-var-creative-commons-zero,
  "critical-role": $fa-var-critical-role,
  "css3": $fa-var-css3,
  "css3-alt": $fa-var-css3-alt,
  "cuttlefish": $fa-var-cuttlefish,
  "d-and-d": $fa-var-d-and-d,
  "d-and-d-beyond": $fa-var-d-and-d-beyond,
  "dailymotion": $fa-var-dailymotion,
  "dashcube": $fa-var-dashcube,
  "deezer": $fa-var-deezer,
  "delicious": $fa-var-delicious,
  "deploydog": $fa-var-deploydog,
  "deskpro": $fa-var-deskpro,
  "dev": $fa-var-dev,
  "deviantart": $fa-var-deviantart,
  "dhl": $fa-var-dhl,
  "diaspora": $fa-var-diaspora,
  "digg": $fa-var-digg,
  "digital-ocean": $fa-var-digital-ocean,
  "discord": $fa-var-discord,
  "discourse": $fa-var-discourse,
  "dochub": $fa-var-dochub,
  "docker": $fa-var-docker,
  "draft2digital": $fa-var-draft2digital,
  "dribbble": $fa-var-dribbble,
  "dribbble-square": $fa-var-dribbble-square,
  "dropbox": $fa-var-dropbox,
  "drupal": $fa-var-drupal,
  "dyalog": $fa-var-dyalog,
  "earlybirds": $fa-var-earlybirds,
  "ebay": $fa-var-ebay,
  "edge": $fa-var-edge,
  "edge-legacy": $fa-var-edge-legacy,
  "elementor": $fa-var-elementor,
  "ello": $fa-var-ello,
  "ember": $fa-var-ember,
  "empire": $fa-var-empire,
  "envira": $fa-var-envira,
  "erlang": $fa-var-erlang,
  "ethereum": $fa-var-ethereum,
  "etsy": $fa-var-etsy,
  "evernote": $fa-var-evernote,
  "expeditedssl": $fa-var-expeditedssl,
  "facebook": $fa-var-facebook,
  "facebook-f": $fa-var-facebook-f,
  "facebook-messenger": $fa-var-facebook-messenger,
  "facebook-square": $fa-var-facebook-square,
  "fantasy-flight-games": $fa-var-fantasy-flight-games,
  "fedex": $fa-var-fedex,
  "fedora": $fa-var-fedora,
  "figma": $fa-var-figma,
  "firefox": $fa-var-firefox,
  "firefox-browser": $fa-var-firefox-browser,
  "first-order": $fa-var-first-order,
  "first-order-alt": $fa-var-first-order-alt,
  "firstdraft": $fa-var-firstdraft,
  "flickr": $fa-var-flickr,
  "flipboard": $fa-var-flipboard,
  "fly": $fa-var-fly,
  "font-awesome": $fa-var-font-awesome,
  "font-awesome-flag": $fa-var-font-awesome-flag,
  "font-awesome-logo-full": $fa-var-font-awesome-logo-full,
  "fonticons": $fa-var-fonticons,
  "fonticons-fi": $fa-var-fonticons-fi,
  "fort-awesome": $fa-var-fort-awesome,
  "fort-awesome-alt": $fa-var-fort-awesome-alt,
  "forumbee": $fa-var-forumbee,
  "foursquare": $fa-var-foursquare,
  "free-code-camp": $fa-var-free-code-camp,
  "freebsd": $fa-var-freebsd,
  "fulcrum": $fa-var-fulcrum,
  "galactic-republic": $fa-var-galactic-republic,
  "galactic-senate": $fa-var-galactic-senate,
  "get-pocket": $fa-var-get-pocket,
  "gg": $fa-var-gg,
  "gg-circle": $fa-var-gg-circle,
  "git": $fa-var-git,
  "git-alt": $fa-var-git-alt,
  "git-square": $fa-var-git-square,
  "github": $fa-var-github,
  "github-alt": $fa-var-github-alt,
  "github-square": $fa-var-github-square,
  "gitkraken": $fa-var-gitkraken,
  "gitlab": $fa-var-gitlab,
  "gitter": $fa-var-gitter,
  "glide": $fa-var-glide,
  "glide-g": $fa-var-glide-g,
  "gofore": $fa-var-gofore,
  "golang": $fa-var-golang,
  "goodreads": $fa-var-goodreads,
  "goodreads-g": $fa-var-goodreads-g,
  "google": $fa-var-google,
  "google-drive": $fa-var-google-drive,
  "google-pay": $fa-var-google-pay,
  "google-play": $fa-var-google-play,
  "google-plus": $fa-var-google-plus,
  "google-plus-g": $fa-var-google-plus-g,
  "google-plus-square": $fa-var-google-plus-square,
  "google-wallet": $fa-var-google-wallet,
  "gratipay": $fa-var-gratipay,
  "grav": $fa-var-grav,
  "gripfire": $fa-var-gripfire,
  "grunt": $fa-var-grunt,
  "guilded": $fa-var-guilded,
  "gulp": $fa-var-gulp,
  "hacker-news": $fa-var-hacker-news,
  "hacker-news-square": $fa-var-hacker-news-square,
  "hackerrank": $fa-var-hackerrank,
  "hashnode": $fa-var-hashnode,
  "hips": $fa-var-hips,
  "hire-a-helper": $fa-var-hire-a-helper,
  "hive": $fa-var-hive,
  "hooli": $fa-var-hooli,
  "hornbill": $fa-var-hornbill,
  "hotjar": $fa-var-hotjar,
  "houzz": $fa-var-houzz,
  "html5": $fa-var-html5,
  "hubspot": $fa-var-hubspot,
  "ideal": $fa-var-ideal,
  "imdb": $fa-var-imdb,
  "instagram": $fa-var-instagram,
  "instagram-square": $fa-var-instagram-square,
  "instalod": $fa-var-instalod,
  "intercom": $fa-var-intercom,
  "internet-explorer": $fa-var-internet-explorer,
  "invision": $fa-var-invision,
  "ioxhost": $fa-var-ioxhost,
  "itch-io": $fa-var-itch-io,
  "itunes": $fa-var-itunes,
  "itunes-note": $fa-var-itunes-note,
  "java": $fa-var-java,
  "jedi-order": $fa-var-jedi-order,
  "jenkins": $fa-var-jenkins,
  "jira": $fa-var-jira,
  "joget": $fa-var-joget,
  "joomla": $fa-var-joomla,
  "js": $fa-var-js,
  "js-square": $fa-var-js-square,
  "jsfiddle": $fa-var-jsfiddle,
  "kaggle": $fa-var-kaggle,
  "keybase": $fa-var-keybase,
  "keycdn": $fa-var-keycdn,
  "kickstarter": $fa-var-kickstarter,
  "kickstarter-k": $fa-var-kickstarter-k,
  "korvue": $fa-var-korvue,
  "laravel": $fa-var-laravel,
  "lastfm": $fa-var-lastfm,
  "lastfm-square": $fa-var-lastfm-square,
  "leanpub": $fa-var-leanpub,
  "less": $fa-var-less,
  "line": $fa-var-line,
  "linkedin": $fa-var-linkedin,
  "linkedin-in": $fa-var-linkedin-in,
  "linode": $fa-var-linode,
  "linux": $fa-var-linux,
  "lyft": $fa-var-lyft,
  "magento": $fa-var-magento,
  "mailchimp": $fa-var-mailchimp,
  "mandalorian": $fa-var-mandalorian,
  "markdown": $fa-var-markdown,
  "mastodon": $fa-var-mastodon,
  "maxcdn": $fa-var-maxcdn,
  "mdb": $fa-var-mdb,
  "medapps": $fa-var-medapps,
  "medium": $fa-var-medium,
  "medium-m": $fa-var-medium-m,
  "medrt": $fa-var-medrt,
  "meetup": $fa-var-meetup,
  "megaport": $fa-var-megaport,
  "mendeley": $fa-var-mendeley,
  "microblog": $fa-var-microblog,
  "microsoft": $fa-var-microsoft,
  "mix": $fa-var-mix,
  "mixcloud": $fa-var-mixcloud,
  "mixer": $fa-var-mixer,
  "mizuni": $fa-var-mizuni,
  "modx": $fa-var-modx,
  "monero": $fa-var-monero,
  "napster": $fa-var-napster,
  "neos": $fa-var-neos,
  "nimblr": $fa-var-nimblr,
  "node": $fa-var-node,
  "node-js": $fa-var-node-js,
  "npm": $fa-var-npm,
  "ns8": $fa-var-ns8,
  "nutritionix": $fa-var-nutritionix,
  "octopus-deploy": $fa-var-octopus-deploy,
  "odnoklassniki": $fa-var-odnoklassniki,
  "odnoklassniki-square": $fa-var-odnoklassniki-square,
  "old-republic": $fa-var-old-republic,
  "opencart": $fa-var-opencart,
  "openid": $fa-var-openid,
  "opera": $fa-var-opera,
  "optin-monster": $fa-var-optin-monster,
  "orcid": $fa-var-orcid,
  "osi": $fa-var-osi,
  "padlet": $fa-var-padlet,
  "page4": $fa-var-page4,
  "pagelines": $fa-var-pagelines,
  "palfed": $fa-var-palfed,
  "patreon": $fa-var-patreon,
  "paypal": $fa-var-paypal,
  "perbyte": $fa-var-perbyte,
  "periscope": $fa-var-periscope,
  "phabricator": $fa-var-phabricator,
  "phoenix-framework": $fa-var-phoenix-framework,
  "phoenix-squadron": $fa-var-phoenix-squadron,
  "php": $fa-var-php,
  "pied-piper": $fa-var-pied-piper,
  "pied-piper-alt": $fa-var-pied-piper-alt,
  "pied-piper-hat": $fa-var-pied-piper-hat,
  "pied-piper-pp": $fa-var-pied-piper-pp,
  "pied-piper-square": $fa-var-pied-piper-square,
  "pinterest": $fa-var-pinterest,
  "pinterest-p": $fa-var-pinterest-p,
  "pinterest-square": $fa-var-pinterest-square,
  "pix": $fa-var-pix,
  "playstation": $fa-var-playstation,
  "product-hunt": $fa-var-product-hunt,
  "pushed": $fa-var-pushed,
  "python": $fa-var-python,
  "qq": $fa-var-qq,
  "quinscape": $fa-var-quinscape,
  "quora": $fa-var-quora,
  "r-project": $fa-var-r-project,
  "raspberry-pi": $fa-var-raspberry-pi,
  "ravelry": $fa-var-ravelry,
  "react": $fa-var-react,
  "reacteurope": $fa-var-reacteurope,
  "readme": $fa-var-readme,
  "rebel": $fa-var-rebel,
  "red-river": $fa-var-red-river,
  "reddit": $fa-var-reddit,
  "reddit-alien": $fa-var-reddit-alien,
  "reddit-square": $fa-var-reddit-square,
  "redhat": $fa-var-redhat,
  "renren": $fa-var-renren,
  "replyd": $fa-var-replyd,
  "researchgate": $fa-var-researchgate,
  "resolving": $fa-var-resolving,
  "rev": $fa-var-rev,
  "rocketchat": $fa-var-rocketchat,
  "rockrms": $fa-var-rockrms,
  "rust": $fa-var-rust,
  "safari": $fa-var-safari,
  "salesforce": $fa-var-salesforce,
  "sass": $fa-var-sass,
  "schlix": $fa-var-schlix,
  "scribd": $fa-var-scribd,
  "searchengin": $fa-var-searchengin,
  "sellcast": $fa-var-sellcast,
  "sellsy": $fa-var-sellsy,
  "servicestack": $fa-var-servicestack,
  "shirtsinbulk": $fa-var-shirtsinbulk,
  "shopify": $fa-var-shopify,
  "shopware": $fa-var-shopware,
  "simplybuilt": $fa-var-simplybuilt,
  "sistrix": $fa-var-sistrix,
  "sith": $fa-var-sith,
  "sitrox": $fa-var-sitrox,
  "sketch": $fa-var-sketch,
  "skyatlas": $fa-var-skyatlas,
  "skype": $fa-var-skype,
  "slack": $fa-var-slack,
  "slack-hash": $fa-var-slack-hash,
  "slideshare": $fa-var-slideshare,
  "snapchat": $fa-var-snapchat,
  "snapchat-ghost": $fa-var-snapchat-ghost,
  "snapchat-square": $fa-var-snapchat-square,
  "soundcloud": $fa-var-soundcloud,
  "sourcetree": $fa-var-sourcetree,
  "speakap": $fa-var-speakap,
  "speaker-deck": $fa-var-speaker-deck,
  "spotify": $fa-var-spotify,
  "square-font-awesome": $fa-var-square-font-awesome,
  "square-font-awesome-stroke": $fa-var-square-font-awesome-stroke,
  "font-awesome-alt": $fa-var-font-awesome-alt,
  "squarespace": $fa-var-squarespace,
  "stack-exchange": $fa-var-stack-exchange,
  "stack-overflow": $fa-var-stack-overflow,
  "stackpath": $fa-var-stackpath,
  "staylinked": $fa-var-staylinked,
  "steam": $fa-var-steam,
  "steam-square": $fa-var-steam-square,
  "steam-symbol": $fa-var-steam-symbol,
  "sticker-mule": $fa-var-sticker-mule,
  "strava": $fa-var-strava,
  "stripe": $fa-var-stripe,
  "stripe-s": $fa-var-stripe-s,
  "studiovinari": $fa-var-studiovinari,
  "stumbleupon": $fa-var-stumbleupon,
  "stumbleupon-circle": $fa-var-stumbleupon-circle,
  "superpowers": $fa-var-superpowers,
  "supple": $fa-var-supple,
  "suse": $fa-var-suse,
  "swift": $fa-var-swift,
  "symfony": $fa-var-symfony,
  "teamspeak": $fa-var-teamspeak,
  "telegram": $fa-var-telegram,
  "telegram-plane": $fa-var-telegram-plane,
  "tencent-weibo": $fa-var-tencent-weibo,
  "the-red-yeti": $fa-var-the-red-yeti,
  "themeco": $fa-var-themeco,
  "themeisle": $fa-var-themeisle,
  "think-peaks": $fa-var-think-peaks,
  "tiktok": $fa-var-tiktok,
  "trade-federation": $fa-var-trade-federation,
  "trello": $fa-var-trello,
  "tumblr": $fa-var-tumblr,
  "tumblr-square": $fa-var-tumblr-square,
  "twitch": $fa-var-twitch,
  "twitter": $fa-var-twitter,
  "twitter-square": $fa-var-twitter-square,
  "typo3": $fa-var-typo3,
  "uber": $fa-var-uber,
  "ubuntu": $fa-var-ubuntu,
  "uikit": $fa-var-uikit,
  "umbraco": $fa-var-umbraco,
  "uncharted": $fa-var-uncharted,
  "uniregistry": $fa-var-uniregistry,
  "unity": $fa-var-unity,
  "unsplash": $fa-var-unsplash,
  "untappd": $fa-var-untappd,
  "ups": $fa-var-ups,
  "usb": $fa-var-usb,
  "usps": $fa-var-usps,
  "ussunnah": $fa-var-ussunnah,
  "vaadin": $fa-var-vaadin,
  "viacoin": $fa-var-viacoin,
  "viadeo": $fa-var-viadeo,
  "viadeo-square": $fa-var-viadeo-square,
  "viber": $fa-var-viber,
  "vimeo": $fa-var-vimeo,
  "vimeo-square": $fa-var-vimeo-square,
  "vimeo-v": $fa-var-vimeo-v,
  "vine": $fa-var-vine,
  "vk": $fa-var-vk,
  "vnv": $fa-var-vnv,
  "vuejs": $fa-var-vuejs,
  "watchman-monitoring": $fa-var-watchman-monitoring,
  "waze": $fa-var-waze,
  "weebly": $fa-var-weebly,
  "weibo": $fa-var-weibo,
  "weixin": $fa-var-weixin,
  "whatsapp": $fa-var-whatsapp,
  "whatsapp-square": $fa-var-whatsapp-square,
  "whmcs": $fa-var-whmcs,
  "wikipedia-w": $fa-var-wikipedia-w,
  "windows": $fa-var-windows,
  "wirsindhandwerk": $fa-var-wirsindhandwerk,
  "wsh": $fa-var-wsh,
  "wix": $fa-var-wix,
  "wizards-of-the-coast": $fa-var-wizards-of-the-coast,
  "wodu": $fa-var-wodu,
  "wolf-pack-battalion": $fa-var-wolf-pack-battalion,
  "wordpress": $fa-var-wordpress,
  "wordpress-simple": $fa-var-wordpress-simple,
  "wpbeginner": $fa-var-wpbeginner,
  "wpexplorer": $fa-var-wpexplorer,
  "wpforms": $fa-var-wpforms,
  "wpressr": $fa-var-wpressr,
  "xbox": $fa-var-xbox,
  "xing": $fa-var-xing,
  "xing-square": $fa-var-xing-square,
  "y-combinator": $fa-var-y-combinator,
  "yahoo": $fa-var-yahoo,
  "yammer": $fa-var-yammer,
  "yandex": $fa-var-yandex,
  "yandex-international": $fa-var-yandex-international,
  "yarn": $fa-var-yarn,
  "yelp": $fa-var-yelp,
  "yoast": $fa-var-yoast,
  "youtube": $fa-var-youtube,
  "youtube-square": $fa-var-youtube-square,
  "zhihu": $fa-var-zhihu,
);
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/brands.scss
````scss
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
@import 'functions';
@import 'variables';

:root, :host {
  --#{ $fa-css-prefix }-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
}

@font-face {
  font-family: 'Font Awesome 6 Brands';
  font-style: normal;
  font-weight: 400;
  font-display: $fa-font-display;
  src: url('#{$fa-font-path}/fa-brands-400.woff2') format('woff2'),
    url('#{$fa-font-path}/fa-brands-400.ttf') format('truetype');
}

.fab,
.fa-brands {
  font-family: 'Font Awesome 6 Brands';
  font-weight: 400;
}

@each $name, $icon in $fa-brand-icons {
  .#{$fa-css-prefix}-#{$name}:before { content: fa-content($icon); }
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/fontawesome.scss
````scss
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
// Font Awesome core compile (Web Fonts-based)
// -------------------------

@import 'functions';
@import 'variables';
@import 'mixins';
@import 'core';
@import 'sizing';
@import 'fixed-width';
@import 'list';
@import 'bordered-pulled';
@import 'animated';
@import 'rotated-flipped';
@import 'stacked';
@import 'icons';
@import 'screen-reader';
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/regular.scss
````scss
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
@import 'functions';
@import 'variables';

:root, :host {
  --#{ $fa-css-prefix }-font-regular: normal 400 1em/1 "#{ $fa-style-family }";
}

@font-face {
  font-family: 'Font Awesome 6 Free';
  font-style: normal;
  font-weight: 400;
  font-display: $fa-font-display;
  src: url('#{$fa-font-path}/fa-regular-400.woff2') format('woff2'),
    url('#{$fa-font-path}/fa-regular-400.ttf') format('truetype');
}

.far,
.fa-regular {
  font-family: 'Font Awesome 6 Free';
  font-weight: 400;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/solid.scss
````scss
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
@import 'functions';
@import 'variables';

:root, :host {
  --#{ $fa-css-prefix }-font-solid: normal 900 1em/1 "#{ $fa-style-family }";
}

@font-face {
  font-family: 'Font Awesome 6 Free';
  font-style: normal;
  font-weight: 900;
  font-display: $fa-font-display;
  src: url('#{$fa-font-path}/fa-solid-900.woff2') format('woff2'),
    url('#{$fa-font-path}/fa-solid-900.ttf') format('truetype');
}

.fas,
.fa-solid {
  font-family: 'Font Awesome 6 Free';
  font-weight: 900;
}
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/scss/v4-shims.scss
````scss
/*!
 * Font Awesome Free 6.0.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2022 Fonticons, Inc.
 */
// V4 shims compile (Web Fonts-based)
// -------------------------

@import 'functions';
@import 'variables';
@import 'shims';
````

## File: Old Plugin/libs/fontawesome-free-6.0.0-web/LICENSE.txt
````
Fonticons, Inc. (https://fontawesome.com)

--------------------------------------------------------------------------------

Font Awesome Free License

Font Awesome Free is free, open source, and GPL friendly. You can use it for
commercial projects, open source projects, or really almost whatever you want.
Full Font Awesome Free license: https://fontawesome.com/license/free.

--------------------------------------------------------------------------------

# Icons: CC BY 4.0 License (https://creativecommons.org/licenses/by/4.0/)

The Font Awesome Free download is licensed under a Creative Commons
Attribution 4.0 International License and applies to all icons packaged
as SVG and JS file types.

--------------------------------------------------------------------------------

# Fonts: SIL OFL 1.1 License

In the Font Awesome Free download, the SIL OFL license applies to all icons
packaged as web and desktop font files.

Copyright (c) 2022 Fonticons, Inc. (https://fontawesome.com)
with Reserved Font Name: "Font Awesome".

This Font Software is licensed under the SIL Open Font License, Version 1.1.
This license is copied below, and is also available with a FAQ at:
http://scripts.sil.org/OFL

SIL OPEN FONT LICENSE
Version 1.1 - 26 February 2007

PREAMBLE
The goals of the Open Font License (OFL) are to stimulate worldwide
development of collaborative font projects, to support the font creation
efforts of academic and linguistic communities, and to provide a free and
open framework in which fonts may be shared and improved in partnership
with others.

The OFL allows the licensed fonts to be used, studied, modified and
redistributed freely as long as they are not sold by themselves. The
fonts, including any derivative works, can be bundled, embedded,
redistributed and/or sold with any software provided that any reserved
names are not used by derivative works. The fonts and derivatives,
however, cannot be released under any other type of license. The
requirement for fonts to remain under this license does not apply
to any document created using the fonts or their derivatives.

DEFINITIONS
"Font Software" refers to the set of files released by the Copyright
Holder(s) under this license and clearly marked as such. This may
include source files, build scripts and documentation.

"Reserved Font Name" refers to any names specified as such after the
copyright statement(s).

"Original Version" refers to the collection of Font Software components as
distributed by the Copyright Holder(s).

"Modified Version" refers to any derivative made by adding to, deleting,
or substituting — in part or in whole — any of the components of the
Original Version, by changing formats or by porting the Font Software to a
new environment.

"Author" refers to any designer, engineer, programmer, technical
writer or other person who contributed to the Font Software.

PERMISSION & CONDITIONS
Permission is hereby granted, free of charge, to any person obtaining
a copy of the Font Software, to use, study, copy, merge, embed, modify,
redistribute, and sell modified and unmodified copies of the Font
Software, subject to the following conditions:

1) Neither the Font Software nor any of its individual components,
in Original or Modified Versions, may be sold by itself.

2) Original or Modified Versions of the Font Software may be bundled,
redistributed and/or sold with any software, provided that each copy
contains the above copyright notice and this license. These can be
included either as stand-alone text files, human-readable headers or
in the appropriate machine-readable metadata fields within text or
binary files as long as those fields can be easily viewed by the user.

3) No Modified Version of the Font Software may use the Reserved Font
Name(s) unless explicit written permission is granted by the corresponding
Copyright Holder. This restriction only applies to the primary font name as
presented to the users.

4) The name(s) of the Copyright Holder(s) or the Author(s) of the Font
Software shall not be used to promote, endorse or advertise any
Modified Version, except to acknowledge the contribution(s) of the
Copyright Holder(s) and the Author(s) or with their explicit written
permission.

5) The Font Software, modified or unmodified, in part or in whole,
must be distributed entirely under this license, and must not be
distributed under any other license. The requirement for fonts to
remain under this license does not apply to any document created
using the Font Software.

TERMINATION
This license becomes null and void if any of the above conditions are
not met.

DISCLAIMER
THE FONT SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO ANY WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT
OF COPYRIGHT, PATENT, TRADEMARK, OR OTHER RIGHT. IN NO EVENT SHALL THE
COPYRIGHT HOLDER BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
INCLUDING ANY GENERAL, SPECIAL, INDIRECT, INCIDENTAL, OR CONSEQUENTIAL
DAMAGES, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF THE USE OR INABILITY TO USE THE FONT SOFTWARE OR FROM
OTHER DEALINGS IN THE FONT SOFTWARE.

--------------------------------------------------------------------------------

# Code: MIT License (https://opensource.org/licenses/MIT)

In the Font Awesome Free download, the MIT license applies to all non-font and
non-icon files.

Copyright 2022 Fonticons, Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in the
Software without restriction, including without limitation the rights to use, copy,
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the
following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

--------------------------------------------------------------------------------

# Attribution

Attribution is required by MIT, SIL OFL, and CC BY licenses. Downloaded Font
Awesome Free files already contain embedded comments with sufficient
attribution, so you shouldn't need to do anything additional when using these
files normally.

We've kept attribution comments terse, so we ask that you do not actively work
to remove them from files, especially code. They're a great way for folks to
learn about Font Awesome.

--------------------------------------------------------------------------------

# Brand Icons

All brand icons are trademarks of their respective owners. The use of these
trademarks does not indicate endorsement of the trademark holder by Font
Awesome, nor vice versa. **Please do not use brand logos for any purpose except
to represent the company, product, or service to which they refer.**
````

## File: Old Plugin/media-library-plus.php
````php
/*
Plugin Name: Media Library Folders
Plugin URI: https://maxgalleria.com
Description: Gives you the ability to adds folders and move files in the WordPress Media Library.
Version: 8.3.2
Author: Max Foundry
Author URI: https://maxfoundry.com

Copyright 2015-2022 Max Foundry, LLC (https://maxfoundry.com)
*/
⋮----
class MGMediaLibraryFolders {
⋮----
public $upload_dir;
public $wp_version;
public $theme_mods;
public $uploads_folder_name;
public $uploads_folder_name_length;
public $uploads_folder_ID;
public $blog_id;
public $base_url_length;
public $disable_scaling;
public $current_user_can_upload;
public $current_user_manage_options;
public $sync_skip_webp;
public $bda;
public $protected_content_dir;
public $bda_user_role;
public $bda_folder_id;
public $bdp_autoprotect;
public $capability;
public $display_fe_protected_images;
public $prevent_right_click;
⋮----
public function __construct() {
⋮----
$this->set_global_constants();
$this->set_activation_hooks();
$this->setup_hooks();
⋮----
//convert theme mods into an array
⋮----
public function set_global_constants() {
⋮----
//define("MAXGALLERIA_MEDIA_LIBRARY_BACKUP_TABLE", "mgmlp_old_posts");
//define("MAXGALLERIA_MEDIA_LIBRARY_POSTMETA_UPDATED", "mgmlp_postmeta_updated");
⋮----
// Bring in all the actions and filters
⋮----
public function setup_hooks() {
⋮----
// not used
//add_action('wp_ajax_nopriv_copy_media', array($this, 'copy_media'));
//add_action('wp_ajax_copy_media', array($this, 'copy_media'));
⋮----
//add_action('wp_ajax_nopriv_move_media', array($this, 'move_media'));
//add_action('wp_ajax_move_media', array($this, 'move_media'));
⋮----
//add_action( 'add_attachment', array($this,'add_attachment_to_folder'));
⋮----
//add_action('wp_ajax_nopriv_max_sync_contents', array($this, 'max_sync_contents'));
//add_action('wp_ajax_max_sync_contents', array($this, 'max_sync_contents'));
⋮----
//add_action( 'admin_menu', array($this, 'hide_mlf_menu_items'));
⋮----
//  public function hide_mlf_menu_items() {
//    // Remove the submenu item
//    remove_submenu_page('mlf-folders8', 'search-library');
//  }
⋮----
public function bda_enqueue_scripts() {
⋮----
// loades javascript file for displaying a protected image on the image edit page
public function bda_load_protected_file() {
⋮----
public function mlfp_display_protected_file() {
⋮----
/* manually loads an image file */
public function mlfp_load_image () {
⋮----
// Check if the current user has the capability to upload files
⋮----
$file_path = $this->get_absolute_path($download_file);
⋮----
if($this->is_path_inside($this->protected_content_dir, $file_path)) {
⋮----
public function is_path_inside($potential_parent, $potential_child) {
// Get the real, absolute paths
⋮----
// Check if both paths are valid
⋮----
// Use the strncmp function to compare the first n characters of two strings
⋮----
/* manually load image on the front end of the site */
public function mlfp_load_fe_image () {
⋮----
public function mlfp_remove_protected_folders() {
⋮----
// Check if the current user has the capability to manage options
⋮----
$this->remove_protected_folders();
⋮----
public function remove_protected_folders() {
⋮----
$protected_content_path = $this->get_absolute_path($this->protected_content_dir);
⋮----
$iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
⋮----
// check for empty folders
⋮----
$folder_path = $dir->getPathname();
⋮----
if(!$sub_iterator->valid()) {
⋮----
// delete the empty folders
⋮----
public function set_activation_hooks() {
⋮----
public function do_activation($network_wide) {
$this->activate();
⋮----
public function do_deactivation($network_wide) {
$this->deactivate();
⋮----
public function activate() {
⋮----
//update_option('uploads_use_yearmonth_folders', 1);
$this->add_folder_table();
$this->add_block_access_table();
$this->add_blocked_ips_table();
//update_option('mgmlp_database_checked', 'off', true);
⋮----
$this->scan_attachments();
$this->admin_check_for_new_folders(true);
⋮----
public function deactivate() {
⋮----
public function check_for_old_multisite() {
⋮----
public function enqueue_admin_print_styles() {
⋮----
//error_log("enqueue_admin_print_styles");
⋮----
//error_log("page " . $_REQUEST['page']);
⋮----
// on these pages load our styles and scripts
⋮----
//wp_enqueue_style('jstree-style', esc_url(MAXGALLERIA_MEDIA_LIBRARY_PLUGIN_URL . '/js/jstree/themes/default/style.css'));
⋮----
public function enqueue_admin_print_scripts() {
⋮----
// error_log("page " . $_REQUEST['page']);
⋮----
//error_log("loader-folders loaded");
⋮----
public function mlfp_enqueue_media() {
⋮----
wp_localize_script( 'mlfp-media', 'mlfpmedia', $this->media_localize());
⋮----
public function media_localize() {
⋮----
'gutenberg' => $this->gutenberg_active(),
⋮----
public function gutenberg_active() {
// Gutenberg plugin is installed and activated.
⋮----
// Block editor since 5.0.
⋮----
if ( $this->classic_editor_plugin_active() ) {
⋮----
public function classic_editor_plugin_active() {
⋮----
public function setup_mg_media_plus() {
⋮----
public function mlf_folders() {
⋮----
public function mlfp_thumbnails() {
⋮----
public function mlfp_image_seo() {
⋮----
public function mlfp_settings8() {
⋮----
public function mlfp_support() {
⋮----
public function media_library() {
⋮----
public function support_tips() {
⋮----
public function support_articles() {
⋮----
public function support_sys_info() {
⋮----
public function block_access_settings() {
⋮----
public function display_mlfp_header() {
⋮----
function mlf_body_classes( $classes ) {
⋮----
public function delete_folder_attachment ($postid) {
⋮----
$wpdb->delete( $table, $where );
⋮----
// in case an image is uploaded in the WP media library we
// need to add a record to the mgmlp_folders table
public function add_attachment_to_folder ($post_id) {
⋮----
$folder_id = $this->get_default_folder($post_id); //for non pro version
⋮----
$this->add_new_folder_parent($post_id, $folder_id);
⋮----
public function add_attachment_to_folder2( $metadata, $attachment_id ) {
⋮----
$folder_id = $this->get_default_folder($attachment_id);
⋮----
$this->add_new_folder_parent($attachment_id, $folder_id);
⋮----
//error_log("bdp_autoprotect " . $this->bdp_autoprotect);
⋮----
$message = $this->move_to_protected_folder($attachment_id, $folder_id, 0);
⋮----
public function get_parent_by_name($sub_folder) {
⋮----
return $wpdb->get_var($sql);
⋮----
public function get_default_folder($post_id) {
⋮----
$folder_id = $this->get_parent_by_name($folder_path);
⋮----
public function register_mgmlp_post_type() {
⋮----
public function add_folder_table () {
⋮----
public function add_block_access_table() {
⋮----
public function add_blocked_ips_table() {
⋮----
public function upload_attachment () {
⋮----
$destination = $this->get_folder_path($folder_id);
⋮----
//error_log(print_r($wp_filetype,true));
⋮----
// insure it has a unique name
⋮----
// Set correct file permissions.
⋮----
$attach_id = $this->add_new_attachment($filename, $folder_id, $title_text, $alt_text, $seo_title_text);
⋮----
$message = $this->move_to_protected_folder($attach_id, $folder_id, 0);
⋮----
$this->display_folder_contents ($folder_id);
⋮----
public function add_new_attachment($filename, $folder_id, $title_text="", $alt_text="", $seo_title_text="") {
⋮----
// prevent unauthorized users from uploading
⋮----
//error_log("add_new_attachment, add_new_attachment, $folder_id");
⋮----
//remove_action( 'add_attachment', array($this,'add_attachment_to_folder'));
⋮----
// Check the type of file. We'll use this as the 'post_mime_type'.
⋮----
// Get the path to the upload directory.
⋮----
$file_url = $this->get_file_url_for_copy($filename);
⋮----
// remove the extention from the file name
⋮----
$folder_name = $this->get_folder_name($folder_id);
⋮----
$file_name = $this->remove_extension(basename($filename));
⋮----
//$new_file_title	= preg_replace( '/\.[^.]+$/', '', basename( $filename ) );
⋮----
// Prepare an array of post data for the attachment.
⋮----
// Insert the attachment.
⋮----
// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
⋮----
// Generate the metadata for the attachment (if it doesn't already exist), and update the database record.
⋮----
if($this->is_windows()) {
⋮----
// get the uploads dir name
⋮----
//find the name and cut off the part with the uploads path
⋮----
// put the short path into postmeta
⋮----
$this->add_new_folder_parent($attach_id, $folder_id );
⋮----
public function update_links($rename_image_location, $rename_destination) {
⋮----
$result = $wpdb->query($replace_sql);
//error_log("replace_sql $replace_sql");
⋮----
public function remove_extension($file_name) {
⋮----
public function scan_attachments () {
⋮----
//find the uploads folder
⋮----
//create uploads parent media folder
$uploads_parent_id = $this->add_media_folder($uploads_dir, 0, $base_url);
⋮----
// use for comparisons
⋮----
$rows = $wpdb->get_results($sql);
⋮----
// check for and add files in the uploads or root media library folder
$uploads_location = $this->strip_base_file($image_location);
⋮----
$this->add_new_folder_parent($row->ID, $uploads_parent_id);
⋮----
//check for protected folders
⋮----
$sub_folders = $this->get_folders($image_location);
⋮----
// check for URL path in database
⋮----
$new_parent_id = $this->folder_exist($folder_path);
⋮----
if($this->is_new_top_level_folder($uploads_dir, $sub_folder, $folder_path)) {
$parent_id = $this->add_media_folder($sub_folder, $uploads_parent_id, $folder_path);
⋮----
$parent_id = $this->add_media_folder($sub_folder, $parent_id, $folder_path);
⋮----
$this->add_new_folder_parent($row->ID, $parent_id );
} // test for http
} //foreach
⋮----
} //rows
//if ( ! wp_next_scheduled( 'new_folder_check' ) )
//	wp_schedule_event( time(), 'daily', 'new_folder_check' );
⋮----
//		echo "done";
//		die();
⋮----
public function strip_base_file($url){
⋮----
private function is_new_top_level_folder($uploads_dir, $folder_name, $folder_path) {
⋮----
private function get_folders($path) {
⋮----
private function get_folders2($path) {
⋮----
public function folder_exist($folder_path) {
⋮----
// Normalize and sanitize the folder path
⋮----
//error_log("normalized_relative_path $normalized_relative_path");
⋮----
// Use a prepared statement to query the database
$sql = $wpdb->prepare(
⋮----
// Execute the query
$row = $wpdb->get_row($sql);
⋮----
// Return the ID if the folder exists, otherwise false
⋮----
private function folder_exist2($folder_path) {
⋮----
public function add_media_folder($folder_name, $parent_folder, $base_path ) {
⋮----
$new_folder_id = $this->mpmlp_insert_post(MAXGALLERIA_MEDIA_LIBRARY_POST_TYPE, $folder_name, $base_path, 'publish' );
⋮----
$this->add_new_folder_parent($new_folder_id, $parent_folder);
⋮----
public function add_new_folder_parent($record_id, $parent_folder) {
⋮----
// check for existing record
⋮----
if($wpdb->get_var($sql) == NULL) {
⋮----
$wpdb->insert( $table, $new_record );
⋮----
public function load_textdomain() {
⋮----
public function ignore_notice() {
⋮----
public function show_mlp_admin_notice() {
⋮----
//show review notice after three days
⋮----
//show notice if not found
//add_action( 'admin_notices', array($this, 'mlp_review_notice' ));
⋮----
/* if no upload fold id, check the folder table */
private function fetch_uploads_folder_id() {
⋮----
private function lookup_uploads_folder_name($current_folder_id) {
⋮----
$folder_name = $wpdb->get_var($sql);
⋮----
public function get_maxgalleria_galleries() {
⋮----
//error_log($sql);
⋮----
public function display_folder_contents ($current_folder_id, $image_link = true, $folders_path = '', $echo = true) {
⋮----
// build the Javascript code to load the folder contents
⋮----
public function kses_mlf_add_allowed_html($html, $context) {
⋮----
public function in_array_r($needle, $haystack, $strict = false) {
⋮----
if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
⋮----
public function mlp_display_folder_contents_ajax() {
⋮----
//$folders_found = false;
⋮----
case '0': //order by date
⋮----
case '1': //order by name
⋮----
$this->display_folder_nav($current_folder_id, $folder_table);
⋮----
$this->display_files($image_link, $current_folder_id, $folder_table, $display_type, $order_by, $mif_visible );
⋮----
public function mlp_display_folder_contents_images_ajax() {
⋮----
$this->display_files($image_link, $current_folder_id, $folder_table, $display_type, $order_by );
⋮----
public function display_folder_nav_ajax () {
⋮----
public function mlp_get_folder_data() {
⋮----
$folders = $this->get_folder_data($current_folder_id);
⋮----
public function get_folder_data($current_folder_id) {
⋮----
$folder_parents = $this->get_parents($current_folder_id);
⋮----
// do not show protected content folder
⋮----
//$max_id = -1;
⋮----
//if($row->ID > $max_id)
//	$max_id = $row->ID;
⋮----
// check if parent folder even exists
⋮----
if (count($wpdb->get_results($sql)) == 0)
⋮----
} else if($this->in_array_r($row->ID, $folder_parents))	{
⋮----
public function new_folder_check() {
⋮----
public function display_folder_nav($current_folder_id, $folder_table ) {
⋮----
$this->new_folder_check();
⋮----
public function validateOrderBy($order_by) {
⋮----
public function display_files($image_link, $current_folder_id, $folder_table, $display_type, $order_by, $mif_visible = false) {
⋮----
// validate the $order_by SQL
$order_by = $this->validateOrderBy($order_by);
⋮----
// $order_by is validate by the validateOrderBy() function because passing it in via the perpare fucntions puts quote marks around the text which breaks the sorting.
⋮----
$blocked_image_url = $this->get_file_thumbnail($ext);
⋮----
// use wp_get_attachment_image to get the PDF preview
⋮----
// for WP 4.6 use /wp-admin/post.php?post=
⋮----
$image_location = $this->build_location_url($row->attached_file);
⋮----
//error_log($blocked_image_url);
⋮----
private function get_folder_path($folder_id) {
⋮----
//$image_location = $this->upload_dir['baseurl'] . '/' . $row->attached_file;
⋮----
$absolute_path = $this->get_absolute_path($image_location);
⋮----
private function get_subfolder_path($folder_id) {
⋮----
private function get_folder_name($folder_id) {
⋮----
private function get_parents($current_folder_id) {
⋮----
//while($folder_id !== '0' || !$not_found ) {
⋮----
private function get_parent($folder_id) {
⋮----
public function create_new_folder() {
⋮----
$sql = $wpdb->prepare("select meta_value as attached_file
⋮----
//$this->write_log("absolute_path $absolute_path");
⋮----
// Sanitize the new folder name
⋮----
// Construct the new folder path
⋮----
// Validate up to the parent directory
⋮----
// Check if the parent directory exists and is within the allowed directory
⋮----
//check for new folder name that begins with '..' and abort
⋮----
$new_folder_url = $this->get_file_url_for_copy($new_folder_path);
//$this->write_log("new_folder_url $new_folder_url");
⋮----
//$this->write_log("Trying to create directory at $new_folder_path, $parent_folder_id, $new_folder_url");
⋮----
//if($this->add_media_folder($new_folder_name, $parent_folder_id, $new_folder_url)){
$new_folder_id = $this->add_media_folder($new_folder_name, $parent_folder_id, $new_folder_url);
⋮----
$folders = $this->get_folder_data($parent_folder_id);
⋮----
public function get_absolute_path($url) {
⋮----
// fix the slashes
⋮----
//first attempt failed; try again
⋮----
//$this->write_log("absolute path, second attempt $file_path");
⋮----
//compare the two urls
⋮----
//$this->write_log("url_stub $url_stub");
//$this->write_log("baseurl $baseurl");
⋮----
//$this->write_log($new_msg);
⋮----
// are we on windows?
    if ($is_IIS || strtoupper(substr(PHP_OS, 0, 3)) == 'WIN' || strtoupper(substr(PHP_OS, 0, 13)) == 'MICROSOFT-IIS' ) {
⋮----
public function is_windows() {
⋮----
public function get_file_url($path) {
⋮----
public function get_file_url_for_copy($path) {
⋮----
// replace any slashes in the dir path when running windows
⋮----
public function delete_maxgalleria_media() {
⋮----
// prevent uploads folder from being deleted
⋮----
$folder_path = $this->get_absolute_path($image_location);
⋮----
if($row->post_type === MAXGALLERIA_MEDIA_LIBRARY_POST_TYPE) { //folder
⋮----
$row_count = $wpdb->get_var($sql);
⋮----
//$parent_folder =  $this->get_parent($delete_id);
⋮----
if(is_dir($folder_path)) {  //folder
⋮----
$this->remove_hidden_files($folder_path);
if($this->is_dir_empty($folder_path)) {
⋮----
$wpdb->delete( $table, $del_post );
⋮----
$folders = $this->get_folder_data($parent_folder);
⋮----
//error_log("delete_id $delete_id");
⋮----
$image_path = $this->get_absolute_path($image_location);
⋮----
//error_log("unlink image_path $image_path");
⋮----
$files = $this->display_folder_contents ($parent_folder, true, "", false);
⋮----
public function remove_hidden_files($directory) {
⋮----
public function is_dir_empty($directory) {
⋮----
public function get_image_sizes() {
⋮----
public function add_to_max_gallery () {
⋮----
$images_added_count = 0; // Initialize counter
⋮----
// Check if the media file is external
⋮----
// The media file is internal, proceed to add it to the gallery
$result = $this->add_image_to_mg_gallery($attachment_id, $gallery_id);
⋮----
$images_added_count++; // Increment counter
⋮----
// The media file is external, skip adding it to the gallery
⋮----
}// foreach
⋮----
// Display the count of images added
⋮----
public function search_media () {
⋮----
// Use esc_sql to escape the 'search_value' parameter before using it in the SQL query
⋮----
$sql = $wpdb->prepare("select ID, post_title, post_name, pm.meta_value as attached_file from {$wpdb->prefix}posts
⋮----
// Use esc_html to escape the 'search_value' parameter before echoing it back to the user
⋮----
public function search_library() {
⋮----
//empty h2 for where WP notices will appear
⋮----
$sql = $wpdb->prepare("(select {$wpdb->prefix}posts.ID, post_author, post_title, {$wpdb->prefix}mgmlp_folders.folder_id, pm.meta_value as attached_file, 'a' as item_type, 0 as block
⋮----
//error_log("grid " . $sql);
⋮----
$thumbnail = $this->get_absolute_path($thumbnail);
⋮----
public function maxgalleria_rename_image() {
⋮----
$sql = $wpdb->prepare("select ID, pm.meta_value as attached_file, post_title, post_name
⋮----
$destination_path = $this->get_absolute_path(pathinfo($image_location, PATHINFO_DIRNAME));
⋮----
$new_file_title = $this->remove_extension($new_file_name);
⋮----
$old_file_path = $this->get_absolute_path($image_location);
⋮----
$new_file_path = $this->get_absolute_path($new_file_url);
⋮----
$rename_image_location = $this->get_base_file($image_location);
$rename_destination = $this->get_base_file($new_file_url);
⋮----
//$old_file_path = str_replace('.', '*.', $old_file_path );
⋮----
$wpdb->update( $table, $data, $where);
⋮----
$wpdb->delete($table, $where);
⋮----
if($this->is_windows())
⋮----
$this->update_serial_postmeta_records($rename_image_location, $rename_destination);
⋮----
// update postmeta records for beaver builder
⋮----
$records = $wpdb->get_results($sql);
⋮----
$this->update_bb_postmeta($record->ID, $rename_image_location, $rename_destination);
⋮----
// clearing BB caches
⋮----
FLBuilderModel::delete_asset_cache_for_all_posts();
⋮----
FLCustomizer::clear_all_css_cache();
⋮----
// for updating wp pagebuilder
⋮----
$this->update_wppb_data($image_location_no_extension, $new_file_url);
⋮----
// for updating themify images
⋮----
$this->update_themify_data($image_location_no_extension, $new_file_url);
⋮----
// for updating elementor background images
⋮----
$this->update_elementor_data($file_id, $image_location_no_extension, $new_file_url);
⋮----
public function build_location_url($attached_file) {
⋮----
// saves the sort selection
public function sort_contents() {
⋮----
$this->display_folder_contents ($current_folder_id, true);
⋮----
public function mlf_change_sort_type() {
⋮----
$sort_type = $this->validate_sort_type(trim(sanitize_text_field($_POST['sort_type'])));
⋮----
// Validate the sort type to ensure it is either "ASC" or "DESC".
public function validate_sort_type($sort_type) {
⋮----
public function mgmlp_move_copy(){
⋮----
public function run_on_deactivate() {
⋮----
public function mlf_check_for_new_folders(){
⋮----
//error_log("parent_folder_id $parent_folder_id");
⋮----
$message = $this->admin_check_for_new_folders(true);
⋮----
public function admin_check_for_new_folders($noecho = null) {
⋮----
//$uploads_path = wp_upload_dir();
⋮----
//not sure if this is still needed
//$this->mlp_remove_slashes();
⋮----
// no match, set it back to empty
⋮----
// fix slashes if running windows
⋮----
if($this->folder_exist($url) === false) {
⋮----
$parent_id = $this->find_parent_id($url);
⋮----
$this->add_media_folder($dir_name, $parent_id, $url);
⋮----
private function find_parent_id($base_url) {
⋮----
// get the relative path
⋮----
$parent_id = $this->uploads_folder_ID; //-1;
⋮----
private function mpmlp_insert_post( $post_type, $post_title, $guid, $post_status ) {
⋮----
$wpdb->insert( $table, $post );
⋮----
public function mlp_set_review_notice_true() {
⋮----
public function mlp_set_feature_notice_true() {
⋮----
public function mlp_set_review_later() {
⋮----
public function mlp_features_notice() {
⋮----
public function mlp_review_notice() {
⋮----
public function max_sync_contents($parent_folder) {
⋮----
$current_row = $wpdb->get_row($sql);
⋮----
$folder_path = $this->get_absolute_path($baseurl);
⋮----
// check for new folders
⋮----
//error_log($name);
⋮----
$existing_folder_id = $this->folder_exist($url);
⋮----
$last_new_folder_id = $this->add_media_folder($dir_name, $parent_id, $url);
⋮----
} // end foreach
⋮----
public function get_base_file($file_path) {
⋮----
private function is_base_file($file_path, $file_array) {
⋮----
private function search_folder_attachments($file_path, $attachments){
⋮----
//error_log("$current_file_path $file_path");
⋮----
public function write_log ( $log )  {
⋮----
public function mlp_load_folder() {
⋮----
$folder_location = $this->get_folder_path($current_folder_id);
⋮----
$parents = $this->get_parents($current_folder_id);
⋮----
$this->display_folder_contents ($current_folder_id, true, $folders_path);
⋮----
public function mlp_upgrade_to_pro() {
⋮----
public function mlpp_hide_template_ad() {
⋮----
public function mlpp_settings() {
⋮----
public function regen_mlp_thumbnails() {
⋮----
//error_log("image_ids $image_ids");
⋮----
//error_log(print_r($image_ids, true));
⋮----
// check if the file is an image
⋮----
//error_log("is image");
⋮----
// get the image path
⋮----
// get the name of the file
⋮----
// set the time limit o five minutes
⋮----
// regenerate the thumbnails
⋮----
$this->remove_existing_thumbnails($image_id, addslashes($image_path));
⋮----
$this->remove_existing_thumbnails($image_id, $image_path);
⋮----
// check for errors
⋮----
echo esc_html__('Error: ','maxgalleria-media-library') . "$base_name ". $metadata->get_error_message();
⋮----
// update the meta data
⋮----
public function remove_existing_thumbnails($image_id, $image_path) {
⋮----
public function regenerate_interface() {
⋮----
// If the button was clicked
⋮----
// Capability check
⋮----
// Form nonce check
⋮----
// Create the list of image IDs
⋮----
if ( ! $images = $wpdb->get_results( "SELECT ID FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type LIKE 'image/%' AND post_mime_type != 'image/svg+xml' ORDER BY ID DESC" ) ) {
⋮----
//error_log("IMAGES: " . print_r($images, true));
⋮----
// Generate the list of IDs
⋮----
$('#regenthumbs-stop').val("<?php echo $this->esc_quotes( esc_html__( 'Stopping...', 'maxgalleria-media-library' ) ); ?>");
⋮----
// No button click? Display the form.
⋮----
} // End if button
⋮----
// Process a single image ID (this is an AJAX handler)
public function ajax_process_image() {
⋮----
@error_reporting( 0 ); // Don't break the JSON result
⋮----
$this->die_json_error_msg( $image->ID, esc_html__( "Your user account doesn't have permission to resize images", 'maxgalleria-media-library' ) );
⋮----
//error_log("temp_path $temp_path");
⋮----
$this->die_json_error_msg( $image->ID, sprintf( esc_html__( 'The originally uploaded image file cannot be found at %s', 'maxgalleria-media-library' ), '<code>' . esc_html( $fullsizepath ) . '</code>' ) );
⋮----
@set_time_limit( 900 ); // 5 minutes per image should be PLENTY
⋮----
$this->remove_existing_thumbnails($image->ID, addslashes($fullsizepath));
⋮----
$this->remove_existing_thumbnails($image->ID, $fullsizepath);
⋮----
$this->die_json_error_msg( $image->ID, $metadata->get_error_message() );
⋮----
$this->die_json_error_msg( $image->ID, esc_html__( 'Unknown failure reason.', 'maxgalleria-media-library' ) );
⋮----
// If this fails, then it just means that nothing was changed (old value == new value)
⋮----
// Helper to make a JSON error message
public function die_json_error_msg( $id, $message ) {
⋮----
// Helper function to escape quotes in strings for use in Javascript
public function esc_quotes( $string ) {
⋮----
public function mflp_enable_auto_protect() {
⋮----
public function mlp_image_seo_change() {
⋮----
//error_log("default_title $default_title");
⋮----
public function locaton_without_basedir($image_location, $uploads_dir, $upload_length) {
⋮----
public function get_browser() {
// https://www.php.net/manual/en/function.get-browser.php#101125.
// Cleaned up a bit, but overall it's the same.
⋮----
// First get the platform
⋮----
// Next get the name of the user agent yes seperately and for good reason
⋮----
// Finally get the correct version number
⋮----
// We have no matching number just continue
⋮----
// See how many we have
⋮----
// We will have two since we are not using 'other' argument yet
// See if version is before or after the name
⋮----
// Check if we have a number
⋮----
public function mlp_support() {
⋮----
public  function mlp_remove_slashes() {
⋮----
public function hide_maxgalleria_media() {
⋮----
//error_log("hide_maxgalleria_media");
⋮----
// prevent hiding of the uploads folder and sub folders
⋮----
$parent_folder =  $this->get_parent($folder_id);
⋮----
$this->remove_children($folder_id);
⋮----
$this->mlf_delete_post($folder_id, false); //delete the post record
$wpdb->delete( $folder_table, $del_post ); // delete the folder table record
⋮----
// $folder_id aready forced to an inteter in hide_maxgalleria_media()
private function remove_children($folder_id) {
⋮----
$this->remove_children($row->post_id);
⋮----
$this->mlf_delete_post($row->post_id, false); //delete the post record
⋮----
// modifed version of wp_delete_post
private function mlf_delete_post( $postid = 0, $force_delete = false ) {
⋮----
if ( !$post = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE ID = %d", $postid)) )
⋮----
// Point children of this page to its parent, also clean the cache of affected children.
$children_query = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_parent = %d AND post_type = %s", $postid, $post->post_type );
$children = $wpdb->get_results( $children_query );
⋮----
$wpdb->update( $wpdb->posts, $parent_data, $parent_where + array( 'post_type' => $post->post_type ) );
⋮----
// Do raw query. wp_get_post_revisions() is filtered.
$revision_ids = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_parent = %d AND post_type = 'revision'", $postid ) );
// Use wp_delete_post (via wp_delete_post_revision) again. Ensures any meta/misplaced data gets cleaned up.
⋮----
// Point all attachments to this post up one level.
$wpdb->update( $wpdb->posts, $parent_data, $parent_where + array( 'post_type' => 'attachment' ) );
⋮----
$comment_ids = $wpdb->get_col( $wpdb->prepare( "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = %d", $postid ));
⋮----
$post_meta_ids = $wpdb->get_col( $wpdb->prepare( "SELECT meta_id FROM $wpdb->postmeta WHERE post_id = %d ", $postid ));
⋮----
$result = $wpdb->delete( $wpdb->posts, array( 'ID' => $postid ) );
⋮----
public function mlf_hide_info() {
⋮----
public function mlfp_set_scaling() {
⋮----
$this->mlf_option_true_update(MAXGALLERIA_DISABLE_SCALLING, $scaling_status);
⋮----
$this->add_postmeta_index();
⋮----
$this->remove_postmeta_index();
⋮----
$this->mlf_option_true_update(MLFP_SKIP_WEBP_FILES, $skip_webp);
⋮----
public function mlf_option_true_update($option_id, $option_value) {
⋮----
public function add_postmeta_index() {
⋮----
$wpdb->get_results($sql);
⋮----
public function remove_postmeta_index() {
⋮----
public function max_discover_files($parent_folder) {
⋮----
//error_log("max_discover_files parent_folder $parent_folder");
⋮----
$attachments = $wpdb->get_results($sql);
⋮----
//error_log("image location 1" . $image_location);
⋮----
//str_replace('localhost', 'www.localhost', $image_location);
⋮----
//error_log("image location 2" . $image_location);
⋮----
//error_log($folder_path);
⋮----
if(!$this->is_webp($new_attachment) || ($this->is_webp($new_attachment) && $this->sync_skip_webp == 'off')) {
if(!strpos($new_attachment, '-uai-')) {  // skip thumbnails created by the Uncode theme
if(!strpos($new_attachment, '-scaled.')) {  // skip scaled images
if(!strpos($new_attachment, '-pdf.jpg')) {  // skip pdf thumbnails
⋮----
if($this->is_base_file($file_path, $folder_contents)) {
if(!$this->search_folder_attachments($file_path, $attachments)) {
⋮----
return '3'; // add the files
⋮----
return '2'; // check next folder
⋮----
public function is_webp($new_attachment ) {
⋮----
public function mlfp_run_sync_process() {
⋮----
// find folders
⋮----
$this->max_sync_contents($parent_folder);
⋮----
// for each folder. get the folder ids
⋮----
$this->max_discover_files($next_folder);
⋮----
// add each file
⋮----
$this->mlfp_process_sync_file($next_file, $mlp_title_text, $mlp_alt_text);
⋮----
public function mlfp_process_sync_file($next_file, $mlp_title_text, $mlp_alt_text) {
⋮----
$attach_id = $this->add_new_attachment($new_attachment, $parent_folder, $new_file_title, $mlp_alt_text, $mlp_title_text);
⋮----
public function mlfp_save_mc_data($serial_copy_ids, $folder_id, $user_id) {
⋮----
$destination_folder = $this->get_folder_path($folder_id);
⋮----
public function mlfp_process_mc_data() {
⋮----
$this->mlfp_save_mc_data($serial_copy_ids, $folder_id, $user_id);
⋮----
$message = $this->move_copy_file(true, $next_id, $folder_id, $current_folder, $user_id);
⋮----
$message = $this->move_copy_file(false, $next_id, $folder_id, $current_folder, $user_id);
⋮----
public function move_copy_file($copy, $copy_id, $folder_id, $current_folder, $user_id) {
⋮----
$destination_path = $this->get_absolute_path($destination);
⋮----
$destination_url = $this->get_file_url($destination_name);
⋮----
$attach_id = $this->add_new_attachment($destination_name, $folder_id, $title_text, $alt_text);
⋮----
//move
⋮----
// check current theme customizer settings for the file
// and update if found
⋮----
$move_image_url = $this->get_file_url_for_copy($image_path);
$move_destination_url = $this->get_file_url_for_copy($destination_name);
⋮----
//error_log("image_path $image_path");
⋮----
//error_log("path_to_thumbnails $path_to_thumbnails");
⋮----
// check current theme customizer settings for the fileg
⋮----
$move_source_url = $this->get_file_url_for_copy($source_path);
$move_thumbnail_url = $this->get_file_url_for_copy($thumbnail_destination);
⋮----
// update posts table
⋮----
// update folder table
⋮----
//                // get the uploads dir name
//                $basedir = $this->upload_dir['baseurl'];
//                $uploads_dir_name_pos = strrpos($basedir, '/');
//                $uploads_dir_name = substr($basedir, $uploads_dir_name_pos+1);
//
//                //find the name and cut off the part with the uploads path
//                $string_position = strpos($destination_name, $uploads_dir_name);
//                $uploads_dir_length = strlen($uploads_dir_name) + 1;
//                $uploads_location = substr($destination_name, $string_position+$uploads_dir_length);
⋮----
// Get the uploads dir name
⋮----
// Fetch the name of the content folder dynamically using the filter
⋮----
// Find the name and cut off the part with the uploads path
⋮----
// update _wp_attached_file
⋮----
// update _wp_attachment_metadata
⋮----
// update posts and pages
$replace_image_location = $this->get_base_file($image_location);
$replace_destination_url = $this->get_base_file($destination_url);
⋮----
$this->update_serial_postmeta_records($replace_image_location, $replace_destination_url);
⋮----
$this->update_bb_postmeta($record->ID, $replace_image_location, $replace_destination_url);
⋮----
//error_log($replace_sql);
⋮----
$this->update_wppb_data($replace_image_location, $destination_url);
⋮----
$this->update_themify_data($replace_image_location, $destination_url);
⋮----
$this->update_elementor_data($copy_id, $replace_image_location, $destination_url);
⋮----
$files = $this->display_folder_contents ($current_folder, true, "", false);
⋮----
//$this->write_log("Cannot find the file: $image_path");
⋮----
public function update_wppb_data($replace_image_location, $destination_url) {
⋮----
$this->wppb_recursive_find_and_update($jarrays, $replace_image_location, $destination_url, $url_without_extension);
//error_log(print_r($jarrays, true));
⋮----
$wpdb->update($table, $data, $where);
⋮----
public function wppb_recursive_find_and_update(&$jarrays, $replace_image_location, $destination_url ) {
⋮----
$this->wppb_recursive_find_and_update($value, $replace_image_location, $destination_url);
⋮----
public function update_themify_data($replace_image_location, $destination_url) {
⋮----
$this->recursive_find_and_update($jarrays, $replace_image_location, $destination_url, $url_without_extension);
⋮----
public function recursive_find_and_update(&$jarrays, $replace_image_location, $destination_url, $url_without_extension) {
⋮----
$this->recursive_find_and_update($value, $replace_image_location, $destination_url, $url_without_extension);
⋮----
public function update_elementor_data($image_id, $replace_image_location, $replace_destination_url) {
⋮----
// check for serialized data
⋮----
if($this->search_elementor_array($image_id, $jarray, $replace_image_location, $replace_destination_url, $row->post_id))
⋮----
//error_log("is not an array");
⋮----
$this->update_elemenator_css_file($row->post_id, $replace_image_location, $replace_destination_url);
⋮----
public function search_elementor_array($image_id, &$jarray, $replace_image_location, $replace_destination_url, $post_id) {
⋮----
if($jarray['settings'] !== null) { // Add null check here
⋮----
public function search_elementor_array1($image_id, &$jarray, $replace_image_location, $replace_destination_url, $post_id) {
⋮----
public function update_elemenator_css_file($post_id, $replace_image_location, $replace_destination_url) {
⋮----
public function update_bb_postmeta($post_id, $replace_image_location, $replace_destination_url) {
⋮----
$this->update_bb_postmeta_item('_fl_builder_draft', $post_id, $replace_image_location, $replace_destination_url);
$this->update_bb_postmeta_item('_fl_builder_data', $post_id, $replace_image_location, $replace_destination_url);
⋮----
public function update_bb_postmeta_item($metakey, $post_id, $replace_image_location, $replace_destination_url) {
⋮----
$builder_info = $this->objectToArray($builder_info);
⋮----
$builder_info = $this->arrayToObject($builder_info);
⋮----
function objectToArray( $object ) {
⋮----
public function arrayToObject($d){
⋮----
public function get_upload_status() {
⋮----
public function update_serial_postmeta_records($replace_image_location, $replace_destination_url) {
⋮----
// = instead oflike?
⋮----
//error_log("$widget: $text");
⋮----
//error_log($data['widgets'][$index][$widget]);
⋮----
public function get_ajax_paramater($parameter_name, $default = '') {
⋮----
public function mlfp_process_bdp() {
⋮----
$activate_mlfp_bdp = $this->get_ajax_paramater('activate_mlfp_bdp');
$disable_listing = $this->get_ajax_paramater('disable_listing');
$disable_hotlinking = $this->get_ajax_paramater('disable_hotlinking');
$auto_protect = $this->get_ajax_paramater('auto_protect');
$display_fe_protected_images = $this->get_ajax_paramater('display_fe_protected_images');
$prevent_right_click = $this->get_ajax_paramater('prevent_right_click');
$bda_role = $this->get_ajax_paramater('bda_role');
$no_access_page_id = intval($this->get_ajax_paramater('no_access_page_id'));
$no_access_page_name = $this->get_ajax_paramater('no_access_page_name');
⋮----
//error_log("mlfp_process_bdp 2");
⋮----
//error_log("created " . $this->protected_content_dir);
⋮----
//@chmod($this->protected_content_dir, 0755);
⋮----
$this->bda_folder_id = $this->add_media_folder(MLFP_PROTECTED_DIRECTORY, $this->uploads_folder_ID, $this->protected_content_dir);
⋮----
// check for download page
⋮----
//error_log("removing bda rules");
⋮----
public function mlfp_save_noaccess_page() {
⋮----
public function mlfp_update_htaccess($rules) {
⋮----
//error_log("mlfp_update_htaccess");
⋮----
public function mlfp_toggle_file_access() {
⋮----
$next_id = intval($this->get_ajax_paramater('file_id', ''));
⋮----
$current_folder = intval($this->get_ajax_paramater('current_folder', ''));
⋮----
$protected = intval($this->get_ajax_paramater('protected', '0'));
⋮----
$message = $this->move_to_protected_folder($next_id, $current_folder, $protected);
⋮----
public function move_to_protected_folder($next_id, $current_folder, $protected) {
⋮----
//error_log("image_location $image_location");
⋮----
//error_log('Protecting file ' . $row->attached_file);
⋮----
//error_log("destination_name $destination_name");
⋮----
$destination_path = $this->get_folder_path($current_folder);
⋮----
//error_log('Unprotecting file ' . $row->attached_file);
⋮----
//error_log("destination_path $destination_path");
⋮----
if($this->make_dir_path($destination_folder)) {
⋮----
//error_log("rename $image_path, $destination_name");
//return false;
⋮----
//error_log("full_scaled_image_path $full_scaled_image_path");
⋮----
//error_log("full_scaled_image $full_scaled_image");
⋮----
//error_log("scaled_image_destination $scaled_image_destination");
⋮----
//error_log("thumbnail_file $thumbnail_file");
⋮----
// update block_access table
⋮----
$this->add_bda_record($next_id);
⋮----
$this->remove_bda_record($next_id);
⋮----
//error_log("block_access_table updated $protected");
⋮----
//add postmete record
⋮----
//              // get the uploads dir name
//              $basedir = $this->upload_dir['baseurl'];
//              $uploads_dir_name_pos = strrpos($basedir, '/');
//              $uploads_dir_name = substr($basedir, $uploads_dir_name_pos+1);
⋮----
//              //find the name and cut off the part with the uploads path
//              $string_position = strpos($destination_name, $uploads_dir_name);
//              $uploads_dir_length = strlen($uploads_dir_name) + 1;
//              $uploads_location = substr($destination_name, $string_position+$uploads_dir_length);
⋮----
//error_log("new file location $uploads_location");
⋮----
//}
⋮----
//error_log("check for cache");
⋮----
//error_log("delete_asset_cache_for_all_posts");
⋮----
FLBuilderModel::delete_all_asset_cache( $record->ID );
//error_log("delete_all_asset_cache");
⋮----
//error_log("clear_all_css_cache");
⋮----
$this->update_links($replace_image_location, $replace_destination_url);
⋮----
$this->update_elementor_data($next_id, $replace_image_location, $destination_url);
⋮----
//$message .= __('Updating attachment links, please wait...','maxgalleria-media-library') . PHP_EOL;
⋮----
//$message .= sprintf(__("Could not move %s to the protected folder",'maxgalleria-media-library'), $row->attached_file) . PHP_EOL;
⋮----
public function is_file_protected($file_id) {
⋮----
public function file_exists($file_id) {
⋮----
public function make_dir_path($path) {
⋮----
public function add_bda_record($attachment_id) {
⋮----
$wpdb->replace($block_access_table, $data);
⋮----
public function remove_bda_record($attachment_id) {
⋮----
$wpdb->delete($block_access_table,$where);
⋮----
public function bda_help() {
⋮----
public function mlp_generate_file_link() {
⋮----
if(!$this->is_protected_file($image_id)) {
⋮----
$download_link = $this->get_private_link($image_id, $current_user);
⋮----
public function is_protected_file($image_id) {
⋮----
if($wpdb->get_var($sql) != NULL)
⋮----
public function get_hash_id($image_id) {
⋮----
$hash_id = $wpdb->get_var($sql);
⋮----
public function get_private_link($image_id, $current_user) {
⋮----
$hash = $this->get_hash_id($image_id);
⋮----
public function mlfp_display_bda_info() {
⋮----
$image_id = intval($this->get_ajax_paramater('image_id', 0));
⋮----
$title = $this->get_ajax_paramater('title', '');
⋮----
$count = $this->get_ajax_paramater('count', '');
⋮----
//error_log("$image_id, $title, $count");
⋮----
$row = $this->get_bda_file_info($image_id, $title, $count);
⋮----
public function get_bda_file_info($image_id, $title, $count) {
⋮----
public function mlfp_update_bda_record() {
⋮----
$download_limit = intval($this->get_ajax_paramater('download_limit', 0));
⋮----
$expiration_date = $this->get_ajax_paramater('expiration_date', 0);
⋮----
$this->update_bda_record($image_id, $download_limit, $expiration_date);
⋮----
public function update_bda_record($image_id, $download_limit, $expiration_date) {
⋮----
public function copy_template_to_theme() {
⋮----
// Copy gallery post type template file to theme directory
⋮----
$destination = $this->get_theme_dir() . '/page-mlfp-download.php';
⋮----
public function get_theme_dir() {
⋮----
public function mlfp_bdp_report() {
⋮----
$page_id = intval($this->get_ajax_paramater('page_id', 0));
⋮----
$sql = $wpdb->prepare("SELECT SQL_CALC_FOUND_ROWS pm.meta_value AS attached_file, ba.count, ba.download_limit, ba.expiration_date
⋮----
$count = $wpdb->get_row("select FOUND_ROWS()", ARRAY_A);
⋮----
//error_log($row->attached_file . " expiration_date " . $row->expiration_date);
//$expiration_date = ($row->expiration_date == '0000-00-00') ? 'none' : date("m/d/Y", strtotime($row->expiration_date));
⋮----
public function mlfp_block_new_ip() {
⋮----
$new_block_ip = $this->get_ajax_paramater('new_block_ip');
⋮----
$sql = $wpdb->prepare("select * from $table where address = '%s'", $new_block_ip);
⋮----
$retval = $wpdb->insert($table, $data);
⋮----
//error_log("$new_block_ip retval $retval");
⋮----
public function get_blocked_ips() {
⋮----
public function mlfp_get_block_ips() {
⋮----
$data = $this->get_blocked_ips();
⋮----
public function mlfp_unblock_ips() {
⋮----
//error_log("unblock_ips 1: $unblock_ips");
⋮----
//error_log("unblock_ips 2: $unblock_ips");
⋮----
if($wpdb->delete($table, $where))
⋮----
public function get_all_pages() {
⋮----
$pages = $wpdb->get_results($sql);
⋮----
public function bda_prepare_attachment_for_js( $response, $attachment, $meta ) {
⋮----
$attach_arr = $this->objectToArray($attachment);
⋮----
public function bda_add_class_to_media_library_grid_elements() {
⋮----
public function get_file_thumbnail($ext) {
⋮----
// spread sheet
⋮----
// video formats
⋮----
// text formats
⋮----
// archive formats
⋮----
// doc files
⋮----
// power point
````

## File: Old Plugin/mlp-reset.php
````php
/*
Plugin Name: Media Library Folders Reset
Plugin URI: https://maxgalleria.com
Description: Plugin for reseting Media Library Folders
Author: Max Foundry
Author URI: https://maxfoundry.com
Version: 8.3.2
Copyright 2015-2021 Max Foundry, LLC (https://maxfoundry.com)
Text Domain: mlp-reset
*/
⋮----
// run to ensure we can check user capability
⋮----
function mlfr_get_upload_status() {
⋮----
function mlp_reset_menu() {
⋮----
function load_mlfr_textdomain() {
⋮----
function enqueue_mlfr_admin_print_styles() {
⋮----
function mlp_reset() {
⋮----
function data_reset() {
⋮----
function clean_database() {
⋮----
// Check if the current user has the capability to upload files
⋮----
$wpdb->query($sql);
⋮----
$rows = $wpdb->get_results($sql);
⋮----
function mlfr_table_exist($table) {
⋮----
function mlpr_show_attachments () {
⋮----
$count = $wpdb->get_var($sql);
⋮----
function mlpr_show_folders() {
⋮----
function get_parent_by_name($sub_folder) {
⋮----
return $wpdb->get_var($sql);
⋮----
function add_new_folder_parent($record_id, $parent_folder) {
⋮----
$wpdb->insert( $table, $new_record );
⋮----
function mlpr_folders_no_ids() {
⋮----
// get the parent ID
⋮----
// if parent ID is found
⋮----
function mlpr_remove_tables() {
⋮----
function mlfr_remove_tables () {
⋮----
function mlfr_remove_db_table ($table) {
⋮----
//error_log($sql);
⋮----
$result = $wpdb->query($sql);
⋮----
function mlf_get_theme_dir() {
````

## File: Old Plugin/page-mlfp-download.php
````php
// check for blocked IP address
⋮----
// test ip
//$ip_address = '171.93.72.77';
⋮----
$sql = $wpdb->prepare($prepare_sql, $ip_address);
⋮----
$row = $wpdb->get_row($sql);
⋮----
} else { // display 404 page if the no access page has been added
⋮----
$wp_query->set_404();
⋮----
//$hash_id = filter_input (INPUT_GET, 'download', FILTER_SANITIZE_STRING);
⋮----
$sql = $wpdb->prepare($prepare_sql, $hash_id);
⋮----
$wpdb->update($table, $data, $where);
````

## File: src/Core/Cache/DatabaseCache.php
````php
namespace MediaFolders\Core\Cache;
⋮----
use MediaFolders\Core\Contracts\CacheInterface;
use wpdb;
⋮----
/**
 * Database Cache Implementation
 * 
 * @package MediaFolders\Core\Cache
 * @author dpitchford1
 * @since 2.0.0
 * @created 2025-04-19 20:41:42
 */
class DatabaseCache implements CacheInterface
⋮----
private wpdb $wpdb;
private string $table;
⋮----
public function __construct(wpdb $wpdb)
⋮----
/**
     * {@inheritDoc}
     */
public function get(string $key, $default = null)
⋮----
$row = $this->wpdb->get_row(
$this->wpdb->prepare(
⋮----
$this->delete($key);
⋮----
public function set(string $key, $value, int $ttl = 3600): bool
⋮----
return (bool) $this->wpdb->replace(
⋮----
public function remember(string $key, int $ttl, callable $callback)
⋮----
$value = $this->get($key);
⋮----
$value = $callback();
$this->set($key, $value, $ttl);
⋮----
public function delete(string $key): bool
⋮----
return (bool) $this->wpdb->delete(
````

## File: src/Core/Contracts/CacheInterface.php
````php
namespace MediaFolders\Core\Contracts;
⋮----
/**
 * Cache Interface
 * 
 * @package MediaFolders\Core\Contracts
 * @author dpitchford1
 * @since 2.0.0
 * @created 2025-04-19 20:41:42
 */
interface CacheInterface
⋮----
/**
     * Get an item from the cache.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
public function get(string $key, $default = null);
⋮----
/**
     * Store an item in the cache.
     *
     * @param string $key
     * @param mixed $value
     * @param int $ttl Time to live in seconds
     * @return bool
     */
public function set(string $key, $value, int $ttl = 3600): bool;
⋮----
/**
     * Get an item from the cache, or store it if it doesn't exist.
     *
     * @param string $key
     * @param int $ttl
     * @param callable $callback
     * @return mixed
     */
public function remember(string $key, int $ttl, callable $callback);
⋮----
/**
     * Remove an item from the cache.
     *
     * @param string $key
     * @return bool
     */
public function delete(string $key): bool;
````

## File: src/Core/Contracts/EventDispatcherInterface.php
````php
namespace MediaFolders\Core\Contracts;
⋮----
interface EventDispatcherInterface
⋮----
/**
     * Dispatch an event.
     *
     * @param object $event
     * @return void
     */
public function dispatch(object $event): void;
⋮----
/**
     * Add an event listener.
     *
     * @param string $event Event class name
     * @param callable $listener
     * @return void
     */
public function addListener(string $event, callable $listener): void;
````

## File: src/Core/Contracts/ServiceProviderInterface.php
````php
namespace MediaFolders\Core\Contracts;
⋮----
use MediaFolders\Core\Container;
⋮----
interface ServiceProviderInterface
⋮----
/**
     * Register services into the container.
     *
     * @param Container $container
     * @return void
     */
public function register(Container $container): void;
⋮----
/**
     * Bootstrap any application services.
     *
     * @param Container $container
     * @return void
     */
public function boot(Container $container): void;
````

## File: src/Core/ImageIndexing/ImageIndexer.php
````php
namespace MediaFolders\Core\ImageIndexing;
⋮----
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
⋮----
class ImageIndexer
⋮----
private CacheInterface $cache;
private AttachmentRepositoryInterface $attachmentRepository;
⋮----
public function __construct(
⋮----
/**
     * Initialize the indexer.
     */
public function init(): void
⋮----
// Register cron event
⋮----
// Schedule initial indexing if needed
⋮----
/**
     * Process a batch of images.
     */
public function processBatch(): void
⋮----
// Get unprocessed images
$images = $this->getUnprocessedImages();
⋮----
$this->maybeDisableCron();
⋮----
$this->processImage($image);
⋮----
// Update progress
$this->updateProgress(count($images));
⋮----
/**
     * Get unprocessed images.
     *
     * @return array
     */
private function getUnprocessedImages(): array
⋮----
return $wpdb->get_results($wpdb->prepare("
⋮----
/**
     * Process a single image.
     *
     * @param object $image
     */
private function processImage(object $image): void
⋮----
// Generate image metadata
⋮----
// Store in cache for quick access
⋮----
$this->cache->set($cacheKey, [
⋮----
/**
     * Update indexing progress.
     *
     * @param int $processedCount
     */
private function updateProgress(int $processedCount): void
⋮----
/**
     * Disable cron if indexing is complete.
     */
private function maybeDisableCron(): void
````

## File: src/Core/ImageIndexing/IndexProgress.php
````php
namespace MediaFolders\Core\ImageIndexing;
⋮----
class IndexProgress
⋮----
/**
     * Get current indexing progress.
     *
     * @return array{total: int, processed: int, last_run: int}
     */
public function getProgress(): array
⋮----
$progress['total'] = $this->countTotalImages();
⋮----
/**
     * Calculate percentage of completion.
     *
     * @return float
     */
public function getPercentComplete(): float
⋮----
$progress = $this->getProgress();
⋮----
/**
     * Count total images in the media library.
     *
     * @return int
     */
private function countTotalImages(): int
⋮----
return (int) $wpdb->get_var("
````

## File: src/Core/EventDispatcher.php
````php
namespace MediaFolders\Core;
⋮----
use MediaFolders\Core\Contracts\EventDispatcherInterface;
⋮----
class EventDispatcher implements EventDispatcherInterface
⋮----
/**
     * @var array<string, array<callable>>
     */
private array $listeners = [];
⋮----
/**
     * {@inheritDoc}
     */
public function dispatch(object $event): void
⋮----
$listener($event);
⋮----
public function addListener(string $event, callable $listener): void
````

## File: src/Core/MediaHandler.php
````php
namespace MediaFolders\Core;
⋮----
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Models\Attachment;
⋮----
class MediaHandler
⋮----
private CacheInterface $cache;
private AttachmentRepositoryInterface $attachmentRepository;
⋮----
public function __construct(
⋮----
/**
     * Get media items with caching.
     *
     * @param array $args Query arguments
     * @return array<Attachment>
     */
public function getMediaItems(array $args): array
⋮----
return $this->cache->remember($cacheKey, 3600, function() use ($args) {
return $this->attachmentRepository->getByFolder($args['folder_id'] ?? 0, $args);
⋮----
/**
     * Move media items to a folder.
     *
     * @param array $attachmentIds
     * @param int $folderId
     * @return bool
     */
public function moveToFolder(array $attachmentIds, int $folderId): bool
⋮----
$this->attachmentRepository->addToFolder((int)$attachmentId, $folderId);
⋮----
error_log("Failed to move attachment {$attachmentId} to folder {$folderId}: " . $e->getMessage());
⋮----
/**
     * Remove media items from a folder.
     *
     * @param array $attachmentIds
     * @param int $folderId
     * @return bool
     */
public function removeFromFolder(array $attachmentIds, int $folderId): bool
⋮----
$this->attachmentRepository->removeFromFolder((int)$attachmentId, $folderId);
⋮----
error_log("Failed to remove attachment {$attachmentId} from folder {$folderId}: " . $e->getMessage());
````

## File: src/Database/Contracts/AttachmentRepositoryInterface.php
````php
namespace MediaFolders\Database\Contracts;
⋮----
use MediaFolders\Models\Attachment;
use RuntimeException;
⋮----
interface AttachmentRepositoryInterface
⋮----
/**
     * Add attachment to folder.
     *
     * @param int $attachmentId WordPress attachment ID
     * @param int $folderId Folder ID
     * @return bool
     * @throws RuntimeException If operation fails
     */
public function addToFolder(int $attachmentId, int $folderId): bool;
⋮----
/**
     * Remove attachment from folder.
     *
     * @param int $attachmentId WordPress attachment ID
     * @param int $folderId Folder ID
     * @return bool
     */
public function removeFromFolder(int $attachmentId, int $folderId): bool;
⋮----
/**
     * Get all attachments in folder.
     *
     * @param int $folderId Folder ID
     * @param array $args Query arguments
     * @return array<Attachment>
     */
public function getByFolder(int $folderId, array $args = []): array;
⋮----
/**
     * Get all folders for attachment.
     *
     * @param int $attachmentId WordPress attachment ID
     * @return array<int>
     */
public function getFolderIds(int $attachmentId): array;
⋮----
/**
     * Check if attachment exists in folder.
     *
     * @param int $attachmentId WordPress attachment ID
     * @param int $folderId Folder ID
     * @return bool
     */
public function existsInFolder(int $attachmentId, int $folderId): bool;
````

## File: src/Database/Contracts/CacheRepositoryInterface.php
````php
namespace MediaFolders\Database\Contracts;
⋮----
interface CacheRepositoryInterface
⋮----
/**
     * Get a value from cache.
     *
     * @param string $key Cache key
     * @param mixed $default Default value if key doesn't exist
     * @return mixed
     */
public function get(string $key, $default = null);
⋮----
/**
     * Set a value in cache.
     *
     * @param string $key Cache key
     * @param mixed $value Value to cache
     * @param int $ttl Time to live in seconds
     * @return bool
     */
public function set(string $key, $value, int $ttl = 3600): bool;
⋮----
/**
     * Delete a value from cache.
     *
     * @param string $key Cache key
     * @return bool
     */
public function delete(string $key): bool;
⋮----
/**
     * Check if key exists in cache.
     *
     * @param string $key Cache key
     * @return bool
     */
public function has(string $key): bool;
⋮----
/**
     * Clear all cached items.
     *
     * @return bool
     */
public function clear(): bool;
````

## File: src/Database/Contracts/DatabaseManagerInterface.php
````php
namespace MediaFolders\Database\Contracts;
⋮----
interface DatabaseManagerInterface
⋮----
/**
     * Install or update database tables.
     *
     * @return void
     * @throws \RuntimeException If table creation fails
     */
public function installTables(): void;
⋮----
/**
     * Get the current database version.
     *
     * @return string
     */
public function getVersion(): string;
⋮----
/**
     * Update the database version.
     *
     * @param string $version Version to set
     * @return void
     */
public function setVersion(string $version): void;
⋮----
/**
     * Check if database needs upgrade.
     *
     * @return bool
     */
public function needsUpgrade(): bool;
````

## File: src/Database/Contracts/FolderRepositoryInterface.php
````php
namespace MediaFolders\Database\Contracts;
⋮----
use MediaFolders\Models\Folder;
use RuntimeException;
⋮----
interface FolderRepositoryInterface
⋮----
/**
     * Find a folder by ID.
     *
     * @param int $id Folder ID
     * @return Folder|null
     */
public function find(int $id): ?Folder;
⋮----
/**
     * Create a new folder.
     *
     * @param array $data Folder data
     * @return Folder
     * @throws RuntimeException If creation fails
     */
public function create(array $data): Folder;
⋮----
/**
     * Update an existing folder.
     *
     * @param int $id Folder ID
     * @param array $data Updated folder data
     * @return bool
     * @throws RuntimeException If update fails
     */
public function update(int $id, array $data): bool;
⋮----
/**
     * Delete a folder.
     *
     * @param int $id Folder ID
     * @return bool
     * @throws RuntimeException If deletion fails
     */
public function delete(int $id): bool;
⋮----
/**
     * Get all folders.
     *
     * @param array $args Query arguments
     * @return array<Folder>
     */
public function all(array $args = []): array;
⋮----
/**
     * Get child folders.
     *
     * @param int $parentId Parent folder ID
     * @return array<Folder>
     */
public function children(int $parentId): array;
````

## File: src/Database/AttachmentRepository.php
````php
namespace MediaFolders\Database;
⋮----
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Models\Attachment;
use RuntimeException;
use wpdb;
use WP_Query;
⋮----
class AttachmentRepository implements AttachmentRepositoryInterface
⋮----
/**
     * @var wpdb
     */
private wpdb $wpdb;
⋮----
/**
     * @param wpdb $wpdb
     */
public function __construct(wpdb $wpdb)
⋮----
/**
     * {@inheritDoc}
     */
public function addToFolder(int $attachmentId, int $folderId): bool
⋮----
if ($this->existsInFolder($attachmentId, $folderId)) {
⋮----
$result = $this->wpdb->insert(
⋮----
public function removeFromFolder(int $attachmentId, int $folderId): bool
⋮----
return (bool) $this->wpdb->delete(
⋮----
public function getByFolder(int $folderId, array $args = []): array
⋮----
// Get attachment IDs in folder
$attachmentIds = $this->wpdb->get_col(
$this->wpdb->prepare(
⋮----
public function getFolderIds(int $attachmentId): array
⋮----
$this->wpdb->get_col(
⋮----
public function existsInFolder(int $attachmentId, int $folderId): bool
⋮----
return (bool) $this->wpdb->get_var(
````

## File: src/Database/CacheRepository.php
````php
namespace MediaFolders\Database;
⋮----
use MediaFolders\Database\Contracts\CacheRepositoryInterface;
use wpdb;
⋮----
class CacheRepository implements CacheRepositoryInterface
⋮----
/**
     * @var wpdb
     */
private wpdb $wpdb;
⋮----
/**
     * @var string
     */
private string $table;
⋮----
/**
     * @param wpdb $wpdb
     */
public function __construct(wpdb $wpdb)
⋮----
/**
     * {@inheritDoc}
     */
public function get(string $key, $default = null)
⋮----
$this->cleanup();
⋮----
$row = $this->wpdb->get_row(
$this->wpdb->prepare(
⋮----
public function set(string $key, $value, int $ttl = 3600): bool
⋮----
$this->delete($key);
⋮----
return (bool) $this->wpdb->insert(
⋮----
public function delete(string $key): bool
⋮----
return (bool) $this->wpdb->delete(
⋮----
public function has(string $key): bool
⋮----
return (bool) $this->wpdb->get_var(
⋮----
public function clear(): bool
⋮----
return (bool) $this->wpdb->query("TRUNCATE TABLE {$this->table}");
⋮----
/**
     * Clean up expired cache entries.
     *
     * @return void
     */
private function cleanup(): void
⋮----
$this->wpdb->query(
````

## File: src/Database/DatabaseManager.php
````php
namespace MediaFolders\Database;
⋮----
use MediaFolders\Database\Contracts\DatabaseManagerInterface;
use RuntimeException;
use wpdb;
⋮----
class DatabaseManager implements DatabaseManagerInterface
⋮----
/**
     * WordPress database instance.
     *
     * @var wpdb
     */
private wpdb $wpdb;
⋮----
/**
     * Database version option name.
     *
     * @var string
     */
⋮----
/**
     * Constructor.
     *
     * @param wpdb $wpdb WordPress database instance
     */
public function __construct(wpdb $wpdb)
⋮----
/**
     * {@inheritDoc}
     */
public function installTables(): void
⋮----
$tables = Schema::getTables();
$charset_collate = $this->wpdb->get_charset_collate();
⋮----
$this->setVersion(MEDIA_FOLDERS_VERSION);
⋮----
public function getVersion(): string
⋮----
public function setVersion(string $version): void
⋮----
public function needsUpgrade(): bool
⋮----
return version_compare($this->getVersion(), MEDIA_FOLDERS_VERSION, '<');
````

## File: src/Database/FolderRepository.php
````php
namespace MediaFolders\Database;
⋮----
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Models\Folder;
use RuntimeException;
use wpdb;
⋮----
class FolderRepository implements FolderRepositoryInterface
⋮----
/**
     * @var wpdb
     */
private wpdb $wpdb;
⋮----
/**
     * @param wpdb $wpdb
     */
public function __construct(wpdb $wpdb)
⋮----
/**
     * {@inheritDoc}
     */
public function find(int $id): ?Folder
⋮----
$row = $this->wpdb->get_row(
$this->wpdb->prepare(
⋮----
public function create(array $data): Folder
⋮----
$result = $this->wpdb->insert(
⋮----
return $this->find((int) $this->wpdb->insert_id);
⋮----
public function update(int $id, array $data): bool
⋮----
return (bool) $this->wpdb->update(
⋮----
public function delete(int $id): bool
⋮----
return (bool) $this->wpdb->delete(
⋮----
public function all(array $args = []): array
⋮----
$params[] = '%' . $this->wpdb->esc_like($args['search']) . '%';
⋮----
$rows = $this->wpdb->get_results(
$params ? $this->wpdb->prepare($query, ...$params) : $query,
⋮----
public function children(int $parentId): array
````

## File: src/Database/Schema.php
````php
namespace MediaFolders\Database;
⋮----
/**
 * Database Schema Handler
 * 
 * @since 1.0.0
 */
class Schema {
/**
     * Get tables schema
     *
     * @return array
     */
public static function getTables(): array {
````

## File: src/Events/AttachmentAddedToFolder.php
````php
namespace MediaFolders\Events;
⋮----
class AttachmentAddedToFolder extends Event
⋮----
/**
     * @var int
     */
private int $attachmentId;
⋮----
private int $folderId;
⋮----
private int $userId;
⋮----
/**
     * @param int $attachmentId
     * @param int $folderId
     * @param int $userId
     */
public function __construct(int $attachmentId, int $folderId, int $userId)
⋮----
parent::__construct();
⋮----
/**
     * @return int
     */
public function getAttachmentId(): int
⋮----
public function getFolderId(): int
⋮----
public function getUserId(): int
````

## File: src/Events/Event.php
````php
namespace MediaFolders\Events;
⋮----
abstract class Event
⋮----
/**
     * @var \DateTimeImmutable
     */
private \DateTimeImmutable $timestamp;
⋮----
public function __construct()
⋮----
$this->timestamp = new \DateTimeImmutable();
⋮----
/**
     * Get event timestamp.
     *
     * @return \DateTimeImmutable
     */
public function getTimestamp(): \DateTimeImmutable
````

## File: src/Events/FolderCreated.php
````php
namespace MediaFolders\Events;
⋮----
use MediaFolders\Models\Folder;
⋮----
class FolderCreated extends Event
⋮----
/**
     * @var Folder
     */
private Folder $folder;
⋮----
/**
     * @var int
     */
private int $userId;
⋮----
/**
     * @param Folder $folder
     * @param int $userId
     */
public function __construct(Folder $folder, int $userId)
⋮----
parent::__construct();
⋮----
/**
     * @return Folder
     */
public function getFolder(): Folder
⋮----
/**
     * @return int
     */
public function getUserId(): int
````

## File: src/Events/FolderDeleted.php
````php
namespace MediaFolders\Events;
⋮----
class FolderDeleted extends Event
⋮----
/**
     * @var int
     */
private int $folderId;
⋮----
private int $userId;
⋮----
/**
     * @param int $folderId
     * @param int $userId
     */
public function __construct(int $folderId, int $userId)
⋮----
parent::__construct();
⋮----
/**
     * @return int
     */
public function getFolderId(): int
⋮----
public function getUserId(): int
````

## File: src/Http/Contracts/RestRouterInterface.php
````php
namespace MediaFolders\Http\Contracts;
⋮----
interface RestRouterInterface
⋮----
/**
     * Register REST API routes.
     *
     * @return void
     */
public function register(): void;
````

## File: src/Http/RestRouter.php
````php
namespace MediaFolders\Http;
⋮----
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Http\Contracts\RestRouterInterface;
use WP_REST_Request;
use WP_REST_Response;
use WP_Error;
⋮----
class RestRouter implements RestRouterInterface
⋮----
/**
     * @var FolderRepositoryInterface
     */
private FolderRepositoryInterface $folders;
⋮----
/**
     * @var AttachmentRepositoryInterface
     */
private AttachmentRepositoryInterface $attachments;
⋮----
/**
     * @param FolderRepositoryInterface $folders
     * @param AttachmentRepositoryInterface $attachments
     */
public function __construct(
⋮----
/**
     * {@inheritDoc}
     */
public function register(): void
⋮----
/**
     * Get all folders.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
public function getFolders(WP_REST_Request $request)
⋮----
$folders = $this->folders->all();
⋮----
return new WP_Error('folder_error', $e->getMessage(), ['status' => 500]);
⋮----
/**
     * Get a specific folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
public function getFolder(WP_REST_Request $request)
⋮----
$folder = $this->folders->find((int) $request['id']);
⋮----
/**
     * Create a new folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
public function createFolder(WP_REST_Request $request)
⋮----
$folder = $this->folders->create([
⋮----
return new WP_Error('folder_creation_error', $e->getMessage(), ['status' => 500]);
⋮----
/**
     * Update a folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
public function updateFolder(WP_REST_Request $request)
⋮----
$updated = $this->folders->update((int) $request['id'], [
⋮----
return new WP_Error('folder_update_error', $e->getMessage(), ['status' => 500]);
⋮----
/**
     * Delete a folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
public function deleteFolder(WP_REST_Request $request)
⋮----
$deleted = $this->folders->delete((int) $request['id']);
⋮----
return new WP_Error('folder_deletion_error', $e->getMessage(), ['status' => 500]);
⋮----
/**
     * Get folder attachments.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
public function getFolderAttachments(WP_REST_Request $request)
⋮----
$attachments = $this->attachments->getByFolder((int) $request['id']);
⋮----
return new WP_Error('attachment_error', $e->getMessage(), ['status' => 500]);
⋮----
/**
     * Add attachment to folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
public function addAttachmentToFolder(WP_REST_Request $request)
⋮----
$success = $this->attachments->addToFolder(
⋮----
return new WP_Error('attachment_add_error', $e->getMessage(), ['status' => 500]);
⋮----
/**
     * Remove attachment from folder.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
public function removeAttachmentFromFolder(WP_REST_Request $request)
⋮----
$success = $this->attachments->removeFromFolder(
⋮----
return new WP_Error('attachment_remove_error', $e->getMessage(), ['status' => 500]);
⋮----
/**
     * Check if user has permission to manage folders.
     *
     * @return bool
     */
public function checkPermission(): bool
````

## File: src/Models/Attachment.php
````php
namespace MediaFolders\Models;
⋮----
class Attachment
⋮----
/**
     * @var int
     */
private int $id;
⋮----
/**
     * @var string
     */
private string $title;
⋮----
private string $url;
⋮----
private string $type;
⋮----
/**
     * @var array
     */
private array $meta;
⋮----
/**
     * @param array $data
     */
public function __construct(array $data)
⋮----
/**
     * @return int
     */
public function getId(): int
⋮----
/**
     * @return string
     */
public function getTitle(): string
⋮----
public function getUrl(): string
⋮----
public function getType(): string
⋮----
/**
     * @return array
     */
public function getMeta(): array
⋮----
/**
     * Convert attachment to array.
     *
     * @return array
     */
public function toArray(): array
````

## File: src/Models/Folder.php
````php
namespace MediaFolders\Models;
⋮----
class Folder
⋮----
/**
     * @var int
     */
private int $id;
⋮----
/**
     * @var string
     */
private string $name;
⋮----
private string $slug;
⋮----
/**
     * @var int|null
     */
private ?int $parentId;
⋮----
private string $createdAt;
⋮----
private string $updatedAt;
⋮----
/**
     * @param array $data
     */
public function __construct(array $data)
⋮----
/**
     * @return int
     */
public function getId(): int
⋮----
/**
     * @return string
     */
public function getName(): string
⋮----
public function getSlug(): string
⋮----
/**
     * @return int|null
     */
public function getParentId(): ?int
⋮----
public function getCreatedAt(): string
⋮----
public function getUpdatedAt(): string
⋮----
/**
     * Convert folder to array.
     *
     * @return array
     */
public function toArray(): array
````

## File: src/Providers/DatabaseServiceProvider.php
````php
namespace MediaFolders\Providers;
⋮----
use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Database\AttachmentRepository;
use MediaFolders\Database\CacheRepository;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use MediaFolders\Database\Contracts\CacheRepositoryInterface;
use MediaFolders\Database\Contracts\DatabaseManagerInterface;
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
use MediaFolders\Database\DatabaseManager;
use MediaFolders\Database\FolderRepository;
⋮----
class DatabaseServiceProvider implements ServiceProviderInterface
⋮----
/**
     * {@inheritDoc}
     */
public function register(Container $container): void
⋮----
// Register core database services
$container->singleton(DatabaseManagerInterface::class, function() use ($wpdb) {
⋮----
// Register repositories
$container->singleton(FolderRepositoryInterface::class, function() use ($wpdb) {
⋮----
$container->singleton(AttachmentRepositoryInterface::class, function() use ($wpdb) {
⋮----
$container->singleton(CacheRepositoryInterface::class, function() use ($wpdb) {
⋮----
public function boot(Container $container): void
⋮----
// Perform any necessary bootstrapping
````

## File: src/Providers/EventServiceProvider.php
````php
namespace MediaFolders\Providers;
⋮----
use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\EventDispatcherInterface;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Core\EventDispatcher;
use MediaFolders\Events\AttachmentAddedToFolder;
use MediaFolders\Events\FolderCreated;
use MediaFolders\Events\FolderDeleted;
⋮----
class EventServiceProvider implements ServiceProviderInterface
⋮----
/**
     * {@inheritDoc}
     */
public function register(Container $container): void
⋮----
$container->singleton(EventDispatcherInterface::class, EventDispatcher::class);
⋮----
public function boot(Container $container): void
⋮----
/** @var EventDispatcherInterface $dispatcher */
$dispatcher = $container->get(EventDispatcherInterface::class);
⋮----
// Register default listeners
$this->registerFolderListeners($dispatcher);
$this->registerAttachmentListeners($dispatcher);
⋮----
/**
     * Register folder-related event listeners.
     *
     * @param EventDispatcherInterface $dispatcher
     * @return void
     */
private function registerFolderListeners(EventDispatcherInterface $dispatcher): void
⋮----
// Log folder creation
$dispatcher->addListener(FolderCreated::class, function(FolderCreated $event) {
$folder = $event->getFolder();
$user = get_userdata($event->getUserId());
⋮----
$folder->getName(),
$folder->getId(),
⋮----
// Log folder deletion
$dispatcher->addListener(FolderDeleted::class, function(FolderDeleted $event) {
⋮----
$event->getFolderId(),
⋮----
/**
     * Register attachment-related event listeners.
     *
     * @param EventDispatcherInterface $dispatcher
     * @return void
     */
private function registerAttachmentListeners(EventDispatcherInterface $dispatcher): void
⋮----
// Log attachment additions to folders
$dispatcher->addListener(AttachmentAddedToFolder::class, function(AttachmentAddedToFolder $event) {
⋮----
$event->getAttachmentId(),
````

## File: src/Providers/HttpServiceProvider.php
````php
namespace MediaFolders\Providers;
⋮----
use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Http\Contracts\RestRouterInterface;
use MediaFolders\Http\RestRouter;
⋮----
class HttpServiceProvider implements ServiceProviderInterface
⋮----
/**
     * {@inheritDoc}
     */
public function register(Container $container): void
⋮----
$container->singleton(RestRouterInterface::class, RestRouter::class);
⋮----
public function boot(Container $container): void
⋮----
$router = $container->get(RestRouterInterface::class);
$router->register();
````

## File: src/Providers/MediaServiceProvider.php
````php
namespace MediaFolders\Providers;
⋮----
use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\MediaHandler;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use MediaFolders\Core\ImageIndexing\IndexProgress;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
⋮----
/**
 * Media Service Provider
 * 
 * @package MediaFolders\Providers
 * @author dpitchford1
 * @since 2.0.0
 * @created 2025-04-19 20:41:42
 */
class MediaServiceProvider implements ServiceProviderInterface
⋮----
/**
     * {@inheritDoc}
     */
public function register(Container $container): void
⋮----
// Register core media services
$container->singleton(MediaHandler::class, function($container) {
⋮----
$container->get(CacheInterface::class),
$container->get(AttachmentRepositoryInterface::class)
⋮----
// Register image indexing services
$container->singleton(ImageIndexer::class, function($container) {
⋮----
$container->singleton(IndexProgress::class, function() {
⋮----
public function boot(Container $container): void
⋮----
// Initialize image indexer
$indexer = $container->get(ImageIndexer::class);
$indexer->init();
⋮----
// Register hooks for media operations
⋮----
// Add admin notice for indexing progress
⋮----
$progress = $container->get(IndexProgress::class);
$percent = $progress->getPercentComplete();
````

## File: src/functions.php
````php
// Global functions for Media Folders plugin
⋮----
function media_folders_log($message) {
````

## File: tests/php/Unit/Core/Cache/DatabaseCacheTest.php
````php
namespace MediaFolders\Tests\Unit\Core\Cache;
⋮----
use MediaFolders\Core\Cache\DatabaseCache;
use PHPUnit\Framework\TestCase;
use wpdb;
⋮----
class DatabaseCacheTest extends TestCase
⋮----
private $wpdb;
private $cache;
⋮----
protected function setUp(): void
⋮----
parent::setUp();
⋮----
// Mock wpdb
$this->wpdb = $this->createMock(wpdb::class);
⋮----
// Create cache instance
⋮----
public function testGetReturnsNullWhenKeyNotFound(): void
⋮----
$this->wpdb->expects($this->once())
->method('get_row')
->willReturn(null);
⋮----
$result = $this->cache->get('non_existent_key');
⋮----
$this->assertNull($result);
⋮----
public function testGetReturnsValueWhenKeyExists(): void
⋮----
->willReturn($cacheRow);
⋮----
$result = $this->cache->get('existing_key');
⋮----
$this->assertEquals($expected, $result);
⋮----
public function testSetStoresValueInDatabase(): void
⋮----
->method('replace')
->with(
⋮----
'expiry' => $this->anything()
⋮----
->willReturn(1);
⋮----
$result = $this->cache->set($key, $value, $ttl);
⋮----
$this->assertTrue($result);
⋮----
public function testDeleteRemovesKeyFromDatabase(): void
⋮----
->method('delete')
⋮----
$result = $this->cache->delete($key);
⋮----
public function testRememberReturnsExistingValue(): void
⋮----
// Callback should not be called
⋮----
$this->fail('Callback should not be called when value exists');
⋮----
$result = $this->cache->remember($key, 3600, $callback);
⋮----
$this->assertEquals($existing, $result);
⋮----
public function testRememberStoresAndReturnsCallbackValue(): void
⋮----
// No existing value
⋮----
// Should store new value
⋮----
$result = $this->cache->remember($key, $ttl, function() use ($value) {
⋮----
$this->assertEquals($value, $result);
````

## File: tests/php/Unit/Core/ImageIndexing/ImageIndexerTest.php
````php
namespace MediaFolders\Tests\Unit\Core\ImageIndexing;
⋮----
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use MediaFolders\Database\Contracts\AttachmentRepositoryInterface;
use PHPUnit\Framework\TestCase;
⋮----
class ImageIndexerTest extends TestCase
⋮----
private $cache;
private $attachmentRepository;
private $indexer;
⋮----
protected function setUp(): void
⋮----
parent::setUp();
⋮----
// Create mocks
$this->cache = $this->createMock(CacheInterface::class);
$this->attachmentRepository = $this->createMock(AttachmentRepositoryInterface::class);
⋮----
// Create indexer instance
⋮----
public function testInitRegistersWordPressCronHook(): void
⋮----
// Setup expectations for WordPress functions
⋮----
$this->indexer->init();
⋮----
$this->assertTrue(
⋮----
public function testProcessBatchHandlesEmptyImageList(): void
⋮----
$wpdb = $this->createMock(wpdb::class);
⋮----
// Mock empty results
$wpdb->expects($this->once())
->method('get_results')
->willReturn([]);
⋮----
$this->indexer->processBatch();
⋮----
// Verify cache was not called
$this->cache->expects($this->never())
->method('set');
⋮----
public function testProcessBatchProcessesImages(): void
⋮----
// Mock image data
⋮----
->willReturn($images);
⋮----
// Expect cache to be called for each image
$this->cache->expects($this->once())
->method('set')
->with(
⋮----
$this->callback(function($value) {
⋮----
public function testProcessBatchUpdatesProgress(): void
⋮----
// Mock single image
⋮----
->willReturn([
⋮----
// Mock WordPress options
⋮----
\WP_Mock::userFunction('get_option', [
'args' => ['media_folders_index_progress', $this->anything()],
⋮----
\WP_Mock::userFunction('update_option', [
⋮----
$this->callback(function($value) use ($progress) {
````

## File: tests/php/Unit/Core/ImageIndexing/IndexProgressTest.php
````php
namespace MediaFolders\Tests\Unit\Core\ImageIndexing;
⋮----
use MediaFolders\Core\ImageIndexing\IndexProgress;
use PHPUnit\Framework\TestCase;
⋮----
class IndexProgressTest extends TestCase
⋮----
private $progress;
⋮----
protected function setUp(): void
⋮----
parent::setUp();
⋮----
public function testGetProgressReturnsDefaultValuesWhenNoOptionExists(): void
⋮----
\WP_Mock::userFunction('get_option', [
⋮----
$result = $this->progress->getProgress();
⋮----
$this->assertEquals([
⋮----
public function testUpdateProgressStoresNewValues(): void
⋮----
\WP_Mock::userFunction('update_option', [
⋮----
$result = $this->progress->updateProgress($data);
⋮----
$this->assertTrue($result);
⋮----
public function testGetPercentageCalculatesCorrectly(): void
⋮----
$percentage = $this->progress->getPercentage();
⋮----
$this->assertEquals(25, $percentage);
⋮----
public function testGetPercentageReturnsZeroWhenTotalIsZero(): void
⋮----
$this->assertEquals(0, $percentage);
⋮----
public function testIsCompleteReturnsTrueWhenAllProcessed(): void
⋮----
$result = $this->progress->isComplete();
````

## File: tests/php/Unit/Core/MediaHandlerTest.php
````php
namespace MediaFolders\Tests\Unit\Core;
⋮----
use MediaFolders\Core\MediaHandler;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use PHPUnit\Framework\TestCase;
⋮----
class MediaHandlerTest extends TestCase
⋮----
private $cache;
private $indexer;
private $handler;
⋮----
protected function setUp(): void
⋮----
parent::setUp();
⋮----
$this->cache = $this->createMock(CacheInterface::class);
$this->indexer = $this->createMock(ImageIndexer::class);
⋮----
public function testInitializesComponents(): void
⋮----
$this->indexer->expects($this->once())
->method('init');
⋮----
$this->handler->init();
⋮----
public function testHandleAttachmentUpload(): void
⋮----
$this->cache->expects($this->once())
->method('delete')
->with($this->stringContains('media_image_123'));
⋮----
$result = $this->handler->handleAttachmentUpload($attachment);
⋮----
$this->assertTrue($result);
⋮----
public function testHandleAttachmentDelete(): void
⋮----
$this->cache->expects($this->exactly(2))
⋮----
->withConsecutive(
[$this->stringContains('media_image_123')],
[$this->stringContains('media_folders_123')]
⋮----
$result = $this->handler->handleAttachmentDelete($attachmentId);
⋮----
public function testGetAttachmentMetadata(): void
⋮----
->method('remember')
->with(
$this->stringContains('media_image_123'),
⋮----
$this->callback(function($callback) {
⋮----
->willReturn($metadata);
⋮----
$result = $this->handler->getAttachmentMetadata($attachmentId);
⋮----
$this->assertEquals($metadata, $result);
⋮----
public function testRegisterHooksAddsAllRequiredWordPressHooks(): void
⋮----
$this->handler->registerHooks();
⋮----
$this->assertTrue(has_action('add_attachment') !== false);
$this->assertTrue(has_action('delete_attachment') !== false);
$this->assertTrue(has_filter('wp_get_attachment_metadata') !== false);
````

## File: tests/php/Unit/Database/FolderTest.php
````php
namespace MediaFolders\Tests\Unit\Database;
⋮----
use PHPUnit\Framework\TestCase;
use MediaFolders\Database\Folder;
⋮----
class FolderTest extends TestCase
⋮----
private $folder;
⋮----
protected function setUp(): void
⋮----
parent::setUp();
⋮----
public function test_create_folder()
⋮----
// Test folder creation
⋮----
$result = $this->folder->create($data);
$this->assertIsInt($result);
$this->assertGreaterThan(0, $result);
⋮----
public function test_get_folder()
⋮----
// Test retrieving a folder
$folder = $this->folder->get(1);
$this->assertIsArray($folder);
$this->assertArrayHasKey('name', $folder);
````

## File: tests/php/Unit/PluginTest.php
````php
namespace MediaFolders\Tests\Unit;
⋮----
use MediaFolders\Core\MediaHandler;
use MediaFolders\Core\Plugin;
use MediaFolders\Core\Cache\DatabaseCache;
use MediaFolders\Core\ImageIndexing\ImageIndexer;
use PHPUnit\Framework\TestCase;
⋮----
class PluginTest extends TestCase
⋮----
private $plugin;
⋮----
protected function setUp(): void
⋮----
parent::setUp();
⋮----
public function testBootInitializesComponents(): void
⋮----
$wpdb = $this->createMock(\wpdb::class);
⋮----
// Mock WordPress functions
\WP_Mock::userFunction('add_action', [
⋮----
\WP_Mock::userFunction('register_activation_hook', [
⋮----
\WP_Mock::userFunction('register_deactivation_hook', [
⋮----
$this->plugin->boot();
⋮----
// Verify service container has required services
$this->assertInstanceOf(
⋮----
$this->plugin->getContainer()->get(DatabaseCache::class)
⋮----
$this->plugin->getContainer()->get(ImageIndexer::class)
⋮----
$this->plugin->getContainer()->get(MediaHandler::class)
⋮----
public function testActivateCreatesRequiredTables(): void
⋮----
// Expect dbDelta to be called
\WP_Mock::userFunction('dbDelta', [
⋮----
'args' => [$this->stringContains('CREATE TABLE')]
⋮----
$this->plugin->activate();
⋮----
public function testDeactivateCleanupTables(): void
⋮----
$wpdb->expects($this->atLeastOnce())
->method('query')
->with($this->stringContains('DROP TABLE'));
⋮----
$this->plugin->deactivate();
````

## File: tests/bootstrap.php
````php
/**
 * PHPUnit bootstrap file
 *
 * @package MediaFolders
 */
⋮----
// Give access to tests_add_filter() function.
⋮----
/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
⋮----
// Start up the WP testing environment.
````

## File: build-plugin.sh
````bash
#!/bin/bash

# Create clean plugin directory
rm -rf dist/
mkdir -p dist/media-folders

# Copy required files
cp -r media-folders.php src/ includes/ dist/media-folders/

# Install production PHP dependencies
cd dist/media-folders
composer install --no-dev
cd ../../

# Build JavaScript
npm ci
npm run build

# Copy built assets
cp -r assets/build/ dist/media-folders/assets/

# Optional: Copy languages
cp -r languages/ dist/media-folders/languages/

# Create zip
cd dist
zip -r media-folders.zip media-folders/
````

## File: phpcs.xml.dist
````
<?xml version="1.0"?>
<ruleset name="WordPress Plugin Coding Standards">
    <description>A custom set of code standard rules for Media Folders.</description>

    <!-- What to scan -->
    <file>.</file>
    <exclude-pattern>/vendor/</exclude-pattern>
    <exclude-pattern>/node_modules/</exclude-pattern>
    <exclude-pattern>/tests/</exclude-pattern>

    <!-- How to scan -->
    <arg value="sp"/> <!-- Show sniff and progress -->
    <arg name="colors"/>
    <arg name="extensions" value="php"/>
    <arg name="parallel" value="8"/>

    <!-- Rules: WordPress Coding Standards -->
    <config name="minimum_supported_wp_version" value="6.5"/>

    <rule ref="WordPress-Core"/>
    <rule ref="WordPress-Docs"/>
    <rule ref="WordPress-Extra"/>

    <!-- Allow . in hook names -->
    <rule ref="WordPress.NamingConventions.ValidHookName">
        <properties>
            <property name="additionalWordDelimiters" value="."/>
        </properties>
    </rule>

    <!-- Verify that no WP functions are used which are deprecated or removed. -->
    <rule ref="WordPress.WP.DeprecatedFunctions"/>

    <!-- Verify that everything is properly escaped. -->
    <rule ref="WordPress.Security"/>

    <!-- Verify that all I18N text strings are used properly. -->
    <rule ref="WordPress.WP.I18n">
        <properties>
            <property name="text_domain" type="array">
                <element value="media-folders"/>
            </property>
        </properties>
    </rule>

    <!-- Allow short array syntax -->
    <rule ref="Generic.Arrays.DisallowShortArraySyntax.Found">
        <severity>0</severity>
    </rule>
    <rule ref="Generic.Arrays.DisallowLongArraySyntax.Found"/>
</ruleset>
````

## File: phpunit.xml.dist
````
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/9.3/phpunit.xsd"
         bootstrap="tests/bootstrap.php"
         colors="true"
         verbose="true">
    <coverage>
        <include>
            <directory suffix=".php">src</directory>
        </include>
        <exclude>
            <directory>vendor</directory>
            <directory>tests</directory>
        </exclude>
    </coverage>
    <testsuites>
        <testsuite name="Unit">
            <directory>tests/php/Unit</directory>
        </testsuite>
        <testsuite name="Integration">
            <directory>tests/php/Integration</directory>
        </testsuite>
    </testsuites>
    <php>
        <env name="WP_TESTS_DIR" value="./vendor/wp-phpunit/wp-phpunit/"/>
        <env name="WP_PHPUNIT__TESTS_CONFIG" value="tests/wp-config.php"/>
    </php>
</phpunit>
````

## File: readme.txt
````
=== Media Library Folders ===
Contributors: maxfoundry, AlanP57
Tags: media library folders, media library folders, organize media library
Requires at least: 4.0
Tested up to: 6.8
Stable tag: 8.3.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Easier file and folder management for WordPress Media Library for Galleries and Albums

== Description ==
[Media Library Folders for WordPress](https://www.maxgalleria.com/downloads/media-library-plus-pro/?utm_source=wordpress&utm_medium=mlfp&utm_content=first&utm_campaign=firstword) creates actual folders in your WordPress Media Library:

* Actual folders make it easier to [organize your WordPress media library](https://maxgalleria.com/organized-wordpress-media-library-folders/?utm_source=wordpress&utm_medium=mlfp&utm_content=organize&utm_campaign=organize) while reducing server burden.
* [Add and build new Media library folders](https://maxgalleria.com/add-organize-media-library-folders/) to label and organize as you wish instead of just month/date.
* [Move, copy, rename and delete files and folders](https://maxgalleria.com/wordpress-media-folders-move-rename-delete-folders/) with a nice drag and drop interface
* Regenerate thumbnails.
* SEO Images to specify ALT and TITLE attributes when uploading.
* Sync folders/files when moving or uploading a folder via FTP.
* Create a [MaxGalleria](https://maxgalleria.com/) gallery.
* Block direct access for selected media library files

MLF adds to and works with the functionality of WordPress Media Library. It does not replace it.

> **Just what I was looking for!** I use this on ALL my WordPress sites. I don’t know why you wouldn’t. It not only allows you to organize your image files in your WP site, but it also creates logical URL links to your files based on the folders you create and the name of the image file. So great! No more random numbers for image URL’s.

> **Great for organization and better media!** WordPress’s default media folders didn’t work for us on a project with strict requirements on organizing their uploaded files. We had trouble finding a low-impact solution that fulfilled all requirements.

> Media Library Plus solved all our issues, and we’ve been using it on a major site with 11 custom post types, hundreds of media files, and tons of other plugins/customizations — zero issues and exactly what we need!

> MLP performs beautifully and provides great media management features and functionality! To make matters even better support is extremely fast and responsive to inquiries. Great stuff!

**Block Direct Access**

> Media Library Folders now includes Block Direct Access, our pro version feature that prevents unauthorized downloads of proprietary media files:
* Protect unlimited media files
* Customized no access page
* Block Google Search from indexing your media files
* Prevent file hotlinking
* Restrict media library access
* Disable copy and right click
* Generate and limit private URLs
* Restrict access to private URLs by IP Address

With these features, site administrators can now block access to viewing or downloading files within the media library. To activate, go to the Block Direct Access tab in Media Library Folders Pro Settings and check the 'Activate Block Direct Access' option and click the Update Settings button. This create a folder in the media library, 'protected-content' For site that are using Apache, this action will also updates the sites .thaccess file to make the 'protected-content' folder inaccessible to internet users.

For those using Nginx or IIS (Windows Server), making the 'protected-content' inaccessible requires manually update the site's configuration:

For Nginx, add these rewrite rules on your server configuration:

rewrite wp-content/uploads/protected-content(\/[A-Za-z0-9_@.\/&+-]+)+\.([A-Za-z0-9_@.\/&+-]+)$ "/index.php?mlfp_bdp=$1&block_access=true" last;
rewrite private/([a-zA-Z0-9-_.]+)$ "/index.php?mlfp_bdp=$1" last;

For IIS, edit or create a web.config file in the root folder of your Wordpress site and add these rules:

<?xml version="1.0"?>
<configuration>
  <system.webServer>
    <rewrite>
      <rules>
        <!-- Block Direct Access Start -->
        <rule name="Imported Rule 1" stopProcessing="true">
          <match url="private/([a-zA-Z0-9]+)$" ignoreCase="false"/>
          <action type="Rewrite" url="index.php?mlfp_bdp={R:1}" appendQueryString="false"/>
        </rule>
        <rule name="Imported Rule 2" stopProcessing="true">
          <match url="wp-content/uploads/protected-content(\/[A-Za-z0-9_@.\/&amp;+-]+)+\.([A-Za-z0-9_@.\/&amp;+-]+)$" ignoreCase="false"/>
          <action type="Rewrite" url="index.php?mlfp_bdp={R:1}&amp;block_access=true&amp;file_type={R:2}" appendQueryString="true"/>
        </rule>
        <!-- Block Direct Access End -->
      </rules>
    </rewrite>
  </system.webServer>
  <system.web>
    <compilation debug="true"/>
  </system.web>
</configuration>
    

= Media Library Folders Pro for WordPress =

[Media Library Folders Pro for WordPress](https://www.maxgalleria.com/downloads/media-library-plus-pro/?utm_source=wordpress&utm_medium=mlfp&utm_content=mlpp&utm_campaign=repo) lets you:

* Select and add images to your posts and pages from the editor through MLFs integration
* Organize your [media library folders](https://maxgalleria.com/downloads/media-library-plus-pro/?utm_source=wordpress&utm_medium=mlf&utm_content=mlf&utm_campaign=repo) with categories
* [Enhanced Media Library and Media Library Folders Pro categories](https://maxgalleria.com/using-wordpress-media-categories/) are interchangeable
* Create new MaxGalleria and NextGEN Galleries directly from your MLF folders
* Supports Advanced Custom Fields
* Use File Name View Mode for finding images in very large folders
* Add images to a WooCommerce product gallery
* Multi site supported

**Using Media Library Folders for WordPress**

To get started download and install the Media Library Folders for WordPress plugin. Once Media Library Folders for WordPress is activated you will see Media Library Folders for WordPress in the WordPress dashboard menu.  And you are ready to go watch our super helpful [intro video](https://maxgalleria.com/media-library-plus/?utm_source=repo&utm_medium=video&utm_content=video&utm_campaign=video)!

When you click on Media Library Folders for WordPress it displays the contents of the uploads folder where you will see the level folders such as ‘2016’, ‘2015’.
We assume your site has the WordPress Media Library setting option ‘Organize my uploads into month- and year-based folders’ selected. To view the contents of a folder, click on the folder image. To navigate up in the folder structure click on the links in the Location: breadcrumb string.

Clicking an image will take you to the image attachment details page. If you close that page when you are done you will be in the old media library. Instead click your browser’s go back button twice and you will be taken back to the folder page.

We also have an article on [How to Sync your WordPress Media Library with FTP Folders](https://maxgalleria.com/sync-wordpress-media-library-ftp-folders/) if you have a large number of images.

**Button Bar**

The Button Bar provides the main functionality to manage folders and files and is located below the breadcrumbs navigation. When the mouse hovers over a button its function is displayed in the message area below the button bar.

File/Folder Organizing Buttons

Clicking the Add File button displays the upload box.

Here you can select a single file to upload one or more files by dragging the image from the file manager and dropping them in the upload box. Uploaded files will be added to the current folder.

New Folder – Allows you to create a new folder in the current directory.
Move/Copy Toggle - Set the mode for drag and dropping of files. Individual files can be move or copied to another folder by dragging and dropping the file into the desired folder. Multi files can be selected by click each file's checkbox. Links in post and pages and feature image links are automatically updated when files are moved.
Rename – Rename a file in the current directory. Folders cannot be renamed.
Delete – The delete function let you delete select files. To delete a folder, Right click over a folder and click the menu the appears. A folder must be empty before it can be deleted.
Select/Unselect – Select or unselect all files in the current directory.
Sync - Checks the folder on the server for any files not listed in the Media Library and adds them to the Library.
Sort by Date/Sort by Name – changes the display order of items in the current directory; either by name or by date.
Search – Users can search for a file or folder by typing in the name of the file in the search box and pressing Enter.

The search results page will display files and/or folders that are similar to the search text. You can click on an image or file to go to its folder or click on a folder view its contents.

In the event that you need to rescan your database's image and folder data the Media Library Folders for WordPress Reset plugin has been included. To use deactivate Media Library Folders for WordPress, activate Media Library Folders for WordPress Reset and select Media Library Folders for WordPress Reset->Reset Database to erase the folder data. Then deactivate Media Library Folders for WordPress Reset and reactivate Media Library Folders for WordPress. MLF will perform a fresh scan of your database.

**Regenerate Thumbnails**

To start select one or more images from the main dashboard and click the 'Regenerate Thumbnails' button.  To regenerate all the thumbnails on your site go the the Regenerate Thumbnails page of MLP and click the 'Regenerate Thumbnails' button.  MLF will then process all of the images with an process indicator as it works on your job.

**Image SEO**

When Image SEO is enabled Media Library Folders for WordPress automatically adds ALT and Title attributes with the default settings defined below to all your images as they are uploaded. You can easily override the Image SEO default settings when you are uploading new images.


**Working with images and galleries after initial setup**

Media Library Folders for WordPress is a stand along plugin that contains an integration with MaxGalleria. With MLF you can add your images to MaxGalleria with a click of a button.



== Screenshots ==

1. Media Library Folders for WordPress page
2. Clicking the Add New button displays the upload box
3. The Search results page


== Installation ==

For automatic installation:

1. Login to your website and go to the Plugins section of your admin panel.
2. Click the Add New button.
3. Under Install Plugins, click the Upload link.
4. Select the plugin zip file from your computer then click the Install Now button.
5. You should see a message stating that the plugin was installed successfully.
6. Click the Activate Plugin link.

For manual installation:

1. You should have access to the server where WordPress is installed. If you don't, see your system administrator.
2. Copy the plugin zip file up to your server and unzip it somewhere on the file system.
3. Copy the "media-library-extended" folder into the /wp-content/plugins directory of your WordPress installation.
4. Login to your website and go to the Plugins section of your admin panel.
5. Look for "Media Library Folders for WordPress" and click Activate.

== Frequently Asked Questions ==

= Folder Tree Not Loading =

Users who report this issue can usually fix it by running the Media Library Folders Reset plugin that comes with Media Library Folders.

1. First make sure you have installed the latest version of Media Library Folders.
2. Deactivate Media Library Folders and activate Media Library Folders Reset and run the Reset Database option from the Media Library Folders Reset sub menu in the dashboard.
3. After that, reactivate Media Library Folders. It will do a fresh scan of your media library database and no changes will be made to the files or folders on your site.

= How to Unhide a Hidden Folder =

1. Go to the hidden folder via your cPanel or FTP and remove the file ‘mlpp-hidden’.
2. In the Media Library Folders Menu, click the Check for New folders link. This will add the folder back into Media Library Folders
3. Visit the unhidden folder in Media Library Folders and click the Sync button to add contents of the folder. Before doing this, check to see that there are no thumbnail images in the current folder since these will be regenerated automatically; these usually have file names such as image-name-150×150.jpg, etc.
4. Repeat step 3 for each sub folder.

= Folders and images added to the site by FTP are not showing up in Media Library Folders =

Media Library Folders does not work like the file manager on your computer. It only display images and folders that have been added to the Media Library database. To display new folders that have not been added through the Media Library Folders you can click the Check for new folders option in the  Media Library Folders submenu in the Wordpress Dashboard. If you allow Wordpress to store images by year and month folders, then you should click the option once each month to add these auto-generated folders.

To add images that were upload to the site via the cPanel or by FTP, navigate to the folder containing the images in  Media Library Folders and click the Sync button. This will scan the folder looking images not currently found in the Media Library for that folder. The Sync function only scans the current folder. If there are subfolders, you will need to individually sync them.

= Folders Loads Indefinitely =

This happens when a parent folder is missing from the folder data. To fix this you will need to perform a reset of the Media Library Folders database. To do this, deactivate Media Library Folders and activate Media Library Folders Reset and select the Reset Database option. Once the reset has completed, reactivate Media Library Folders and it will do a fresh scan of the Media Library data.

= Unable to Insert files from Media Library Folders into Posts or Pages =

For inserting images and files into posts and pages you will have to use the existing Media Library. The ability to insert items from the Media Library Folders user interface is only available in [Media Library Folders Pro](https://www.maxgalleria.com/downloads/media-library-plus-pro/?utm_source=wordpress&utm_medium=mlfp&utm_content=mlpp&utm_campaign=repo). This does not mean you cannot insert files added to Media Library Folders into any Wordpress posts or pages. Media Library Folders adds a folder user interface and file operations to the existing media library and it does not add a second media library. Since all the images are in the same media library there is no obstacle to inserting them anywhere Wordpress allows media files to be inserted. There is just no folder tree available in the media library insert window for locating images in a particular folder. We chose to include the folder tree for inserting images in posts and page in the Pro version along with other features in order to fund the cost of providing free technical support and continued development of the plugin.

= Unable to Update Media Library Folders Reset =

Media Library Folders Reset is maintenance and diagnostic plugin that is included with Media Library Folders. It automatically updates when Media Library Folders is updated. There is no need to updated it  separately. Users should leave the reset plugin deactivated until it is needed in order to avoid accidentally deleting your site's folder data.

= Images Not Found After Changing the Location of Uploads Folder =

If you change the location of the uploads folder, your existing files and images will not be moved to the new location. You will need to delete them from media library and upload them again. Also you will need to perform a reset of the Media Library Folders database. To do this, deactivate Media Library Folders and activate Media Library Folders Reset and select the Reset Database option. Once the reset has completed, reactivate Media Library Folders and it will do a fresh scan of the Media Library data.

= Difficulties Uploading or Dragging and Dropping a Large Number of Files =

Limitations on web server processing time may cause dragging and dropping a large number of files to fail. An error is generated when it takes to longer then 30 seconds to move, copy or upload files. This time limitation can be increased by changing the max_execution_time setting in your site's php.ini file.

= How to Delete a Folder? =

To delete a folder, right click (Ctrl-click with Macs) on a folder. A popup menu will appear with the options, 'Delete this folder?' and 'Hide this folder?'. Click the delete option.

= Fatal error: Maximum execution time exceeded =

The Maximum execution time error takes place when moving, syncing or uploading too many files at one time. The web site’s server has a setting for how long it can be busy with a task. Depending on your server, size of files and the transmission speed of your internet, you may need to reduce the number of files you upload or move at one time.

It is possible to change the maximum execution time either with a plugin such as WP Maximum Execution Time Exceeded or by editing your site’s .htaccess file and adding this line:

php_value max_execution_time 300

Which will raise the maximum execution time to five minutes.

= How to Upload Multiple Files =

Users can upload multiple files by using drag and drop. When the Add Files button is click it revels the file upload area either single or multiple files can be highlight can be dragged from you computer’s file manager and dropped into the file uploads areas.

= Cannot Rename or Move a Folder =

Because most images and files in the media library have corresponding links embedded in site’s posts and pages, Media Library Folders does not allow folders to be rename or moved in order to prevent breaking these links. Rather, to rename or move a folder, one needs to create a new folder and move the files from the old folder to the new. During the move process, Media Library Folders will scan the sites standard posts and pages for any links matching the old address of the images or files and update them to the new address.

== Changelog ==
= 8.3.2 =
* Updated readme.txt for block direct access 
* Added instructions for uninstalling the plugin
* Tested with Wordpress 6.8

= 8.3.1 =
* Updated setting functions to allow updates only by administrators
* Fixed issue with removing blocked IPs

= 8.3.0 =
* Added fw-backup to list of folders to hide
* Removed code to allow uploads folder using a symlink that was causing new folders to be created in uploads.

= 8.2.9 =
* Added code to create_new_folder() to allow uploads folder using a symlink
* Searches for existing folders now converts file and folders names to lower case
* Added code to improve generating file paths for multi sites

= 8.2.8 =
* Changed all links using 'http' to 'https'

= 8.2.7 =
* Fixed issue with creating new folders

= 8.2.6 =
* Tested with Wordpress 6.7

= 8.2.5 =
* Add code to check for null array in when updating URLs in posts and pages created with Elementor

= 8.2.4 =
* Additional security enhancements added

= 8.2.3 =
* Security enhancements added

= 8.2.2 =
* Tested with WordPress 6.6

= 8.2.1 =
* Updated the get_parents function
* added acymailing to list of folders to hide
* Added security enhancements

= 8.2.0 =
* Updated the Upgrade to Pro page
* Added support for AVIF image files
* Tested with Wordpress 6.5

= 8.1.9 =
* Changed add_new_folder_parent() to a public function
* Added code to prevent directory traversal exploits
* Fixed issue with display folder contents after deleting a folder

= 8.1.8 =
* Added code to AJAX functions and numeric parameters used in SQL queries for improved security
* Removed unused functions

= 8.1.7 =
* Added code to ensure the parent_folder parameter in the create_new_folder function is always an integer

= 8.1.6 =
* Fixed issue with get_file_thumbnail() function
* Fixed issue with moving images when block direct access is off

= 8.1.5 =
* Tested with PHP 8.2 and Wordpress 6.4
* CSS fixes to library page
* Updated the upgrade to pro page

= 8.1.4 =
* Fixed SQL issue affecting multisite installations

= 8.1.3 =
* Fixed issue with SVG files deleted when regenerating thumbnail images
 
= 8.1.2 =
* Fixed issue with copying files

= 8.1.1 =
* Fixed issues generating warnings in PHP 8.2

= 8.1.0 =
* Added capability to block direct access to media files

= 8.0.7 =
* Tested with WordPress 6.2.2

= 8.0.6 =
* Added setting to skip WEBP files when syncing

= 8.0.5 =
* Added wpcf7_uploads to list of folders to hide
* Modified the upload folder data used when checking for new folders
* Updated the Upgrade to Pro page

= 8.0.4 =
* Renamed label for fontawesome to fix problem loading icons when older versions of fontawesome are in use on a site

= 8.0.3 =
* Tested with Wordpress 6.1

= 8.0.2 =
* Fixed links on pages with a single tab

= 8.0.1 =
* Updated upgrade to pro images
* Improved mobile CSS
* Fixed issue with moving files to the uploads folder

= 8.0.0 =
* Implemented new user interface
* Added optional postmeta database index which is available in the plugin settings

= 7.1.2 =
* Added code to use a nonce when running the folder data reset process for better security
* Updated the folder data reset instructions

= 7.1.1 =
* Tested with WordPress 6.0
* Removed debugging code

= 7.1.0 =
* Added code to remove dashes from alt text file names
* Added strict checking to array search when updating customzer settings 
* Added code to sanitize input and output
* Fixed issue with adding images in the uploads folder when initializing the plugin

= 7.0.8 =
* Fixed issue with scanning unreadable folders

= 7.0.7 =
* Added function to remove hidden files when deleting a folder

= 7.0.4 =
* Fixed issue with deleting attachment posts

= 7.0.3 =
* Modified the size and offset of the drag and drop ghost image

= 7.0.2 =
* Renamed Sort by Name to Sort by Title as the sorting is actually done on the attachment title field
* Tested with WP 5.8

= 7.0.0 =
* Updated the Upgrade to Pro page

= 6.1.5 =
* Added warning that folder contents will be removed from the database when a folder is hidden
* Fixed warning about missing 'now' variable
* Added a search button
* Removed object response warning
* Added function to remove existing thumbnail images when thumbnails are regenerated 

= 6.1.3 =
* Updated the Upgrade to Pro page
* Added review notice
* Added code to set the number of files to display on the Media Library Folders page

= 6.1.2 =
* Updated the jQuery functions for Wordpress 5.7
* Updated jsTree to version 3.3.11
* Added code to prevent the update of the Media Library Folders Reset plugin (the plugin is automatically update when Media Library Folders is updated)

= 6.1.1 =
* Added Javascript code to prevent some functions from trigging twice.
* Fixed issue with images appearing too far to the left on wide desktop screens

= 6.1.0 =
* Removed depreciated jquery-ui library files that was conflicting with current version of jquery

= 6.0.7 =
* Set the limit to the number of files that can be displayed from a folder to 500 to prevent memory overflow errors when viewing a folder containing thousands of files
* Removed code to float the folder tree and added scroll bars to the folder tree panel and to the folder contents section
* Set a fixed height for images displayed on the Media Library Folders page

= 6.0.6 =
* Added function call to ensure jQuery is loaded

= 6.0.5 =
* Added PHP_OS and upload directory information to the System Information display
* Added code to fix slashes when getting the absolute path when on a Windows server
* Added a blank index.php file for security

= 6.0.4 =
* Added code to prevent hiding or deleting the uploads folder
* Added code to handle the mgmlp_ajax is not defined issue that occurs on some multisite installions 

= 6.0.3 =
* Added request for feature suggestions

= 6.0.2 =
* Added code to load the jquery-migrate plugin which is not loaded by Wordpress 5.5 

= 6.0.0 =
* Tested with WordPress 5.5.0
* Modified image thumbnails HTML

= 5.2.4 =
* Fixed issue with moving or copying scaled images.
* Fixed issue with exif_read_data()

= 5.2.2 =
* Fixed issue with media library search
* Fixed issue with moving scales images

= 5.2.1 =
* Added code to read exif data for jpeg files

= 5.2.0 =
* Fixed issue with searching for folders with a null ID
* Added code to prevent the adding of invalid files when syncing
* Added test for destination folder when uploading a file

= 5.1.9 =
* Fixed issue with adding duplicate images when syncing scaled images 
* Added noscript warning
* Update PHP version test/notice to PHP 7.2

= 5.1.8 =
* Remove engine type from SQL used for creating the folder table

= 5.1.7 =
* Added wp-content and uploads paths to the support page, system information tab
* Added test for existing parent folder record 
* Added check for empty file name when uploading
* Changed the css file handle for jstree to jstree-style

= 5.1.6 =
* Added Dutch translation to Media Library Folders Reset
* Added code to insure removal of files deleted through media library folders pro

= 5.1.4 =
* Enabled localization (translation) of text in the Media Library Folders Reset plugin

= 5.1.3 =
* Added ability to close MLFP page popups
* Added setting to display scaling feature added in Wordpress 5.3

= 5.1.1 =
* Added the optional constant FS_CHMOD_DIR for setting the permission set for new folders
* Added code to check for current folder id
* Fixed issue with deleting folders

= 5.1.0 =
* Fixed issue with missing alt text when renaming an image

= 5.0.9 =
* Added code to update links in Themify Builder and Beaver Builder posts and pages. Note, when links have been updated in Beaver Builder, it is necessary to open a page or post containing updated links in the editor and resave it for the change to take effect  
* Updated frequently asked questions
* Added code to update links in WP Pagebuilder

= 5.0.8 =
* Added code to update links in SiteOrigin Page Builder and Beaver Builder posts and pages. Note, when links have been updated in Beaver Builder, it is necessary to open a page or post containing updated links in the editor and resave it for the change to take effect  
* Updated the Dutch translation files

= 5.0.7 =
* Removed the file extension from image SEO file names
* Fixed issue with displaying changes to image SEO settings

= 5.0.4 =
* Improved updating of links for Elementor background images

= 5.0.3 =
* Added code to prevent activation is Media Library Folders Pro is already activated
* Fixed issue with dragging blocks in the Gutenburg editor
* Replace relative paths with absolute paths for opening include files

= 5.0.2 =
* Added code to allow unfiltered uploads

= 5.0.0 =
* Removed PHP notice text appearing on some sites  

= 4.3.9 =
* Fixed conflict with other plugins using pluggable.php 

= 4.3.8 =
* Added security enhancements

= 4.3.7 =
* Add code to check for IIS when generating image metadata

= 4.3.5 = 
* Added code to check for non existent folder parent as suggested by Christian

= 4.3.4 =
* Add code to test for thumbnail files before moving them 
* Tested with Wordpress 5.0.2
* Added themify to the list of folders to automatically hide 

= 4.3.3 =
* Change the folder tree left node image
* Removed empty leaf nodes from the folder tree
* Updated list of folders to skip

= 4.3.1 =
* Added check for wp-all-import when loading CSS and Javascript files

= 4.3.0 =
* Modified the sorting order of files and folders to be case insensitive

= 4.2.6 =
* Updated the Upgrade to Pro page

= 4.2.5 =
* Added check for thumbnail size data during move operation
* Localized for translation text display via Java Script
* Update the Dutch translation
* Updated the Upgrade to Pro page

= 4.2.4 =
* Updated the list of folders to skip when scanning or syncing the uploads directory

= 4.2.3 =
* Modified how the move and rename functions handle thumbnail images

= 4.2.1 =
* Fixed missing closing a tag in on the support page
* Added Spanish translation
* Improved code to detect when the plugin is running on IIS/Windows
* Fixed javascript issue affecting the Edge browser
* Fxied issue causing sync, move and copy to fail on sites running with IIS

= 4.2.0 =
* Added multi select by holding checking a second item while holding down the shift key.
* Improved the copy and move function to avoid triggering a server timeout error
* Added check for mime type when files are uploaded

= 4.1.9 =
* Modified the sync function add files without triggering a server timeout error
* Replaced timer function for regularly checking for new folders  

= 4.1.6 =
* Fixed issue with sync adding .htaccess to the media library
* Added troubleshooting tips to support page

= 4.1.5 =
* Fixed Locatization issues
* Added Russian translation
* Fixes to the CSS

= 4.1.4 =
* Added Dutch translation

= 4.1.1 =
* Fixed problem with undefined file name issue that some users were reporting

= 4.0.9 =
* Added missing progress bar Javascript library

= 4.0.8 =
* Fixed issue with adding the SEO file title when Image SEO is turned on

= 4.0.7 =
* Added define that turns off MLFP diagnostic messages, add define('HIDE_WRITELOG_MESSAGES', true); to the wp-config.php file to activate 
* Added support for Wordpress PDF preview images 
* Added 'state' to jstree settings to force the tree to open after refresh

= 4.0.5 =
* Added CSS to improve the rendering of the folder tree.

= 4.0.4 =
* Added CSS to fix the Move/Copy button that was not displaying in sites using a language other than English or French 

= 4.0.3 =
* Removed dashes and file extention for file titles

= 4.0.1 =
* Added Javascript code to increase the height file container when the folder tree has a greater height

= 4.0.0 =
* Added new UI

= 3.4.5 =
* Fixed issue with string/array conversion for adding a body class

= 3.4.3 =
* Added French translation

= 3.4.2 =
* Modified move/copy process to process files incrementally rather than all at once.

= 3.4.1 =
* Allowing uppercase characters, dash and underscore in filenames and update links when a file is renamed

= 3.3.8 =
* Added link to page to fix common issues

= 3.3.7 =
* Stopped the deleting of images that are remove from the media library when a folder is hidden
* Fixed conflict with Enhanced Media Library settings tab
* Fixed issue with 'http' in attachment file paths

= 3.3.5 =
* Fixed table prefixed used when update attachment links

= 3.3.4 =
* Fixed bug preventing the use of the correct link to the attachment edit page

= 3.3.3 =
* Restored the click that allowed viewing of an attachment's media page
* Because MLF no longer does complete page refreshes, view of an attachment's media page will be done is a separate browser tab
* Fix problem with the redefining of 'clearfix' that was causing the folder contents to appear at the bottom of the page.

= 3.3.2 =
* Remove unneeded callback functions causing errors

= 3.3.1 =
* Added code to update attachment links in posts and pages
* Refresh file and folder data without a page refresh

= 3.3.0 =
* Fixed bug allowing deletion of folders that are not empty
* Replace home_url() function with site_url()

= 3.2.9 =
* Changed the file and folder permissions used for adding files and folders
* Changed plugin name from Media LIbrary Plus to Media Library Folders

= 3.2.8 =
* Added code to skip Uncode theme custom thumbnails images

= 3.2.7 =
* Added the code to hide folders and to skip the scanning of non image folders

= 3.2.5 =
* Updated the Upgrade to Pro page

= 3.2.4 =
* Fixed regenerate_thumbs_cap issue found by nosilver4u

= 3.2.3 =
* Fixed WP media library version check
* test for single and double quotes in new folder names
* Remove the fix folders helper plugin
* Adjusted the timing of the review notice

= 3.2.2 =
* Added code to remove extra slashes that may be added on Windows servers

= 3.2.1 =
* Tested on Wordpress 4.7.1

= 3.2.0 =
* Added test for missing backslash

= 3.1.9 =
* Fixed issue with adding an extra slash when creating a new folder

= 3.1.8 =
* Tested with Wordpress 4.7

= 3.1.7 =
* Fixed the issue with invalid folder parent IDs

= 3.1.6 =
* added missing upload destination folder

= 3.1.5 =
* Added holiday greetings

= 3.1.4 =
* Added new file processing code

= 3.0.12 =
* Fixed issue will adding new folders to MLP

= 3.0.11 =
* Added code to handle URLs for multi sites

= 3.0.10 =
* Added code to test for and fix bad URLs in the Media Library

= 3.0.9 =
* Added code for adding attachment info for better SEO Images

= 3.0.8 =
* Added code for regenerating media library thumbnails

= 3.0.7 =
* Added support link and email to the MLP page

= 3.0.6 =
* Fixed problem deleting a folder (for MLPP)

= 3.0.5 =
* Added code to prevent folder deletion when the folder is not empty

= 3.0.4 =
* Added folder navigation and drag and drop copy and move

= 3.0.3 =
* Added second method to get the absolute path
* Added drag and drop for moving files.

= 3.0.1 =
* Added upgrade to pro page

= 3.0.0 =
* Removed code to update attachment URLs

= 2.37 =
* Fixed MLP-reset version number

= 2.36 =
* Modified to work with Wordpress 4.5.1

= 2.35 =
* CSS modified to work with Wordpress 4.5

= 2.34 =
* Modified the code to allow the deletion of folder data even if the folder does not exist

= 2.33 =
* Made the stand alone version of MLP compatible with Maxgalleria

= 2.32 =
* Removed Maxgallery promo on MLP page
* Updated MLP page promo

= 2.31 =
* Changed database engine used for creating the folders table to MyISAM

= 2.3 =
* Added folder sync function to scan and update the database with new files and folders found on the server
* Fix problem with incorrect path to images in the new srcset parameter

= 1.04 =
* Included the Media Library Folders reset plugin
* Placed Media Library Folders in its own menu to allow other plugins to add submenus to the Media menu

= 1.03 =
* Add support for user defined uploads folder
* Added code to handle attachment_id in attachement URLs

= 1.02 =
* Added facebook like and share buttons
* Added support for muilt site network activation
* Added code to update theme customizer data if a file used by the customizer is moved.

= 1.01 =
* Revisions to the readme file and banner image
* Added scan for folders in uploads directory during initial scan on plugin activation
* Added rating request notice

= 1.0 =
* Initial version of the Media Library Folders
````

## File: TESTING.md
````markdown
# Manual Testing Steps

## Installation
1. Download/clone the plugin to wp-content/plugins/media-folders
2. Run: composer install
3. Activate plugin in WordPress admin
4. Verify no errors in error log
5. Check tables created in database

## Media Library Testing
1. Upload new image
2. Check image appears in Media Library
3. Verify metadata is cached
4. Check image indexing starts

## Cache Testing
1. Upload multiple images
2. Check database cache table
3. Verify cache expiry works
4. Test cache clearing

## Performance Testing
1. Monitor query count with Query Monitor plugin
2. Check memory usage
3. Verify background indexing impact
````

## File: src/Admin/AdminPage.php
````php
namespace MediaFolders\Admin;
⋮----
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
⋮----
class AdminPage
⋮----
/**
     * @var string
     */
⋮----
/**
     * @var FolderRepositoryInterface
     */
private FolderRepositoryInterface $folders;
⋮----
/**
     * @param FolderRepositoryInterface $folders
     */
public function __construct(FolderRepositoryInterface $folders)
⋮----
/**
     * Initialize admin page.
     *
     * @return void
     */
public function init(): void
⋮----
/**
     * Register the menu page.
     *
     * @return void
     */
public function registerMenuPage(): void
⋮----
/**
     * Enqueue admin assets.
     *
     * @param string $hook
     * @return void
     */
public function enqueueAssets(string $hook): void
⋮----
if (!$this->isMediaFoldersPage($hook)) {
⋮----
$this->getAssetUrl('css/admin.css'),
⋮----
$this->getAssetUrl('js/admin.js'),
⋮----
/**
     * Render the admin page.
     *
     * @return void
     */
public function renderPage(): void
⋮----
/**
     * Check if current page is media folders page.
     *
     * @param string $hook
     * @return bool
     */
private function isMediaFoldersPage(string $hook): bool
⋮----
/**
     * Get asset URL.
     *
     * @param string $path
     * @return string
     */
private function getAssetUrl(string $path): string
⋮----
// For JS files, always look in build directory
⋮----
// For CSS files, check if built version exists, otherwise use assets
````

## File: src/Core/Plugin.php
````php
namespace MediaFolders\Core;
⋮----
use MediaFolders\Providers\MediaServiceProvider;
use MediaFolders\Core\Contracts\CacheInterface;
use MediaFolders\Core\Cache\DatabaseCache;
⋮----
/**
 * Main Plugin Class
 * 
 * @package MediaFolders\Core
 * @author dpitchford1 
 * @since 2.0.0
 * @updated 2025-04-19 20:41:42
 */
class Plugin
⋮----
private Container $container;
⋮----
public function __construct()
⋮----
/**
     * Boot the plugin.
     *
     * @return void
     */
public function boot(): void
⋮----
$this->registerServices();
$this->registerHooks();
⋮----
/**
     * Register services with the container.
     *
     * @return void
     */
private function registerServices(): void
⋮----
// Register cache implementation
$this->container->singleton(CacheInterface::class, function() {
⋮----
// Register service providers
⋮----
// ... other providers
⋮----
$instance = new $provider();
$instance->register($this->container);
$instance->boot($this->container);
⋮----
/**
     * Register WordPress hooks.
     *
     * @return void
     */
private function registerHooks(): void
⋮----
// Register activation hook
⋮----
// Register deactivation hook
⋮----
// Initialize admin if in admin context
⋮----
// Schedule cleanup of expired cache entries
⋮----
$wpdb->query(
⋮----
/**
     * Plugin activation handler.
     *
     * @return void
     */
public function activate(): void
⋮----
// Version check
⋮----
// Create/update database tables
$this->container->get(DatabaseManager::class)->installTables();
⋮----
// Schedule initial image indexing
⋮----
/**
     * Plugin deactivation handler.
     *
     * @return void
     */
public function deactivate(): void
⋮----
// Clear scheduled events
````

## File: README.md
````markdown
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
````

## File: src/Providers/AdminServiceProvider.php
````php
namespace MediaFolders\Providers;
⋮----
use MediaFolders\Admin\AdminPage;
use MediaFolders\Core\Container;
use MediaFolders\Core\Contracts\ServiceProviderInterface;
use MediaFolders\Database\Contracts\FolderRepositoryInterface;
⋮----
class AdminServiceProvider implements ServiceProviderInterface
⋮----
/**
     * {@inheritDoc}
     */
public function register(Container $container): void
⋮----
$container->singleton(AdminPage::class, function(Container $container) {
⋮----
$container->get(FolderRepositoryInterface::class)
⋮----
public function boot(Container $container): void
⋮----
$adminPage = $container->get(AdminPage::class);
$adminPage->init();
````

## File: media-folders.php
````php
/**
 * Plugin Name: Media Folders
 * Plugin URI: https://github.com/dpitchford1/media-folders
 * Description: Efficient media library organization for WordPress
 * Version: 2.0.0
 * Requires at least: 6.5
 * Requires PHP: 7.4
 * Author: David Pitchford
 * Author URI: https://github.com/dpitchford1
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: media-folders
 * Domain Path: /languages
 */
⋮----
// Define plugin constants
⋮----
// Composer autoloader
⋮----
/* translators: %s: Composer command */
⋮----
/* translators: %s: Error message */
⋮----
$e->getMessage()
⋮----
// Initialize plugin
⋮----
// Basic class existence check
⋮----
$container = new MediaFolders\Core\Container();
$bootstrap = new MediaFolders\Core\Bootstrap($container);
$bootstrap->init();
⋮----
printf('<div class="notice notice-error"><pre>%s</pre></div>', esc_html($e->getTraceAsString()));
````

## File: package.json
````json
{
  "name": "media-folders",
  "version": "2.0.0",
  "description": "WordPress Media Folders Plugin - Efficient media library organization",
  "scripts": {
    "build": "wp-scripts build",
    "dist": "npm run build && node scripts/build-dist.js",
    "start": "wp-scripts start",
    "lint:js": "wp-scripts lint-js",
    "lint:css": "wp-scripts lint-style",
    "format:js": "wp-scripts format-js",
    "packages-update": "wp-scripts packages-update",
    "test": "jest",
    "test:watch": "jest --watch",
    "test:coverage": "jest --coverage",
    "test:update": "jest --updateSnapshot"
  },
  "author": "David Pitchford",
  "license": "GPL-2.0-or-later",
  "dependencies": {
    "@wordpress/api-fetch": "^6.0.0",
    "@wordpress/components": "^25.0.0",
    "@wordpress/compose": "^6.0.0",
    "@wordpress/data": "^9.0.0",
    "@wordpress/element": "^5.0.0",
    "@wordpress/i18n": "^4.0.0",
    "classnames": "^2.3.2"
  },
  "devDependencies": {
    "@babel/code-frame": "^7.23.5",
    "@testing-library/jest-dom": "^5.16.5",
    "@testing-library/react": "^14.0.0",
    "@testing-library/user-event": "^14.4.3",
    "@wordpress/eslint-plugin": "^14.0.0",
    "@wordpress/jest-preset-default": "^11.0.0",
    "@wordpress/prettier-config": "^2.0.0",
    "@wordpress/scripts": "^30.15.0",
    "babel-jest": "^29.5.0",
    "css-loader": "^7.1.2",
    "eslint": "^8.0.0",
    "fs-extra": "^11.3.0",
    "jest": "^29.5.0",
    "jest-environment-jsdom": "^29.5.0",
    "mini-css-extract-plugin": "^2.9.2",
    "msw": "^2.7.5",
    "prettier": "^2.8.0"
  },
  "jest": {
    "preset": "@wordpress/jest-preset-default",
    "setupFilesAfterEnv": [
      "<rootDir>/tests/js/setup-jest.js"
    ],
    "testEnvironment": "jsdom",
    "testPathIgnorePatterns": [
      "/node_modules/",
      "/vendor/"
    ],
    "collectCoverageFrom": [
      "js/**/*.{js,jsx}",
      "!**/node_modules/**",
      "!**/vendor/**"
    ],
    "coverageDirectory": "coverage",
    "coverageReporters": [
      "lcov",
      "text-summary"
    ],
    "moduleNameMapper": {
      "\\.(css|less|scss|sass)$": "<rootDir>/tests/js/__mocks__/styleMock.js",
      "\\.(gif|ttf|eot|svg)$": "<rootDir>/tests/js/__mocks__/fileMock.js"
    }
  }
}
````

## File: src/Core/Container.php
````php
namespace MediaFolders\Core;
⋮----
use Closure;
use RuntimeException;
use Psr\Container\ContainerInterface;
⋮----
class Container implements ContainerInterface
⋮----
private array $bindings = [];
private array $instances = [];
⋮----
public function bind(string $abstract, $concrete): void
⋮----
public function singleton(string $abstract, $concrete): void
⋮----
? $concrete($this)
⋮----
public function get(string $id)
⋮----
return $concrete instanceof Closure ? $concrete($this) : $concrete;
⋮----
public function has(string $id): bool
````

## File: src/Core/Bootstrap.php
````php
namespace MediaFolders\Core;
⋮----
class Bootstrap
⋮----
private Container $container;
⋮----
public function __construct(Container $container)
⋮----
public function init(): void
⋮----
$this->registerServices();
$this->initializeWordPress();
⋮----
private function registerServices(): void
⋮----
// Register core services
⋮----
$this->container->singleton(Container::class, $this->container);
⋮----
// Register database services
$this->container->singleton('wpdb', $wpdb);
⋮----
// Register repositories
$this->container->bind(
⋮----
return new \MediaFolders\Database\FolderRepository($container->get('wpdb'));
⋮----
private function initializeWordPress(): void
⋮----
// Initialize admin page
$adminPage = new \MediaFolders\Admin\AdminPage(
$this->container->get(\MediaFolders\Database\Contracts\FolderRepositoryInterface::class)
⋮----
$adminPage->init();
````
