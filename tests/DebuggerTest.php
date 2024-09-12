<?php

use Filament\Navigation\NavigationItem;
use Stephenjude\FilamentDebugger\DebuggerPlugin;

it('will not use debugging functions')
    ->expect(['dd', 'dump', 'ddd'])
    ->each->not->toBeUsed();

it('registers plugin', function () {
    $panel = filament()->getCurrentPanel()->plugin(DebuggerPlugin::make());

    expect($panel->getPlugin('filament-debugger'))
        ->not()
        ->toThrow(Exception::class);

    expect($panel->getNavigationItems())->toHaveCount(3);

    $plugin = $panel->getPlugin('filament-debugger');

    expect($plugin)->hasHorizon()->toBeTrue();

    expect($plugin)->hasTelescope()->toBeTrue();

    expect($plugin)->hasPulse()->toBeTrue();
});

it('authorizes plugin', function () {
    $panel = filament()->getCurrentPanel()->plugin(DebuggerPlugin::make()->authorize(false));

    expect($panel->getNavigationItems())->toHaveCount(0);
});

it('groups plugin navigation items', function () {
    $panel = filament()->getCurrentPanel()
        ->plugin(
            DebuggerPlugin::make()->groupNavigation(
                condition: fn() => true,
                label: 'Laravel Debuggers'
            )
        );

    collect($panel->getNavigationItems())
        ->each(
            fn(NavigationItem $navigationItem) => expect($navigationItem)->getGroup()->toBe('Laravel Debuggers')
        );
});

it('customizes telescope navigation', function () {
    $panel = filament()->getCurrentPanel()->plugin(
        DebuggerPlugin::make()
            ->horizonNavigation(false)
            ->pulseNavigation(false)
            ->telescopeNavigation(
                condition: fn() => true,
                label: 'Laravel Telescope',
                icon: 'heroicon-o-users',
                url: 'telescope/requests',
                openInNewTab: fn() => false
            )
    );

    expect($panel->getNavigationItems())->toHaveCount(1);

    /** @var NavigationItem $navigationItem */
    $navigationItem = $panel->getNavigationItems()[0];

    expect($navigationItem)->getLabel()->toBe('Laravel Telescope');

    expect($navigationItem)->getIcon()->toBe('heroicon-o-users');

    expect($navigationItem)->getUrl()->toBe('telescope/requests');

    expect($navigationItem)->shouldOpenUrlInNewTab()->toBeFalse();
});

it('customizes horizon navigation', function () {
    $panel = filament()->getCurrentPanel()->plugin(
        DebuggerPlugin::make()
            ->telescopeNavigation(false)
            ->pulseNavigation(false)
            ->horizonNavigation(
                condition: fn() => true,
                label: 'Laravel Horizon',
                icon: 'heroicon-o-users',
                url: url('horizon/requests'),
                openInNewTab: fn() => false
            )
    );

    expect($panel->getNavigationItems())->toHaveCount(1);

    /** @var NavigationItem $navigationItem */
    $navigationItem = $panel->getNavigationItems()[0];

    expect($navigationItem)->getLabel()->toBe('Laravel Horizon');

    expect($navigationItem)->getIcon()->toBe('heroicon-o-users');

    expect($navigationItem)->getUrl()->toBe(url('horizon/requests'));

    expect($navigationItem)->shouldOpenUrlInNewTab()->toBeFalse();
});

it('customizes pulse navigation', function () {
    $panel = filament()->getCurrentPanel()->plugin(
        DebuggerPlugin::make()
            ->horizonNavigation(false)
            ->telescopeNavigation(false)
            ->pulseNavigation(
                condition: fn() => true,
                label: 'Laravel Pulse',
                icon: 'heroicon-o-users',
                url: 'pulse/requests',
                openInNewTab: fn() => false
            )
    );

    expect($panel->getNavigationItems())->toHaveCount(1);

    /** @var NavigationItem $navigationItem */
    $navigationItem = $panel->getNavigationItems()[0];

    expect($navigationItem)->getLabel()->toBe('Laravel Pulse');

    expect($navigationItem)->getIcon()->toBe('heroicon-o-users');

    expect($navigationItem)->getUrl()->toBe('pulse/requests');

    expect($navigationItem)->shouldOpenUrlInNewTab()->toBeFalse();
});
