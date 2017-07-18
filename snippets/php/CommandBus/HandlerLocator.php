<?php
declare(strict_types=1);

namespace App\CommandBus;

use League\Tactician;
use Psr\Container\ContainerInterface;

/**
 * Class CommandLocator
 * @package App\CommandBus
 */
class HandlerLocator implements Tactician\Handler\Locator\HandlerLocator
{
    /**
     * @var CommandBusConfiguration
     */
    private $configuration;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * HandlerLocator constructor.
     * @param CommandBusConfiguration $configuration
     * @param ContainerInterface $container
     */
    public function __construct(CommandBusConfiguration $configuration, ContainerInterface $container)
    {
        $this->configuration = $configuration;
        $this->container = $container;
    }

    /**
     * @param string $commandName
     * @return object
     * @throws Tactician\Exception\MissingHandlerException
     */
    public function getHandlerForCommand($commandName)
    {
        try {
            $handlerName = $this->configuration->getHandlerNameForCommandName($commandName);
        } catch (UnknownCommandNameException $e) {
            throw Tactician\Exception\MissingHandlerException::forCommand($commandName);
        }
        if (!$this->container->has($handlerName)) {
            throw Tactician\Exception\MissingHandlerException::forCommand($commandName);
        }
        return $this->container->get($handlerName);
    }
}
