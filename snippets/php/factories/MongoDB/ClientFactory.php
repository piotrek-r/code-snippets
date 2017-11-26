<?php
declare(strict_types=1);

namespace App\Container\MongoDB;

use MongoDB\Client;
use Psr\Container\ContainerInterface;

/**
 * Class ClientFactory
 * @package App\Container\MongoDB
 */
final class ClientFactory
{
    /**
     * @param ContainerInterface $container
     * @return Client
     */
    public function __invoke(ContainerInterface $container): Client
    {
        $connectionConfiguration = $container->get('config')['db']['connection'];
        return new Client(
            $connectionConfiguration['uri'],
            $connectionConfiguration['uriOptions'],
            $connectionConfiguration['driverOptions']
        );
    }
}
