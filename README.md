# LaravelBotan

Fork: https://github.com/botanio/sdk

[![Latest Stable Version](https://poser.pugx.org/lartie/laravel-botan/v/stable)](https://packagist.org/packages/lartie/laravel-botan)
[![Total Downloads](https://poser.pugx.org/lartie/laravel-botan/downloads)](https://packagist.org/packages/lartie/laravel-botan)
[![Latest Unstable Version](https://poser.pugx.org/lartie/laravel-botan/v/unstable)](https://packagist.org/packages/lartie/laravel-botan)
[![License](https://poser.pugx.org/lartie/laravel-botan/license)](https://packagist.org/packages/lartie/laravel-botan)
[![composer.lock](https://poser.pugx.org/lartie/laravel-botan/composerlock)](https://packagist.org/packages/lartie/laravel-botan)

- [Installation](#installation)
    - [Composer](#composer)
    - [Configuration](#configuration)
    - [Service Provider](#service-provider)
- [Usage](#usage)
- [License](#license)

## Installation

### Composer
```bash
composer require "lartie/laravel-botan:^1.0.0"
```

### Configuration

    BOTAN_TOKEN=YOUR_BOT_TOKEN

### Service Provider

You must install this service provider.
```php
// config/app.php
'providers' => [
    ...
    LArtie\LaravelBotan\LaravelBotanServiceProvider::class,
    ...
];
```
This package also comes with a facade, which provides an easy way to call the the class.
```php
// config/app.php
'aliases' => [
    ...
    'Botan' => LArtie\LaravelBotan\Facades\Botan::class,
    ...
];
```

## Usage

    Botan::track($message, 'Message');

Or

    $result = Botan::shortenUrl($url, $userId);

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
