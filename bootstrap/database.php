<?php

// Load the custom database configuration
$app->configure('database-custom');

// Override the default database configuration
$app->singleton('db', function ($app) {
    return new \Illuminate\Database\DatabaseManager($app, $app['db.factory']);
});

$app->singleton('db.factory', function ($app) {
    return new \Illuminate\Database\Connectors\ConnectionFactory($app);
});

// Set the database configuration
config(['database' => require config_path('database-custom.php')]);

// Set the database connection name
config(['database.default' => 'mysql']);
