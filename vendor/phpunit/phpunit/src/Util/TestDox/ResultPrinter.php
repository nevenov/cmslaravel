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
 * Base class for printers of TestDox documentation.
 *
 * @since Class available since Release 2.1.0
 */
abstract class PHPUnit_Util_TestDox_ResultPrinter extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
{
    /**
     * @var PHPUnit_Util_TestDox_NamePrettifier
=======
namespace PHPUnit\Util\TestDox;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Framework\WarningTestCase;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Util\Printer;

/**
 * Base class for printers of TestDox documentation.
 */
abstract class ResultPrinter extends Printer implements TestListener
{
    /**
     * @var NamePrettifier
>>>>>>> dev
     */
    protected $prettifier;

    /**
     * @var string
     */
    protected $testClass = '';

    /**
     * @var int
     */
<<<<<<< HEAD
    protected $testStatus = false;
=======
    protected $testStatus;
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $tests = array();
=======
    protected $tests = [];
>>>>>>> dev

    /**
     * @var int
     */
    protected $successful = 0;

    /**
     * @var int
     */
<<<<<<< HEAD
=======
    protected $warned = 0;

    /**
     * @var int
     */
>>>>>>> dev
    protected $failed = 0;

    /**
     * @var int
     */
    protected $risky = 0;

    /**
     * @var int
     */
    protected $skipped = 0;

    /**
     * @var int
     */
    protected $incomplete = 0;

    /**
<<<<<<< HEAD
     * @var string
=======
     * @var string|null
>>>>>>> dev
     */
    protected $currentTestClassPrettified;

    /**
<<<<<<< HEAD
     * @var string
=======
     * @var string|null
>>>>>>> dev
     */
    protected $currentTestMethodPrettified;

    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param resource $out
     */
    public function __construct($out = null)
    {
        parent::__construct($out);

        $this->prettifier = new PHPUnit_Util_TestDox_NamePrettifier;
=======
     * @var array
     */
    private $groups;

    /**
     * @var array
     */
    private $excludeGroups;

    /**
     * @param resource $out
     * @param array    $groups
     * @param array    $excludeGroups
     */
    public function __construct($out = null, array $groups = [], array $excludeGroups = [])
    {
        parent::__construct($out);

        $this->groups        = $groups;
        $this->excludeGroups = $excludeGroups;

        $this->prettifier = new NamePrettifier;
>>>>>>> dev
        $this->startRun();
    }

    /**
     * Flush buffer and close output.
     */
    public function flush()
    {
        $this->doEndClass();
        $this->endRun();

        parent::flush();
    }

    /**
     * An error occurred.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addError(Test $test, \Exception $e, $time)
>>>>>>> dev
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
=======
        $this->testStatus = BaseTestRunner::STATUS_ERROR;
>>>>>>> dev
        $this->failed++;
    }

    /**
<<<<<<< HEAD
     * A failure occurred.
     *
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
=======
     * A warning occurred.
     *
     * @param Test    $test
     * @param Warning $e
     * @param float   $time
     */
    public function addWarning(Test $test, Warning $e, $time)
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

        $this->testStatus = BaseTestRunner::STATUS_WARNING;
        $this->warned++;
    }

    /**
     * A failure occurred.
     *
     * @param Test                 $test
     * @param AssertionFailedError $e
     * @param float                $time
     */
    public function addFailure(Test $test, AssertionFailedError $e, $time)
>>>>>>> dev
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
=======
        $this->testStatus = BaseTestRunner::STATUS_FAILURE;
>>>>>>> dev
        $this->failed++;
    }

    /**
     * Incomplete test.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time)
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addIncompleteTest(Test $test, \Exception $e, $time)
>>>>>>> dev
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_INCOMPLETE;
=======
        $this->testStatus = BaseTestRunner::STATUS_INCOMPLETE;
>>>>>>> dev
        $this->incomplete++;
    }

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
    public function addRiskyTest(PHPUnit_Framework_Test $test, Exception $e, $time)
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addRiskyTest(Test $test, \Exception $e, $time)
>>>>>>> dev
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_RISKY;
=======
        $this->testStatus = BaseTestRunner::STATUS_RISKY;
>>>>>>> dev
        $this->risky++;
    }

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
    public function addSkippedTest(PHPUnit_Framework_Test $test, Exception $e, $time)
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addSkippedTest(Test $test, \Exception $e, $time)
>>>>>>> dev
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_SKIPPED;
=======
        $this->testStatus = BaseTestRunner::STATUS_SKIPPED;
>>>>>>> dev
        $this->skipped++;
    }

    /**
     * A testsuite started.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
=======
     * @param TestSuite $suite
     */
    public function startTestSuite(TestSuite $suite)
>>>>>>> dev
    {
    }

    /**
     * A testsuite ended.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
=======
     * @param TestSuite $suite
     */
    public function endTestSuite(TestSuite $suite)
>>>>>>> dev
    {
    }

    /**
     * A test started.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     */
    public function startTest(PHPUnit_Framework_Test $test)
=======
     * @param Test $test
     */
    public function startTest(Test $test)
>>>>>>> dev
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

<<<<<<< HEAD
        $class = get_class($test);
=======
        $class = \get_class($test);
>>>>>>> dev

