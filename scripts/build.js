const fs = require('fs-extra');
const path = require('path');
const { execSync } = require('child_process');

// Configuration
const config = {
    // Source directories and files to copy
    src: {
        php: [
            'media-folders.php',
            'src/**/*.php',
        ],
        assets: [
            'assets/build/**',
            'assets/css/**',
            'assets/js/**',
        ],
        composer: [
            'composer.json',
            'composer.lock',
        ],
        other: [
            'README.md',
            'languages/**',
        ],
    },
    // Build directory
    dist: 'dist/media-folders',
};

// Clean and create dist directory
console.log('🚀 Starting build process...');
fs.removeSync('dist');
fs.ensureDirSync(config.dist);

// Copy PHP files maintaining directory structure
console.log('📁 Copying PHP files...');
config.src.php.forEach(pattern => {
    const files = fs.glob.sync(pattern);
    files.forEach(file => {
        const dest = path.join(config.dist, file);
        fs.ensureDirSync(path.dirname(dest));
        fs.copySync(file, dest);
    });
});

// Copy assets
console.log('🎨 Copying assets...');
config.src.assets.forEach(pattern => {
    const files = fs.glob.sync(pattern);
    files.forEach(file => {
        const dest = path.join(config.dist, file);
        fs.ensureDirSync(path.dirname(dest));
        fs.copySync(file, dest);
    });
});

// Copy other files
console.log('📄 Copying additional files...');
config.src.other.forEach(pattern => {
    const files = fs.glob.sync(pattern);
    files.forEach(file => {
        const dest = path.join(config.dist, file);
        fs.ensureDirSync(path.dirname(dest));
        fs.copySync(file, dest);
    });
});

// Copy composer files and install dependencies
console.log('📦 Installing production dependencies...');
config.src.composer.forEach(file => {
    fs.copySync(file, path.join(config.dist, file));
});

// Run composer install in dist directory
process.chdir(config.dist);
execSync('composer install --no-dev --optimize-autoloader', { stdio: 'inherit' });
process.chdir('../..');

// Create zip file
console.log('📦 Creating zip file...');
execSync(`cd dist && zip -r media-folders.zip media-folders`, { stdio: 'inherit' });

console.log('✅ Build complete! Distribution package created in dist/media-folders.zip');