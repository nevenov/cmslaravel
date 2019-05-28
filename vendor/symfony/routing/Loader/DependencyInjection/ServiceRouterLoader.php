<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader\DependencyInjection;

<<<<<<< HEAD
use Symfony\Component\DependencyInjection\ContainerInterface;
=======
use Psr\Container\ContainerInterface;
>>>>>>> dev
use Symfony\Component\Routing\Loader\ObjectRouteLoader;

/**
 * A route loader that executes a service to load the routes.
 *
<<<<<<< HEAD
 * This depends on the DependencyInjection component.
 *
=======
>>>>>>> dev
 * @author Ryan Weaver <ryan@knpuniversity.com>
 */
class ServiceRouterLoader extends ObjectRouteLoader
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function getServiceObject($id)
    {
        return $this->container->get($id);
    }
}
