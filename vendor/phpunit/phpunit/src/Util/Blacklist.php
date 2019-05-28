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
 * Utility class for blacklisting PHPUnit's own source code files.
 *
 * @since Class available since Release 4.0.0
 */
class PHPUnit_Util_Blacklist
=======
namespace PHPUnit\Util;

use ReflectionClass;

/**
 * Utility class for blacklisting PHPUnit's own source code files.
 */
class Blacklist
>>>>>>> dev
{
    /**
     * @var array
     */
<<<<<<< HEAD
    public static $blacklistedClassNames = array(
        'File_Iterator'                              => 1,
        'PHP_CodeCoverage'                           => 1,
        'PHP_Invoker'                                => 1,
        'PHP_Timer'                                  => 1,
        'PHP_Token'                                  => 1,
        'PHPUnit_Framework_TestCase'                 => 2,
        'PHPUnit_Extensions_Database_TestCase'       => 2,
        'PHPUnit_Framework_MockObject_Generator'     => 2,
        'PHPUnit_Extensions_SeleniumTestCase'        => 2,
        'Text_Template'                              => 1,
        'Symfony\Component\Yaml\Yaml'                => 1,
        'SebastianBergmann\Diff\Diff'                => 1,
        'SebastianBergmann\Environment\Runtime'      => 1,
        'SebastianBergmann\Comparator\Comparator'    => 1,
        'SebastianBergmann\Exporter\Exporter'        => 1,
        'SebastianBergmann\GlobalState\Snapshot'     => 1,
        'SebastianBergmann\RecursionContext\Context' => 1,
        'SebastianBergmann\Version'                  => 1,
        'Composer\Autoload\ClassLoader'              => 1,
        'Doctrine\Instantiator\Instantiator'         => 1,
        'phpDocumentor\Reflection\DocBlock'          => 1,
        'Prophecy\Prophet'                           => 1
    );

    /**
     * @var array
=======
    public static $blacklistedClassNames = [
        'File_Iterator'                               => 1,
        'PHP_Invoker'                                 => 1,
        'PHP_Timer'                                   => 1,
        'PHP_Token'                                   => 1,
        'PHPUnit\Framework\TestCase'                  => 2,
        'PHPUnit\DbUnit\TestCase'                     => 2,
        'PHPUnit\Framework\MockObject\Generator'      => 1,
        'Text_Template'                               => 1,
        'Symfony\Component\Yaml\Yaml'                 => 1,
        'SebastianBergmann\CodeCoverage\CodeCoverage' => 1,
        'SebastianBergmann\Diff\Diff'                 => 1,
        'SebastianBergmann\Environment\Runtime'       => 1,
        'SebastianBergmann\Comparator\Comparator'     => 1,
        'SebastianBergmann\Exporter\Exporter'         => 1,
        'SebastianBergmann\GlobalState\Snapshot'      => 1,
        'SebastianBergmann\RecursionContext\Context'  => 1,
        'SebastianBergmann\Version'                   => 1,
        'Composer\Autoload\ClassLoader'               => 1,
        'Doctrine\Instantiator\Instantiator'          => 1,
        'phpDocumentor\Reflection\DocBlock'           => 1,
        'Prophecy\Prophet'                            => 1,
        'DeepCopy\DeepCopy'                           => 1
    ];

    /**
     * @var string[]
>>>>>>> dev
     */
    private static $directories;

    /**
<<<<<<< HEAD
     * @return array
     *
     * @since  Method available since Release 4.1.0
=======
     * @return string[]
>>>>>>> dev
     */
    public function getBlacklistedDirectories()
    {
        $this->initialize();

        return self::$directories;
    }

    /**
     * @param string $file
     *
     * @return bool
     */
    public function isBlacklisted($file)
    {
<<<<<<< HEAD
        if (defined('PHPUNIT_TESTSUITE')) {
=======
        if (\defined('PHPUNIT_TESTSUITE')) {
>>>>>>> dev
            return false;
        }

        $this->initialize();

        foreach (self::$directories as $directory) {
<<<<<<< HEAD
            if (strpos($file, $directory) === 0) {
=======
            if (\strpos($file, $directory) === 0) {
>>>>>>> dev
                return true;
            }
        }

        return false;
    }

    private function initialize()
    {
        if (self::$directories === null) {
<<<<<<< HEAD
            self::$directories = array();

            foreach (self::$blacklistedClassNames as $className => $parent) {
                if (!class_exists($className)) {
=======
            self::$directories = [];

            foreach (self::$blacklistedClassNames as $className => $parent) {
                if (!\class_exists($className)) {
>>>>>>> dev
                    continue;
                }

                $reflector = new ReflectionClass($className);
                $directory = $reflector->getFileName();

                for ($i = 0; $i < $parent; $i++) {
<<<<<<< HEAD
                    $directory = dirname($directory);
=======
                    $directory = \dirname($directory);
>>>>>>> dev
                }

                self::$directories[] = $directory;
            }

            // Hide process isolation workaround on Windows.
<<<<<<< HEAD
            // @see PHPUnit_Util_PHP::factory()
            // @see PHPUnit_Util_PHP_Windows::process()
            if (DIRECTORY_SEPARATOR === '\\') {
                // tempnam() prefix is limited to first 3 chars.
                // @see http://php.net/manual/en/function.tempnam.php
                self::$directories[] = sys_get_temp_dir() . '\\PHP';
=======
            if (DIRECTORY_SEPARATOR === '\\') {
                // tempnam() prefix is limited to first 3 chars.
                // @see http://php.net/manual/en/function.tempnam.php
                self::$directories[] = \sys_get_temp_dir() . '\\PHP';
>>>>>>> dev
            }
        }
    }
}
