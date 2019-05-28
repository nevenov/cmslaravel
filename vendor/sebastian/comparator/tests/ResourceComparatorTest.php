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
 * @coversDefaultClass SebastianBergmann\Comparator\ResourceComparator
 *
 */
class ResourceComparatorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass SebastianBergmann\Comparator\ResourceComparator
 *
 * @uses SebastianBergmann\Comparator\Comparator
 * @uses SebastianBergmann\Comparator\Factory
 * @uses SebastianBergmann\Comparator\ComparisonFailure
 */
class ResourceComparatorTest extends TestCase
>>>>>>> dev
{
    private $comparator;

    protected function setUp()
    {
        $this->comparator = new ResourceComparator;
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        $tmpfile1 = tmpfile();
        $tmpfile2 = tmpfile();

        return array(
          array($tmpfile1, $tmpfile1),
          array($tmpfile2, $tmpfile2),
          array($tmpfile1, $tmpfile2)
        );
=======
        $tmpfile1 = \tmpfile();
        $tmpfile2 = \tmpfile();

        return [
          [$tmpfile1, $tmpfile1],
          [$tmpfile2, $tmpfile2],
          [$tmpfile1, $tmpfile2]
        ];
>>>>>>> dev
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        $tmpfile1 = tmpfile();

        return array(
          array($tmpfile1, null),
          array(null, $tmpfile1),
          array(null, null)
        );
=======
        $tmpfile1 = \tmpfile();

        return [
          [$tmpfile1, null],
          [null, $tmpfile1],
          [null, null]
        ];
>>>>>>> dev
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        $tmpfile1 = tmpfile();
        $tmpfile2 = tmpfile();

        return array(
          array($tmpfile1, $tmpfile1),
          array($tmpfile2, $tmpfile2)
        );
=======
        $tmpfile1 = \tmpfile();
        $tmpfile2 = \tmpfile();

        return [
          [$tmpfile1, $tmpfile1],
          [$tmpfile2, $tmpfile2]
        ];
>>>>>>> dev
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        $tmpfile1 = tmpfile();
        $tmpfile2 = tmpfile();

        return array(
          array($tmpfile1, $tmpfile2),
          array($tmpfile2, $tmpfile1)
        );
=======
        $tmpfile1 = \tmpfile();
        $tmpfile2 = \tmpfile();

        return [
          [$tmpfile1, $tmpfile2],
          [$tmpfile2, $tmpfile1]
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
    public function testAssertEqualsSucceeds($expected, $actual)
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual);
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
    public function testAssertEqualsFails($expected, $actual)
    {
<<<<<<< HEAD
        $this->setExpectedException('SebastianBergmann\\Comparator\\ComparisonFailure');
=======
        $this->expectException(ComparisonFailure::class);

>>>>>>> dev
        $this->comparator->assertEquals($expected, $actual);
    }
}
