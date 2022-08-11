<?php

namespace Stephenjude\FilamentDebugger;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Stephenjude\FilamentDebugger\Commands\FilamentDebuggerCommand;

class FilamentDebuggerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-debugger')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-debugger_table')
            ->hasCommand(FilamentDebuggerCommand::class);
    }
}
