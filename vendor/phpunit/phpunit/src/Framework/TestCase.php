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
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\GlobalState\Restorer;
use SebastianBergmann\GlobalState\Blacklist;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Exporter\Exporter;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophet;
=======
namespace PHPUnit\Framework;

use DeepCopy\DeepCopy;
use PHPUnit\Framework\Constraint\Exception as ExceptionConstraint;
use PHPUnit\Framework\Constraint\ExceptionCode;
use PHPUnit\Framework\Constraint\ExceptionMessage;
use PHPUnit\Framework\Constraint\ExceptionMessageRegularExpression;
use PHPUnit\Framework\MockObject\Generator as MockGenerator;
use PHPUnit\Framework\MockObject\Matcher\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedAtIndex as InvokedAtIndexMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastCount as InvokedAtLeastCountMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedAtLeastOnce as InvokedAtLeastOnceMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedAtMostCount as InvokedAtMostCountMatcher;
use PHPUnit\Framework\MockObject\Matcher\InvokedCount as InvokedCountMatcher;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls as ConsecutiveCallsStub;
use PHPUnit\Framework\MockObject\Stub\Exception as ExceptionStub;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument as ReturnArgumentStub;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback as ReturnCallbackStub;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf as ReturnSelfStub;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap as ReturnValueMapStub;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\GlobalState;
use PHPUnit\Util\InvalidArgumentHelper;
use PHPUnit\Util\PHP\AbstractPhpProcess;
use Prophecy;
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophet;
use ReflectionClass;
use ReflectionException;
use ReflectionObject;
use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Comparator\Factory as ComparatorFactory;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Exporter\Exporter;
use SebastianBergmann\GlobalState\Blacklist;
use SebastianBergmann\GlobalState\Restorer;
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\ObjectEnumerator\Enumerator;
use Text_Template;
use Throwable;
>>>>>>> dev

/**
 * A TestCase defines the fixture to run multiple tests.
 *
 * To define a TestCase
 *
<<<<<<< HEAD
 *   1) Implement a subclass of PHPUnit_Framework_TestCase.
=======
 *   1) Implement a subclass of PHPUnit\Framework\TestCase.
>>>>>>> dev
 *   2) Define instance variables that store the state of the fixture.
 *   3) Initialize the fixture state by overriding setUp().
 *   4) Clean-up after a test by overriding tearDown().
 *
 * Each test runs in its own fixture so there can be no side effects
 * among test runs.
 *
 * Here is an example:
 *
 * <code>
 * <?php
<<<<<<< HEAD
 * class MathTest extends PHPUnit_Framework_TestCase
=======
 * class MathTest extends PHPUnit\Framework\TestCase
>>>>>>> dev
 * {
 *     public $value1;
 *     public $value2;
 *
 *     protected function setUp()
 *     {
 *         $this->value1 = 2;
 *         $this->value2 = 3;
 *     }
 * }
 * ?>
 * </code>
 *
 * For each test implement a method which interacts with the fixture.
 * Verify the expected results with assertions specified by calling
 * assert with a boolean.
 *
 * <code>
 * <?php
 * public function testPass()
 * {
 *     $this->assertTrue($this->value1 + $this->value2 == 5);
 * }
 * ?>
 * </code>
<<<<<<< HEAD
 *
 * @since Class available since Release 2.0.0
 */
abstract class PHPUnit_Framework_TestCase extends PHPUnit_Framework_Assert implements PHPUnit_Framework_Test, PHPUnit_Framework_SelfDescribing
=======
 */
