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

Dalira version 1.1.1
Developed By: Adrian Pol Peligrino\n
";

$projectRoot = dirname(__DIR__);
$projectName = basename($projectRoot);

$htaccessRoot = <<<HTACCESS
RewriteEngine On

RewriteCond %{REQUEST_URI} !^/public/
RewriteRule ^(.*)$ /public/$1 [L]

HTACCESS;

$htaccessPublic = <<<HTACCESS
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^ index.php [QSA,L]

HTACCESS;

$envContent = <<<ENV
DB_HOST=localhost
DB_USERNAME=root
DB_PASSWORD=
DB_DATABASE=

APP_NAME=Dalira
APP_DESCRIPTION=A lightweight PHP framework for faster and easier web development.
APP_KEYWORDS=PHP, PHP Framework, Dalira, Web Development
APP_AUTHOR=Adrian Pol Peligrino
APP_ICON=/img/favicon.png

ENV;

file_put_contents($projectRoot . '/.htaccess', $htaccessRoot);
file_put_contents($projectRoot . '/public/.htaccess', $htaccessPublic);
file_put_contents($projectRoot . '/.env', $envContent);

echo "- .htaccess file has been generated successfully!\n";
echo "- .env file has been generated successfully!\n";