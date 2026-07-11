<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Http\Response;

final class HomeController
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function __invoke(ServerRequestInterface $request, Response $response): Response
    {
        $this->logger->info('HomeController invoked');

        return $response->withJson([
            'status'  => 'success',
            'message' => 'Welcome to Stout Framework!',
        ]);
    }
}
