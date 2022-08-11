<?php

namespace Stephenjude\FilamentDebugger;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Stephenjude\FilamentDebugger\Commands\FilamentDebuggerCommand;

class FilamentDebuggerServiceProvider extends PluginServiceProvider
{
    protected array $pages = [
        FilamentDebugger::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-debugger')
            ->hasConfigFile()
            ->hasCommand(FilamentDebuggerCommand::class);
    }
}
