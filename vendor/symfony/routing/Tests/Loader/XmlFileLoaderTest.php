<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Tests\Loader;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\XmlFileLoader;
use Symfony\Component\Routing\Tests\Fixtures\CustomXmlFileLoader;

<<<<<<< HEAD
class XmlFileLoaderTest extends \PHPUnit_Framework_TestCase
{
    public function testSupports()
    {
        $loader = new XmlFileLoader($this->getMock('Symfony\Component\Config\FileLocator'));
=======
class XmlFileLoaderTest extends TestCase
{
    public function testSupports()
    {
        $loader = new XmlFileLoader($this->getMockBuilder('Symfony\Component\Config\FileLocator')->getMock());
>>>>>>> dev

        $this->assertTrue($loader->supports('foo.xml'), '->supports() returns true if the resource is loadable');
        $this->assertFalse($loader->supports('foo.foo'), '->supports() returns true if the resource is loadable');

        $this->assertTrue($loader->supports('foo.xml', 'xml'), '->supports() checks the resource type if specified');
        $this->assertFalse($loader->supports('foo.xml', 'foo'), '->supports() checks the resource type if specified');
    }

    public function testLoadWithRoute()
    {
<<<<<<< HEAD
        $loader = new XmlFileLoader(new FileLocator(array(__DIR__.'/../Fixtures')));
=======
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
>>>>>>> dev
        $routeCollection = $loader->load('validpattern.xml');
        $route = $routeCollection->get('blog_show');

        $this->assertInstanceOf('Symfony\Component\Routing\Route', $route);
        $this->assertSame('/blog/{slug}', $route->getPath());
        $this->assertSame('{locale}.example.com', $route->getHost());
        $this->assertSame('MyBundle:Blog:show', $route->getDefault('_controller'));
        $this->assertSame('\w+', $route->getRequirement('locale'));
        $this->assertSame('RouteCompiler', $route->getOption('compiler_class'));
<<<<<<< HEAD
        $this->assertEquals(array('GET', 'POST', 'PUT', 'OPTIONS'), $route->getMethods());
        $this->assertEquals(array('https'), $route->getSchemes());
=======
        $this->assertEquals(['GET', 'POST', 'PUT', 'OPTIONS'], $route->getMethods());
        $this->assertEquals(['https'], $route->getSchemes());
>>>>>>> dev
        $this->assertEquals('context.getMethod() == "GET"', $route->getCondition());
    }

    public function testLoadWithNamespacePrefix()
    {
<<<<<<< HEAD
        $loader = new XmlFileLoader(new FileLocator(array(__DIR__.'/../Fixtures')));
=======
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
>>>>>>> dev
        $routeCollection = $loader->load('namespaceprefix.xml');

        $this->assertCount(1, $routeCollection->all(), 'One route is loaded');

        $route = $routeCollection->get('blog_show');
        $this->assertSame('/blog/{slug}', $route->getPath());
        $this->assertSame('{_locale}.example.com', $route->getHost());
        $this->assertSame('MyBundle:Blog:show', $route->getDefault('_controller'));
        $this->assertSame('\w+', $route->getRequirement('slug'));
        $this->assertSame('en|fr|de', $route->getRequirement('_locale'));
        $this->assertNull($route->getDefault('slug'));
        $this->assertSame('RouteCompiler', $route->getOption('compiler_class'));
<<<<<<< HEAD
=======
        $this->assertSame(1, $route->getDefault('page'));
>>>>>>> dev
    }

    public function testLoadWithImport()
    {
<<<<<<< HEAD
        $loader = new XmlFileLoader(new FileLocator(array(__DIR__.'/../Fixtures')));
=======
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
>>>>>>> dev
        $routeCollection = $loader->load('validresource.xml');
        $routes = $routeCollection->all();

        $this->assertCount(2, $routes, 'Two routes are loaded');
        $this->assertContainsOnly('Symfony\Component\Routing\Route', $routes);

        foreach ($routes as $route) {
            $this->assertSame('/{foo}/blog/{slug}', $route->getPath());
            $this->assertSame('123', $route->getDefault('foo'));
            $this->assertSame('\d+', $route->getRequirement('foo'));
            $this->assertSame('bar', $route->getOption('foo'));
            $this->assertSame('', $route->getHost());
            $this->assertSame('context.getMethod() == "POST"', $route->getCondition());
        }
    }

<<<<<<< HEAD
=======
    public function testUtf8Route()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/localized']));
        $routeCollection = $loader->load('utf8.xml');
        $routes = $routeCollection->all();

        $this->assertCount(2, $routes, 'Two routes are loaded');
        $this->assertContainsOnly('Symfony\Component\Routing\Route', $routes);

        $utf8Route = $routeCollection->get('app_utf8');

        $this->assertSame('/utf8', $utf8Route->getPath());
        $this->assertTrue($utf8Route->getOption('utf8'), 'Must be utf8');

        $noUtf8Route = $routeCollection->get('app_no_utf8');

        $this->assertSame('/no-utf8', $noUtf8Route->getPath());
        $this->assertFalse($noUtf8Route->getOption('utf8'), 'Must not be utf8');
    }

    public function testLoadLocalized()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('localized.xml');
        $routes = $routeCollection->all();

        $this->assertCount(2, $routes, 'Two routes are loaded');
        $this->assertContainsOnly('Symfony\Component\Routing\Route', $routes);

        $this->assertEquals('/route', $routeCollection->get('localized.fr')->getPath());
        $this->assertEquals('/path', $routeCollection->get('localized.en')->getPath());
    }

