<?php

namespace config;

class ENVLoader
{
    private $envPath;

    public function __construct(string $path)
    {
        $this->envPath = $path;
        $this->load();
    }

    public function load(): void
    {
        $env = $this->parseEnvFile();

        foreach ($env as $key => $value) {
            $_ENV[$key] = $value;
        }
    }

    private function parseEnvFile(): array
    {
        if (!file_exists($this->envPath)) {
            die("Error: .env file not found!");
        }

        $env = [];

        foreach (file($this->envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            list($key, $value) = explode('=', $line, 2);
            $env[trim($key)] = trim($value, " \t\n\r\0\x0B\"'");
        }

        return $env;
    }
}
