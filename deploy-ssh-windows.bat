@echo off
echo Moahal Theme SSH Git Deployment (Windows)
echo =======================================

:: SSH connection details
set SSH_HOST=157.173.209.34
set SSH_PORT=65002
set SSH_USER=u142041678
set REMOTE_DIR=/home/u142041678/domains/moahalksa.com/public_html/wp-content/themes/moahal

:: GitHub repository details
set GITHUB_REPO=https://github.com/Nehal-Mahdy/Moahal.git
set GITHUB_BRANCH=dev

:: Create a temporary script file
echo @echo off > deploy_commands.bat
echo echo Connecting to Hostinger server... >> deploy_commands.bat
echo echo. >> deploy_commands.bat
echo echo Running deployment commands... >> deploy_commands.bat
echo ssh -p %SSH_PORT% %SSH_USER%@%SSH_HOST% "cd %REMOTE_DIR% && if [ -d '.git' ]; then git fetch --all && git reset --hard origin/%GITHUB_BRANCH% && git pull origin %GITHUB_BRANCH%; else rm -rf * && git clone -b %GITHUB_BRANCH% %GITHUB_REPO% .; fi && echo 'Deployment completed successfully!'" >> deploy_commands.bat
echo echo. >> deploy_commands.bat
echo echo If you see any errors above, please make sure: >> deploy_commands.bat
echo echo 1. You have SSH installed on your Windows machine >> deploy_commands.bat
echo echo 2. You have entered the correct SSH password >> deploy_commands.bat
echo echo 3. Your SSH connection is properly configured >> deploy_commands.bat
echo pause >> deploy_commands.bat

:: Run the temporary script
call deploy_commands.bat

:: Clean up
del deploy_commands.bat
