<?php

use League\Plates\Engine;

if (!function_exists('template')) {
    function template(): Engine
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new Engine(__DIR__ . '/../app/Views');
        }

        return $instance;
    }
}

if (!function_exists('assets')) {
    function assets($path = '')
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
        $base = rtrim($scheme . '://' . $host . $scriptDir, '/');
        
        return $base . '/' . ltrim($path, '/');
    }
}
