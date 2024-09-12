<?php

namespace Stephenjude\FilamentDebugger;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Stephenjude\FilamentDebugger\Traits\HasAuthorization;
use Stephenjude\FilamentDebugger\Traits\HasGroup;
use Stephenjude\FilamentDebugger\Traits\HasHorizon;
use Stephenjude\FilamentDebugger\Traits\HasPulse;
use Stephenjude\FilamentDebugger\Traits\HasTelescope;

class DebuggerPlugin implements Plugin
{
    use HasAuthorization;
    use HasGroup;
    use HasHorizon;
    use HasPulse;
    use HasTelescope;

    public static function make(): static {
        return app(static::class);
    }

    public static function get(): static {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function getId(): string {
        return 'filament-debugger';
    }

    public function register(Panel $panel): void {
        if ($this->authorized() === false) {
            return;
        }

        $panel->navigationItems(array_filter([
            $this->hasHorizon() ? $this->getHorizonNavigation() : null,
            $this->hasPulse() ? $this->getPulseNavigation() : null,
            $this->hasTelescope() ? $this->getTelescopeNavigation() : null,
        ]));
    }

    public function boot(Panel $panel): void {
    }
}
