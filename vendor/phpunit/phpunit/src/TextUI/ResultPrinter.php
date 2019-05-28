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
namespace PHPUnit\TextUI;

use PHP_Timer;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\InvalidArgumentHelper;
use PHPUnit\Util\Printer;
>>>>>>> dev
use SebastianBergmann\Environment\Console;

/**
 * Prints the result of a TextUI TestRunner run.
<<<<<<< HEAD
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_TextUI_ResultPrinter extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
=======
 */
class ResultPrinter extends Printer implements TestListener
>>>>>>> dev
{
    const EVENT_TEST_START      = 0;
    const EVENT_TEST_END        = 1;
    const EVENT_TESTSUITE_START = 2;
    const EVENT_TESTSUITE_END   = 3;

    const COLOR_NEVER   = 'never';
    const COLOR_AUTO    = 'auto';
    const COLOR_ALWAYS  = 'always';
    const COLOR_DEFAULT = self::COLOR_NEVER;

    /**
     * @var array
     */
<<<<<<< HEAD
    private static $ansiCodes = array(
      'bold'       => 1,
      'fg-black'   => 30,
      'fg-red'     => 31,
      'fg-green'   => 32,
      'fg-yellow'  => 33,
      'fg-blue'    => 34,
      'fg-magenta' => 35,
      'fg-cyan'    => 36,
      'fg-white'   => 37,
      'bg-black'   => 40,
      'bg-red'     => 41,
      'bg-green'   => 42,
      'bg-yellow'  => 43,
      'bg-blue'    => 44,
      'bg-magenta' => 45,
      'bg-cyan'    => 46,
      'bg-white'   => 47
    );
=======
    private static $ansiCodes = [
        'bold'       => 1,
        'fg-black'   => 30,
        'fg-red'     => 31,
        'fg-green'   => 32,
        'fg-yellow'  => 33,
        'fg-blue'    => 34,
        'fg-magenta' => 35,
        'fg-cyan'    => 36,
        'fg-white'   => 37,
        'bg-black'   => 40,
        'bg-red'     => 41,
        'bg-green'   => 42,
        'bg-yellow'  => 43,
        'bg-blue'    => 44,
        'bg-magenta' => 45,
        'bg-cyan'    => 46,
        'bg-white'   => 47
    ];
>>>>>>> dev

    /**
     * @var int
     */
    protected $column = 0;

    /**
     * @var int
     */
    protected $maxColumn;

    /**
     * @var bool
     */
    protected $lastTestFailed = false;

    /**
     * @var int
     */
    protected $numAssertions = 0;

    /**
     * @var int
     */
    protected $numTests = -1;

    /**
     * @var int
     */
    protected $numTestsRun = 0;

    /**
     * @var int
     */
    protected $numTestsWidth;

    /**
     * @var bool
     */
    protected $colors = false;

    /**
     * @var bool
     */
    protected $debug = false;

    /**
     * @var bool
     */
    protected $verbose = false;

    /**
     * @var int
     */
    private $numberOfColumns;

    /**
<<<<<<< HEAD
=======
     * @var bool
     */
    private $reverse;

    /**
     * @var bool
     */
    private $defectListPrinted = false;

    /**
>>>>>>> dev
     * Constructor.
     *
     * @param mixed      $out
     * @param bool       $verbose
     * @param string     $colors
     * @param bool       $debug
     * @param int|string $numberOfColumns
<<<<<<< HEAD
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.0.0
     */
    public function __construct($out = null, $verbose = false, $colors = self::COLOR_DEFAULT, $debug = false, $numberOfColumns = 80)
    {
        parent::__construct($out);

        if (!is_bool($verbose)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'boolean');
        }

        $availableColors = array(self::COLOR_NEVER, self::COLOR_AUTO, self::COLOR_ALWAYS);

        if (!in_array($colors, $availableColors)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                3,
                vsprintf('value from "%s", "%s" or "%s"', $availableColors)
            );
        }

        if (!is_bool($debug)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(4, 'boolean');
        }

        if (!is_int($numberOfColumns) && $numberOfColumns != 'max') {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(5, 'integer or "max"');
=======
     * @param bool       $reverse
     *
     * @throws Exception
     */
    public function __construct($out = null, $verbose = false, $colors = self::COLOR_DEFAULT, $debug = false, $numberOfColumns = 80, $reverse = false)
    {
        parent::__construct($out);

        if (!\is_bool($verbose)) {
            throw InvalidArgumentHelper::factory(2, 'boolean');
        }

        $availableColors = [self::COLOR_NEVER, self::COLOR_AUTO, self::COLOR_ALWAYS];

        if (!\in_array($colors, $availableColors)) {
            throw InvalidArgumentHelper::factory(
                3,
                \vsprintf('value from "%s", "%s" or "%s"', $availableColors)
            );
        }

        if (!\is_bool($debug)) {
            throw InvalidArgumentHelper::factory(4, 'boolean');
        }

        if (!\is_int($numberOfColumns) && $numberOfColumns !== 'max') {
            throw InvalidArgumentHelper::factory(5, 'integer or "max"');
        }

        if (!\is_bool($reverse)) {
            throw InvalidArgumentHelper::factory(6, 'boolean');
>>>>>>> dev
        }

        $console            = new Console;
        $maxNumberOfColumns = $console->getNumberOfColumns();

<<<<<<< HEAD
        if ($numberOfColumns == 'max' || $numberOfColumns > $maxNumberOfColumns) {
=======
        if ($numberOfColumns === 'max' || ($numberOfColumns !== 80 && $numberOfColumns > $maxNumberOfColumns)) {
>>>>>>> dev
            $numberOfColumns = $maxNumberOfColumns;
        }

        $this->numberOfColumns = $numberOfColumns;
        $this->verbose         = $verbose;
        $this->debug           = $debug;
<<<<<<< HEAD
=======
        $this->reverse         = $reverse;
>>>>>>> dev

        if ($colors === self::COLOR_AUTO && $console->hasColorSupport()) {
            $this->colors = true;
        } else {
            $this->colors = (self::COLOR_ALWAYS === $colors);
        }
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     */
    public function printResult(PHPUnit_Framework_TestResult $result)
    {
        $this->printHeader();

        $this->printErrors($result);
        $printSeparator = $result->errorCount() > 0;

        if ($printSeparator && $result->failureCount() > 0) {
            $this->write("\n--\n\n");
        }

        $printSeparator = $printSeparator || $result->failureCount() > 0;
        $this->printFailures($result);

        if ($this->verbose) {
            if ($printSeparator && $result->riskyCount() > 0) {
                $this->write("\n--\n\n");
            }

            $printSeparator = $printSeparator ||
                              $result->riskyCount() > 0;

            $this->printRisky($result);

            if ($printSeparator && $result->notImplementedCount() > 0) {
                $this->write("\n--\n\n");
            }

            $printSeparator = $printSeparator ||
                              $result->notImplementedCount() > 0;

            $this->printIncompletes($result);

            if ($printSeparator && $result->skippedCount() > 0) {
                $this->write("\n--\n\n");
            }

=======
     * @param TestResult $result
     */
    public function printResult(TestResult $result)
    {
        $this->printHeader();
        $this->printErrors($result);
        $this->printWarnings($result);
        $this->printFailures($result);
        $this->printRisky($result);

        if ($this->verbose) {
            $this->printIncompletes($result);
>>>>>>> dev
            $this->printSkipped($result);
        }

        $this->printFooter($result);
    }

    /**
     * @param array  $defects
     * @param string $type
     */
    protected function printDefects(array $defects, $type)
    {
<<<<<<< HEAD
        $count = count($defects);
=======
        $count = \count($defects);
>>>>>>> dev

        if ($count == 0) {
            return;
        }

<<<<<<< HEAD
        $this->write(
            sprintf(
=======
        if ($this->defectListPrinted) {
            $this->write("\n--\n\n");
        }

        $this->write(
            \sprintf(
>>>>>>> dev
                "There %s %d %s%s:\n",
                ($count == 1) ? 'was' : 'were',
                $count,
                $type,
                ($count == 1) ? '' : 's'
            )
        );

        $i = 1;

<<<<<<< HEAD
        foreach ($defects as $defect) {
            $this->printDefect($defect, $i++);
        }
    }

    /**
     * @param PHPUnit_Framework_TestFailure $defect
     * @param int                           $count
     */
    protected function printDefect(PHPUnit_Framework_TestFailure $defect, $count)
=======
        if ($this->reverse) {
            $defects = \array_reverse($defects);
        }

        foreach ($defects as $defect) {
            $this->printDefect($defect, $i++);
        }

        $this->defectListPrinted = true;
    }

    /**
     * @param TestFailure $defect
     * @param int         $count
     */
    protected function printDefect(TestFailure $defect, $count)
>>>>>>> dev
    {
        $this->printDefectHeader($defect, $count);
        $this->printDefectTrace($defect);
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestFailure $defect
     * @param int                           $count
     */
    protected function printDefectHeader(PHPUnit_Framework_TestFailure $defect, $count)
    {
        $this->write(
            sprintf(
=======
     * @param TestFailure $defect
     * @param int         $count
     */
    protected function printDefectHeader(TestFailure $defect, $count)
    {
        $this->write(
            \sprintf(
>>>>>>> dev
                "\n%d) %s\n",
                $count,
                $defect->getTestName()
            )
        );
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestFailure $defect
     */
    protected function printDefectTrace(PHPUnit_Framework_TestFailure $defect)
=======
     * @param TestFailure $defect
     */
    protected function printDefectTrace(TestFailure $defect)
>>>>>>> dev
    {
        $e = $defect->thrownException();
        $this->write((string) $e);

        while ($e = $e->getPrevious()) {
            $this->write("\nCaused by\n" . $e);
        }
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     */
    protected function printErrors(PHPUnit_Framework_TestResult $result)
=======
     * @param TestResult $result
     */
    protected function printErrors(TestResult $result)
>>>>>>> dev
    {
        $this->printDefects($result->errors(), 'error');
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     */
    protected function printFailures(PHPUnit_Framework_TestResult $result)
=======
     * @param TestResult $result
     */
    protected function printFailures(TestResult $result)
>>>>>>> dev
    {
        $this->printDefects($result->failures(), 'failure');
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     */
    protected function printIncompletes(PHPUnit_Framework_TestResult $result)
=======
     * @param TestResult $result
     */
    protected function printWarnings(TestResult $result)
    {
        $this->printDefects($result->warnings(), 'warning');
    }

    /**
     * @param TestResult $result
     */
    protected function printIncompletes(TestResult $result)
>>>>>>> dev
    {
        $this->printDefects($result->notImplemented(), 'incomplete test');
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     *
     * @since  Method available since Release 4.0.0
     */
    protected function printRisky(PHPUnit_Framework_TestResult $result)
=======
     * @param TestResult $result
     */
    protected function printRisky(TestResult $result)
>>>>>>> dev
    {
        $this->printDefects($result->risky(), 'risky test');
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     *
     * @since  Method available since Release 3.0.0
     */
    protected function printSkipped(PHPUnit_Framework_TestResult $result)
=======
     * @param TestResult $result
     */
    protected function printSkipped(TestResult $result)
>>>>>>> dev
    {
        $this->printDefects($result->skipped(), 'skipped test');
    }

    protected function printHeader()
    {
        $this->write("\n\n" . PHP_Timer::resourceUsage() . "\n\n");
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     */
    protected function printFooter(PHPUnit_Framework_TestResult $result)
    {
        if (count($result) === 0) {
=======
     * @param TestResult $result
     */
    protected function printFooter(TestResult $result)
    {
        if (\count($result) === 0) {
>>>>>>> dev
            $this->writeWithColor(
                'fg-black, bg-yellow',
                'No tests executed!'
            );
<<<<<<< HEAD
        } elseif ($result->wasSuccessful() &&
                 $result->allHarmless() &&
                 $result->allCompletelyImplemented() &&
                 $result->noneSkipped()) {
            $this->writeWithColor(
                'fg-black, bg-green',
                sprintf(
                    'OK (%d test%s, %d assertion%s)',
                    count($result),
                    (count($result) == 1) ? '' : 's',
=======

            return;
        }

        if ($result->wasSuccessful() &&
            $result->allHarmless() &&
            $result->allCompletelyImplemented() &&
            $result->noneSkipped()) {
            $this->writeWithColor(
                'fg-black, bg-green',
                \sprintf(
                    'OK (%d test%s, %d assertion%s)',
                    \count($result),
                    (\count($result) == 1) ? '' : 's',
>>>>>>> dev
                    $this->numAssertions,
                    ($this->numAssertions == 1) ? '' : 's'
                )
            );
        } else {
            if ($result->wasSuccessful()) {
                $color = 'fg-black, bg-yellow';

<<<<<<< HEAD
                if ($this->verbose) {
=======
                if ($this->verbose || !$result->allHarmless()) {
>>>>>>> dev
                    $this->write("\n");
                }

                $this->writeWithColor(
                    $color,
                    'OK, but incomplete, skipped, or risky tests!'
                );
            } else {
<<<<<<< HEAD
                $color = 'fg-white, bg-red';

                $this->write("\n");
                $this->writeWithColor($color, 'FAILURES!');
            }

            $this->writeCountString(count($result), 'Tests', $color, true);
            $this->writeCountString($this->numAssertions, 'Assertions', $color, true);
            $this->writeCountString($result->errorCount(), 'Errors', $color);
            $this->writeCountString($result->failureCount(), 'Failures', $color);
=======
                $this->write("\n");

                if ($result->errorCount()) {
                    $color = 'fg-white, bg-red';

                    $this->writeWithColor(
                        $color,
                        'ERRORS!'
                    );
                } elseif ($result->failureCount()) {
                    $color = 'fg-white, bg-red';

                    $this->writeWithColor(
                        $color,
                        'FAILURES!'
                    );
                } elseif ($result->warningCount()) {
                    $color = 'fg-black, bg-yellow';

                    $this->writeWithColor(
                        $color,
                        'WARNINGS!'
                    );
                }
            }

            $this->writeCountString(\count($result), 'Tests', $color, true);
            $this->writeCountString($this->numAssertions, 'Assertions', $color, true);
            $this->writeCountString($result->errorCount(), 'Errors', $color);
            $this->writeCountString($result->failureCount(), 'Failures', $color);
            $this->writeCountString($result->warningCount(), 'Warnings', $color);
>>>>>>> dev
            $this->writeCountString($result->skippedCount(), 'Skipped', $color);
            $this->writeCountString($result->notImplementedCount(), 'Incomplete', $color);
            $this->writeCountString($result->riskyCount(), 'Risky', $color);
            $this->writeWithColor($color, '.', true);
        }
    }

<<<<<<< HEAD
    /**
     */
=======
>>>>>>> dev
    public function printWaitPrompt()
    {
        $this->write("\n<RETURN> to continue\n");
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
        $this->writeProgressWithColor('fg-red, bold', 'E');
        $this->lastTestFailed = true;
    }

    /**
     * A failure occurred.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
=======
     * @param Test                 $test
     * @param AssertionFailedError $e
     * @param float                $time
     */
    public function addFailure(Test $test, AssertionFailedError $e, $time)
>>>>>>> dev
    {
        $this->writeProgressWithColor('bg-red, fg-white', 'F');
        $this->lastTestFailed = true;
    }

    /**
<<<<<<< HEAD
     * Incomplete test.
     *
     * @param PHPUnit_Framework_Test $test
     * @param Exception              $e
     * @param float                  $time
     */
    public function addIncompleteTest(PHPUnit_Framework_Test $test, Exception $e, $time)
=======
     * A warning occurred.
     *
     * @param Test    $test
     * @param Warning $e
     * @param float   $time
     */
    public function addWarning(Test $test, Warning $e, $time)
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'W');
        $this->lastTestFailed = true;
    }

    /**
     * Incomplete test.
     *
     * @param Test       $test
     * @param \Exception $e
     * @param float      $time
     */
    public function addIncompleteTest(Test $test, \Exception $e, $time)
>>>>>>> dev
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'I');
        $this->lastTestFailed = true;
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
        $this->writeProgressWithColor('fg-yellow, bold', 'R');
        $this->lastTestFailed = true;
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
        $this->writeProgressWithColor('fg-cyan, bold', 'S');
        $this->lastTestFailed = true;
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
    {
        if ($this->numTests == -1) {
            $this->numTests      = count($suite);
            $this->numTestsWidth = strlen((string) $this->numTests);
            $this->maxColumn     = $this->numberOfColumns - strlen('  /  (XXX%)') - (2 * $this->numTestsWidth);
=======
     * @param TestSuite $suite
     */
    public function startTestSuite(TestSuite $suite)
    {
        if ($this->numTests == -1) {
            $this->numTests      = \count($suite);
            $this->numTestsWidth = \strlen((string) $this->numTests);
            $this->maxColumn     = $this->numberOfColumns - \strlen('  /  (XXX%)') - (2 * $this->numTestsWidth);
>>>>>>> dev
        }
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
    {
        if ($this->debug) {
            $this->write(
                sprintf(
                    "\nStarting test '%s'.\n",
                    PHPUnit_Util_Test::describe($test)
=======
     * @param Test $test
     */
    public function startTest(Test $test)
    {
        if ($this->debug) {
            $this->write(
                \sprintf(
                    "Test '%s' started\n",
                    \PHPUnit\Util\Test::describe($test)
>>>>>>> dev
                )
            );
        }
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
=======
     * @param Test  $test
     * @param float $time
     */
    public function endTest(Test $test, $time)
    {
        if ($this->debug) {
            $this->write(
                \sprintf(
                    "Test '%s' ended\n",
                    \PHPUnit\Util\Test::describe($test)
                )
            );
        }

>>>>>>> dev
        if (!$this->lastTestFailed) {
            $this->writeProgress('.');
        }

<<<<<<< HEAD
        if ($test instanceof PHPUnit_Framework_TestCase) {
            $this->numAssertions += $test->getNumAssertions();
        } elseif ($test instanceof PHPUnit_Extensions_PhptTestCase) {
=======
        if ($test instanceof TestCase) {
            $this->numAssertions += $test->getNumAssertions();
        } elseif ($test instanceof PhptTestCase) {
>>>>>>> dev
            $this->numAssertions++;
        }

        $this->lastTestFailed = false;

<<<<<<< HEAD
        if ($test instanceof PHPUnit_Framework_TestCase) {
=======
        if ($test instanceof TestCase) {
>>>>>>> dev
            if (!$test->hasExpectationOnOutput()) {
                $this->write($test->getActualOutput());
            }
        }
    }

    /**
     * @param string $progress
     */
    protected function writeProgress($progress)
    {
<<<<<<< HEAD
=======
        if ($this->debug) {
            return;
        }

>>>>>>> dev
        $this->write($progress);
        $this->column++;
        $this->numTestsRun++;

<<<<<<< HEAD
        if ($this->column == $this->maxColumn) {
            $this->write(
                sprintf(
=======
        if ($this->column == $this->maxColumn || $this->numTestsRun == $this->numTests) {
            if ($this->numTestsRun == $this->numTests) {
                $this->write(\str_repeat(' ', $this->maxColumn - $this->column));
            }

            $this->write(
                \sprintf(
>>>>>>> dev
                    ' %' . $this->numTestsWidth . 'd / %' .
                    $this->numTestsWidth . 'd (%3s%%)',
                    $this->numTestsRun,
                    $this->numTests,
<<<<<<< HEAD
                    floor(($this->numTestsRun / $this->numTests) * 100)
                )
            );

            $this->writeNewLine();
=======
                    \floor(($this->numTestsRun / $this->numTests) * 100)
                )
            );

            if ($this->column == $this->maxColumn) {
                $this->writeNewLine();
            }
>>>>>>> dev
        }
    }

    protected function writeNewLine()
    {
        $this->column = 0;
        $this->write("\n");
    }

    /**
     * Formats a buffer with a specified ANSI color sequence if colors are
     * enabled.
     *
     * @param string $color
     * @param string $buffer
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    protected function formatWithColor($color, $buffer)
    {
        if (!$this->colors) {
            return $buffer;
        }

<<<<<<< HEAD
        $codes   = array_map('trim', explode(',', $color));
        $lines   = explode("\n", $buffer);
        $padding = max(array_map('strlen', $lines));
        $styles  = array();
=======
        $codes   = \array_map('trim', \explode(',', $color));
        $lines   = \explode("\n", $buffer);
        $padding = \max(\array_map('strlen', $lines));
        $styles  = [];
>>>>>>> dev

        foreach ($codes as $code) {
            $styles[] = self::$ansiCodes[$code];
        }

<<<<<<< HEAD
        $style = sprintf("\x1b[%sm", implode(';', $styles));

        $styledLines = array();

        foreach ($lines as $line) {
            $styledLines[] = $style . str_pad($line, $padding) . "\x1b[0m";
        }

        return implode("\n", $styledLines);
=======
        $style = \sprintf("\x1b[%sm", \implode(';', $styles));

        $styledLines = [];

        foreach ($lines as $line) {
            $styledLines[] = $style . \str_pad($line, $padding) . "\x1b[0m";
        }

        return \implode("\n", $styledLines);
>>>>>>> dev
    }

    /**
     * Writes a buffer out with a color sequence if colors are enabled.
     *
     * @param string $color
     * @param string $buffer
     * @param bool   $lf
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    protected function writeWithColor($color, $buffer, $lf = true)
    {
        $this->write($this->formatWithColor($color, $buffer));

        if ($lf) {
            $this->write("\n");
        }
    }

    /**
     * Writes progress with a color sequence if colors are enabled.
     *
     * @param string $color
     * @param string $buffer
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    protected function writeProgressWithColor($color, $buffer)
    {
        $buffer = $this->formatWithColor($color, $buffer);
        $this->writeProgress($buffer);
    }

    /**
     * @param int    $count
     * @param string $name
     * @param string $color
     * @param bool   $always
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.6.5
=======
>>>>>>> dev
     */
    private function writeCountString($count, $name, $color, $always = false)
    {
        static $first = true;

        if ($always || $count > 0) {
            $this->writeWithColor(
                $color,
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> dev
                    '%s%s: %d',
                    !$first ? ', ' : '',
                    $name,
                    $count
                ),
                false
            );

            $first = false;
        }
    }
}
