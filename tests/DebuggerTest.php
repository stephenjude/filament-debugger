<?php

use Stephenjude\FilamentDebugger\DebuggerPlugin;

it('will not use debugging functions')
    ->expect(['dd', 'dump', 'ddd'])
    ->each->not->toBeUsed();

it('registers plugin', function () {
    $panel = filament()->getCurrentPanel()->plugin(DebuggerPlugin::make());

    expect($panel->getPlugin('filament-debugger'))
        ->not()
        ->toThrow(Exception::class);
});

it('groups plugin navigation items', function () {

});

it('customizes telescope navigation', function () {
    $plugin = DebuggerPlugin::make()
        ->horizonNavigation(false)
        ->pulseNavigation(false)
        ->telescopeNavigation(
            condition: fn() => true,
            label: 'Laravel Telescope',
            icon: 'heroicon-o-users',
            url: 'telescope/requests',
            openInNewTab: fn() => false
        );

    expect($plugin->hasHorizon())->toBeFalse();

    expect($plugin->hasPulse())->toBeFalse();

    expect($plugin->hasTelescope())->toBeTrue();

    expect($plugin->getTelescopeIcon())->toBe('heroicon-o-users');

    expect($plugin->getTelescopeLabel())->toBe('Laravel Telescope');

    expect($plugin->getTelescopeUrl())->toContain('telescope/requests');

    expect($plugin->getTelescopeOpenInNewTab())->toBeFalse();
});

it('customizes horizon navigation', function () {
    $plugin = DebuggerPlugin::make()
        ->telescopeNavigation(false)
        ->pulseNavigation(false)
        ->horizonNavigation(
            condition: fn() => true,
            label: 'Laravel Horizon',
            icon: 'heroicon-o-users',
            url: url('horizon/requests'),
            openInNewTab: fn() => false
        );

    expect($plugin->hasPulse())->toBeFalse();

    expect($plugin->hasTelescope())->toBeFalse();

    expect($plugin->hasHorizon())->toBeTrue();

    expect($plugin->getHorizonIcon())->toBe('heroicon-o-users');

    expect($plugin->getHorizonLabel())->toBe('Laravel Horizon');

    expect($plugin->getHorizonUrl())->toContain('horizon/requests');

    expect($plugin->getHorizonOpenInNewTab())->toBeFalse();
});

it('customizes pulse navigation', function () {
    $plugin = DebuggerPlugin::make()
        ->horizonNavigation(false)
        ->telescopeNavigation(false)
        ->pulseNavigation(
            condition: fn() => true,
            label: 'Laravel Pulse',
            icon: 'heroicon-o-users',
            url: 'pulse/requests',
            openInNewTab: fn() => false
        );

    expect($plugin->hasHorizon())->toBeFalse();

    expect($plugin->hasTelescope())->toBeFalse();

    expect($plugin->hasPulse())->toBeTrue();

    expect($plugin->getPulseIcon())->toBe('heroicon-o-users');

    expect($plugin->getPulseLabel())->toBe('Laravel Pulse');

    expect($plugin->getPulseUrl())->toContain('pulse/requests');

    expect($plugin->getPulseOpenInNewTab())->toBeFalse();
});
