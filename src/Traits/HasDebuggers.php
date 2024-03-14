<?php

namespace Stephenjude\FilamentDebugger\Traits;

use Filament\Navigation\NavigationItem;

trait HasDebuggers
{
    private static function authorized(string $ability): bool
    {
        if (config('filament-debugger.authorization')) {
            return (bool) auth(config('filament.auth.guard'))->user()?->can($ability);
        }

        return true;
    }

    public static function telescope(): NavigationItem
    {
        return NavigationItem::make()
            ->visible(self::authorized(config('filament-debugger.permissions.telescope')))
            ->group(config('filament-debugger.group'))
            ->url(url: url()->to(config('filament-debugger.url.telescope')), shouldOpenInNewTab: true)
            ->icon('heroicon-o-sparkles')
            ->label('Telescope');
    }

    public static function horizon(): NavigationItem
    {
        return NavigationItem::make()
            ->visible(self::authorized(config('filament-debugger.permissions.horizon')))
            ->group(config('filament-debugger.group'))
            ->icon('heroicon-o-globe-europe-africa')
            ->url(url: url()->to(config('filament-debugger.url.horizon')), shouldOpenInNewTab: true)
            ->label('Horizon');
    }
}
