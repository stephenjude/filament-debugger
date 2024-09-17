<?php

namespace Stephenjude\FilamentDebugger\Traits;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;

trait HasGroup
{
    use EvaluatesClosures;

    public Closure | bool $groupNavigation = true;

    public string $groupNavigationLabel = 'Debuggers';

    public function groupNavigation(Closure | bool $condition = true, string $label = 'Debuggers'): static
    {
        $this->groupNavigation = $condition;

        $this->groupNavigationLabel = $label;

        return $this;
    }

    public function hasGroupNavigation(): bool
    {
        return $this->evaluate($this->groupNavigation) === true;
    }

    public function getGroupNavigationLabel(): string
    {
        return $this->groupNavigationLabel;
    }
}
