<?php

namespace Stephenjude\FilamentDebugger\Traits;

use Closure;
use Filament\Navigation\NavigationItem;
use Filament\Support\Concerns\EvaluatesClosures;

trait HasTelescope
{
    use EvaluatesClosures;

    public Closure | bool $hasTelescope = true;

    public string $telescopeLabel;

    public string $telescopeIcon;

    public string $telescopeUrl;

    public Closure | bool $telescopeOpenInNewTab = true;

    public function telescopeNavigation(
        Closure | bool $condition = true,
        string $label = 'Telescope',
        string $icon = 'heroicon-o-sparkles',
        string $url = 'telescope',
        Closure | bool $openInNewTab = true
    ): static {
        $this->hasTelescope = $condition;

        $this->telescopeLabel = $label;

        $this->telescopeIcon = $icon;

        $this->telescopeUrl = $url;

        $this->telescopeOpenInNewTab = $openInNewTab;

        return $this;
    }

    public function hasTelescope(): bool
    {
        return $this->evaluate($this->hasTelescope ?? true) === true;
    }

    private function getTelescopeNavigation(): NavigationItem
    {
        return NavigationItem::make()
            ->visible(fn () => $this->hasTelescope() && $this->authorized())
            ->group(fn () => $this->hasGroupNavigation() ? $this->getGroupNavigationLabel() : null)
            ->url(url: $this->getTelescopeUrl(), shouldOpenInNewTab: $this->getTelescopeOpenInNewTab())
            ->icon(icon: $this->getTelescopeIcon())
            ->label(label: $this->getTelescopeLabel());
    }

    public function getTelescopeUrl(): string
    {
        return $this->telescopeUrl ?? url('telescope');
    }

    public function getTelescopeOpenInNewTab(): bool
    {
        return $this->evaluate($this->telescopeOpenInNewTab) === true;
    }

    public function getTelescopeIcon(): string
    {
        return $this->telescopeIcon ?? 'heroicon-o-sparkles';
    }

    public function getTelescopeLabel(): string
    {
        return $this->telescopeLabel ?? 'Telescope';
    }
}
