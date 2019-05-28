<?php
/*
<<<<<<< HEAD
 * This file is part of the PHP_CodeCoverage package.
=======
 * This file is part of the php-code-coverage package.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
=======
namespace SebastianBergmann\CodeCoverage;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\PhptTestCase;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\Driver\HHVM;
use SebastianBergmann\CodeCoverage\Driver\PHPDBG;
use SebastianBergmann\CodeCoverage\Driver\Xdebug;
use SebastianBergmann\CodeCoverage\Node\Builder;
use SebastianBergmann\CodeCoverage\Node\Directory;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;
>>>>>>> dev
use SebastianBergmann\Environment\Runtime;

/**
 * Provides collection functionality for PHP code coverage information.
<<<<<<< HEAD
 *
 * @since Class available since Release 1.0.0
 */
class PHP_CodeCoverage
{
    /**
     * @var PHP_CodeCoverage_Driver
=======
 */
class CodeCoverage
{
    /**
     * @var Driver
>>>>>>> dev
     */
    private $driver;

    /**
<<<<<<< HEAD
     * @var PHP_CodeCoverage_Filter
=======
     * @var Filter
>>>>>>> dev
     */
    private $filter;

    /**
<<<<<<< HEAD
=======
     * @var Wizard
     */
    private $wizard;

    /**
>>>>>>> dev
     * @var bool
     */
    private $cacheTokens = false;

    /**
     * @var bool
     */
    private $checkForUnintentionallyCoveredCode = false;

    /**
     * @var bool
     */
    private $forceCoversAnnotation = false;

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $mapTestClassNameToCoveredClassName = false;
=======
    private $checkForUnexecutedCoveredCode = false;

    /**
     * @var bool
     */
    private $checkForMissingCoversAnnotation = false;
>>>>>>> dev

    /**
     * @var bool
     */
    private $addUncoveredFilesFromWhitelist = true;

    /**
     * @var bool
     */
    private $processUncoveredFilesFromWhitelist = false;

    /**
<<<<<<< HEAD
=======
     * @var bool
     */
    private $ignoreDeprecatedCode = false;

    /**
>>>>>>> dev
     * @var mixed
     */
    private $currentId;

    /**
     * Code coverage data.
     *
     * @var array
     */
<<<<<<< HEAD
    private $data = array();
=======
    private $data = [];
>>>>>>> dev

    /**
     * @var array
     */
<<<<<<< HEAD
    private $ignoredLines = array();
=======
    private $ignoredLines = [];
>>>>>>> dev

    /**
     * @var bool
     */
    private $disableIgnoredLines = false;

    /**
     * Test data.
     *
     * @var array
     */
<<<<<<< HEAD
    private $tests = array();
=======
    private $tests = [];

    /**
     * @var string[]
     */
    private $unintentionallyCoveredSubclassesWhitelist = [];

    /**
     * Determine if the data has been initialized or not
     *
     * @var bool
     */
    private $isInitialized = false;

    /**
     * Determine whether we need to check for dead and unused code on each test
     *
     * @var bool
     */
    private $shouldCheckForDeadAndUnused = true;

    /**
     * @var Directory
     */
    private $report;
>>>>>>> dev

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param  PHP_CodeCoverage_Driver    $driver
     * @param  PHP_CodeCoverage_Filter    $filter
     * @throws PHP_CodeCoverage_Exception
     */
    public function __construct(PHP_CodeCoverage_Driver $driver = null, PHP_CodeCoverage_Filter $filter = null)
=======
     * @param Driver $driver
     * @param Filter $filter
     *
     * @throws RuntimeException
     */
    public function __construct(Driver $driver = null, Filter $filter = null)
>>>>>>> dev
    {
        if ($driver === null) {
            $driver = $this->selectDriver();
        }

        if ($filter === null) {
<<<<<<< HEAD
            $filter = new PHP_CodeCoverage_Filter;
=======
            $filter = new Filter;
>>>>>>> dev
        }

        $this->driver = $driver;
        $this->filter = $filter;
<<<<<<< HEAD
    }

    /**
     * Returns the PHP_CodeCoverage_Report_Node_* object graph
     * for this PHP_CodeCoverage object.
     *
     * @return PHP_CodeCoverage_Report_Node_Directory
     * @since  Method available since Release 1.1.0
     */
    public function getReport()
    {
        $factory = new PHP_CodeCoverage_Report_Factory;

        return $factory->create($this);
=======

        $this->wizard = new Wizard;
    }

    /**
     * Returns the code coverage information as a graph of node objects.
     *
     * @return Directory
     */
    public function getReport()
    {
        if ($this->report === null) {
            $builder = new Builder;

            $this->report = $builder->build($this);
        }

        return $this->report;
>>>>>>> dev
    }

    /**
     * Clears collected code coverage data.
     */
    public function clear()
    {
<<<<<<< HEAD
        $this->currentId = null;
        $this->data      = array();
        $this->tests     = array();
    }

    /**
     * Returns the PHP_CodeCoverage_Filter used.
     *
     * @return PHP_CodeCoverage_Filter
=======
        $this->isInitialized = false;
        $this->currentId     = null;
        $this->data          = [];
        $this->tests         = [];
        $this->report        = null;
    }

    /**
     * Returns the filter object used.
     *
     * @return Filter
>>>>>>> dev
     */
    public function filter()
    {
        return $this->filter;
    }

