The Puli Service Provider for Silex
===================================

[![Build Status](https://travis-ci.org/puli/silex-provider.svg?branch=master)](https://travis-ci.org/puli/silex-provider)
[![Build status](https://ci.appveyor.com/api/projects/status/yufuha6h89il7glj/branch/master?svg=true)](https://ci.appveyor.com/project/webmozart/silex-provider/branch/master)
[![Build Status](https://scrutinizer-ci.com/g/puli/silex-provider/badges/build.png?b=master)](https://scrutinizer-ci.com/g/puli/silex-provider/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/puli/silex-provider/v/stable.svg)](https://packagist.org/packages/puli/silex-provider)
[![Total Downloads](https://poser.pugx.org/puli/silex-provider/downloads.svg)](https://packagist.org/packages/puli/silex-provider)
[![Dependency Status](https://www.versioneye.com/php/puli:silex-provider/1.0.0/badge.svg)](https://www.versioneye.com/php/puli:silex-provider/1.0.0)

Latest release: none

PHP >= 5.3.9

Integrates Puli with the [Silex microframework].

Just register the service provider to your app:

```php
$app->register(new \Puli\SilexProvider\PuliServiceProvider());
```

This will give you the possibility to use the Puli paths instead of classic Twig paths:

```php
$this->get('/', function () use ($app) {
    return $app['twig']->render('/app/views/index.html.twig');
});
```

To disable the Twig integration, use:

```php
$app->register(new \Puli\SilexProvider\PuliServiceProvider(), array(
    'puli.enable_twig' => false,
));
```

Authors
-------

* [Bernhard Schussek] a.k.a. [@webmozart]
* [The Community Contributors]

Installation
------------

Install Silex using [Composer](http://getcomposer.org/).
Follow the [Installation guide] guide to install Puli in your project.

Finally install the PuliServiceProvider adding `puli/silex-provider` to your composer.json or from CLI:

```
$ composer require puli/silex-provider
```

Documentation
-------------

Read the [Puli Documentation] to learn more about Puli.

Contribute
----------

Contributions to Puli are always welcome!

* Report any bugs or issues you find on the [issue tracker].
* You can grab the source code at Puli’s [Git repository].

Support
-------

If you are having problems, send a mail to bschussek@gmail.com or shout out to
[@webmozart] on Twitter.

License
-------

All contents of this package are licensed under the [MIT license].

[Silex microframework]: http://silex.sensiolabs.org/
[Puli]: http://puli.io
[Bernhard Schussek]: http://webmozarts.com
[The Community Contributors]: https://github.com/puli/silex-provider/graphs/contributors
[Installation guide]: http://docs.puli.io/en/latest/installation.html
[Puli Documentation]: http://docs.puli.io/en/latest/index.html
[issue tracker]: https://github.com/puli/issues/issues
[Git repository]: https://github.com/puli/silex-provider
[@webmozart]: https://twitter.com/webmozart
[MIT license]: LICENSE
