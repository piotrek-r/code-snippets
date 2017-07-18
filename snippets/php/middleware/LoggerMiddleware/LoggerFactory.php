<?php
declare(strict_types=1);

namespace App\Middleware;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class LoggerFactory
 * @package App\Middleware
 */
class LoggerFactory
{
    /**
     * @param ContainerInterface $container
     * @return LoggerMiddleware
     */
    public function __invoke(ContainerInterface $container): LoggerMiddleware
    {
        return new LoggerMiddleware(
            $container->get(LoggerInterface::class)
        );
    }
}
