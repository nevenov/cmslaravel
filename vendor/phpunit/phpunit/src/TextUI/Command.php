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
 * A TestRunner for the Command Line Interface (CLI)
 * PHP SAPI Module.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_TextUI_Command
=======
namespace PHPUnit\TextUI;

use File_Iterator_Facade;
use PharIo\Manifest\ApplicationName;
use PharIo\Manifest\Exception as ManifestException;
use PharIo\Manifest\ManifestLoader;
use PharIo\Version\Version as PharIoVersion;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Runner\StandardTestSuiteLoader;
use PHPUnit\Runner\TestSuiteLoader;
use PHPUnit\Runner\Version;
use PHPUnit\Util\Configuration;
use PHPUnit\Util\ConfigurationGenerator;
use PHPUnit\Util\Fileloader;
use PHPUnit\Util\Filesystem;
use PHPUnit\Util\Getopt;
use PHPUnit\Util\Log\TeamCity;
use PHPUnit\Util\Printer;
use PHPUnit\Util\TestDox\TextResultPrinter;
use PHPUnit\Util\TextTestListRenderer;
use PHPUnit\Util\XmlTestListRenderer;
use ReflectionClass;
use SebastianBergmann\CodeCoverage\Report\PHP;
use Throwable;

/**
 * A TestRunner for the Command Line Interface (CLI)
 * PHP SAPI Module.
 */
