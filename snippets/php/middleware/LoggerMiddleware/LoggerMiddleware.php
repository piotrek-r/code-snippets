<?php
declare(strict_types=1);

namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

/**
 * Class LoggerMiddleware
 * @package App\Middleware
 */
class LoggerMiddleware implements MiddlewareInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * LoggerMiddleware constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $this->request($request);
        $response = $delegate->process($request);
        $this->response($response);
        return $response;
    }

    /**
     * @param ServerRequestInterface $request
     * @return void
     */
    private function request(ServerRequestInterface $request)
    {
        $uri = $request->getUri();
        $serverParams = $request->getServerParams();

        $context = [
            'method' => $request->getMethod(),
            'uri' => [
                'scheme' => $uri->getScheme(),
                'host' => $uri->getHost(),
                'port' => $uri->getPort(),
                'path' => $uri->getPath(),
                'query' => $uri->getQuery(),
            ],
            'remoteAddr' => $serverParams['REMOTE_ADDR'] ?? null,
        ];
        $this->logger->info(__METHOD__, $context);
    }

    /**
     * @param ResponseInterface $response
     * @return void
     */
    private function response(ResponseInterface $response)
    {
        $context = [
            'className' => get_class($response),
            'statusCode' => $response->getStatusCode(),
        ];

        if (($locationHeader = $response->getHeader('location')[0] ?? null)) {
            $context['locationHeader'] = $locationHeader;
        }

        $this->logger->info(__METHOD__, $context);
    }
}
