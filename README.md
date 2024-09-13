![](https://raw.githubusercontent.com/stephenjude/filament-debugger/main/art/banner.jpg)

# Filament Debugger

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/filament-debugger.svg?style=flat-square)](https://packagist.org/packages/stephenjude/filament-debugger)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/stephenjude/filament-debugger/run-tests.yml?label=tests)](https://github.com/stephenjude/filament-debugger/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/stephenjude/filament-debugger/fix-php-code-style-issues.yml?branch=main&label=code%20style)](https://github.com/stephenjude/filament-debugger/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/stephenjude/filament-debugger.svg?style=flat-square)](https://packagist.org/packages/stephenjude/filament-debugger)

Easily add Laravel Telescope and Horizon to Filament admin panel.

![](https://raw.githubusercontent.com/stephenjude/filament-debugger/main/art/screen1.png)

## Installation

You can install the package via composer:

```bash
composer require stephenjude/filament-debugger
```

## Usages
```php
public function panel(Panel $panel): Panel
{
    use Stephenjude\FilamentDebugger\DebuggerPlugin;

    return $panel
        ->plugin(
            DebuggerPlugin::make()
        );
}
```

### Custom Role/Permission
You can authorize the plugin for users with a specific role/permission:

```php
use Stephenjude\FilamentDebugger\DebuggerPlugin;

$panel->plugin(
    DebuggerPlugin::make()
        ->authorize(condition: fn() => auth()->user()->can('view.debuggers'))
);
 ```

### Custom Navigation Group
You can customize the navigation group:

```php
use Stephenjude\FilamentDebugger\DebuggerPlugin;

$panel->plugin(
    DebuggerPlugin::make()
        ->groupNavigation(condition: true, label: 'Debugger')
);
 ```

### Custom Navigation Items
You can customize the navigation items:

```php
use Stephenjude\FilamentDebugger\DebuggerPlugin;

$panel->plugin(
    DebuggerPlugin::make()
        ->horizonNavigation(
            condition: fn () => auth()->user()->can('view.horizon'),
            label: 'Horizon',
            icon: 'heroicon-o-globe-europe-africaglobe-europe-africa',
            url: url('horizon'),
            openInNewTab: fn () => true
        )
        ->telescopeNavigation(
            condition: fn()=> auth()->user()->can('view.telescope'),
            label: 'Telescope',
            icon: 'heroicon-o-sparkles',
            url: url('telescope'),
            openInNewTab: fn () => true
        )
        ->pulseNavigation(
            condition: fn () => auth()->user()->can('view.pulse'),
            label: 'Pulse',
            icon: 'heroicon-o-bolt',
            url: url('pulse'),
            openInNewTab: fn () => true
        )
    );
```

## Gates & Authorization
When using filament debuggers (Horizon, Telescope & Pulse) in production environment, we need to make sure that they are accessible to the authorized filament admin user.

To achive this, we need to use filament default authorization guard and the permissions provided in this package by overidding the `gate()` and  `authorization()` methods inside the HorizonServiceProvider,  TelescopeServiceProvider and PulseServiceProvider respectively.

```php
protected function gate()
{
    Gate::define('viewHorizon', function ($user) {
        return $user->can(config('filament-debugger.permissions.horizon'));
    });
}

protected function authorization()
{
    Auth::setDefaultDriver(config('filament.auth.guard'));

    parent::authorization();
}

```

####  Screenshots:


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/stephenjude/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [stephenjude](https://github.com/stephenjude)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
