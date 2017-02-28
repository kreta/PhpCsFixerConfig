# Kreta PHP CS Fixer Config
>PHP linting tool using [PHP CS Fixer][2] for [Kreta][1] packages

[![Build Status](https://travis-ci.org/kreta/PhpCSFixerConfig.svg?branch=master)](https://travis-ci.org/kreta/PhpCSFixerConfig)

It's based on the ideas of [`refinery29/php-cs-fixer-config`](https://github.com/refinery29/php-cs-fixer-config/) and
[`prooph/php-cs-fixer-config`](https://github.com/prooph/php-cs-fixer-config).

## Installation
```bash
$ composer require --dev kreta/php-cs-fixer-config
```
  
## Usage
### Configuration
Create a configuration file `.php_cs` in the root of your project:
```php
<?php

use Kreta\PhpCsFixerConfig\KretaConfig;

$config = new KretaConfig();
$config->getFinder()->in(__DIR__ . '/src');

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
```
In case your project uses [PhpSpec][3] BDD test framework, also create a `.phpspec_cs` file in the root of your project:
```php
<?php

use Kreta\PhpCsFixerConfig\KretaConfig;

$config = new KretaConfig(true);
$config->getFinder()
    ->in(__DIR__ . '/tests/Spec')
    ->name('*Spec.php');

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
```

### Git
Add `.php_cs.cache` (this is the cache file created by `php-cs-fixer`) to `.gitignore`:
```bash
/vendor
/.php_cs.cache
```

### Composer
Add the following scripts in the `composer.json` file:
```json
(...)

"scripts": {
    (...)

    "cs": [
        "php-cs-fixer fix --config=.php_cs -v",
        "php-cs-fixer fix --config=.phpspec_cs -v"
    ]
},
```

### Travis
Update your `.travis.yml` to cache the `php_cs.cache` file:
```yml
cache:
  directories:
    - $HOME/.php-cs-fixer
```
Then run `php-cs-fixer` in the `script` section:
```yml
script:
  - vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --diff --dry-run
  - vendor/bin/php-cs-fixer fix --config=.phpspec_cs --verbose --diff --dry-run
```

## Fixing issues
### Manually
If you need to fix issues locally and if you previously added the composer script, just run:
```bash
$ composer run-script cs
```
otherwise you can run:
```bash
$ vendor/bin/php-cs-fixer fix -v
$ vendor/bin/php-cs-fixer fix -v --config=.phpspec_cs 
```

##Credits
Kreta is created by:
>
**@benatespina** - [benatespina@gmail.com](mailto:benatespina@gmail.com)<br>
**@gorkalaucirica** - [gorka.lauzirika@gmail.com](mailto:gorka.lauzirika@gmail.com)

##Licensing Options
[![License](https://poser.pugx.org/kreta/kreta/license.svg)](https://github.com/kreta/kreta/blob/master/LICENSE)

[1]: http://kreta.io/
[2]: http://cs.sensiolabs.org/
[3]: http://www.phpspec.net/
