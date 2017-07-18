<?php
declare(strict_types=1);

namespace App\CommandBus;

/**
 * Class UnknownCommandNameException
 * @package App\CommandBus
 */
class UnknownCommandNameException extends \InvalidArgumentException
{
}
