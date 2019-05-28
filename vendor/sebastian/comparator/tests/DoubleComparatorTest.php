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
 * @coversDefaultClass SebastianBergmann\Comparator\DoubleComparator
 *
 */
class DoubleComparatorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass SebastianBergmann\Comparator\DoubleComparator
 *
 * @uses SebastianBergmann\Comparator\Comparator
 * @uses SebastianBergmann\Comparator\Factory
 * @uses SebastianBergmann\Comparator\ComparisonFailure
 */
class DoubleComparatorTest extends TestCase
>>>>>>> dev
{
    private $comparator;

    protected function setUp()
    {
        $this->comparator = new DoubleComparator;
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(0, 5.0),
          array(5.0, 0),
          array('5', 4.5),
          array(1.2e3, 7E-10),
          array(3, acos(8)),
          array(acos(8), 3),
          array(acos(8), acos(8))
        );
=======
        return [
          [0, 5.0],
          [5.0, 0],
          ['5', 4.5],
          [1.2e3, 7E-10],
          [3, \acos(8)],
          [\acos(8), 3],
          [\acos(8), \acos(8)]
        ];
>>>>>>> dev
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(5, 5),
          array('4.5', 5),
          array(0x539, 02471),
          array(5.0, false),
          array(null, 5.0)
        );
=======
        return [
          [5, 5],
          ['4.5', 5],
          [0x539, 02471],
          [5.0, false],
          [null, 5.0]
        ];
>>>>>>> dev
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(2.3, 2.3),
          array('2.3', 2.3),
          array(5.0, 5),
          array(5, 5.0),
          array(5.0, '5'),
          array(1.2e3, 1200),
          array(2.3, 2.5, 0.5),
          array(3, 3.05, 0.05),
          array(1.2e3, 1201, 1),
          array((string)(1/3), 1 - 2/3),
          array(1/3, (string)(1 - 2/3))
        );
=======
        return [
          [2.3, 2.3],
          ['2.3', 2.3],
          [5.0, 5],
          [5, 5.0],
          [5.0, '5'],
          [1.2e3, 1200],
          [2.3, 2.5, 0.5],
          [3, 3.05, 0.05],
          [1.2e3, 1201, 1],
          [(string) (1 / 3), 1 - 2 / 3],
          [1 / 3, (string) (1 - 2 / 3)]
        ];
>>>>>>> dev
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(2.3, 4.2),
          array('2.3', 4.2),
          array(5.0, '4'),
          array(5.0, 6),
          array(1.2e3, 1201),
          array(2.3, 2.5, 0.2),
          array(3, 3.05, 0.04),
          array(3, acos(8)),
          array(acos(8), 3),
          array(acos(8), acos(8))
        );
=======
        return [
          [2.3, 4.2],
          ['2.3', 4.2],
          [5.0, '4'],
          [5.0, 6],
          [1.2e3, 1201],
          [2.3, 2.5, 0.2],
          [3, 3.05, 0.04],
          [3, \acos(8)],
          [\acos(8), 3],
          [\acos(8), \acos(8)]
        ];
>>>>>>> dev
    }

    /**
     * @covers       ::accepts
     * @dataProvider acceptsSucceedsProvider
     */
    public function testAcceptsSucceeds($expected, $actual)
    {
        $this->assertTrue(
          $this->comparator->accepts($expected, $actual)
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
    public function testAssertEqualsSucceeds($expected, $actual, $delta = 0.0)
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual, $delta);
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
    public function testAssertEqualsFails($expected, $actual, $delta = 0.0)
    {
<<<<<<< HEAD
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', 'matches expected'
        );
=======
        $this->expectException(ComparisonFailure::class);
        $this->expectExceptionMessage('matches expected');

>>>>>>> dev
        $this->comparator->assertEquals($expected, $actual, $delta);
    }
}
