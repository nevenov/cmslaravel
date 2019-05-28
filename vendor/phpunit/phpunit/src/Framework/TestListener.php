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
 * A Listener for test progress.
 *
 * @since Interface available since Release 2.0.0
 */
interface PHPUnit_Framework_TestListener
=======
namespace PHPUnit\Framework;

/**
 * A Listener for test progress.
 */
interface TestListener
>>>>>>> dev
{
    /**
     * An error occurred.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time);
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addError(Test $test, \Exception $e, $time);

    /**
     * A warning occurred.
     *
     * @param Test    $test
     * @param Warning $e
     * @param float   $time
     */
    public function addWarning(Test $test, Warning $e, $time);
>>>>>>> dev

    /**
     * A failure occurred.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time);
=======
     * @param Test                 $test
     * @param AssertionFailedError $e
     * @param float                $time
     */
    public function addFailure(Test $test, AssertionFailedError $e, $time);
>>>>>>> dev

    /**
     * Incomplete test.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time);
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addIncompleteTest(Test $test, \Exception $e, $time);
>>>>>>> dev

    /**
     * Risky test.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     *
     * @since  Method available since Release 4.0.0
     */
    public function addRiskyTest(PHPUnit_Framework_Test $test, Exception $e, $time);
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addRiskyTest(Test $test, \Exception $e, $time);
>>>>>>> dev

    /**
     * Skipped test.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     *
     * @since  Method available since Release 3.0.0
     */
    public function addSkippedTest(PHPUnit_Framework_Test $test, Exception $e, $time);
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addSkippedTest(Test $test, \Exception $e, $time);
>>>>>>> dev

    /**
     * A test suite started.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function startTestSuite(PHPUnit_Framework_TestSuite $suite);
=======
     * @param TestSuite $suite
     */
    public function startTestSuite(TestSuite $suite);
>>>>>>> dev

    /**
     * A test suite ended.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite);
=======
     * @param TestSuite $suite
     */
    public function endTestSuite(TestSuite $suite);
>>>>>>> dev

    /**
     * A test started.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     */
    public function startTest(PHPUnit_Framework_Test $test);
=======
     * @param Test $test
     */
    public function startTest(Test $test);
>>>>>>> dev

    /**
     * A test ended.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(PHPUnit_Framework_Test $test, $time);
=======
     * @param Test  $test
     * @param float $time
     */
    public function endTest(Test $test, $time);
>>>>>>> dev
}
