<?php

use League\Plates\Engine;

/**
 * Registers a global helper function `template()` that returns
 * a singleton instance of the Plates template engine.
 */
if (!function_exists('template')) {
    /**
     * Returns a shared instance of the Plates Engine
     *
     * @return Engine
     */
    function template(): Engine
    {
        static $instance = null;

        // Create the instance only once
        if ($instance === null) {
            $instance = new Engine(__DIR__ . '/../app/Views'); // Path to view templates
        }

        return $instance;
    }
}

/**
 * Registers a global helper function `assets()` that generates
 * the full URL to a public asset, like CSS or JS files.
 */
if (!function_exists('assets')) {
    /**
     * Generate full asset URL based on the current request scheme and host
     *
     * @param string $path Relative asset path (e.g., 'css/app.css')
     * @return string Full URL to the asset
     */
    function assets($path = '')
    {
        // Determine the request scheme (http or https)
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

        // Get the current domain
        $host = $_SERVER['HTTP_HOST'];

        // Get the directory of the current script (usually /public)
        $scriptDir = dirname($_SERVER['SCRIPT_NAME']);

        // Construct the base URL and return full asset URL
        $base = rtrim($scheme . '://' . $host . $scriptDir, '/');
        return $base . '/' . ltrim($path, '/');
    }
}
