<?php

it('can install configurations', function () {
    $this->artisan('filament-debugger:install')
        ->expectsOutput('Laravel Horizon installed.')
        ->expectsOutput('Laravel Telescope installed.')
        ->expectsOutput('Filament Debugger Installed.')
        ->assertExitCode(0);
});
