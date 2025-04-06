<?php

use League\Plates\Engine;

if (!function_exists('template')) {
    function template(): Engine
    {
        static $instance = null;

        if ($instance === null) {
            $instance = new Engine(__DIR__ . '/app/Views');
        }

        return $instance;
    }
}
