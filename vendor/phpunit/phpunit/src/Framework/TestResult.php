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
 * A TestResult collects the results of executing a test case.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Framework_TestResult implements Countable
=======
namespace PHPUnit\Framework;

use AssertionError;
use Countable;
use Error;
use PHP_Invoker;
use PHP_Invoker_TimeoutException;
use PHP_Timer;
use PHPUnit\Framework\MockObject\Exception as MockObjectException;
use PHPUnit\Util\Blacklist;
use PHPUnit\Util\InvalidArgumentHelper;
use PHPUnit\Util\Printer;
use ReflectionClass;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException as OriginalCoveredCodeNotExecutedException;
use SebastianBergmann\CodeCoverage\Exception as OriginalCodeCoverageException;
use SebastianBergmann\CodeCoverage\MissingCoversAnnotationException as OriginalMissingCoversAnnotationException;
use SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException;
use SebastianBergmann\ResourceOperations\ResourceOperations;
use Throwable;

/**
 * A TestResult collects the results of executing a test case.
 */
class TestResult implements Countable
>>>>>>> dev
{
    /**
     * @var array
     */
<<<<<<< HEAD
    protected $passed = array();
=======
    protected $passed = [];

    /**
     * @var array
     */
    protected $errors = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $errors = array();
=======
    protected $failures = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $failures = array();
=======
    protected $warnings = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $notImplemented = array();
=======
    protected $notImplemented = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $risky = array();
=======
    protected $risky = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $skipped = array();
=======
    protected $skipped = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $listeners = array();
=======
    protected $listeners = [];
>>>>>>> dev

    /**
     * @var int
     */
    protected $runTests = 0;

    /**
     * @var float
     */
    protected $time = 0;

    /**
<<<<<<< HEAD
     * @var PHPUnit_Framework_TestSuite
     */
    protected $topTestSuite = null;
=======
     * @var TestSuite
     */
    protected $topTestSuite;
>>>>>>> dev

    /**
     * Code Coverage information.
     *
<<<<<<< HEAD
     * @var PHP_CodeCoverage
=======
     * @var CodeCoverage
>>>>>>> dev
     */
    protected $codeCoverage;

    /**
     * @var bool
     */
    protected $convertErrorsToExceptions = true;

    /**
     * @var bool
     */
    protected $stop = false;

    /**
     * @var bool
     */
    protected $stopOnError = false;

    /**
     * @var bool
     */
    protected $stopOnFailure = false;

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $beStrictAboutTestsThatDoNotTestAnything = false;
=======
    protected $stopOnWarning = false;
>>>>>>> dev

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $beStrictAboutOutputDuringTests = false;
=======
    protected $beStrictAboutTestsThatDoNotTestAnything = true;
>>>>>>> dev

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $beStrictAboutTestSize = false;
=======
    protected $beStrictAboutOutputDuringTests = false;
>>>>>>> dev

    /**
     * @var bool
     */
    protected $beStrictAboutTodoAnnotatedTests = false;

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $stopOnRisky = false;
=======
    protected $beStrictAboutResourceUsageDuringSmallTests = false;
>>>>>>> dev

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $stopOnIncomplete = false;
=======
    protected $enforceTimeLimit = false;

    /**
     * @var int
     */
    protected $timeoutForSmallTests = 1;

    /**
     * @var int
     */
    protected $timeoutForMediumTests = 10;

    /**
     * @var int
     */
    protected $timeoutForLargeTests = 60;
>>>>>>> dev

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $stopOnSkipped = false;
=======
    protected $stopOnRisky = false;
>>>>>>> dev

    /**
     * @var bool
     */
<<<<<<< HEAD
    protected $lastTestFailed = false;

    /**
     * @var int
     */
    protected $timeoutForSmallTests = 1;

    /**
     * @var int
     */
    protected $timeoutForMediumTests = 10;

    /**
     * @var int
     */
    protected $timeoutForLargeTests = 60;
=======
    protected $stopOnIncomplete = false;

    /**
     * @var bool
     */
    protected $stopOnSkipped = false;

    /**
     * @var bool
     */
    protected $lastTestFailed = false;

    /**
     * @var bool
     */
    private $registerMockObjectsFromTestArgumentsRecursively = false;
>>>>>>> dev

    /**
     * Registers a TestListener.
     *
<<<<<<< HEAD
     * @param  PHPUnit_Framework_TestListener
     */
    public function addListener(PHPUnit_Framework_TestListener $listener)
=======
     * @param TestListener $listener
     */
    public function addListener(TestListener $listener)
>>>>>>> dev
    {
        $this->listeners[] = $listener;
    }

    /**
     * Unregisters a TestListener.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestListener $listener
     */
    public function removeListener(PHPUnit_Framework_TestListener $listener)
=======
     * @param TestListener $listener
     */
    public function removeListener(TestListener $listener)
>>>>>>> dev
    {
        foreach ($this->listeners as $key => $_listener) {
            if ($listener === $_listener) {
                unset($this->listeners[$key]);
            }
        }
    }

    /**
     * Flushes all flushable TestListeners.
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
=======
>>>>>>> dev
     */
    public function flushListeners()
    {
        foreach ($this->listeners as $listener) {
<<<<<<< HEAD
            if ($listener instanceof PHPUnit_Util_Printer) {
=======
            if ($listener instanceof Printer) {
>>>>>>> dev
                $listener->flush();
            }
        }
    }

    /**
     * Adds an error to the list of errors.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addError(PHPUnit_Framework_Test $test, Exception $e, $time)
    {
        if ($e instanceof PHPUnit_Framework_RiskyTest) {
            $this->risky[] = new PHPUnit_Framework_TestFailure($test, $e);
            $notifyMethod  = 'addRiskyTest';

            if ($this->stopOnRisky) {
                $this->stop();
            }
        } elseif ($e instanceof PHPUnit_Framework_IncompleteTest) {
            $this->notImplemented[] = new PHPUnit_Framework_TestFailure($test, $e);
=======
     * @param Test      $test
     * @param Throwable $t
     * @param float     $time
     */
    public function addError(Test $test, Throwable $t, $time)
    {
        if ($t instanceof RiskyTest) {
            $this->risky[] = new TestFailure($test, $t);
            $notifyMethod  = 'addRiskyTest';

            if ($test instanceof TestCase) {
                $test->markAsRisky();
            }

            if ($this->stopOnRisky) {
                $this->stop();
            }
        } elseif ($t instanceof IncompleteTest) {
            $this->notImplemented[] = new TestFailure($test, $t);
>>>>>>> dev
            $notifyMethod           = 'addIncompleteTest';

            if ($this->stopOnIncomplete) {
                $this->stop();
            }
<<<<<<< HEAD
        } elseif ($e instanceof PHPUnit_Framework_SkippedTest) {
            $this->skipped[] = new PHPUnit_Framework_TestFailure($test, $e);
=======
        } elseif ($t instanceof SkippedTest) {
            $this->skipped[] = new TestFailure($test, $t);
>>>>>>> dev
            $notifyMethod    = 'addSkippedTest';

            if ($this->stopOnSkipped) {
                $this->stop();
            }
        } else {
<<<<<<< HEAD
            $this->errors[] = new PHPUnit_Framework_TestFailure($test, $e);
=======
            $this->errors[] = new TestFailure($test, $t);
>>>>>>> dev
            $notifyMethod   = 'addError';

            if ($this->stopOnError || $this->stopOnFailure) {
                $this->stop();
            }
        }

<<<<<<< HEAD
        foreach ($this->listeners as $listener) {
            $listener->$notifyMethod($test, $e, $time);
        }

        $this->lastTestFailed = true;
        $this->time          += $time;
=======
        // @see https://github.com/sebastianbergmann/phpunit/issues/1953
        if ($t instanceof Error) {
            $t = new ExceptionWrapper($t);
        }

        foreach ($this->listeners as $listener) {
            $listener->$notifyMethod($test, $t, $time);
        }

        $this->lastTestFailed = true;
        $this->time += $time;
    }

    /**
     * Adds a warning to the list of warnings.
     * The passed in exception caused the warning.
     *
     * @param Test    $test
     * @param Warning $e
     * @param float   $time
     */
    public function addWarning(Test $test, Warning $e, $time)
    {
        if ($this->stopOnWarning) {
            $this->stop();
        }

        $this->warnings[] = new TestFailure($test, $e);

        foreach ($this->listeners as $listener) {
            $listener->addWarning($test, $e, $time);
        }

        $this->time += $time;
>>>>>>> dev
    }

    /**
     * Adds a failure to the list of failures.
     * The passed in exception caused the failure.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        if ($e instanceof PHPUnit_Framework_RiskyTest ||
            $e instanceof PHPUnit_Framework_OutputError) {
            $this->risky[] = new PHPUnit_Framework_TestFailure($test, $e);
            $notifyMethod  = 'addRiskyTest';

            if ($this->stopOnRisky) {
                $this->stop();
            }
        } elseif ($e instanceof PHPUnit_Framework_IncompleteTest) {
            $this->notImplemented[] = new PHPUnit_Framework_TestFailure($test, $e);
=======
     * @param Test                 $test
     * @param AssertionFailedError $e
     * @param float                $time
     */
    public function addFailure(Test $test, AssertionFailedError $e, $time)
    {
        if ($e instanceof RiskyTest || $e instanceof OutputError) {
            $this->risky[] = new TestFailure($test, $e);
            $notifyMethod  = 'addRiskyTest';

            if ($test instanceof TestCase) {
                $test->markAsRisky();
            }

            if ($this->stopOnRisky) {
                $this->stop();
            }
        } elseif ($e instanceof IncompleteTest) {
            $this->notImplemented[] = new TestFailure($test, $e);
>>>>>>> dev
            $notifyMethod           = 'addIncompleteTest';

            if ($this->stopOnIncomplete) {
                $this->stop();
            }
<<<<<<< HEAD
        } elseif ($e instanceof PHPUnit_Framework_SkippedTest) {
            $this->skipped[] = new PHPUnit_Framework_TestFailure($test, $e);
=======
        } elseif ($e instanceof SkippedTest) {
            $this->skipped[] = new TestFailure($test, $e);
>>>>>>> dev
            $notifyMethod    = 'addSkippedTest';

            if ($this->stopOnSkipped) {
                $this->stop();
            }
        } else {
<<<<<<< HEAD
            $this->failures[] = new PHPUnit_Framework_TestFailure($test, $e);
=======
            $this->failures[] = new TestFailure($test, $e);
>>>>>>> dev
            $notifyMethod     = 'addFailure';

            if ($this->stopOnFailure) {
                $this->stop();
            }
        }

        foreach ($this->listeners as $listener) {
            $listener->$notifyMethod($test, $e, $time);
        }

        $this->lastTestFailed = true;
<<<<<<< HEAD
        $this->time          += $time;
=======
        $this->time += $time;
>>>>>>> dev
    }

    /**
     * Informs the result that a testsuite will be started.
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
        if ($this->topTestSuite === null) {
            $this->topTestSuite = $suite;
        }

        foreach ($this->listeners as $listener) {
            $listener->startTestSuite($suite);
        }
    }

    /**
     * Informs the result that a testsuite was completed.
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
        foreach ($this->listeners as $listener) {
            $listener->endTestSuite($suite);
        }
    }

    /**
     * Informs the result that a test will be started.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     */
    public function startTest(PHPUnit_Framework_Test $test)
    {
        $this->lastTestFailed = false;
        $this->runTests      += count($test);
=======
     * @param Test $test
     */
    public function startTest(Test $test)
    {
        $this->lastTestFailed = false;
        $this->runTests += \count($test);
>>>>>>> dev

        foreach ($this->listeners as $listener) {
            $listener->startTest($test);
        }
    }

    /**
     * Informs the result that a test was completed.
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
        foreach ($this->listeners as $listener) {
            $listener->endTest($test, $time);
        }

<<<<<<< HEAD
        if (!$this->lastTestFailed && $test instanceof PHPUnit_Framework_TestCase) {
            $class  = get_class($test);
            $key    = $class . '::' . $test->getName();

            $this->passed[$key] = array(
                'result' => $test->getResult(),
                'size'   => PHPUnit_Util_Test::getSize(
                    $class,
                    $test->getName(false)
                )
            );
=======
        if (!$this->lastTestFailed && $test instanceof TestCase) {
            $class = \get_class($test);
            $key   = $class . '::' . $test->getName();

            $this->passed[$key] = [
                'result' => $test->getResult(),
                'size'   => \PHPUnit\Util\Test::getSize(
                    $class,
                    $test->getName(false)
                )
            ];
>>>>>>> dev

            $this->time += $time;
        }
    }

    /**
     * Returns true if no risky test occurred.
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    public function allHarmless()
    {
        return $this->riskyCount() == 0;
    }

    /**
     * Gets the number of risky tests.
     *
     * @return int
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
     */
    public function riskyCount()
    {
        return count($this->risky);
=======
     */
    public function riskyCount()
    {
        return \count($this->risky);
>>>>>>> dev
    }

    /**
     * Returns true if no incomplete test occurred.
     *
     * @return bool
     */
    public function allCompletelyImplemented()
    {
        return $this->notImplementedCount() == 0;
    }

    /**
     * Gets the number of incomplete tests.
     *
     * @return int
     */
    public function notImplementedCount()
    {
<<<<<<< HEAD
        return count($this->notImplemented);
=======
        return \count($this->notImplemented);
>>>>>>> dev
    }

    /**
     * Returns an Enumeration for the risky tests.
     *
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    public function risky()
    {
        return $this->risky;
    }

    /**
     * Returns an Enumeration for the incomplete tests.
     *
     * @return array
     */
    public function notImplemented()
    {
        return $this->notImplemented;
    }

    /**
     * Returns true if no test has been skipped.
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
=======
>>>>>>> dev
     */
    public function noneSkipped()
    {
        return $this->skippedCount() == 0;
    }

    /**
     * Gets the number of skipped tests.
     *
     * @return int
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
     */
    public function skippedCount()
    {
        return count($this->skipped);
=======
     */
    public function skippedCount()
    {
        return \count($this->skipped);
>>>>>>> dev
    }

    /**
     * Returns an Enumeration for the skipped tests.
     *
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
=======
>>>>>>> dev
     */
    public function skipped()
    {
        return $this->skipped;
    }

    /**
     * Gets the number of detected errors.
     *
     * @return int
     */
    public function errorCount()
    {
<<<<<<< HEAD
        return count($this->errors);
=======
        return \count($this->errors);
>>>>>>> dev
    }

    /**
     * Returns an Enumeration for the errors.
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Gets the number of detected failures.
     *
     * @return int
     */
    public function failureCount()
    {
<<<<<<< HEAD
        return count($this->failures);
=======
        return \count($this->failures);
>>>>>>> dev
    }

    /**
     * Returns an Enumeration for the failures.
     *
     * @return array
     */
    public function failures()
    {
        return $this->failures;
    }

    /**
<<<<<<< HEAD
     * Returns the names of the tests that have passed.
     *
     * @return array
     *
     * @since  Method available since Release 3.4.0
=======
     * Gets the number of detected warnings.
     *
     * @return int
     */
    public function warningCount()
    {
        return \count($this->warnings);
    }

    /**
     * Returns an Enumeration for the warnings.
     *
     * @return array
     */
    public function warnings()
    {
        return $this->warnings;
    }

    /**
     * Returns the names of the tests that have passed.
     *
     * @return array
>>>>>>> dev
     */
    public function passed()
    {
        return $this->passed;
    }

    /**
     * Returns the (top) test suite.
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_TestSuite
     *
     * @since  Method available since Release 3.0.0
=======
     * @return TestSuite
>>>>>>> dev
     */
    public function topTestSuite()
    {
        return $this->topTestSuite;
    }

    /**
     * Returns whether code coverage information should be collected.
     *
     * @return bool If code coverage should be collected
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.2.0
=======
>>>>>>> dev
     */
    public function getCollectCodeCoverageInformation()
    {
        return $this->codeCoverage !== null;
    }

    /**
     * Runs a TestCase.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     */
    public function run(PHPUnit_Framework_Test $test)
    {
        PHPUnit_Framework_Assert::resetCount();

        $error      = false;
        $failure    = false;
=======
     * @param Test $test
     */
    public function run(Test $test)
    {
        Assert::resetCount();

        $coversNothing = false;

        if ($test instanceof TestCase) {
            $test->setRegisterMockObjectsFromTestArgumentsRecursively(
                $this->registerMockObjectsFromTestArgumentsRecursively
            );

            $annotations = $test->getAnnotations();

            if (isset($annotations['class']['coversNothing']) || isset($annotations['method']['coversNothing'])) {
                $coversNothing = true;
            }
        }

        $error      = false;
        $failure    = false;
        $warning    = false;
>>>>>>> dev
        $incomplete = false;
        $risky      = false;
        $skipped    = false;

        $this->startTest($test);

        $errorHandlerSet = false;

        if ($this->convertErrorsToExceptions) {
<<<<<<< HEAD
            $oldErrorHandler = set_error_handler(
                array('PHPUnit_Util_ErrorHandler', 'handleError'),
=======
            $oldErrorHandler = \set_error_handler(
                [\PHPUnit\Util\ErrorHandler::class, 'handleError'],
>>>>>>> dev
                E_ALL | E_STRICT
            );

            if ($oldErrorHandler === null) {
                $errorHandlerSet = true;
            } else {
<<<<<<< HEAD
                restore_error_handler();
=======
                \restore_error_handler();
>>>>>>> dev
            }
        }

        $collectCodeCoverage = $this->codeCoverage !== null &&
<<<<<<< HEAD
                               !$test instanceof PHPUnit_Extensions_SeleniumTestCase &&
                               !$test instanceof PHPUnit_Framework_Warning;

        if ($collectCodeCoverage) {
            // We need to blacklist test source files when no whitelist is used.
            if (!$this->codeCoverage->filter()->hasWhitelist()) {
                $classes = $this->getHierarchy(get_class($test), true);

                foreach ($classes as $class) {
                    $this->codeCoverage->filter()->addFileToBlacklist(
                        $class->getFileName()
                    );
                }
            }

            $this->codeCoverage->start($test);
=======
                               !$test instanceof WarningTestCase &&
                               !$coversNothing;

        if ($collectCodeCoverage) {
            $this->codeCoverage->start($test);
        }

        $monitorFunctions = $this->beStrictAboutResourceUsageDuringSmallTests &&
            !$test instanceof WarningTestCase &&
            $test->getSize() == \PHPUnit\Util\Test::SMALL &&
            \function_exists('xdebug_start_function_monitor');

        if ($monitorFunctions) {
            \xdebug_start_function_monitor(ResourceOperations::getFunctions());
>>>>>>> dev
        }

        PHP_Timer::start();

        try {
<<<<<<< HEAD
            if (!$test instanceof PHPUnit_Framework_Warning &&
                $test->getSize() != PHPUnit_Util_Test::UNKNOWN &&
                $this->beStrictAboutTestSize &&
                extension_loaded('pcntl') && class_exists('PHP_Invoker')) {
                switch ($test->getSize()) {
                    case PHPUnit_Util_Test::SMALL:
                        $_timeout = $this->timeoutForSmallTests;
                        break;

                    case PHPUnit_Util_Test::MEDIUM:
                        $_timeout = $this->timeoutForMediumTests;
                        break;

                    case PHPUnit_Util_Test::LARGE:
                        $_timeout = $this->timeoutForLargeTests;
=======
            if (!$test instanceof WarningTestCase &&
                $test->getSize() != \PHPUnit\Util\Test::UNKNOWN &&
                $this->enforceTimeLimit &&
                \extension_loaded('pcntl') && \class_exists('PHP_Invoker')) {
                switch ($test->getSize()) {
                    case \PHPUnit\Util\Test::SMALL:
                        $_timeout = $this->timeoutForSmallTests;

                        break;

                    case \PHPUnit\Util\Test::MEDIUM:
                        $_timeout = $this->timeoutForMediumTests;

                        break;

                    case \PHPUnit\Util\Test::LARGE:
                        $_timeout = $this->timeoutForLargeTests;

>>>>>>> dev
                        break;
                }

                $invoker = new PHP_Invoker;
<<<<<<< HEAD
                $invoker->invoke(array($test, 'runBare'), array(), $_timeout);
            } else {
                $test->runBare();
            }
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $failure = true;

            if ($e instanceof PHPUnit_Framework_RiskyTestError) {
                $risky = true;
            } elseif ($e instanceof PHPUnit_Framework_IncompleteTestError) {
                $incomplete = true;
            } elseif ($e instanceof PHPUnit_Framework_SkippedTestError) {
                $skipped = true;
            }
        } catch (PHPUnit_Framework_Exception $e) {
            $error = true;
        } catch (Throwable $e) {
            $e     = new PHPUnit_Framework_ExceptionWrapper($e);
            $error = true;
        } catch (Exception $e) {
            $e     = new PHPUnit_Framework_ExceptionWrapper($e);
=======
                $invoker->invoke([$test, 'runBare'], [], $_timeout);
            } else {
                $test->runBare();
            }
        } catch (PHP_Invoker_TimeoutException $e) {
            $this->addFailure(
                $test,
                new RiskyTestError(
                    $e->getMessage()
                ),
                $_timeout
            );

            $risky = true;
        } catch (MockObjectException $e) {
            $e = new Warning(
                $e->getMessage()
            );

            $warning = true;
        } catch (AssertionFailedError $e) {
            $failure = true;

            if ($e instanceof RiskyTestError) {
                $risky = true;
            } elseif ($e instanceof IncompleteTestError) {
                $incomplete = true;
            } elseif ($e instanceof SkippedTestError) {
                $skipped = true;
            }
        } catch (AssertionError $e) {
            $test->addToAssertionCount(1);

            $failure = true;
            $frame   = $e->getTrace()[0];

            $e = new AssertionFailedError(
                \sprintf(
                    '%s in %s:%s',
                    $e->getMessage(),
                    $frame['file'],
                    $frame['line']
                )
            );
        } catch (Warning $e) {
            $warning = true;
        } catch (Exception $e) {
            $error = true;
        } catch (Throwable $e) {
            $e     = new ExceptionWrapper($e);
>>>>>>> dev
            $error = true;
        }

        $time = PHP_Timer::stop();
<<<<<<< HEAD
        $test->addToAssertionCount(PHPUnit_Framework_Assert::getCount());
=======
        $test->addToAssertionCount(Assert::getCount());

        if ($monitorFunctions) {
            $blacklist = new Blacklist;
            $functions = \xdebug_get_monitored_functions();
            \xdebug_stop_function_monitor();

            foreach ($functions as $function) {
                if (!$blacklist->isBlacklisted($function['filename'])) {
                    $this->addFailure(
                        $test,
                        new RiskyTestError(
                            \sprintf(
                                '%s() used in %s:%s',
                                $function['function'],
                                $function['filename'],
                                $function['lineno']
                            )
                        ),
                        $time
                    );
                }
            }
        }
>>>>>>> dev

        if ($this->beStrictAboutTestsThatDoNotTestAnything &&
            $test->getNumAssertions() == 0) {
            $risky = true;
        }

        if ($collectCodeCoverage) {
            $append           = !$risky && !$incomplete && !$skipped;
<<<<<<< HEAD
            $linesToBeCovered = array();
            $linesToBeUsed    = array();

            if ($append && $test instanceof PHPUnit_Framework_TestCase) {
                $linesToBeCovered = PHPUnit_Util_Test::getLinesToBeCovered(
                    get_class($test),
                    $test->getName(false)
                );

                $linesToBeUsed = PHPUnit_Util_Test::getLinesToBeUsed(
                    get_class($test),
                    $test->getName(false)
                );
=======
            $linesToBeCovered = [];
            $linesToBeUsed    = [];

            if ($append && $test instanceof TestCase) {
                try {
                    $linesToBeCovered = \PHPUnit\Util\Test::getLinesToBeCovered(
                        \get_class($test),
                        $test->getName(false)
                    );

                    $linesToBeUsed = \PHPUnit\Util\Test::getLinesToBeUsed(
                        \get_class($test),
                        $test->getName(false)
                    );
                } catch (InvalidCoversTargetException $cce) {
                    $this->addWarning(
                        $test,
                        new Warning(
                            $cce->getMessage()
                        ),
                        $time
                    );
                }
>>>>>>> dev
            }

            try {
                $this->codeCoverage->stop(
                    $append,
                    $linesToBeCovered,
                    $linesToBeUsed
                );
<<<<<<< HEAD
            } catch (PHP_CodeCoverage_Exception_UnintentionallyCoveredCode $cce) {
                $this->addFailure(
                    $test,
                    new PHPUnit_Framework_UnintentionallyCoveredCodeError(
=======
            } catch (UnintentionallyCoveredCodeException $cce) {
                $this->addFailure(
                    $test,
                    new UnintentionallyCoveredCodeError(
>>>>>>> dev
                        'This test executed code that is not listed as code to be covered or used:' .
                        PHP_EOL . $cce->getMessage()
                    ),
                    $time
                );
<<<<<<< HEAD
            } catch (PHPUnit_Framework_InvalidCoversTargetException $cce) {
                $this->addFailure(
                    $test,
                    new PHPUnit_Framework_InvalidCoversTargetError(
                        $cce->getMessage()
                    ),
                    $time
                );
            } catch (PHP_CodeCoverage_Exception $cce) {
=======
            } catch (OriginalCoveredCodeNotExecutedException $cce) {
                $this->addFailure(
                    $test,
                    new CoveredCodeNotExecutedException(
                        'This test did not execute all the code that is listed as code to be covered:' .
                        PHP_EOL . $cce->getMessage()
                    ),
                    $time
                );
            } catch (OriginalMissingCoversAnnotationException $cce) {
                if ($linesToBeCovered !== false) {
                    $this->addFailure(
                        $test,
                        new MissingCoversAnnotationException(
                            'This test does not have a @covers annotation but is expected to have one'
                        ),
                        $time
                    );
                }
            } catch (OriginalCodeCoverageException $cce) {
>>>>>>> dev
                $error = true;

                if (!isset($e)) {
                    $e = $cce;
                }
            }
        }

        if ($errorHandlerSet === true) {
<<<<<<< HEAD
            restore_error_handler();
=======
            \restore_error_handler();
>>>>>>> dev
        }

        if ($error === true) {
            $this->addError($test, $e, $time);
        } elseif ($failure === true) {
            $this->addFailure($test, $e, $time);
<<<<<<< HEAD
        } elseif ($this->beStrictAboutTestsThatDoNotTestAnything &&
                 $test->getNumAssertions() == 0) {
            $this->addFailure(
                $test,
                new PHPUnit_Framework_RiskyTestError(
=======
        } elseif ($warning === true) {
            $this->addWarning($test, $e, $time);
        } elseif ($this->beStrictAboutTestsThatDoNotTestAnything &&
            !$test->doesNotPerformAssertions() &&
            $test->getNumAssertions() == 0) {
            $this->addFailure(
                $test,
                new RiskyTestError(
>>>>>>> dev
                    'This test did not perform any assertions'
                ),
                $time
            );
        } elseif ($this->beStrictAboutOutputDuringTests && $test->hasOutput()) {
            $this->addFailure(
                $test,
<<<<<<< HEAD
                new PHPUnit_Framework_OutputError(
                    sprintf(
=======
                new OutputError(
                    \sprintf(
>>>>>>> dev
                        'This test printed output: %s',
                        $test->getActualOutput()
                    )
                ),
                $time
            );
<<<<<<< HEAD
        } elseif ($this->beStrictAboutTodoAnnotatedTests && $test instanceof PHPUnit_Framework_TestCase) {
=======
        } elseif ($this->beStrictAboutTodoAnnotatedTests && $test instanceof TestCase) {
>>>>>>> dev
            $annotations = $test->getAnnotations();

            if (isset($annotations['method']['todo'])) {
                $this->addFailure(
                    $test,
<<<<<<< HEAD
                    new PHPUnit_Framework_RiskyTestError(
=======
                    new RiskyTestError(
>>>>>>> dev
                        'Test method is annotated with @todo'
                    ),
                    $time
                );
            }
        }

        $this->endTest($test, $time);
    }

    /**
     * Gets the number of run tests.
     *
     * @return int
     */
    public function count()
    {
        return $this->runTests;
    }

    /**
     * Checks whether the test run should stop.
     *
     * @return bool
     */
    public function shouldStop()
    {
        return $this->stop;
    }

    /**
     * Marks that the test run should stop.
     */
    public function stop()
    {
        $this->stop = true;
    }

    /**
<<<<<<< HEAD
     * Returns the PHP_CodeCoverage object.
     *
     * @return PHP_CodeCoverage
     *
     * @since  Method available since Release 3.5.0
=======
     * Returns the code coverage object.
     *
     * @return CodeCoverage
>>>>>>> dev
     */
    public function getCodeCoverage()
    {
        return $this->codeCoverage;
    }

    /**
<<<<<<< HEAD
     * Sets the PHP_CodeCoverage object.
     *
     * @param PHP_CodeCoverage $codeCoverage
     *
     * @since Method available since Release 3.6.0
     */
    public function setCodeCoverage(PHP_CodeCoverage $codeCoverage)
=======
     * Sets the code coverage object.
     *
     * @param CodeCoverage $codeCoverage
     */
    public function setCodeCoverage(CodeCoverage $codeCoverage)
>>>>>>> dev
    {
        $this->codeCoverage = $codeCoverage;
    }

    /**
     * Enables or disables the error-to-exception conversion.
     *
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.2.14
     */
    public function convertErrorsToExceptions($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function convertErrorsToExceptions($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->convertErrorsToExceptions = $flag;
    }

    /**
     * Returns the error-to-exception conversion setting.
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public function getConvertErrorsToExceptions()
    {
        return $this->convertErrorsToExceptions;
    }

    /**
     * Enables or disables the stopping when an error occurs.
     *
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.5.0
     */
    public function stopOnError($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function stopOnError($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->stopOnError = $flag;
    }

    /**
     * Enables or disables the stopping when a failure occurs.
     *
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.1.0
     */
    public function stopOnFailure($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function stopOnFailure($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->stopOnFailure = $flag;
    }

    /**
<<<<<<< HEAD
     * @param bool $flag
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public function beStrictAboutTestsThatDoNotTestAnything($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * Enables or disables the stopping when a warning occurs.
     *
     * @param bool $flag
     *
     * @throws Exception
     */
    public function stopOnWarning($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->stopOnWarning = $flag;
    }

    /**
     * @param bool $flag
     *
     * @throws Exception
     */
    public function beStrictAboutTestsThatDoNotTestAnything($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->beStrictAboutTestsThatDoNotTestAnything = $flag;
    }

    /**
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    public function isStrictAboutTestsThatDoNotTestAnything()
    {
        return $this->beStrictAboutTestsThatDoNotTestAnything;
    }

    /**
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public function beStrictAboutOutputDuringTests($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function beStrictAboutOutputDuringTests($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->beStrictAboutOutputDuringTests = $flag;
    }

    /**
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    public function isStrictAboutOutputDuringTests()
    {
        return $this->beStrictAboutOutputDuringTests;
    }

    /**
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public function beStrictAboutTestSize($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutTestSize = $flag;
=======
     * @throws Exception
     */
    public function beStrictAboutResourceUsageDuringSmallTests($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->beStrictAboutResourceUsageDuringSmallTests = $flag;
>>>>>>> dev
    }

    /**
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
     */
    public function isStrictAboutTestSize()
    {
        return $this->beStrictAboutTestSize;
=======
     */
    public function isStrictAboutResourceUsageDuringSmallTests()
    {
        return $this->beStrictAboutResourceUsageDuringSmallTests;
>>>>>>> dev
    }

    /**
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.2.0
     */
    public function beStrictAboutTodoAnnotatedTests($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function enforceTimeLimit($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->enforceTimeLimit = $flag;
    }

    /**
     * @return bool
     */
    public function enforcesTimeLimit()
    {
        return $this->enforceTimeLimit;
    }

    /**
     * @param bool $flag
     *
     * @throws Exception
     */
    public function beStrictAboutTodoAnnotatedTests($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->beStrictAboutTodoAnnotatedTests = $flag;
    }

    /**
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.2.0
=======
>>>>>>> dev
     */
    public function isStrictAboutTodoAnnotatedTests()
    {
        return $this->beStrictAboutTodoAnnotatedTests;
    }

    /**
     * Enables or disables the stopping for risky tests.
     *
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public function stopOnRisky($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function stopOnRisky($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->stopOnRisky = $flag;
    }

    /**
     * Enables or disables the stopping for incomplete tests.
     *
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.5.0
     */
    public function stopOnIncomplete($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function stopOnIncomplete($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->stopOnIncomplete = $flag;
    }

    /**
     * Enables or disables the stopping for skipped tests.
     *
     * @param bool $flag
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.1.0
     */
    public function stopOnSkipped($flag)
    {
        if (!is_bool($flag)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function stopOnSkipped($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }

        $this->stopOnSkipped = $flag;
    }

    /**
     * Returns the time spent running the tests.
     *
     * @return float
     */
    public function time()
    {
        return $this->time;
    }

    /**
     * Returns whether the entire test was successful or not.
     *
     * @return bool
     */
    public function wasSuccessful()
    {
<<<<<<< HEAD
        return empty($this->errors) && empty($this->failures);
=======
        return empty($this->errors) && empty($this->failures) && empty($this->warnings);
>>>>>>> dev
    }

    /**
     * Sets the timeout for small tests.
     *
     * @param int $timeout
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.6.0
     */
    public function setTimeoutForSmallTests($timeout)
    {
        if (!is_integer($timeout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
=======
     * @throws Exception
     */
    public function setTimeoutForSmallTests($timeout)
    {
        if (!\is_int($timeout)) {
            throw InvalidArgumentHelper::factory(1, 'integer');
>>>>>>> dev
        }

        $this->timeoutForSmallTests = $timeout;
    }

    /**
     * Sets the timeout for medium tests.
     *
     * @param int $timeout
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.6.0
     */
    public function setTimeoutForMediumTests($timeout)
    {
        if (!is_integer($timeout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
=======
     * @throws Exception
     */
    public function setTimeoutForMediumTests($timeout)
    {
        if (!\is_int($timeout)) {
            throw InvalidArgumentHelper::factory(1, 'integer');
>>>>>>> dev
        }

        $this->timeoutForMediumTests = $timeout;
    }

    /**
     * Sets the timeout for large tests.
     *
     * @param int $timeout
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.6.0
     */
    public function setTimeoutForLargeTests($timeout)
    {
        if (!is_integer($timeout)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
=======
     * @throws Exception
     */
    public function setTimeoutForLargeTests($timeout)
    {
        if (!\is_int($timeout)) {
            throw InvalidArgumentHelper::factory(1, 'integer');
>>>>>>> dev
        }

        $this->timeoutForLargeTests = $timeout;
    }

    /**
<<<<<<< HEAD
=======
     * Returns the set timeout for large tests.
     *
     * @return int
     */
    public function getTimeoutForLargeTests()
    {
        return $this->timeoutForLargeTests;
    }

    /**
     * @param bool $flag
     */
    public function setRegisterMockObjectsFromTestArgumentsRecursively($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentHelper::factory(1, 'boolean');
        }

        $this->registerMockObjectsFromTestArgumentsRecursively = $flag;
    }

    /**
>>>>>>> dev
     * Returns the class hierarchy for a given class.
     *
     * @param string $className
     * @param bool   $asReflectionObjects
     *
     * @return array
     */
    protected function getHierarchy($className, $asReflectionObjects = false)
    {
        if ($asReflectionObjects) {
<<<<<<< HEAD
            $classes = array(new ReflectionClass($className));
        } else {
            $classes = array($className);
=======
            $classes = [new ReflectionClass($className)];
        } else {
            $classes = [$className];
>>>>>>> dev
        }

        $done = false;

        while (!$done) {
            if ($asReflectionObjects) {
                $class = new ReflectionClass(
<<<<<<< HEAD
                    $classes[count($classes) - 1]->getName()
                );
            } else {
                $class = new ReflectionClass($classes[count($classes) - 1]);
=======
                    $classes[\count($classes) - 1]->getName()
                );
            } else {
                $class = new ReflectionClass($classes[\count($classes) - 1]);
>>>>>>> dev
            }

            $parent = $class->getParentClass();

            if ($parent !== false) {
                if ($asReflectionObjects) {
                    $classes[] = $parent;
                } else {
                    $classes[] = $parent->getName();
                }
            } else {
                $done = true;
            }
        }

        return $classes;
    }
}
