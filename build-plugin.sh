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