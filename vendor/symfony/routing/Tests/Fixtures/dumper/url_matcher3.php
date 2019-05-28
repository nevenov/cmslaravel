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
class ProjectUrlMatcher extends Symfony\Component\Routing\Matcher\UrlMatcher
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

        if (0 === strpos($pathinfo, '/rootprefix')) {
            // static
            if ($pathinfo === '/rootprefix/test') {
                return array('_route' => 'static');
            }

            // dynamic
            if (preg_match('#^/rootprefix/(?P<var>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'dynamic')), array ());
            }

        }

        // with-condition
        if ($pathinfo === '/with-condition' && ($context->getMethod() == "GET")) {
            return array('_route' => 'with-condition');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
=======
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = [
            '/rootprefix/test' => [[['_route' => 'static'], null, null, null, false, false, null]],
            '/with-condition' => [[['_route' => 'with-condition'], null, null, null, false, false, -1]],
        ];
        $this->regexpList = [
            0 => '{^(?'
                    .'|/rootprefix/([^/]++)(*:27)'
                .')/?$}sD',
        ];
        $this->dynamicRoutes = [
            27 => [[['_route' => 'dynamic'], ['var'], null, null, false, true, null]],
        ];
        $this->checkCondition = static function ($condition, $context, $request) {
            switch ($condition) {
                case -1: return ($context->getMethod() == "GET");
            }
        };
>>>>>>> dev
    }
}
