<?php

class Serve
{
    public function startServer()
    {
        exec("start /B php -S localhost:8000 -t public");
    }
}

$server = new Serve();
$server->startServer();