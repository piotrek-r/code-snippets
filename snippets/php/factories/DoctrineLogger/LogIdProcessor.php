<?php
declare(strict_types=1);

namespace App\Logger;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class LogIdProcessor
 * @package App\Logger
 */
class LogIdProcessor
{
    /**
     * @var UuidInterface
     */
    private $uuid;

    /**
     * @param array $record
     * @return array
     */
    public function __invoke(array $record): array
    {
        // work only with array context
        if (is_array($record['context'])) {
            $record['context'] = ['logId' => $this->uuid()] + $record['context'];
        }
        return $record;
    }

    /**
     * @return string
     */
    public function uuid(): string
    {
        if ($this->uuid === null) {
            $this->uuid = Uuid::uuid4();
        }
        return $this->uuid->toString();
    }
}
