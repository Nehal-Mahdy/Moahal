# Moahal WordPress Theme [![license](https://img.shields.io/badge/license-GPL--2.0%2B-orange)](https://github.com/wp-bathe/bathe/blob/master/LICENSE)

Custom WordPress theme for Moahal based on Bathe starter theme with Tailwind CSS, Sass, PostCSS, Autoprefixer, Vite, TypeScript, ESLint, Prettier, stylelint, Browsersync, imagemin.

## Deployment Pipeline with Hostinger

This theme uses GitHub Actions to automatically deploy to Hostinger when changes are pushed to specific branches.

### Setting up the GitHub Secrets

For the deployment pipeline to work, you need to add the following secrets to your GitHub repository:

1. Go to your repository on GitHub
2. Click on "Settings" > "Secrets and variables" > "Actions"
3. Add the following secrets:

| Secret Name | Description |
|-------------|-------------|
| `FTP_SERVER` | Your Hostinger FTP server (e.g., `srv1540-files.hstgr.io`) |
| `FTP_USERNAME` | Your Hostinger FTP username |
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
