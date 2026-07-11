<?php

declare(strict_types=1);

return [
    'timezone' => $_ENV['APP_TIMEZONE'] ?? 'Asia/Jakarta',
    'locale'   => $_ENV['APP_LOCALE'] ?? 'en',
];
