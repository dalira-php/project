<?php

/**
 * Class Serve
 *
 * Responsible for starting the built-in PHP development server.
 * Only works on Windows due to use of `start /B`.
 */
class Serve
{
    /**
     * Starts the PHP built-in server in the background
     * 
     * Uses port 8000 and sets 'public' as the document root.
     * The command is executed in background using Windows shell.
     */
    public function startServer()
    {
        // Execute the PHP built-in server in background (Windows-specific)
        exec("start /B php -S localhost:8000 -t public");
    }
}

// Create a Serve instance and start the server
$server = new Serve();
$server->startServer();
