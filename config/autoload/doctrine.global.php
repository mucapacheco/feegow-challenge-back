<?php

declare(strict_types=1);

return [
    'doctrine-configuration' => [
        'conn'=>[
            'driver' => 'pdo_sqlite',
            'path' => getcwd() . '/data/db.sqlite',
        ],
        'config' => [getcwd() . '/src/Infrastructure/config/mapping']
    ],
];
