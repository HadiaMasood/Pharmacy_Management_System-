<?php
require __DIR__.'/../vendor/autoload.php';

use Illuminate\Support\Facades\DB;

try {
    // Test database connection
    DB::connection()->getPdo();
    
    echo "<h2>✅ Database Connection Successful!</h2>";
    
    // Get database name
    $database = DB::connection()->getDatabaseName();
    echo "<p>Connected to database: <strong>$database</strong></p>";
    
    // List all tables
    $tables = DB::select('SHOW TABLES');
    
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
    
} catch (\Exception $e) {
    echo "<h2>❌ Database Connection Failed</h2>";
    echo "<p><strong>Error:</strong> " . $e->getMessage() . "</p>";
    echo "<h3>Connection Details:</h3>";
    echo "<ul>";
    echo "<li>Host: sql205.infinityfree.com</li>";
    echo "<li>Database: if0_40810642_paramacy</li>";
    echo "<li>Username: if0_40810642</li>";
    echo "<li>Password: *********</li>";
    echo "</ul>";
    
    // Show PHP version and extensions
    echo "<h3>PHP Info:</h3>";
    echo "<ul>";
    echo "<li>PHP Version: " . phpversion() . "</li>";
    echo "<li>PDO Available: " . (extension_loaded('pdo') ? 'Yes' : 'No') . "</li>";
    echo "<li>PDO MySQL Available: " . (extension_loaded('pdo_mysql') ? 'Yes' : 'No') . "</li>";
    echo "</ul>";
}
?>
