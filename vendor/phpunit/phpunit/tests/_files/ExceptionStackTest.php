<?php
<<<<<<< HEAD
class ExceptionStackTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;

class ExceptionStackTest extends TestCase
>>>>>>> dev
{
    public function testPrintingChildException()
    {
        try {
<<<<<<< HEAD
            $this->assertEquals(array(1), array(2), 'message');
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
            $message = $e->getMessage() . $e->getComparisonFailure()->getDiff();
            throw new PHPUnit_Framework_Exception("Child exception\n$message", 101, $e);
=======
            $this->assertEquals([1], [2], 'message');
        } catch (ExpectationFailedException $e) {
            $message = $e->getMessage() . $e->getComparisonFailure()->getDiff();

            throw new PHPUnit\Framework\Exception("Child exception\n$message", 101, $e);
>>>>>>> dev
        }
    }

    public function testNestedExceptions()
    {
        $exceptionThree = new Exception('Three');
        $exceptionTwo   = new InvalidArgumentException('Two', 0, $exceptionThree);
        $exceptionOne   = new Exception('One', 0, $exceptionTwo);
<<<<<<< HEAD
=======

>>>>>>> dev
        throw $exceptionOne;
    }
}
