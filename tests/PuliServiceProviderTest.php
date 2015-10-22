<?php

/*
 * This file is part of the puli/silex-provider package.
 *
 * (c) Bernhard Schussek <bschussek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Puli\SilexProvider\Tests;

use PHPUnit_Framework_TestCase;
use Puli\SilexProvider\PuliServiceProvider;
use Silex\Application;
use Silex\Provider\TwigServiceProvider;

class PuliServiceProviderTest extends PHPUnit_Framework_TestCase
{
    public function testConfiguredApplication()
    {
        $app = new Application();
        $app->register(new PuliServiceProvider());
        $app->boot();

        $this->assertInstanceOf('Puli\GeneratedPuliFactory', $app['puli.factory']);
        $this->assertInstanceOf('Puli\Repository\Api\ResourceRepository', $app['puli.repository']);
        $this->assertInstanceOf('Puli\Discovery\Api\Discovery', $app['puli.discovery']);
        $this->assertInstanceOf('Puli\UrlGenerator\Api\UrlGenerator', $app['puli.asset_url_generator']);
    }

    public function testConfiguredApplicationWithTwigExtension()
    {
        $app = new Application();
        $app->register(new TwigServiceProvider());
        $app->register(new PuliServiceProvider());
        $app->boot();

        $this->assertTrue($app['twig']->hasExtension('puli'));
        $this->assertInstanceOf('Puli\TwigExtension\PuliTemplateLoader', $app['twig.loader']);
    }

    public function testConfiguredApplicationWithTwigExtensionDisabled()
    {
        $app = new Application();
        $app->register(new TwigServiceProvider());
        $app->register(new PuliServiceProvider(), array(
            'puli.enable_twig' => false,
        ));
        $app->boot();

        $this->assertFalse($app['twig']->hasExtension('puli'));
        $this->assertNotInstanceOf('Puli\TwigExtension\PuliTemplateLoader', $app['twig.loader']);
    }
}
