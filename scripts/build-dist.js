const fs = require('fs-extra');
const path = require('path');
const { execSync } = require('child_process');

// Plugin details
const PLUGIN_NAME = 'media-folders';
const DIST_DIR = `dist/${PLUGIN_NAME}`;
const MAMP_PHP = '/Applications/MAMP/bin/php/php8.0.8/bin/php';

// Ensure dist directory exists and is clean
console.log('🚀 Preparing distribution directory...');
fs.removeSync('dist');
fs.ensureDirSync(DIST_DIR);

// Files to copy
const filesToCopy = [
    { src: 'media-folders.php', dest: 'media-folders.php' },
    { src: 'src', dest: 'src' },
    { src: 'build', dest: 'build' },
    { src: 'composer.json', dest: 'composer.json' },
    { src: 'composer.lock', dest: 'composer.lock' },
    { src: 'languages', dest: 'languages' },
    { src: 'README.md', dest: 'README.md' }
];

// Copy files
console.log('📁 Copying plugin files...');
filesToCopy.forEach(({src, dest}) => {
    const sourcePath = path.resolve(__dirname, '..', src);
    const destPath = path.resolve(__dirname, '..', DIST_DIR, dest);
    
    if (fs.existsSync(sourcePath)) {
        if (fs.lstatSync(sourcePath).isDirectory()) {
            fs.copySync(sourcePath, destPath);
            console.log(`✓ Copied directory ${src}`);
        } else {
            fs.copySync(sourcePath, destPath);
            console.log(`✓ Copied file ${src}`);
        }
    } else {
        console.warn(`⚠️ Warning: ${src} not found`);
    }
});

// Install Composer dependencies using MAMP PHP
console.log('📦 Installing Composer dependencies...');
process.chdir(DIST_DIR);
try {
    execSync(`${MAMP_PHP} /usr/local/bin/composer install --no-dev --optimize-autoloader`, { stdio: 'inherit' });
} catch (error) {
    console.error('⚠️ Error installing Composer dependencies:', error.message);
    process.exit(1);
}
process.chdir('../..');

// Create zip file
console.log('📦 Creating distribution zip...');
execSync(`cd dist && zip -r ${PLUGIN_NAME}.zip ${PLUGIN_NAME}`, { stdio: 'inherit' });

console.log('✅ Build complete!');