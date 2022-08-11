<?php

namespace Stephenjude\FilamentDebugger\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Stephenjude\FilamentDebugger\FilamentDebugger
 */
class FilamentDebugger extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Stephenjude\FilamentDebugger\FilamentDebugger::class;
    }
}