        if ($this->testClass != $class) {
            if ($this->testClass != '') {
                $this->doEndClass();
            }

<<<<<<< HEAD
            $this->currentTestClassPrettified = $this->prettifier->prettifyTestClass($class);
            $this->startClass($class);

            $this->testClass = $class;
            $this->tests     = array();
        }

        $prettified = false;

        $annotations = $test->getAnnotations();

        if (isset($annotations['method']['testdox'][0])) {
            $this->currentTestMethodPrettified = $annotations['method']['testdox'][0];
            $prettified                        = true;
        }

        if (!$prettified) {
            $this->currentTestMethodPrettified = $this->prettifier->prettifyTestMethod($test->getName(false));
        }

        $this->testStatus = PHPUnit_Runner_BaseTestRunner::STATUS_PASSED;
=======
            $classAnnotations = \PHPUnit\Util\Test::parseTestMethodAnnotations($class);
            if (isset($classAnnotations['class']['testdox'][0])) {
                $this->currentTestClassPrettified = $classAnnotations['class']['testdox'][0];
            } else {
                $this->currentTestClassPrettified = $this->prettifier->prettifyTestClass($class);
            }

            $this->startClass($class);

            $this->testClass = $class;
            $this->tests     = [];
        }

        if ($test instanceof TestCase) {
            $annotations = $test->getAnnotations();

            if (isset($annotations['method']['testdox'][0])) {
                $this->currentTestMethodPrettified = $annotations['method']['testdox'][0];
            } else {
                $this->currentTestMethodPrettified = $this->prettifier->prettifyTestMethod($test->getName(false));
            }

            if ($test->usesDataProvider()) {
                $this->currentTestMethodPrettified .= ' ' . $test->dataDescription();
            }
        }

        $this->testStatus = BaseTestRunner::STATUS_PASSED;
>>>>>>> dev
    }

    /**
     * A test ended.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(PHPUnit_Framework_Test $test, $time)
=======
     * @param Test  $test
     * @param float $time
     */
    public function endTest(Test $test, $time)
>>>>>>> dev
    {
        if (!$this->isOfInterest($test)) {
            return;
        }

        if (!isset($this->tests[$this->currentTestMethodPrettified])) {
<<<<<<< HEAD
            if ($this->testStatus == PHPUnit_Runner_BaseTestRunner::STATUS_PASSED) {
=======
            if ($this->testStatus == BaseTestRunner::STATUS_PASSED) {
>>>>>>> dev
                $this->tests[$this->currentTestMethodPrettified]['success'] = 1;
                $this->tests[$this->currentTestMethodPrettified]['failure'] = 0;
            } else {
                $this->tests[$this->currentTestMethodPrettified]['success'] = 0;
                $this->tests[$this->currentTestMethodPrettified]['failure'] = 1;
            }
        } else {
<<<<<<< HEAD
            if ($this->testStatus == PHPUnit_Runner_BaseTestRunner::STATUS_PASSED) {
=======
            if ($this->testStatus == BaseTestRunner::STATUS_PASSED) {
>>>>>>> dev
                $this->tests[$this->currentTestMethodPrettified]['success']++;
            } else {
                $this->tests[$this->currentTestMethodPrettified]['failure']++;
            }
        }

        $this->currentTestClassPrettified  = null;
        $this->currentTestMethodPrettified = null;
    }

<<<<<<< HEAD
    /**
     * @since  Method available since Release 2.3.0
     */
=======
>>>>>>> dev
    protected function doEndClass()
    {
        foreach ($this->tests as $name => $data) {
            $this->onTest($name, $data['failure'] == 0);
        }

        $this->endClass($this->testClass);
    }

    /**
     * Handler for 'start run' event.
     */
    protected function startRun()
    {
    }

    /**
     * Handler for 'start class' event.
     *
     * @param string $name
     */
    protected function startClass($name)
    {
    }

    /**
     * Handler for 'on test' event.
     *
     * @param string $name
     * @param bool   $success
     */
    protected function onTest($name, $success = true)
    {
    }

    /**
     * Handler for 'end class' event.
     *
     * @param string $name
     */
    protected function endClass($name)
    {
    }

    /**
     * Handler for 'end run' event.
     */
    protected function endRun()
    {
    }

<<<<<<< HEAD
    private function isOfInterest(PHPUnit_Framework_Test $test)
    {
        return $test instanceof PHPUnit_Framework_TestCase && get_class($test) != 'PHPUnit_Framework_Warning';
=======
    /**
     * @param Test $test
     *
     * @return bool
     */
    private function isOfInterest(Test $test)
    {
        if (!$test instanceof TestCase) {
            return false;
        }

        if ($test instanceof WarningTestCase) {
            return false;
        }

        if (!empty($this->groups)) {
            foreach ($test->getGroups() as $group) {
                if (\in_array($group, $this->groups)) {
                    return true;
                }
            }

            return false;
        }

        if (!empty($this->excludeGroups)) {
            foreach ($test->getGroups() as $group) {
                if (\in_array($group, $this->excludeGroups)) {
                    return false;
                }
            }

            return true;
        }

        return true;
>>>>>>> dev
    }
}
