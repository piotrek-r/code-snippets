<?php
declare(strict_types=1);

namespace #[[$NAMESPACE$]]#;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class #[[$ActioName]]##[[$Middleware$]]#
 * @package #[[$NAMESPACE$]]#
 */
class #[[$ActioName]]##[[$Middleware$]]# implements MiddlewareInterface
{
    /**
     * @param ServerRequestInterface \$request
     * @param DelegateInterface \$delegate
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface \$request, DelegateInterface \$delegate)
    {
        #[[$END$]]#// TODO Add the action logic here
        return \$delegate->process(\$request);
    }
}
