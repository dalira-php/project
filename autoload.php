<?php

spl_autoload_register(function ($class) {
    $baseDirs = [
        __DIR__ . '/app/Controllers/',
        __DIR__ . '/app/Models/',
        __DIR__ . '/config/'
    ];

    $classPath = str_replace('\\', '/', $class) . '.php';

    foreach ($baseDirs as $baseDir) {
        $file = $baseDir . $classPath;
        
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
