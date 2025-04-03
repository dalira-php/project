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

$projectRoot = dirname(__DIR__);
$projectName = basename($projectRoot);

$htaccessContent = <<<HTACCESS
RewriteEngine On
RewriteBase /$projectName/

# Redirect to clean URLs without query string
RewriteRule ^([a-zA-Z0-9_-]+)$ index.php?page=$1 [L,QSA]

HTACCESS;

file_put_contents($projectRoot . '/.htaccess', $htaccessContent);