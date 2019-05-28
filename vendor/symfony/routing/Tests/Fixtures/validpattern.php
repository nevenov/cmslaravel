<?php

<<<<<<< HEAD
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
=======
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
>>>>>>> dev

$collection = new RouteCollection();
$collection->add('blog_show', new Route(
    '/blog/{slug}',
<<<<<<< HEAD
    array('_controller' => 'MyBlogBundle:Blog:show'),
    array('locale' => '\w+'),
    array('compiler_class' => 'RouteCompiler'),
    '{locale}.example.com',
    array('https'),
    array('GET', 'POST', 'put', 'OpTiOnS'),
=======
    ['_controller' => 'MyBlogBundle:Blog:show'],
    ['locale' => '\w+'],
    ['compiler_class' => 'RouteCompiler'],
    '{locale}.example.com',
    ['https'],
    ['GET', 'POST', 'put', 'OpTiOnS'],
>>>>>>> dev
    'context.getMethod() == "GET"'
));

return $collection;
