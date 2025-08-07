#!/bin/bash

# Moahal Theme Git Deployment via SSH
# This script pulls changes from GitHub to your Hostinger server

echo "Moahal Theme SSH Git Deployment"
echo "=============================="

# SSH connection details
SSH_HOST="157.173.209.34"
SSH_PORT="65002"
SSH_USER="u142041678"
REMOTE_DIR="/home/u142041678/domains/moahalksa.com/public_html/wp-content/themes/moahal"

# GitHub repository details
GITHUB_REPO="https://github.com/Nehal-Mahdy/Moahal.git"
GITHUB_BRANCH="dev"

# Deploy command to run on the server
SSH_COMMAND="cd $REMOTE_DIR && \
  if [ -d '.git' ]; then \
    git fetch --all && \
    git reset --hard origin/$GITHUB_BRANCH && \
    git pull origin $GITHUB_BRANCH; \
  else \
    rm -rf * && \
    git clone -b $GITHUB_BRANCH $GITHUB_REPO .; \
  fi && \
  echo 'Deployment completed successfully!'"

# Execute the deployment via SSH
echo "Connecting to Hostinger server via SSH..."
echo "You will be prompted to enter your SSH password."
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "$SSH_COMMAND"
