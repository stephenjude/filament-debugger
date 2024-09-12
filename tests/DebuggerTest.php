<?php

use Stephenjude\FilamentDebugger\DebuggerPlugin;

it('can install configurations', function () {
    $this->artisan('filament-debugger:install')
        ->expectsOutput('Laravel Horizon installed.')
        ->expectsOutput('Laravel Telescope installed.')
        ->expectsOutput('Filament Debugger Installed.')
        ->assertExitCode(0);
});

it('can open horizon', function () {
    $this->get(DebuggerPlugin::horizonNavigation())->assertSuccessful();
});

it('can open telescope', function () {
    $this->get(DebuggerPlugin::telescopeNavigation())->assertSuccessful();
});
