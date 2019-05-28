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

<<<<<<< HEAD
/**
 * @coversDefaultClass SebastianBergmann\Comparator\ArrayComparator
 *
 */
class ArrayComparatorTest extends \PHPUnit_Framework_TestCase
{
=======
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass SebastianBergmann\Comparator\ArrayComparator
 *
 * @uses SebastianBergmann\Comparator\Comparator
 * @uses SebastianBergmann\Comparator\Factory
 * @uses SebastianBergmann\Comparator\ComparisonFailure
 */
class ArrayComparatorTest extends TestCase
{
    /**
     * @var ArrayComparator
     */
>>>>>>> dev
    private $comparator;

    protected function setUp()
    {
        $this->comparator = new ArrayComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(array(), null),
          array(null, array()),
          array(null, null)
        );
=======
        return [
          [[], null],
          [null, []],
          [null, null]
        ];
>>>>>>> dev
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(
            array('a' => 1, 'b' => 2),
            array('b' => 2, 'a' => 1)
          ),
          array(
            array(1),
            array('1')
          ),
          array(
            array(3, 2, 1),
            array(2, 3, 1),
            0,
            true
          ),
          array(
            array(2.3),
            array(2.5),
            0.5
          ),
          array(
            array(array(2.3)),
            array(array(2.5)),
            0.5
          ),
          array(
            array(new Struct(2.3)),
            array(new Struct(2.5)),
            0.5
          ),
        );
=======
        return [
          [
            ['a' => 1, 'b' => 2],
            ['b' => 2, 'a' => 1]
          ],
          [
            [1],
            ['1']
          ],
          [
            [3, 2, 1],
            [2, 3, 1],
            0,
            true
          ],
          [
            [2.3],
            [2.5],
            0.5
          ],
          [
            [[2.3]],
            [[2.5]],
            0.5
          ],
          [
            [new Struct(2.3)],
            [new Struct(2.5)],
            0.5
          ],
        ];
>>>>>>> dev
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(
            array(),
            array(0 => 1)
          ),
          array(
            array(0 => 1),
            array()
          ),
          array(
            array(0 => null),
            array()
          ),
          array(
            array(0 => 1, 1 => 2),
            array(0 => 1, 1 => 3)
          ),
          array(
            array('a', 'b' => array(1, 2)),
            array('a', 'b' => array(2, 1))
          ),
          array(
            array(2.3),
            array(4.2),
            0.5
          ),
          array(
            array(array(2.3)),
            array(array(4.2)),
            0.5
          ),
          array(
            array(new Struct(2.3)),
            array(new Struct(4.2)),
            0.5
          )
        );
=======
        return [
          [
            [],
            [0 => 1]
          ],
          [
            [0 => 1],
            []
          ],
          [
            [0 => null],
            []
          ],
          [
            [0 => 1, 1 => 2],
            [0 => 1, 1 => 3]
          ],
          [
            ['a', 'b' => [1, 2]],
            ['a', 'b' => [2, 1]]
          ],
          [
            [2.3],
            [4.2],
            0.5
          ],
          [
            [[2.3]],
            [[4.2]],
            0.5
          ],
          [
            [new Struct(2.3)],
            [new Struct(4.2)],
            0.5
          ]
        ];
>>>>>>> dev
    }

    /**
     * @covers  ::accepts
     */
    public function testAcceptsSucceeds()
    {
        $this->assertTrue(
<<<<<<< HEAD
          $this->comparator->accepts(array(), array())
=======
          $this->comparator->accepts([], [])
>>>>>>> dev
        );
    }

    /**
     * @covers       ::accepts
     * @dataProvider acceptsFailsProvider
     */
    public function testAcceptsFails($expected, $actual)
    {
        $this->assertFalse(
          $this->comparator->accepts($expected, $actual)
        );
    }

    /**
     * @covers       ::assertEquals
     * @dataProvider assertEqualsSucceedsProvider
     */
    public function testAssertEqualsSucceeds($expected, $actual, $delta = 0.0, $canonicalize = false)
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual, $delta, $canonicalize);
<<<<<<< HEAD
        }

        catch (ComparisonFailure $exception) {
=======
        } catch (ComparisonFailure $exception) {
>>>>>>> dev
        }

        $this->assertNull($exception, 'Unexpected ComparisonFailure');
    }

    /**
     * @covers       ::assertEquals
     * @dataProvider assertEqualsFailsProvider
     */
<<<<<<< HEAD
    public function testAssertEqualsFails($expected, $actual,$delta = 0.0, $canonicalize = false)
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure',
          'Failed asserting that two arrays are equal'
        );
=======
    public function testAssertEqualsFails($expected, $actual, $delta = 0.0, $canonicalize = false)
    {
        $this->expectException(ComparisonFailure::class);
        $this->expectExceptionMessage('Failed asserting that two arrays are equal');

>>>>>>> dev
        $this->comparator->assertEquals($expected, $actual, $delta, $canonicalize);
    }
}
