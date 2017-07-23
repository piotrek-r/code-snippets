<?php
declare(strict_types=1);

return [
    Psr\Log\LoggerInterface::class => [
        'enabled' => true,
        'path_format' => __DIR__ . '/../../data/log/application.%1$s.log',
        'level' => Monolog\Logger::DEBUG,
    ],
];
