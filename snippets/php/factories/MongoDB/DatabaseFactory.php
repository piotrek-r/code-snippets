<?php
declare(strict_types=1);

namespace App\Container\MongoDB;

use MongoDB\Client;
use MongoDB\Database;
use Psr\Container\ContainerInterface;

/**
 * Class DatabaseFactory
 * @package App\Container\MongoDB
 */
final class DatabaseFactory
{
    /**
     * @param ContainerInterface $container
     * @return Database
     */
    public function __invoke(ContainerInterface $container): Database
    {
        return $container
            ->get(Client::class)
            ->selectDatabase($container->get('config')['db'][Database::class]['databases']['data']);
    }
}
