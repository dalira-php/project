<?php

// Load Composer's autoloader for third-party libraries (like Plates)
require __DIR__ . '/../vendor/autoload.php';

// Load custom helper functions (e.g., template(), assets())
require __DIR__ . '/../config/Helpers.php';

use League\Plates\Engine;
use config\ENVLoader;
use app\Router;

// Initialize the Plates template engine and store it globally
$GLOBALS['templates'] = new Engine(__DIR__ . '/../app/Views');

// Register a custom 'asset()' function for use inside templates
$GLOBALS['templates']->registerFunction('asset', 'asset');

// Load environment variables from the .env file
$ENVLoader = new ENVLoader(__DIR__ . '/../.env');

// Initialize and run the router
Router::init();
