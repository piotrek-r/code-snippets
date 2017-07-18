<?php
declare(strict_types=1);

namespace App\Logger;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class DoctrineLoggerFactory
 * @package App\Logger
 */
class DoctrineLoggerFactory
{
    /**
     * @param ContainerInterface $container
     * @return DoctrineLogger
     */
    public function __invoke(ContainerInterface $container): DoctrineLogger
    {
        return new DoctrineLogger(
            $container->get(LoggerInterface::class)
        );
    }
}
