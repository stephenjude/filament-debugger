<?php

namespace Stephenjude\FilamentDebugger;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Stephenjude\FilamentDebugger\Traits\HasDebuggers;

class DebuggerPlugin implements Plugin
{
    use HasDebuggers;

    public function getId(): string
    {
        return 'filament-debugger';
    }

    public function register(Panel $panel): void
    {
    }

    public function boot(Panel $panel): void
    {
        $panel->navigationItems(
            collect([
                'horizon' => $this->horizon(),
                'telescope' => $this->telescope(),
            ])
                ->only(config('filament-debugger.debuggers'))
                ->values()
                ->toArray()
        );
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
