<?php

namespace Stephenjude\FilamentDebugger\Traits;

use Closure;
use Filament\Navigation\NavigationItem;
use Filament\Support\Concerns\EvaluatesClosures;

trait HasHorizon
{
    use EvaluatesClosures;

    public Closure | bool $hasHorizon = true;

    public string $horizonLabel;

    public string $horizonIcon;

    public string $horizonUrl;

    public Closure | bool $horizonOpenInNewTab = true;

    private function getHorizonNavigation(): NavigationItem
    {
        return NavigationItem::make()
            ->visible(fn () => $this->hasHorizon() && $this->authorized())
            ->group(fn () => $this->hasGroupNavigation() ? $this->getGroupNavigationLabel() : null)
            ->url(url: $this->getHorizonUrl(), shouldOpenInNewTab: $this->getHorizonOpenInNewTab())
            ->icon(icon: $this->getHorizonIcon())
            ->label(label: $this->getHorizonLabel());
    }

    public function horizonNavigation(
        Closure | bool $condition = true,
        string $label = 'Horizon',
        string $icon = 'heroicon-o-globe-europe-africa',
        string $url = 'horizon',
        Closure | bool $openInNewTab = true
    ): static {
        $this->hasHorizon = $condition;

        $this->horizonLabel = $label;

        $this->horizonIcon = $icon;

        $this->horizonUrl = $url;

        $this->horizonOpenInNewTab = $openInNewTab;

        return $this;
    }

    public function hasHorizon(): bool
    {
        return $this->evaluate($this->hasHorizon ?? false) === true;
    }

    public function getHorizonIcon(): string
    {
        return $this->horizonIcon ?? 'heroicon-o-globe-europe-africa';
    }

    public function getHorizonUrl(): string
    {
        return $this->horizonUrl ?? url('horizon');
    }

    public function getHorizonLabel(): string
    {
        return $this->horizonLabel ?? 'Horizon';
    }

    public function getHorizonOpenInNewTab(): bool
    {
        return $this->evaluate($this->horizonOpenInNewTab ?? true) === true;
    }
}
