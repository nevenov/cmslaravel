<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Generator\Dumper;

use Symfony\Component\Routing\RouteCollection;

/**
 * GeneratorDumperInterface is the interface that all generator dumper classes must implement.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface GeneratorDumperInterface
{
    /**
     * Dumps a set of routes to a string representation of executable code
     * that can then be used to generate a URL of such a route.
     *
     * @param array $options An array of options
     *
     * @return string Executable code
     */
<<<<<<< HEAD
    public function dump(array $options = array());
=======
    public function dump(array $options = []);
>>>>>>> dev

    /**
     * Gets the routes to dump.
     *
     * @return RouteCollection A RouteCollection instance
     */
    public function getRoutes();
}
