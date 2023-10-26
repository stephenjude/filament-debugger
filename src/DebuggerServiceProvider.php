<?php

namespace Stephenjude\FilamentDebugger;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Stephenjude\FilamentDebugger\Commands\DebuggerCommand;

class DebuggerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-debugger')
            ->hasConfigFile()
            ->hasCommand(DebuggerCommand::class);
    }
}
