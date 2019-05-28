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
=======
namespace PHPUnit\Util\Log;

use DOMDocument;
use DOMElement;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExceptionWrapper;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Util\Filter;
use PHPUnit\Util\Printer;
use PHPUnit\Util\Xml;
use ReflectionClass;
use ReflectionException;
>>>>>>> dev

/**
 * A TestListener that generates a logfile of the test execution in XML markup.
 *
 * The XML markup used is the same as the one that is used by the JUnit Ant task.
<<<<<<< HEAD
 *
 * @since Class available since Release 2.1.0
 */
class PHPUnit_Util_Log_JUnit extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
=======
 */
class JUnit extends Printer implements TestListener
>>>>>>> dev
{
    /**
     * @var DOMDocument
     */
    protected $document;

    /**
     * @var DOMElement
     */
    protected $root;

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $logIncompleteSkipped = false;
=======
    protected $reportUselessTests = false;
>>>>>>> dev

    /**
     * @var bool
     */
    protected $writeDocument = true;

    /**
     * @var DOMElement[]
     */
<<<<<<< HEAD
    protected $testSuites = array();
=======
    protected $testSuites = [];
>>>>>>> dev

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteTests = array(0);
=======
    protected $testSuiteTests = [0];
>>>>>>> dev

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteAssertions = array(0);
=======
    protected $testSuiteAssertions = [0];
>>>>>>> dev

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteErrors = array(0);
=======
    protected $testSuiteErrors = [0];
>>>>>>> dev

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteFailures = array(0);
=======
    protected $testSuiteFailures = [0];
>>>>>>> dev

    /**
     * @var int[]
     */
<<<<<<< HEAD
    protected $testSuiteTimes = array(0);

    /**
     * @var int
     */
    protected $testSuiteLevel = 0;

    /**
     * @var DOMElement
     */
    protected $currentTestCase = null;

    /**
     * @var bool
     */
    protected $attachCurrentTestCase = true;
=======
    protected $testSuiteSkipped = [0];

    /**
     * @var int[]
     */
    protected $testSuiteTimes = [0];

    /**
     * @var int
     */
    protected $testSuiteLevel = 0;

    /**
     * @var ?DOMElement
     */
    protected $currentTestCase;
>>>>>>> dev

    /**
     * Constructor.
     *
     * @param mixed $out
<<<<<<< HEAD
     * @param bool  $logIncompleteSkipped
     */
    public function __construct($out = null, $logIncompleteSkipped = false)
=======
     * @param bool  $reportUselessTests
     */
    public function __construct($out = null, $reportUselessTests = false)
>>>>>>> dev
    {
        $this->document               = new DOMDocument('1.0', 'UTF-8');
        $this->document->formatOutput = true;

        $this->root = $this->document->createElement('testsuites');
        $this->document->appendChild($this->root);

        parent::__construct($out);

<<<<<<< HEAD
        $this->logIncompleteSkipped = $logIncompleteSkipped;
=======
        $this->reportUselessTests = $reportUselessTests;
>>>>>>> dev
    }

    /**
     * Flush buffer and close output.
     */
    public function flush()
    {
        if ($this->writeDocument === true) {
            $this->write($this->getXML());
        }

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
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($test instanceof PHPUnit_Framework_SelfDescribing) {
            $buffer = $test->toString() . PHP_EOL;
        } else {
            $buffer = '';
        }

        if ($e instanceof PHPUnit_Framework_ExceptionWrapper) {
            $type    = $e->getClassname();
            $buffer .= (string) $e;
        } else {
            $type    = get_class($e);
            $buffer .= PHPUnit_Framework_TestFailure::exceptionToString($e) . PHP_EOL .
                       PHPUnit_Util_Filter::getFilteredStacktrace($e);
        }

        $error = $this->document->createElement(
            'error',
            PHPUnit_Util_XML::prepareString($buffer)
        );

        $error->setAttribute('type', $type);

        $this->currentTestCase->appendChild($error);

=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addError(Test $test, \Exception $e, $time)
    {
        $this->doAddFault($test, $e, $time, 'error');
>>>>>>> dev
        $this->testSuiteErrors[$this->testSuiteLevel]++;
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
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($test instanceof PHPUnit_Framework_SelfDescribing) {
            $buffer = $test->toString() . "\n";
        } else {
            $buffer = '';
        }

        $buffer .= PHPUnit_Framework_TestFailure::exceptionToString($e) .
                   "\n" .
                   PHPUnit_Util_Filter::getFilteredStacktrace($e);

        $failure = $this->document->createElement(
            'failure',
            PHPUnit_Util_XML::prepareString($buffer)
        );

        $failure->setAttribute('type', get_class($e));

        $this->currentTestCase->appendChild($failure);

=======
     * A warning occurred.
     *
     * @param Test    $test
     * @param Warning $e
     * @param float   $time
     */
    public function addWarning(Test $test, Warning $e, $time)
    {
        $this->doAddFault($test, $e, $time, 'warning');
        $this->testSuiteFailures[$this->testSuiteLevel]++;
    }

    /**
     * A failure occurred.
     *
     * @param Test                 $test
     * @param AssertionFailedError $e
     * @param float                $time
     */
    public function addFailure(Test $test, AssertionFailedError $e, $time)
    {
        $this->doAddFault($test, $e, $time, 'failure');
>>>>>>> dev
        $this->testSuiteFailures[$this->testSuiteLevel]++;
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
    {
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $error = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Incomplete Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($e)
                )
            );

            $error->setAttribute('type', get_class($e));

            $this->currentTestCase->appendChild($error);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addIncompleteTest(Test $test, \Exception $e, $time)
    {
        $this->doAddSkipped($test);
>>>>>>> dev
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
    {
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $error = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Risky Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($e)
                )
            );

            $error->setAttribute('type', get_class($e));

            $this->currentTestCase->appendChild($error);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addRiskyTest(Test $test, \Exception $e, $time)
    {
        if (!$this->reportUselessTests || $this->currentTestCase === null) {
            return;
        }

        $error = $this->document->createElement(
            'error',
            Xml::prepareString(
                "Risky Test\n" .
                Filter::getFilteredStacktrace($e)
            )
        );

        $error->setAttribute('type', \get_class($e));

        $this->currentTestCase->appendChild($error);

        $this->testSuiteErrors[$this->testSuiteLevel]++;
>>>>>>> dev
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
    {
        if ($this->logIncompleteSkipped && $this->currentTestCase !== null) {
            $error = $this->document->createElement(
                'error',
                PHPUnit_Util_XML::prepareString(
                    "Skipped Test\n" .
                    PHPUnit_Util_Filter::getFilteredStacktrace($e)
                )
            );

            $error->setAttribute('type', get_class($e));

            $this->currentTestCase->appendChild($error);

            $this->testSuiteErrors[$this->testSuiteLevel]++;
        } else {
            $this->attachCurrentTestCase = false;
        }
=======
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addSkippedTest(Test $test, \Exception $e, $time)
    {
        $this->doAddSkipped($test);
>>>>>>> dev
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
        $testSuite = $this->document->createElement('testsuite');
        $testSuite->setAttribute('name', $suite->getName());

<<<<<<< HEAD
        if (class_exists($suite->getName(), false)) {
=======
        if (\class_exists($suite->getName(), false)) {
>>>>>>> dev
            try {
                $class = new ReflectionClass($suite->getName());

                $testSuite->setAttribute('file', $class->getFileName());
            } catch (ReflectionException $e) {
            }
        }

        if ($this->testSuiteLevel > 0) {
            $this->testSuites[$this->testSuiteLevel]->appendChild($testSuite);
        } else {
            $this->root->appendChild($testSuite);
        }

        $this->testSuiteLevel++;
        $this->testSuites[$this->testSuiteLevel]          = $testSuite;
        $this->testSuiteTests[$this->testSuiteLevel]      = 0;
        $this->testSuiteAssertions[$this->testSuiteLevel] = 0;
        $this->testSuiteErrors[$this->testSuiteLevel]     = 0;
        $this->testSuiteFailures[$this->testSuiteLevel]   = 0;
<<<<<<< HEAD
=======
        $this->testSuiteSkipped[$this->testSuiteLevel]    = 0;
>>>>>>> dev
        $this->testSuiteTimes[$this->testSuiteLevel]      = 0;
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
        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'tests',
            $this->testSuiteTests[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'assertions',
            $this->testSuiteAssertions[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
<<<<<<< HEAD
=======
            'errors',
            $this->testSuiteErrors[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
>>>>>>> dev
            'failures',
            $this->testSuiteFailures[$this->testSuiteLevel]
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
<<<<<<< HEAD
            'errors',
            $this->testSuiteErrors[$this->testSuiteLevel]
=======
            'skipped',
            $this->testSuiteSkipped[$this->testSuiteLevel]
>>>>>>> dev
        );

        $this->testSuites[$this->testSuiteLevel]->setAttribute(
            'time',
<<<<<<< HEAD
            sprintf('%F', $this->testSuiteTimes[$this->testSuiteLevel])
        );

        if ($this->testSuiteLevel > 1) {
            $this->testSuiteTests[$this->testSuiteLevel - 1]      += $this->testSuiteTests[$this->testSuiteLevel];
            $this->testSuiteAssertions[$this->testSuiteLevel - 1] += $this->testSuiteAssertions[$this->testSuiteLevel];
            $this->testSuiteErrors[$this->testSuiteLevel - 1]     += $this->testSuiteErrors[$this->testSuiteLevel];
            $this->testSuiteFailures[$this->testSuiteLevel - 1]   += $this->testSuiteFailures[$this->testSuiteLevel];
            $this->testSuiteTimes[$this->testSuiteLevel - 1]      += $this->testSuiteTimes[$this->testSuiteLevel];
=======
            \sprintf('%F', $this->testSuiteTimes[$this->testSuiteLevel])
        );

        if ($this->testSuiteLevel > 1) {
            $this->testSuiteTests[$this->testSuiteLevel - 1] += $this->testSuiteTests[$this->testSuiteLevel];
            $this->testSuiteAssertions[$this->testSuiteLevel - 1] += $this->testSuiteAssertions[$this->testSuiteLevel];
            $this->testSuiteErrors[$this->testSuiteLevel - 1] += $this->testSuiteErrors[$this->testSuiteLevel];
            $this->testSuiteFailures[$this->testSuiteLevel - 1] += $this->testSuiteFailures[$this->testSuiteLevel];
            $this->testSuiteSkipped[$this->testSuiteLevel - 1] += $this->testSuiteSkipped[$this->testSuiteLevel];
            $this->testSuiteTimes[$this->testSuiteLevel - 1] += $this->testSuiteTimes[$this->testSuiteLevel];
>>>>>>> dev
        }

        $this->testSuiteLevel--;
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
        $testCase = $this->document->createElement('testcase');
        $testCase->setAttribute('name', $test->getName());

<<<<<<< HEAD
        if ($test instanceof PHPUnit_Framework_TestCase) {
            $class      = new ReflectionClass($test);
            $methodName = $test->getName();

            if ($class->hasMethod($methodName)) {
                $method = $class->getMethod($test->getName());

                $testCase->setAttribute('class', $class->getName());
=======
        if ($test instanceof TestCase) {
            $class      = new ReflectionClass($test);
            $methodName = $test->getName(!$test->usesDataProvider());

            if ($class->hasMethod($methodName)) {
                $method = $class->getMethod($methodName);

                $testCase->setAttribute('class', $class->getName());
                $testCase->setAttribute('classname', \str_replace('\\', '.', $class->getName()));
>>>>>>> dev
                $testCase->setAttribute('file', $class->getFileName());
                $testCase->setAttribute('line', $method->getStartLine());
            }
        }

        $this->currentTestCase = $testCase;
    }

    /**
     * A test ended.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(PHPUnit_Framework_Test $test, $time)
    {
        if ($this->attachCurrentTestCase) {
            if ($test instanceof PHPUnit_Framework_TestCase) {
                $numAssertions = $test->getNumAssertions();
                $this->testSuiteAssertions[$this->testSuiteLevel] += $numAssertions;

                $this->currentTestCase->setAttribute(
                    'assertions',
                    $numAssertions
                );
            }

            $this->currentTestCase->setAttribute(
                'time',
                sprintf('%F', $time)
            );

            $this->testSuites[$this->testSuiteLevel]->appendChild(
                $this->currentTestCase
            );

            $this->testSuiteTests[$this->testSuiteLevel]++;
            $this->testSuiteTimes[$this->testSuiteLevel] += $time;

            if (method_exists($test, 'hasOutput') && $test->hasOutput()) {
                $systemOut = $this->document->createElement('system-out');
                $systemOut->appendChild(
                    $this->document->createTextNode($test->getActualOutput())
                );
                $this->currentTestCase->appendChild($systemOut);
            }
        }

        $this->attachCurrentTestCase = true;
        $this->currentTestCase       = null;
=======
     * @param Test  $test
     * @param float $time
     */
    public function endTest(Test $test, $time)
    {
        if ($test instanceof TestCase) {
            $numAssertions = $test->getNumAssertions();
            $this->testSuiteAssertions[$this->testSuiteLevel] += $numAssertions;

            $this->currentTestCase->setAttribute(
                'assertions',
                $numAssertions
            );
        }

        $this->currentTestCase->setAttribute(
            'time',
            \sprintf('%F', $time)
        );

        $this->testSuites[$this->testSuiteLevel]->appendChild(
            $this->currentTestCase
        );

        $this->testSuiteTests[$this->testSuiteLevel]++;
        $this->testSuiteTimes[$this->testSuiteLevel] += $time;

        if (\method_exists($test, 'hasOutput') && $test->hasOutput()) {
            $systemOut = $this->document->createElement(
                'system-out',
                Xml::prepareString($test->getActualOutput())
            );

            $this->currentTestCase->appendChild($systemOut);
        }

        $this->currentTestCase = null;
>>>>>>> dev
    }

    /**
     * Returns the XML as a string.
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 2.2.0
=======
>>>>>>> dev
     */
    public function getXML()
    {
        return $this->document->saveXML();
    }

    /**
     * Enables or disables the writing of the document
     * in flush().
     *
     * This is a "hack" needed for the integration of
     * PHPUnit with Phing.
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 2.2.0
     */
    public function setWriteDocument($flag)
    {
        if (is_bool($flag)) {
            $this->writeDocument = $flag;
        }
    }
=======
     */
    public function setWriteDocument($flag)
    {
        if (\is_bool($flag)) {
            $this->writeDocument = $flag;
        }
    }

    /**
     * Method which generalizes addError() and addFailure()
     *
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     * @param string     $type
     */
    private function doAddFault(Test $test, \Exception $e, $time, $type)
    {
        if ($this->currentTestCase === null) {
            return;
        }

        if ($test instanceof SelfDescribing) {
            $buffer = $test->toString() . "\n";
        } else {
            $buffer = '';
        }

        $buffer .= TestFailure::exceptionToString($e) . "\n" .
                   Filter::getFilteredStacktrace($e);

        $fault = $this->document->createElement(
            $type,
            Xml::prepareString($buffer)
        );

        if ($e instanceof ExceptionWrapper) {
            $fault->setAttribute('type', $e->getClassName());
        } else {
            $fault->setAttribute('type', \get_class($e));
        }

        $this->currentTestCase->appendChild($fault);
    }

    private function doAddSkipped(Test $test)
    {
        if ($this->currentTestCase === null) {
            return;
        }

        $skipped = $this->document->createElement('skipped');
        $this->currentTestCase->appendChild($skipped);

        $this->testSuiteSkipped[$this->testSuiteLevel]++;
    }
>>>>>>> dev
}
