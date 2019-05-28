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
 * The standard test suite loader.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Runner_StandardTestSuiteLoader implements PHPUnit_Runner_TestSuiteLoader
=======
namespace PHPUnit\Runner;

use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Fileloader;
use PHPUnit\Util\Filesystem;
use ReflectionClass;

/**
 * The standard test suite loader.
 */
class StandardTestSuiteLoader implements TestSuiteLoader
>>>>>>> dev
{
    /**
     * @param string $suiteClassName
     * @param string $suiteClassFile
     *
     * @return ReflectionClass
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     */
    public function load($suiteClassName, $suiteClassFile = '')
    {
        $suiteClassName = str_replace('.php', '', $suiteClassName);

        if (empty($suiteClassFile)) {
            $suiteClassFile = PHPUnit_Util_Filesystem::classNameToFilename(
=======
     * @throws Exception
     */
    public function load($suiteClassName, $suiteClassFile = '')
    {
        $suiteClassName = \str_replace('.php', '', $suiteClassName);

        if (empty($suiteClassFile)) {
            $suiteClassFile = Filesystem::classNameToFilename(
>>>>>>> dev
                $suiteClassName
            );
        }

<<<<<<< HEAD
        if (!class_exists($suiteClassName, false)) {
            $loadedClasses = get_declared_classes();

            $filename = PHPUnit_Util_Fileloader::checkAndLoad($suiteClassFile);

            $loadedClasses = array_values(
                array_diff(get_declared_classes(), $loadedClasses)
            );
        }

        if (!class_exists($suiteClassName, false) && !empty($loadedClasses)) {
            $offset = 0 - strlen($suiteClassName);

            foreach ($loadedClasses as $loadedClass) {
                $class = new ReflectionClass($loadedClass);
                if (substr($loadedClass, $offset) === $suiteClassName &&
                    $class->getFileName() == $filename) {
                    $suiteClassName = $loadedClass;
=======
        if (!\class_exists($suiteClassName, false)) {
            $loadedClasses = \get_declared_classes();

            $filename = Fileloader::checkAndLoad($suiteClassFile);

            $loadedClasses = \array_values(
                \array_diff(\get_declared_classes(), $loadedClasses)
            );
        }

        if (!\class_exists($suiteClassName, false) && !empty($loadedClasses)) {
            $offset = 0 - \strlen($suiteClassName);

            foreach ($loadedClasses as $loadedClass) {
                $class = new ReflectionClass($loadedClass);
                if (\substr($loadedClass, $offset) === $suiteClassName &&
                    $class->getFileName() == $filename) {
                    $suiteClassName = $loadedClass;

>>>>>>> dev
                    break;
                }
            }
        }

<<<<<<< HEAD
        if (!class_exists($suiteClassName, false) && !empty($loadedClasses)) {
            $testCaseClass = 'PHPUnit_Framework_TestCase';
=======
        if (!\class_exists($suiteClassName, false) && !empty($loadedClasses)) {
            $testCaseClass = TestCase::class;
>>>>>>> dev

            foreach ($loadedClasses as $loadedClass) {
                $class     = new ReflectionClass($loadedClass);
                $classFile = $class->getFileName();

<<<<<<< HEAD
                if ($class->isSubclassOf($testCaseClass) &&
                    !$class->isAbstract()) {
                    $suiteClassName = $loadedClass;
                    $testCaseClass  = $loadedClass;

                    if ($classFile == realpath($suiteClassFile)) {
=======
                if ($class->isSubclassOf($testCaseClass) && !$class->isAbstract()) {
                    $suiteClassName = $loadedClass;
                    $testCaseClass  = $loadedClass;

                    if ($classFile == \realpath($suiteClassFile)) {
>>>>>>> dev
                        break;
                    }
                }

                if ($class->hasMethod('suite')) {
                    $method = $class->getMethod('suite');

<<<<<<< HEAD
                    if (!$method->isAbstract() &&
                        $method->isPublic() &&
                        $method->isStatic()) {
                        $suiteClassName = $loadedClass;

                        if ($classFile == realpath($suiteClassFile)) {
=======
                    if (!$method->isAbstract() && $method->isPublic() && $method->isStatic()) {
                        $suiteClassName = $loadedClass;

                        if ($classFile == \realpath($suiteClassFile)) {
>>>>>>> dev
                            break;
                        }
                    }
                }
            }
        }

<<<<<<< HEAD
        if (class_exists($suiteClassName, false)) {
            $class = new ReflectionClass($suiteClassName);

            if ($class->getFileName() == realpath($suiteClassFile)) {
=======
        if (\class_exists($suiteClassName, false)) {
            $class = new ReflectionClass($suiteClassName);

            if ($class->getFileName() == \realpath($suiteClassFile)) {
>>>>>>> dev
                return $class;
            }
        }

<<<<<<< HEAD
        throw new PHPUnit_Framework_Exception(
            sprintf(
=======
        throw new Exception(
            \sprintf(
>>>>>>> dev
                "Class '%s' could not be found in '%s'.",
                $suiteClassName,
                $suiteClassFile
            )
        );
    }

    /**
     * @param ReflectionClass $aClass
     *
     * @return ReflectionClass
     */
    public function reload(ReflectionClass $aClass)
    {
        return $aClass;
    }
}
