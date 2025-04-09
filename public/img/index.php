<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/Helpers.php';

use League\Plates\Engine;
use config\ENVLoader;
use app\Router;

$GLOBALS['templates'] = new Engine(__DIR__ . '/../app/Views');
$ENVLoader = new ENVLoader(__DIR__ . '/../.env');

Router::init();
