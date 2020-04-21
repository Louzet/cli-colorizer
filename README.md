# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/louzet/colorizer.svg?style=flat-square)](https://packagist.org/packages/louzet/colorizer)
[![Build Status](https://travis-ci.org/Louzet/cli-colorizer.svg?branch=master)](https://travis-ci.org/Louzet/cli-colorizer)
[![Quality Score](https://scrutinizer-ci.com/g/louzet/cli-colorizer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/louzet/cli-colorizer)


cli-colorizer is a very small library which allows you to colorize the output streams in console
## Installation

You can install the package via composer:

```bash
composer require louzet/colorizer
```

## Usage

``` php

<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

$color = new \CliColorizer\Colorizer();
echo $color->color('Mickael Louzet', $color::FOREGROUND_BROWN, $color::BACKGROUND_MAGENTA);
echo $color->color('Mickael Louzet', $color::FOREGROUND_WHITE, $color::BACKGROUND_MAGENTA);

```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Credits

- [Mickael Louzet](https://github.com/louzet)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