abstract class TestCase extends Assert implements Test, SelfDescribing
>>>>>>> dev
{
    /**
     * Enable or disable the backup and restoration of the $GLOBALS array.
     * Overwrite this attribute in a child class of TestCase.
     * Setting this attribute in setUp() has no effect!
     *
     * @var bool
     */
<<<<<<< HEAD
    protected $backupGlobals = null;
=======
    protected $backupGlobals;
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $backupGlobalsBlacklist = array();
=======
    protected $backupGlobalsBlacklist = [];
>>>>>>> dev

    /**
     * Enable or disable the backup and restoration of static attributes.
     * Overwrite this attribute in a child class of TestCase.
     * Setting this attribute in setUp() has no effect!
     *
     * @var bool
     */
<<<<<<< HEAD
    protected $backupStaticAttributes = null;
=======
    protected $backupStaticAttributes;
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $backupStaticAttributesBlacklist = array();
=======
    protected $backupStaticAttributesBlacklist = [];
>>>>>>> dev

    /**
     * Whether or not this test is to be run in a separate PHP process.
     *
     * @var bool
     */
<<<<<<< HEAD
    protected $runTestInSeparateProcess = null;
=======
    protected $runTestInSeparateProcess;

    /**
     * Whether or not this class is to be run in a separate PHP process.
     *
     * @var bool
     */
    private $runClassInSeparateProcess;
>>>>>>> dev

    /**
     * Whether or not this test should preserve the global state when
     * running in a separate PHP process.
     *
     * @var bool
     */
    protected $preserveGlobalState = true;

    /**
     * Whether or not this test is running in a separate PHP process.
     *
     * @var bool
     */
    private $inIsolation = false;

    /**
     * @var array
     */
<<<<<<< HEAD
    private $data = array();
=======
    private $data;
>>>>>>> dev

    /**
     * @var string
     */
<<<<<<< HEAD
    private $dataName = '';
=======
    private $dataName;
>>>>>>> dev

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $useErrorHandler = null;
=======
    private $useErrorHandler;
>>>>>>> dev

    /**
     * The name of the expected Exception.
     *
<<<<<<< HEAD
     * @var mixed
     */
    private $expectedException = null;
=======
     * @var null|string
     */
    private $expectedException;
>>>>>>> dev

    /**
     * The message of the expected Exception.
     *
     * @var string
     */
<<<<<<< HEAD
    private $expectedExceptionMessage = '';
=======
    private $expectedExceptionMessage;
>>>>>>> dev

    /**
     * The regex pattern to validate the expected Exception message.
     *
     * @var string
     */
<<<<<<< HEAD
    private $expectedExceptionMessageRegExp = '';
=======
    private $expectedExceptionMessageRegExp;
>>>>>>> dev

    /**
     * The code of the expected Exception.
     *
<<<<<<< HEAD
     * @var int
=======
     * @var null|int|string
>>>>>>> dev
     */
    private $expectedExceptionCode;

    /**
     * The name of the test case.
     *
     * @var string
     */
<<<<<<< HEAD
    private $name = null;

    /**
     * @var array
     */
    private $dependencies = array();
=======
    private $name;

    /**
     * @var string[]
     */
    private $dependencies = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $dependencyInput = array();
=======
    private $dependencyInput = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $iniSettings = array();
=======
    private $iniSettings = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $locale = array();
=======
    private $locale = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $mockObjects = array();

    /**
     * @var array
     */
    private $mockObjectGenerator = null;
=======
    private $mockObjects = [];

    /**
     * @var MockGenerator
     */
    private $mockObjectGenerator;
>>>>>>> dev

    /**
     * @var int
     */
    private $status;

    /**
     * @var string
     */
    private $statusMessage = '';

    /**
     * @var int
     */
    private $numAssertions = 0;

    /**
<<<<<<< HEAD
     * @var PHPUnit_Framework_TestResult
=======
     * @var TestResult
>>>>>>> dev
     */
    private $result;

    /**
     * @var mixed
     */
    private $testResult;

    /**
     * @var string
     */
    private $output = '';

    /**
     * @var string
     */
<<<<<<< HEAD
    private $outputExpectedRegex = null;
=======
    private $outputExpectedRegex;
>>>>>>> dev

    /**
     * @var string
     */
<<<<<<< HEAD
    private $outputExpectedString = null;
=======
    private $outputExpectedString;
>>>>>>> dev

    /**
     * @var mixed
     */
    private $outputCallback = false;

    /**
     * @var bool
     */
    private $outputBufferingActive = false;

    /**
     * @var int
     */
    private $outputBufferingLevel;

    /**
<<<<<<< HEAD
     * @var SebastianBergmann\GlobalState\Snapshot
=======
     * @var Snapshot
>>>>>>> dev
     */
    private $snapshot;

    /**
     * @var Prophecy\Prophet
     */
    private $prophet;

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $disallowChangesToGlobalState = false;
=======
    private $beStrictAboutChangesToGlobalState = false;

    /**
     * @var bool
     */
    private $registerMockObjectsFromTestArgumentsRecursively = false;

    /**
     * @var string[]
     */
    private $warnings = [];

    /**
     * @var array
     */
    private $groups = [];

    /**
     * @var bool
     */
    private $doesNotPerformAssertions = false;

    /**
     * @var Comparator[]
     */
    private $customComparators = [];
>>>>>>> dev

    /**
     * Constructs a test case with the given name.
     *
     * @param string $name
     * @param array  $data
     * @param string $dataName
     */
<<<<<<< HEAD
    public function __construct($name = null, array $data = array(), $dataName = '')
=======
    public function __construct($name = null, array $data = [], $dataName = '')
>>>>>>> dev
    {
        if ($name !== null) {
            $this->setName($name);
        }

<<<<<<< HEAD
        $this->data                = $data;
        $this->dataName            = $dataName;
=======
        $this->data     = $data;
        $this->dataName = $dataName;
>>>>>>> dev
    }

    /**
     * Returns a string representation of the test case.
     *
     * @return string
     */
    public function toString()
    {
        $class = new ReflectionClass($this);

<<<<<<< HEAD
        $buffer = sprintf(
=======
        $buffer = \sprintf(
>>>>>>> dev
            '%s::%s',
            $class->name,
            $this->getName(false)
        );

        return $buffer . $this->getDataSetAsString();
    }

    /**
     * Counts the number of test cases executed by run(TestResult result).
     *
     * @return int
     */
    public function count()
    {
        return 1;
    }

<<<<<<< HEAD
=======
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param array $groups
     */
    public function setGroups(array $groups)
    {
        $this->groups = $groups;
    }

>>>>>>> dev
    /**
     * Returns the annotations for this test.
     *
     * @return array
<<<<<<< HEAD
     *
     * @since Method available since Release 3.4.0
     */
    public function getAnnotations()
    {
        return PHPUnit_Util_Test::parseTestMethodAnnotations(
            get_class($this),
=======
     */
    public function getAnnotations()
    {
        return \PHPUnit\Util\Test::parseTestMethodAnnotations(
            \get_class($this),
>>>>>>> dev
            $this->name
        );
    }

    /**
     * Gets the name of a TestCase.
     *
     * @param bool $withDataSet
     *
     * @return string
     */
    public function getName($withDataSet = true)
    {
        if ($withDataSet) {
            return $this->name . $this->getDataSetAsString(false);
<<<<<<< HEAD
        } else {
            return $this->name;
        }
=======
        }

        return $this->name;
>>>>>>> dev
    }

    /**
     * Returns the size of the test.
     *
     * @return int
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.6.0
     */
    public function getSize()
    {
        return PHPUnit_Util_Test::getSize(
            get_class($this),
=======
     */
    public function getSize()
    {
        return \PHPUnit\Util\Test::getSize(
            \get_class($this),
>>>>>>> dev
            $this->getName(false)
        );
    }

    /**
<<<<<<< HEAD
     * @return string
     *
     * @since  Method available since Release 3.6.0
=======
     * @return bool
     */
    public function hasSize()
    {
        return $this->getSize() !== \PHPUnit\Util\Test::UNKNOWN;
    }

    /**
     * @return bool
     */
    public function isSmall()
    {
        return $this->getSize() === \PHPUnit\Util\Test::SMALL;
    }

    /**
     * @return bool
     */
    public function isMedium()
    {
        return $this->getSize() === \PHPUnit\Util\Test::MEDIUM;
    }

    /**
     * @return bool
     */
    public function isLarge()
    {
        return $this->getSize() === \PHPUnit\Util\Test::LARGE;
    }

    /**
     * @return string
>>>>>>> dev
     */
    public function getActualOutput()
    {
        if (!$this->outputBufferingActive) {
            return $this->output;
<<<<<<< HEAD
        } else {
            return ob_get_contents();
        }
=======
        }

        return \ob_get_contents();
>>>>>>> dev
    }

    /**
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.6.0
     */
    public function hasOutput()
    {
        if (strlen($this->output) === 0) {
=======
     */
    public function hasOutput()
    {
        if (\strlen($this->output) === 0) {
>>>>>>> dev
            return false;
        }

        if ($this->hasExpectationOnOutput()) {
            return false;
        }

        return true;
    }

    /**
<<<<<<< HEAD
     * @param string $expectedRegex
     *
     * @since Method available since Release 3.6.0
     *
     * @throws PHPUnit_Framework_Exception
=======
     * @return bool
     */
    public function doesNotPerformAssertions()
    {
        return $this->doesNotPerformAssertions;
    }

    /**
     * @param string $expectedRegex
     *
     * @throws Exception
>>>>>>> dev
     */
    public function expectOutputRegex($expectedRegex)
    {
        if ($this->outputExpectedString !== null) {
<<<<<<< HEAD
            throw new PHPUnit_Framework_Exception;
        }

        if (is_string($expectedRegex) || is_null($expectedRegex)) {
=======
            throw new Exception;
        }

        if (\is_string($expectedRegex) || null === $expectedRegex) {
>>>>>>> dev
            $this->outputExpectedRegex = $expectedRegex;
        }
    }

    /**
     * @param string $expectedString
<<<<<<< HEAD
     *
     * @since Method available since Release 3.6.0
=======
>>>>>>> dev
     */
    public function expectOutputString($expectedString)
    {
        if ($this->outputExpectedRegex !== null) {
<<<<<<< HEAD
            throw new PHPUnit_Framework_Exception;
        }

        if (is_string($expectedString) || is_null($expectedString)) {
=======
            throw new Exception;
        }

        if (\is_string($expectedString) || null === $expectedString) {
>>>>>>> dev
            $this->outputExpectedString = $expectedString;
        }
    }

    /**
     * @return bool
<<<<<<< HEAD
     *
     * @since Method available since Release 3.6.5
     * @deprecated
     */
    public function hasPerformedExpectationsOnOutput()
    {
        return $this->hasExpectationOnOutput();
    }

    /**
     * @return bool
     *
     * @since Method available since Release 4.3.3
     */
    public function hasExpectationOnOutput()
    {
        return is_string($this->outputExpectedString) || is_string($this->outputExpectedRegex);
=======
     */
    public function hasExpectationOnOutput()
    {
        return \is_string($this->outputExpectedString) || \is_string($this->outputExpectedRegex);
    }

    /**
     * @return null|string
     */
    public function getExpectedException()
    {
        return $this->expectedException;
    }

    /**
     * @return null|int|string
     */
    public function getExpectedExceptionCode()
    {
        return $this->expectedExceptionCode;
>>>>>>> dev
    }

    /**
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.2.0
     */
    public function getExpectedException()
    {
        return $this->expectedException;
    }

    /**
     * @param mixed  $exceptionName
     * @param string $exceptionMessage
     * @param int    $exceptionCode
     *
     * @since  Method available since Release 3.2.0
     */
    public function setExpectedException($exceptionName, $exceptionMessage = '', $exceptionCode = null)
    {
        $this->expectedException        = $exceptionName;
        $this->expectedExceptionMessage = $exceptionMessage;
        $this->expectedExceptionCode    = $exceptionCode;
    }

    /**
     * @param mixed  $exceptionName
     * @param string $exceptionMessageRegExp
     * @param int    $exceptionCode
     *
     * @since Method available since Release 4.3.0
     */
    public function setExpectedExceptionRegExp($exceptionName, $exceptionMessageRegExp = '', $exceptionCode = null)
    {
        $this->expectedException              = $exceptionName;
        $this->expectedExceptionMessageRegExp = $exceptionMessageRegExp;
        $this->expectedExceptionCode          = $exceptionCode;
    }

    /**
     * @since  Method available since Release 3.4.0
     */
    protected function setExpectedExceptionFromAnnotation()
    {
        try {
            $expectedException = PHPUnit_Util_Test::getExpectedException(
                get_class($this),
=======
     */
    public function getExpectedExceptionMessage()
    {
        return $this->expectedExceptionMessage;
    }

    /**
     * @return string
     */
    public function getExpectedExceptionMessageRegExp()
    {
        return $this->expectedExceptionMessageRegExp;
    }

    /**
     * @param string $exception
     */
    public function expectException($exception)
    {
        if (!\is_string($exception)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $this->expectedException = $exception;
    }

    /**
     * @param int|string $code
     *
     * @throws Exception
     */
    public function expectExceptionCode($code)
    {
        if (!\is_int($code) && !\is_string($code)) {
            throw InvalidArgumentHelper::factory(1, 'integer or string');
        }

        $this->expectedExceptionCode = $code;
    }

    /**
     * @param string $message
     *
     * @throws Exception
     */
    public function expectExceptionMessage($message)
    {
        if (!\is_string($message)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $this->expectedExceptionMessage = $message;
    }

    /**
     * @param string $messageRegExp
     *
     * @throws Exception
     */
    public function expectExceptionMessageRegExp($messageRegExp)
    {
        if (!\is_string($messageRegExp)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $this->expectedExceptionMessageRegExp = $messageRegExp;
    }

    /**
     * Sets up an expectation for an exception to be raised by the code under test.
     * Information for expected exception class, expected exception message, and
     * expected exception code are retrieved from a given Exception object.
     */
    public function expectExceptionObject(\Exception $exception)
    {
        $this->expectException(\get_class($exception));
        $this->expectExceptionMessage($exception->getMessage());
        $this->expectExceptionCode($exception->getCode());
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

    protected function setExpectedExceptionFromAnnotation()
    {
        try {
            $expectedException = \PHPUnit\Util\Test::getExpectedException(
                \get_class($this),
>>>>>>> dev
                $this->name
            );

            if ($expectedException !== false) {
<<<<<<< HEAD
                $this->setExpectedException(
                    $expectedException['class'],
                    $expectedException['message'],
                    $expectedException['code']
                );

                if (!empty($expectedException['message_regex'])) {
                    $this->setExpectedExceptionRegExp(
                        $expectedException['class'],
                        $expectedException['message_regex'],
                        $expectedException['code']
                    );
=======
                $this->expectException($expectedException['class']);

                if ($expectedException['code'] !== null) {
                    $this->expectExceptionCode($expectedException['code']);
                }

                if ($expectedException['message'] !== '') {
                    $this->expectExceptionMessage($expectedException['message']);
                } elseif ($expectedException['message_regex'] !== '') {
                    $this->expectExceptionMessageRegExp($expectedException['message_regex']);
>>>>>>> dev
                }
            }
        } catch (ReflectionException $e) {
        }
    }

    /**
     * @param bool $useErrorHandler
<<<<<<< HEAD
     *
     * @since Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public function setUseErrorHandler($useErrorHandler)
    {
        $this->useErrorHandler = $useErrorHandler;
    }

<<<<<<< HEAD
    /**
     * @since Method available since Release 3.4.0
     */
    protected function setUseErrorHandlerFromAnnotation()
    {
        try {
            $useErrorHandler = PHPUnit_Util_Test::getErrorHandlerSettings(
                get_class($this),
=======
    protected function setUseErrorHandlerFromAnnotation()
    {
        try {
            $useErrorHandler = \PHPUnit\Util\Test::getErrorHandlerSettings(
                \get_class($this),
>>>>>>> dev
                $this->name
            );

            if ($useErrorHandler !== null) {
                $this->setUseErrorHandler($useErrorHandler);
            }
        } catch (ReflectionException $e) {
        }
    }

<<<<<<< HEAD
    /**
     * @since Method available since Release 3.6.0
     */
    protected function checkRequirements()
    {
        if (!$this->name || !method_exists($this, $this->name)) {
            return;
        }

        $missingRequirements = PHPUnit_Util_Test::getMissingRequirements(
            get_class($this),
=======
    protected function checkRequirements()
    {
        if (!$this->name || !\method_exists($this, $this->name)) {
            return;
        }

        $missingRequirements = \PHPUnit\Util\Test::getMissingRequirements(
            \get_class($this),
>>>>>>> dev
            $this->name
        );

        if (!empty($missingRequirements)) {
<<<<<<< HEAD
            $this->markTestSkipped(implode(PHP_EOL, $missingRequirements));
=======
            $this->markTestSkipped(\implode(PHP_EOL, $missingRequirements));
>>>>>>> dev
        }
    }

    /**
     * Returns the status of this test.
     *
     * @return int
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
=======
>>>>>>> dev
     */
    public function getStatus()
    {
        return $this->status;
    }

<<<<<<< HEAD
=======
    public function markAsRisky()
    {
        $this->status = BaseTestRunner::STATUS_RISKY;
    }

>>>>>>> dev
    /**
     * Returns the status message of this test.
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
=======
>>>>>>> dev
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * Returns whether or not this test has failed.
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
=======
>>>>>>> dev
     */
    public function hasFailed()
    {
        $status = $this->getStatus();

<<<<<<< HEAD
        return $status == PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE ||
               $status == PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
=======
        return $status == BaseTestRunner::STATUS_FAILURE ||
            $status == BaseTestRunner::STATUS_ERROR;
>>>>>>> dev
    }

    /**
     * Runs the test case and collects the results in a TestResult object.
     * If no TestResult object is passed a new one will be created.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     *
     * @return PHPUnit_Framework_TestResult
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function run(PHPUnit_Framework_TestResult $result = null)
=======
     * @param TestResult $result
     *
     * @return TestResult
     *
     * @throws Exception
     */
    public function run(TestResult $result = null)
>>>>>>> dev
    {
        if ($result === null) {
            $result = $this->createResult();
        }

<<<<<<< HEAD
        if (!$this instanceof PHPUnit_Framework_Warning) {
=======
        if (!$this instanceof WarningTestCase) {
>>>>>>> dev
            $this->setTestResultObject($result);
            $this->setUseErrorHandlerFromAnnotation();
        }

        if ($this->useErrorHandler !== null) {
            $oldErrorHandlerSetting = $result->getConvertErrorsToExceptions();
            $result->convertErrorsToExceptions($this->useErrorHandler);
        }

<<<<<<< HEAD
        if (!$this instanceof PHPUnit_Framework_Warning && !$this->handleDependencies()) {
            return;
        }

        if ($this->runTestInSeparateProcess === true &&
            $this->inIsolation !== true &&
            !$this instanceof PHPUnit_Extensions_SeleniumTestCase &&
            !$this instanceof PHPUnit_Extensions_PhptTestCase) {
            $class = new ReflectionClass($this);

            $template = new Text_Template(
                __DIR__ . '/../Util/PHP/Template/TestCaseMethod.tpl'
            );

            if ($this->preserveGlobalState) {
                $constants     = PHPUnit_Util_GlobalState::getConstantsAsString();
                $globals       = PHPUnit_Util_GlobalState::getGlobalsAsString();
                $includedFiles = PHPUnit_Util_GlobalState::getIncludedFilesAsString();
                $iniSettings   = PHPUnit_Util_GlobalState::getIniSettingsAsString();
            } else {
                $constants     = '';
                if (!empty($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
                    $globals     = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . var_export($GLOBALS['__PHPUNIT_BOOTSTRAP'], true) . ";\n";
                } else {
                    $globals     = '';
=======
        if (!$this instanceof WarningTestCase &&
            !$this instanceof SkippedTestCase &&
            !$this->handleDependencies()) {
            return $result;
        }

        $runEntireClass =  $this->runClassInSeparateProcess && !$this->runTestInSeparateProcess;

        if (($this->runTestInSeparateProcess === true || $this->runClassInSeparateProcess === true) &&
            $this->inIsolation !== true &&
            !$this instanceof PhptTestCase) {
            $class = new ReflectionClass($this);

            if ($runEntireClass) {
                $template = new Text_Template(
                    __DIR__ . '/../Util/PHP/Template/TestCaseClass.tpl'
                );
            } else {
                $template = new Text_Template(
                    __DIR__ . '/../Util/PHP/Template/TestCaseMethod.tpl'
                );
            }

            if ($this->preserveGlobalState) {
                $constants     = GlobalState::getConstantsAsString();
                $globals       = GlobalState::getGlobalsAsString();
                $includedFiles = GlobalState::getIncludedFilesAsString();
                $iniSettings   = GlobalState::getIniSettingsAsString();
            } else {
                $constants = '';
                if (!empty($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
                    $globals = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . \var_export($GLOBALS['__PHPUNIT_BOOTSTRAP'], true) . ";\n";
                } else {
                    $globals = '';
>>>>>>> dev
                }
                $includedFiles = '';
                $iniSettings   = '';
            }

<<<<<<< HEAD
            $coverage                                = $result->getCollectCodeCoverageInformation()       ? 'true' : 'false';
            $isStrictAboutTestsThatDoNotTestAnything = $result->isStrictAboutTestsThatDoNotTestAnything() ? 'true' : 'false';
            $isStrictAboutOutputDuringTests          = $result->isStrictAboutOutputDuringTests()          ? 'true' : 'false';
            $isStrictAboutTestSize                   = $result->isStrictAboutTestSize()                   ? 'true' : 'false';
            $isStrictAboutTodoAnnotatedTests         = $result->isStrictAboutTodoAnnotatedTests()         ? 'true' : 'false';

            if (defined('PHPUNIT_COMPOSER_INSTALL')) {
                $composerAutoload = var_export(PHPUNIT_COMPOSER_INSTALL, true);
=======
            $coverage                                   = $result->getCollectCodeCoverageInformation() ? 'true' : 'false';
            $isStrictAboutTestsThatDoNotTestAnything    = $result->isStrictAboutTestsThatDoNotTestAnything() ? 'true' : 'false';
            $isStrictAboutOutputDuringTests             = $result->isStrictAboutOutputDuringTests() ? 'true' : 'false';
            $enforcesTimeLimit                          = $result->enforcesTimeLimit() ? 'true' : 'false';
            $isStrictAboutTodoAnnotatedTests            = $result->isStrictAboutTodoAnnotatedTests() ? 'true' : 'false';
            $isStrictAboutResourceUsageDuringSmallTests = $result->isStrictAboutResourceUsageDuringSmallTests() ? 'true' : 'false';

            if (\defined('PHPUNIT_COMPOSER_INSTALL')) {
                $composerAutoload = \var_export(PHPUNIT_COMPOSER_INSTALL, true);
>>>>>>> dev
            } else {
                $composerAutoload = '\'\'';
            }

<<<<<<< HEAD
            if (defined('__PHPUNIT_PHAR__')) {
                $phar = var_export(__PHPUNIT_PHAR__, true);
=======
            if (\defined('__PHPUNIT_PHAR__')) {
                $phar = \var_export(__PHPUNIT_PHAR__, true);
>>>>>>> dev
            } else {
                $phar = '\'\'';
            }

            if ($result->getCodeCoverage()) {
                $codeCoverageFilter = $result->getCodeCoverage()->filter();
            } else {
                $codeCoverageFilter = null;
            }

<<<<<<< HEAD
            $data               = var_export(serialize($this->data), true);
            $dataName           = var_export($this->dataName, true);
            $dependencyInput    = var_export(serialize($this->dependencyInput), true);
            $includePath        = var_export(get_include_path(), true);
            $codeCoverageFilter = var_export(serialize($codeCoverageFilter), true);
=======
            $data               = \var_export(\serialize($this->data), true);
            $dataName           = \var_export($this->dataName, true);
            $dependencyInput    = \var_export(\serialize($this->dependencyInput), true);
            $includePath        = \var_export(\get_include_path(), true);
            $codeCoverageFilter = \var_export(\serialize($codeCoverageFilter), true);
>>>>>>> dev
            // must do these fixes because TestCaseMethod.tpl has unserialize('{data}') in it, and we can't break BC
            // the lines above used to use addcslashes() rather than var_export(), which breaks null byte escape sequences
            $data               = "'." . $data . ".'";
            $dataName           = "'.(" . $dataName . ").'";
            $dependencyInput    = "'." . $dependencyInput . ".'";
            $includePath        = "'." . $includePath . ".'";
            $codeCoverageFilter = "'." . $codeCoverageFilter . ".'";

<<<<<<< HEAD
            $configurationFilePath = (isset($GLOBALS['__PHPUNIT_CONFIGURATION_FILE']) ? $GLOBALS['__PHPUNIT_CONFIGURATION_FILE'] : '');

            $template->setVar(
                array(
                    'composerAutoload'                        => $composerAutoload,
                    'phar'                                    => $phar,
                    'filename'                                => $class->getFileName(),
                    'className'                               => $class->getName(),
                    'methodName'                              => $this->name,
                    'collectCodeCoverageInformation'          => $coverage,
                    'data'                                    => $data,
                    'dataName'                                => $dataName,
                    'dependencyInput'                         => $dependencyInput,
                    'constants'                               => $constants,
                    'globals'                                 => $globals,
                    'include_path'                            => $includePath,
                    'included_files'                          => $includedFiles,
                    'iniSettings'                             => $iniSettings,
                    'isStrictAboutTestsThatDoNotTestAnything' => $isStrictAboutTestsThatDoNotTestAnything,
                    'isStrictAboutOutputDuringTests'          => $isStrictAboutOutputDuringTests,
                    'isStrictAboutTestSize'                   => $isStrictAboutTestSize,
                    'isStrictAboutTodoAnnotatedTests'         => $isStrictAboutTodoAnnotatedTests,
                    'codeCoverageFilter'                      => $codeCoverageFilter,
                    'configurationFilePath'                   => $configurationFilePath
                )
=======
            $configurationFilePath = $GLOBALS['__PHPUNIT_CONFIGURATION_FILE'] ?? '';

            $var = [
                'composerAutoload'                           => $composerAutoload,
                'phar'                                       => $phar,
                'filename'                                   => $class->getFileName(),
                'className'                                  => $class->getName(),
                'collectCodeCoverageInformation'             => $coverage,
                'data'                                       => $data,
                'dataName'                                   => $dataName,
                'dependencyInput'                            => $dependencyInput,
                'constants'                                  => $constants,
                'globals'                                    => $globals,
                'include_path'                               => $includePath,
                'included_files'                             => $includedFiles,
                'iniSettings'                                => $iniSettings,
                'isStrictAboutTestsThatDoNotTestAnything'    => $isStrictAboutTestsThatDoNotTestAnything,
                'isStrictAboutOutputDuringTests'             => $isStrictAboutOutputDuringTests,
                'enforcesTimeLimit'                          => $enforcesTimeLimit,
                'isStrictAboutTodoAnnotatedTests'            => $isStrictAboutTodoAnnotatedTests,
                'isStrictAboutResourceUsageDuringSmallTests' => $isStrictAboutResourceUsageDuringSmallTests,
                'codeCoverageFilter'                         => $codeCoverageFilter,
                'configurationFilePath'                      => $configurationFilePath,
                'name'                                       => $this->getName(false),
            ];

            if (!$runEntireClass) {
                $var['methodName'] = $this->name;
            }

            $template->setVar(
                $var
>>>>>>> dev
            );

            $this->prepareTemplate($template);

<<<<<<< HEAD
            $php = PHPUnit_Util_PHP::factory();
=======
            $php = AbstractPhpProcess::factory();
>>>>>>> dev
            $php->runTestJob($template->render(), $this, $result);
        } else {
            $result->run($this);
        }

<<<<<<< HEAD
        if ($this->useErrorHandler !== null) {
=======
        if (isset($oldErrorHandlerSetting)) {
>>>>>>> dev
            $result->convertErrorsToExceptions($oldErrorHandlerSetting);
        }

        $this->result = null;

        return $result;
    }

    /**
     * Runs the bare test sequence.
     */
    public function runBare()
    {
        $this->numAssertions = 0;

        $this->snapshotGlobalState();
        $this->startOutputBuffering();
<<<<<<< HEAD
        clearstatcache();
        $currentWorkingDirectory = getcwd();

        $hookMethods = PHPUnit_Util_Test::getHookMethods(get_class($this));
=======
        \clearstatcache();
        $currentWorkingDirectory = \getcwd();

        $hookMethods = \PHPUnit\Util\Test::getHookMethods(\get_class($this));
>>>>>>> dev

        try {
            $hasMetRequirements = false;
            $this->checkRequirements();
            $hasMetRequirements = true;

            if ($this->inIsolation) {
                foreach ($hookMethods['beforeClass'] as $method) {
                    $this->$method();
                }
            }

            $this->setExpectedExceptionFromAnnotation();
<<<<<<< HEAD
=======
            $this->setDoesNotPerformAssertionsFromAnnotation();
>>>>>>> dev

            foreach ($hookMethods['before'] as $method) {
                $this->$method();
            }

            $this->assertPreConditions();
            $this->testResult = $this->runTest();
            $this->verifyMockObjects();
            $this->assertPostConditions();

<<<<<<< HEAD
            $this->status = PHPUnit_Runner_BaseTestRunner::STATUS_PASSED;
        } catch (PHPUnit_Framework_IncompleteTest $e) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_INCOMPLETE;
            $this->statusMessage = $e->getMessage();
        } catch (PHPUnit_Framework_SkippedTest $e) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_SKIPPED;
            $this->statusMessage = $e->getMessage();
        } catch (PHPUnit_Framework_AssertionFailedError $e) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (PredictionException $e) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (Throwable $_e) {
            $e = $_e;
        } catch (Exception $_e) {
            $e = $_e;
        }

        if (isset($_e)) {
            $this->status        = PHPUnit_Runner_BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
        }

        // Clean up the mock objects.
        $this->mockObjects = array();
=======
            if (!empty($this->warnings)) {
                throw new Warning(
                    \implode(
                        "\n",
                        \array_unique($this->warnings)
                    )
                );
            }

            $this->status = BaseTestRunner::STATUS_PASSED;
        } catch (IncompleteTest $e) {
            $this->status        = BaseTestRunner::STATUS_INCOMPLETE;
            $this->statusMessage = $e->getMessage();
        } catch (SkippedTest $e) {
            $this->status        = BaseTestRunner::STATUS_SKIPPED;
            $this->statusMessage = $e->getMessage();
        } catch (Warning $e) {
            $this->status        = BaseTestRunner::STATUS_WARNING;
            $this->statusMessage = $e->getMessage();
        } catch (AssertionFailedError $e) {
            $this->status        = BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (PredictionException $e) {
            $this->status        = BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (Throwable $_e) {
            $e = $_e;
        }

        // Clean up the mock objects.
        $this->mockObjects = [];
>>>>>>> dev
        $this->prophet     = null;

        // Tear down the fixture. An exception raised in tearDown() will be
        // caught and passed on when no exception was raised before.
        try {
            if ($hasMetRequirements) {
                foreach ($hookMethods['after'] as $method) {
                    $this->$method();
                }

                if ($this->inIsolation) {
                    foreach ($hookMethods['afterClass'] as $method) {
                        $this->$method();
                    }
                }
            }
        } catch (Throwable $_e) {
            if (!isset($e)) {
                $e = $_e;
            }
<<<<<<< HEAD
        } catch (Exception $_e) {
            if (!isset($e)) {
                $e = $_e;
            }
=======
>>>>>>> dev
        }

        try {
            $this->stopOutputBuffering();
<<<<<<< HEAD
        } catch (PHPUnit_Framework_RiskyTestError $_e) {
=======
        } catch (RiskyTestError $_e) {
>>>>>>> dev
            if (!isset($e)) {
                $e = $_e;
            }
        }

<<<<<<< HEAD
        clearstatcache();

        if ($currentWorkingDirectory != getcwd()) {
            chdir($currentWorkingDirectory);
        }

        $this->restoreGlobalState();

        // Clean up INI settings.
        foreach ($this->iniSettings as $varName => $oldValue) {
            ini_set($varName, $oldValue);
        }

        $this->iniSettings = array();

        // Clean up locale settings.
        foreach ($this->locale as $category => $locale) {
            setlocale($category, $locale);
        }
=======
        if (isset($_e)) {
            $this->status        = BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
        }

        \clearstatcache();

        if ($currentWorkingDirectory != \getcwd()) {
            \chdir($currentWorkingDirectory);
        }

        $this->restoreGlobalState();
        $this->unregisterCustomComparators();
        $this->cleanupIniSettings();
        $this->cleanupLocaleSettings();
>>>>>>> dev

        // Perform assertion on output.
        if (!isset($e)) {
            try {
                if ($this->outputExpectedRegex !== null) {
                    $this->assertRegExp($this->outputExpectedRegex, $this->output);
                } elseif ($this->outputExpectedString !== null) {
                    $this->assertEquals($this->outputExpectedString, $this->output);
                }
            } catch (Throwable $_e) {
                $e = $_e;
<<<<<<< HEAD
            } catch (Exception $_e) {
                $e = $_e;
=======
>>>>>>> dev
            }
        }

        // Workaround for missing "finally".
        if (isset($e)) {
            if ($e instanceof PredictionException) {
<<<<<<< HEAD
                $e = new PHPUnit_Framework_AssertionFailedError($e->getMessage());
            }

            if (!$e instanceof Exception) {
                // Rethrow Error directly on PHP 7 as onNotSuccessfulTest does not support it
                throw $e;
=======
                $e = new AssertionFailedError($e->getMessage());
>>>>>>> dev
            }

            $this->onNotSuccessfulTest($e);
        }
    }

    /**
     * Override to run the test and assert its state.
     *
     * @return mixed
     *
<<<<<<< HEAD
     * @throws Exception|PHPUnit_Framework_Exception
     * @throws PHPUnit_Framework_Exception
=======
     * @throws Exception|Exception
     * @throws Exception
>>>>>>> dev
     */
    protected function runTest()
    {
        if ($this->name === null) {
<<<<<<< HEAD
            throw new PHPUnit_Framework_Exception(
                'PHPUnit_Framework_TestCase::$name must not be null.'
=======
            throw new Exception(
                'PHPUnit\Framework\TestCase::$name must not be null.'
>>>>>>> dev
            );
        }

        try {
            $class  = new ReflectionClass($this);
            $method = $class->getMethod($this->name);
        } catch (ReflectionException $e) {
            $this->fail($e->getMessage());
        }

<<<<<<< HEAD
        try {
            $testResult = $method->invokeArgs(
                $this,
                array_merge($this->data, $this->dependencyInput)
            );
        } catch (Throwable $_e) {
            $e = $_e;
        } catch (Exception $_e) {
            $e = $_e;
        }

        if (isset($e)) {
            $checkException = false;

            if (!($e instanceof PHPUnit_Framework_SkippedTestError) && is_string($this->expectedException)) {
                $checkException = true;

                if ($e instanceof PHPUnit_Framework_Exception) {
                    $checkException = false;
                }

                $reflector = new ReflectionClass($this->expectedException);

                if ($this->expectedException === 'PHPUnit_Framework_Exception' ||
                    $this->expectedException === '\PHPUnit_Framework_Exception' ||
                    $reflector->isSubclassOf('PHPUnit_Framework_Exception')) {
                    $checkException = true;
                }
            }

            if ($checkException) {
                $this->assertThat(
                    $e,
                    new PHPUnit_Framework_Constraint_Exception(
                        $this->expectedException
                    )
                );

                if (is_string($this->expectedExceptionMessage) &&
                    !empty($this->expectedExceptionMessage)) {
                    $this->assertThat(
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionMessage(
=======
        $testArguments = \array_merge($this->data, $this->dependencyInput);

        $this->registerMockObjectsFromTestArguments($testArguments);

        try {
            $testResult = $method->invokeArgs($this, $testArguments);
        } catch (Throwable $t) {
            $exception = $t;
        }

        if (isset($exception)) {
            if ($this->checkExceptionExpectations($exception)) {
                if ($this->expectedException !== null) {
                    $this->assertThat(
                        $exception,
                        new ExceptionConstraint(
                            $this->expectedException
                        )
                    );
                }

                if ($this->expectedExceptionMessage !== null) {
                    $this->assertThat(
                        $exception,
                        new ExceptionMessage(
>>>>>>> dev
                            $this->expectedExceptionMessage
                        )
                    );
                }

<<<<<<< HEAD
                if (is_string($this->expectedExceptionMessageRegExp) &&
                    !empty($this->expectedExceptionMessageRegExp)) {
                    $this->assertThat(
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionMessageRegExp(
=======
                if ($this->expectedExceptionMessageRegExp !== null) {
                    $this->assertThat(
                        $exception,
                        new ExceptionMessageRegularExpression(
>>>>>>> dev
                            $this->expectedExceptionMessageRegExp
                        )
                    );
                }

                if ($this->expectedExceptionCode !== null) {
                    $this->assertThat(
<<<<<<< HEAD
                        $e,
                        new PHPUnit_Framework_Constraint_ExceptionCode(
=======
                        $exception,
                        new ExceptionCode(
>>>>>>> dev
                            $this->expectedExceptionCode
                        )
                    );
                }

                return;
<<<<<<< HEAD
            } else {
                throw $e;
            }
=======
            }

            throw $exception;
>>>>>>> dev
        }

        if ($this->expectedException !== null) {
            $this->assertThat(
                null,
<<<<<<< HEAD
                new PHPUnit_Framework_Constraint_Exception(
                    $this->expectedException
                )
            );
=======
                new ExceptionConstraint(
                    $this->expectedException
                )
            );
        } elseif ($this->expectedExceptionMessage !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                \sprintf(
                    'Failed asserting that exception with message "%s" is thrown',
                    $this->expectedExceptionMessage
                )
            );
        } elseif ($this->expectedExceptionMessageRegExp !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                \sprintf(
                    'Failed asserting that exception with message matching "%s" is thrown',
                    $this->expectedExceptionMessageRegExp
                )
            );
        } elseif ($this->expectedExceptionCode !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
                \sprintf(
                    'Failed asserting that exception with code "%s" is thrown',
                    $this->expectedExceptionCode
                )
            );
>>>>>>> dev
        }

        return $testResult;
    }

    /**
     * Verifies the mock object expectations.
<<<<<<< HEAD
     *
     * @since Method available since Release 3.5.0
=======
>>>>>>> dev
     */
    protected function verifyMockObjects()
    {
        foreach ($this->mockObjects as $mockObject) {
            if ($mockObject->__phpunit_hasMatchers()) {
                $this->numAssertions++;
            }

<<<<<<< HEAD
            $mockObject->__phpunit_verify();
=======
            $mockObject->__phpunit_verify(
                $this->shouldInvocationMockerBeReset($mockObject)
            );
>>>>>>> dev
        }

        if ($this->prophet !== null) {
            try {
                $this->prophet->checkPredictions();
<<<<<<< HEAD
            } catch (Throwable $e) {
                /* Intentionally left empty */
            } catch (Exception $e) {
=======
            } catch (Throwable $t) {
>>>>>>> dev
                /* Intentionally left empty */
            }

            foreach ($this->prophet->getProphecies() as $objectProphecy) {
                foreach ($objectProphecy->getMethodProphecies() as $methodProphecies) {
                    foreach ($methodProphecies as $methodProphecy) {
<<<<<<< HEAD
                        $this->numAssertions += count($methodProphecy->getCheckedPredictions());
=======
                        $this->numAssertions += \count($methodProphecy->getCheckedPredictions());
>>>>>>> dev
                    }
                }
            }

<<<<<<< HEAD
            if (isset($e)) {
                throw $e;
=======
            if (isset($t)) {
                throw $t;
>>>>>>> dev
            }
        }
    }

    /**
     * Sets the name of a TestCase.
     *
     * @param  string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Sets the dependencies of a TestCase.
     *
<<<<<<< HEAD
     * @param array $dependencies
     *
     * @since  Method available since Release 3.4.0
=======
     * @param string[] $dependencies
>>>>>>> dev
     */
    public function setDependencies(array $dependencies)
    {
        $this->dependencies = $dependencies;
    }

    /**
     * Returns true if the tests has dependencies
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since Method available since Release 4.0.0
     */
    public function hasDependencies()
    {
        return count($this->dependencies) > 0;
=======
     */
    public function hasDependencies()
    {
        return \count($this->dependencies) > 0;
>>>>>>> dev
    }

    /**
     * Sets
     *
     * @param array $dependencyInput
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public function setDependencyInput(array $dependencyInput)
    {
        $this->dependencyInput = $dependencyInput;
    }

    /**
<<<<<<< HEAD
     * @param bool $disallowChangesToGlobalState
     *
     * @since Method available since Release 4.6.0
     */
    public function setDisallowChangesToGlobalState($disallowChangesToGlobalState)
    {
        $this->disallowChangesToGlobalState = $disallowChangesToGlobalState;
=======
     * @param bool $beStrictAboutChangesToGlobalState
     */
    public function setBeStrictAboutChangesToGlobalState($beStrictAboutChangesToGlobalState)
    {
        $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
>>>>>>> dev
    }

    /**
     * Calling this method in setUp() has no effect!
     *
     * @param bool $backupGlobals
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
     */
    public function setBackupGlobals($backupGlobals)
    {
        if (is_null($this->backupGlobals) && is_bool($backupGlobals)) {
=======
     */
    public function setBackupGlobals($backupGlobals)
    {
        if (null === $this->backupGlobals && \is_bool($backupGlobals)) {
>>>>>>> dev
            $this->backupGlobals = $backupGlobals;
        }
    }

    /**
     * Calling this method in setUp() has no effect!
     *
     * @param bool $backupStaticAttributes
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
     */
    public function setBackupStaticAttributes($backupStaticAttributes)
    {
        if (is_null($this->backupStaticAttributes) &&
            is_bool($backupStaticAttributes)) {
=======
     */
    public function setBackupStaticAttributes($backupStaticAttributes)
    {
        if (null === $this->backupStaticAttributes &&
            \is_bool($backupStaticAttributes)) {
>>>>>>> dev
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * @param bool $runTestInSeparateProcess
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.4.0
     */
    public function setRunTestInSeparateProcess($runTestInSeparateProcess)
    {
        if (is_bool($runTestInSeparateProcess)) {
=======
     * @throws Exception
     */
    public function setRunTestInSeparateProcess($runTestInSeparateProcess)
    {
        if (\is_bool($runTestInSeparateProcess)) {
>>>>>>> dev
            if ($this->runTestInSeparateProcess === null) {
                $this->runTestInSeparateProcess = $runTestInSeparateProcess;
            }
        } else {
<<<<<<< HEAD
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }
    }

    /**
<<<<<<< HEAD
     * @param bool $preserveGlobalState
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.4.0
     */
    public function setPreserveGlobalState($preserveGlobalState)
    {
        if (is_bool($preserveGlobalState)) {
            $this->preserveGlobalState = $preserveGlobalState;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @param bool $runClassInSeparateProcess
     *
     * @throws Exception
     */
    public function setRunClassInSeparateProcess($runClassInSeparateProcess)
    {
        if (\is_bool($runClassInSeparateProcess)) {
            if ($this->runClassInSeparateProcess === null) {
                $this->runClassInSeparateProcess = $runClassInSeparateProcess;
            }
        } else {
            throw InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    /**
     * @param bool $preserveGlobalState
     *
     * @throws Exception
     */
    public function setPreserveGlobalState($preserveGlobalState)
    {
        if (\is_bool($preserveGlobalState)) {
            $this->preserveGlobalState = $preserveGlobalState;
        } else {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }
    }

    /**
     * @param bool $inIsolation
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.4.0
     */
    public function setInIsolation($inIsolation)
    {
        if (is_bool($inIsolation)) {
            $this->inIsolation = $inIsolation;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function setInIsolation($inIsolation)
    {
        if (\is_bool($inIsolation)) {
            $this->inIsolation = $inIsolation;
        } else {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }
    }

    /**
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.3.0
=======
>>>>>>> dev
     */
    public function isInIsolation()
    {
        return $this->inIsolation;
    }

    /**
     * @return mixed
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public function getResult()
    {
        return $this->testResult;
    }

    /**
     * @param mixed $result
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public function setResult($result)
    {
        $this->testResult = $result;
    }

    /**
     * @param callable $callback
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since Method available since Release 3.6.0
     */
    public function setOutputCallback($callback)
    {
        if (!is_callable($callback)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'callback');
=======
     * @throws Exception
     */
    public function setOutputCallback($callback)
    {
        if (!\is_callable($callback)) {
            throw InvalidArgumentHelper::factory(1, 'callback');
>>>>>>> dev
        }

        $this->outputCallback = $callback;
    }

    /**
<<<<<<< HEAD
     * @return PHPUnit_Framework_TestResult
     *
     * @since  Method available since Release 3.5.7
=======
     * @return TestResult
>>>>>>> dev
     */
    public function getTestResultObject()
    {
        return $this->result;
    }

    /**
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     *
     * @since Method available since Release 3.6.0
     */
    public function setTestResultObject(PHPUnit_Framework_TestResult $result)
=======
     * @param TestResult $result
     */
    public function setTestResultObject(TestResult $result)
>>>>>>> dev
    {
        $this->result = $result;
    }

    /**
<<<<<<< HEAD
=======
     * @param MockObject $mockObject
     */
    public function registerMockObject(MockObject $mockObject)
    {
        $this->mockObjects[] = $mockObject;
    }

    /**
>>>>>>> dev
     * This method is a wrapper for the ini_set() function that automatically
     * resets the modified php.ini setting to its original value after the
     * test is run.
     *
     * @param string $varName
     * @param string $newValue
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.0.0
     */
    protected function iniSet($varName, $newValue)
    {
        if (!is_string($varName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $currentValue = ini_set($varName, $newValue);
=======
     * @throws Exception
     */
    protected function iniSet($varName, $newValue)
    {
        if (!\is_string($varName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $currentValue = \ini_set($varName, $newValue);
>>>>>>> dev

        if ($currentValue !== false) {
            $this->iniSettings[$varName] = $currentValue;
        } else {
<<<<<<< HEAD
            throw new PHPUnit_Framework_Exception(
                sprintf(
=======
            throw new Exception(
                \sprintf(
>>>>>>> dev
                    'INI setting "%s" could not be set to "%s".',
                    $varName,
                    $newValue
                )
            );
        }
    }

    /**
     * This method is a wrapper for the setlocale() function that automatically
     * resets the locale to its original value after the test is run.
     *
     * @param int    $category
     * @param string $locale
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.1.0
     */
    protected function setLocale()
    {
        $args = func_get_args();

        if (count($args) < 2) {
            throw new PHPUnit_Framework_Exception;
        }

        $category = $args[0];
        $locale   = $args[1];

        $categories = array(
            LC_ALL, LC_COLLATE, LC_CTYPE, LC_MONETARY, LC_NUMERIC, LC_TIME
        );

        if (defined('LC_MESSAGES')) {
            $categories[] = LC_MESSAGES;
        }

        if (!in_array($category, $categories)) {
            throw new PHPUnit_Framework_Exception;
        }

        if (!is_array($locale) && !is_string($locale)) {
            throw new PHPUnit_Framework_Exception;
        }

        $this->locale[$category] = setlocale($category, null);

        $result = call_user_func_array('setlocale', $args);

        if ($result === false) {
            throw new PHPUnit_Framework_Exception(
=======
     * @throws Exception
     */
    protected function setLocale()
    {
        $args = \func_get_args();

        if (\count($args) < 2) {
            throw new Exception;
        }

        list($category, $locale) = $args;

        $categories = [
            LC_ALL, LC_COLLATE, LC_CTYPE, LC_MONETARY, LC_NUMERIC, LC_TIME
        ];

        if (\defined('LC_MESSAGES')) {
            $categories[] = LC_MESSAGES;
        }

        if (!\in_array($category, $categories)) {
            throw new Exception;
        }

        if (!\is_array($locale) && !\is_string($locale)) {
            throw new Exception;
        }

        $this->locale[$category] = \setlocale($category, 0);

        $result = \call_user_func_array('setlocale', $args);

        if ($result === false) {
            throw new Exception(
>>>>>>> dev
                'The locale functionality is not implemented on your platform, ' .
                'the specified locale does not exist or the category name is ' .
                'invalid.'
            );
        }
    }

    /**
<<<<<<< HEAD
     * Returns a mock object for the specified class.
     *
     * @param string     $originalClassName       Name of the class to mock.
     * @param array|null $methods                 When provided, only methods whose names are in the array
     *                                            are replaced with a configurable test double. The behavior
     *                                            of the other methods is not changed.
     *                                            Providing null means that no methods will be replaced.
     * @param array      $arguments               Parameters to pass to the original class' constructor.
     * @param string     $mockClassName           Class name for the generated test double class.
     * @param bool       $callOriginalConstructor Can be used to disable the call to the original class' constructor.
     * @param bool       $callOriginalClone       Can be used to disable the call to the original class' clone constructor.
     * @param bool       $callAutoload            Can be used to disable __autoload() during the generation of the test double class.
     * @param bool       $cloneArguments
     * @param bool       $callOriginalMethods
     * @param object     $proxyTarget
     *
     * @return PHPUnit_Framework_MockObject_MockObject
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.0.0
     */
    public function getMock($originalClassName, $methods = array(), array $arguments = array(), $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false, $callOriginalMethods = false, $proxyTarget = null)
    {
        $mockObject = $this->getMockObjectGenerator()->getMock(
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments,
            $callOriginalMethods,
            $proxyTarget
        );

        $this->mockObjects[] = $mockObject;

        return $mockObject;
    }

    /**
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @param string $className
     *
     * @return PHPUnit_Framework_MockObject_MockBuilder
     *
     * @since  Method available since Release 3.5.0
     */
    public function getMockBuilder($className)
    {
        return new PHPUnit_Framework_MockObject_MockBuilder($this, $className);
=======
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @param string|string[] $className
     *
     * @return MockBuilder
     */
    public function getMockBuilder($className)
    {
        return new MockBuilder($this, $className);
    }

    /**
     * Returns a test double for the specified class.
     *
     * @param string $originalClassName
     *
     * @return MockObject
     *
     * @throws Exception
     */
    protected function createMock($originalClassName)
    {
        return $this->getMockBuilder($originalClassName)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
                    ->getMock();
    }

    /**
     * Returns a configured test double for the specified class.
     *
     * @param string $originalClassName
     * @param array  $configuration
     *
     * @return MockObject
     *
     * @throws Exception
     */
    protected function createConfiguredMock($originalClassName, array $configuration)
    {
        $o = $this->createMock($originalClassName);

        foreach ($configuration as $method => $return) {
            $o->method($method)->willReturn($return);
        }

        return $o;
    }

    /**
     * Returns a partial test double for the specified class.
     *
     * @param string   $originalClassName
     * @param string[] $methods
     *
     * @return MockObject
     *
     * @throws Exception
     */
    protected function createPartialMock($originalClassName, array $methods)
    {
        return $this->getMockBuilder($originalClassName)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
                    ->setMethods(empty($methods) ? null : $methods)
                    ->getMock();
    }

    /**
     * Returns a test proxy for the specified class.
     *
     * @param string $originalClassName
     * @param array  $constructorArguments
     *
     * @return MockObject
     *
     * @throws Exception
     */
    protected function createTestProxy($originalClassName, array $constructorArguments = [])
    {
        return $this->getMockBuilder($originalClassName)
                    ->setConstructorArgs($constructorArguments)
                    ->enableProxyingToOriginalMethods()
                    ->getMock();
>>>>>>> dev
    }

    /**
     * Mocks the specified class and returns the name of the mocked class.
     *
     * @param string $originalClassName
     * @param array  $methods
     * @param array  $arguments
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param bool   $cloneArguments
     *
     * @return string
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.5.0
     */
    protected function getMockClass($originalClassName, $methods = array(), array $arguments = array(), $mockClassName = '', $callOriginalConstructor = false, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false)
    {
        $mock = $this->getMock(
=======
     * @throws Exception
     */
    protected function getMockClass($originalClassName, $methods = [], array $arguments = [], $mockClassName = '', $callOriginalConstructor = false, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false)
    {
        $mock = $this->getMockObjectGenerator()->getMock(
>>>>>>> dev
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments
        );

<<<<<<< HEAD
        return get_class($mock);
=======
        return \get_class($mock);
>>>>>>> dev
    }

    /**
     * Returns a mock object for the specified abstract class with all abstract
     * methods of the class mocked. Concrete methods are not mocked by default.
     * To mock concrete methods, use the 7th parameter ($mockedMethods).
     *
     * @param string $originalClassName
     * @param array  $arguments
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_MockObject
     *
     * @since  Method available since Release 3.4.0
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function getMockForAbstractClass($originalClassName, array $arguments = array(), $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = array(), $cloneArguments = false)
=======
     * @return MockObject
     *
     * @throws Exception
     */
    protected function getMockForAbstractClass($originalClassName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = false)
>>>>>>> dev
    {
        $mockObject = $this->getMockObjectGenerator()->getMockForAbstractClass(
            $originalClassName,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $mockedMethods,
            $cloneArguments
        );

<<<<<<< HEAD
        $this->mockObjects[] = $mockObject;
=======
        $this->registerMockObject($mockObject);
>>>>>>> dev

        return $mockObject;
    }

    /**
     * Returns a mock object based on the given WSDL file.
     *
     * @param string $wsdlFile
     * @param string $originalClassName
     * @param string $mockClassName
     * @param array  $methods
     * @param bool   $callOriginalConstructor
     * @param array  $options                 An array of options passed to SOAPClient::_construct
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_MockObject
     *
     * @since  Method available since Release 3.4.0
     */
    protected function getMockFromWsdl($wsdlFile, $originalClassName = '', $mockClassName = '', array $methods = array(), $callOriginalConstructor = true, array $options = array())
    {
        if ($originalClassName === '') {
            $originalClassName = str_replace('.wsdl', '', basename($wsdlFile));
        }

        if (!class_exists($originalClassName)) {
            eval(
            $this->getMockObjectGenerator()->generateClassFromWsdl(
                $wsdlFile,
                $originalClassName,
                $methods,
                $options
            )
            );
        }

        return $this->getMock(
            $originalClassName,
            $methods,
            array('', $options),
=======
     * @return MockObject
     */
    protected function getMockFromWsdl($wsdlFile, $originalClassName = '', $mockClassName = '', array $methods = [], $callOriginalConstructor = true, array $options = [])
    {
        if ($originalClassName === '') {
            $fileName          = \pathinfo(\basename(\parse_url($wsdlFile)['path']), PATHINFO_FILENAME);
            $originalClassName = \preg_replace('/[^a-zA-Z0-9_]/', '', $fileName);
        }

        if (!\class_exists($originalClassName)) {
            eval(
                $this->getMockObjectGenerator()->generateClassFromWsdl(
                    $wsdlFile,
                    $originalClassName,
                    $methods,
                    $options
                )
            );
        }

        $mockObject = $this->getMockObjectGenerator()->getMock(
            $originalClassName,
            $methods,
            ['', $options],
>>>>>>> dev
            $mockClassName,
            $callOriginalConstructor,
            false,
            false
        );
<<<<<<< HEAD
=======

        $this->registerMockObject($mockObject);

        return $mockObject;
>>>>>>> dev
    }

    /**
     * Returns a mock object for the specified trait with all abstract methods
     * of the trait mocked. Concrete methods to mock can be specified with the
     * `$mockedMethods` parameter.
     *
     * @param string $traitName
     * @param array  $arguments
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_MockObject
     *
     * @since  Method available since Release 4.0.0
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function getMockForTrait($traitName, array $arguments = array(), $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = array(), $cloneArguments = false)
=======
     * @return MockObject
     *
     * @throws Exception
     */
    protected function getMockForTrait($traitName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = false)
>>>>>>> dev
    {
        $mockObject = $this->getMockObjectGenerator()->getMockForTrait(
            $traitName,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $mockedMethods,
            $cloneArguments
        );

<<<<<<< HEAD
        $this->mockObjects[] = $mockObject;
=======
        $this->registerMockObject($mockObject);
>>>>>>> dev

        return $mockObject;
    }

    /**
     * Returns an object for the specified trait.
     *
     * @param string $traitName
     * @param array  $arguments
     * @param string $traitClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
<<<<<<< HEAD
     * @param bool   $cloneArguments
     *
     * @return object
     *
     * @since  Method available since Release 3.6.0
     *
     * @throws PHPUnit_Framework_Exception
     */
    protected function getObjectForTrait($traitName, array $arguments = array(), $traitClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false)
=======
     *
     * @return object
     *
     * @throws Exception
     */
    protected function getObjectForTrait($traitName, array $arguments = [], $traitClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true)
>>>>>>> dev
    {
        return $this->getMockObjectGenerator()->getObjectForTrait(
            $traitName,
            $arguments,
            $traitClassName,
            $callOriginalConstructor,
            $callOriginalClone,
<<<<<<< HEAD
            $callAutoload,
            $cloneArguments
=======
            $callAutoload
>>>>>>> dev
        );
    }

    /**
     * @param string|null $classOrInterface
     *
     * @return \Prophecy\Prophecy\ObjectProphecy
     *
     * @throws \LogicException
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.5.0
=======
>>>>>>> dev
     */
    protected function prophesize($classOrInterface = null)
    {
        return $this->getProphet()->prophesize($classOrInterface);
    }

    /**
     * Adds a value to the assertion counter.
     *
     * @param int $count
<<<<<<< HEAD
     *
     * @since Method available since Release 3.3.3
=======
>>>>>>> dev
     */
    public function addToAssertionCount($count)
    {
        $this->numAssertions += $count;
    }

    /**
     * Returns the number of assertions performed by this test.
     *
     * @return int
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
=======
>>>>>>> dev
     */
    public function getNumAssertions()
    {
        return $this->numAssertions;
    }

    /**
     * Returns a matcher that matches when the method is executed
     * zero or more times.
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount
     *
     * @since  Method available since Release 3.0.0
     */
    public static function any()
    {
        return new PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount;
=======
     * @return AnyInvokedCountMatcher
     */
    public static function any()
    {
        return new AnyInvokedCountMatcher;
>>>>>>> dev
    }

    /**
     * Returns a matcher that matches when the method is never executed.
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
     *
     * @since  Method available since Release 3.0.0
     */
    public static function never()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount(0);
=======
     * @return InvokedCountMatcher
     */
    public static function never()
    {
        return new InvokedCountMatcher(0);
>>>>>>> dev
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at least N times.
     *
     * @param int $requiredInvocations
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastCount
     *
     * @since  Method available since Release 4.2.0
     */
    public static function atLeast($requiredInvocations)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastCount(
=======
     * @return InvokedAtLeastCountMatcher
     */
    public static function atLeast($requiredInvocations)
    {
        return new InvokedAtLeastCountMatcher(
>>>>>>> dev
            $requiredInvocations
        );
    }

    /**
     * Returns a matcher that matches when the method is executed at least once.
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce
     *
     * @since  Method available since Release 3.0.0
     */
    public static function atLeastOnce()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce;
=======
     * @return InvokedAtLeastOnceMatcher
     */
    public static function atLeastOnce()
    {
        return new InvokedAtLeastOnceMatcher;
>>>>>>> dev
    }

    /**
     * Returns a matcher that matches when the method is executed exactly once.
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
     *
     * @since  Method available since Release 3.0.0
     */
    public static function once()
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount(1);
=======
     * @return InvokedCountMatcher
     */
    public static function once()
    {
        return new InvokedCountMatcher(1);
>>>>>>> dev
    }

    /**
     * Returns a matcher that matches when the method is executed
     * exactly $count times.
     *
     * @param int $count
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
     *
     * @since  Method available since Release 3.0.0
     */
    public static function exactly($count)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedCount($count);
=======
     * @return InvokedCountMatcher
     */
    public static function exactly($count)
    {
        return new InvokedCountMatcher($count);
>>>>>>> dev
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at most N times.
     *
     * @param int $allowedInvocations
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtMostCount
     *
     * @since  Method available since Release 4.2.0
     */
    public static function atMost($allowedInvocations)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtMostCount(
            $allowedInvocations
        );
=======
     * @return InvokedAtMostCountMatcher
     */
    public static function atMost($allowedInvocations)
    {
        return new InvokedAtMostCountMatcher($allowedInvocations);
>>>>>>> dev
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at the given index.
     *
     * @param int $index
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex
     *
     * @since  Method available since Release 3.0.0
     */
    public static function at($index)
    {
        return new PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex($index);
=======
     * @return InvokedAtIndexMatcher
     */
    public static function at($index)
    {
        return new InvokedAtIndexMatcher($index);
>>>>>>> dev
    }

    /**
     * @param mixed $value
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Stub_Return
     *
     * @since  Method available since Release 3.0.0
     */
    public static function returnValue($value)
    {
        return new PHPUnit_Framework_MockObject_Stub_Return($value);
=======
     * @return ReturnStub
     */
    public static function returnValue($value)
    {
        return new ReturnStub($value);
>>>>>>> dev
    }

    /**
     * @param array $valueMap
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Stub_ReturnValueMap
     *
     * @since  Method available since Release 3.6.0
     */
    public static function returnValueMap(array $valueMap)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnValueMap($valueMap);
=======
     * @return ReturnValueMapStub
     */
    public static function returnValueMap(array $valueMap)
    {
        return new ReturnValueMapStub($valueMap);
>>>>>>> dev
    }

    /**
     * @param int $argumentIndex
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Stub_ReturnArgument
     *
     * @since  Method available since Release 3.3.0
     */
    public static function returnArgument($argumentIndex)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnArgument(
            $argumentIndex
        );
=======
     * @return ReturnArgumentStub
     */
    public static function returnArgument($argumentIndex)
    {
        return new ReturnArgumentStub($argumentIndex);
>>>>>>> dev
    }

    /**
     * @param mixed $callback
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Stub_ReturnCallback
     *
     * @since  Method available since Release 3.3.0
     */
    public static function returnCallback($callback)
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnCallback($callback);
=======
     * @return ReturnCallbackStub
     */
    public static function returnCallback($callback)
    {
        return new ReturnCallbackStub($callback);
>>>>>>> dev
    }

    /**
     * Returns the current object.
     *
     * This method is useful when mocking a fluent interface.
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Stub_ReturnSelf
     *
     * @since  Method available since Release 3.6.0
     */
    public static function returnSelf()
    {
        return new PHPUnit_Framework_MockObject_Stub_ReturnSelf();
    }

    /**
     * @param Exception $exception
     *
     * @return PHPUnit_Framework_MockObject_Stub_Exception
     *
     * @since  Method available since Release 3.1.0
     */
    public static function throwException(Exception $exception)
    {
        return new PHPUnit_Framework_MockObject_Stub_Exception($exception);
    }

    /**
     * @param mixed $value, ...
     *
     * @return PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls
     *
     * @since  Method available since Release 3.0.0
     */
    public static function onConsecutiveCalls()
    {
        $args = func_get_args();

        return new PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls($args);
=======
     * @return ReturnSelfStub
     */
    public static function returnSelf()
    {
        return new ReturnSelfStub;
    }

    /**
     * @param Throwable $exception
     *
     * @return ExceptionStub
     */
    public static function throwException(Throwable $exception)
    {
        return new ExceptionStub($exception);
    }

    /**
     * @param mixed $value , ...
     *
     * @return ConsecutiveCallsStub
     */
    public static function onConsecutiveCalls()
    {
        $args = \func_get_args();

        return new ConsecutiveCallsStub($args);
    }

    /**
     * @return bool
     */
    public function usesDataProvider()
    {
        return !empty($this->data);
    }

    /**
     * @return string
     */
    public function dataDescription()
    {
        return \is_string($this->dataName) ? $this->dataName : '';
    }

    /**
     * @return int|string
     */
    public function dataName()
    {
        return $this->dataName;
    }

    public function registerComparator(Comparator $comparator)
    {
        ComparatorFactory::getInstance()->register($comparator);

        $this->customComparators[] = $comparator;
>>>>>>> dev
    }

    /**
     * Gets the data set description of a TestCase.
     *
     * @param bool $includeData
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
     */
    protected function getDataSetAsString($includeData = true)
=======
     */
    public function getDataSetAsString($includeData = true)
>>>>>>> dev
    {
        $buffer = '';

        if (!empty($this->data)) {
<<<<<<< HEAD
            if (is_int($this->dataName)) {
                $buffer .= sprintf(' with data set #%d', $this->dataName);
            } else {
                $buffer .= sprintf(' with data set "%s"', $this->dataName);
=======
            if (\is_int($this->dataName)) {
                $buffer .= \sprintf(' with data set #%d', $this->dataName);
            } else {
                $buffer .= \sprintf(' with data set "%s"', $this->dataName);
>>>>>>> dev
            }

            $exporter = new Exporter;

            if ($includeData) {
<<<<<<< HEAD
                $buffer .= sprintf(' (%s)', $exporter->shortenedRecursiveExport($this->data));
=======
                $buffer .= \sprintf(' (%s)', $exporter->shortenedRecursiveExport($this->data));
>>>>>>> dev
            }
        }

        return $buffer;
    }

    /**
<<<<<<< HEAD
     * Creates a default TestResult object.
     *
     * @return PHPUnit_Framework_TestResult
     */
    protected function createResult()
    {
        return new PHPUnit_Framework_TestResult;
    }

    /**
     * @since Method available since Release 3.5.4
     */
    protected function handleDependencies()
    {
        if (!empty($this->dependencies) && !$this->inIsolation) {
            $className  = get_class($this);
            $passed     = $this->result->passed();
            $passedKeys = array_keys($passed);
            $numKeys    = count($passedKeys);

            for ($i = 0; $i < $numKeys; $i++) {
                $pos = strpos($passedKeys[$i], ' with data set');

                if ($pos !== false) {
                    $passedKeys[$i] = substr($passedKeys[$i], 0, $pos);
                }
            }

            $passedKeys = array_flip(array_unique($passedKeys));

            foreach ($this->dependencies as $dependency) {
                if (strpos($dependency, '::') === false) {
=======
     * Gets the data set of a TestCase.
     *
     * @return array
     */
    protected function getProvidedData()
    {
        return $this->data;
    }

    /**
     * Creates a default TestResult object.
     *
     * @return TestResult
     */
    protected function createResult()
    {
        return new TestResult;
    }

    protected function handleDependencies()
    {
        if (!empty($this->dependencies) && !$this->inIsolation) {
            $className  = \get_class($this);
            $passed     = $this->result->passed();
            $passedKeys = \array_keys($passed);
            $numKeys    = \count($passedKeys);

            for ($i = 0; $i < $numKeys; $i++) {
                $pos = \strpos($passedKeys[$i], ' with data set');

                if ($pos !== false) {
                    $passedKeys[$i] = \substr($passedKeys[$i], 0, $pos);
                }
            }

            $passedKeys = \array_flip(\array_unique($passedKeys));

            foreach ($this->dependencies as $dependency) {
                $deepClone    = false;
                $shallowClone = false;

                if (\strpos($dependency, 'clone ') === 0) {
                    $deepClone  = true;
                    $dependency = \substr($dependency, \strlen('clone '));
                } elseif (\strpos($dependency, '!clone ') === 0) {
                    $deepClone  = false;
                    $dependency = \substr($dependency, \strlen('!clone '));
                }

                if (\strpos($dependency, 'shallowClone ') === 0) {
                    $shallowClone = true;
                    $dependency   = \substr($dependency, \strlen('shallowClone '));
                } elseif (\strpos($dependency, '!shallowClone ') === 0) {
                    $shallowClone = false;
                    $dependency   = \substr($dependency, \strlen('!shallowClone '));
                }

                if (\strpos($dependency, '::') === false) {
>>>>>>> dev
                    $dependency = $className . '::' . $dependency;
                }

                if (!isset($passedKeys[$dependency])) {
<<<<<<< HEAD
                    $this->result->addError(
                        $this,
                        new PHPUnit_Framework_SkippedTestError(
                            sprintf(
=======
                    $this->result->startTest($this);
                    $this->result->addError(
                        $this,
                        new SkippedTestError(
                            \sprintf(
>>>>>>> dev
                                'This test depends on "%s" to pass.',
                                $dependency
                            )
                        ),
                        0
                    );
<<<<<<< HEAD
=======
                    $this->result->endTest($this, 0);
>>>>>>> dev

                    return false;
                }

                if (isset($passed[$dependency])) {
<<<<<<< HEAD
                    if ($passed[$dependency]['size'] != PHPUnit_Util_Test::UNKNOWN &&
                        $this->getSize() != PHPUnit_Util_Test::UNKNOWN &&
                        $passed[$dependency]['size'] > $this->getSize()) {
                        $this->result->addError(
                            $this,
                            new PHPUnit_Framework_SkippedTestError(
=======
                    if ($passed[$dependency]['size'] != \PHPUnit\Util\Test::UNKNOWN &&
                        $this->getSize() != \PHPUnit\Util\Test::UNKNOWN &&
                        $passed[$dependency]['size'] > $this->getSize()) {
                        $this->result->addError(
                            $this,
                            new SkippedTestError(
>>>>>>> dev
                                'This test depends on a test that is larger than itself.'
                            ),
                            0
                        );

                        return false;
                    }

<<<<<<< HEAD
                    $this->dependencyInput[$dependency] = $passed[$dependency]['result'];
=======
                    if ($deepClone) {
                        $deepCopy = new DeepCopy;
                        $deepCopy->skipUncloneable(false);

                        $this->dependencyInput[$dependency] = $deepCopy->copy($passed[$dependency]['result']);
                    } elseif ($shallowClone) {
                        $this->dependencyInput[$dependency] = clone $passed[$dependency]['result'];
                    } else {
                        $this->dependencyInput[$dependency] = $passed[$dependency]['result'];
                    }
>>>>>>> dev
                } else {
                    $this->dependencyInput[$dependency] = null;
                }
            }
        }

        return true;
    }

    /**
     * This method is called before the first test of this test class is run.
<<<<<<< HEAD
     *
     * @since Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public static function setUpBeforeClass()
    {
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called before the execution of a test starts
     * and after setUp() is called.
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.2.8
=======
>>>>>>> dev
     */
    protected function assertPreConditions()
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
<<<<<<< HEAD
     * This method is called before the execution of a test ends
     * and before tearDown() is called.
     *
     * @since  Method available since Release 3.2.8
=======
     * This method is called after the execution of a test ends
     * and before tearDown() is called.
>>>>>>> dev
     */
    protected function assertPostConditions()
    {
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * This method is called after the last test of this test class is run.
<<<<<<< HEAD
     *
     * @since Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public static function tearDownAfterClass()
    {
    }

    /**
     * This method is called when a test method did not execute successfully.
     *
<<<<<<< HEAD
     * @param Exception $e
     *
     * @since Method available since Release 3.4.0
     *
     * @throws Exception
     */
    protected function onNotSuccessfulTest(Exception $e)
    {
        throw $e;
=======
     * @param Throwable $t
     *
     * @throws Throwable
     */
    protected function onNotSuccessfulTest(Throwable $t)
    {
        throw $t;
>>>>>>> dev
    }

    /**
     * Performs custom preparations on the process isolation template.
     *
     * @param Text_Template $template
<<<<<<< HEAD
     *
     * @since Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    protected function prepareTemplate(Text_Template $template)
    {
    }

    /**
     * Get the mock object generator, creating it if it doesn't exist.
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_MockObject_Generator
     */
    protected function getMockObjectGenerator()
    {
        if (null === $this->mockObjectGenerator) {
            $this->mockObjectGenerator = new PHPUnit_Framework_MockObject_Generator;
=======
     * @return MockGenerator
     */
    private function getMockObjectGenerator()
    {
        if (null === $this->mockObjectGenerator) {
            $this->mockObjectGenerator = new MockGenerator;
>>>>>>> dev
        }

        return $this->mockObjectGenerator;
    }

<<<<<<< HEAD
    /**
     * @since Method available since Release 4.2.0
     */
    private function startOutputBuffering()
    {
        while (!defined('PHPUNIT_TESTSUITE') && ob_get_level() > 0) {
            ob_end_clean();
        }

        ob_start();

        $this->outputBufferingActive = true;
        $this->outputBufferingLevel  = ob_get_level();
    }

    /**
     * @since Method available since Release 4.2.0
     */
    private function stopOutputBuffering()
    {
        if (ob_get_level() != $this->outputBufferingLevel) {
            while (ob_get_level() > 0) {
                ob_end_clean();
            }

            throw new PHPUnit_Framework_RiskyTestError(
=======
    private function startOutputBuffering()
    {
        \ob_start();

        $this->outputBufferingActive = true;
        $this->outputBufferingLevel  = \ob_get_level();
    }

    private function stopOutputBuffering()
    {
        if (\ob_get_level() != $this->outputBufferingLevel) {
            while (\ob_get_level() >= $this->outputBufferingLevel) {
                \ob_end_clean();
            }

            throw new RiskyTestError(
>>>>>>> dev
                'Test code or tested code did not (only) close its own output buffers'
            );
        }

<<<<<<< HEAD
        $output = ob_get_contents();
=======
        $output = \ob_get_contents();
>>>>>>> dev

        if ($this->outputCallback === false) {
            $this->output = $output;
        } else {
<<<<<<< HEAD
            $this->output = call_user_func_array(
                $this->outputCallback,
                array($output)
            );
        }

        ob_end_clean();

        $this->outputBufferingActive = false;
        $this->outputBufferingLevel  = ob_get_level();
=======
            $this->output = \call_user_func_array(
                $this->outputCallback,
                [$output]
            );
        }

        \ob_end_clean();

        $this->outputBufferingActive = false;
        $this->outputBufferingLevel  = \ob_get_level();
>>>>>>> dev
    }

    private function snapshotGlobalState()
    {
<<<<<<< HEAD
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals === true;

        if ($this->runTestInSeparateProcess || $this->inIsolation ||
            (!$backupGlobals && !$this->backupStaticAttributes)) {
            return;
        }

        $this->snapshot = $this->createGlobalStateSnapshot($backupGlobals);
=======
        if ($this->runTestInSeparateProcess ||
            $this->inIsolation ||
            (!$this->backupGlobals === true && !$this->backupStaticAttributes)) {
            return;
        }

        $this->snapshot = $this->createGlobalStateSnapshot($this->backupGlobals === true);
>>>>>>> dev
    }

    private function restoreGlobalState()
    {
        if (!$this->snapshot instanceof Snapshot) {
            return;
        }

<<<<<<< HEAD
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals === true;

        if ($this->disallowChangesToGlobalState) {
            try {
                $this->compareGlobalStateSnapshots(
                    $this->snapshot,
                    $this->createGlobalStateSnapshot($backupGlobals)
                );
            } catch (PHPUnit_Framework_RiskyTestError $rte) {
=======
        if ($this->beStrictAboutChangesToGlobalState) {
            try {
                $this->compareGlobalStateSnapshots(
                    $this->snapshot,
                    $this->createGlobalStateSnapshot($this->backupGlobals === true)
                );
            } catch (RiskyTestError $rte) {
>>>>>>> dev
                // Intentionally left empty
            }
        }

        $restorer = new Restorer;

<<<<<<< HEAD
        if ($backupGlobals) {
=======
        if ($this->backupGlobals === true) {
>>>>>>> dev
            $restorer->restoreGlobalVariables($this->snapshot);
        }

        if ($this->backupStaticAttributes) {
            $restorer->restoreStaticAttributes($this->snapshot);
        }

        $this->snapshot = null;

        if (isset($rte)) {
            throw $rte;
        }
    }

    /**
     * @param bool $backupGlobals
     *
     * @return Snapshot
     */
    private function createGlobalStateSnapshot($backupGlobals)
    {
        $blacklist = new Blacklist;

        foreach ($this->backupGlobalsBlacklist as $globalVariable) {
            $blacklist->addGlobalVariable($globalVariable);
        }

<<<<<<< HEAD
        if (!defined('PHPUNIT_TESTSUITE')) {
            $blacklist->addClassNamePrefix('PHPUnit');
            $blacklist->addClassNamePrefix('File_Iterator');
            $blacklist->addClassNamePrefix('PHP_CodeCoverage');
=======
        if (!\defined('PHPUNIT_TESTSUITE')) {
            $blacklist->addClassNamePrefix('PHPUnit');
            $blacklist->addClassNamePrefix('File_Iterator');
            $blacklist->addClassNamePrefix('SebastianBergmann\CodeCoverage');
>>>>>>> dev
            $blacklist->addClassNamePrefix('PHP_Invoker');
            $blacklist->addClassNamePrefix('PHP_Timer');
            $blacklist->addClassNamePrefix('PHP_Token');
            $blacklist->addClassNamePrefix('Symfony');
            $blacklist->addClassNamePrefix('Text_Template');
            $blacklist->addClassNamePrefix('Doctrine\Instantiator');
<<<<<<< HEAD
=======
            $blacklist->addClassNamePrefix('Prophecy');
>>>>>>> dev

            foreach ($this->backupStaticAttributesBlacklist as $class => $attributes) {
                foreach ($attributes as $attribute) {
                    $blacklist->addStaticAttribute($class, $attribute);
                }
            }
        }

        return new Snapshot(
            $blacklist,
            $backupGlobals,
<<<<<<< HEAD
            $this->backupStaticAttributes,
=======
            (bool) $this->backupStaticAttributes,
>>>>>>> dev
            false,
            false,
            false,
            false,
            false,
            false,
            false
        );
    }

    /**
     * @param Snapshot $before
     * @param Snapshot $after
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_RiskyTestError
=======
     * @throws RiskyTestError
>>>>>>> dev
     */
    private function compareGlobalStateSnapshots(Snapshot $before, Snapshot $after)
    {
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals === true;

        if ($backupGlobals) {
            $this->compareGlobalStateSnapshotPart(
                $before->globalVariables(),
                $after->globalVariables(),
                "--- Global variables before the test\n+++ Global variables after the test\n"
            );

            $this->compareGlobalStateSnapshotPart(
                $before->superGlobalVariables(),
                $after->superGlobalVariables(),
                "--- Super-global variables before the test\n+++ Super-global variables after the test\n"
            );
        }

        if ($this->backupStaticAttributes) {
            $this->compareGlobalStateSnapshotPart(
                $before->staticAttributes(),
                $after->staticAttributes(),
                "--- Static attributes before the test\n+++ Static attributes after the test\n"
            );
        }
    }

    /**
     * @param array  $before
     * @param array  $after
     * @param string $header
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_RiskyTestError
=======
     * @throws RiskyTestError
>>>>>>> dev
     */
    private function compareGlobalStateSnapshotPart(array $before, array $after, $header)
    {
        if ($before != $after) {
            $differ   = new Differ($header);
            $exporter = new Exporter;

            $diff = $differ->diff(
                $exporter->export($before),
                $exporter->export($after)
            );

<<<<<<< HEAD
            throw new PHPUnit_Framework_RiskyTestError(
=======
            throw new RiskyTestError(
>>>>>>> dev
                $diff
            );
        }
    }

    /**
     * @return Prophecy\Prophet
<<<<<<< HEAD
     *
     * @since Method available since Release 4.5.0
=======
>>>>>>> dev
     */
    private function getProphet()
    {
        if ($this->prophet === null) {
            $this->prophet = new Prophet;
        }

        return $this->prophet;
    }
<<<<<<< HEAD
=======

    /**
     * @param MockObject $mock
     *
     * @return bool
     */
    private function shouldInvocationMockerBeReset(MockObject $mock)
    {
        $enumerator = new Enumerator;

        foreach ($enumerator->enumerate($this->dependencyInput) as $object) {
            if ($mock === $object) {
                return false;
            }
        }

        if (!\is_array($this->testResult) && !\is_object($this->testResult)) {
            return true;
        }

        foreach ($enumerator->enumerate($this->testResult) as $object) {
            if ($mock === $object) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $testArguments
     * @param array $visited
     */
    private function registerMockObjectsFromTestArguments(array $testArguments, array &$visited = [])
    {
        if ($this->registerMockObjectsFromTestArgumentsRecursively) {
            $enumerator = new Enumerator;

            foreach ($enumerator->enumerate($testArguments) as $object) {
                if ($object instanceof MockObject) {
                    $this->registerMockObject($object);
                }
            }
        } else {
            foreach ($testArguments as $testArgument) {
                if ($testArgument instanceof MockObject) {
                    if ($this->isCloneable($testArgument)) {
                        $testArgument = clone $testArgument;
                    }

                    $this->registerMockObject($testArgument);
                } elseif (\is_array($testArgument) && !\in_array($testArgument, $visited, true)) {
                    $visited[] = $testArgument;

                    $this->registerMockObjectsFromTestArguments(
                        $testArgument,
                        $visited
                    );
                }
            }
        }
    }

    private function setDoesNotPerformAssertionsFromAnnotation()
    {
        $annotations = $this->getAnnotations();

        if (isset($annotations['method']['doesNotPerformAssertions'])) {
            $this->doesNotPerformAssertions = true;
        }
    }

    /**
     * @param MockObject $testArgument
     *
     * @return bool
     */
    private function isCloneable(MockObject $testArgument)
    {
        $reflector = new ReflectionObject($testArgument);

        if (!$reflector->isCloneable()) {
            return false;
        }

        if ($reflector->hasMethod('__clone') &&
            $reflector->getMethod('__clone')->isPublic()) {
            return true;
        }

        return false;
    }

    private function unregisterCustomComparators()
    {
        $factory = ComparatorFactory::getInstance();

        foreach ($this->customComparators as $comparator) {
            $factory->unregister($comparator);
        }

        $this->customComparators = [];
    }

    private function cleanupIniSettings()
    {
        foreach ($this->iniSettings as $varName => $oldValue) {
            \ini_set($varName, $oldValue);
        }

        $this->iniSettings = [];
    }

    private function cleanupLocaleSettings()
    {
        foreach ($this->locale as $category => $locale) {
            \setlocale($category, $locale);
        }

        $this->locale = [];
    }

    private function checkExceptionExpectations(Throwable $throwable): bool
    {
        $result = false;

        if ($this->expectedException !== null || $this->expectedExceptionCode !== null || $this->expectedExceptionMessage !== null || $this->expectedExceptionMessageRegExp !== null) {
            $result = true;
        }

        if ($throwable instanceof Exception) {
            $result = false;
        }

        if (\is_string($this->expectedException)) {
            $reflector = new ReflectionClass($this->expectedException);

            if ($this->expectedException === 'PHPUnit\Framework\Exception' ||
                $this->expectedException === '\PHPUnit\Framework\Exception' ||
                $reflector->isSubclassOf('PHPUnit\Framework\Exception')) {
                $result = true;
            }
        }

        return $result;
    }
>>>>>>> dev
}
