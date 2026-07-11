<?php

declare(strict_types=1);

namespace App\Commands;

use Stout\Console\Command;

final class GreetCommand extends Command
{
    public function name(): string
    {
        return 'greet';
    }

    public function description(): string
    {
        return 'Greet someone from the CLI';
    }

    /**
     * @param array<int, string> $args
     */
    public function execute(array $args): int
    {
        $name = $args[0] ?? 'World';
        echo "\033[32mHello, {$name}!\033[0m\n";
        return 0;
    }
}
