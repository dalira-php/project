<?php

/**
 * Autoloader function to automatically include class files
 * when they are used, based on PSR-4-like convention.
 */
spl_autoload_register(function ($class) {
    // Define possible base directories to search for class files
    $baseDirs = [
        __DIR__ . '/app/Controllers/', // For controller classes
        __DIR__ . '/app/Models/',      // For model classes
        __DIR__ . '/config/'           // For configuration or utility classes
    ];

    // Convert namespace separators to directory separators and append .php extension
    $classPath = str_replace('\\', '/', $class) . '.php';

    // Iterate over each base directory to locate the class file
    foreach ($baseDirs as $baseDir) {
        $file = $baseDir . $classPath;

        // If file exists, include it and stop the loop
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
