<?php

echo "                                                                                         
#######\            ##\ ##\ 
##  __##\           ## |\__|
## |  ## | ######\  ## |##\  #######\   #####\
## |  ## | \____##\ ## |## |##  __##\  \____##\
## |  ## | ####### |## |## |## |  \__| ####### |
## |  ## |##  __## |## |## |## |      ##  __## |
#######  |\####### |## |## |## |      \####### |
\_______/  \_______|\__|\__|\__|       \_______|

Dalira version 1.0.0
Developed By: Adrian Pol Peligrino\n
";

$projectRoot = dirname(__DIR__);
$projectName = basename($projectRoot);

$htaccessContent = <<<HTACCESS
RewriteEngine On

# Redirect everything to /public
RewriteCond %{REQUEST_URI} !^/public/
RewriteRule ^(.*)$ /public/$1 [L]

HTACCESS;

$envContent = <<<ENV
DB_HOST=localhost
DB_USERNAME=root
DB_PASSWORD=
DB_DATABASE=

APP_NAME=Dalira
APP_DESCRIPTION=A lightweight PHP template for faster and easier web development.
APP_KEYWORDS=PHP, PHP Template, Dalira, Web Development
APP_AUTHOR=Adrian Pol Peligrino
APP_ICON=public/img/favicon.png

ENV;

file_put_contents($projectRoot . '/.htaccess', $htaccessContent);
file_put_contents($projectRoot . '/.env', $envContent);

echo "- .htaccess file has been generated successfully!\n";
echo "- .env file has been generated successfully!\n";