class Command
>>>>>>> dev
{
    /**
     * @var array
     */
<<<<<<< HEAD
    protected $arguments = array(
        'listGroups'              => false,
        'loader'                  => null,
        'useDefaultConfiguration' => true
    );
=======
    protected $arguments = [
        'listGroups'              => false,
        'listSuites'              => false,
        'listTests'               => false,
        'listTestsXml'            => false,
        'loader'                  => null,
        'useDefaultConfiguration' => true,
        'loadedExtensions'        => [],
        'notLoadedExtensions'     => []
    ];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $options = array();
=======
    protected $options = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $longOptions = array(
        'colors=='             => null,
        'bootstrap='           => null,
        'columns='             => null,
        'configuration='       => null,
        'coverage-clover='     => null,
        'coverage-crap4j='     => null,
        'coverage-html='       => null,
        'coverage-php='        => null,
        'coverage-text=='      => null,
        'coverage-xml='        => null,
        'debug'                => null,
        'exclude-group='       => null,
        'filter='              => null,
        'testsuite='           => null,
        'group='               => null,
        'help'                 => null,
        'include-path='        => null,
        'list-groups'          => null,
        'loader='              => null,
        'log-json='            => null,
        'log-junit='           => null,
        'log-tap='             => null,
        'process-isolation'    => null,
        'repeat='              => null,
        'stderr'               => null,
        'stop-on-error'        => null,
        'stop-on-failure'      => null,
        'stop-on-incomplete'   => null,
        'stop-on-risky'        => null,
        'stop-on-skipped'      => null,
        'report-useless-tests' => null,
        'strict-coverage'      => null,
        'disallow-test-output' => null,
        'enforce-time-limit'   => null,
        'disallow-todo-tests'  => null,
        'strict-global-state'  => null,
        'strict'               => null,
        'tap'                  => null,
        'testdox'              => null,
        'testdox-html='        => null,
        'testdox-text='        => null,
        'test-suffix='         => null,
        'no-configuration'     => null,
        'no-coverage'          => null,
        'no-globals-backup'    => null,
        'printer='             => null,
        'static-backup'        => null,
        'verbose'              => null,
        'version'              => null
    );
=======
    protected $longOptions = [
        'atleast-version='          => null,
        'bootstrap='                => null,
        'check-version'             => null,
        'colors=='                  => null,
        'columns='                  => null,
        'configuration='            => null,
        'coverage-clover='          => null,
        'coverage-crap4j='          => null,
        'coverage-html='            => null,
        'coverage-php='             => null,
        'coverage-text=='           => null,
        'coverage-xml='             => null,
        'debug'                     => null,
        'disallow-test-output'      => null,
        'disallow-resource-usage'   => null,
        'disallow-todo-tests'       => null,
        'enforce-time-limit'        => null,
        'exclude-group='            => null,
        'filter='                   => null,
        'generate-configuration'    => null,
        'globals-backup'            => null,
        'group='                    => null,
        'help'                      => null,
        'include-path='             => null,
        'list-groups'               => null,
        'list-suites'               => null,
        'list-tests'                => null,
        'list-tests-xml='           => null,
        'loader='                   => null,
        'log-junit='                => null,
        'log-teamcity='             => null,
        'no-configuration'          => null,
        'no-coverage'               => null,
        'no-logging'                => null,
        'no-extensions'             => null,
        'printer='                  => null,
        'process-isolation'         => null,
        'repeat='                   => null,
        'dont-report-useless-tests' => null,
        'reverse-list'              => null,
        'static-backup'             => null,
        'stderr'                    => null,
        'stop-on-error'             => null,
        'stop-on-failure'           => null,
        'stop-on-warning'           => null,
        'stop-on-incomplete'        => null,
        'stop-on-risky'             => null,
        'stop-on-skipped'           => null,
        'fail-on-warning'           => null,
        'fail-on-risky'             => null,
        'strict-coverage'           => null,
        'disable-coverage-ignore'   => null,
        'strict-global-state'       => null,
        'teamcity'                  => null,
        'testdox'                   => null,
        'testdox-group='            => null,
        'testdox-exclude-group='    => null,
        'testdox-html='             => null,
        'testdox-text='             => null,
        'testdox-xml='              => null,
        'test-suffix='              => null,
        'testsuite='                => null,
        'verbose'                   => null,
        'version'                   => null,
        'whitelist='                => null
    ];
>>>>>>> dev

    /**
     * @var bool
     */
    private $versionStringPrinted = false;

    /**
     * @param bool $exit
     */
    public static function main($exit = true)
    {
        $command = new static;

        return $command->run($_SERVER['argv'], $exit);
    }

    /**
     * @param array $argv
     * @param bool  $exit
     *
     * @return int
     */
    public function run(array $argv, $exit = true)
    {
        $this->handleArguments($argv);

        $runner = $this->createRunner();

<<<<<<< HEAD
        if (is_object($this->arguments['test']) &&
            $this->arguments['test'] instanceof PHPUnit_Framework_Test) {
=======
        if ($this->arguments['test'] instanceof Test) {
>>>>>>> dev
            $suite = $this->arguments['test'];
        } else {
            $suite = $runner->getTest(
                $this->arguments['test'],
                $this->arguments['testFile'],
                $this->arguments['testSuffixes']
            );
        }

        if ($this->arguments['listGroups']) {
<<<<<<< HEAD
            $this->printVersionString();

            print "Available test group(s):\n";

            $groups = $suite->getGroups();
            sort($groups);

            foreach ($groups as $group) {
                print " - $group\n";
            }

            if ($exit) {
                exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
            } else {
                return PHPUnit_TextUI_TestRunner::SUCCESS_EXIT;
            }
        }

        unset($this->arguments['test']);
        unset($this->arguments['testFile']);

        try {
            $result = $runner->doRun($suite, $this->arguments);
        } catch (PHPUnit_Framework_Exception $e) {
            print $e->getMessage() . "\n";
        }

        $ret = PHPUnit_TextUI_TestRunner::FAILURE_EXIT;

        if (isset($result) && $result->wasSuccessful()) {
            $ret = PHPUnit_TextUI_TestRunner::SUCCESS_EXIT;
        } elseif (!isset($result) || $result->errorCount() > 0) {
            $ret = PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT;
        }

        if ($exit) {
            exit($ret);
        } else {
            return $ret;
        }
=======
            return $this->handleListGroups($suite, $exit);
        }

        if ($this->arguments['listSuites']) {
            return $this->handleListSuites($exit);
        }

        if ($this->arguments['listTests']) {
            return $this->handleListTests($suite, $exit);
        }

        if ($this->arguments['listTestsXml']) {
            return $this->handleListTestsXml($suite, $this->arguments['listTestsXml'], $exit);
        }

        unset(
            $this->arguments['test'],
            $this->arguments['testFile']
        );

        try {
            $result = $runner->doRun($suite, $this->arguments, $exit);
        } catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
        }

        $return = TestRunner::FAILURE_EXIT;

        if (isset($result) && $result->wasSuccessful()) {
            $return = TestRunner::SUCCESS_EXIT;
        } elseif (!isset($result) || $result->errorCount() > 0) {
            $return = TestRunner::EXCEPTION_EXIT;
        }

        if ($exit) {
            exit($return);
        }

        return $return;
>>>>>>> dev
    }

    /**
     * Create a TestRunner, override in subclasses.
     *
<<<<<<< HEAD
     * @return PHPUnit_TextUI_TestRunner
     *
     * @since  Method available since Release 3.6.0
     */
    protected function createRunner()
    {
        return new PHPUnit_TextUI_TestRunner($this->arguments['loader']);
=======
     * @return TestRunner
     */
    protected function createRunner()
    {
        return new TestRunner($this->arguments['loader']);
>>>>>>> dev
    }

    /**
     * Handles the command-line arguments.
     *
<<<<<<< HEAD
     * A child class of PHPUnit_TextUI_Command can hook into the argument
=======
     * A child class of PHPUnit\TextUI\Command can hook into the argument
>>>>>>> dev
     * parsing by adding the switch(es) to the $longOptions array and point to a
     * callback method that handles the switch(es) in the child class like this
     *
     * <code>
     * <?php
<<<<<<< HEAD
     * class MyCommand extends PHPUnit_TextUI_Command
=======
     * class MyCommand extends PHPUnit\TextUI\Command
>>>>>>> dev
     * {
     *     public function __construct()
     *     {
     *         // my-switch won't accept a value, it's an on/off
     *         $this->longOptions['my-switch'] = 'myHandler';
     *         // my-secondswitch will accept a value - note the equals sign
     *         $this->longOptions['my-secondswitch='] = 'myOtherHandler';
     *     }
     *
     *     // --my-switch  -> myHandler()
     *     protected function myHandler()
     *     {
     *     }
     *
     *     // --my-secondswitch foo -> myOtherHandler('foo')
     *     protected function myOtherHandler ($value)
     *     {
     *     }
     *
     *     // You will also need this - the static keyword in the
<<<<<<< HEAD
     *     // PHPUnit_TextUI_Command will mean that it'll be
     *     // PHPUnit_TextUI_Command that gets instantiated,
=======
     *     // PHPUnit\TextUI\Command will mean that it'll be
     *     // PHPUnit\TextUI\Command that gets instantiated,
>>>>>>> dev
     *     // not MyCommand
     *     public static function main($exit = true)
     *     {
     *         $command = new static;
     *
     *         return $command->run($_SERVER['argv'], $exit);
     *     }
     *
     * }
     * </code>
     *
     * @param array $argv
     */
    protected function handleArguments(array $argv)
    {
<<<<<<< HEAD
        if (defined('__PHPUNIT_PHAR__')) {
            $this->longOptions['check-version'] = null;
            $this->longOptions['selfupdate']    = null;
            $this->longOptions['self-update']   = null;
            $this->longOptions['selfupgrade']   = null;
            $this->longOptions['self-upgrade']  = null;
        }

        try {
            $this->options = PHPUnit_Util_Getopt::getopt(
                $argv,
                'd:c:hv',
                array_keys($this->longOptions)
            );
        } catch (PHPUnit_Framework_Exception $e) {
            $this->showError($e->getMessage());
=======
        try {
            $this->options = Getopt::getopt(
                $argv,
                'd:c:hv',
                \array_keys($this->longOptions)
            );
        } catch (Exception $t) {
            $this->exitWithErrorMessage($t->getMessage());
>>>>>>> dev
        }

        foreach ($this->options[0] as $option) {
            switch ($option[0]) {
                case '--colors':
<<<<<<< HEAD
                    $this->arguments['colors'] = $option[1] ?: PHPUnit_TextUI_ResultPrinter::COLOR_AUTO;
=======
                    $this->arguments['colors'] = $option[1] ?: ResultPrinter::COLOR_AUTO;

>>>>>>> dev
                    break;

                case '--bootstrap':
                    $this->arguments['bootstrap'] = $option[1];
<<<<<<< HEAD
                    break;

                case '--columns':
                    if (is_numeric($option[1])) {
                        $this->arguments['columns'] = (int) $option[1];
                    } elseif ($option[1] == 'max') {
                        $this->arguments['columns'] = 'max';
                    }
=======

                    break;

                case '--columns':
                    if (\is_numeric($option[1])) {
                        $this->arguments['columns'] = (int) $option[1];
                    } elseif ($option[1] === 'max') {
                        $this->arguments['columns'] = 'max';
                    }

>>>>>>> dev
                    break;

                case 'c':
                case '--configuration':
                    $this->arguments['configuration'] = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--coverage-clover':
                    $this->arguments['coverageClover'] = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--coverage-crap4j':
                    $this->arguments['coverageCrap4J'] = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--coverage-html':
                    $this->arguments['coverageHtml'] = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--coverage-php':
                    $this->arguments['coveragePHP'] = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--coverage-text':
                    if ($option[1] === null) {
                        $option[1] = 'php://stdout';
                    }

                    $this->arguments['coverageText']                   = $option[1];
                    $this->arguments['coverageTextShowUncoveredFiles'] = false;
                    $this->arguments['coverageTextShowOnlySummary']    = false;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--coverage-xml':
                    $this->arguments['coverageXml'] = $option[1];
<<<<<<< HEAD
                    break;

                case 'd':
                    $ini = explode('=', $option[1]);

                    if (isset($ini[0])) {
                        if (isset($ini[1])) {
                            ini_set($ini[0], $ini[1]);
                        } else {
                            ini_set($ini[0], true);
                        }
                    }
=======

                    break;

                case 'd':
                    $ini = \explode('=', $option[1]);

                    if (isset($ini[0])) {
                        if (isset($ini[1])) {
                            \ini_set($ini[0], $ini[1]);
                        } else {
                            \ini_set($ini[0], true);
                        }
                    }

>>>>>>> dev
                    break;

                case '--debug':
                    $this->arguments['debug'] = true;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case 'h':
                case '--help':
                    $this->showHelp();
<<<<<<< HEAD
                    exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
=======
                    exit(TestRunner::SUCCESS_EXIT);

>>>>>>> dev
                    break;

                case '--filter':
                    $this->arguments['filter'] = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--testsuite':
                    $this->arguments['testsuite'] = $option[1];
<<<<<<< HEAD
                    break;

                case '--group':
                    $this->arguments['groups'] = explode(',', $option[1]);
                    break;

                case '--exclude-group':
                    $this->arguments['excludeGroups'] = explode(
                        ',',
                        $option[1]
                    );
                    break;

                case '--test-suffix':
                    $this->arguments['testSuffixes'] = explode(
                        ',',
                        $option[1]
                    );
=======

                    break;

                case '--generate-configuration':
                    $this->printVersionString();

                    print 'Generating phpunit.xml in ' . \getcwd() . PHP_EOL . PHP_EOL;

                    print 'Bootstrap script (relative to path shown above; default: vendor/autoload.php): ';
                    $bootstrapScript = \trim(\fgets(STDIN));

                    print 'Tests directory (relative to path shown above; default: tests): ';
                    $testsDirectory = \trim(\fgets(STDIN));

                    print 'Source directory (relative to path shown above; default: src): ';
                    $src = \trim(\fgets(STDIN));

                    if ($bootstrapScript === '') {
                        $bootstrapScript = 'vendor/autoload.php';
                    }

                    if ($testsDirectory === '') {
                        $testsDirectory = 'tests';
                    }

                    if ($src === '') {
                        $src = 'src';
                    }

                    $generator = new ConfigurationGenerator;

                    \file_put_contents(
                        'phpunit.xml',
                        $generator->generateDefaultConfiguration(
                            Version::series(),
                            $bootstrapScript,
                            $testsDirectory,
                            $src
                        )
                    );

                    print PHP_EOL . 'Generated phpunit.xml in ' . \getcwd() . PHP_EOL;

                    exit(TestRunner::SUCCESS_EXIT);

                    break;

                case '--group':
                    $this->arguments['groups'] = \explode(',', $option[1]);

                    break;

                case '--exclude-group':
                    $this->arguments['excludeGroups'] = \explode(
                        ',',
                        $option[1]
                    );

                    break;

                case '--test-suffix':
                    $this->arguments['testSuffixes'] = \explode(
                        ',',
                        $option[1]
                    );

>>>>>>> dev
                    break;

                case '--include-path':
                    $includePath = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--list-groups':
                    $this->arguments['listGroups'] = true;
<<<<<<< HEAD
=======

                    break;

                case '--list-suites':
                    $this->arguments['listSuites'] = true;

                    break;

                case '--list-tests':
                    $this->arguments['listTests'] = true;

                    break;

                case '--list-tests-xml':
                    $this->arguments['listTestsXml'] = $option[1];

>>>>>>> dev
                    break;

                case '--printer':
                    $this->arguments['printer'] = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--loader':
                    $this->arguments['loader'] = $option[1];
<<<<<<< HEAD
                    break;

                case '--log-json':
                    $this->arguments['jsonLogfile'] = $option[1];
=======

>>>>>>> dev
                    break;

                case '--log-junit':
                    $this->arguments['junitLogfile'] = $option[1];
<<<<<<< HEAD
                    break;

                case '--log-tap':
                    $this->arguments['tapLogfile'] = $option[1];
=======

                    break;

                case '--log-teamcity':
                    $this->arguments['teamcityLogfile'] = $option[1];

>>>>>>> dev
                    break;

                case '--process-isolation':
                    $this->arguments['processIsolation'] = true;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--repeat':
                    $this->arguments['repeat'] = (int) $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--stderr':
                    $this->arguments['stderr'] = true;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--stop-on-error':
                    $this->arguments['stopOnError'] = true;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--stop-on-failure':
                    $this->arguments['stopOnFailure'] = true;
<<<<<<< HEAD
=======

                    break;

                case '--stop-on-warning':
                    $this->arguments['stopOnWarning'] = true;

>>>>>>> dev
                    break;

                case '--stop-on-incomplete':
                    $this->arguments['stopOnIncomplete'] = true;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--stop-on-risky':
                    $this->arguments['stopOnRisky'] = true;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--stop-on-skipped':
                    $this->arguments['stopOnSkipped'] = true;
<<<<<<< HEAD
                    break;

                case '--tap':
                    $this->arguments['printer'] = 'PHPUnit_Util_Log_TAP';
                    break;

                case '--testdox':
                    $this->arguments['printer'] = 'PHPUnit_Util_TestDox_ResultPrinter_Text';
=======

                    break;

                case '--fail-on-warning':
                    $this->arguments['failOnWarning'] = true;

                    break;

                case '--fail-on-risky':
                    $this->arguments['failOnRisky'] = true;

                    break;

                case '--teamcity':
                    $this->arguments['printer'] = TeamCity::class;

                    break;

                case '--testdox':
                    $this->arguments['printer'] = TextResultPrinter::class;

                    break;

                case '--testdox-group':
                    $this->arguments['testdoxGroups'] = \explode(
                        ',',
                        $option[1]
                    );

                    break;

                case '--testdox-exclude-group':
                    $this->arguments['testdoxExcludeGroups'] = \explode(
                        ',',
                        $option[1]
                    );

>>>>>>> dev
                    break;

                case '--testdox-html':
                    $this->arguments['testdoxHTMLFile'] = $option[1];
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--testdox-text':
                    $this->arguments['testdoxTextFile'] = $option[1];
<<<<<<< HEAD
=======

                    break;

                case '--testdox-xml':
                    $this->arguments['testdoxXMLFile'] = $option[1];

>>>>>>> dev
                    break;

                case '--no-configuration':
                    $this->arguments['useDefaultConfiguration'] = false;
<<<<<<< HEAD
=======

                    break;

                case '--no-extensions':
                    $this->arguments['noExtensions'] = true;

>>>>>>> dev
                    break;

                case '--no-coverage':
                    $this->arguments['noCoverage'] = true;
<<<<<<< HEAD
                    break;

                case '--no-globals-backup':
                    $this->arguments['backupGlobals'] = false;
=======

                    break;

                case '--no-logging':
                    $this->arguments['noLogging'] = true;

                    break;

                case '--globals-backup':
                    $this->arguments['backupGlobals'] = true;

>>>>>>> dev
                    break;

                case '--static-backup':
                    $this->arguments['backupStaticAttributes'] = true;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case 'v':
                case '--verbose':
                    $this->arguments['verbose'] = true;
<<<<<<< HEAD
=======

                    break;

                case '--atleast-version':
                    if (\version_compare(Version::id(), $option[1], '>=')) {
                        exit(TestRunner::SUCCESS_EXIT);
                    }

                    exit(TestRunner::FAILURE_EXIT);

>>>>>>> dev
                    break;

                case '--version':
                    $this->printVersionString();
<<<<<<< HEAD
                    exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
                    break;

                case '--report-useless-tests':
                    $this->arguments['reportUselessTests'] = true;
=======
                    exit(TestRunner::SUCCESS_EXIT);

                    break;

                case '--dont-report-useless-tests':
                    $this->arguments['reportUselessTests'] = false;

>>>>>>> dev
                    break;

                case '--strict-coverage':
                    $this->arguments['strictCoverage'] = true;
<<<<<<< HEAD
                    break;

                case '--strict-global-state':
                    $this->arguments['disallowChangesToGlobalState'] = true;
=======

                    break;

                case '--disable-coverage-ignore':
                    $this->arguments['disableCodeCoverageIgnore'] = true;

                    break;

                case '--strict-global-state':
                    $this->arguments['beStrictAboutChangesToGlobalState'] = true;

>>>>>>> dev
                    break;

                case '--disallow-test-output':
                    $this->arguments['disallowTestOutput'] = true;
<<<<<<< HEAD
=======

                    break;

                case '--disallow-resource-usage':
                    $this->arguments['beStrictAboutResourceUsageDuringSmallTests'] = true;

>>>>>>> dev
                    break;

                case '--enforce-time-limit':
                    $this->arguments['enforceTimeLimit'] = true;
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;

                case '--disallow-todo-tests':
                    $this->arguments['disallowTodoAnnotatedTests'] = true;
<<<<<<< HEAD
                    break;

                case '--strict':
                    $this->arguments['reportUselessTests']         = true;
                    $this->arguments['strictCoverage']             = true;
                    $this->arguments['disallowTestOutput']         = true;
                    $this->arguments['enforceTimeLimit']           = true;
                    $this->arguments['disallowTodoAnnotatedTests'] = true;
                    $this->arguments['deprecatedStrictModeOption'] = true;
=======

                    break;

                case '--reverse-list':
                    $this->arguments['reverseList'] = true;

>>>>>>> dev
                    break;

                case '--check-version':
                    $this->handleVersionCheck();
<<<<<<< HEAD
                    break;

                case '--selfupdate':
                case '--self-update':
                    $this->handleSelfUpdate();
                    break;

                case '--selfupgrade':
                case '--self-upgrade':
                    $this->handleSelfUpdate(true);
=======

>>>>>>> dev
                    break;

                case '--whitelist':
                    $this->arguments['whitelist'] = $option[1];
<<<<<<< HEAD
                    break;

                default:
                    $optionName = str_replace('--', '', $option[0]);

=======

                    break;

                default:
                    $optionName = \str_replace('--', '', $option[0]);

                    $handler = null;
>>>>>>> dev
                    if (isset($this->longOptions[$optionName])) {
                        $handler = $this->longOptions[$optionName];
                    } elseif (isset($this->longOptions[$optionName . '='])) {
                        $handler = $this->longOptions[$optionName . '='];
                    }

<<<<<<< HEAD
                    if (isset($handler) && is_callable(array($this, $handler))) {
=======
                    if (isset($handler) && \is_callable([$this, $handler])) {
>>>>>>> dev
                        $this->$handler($option[1]);
                    }
            }
        }

        $this->handleCustomTestSuite();

        if (!isset($this->arguments['test'])) {
            if (isset($this->options[1][0])) {
                $this->arguments['test'] = $this->options[1][0];
            }

            if (isset($this->options[1][1])) {
<<<<<<< HEAD
                $this->arguments['testFile'] = realpath($this->options[1][1]);
=======
                $this->arguments['testFile'] = \realpath($this->options[1][1]);
>>>>>>> dev
            } else {
                $this->arguments['testFile'] = '';
            }

            if (isset($this->arguments['test']) &&
<<<<<<< HEAD
                is_file($this->arguments['test']) &&
                substr($this->arguments['test'], -5, 5) != '.phpt') {
                $this->arguments['testFile'] = realpath($this->arguments['test']);
                $this->arguments['test']     = substr($this->arguments['test'], 0, strrpos($this->arguments['test'], '.'));
=======
                \is_file($this->arguments['test']) &&
                \substr($this->arguments['test'], -5, 5) != '.phpt') {
                $this->arguments['testFile'] = \realpath($this->arguments['test']);
                $this->arguments['test']     = \substr($this->arguments['test'], 0, \strrpos($this->arguments['test'], '.'));
>>>>>>> dev
            }
        }

        if (!isset($this->arguments['testSuffixes'])) {
<<<<<<< HEAD
            $this->arguments['testSuffixes'] = array('Test.php', '.phpt');
        }

        if (isset($includePath)) {
            ini_set(
                'include_path',
                $includePath . PATH_SEPARATOR . ini_get('include_path')
=======
            $this->arguments['testSuffixes'] = ['Test.php', '.phpt'];
        }

        if (isset($includePath)) {
            \ini_set(
                'include_path',
                $includePath . PATH_SEPARATOR . \ini_get('include_path')
>>>>>>> dev
            );
        }

        if ($this->arguments['loader'] !== null) {
            $this->arguments['loader'] = $this->handleLoader($this->arguments['loader']);
        }

        if (isset($this->arguments['configuration']) &&
<<<<<<< HEAD
            is_dir($this->arguments['configuration'])) {
            $configurationFile = $this->arguments['configuration'] . '/phpunit.xml';

            if (file_exists($configurationFile)) {
                $this->arguments['configuration'] = realpath(
                    $configurationFile
                );
            } elseif (file_exists($configurationFile . '.dist')) {
                $this->arguments['configuration'] = realpath(
=======
            \is_dir($this->arguments['configuration'])) {
            $configurationFile = $this->arguments['configuration'] . '/phpunit.xml';

            if (\file_exists($configurationFile)) {
                $this->arguments['configuration'] = \realpath(
                    $configurationFile
                );
            } elseif (\file_exists($configurationFile . '.dist')) {
                $this->arguments['configuration'] = \realpath(
>>>>>>> dev
                    $configurationFile . '.dist'
                );
            }
        } elseif (!isset($this->arguments['configuration']) &&
<<<<<<< HEAD
                  $this->arguments['useDefaultConfiguration']) {
            if (file_exists('phpunit.xml')) {
                $this->arguments['configuration'] = realpath('phpunit.xml');
            } elseif (file_exists('phpunit.xml.dist')) {
                $this->arguments['configuration'] = realpath(
=======
            $this->arguments['useDefaultConfiguration']) {
            if (\file_exists('phpunit.xml')) {
                $this->arguments['configuration'] = \realpath('phpunit.xml');
            } elseif (\file_exists('phpunit.xml.dist')) {
                $this->arguments['configuration'] = \realpath(
>>>>>>> dev
                    'phpunit.xml.dist'
                );
            }
        }

        if (isset($this->arguments['configuration'])) {
            try {
<<<<<<< HEAD
                $configuration = PHPUnit_Util_Configuration::getInstance(
                    $this->arguments['configuration']
                );
            } catch (Throwable $e) {
                print $e->getMessage() . "\n";
                exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
            } catch (Exception $e) {
                print $e->getMessage() . "\n";
                exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
            }

            $phpunit = $configuration->getPHPUnitConfiguration();
=======
                $configuration = Configuration::getInstance(
                    $this->arguments['configuration']
                );
            } catch (Throwable $t) {
                print $t->getMessage() . PHP_EOL;
                exit(TestRunner::FAILURE_EXIT);
            }

            $phpunitConfiguration = $configuration->getPHPUnitConfiguration();
>>>>>>> dev

            $configuration->handlePHPConfiguration();

            /*
             * Issue #1216
             */
            if (isset($this->arguments['bootstrap'])) {
                $this->handleBootstrap($this->arguments['bootstrap']);
<<<<<<< HEAD
            } elseif (isset($phpunit['bootstrap'])) {
                $this->handleBootstrap($phpunit['bootstrap']);
=======
            } elseif (isset($phpunitConfiguration['bootstrap'])) {
                $this->handleBootstrap($phpunitConfiguration['bootstrap']);
>>>>>>> dev
            }

            /*
             * Issue #657
             */
<<<<<<< HEAD
            if (isset($phpunit['stderr']) && ! isset($this->arguments['stderr'])) {
                $this->arguments['stderr'] = $phpunit['stderr'];
            }

            if (isset($phpunit['columns']) && ! isset($this->arguments['columns'])) {
                $this->arguments['columns'] = $phpunit['columns'];
            }

            if (isset($phpunit['printerClass'])) {
                if (isset($phpunit['printerFile'])) {
                    $file = $phpunit['printerFile'];
=======
            if (isset($phpunitConfiguration['stderr']) && !isset($this->arguments['stderr'])) {
                $this->arguments['stderr'] = $phpunitConfiguration['stderr'];
            }

            if (isset($phpunitConfiguration['extensionsDirectory']) && !isset($this->arguments['noExtensions']) && \extension_loaded('phar')) {
                $this->handleExtensions($phpunitConfiguration['extensionsDirectory']);
            }

            if (isset($phpunitConfiguration['columns']) && !isset($this->arguments['columns'])) {
                $this->arguments['columns'] = $phpunitConfiguration['columns'];
            }

            if (!isset($this->arguments['printer']) && isset($phpunitConfiguration['printerClass'])) {
                if (isset($phpunitConfiguration['printerFile'])) {
                    $file = $phpunitConfiguration['printerFile'];
>>>>>>> dev
                } else {
                    $file = '';
                }

                $this->arguments['printer'] = $this->handlePrinter(
<<<<<<< HEAD
                    $phpunit['printerClass'],
=======
                    $phpunitConfiguration['printerClass'],
>>>>>>> dev
                    $file
                );
            }

<<<<<<< HEAD
            if (isset($phpunit['testSuiteLoaderClass'])) {
                if (isset($phpunit['testSuiteLoaderFile'])) {
                    $file = $phpunit['testSuiteLoaderFile'];
=======
            if (isset($phpunitConfiguration['testSuiteLoaderClass'])) {
                if (isset($phpunitConfiguration['testSuiteLoaderFile'])) {
                    $file = $phpunitConfiguration['testSuiteLoaderFile'];
>>>>>>> dev
                } else {
                    $file = '';
                }

                $this->arguments['loader'] = $this->handleLoader(
<<<<<<< HEAD
                    $phpunit['testSuiteLoaderClass'],
=======
                    $phpunitConfiguration['testSuiteLoaderClass'],
>>>>>>> dev
                    $file
                );
            }

<<<<<<< HEAD
            $browsers = $configuration->getSeleniumBrowserConfiguration();

            if (!empty($browsers)) {
                $this->arguments['deprecatedSeleniumConfiguration'] = true;

                if (class_exists('PHPUnit_Extensions_SeleniumTestCase')) {
                    PHPUnit_Extensions_SeleniumTestCase::$browsers = $browsers;
                }
            }

            if (!isset($this->arguments['test'])) {
                $testSuite = $configuration->getTestSuiteConfiguration(isset($this->arguments['testsuite']) ? $this->arguments['testsuite'] : null);
=======
            if (!isset($this->arguments['testsuite']) && isset($phpunitConfiguration['defaultTestSuite'])) {
                $this->arguments['testsuite'] = $phpunitConfiguration['defaultTestSuite'];
            }

            if (!isset($this->arguments['test'])) {
                $testSuite = $configuration->getTestSuiteConfiguration($this->arguments['testsuite'] ?? null);
>>>>>>> dev

                if ($testSuite !== null) {
                    $this->arguments['test'] = $testSuite;
                }
            }
        } elseif (isset($this->arguments['bootstrap'])) {
            $this->handleBootstrap($this->arguments['bootstrap']);
        }

        if (isset($this->arguments['printer']) &&
<<<<<<< HEAD
            is_string($this->arguments['printer'])) {
            $this->arguments['printer'] = $this->handlePrinter($this->arguments['printer']);
        }

        if (isset($this->arguments['test']) && is_string($this->arguments['test']) && substr($this->arguments['test'], -5, 5) == '.phpt') {
            $test = new PHPUnit_Extensions_PhptTestCase($this->arguments['test']);

            $this->arguments['test'] = new PHPUnit_Framework_TestSuite;
            $this->arguments['test']->addTest($test);
        }

        if (!isset($this->arguments['test']) ||
            (isset($this->arguments['testDatabaseLogRevision']) && !isset($this->arguments['testDatabaseDSN']))) {
            $this->showHelp();
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
=======
            \is_string($this->arguments['printer'])) {
            $this->arguments['printer'] = $this->handlePrinter($this->arguments['printer']);
        }

        if (isset($this->arguments['test']) && \is_string($this->arguments['test']) && \substr($this->arguments['test'], -5, 5) == '.phpt') {
            $test = new PhptTestCase($this->arguments['test']);

            $this->arguments['test'] = new TestSuite;
            $this->arguments['test']->addTest($test);
        }

        if (!isset($this->arguments['test'])) {
            $this->showHelp();
            exit(TestRunner::EXCEPTION_EXIT);
>>>>>>> dev
        }
    }

    /**
<<<<<<< HEAD
     * Handles the loading of the PHPUnit_Runner_TestSuiteLoader implementation.
=======
     * Handles the loading of the PHPUnit\Runner\TestSuiteLoader implementation.
>>>>>>> dev
     *
     * @param string $loaderClass
     * @param string $loaderFile
     *
<<<<<<< HEAD
     * @return PHPUnit_Runner_TestSuiteLoader
     */
    protected function handleLoader($loaderClass, $loaderFile = '')
    {
        if (!class_exists($loaderClass, false)) {
            if ($loaderFile == '') {
                $loaderFile = PHPUnit_Util_Filesystem::classNameToFilename(
=======
     * @return TestSuiteLoader|null
     */
    protected function handleLoader($loaderClass, $loaderFile = '')
    {
        if (!\class_exists($loaderClass, false)) {
            if ($loaderFile == '') {
                $loaderFile = Filesystem::classNameToFilename(
>>>>>>> dev
                    $loaderClass
                );
            }

<<<<<<< HEAD
            $loaderFile = stream_resolve_include_path($loaderFile);
=======
            $loaderFile = \stream_resolve_include_path($loaderFile);
>>>>>>> dev

            if ($loaderFile) {
                require $loaderFile;
            }
        }

<<<<<<< HEAD
        if (class_exists($loaderClass, false)) {
            $class = new ReflectionClass($loaderClass);

            if ($class->implementsInterface('PHPUnit_Runner_TestSuiteLoader') &&
=======
        if (\class_exists($loaderClass, false)) {
            $class = new ReflectionClass($loaderClass);

            if ($class->implementsInterface(TestSuiteLoader::class) &&
>>>>>>> dev
                $class->isInstantiable()) {
                return $class->newInstance();
            }
        }

<<<<<<< HEAD
        if ($loaderClass == 'PHPUnit_Runner_StandardTestSuiteLoader') {
            return;
        }

        $this->showError(
            sprintf(
=======
        if ($loaderClass == StandardTestSuiteLoader::class) {
            return;
        }

        $this->exitWithErrorMessage(
            \sprintf(
>>>>>>> dev
                'Could not use "%s" as loader.',
                $loaderClass
            )
        );
    }

    /**
<<<<<<< HEAD
     * Handles the loading of the PHPUnit_Util_Printer implementation.
=======
     * Handles the loading of the PHPUnit\Util\Printer implementation.
>>>>>>> dev
     *
     * @param string $printerClass
     * @param string $printerFile
     *
<<<<<<< HEAD
     * @return PHPUnit_Util_Printer|string
     */
    protected function handlePrinter($printerClass, $printerFile = '')
    {
        if (!class_exists($printerClass, false)) {
            if ($printerFile == '') {
                $printerFile = PHPUnit_Util_Filesystem::classNameToFilename(
=======
     * @return Printer|string|null
     */
    protected function handlePrinter($printerClass, $printerFile = '')
    {
        if (!\class_exists($printerClass, false)) {
            if ($printerFile == '') {
                $printerFile = Filesystem::classNameToFilename(
>>>>>>> dev
                    $printerClass
                );
            }

<<<<<<< HEAD
            $printerFile = stream_resolve_include_path($printerFile);
=======
            $printerFile = \stream_resolve_include_path($printerFile);
>>>>>>> dev

            if ($printerFile) {
                require $printerFile;
            }
        }

<<<<<<< HEAD
        if (class_exists($printerClass)) {
            $class = new ReflectionClass($printerClass);

            if ($class->implementsInterface('PHPUnit_Framework_TestListener') &&
                $class->isSubclassOf('PHPUnit_Util_Printer') &&
                $class->isInstantiable()) {
                if ($class->isSubclassOf('PHPUnit_TextUI_ResultPrinter')) {
                    return $printerClass;
                }

                $outputStream = isset($this->arguments['stderr']) ? 'php://stderr' : null;

                return $class->newInstance($outputStream);
            }
        }

        $this->showError(
            sprintf(
                'Could not use "%s" as printer.',
                $printerClass
            )
        );
    }

    /**
     * Loads a bootstrap file.
     *
     * @param string $filename
     */
    protected function handleBootstrap($filename)
    {
        try {
            PHPUnit_Util_Fileloader::checkAndLoad($filename);
        } catch (PHPUnit_Framework_Exception $e) {
            $this->showError($e->getMessage());
        }
    }

    /**
     * @since Method available since Release 4.0.0
     */
    protected function handleSelfUpdate($upgrade = false)
    {
        $this->printVersionString();

        $localFilename = realpath($_SERVER['argv'][0]);

        if (!is_writable($localFilename)) {
            print 'No write permission to update ' . $localFilename . "\n";
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
        }

        if (!extension_loaded('openssl')) {
            print "The OpenSSL extension is not loaded.\n";
            exit(PHPUnit_TextUI_TestRunner::EXCEPTION_EXIT);
        }

        if (!$upgrade) {
            $remoteFilename = sprintf(
                'https://phar.phpunit.de/phpunit-%s.phar',
                file_get_contents(
                    sprintf(
                        'https://phar.phpunit.de/latest-version-of/phpunit-%s',
                        PHPUnit_Runner_Version::series()
                    )
                )
            );
        } else {
            $remoteFilename = sprintf(
                'https://phar.phpunit.de/phpunit%s.phar',
                PHPUnit_Runner_Version::getReleaseChannel()
            );
        }

        $tempFilename = tempnam(sys_get_temp_dir(), 'phpunit') . '.phar';

        // Workaround for https://bugs.php.net/bug.php?id=65538
        $caFile = dirname($tempFilename) . '/ca.pem';
        copy(__PHPUNIT_PHAR_ROOT__ . '/ca.pem', $caFile);

        print 'Updating the PHPUnit PHAR ... ';

        $options = array(
            'ssl' => array(
                'allow_self_signed' => false,
                'cafile'            => $caFile,
                'verify_peer'       => true
            )
        );

        if (PHP_VERSION_ID < 50600) {
            $options['ssl']['CN_match']        = 'phar.phpunit.de';
            $options['ssl']['SNI_server_name'] = 'phar.phpunit.de';
        }

        file_put_contents(
            $tempFilename,
            file_get_contents(
                $remoteFilename,
                false,
                stream_context_create($options)
            )
        );

        chmod($tempFilename, 0777 & ~umask());

        try {
            $phar = new Phar($tempFilename);
            unset($phar);
            rename($tempFilename, $localFilename);
            unlink($caFile);
        } catch (Throwable $_e) {
            $e = $_e;
        } catch (Exception $_e) {
            $e = $_e;
        }

        if (isset($e)) {
            unlink($caFile);
            unlink($tempFilename);
            print " done\n\n" . $e->getMessage() . "\n";
            exit(2);
        }

        print " done\n";
        exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
    }

    /**
     * @since Method available since Release 4.8.0
     */
=======
        if (!\class_exists($printerClass)) {
            $this->exitWithErrorMessage(
                \sprintf(
                    'Could not use "%s" as printer: class does not exist',
                    $printerClass
                )
            );
        }

        $class = new ReflectionClass($printerClass);

        if (!$class->implementsInterface(TestListener::class)) {
            $this->exitWithErrorMessage(
                \sprintf(
                    'Could not use "%s" as printer: class does not implement %s',
                    $printerClass,
                    TestListener::class
                )
            );
        }

        if (!$class->isSubclassOf(Printer::class)) {
            $this->exitWithErrorMessage(
                \sprintf(
                    'Could not use "%s" as printer: class does not extend %s',
                    $printerClass,
                    Printer::class
                )
            );
        }

        if (!$class->isInstantiable()) {
            $this->exitWithErrorMessage(
                \sprintf(
                    'Could not use "%s" as printer: class cannot be instantiated',
                    $printerClass
                )
            );
        }

        if ($class->isSubclassOf(ResultPrinter::class)) {
            return $printerClass;
        }

        $outputStream = isset($this->arguments['stderr']) ? 'php://stderr' : null;

        return $class->newInstance($outputStream);
    }

    /**
     * Loads a bootstrap file.
     *
     * @param string $filename
     */
    protected function handleBootstrap($filename)
    {
        try {
            Fileloader::checkAndLoad($filename);
        } catch (Exception $e) {
            $this->exitWithErrorMessage($e->getMessage());
        }
    }

>>>>>>> dev
    protected function handleVersionCheck()
    {
        $this->printVersionString();

<<<<<<< HEAD
        $latestVersion = file_get_contents('https://phar.phpunit.de/latest-version-of/phpunit');
        $isOutdated    = version_compare($latestVersion, PHPUnit_Runner_Version::id(), '>');

        if ($isOutdated) {
            print "You are not using the latest version of PHPUnit.\n";
            print 'Use "phpunit --self-upgrade" to install PHPUnit ' . $latestVersion . "\n";
        } else {
            print "You are using the latest version of PHPUnit.\n";
        }

        exit(PHPUnit_TextUI_TestRunner::SUCCESS_EXIT);
=======
        $latestVersion = \file_get_contents('https://phar.phpunit.de/latest-version-of/phpunit');
        $isOutdated    = \version_compare($latestVersion, Version::id(), '>');

        if ($isOutdated) {
            \printf(
                'You are not using the latest version of PHPUnit.' . PHP_EOL .
                'The latest version is PHPUnit %s.' . PHP_EOL,
                $latestVersion
            );
        } else {
            print 'You are using the latest version of PHPUnit.' . PHP_EOL;
        }

        exit(TestRunner::SUCCESS_EXIT);
>>>>>>> dev
    }

    /**
     * Show the help message.
     */
    protected function showHelp()
    {
        $this->printVersionString();

        print <<<EOT
Usage: phpunit [options] UnitTest [UnitTest.php]
       phpunit [options] <directory>

Code Coverage Options:

<<<<<<< HEAD
  --coverage-clover <file>  Generate code coverage report in Clover XML format.
  --coverage-crap4j <file>  Generate code coverage report in Crap4J XML format.
  --coverage-html <dir>     Generate code coverage report in HTML format.
  --coverage-php <file>     Export PHP_CodeCoverage object to file.
  --coverage-text=<file>    Generate code coverage report in text format.
                            Default: Standard output.
  --coverage-xml <dir>      Generate code coverage report in PHPUnit XML format.

Logging Options:

  --log-junit <file>        Log test execution in JUnit XML format to file.
  --log-tap <file>          Log test execution in TAP format to file.
  --log-json <file>         Log test execution in JSON format.
  --testdox-html <file>     Write agile documentation in HTML format to file.
  --testdox-text <file>     Write agile documentation in Text format to file.

Test Selection Options:

  --filter <pattern>        Filter which tests to run.
  --testsuite <name>        Filter which testsuite to run.
  --group ...               Only runs tests from the specified group(s).
  --exclude-group ...       Exclude tests from the specified group(s).
  --list-groups             List available test groups.
  --test-suffix ...         Only search for test in files with specified
                            suffix(es). Default: Test.php,.phpt

Test Execution Options:

  --report-useless-tests    Be strict about tests that do not test anything.
  --strict-coverage         Be strict about unintentionally covered code.
  --strict-global-state     Be strict about changes to global state
  --disallow-test-output    Be strict about output during tests.
  --enforce-time-limit      Enforce time limit based on test size.
  --disallow-todo-tests     Disallow @todo-annotated tests.

  --process-isolation       Run each test in a separate PHP process.
  --no-globals-backup       Do not backup and restore \$GLOBALS for each test.
  --static-backup           Backup and restore static attributes for each test.

  --colors=<flag>           Use colors in output ("never", "auto" or "always").
  --columns <n>             Number of columns to use for progress output.
  --columns max             Use maximum number of columns for progress output.
  --stderr                  Write to STDERR instead of STDOUT.
  --stop-on-error           Stop execution upon first error.
  --stop-on-failure         Stop execution upon first error or failure.
  --stop-on-risky           Stop execution upon first risky test.
  --stop-on-skipped         Stop execution upon first skipped test.
  --stop-on-incomplete      Stop execution upon first incomplete test.
  -v|--verbose              Output more verbose information.
  --debug                   Display debugging information during test execution.

  --loader <loader>         TestSuiteLoader implementation to use.
  --repeat <times>          Runs the test(s) repeatedly.
  --tap                     Report test execution progress in TAP format.
  --testdox                 Report test execution progress in TestDox format.
  --printer <printer>       TestListener implementation to use.

Configuration Options:

  --bootstrap <file>        A "bootstrap" PHP file that is run before the tests.
  -c|--configuration <file> Read configuration from XML file.
  --no-configuration        Ignore default configuration file (phpunit.xml).
  --no-coverage             Ignore code coverage configuration.
  --include-path <path(s)>  Prepend PHP's include_path with given path(s).
  -d key[=value]            Sets a php.ini value.

Miscellaneous Options:

  -h|--help                 Prints this usage information.
  --version                 Prints the version and exits.

EOT;

        if (defined('__PHPUNIT_PHAR__')) {
            print "\n  --check-version           Check whether PHPUnit is the latest version.";
            print "\n  --self-update             Update PHPUnit to the latest version within the same\n                            release series.\n";
            print "\n  --self-upgrade            Upgrade PHPUnit to the latest version.\n";
        }
=======
  --coverage-clover <file>    Generate code coverage report in Clover XML format.
  --coverage-crap4j <file>    Generate code coverage report in Crap4J XML format.
  --coverage-html <dir>       Generate code coverage report in HTML format.
  --coverage-php <file>       Export PHP_CodeCoverage object to file.
  --coverage-text=<file>      Generate code coverage report in text format.
                              Default: Standard output.
  --coverage-xml <dir>        Generate code coverage report in PHPUnit XML format.
  --whitelist <dir>           Whitelist <dir> for code coverage analysis.
  --disable-coverage-ignore   Disable annotations for ignoring code coverage.
  --no-coverage               Ignore code coverage configuration.

Logging Options:

  --log-junit <file>          Log test execution in JUnit XML format to file.
  --log-teamcity <file>       Log test execution in TeamCity format to file.
  --testdox-html <file>       Write agile documentation in HTML format to file.
  --testdox-text <file>       Write agile documentation in Text format to file.
  --testdox-xml <file>        Write agile documentation in XML format to file.
  --reverse-list              Print defects in reverse order

Test Selection Options:

  --filter <pattern>          Filter which tests to run.
  --testsuite <name,...>      Filter which testsuite to run.
  --group ...                 Only runs tests from the specified group(s).
  --exclude-group ...         Exclude tests from the specified group(s).
  --list-groups               List available test groups.
  --list-suites               List available test suites.
  --list-tests                List available tests.
  --list-tests-xml <file>     List available tests in XML format.
  --test-suffix ...           Only search for test in files with specified
                              suffix(es). Default: Test.php,.phpt

Test Execution Options:

  --dont-report-useless-tests Do not report tests that do not test anything.
  --strict-coverage           Be strict about @covers annotation usage.
  --strict-global-state       Be strict about changes to global state
  --disallow-test-output      Be strict about output during tests.
  --disallow-resource-usage   Be strict about resource usage during small tests.
  --enforce-time-limit        Enforce time limit based on test size.
  --disallow-todo-tests       Disallow @todo-annotated tests.

  --process-isolation         Run each test in a separate PHP process.
  --globals-backup            Backup and restore \$GLOBALS for each test.
  --static-backup             Backup and restore static attributes for each test.

  --colors=<flag>             Use colors in output ("never", "auto" or "always").
  --columns <n>               Number of columns to use for progress output.
  --columns max               Use maximum number of columns for progress output.
  --stderr                    Write to STDERR instead of STDOUT.
  --stop-on-error             Stop execution upon first error.
  --stop-on-failure           Stop execution upon first error or failure.
  --stop-on-warning           Stop execution upon first warning.
  --stop-on-risky             Stop execution upon first risky test.
  --stop-on-skipped           Stop execution upon first skipped test.
  --stop-on-incomplete        Stop execution upon first incomplete test.
  --fail-on-warning           Treat tests with warnings as failures.
  --fail-on-risky             Treat risky tests as failures.
  -v|--verbose                Output more verbose information.
  --debug                     Display debugging information.

  --loader <loader>           TestSuiteLoader implementation to use.
  --repeat <times>            Runs the test(s) repeatedly.
  --teamcity                  Report test execution progress in TeamCity format.
  --testdox                   Report test execution progress in TestDox format.
  --testdox-group             Only include tests from the specified group(s).
  --testdox-exclude-group     Exclude tests from the specified group(s).
  --printer <printer>         TestListener implementation to use.

Configuration Options:

  --bootstrap <file>          A "bootstrap" PHP file that is run before the tests.
  -c|--configuration <file>   Read configuration from XML file.
  --no-configuration          Ignore default configuration file (phpunit.xml).
  --no-logging                Ignore logging configuration.
  --no-extensions             Do not load PHPUnit extensions.
  --include-path <path(s)>    Prepend PHP's include_path with given path(s).
  -d key[=value]              Sets a php.ini value.
  --generate-configuration    Generate configuration file with suggested settings.

Miscellaneous Options:

  -h|--help                   Prints this usage information.
  --version                   Prints the version and exits.
  --atleast-version <min>     Checks that version is greater than min and exits.
  --check-version             Check whether PHPUnit is the latest version.

EOT;
>>>>>>> dev
    }

    /**
     * Custom callback for test suite discovery.
     */
    protected function handleCustomTestSuite()
    {
    }

    private function printVersionString()
    {
        if ($this->versionStringPrinted) {
            return;
        }

<<<<<<< HEAD
        print PHPUnit_Runner_Version::getVersionString() . "\n\n";
=======
        print Version::getVersionString() . PHP_EOL . PHP_EOL;
>>>>>>> dev

        $this->versionStringPrinted = true;
    }

    /**
<<<<<<< HEAD
     */
    private function showError($message)
    {
        $this->printVersionString();

        print $message . "\n";

        exit(PHPUnit_TextUI_TestRunner::FAILURE_EXIT);
=======
     * @param string $message
     */
    private function exitWithErrorMessage($message)
    {
        $this->printVersionString();

        print $message . PHP_EOL;

        exit(TestRunner::FAILURE_EXIT);
    }

    /**
     * @param string $directory
     */
    private function handleExtensions($directory)
    {
        $facade = new File_Iterator_Facade;

        foreach ($facade->getFilesAsArray($directory, '.phar') as $file) {
            if (!\file_exists('phar://' . $file . '/manifest.xml')) {
                $this->arguments['notLoadedExtensions'][] = $file . ' is not an extension for PHPUnit';

                continue;
            }

            try {
                $applicationName = new ApplicationName('phpunit/phpunit');
                $version         = new PharIoVersion(Version::series());
                $manifest        = ManifestLoader::fromFile('phar://' . $file . '/manifest.xml');

                if (!$manifest->isExtensionFor($applicationName)) {
                    $this->arguments['notLoadedExtensions'][] = $file . ' is not an extension for PHPUnit';

                    continue;
                }

                if (!$manifest->isExtensionFor($applicationName, $version)) {
                    $this->arguments['notLoadedExtensions'][] = $file . ' is not compatible with this version of PHPUnit';

                    continue;
                }
            } catch (ManifestException $e) {
                $this->arguments['notLoadedExtensions'][] = $file . ': ' . $e->getMessage();

                continue;
            }

            require $file;

            $this->arguments['loadedExtensions'][] = $manifest->getName() . ' ' . $manifest->getVersion()->getVersionString();
        }
    }

    private function handleListGroups(TestSuite $suite, bool $exit): int
    {
        $this->printVersionString();

        print 'Available test group(s):' . PHP_EOL;

        $groups = $suite->getGroups();
        \sort($groups);

        foreach ($groups as $group) {
            \printf(
                ' - %s' . PHP_EOL,
                $group
            );
        }

        if ($exit) {
            exit(TestRunner::SUCCESS_EXIT);
        }

        return TestRunner::SUCCESS_EXIT;
    }

    private function handleListSuites(bool $exit): int
    {
        $this->printVersionString();

        print 'Available test suite(s):' . PHP_EOL;

        $configuration = Configuration::getInstance(
            $this->arguments['configuration']
        );

        $suiteNames = $configuration->getTestSuiteNames();

        foreach ($suiteNames as $suiteName) {
            \printf(
                ' - %s' . PHP_EOL,
                $suiteName
            );
        }

        if ($exit) {
            exit(TestRunner::SUCCESS_EXIT);
        }

        return TestRunner::SUCCESS_EXIT;
    }

    private function handleListTests(TestSuite $suite, bool $exit): int
    {
        $this->printVersionString();

        $renderer = new TextTestListRenderer;

        print $renderer->render($suite);

        if ($exit) {
            exit(TestRunner::SUCCESS_EXIT);
        }

        return TestRunner::SUCCESS_EXIT;
    }

    private function handleListTestsXml(TestSuite $suite, string $target, bool $exit): int
    {
        $this->printVersionString();

        $renderer = new XmlTestListRenderer;

        \file_put_contents($target, $renderer->render($suite));

        \printf(
            'Wrote list of tests that would have been run to %s' . \PHP_EOL,
            $target
        );

        if ($exit) {
            exit(TestRunner::SUCCESS_EXIT);
        }

        return TestRunner::SUCCESS_EXIT;
>>>>>>> dev
    }
}
