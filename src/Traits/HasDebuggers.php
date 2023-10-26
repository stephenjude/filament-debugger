<?php

namespace Stephenjude\FilamentDebugger\Traits;

use Filament\Navigation\NavigationItem;

trait HasDebuggers
{
    private function authorized(string $ability): bool
    {
        if (config('filament-debugger.authorization')) {
            return (bool) auth(config('filament.auth.guard'))->user()?->can($ability);
        }

        return true;
    }

    public function telescope(): NavigationItem
    {
        return NavigationItem::make()
            ->visible($this->authorized(config('filament-debugger.permissions.telescope')))
            ->group(config('filament-debugger.group'))
            ->url(url: url('telescope'), shouldOpenInNewTab: true)
            ->icon('heroicon-o-sparkles')
            ->label('Telescope');
    }

    public function horizon(): NavigationItem
    {
        return NavigationItem::make()
            ->visible($this->authorized(config('filament-debugger.permissions.horizon')))
            ->group(config('filament-debugger.group'))
            ->icon('heroicon-o-globe-europe-africa')
            ->url(url: url('horizon'), shouldOpenInNewTab: true)
            ->label('Horizon');
    }
}
