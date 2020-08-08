<h1 align="center">✨ PHP Styles ✨</h1>

This package provides a simple way to apply pre-configured base style rules for the [PHP Code Standards Fixer tool](https://cs.symfony.com/), that can be easily shared across projects and packages using PHP 7+.

It can be configured using the `default` rules or you can specify a different supported base ruleset, along with any additional rules or overrides you would like to include.

## Installation

```
$ composer require weerd/php-style
```

## Usage

Add a `.php_cs.dist` in the root directory of your project or pacakge.

Within that file create a new instance of `PhpCsFixer\Finder` and configure what files and directories the PHP CS Fixer tool should be looking to fix code style.

Next, call the `Weerd\PhpStyle\configure()` function and pass the instance of the finder as the first argument.

Below are some examples along with variations utilizing the `$options` array:

### Example using default ruleset

The following example returns a configuration with the [default](https://github.com/weerd/php-style/blob/master/src/rules/default.php) rules for PHP styles.

```php
<?php

use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests',
    ]);

return Weerd\PhpStyle\configure($finder);
```

### Example using default ruleset and additional rules

The following example returns a configuration with the [default](https://github.com/weerd/php-style/blob/master/src/rules/default.php) rules, along with two additional rules included in the final set of rules for PHP styles.

```php
<?php

use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__.'/src',
        __DIR__.'/tests',
    ]);

$options = [
  'rules' => [
    'single_quote' => true,
    'trim_array_spaces' => true,
  ],
];

return Weerd\PhpStyle\configure($finder, $options);
```

### Example using laravel ruleset

The following example returns a configuration with the [laravel](https://github.com/weerd/php-style/blob/master/src/rules/laravel.php) rules for PHP styles.

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

Once you have the `.php_cs.dist` file setup, you can run the PHP CS Fixer tool by running:

```bash
$ vendor/bin/php-cs-fixer fix --allow-risky=yes
```

Or to make things easier, add that command to the `composer.json` file as a script:

```json
// composer.json
{
    ...
    
    "scripts": {
        "format": "vendor/bin/php-cs-fixer fix --allow-risky=yes"
    }
}
```

Now you can run the PHP CS Fixer tool with the following composer command:

```bash
$ composer format
```


## Credits

🙌 Thanks to [@Spatie](https://github.com/spatie) and their [Laravel Package Training](https://laravelpackage.training/) course for introducing me to the PHP Code Standards Fixer tool and how to use it!

🙌 This package is heavily inspired by [@timacdonald's](https://github.com/timacdonald) great article on [how to share PHP CS Fixer rules](https://laravel-news.com/sharing-php-cs-fixer-rules-across-projects-and-teams)!

🙌 The complete set of Laravel specific rules are thanks to [@laravel-shift](https://gist.github.com/laravel-shift) and the compiled rules shared in a [gist](https://gist.github.com/laravel-shift/cab527923ed2a109dda047b97d53c200) and used on [Laravel Shift](https://laravelshift.com/)!

