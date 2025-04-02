<?php

spl_autoload_register(function ($class) {
    // Define possible base directories where class files might be located
    $baseDirs = [
        __DIR__ . '/app/Controllers/',
        __DIR__ . '/app/Models/',
        __DIR__ . '/config/'
    ];

    // Convert namespace to file path
    $classPath = str_replace('\\', '/', $class) . '.php';

    // Check each base directory
    foreach ($baseDirs as $baseDir) {
        $file = $baseDir . $classPath;
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
