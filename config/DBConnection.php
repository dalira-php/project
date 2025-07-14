<?php

namespace config;

use PDO;
use PDOException;

/**
 * Class DBConnection
 * 
 * Handles the creation and retrieval of a PDO database connection.
 */
class DBConnection
{
    /**
     * @var PDO|null The PDO instance used for database connection
     */
    private $pdo;

    /**
     * DBConnection constructor.
     * 
     * Initializes the PDO connection using environment variables.
     * On failure, renders a 500 error page.
     */
    public function __construct()
    {
        // Retrieve database credentials from environment variables
        $host     = $_ENV['DB_HOST'] ?? '';
        $dbname   = $_ENV['DB_DATABASE'] ?? '';
        $username = $_ENV['DB_USERNAME'] ?? '';
        $password = $_ENV['DB_PASSWORD'] ?? '';

        // Construct the Data Source Name (DSN)
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            // Create a new PDO connection with proper options
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on error
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch results as associative arrays
                PDO::ATTR_EMULATE_PREPARES   => false                   // Use native prepared statements
            ]);
        } catch (PDOException $e) {
            // Render a 500 error page if connection fails
            echo template()->render('Errors/500');
        }
    }

    /**
     * Returns the active PDO connection
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
