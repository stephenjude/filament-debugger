<?php

use Stephenjude\FilamentDebugger\DebuggerPlugin;
use Filament\Navigation\NavigationItem;

it('can install configurations', function () {
    $this->artisan('filament-debugger:install')
        ->expectsOutput('Laravel Horizon installed.')
        ->expectsOutput('Laravel Telescope installed.')
        ->expectsOutput('Filament Debugger Installed.')
        ->assertExitCode(0);
});

it('can open horizon', function () {
    expect(DebuggerPlugin::horizon())->toBeInstanceOf(NavigationItem::class);
});

it('can open telescope', function () {
    expect(DebuggerPlugin::telescope())->toBeInstanceOf(NavigationItem::class);
});
