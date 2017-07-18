<?php
declare(strict_types=1);

namespace App\CommandBus;

/**
 * Class CommandBusConfiguration
 * @package App\CommandBus
 */
class CommandBusConfiguration
{
    /**
     * @var array
     */
    private $config;

    /**
     * CommandBusConfiguration constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $command
     * @return string
     */
    public function getHandlerNameForCommandName(string $command): string
    {
        if (!array_key_exists('handlers', $this->config)) {
            throw new UnknownCommandNameException('Handlers not configured');
        }
        if (!array_key_exists($command, $this->config['handlers'])) {
            throw new UnknownCommandNameException('Don\'t know how to handle the command ' . $command);
        }
        return $this->config['handlers'][$command];
    }
}
