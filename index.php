<?php

require 'vendor/autoload.php';
require 'autoload.php';

use League\Plates\Engine;
use config\ENVLoader;

$templates = new Engine(__DIR__ . '/app/Views');
$ENVLoader = new ENVLoader(__DIR__ . '/.env');

$page = isset($_GET['page']) ? basename($_GET['page']) : 'Home';
$allowedPages = ['Home'];

if (in_array($page, $allowedPages)) {
    try {
        echo $templates->render($page);
    } catch (Exception $e) {
        echo "Error rendering page: " . $e->getMessage();
    }
} else {
    echo "404 - Page not found";
}
