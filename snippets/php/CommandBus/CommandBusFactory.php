<?php
declare(strict_types=1);

namespace App\CommandBus;

use League\Tactician;
use Psr\Container\ContainerInterface;

/**
 * Class CommandBusFactory
 * @package App\CommandBus
 */
class CommandBusFactory
{
    /**
     * @param ContainerInterface $container
     * @return CommandBus
     */
    public function __invoke(ContainerInterface $container): CommandBus
    {
        $lockingMiddleware = new Tactician\Plugins\LockingMiddleware();

        $handlerMiddleware = new Tactician\Handler\CommandHandlerMiddleware(
            new Tactician\Handler\CommandNameExtractor\ClassNameExtractor(),
            $container->get(HandlerLocator::class),
            new Tactician\Handler\MethodNameInflector\HandleInflector()
        );

        return new CommandBus([$lockingMiddleware, $handlerMiddleware]);
    }
}
