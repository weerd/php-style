<h1 align="center">PHP Styles</h1>

This package provides a simple way to apply pre-configured base style rules for the PHP Code Standards Fixer tool, that can be easily shared across projects and packages using PHP 7+.

It can be configured using the `default` rules or you can specify a different supported base ruleset, along with any additional rules or overrides you would like to include.

## Installation

```
$ composer require weerd/php-style
```

## Usage

```php
<?php

use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->notName('*.blade.php');

return Weerd\PhpStyle\configure($finder);
```

```php
<?php

use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->notName('*.blade.php');

$options = [
  'rules' => [
    'single_quote' => true,
    'trim_array_spaces' => true,
  ],
];

return Weerd\PhpStyle\configure($finder, $options);
```

```php
<?php

use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__.'/app',
        __DIR__.'/config',
        __DIR__.'/database',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])
    ->notName('*.blade.php');

return Weerd\PhpStyle\configure($finder, ['base' => 'laravel']);
```
