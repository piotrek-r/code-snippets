<?php

/**
 * Class ConfigProvider
 */
class ConfigProvider
{
    /**
     * @return array
     */
    private function getDoctrineConfig(): array
    {
        return [
            'orm' => [
                'auto_generate_proxy_classes' => false,
                'proxy_namespace' => 'EntityProxy',
                'entity_dir' => __DIR__ . '/Entity',
                'logger_class' => DoctrineLogger::class,
                'underscore_naming_strategy' => true,
            ],
            'connection' => [
                'orm_default' => [
                    'driver' => 'pdo_mysql',
                    'charset' => 'UTF8',
                ],
            ],
        ];
    }
}
