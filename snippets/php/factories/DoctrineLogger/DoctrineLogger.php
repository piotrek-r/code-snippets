<?php
declare(strict_types=1);

namespace App\Logger;

use Doctrine\DBAL\Logging\SQLLogger;
use Psr\Log\LoggerInterface;

/**
 * Class DoctrineLogger
 * @package App\Logger
 */
class DoctrineLogger implements SQLLogger
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var array
     */
    private $currentQuery;

    /**
     * @var float
     */
    private $currentStartTime;

    /**
     * DoctrineLogger constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $sql The SQL to be executed.
     * @param array|null $params The SQL parameters.
     * @param array|null $types The SQL parameter types.
     * @return void
     */
    public function startQuery($sql, array $params = null, array $types = null)
    {
        $this->currentQuery = [
            'sql' => $sql,
            'params' => $params,
            'types' => $types,
        ];
        $this->currentStartTime = microtime(true);
    }

    /**
     * @return void
     */
    public function stopQuery()
    {
        $this->logger->debug(self::class, [
            'time' => microtime(true) - $this->currentStartTime,
            'query' => $this->currentQuery,
        ]);
    }
}
