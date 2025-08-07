#!/bin/bash

# Moahal theme deployment script
# This script helps deploy the theme to Hostinger manually when GitHub Actions fails

echo "Moahal Theme Manual Deployment Script"
echo "====================================="

# Default protocol is FTP
PROTOCOL="ftp"

# Check if protocol is specified
if [ "$1" = "--sftp" ]; then
  PROTOCOL="sftp"
  shift
fi

# Check if FTP credentials are provided
if [ -z "$1" ] || [ -z "$2" ] || [ -z "$3" ] || [ -z "$4" ]; then
  echo "Usage: ./deploy.sh [--sftp] <server> <username> <password> <remote_dir>"
  echo "  --sftp : Use SFTP instead of FTP (optional)"
  echo "Examples:"
  echo "  FTP:  ./deploy.sh ftp.moahalksa.com username password /public_html/wp-content/themes/moahal/"
  echo "  SFTP: ./deploy.sh --sftp ftp.moahalksa.com username password /public_html/wp-content/themes/moahal/"
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

# Deploy to server
cd $TEMP_DIR

if [ "$PROTOCOL" = "sftp" ]; then
  echo "Deploying to Hostinger via SFTP..."
  
  # Using sshpass and sftp for SFTP transfer
  # Check if sshpass is installed
  if ! command -v sshpass &> /dev/null; then
    echo "Error: sshpass is not installed. Please install it first."
    echo "On Ubuntu/Debian: sudo apt-get install sshpass"
    echo "On macOS: brew install hudochenkov/sshpass/sshpass"
    exit 1
  fi
  
  # Create a temporary SFTP batch file
  SFTP_COMMANDS=$(mktemp)
  echo "cd $REMOTE_DIR" > $SFTP_COMMANDS
  echo "mput -r *" >> $SFTP_COMMANDS
  echo "bye" >> $SFTP_COMMANDS
  
  # Execute SFTP transfer
  sshpass -p "$FTP_PASSWORD" sftp -o StrictHostKeyChecking=no -b $SFTP_COMMANDS "$FTP_USERNAME@$FTP_SERVER"
  
  # Clean up
  rm $SFTP_COMMANDS
else
  echo "Deploying to Hostinger via FTP..."
  
  # Check if lftp is installed (more reliable than ncftpput)
  if command -v lftp &> /dev/null; then
    # Using lftp (more modern and reliable)
    lftp -c "set ftp:ssl-allow no; \
             open -u $FTP_USERNAME,$FTP_PASSWORD $FTP_SERVER; \
             lcd .; \
             cd $REMOTE_DIR; \
             mirror --reverse \
                   --delete \
                   --verbose \
                   ./ ./"
  else
    # Fallback to ncftpput if available
    ncftpput -R -v -u "$FTP_USERNAME" -p "$FTP_PASSWORD" $FTP_SERVER $REMOTE_DIR .
  fi
fi

# Clean up
echo "Cleaning up..."
rm -rf $TEMP_DIR

echo "Deployment complete!"
