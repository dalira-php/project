<?php

namespace app;

/**
 * Class Router
 * 
 * Maps URLs to callback functions or views.
 */
class Router
{
    /**
     * @var array $routes Stores all defined routes with their corresponding callbacks
     */
    public static $routes = [];

    /**
     * Initializes the router by adding predefined routes and running it
     */
    public static function init()
    {
        // Define application routes here
        Router::add('/', fn() => Router::render('Welcome'));

        // Execute the route matching logic
        Router::run();
    }

    /**
     * Adds a new route and its callback to the routing table
     *
     * @param string $path URI pattern (can contain {param} placeholders)
     * @param callable $callback Function to call when the route is matched
     */
    public static function add($path, $callback)
    {
        // Convert route parameters {param} to named regex groups (?P<param>[^/]+)
        $path = str_replace(['{', '}'], ['(?P<', '>[^/]+)'], $path);

        // Store the transformed route with its callback
        Router::$routes[$path] = $callback;
    }

    /**
     * Executes the routing logic by matching the current URI to defined routes
     */
    public static function run()
    {
        // Extract the current request path (without query string)
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Iterate through defined routes and check for a match
        foreach (self::$routes as $route => $callback) {
            if (preg_match("#^$route$#", $requestUri, $matches)) {
                // Extract named parameters from the URI
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Execute the matched route's callback with parameters
                echo call_user_func($callback, $params);
                return;
            }
        }

        // If no routes matched, display 404 error page
        echo template()->render('Errors/404');
    }

    /**
     * Renders a view using the Plates template engine
     *
     * @param string $view The name of the view file (without .php)
     * @param array $data Data to pass to the view
     */
    public static function render($view, $data = [])
    {
        // Construct the full path to the view file
        $viewPath = __DIR__ . "/Views/{$view}.php";

        // Check if the view file exists before rendering
        if (file_exists($viewPath)) {
            $templates = new \League\Plates\Engine(__DIR__ . '/Views');

            // Render the view with the provided data
            echo $templates->render($view, $data);
        } else {
            // Show 404 error page if view file is missing
            echo template()->render('Errors/404');
        }
    }
}
