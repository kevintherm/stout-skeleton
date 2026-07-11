<?php

declare(strict_types=1);

namespace App\Tests;

use Scotch\Application;

uses()->beforeEach(function () {
    // Put test setup logic here
})->in(__DIR__);

/**
 * Helper to boot the scratch test application instance.
 */
function bootApp(): Application
{
    $app = require __DIR__ . '/../bootstrap/app.php';
    if (!$app instanceof Application) {
        throw new \RuntimeException('Failed to bootstrap Scotch Application.');
    }
    return $app;
}
