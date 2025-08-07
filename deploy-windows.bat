@echo off
echo Moahal Direct FTP Deployment Script for Windows
echo ===============================================

:: Create a temporary script file for WinSCP
echo option batch abort > winscp_script.txt
echo option confirm off >> winscp_script.txt
echo option transfer binary >> winscp_script.txt
echo open ftp://u142041678.moehl:q!!XE6HHYTqjbAL@ftp.moahalksa.com/ >> winscp_script.txt
echo lcd "%~dp0" >> winscp_script.txt
echo cd /domains/moahalksa.com/public_html/wp-content/themes/moahal/ >> winscp_script.txt
echo synchronize remote -delete -filemask="*.* | .git/ .github/ node_modules/ package-lock.json yarn.lock .DS_Store" . >> winscp_script.txt
echo exit >> winscp_script.txt

:: Check if WinSCP is installed in the default location
set WINSCP_PATH="C:\Program Files (x86)\WinSCP\WinSCP.exe"
if not exist %WINSCP_PATH% set WINSCP_PATH="C:\Program Files\WinSCP\WinSCP.exe"

:: Run WinSCP with the script
if exist %WINSCP_PATH% (
    echo Starting WinSCP deployment...
    %WINSCP_PATH% /script=winscp_script.txt
) else (
    echo WinSCP not found. Please download and install from https://winscp.net/
    echo Then run this script again.
    pause
    exit /b 1
)

:: Clean up
del winscp_script.txt

echo.
echo Deployment completed.
pause
