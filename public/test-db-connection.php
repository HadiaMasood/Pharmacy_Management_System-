<?php
require __DIR__.'/../bootstrap/autoload.php';

// Load the application
$app = require_once __DIR__.'/../bootstrap/app.php';

// Load the custom database configuration
require __DIR__.'/../bootstrap/database.php';

// Get the database connection
$db = $app['db'];

echo "<h2>🔍 Testing Database Connection</h2>";

try {
    // Test the database connection
    $pdo = $db->connection()->getPdo();
    
    echo "<p>✅ <strong>Successfully connected to the database!</strong></p>";
    
    // Get database name
    $database = $db->connection()->getDatabaseName();
    echo "<p>📊 Database: <strong>$database</strong></p>";
    
    // Get database version
    $version = $pdo->query('SELECT VERSION()')->fetchColumn();
    echo "<p>🔧 Database Version: <strong>$version</strong></p>";
    
    // List all tables
    $tables = $db->select('SHOW TABLES');
    
    if (count($tables) > 0) {
        echo "<h3>📋 Database Tables:</h3>";
        echo "<ul>";
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];
            echo "<li>$tableName</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No tables found in the database.</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color:red;'><strong>❌ Connection failed:</strong> " . $e->getMessage() . "</p>";
    
    // Show connection details (without password)
    echo "<h3>Connection Details:</h3>";
    echo "<ul>";
    echo "<li>Host: sql205.infinityfree.com</li>";
    echo "<li>Database: if0_40810642_paramacy</li>";
    echo "<li>Username: if0_40810642</li>";
    echo "<li>Password: *********</li>";
    echo "</ul>";
    
    // Show PHP and PDO information
    echo "<h3>PHP Information:</h3>";
    echo "<ul>";
    echo "<li>PHP Version: " . phpversion() . "</li>";
    echo "<li>PDO Available: " . (extension_loaded('pdo') ? 'Yes' : 'No') . "</li>";
    echo "<li>PDO MySQL Available: " . (extension_loaded('pdo_mysql') ? 'Yes' : 'No') . "</li>";
    echo "</ul>";
    
    // Show the actual error for debugging
    echo "<h3>Error Details:</h3>";
    echo "<pre>";
    echo htmlspecialchars($e->getMessage()) . "\n\n";
    echo "</pre>";
}
?>
