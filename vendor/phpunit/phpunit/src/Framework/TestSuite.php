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
 * A TestSuite is a composite of Tests. It runs a collection of test cases.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Framework_TestSuite implements PHPUnit_Framework_Test, PHPUnit_Framework_SelfDescribing, IteratorAggregate
=======
namespace PHPUnit\Framework;

use Iterator;
use IteratorAggregate;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\Filter\Factory;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Fileloader;
use PHPUnit\Util\InvalidArgumentHelper;
use ReflectionClass;
use ReflectionMethod;
use Throwable;

/**
 * A TestSuite is a composite of Tests. It runs a collection of test cases.
 */
class TestSuite implements Test, SelfDescribing, IteratorAggregate
>>>>>>> dev
{
    /**
     * Last count of tests in this suite.
     *
     * @var int|null
     */
    private $cachedNumTests;

    /**
     * Enable or disable the backup and restoration of the $GLOBALS array.
     *
     * @var bool
     */
<<<<<<< HEAD
    protected $backupGlobals = null;
=======
    protected $backupGlobals;
>>>>>>> dev

    /**
     * Enable or disable the backup and restoration of static attributes.
     *
     * @var bool
     */
<<<<<<< HEAD
    protected $backupStaticAttributes = null;
=======
    protected $backupStaticAttributes;
>>>>>>> dev

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $disallowChangesToGlobalState = null;
=======
    private $beStrictAboutChangesToGlobalState;
>>>>>>> dev

    /**
     * @var bool
     */
    protected $runTestInSeparateProcess = false;

    /**
     * The name of the test suite.
     *
     * @var string
     */
    protected $name = '';

    /**
     * The test groups of the test suite.
     *
     * @var array
     */
<<<<<<< HEAD
    protected $groups = array();
=======
    protected $groups = [];
>>>>>>> dev

    /**
     * The tests in the test suite.
     *
<<<<<<< HEAD
     * @var array
     */
    protected $tests = array();
=======
     * @var TestCase[]
     */
    protected $tests = [];
>>>>>>> dev

    /**
     * The number of tests in the test suite.
     *
     * @var int
     */
    protected $numTests = -1;

    /**
     * @var bool
     */
    protected $testCase = false;

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $foundClasses = array();

    /**
     * @var PHPUnit_Runner_Filter_Factory
     */
    private $iteratorFilter = null;
=======
    protected $foundClasses = [];

    /**
     * @var Factory
     */
    private $iteratorFilter;

    /**
     * @var string[]
     */
    private $declaredClasses;
>>>>>>> dev

    /**
     * Constructs a new TestSuite:
     *
<<<<<<< HEAD
     *   - PHPUnit_Framework_TestSuite() constructs an empty TestSuite.
     *
     *   - PHPUnit_Framework_TestSuite(ReflectionClass) constructs a
     *     TestSuite from the given class.
     *
     *   - PHPUnit_Framework_TestSuite(ReflectionClass, String)
     *     constructs a TestSuite from the given class with the given
     *     name.
     *
     *   - PHPUnit_Framework_TestSuite(String) either constructs a
=======
     *   - PHPUnit\Framework\TestSuite() constructs an empty TestSuite.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass) constructs a
     *     TestSuite from the given class.
     *
     *   - PHPUnit\Framework\TestSuite(ReflectionClass, String)
     *     constructs a TestSuite from the given class with the given
     *     name.
     *
     *   - PHPUnit\Framework\TestSuite(String) either constructs a
>>>>>>> dev
     *     TestSuite from the given class (if the passed string is the
     *     name of an existing class) or constructs an empty TestSuite
     *     with the given name.
     *
     * @param mixed  $theClass
     * @param string $name
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct($theClass = '', $name = '')
    {
        $argumentsValid = false;

        if (is_object($theClass) &&
            $theClass instanceof ReflectionClass) {
            $argumentsValid = true;
        } elseif (is_string($theClass) &&
                 $theClass !== '' &&
                 class_exists($theClass, false)) {
=======
     * @throws Exception
     */
    public function __construct($theClass = '', $name = '')
    {
        $this->declaredClasses = \get_declared_classes();

        $argumentsValid = false;

        if (\is_object($theClass) &&
            $theClass instanceof ReflectionClass) {
            $argumentsValid = true;
        } elseif (\is_string($theClass) &&
            $theClass !== '' &&
            \class_exists($theClass, false)) {
>>>>>>> dev
            $argumentsValid = true;

            if ($name == '') {
                $name = $theClass;
            }

            $theClass = new ReflectionClass($theClass);
<<<<<<< HEAD
        } elseif (is_string($theClass)) {
=======
        } elseif (\is_string($theClass)) {
>>>>>>> dev
            $this->setName($theClass);

            return;
        }

        if (!$argumentsValid) {
<<<<<<< HEAD
            throw new PHPUnit_Framework_Exception;
        }

        if (!$theClass->isSubclassOf('PHPUnit_Framework_TestCase')) {
            throw new PHPUnit_Framework_Exception(
                'Class "' . $theClass->name . '" does not extend PHPUnit_Framework_TestCase.'
=======
            throw new Exception;
        }

        if (!$theClass->isSubclassOf(TestCase::class)) {
            throw new Exception(
                'Class "' . $theClass->name . '" does not extend PHPUnit\Framework\TestCase.'
>>>>>>> dev
            );
        }

        if ($name != '') {
            $this->setName($name);
        } else {
            $this->setName($theClass->getName());
        }

        $constructor = $theClass->getConstructor();

        if ($constructor !== null &&
            !$constructor->isPublic()) {
            $this->addTest(
                self::warning(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> dev
                        'Class "%s" has no public constructor.',
                        $theClass->getName()
                    )
                )
            );

            return;
        }

        foreach ($theClass->getMethods() as $method) {
            $this->addTestMethod($theClass, $method);
        }

        if (empty($this->tests)) {
            $this->addTest(
                self::warning(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> dev
                        'No tests found in class "%s".',
                        $theClass->getName()
                    )
                )
            );
        }

        $this->testCase = true;
    }

    /**
     * Returns a string representation of the test suite.
     *
     * @return string
     */
    public function toString()
    {
        return $this->getName();
    }

    /**
     * Adds a test to the suite.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test $test
     * @param array                  $groups
     */
    public function addTest(PHPUnit_Framework_Test $test, $groups = array())
