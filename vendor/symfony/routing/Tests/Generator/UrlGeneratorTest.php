<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Tests\Generator;

<<<<<<< HEAD
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;

class UrlGeneratorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class UrlGeneratorTest extends TestCase
>>>>>>> dev
{
    public function testAbsoluteUrlWithPort80()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes)->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $url = $this->getGenerator($routes)->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev

        $this->assertEquals('http://localhost/app.php/testing', $url);
    }

    public function testAbsoluteSecureUrlWithPort443()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes, array('scheme' => 'https'))->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $url = $this->getGenerator($routes, ['scheme' => 'https'])->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev

        $this->assertEquals('https://localhost/app.php/testing', $url);
    }

    public function testAbsoluteUrlWithNonStandardPort()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes, array('httpPort' => 8080))->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $url = $this->getGenerator($routes, ['httpPort' => 8080])->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev

        $this->assertEquals('http://localhost:8080/app.php/testing', $url);
    }

    public function testAbsoluteSecureUrlWithNonStandardPort()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes, array('httpsPort' => 8080, 'scheme' => 'https'))->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $url = $this->getGenerator($routes, ['httpsPort' => 8080, 'scheme' => 'https'])->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev

        $this->assertEquals('https://localhost:8080/app.php/testing', $url);
    }

    public function testRelativeUrlWithoutParameters()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes)->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $url = $this->getGenerator($routes)->generate('test', [], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev

        $this->assertEquals('/app.php/testing', $url);
    }

    public function testRelativeUrlWithParameter()
    {
        $routes = $this->getRoutes('test', new Route('/testing/{foo}'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes)->generate('test', array('foo' => 'bar'), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $url = $this->getGenerator($routes)->generate('test', ['foo' => 'bar'], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev

        $this->assertEquals('/app.php/testing/bar', $url);
    }

    public function testRelativeUrlWithNullParameter()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/testing.{format}', array('format' => null)));
        $url = $this->getGenerator($routes)->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $routes = $this->getRoutes('test', new Route('/testing.{format}', ['format' => null]));
        $url = $this->getGenerator($routes)->generate('test', [], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev

        $this->assertEquals('/app.php/testing', $url);
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testRelativeUrlWithNullParameterButNotOptional()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/testing/{foo}/bar', array('foo' => null)));
        // This must raise an exception because the default requirement for "foo" is "[^/]+" which is not met with these params.
        // Generating path "/testing//bar" would be wrong as matching this route would fail.
        $this->getGenerator($routes)->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $routes = $this->getRoutes('test', new Route('/testing/{foo}/bar', ['foo' => null]));
        // This must raise an exception because the default requirement for "foo" is "[^/]+" which is not met with these params.
        // Generating path "/testing//bar" would be wrong as matching this route would fail.
        $this->getGenerator($routes)->generate('test', [], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev
    }

    public function testRelativeUrlWithOptionalZeroParameter()
    {
        $routes = $this->getRoutes('test', new Route('/testing/{page}'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes)->generate('test', array('page' => 0), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $url = $this->getGenerator($routes)->generate('test', ['page' => 0], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev

        $this->assertEquals('/app.php/testing/0', $url);
    }

    public function testNotPassedOptionalParameterInBetween()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{slug}/{page}', array('slug' => 'index', 'page' => 0)));
        $this->assertSame('/app.php/index/1', $this->getGenerator($routes)->generate('test', array('page' => 1)));
=======
        $routes = $this->getRoutes('test', new Route('/{slug}/{page}', ['slug' => 'index', 'page' => 0]));
        $this->assertSame('/app.php/index/1', $this->getGenerator($routes)->generate('test', ['page' => 1]));
>>>>>>> dev
        $this->assertSame('/app.php/', $this->getGenerator($routes)->generate('test'));
    }

    public function testRelativeUrlWithExtraParameters()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes)->generate('test', array('foo' => 'bar'), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $url = $this->getGenerator($routes)->generate('test', ['foo' => 'bar'], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev

        $this->assertEquals('/app.php/testing?foo=bar', $url);
    }

    public function testAbsoluteUrlWithExtraParameters()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes)->generate('test', array('foo' => 'bar'), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $url = $this->getGenerator($routes)->generate('test', ['foo' => 'bar'], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev

        $this->assertEquals('http://localhost/app.php/testing?foo=bar', $url);
    }

    public function testUrlWithNullExtraParameters()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
<<<<<<< HEAD
        $url = $this->getGenerator($routes)->generate('test', array('foo' => null), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $url = $this->getGenerator($routes)->generate('test', ['foo' => null], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev

        $this->assertEquals('http://localhost/app.php/testing', $url);
    }

    public function testUrlWithExtraParametersFromGlobals()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
        $generator = $this->getGenerator($routes);
        $context = new RequestContext('/app.php');
        $context->setParameter('bar', 'bar');
        $generator->setContext($context);
<<<<<<< HEAD
        $url = $generator->generate('test', array('foo' => 'bar'));
=======
        $url = $generator->generate('test', ['foo' => 'bar']);
>>>>>>> dev

        $this->assertEquals('/app.php/testing?foo=bar', $url);
    }

    public function testUrlWithGlobalParameter()
    {
        $routes = $this->getRoutes('test', new Route('/testing/{foo}'));
        $generator = $this->getGenerator($routes);
        $context = new RequestContext('/app.php');
        $context->setParameter('foo', 'bar');
        $generator->setContext($context);
<<<<<<< HEAD
        $url = $generator->generate('test', array());
=======
        $url = $generator->generate('test', []);
>>>>>>> dev

        $this->assertEquals('/app.php/testing/bar', $url);
    }

    public function testGlobalParameterHasHigherPriorityThanDefault()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{_locale}', array('_locale' => 'en')));
=======
        $routes = $this->getRoutes('test', new Route('/{_locale}', ['_locale' => 'en']));
>>>>>>> dev
        $generator = $this->getGenerator($routes);
        $context = new RequestContext('/app.php');
        $context->setParameter('_locale', 'de');
        $generator->setContext($context);
<<<<<<< HEAD
        $url = $generator->generate('test', array());
=======
        $url = $generator->generate('test', []);
>>>>>>> dev

        $this->assertSame('/app.php/de', $url);
    }

<<<<<<< HEAD
=======
    public function testGenerateWithDefaultLocale()
    {
        $routes = new RouteCollection();

        $route = new Route('');

        $name = 'test';

        foreach (['hr' => '/foo', 'en' => '/bar'] as $locale => $path) {
            $localizedRoute = clone $route;
            $localizedRoute->setDefault('_locale', $locale);
            $localizedRoute->setDefault('_canonical_route', $name);
            $localizedRoute->setPath($path);
            $routes->add($name.'.'.$locale, $localizedRoute);
        }

        $generator = $this->getGenerator($routes, [], null, 'hr');

        $this->assertSame(
            'http://localhost/app.php/foo',
            $generator->generate($name, [], UrlGeneratorInterface::ABSOLUTE_URL)
        );
    }

    public function testGenerateWithOverriddenParameterLocale()
    {
        $routes = new RouteCollection();

        $route = new Route('');

        $name = 'test';

        foreach (['hr' => '/foo', 'en' => '/bar'] as $locale => $path) {
            $localizedRoute = clone $route;
            $localizedRoute->setDefault('_locale', $locale);
            $localizedRoute->setDefault('_canonical_route', $name);
            $localizedRoute->setPath($path);
            $routes->add($name.'.'.$locale, $localizedRoute);
        }

        $generator = $this->getGenerator($routes, [], null, 'hr');

        $this->assertSame(
            'http://localhost/app.php/bar',
            $generator->generate($name, ['_locale' => 'en'], UrlGeneratorInterface::ABSOLUTE_URL)
        );
    }

    public function testGenerateWithOverriddenParameterLocaleFromRequestContext()
    {
        $routes = new RouteCollection();

        $route = new Route('');

        $name = 'test';

        foreach (['hr' => '/foo', 'en' => '/bar'] as $locale => $path) {
            $localizedRoute = clone $route;
            $localizedRoute->setDefault('_locale', $locale);
            $localizedRoute->setDefault('_canonical_route', $name);
            $localizedRoute->setPath($path);
            $routes->add($name.'.'.$locale, $localizedRoute);
        }

        $generator = $this->getGenerator($routes, [], null, 'hr');

        $context = new RequestContext('/app.php');
        $context->setParameter('_locale', 'en');
        $generator->setContext($context);

        $this->assertSame(
            'http://localhost/app.php/bar',
            $generator->generate($name, [], UrlGeneratorInterface::ABSOLUTE_URL)
        );
    }

>>>>>>> dev
    /**
     * @expectedException \Symfony\Component\Routing\Exception\RouteNotFoundException
     */
    public function testGenerateWithoutRoutes()
    {
        $routes = $this->getRoutes('foo', new Route('/testing/{foo}'));
<<<<<<< HEAD
        $this->getGenerator($routes)->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $this->getGenerator($routes)->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL);
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\RouteNotFoundException
     */
    public function testGenerateWithInvalidLocale()
    {
        $routes = new RouteCollection();

        $route = new Route('');

        $name = 'test';

        foreach (['hr' => '/foo', 'en' => '/bar'] as $locale => $path) {
            $localizedRoute = clone $route;
            $localizedRoute->setDefault('_locale', $locale);
            $localizedRoute->setDefault('_canonical_route', $name);
            $localizedRoute->setPath($path);
            $routes->add($name.'.'.$locale, $localizedRoute);
        }

        $generator = $this->getGenerator($routes, [], null, 'fr');
        $generator->generate($name);
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\MissingMandatoryParametersException
     */
    public function testGenerateForRouteWithoutMandatoryParameter()
    {
        $routes = $this->getRoutes('test', new Route('/testing/{foo}'));
<<<<<<< HEAD
        $this->getGenerator($routes)->generate('test', array(), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $this->getGenerator($routes)->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testGenerateForRouteWithInvalidOptionalParameter()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', array('foo' => '1'), array('foo' => 'd+')));
        $this->getGenerator($routes)->generate('test', array('foo' => 'bar'), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', ['foo' => '1'], ['foo' => 'd+']));
        $this->getGenerator($routes)->generate('test', ['foo' => 'bar'], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testGenerateForRouteWithInvalidParameter()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', array(), array('foo' => '1|2')));
        $this->getGenerator($routes)->generate('test', array('foo' => '0'), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', [], ['foo' => '1|2']));
        $this->getGenerator($routes)->generate('test', ['foo' => '0'], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev
    }

    public function testGenerateForRouteWithInvalidOptionalParameterNonStrict()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', array('foo' => '1'), array('foo' => 'd+')));
        $generator = $this->getGenerator($routes);
        $generator->setStrictRequirements(false);
        $this->assertNull($generator->generate('test', array('foo' => 'bar'), UrlGeneratorInterface::ABSOLUTE_URL));
=======
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', ['foo' => '1'], ['foo' => 'd+']));
        $generator = $this->getGenerator($routes);
        $generator->setStrictRequirements(false);
        $this->assertNull($generator->generate('test', ['foo' => 'bar'], UrlGeneratorInterface::ABSOLUTE_URL));
>>>>>>> dev
    }

    public function testGenerateForRouteWithInvalidOptionalParameterNonStrictWithLogger()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', array('foo' => '1'), array('foo' => 'd+')));
        $logger = $this->getMock('Psr\Log\LoggerInterface');
        $logger->expects($this->once())
            ->method('error');
        $generator = $this->getGenerator($routes, array(), $logger);
        $generator->setStrictRequirements(false);
        $this->assertNull($generator->generate('test', array('foo' => 'bar'), UrlGeneratorInterface::ABSOLUTE_URL));
=======
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', ['foo' => '1'], ['foo' => 'd+']));
        $logger = $this->getMockBuilder('Psr\Log\LoggerInterface')->getMock();
        $logger->expects($this->once())
            ->method('error');
        $generator = $this->getGenerator($routes, [], $logger);
        $generator->setStrictRequirements(false);
        $this->assertNull($generator->generate('test', ['foo' => 'bar'], UrlGeneratorInterface::ABSOLUTE_URL));
>>>>>>> dev
    }

    public function testGenerateForRouteWithInvalidParameterButDisabledRequirementsCheck()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', array('foo' => '1'), array('foo' => 'd+')));
        $generator = $this->getGenerator($routes);
        $generator->setStrictRequirements(null);
        $this->assertSame('/app.php/testing/bar', $generator->generate('test', array('foo' => 'bar')));
=======
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', ['foo' => '1'], ['foo' => 'd+']));
        $generator = $this->getGenerator($routes);
        $generator->setStrictRequirements(null);
        $this->assertSame('/app.php/testing/bar', $generator->generate('test', ['foo' => 'bar']));
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testGenerateForRouteWithInvalidMandatoryParameter()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', array(), array('foo' => 'd+')));
        $this->getGenerator($routes)->generate('test', array('foo' => 'bar'), UrlGeneratorInterface::ABSOLUTE_URL);
=======
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', [], ['foo' => 'd+']));
        $this->getGenerator($routes)->generate('test', ['foo' => 'bar'], UrlGeneratorInterface::ABSOLUTE_URL);
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testGenerateForRouteWithInvalidUtf8Parameter()
    {
        $routes = $this->getRoutes('test', new Route('/testing/{foo}', [], ['foo' => '\pL+'], ['utf8' => true]));
        $this->getGenerator($routes)->generate('test', ['foo' => 'abc123'], UrlGeneratorInterface::ABSOLUTE_URL);
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testRequiredParamAndEmptyPassed()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{slug}', array(), array('slug' => '.+')));
        $this->getGenerator($routes)->generate('test', array('slug' => ''));
=======
        $routes = $this->getRoutes('test', new Route('/{slug}', [], ['slug' => '.+']));
        $this->getGenerator($routes)->generate('test', ['slug' => '']);
>>>>>>> dev
    }

    public function testSchemeRequirementDoesNothingIfSameCurrentScheme()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/', array(), array(), array(), '', array('http')));
        $this->assertEquals('/app.php/', $this->getGenerator($routes)->generate('test'));

        $routes = $this->getRoutes('test', new Route('/', array(), array(), array(), '', array('https')));
        $this->assertEquals('/app.php/', $this->getGenerator($routes, array('scheme' => 'https'))->generate('test'));
=======
        $routes = $this->getRoutes('test', new Route('/', [], [], [], '', ['http']));
        $this->assertEquals('/app.php/', $this->getGenerator($routes)->generate('test'));

        $routes = $this->getRoutes('test', new Route('/', [], [], [], '', ['https']));
        $this->assertEquals('/app.php/', $this->getGenerator($routes, ['scheme' => 'https'])->generate('test'));
>>>>>>> dev
    }

    public function testSchemeRequirementForcesAbsoluteUrl()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/', array(), array(), array(), '', array('https')));
        $this->assertEquals('https://localhost/app.php/', $this->getGenerator($routes)->generate('test'));

        $routes = $this->getRoutes('test', new Route('/', array(), array(), array(), '', array('http')));
        $this->assertEquals('http://localhost/app.php/', $this->getGenerator($routes, array('scheme' => 'https'))->generate('test'));
=======
        $routes = $this->getRoutes('test', new Route('/', [], [], [], '', ['https']));
        $this->assertEquals('https://localhost/app.php/', $this->getGenerator($routes)->generate('test'));

        $routes = $this->getRoutes('test', new Route('/', [], [], [], '', ['http']));
        $this->assertEquals('http://localhost/app.php/', $this->getGenerator($routes, ['scheme' => 'https'])->generate('test'));
>>>>>>> dev
    }

    public function testSchemeRequirementCreatesUrlForFirstRequiredScheme()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/', array(), array(), array(), '', array('Ftp', 'https')));
=======
        $routes = $this->getRoutes('test', new Route('/', [], [], [], '', ['Ftp', 'https']));
>>>>>>> dev
        $this->assertEquals('ftp://localhost/app.php/', $this->getGenerator($routes)->generate('test'));
    }

    public function testPathWithTwoStartingSlashes()
    {
        $routes = $this->getRoutes('test', new Route('//path-and-not-domain'));

        // this must not generate '//path-and-not-domain' because that would be a network path
<<<<<<< HEAD
        $this->assertSame('/path-and-not-domain', $this->getGenerator($routes, array('BaseUrl' => ''))->generate('test'));
=======
        $this->assertSame('/path-and-not-domain', $this->getGenerator($routes, ['BaseUrl' => ''])->generate('test'));
>>>>>>> dev
    }

    public function testNoTrailingSlashForMultipleOptionalParameters()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/category/{slug1}/{slug2}/{slug3}', array('slug2' => null, 'slug3' => null)));

        $this->assertEquals('/app.php/category/foo', $this->getGenerator($routes)->generate('test', array('slug1' => 'foo')));
=======
        $routes = $this->getRoutes('test', new Route('/category/{slug1}/{slug2}/{slug3}', ['slug2' => null, 'slug3' => null]));

        $this->assertEquals('/app.php/category/foo', $this->getGenerator($routes)->generate('test', ['slug1' => 'foo']));
>>>>>>> dev
    }

    public function testWithAnIntegerAsADefaultValue()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{default}', array('default' => 0)));

        $this->assertEquals('/app.php/foo', $this->getGenerator($routes)->generate('test', array('default' => 'foo')));
=======
        $routes = $this->getRoutes('test', new Route('/{default}', ['default' => 0]));

        $this->assertEquals('/app.php/foo', $this->getGenerator($routes)->generate('test', ['default' => 'foo']));
>>>>>>> dev
    }

    public function testNullForOptionalParameterIsIgnored()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/test/{default}', array('default' => 0)));

        $this->assertEquals('/app.php/test', $this->getGenerator($routes)->generate('test', array('default' => null)));
=======
        $routes = $this->getRoutes('test', new Route('/test/{default}', ['default' => 0]));

        $this->assertEquals('/app.php/test', $this->getGenerator($routes)->generate('test', ['default' => null]));
>>>>>>> dev
    }

    public function testQueryParamSameAsDefault()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/test', array('page' => 1)));

        $this->assertSame('/app.php/test?page=2', $this->getGenerator($routes)->generate('test', array('page' => 2)));
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test', array('page' => 1)));
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test', array('page' => '1')));
=======
        $routes = $this->getRoutes('test', new Route('/test', ['page' => 1]));

        $this->assertSame('/app.php/test?page=2', $this->getGenerator($routes)->generate('test', ['page' => 2]));
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test', ['page' => 1]));
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test', ['page' => '1']));
>>>>>>> dev
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test'));
    }

    public function testArrayQueryParamSameAsDefault()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/test', array('array' => array('foo', 'bar'))));

        $this->assertSame('/app.php/test?array%5B0%5D=bar&array%5B1%5D=foo', $this->getGenerator($routes)->generate('test', array('array' => array('bar', 'foo'))));
        $this->assertSame('/app.php/test?array%5Ba%5D=foo&array%5Bb%5D=bar', $this->getGenerator($routes)->generate('test', array('array' => array('a' => 'foo', 'b' => 'bar'))));
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test', array('array' => array('foo', 'bar'))));
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test', array('array' => array(1 => 'bar', 0 => 'foo'))));
=======
        $routes = $this->getRoutes('test', new Route('/test', ['array' => ['foo', 'bar']]));

        $this->assertSame('/app.php/test?array%5B0%5D=bar&array%5B1%5D=foo', $this->getGenerator($routes)->generate('test', ['array' => ['bar', 'foo']]));
        $this->assertSame('/app.php/test?array%5Ba%5D=foo&array%5Bb%5D=bar', $this->getGenerator($routes)->generate('test', ['array' => ['a' => 'foo', 'b' => 'bar']]));
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test', ['array' => ['foo', 'bar']]));
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test', ['array' => [1 => 'bar', 0 => 'foo']]));
>>>>>>> dev
        $this->assertSame('/app.php/test', $this->getGenerator($routes)->generate('test'));
    }

    public function testGenerateWithSpecialRouteName()
    {
        $routes = $this->getRoutes('$péß^a|', new Route('/bar'));

        $this->assertSame('/app.php/bar', $this->getGenerator($routes)->generate('$péß^a|'));
    }

    public function testUrlEncoding()
    {
<<<<<<< HEAD
        // This tests the encoding of reserved characters that are used for delimiting of URI components (defined in RFC 3986)
        // and other special ASCII chars. These chars are tested as static text path, variable path and query param.
        $chars = '@:[]/()*\'" +,;-._~&$<>|{}%\\^`!?foo=bar#id';
        $routes = $this->getRoutes('test', new Route("/$chars/{varpath}", array(), array('varpath' => '.+')));
        $this->assertSame('/app.php/@:%5B%5D/%28%29*%27%22%20+,;-._~%26%24%3C%3E|%7B%7D%25%5C%5E%60!%3Ffoo=bar%23id'
           .'/@:%5B%5D/%28%29*%27%22%20+,;-._~%26%24%3C%3E|%7B%7D%25%5C%5E%60!%3Ffoo=bar%23id'
           .'?query=%40%3A%5B%5D/%28%29%2A%27%22+%2B%2C%3B-._%7E%26%24%3C%3E%7C%7B%7D%25%5C%5E%60%21%3Ffoo%3Dbar%23id',
            $this->getGenerator($routes)->generate('test', array(
                'varpath' => $chars,
                'query' => $chars,
            ))
        );
=======
        $expectedPath = '/app.php/@:%5B%5D/%28%29*%27%22%20+,;-._~%26%24%3C%3E|%7B%7D%25%5C%5E%60!%3Ffoo=bar%23id'
            .'/@:%5B%5D/%28%29*%27%22%20+,;-._~%26%24%3C%3E|%7B%7D%25%5C%5E%60!%3Ffoo=bar%23id'
            .'?query=%40%3A%5B%5D/%28%29%2A%27%22%20%2B%2C%3B-._~%26%24%3C%3E%7C%7B%7D%25%5C%5E%60%21%3Ffoo%3Dbar%23id';

        // This tests the encoding of reserved characters that are used for delimiting of URI components (defined in RFC 3986)
        // and other special ASCII chars. These chars are tested as static text path, variable path and query param.
        $chars = '@:[]/()*\'" +,;-._~&$<>|{}%\\^`!?foo=bar#id';
        $routes = $this->getRoutes('test', new Route("/$chars/{varpath}", [], ['varpath' => '.+']));
        $this->assertSame($expectedPath, $this->getGenerator($routes)->generate('test', [
            'varpath' => $chars,
            'query' => $chars,
        ]));
>>>>>>> dev
    }

    public function testEncodingOfRelativePathSegments()
    {
        $routes = $this->getRoutes('test', new Route('/dir/../dir/..'));
        $this->assertSame('/app.php/dir/%2E%2E/dir/%2E%2E', $this->getGenerator($routes)->generate('test'));
        $routes = $this->getRoutes('test', new Route('/dir/./dir/.'));
        $this->assertSame('/app.php/dir/%2E/dir/%2E', $this->getGenerator($routes)->generate('test'));
        $routes = $this->getRoutes('test', new Route('/a./.a/a../..a/...'));
        $this->assertSame('/app.php/a./.a/a../..a/...', $this->getGenerator($routes)->generate('test'));
    }

    public function testAdjacentVariables()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{x}{y}{z}.{_format}', array('z' => 'default-z', '_format' => 'html'), array('y' => '\d+')));
        $generator = $this->getGenerator($routes);
        $this->assertSame('/app.php/foo123', $generator->generate('test', array('x' => 'foo', 'y' => '123')));
        $this->assertSame('/app.php/foo123bar.xml', $generator->generate('test', array('x' => 'foo', 'y' => '123', 'z' => 'bar', '_format' => 'xml')));

        // The default requirement for 'x' should not allow the separator '.' in this case because it would otherwise match everything
        // and following optional variables like _format could never match.
        $this->setExpectedException('Symfony\Component\Routing\Exception\InvalidParameterException');
        $generator->generate('test', array('x' => 'do.t', 'y' => '123', 'z' => 'bar', '_format' => 'xml'));
=======
        $routes = $this->getRoutes('test', new Route('/{x}{y}{z}.{_format}', ['z' => 'default-z', '_format' => 'html'], ['y' => '\d+']));
        $generator = $this->getGenerator($routes);
        $this->assertSame('/app.php/foo123', $generator->generate('test', ['x' => 'foo', 'y' => '123']));
        $this->assertSame('/app.php/foo123bar.xml', $generator->generate('test', ['x' => 'foo', 'y' => '123', 'z' => 'bar', '_format' => 'xml']));

        // The default requirement for 'x' should not allow the separator '.' in this case because it would otherwise match everything
        // and following optional variables like _format could never match.
        $this->{method_exists($this, $_ = 'expectException') ? $_ : 'setExpectedException'}('Symfony\Component\Routing\Exception\InvalidParameterException');
        $generator->generate('test', ['x' => 'do.t', 'y' => '123', 'z' => 'bar', '_format' => 'xml']);
>>>>>>> dev
    }

    public function testOptionalVariableWithNoRealSeparator()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/get{what}', array('what' => 'All')));
        $generator = $this->getGenerator($routes);

        $this->assertSame('/app.php/get', $generator->generate('test'));
        $this->assertSame('/app.php/getSites', $generator->generate('test', array('what' => 'Sites')));
