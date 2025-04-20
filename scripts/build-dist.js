const fs = require('fs-extra');
const path = require('path');
const { execSync } = require('child_process');

// Plugin details
const PLUGIN_NAME = 'media-folders';
const DIST_DIR = `dist/${PLUGIN_NAME}`;

// Ensure dist directory exists and is clean
console.log('🚀 Preparing distribution directory...');
fs.removeSync('dist');
fs.ensureDirSync(DIST_DIR);

// Files to copy (relative to project root)
const filesToCopy = [
    // PHP files
    'media-folders.php',
    'Core',
    'Contracts',
    'Cache',
    'ImageIndexing',
    
    // Assets
    'assets',
    
    // Build output
    'build',
    
    // Composer files
    'composer.json',
    'composer.lock',
    
    // Other essential files
    'languages',
    'README.md'
];

// Copy files
console.log('📁 Copying plugin files...');
filesToCopy.forEach(file => {
    const sourcePath = path.resolve(__dirname, '..', file);
    const destPath = path.resolve(__dirname, '..', DIST_DIR, file);
    
    if (fs.existsSync(sourcePath)) {
        fs.copySync(sourcePath, destPath);
        console.log(`✓ Copied ${file}`);
    } else {
        console.warn(`⚠️ Warning: ${file} not found`);
    }
});

// Install Composer dependencies
console.log('📦 Installing Composer dependencies...');
process.chdir(DIST_DIR);
try {
    execSync('composer install --no-dev --optimize-autoloader', { stdio: 'inherit' });
} catch (error) {
    console.error('⚠️ Error installing Composer dependencies. Make sure Composer is installed.');
}
process.chdir('../..');

// Create zip file
console.log('📦 Creating distribution zip...');
execSync(`cd dist && zip -r ${PLUGIN_NAME}.zip ${PLUGIN_NAME}`, { stdio: 'inherit' });

console.log('✅ Build complete!');
console.log(`Distribution package created in dist/${PLUGIN_NAME}.zip`);