=======
     * @param Test  $test
     * @param array $groups
     */
    public function addTest(Test $test, $groups = [])
>>>>>>> dev
    {
        $class = new ReflectionClass($test);

        if (!$class->isAbstract()) {
            $this->tests[]  = $test;
            $this->numTests = -1;

<<<<<<< HEAD
            if ($test instanceof self &&
                empty($groups)) {
=======
            if ($test instanceof self && empty($groups)) {
>>>>>>> dev
                $groups = $test->getGroups();
            }

            if (empty($groups)) {
<<<<<<< HEAD
                $groups = array('default');
=======
                $groups = ['default'];
>>>>>>> dev
            }

            foreach ($groups as $group) {
                if (!isset($this->groups[$group])) {
<<<<<<< HEAD
                    $this->groups[$group] = array($test);
=======
                    $this->groups[$group] = [$test];
>>>>>>> dev
                } else {
                    $this->groups[$group][] = $test;
                }
            }
<<<<<<< HEAD
=======

            if ($test instanceof TestCase) {
                $test->setGroups($groups);
            }
>>>>>>> dev
        }
    }

    /**
     * Adds the tests from the given class to the suite.
     *
     * @param mixed $testClass
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     */
    public function addTestSuite($testClass)
    {
        if (is_string($testClass) && class_exists($testClass)) {
            $testClass = new ReflectionClass($testClass);
        }

        if (!is_object($testClass)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     * @throws Exception
     */
    public function addTestSuite($testClass)
    {
        if (\is_string($testClass) && \class_exists($testClass)) {
            $testClass = new ReflectionClass($testClass);
        }

        if (!\is_object($testClass)) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                1,
                'class name or object'
            );
        }

        if ($testClass instanceof self) {
            $this->addTest($testClass);
        } elseif ($testClass instanceof ReflectionClass) {
            $suiteMethod = false;

<<<<<<< HEAD
            if (!$testClass->isAbstract()) {
                if ($testClass->hasMethod(PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME)) {
                    $method = $testClass->getMethod(
                        PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME
                    );

                    if ($method->isStatic()) {
                        $this->addTest(
                            $method->invoke(null, $testClass->getName())
                        );

                        $suiteMethod = true;
                    }
                }
            }

            if (!$suiteMethod && !$testClass->isAbstract()) {
                $this->addTest(new self($testClass));
            }
        } else {
            throw new PHPUnit_Framework_Exception;
=======
            if (!$testClass->isAbstract() && $testClass->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                $method = $testClass->getMethod(
                    BaseTestRunner::SUITE_METHODNAME
                );

                if ($method->isStatic()) {
                    $this->addTest(
                        $method->invoke(null, $testClass->getName())
                    );

                    $suiteMethod = true;
                }
            }

            if (!$suiteMethod && !$testClass->isAbstract() && $testClass->isSubclassOf(TestCase::class)) {
                $this->addTest(new self($testClass));
            }
        } else {
            throw new Exception;
>>>>>>> dev
        }
    }

    /**
     * Wraps both <code>addTest()</code> and <code>addTestSuite</code>
     * as well as the separate import statements for the user's convenience.
     *
     * If the named file cannot be read or there are no new tests that can be
<<<<<<< HEAD
     * added, a <code>PHPUnit_Framework_Warning</code> will be created instead,
=======
     * added, a <code>PHPUnit\Framework\WarningTestCase</code> will be created instead,
>>>>>>> dev
     * leaving the current test run untouched.
     *
     * @param string $filename
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 2.3.0
     */
    public function addTestFile($filename)
    {
        if (!is_string($filename)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (file_exists($filename) && substr($filename, -5) == '.phpt') {
            $this->addTest(
                new PHPUnit_Extensions_PhptTestCase($filename)
=======
     * @throws Exception
     */
    public function addTestFile($filename)
    {
        if (!\is_string($filename)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (\file_exists($filename) && \substr($filename, -5) == '.phpt') {
            $this->addTest(
                new PhptTestCase($filename)
>>>>>>> dev
            );

            return;
        }

        // The given file may contain further stub classes in addition to the
        // test class itself. Figure out the actual test class.
<<<<<<< HEAD
        $classes    = get_declared_classes();
        $filename   = PHPUnit_Util_Fileloader::checkAndLoad($filename);
        $newClasses = array_diff(get_declared_classes(), $classes);

        // The diff is empty in case a parent class (with test methods) is added
        // AFTER a child class that inherited from it. To account for that case,
        // cumulate all discovered classes, so the parent class may be found in
        // a later invocation.
        if ($newClasses) {
            // On the assumption that test classes are defined first in files,
            // process discovered classes in approximate LIFO order, so as to
            // avoid unnecessary reflection.
            $this->foundClasses = array_merge($newClasses, $this->foundClasses);
=======
        $filename   = Fileloader::checkAndLoad($filename);
        $newClasses = \array_diff(\get_declared_classes(), $this->declaredClasses);

        // The diff is empty in case a parent class (with test methods) is added
        // AFTER a child class that inherited from it. To account for that case,
        // accumulate all discovered classes, so the parent class may be found in
        // a later invocation.
        if (!empty($newClasses)) {
            // On the assumption that test classes are defined first in files,
            // process discovered classes in approximate LIFO order, so as to
            // avoid unnecessary reflection.
            $this->foundClasses    = \array_merge($newClasses, $this->foundClasses);
            $this->declaredClasses = \get_declared_classes();
>>>>>>> dev
        }

        // The test class's name must match the filename, either in full, or as
        // a PEAR/PSR-0 prefixed shortname ('NameSpace_ShortName'), or as a
        // PSR-1 local shortname ('NameSpace\ShortName'). The comparison must be
        // anchored to prevent false-positive matches (e.g., 'OtherShortName').
<<<<<<< HEAD
        $shortname      = basename($filename, '.php');
        $shortnameRegEx = '/(?:^|_|\\\\)' . preg_quote($shortname, '/') . '$/';

        foreach ($this->foundClasses as $i => $className) {
            if (preg_match($shortnameRegEx, $className)) {
                $class = new ReflectionClass($className);

                if ($class->getFileName() == $filename) {
                    $newClasses = array($className);
                    unset($this->foundClasses[$i]);
=======
        $shortname      = \basename($filename, '.php');
        $shortnameRegEx = '/(?:^|_|\\\\)' . \preg_quote($shortname, '/') . '$/';

        foreach ($this->foundClasses as $i => $className) {
            if (\preg_match($shortnameRegEx, $className)) {
                $class = new ReflectionClass($className);

                if ($class->getFileName() == $filename) {
                    $newClasses = [$className];
                    unset($this->foundClasses[$i]);

>>>>>>> dev
                    break;
                }
            }
        }

        foreach ($newClasses as $className) {
            $class = new ReflectionClass($className);

<<<<<<< HEAD
            if (!$class->isAbstract()) {
                if ($class->hasMethod(PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME)) {
                    $method = $class->getMethod(
                        PHPUnit_Runner_BaseTestRunner::SUITE_METHODNAME
=======
            if (\dirname($class->getFileName()) === __DIR__) {
                continue;
            }

            if (!$class->isAbstract()) {
                if ($class->hasMethod(BaseTestRunner::SUITE_METHODNAME)) {
                    $method = $class->getMethod(
                        BaseTestRunner::SUITE_METHODNAME
>>>>>>> dev
                    );

                    if ($method->isStatic()) {
                        $this->addTest($method->invoke(null, $className));
                    }
<<<<<<< HEAD
                } elseif ($class->implementsInterface('PHPUnit_Framework_Test')) {
=======
                } elseif ($class->implementsInterface(Test::class)) {
>>>>>>> dev
                    $this->addTestSuite($class);
                }
            }
        }

        $this->numTests = -1;
    }

    /**
     * Wrapper for addTestFile() that adds multiple test files.
     *
     * @param array|Iterator $filenames
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 2.3.0
     */
    public function addTestFiles($filenames)
    {
        if (!(is_array($filenames) ||
             (is_object($filenames) && $filenames instanceof Iterator))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     * @throws Exception
     */
    public function addTestFiles($filenames)
    {
        if (!(\is_array($filenames) ||
            (\is_object($filenames) && $filenames instanceof Iterator))) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                1,
                'array or iterator'
            );
        }

        foreach ($filenames as $filename) {
            $this->addTestFile((string) $filename);
        }
    }

    /**
     * Counts the number of test cases that will be run by this test.
     *
     * @param bool $preferCache Indicates if cache is preferred.
     *
     * @return int
     */
    public function count($preferCache = false)
    {
<<<<<<< HEAD
        if ($preferCache && $this->cachedNumTests != null) {
            $numTests = $this->cachedNumTests;
        } else {
            $numTests = 0;
            foreach ($this as $test) {
                $numTests += count($test);
            }
            $this->cachedNumTests = $numTests;
        }

=======
        if ($preferCache && $this->cachedNumTests !== null) {
            return $this->cachedNumTests;
        }

        $numTests = 0;

        foreach ($this as $test) {
            $numTests += \count($test);
        }

        $this->cachedNumTests = $numTests;

>>>>>>> dev
        return $numTests;
    }

    /**
     * @param ReflectionClass $theClass
     * @param string          $name
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_Test
     *
     * @throws PHPUnit_Framework_Exception
=======
     * @return Test
     *
     * @throws Exception
>>>>>>> dev
     */
    public static function createTest(ReflectionClass $theClass, $name)
    {
        $className = $theClass->getName();

        if (!$theClass->isInstantiable()) {
            return self::warning(
<<<<<<< HEAD
                sprintf('Cannot instantiate class "%s".', $className)
            );
        }

        $backupSettings = PHPUnit_Util_Test::getBackupSettings(
=======
                \sprintf('Cannot instantiate class "%s".', $className)
            );
        }

        $backupSettings = \PHPUnit\Util\Test::getBackupSettings(
>>>>>>> dev
            $className,
            $name
        );

<<<<<<< HEAD
        $preserveGlobalState = PHPUnit_Util_Test::getPreserveGlobalStateSettings(
=======
        $preserveGlobalState = \PHPUnit\Util\Test::getPreserveGlobalStateSettings(
>>>>>>> dev
            $className,
            $name
        );

<<<<<<< HEAD
        $runTestInSeparateProcess = PHPUnit_Util_Test::getProcessIsolationSettings(
=======
        $runTestInSeparateProcess = \PHPUnit\Util\Test::getProcessIsolationSettings(
            $className,
            $name
        );

        $runClassInSeparateProcess = \PHPUnit\Util\Test::getClassProcessIsolationSettings(
>>>>>>> dev
            $className,
            $name
        );

        $constructor = $theClass->getConstructor();

        if ($constructor !== null) {
            $parameters = $constructor->getParameters();

            // TestCase() or TestCase($name)
<<<<<<< HEAD
            if (count($parameters) < 2) {
=======
            if (\count($parameters) < 2) {
>>>>>>> dev
                $test = new $className;
            } // TestCase($name, $data)
            else {
                try {
<<<<<<< HEAD
                    $data = PHPUnit_Util_Test::getProvidedData(
                        $className,
                        $name
                    );
                } catch (PHPUnit_Framework_IncompleteTestError $e) {
                    $message = sprintf(
=======
                    $data = \PHPUnit\Util\Test::getProvidedData(
                        $className,
                        $name
                    );
                } catch (IncompleteTestError $e) {
                    $message = \sprintf(
>>>>>>> dev
                        'Test for %s::%s marked incomplete by data provider',
                        $className,
                        $name
                    );

                    $_message = $e->getMessage();

                    if (!empty($_message)) {
                        $message .= "\n" . $_message;
                    }

                    $data = self::incompleteTest($className, $name, $message);
<<<<<<< HEAD
                } catch (PHPUnit_Framework_SkippedTestError $e) {
                    $message = sprintf(
=======
                } catch (SkippedTestError $e) {
                    $message = \sprintf(
>>>>>>> dev
                        'Test for %s::%s skipped by data provider',
                        $className,
                        $name
                    );

                    $_message = $e->getMessage();

                    if (!empty($_message)) {
                        $message .= "\n" . $_message;
                    }

                    $data = self::skipTest($className, $name, $message);
                } catch (Throwable $_t) {
                    $t = $_t;
                } catch (Exception $_t) {
                    $t = $_t;
                }

                if (isset($t)) {
<<<<<<< HEAD
                    $message = sprintf(
=======
                    $message = \sprintf(
>>>>>>> dev
                        'The data provider specified for %s::%s is invalid.',
                        $className,
                        $name
                    );

                    $_message = $t->getMessage();

                    if (!empty($_message)) {
                        $message .= "\n" . $_message;
                    }

                    $data = self::warning($message);
                }

                // Test method with @dataProvider.
                if (isset($data)) {
<<<<<<< HEAD
                    $test = new PHPUnit_Framework_TestSuite_DataProvider(
=======
                    $test = new DataProviderTestSuite(
>>>>>>> dev
                        $className . '::' . $name
                    );

                    if (empty($data)) {
                        $data = self::warning(
<<<<<<< HEAD
                            sprintf(
=======
                            \sprintf(
>>>>>>> dev
                                'No tests found in suite "%s".',
                                $test->getName()
                            )
                        );
                    }

<<<<<<< HEAD
                    $groups = PHPUnit_Util_Test::getGroups($className, $name);

                    if ($data instanceof PHPUnit_Framework_Warning ||
                        $data instanceof PHPUnit_Framework_SkippedTestCase ||
                        $data instanceof PHPUnit_Framework_IncompleteTestCase) {
=======
                    $groups = \PHPUnit\Util\Test::getGroups($className, $name);

                    if ($data instanceof WarningTestCase ||
                        $data instanceof SkippedTestCase ||
                        $data instanceof IncompleteTestCase) {
>>>>>>> dev
                        $test->addTest($data, $groups);
                    } else {
                        foreach ($data as $_dataName => $_data) {
                            $_test = new $className($name, $_data, $_dataName);

                            if ($runTestInSeparateProcess) {
                                $_test->setRunTestInSeparateProcess(true);

                                if ($preserveGlobalState !== null) {
                                    $_test->setPreserveGlobalState($preserveGlobalState);
                                }
                            }

<<<<<<< HEAD
=======
                            if ($runClassInSeparateProcess) {
                                $_test->setRunClassInSeparateProcess(true);

                                if ($preserveGlobalState !== null) {
                                    $_test->setPreserveGlobalState($preserveGlobalState);
                                }
                            }

>>>>>>> dev
                            if ($backupSettings['backupGlobals'] !== null) {
                                $_test->setBackupGlobals(
                                    $backupSettings['backupGlobals']
                                );
                            }

                            if ($backupSettings['backupStaticAttributes'] !== null) {
                                $_test->setBackupStaticAttributes(
                                    $backupSettings['backupStaticAttributes']
                                );
                            }

                            $test->addTest($_test, $groups);
                        }
                    }
                } else {
                    $test = new $className;
                }
            }
        }

        if (!isset($test)) {
<<<<<<< HEAD
            throw new PHPUnit_Framework_Exception('No valid test provided.');
        }

        if ($test instanceof PHPUnit_Framework_TestCase) {
=======
            throw new Exception('No valid test provided.');
        }

        if ($test instanceof TestCase) {
>>>>>>> dev
            $test->setName($name);

            if ($runTestInSeparateProcess) {
                $test->setRunTestInSeparateProcess(true);

                if ($preserveGlobalState !== null) {
                    $test->setPreserveGlobalState($preserveGlobalState);
                }
            }

            if ($backupSettings['backupGlobals'] !== null) {
                $test->setBackupGlobals($backupSettings['backupGlobals']);
            }

            if ($backupSettings['backupStaticAttributes'] !== null) {
                $test->setBackupStaticAttributes(
                    $backupSettings['backupStaticAttributes']
                );
            }
        }

        return $test;
    }

    /**
     * Creates a default TestResult object.
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_TestResult
     */
    protected function createResult()
    {
        return new PHPUnit_Framework_TestResult;
=======
     * @return TestResult
     */
    protected function createResult()
    {
        return new TestResult;
>>>>>>> dev
    }

    /**
     * Returns the name of the suite.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the test groups of the suite.
     *
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.2.0
     */
    public function getGroups()
    {
        return array_keys($this->groups);
=======
     */
    public function getGroups()
    {
        return \array_keys($this->groups);
>>>>>>> dev
    }

    public function getGroupDetails()
    {
        return $this->groups;
    }

    /**
     * Set tests groups of the test case
     *
     * @param array $groups
<<<<<<< HEAD
     *
     * @since Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    public function setGroupDetails(array $groups)
    {
        $this->groups = $groups;
    }

    /**
     * Runs the tests and collects their result in a TestResult.
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_TestResult $result
     *
     * @return PHPUnit_Framework_TestResult
     */
    public function run(PHPUnit_Framework_TestResult $result = null)
=======
     * @param TestResult $result
     *
     * @return TestResult
     */
    public function run(TestResult $result = null)
>>>>>>> dev
    {
        if ($result === null) {
            $result = $this->createResult();
        }

<<<<<<< HEAD
        if (count($this) == 0) {
            return $result;
        }

        $hookMethods = PHPUnit_Util_Test::getHookMethods($this->name);
=======
        if (\count($this) == 0) {
            return $result;
        }

        $hookMethods = \PHPUnit\Util\Test::getHookMethods($this->name);
>>>>>>> dev

        $result->startTestSuite($this);

        try {
            $this->setUp();

            foreach ($hookMethods['beforeClass'] as $beforeClassMethod) {
                if ($this->testCase === true &&
<<<<<<< HEAD
                    class_exists($this->name, false) &&
                    method_exists($this->name, $beforeClassMethod)) {
                    if ($missingRequirements = PHPUnit_Util_Test::getMissingRequirements($this->name, $beforeClassMethod)) {
                        $this->markTestSuiteSkipped(implode(PHP_EOL, $missingRequirements));
                    }

                    call_user_func(array($this->name, $beforeClassMethod));
                }
            }
        } catch (PHPUnit_Framework_SkippedTestSuiteError $e) {
            $numTests = count($this);
=======
                    \class_exists($this->name, false) &&
                    \method_exists($this->name, $beforeClassMethod)) {
                    if ($missingRequirements = \PHPUnit\Util\Test::getMissingRequirements($this->name, $beforeClassMethod)) {
                        $this->markTestSuiteSkipped(\implode(PHP_EOL, $missingRequirements));
                    }

                    \call_user_func([$this->name, $beforeClassMethod]);
                }
            }
        } catch (SkippedTestSuiteError $e) {
            $numTests = \count($this);
>>>>>>> dev

            for ($i = 0; $i < $numTests; $i++) {
                $result->startTest($this);
                $result->addFailure($this, $e, 0);
                $result->endTest($this, 0);
            }

            $this->tearDown();
            $result->endTestSuite($this);

            return $result;
        } catch (Throwable $_t) {
            $t = $_t;
        } catch (Exception $_t) {
            $t = $_t;
        }

        if (isset($t)) {
<<<<<<< HEAD
            $numTests = count($this);

            for ($i = 0; $i < $numTests; $i++) {
=======
            $numTests = \count($this);

            for ($i = 0; $i < $numTests; $i++) {
                if ($result->shouldStop()) {
                    break;
                }

>>>>>>> dev
                $result->startTest($this);
                $result->addError($this, $t, 0);
                $result->endTest($this, 0);
            }

            $this->tearDown();
            $result->endTestSuite($this);

            return $result;
        }

        foreach ($this as $test) {
            if ($result->shouldStop()) {
                break;
            }

<<<<<<< HEAD
            if ($test instanceof PHPUnit_Framework_TestCase ||
                $test instanceof self) {
                $test->setDisallowChangesToGlobalState($this->disallowChangesToGlobalState);
=======
            if ($test instanceof TestCase || $test instanceof self) {
                $test->setBeStrictAboutChangesToGlobalState($this->beStrictAboutChangesToGlobalState);
>>>>>>> dev
                $test->setBackupGlobals($this->backupGlobals);
                $test->setBackupStaticAttributes($this->backupStaticAttributes);
                $test->setRunTestInSeparateProcess($this->runTestInSeparateProcess);
            }

            $test->run($result);
        }

        foreach ($hookMethods['afterClass'] as $afterClassMethod) {
<<<<<<< HEAD
            if ($this->testCase === true && class_exists($this->name, false) && method_exists($this->name, $afterClassMethod)) {
                call_user_func(array($this->name, $afterClassMethod));
=======
            if ($this->testCase === true && \class_exists($this->name, false) && \method_exists($this->name, $afterClassMethod)) {
                \call_user_func([$this->name, $afterClassMethod]);
>>>>>>> dev
            }
        }

        $this->tearDown();

        $result->endTestSuite($this);

        return $result;
    }

    /**
     * @param bool $runTestInSeparateProcess
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.7.0
     */
    public function setRunTestInSeparateProcess($runTestInSeparateProcess)
    {
        if (is_bool($runTestInSeparateProcess)) {
            $this->runTestInSeparateProcess = $runTestInSeparateProcess;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
=======
     * @throws Exception
     */
    public function setRunTestInSeparateProcess($runTestInSeparateProcess)
    {
        if (\is_bool($runTestInSeparateProcess)) {
            $this->runTestInSeparateProcess = $runTestInSeparateProcess;
        } else {
            throw InvalidArgumentHelper::factory(1, 'boolean');
>>>>>>> dev
        }
    }

    /**
     * Runs a test.
     *
     * @deprecated
     *
<<<<<<< HEAD
     * @param PHPUnit_Framework_Test       $test
     * @param PHPUnit_Framework_TestResult $result
     */
    public function runTest(PHPUnit_Framework_Test $test, PHPUnit_Framework_TestResult $result)
=======
     * @param Test       $test
     * @param TestResult $result
     */
    public function runTest(Test $test, TestResult $result)
>>>>>>> dev
    {
        $test->run($result);
    }

    /**
     * Sets the name of the suite.
     *
     * @param  string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the test at the given index.
     *
<<<<<<< HEAD
     * @param  int
     *
     * @return PHPUnit_Framework_Test
=======
     * @param  int|false
     *
     * @return Test|false
>>>>>>> dev
     */
    public function testAt($index)
    {
        if (isset($this->tests[$index])) {
            return $this->tests[$index];
<<<<<<< HEAD
        } else {
            return false;
        }
=======
        }

        return false;
>>>>>>> dev
    }

    /**
     * Returns the tests as an enumeration.
     *
     * @return array
     */
    public function tests()
    {
        return $this->tests;
    }

    /**
     * Set tests of the test suite
     *
     * @param array $tests
<<<<<<< HEAD
     *
     * @since Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    public function setTests(array $tests)
    {
        $this->tests = $tests;
    }

    /**
     * Mark the test suite as skipped.
     *
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_SkippedTestSuiteError
     *
     * @since  Method available since Release 3.0.0
     */
    public function markTestSuiteSkipped($message = '')
    {
        throw new PHPUnit_Framework_SkippedTestSuiteError($message);
=======
     * @throws SkippedTestSuiteError
     */
    public function markTestSuiteSkipped($message = '')
    {
        throw new SkippedTestSuiteError($message);
>>>>>>> dev
    }

    /**
     * @param ReflectionClass  $class
     * @param ReflectionMethod $method
     */
    protected function addTestMethod(ReflectionClass $class, ReflectionMethod $method)
    {
        if (!$this->isTestMethod($method)) {
            return;
        }

        $name = $method->getName();

        if (!$method->isPublic()) {
            $this->addTest(
                self::warning(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> dev
                        'Test method "%s" in test class "%s" is not public.',
                        $name,
                        $class->getName()
                    )
                )
            );

            return;
        }

        $test = self::createTest($class, $name);

<<<<<<< HEAD
        if ($test instanceof PHPUnit_Framework_TestCase ||
            $test instanceof PHPUnit_Framework_TestSuite_DataProvider) {
            $test->setDependencies(
                PHPUnit_Util_Test::getDependencies($class->getName(), $name)
=======
        if ($test instanceof TestCase || $test instanceof DataProviderTestSuite) {
            $test->setDependencies(
                \PHPUnit\Util\Test::getDependencies($class->getName(), $name)
>>>>>>> dev
            );
        }

        $this->addTest(
            $test,
<<<<<<< HEAD
            PHPUnit_Util_Test::getGroups($class->getName(), $name)
=======
            \PHPUnit\Util\Test::getGroups($class->getName(), $name)
>>>>>>> dev
        );
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
     */
    public static function isTestMethod(ReflectionMethod $method)
    {
<<<<<<< HEAD
        if (strpos($method->name, 'test') === 0) {
=======
        if (\strpos($method->name, 'test') === 0) {
>>>>>>> dev
            return true;
        }

        // @scenario on TestCase::testMethod()
        // @test     on TestCase::testMethod()
<<<<<<< HEAD
        $doc_comment = $method->getDocComment();

        return strpos($doc_comment, '@test')     !== false ||
               strpos($doc_comment, '@scenario') !== false;
=======
        $docComment = $method->getDocComment();

        return \strpos($docComment, '@test') !== false ||
            \strpos($docComment, '@scenario') !== false;
>>>>>>> dev
    }

    /**
     * @param string $message
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_Warning
     */
    protected static function warning($message)
    {
        return new PHPUnit_Framework_Warning($message);
=======
     * @return WarningTestCase
     */
    protected static function warning($message)
    {
        return new WarningTestCase($message);
>>>>>>> dev
    }

    /**
     * @param string $class
     * @param string $methodName
     * @param string $message
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_SkippedTestCase
     *
     * @since  Method available since Release 4.3.0
     */
    protected static function skipTest($class, $methodName, $message)
    {
        return new PHPUnit_Framework_SkippedTestCase($class, $methodName, $message);
=======
     * @return SkippedTestCase
     */
    protected static function skipTest($class, $methodName, $message)
    {
        return new SkippedTestCase($class, $methodName, $message);
>>>>>>> dev
    }

    /**
     * @param string $class
     * @param string $methodName
     * @param string $message
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_IncompleteTestCase
     *
     * @since  Method available since Release 4.3.0
     */
    protected static function incompleteTest($class, $methodName, $message)
    {
        return new PHPUnit_Framework_IncompleteTestCase($class, $methodName, $message);
    }

    /**
     * @param bool $disallowChangesToGlobalState
     *
     * @since  Method available since Release 4.6.0
     */
    public function setDisallowChangesToGlobalState($disallowChangesToGlobalState)
    {
        if (is_null($this->disallowChangesToGlobalState) && is_bool($disallowChangesToGlobalState)) {
            $this->disallowChangesToGlobalState = $disallowChangesToGlobalState;
=======
     * @return IncompleteTestCase
     */
    protected static function incompleteTest($class, $methodName, $message)
    {
        return new IncompleteTestCase($class, $methodName, $message);
    }

    /**
     * @param bool $beStrictAboutChangesToGlobalState
     */
    public function setBeStrictAboutChangesToGlobalState($beStrictAboutChangesToGlobalState)
    {
        if (null === $this->beStrictAboutChangesToGlobalState && \is_bool($beStrictAboutChangesToGlobalState)) {
            $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
>>>>>>> dev
        }
    }

    /**
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
        if (null === $this->backupStaticAttributes && \is_bool($backupStaticAttributes)) {
>>>>>>> dev
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * Returns an iterator for this test suite.
     *
<<<<<<< HEAD
     * @return RecursiveIteratorIterator
     *
     * @since  Method available since Release 3.1.0
     */
    public function getIterator()
    {
        $iterator = new PHPUnit_Util_TestSuiteIterator($this);
=======
     * @return TestSuiteIterator
     */
    public function getIterator()
    {
        $iterator = new TestSuiteIterator($this);
>>>>>>> dev

        if ($this->iteratorFilter !== null) {
            $iterator = $this->iteratorFilter->factory($iterator, $this);
        }

        return $iterator;
    }

<<<<<<< HEAD
    public function injectFilter(PHPUnit_Runner_Filter_Factory $filter)
=======
    public function injectFilter(Factory $filter)
>>>>>>> dev
    {
        $this->iteratorFilter = $filter;
        foreach ($this as $test) {
            if ($test instanceof self) {
                $test->injectFilter($filter);
            }
        }
    }

    /**
     * Template Method that is called before the tests
     * of this test suite are run.
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
=======
>>>>>>> dev
     */
    protected function setUp()
    {
    }

    /**
     * Template Method that is called after the tests
     * of this test suite have finished running.
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
=======
>>>>>>> dev
     */
    protected function tearDown()
    {
    }
}
