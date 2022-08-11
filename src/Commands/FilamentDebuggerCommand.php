<?php

namespace Stephenjude\FilamentDebugger\Commands;

use Illuminate\Console\Command;

class FilamentDebuggerCommand extends Command
{
    public $signature = 'filament-debugger';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
