<?php
declare(strict_types=1);

namespace App\Id;

use Ramsey\Uuid\UuidFactory;

/**
 * Class UuidProviderRamsey
 * @package App\Id\UuidProvider
 */
final class UuidProviderRamsey implements UuidProvider
{
    /**
     * @var UuidFactory
     */
    private $factory;

    /**
     * UuidProviderRamsey constructor.
     * @param UuidFactory $factory
     */
    public function __construct(UuidFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        return $this->factory->uuid4()->toString();
    }
}
