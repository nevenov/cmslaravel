<?php

<<<<<<< HEAD
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * ProjectUrlMatcher.
 *
=======
use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
>>>>>>> dev
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class ProjectUrlMatcher extends Symfony\Component\Routing\Tests\Fixtures\RedirectableUrlMatcher
{
<<<<<<< HEAD
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // foo
        if (0 === strpos($pathinfo, '/foo') && preg_match('#^/foo/(?P<bar>baz|symfony)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo')), array (  'def' => 'test',));
        }

        if (0 === strpos($pathinfo, '/bar')) {
            // bar
            if (preg_match('#^/bar/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_bar;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bar')), array ());
            }
            not_bar:

            // barhead
            if (0 === strpos($pathinfo, '/barhead') && preg_match('#^/barhead/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_barhead;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'barhead')), array ());
            }
            not_barhead:

        }

        if (0 === strpos($pathinfo, '/test')) {
            if (0 === strpos($pathinfo, '/test/baz')) {
                // baz
                if ($pathinfo === '/test/baz') {
                    return array('_route' => 'baz');
                }

                // baz2
                if ($pathinfo === '/test/baz.html') {
                    return array('_route' => 'baz2');
                }

                // baz3
                if (rtrim($pathinfo, '/') === '/test/baz3') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'baz3');
                    }

                    return array('_route' => 'baz3');
                }

            }

            // baz4
            if (preg_match('#^/test/(?P<foo>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'baz4');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'baz4')), array ());
            }

            // baz5
            if (preg_match('#^/test/(?P<foo>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_baz5;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'baz5')), array ());
            }
            not_baz5:

            // baz.baz6
            if (preg_match('#^/test/(?P<foo>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_bazbaz6;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'baz.baz6')), array ());
            }
            not_bazbaz6:

        }

        // foofoo
        if ($pathinfo === '/foofoo') {
            return array (  'def' => 'test',  '_route' => 'foofoo',);
        }

        // quoter
        if (preg_match('#^/(?P<quoter>[\']+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'quoter')), array ());
        }

        // space
        if ($pathinfo === '/spa ce') {
            return array('_route' => 'space');
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/a/b\'b')) {
                // foo1
                if (preg_match('#^/a/b\'b/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo1')), array ());
                }

                // bar1
                if (preg_match('#^/a/b\'b/(?P<bar>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bar1')), array ());
                }

            }

            // overridden
            if (preg_match('#^/a/(?P<var>.*)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'overridden')), array ());
            }

            if (0 === strpos($pathinfo, '/a/b\'b')) {
                // foo2
                if (preg_match('#^/a/b\'b/(?P<foo1>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo2')), array ());
                }

                // bar2
                if (preg_match('#^/a/b\'b/(?P<bar1>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bar2')), array ());
                }

            }

        }

        if (0 === strpos($pathinfo, '/multi')) {
            // helloWorld
            if (0 === strpos($pathinfo, '/multi/hello') && preg_match('#^/multi/hello(?:/(?P<who>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'helloWorld')), array (  'who' => 'World!',));
            }

            // overridden2
            if ($pathinfo === '/multi/new') {
                return array('_route' => 'overridden2');
            }

            // hey
            if (rtrim($pathinfo, '/') === '/multi/hey') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'hey');
                }

                return array('_route' => 'hey');
            }

        }

        // foo3
        if (preg_match('#^/(?P<_locale>[^/]++)/b/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo3')), array ());
        }

        // bar3
        if (preg_match('#^/(?P<_locale>[^/]++)/b/(?P<bar>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'bar3')), array ());
        }

        if (0 === strpos($pathinfo, '/aba')) {
            // ababa
            if ($pathinfo === '/ababa') {
                return array('_route' => 'ababa');
            }

            // foo4
            if (preg_match('#^/aba/(?P<foo>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo4')), array ());
            }

        }

        $host = $this->context->getHost();

        if (preg_match('#^a\\.example\\.com$#si', $host, $hostMatches)) {
            // route1
            if ($pathinfo === '/route1') {
                return array('_route' => 'route1');
            }

            // route2
            if ($pathinfo === '/c2/route2') {
                return array('_route' => 'route2');
            }

        }

        if (preg_match('#^b\\.example\\.com$#si', $host, $hostMatches)) {
            // route3
            if ($pathinfo === '/c2/route3') {
                return array('_route' => 'route3');
            }

        }

        if (preg_match('#^a\\.example\\.com$#si', $host, $hostMatches)) {
            // route4
            if ($pathinfo === '/route4') {
                return array('_route' => 'route4');
            }

        }

        if (preg_match('#^c\\.example\\.com$#si', $host, $hostMatches)) {
            // route5
            if ($pathinfo === '/route5') {
                return array('_route' => 'route5');
            }

        }

        // route6
        if ($pathinfo === '/route6') {
            return array('_route' => 'route6');
        }

        if (preg_match('#^(?P<var1>[^\\.]++)\\.example\\.com$#si', $host, $hostMatches)) {
            if (0 === strpos($pathinfo, '/route1')) {
                // route11
                if ($pathinfo === '/route11') {
                    return $this->mergeDefaults(array_replace($hostMatches, array('_route' => 'route11')), array ());
                }

                // route12
                if ($pathinfo === '/route12') {
                    return $this->mergeDefaults(array_replace($hostMatches, array('_route' => 'route12')), array (  'var1' => 'val',));
                }

                // route13
                if (0 === strpos($pathinfo, '/route13') && preg_match('#^/route13/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($hostMatches, $matches, array('_route' => 'route13')), array ());
                }

                // route14
                if (0 === strpos($pathinfo, '/route14') && preg_match('#^/route14/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($hostMatches, $matches, array('_route' => 'route14')), array (  'var1' => 'val',));
                }

            }

        }

        if (preg_match('#^c\\.example\\.com$#si', $host, $hostMatches)) {
            // route15
            if (0 === strpos($pathinfo, '/route15') && preg_match('#^/route15/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'route15')), array ());
            }

        }

        if (0 === strpos($pathinfo, '/route1')) {
            // route16
            if (0 === strpos($pathinfo, '/route16') && preg_match('#^/route16/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'route16')), array (  'var1' => 'val',));
            }

            // route17
            if ($pathinfo === '/route17') {
                return array('_route' => 'route17');
            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            // a
            if ($pathinfo === '/a/a...') {
                return array('_route' => 'a');
            }

            if (0 === strpos($pathinfo, '/a/b')) {
                // b
                if (preg_match('#^/a/b/(?P<var>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'b')), array ());
                }

                // c
                if (0 === strpos($pathinfo, '/a/b/c') && preg_match('#^/a/b/c/(?P<var>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'c')), array ());
                }

            }

        }

        // secure
        if ($pathinfo === '/secure') {
            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'secure', key($requiredSchemes));
            }

            return array('_route' => 'secure');
        }

        // nonsecure
        if ($pathinfo === '/nonsecure') {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'nonsecure', key($requiredSchemes));
            }

            return array('_route' => 'nonsecure');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
=======
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->matchHost = true;
        $this->staticRoutes = [
            '/test/baz' => [[['_route' => 'baz'], null, null, null, false, false, null]],
            '/test/baz.html' => [[['_route' => 'baz2'], null, null, null, false, false, null]],
            '/test/baz3' => [[['_route' => 'baz3'], null, null, null, true, false, null]],
            '/foofoo' => [[['_route' => 'foofoo', 'def' => 'test'], null, null, null, false, false, null]],
            '/spa ce' => [[['_route' => 'space'], null, null, null, false, false, null]],
            '/multi/new' => [[['_route' => 'overridden2'], null, null, null, false, false, null]],
            '/multi/hey' => [[['_route' => 'hey'], null, null, null, true, false, null]],
            '/ababa' => [[['_route' => 'ababa'], null, null, null, false, false, null]],
            '/route1' => [[['_route' => 'route1'], 'a.example.com', null, null, false, false, null]],
            '/c2/route2' => [[['_route' => 'route2'], 'a.example.com', null, null, false, false, null]],
            '/route4' => [[['_route' => 'route4'], 'a.example.com', null, null, false, false, null]],
            '/c2/route3' => [[['_route' => 'route3'], 'b.example.com', null, null, false, false, null]],
            '/route5' => [[['_route' => 'route5'], 'c.example.com', null, null, false, false, null]],
            '/route6' => [[['_route' => 'route6'], null, null, null, false, false, null]],
            '/route11' => [[['_route' => 'route11'], '#^(?P<var1>[^\\.]++)\\.example\\.com$#sDi', null, null, false, false, null]],
            '/route12' => [[['_route' => 'route12', 'var1' => 'val'], '#^(?P<var1>[^\\.]++)\\.example\\.com$#sDi', null, null, false, false, null]],
            '/route17' => [[['_route' => 'route17'], null, null, null, false, false, null]],
            '/secure' => [[['_route' => 'secure'], null, null, ['https' => 0], false, false, null]],
            '/nonsecure' => [[['_route' => 'nonsecure'], null, null, ['http' => 0], false, false, null]],
        ];
        $this->regexpList = [
            0 => '{^(?'
                .'|(?:(?:[^./]*+\\.)++)(?'
                    .'|/foo/(baz|symfony)(*:47)'
                    .'|/bar(?'
                        .'|/([^/]++)(*:70)'
                        .'|head/([^/]++)(*:90)'
                    .')'
                    .'|/test/([^/]++)(?'
                        .'|(*:115)'
                    .')'
                    .'|/([\']+)(*:131)'
                    .'|/a/(?'
                        .'|b\'b/([^/]++)(?'
                            .'|(*:160)'
                            .'|(*:168)'
                        .')'
                        .'|(.*)(*:181)'
                        .'|b\'b/([^/]++)(?'
                            .'|(*:204)'
                            .'|(*:212)'
                        .')'
                    .')'
                    .'|/multi/hello(?:/([^/]++))?(*:248)'
                    .'|/([^/]++)/b/([^/]++)(?'
                        .'|(*:279)'
                        .'|(*:287)'
                    .')'
                    .'|/aba/([^/]++)(*:309)'
                .')|(?i:([^\\.]++)\\.example\\.com)\\.(?'
                    .'|/route1(?'
                        .'|3/([^/]++)(*:371)'
                        .'|4/([^/]++)(*:389)'
                    .')'
                .')|(?i:c\\.example\\.com)\\.(?'
                    .'|/route15/([^/]++)(*:441)'
                .')|(?:(?:[^./]*+\\.)++)(?'
                    .'|/route16/([^/]++)(*:489)'
                    .'|/a/(?'
                        .'|a\\.\\.\\.(*:510)'
                        .'|b/(?'
                            .'|([^/]++)(*:531)'
                            .'|c/([^/]++)(*:549)'
                        .')'
                    .')'
                .')'
                .')/?$}sD',
        ];
        $this->dynamicRoutes = [
            47 => [[['_route' => 'foo', 'def' => 'test'], ['bar'], null, null, false, true, null]],
            70 => [[['_route' => 'bar'], ['foo'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
            90 => [[['_route' => 'barhead'], ['foo'], ['GET' => 0], null, false, true, null]],
            115 => [
                [['_route' => 'baz4'], ['foo'], null, null, true, true, null],
                [['_route' => 'baz5'], ['foo'], ['POST' => 0], null, true, true, null],
                [['_route' => 'baz.baz6'], ['foo'], ['PUT' => 0], null, true, true, null],
            ],
            131 => [[['_route' => 'quoter'], ['quoter'], null, null, false, true, null]],
            160 => [[['_route' => 'foo1'], ['foo'], ['PUT' => 0], null, false, true, null]],
            168 => [[['_route' => 'bar1'], ['bar'], null, null, false, true, null]],
            181 => [[['_route' => 'overridden'], ['var'], null, null, false, true, null]],
            204 => [[['_route' => 'foo2'], ['foo1'], null, null, false, true, null]],
            212 => [[['_route' => 'bar2'], ['bar1'], null, null, false, true, null]],
            248 => [[['_route' => 'helloWorld', 'who' => 'World!'], ['who'], null, null, false, true, null]],
            279 => [[['_route' => 'foo3'], ['_locale', 'foo'], null, null, false, true, null]],
            287 => [[['_route' => 'bar3'], ['_locale', 'bar'], null, null, false, true, null]],
            309 => [[['_route' => 'foo4'], ['foo'], null, null, false, true, null]],
            371 => [[['_route' => 'route13'], ['var1', 'name'], null, null, false, true, null]],
            389 => [[['_route' => 'route14', 'var1' => 'val'], ['var1', 'name'], null, null, false, true, null]],
            441 => [[['_route' => 'route15'], ['name'], null, null, false, true, null]],
            489 => [[['_route' => 'route16', 'var1' => 'val'], ['name'], null, null, false, true, null]],
            510 => [[['_route' => 'a'], [], null, null, false, false, null]],
            531 => [[['_route' => 'b'], ['var'], null, null, false, true, null]],
            549 => [[['_route' => 'c'], ['var'], null, null, false, true, null]],
        ];
>>>>>>> dev
    }
}
