<?php

namespace config;

use PDO;
use PDOException;

class DBConnection
{
    private $pdo;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'] ?? '';
        $dbname = $_ENV['DB_DATABASE'] ?? '';
        $username = $_ENV['DB_USERNAME'] ?? '';
        $password = $_ENV['DB_PASSWORD'] ?? '';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false
            ]);
        } catch (PDOException $e) {
            echo template()->render('Errors/500');
        }
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}