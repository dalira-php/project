<?php

echo "                                                                                         

#######\            ##\ ##\                           #######\  ##\   ##\ #######\  
##  __##\           ## |\__|                          ##  __##\ ## |  ## |##  __##\ 
## |  ## | ######\  ## |##\  #######\   ######\        ## |  ## |## |  ## |## |  ## |
## |  ## | \____##\ ## |## |##  __##\  \____##\       #######  |######## |#######  |
## |  ## | ####### |## |## |## |  \__| ####### |      ##  ____/ ##  __## |##  ____/ 
## |  ## |##  __## |## |## |## |      ##  __## |      ## |      ## |  ## |## |      
#######  |\####### |## |## |## |      \####### |      ## |      ## |  ## |## |      
\_______/  \_______|\__|\__|\__|       \_______|      \__|      \__|  \__|\__|       

Dalira PHP version 2.0.0
Developed By: Adrian Pol Peligrino
";

// Get the project root directory (one level up from the config folder)
$projectRoot = dirname(__DIR__);

// Get the current project directory name
$projectName = basename($projectRoot);

// Define the .htaccess content
$htaccessContent = <<<HTACCESS
RewriteEngine On
RewriteBase /$projectName/

# Redirect to clean URLs without query string
RewriteRule ^([a-zA-Z0-9_-]+)$ index.php?page=$1 [L,QSA]

HTACCESS;

// Write to the .htaccess file in the project root
file_put_contents($projectRoot . '/.htaccess', $htaccessContent);

echo ".htaccess file generated in $projectRoot with RewriteBase /$projectName/\n";
