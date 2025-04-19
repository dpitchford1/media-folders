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