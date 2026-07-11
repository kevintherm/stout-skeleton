<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Http\Response;

final class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(
        private readonly ResponseFactoryInterface $responseFactory
    ) {}

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler,
    ): ResponseInterface {
        $authorization = $request->getHeaderLine('Authorization');

        if ($authorization === '') {
            /** @var Response $response */
            $response = $this->responseFactory->createResponse(StatusCodeInterface::STATUS_UNAUTHORIZED);
            return $response->withJson([
                'error' => 'unauthorized',
                'message' => 'Missing or invalid Authorization header.',
            ]);
        }

        return $handler->handle($request);
    }
}
