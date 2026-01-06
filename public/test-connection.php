<?php
require __DIR__.'/../vendor/autoload.php';

$host = 'sql205.infinityfree.com';
$db   = 'if0_40810642_paramacy';
$user = 'if0_40810642';
$pass = 'paramacy123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "✅ Database connection successful!<br>";
    
    // Test query
    $stmt = $pdo->query('SELECT 1');
    echo "✅ Test query executed successfully!";
    
} catch (\PDOException $e) {
    die("❌ Connection failed: " . $e->getMessage());
}
?>