    public function testLocalizedImports()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/localized']));
        $routeCollection = $loader->load('importer-with-locale.xml');
        $routes = $routeCollection->all();

        $this->assertCount(2, $routes, 'Two routes are loaded');
        $this->assertContainsOnly('Symfony\Component\Routing\Route', $routes);

        $this->assertEquals('/le-prefix/le-suffix', $routeCollection->get('imported.fr')->getPath());
        $this->assertEquals('/the-prefix/suffix', $routeCollection->get('imported.en')->getPath());
    }

    public function testLocalizedImportsOfNotLocalizedRoutes()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/localized']));
        $routeCollection = $loader->load('importer-with-locale-imports-non-localized-route.xml');
        $routes = $routeCollection->all();

        $this->assertCount(2, $routes, 'Two routes are loaded');
        $this->assertContainsOnly('Symfony\Component\Routing\Route', $routes);

        $this->assertEquals('/le-prefix/suffix', $routeCollection->get('imported.fr')->getPath());
        $this->assertEquals('/the-prefix/suffix', $routeCollection->get('imported.en')->getPath());
    }

>>>>>>> dev
    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider getPathsToInvalidFiles
     */
    public function testLoadThrowsExceptionWithInvalidFile($filePath)
    {
<<<<<<< HEAD
        $loader = new XmlFileLoader(new FileLocator(array(__DIR__.'/../Fixtures')));
=======
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
>>>>>>> dev
        $loader->load($filePath);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider getPathsToInvalidFiles
     */
    public function testLoadThrowsExceptionWithInvalidFileEvenWithoutSchemaValidation($filePath)
    {
<<<<<<< HEAD
        $loader = new CustomXmlFileLoader(new FileLocator(array(__DIR__.'/../Fixtures')));
=======
        $loader = new CustomXmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
>>>>>>> dev
        $loader->load($filePath);
    }

    public function getPathsToInvalidFiles()
    {
<<<<<<< HEAD
        return array(array('nonvalidnode.xml'), array('nonvalidroute.xml'), array('nonvalid.xml'), array('missing_id.xml'), array('missing_path.xml'));
=======
        return [['nonvalidnode.xml'], ['nonvalidroute.xml'], ['nonvalid.xml'], ['missing_id.xml'], ['missing_path.xml']];
>>>>>>> dev
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Document types are not allowed.
     */
    public function testDocTypeIsNotAllowed()
    {
<<<<<<< HEAD
        $loader = new XmlFileLoader(new FileLocator(array(__DIR__.'/../Fixtures')));
=======
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
>>>>>>> dev
        $loader->load('withdoctype.xml');
    }

    public function testNullValues()
    {
<<<<<<< HEAD
        $loader = new XmlFileLoader(new FileLocator(array(__DIR__.'/../Fixtures')));
=======
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
>>>>>>> dev
        $routeCollection = $loader->load('null_values.xml');
        $route = $routeCollection->get('blog_show');

        $this->assertTrue($route->hasDefault('foo'));
        $this->assertNull($route->getDefault('foo'));
        $this->assertTrue($route->hasDefault('bar'));
        $this->assertNull($route->getDefault('bar'));
        $this->assertEquals('foo', $route->getDefault('foobar'));
        $this->assertEquals('bar', $route->getDefault('baz'));
    }
<<<<<<< HEAD
=======

    public function testScalarDataTypeDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('scalar_defaults.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame(
            [
                '_controller' => 'AcmeBlogBundle:Blog:index',
                'slug' => null,
                'published' => true,
                'page' => 1,
                'price' => 3.5,
                'archived' => false,
                'free' => true,
                'locked' => false,
                'foo' => null,
                'bar' => null,
            ],
            $route->getDefaults()
        );
    }

    public function testListDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('list_defaults.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame(
            [
                '_controller' => 'AcmeBlogBundle:Blog:index',
                'values' => [true, 1, 3.5, 'foo'],
            ],
            $route->getDefaults()
        );
    }

    public function testListInListDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('list_in_list_defaults.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame(
            [
                '_controller' => 'AcmeBlogBundle:Blog:index',
                'values' => [[true, 1, 3.5, 'foo']],
            ],
            $route->getDefaults()
        );
    }

    public function testListInMapDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('list_in_map_defaults.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame(
            [
                '_controller' => 'AcmeBlogBundle:Blog:index',
                'values' => ['list' => [true, 1, 3.5, 'foo']],
            ],
            $route->getDefaults()
        );
    }

    public function testMapDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('map_defaults.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame(
            [
                '_controller' => 'AcmeBlogBundle:Blog:index',
                'values' => [
                    'public' => true,
                    'page' => 1,
                    'price' => 3.5,
                    'title' => 'foo',
                ],
            ],
            $route->getDefaults()
        );
    }

    public function testMapInListDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('map_in_list_defaults.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame(
            [
                '_controller' => 'AcmeBlogBundle:Blog:index',
                'values' => [[
                    'public' => true,
                    'page' => 1,
                    'price' => 3.5,
                    'title' => 'foo',
                ]],
            ],
            $route->getDefaults()
        );
    }

    public function testMapInMapDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('map_in_map_defaults.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame(
            [
                '_controller' => 'AcmeBlogBundle:Blog:index',
                'values' => ['map' => [
                    'public' => true,
                    'page' => 1,
                    'price' => 3.5,
                    'title' => 'foo',
                ]],
            ],
            $route->getDefaults()
        );
    }

    public function testNullValuesInList()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('list_null_values.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame([null, null, null, null, null, null], $route->getDefault('list'));
    }

    public function testNullValuesInMap()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures']));
        $routeCollection = $loader->load('map_null_values.xml');
        $route = $routeCollection->get('blog');

        $this->assertSame(
            [
                'boolean' => null,
                'integer' => null,
                'float' => null,
                'string' => null,
                'list' => null,
                'map' => null,
            ],
            $route->getDefault('map')
        );
    }

    public function testLoadRouteWithControllerAttribute()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/controller']));
        $routeCollection = $loader->load('routing.xml');

        $route = $routeCollection->get('app_homepage');

        $this->assertSame('AppBundle:Homepage:show', $route->getDefault('_controller'));
    }

    public function testLoadRouteWithoutControllerAttribute()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/controller']));
        $routeCollection = $loader->load('routing.xml');

        $route = $routeCollection->get('app_logout');

        $this->assertNull($route->getDefault('_controller'));
    }

    public function testLoadRouteWithControllerSetInDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/controller']));
        $routeCollection = $loader->load('routing.xml');

        $route = $routeCollection->get('app_blog');

        $this->assertSame('AppBundle:Blog:list', $route->getDefault('_controller'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /The routing file "[^"]*" must not specify both the "controller" attribute and the defaults key "_controller" for "app_blog"/
     */
    public function testOverrideControllerInDefaults()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/controller']));
        $loader->load('override_defaults.xml');
    }

    /**
     * @dataProvider provideFilesImportingRoutesWithControllers
     */
    public function testImportRouteWithController($file)
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/controller']));
        $routeCollection = $loader->load($file);

        $route = $routeCollection->get('app_homepage');
        $this->assertSame('FrameworkBundle:Template:template', $route->getDefault('_controller'));

        $route = $routeCollection->get('app_blog');
        $this->assertSame('FrameworkBundle:Template:template', $route->getDefault('_controller'));

        $route = $routeCollection->get('app_logout');
        $this->assertSame('FrameworkBundle:Template:template', $route->getDefault('_controller'));
    }

    public function provideFilesImportingRoutesWithControllers()
    {
        yield ['import_controller.xml'];
        yield ['import__controller.xml'];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessageRegExp /The routing file "[^"]*" must not specify both the "controller" attribute and the defaults key "_controller" for the "import" tag/
     */
    public function testImportWithOverriddenController()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/controller']));
        $loader->load('import_override_defaults.xml');
    }

    public function testImportRouteWithGlobMatchingSingleFile()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/glob']));
        $routeCollection = $loader->load('import_single.xml');

        $route = $routeCollection->get('bar_route');
        $this->assertSame('AppBundle:Bar:view', $route->getDefault('_controller'));
    }

    public function testImportRouteWithGlobMatchingMultipleFiles()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/glob']));
        $routeCollection = $loader->load('import_multiple.xml');

        $route = $routeCollection->get('bar_route');
        $this->assertSame('AppBundle:Bar:view', $route->getDefault('_controller'));

        $route = $routeCollection->get('baz_route');
        $this->assertSame('AppBundle:Baz:view', $route->getDefault('_controller'));
    }

    public function testImportRouteWithNamePrefix()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/import_with_name_prefix']));
        $routeCollection = $loader->load('routing.xml');

        $this->assertNotNull($routeCollection->get('app_blog'));
        $this->assertEquals('/blog', $routeCollection->get('app_blog')->getPath());
        $this->assertNotNull($routeCollection->get('api_app_blog'));
        $this->assertEquals('/api/blog', $routeCollection->get('api_app_blog')->getPath());
    }

    public function testImportRouteWithNoTrailingSlash()
    {
        $loader = new XmlFileLoader(new FileLocator([__DIR__.'/../Fixtures/import_with_no_trailing_slash']));
        $routeCollection = $loader->load('routing.xml');

        $this->assertEquals('/slash/', $routeCollection->get('a_app_homepage')->getPath());
        $this->assertEquals('/no-slash', $routeCollection->get('b_app_homepage')->getPath());
    }
>>>>>>> dev
}
