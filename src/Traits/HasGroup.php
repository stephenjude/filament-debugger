<?php

namespace Stephenjude\FilamentDebugger\Traits;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;

trait HasGroup
{
    use EvaluatesClosures;

    public Closure|bool $navigationGroup = true;

    public string $navigationGroupLabel = 'Debuggers';

    public function navigationGroup(Closure|bool $condition = true, string $label = 'Debuggers'): static
    {
        $this->navigationGroup = $condition;

        $this->navigationGroupLabel = $label;

        return $this;
    }

    public function hasNavigationGroup(): bool
    {
        return $this->evaluate($this->navigationGroup) === true;
    }

    public function getNavigationGroupLabel(): string
    {
        return $this->navigationGroupLabel;
    }
}
