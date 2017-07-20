<?php

namespace App\Container;

use Monolog;

/**
 * Class ConfigProvider
 * @package App\Container
 */
class ConfigProvider
{
    /**
     * @return array
     */
    private function getLoggerConfig(): array
    {
        return [
            'enabled' => false,
            'name' => 'application-name', // todo change this
            'path_format' => null,
            'level' => Monolog\Logger::INFO,
        ];
    }
}
