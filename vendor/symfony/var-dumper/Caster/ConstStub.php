<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Caster;

use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * Represents a PHP constant and its value.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ConstStub extends Stub
{
<<<<<<< HEAD
    public function __construct($name, $value)
=======
    public function __construct(string $name, $value)
>>>>>>> dev
    {
        $this->class = $name;
        $this->value = $value;
    }
<<<<<<< HEAD
=======

    public function __toString()
    {
        return (string) $this->value;
    }
>>>>>>> dev
}
