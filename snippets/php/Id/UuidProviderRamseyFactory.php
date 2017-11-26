<?php
declare(strict_types=1);

namespace App\Id;

use Psr\Container\ContainerInterface;
use Ramsey\Uuid\UuidFactory;

/**
 * Class UuidProviderRamseyFactory
 * @package App\Id\UuidProvider
 */
final class UuidProviderRamseyFactory
{
    /**
     * @param ContainerInterface $container
     * @return UuidProviderRamsey
     */
    public function __invoke(ContainerInterface $container): UuidProviderRamsey
    {
        return new UuidProviderRamsey(
            new UuidFactory()
        );
    }
}
