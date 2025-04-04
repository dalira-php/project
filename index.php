<?php

require 'vendor/autoload.php';
require 'app/Router.php';
require 'autoload.php';

use League\Plates\Engine;
use app\Router;
use config\ENVLoader;

$templates = new Engine(__DIR__ . '/app/Views');
$ENVLoader = new ENVLoader(__DIR__ . '/.env');

Router::init();