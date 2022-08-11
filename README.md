# Filament Debugger

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/filament-debugger.svg?style=flat-square)](https://packagist.org/packages/stephenjude/filament-debugger)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/stephenjude/filament-debugger/run-tests?label=tests)](https://github.com/stephenjude/filament-debugger/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/stephenjude/filament-debugger/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/stephenjude/filament-debugger/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/stephenjude/filament-debugger.svg?style=flat-square)](https://packagist.org/packages/stephenjude/filament-debugger)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require stephenjude/filament-debugger
```

Run the setup command using

```bash
php artisan filament-debugger:install
```

This is the contents of the published config file:

```php
return [
    'debuggers' => [
        'horizon',
        'telescope'
    ],

    'authorization' => false,

    'permissions' => [
        'horizon' => 'horizon.view',
        'telescope' => 'telescope.view',
    ],
];

```
## Debuggers
This package comes with first party Laravel packages for development and monitoring your Laravel application.

### Laravel Telescope
Telescope provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps, and more. [Documentation](https://laravel.com/docs/9.x/telescope).

### Laravel Horizon
Horizon allows you to easily monitor key metrics of your queue system such as job throughput, runtime, and job failures. [Documentation](https://laravel.com/docs/9.x/horizon).
## Usage
Now you can view the installed debuggers when you log in into your filament admin panel.

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
