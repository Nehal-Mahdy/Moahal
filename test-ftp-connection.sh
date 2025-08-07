#!/bin/bash

# FTP Credential Test Script for Moahal Theme
# This script tests various FTP credential formats to help diagnose connection issues

echo "FTP Credential Testing Script"
echo "============================"

# Define credentials
FTP_SERVER="ftp.moahalksa.com"
FTP_USERNAME="u142041678.moehl"
FTP_PASSWORD="q!!XE6HHYTqjbAL"
REMOTE_DIR="/domains/moahalksa.com/public_html/wp-content/themes/moahal"

# Test 1: Basic ftp command
echo -e "\n\n[TEST 1] Basic ftp command"
echo -e "user $FTP_USERNAME\n$FTP_PASSWORD\npwd\nquit" | ftp -v $FTP_SERVER

# Test 2: Using netrc
echo -e "\n\n[TEST 2] Using netrc"
echo "machine $FTP_SERVER login $FTP_USERNAME password $FTP_PASSWORD" > ~/.netrc
chmod 600 ~/.netrc
echo -e "pwd\nquit" | ftp -v $FTP_SERVER
rm ~/.netrc

# Test 3: Using curl
echo -e "\n\n[TEST 3] Using curl"
curl --insecure --list-only --ftp-ssl "ftp://$FTP_USERNAME:$FTP_PASSWORD@$FTP_SERVER"

# Test 4: Using lftp with debug
echo -e "\n\n[TEST 4] Using lftp with debug"
lftp -d -e "open -u $FTP_USERNAME,$FTP_PASSWORD $FTP_SERVER; pwd; ls; quit"

# Test 5: Using lftp with URL format
echo -e "\n\n[TEST 5] Using lftp with URL format"
lftp -d -e "open ftp://$FTP_USERNAME:$FTP_PASSWORD@$FTP_SERVER; pwd; ls; quit"

# Test 6: Try with different path formats
echo -e "\n\n[TEST 6] Testing different paths"
lftp -e "open -u $FTP_USERNAME,$FTP_PASSWORD $FTP_SERVER; cd $REMOTE_DIR; pwd; ls -la; quit"
echo -e "\n- Testing with public_html path"
lftp -e "open -u $FTP_USERNAME,$FTP_PASSWORD $FTP_SERVER; cd /public_html/wp-content/themes/moahal; pwd; ls -la; quit"
echo -e "\n- Testing with home path"
lftp -e "open -u $FTP_USERNAME,$FTP_PASSWORD $FTP_SERVER; cd /home/u142041678/domains/moahalksa.com/public_html/wp-content/themes/moahal; pwd; ls -la; quit"

echo -e "\n\nTests completed. Check the output for successful connections."
