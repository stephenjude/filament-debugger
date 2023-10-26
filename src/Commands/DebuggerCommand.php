<?php

namespace Stephenjude\FilamentDebugger\Commands;

use Illuminate\Console\Command;

class DebuggerCommand extends Command
{
    public $signature = 'filament-debugger:install';

    public $description = 'Install filament debugger.';

    public function handle(): int
    {
        $this->installHorizon();

        $this->installTelescope();

        $this->publishConfig();

        $this->info('Filament Debugger Installed.');

        return self::SUCCESS;
    }

    public function publishConfig()
    {
        $this->call('vendor:publish', ['--tag' => 'filament-debugger-config']);
    }

    public function installHorizon()
    {
        $this->callSilent('horizon:install');

        $this->info('Laravel Horizon installed.');
    }

    public function installTelescope()
    {
        $this->callSilent('telescope:install');

        $this->info('Laravel Telescope installed.');
    }
}
