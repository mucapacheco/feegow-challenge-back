<?php

declare(strict_types=1);

return [
    'doctrine-configuration' => [
        'conn' => [
            'driver' => 'pdo_mysql',
            'host' => APP_TEST ? 'db1' : 'db',
            'dbname' => 'database',
            'user' => 'user',
            'password' => 'my_pwd'
        ],
        'config' => [getcwd() . '/src/Infrastructure/config/mapping']
    ],
];