    /**
     * Returns the collected code coverage data.
     * Set $raw = true to bypass all filters.
     *
<<<<<<< HEAD
     * @param  bool  $raw
     * @return array
     * @since  Method available since Release 1.1.0
=======
     * @param bool $raw
     *
     * @return array
>>>>>>> dev
     */
    public function getData($raw = false)
    {
        if (!$raw && $this->addUncoveredFilesFromWhitelist) {
            $this->addUncoveredFilesFromWhitelist();
        }

<<<<<<< HEAD
        // We need to apply the blacklist filter a second time
        // when no whitelist is used.
        if (!$raw && !$this->filter->hasWhitelist()) {
            $this->applyListsFilter($this->data);
        }

=======
>>>>>>> dev
        return $this->data;
    }

    /**
     * Sets the coverage data.
     *
     * @param array $data
<<<<<<< HEAD
     * @since Method available since Release 2.0.0
     */
    public function setData(array $data)
    {
        $this->data = $data;
=======
     */
    public function setData(array $data)
    {
        $this->data   = $data;
        $this->report = null;
>>>>>>> dev
    }

    /**
     * Returns the test data.
     *
     * @return array
<<<<<<< HEAD
     * @since  Method available since Release 1.1.0
=======
>>>>>>> dev
     */
    public function getTests()
    {
        return $this->tests;
    }

    /**
     * Sets the test data.
     *
     * @param array $tests
<<<<<<< HEAD
     * @since Method available since Release 2.0.0
=======
>>>>>>> dev
     */
    public function setTests(array $tests)
    {
        $this->tests = $tests;
    }

    /**
     * Start collection of code coverage information.
     *
<<<<<<< HEAD
     * @param  mixed                      $id
     * @param  bool                       $clear
     * @throws PHP_CodeCoverage_Exception
     */
    public function start($id, $clear = false)
    {
        if (!is_bool($clear)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
     * @param mixed $id
     * @param bool  $clear
     *
     * @throws InvalidArgumentException
     */
    public function start($id, $clear = false)
    {
        if (!\is_bool($clear)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

        if ($clear) {
            $this->clear();
        }

<<<<<<< HEAD
        $this->currentId = $id;

        $this->driver->start();
=======
        if ($this->isInitialized === false) {
            $this->initializeData();
        }

        $this->currentId = $id;

        $this->driver->start($this->shouldCheckForDeadAndUnused);
>>>>>>> dev
    }

    /**
     * Stop collection of code coverage information.
     *
<<<<<<< HEAD
     * @param  bool                       $append
     * @param  mixed                      $linesToBeCovered
     * @param  array                      $linesToBeUsed
     * @return array
     * @throws PHP_CodeCoverage_Exception
     */
    public function stop($append = true, $linesToBeCovered = array(), array $linesToBeUsed = array())
    {
        if (!is_bool($append)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
     * @param bool  $append
     * @param mixed $linesToBeCovered
     * @param array $linesToBeUsed
     * @param bool  $ignoreForceCoversAnnotation
     *
     * @return array
     *
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     * @throws InvalidArgumentException
     */
    public function stop($append = true, $linesToBeCovered = [], array $linesToBeUsed = [], $ignoreForceCoversAnnotation = false)
    {
        if (!\is_bool($append)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

<<<<<<< HEAD
        if (!is_array($linesToBeCovered) && $linesToBeCovered !== false) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
        if (!\is_array($linesToBeCovered) && $linesToBeCovered !== false) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                2,
                'array or false'
            );
        }

        $data = $this->driver->stop();
<<<<<<< HEAD
        $this->append($data, null, $append, $linesToBeCovered, $linesToBeUsed);
=======
        $this->append($data, null, $append, $linesToBeCovered, $linesToBeUsed, $ignoreForceCoversAnnotation);
>>>>>>> dev

        $this->currentId = null;

        return $data;
    }

    /**
     * Appends code coverage data.
     *
<<<<<<< HEAD
     * @param  array                      $data
     * @param  mixed                      $id
     * @param  bool                       $append
     * @param  mixed                      $linesToBeCovered
     * @param  array                      $linesToBeUsed
     * @throws PHP_CodeCoverage_Exception
     */
    public function append(array $data, $id = null, $append = true, $linesToBeCovered = array(), array $linesToBeUsed = array())
=======
     * @param array $data
     * @param mixed $id
     * @param bool  $append
     * @param mixed $linesToBeCovered
     * @param array $linesToBeUsed
     * @param bool  $ignoreForceCoversAnnotation
     *
     * @throws \SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException
     * @throws \SebastianBergmann\CodeCoverage\MissingCoversAnnotationException
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \ReflectionException
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws RuntimeException
     */
    public function append(array $data, $id = null, $append = true, $linesToBeCovered = [], array $linesToBeUsed = [], $ignoreForceCoversAnnotation = false)
>>>>>>> dev
    {
        if ($id === null) {
            $id = $this->currentId;
        }

        if ($id === null) {
<<<<<<< HEAD
            throw new PHP_CodeCoverage_Exception;
=======
            throw new RuntimeException;
>>>>>>> dev
        }

        $this->applyListsFilter($data);
        $this->applyIgnoredLinesFilter($data);
        $this->initializeFilesThatAreSeenTheFirstTime($data);

        if (!$append) {
            return;
        }

<<<<<<< HEAD
        if ($id != 'UNCOVERED_FILES_FROM_WHITELIST') {
            $this->applyCoversAnnotationFilter(
                $data,
                $linesToBeCovered,
                $linesToBeUsed
=======
        if ($id !== 'UNCOVERED_FILES_FROM_WHITELIST') {
            $this->applyCoversAnnotationFilter(
                $data,
                $linesToBeCovered,
                $linesToBeUsed,
                $ignoreForceCoversAnnotation
>>>>>>> dev
            );
        }

        if (empty($data)) {
            return;
        }

        $size   = 'unknown';
        $status = null;

<<<<<<< HEAD
        if ($id instanceof PHPUnit_Framework_TestCase) {
            $_size = $id->getSize();

            if ($_size == PHPUnit_Util_Test::SMALL) {
                $size = 'small';
            } elseif ($_size == PHPUnit_Util_Test::MEDIUM) {
                $size = 'medium';
            } elseif ($_size == PHPUnit_Util_Test::LARGE) {
=======
        if ($id instanceof TestCase) {
            $_size = $id->getSize();

            if ($_size === \PHPUnit\Util\Test::SMALL) {
                $size = 'small';
            } elseif ($_size === \PHPUnit\Util\Test::MEDIUM) {
                $size = 'medium';
            } elseif ($_size === \PHPUnit\Util\Test::LARGE) {
>>>>>>> dev
                $size = 'large';
            }

            $status = $id->getStatus();
<<<<<<< HEAD
            $id     = get_class($id) . '::' . $id->getName();
        } elseif ($id instanceof PHPUnit_Extensions_PhptTestCase) {
=======
            $id     = \get_class($id) . '::' . $id->getName();
        } elseif ($id instanceof PhptTestCase) {
>>>>>>> dev
            $size = 'large';
            $id   = $id->getName();
        }

<<<<<<< HEAD
        $this->tests[$id] = array('size' => $size, 'status' => $status);
=======
        $this->tests[$id] = ['size' => $size, 'status' => $status];
>>>>>>> dev

        foreach ($data as $file => $lines) {
            if (!$this->filter->isFile($file)) {
                continue;
            }

            foreach ($lines as $k => $v) {
<<<<<<< HEAD
                if ($v == PHP_CodeCoverage_Driver::LINE_EXECUTED) {
                    if (empty($this->data[$file][$k]) || !in_array($id, $this->data[$file][$k])) {
=======
                if ($v === Driver::LINE_EXECUTED) {
                    if (empty($this->data[$file][$k]) || !\in_array($id, $this->data[$file][$k])) {
>>>>>>> dev
                        $this->data[$file][$k][] = $id;
                    }
                }
            }
        }
<<<<<<< HEAD
    }

    /**
     * Merges the data from another instance of PHP_CodeCoverage.
     *
     * @param PHP_CodeCoverage $that
     */
    public function merge(PHP_CodeCoverage $that)
    {
        $this->filter->setBlacklistedFiles(
            array_merge($this->filter->getBlacklistedFiles(), $that->filter()->getBlacklistedFiles())
        );

        $this->filter->setWhitelistedFiles(
            array_merge($this->filter->getWhitelistedFiles(), $that->filter()->getWhitelistedFiles())
=======

        $this->report = null;
    }

    /**
     * Merges the data from another instance.
     *
     * @param CodeCoverage $that
     */
    public function merge(self $that)
    {
        $this->filter->setWhitelistedFiles(
            \array_merge($this->filter->getWhitelistedFiles(), $that->filter()->getWhitelistedFiles())
>>>>>>> dev
        );

        foreach ($that->data as $file => $lines) {
            if (!isset($this->data[$file])) {
                if (!$this->filter->isFiltered($file)) {
                    $this->data[$file] = $lines;
                }

                continue;
            }

            foreach ($lines as $line => $data) {
                if ($data !== null) {
                    if (!isset($this->data[$file][$line])) {
                        $this->data[$file][$line] = $data;
                    } else {
<<<<<<< HEAD
                        $this->data[$file][$line] = array_unique(
                            array_merge($this->data[$file][$line], $data)
=======
                        $this->data[$file][$line] = \array_unique(
                            \array_merge($this->data[$file][$line], $data)
>>>>>>> dev
                        );
                    }
                }
            }
        }

<<<<<<< HEAD
        $this->tests = array_merge($this->tests, $that->getTests());

    }

    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     * @since  Method available since Release 1.1.0
     */
    public function setCacheTokens($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
        $this->tests  = \array_merge($this->tests, $that->getTests());
        $this->report = null;
    }

    /**
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setCacheTokens($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

        $this->cacheTokens = $flag;
    }

    /**
<<<<<<< HEAD
     * @since Method available since Release 1.1.0
=======
     * @return bool
>>>>>>> dev
     */
    public function getCacheTokens()
    {
        return $this->cacheTokens;
    }

    /**
<<<<<<< HEAD
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     * @since  Method available since Release 2.0.0
     */
    public function setCheckForUnintentionallyCoveredCode($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setCheckForUnintentionallyCoveredCode($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

        $this->checkForUnintentionallyCoveredCode = $flag;
    }

    /**
<<<<<<< HEAD
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setForceCoversAnnotation($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setForceCoversAnnotation($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

        $this->forceCoversAnnotation = $flag;
    }

    /**
<<<<<<< HEAD
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setMapTestClassNameToCoveredClassName($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setCheckForMissingCoversAnnotation($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
                1,
                'boolean'
            );
        }

        $this->checkForMissingCoversAnnotation = $flag;
    }

    /**
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setCheckForUnexecutedCoveredCode($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

<<<<<<< HEAD
        $this->mapTestClassNameToCoveredClassName = $flag;
    }

    /**
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setAddUncoveredFilesFromWhitelist($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
        $this->checkForUnexecutedCoveredCode = $flag;
    }

    /**
     * @deprecated
     *
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setMapTestClassNameToCoveredClassName($flag)
    {
    }

    /**
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setAddUncoveredFilesFromWhitelist($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

        $this->addUncoveredFilesFromWhitelist = $flag;
    }

    /**
<<<<<<< HEAD
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setProcessUncoveredFilesFromWhitelist($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setProcessUncoveredFilesFromWhitelist($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

        $this->processUncoveredFilesFromWhitelist = $flag;
    }

    /**
<<<<<<< HEAD
     * @param  bool                       $flag
     * @throws PHP_CodeCoverage_Exception
     */
    public function setDisableIgnoredLines($flag)
    {
        if (!is_bool($flag)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setDisableIgnoredLines($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'boolean'
            );
        }

        $this->disableIgnoredLines = $flag;
    }

    /**
<<<<<<< HEAD
     * Applies the @covers annotation filtering.
     *
     * @param  array                                                 $data
     * @param  mixed                                                 $linesToBeCovered
     * @param  array                                                 $linesToBeUsed
     * @throws PHP_CodeCoverage_Exception_UnintentionallyCoveredCode
     */
    private function applyCoversAnnotationFilter(array &$data, $linesToBeCovered, array $linesToBeUsed)
    {
        if ($linesToBeCovered === false ||
            ($this->forceCoversAnnotation && empty($linesToBeCovered))) {
            $data = array();
=======
     * @param bool $flag
     *
     * @throws InvalidArgumentException
     */
    public function setIgnoreDeprecatedCode($flag)
    {
        if (!\is_bool($flag)) {
            throw InvalidArgumentException::create(
                1,
                'boolean'
            );
        }

        $this->ignoreDeprecatedCode = $flag;
    }

    /**
     * @param array $whitelist
     */
    public function setUnintentionallyCoveredSubclassesWhitelist(array $whitelist)
    {
        $this->unintentionallyCoveredSubclassesWhitelist = $whitelist;
    }

    /**
     * Applies the @covers annotation filtering.
     *
     * @param array $data
     * @param mixed $linesToBeCovered
     * @param array $linesToBeUsed
     * @param bool  $ignoreForceCoversAnnotation
     *
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \ReflectionException
     * @throws MissingCoversAnnotationException
     * @throws UnintentionallyCoveredCodeException
     */
    private function applyCoversAnnotationFilter(array &$data, $linesToBeCovered, array $linesToBeUsed, $ignoreForceCoversAnnotation)
    {
        if ($linesToBeCovered === false ||
            ($this->forceCoversAnnotation && empty($linesToBeCovered) && !$ignoreForceCoversAnnotation)) {
            if ($this->checkForMissingCoversAnnotation) {
                throw new MissingCoversAnnotationException;
            }

            $data = [];
>>>>>>> dev

            return;
        }

        if (empty($linesToBeCovered)) {
            return;
        }

<<<<<<< HEAD
        if ($this->checkForUnintentionallyCoveredCode) {
            $this->performUnintentionallyCoveredCodeCheck(
                $data,
                $linesToBeCovered,
                $linesToBeUsed
            );
        }

        $data = array_intersect_key($data, $linesToBeCovered);

        foreach (array_keys($data) as $filename) {
            $_linesToBeCovered = array_flip($linesToBeCovered[$filename]);

            $data[$filename] = array_intersect_key(
                $data[$filename],
                $_linesToBeCovered
            );
=======
        if ($this->checkForUnintentionallyCoveredCode &&
            (!$this->currentId instanceof TestCase ||
            (!$this->currentId->isMedium() && !$this->currentId->isLarge()))) {
            $this->performUnintentionallyCoveredCodeCheck($data, $linesToBeCovered, $linesToBeUsed);
        }

        if ($this->checkForUnexecutedCoveredCode) {
            $this->performUnexecutedCoveredCodeCheck($data, $linesToBeCovered, $linesToBeUsed);
        }

        $data = \array_intersect_key($data, $linesToBeCovered);

        foreach (\array_keys($data) as $filename) {
            $_linesToBeCovered = \array_flip($linesToBeCovered[$filename]);
            $data[$filename]   = \array_intersect_key($data[$filename], $_linesToBeCovered);
>>>>>>> dev
        }
    }

    /**
<<<<<<< HEAD
     * Applies the blacklist/whitelist filtering.
=======
     * Applies the whitelist filtering.
>>>>>>> dev
     *
     * @param array $data
     */
    private function applyListsFilter(array &$data)
    {
<<<<<<< HEAD
        foreach (array_keys($data) as $filename) {
=======
        foreach (\array_keys($data) as $filename) {
>>>>>>> dev
            if ($this->filter->isFiltered($filename)) {
                unset($data[$filename]);
            }
        }
    }

    /**
     * Applies the "ignored lines" filtering.
     *
     * @param array $data
<<<<<<< HEAD
     */
    private function applyIgnoredLinesFilter(array &$data)
    {
        foreach (array_keys($data) as $filename) {
=======
     *
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     */
    private function applyIgnoredLinesFilter(array &$data)
    {
        foreach (\array_keys($data) as $filename) {
>>>>>>> dev
            if (!$this->filter->isFile($filename)) {
                continue;
            }

            foreach ($this->getLinesToBeIgnored($filename) as $line) {
                unset($data[$filename][$line]);
            }
        }
    }

    /**
     * @param array $data
<<<<<<< HEAD
     * @since Method available since Release 1.1.0
=======
>>>>>>> dev
     */
    private function initializeFilesThatAreSeenTheFirstTime(array $data)
    {
        foreach ($data as $file => $lines) {
<<<<<<< HEAD
            if ($this->filter->isFile($file) && !isset($this->data[$file])) {
                $this->data[$file] = array();

                foreach ($lines as $k => $v) {
                    $this->data[$file][$k] = $v == -2 ? null : array();
=======
            if (!isset($this->data[$file]) && $this->filter->isFile($file)) {
                $this->data[$file] = [];

                foreach ($lines as $k => $v) {
                    $this->data[$file][$k] = $v === -2 ? null : [];
>>>>>>> dev
                }
            }
        }
    }

    /**
     * Processes whitelisted files that are not covered.
     */
    private function addUncoveredFilesFromWhitelist()
    {
<<<<<<< HEAD
        $data           = array();
        $uncoveredFiles = array_diff(
            $this->filter->getWhitelist(),
            array_keys($this->data)
        );

        foreach ($uncoveredFiles as $uncoveredFile) {
            if (!file_exists($uncoveredFile)) {
                continue;
            }

            if ($this->processUncoveredFilesFromWhitelist) {
                $this->processUncoveredFileFromWhitelist(
                    $uncoveredFile,
                    $data,
                    $uncoveredFiles
                );
            } else {
                $data[$uncoveredFile] = array();

                $lines = count(file($uncoveredFile));

                for ($i = 1; $i <= $lines; $i++) {
                    $data[$uncoveredFile][$i] = PHP_CodeCoverage_Driver::LINE_NOT_EXECUTED;
                }
=======
        $data           = [];
        $uncoveredFiles = \array_diff(
            $this->filter->getWhitelist(),
            \array_keys($this->data)
        );

        foreach ($uncoveredFiles as $uncoveredFile) {
            if (!\file_exists($uncoveredFile)) {
                continue;
            }

            $data[$uncoveredFile] = [];

            $lines = \count(\file($uncoveredFile));

            for ($i = 1; $i <= $lines; $i++) {
                $data[$uncoveredFile][$i] = Driver::LINE_NOT_EXECUTED;
>>>>>>> dev
            }
        }

        $this->append($data, 'UNCOVERED_FILES_FROM_WHITELIST');
    }

    /**
<<<<<<< HEAD
     * @param string $uncoveredFile
     * @param array  $data
     * @param array  $uncoveredFiles
     */
    private function processUncoveredFileFromWhitelist($uncoveredFile, array &$data, array $uncoveredFiles)
    {
        $this->driver->start();
        include_once $uncoveredFile;
        $coverage = $this->driver->stop();

        foreach ($coverage as $file => $fileCoverage) {
            if (!isset($data[$file]) &&
                in_array($file, $uncoveredFiles)) {
                foreach (array_keys($fileCoverage) as $key) {
                    if ($fileCoverage[$key] == PHP_CodeCoverage_Driver::LINE_EXECUTED) {
                        $fileCoverage[$key] = PHP_CodeCoverage_Driver::LINE_NOT_EXECUTED;
                    }
                }

                $data[$file] = $fileCoverage;
            }
        }
    }

    /**
     * Returns the lines of a source file that should be ignored.
     *
     * @param  string                     $filename
     * @return array
     * @throws PHP_CodeCoverage_Exception
     * @since  Method available since Release 2.0.0
     */
    private function getLinesToBeIgnored($filename)
    {
        if (!is_string($filename)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
=======
     * Returns the lines of a source file that should be ignored.
     *
     * @param string $filename
     *
     * @return array
     *
     * @throws InvalidArgumentException
     */
    private function getLinesToBeIgnored($filename)
    {
        if (!\is_string($filename)) {
            throw InvalidArgumentException::create(
>>>>>>> dev
                1,
                'string'
            );
        }

<<<<<<< HEAD
        if (!isset($this->ignoredLines[$filename])) {
            $this->ignoredLines[$filename] = array();

            if ($this->disableIgnoredLines) {
                return $this->ignoredLines[$filename];
            }

            $ignore   = false;
            $stop     = false;
            $lines    = file($filename);
            $numLines = count($lines);

            foreach ($lines as $index => $line) {
                if (!trim($line)) {
                    $this->ignoredLines[$filename][] = $index + 1;
                }
            }

            if ($this->cacheTokens) {
                $tokens = PHP_Token_Stream_CachingFactory::get($filename);
            } else {
                $tokens = new PHP_Token_Stream($filename);
            }

            $classes = array_merge($tokens->getClasses(), $tokens->getTraits());
            $tokens  = $tokens->tokens();

            foreach ($tokens as $token) {
                switch (get_class($token)) {
                    case 'PHP_Token_COMMENT':
                    case 'PHP_Token_DOC_COMMENT':
                        $_token = trim($token);
                        $_line  = trim($lines[$token->getLine() - 1]);

                        if ($_token == '// @codeCoverageIgnore' ||
                            $_token == '//@codeCoverageIgnore') {
                            $ignore = true;
                            $stop   = true;
                        } elseif ($_token == '// @codeCoverageIgnoreStart' ||
                            $_token == '//@codeCoverageIgnoreStart') {
                            $ignore = true;
                        } elseif ($_token == '// @codeCoverageIgnoreEnd' ||
                            $_token == '//@codeCoverageIgnoreEnd') {
                            $stop = true;
                        }

                        if (!$ignore) {
                            $start = $token->getLine();
                            $end   = $start + substr_count($token, "\n");

                            // Do not ignore the first line when there is a token
                            // before the comment
                            if (0 !== strpos($_token, $_line)) {
                                $start++;
                            }

                            for ($i = $start; $i < $end; $i++) {
                                $this->ignoredLines[$filename][] = $i;
                            }

                            // A DOC_COMMENT token or a COMMENT token starting with "/*"
                            // does not contain the final \n character in its text
                            if (isset($lines[$i-1]) && 0 === strpos($_token, '/*') && '*/' === substr(trim($lines[$i-1]), -2)) {
                                $this->ignoredLines[$filename][] = $i;
                            }
                        }
                        break;

                    case 'PHP_Token_INTERFACE':
                    case 'PHP_Token_TRAIT':
                    case 'PHP_Token_CLASS':
                    case 'PHP_Token_FUNCTION':
                        $docblock = $token->getDocblock();

                        $this->ignoredLines[$filename][] = $token->getLine();

                        if (strpos($docblock, '@codeCoverageIgnore') || strpos($docblock, '@deprecated')) {
                            $endLine = $token->getEndLine();

                            for ($i = $token->getLine(); $i <= $endLine; $i++) {
                                $this->ignoredLines[$filename][] = $i;
                            }
                        } elseif ($token instanceof PHP_Token_INTERFACE ||
                            $token instanceof PHP_Token_TRAIT ||
                            $token instanceof PHP_Token_CLASS) {
                            if (empty($classes[$token->getName()]['methods'])) {
                                for ($i = $token->getLine();
                                     $i <= $token->getEndLine();
                                     $i++) {
                                    $this->ignoredLines[$filename][] = $i;
                                }
                            } else {
                                $firstMethod = array_shift(
                                    $classes[$token->getName()]['methods']
                                );

                                do {
                                    $lastMethod = array_pop(
                                        $classes[$token->getName()]['methods']
                                    );
                                } while ($lastMethod !== null &&
                                    substr($lastMethod['signature'], 0, 18) == 'anonymous function');

                                if ($lastMethod === null) {
                                    $lastMethod = $firstMethod;
                                }

                                for ($i = $token->getLine();
                                     $i < $firstMethod['startLine'];
                                     $i++) {
                                    $this->ignoredLines[$filename][] = $i;
                                }

                                for ($i = $token->getEndLine();
                                     $i > $lastMethod['endLine'];
                                     $i--) {
                                    $this->ignoredLines[$filename][] = $i;
                                }
                            }
                        }
                        break;

                    case 'PHP_Token_NAMESPACE':
                        $this->ignoredLines[$filename][] = $token->getEndLine();

                    // Intentional fallthrough
                    case 'PHP_Token_OPEN_TAG':
                    case 'PHP_Token_CLOSE_TAG':
                    case 'PHP_Token_USE':
                        $this->ignoredLines[$filename][] = $token->getLine();
                        break;
                }

                if ($ignore) {
                    $this->ignoredLines[$filename][] = $token->getLine();

                    if ($stop) {
                        $ignore = false;
                        $stop   = false;
                    }
                }
            }

            $this->ignoredLines[$filename][] = $numLines + 1;

            $this->ignoredLines[$filename] = array_unique(
                $this->ignoredLines[$filename]
            );

            sort($this->ignoredLines[$filename]);
        }
=======
        if (isset($this->ignoredLines[$filename])) {
            return $this->ignoredLines[$filename];
        }

        $this->ignoredLines[$filename] = [];

        $lines = \file($filename);

        foreach ($lines as $index => $line) {
            if (!\trim($line)) {
                $this->ignoredLines[$filename][] = $index + 1;
            }
        }

        if ($this->cacheTokens) {
            $tokens = \PHP_Token_Stream_CachingFactory::get($filename);
        } else {
            $tokens = new \PHP_Token_Stream($filename);
        }

        foreach ($tokens->getInterfaces() as $interface) {
            $interfaceStartLine = $interface['startLine'];
            $interfaceEndLine   = $interface['endLine'];

            foreach (\range($interfaceStartLine, $interfaceEndLine) as $line) {
                $this->ignoredLines[$filename][] = $line;
            }
        }

        foreach (\array_merge($tokens->getClasses(), $tokens->getTraits()) as $classOrTrait) {
            $classOrTraitStartLine = $classOrTrait['startLine'];
            $classOrTraitEndLine   = $classOrTrait['endLine'];

            if (empty($classOrTrait['methods'])) {
                foreach (\range($classOrTraitStartLine, $classOrTraitEndLine) as $line) {
                    $this->ignoredLines[$filename][] = $line;
                }

                continue;
            }

            $firstMethod          = \array_shift($classOrTrait['methods']);
            $firstMethodStartLine = $firstMethod['startLine'];
            $firstMethodEndLine   = $firstMethod['endLine'];
            $lastMethodEndLine    = $firstMethodEndLine;

            do {
                $lastMethod = \array_pop($classOrTrait['methods']);
            } while ($lastMethod !== null && 0 === \strpos($lastMethod['signature'], 'anonymousFunction'));

            if ($lastMethod !== null) {
                $lastMethodEndLine = $lastMethod['endLine'];
            }

            foreach (\range($classOrTraitStartLine, $firstMethodStartLine) as $line) {
                $this->ignoredLines[$filename][] = $line;
            }

            foreach (\range($lastMethodEndLine + 1, $classOrTraitEndLine) as $line) {
                $this->ignoredLines[$filename][] = $line;
            }
        }

        if ($this->disableIgnoredLines) {
            $this->ignoredLines[$filename] = array_unique($this->ignoredLines[$filename]);
            \sort($this->ignoredLines[$filename]);

            return $this->ignoredLines[$filename];
        }

        $ignore = false;
        $stop   = false;

        foreach ($tokens->tokens() as $token) {
            switch (\get_class($token)) {
                case \PHP_Token_COMMENT::class:
                case \PHP_Token_DOC_COMMENT::class:
                    $_token = \trim($token);
                    $_line  = \trim($lines[$token->getLine() - 1]);

                    if ($_token === '// @codeCoverageIgnore' ||
                        $_token === '//@codeCoverageIgnore') {
                        $ignore = true;
                        $stop   = true;
                    } elseif ($_token === '// @codeCoverageIgnoreStart' ||
                        $_token === '//@codeCoverageIgnoreStart') {
                        $ignore = true;
                    } elseif ($_token === '// @codeCoverageIgnoreEnd' ||
                        $_token === '//@codeCoverageIgnoreEnd') {
                        $stop = true;
                    }

                    if (!$ignore) {
                        $start = $token->getLine();
                        $end   = $start + \substr_count($token, "\n");

                        // Do not ignore the first line when there is a token
                        // before the comment
                        if (0 !== \strpos($_token, $_line)) {
                            $start++;
                        }

                        for ($i = $start; $i < $end; $i++) {
                            $this->ignoredLines[$filename][] = $i;
                        }

                        // A DOC_COMMENT token or a COMMENT token starting with "/*"
                        // does not contain the final \n character in its text
                        if (isset($lines[$i - 1]) && 0 === \strpos($_token, '/*') && '*/' === \substr(\trim($lines[$i - 1]), -2)) {
                            $this->ignoredLines[$filename][] = $i;
                        }
                    }

                    break;

                case \PHP_Token_INTERFACE::class:
                case \PHP_Token_TRAIT::class:
                case \PHP_Token_CLASS::class:
                case \PHP_Token_FUNCTION::class:
                    /* @var \PHP_Token_Interface $token */

                    $docblock = $token->getDocblock();

                    $this->ignoredLines[$filename][] = $token->getLine();

                    if (\strpos($docblock, '@codeCoverageIgnore') || ($this->ignoreDeprecatedCode && \strpos($docblock, '@deprecated'))) {
                        $endLine = $token->getEndLine();

                        for ($i = $token->getLine(); $i <= $endLine; $i++) {
                            $this->ignoredLines[$filename][] = $i;
                        }
                    }

                    break;

                case \PHP_Token_ENUM::class:
                    $this->ignoredLines[$filename][] = $token->getLine();

                    break;

                case \PHP_Token_NAMESPACE::class:
                    $this->ignoredLines[$filename][] = $token->getEndLine();

                // Intentional fallthrough
                case \PHP_Token_DECLARE::class:
                case \PHP_Token_OPEN_TAG::class:
                case \PHP_Token_CLOSE_TAG::class:
                case \PHP_Token_USE::class:
                    $this->ignoredLines[$filename][] = $token->getLine();

                    break;
            }

            if ($ignore) {
                $this->ignoredLines[$filename][] = $token->getLine();

                if ($stop) {
                    $ignore = false;
                    $stop   = false;
                }
            }
        }

        $this->ignoredLines[$filename][] = \count($lines) + 1;

        $this->ignoredLines[$filename] = \array_unique(
            $this->ignoredLines[$filename]
        );

        $this->ignoredLines[$filename] = array_unique($this->ignoredLines[$filename]);
        \sort($this->ignoredLines[$filename]);
>>>>>>> dev

        return $this->ignoredLines[$filename];
    }

    /**
<<<<<<< HEAD
     * @param  array                                                 $data
     * @param  array                                                 $linesToBeCovered
     * @param  array                                                 $linesToBeUsed
     * @throws PHP_CodeCoverage_Exception_UnintentionallyCoveredCode
     * @since Method available since Release 2.0.0
=======
     * @param array $data
     * @param array $linesToBeCovered
     * @param array $linesToBeUsed
     *
     * @throws \ReflectionException
     * @throws UnintentionallyCoveredCodeException
>>>>>>> dev
     */
    private function performUnintentionallyCoveredCodeCheck(array &$data, array $linesToBeCovered, array $linesToBeUsed)
    {
        $allowedLines = $this->getAllowedLines(
            $linesToBeCovered,
            $linesToBeUsed
        );

<<<<<<< HEAD
        $message = '';

        foreach ($data as $file => $_data) {
            foreach ($_data as $line => $flag) {
                if ($flag == 1 &&
                    (!isset($allowedLines[$file]) ||
                        !isset($allowedLines[$file][$line]))) {
                    $message .= sprintf(
                        '- %s:%d' . PHP_EOL,
                        $file,
                        $line
                    );
=======
        $unintentionallyCoveredUnits = [];

        foreach ($data as $file => $_data) {
            foreach ($_data as $line => $flag) {
                if ($flag === 1 && !isset($allowedLines[$file][$line])) {
                    $unintentionallyCoveredUnits[] = $this->wizard->lookup($file, $line);
>>>>>>> dev
                }
            }
        }

<<<<<<< HEAD
        if (!empty($message)) {
            throw new PHP_CodeCoverage_Exception_UnintentionallyCoveredCode(
                $message
=======
        $unintentionallyCoveredUnits = $this->processUnintentionallyCoveredUnits($unintentionallyCoveredUnits);

        if (!empty($unintentionallyCoveredUnits)) {
            throw new UnintentionallyCoveredCodeException(
                $unintentionallyCoveredUnits
>>>>>>> dev
            );
        }
    }

    /**
<<<<<<< HEAD
     * @param  array $linesToBeCovered
     * @param  array $linesToBeUsed
     * @return array
     * @since Method available since Release 2.0.0
     */
    private function getAllowedLines(array $linesToBeCovered, array $linesToBeUsed)
    {
        $allowedLines = array();

        foreach (array_keys($linesToBeCovered) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = array();
            }

            $allowedLines[$file] = array_merge(
=======
     * @param array $data
     * @param array $linesToBeCovered
     * @param array $linesToBeUsed
     *
     * @throws CoveredCodeNotExecutedException
     */
    private function performUnexecutedCoveredCodeCheck(array &$data, array $linesToBeCovered, array $linesToBeUsed)
    {
        $executedCodeUnits = $this->coverageToCodeUnits($data);
        $message           = '';

        foreach ($this->linesToCodeUnits($linesToBeCovered) as $codeUnit) {
            if (!\in_array($codeUnit, $executedCodeUnits)) {
                $message .= \sprintf(
                    '- %s is expected to be executed (@covers) but was not executed' . "\n",
                    $codeUnit
                );
            }
        }

        foreach ($this->linesToCodeUnits($linesToBeUsed) as $codeUnit) {
            if (!\in_array($codeUnit, $executedCodeUnits)) {
                $message .= \sprintf(
                    '- %s is expected to be executed (@uses) but was not executed' . "\n",
                    $codeUnit
                );
            }
        }

        if (!empty($message)) {
            throw new CoveredCodeNotExecutedException($message);
        }
    }

    /**
     * @param array $linesToBeCovered
     * @param array $linesToBeUsed
     *
     * @return array
     */
    private function getAllowedLines(array $linesToBeCovered, array $linesToBeUsed)
    {
        $allowedLines = [];

        foreach (\array_keys($linesToBeCovered) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = [];
            }

            $allowedLines[$file] = \array_merge(
>>>>>>> dev
                $allowedLines[$file],
                $linesToBeCovered[$file]
            );
        }

<<<<<<< HEAD
        foreach (array_keys($linesToBeUsed) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = array();
            }

            $allowedLines[$file] = array_merge(
=======
        foreach (\array_keys($linesToBeUsed) as $file) {
            if (!isset($allowedLines[$file])) {
                $allowedLines[$file] = [];
            }

            $allowedLines[$file] = \array_merge(
>>>>>>> dev
                $allowedLines[$file],
                $linesToBeUsed[$file]
            );
        }

<<<<<<< HEAD
        foreach (array_keys($allowedLines) as $file) {
            $allowedLines[$file] = array_flip(
                array_unique($allowedLines[$file])
=======
        foreach (\array_keys($allowedLines) as $file) {
            $allowedLines[$file] = \array_flip(
                \array_unique($allowedLines[$file])
>>>>>>> dev
            );
        }

        return $allowedLines;
    }

    /**
<<<<<<< HEAD
     * @return PHP_CodeCoverage_Driver
     * @throws PHP_CodeCoverage_Exception
=======
     * @return Driver
     *
     * @throws RuntimeException
>>>>>>> dev
     */
    private function selectDriver()
    {
        $runtime = new Runtime;

        if (!$runtime->canCollectCodeCoverage()) {
<<<<<<< HEAD
            throw new PHP_CodeCoverage_Exception('No code coverage driver available');
        }

        if ($runtime->isHHVM()) {
            return new PHP_CodeCoverage_Driver_HHVM;
        } elseif ($runtime->isPHPDBG()) {
            return new PHP_CodeCoverage_Driver_PHPDBG;
        } else {
            return new PHP_CodeCoverage_Driver_Xdebug;
        }
=======
            throw new RuntimeException('No code coverage driver available');
        }

        if ($runtime->isHHVM()) {
            return new HHVM;
        }

        if ($runtime->isPHPDBG()) {
            return new PHPDBG;
        }

        return new Xdebug;
    }

    /**
     * @param array $unintentionallyCoveredUnits
     *
     * @return array
     *
     * @throws \ReflectionException
     */
    private function processUnintentionallyCoveredUnits(array $unintentionallyCoveredUnits)
    {
        $unintentionallyCoveredUnits = \array_unique($unintentionallyCoveredUnits);
        \sort($unintentionallyCoveredUnits);

        foreach (\array_keys($unintentionallyCoveredUnits) as $k => $v) {
            $unit = \explode('::', $unintentionallyCoveredUnits[$k]);

            if (\count($unit) !== 2) {
                continue;
            }

            $class = new \ReflectionClass($unit[0]);

            foreach ($this->unintentionallyCoveredSubclassesWhitelist as $whitelisted) {
                if ($class->isSubclassOf($whitelisted)) {
                    unset($unintentionallyCoveredUnits[$k]);

                    break;
                }
            }
        }

        return \array_values($unintentionallyCoveredUnits);
    }

    /**
     * If we are processing uncovered files from whitelist,
     * we can initialize the data before we start to speed up the tests
     *
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     */
    protected function initializeData()
    {
        $this->isInitialized = true;

        if ($this->processUncoveredFilesFromWhitelist) {
            $this->shouldCheckForDeadAndUnused = false;

            $this->driver->start(true);

            foreach ($this->filter->getWhitelist() as $file) {
                if ($this->filter->isFile($file)) {
                    include_once($file);
                }
            }

            $data     = [];
            $coverage = $this->driver->stop();

            foreach ($coverage as $file => $fileCoverage) {
                if ($this->filter->isFiltered($file)) {
                    continue;
                }

                foreach (\array_keys($fileCoverage) as $key) {
                    if ($fileCoverage[$key] === Driver::LINE_EXECUTED) {
                        $fileCoverage[$key] = Driver::LINE_NOT_EXECUTED;
                    }
                }

                $data[$file] = $fileCoverage;
            }

            $this->append($data, 'UNCOVERED_FILES_FROM_WHITELIST');
        }
    }

    /**
     * @param array $data
     *
     * @return array
     */
    private function coverageToCodeUnits(array $data)
    {
        $codeUnits = [];

        foreach ($data as $filename => $lines) {
            foreach ($lines as $line => $flag) {
                if ($flag === 1) {
                    $codeUnits[] = $this->wizard->lookup($filename, $line);
                }
            }
        }

        return \array_unique($codeUnits);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    private function linesToCodeUnits(array $data)
    {
        $codeUnits = [];

        foreach ($data as $filename => $lines) {
            foreach ($lines as $line) {
                $codeUnits[] = $this->wizard->lookup($filename, $line);
            }
        }

        return \array_unique($codeUnits);
>>>>>>> dev
    }
}
