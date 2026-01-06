<?php

return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => 'sql205.infinityfree.com',
            'port' => '3306',
            'database' => 'if0_40810642_paramacy',
            'username' => 'if0_40810642',
            'password' => 'paramacy123',
            'unix_socket' => '',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],
    ],
    'migrations' => 'migrations',
];
