<?php

namespace Stephenjude\FilamentDebugger\Traits;

use Closure;
use Filament\Navigation\NavigationItem;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Support\Facades\Route;

trait HasPulse
{
    use EvaluatesClosures;

    public Closure|bool $hasPulse = true;

    public string $pulseLabel;

    public string $pulseIcon;

    public string $pulseUrl;

    public Closure|bool $pulseOpenInNewTab = true;

    public function pulseNavigation(
        Closure|bool $condition = true,
        string $label = 'Pulse',
        string $icon = 'heroicon-o-bolt',
        string $url = 'pulse',
        Closure|bool $openInNewTab = true
    ): static {
        $this->hasPulse = $condition;

        $this->pulseLabel = $label;

        $this->pulseIcon = $icon;

        $this->pulseUrl = $url;

        $this->pulseOpenInNewTab = $openInNewTab;

        return $this;
    }

    public function hasPulse(): bool
    {
        return $this->evaluate($this->hasPulse ?? false) === true;
    }

    private function getPulseNavigation(): NavigationItem
    {
        return NavigationItem::make()
            ->visible(fn() => $this->hasPulse() && $this->authorized())
            ->group(fn() => $this->hasNavigationGroup() ? $this->getNavigationGroupLabel() : null)
            ->url(url: $this->getPulseUrl(), shouldOpenInNewTab: $this->getPulseOpenInNewTab())
            ->icon(icon: $this->getPulseIcon())
            ->label(label: $this->getPulseLabel());
    }

    public function getPulseUrl(): string
    {
        return $this->pulseUrl ?? (Route::has('pulse') ? route('pulse') : url('pulse'));
    }

    public function getPulseOpenInNewTab(): bool
    {
        return $this->evaluate($this->pulseOpenInNewTab ?? true) === true;
    }

    public function getPulseIcon(): string
    {
        return $this->pulseIcon ?? 'heroicon-o-bolt';
    }

    public function getPulseLabel(): string
    {
        return $this->pulseLabel ?? 'Pulse';
    }
}
