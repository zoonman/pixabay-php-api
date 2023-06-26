# Pixabay PHP Client
[![Build Status](https://github.com/zoonman/pixabay-php-api/actions/workflows/php.yml/badge.svg)](https://github.com/zoonman/pixabay-php-api/actions/workflows/php.yml) [![Code Climate](https://codeclimate.com/github/zoonman/pixabay-php-api/badges/gpa.svg)](https://codeclimate.com/github/zoonman/pixabay-php-api) [![Packagist](https://img.shields.io/packagist/dt/zoonman/pixabay-php-api.svg)]() [![GitHub license](https://img.shields.io/github/license/zoonman/pixabay-php-api.svg)]()

This is unofficial wrapper for [Pixabay RESTful API](http://pixabay.com/api/docs/) for searching and retrieving Pixabay public domain images. 

[![Pixabay](https://pixabay.com/static/img/logo.svg)](http://pixabay.com/)

### Installing via Composer

The recommended way to install Pixabay PHP Client is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Pixabay PHP Client:

```bash
composer require zoonman/pixabay-php-api
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

### Documentation

Compatible with PHP verisons:
 - 7.2+
 - 8
 - hhvm
 - nightly

See current build status above.

#### Usage example

```php
<?php

require_once 'vendor/autoload.php';

$pixabayClient = new \Pixabay\PixabayClient([
	'key' => 'yourPixabayKey'
]);

// test it
$results = $pixabayClient->get(['q' => 'nature'], true);
// show the results
var_dump($results);
```
To obtain your keys go to https://pixabay.com/api/docs/

More information can be found in the online documentation at
https://www.zoonman.com/projects/pixabay/

