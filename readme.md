# LaravelGoogleTranslator

Translating texts with google translation service for free but with ip limits (use proxy) Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
composer require ayvazyan10/laravelgoogletranslator
````

## Usage

Publish provider

```` bash
php artisan vendor:publish --provider="ayvazyan10\LaravelGoogleTranslator\LaravelGoogleTranslatorServiceProvider"
````

2 ways calling

```` php
use Ayvazyan10\LaravelGoogleTranslator\LaravelGoogleTranslator;

$trans = new LaravelGoogleTranslator();

$trans->trans('ru', 'en', 'Собака'); // result "Dog"
````

or with global function

```` php
google()->trans('es', 'en', 'buenos días'); // result "good morning"
````

if you want use proxy see config/laravelgoogletranslator.php config file

```` php
<?php

return [
    'proxy' => null, // example: ip:port
];
````

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email ayvazyan403@gmail.com instead of using the issue tracker.

## Credits

- [Razmik Ayvazyan][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ayvazyan10/laravelgoogletranslator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ayvazyan10/laravelgoogletranslator.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/ayvazyan10/laravelgoogletranslator/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/ayvazyan10/laravelgoogletranslator
[link-downloads]: https://packagist.org/packages/ayvazyan10/laravelgoogletranslator
[link-travis]: https://travis-ci.org/ayvazyan10/laravelgoogletranslator
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/ayvazyan10
[link-contributors]: ../../contributors
