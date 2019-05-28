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

/**
 * A TestFailure collects a failed test together with the caught exception.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Framework_TestFailure
=======
namespace PHPUnit\Framework;

use PHPUnit\Framework\Error\Error;
use Throwable;

/**
 * A TestFailure collects a failed test together with the caught exception.
 */
class TestFailure
>>>>>>> dev
{
    /**
     * @var string
     */
    private $testName;

    /**
<<<<<<< HEAD
     * @var PHPUnit_Framework_Test|null
=======
     * @var Test|null
>>>>>>> dev
     */
    protected $failedTest;

    /**
<<<<<<< HEAD
     * @var Exception
=======
     * @var Throwable
>>>>>>> dev
     */
    protected $thrownException;

    /**
     * Constructs a TestFailure with the given test and exception.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $failedTest
     * @param Exception              $thrownException
     */
    public function __construct(PHPUnit_Framework_Test $failedTest, Exception $thrownException)
    {
        if ($failedTest instanceof PHPUnit_Framework_SelfDescribing) {
            $this->testName = $failedTest->toString();
        } else {
            $this->testName = get_class($failedTest);
        }
        if (!$failedTest instanceof PHPUnit_Framework_TestCase || !$failedTest->isInIsolation()) {
            $this->failedTest = $failedTest;
        }
        $this->thrownException = $thrownException;
=======
     * @param Test      $failedTest
     * @param Throwable $t
     */
    public function __construct(Test $failedTest, $t)
    {
        if ($failedTest instanceof SelfDescribing) {
            $this->testName = $failedTest->toString();
        } else {
            $this->testName = \get_class($failedTest);
        }

        if (!$failedTest instanceof TestCase || !$failedTest->isInIsolation()) {
            $this->failedTest = $failedTest;
        }

        $this->thrownException = $t;
>>>>>>> dev
    }

    /**
     * Returns a short description of the failure.
     *
     * @return string
     */
    public function toString()
    {
<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> dev
            '%s: %s',
            $this->testName,
            $this->thrownException->getMessage()
        );
    }

    /**
     * Returns a description for the thrown exception.
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public function getExceptionAsString()
    {
        return self::exceptionToString($this->thrownException);
    }

    /**
     * Returns a description for an exception.
     *
<<<<<<< HEAD
     * @param Exception $e
     *
     * @return string
     *
     * @since  Method available since Release 3.2.0
     */
    public static function exceptionToString(Exception $e)
    {
        if ($e instanceof PHPUnit_Framework_SelfDescribing) {
            $buffer = $e->toString();

            if ($e instanceof PHPUnit_Framework_ExpectationFailedException && $e->getComparisonFailure()) {
                $buffer = $buffer . $e->getComparisonFailure()->getDiff();
            }

            if (!empty($buffer)) {
                $buffer = trim($buffer) . "\n";
            }
        } elseif ($e instanceof PHPUnit_Framework_Error) {
            $buffer = $e->getMessage() . "\n";
        } elseif ($e instanceof PHPUnit_Framework_ExceptionWrapper) {
            $buffer = $e->getClassname() . ': ' . $e->getMessage() . "\n";
        } else {
            $buffer = get_class($e) . ': ' . $e->getMessage() . "\n";
        }

        return $buffer;
=======
     * @param Throwable $e
     *
     * @return string
     */
    public static function exceptionToString(Throwable $e)
    {
        if ($e instanceof SelfDescribing) {
            $buffer = $e->toString();

            if ($e instanceof ExpectationFailedException && $e->getComparisonFailure()) {
                $buffer .= $e->getComparisonFailure()->getDiff();
            }

            if (!empty($buffer)) {
                $buffer = \trim($buffer) . "\n";
            }

            return $buffer;
        }

        if ($e instanceof Error) {
            return $e->getMessage() . "\n";
        }

        if ($e instanceof ExceptionWrapper) {
            return $e->getClassName() . ': ' . $e->getMessage() . "\n";
        }

        return \get_class($e) . ': ' . $e->getMessage() . "\n";
>>>>>>> dev
    }

    /**
     * Returns the name of the failing test (including data set, if any).
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.3.0
=======
>>>>>>> dev
     */
    public function getTestName()
    {
        return $this->testName;
    }

    /**
     * Returns the failing test.
     *
     * Note: The test object is not set when the test is executed in process
     * isolation.
     *
<<<<<<< HEAD
     * @see PHPUnit_Framework_Exception
     *
     * @return PHPUnit_Framework_Test|null
=======
     * @see Exception
     *
     * @return Test|null
>>>>>>> dev
     */
    public function failedTest()
    {
        return $this->failedTest;
    }

    /**
     * Gets the thrown exception.
     *
<<<<<<< HEAD
     * @return Exception
=======
     * @return Throwable
>>>>>>> dev
     */
    public function thrownException()
    {
        return $this->thrownException;
    }

    /**
     * Returns the exception's message.
     *
     * @return string
     */
    public function exceptionMessage()
    {
        return $this->thrownException()->getMessage();
    }

    /**
     * Returns true if the thrown exception
     * is of type AssertionFailedError.
     *
     * @return bool
     */
    public function isFailure()
    {
<<<<<<< HEAD
        return ($this->thrownException() instanceof PHPUnit_Framework_AssertionFailedError);
=======
        return ($this->thrownException() instanceof AssertionFailedError);
>>>>>>> dev
    }
}
