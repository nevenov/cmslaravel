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
 * @coversDefaultClass SebastianBergmann\Comparator\NumericComparator
 *
 */
class NumericComparatorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass SebastianBergmann\Comparator\NumericComparator
 *
 * @uses SebastianBergmann\Comparator\Comparator
 * @uses SebastianBergmann\Comparator\Factory
 * @uses SebastianBergmann\Comparator\ComparisonFailure
 */
class NumericComparatorTest extends TestCase
>>>>>>> dev
{
    private $comparator;

    protected function setUp()
    {
        $this->comparator = new NumericComparator;
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(5, 10),
          array(8, '0'),
          array('10', 0),
          array(0x74c3b00c, 42),
          array(0755, 0777)
        );
=======
        return [
          [5, 10],
          [8, '0'],
          ['10', 0],
          [0x74c3b00c, 42],
          [0755, 0777]
        ];
>>>>>>> dev
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array('5', '10'),
          array(8, 5.0),
          array(5.0, 8),
          array(10, null),
          array(false, 12)
        );
=======
        return [
          ['5', '10'],
          [8, 5.0],
          [5.0, 8],
          [10, null],
          [false, 12]
        ];
>>>>>>> dev
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(1337, 1337),
          array('1337', 1337),
          array(0x539, 1337),
          array(02471, 1337),
          array(1337, 1338, 1),
          array('1337', 1340, 5),
        );
=======
        return [
          [1337, 1337],
          ['1337', 1337],
          [0x539, 1337],
          [02471, 1337],
          [1337, 1338, 1],
          ['1337', 1340, 5],
        ];
>>>>>>> dev
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(1337, 1338),
          array('1338', 1337),
          array(0x539, 1338),
          array(1337, 1339, 1),
          array('1337', 1340, 2),
        );
=======
        return [
          [1337, 1338],
          ['1338', 1337],
          [0x539, 1338],
          [1337, 1339, 1],
          ['1337', 1340, 2],
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
