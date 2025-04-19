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