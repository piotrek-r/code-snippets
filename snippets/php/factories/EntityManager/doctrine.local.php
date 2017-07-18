<?php
declare(strict_types=1);

return [
    'doctrine' => [
        'orm' => [
            'proxy_dir' => __DIR__ . '/../../data/cache/EntityProxy',
            'register_annotations' => [
                __DIR__ . '/../../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php',
            ],
        ],
        'connection' => [
            'orm_default' => [
                'host'     => '',
                'port'     => 3306,
                'dbname'   => '',
                'user'     => '',
                'password' => '',
            ],
        ],
    ],
];
