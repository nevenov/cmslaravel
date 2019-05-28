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

use ReflectionClass;
>>>>>>> dev

/**
 * Constraint that asserts that the class it is evaluated for has a given
 * static attribute.
 *
 * The attribute name is passed in the constructor.
<<<<<<< HEAD
 *
 * @since Class available since Release 3.1.0
 */
class PHPUnit_Framework_Constraint_ClassHasStaticAttribute extends PHPUnit_Framework_Constraint_ClassHasAttribute
=======
 */
class ClassHasStaticAttribute extends ClassHasAttribute
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
        $class = new ReflectionClass($other);

        if ($class->hasProperty($this->attributeName)) {
            $attribute = $class->getProperty($this->attributeName);

            return $attribute->isStatic();
<<<<<<< HEAD
        } else {
            return false;
        }
=======
        }

        return false;
>>>>>>> dev
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
     */
    public function toString()
    {
        return sprintf(
=======
     */
    public function toString()
    {
        return \sprintf(
>>>>>>> dev
            'has static attribute "%s"',
            $this->attributeName
        );
    }
}
