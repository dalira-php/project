<?php

echo "                                                                                         
#######\            ##\ ##\                           #######\  ##\   ##\ #######\
##  __##\           ## |\__|                          ##  __##\ ## |  ## |##  __##\
## |  ## | ######\  ## |##\  #######\   #####\        ## |  ## |## |  ## |## |  ## |
## |  ## | \____##\ ## |## |##  __##\  \____##\       #######  |######## |#######  |
## |  ## | ####### |## |## |## |  \__| ####### |      ##  ____/ ##  __## |##  ____/
## |  ## |##  __## |## |## |## |      ##  __## |      ## |      ## |  ## |## |
#######  |\####### |## |## |## |      \####### |      ## |      ## |  ## |## |
\_______/  \_______|\__|\__|\__|       \_______|      \__|      \__|  \__|\__|

Dalira PHP version 1.0.0
Developed By: Adrian Pol Peligrino\n
";

$projectRoot = dirname(__DIR__);
$projectName = basename($projectRoot);

$htaccessContent = <<<HTACCESS
RewriteEngine On
RewriteBase /$projectName/

# Redirect to clean URLs without query string
RewriteRule ^([a-zA-Z0-9_-]+)$ index.php?page=$1 [L,QSA]

HTACCESS;

$envContent = <<<ENV
DB_HOST=localhost
DB_USERNAME=root
DB_PASSWORD=
DB_DATABASE=

APP_NAME=Dalira
APP_DESCRIPTION=A lightweight PHP template for faster and easier web development.
APP_KEYWORDS=PHP, PHP Template, Dalira, Web Development
APP_AUTHOR=ONESYSTEAM
APP_ICON=public/img/favicon.png

ENV;

file_put_contents($projectRoot . '/.htaccess', $htaccessContent);
file_put_contents($projectRoot . '/.env', $envContent);

echo "- .htaccess file has been generated successfully!\n";
echo "- .env file has been generated successfully!\n";