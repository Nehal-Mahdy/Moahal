# SSH Deployment for Moahal Theme

This document explains how to set up SSH-based deployment for the Moahal WordPress theme to your Hostinger server.

## Prerequisites

- SSH access to your Hostinger server (should be enabled in your hosting control panel)
- Basic familiarity with command line operations
- Git installed on your Hostinger server (should be pre-installed)

## SSH Deployment Details

SSH deployment is more secure and reliable than FTP deployment. It allows you to pull changes from your GitHub repository directly to your server without having to upload files manually.

### Hostinger SSH Access Details

Your SSH access details can be found in your Hostinger control panel under Advanced > SSH Access:

- **Host/IP**: 157.173.209.34
- **Port**: 65002
- **Username**: u142041678
- **Theme Directory**: /home/u142041678/domains/moahalksa.com/public_html/wp-content/themes/moahal

## Deployment Options

### 1. Manual SSH Deployment

To manually deploy the theme using SSH, follow these steps:

1. Connect to your server via SSH:
   ```bash
   ssh -p 65002 u142041678@157.173.209.34
   ```

2. Navigate to your theme directory:
   ```bash
   cd /home/u142041678/domains/moahalksa.com/public_html/wp-content/themes/moahal
   ```

3. If this is your first deployment, clone the repository:
   ```bash
   git clone -b dev https://github.com/Nehal-Mahdy/Moahal.git .
   ```

4. If the repository is already cloned, pull the latest changes:
   ```bash
   git fetch --all
   git reset --hard origin/dev
   git pull origin dev
   ```

### 2. Using the Deployment Script

We've provided a deployment script to simplify the process:

#### Linux/macOS:
1. Open a terminal
2. Navigate to your local repository
3. Run:
   ```bash
   ./deploy-ssh.sh
   ```
4. Enter your SSH password when prompted

#### Windows:
1. Double-click the `deploy-ssh-windows.bat` file
2. Enter your SSH password when prompted

### 3. Automated GitHub Actions Deployment

For automated deployments, we've set up a GitHub Actions workflow that deploys changes whenever you push to certain branches.

To configure this, you'll need to set up the following GitHub Secrets:

1. `SSH_PRIVATE_KEY`: Your SSH private key for authentication
2. `SSH_KNOWN_HOSTS`: The known hosts entry for your server

#### Setting up SSH Key Authentication:

1. Generate an SSH key pair on your local machine:
   ```bash
   ssh-keygen -t ed25519 -f ~/.ssh/hostinger_deploy_key -C "github-actions-deploy"
   ```

2. Upload the public key to your Hostinger server:
   ```bash
   ssh-copy-id -i ~/.ssh/hostinger_deploy_key.pub -p 65002 u142041678@157.173.209.34
   ```

3. Add the private key to GitHub Secrets:
   - Copy the content of `~/.ssh/hostinger_deploy_key`
   - Go to your GitHub repository > Settings > Secrets and variables > Actions
   - Create a new secret named `SSH_PRIVATE_KEY` and paste the key content

4. Add the known_hosts entry to GitHub Secrets:
   ```bash
   ssh-keyscan -p 65002 -H 157.173.209.34 > known_hosts.txt
   ```
   - Create a new secret named `SSH_KNOWN_HOSTS` with the content of known_hosts.txt

## Troubleshooting

### Common SSH Issues

1. **Connection refused**: Make sure SSH is enabled in your Hostinger control panel
2. **Authentication failed**: Verify your username and password/key
3. **Permission denied**: Ensure your user has permission to access the theme directory
4. **Git not found**: Contact Hostinger support to install Git if not available

### Getting Help

If you encounter any issues with SSH deployment, please:

1. Check your Hostinger control panel for SSH access details
2. Verify your SSH credentials and permissions
3. Contact Hostinger support for SSH-related issues
