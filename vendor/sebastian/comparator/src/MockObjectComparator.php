<?php
/*
<<<<<<< HEAD
 * This file is part of the Comparator package.
=======
 * This file is part of sebastian/comparator.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Comparator;

/**
 * Compares PHPUnit_Framework_MockObject_MockObject instances for equality.
 */
class MockObjectComparator extends ObjectComparator
{
    /**
     * Returns whether the comparator can compare two values.
     *
<<<<<<< HEAD
     * @param  mixed $expected The first value to compare
     * @param  mixed $actual   The second value to compare
=======
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
>>>>>>> dev
     * @return bool
     */
    public function accepts($expected, $actual)
    {
<<<<<<< HEAD
        return $expected instanceof \PHPUnit_Framework_MockObject_MockObject && $actual instanceof \PHPUnit_Framework_MockObject_MockObject;
=======
        return ($expected instanceof \PHPUnit_Framework_MockObject_MockObject || $expected instanceof \PHPUnit\Framework\MockObject\MockObject) &&
               ($actual instanceof \PHPUnit_Framework_MockObject_MockObject || $actual instanceof \PHPUnit\Framework\MockObject\MockObject);
>>>>>>> dev
    }

    /**
     * Converts an object to an array containing all of its private, protected
     * and public properties.
     *
<<<<<<< HEAD
     * @param  object $object
=======
     * @param object $object
     *
>>>>>>> dev
     * @return array
     */
    protected function toArray($object)
    {
        $array = parent::toArray($object);

        unset($array['__phpunit_invocationMocker']);

        return $array;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> dev
