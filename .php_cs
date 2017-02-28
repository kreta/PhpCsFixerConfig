<?php

use Kreta\PhpCsFixerConfig\KretaConfig;

$config = new KretaConfig();
$config->getFinder()->in(__DIR__ . '/src');

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
