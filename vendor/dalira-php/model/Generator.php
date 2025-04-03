<?php

if ($argc < 2) {
    echo "Usage: php Generator.php ModelName\n";
    exit(1);
}

$modelName = ucfirst($argv[1]);

$modelContent = <<<PHP
<?php

namespace app\Models;

use config\DBConnection;

/**
 * Class $modelName
 *
 * This class provides an abstraction layer for interacting with the database 
 * related to the '$modelName' model. It encapsulates database operations, 
 * ensuring a clean and maintainable interface for managing data.
 *
 * @package app\Models
 */
class $modelName
{
    /**
     * @var \PDO Database connection instance.
     */
    private \$db;

    /**
     * Constructor.
     *
     * Initializes the database connection.
     *
     * @param DBConnection \$db An instance of DBConnection for establishing 
     * the database connection.
     */
    public function __construct(DBConnection \$db)
    {
        // Retrieve the database connection from DBConnection
        \$this->db = \$db->getConnection();
    }
    
    // Add your custom methods below to interact with the database.
}
PHP;

$path = getcwd() . '/app/Models/' . $modelName . '.php';

if (!file_exists(dirname($path))) {
    mkdir(dirname($path), 0777, true);
}

if (!file_exists($path)) {
    file_put_contents($path, $modelContent);
    echo "{$modelName}.php created successfully in app/Models\n";
} else {
    echo "{$modelName}.php already exists. Skipping...\n";
}