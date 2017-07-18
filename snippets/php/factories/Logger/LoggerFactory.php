<?php
declare(strict_types=1);

namespace App\Container;

use App\Logger\LogIdProcessor;
use Monolog;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class LoggerFactory
 * @package App\Container
 */
class LoggerFactory
{
    /**
     * @param ContainerInterface $container
     * @return LoggerInterface
     */
    public function __invoke(ContainerInterface $container): LoggerInterface
    {
        $loggerConfig = $container->get('config')[LoggerInterface::class];

        $logger = new Monolog\Logger($loggerConfig['name']);

        if ($loggerConfig['enabled'] && $loggerConfig['path_format']) {
            $path = sprintf($loggerConfig['path_format'], (new \DateTimeImmutable())->format('Y-m-d'));
            $logger->pushHandler(new Monolog\Handler\StreamHandler($path, $loggerConfig['level']));
        } else {
            // push null handler to prevent the default stderr handler from Monolog
            $logger->pushHandler(new Monolog\Handler\NullHandler(Monolog\Logger::DEBUG));
        }

        $logger->pushProcessor(new LogIdProcessor());

        return $logger;
    }
}
