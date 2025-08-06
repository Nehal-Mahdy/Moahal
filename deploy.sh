#!/bin/bash

# Moahal theme deployment script
# This script helps deploy the theme to Hostinger manually

echo "Moahal Theme Manual Deployment Script"
echo "====================================="

# Check if FTP credentials are provided
if [ -z "$1" ] || [ -z "$2" ] || [ -z "$3" ] || [ -z "$4" ]; then
  echo "Usage: ./deploy.sh <ftp_server> <ftp_username> <ftp_password> <remote_dir>"
  echo "Example: ./deploy.sh ftp.moahalksa.com username password /public_html/wp-content/themes/moahal/"
  exit 1
fi

FTP_SERVER=$1
FTP_USERNAME=$2
FTP_PASSWORD=$3
REMOTE_DIR=$4

# Install dependencies if needed
if [ -f "composer.json" ]; then
  echo "Installing PHP dependencies..."
  composer install --no-dev --optimize-autoloader
fi

if [ -f "package.json" ]; then
  echo "Installing Node.js dependencies and building assets..."
  npm install
  npm run build
fi

# Create a temporary directory for deployment files
TEMP_DIR=$(mktemp -d)
echo "Creating temporary directory: $TEMP_DIR"

# Copy files to the temporary directory
echo "Copying files to temporary directory..."
rsync -av --exclude=".git" \
  --exclude=".github" \
  --exclude="node_modules" \
  --exclude=".gitignore" \
  --exclude="README.md" \
  --exclude="deploy.sh" \
  --exclude="package-lock.json" \
  --exclude="yarn.lock" \
  --exclude=".env" \
  --exclude=".env.example" \
  --exclude=".DS_Store" \
  ./ $TEMP_DIR/

# Deploy to FTP server
echo "Deploying to Hostinger via FTP..."
cd $TEMP_DIR
ncftpput -R -v -u "$FTP_USERNAME" -p "$FTP_PASSWORD" $FTP_SERVER $REMOTE_DIR .

# Clean up
echo "Cleaning up..."
rm -rf $TEMP_DIR

echo "Deployment complete!"
