<?php

declare(strict_types=1);

use App\Commands\GreetCommand;
// use App\Http\Middleware\AuthMiddleware;
use App\Providers\AppServiceProvider;
use Stout\Application;

$app = new Application(
    basePath: dirname(__DIR__),
    providers: [
        AppServiceProvider::class,
    ],
    commands: [
        GreetCommand::class,
    ],
);

/** @var array<string, mixed> $appConfig */
$appConfig = require __DIR__ . '/../config/app.php';
$app->config()->loadGroup('app', $appConfig);

/** @var callable $webRoutes */
$webRoutes = require __DIR__ . '/../routes/web.php';
$app->http()->routes($webRoutes);

// $app->http()->middleware(AuthMiddleware::class);

return $app;
