<?php

namespace Stephenjude\FilamentDebugger;

use Filament\Navigation\NavigationItem;
use Filament\Pages\Page;

class FilamentDebugger extends Page
{
    public static function getNavigationItems(): array
    {
        $debuggers = collect([
            'horizon' => static::getHorizonUrl(),
            'telescope' => static::getTelescopeUrl(),
        ]);

        $debuggers = $debuggers->only(config('filament-debugger.debuggers'));

        if (config('filament-debugger.authorization')) {
            $user = auth(config('filament.auth.guard'))->user();

            $debuggers = $debuggers->filter(
                fn ($value, $key) => $user->can(config("filament-debugger.permissions.$key"))
            );
        }

        return $debuggers->values()->toArray();
    }

    public static function getTelescopeUrl(): NavigationItem
    {
        return NavigationItem::make()
            ->group('debugger')
            ->icon('heroicon-o-sparkles')
            ->label('Telescope')
            ->sort(1)
            ->url(
                config('telescope.domain').'/'.config('telescope.path')
            )
            ->openUrlInNewTab();
    }

    public static function getHorizonUrl(): NavigationItem
    {
        return NavigationItem::make()
            ->group('debugger')
            ->icon('heroicon-o-globe')
            ->label('Horizon')
            ->sort(2)
            ->url(
                config('horizon.domain').'/'.config('horizon.path')
            )
            ->openUrlInNewTab();
    }
}
