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

use \Exception;
use \RuntimeException;
<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev

/**
 * @coversDefaultClass SebastianBergmann\Comparator\ExceptionComparator
 *
<<<<<<< HEAD
 */
class ExceptionComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses SebastianBergmann\Comparator\Comparator
 * @uses SebastianBergmann\Comparator\Factory
 * @uses SebastianBergmann\Comparator\ComparisonFailure
 */
class ExceptionComparatorTest extends TestCase
>>>>>>> dev
{
    private $comparator;

    protected function setUp()
    {
        $this->comparator = new ExceptionComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(new Exception, new Exception),
          array(new RuntimeException, new RuntimeException),
          array(new Exception, new RuntimeException)
        );
=======
        return [
          [new Exception, new Exception],
          [new RuntimeException, new RuntimeException],
          [new Exception, new RuntimeException]
        ];
>>>>>>> dev
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(new Exception, null),
          array(null, new Exception),
          array(null, null)
        );
=======
        return [
          [new Exception, null],
          [null, new Exception],
          [null, null]
        ];
>>>>>>> dev
    }

    public function assertEqualsSucceedsProvider()
    {
        $exception1 = new Exception;
        $exception2 = new Exception;

<<<<<<< HEAD
        $exception3 = new RunTimeException('Error', 100);
        $exception4 = new RunTimeException('Error', 100);

        return array(
          array($exception1, $exception1),
          array($exception1, $exception2),
          array($exception3, $exception3),
          array($exception3, $exception4)
        );
=======
        $exception3 = new RuntimeException('Error', 100);
        $exception4 = new RuntimeException('Error', 100);

        return [
          [$exception1, $exception1],
          [$exception1, $exception2],
          [$exception3, $exception3],
          [$exception3, $exception4]
        ];
>>>>>>> dev
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        $typeMessage = 'not instance of expected class';
=======
        $typeMessage  = 'not instance of expected class';
>>>>>>> dev
        $equalMessage = 'Failed asserting that two objects are equal.';

        $exception1 = new Exception('Error', 100);
        $exception2 = new Exception('Error', 101);
        $exception3 = new Exception('Errors', 101);

<<<<<<< HEAD
        $exception4 = new RunTimeException('Error', 100);
        $exception5 = new RunTimeException('Error', 101);

        return array(
          array($exception1, $exception2, $equalMessage),
          array($exception1, $exception3, $equalMessage),
          array($exception1, $exception4, $typeMessage),
          array($exception2, $exception3, $equalMessage),
          array($exception4, $exception5, $equalMessage)
        );
=======
        $exception4 = new RuntimeException('Error', 100);
        $exception5 = new RuntimeException('Error', 101);

        return [
          [$exception1, $exception2, $equalMessage],
          [$exception1, $exception3, $equalMessage],
          [$exception1, $exception4, $typeMessage],
          [$exception2, $exception3, $equalMessage],
          [$exception4, $exception5, $equalMessage]
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
    public function testAssertEqualsFails($expected, $actual, $message)
    {
<<<<<<< HEAD
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', $message
        );
=======
        $this->expectException(ComparisonFailure::class);
        $this->expectExceptionMessage($message);

>>>>>>> dev
        $this->comparator->assertEquals($expected, $actual);
    }
}
