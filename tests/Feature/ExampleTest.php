<?php

declare(strict_types=1);

use Slim\Psr7\Factory\ServerRequestFactory;
use function App\Tests\bootApp;

test('home endpoint returns successful JSON payload', function () {
    $app = bootApp();
    $request = (new ServerRequestFactory())->createServerRequest('GET', '/');
    
    $app->http()->bootstrap();
    $response = $app->http()->handle($request);

    expect($response->getStatusCode())->toBe(200);
    
    $body = (string) $response->getBody();
    $data = json_decode($body, true);
    
    expect($data)->toBe([
        'status' => 'success',
        'message' => 'Welcome to Stout Framework!',
    ]);
});

test('health check returns ok', function () {
    $app = bootApp();
    $request = (new ServerRequestFactory())->createServerRequest('GET', '/health');
    
    $app->http()->bootstrap();
    $response = $app->http()->handle($request);

    expect($response->getStatusCode())->toBe(200);
    
    $body = (string) $response->getBody();
    $data = json_decode($body, true);
    
    expect($data)->toBe([
        'status' => 'ok',
    ]);
});
