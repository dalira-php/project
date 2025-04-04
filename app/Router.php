<?php

namespace app;

class Router
{
    private static $routes = [];

    public static function init()
    {
        // Define routes
        self::add('/', fn() => self::render('Home'));
        self::add('/home', fn() => self::render('Home'));

        // Add your custom routes below to handle requests and display the views.

        // Run the router
        self::run();
    }

    public static function add($path, $callback)
    {
        $path = str_replace(['{', '}'], ['(?P<', '>[^/]+)'], $path);
        self::$routes[$path] = $callback;
    }

    public static function run()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $projectFolder = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $projectFolder = rtrim($projectFolder, '/');
        $pathParts = explode('/', trim($projectFolder, '/'));
        $projectFolder = '/' . $pathParts[0];
        if (strpos($requestUri, $projectFolder) === 0) {
            $requestUri = substr($requestUri, strlen($projectFolder));
        }
        foreach (self::$routes as $route => $callback) {
            if (preg_match("#^$route$#", $requestUri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                call_user_func($callback, $params);
                return;
            }
        }
        echo "404 - Page Not Found";
    }

    public static function render($view, $data = [])
    {
        $viewPath = __DIR__ . "/Views/{$view}.php";
        if (file_exists($viewPath)) {
            $templates = new \League\Plates\Engine(__DIR__ . '/Views');
            echo $templates->render($view, $data);
        } else {
            echo "Error: View '{$view}.php' not found.";
        }
    }
}