=======
        $routes = $this->getRoutes('test', new Route('/get{what}', ['what' => 'All']));
        $generator = $this->getGenerator($routes);

        $this->assertSame('/app.php/get', $generator->generate('test'));
        $this->assertSame('/app.php/getSites', $generator->generate('test', ['what' => 'Sites']));
>>>>>>> dev
    }

    public function testRequiredVariableWithNoRealSeparator()
    {
        $routes = $this->getRoutes('test', new Route('/get{what}Suffix'));
        $generator = $this->getGenerator($routes);

<<<<<<< HEAD
        $this->assertSame('/app.php/getSitesSuffix', $generator->generate('test', array('what' => 'Sites')));
=======
        $this->assertSame('/app.php/getSitesSuffix', $generator->generate('test', ['what' => 'Sites']));
>>>>>>> dev
    }

    public function testDefaultRequirementOfVariable()
    {
        $routes = $this->getRoutes('test', new Route('/{page}.{_format}'));
        $generator = $this->getGenerator($routes);

<<<<<<< HEAD
        $this->assertSame('/app.php/index.mobile.html', $generator->generate('test', array('page' => 'index', '_format' => 'mobile.html')));
=======
        $this->assertSame('/app.php/index.mobile.html', $generator->generate('test', ['page' => 'index', '_format' => 'mobile.html']));
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testDefaultRequirementOfVariableDisallowsSlash()
    {
        $routes = $this->getRoutes('test', new Route('/{page}.{_format}'));
<<<<<<< HEAD
        $this->getGenerator($routes)->generate('test', array('page' => 'index', '_format' => 'sl/ash'));
=======
        $this->getGenerator($routes)->generate('test', ['page' => 'index', '_format' => 'sl/ash']);
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testDefaultRequirementOfVariableDisallowsNextSeparator()
    {
        $routes = $this->getRoutes('test', new Route('/{page}.{_format}'));
<<<<<<< HEAD
        $this->getGenerator($routes)->generate('test', array('page' => 'do.t', '_format' => 'html'));
=======
        $this->getGenerator($routes)->generate('test', ['page' => 'do.t', '_format' => 'html']);
>>>>>>> dev
    }

    public function testWithHostDifferentFromContext()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{name}', array(), array(), array(), '{locale}.example.com'));

        $this->assertEquals('//fr.example.com/app.php/Fabien', $this->getGenerator($routes)->generate('test', array('name' => 'Fabien', 'locale' => 'fr')));
=======
        $routes = $this->getRoutes('test', new Route('/{name}', [], [], [], '{locale}.example.com'));

        $this->assertEquals('//fr.example.com/app.php/Fabien', $this->getGenerator($routes)->generate('test', ['name' => 'Fabien', 'locale' => 'fr']));
>>>>>>> dev
    }

    public function testWithHostSameAsContext()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{name}', array(), array(), array(), '{locale}.example.com'));

        $this->assertEquals('/app.php/Fabien', $this->getGenerator($routes, array('host' => 'fr.example.com'))->generate('test', array('name' => 'Fabien', 'locale' => 'fr')));
=======
        $routes = $this->getRoutes('test', new Route('/{name}', [], [], [], '{locale}.example.com'));

        $this->assertEquals('/app.php/Fabien', $this->getGenerator($routes, ['host' => 'fr.example.com'])->generate('test', ['name' => 'Fabien', 'locale' => 'fr']));
>>>>>>> dev
    }

    public function testWithHostSameAsContextAndAbsolute()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{name}', array(), array(), array(), '{locale}.example.com'));

        $this->assertEquals('http://fr.example.com/app.php/Fabien', $this->getGenerator($routes, array('host' => 'fr.example.com'))->generate('test', array('name' => 'Fabien', 'locale' => 'fr'), UrlGeneratorInterface::ABSOLUTE_URL));
