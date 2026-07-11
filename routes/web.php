<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use Psr\Http\Message\ServerRequestInterface;
use Stout\Http\Router;
use Slim\Http\Response;

return function (Router $router): void {
    $router->get('/', HomeController::class);
    $router->get('/health', fn(ServerRequestInterface $_, Response $response) => $response->withJson(['status' => 'ok']));

    $router->get('/info', fn(ServerRequestInterface $_, Response $response) => $response->withJson([
        'php' => PHP_VERSION,
        'framework' => 'Stout',
    ]));

    $router->group('/fuck', function() use ($router) {
        $router->get('/me', fn($_, Response $response) => $response->write('Hello World'));
    });
};
