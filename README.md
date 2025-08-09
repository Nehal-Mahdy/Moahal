# Moahal WordPress Theme [![license](https://img.shields.io/badge/license-GPL--2.0%2B-orange)](https://github.com/wp-bathe/bathe/blob/master/LICENSE)

Custom WordPress theme for Moahal based on Bathe starter theme with Tailwind CSS, Sass, PostCSS, Autoprefixer, Vite, TypeScript, ESLint, Prettier, stylelint, Browsersync, imagemin.

## Automated Deployment Pipeline

This theme uses GitHub Actions to automatically deploy to Hostinger whenever changes are pushed to the `dev` branch.

### Setting up the GitHub Secret

For the automated deployment to work, you need to add the following secret to your GitHub repository:

1. Go to your repository on GitHub
2. Click on "Settings" > "Secrets and variables" > "Actions"
3. Add the following secret:

| Secret Name    | Description                                |
| -------------- | ------------------------------------------ |
| `FTP_PASSWORD` | Your Hostinger FTP password for deployment |

### How the Deployment Works

1. Push your changes to the `dev` branch
2. GitHub Actions will automatically detect the push
3. The workflow will build and deploy your theme to Hostinger
4. If the primary FTP method fails, a fallback method using lftp will be tried
   | `FTP_PASSWORD` | Your Hostinger FTP password |

### Troubleshooting Deployment Issues

If you encounter deployment issues, try the following steps:

1. **Connection Timeout**:

   - Check if your FTP server details are correct in GitHub Secrets
   - Make sure your hosting server allows FTP connections from external IPs
   - Try running the test-ftp-connection.yml workflow to diagnose connection issues

2. **SFTP vs FTP**:

   - Some hosting providers only support SFTP instead of FTP
   - If using SFTP, change the protocol in the workflow file to `sftp`

3. **Server Directory Path**:

   - Verify that the server-dir path is correct: `/public_html/wp-content/themes/moahal/`
   - Incorrect path might cause deployment failures

4. **Firewall Issues**:
   - Contact your hosting provider to ensure GitHub Actions IPs are not blocked
   - Check if port 21 (for FTP) or port 22 (for SFTP) is open
     | `FTP_PASSWORD` | Your Hostinger FTP password |

### Deployment Process

1. Make changes to your code
2. Commit and push to one of the deployment branches (`main`, `master`, `production`, or `feature/test-workflow`)
3. GitHub Actions will automatically deploy your changes to Hostinger
4. Check the "Actions" tab in your GitHub repository for deployment status

## Development

### Getting Started

1. Clone the repository
2. Install dependencies:
   ```
   npm install
   composer install
   ```
3. Build assets:
   ```
   npm run build
   ```

### Available Commands

- `npm run build`: Build assets for production
- `npm run watch`: Watch for changes and rebuild assets

## Documentation

You can find the base theme (Bathe) documentation [on their website](https://ixkaito.github.io/bathe/).

## Copyright / License

© 2025 Moahal Theme, based on Bathe theme under the [GPL version 2.0](https://raw.githubusercontent.com/wp-bathe/bathe/master/LICENSE) or later.
