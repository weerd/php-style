<?php

namespace Weerd\PhpStyle;

use Exception;
use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use Symfony\Component\Finder\Finder as BaseFinder;

/**
 * Configuration for the PHP Code Standards Fixer tool.
 *
 * @param \PhpCsFixer\Finder $finder
 * @param array $options
 * @return \PhpCsFixer\Config
 */
function configure(Finder $finder, array $options = []): Config
{
    $base = $options['base'] ?? 'default';
  
    $rules = $options['rules'] ?? [];

    $baseFile = $base.'.php';

    // Find the base rules file specified in the /rules directory.
    $baseFinder = new BaseFinder();

    $baseFinder->files()->in(__DIR__.'/rules')->name($baseFile);

    if (! $baseFinder->hasResults()) {
        throw new Exception('The specified "'.$baseFile.'" base rules file not found.');
    }

    $rules = array_merge(require __DIR__.'/rules/'.$base.'.php', $rules);

    return Config::create()
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setRules($rules);
}
