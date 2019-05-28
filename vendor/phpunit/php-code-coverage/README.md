[![Latest Stable Version](https://poser.pugx.org/phpunit/php-code-coverage/v/stable.png)](https://packagist.org/packages/phpunit/php-code-coverage)
<<<<<<< HEAD
[![Build Status](https://travis-ci.org/sebastianbergmann/php-code-coverage.svg?branch=master)](https://travis-ci.org/sebastianbergmann/php-code-coverage)

# PHP_CodeCoverage

**PHP_CodeCoverage** is a library that provides collection, processing, and rendering functionality for PHP code coverage information.

## Requirements

PHP 5.3.3 is required but using the latest version of PHP is highly recommended

### PHP 5

[Xdebug](http://xdebug.org/) is the only source of raw code coverage data supported for PHP 5. Version 2.1.3 of Xdebug is required but using the latest version is highly recommended.

### PHP 7

[phpdbg](http://phpdbg.com/docs) is currently the only source of raw code coverage data supported for PHP 7. Once Xdebug has been updated for PHP 7 it, too, will be supported.

### HHVM

A version of HHVM that implements the Xdebug API for code coverage (`xdebug_*_code_coverage()`) is required.

## Installation

To add PHP_CodeCoverage as a local, per-project dependency to your project, simply add a dependency on `phpunit/php-code-coverage` to your project's `composer.json` file. Here is a minimal example of a `composer.json` file that just defines a dependency on PHP_CodeCoverage 2.0:

    {
        "require": {
            "phpunit/php-code-coverage": "^2"
        }
    }

## Using the PHP_CodeCoverage API

```php
<?php
$coverage = new PHP_CodeCoverage;
=======
[![Build Status](https://travis-ci.org/sebastianbergmann/php-code-coverage.svg?branch=5.3)](https://travis-ci.org/sebastianbergmann/php-code-coverage)

# SebastianBergmann\CodeCoverage

**SebastianBergmann\CodeCoverage** is a library that provides collection, processing, and rendering functionality for PHP code coverage information.

## Installation

You can add this library as a local, per-project dependency to your project using [Composer](https://getcomposer.org/):

    composer require phpunit/php-code-coverage

If you only need this library during development, for instance to run your project's test suite, then you should add it as a development-time dependency:

    composer require --dev phpunit/php-code-coverage

## Using the SebastianBergmann\CodeCoverage API

```php
<?php
use SebastianBergmann\CodeCoverage\CodeCoverage;

$coverage = new CodeCoverage;

$coverage->filter()->addDirectoryToWhitelist('/path/to/src');

>>>>>>> dev
$coverage->start('<name of test>');

// ...

$coverage->stop();

<<<<<<< HEAD
$writer = new PHP_CodeCoverage_Report_Clover;
$writer->process($coverage, '/tmp/clover.xml');

$writer = new PHP_CodeCoverage_Report_HTML;
$writer->process($coverage, '/tmp/code-coverage-report');
```
=======
$writer = new \SebastianBergmann\CodeCoverage\Report\Clover;
$writer->process($coverage, '/tmp/clover.xml');

$writer = new \SebastianBergmann\CodeCoverage\Report\Html\Facade;
$writer->process($coverage, '/tmp/code-coverage-report');
```

>>>>>>> dev
