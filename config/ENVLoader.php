<?php

namespace config;

/**
 * Class ENVLoader
 *
 * Loads environment variables from a .env file and sets them into the global $_ENV superglobal.
 */
class ENVLoader
{
    /**
     * @var string Path to the .env file
     */
    private $envPath;

    /**
     * ENVLoader constructor.
     *
     * @param string $path Full path to the .env file
     */
    public function __construct(string $path)
    {
        // Set path to .env file and trigger loading
        $this->envPath = $path;
        $this->load();
    }

    /**
     * Loads parsed environment variables into the $_ENV superglobal
     */
    public function load(): void
    {
        $env = $this->parseEnvFile();

        // Set each parsed key-value pair into $_ENV
        foreach ($env as $key => $value) {
            $_ENV[$key] = $value;
        }
    }

    /**
     * Parses the .env file and returns an associative array of key-value pairs
     *
     * @return array Environment variables as key-value pairs
     */
    private function parseEnvFile(): array
    {
        // Stop execution if the file does not exist
        if (!file_exists($this->envPath)) {
            die("Error: .env file not found!");
        }

        $env = [];

        // Read each line of the .env file, skipping empty lines and comments
        foreach (file($this->envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            if (strpos(trim($line), '#') === 0) continue; // Skip comments

            // Split line into key and value
            list($key, $value) = explode('=', $line, 2);

            // Trim spaces and quotes from value
            $env[trim($key)] = trim($value, " \t\n\r\0\x0B\"'");
        }

        return $env;
    }
}
