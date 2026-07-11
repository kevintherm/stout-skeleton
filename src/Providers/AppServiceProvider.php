<?php

declare(strict_types=1);

namespace App\Providers;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Scotch\Support\ServiceProvider;

final class AppServiceProvider implements ServiceProvider
{
    public function register(ContainerBuilder $builder): void
    {
        // Register your application services here.

        // $builder->addDefinitions([
        //     CacheInterface::class => \DI\autowire(RedisCache::class),
        // ]);
        //   $builder->addDefinitions(['some.key' => 'some-value']);
    }

    public function boot(ContainerInterface $container): void
    {
        // Runs after the DI container is compiled.
        // Use this for event subscriptions, cache warming, etc.
    }
}
