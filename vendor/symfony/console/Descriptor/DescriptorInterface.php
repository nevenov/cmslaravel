<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Descriptor;

use Symfony\Component\Console\Output\OutputInterface;

/**
 * Descriptor interface.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
interface DescriptorInterface
{
    /**
<<<<<<< HEAD
     * Describes an InputArgument instance.
=======
     * Describes an object if supported.
>>>>>>> dev
     *
     * @param OutputInterface $output
     * @param object          $object
     * @param array           $options
     */
<<<<<<< HEAD
    public function describe(OutputInterface $output, $object, array $options = array());
=======
    public function describe(OutputInterface $output, $object, array $options = []);
>>>>>>> dev
}
