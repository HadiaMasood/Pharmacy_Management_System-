<?php
require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(IllinewlineContractnewlineConsolenewlineKernel::class);

$status = [];

try {
    // Clear application cache
    $status[] = "🔹 Clearing application cache... " . 
        (Artisan::call('cache:clear') === 0 ? '✅' : '❌ Failed');
    
    // Clear configuration cache
    $status[] = "🔹 Clearing config cache... " . 
        (Artisan::call('config:clear') === 0 ? '✅' : '❌ Failed');
    
    // Clear route cache
    $status[] = "🔹 Clearing route cache... " . 
        (Artisan::call('route:clear') === 0 ? '✅' : '❌ Failed');
    
    // Clear view cache
    $status[] = "🔹 Clearing view cache... " . 
        (Artisan::call('view:clear') === 0 ? '✅' : '❌ Failed');
    
    // Clear compiled files
    $status[] = "🔹 Clearing compiled services... " . 
        (Artisan::call('clear-compiled') === 0 ? '✅' : '❌ Failed');
    
    // Rebuild the cache
    $status[] = "\n🔹 Rebuilding cache... " . 
        (Artisan::call('config:cache') === 0 ? '✅' : '❌ Failed');
    
    $status[] = "🔹 Caching routes... " . 
        (Artisan::call('route:cache') === 0 ? '✅' : '❌ Failed');
    
    echo "<h2>🔄 Cache Clear Results</h2>";
    echo "<ul>";
    foreach ($status as $line) {
        echo "<li>$line</li>";
    }
    echo "</ul>";
    
    echo "<p>✅ Cache cleared successfully!</p>";
    
} catch (Exception $e) {
    echo "<h2>❌ Error Clearing Cache</h2>";
    echo "<p><strong>Error:</strong> " . $e->getMessage() . "</p>";
    echo "<p>Please check file permissions for the following directories:</p>";
    echo "<ul>";
    echo "<li>storage/framework/views/</li>";
    echo "<li>storage/framework/cache/</li>";
    echo "<li>bootstrap/cache/</li>";
    echo "</ul>";
}
?>
