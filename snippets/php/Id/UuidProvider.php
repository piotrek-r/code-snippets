<?php
declare(strict_types=1);

namespace App\Id;

/**
 * Interface UuidProvider
 * @package App\Id\UuidProvider
 */
interface UuidProvider
{
    /**
     * @return string
     */
    public function generate(): string;
}
