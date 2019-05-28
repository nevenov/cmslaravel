<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======
namespace PHPUnit\Framework\Constraint;

use ReflectionObject;
>>>>>>> dev

/**
 * Constraint that asserts that the object it is evaluated for has a given
 * attribute.
 *
 * The attribute name is passed in the constructor.
<<<<<<< HEAD
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_ObjectHasAttribute extends PHPUnit_Framework_Constraint_ClassHasAttribute
=======
 */
class ObjectHasAttribute extends ClassHasAttribute
>>>>>>> dev
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        $object = new ReflectionObject($other);

        return $object->hasProperty($this->attributeName);
    }
}
