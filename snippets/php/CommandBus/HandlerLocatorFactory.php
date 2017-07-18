<?php
declare(strict_types=1);

namespace App\CommandBus;

use Psr\Container\ContainerInterface;

/**
 * Class HandlerLocatorFactory
 * @package App\CommandBus
 */
class HandlerLocatorFactory
{
    /**
     * @param ContainerInterface $container
     * @return HandlerLocator
     */
    public function __invoke(ContainerInterface $container): HandlerLocator
    {
        return new HandlerLocator(new CommandBusConfiguration($container->get('config')['commandBus']), $container);
    }
}
