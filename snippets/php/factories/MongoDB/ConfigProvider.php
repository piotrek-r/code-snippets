<?php

namespace App\Container;

use MongoDB\Database;
use Monolog;

/**
 * Class ConfigProvider
 * @package App\Container
 */
class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'db' => $this->getDatabaseConfig(),
        ];
    }

    /**
     * @return array
     */
    private function getDatabaseConfig(): array
    {
        return [
            \MongoDB\Client::class => [
                'connection' => [
                    'uri' => '…',
                    'uriOptions' => [],
                    'driverOptions' => [],
                ],
            ],
            \MongoDB\Database::class => [
                'databases' => [
                    'data' => 'app-data',
                    'sessions' => 'app-sessions',
                ],
            ],
        ];
    }
}