=======
        $routes = $this->getRoutes('test', new Route('/{name}', [], [], [], '{locale}.example.com'));

        $this->assertEquals('http://fr.example.com/app.php/Fabien', $this->getGenerator($routes, ['host' => 'fr.example.com'])->generate('test', ['name' => 'Fabien', 'locale' => 'fr'], UrlGeneratorInterface::ABSOLUTE_URL));
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testUrlWithInvalidParameterInHost()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/', array(), array('foo' => 'bar'), array(), '{foo}.example.com'));
        $this->getGenerator($routes)->generate('test', array('foo' => 'baz'), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $routes = $this->getRoutes('test', new Route('/', [], ['foo' => 'bar'], [], '{foo}.example.com'));
        $this->getGenerator($routes)->generate('test', ['foo' => 'baz'], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testUrlWithInvalidParameterInHostWhenParamHasADefaultValue()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/', array('foo' => 'bar'), array('foo' => 'bar'), array(), '{foo}.example.com'));
        $this->getGenerator($routes)->generate('test', array('foo' => 'baz'), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $routes = $this->getRoutes('test', new Route('/', ['foo' => 'bar'], ['foo' => 'bar'], [], '{foo}.example.com'));
        $this->getGenerator($routes)->generate('test', ['foo' => 'baz'], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev
    }

    /**
     * @expectedException \Symfony\Component\Routing\Exception\InvalidParameterException
     */
    public function testUrlWithInvalidParameterEqualsDefaultValueInHost()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/', array('foo' => 'baz'), array('foo' => 'bar'), array(), '{foo}.example.com'));
        $this->getGenerator($routes)->generate('test', array('foo' => 'baz'), UrlGeneratorInterface::ABSOLUTE_PATH);
=======
        $routes = $this->getRoutes('test', new Route('/', ['foo' => 'baz'], ['foo' => 'bar'], [], '{foo}.example.com'));
        $this->getGenerator($routes)->generate('test', ['foo' => 'baz'], UrlGeneratorInterface::ABSOLUTE_PATH);
>>>>>>> dev
    }

    public function testUrlWithInvalidParameterInHostInNonStrictMode()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/', array(), array('foo' => 'bar'), array(), '{foo}.example.com'));
        $generator = $this->getGenerator($routes);
        $generator->setStrictRequirements(false);
        $this->assertNull($generator->generate('test', array('foo' => 'baz'), UrlGeneratorInterface::ABSOLUTE_PATH));
=======
        $routes = $this->getRoutes('test', new Route('/', [], ['foo' => 'bar'], [], '{foo}.example.com'));
        $generator = $this->getGenerator($routes);
        $generator->setStrictRequirements(false);
        $this->assertNull($generator->generate('test', ['foo' => 'baz'], UrlGeneratorInterface::ABSOLUTE_PATH));
>>>>>>> dev
    }

    public function testHostIsCaseInsensitive()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/', array(), array('locale' => 'en|de|fr'), array(), '{locale}.FooBar.com'));
        $generator = $this->getGenerator($routes);
        $this->assertSame('//EN.FooBar.com/app.php/', $generator->generate('test', array('locale' => 'EN'), UrlGeneratorInterface::NETWORK_PATH));
=======
        $routes = $this->getRoutes('test', new Route('/', [], ['locale' => 'en|de|fr'], [], '{locale}.FooBar.com'));
        $generator = $this->getGenerator($routes);
        $this->assertSame('//EN.FooBar.com/app.php/', $generator->generate('test', ['locale' => 'EN'], UrlGeneratorInterface::NETWORK_PATH));
    }

    public function testDefaultHostIsUsedWhenContextHostIsEmpty()
    {
        $routes = $this->getRoutes('test', new Route('/route', ['domain' => 'my.fallback.host'], ['domain' => '.+'], [], '{domain}', ['http']));

        $generator = $this->getGenerator($routes);
        $generator->getContext()->setHost('');

        $this->assertSame('http://my.fallback.host/app.php/route', $generator->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL));
    }

    public function testDefaultHostIsUsedWhenContextHostIsEmptyAndSchemeIsNot()
    {
        $routes = $this->getRoutes('test', new Route('/route', ['domain' => 'my.fallback.host'], ['domain' => '.+'], [], '{domain}', ['http', 'https']));

        $generator = $this->getGenerator($routes);
        $generator->getContext()->setHost('');
        $generator->getContext()->setScheme('https');

        $this->assertSame('https://my.fallback.host/app.php/route', $generator->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL));
    }

    public function testAbsoluteUrlFallbackToRelativeIfHostIsEmptyAndSchemeIsNot()
    {
        $routes = $this->getRoutes('test', new Route('/route', [], [], [], '', ['http', 'https']));

        $generator = $this->getGenerator($routes);
        $generator->getContext()->setHost('');
        $generator->getContext()->setScheme('https');

        $this->assertSame('/app.php/route', $generator->generate('test', [], UrlGeneratorInterface::ABSOLUTE_URL));
>>>>>>> dev
    }

    public function testGenerateNetworkPath()
    {
<<<<<<< HEAD
        $routes = $this->getRoutes('test', new Route('/{name}', array(), array(), array(), '{locale}.example.com', array('http')));

        $this->assertSame('//fr.example.com/app.php/Fabien', $this->getGenerator($routes)->generate('test',
            array('name' => 'Fabien', 'locale' => 'fr'), UrlGeneratorInterface::NETWORK_PATH), 'network path with different host'
        );
        $this->assertSame('//fr.example.com/app.php/Fabien?query=string', $this->getGenerator($routes, array('host' => 'fr.example.com'))->generate('test',
            array('name' => 'Fabien', 'locale' => 'fr', 'query' => 'string'), UrlGeneratorInterface::NETWORK_PATH), 'network path although host same as context'
        );
        $this->assertSame('http://fr.example.com/app.php/Fabien', $this->getGenerator($routes, array('scheme' => 'https'))->generate('test',
            array('name' => 'Fabien', 'locale' => 'fr'), UrlGeneratorInterface::NETWORK_PATH), 'absolute URL because scheme requirement does not match context'
        );
        $this->assertSame('http://fr.example.com/app.php/Fabien', $this->getGenerator($routes)->generate('test',
            array('name' => 'Fabien', 'locale' => 'fr'), UrlGeneratorInterface::ABSOLUTE_URL), 'absolute URL with same scheme because it is requested'
=======
        $routes = $this->getRoutes('test', new Route('/{name}', [], [], [], '{locale}.example.com', ['http']));

        $this->assertSame('//fr.example.com/app.php/Fabien', $this->getGenerator($routes)->generate('test',
            ['name' => 'Fabien', 'locale' => 'fr'], UrlGeneratorInterface::NETWORK_PATH), 'network path with different host'
        );
        $this->assertSame('//fr.example.com/app.php/Fabien?query=string', $this->getGenerator($routes, ['host' => 'fr.example.com'])->generate('test',
            ['name' => 'Fabien', 'locale' => 'fr', 'query' => 'string'], UrlGeneratorInterface::NETWORK_PATH), 'network path although host same as context'
        );
        $this->assertSame('http://fr.example.com/app.php/Fabien', $this->getGenerator($routes, ['scheme' => 'https'])->generate('test',
            ['name' => 'Fabien', 'locale' => 'fr'], UrlGeneratorInterface::NETWORK_PATH), 'absolute URL because scheme requirement does not match context'
        );
        $this->assertSame('http://fr.example.com/app.php/Fabien', $this->getGenerator($routes)->generate('test',
            ['name' => 'Fabien', 'locale' => 'fr'], UrlGeneratorInterface::ABSOLUTE_URL), 'absolute URL with same scheme because it is requested'
>>>>>>> dev
        );
    }

    public function testGenerateRelativePath()
    {
        $routes = new RouteCollection();
        $routes->add('article', new Route('/{author}/{article}/'));
        $routes->add('comments', new Route('/{author}/{article}/comments'));
<<<<<<< HEAD
        $routes->add('host', new Route('/{article}', array(), array(), array(), '{author}.example.com'));
        $routes->add('scheme', new Route('/{author}/blog', array(), array(), array(), '', array('https')));
        $routes->add('unrelated', new Route('/about'));

        $generator = $this->getGenerator($routes, array('host' => 'example.com', 'pathInfo' => '/fabien/symfony-is-great/'));

        $this->assertSame('comments', $generator->generate('comments',
            array('author' => 'fabien', 'article' => 'symfony-is-great'), UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('comments?page=2', $generator->generate('comments',
            array('author' => 'fabien', 'article' => 'symfony-is-great', 'page' => 2), UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('../twig-is-great/', $generator->generate('article',
            array('author' => 'fabien', 'article' => 'twig-is-great'), UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('../../bernhard/forms-are-great/', $generator->generate('article',
            array('author' => 'bernhard', 'article' => 'forms-are-great'), UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('//bernhard.example.com/app.php/forms-are-great', $generator->generate('host',
            array('author' => 'bernhard', 'article' => 'forms-are-great'), UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('https://example.com/app.php/bernhard/blog', $generator->generate('scheme',
                array('author' => 'bernhard'), UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('../../about', $generator->generate('unrelated',
            array(), UrlGeneratorInterface::RELATIVE_PATH)
=======
        $routes->add('host', new Route('/{article}', [], [], [], '{author}.example.com'));
        $routes->add('scheme', new Route('/{author}/blog', [], [], [], '', ['https']));
        $routes->add('unrelated', new Route('/about'));

        $generator = $this->getGenerator($routes, ['host' => 'example.com', 'pathInfo' => '/fabien/symfony-is-great/']);

        $this->assertSame('comments', $generator->generate('comments',
            ['author' => 'fabien', 'article' => 'symfony-is-great'], UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('comments?page=2', $generator->generate('comments',
            ['author' => 'fabien', 'article' => 'symfony-is-great', 'page' => 2], UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('../twig-is-great/', $generator->generate('article',
            ['author' => 'fabien', 'article' => 'twig-is-great'], UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('../../bernhard/forms-are-great/', $generator->generate('article',
            ['author' => 'bernhard', 'article' => 'forms-are-great'], UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('//bernhard.example.com/app.php/forms-are-great', $generator->generate('host',
            ['author' => 'bernhard', 'article' => 'forms-are-great'], UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('https://example.com/app.php/bernhard/blog', $generator->generate('scheme',
                ['author' => 'bernhard'], UrlGeneratorInterface::RELATIVE_PATH)
        );
        $this->assertSame('../../about', $generator->generate('unrelated',
            [], UrlGeneratorInterface::RELATIVE_PATH)
>>>>>>> dev
        );
    }

    /**
     * @dataProvider provideRelativePaths
     */
    public function testGetRelativePath($sourcePath, $targetPath, $expectedPath)
    {
        $this->assertSame($expectedPath, UrlGenerator::getRelativePath($sourcePath, $targetPath));
    }

    public function provideRelativePaths()
    {
<<<<<<< HEAD
        return array(
            array(
                '/same/dir/',
                '/same/dir/',
                '',
            ),
            array(
                '/same/file',
                '/same/file',
                '',
            ),
            array(
                '/',
                '/file',
                'file',
            ),
            array(
                '/',
                '/dir/file',
                'dir/file',
            ),
            array(
                '/dir/file.html',
                '/dir/different-file.html',
                'different-file.html',
            ),
            array(
                '/same/dir/extra-file',
                '/same/dir/',
                './',
            ),
            array(
                '/parent/dir/',
                '/parent/',
                '../',
            ),
            array(
                '/parent/dir/extra-file',
                '/parent/',
                '../',
            ),
            array(
                '/a/b/',
                '/x/y/z/',
                '../../x/y/z/',
            ),
            array(
                '/a/b/c/d/e',
                '/a/c/d',
                '../../../c/d',
            ),
            array(
                '/a/b/c//',
                '/a/b/c/',
                '../',
            ),
            array(
                '/a/b/c/',
                '/a/b/c//',
                './/',
            ),
            array(
                '/root/a/b/c/',
                '/root/x/b/c/',
                '../../../x/b/c/',
            ),
            array(
                '/a/b/c/d/',
                '/a',
                '../../../../a',
            ),
            array(
                '/special-chars/sp%20ce/1€/mäh/e=mc²',
                '/special-chars/sp%20ce/1€/<µ>/e=mc²',
                '../<µ>/e=mc²',
            ),
            array(
                'not-rooted',
                'dir/file',
                'dir/file',
            ),
            array(
                '//dir/',
                '',
                '../../',
            ),
            array(
                '/dir/',
                '/dir/file:with-colon',
                './file:with-colon',
            ),
            array(
                '/dir/',
                '/dir/subdir/file:with-colon',
                'subdir/file:with-colon',
            ),
            array(
                '/dir/',
                '/dir/:subdir/',
                './:subdir/',
            ),
        );
    }

    protected function getGenerator(RouteCollection $routes, array $parameters = array(), $logger = null)
=======
        return [
            [
                '/same/dir/',
                '/same/dir/',
                '',
            ],
            [
                '/same/file',
                '/same/file',
                '',
            ],
            [
                '/',
                '/file',
                'file',
            ],
            [
                '/',
                '/dir/file',
                'dir/file',
            ],
            [
                '/dir/file.html',
                '/dir/different-file.html',
                'different-file.html',
            ],
            [
                '/same/dir/extra-file',
                '/same/dir/',
                './',
            ],
            [
                '/parent/dir/',
                '/parent/',
                '../',
            ],
            [
                '/parent/dir/extra-file',
                '/parent/',
                '../',
            ],
            [
                '/a/b/',
                '/x/y/z/',
                '../../x/y/z/',
            ],
            [
                '/a/b/c/d/e',
                '/a/c/d',
                '../../../c/d',
            ],
            [
                '/a/b/c//',
                '/a/b/c/',
                '../',
            ],
            [
                '/a/b/c/',
                '/a/b/c//',
                './/',
            ],
            [
                '/root/a/b/c/',
                '/root/x/b/c/',
                '../../../x/b/c/',
            ],
            [
                '/a/b/c/d/',
                '/a',
                '../../../../a',
            ],
            [
                '/special-chars/sp%20ce/1€/mäh/e=mc²',
                '/special-chars/sp%20ce/1€/<µ>/e=mc²',
                '../<µ>/e=mc²',
            ],
            [
                'not-rooted',
                'dir/file',
                'dir/file',
            ],
            [
                '//dir/',
                '',
                '../../',
            ],
            [
                '/dir/',
                '/dir/file:with-colon',
                './file:with-colon',
            ],
            [
                '/dir/',
                '/dir/subdir/file:with-colon',
                'subdir/file:with-colon',
            ],
            [
                '/dir/',
                '/dir/:subdir/',
                './:subdir/',
            ],
        ];
    }

    public function testFragmentsCanBeAppendedToUrls()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));

        $url = $this->getGenerator($routes)->generate('test', ['_fragment' => 'frag ment'], UrlGeneratorInterface::ABSOLUTE_PATH);
        $this->assertEquals('/app.php/testing#frag%20ment', $url);

        $url = $this->getGenerator($routes)->generate('test', ['_fragment' => '0'], UrlGeneratorInterface::ABSOLUTE_PATH);
        $this->assertEquals('/app.php/testing#0', $url);
    }

    public function testFragmentsDoNotEscapeValidCharacters()
    {
        $routes = $this->getRoutes('test', new Route('/testing'));
        $url = $this->getGenerator($routes)->generate('test', ['_fragment' => '?/'], UrlGeneratorInterface::ABSOLUTE_PATH);

        $this->assertEquals('/app.php/testing#?/', $url);
    }

    public function testFragmentsCanBeDefinedAsDefaults()
    {
        $routes = $this->getRoutes('test', new Route('/testing', ['_fragment' => 'fragment']));
        $url = $this->getGenerator($routes)->generate('test', [], UrlGeneratorInterface::ABSOLUTE_PATH);

        $this->assertEquals('/app.php/testing#fragment', $url);
    }

    /**
     * @dataProvider provideLookAroundRequirementsInPath
     */
    public function testLookRoundRequirementsInPath($expected, $path, $requirement)
    {
        $routes = $this->getRoutes('test', new Route($path, [], ['foo' => $requirement, 'baz' => '.+?']));
        $this->assertSame($expected, $this->getGenerator($routes)->generate('test', ['foo' => 'a/b', 'baz' => 'c/d/e']));
    }

    public function provideLookAroundRequirementsInPath()
    {
        yield ['/app.php/a/b/b%28ar/c/d/e', '/{foo}/b(ar/{baz}', '.+(?=/b\\(ar/)'];
        yield ['/app.php/a/b/bar/c/d/e', '/{foo}/bar/{baz}', '.+(?!$)'];
        yield ['/app.php/bar/a/b/bam/c/d/e', '/bar/{foo}/bam/{baz}', '(?<=/bar/).+'];
        yield ['/app.php/bar/a/b/bam/c/d/e', '/bar/{foo}/bam/{baz}', '(?<!^).+'];
    }

    protected function getGenerator(RouteCollection $routes, array $parameters = [], $logger = null, string $defaultLocale = null)
>>>>>>> dev
    {
        $context = new RequestContext('/app.php');
        foreach ($parameters as $key => $value) {
            $method = 'set'.$key;
            $context->$method($value);
        }

<<<<<<< HEAD
        return new UrlGenerator($routes, $context, $logger);
=======
        return new UrlGenerator($routes, $context, $logger, $defaultLocale);
>>>>>>> dev
    }

    protected function getRoutes($name, Route $route)
    {
        $routes = new RouteCollection();
        $routes->add($name, $route);

        return $routes;
    }
}
