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

if (!function_exists('trait_exists')) {
    function trait_exists($traitname, $autoload = true)
    {
        return false;
    }
}

/**
 * Test helpers.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Util_Test
{
    const REGEX_DATA_PROVIDER      = '/@dataProvider\s+([a-zA-Z0-9._:-\\\\x7f-\xff]+)/';
    const REGEX_TEST_WITH          = '/@testWith\s+/';
    const REGEX_EXPECTED_EXCEPTION = '(@expectedException\s+([:.\w\\\\x7f-\xff]+)(?:[\t ]+(\S*))?(?:[\t ]+(\S*))?\s*$)m';
    const REGEX_REQUIRES_VERSION   = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<value>[\d\.-]+(dev|(RC|alpha|beta)[\d\.])?)[ \t]*\r?$/m';
    const REGEX_REQUIRES_OS        = '/@requires\s+OS\s+(?P<value>.+?)[ \t]*\r?$/m';
    const REGEX_REQUIRES           = '/@requires\s+(?P<name>function|extension)\s+(?P<value>([^ ]+?))[ \t]*\r?$/m';
=======
namespace PHPUnit\Util;

use Iterator;
use PharIo\Version\VersionConstraintParser;
use PHPUnit\Framework\CodeCoverageException;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\InvalidCoversTargetException;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\SkippedTestError;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Warning;
use PHPUnit\Runner\Version;
use ReflectionClass;
use ReflectionException;
use ReflectionFunction;
use ReflectionMethod;
use SebastianBergmann\Environment\OperatingSystem;
use Traversable;

/**
 * Test helpers.
 */
class Test
{
    const REGEX_DATA_PROVIDER               = '/@dataProvider\s+([a-zA-Z0-9._:-\\\\x7f-\xff]+)/';
    const REGEX_TEST_WITH                   = '/@testWith\s+/';
    const REGEX_EXPECTED_EXCEPTION          = '(@expectedException\s+([:.\w\\\\x7f-\xff]+)(?:[\t ]+(\S*))?(?:[\t ]+(\S*))?\s*$)m';
    const REGEX_REQUIRES_VERSION            = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<operator>[<>=!]{0,2})\s*(?P<version>[\d\.-]+(dev|(RC|alpha|beta)[\d\.])?)[ \t]*\r?$/m';
    const REGEX_REQUIRES_VERSION_CONSTRAINT = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<constraint>[\d\t -.|~^]+)[ \t]*\r?$/m';
    const REGEX_REQUIRES_OS                 = '/@requires\s+(?P<name>OS(?:FAMILY)?)\s+(?P<value>.+?)[ \t]*\r?$/m';
    const REGEX_REQUIRES                    = '/@requires\s+(?P<name>function|extension)\s+(?P<value>([^\s<>=!]+))\s*(?P<operator>[<>=!]{0,2})\s*(?P<version>[\d\.-]+[\d\.]?)?[ \t]*\r?$/m';
>>>>>>> dev

    const UNKNOWN = -1;
    const SMALL   = 0;
    const MEDIUM  = 1;
    const LARGE   = 2;

<<<<<<< HEAD
    private static $annotationCache = array();

    private static $hookMethods = array();

    /**
     * @param PHPUnit_Framework_Test $test
     * @param bool                   $asString
     *
     * @return mixed
     */
    public static function describe(PHPUnit_Framework_Test $test, $asString = true)
    {
        if ($asString) {
            if ($test instanceof PHPUnit_Framework_SelfDescribing) {
                return $test->toString();
            } else {
                return get_class($test);
            }
        } else {
            if ($test instanceof PHPUnit_Framework_TestCase) {
                return array(
                  get_class($test), $test->getName()
                );
            } elseif ($test instanceof PHPUnit_Framework_SelfDescribing) {
                return array('', $test->toString());
            } else {
                return array('', get_class($test));
            }
        }
=======
    private static $annotationCache = [];

    private static $hookMethods = [];

    /**
     * @param \PHPUnit\Framework\Test $test
     * @param bool                    $asString
     *
     * @return mixed
     */
    public static function describe(\PHPUnit\Framework\Test $test, $asString = true)
    {
        if ($asString) {
            if ($test instanceof SelfDescribing) {
                return $test->toString();
            }

            return \get_class($test);
        }

        if ($test instanceof TestCase) {
            return [
                \get_class($test), $test->getName()
            ];
        }

        if ($test instanceof SelfDescribing) {
            return ['', $test->toString()];
        }

        return ['', \get_class($test)];
>>>>>>> dev
    }

    /**
     * @param string $className
     * @param string $methodName
     *
     * @return array|bool
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_CodeCoverageException
     *
     * @since  Method available since Release 4.0.0
=======
     * @throws CodeCoverageException
>>>>>>> dev
     */
    public static function getLinesToBeCovered($className, $methodName)
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        if (isset($annotations['class']['coversNothing']) || isset($annotations['method']['coversNothing'])) {
            return false;
        }

        return self::getLinesToBeCoveredOrUsed($className, $methodName, 'covers');
    }

    /**
     * Returns lines of code specified with the @uses annotation.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
=======
>>>>>>> dev
     */
    public static function getLinesToBeUsed($className, $methodName)
    {
        return self::getLinesToBeCoveredOrUsed($className, $methodName, 'uses');
    }

    /**
     * @param string $className
     * @param string $methodName
     * @param string $mode
     *
     * @return array
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_CodeCoverageException
     *
     * @since  Method available since Release 4.2.0
=======
     * @throws CodeCoverageException
>>>>>>> dev
     */
    private static function getLinesToBeCoveredOrUsed($className, $methodName, $mode)
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

        $classShortcut = null;

        if (!empty($annotations['class'][$mode . 'DefaultClass'])) {
<<<<<<< HEAD
            if (count($annotations['class'][$mode . 'DefaultClass']) > 1) {
                throw new PHPUnit_Framework_CodeCoverageException(
                    sprintf(
=======
            if (\count($annotations['class'][$mode . 'DefaultClass']) > 1) {
                throw new CodeCoverageException(
                    \sprintf(
>>>>>>> dev
                        'More than one @%sClass annotation in class or interface "%s".',
                        $mode,
                        $className
                    )
                );
            }

            $classShortcut = $annotations['class'][$mode . 'DefaultClass'][0];
        }

<<<<<<< HEAD
        $list = array();
=======
        $list = [];
>>>>>>> dev

        if (isset($annotations['class'][$mode])) {
            $list = $annotations['class'][$mode];
        }

        if (isset($annotations['method'][$mode])) {
<<<<<<< HEAD
            $list = array_merge($list, $annotations['method'][$mode]);
        }

        $codeList = array();

        foreach (array_unique($list) as $element) {
            if ($classShortcut && strncmp($element, '::', 2) === 0) {
                $element = $classShortcut . $element;
            }

            $element = preg_replace('/[\s()]+$/', '', $element);
            $element = explode(' ', $element);
            $element = $element[0];

            $codeList = array_merge(
=======
            $list = \array_merge($list, $annotations['method'][$mode]);
        }

        $codeList = [];

        foreach (\array_unique($list) as $element) {
            if ($classShortcut && \strncmp($element, '::', 2) === 0) {
                $element = $classShortcut . $element;
            }

            $element = \preg_replace('/[\s()]+$/', '', $element);
            $element = \explode(' ', $element);
            $element = $element[0];

            $codeList = \array_merge(
>>>>>>> dev
                $codeList,
                self::resolveElementToReflectionObjects($element)
            );
        }

        return self::resolveReflectionObjectsToLines($codeList);
    }

    /**
     * Returns the requirements for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.6.0
=======
>>>>>>> dev
     */
    public static function getRequirements($className, $methodName)
    {
        $reflector  = new ReflectionClass($className);
        $docComment = $reflector->getDocComment();
        $reflector  = new ReflectionMethod($className, $methodName);
        $docComment .= "\n" . $reflector->getDocComment();
<<<<<<< HEAD
        $requires   = array();

        if ($count = preg_match_all(self::REGEX_REQUIRES_OS, $docComment, $matches)) {
            $requires['OS'] = sprintf(
                '/%s/i',
                addcslashes($matches['value'][$count - 1], '/')
            );
        }
        if ($count = preg_match_all(self::REGEX_REQUIRES_VERSION, $docComment, $matches)) {
            for ($i = 0; $i < $count; $i++) {
=======
        $requires = [];

        if ($count = \preg_match_all(self::REGEX_REQUIRES_OS, $docComment, $matches)) {
            foreach (\range(0, $count - 1) as $i) {
>>>>>>> dev
                $requires[$matches['name'][$i]] = $matches['value'][$i];
            }
        }

<<<<<<< HEAD
        // https://bugs.php.net/bug.php?id=63055
        $matches = array();

        if ($count = preg_match_all(self::REGEX_REQUIRES, $docComment, $matches)) {
            for ($i = 0; $i < $count; $i++) {
                $name = $matches['name'][$i] . 's';
                if (!isset($requires[$name])) {
                    $requires[$name] = array();
                }
                $requires[$name][] = $matches['value'][$i];
=======
        if ($count = \preg_match_all(self::REGEX_REQUIRES_VERSION, $docComment, $matches)) {
            foreach (\range(0, $count - 1) as $i) {
                $requires[$matches['name'][$i]] = [
                    'version'  => $matches['version'][$i],
                    'operator' => $matches['operator'][$i]
                ];
            }
        }
        if ($count = \preg_match_all(self::REGEX_REQUIRES_VERSION_CONSTRAINT, $docComment, $matches)) {
            foreach (\range(0, $count - 1) as $i) {
                if (!empty($requires[$matches['name'][$i]])) {
                    continue;
                }

                try {
                    $versionConstraintParser = new VersionConstraintParser;

                    $requires[$matches['name'][$i] . '_constraint'] = [
                        'constraint' => $versionConstraintParser->parse(\trim($matches['constraint'][$i]))
                    ];
                } catch (\PharIo\Version\Exception $e) {
                    throw new Warning($e->getMessage(), $e->getCode(), $e);
                }
            }
        }

        if ($count = \preg_match_all(self::REGEX_REQUIRES, $docComment, $matches)) {
            foreach (\range(0, $count - 1) as $i) {
                $name = $matches['name'][$i] . 's';

                if (!isset($requires[$name])) {
                    $requires[$name] = [];
                }

                $requires[$name][] = $matches['value'][$i];

                if (empty($matches['version'][$i]) || $name != 'extensions') {
                    continue;
                }

                $requires['extension_versions'][$matches['value'][$i]] = [
                    'version'  => $matches['version'][$i],
                    'operator' => $matches['operator'][$i]
                ];
>>>>>>> dev
            }
        }

        return $requires;
    }

    /**
     * Returns the missing requirements for a test.
     *
     * @param string $className
     * @param string $methodName
     *
<<<<<<< HEAD
     * @return array
     *
     * @since  Method available since Release 4.3.0
=======
     * @return string[]
>>>>>>> dev
     */
    public static function getMissingRequirements($className, $methodName)
    {
        $required = static::getRequirements($className, $methodName);
<<<<<<< HEAD
        $missing  = array();

        if (!empty($required['PHP']) && version_compare(PHP_VERSION, $required['PHP'], '<')) {
            $missing[] = sprintf('PHP %s (or later) is required.', $required['PHP']);
        }

        if (!empty($required['PHPUnit'])) {
            $phpunitVersion = PHPUnit_Runner_Version::id();
            if (version_compare($phpunitVersion, $required['PHPUnit'], '<')) {
                $missing[] = sprintf('PHPUnit %s (or later) is required.', $required['PHPUnit']);
            }
        }

        if (!empty($required['OS']) && !preg_match($required['OS'], PHP_OS)) {
            $missing[] = sprintf('Operating system matching %s is required.', $required['OS']);
=======
        $missing  = [];

        if (!empty($required['PHP'])) {
            $operator = empty($required['PHP']['operator']) ? '>=' : $required['PHP']['operator'];

            if (!\version_compare(PHP_VERSION, $required['PHP']['version'], $operator)) {
                $missing[] = \sprintf('PHP %s %s is required.', $operator, $required['PHP']['version']);
            }
        } elseif (!empty($required['PHP_constraint'])) {
            $version = new \PharIo\Version\Version(self::sanitizeVersionNumber(PHP_VERSION));

            if (!$required['PHP_constraint']['constraint']->complies($version)) {
                $missing[] = \sprintf(
                    'PHP version does not match the required constraint %s.',
                    $required['PHP_constraint']['constraint']->asString()
                );
            }
        }

        if (!empty($required['PHPUnit'])) {
            $phpunitVersion = Version::id();

            $operator = empty($required['PHPUnit']['operator']) ? '>=' : $required['PHPUnit']['operator'];

            if (!\version_compare($phpunitVersion, $required['PHPUnit']['version'], $operator)) {
                $missing[] = \sprintf('PHPUnit %s %s is required.', $operator, $required['PHPUnit']['version']);
            }
        } elseif (!empty($required['PHPUnit_constraint'])) {
            $phpunitVersion = new \PharIo\Version\Version(self::sanitizeVersionNumber(Version::id()));

            if (!$required['PHPUnit_constraint']['constraint']->complies($phpunitVersion)) {
                $missing[] = \sprintf(
                    'PHPUnit version does not match the required constraint %s.',
                    $required['PHPUnit_constraint']['constraint']->asString()
                );
            }
        }

        if (!empty($required['OSFAMILY']) && $required['OSFAMILY'] !== (new OperatingSystem())->getFamily()) {
            $missing[] = \sprintf('Operating system %s is required.', $required['OSFAMILY']);
        }

        if (!empty($required['OS'])) {
            $requiredOsPattern = \sprintf('/%s/i', \addcslashes($required['OS'], '/'));
            if (!\preg_match($requiredOsPattern, PHP_OS)) {
                $missing[] = \sprintf('Operating system matching %s is required.', $requiredOsPattern);
            }
>>>>>>> dev
        }

        if (!empty($required['functions'])) {
            foreach ($required['functions'] as $function) {
<<<<<<< HEAD
                $pieces = explode('::', $function);
                if (2 === count($pieces) && method_exists($pieces[0], $pieces[1])) {
                    continue;
                }
                if (function_exists($function)) {
                    continue;
                }
                $missing[] = sprintf('Function %s is required.', $function);
=======
                $pieces = \explode('::', $function);

                if (2 === \count($pieces) && \method_exists($pieces[0], $pieces[1])) {
                    continue;
                }

                if (\function_exists($function)) {
                    continue;
                }

                $missing[] = \sprintf('Function %s is required.', $function);
>>>>>>> dev
            }
        }

        if (!empty($required['extensions'])) {
            foreach ($required['extensions'] as $extension) {
<<<<<<< HEAD
                if (!extension_loaded($extension)) {
                    $missing[] = sprintf('Extension %s is required.', $extension);
=======
                if (isset($required['extension_versions'][$extension])) {
                    continue;
                }

                if (!\extension_loaded($extension)) {
                    $missing[] = \sprintf('Extension %s is required.', $extension);
                }
            }
        }

        if (!empty($required['extension_versions'])) {
            foreach ($required['extension_versions'] as $extension => $required) {
                $actualVersion = \phpversion($extension);

                $operator = empty($required['operator']) ? '>=' : $required['operator'];

                if (false === $actualVersion || !\version_compare($actualVersion, $required['version'], $operator)) {
                    $missing[] = \sprintf('Extension %s %s %s is required.', $extension, $operator, $required['version']);
>>>>>>> dev
                }
            }
        }

        return $missing;
    }

    /**
     * Returns the expected exception for a test.
     *
     * @param string $className
     * @param string $methodName
     *
<<<<<<< HEAD
     * @return array
     *
     * @since  Method available since Release 3.3.6
=======
     * @return array|false
>>>>>>> dev
     */
    public static function getExpectedException($className, $methodName)
    {
        $reflector  = new ReflectionMethod($className, $methodName);
        $docComment = $reflector->getDocComment();
<<<<<<< HEAD
        $docComment = substr($docComment, 3, -2);

        if (preg_match(self::REGEX_EXPECTED_EXCEPTION, $docComment, $matches)) {
=======
        $docComment = \substr($docComment, 3, -2);

        if (\preg_match(self::REGEX_EXPECTED_EXCEPTION, $docComment, $matches)) {
>>>>>>> dev
            $annotations = self::parseTestMethodAnnotations(
                $className,
                $methodName
            );

            $class         = $matches[1];
            $code          = null;
            $message       = '';
            $messageRegExp = '';

            if (isset($matches[2])) {
<<<<<<< HEAD
                $message = trim($matches[2]);
=======
                $message = \trim($matches[2]);
>>>>>>> dev
            } elseif (isset($annotations['method']['expectedExceptionMessage'])) {
                $message = self::parseAnnotationContent(
                    $annotations['method']['expectedExceptionMessage'][0]
                );
            }

            if (isset($annotations['method']['expectedExceptionMessageRegExp'])) {
                $messageRegExp = self::parseAnnotationContent(
                    $annotations['method']['expectedExceptionMessageRegExp'][0]
                );
            }

            if (isset($matches[3])) {
                $code = $matches[3];
            } elseif (isset($annotations['method']['expectedExceptionCode'])) {
                $code = self::parseAnnotationContent(
                    $annotations['method']['expectedExceptionCode'][0]
                );
            }

<<<<<<< HEAD
            if (is_numeric($code)) {
                $code = (int) $code;
            } elseif (is_string($code) && defined($code)) {
                $code = (int) constant($code);
            }

            return array(
              'class' => $class, 'code' => $code, 'message' => $message, 'message_regex' => $messageRegExp
            );
=======
            if (\is_numeric($code)) {
                $code = (int) $code;
            } elseif (\is_string($code) && \defined($code)) {
                $code = (int) \constant($code);
            }

            return [
                'class' => $class, 'code' => $code, 'message' => $message, 'message_regex' => $messageRegExp
            ];
>>>>>>> dev
        }

        return false;
    }

    /**
     * Parse annotation content to use constant/class constant values
     *
     * Constants are specified using a starting '@'. For example: @ClassName::CONST_NAME
     *
     * If the constant is not found the string is used as is to ensure maximum BC.
     *
     * @param string $message
     *
     * @return string
     */
    private static function parseAnnotationContent($message)
    {
<<<<<<< HEAD
        if (strpos($message, '::') !== false && count(explode('::', $message)) == 2) {
            if (defined($message)) {
                $message = constant($message);
            }
=======
        if ((\strpos($message, '::') !== false && \count(\explode('::', $message)) == 2) && \defined($message)) {
            $message = \constant($message);
>>>>>>> dev
        }

        return $message;
    }

    /**
     * Returns the provided data for a method.
     *
     * @param string $className
     * @param string $methodName
     *
<<<<<<< HEAD
     * @return array|Iterator when a data provider is specified and exists
     *                        null           when no data provider is specified
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 3.2.0
=======
     * @return array When a data provider is specified and exists
     *               null  When no data provider is specified
     *
     * @throws Exception
>>>>>>> dev
     */
    public static function getProvidedData($className, $methodName)
    {
        $reflector  = new ReflectionMethod($className, $methodName);
        $docComment = $reflector->getDocComment();

        $data = self::getDataFromDataProviderAnnotation($docComment, $className, $methodName);

        if ($data === null) {
            $data = self::getDataFromTestWithAnnotation($docComment);
        }

<<<<<<< HEAD
        if (is_array($data) && empty($data)) {
            throw new PHPUnit_Framework_SkippedTestError;
        }

        if ($data !== null) {
            if (is_object($data)) {
                $data = iterator_to_array($data);
            }

            foreach ($data as $key => $value) {
                if (!is_array($value)) {
                    throw new PHPUnit_Framework_Exception(
                        sprintf(
                            'Data set %s is invalid.',
                            is_int($key) ? '#' . $key : '"' . $key . '"'
=======
        if (\is_array($data) && empty($data)) {
            throw new SkippedTestError;
        }

        if ($data !== null) {
            foreach ($data as $key => $value) {
                if (!\is_array($value)) {
                    throw new Exception(
                        \sprintf(
                            'Data set %s is invalid.',
                            \is_int($key) ? '#' . $key : '"' . $key . '"'
>>>>>>> dev
                        )
                    );
                }
            }
        }

        return $data;
    }

    /**
     * Returns the provided data for a method.
     *
     * @param string $docComment
     * @param string $className
     * @param string $methodName
     *
     * @return array|Iterator when a data provider is specified and exists
     *                        null           when no data provider is specified
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     */
    private static function getDataFromDataProviderAnnotation($docComment, $className, $methodName)
    {
        if (preg_match(self::REGEX_DATA_PROVIDER, $docComment, $matches)) {
            $dataProviderMethodNameNamespace = explode('\\', $matches[1]);
            $leaf                            = explode('::', array_pop($dataProviderMethodNameNamespace));
            $dataProviderMethodName          = array_pop($leaf);

            if (!empty($dataProviderMethodNameNamespace)) {
                $dataProviderMethodNameNamespace = implode('\\', $dataProviderMethodNameNamespace) . '\\';
            } else {
                $dataProviderMethodNameNamespace = '';
            }

            if (!empty($leaf)) {
                $dataProviderClassName = $dataProviderMethodNameNamespace . array_pop($leaf);
            } else {
                $dataProviderClassName = $className;
            }

            $dataProviderClass  = new ReflectionClass($dataProviderClassName);
            $dataProviderMethod = $dataProviderClass->getMethod(
                $dataProviderMethodName
            );

            if ($dataProviderMethod->isStatic()) {
                $object = null;
            } else {
                $object = $dataProviderClass->newInstance();
            }

            if ($dataProviderMethod->getNumberOfParameters() == 0) {
                $data = $dataProviderMethod->invoke($object);
            } else {
                $data = $dataProviderMethod->invoke($object, $methodName);
            }

            return $data;
=======
     * @throws Exception
     */
    private static function getDataFromDataProviderAnnotation($docComment, $className, $methodName)
    {
        if (\preg_match_all(self::REGEX_DATA_PROVIDER, $docComment, $matches)) {
            $result = [];

            foreach ($matches[1] as $match) {
                $dataProviderMethodNameNamespace = \explode('\\', $match);
                $leaf                            = \explode('::', \array_pop($dataProviderMethodNameNamespace));
                $dataProviderMethodName          = \array_pop($leaf);

                if (!empty($dataProviderMethodNameNamespace)) {
                    $dataProviderMethodNameNamespace = \implode('\\', $dataProviderMethodNameNamespace) . '\\';
                } else {
                    $dataProviderMethodNameNamespace = '';
                }

                if (!empty($leaf)) {
                    $dataProviderClassName = $dataProviderMethodNameNamespace . \array_pop($leaf);
                } else {
                    $dataProviderClassName = $className;
                }

                $dataProviderClass  = new ReflectionClass($dataProviderClassName);
                $dataProviderMethod = $dataProviderClass->getMethod(
                    $dataProviderMethodName
                );

                if ($dataProviderMethod->isStatic()) {
                    $object = null;
                } else {
                    $object = $dataProviderClass->newInstance();
                }

                if ($dataProviderMethod->getNumberOfParameters() == 0) {
                    $data = $dataProviderMethod->invoke($object);
                } else {
                    $data = $dataProviderMethod->invoke($object, $methodName);
                }

                if ($data instanceof Traversable) {
                    $origData = $data;
                    $data     = [];
                    foreach ($origData as $key => $value) {
                        if (\is_int($key)) {
                            $data[] = $value;
                        } else {
                            $data[$key] = $value;
                        }
                    }
                }

                if (\is_array($data)) {
                    $result = \array_merge($result, $data);
                }
            }

            return $result;
>>>>>>> dev
        }
    }

    /**
     * @param string $docComment full docComment string
     *
<<<<<<< HEAD
     * @return array when @testWith annotation is defined
     *               null  when @testWith annotation is omitted
     *
     * @throws PHPUnit_Framework_Exception when @testWith annotation is defined but cannot be parsed
=======
     * @return array|null array when @testWith annotation is defined,
     *                    null when @testWith annotation is omitted
     *
     * @throws Exception when @testWith annotation is defined but cannot be parsed
>>>>>>> dev
     */
    public static function getDataFromTestWithAnnotation($docComment)
    {
        $docComment = self::cleanUpMultiLineAnnotation($docComment);

<<<<<<< HEAD
        if (preg_match(self::REGEX_TEST_WITH, $docComment, $matches, PREG_OFFSET_CAPTURE)) {
            $offset            = strlen($matches[0][0]) + $matches[0][1];
            $annotationContent = substr($docComment, $offset);
            $data              = array();

            foreach (explode("\n", $annotationContent) as $candidateRow) {
                $candidateRow = trim($candidateRow);
=======
        if (\preg_match(self::REGEX_TEST_WITH, $docComment, $matches, PREG_OFFSET_CAPTURE)) {
            $offset            = \strlen($matches[0][0]) + $matches[0][1];
            $annotationContent = \substr($docComment, $offset);
            $data              = [];

            foreach (\explode("\n", $annotationContent) as $candidateRow) {
                $candidateRow = \trim($candidateRow);
>>>>>>> dev

                if ($candidateRow[0] !== '[') {
                    break;
                }

<<<<<<< HEAD
                $dataSet = json_decode($candidateRow, true);

                if (json_last_error() != JSON_ERROR_NONE) {
                    $error = function_exists('json_last_error_msg') ? json_last_error_msg() : json_last_error();

                    throw new PHPUnit_Framework_Exception(
                        'The dataset for the @testWith annotation cannot be parsed: ' . $error
=======
                $dataSet = \json_decode($candidateRow, true);

                if (\json_last_error() != JSON_ERROR_NONE) {
                    throw new Exception(
                        'The dataset for the @testWith annotation cannot be parsed: ' . \json_last_error_msg()
>>>>>>> dev
                    );
                }

                $data[] = $dataSet;
            }

            if (!$data) {
<<<<<<< HEAD
                throw new PHPUnit_Framework_Exception('The dataset for the @testWith annotation cannot be parsed.');
=======
                throw new Exception('The dataset for the @testWith annotation cannot be parsed.');
>>>>>>> dev
            }

            return $data;
        }
    }

    private static function cleanUpMultiLineAnnotation($docComment)
    {
        //removing initial '   * ' for docComment
<<<<<<< HEAD
        $docComment = preg_replace('/' . '\n' . '\s*' . '\*' . '\s?' . '/', "\n", $docComment);
        $docComment = substr($docComment, 0, -1);
        $docComment = rtrim($docComment, "\n");
=======
        $docComment = \str_replace("\r\n", "\n", $docComment);
        $docComment = \preg_replace('/' . '\n' . '\s*' . '\*' . '\s?' . '/', "\n", $docComment);
        $docComment = \substr($docComment, 0, -1);
        $docComment = \rtrim($docComment, "\n");
>>>>>>> dev

        return $docComment;
    }

    /**
     * @param string $className
     * @param string $methodName
     *
     * @return array
     *
     * @throws ReflectionException
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public static function parseTestMethodAnnotations($className, $methodName = '')
    {
        if (!isset(self::$annotationCache[$className])) {
<<<<<<< HEAD
            $class                             = new ReflectionClass($className);
            self::$annotationCache[$className] = self::parseAnnotations($class->getDocComment());
=======
            $class       = new ReflectionClass($className);
            $traits      = $class->getTraits();
            $annotations = [];

            foreach ($traits as $trait) {
                $annotations = \array_merge(
                    $annotations,
                    self::parseAnnotations($trait->getDocComment())
                );
            }

            self::$annotationCache[$className] = \array_merge(
                $annotations,
                self::parseAnnotations($class->getDocComment())
            );
>>>>>>> dev
        }

        if (!empty($methodName) && !isset(self::$annotationCache[$className . '::' . $methodName])) {
            try {
                $method      = new ReflectionMethod($className, $methodName);
                $annotations = self::parseAnnotations($method->getDocComment());
            } catch (ReflectionException $e) {
<<<<<<< HEAD
                $annotations = array();
            }
            self::$annotationCache[$className . '::' . $methodName] = $annotations;
        }

        return array(
          'class'  => self::$annotationCache[$className],
          'method' => !empty($methodName) ? self::$annotationCache[$className . '::' . $methodName] : array()
        );
    }

    /**
     * @param string $docblock
     *
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    private static function parseAnnotations($docblock)
    {
        $annotations = array();
        // Strip away the docblock header and footer to ease parsing of one line annotations
        $docblock = substr($docblock, 3, -2);

        if (preg_match_all('/@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/m', $docblock, $matches)) {
            $numMatches = count($matches[0]);

            for ($i = 0; $i < $numMatches; ++$i) {
                $annotations[$matches['name'][$i]][] = $matches['value'][$i];
=======
                $annotations = [];
            }

            self::$annotationCache[$className . '::' . $methodName] = $annotations;
        }

        return [
            'class'  => self::$annotationCache[$className],
            'method' => !empty($methodName) ? self::$annotationCache[$className . '::' . $methodName] : []
        ];
    }

    /**
     * @param string $className
     * @param string $methodName
     *
     * @return array
     */
    public static function getInlineAnnotations($className, $methodName)
    {
        $method      = new ReflectionMethod($className, $methodName);
        $code        = \file($method->getFileName());
        $lineNumber  = $method->getStartLine();
        $startLine   = $method->getStartLine() - 1;
        $endLine     = $method->getEndLine() - 1;
        $methodLines = \array_slice($code, $startLine, $endLine - $startLine + 1);
        $annotations = [];

        foreach ($methodLines as $line) {
            if (\preg_match('#/\*\*?\s*@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?\*/$#m', $line, $matches)) {
                $annotations[\strtolower($matches['name'])] = [
                    'line'  => $lineNumber,
                    'value' => $matches['value']
                ];
            }

            $lineNumber++;
        }

        return $annotations;
    }

    /**
     * @param string $docblock
     *
     * @return array
     */
    private static function parseAnnotations($docblock)
    {
        $annotations = [];
        // Strip away the docblock header and footer to ease parsing of one line annotations
        $docblock = \substr($docblock, 3, -2);

        if (\preg_match_all('/@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/m', $docblock, $matches)) {
            $numMatches = \count($matches[0]);

            for ($i = 0; $i < $numMatches; ++$i) {
                $annotations[$matches['name'][$i]][] = (string) $matches['value'][$i];
>>>>>>> dev
            }
        }

        return $annotations;
    }

    /**
     * Returns the backup settings for a test.
     *
     * @param string $className
     * @param string $methodName
     *
<<<<<<< HEAD
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    public static function getBackupSettings($className, $methodName)
    {
        return array(
          'backupGlobals' => self::getBooleanAnnotationSetting(
              $className,
              $methodName,
              'backupGlobals'
          ),
          'backupStaticAttributes' => self::getBooleanAnnotationSetting(
              $className,
              $methodName,
              'backupStaticAttributes'
          )
        );
=======
     * @return array<string, bool|null>
     */
    public static function getBackupSettings($className, $methodName)
    {
        return [
            'backupGlobals' => self::getBooleanAnnotationSetting(
                $className,
                $methodName,
                'backupGlobals'
            ),
            'backupStaticAttributes' => self::getBooleanAnnotationSetting(
                $className,
                $methodName,
                'backupStaticAttributes'
            )
        ];
>>>>>>> dev
    }

    /**
     * Returns the dependencies for a test class or method.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
=======
>>>>>>> dev
     */
    public static function getDependencies($className, $methodName)
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

<<<<<<< HEAD
        $dependencies = array();
=======
        $dependencies = [];
>>>>>>> dev

        if (isset($annotations['class']['depends'])) {
            $dependencies = $annotations['class']['depends'];
        }

        if (isset($annotations['method']['depends'])) {
<<<<<<< HEAD
            $dependencies = array_merge(
=======
            $dependencies = \array_merge(
>>>>>>> dev
                $dependencies,
                $annotations['method']['depends']
            );
        }

<<<<<<< HEAD
        return array_unique($dependencies);
=======
        return \array_unique($dependencies);
>>>>>>> dev
    }

    /**
     * Returns the error handler settings for a test.
     *
     * @param string $className
     * @param string $methodName
     *
<<<<<<< HEAD
     * @return bool
     *
     * @since  Method available since Release 3.4.0
=======
     * @return ?bool
>>>>>>> dev
     */
    public static function getErrorHandlerSettings($className, $methodName)
    {
        return self::getBooleanAnnotationSetting(
            $className,
            $methodName,
            'errorHandler'
        );
    }

    /**
     * Returns the groups for a test class or method.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.2.0
=======
>>>>>>> dev
     */
    public static function getGroups($className, $methodName = '')
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

<<<<<<< HEAD
        $groups = array();
=======
        $groups = [];
>>>>>>> dev

        if (isset($annotations['method']['author'])) {
            $groups = $annotations['method']['author'];
        } elseif (isset($annotations['class']['author'])) {
            $groups = $annotations['class']['author'];
        }

        if (isset($annotations['class']['group'])) {
<<<<<<< HEAD
            $groups = array_merge($groups, $annotations['class']['group']);
        }

        if (isset($annotations['method']['group'])) {
            $groups = array_merge($groups, $annotations['method']['group']);
        }

        if (isset($annotations['class']['ticket'])) {
            $groups = array_merge($groups, $annotations['class']['ticket']);
        }

        if (isset($annotations['method']['ticket'])) {
            $groups = array_merge($groups, $annotations['method']['ticket']);
        }

        foreach (array('method', 'class') as $element) {
            foreach (array('small', 'medium', 'large') as $size) {
                if (isset($annotations[$element][$size])) {
                    $groups[] = $size;
                    break 2;
                }

                if (isset($annotations[$element][$size])) {
                    $groups[] = $size;
=======
            $groups = \array_merge($groups, $annotations['class']['group']);
        }

        if (isset($annotations['method']['group'])) {
            $groups = \array_merge($groups, $annotations['method']['group']);
        }

        if (isset($annotations['class']['ticket'])) {
            $groups = \array_merge($groups, $annotations['class']['ticket']);
        }

        if (isset($annotations['method']['ticket'])) {
            $groups = \array_merge($groups, $annotations['method']['ticket']);
        }

        foreach (['method', 'class'] as $element) {
            foreach (['small', 'medium', 'large'] as $size) {
                if (isset($annotations[$element][$size])) {
                    $groups[] = $size;

>>>>>>> dev
                    break 2;
                }
            }
        }

<<<<<<< HEAD
        return array_unique($groups);
=======
        return \array_unique($groups);
>>>>>>> dev
    }

    /**
     * Returns the size of the test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return int
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.6.0
     */
    public static function getSize($className, $methodName)
    {
        $groups = array_flip(self::getGroups($className, $methodName));
        $size   = self::UNKNOWN;
        $class  = new ReflectionClass($className);

        if (isset($groups['large']) ||
            (class_exists('PHPUnit_Extensions_Database_TestCase', false) &&
             $class->isSubclassOf('PHPUnit_Extensions_Database_TestCase')) ||
            (class_exists('PHPUnit_Extensions_SeleniumTestCase', false) &&
             $class->isSubclassOf('PHPUnit_Extensions_SeleniumTestCase'))) {
            $size = self::LARGE;
        } elseif (isset($groups['medium'])) {
            $size = self::MEDIUM;
        } elseif (isset($groups['small'])) {
            $size = self::SMALL;
        }

        return $size;
    }

    /**
     * Returns the tickets for a test class or method.
=======
     */
    public static function getSize($className, $methodName)
    {
        $groups = \array_flip(self::getGroups($className, $methodName));
        $class  = new ReflectionClass($className);

        if (isset($groups['large']) ||
            (\class_exists('PHPUnit\DbUnit\TestCase', false) && $class->isSubclassOf('PHPUnit\DbUnit\TestCase'))) {
            return self::LARGE;
        }

        if (isset($groups['medium'])) {
            return self::MEDIUM;
        }

        if (isset($groups['small'])) {
            return self::SMALL;
        }

        return self::UNKNOWN;
    }

    /**
     * Returns the process isolation settings for a test.
>>>>>>> dev
     *
     * @param string $className
     * @param string $methodName
     *
<<<<<<< HEAD
     * @return array
     *
     * @since  Method available since Release 3.4.0
     */
    public static function getTickets($className, $methodName)
=======
     * @return bool
     */
    public static function getProcessIsolationSettings($className, $methodName)
>>>>>>> dev
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

<<<<<<< HEAD
        $tickets = array();

        if (isset($annotations['class']['ticket'])) {
            $tickets = $annotations['class']['ticket'];
        }

        if (isset($annotations['method']['ticket'])) {
            $tickets = array_merge($tickets, $annotations['method']['ticket']);
        }

        return array_unique($tickets);
    }

    /**
     * Returns the process isolation settings for a test.
     *
     * @param string $className
     * @param string $methodName
     *
     * @return bool
     *
     * @since  Method available since Release 3.4.1
     */
    public static function getProcessIsolationSettings($className, $methodName)
=======
        return isset($annotations['class']['runTestsInSeparateProcesses']) || isset($annotations['method']['runInSeparateProcess']);
    }

    public static function getClassProcessIsolationSettings($className, $methodName)
>>>>>>> dev
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

<<<<<<< HEAD
        if (isset($annotations['class']['runTestsInSeparateProcesses']) ||
            isset($annotations['method']['runInSeparateProcess'])) {
            return true;
        } else {
            return false;
        }
=======
        return isset($annotations['class']['runClassInSeparateProcess']);
>>>>>>> dev
    }

    /**
     * Returns the preserve global state settings for a test.
     *
     * @param string $className
     * @param string $methodName
     *
<<<<<<< HEAD
     * @return bool
     *
     * @since  Method available since Release 3.4.0
=======
     * @return ?bool
>>>>>>> dev
     */
    public static function getPreserveGlobalStateSettings($className, $methodName)
    {
        return self::getBooleanAnnotationSetting(
            $className,
            $methodName,
            'preserveGlobalState'
        );
    }

    /**
     * @param string $className
     *
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.8
     */
    public static function getHookMethods($className)
    {
        if (!class_exists($className, false)) {
=======
     */
    public static function getHookMethods($className)
    {
        if (!\class_exists($className, false)) {
>>>>>>> dev
            return self::emptyHookMethodsArray();
        }

        if (!isset(self::$hookMethods[$className])) {
            self::$hookMethods[$className] = self::emptyHookMethodsArray();

            try {
                $class = new ReflectionClass($className);

                foreach ($class->getMethods() as $method) {
                    if (self::isBeforeClassMethod($method)) {
<<<<<<< HEAD
                        self::$hookMethods[$className]['beforeClass'][] = $method->getName();
                    }

                    if (self::isBeforeMethod($method)) {
                        self::$hookMethods[$className]['before'][] = $method->getName();
=======
                        \array_unshift(
                            self::$hookMethods[$className]['beforeClass'],
                            $method->getName()
                        );
                    }

                    if (self::isBeforeMethod($method)) {
                        \array_unshift(
                            self::$hookMethods[$className]['before'],
                            $method->getName()
                        );
>>>>>>> dev
                    }

                    if (self::isAfterMethod($method)) {
                        self::$hookMethods[$className]['after'][] = $method->getName();
                    }

                    if (self::isAfterClassMethod($method)) {
                        self::$hookMethods[$className]['afterClass'][] = $method->getName();
                    }
                }
            } catch (ReflectionException $e) {
            }
        }

        return self::$hookMethods[$className];
    }

    /**
     * @return array
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.9
     */
    private static function emptyHookMethodsArray()
    {
        return array(
            'beforeClass' => array('setUpBeforeClass'),
            'before'      => array('setUp'),
            'after'       => array('tearDown'),
            'afterClass'  => array('tearDownAfterClass')
        );
=======
     */
    private static function emptyHookMethodsArray()
    {
        return [
            'beforeClass' => ['setUpBeforeClass'],
            'before'      => ['setUp'],
            'after'       => ['tearDown'],
            'afterClass'  => ['tearDownAfterClass']
        ];
>>>>>>> dev
    }

    /**
     * @param string $className
     * @param string $methodName
     * @param string $settingName
     *
<<<<<<< HEAD
     * @return bool
     *
     * @since  Method available since Release 3.4.0
=======
     * @return ?bool
>>>>>>> dev
     */
    private static function getBooleanAnnotationSetting($className, $methodName, $settingName)
    {
        $annotations = self::parseTestMethodAnnotations(
            $className,
            $methodName
        );

<<<<<<< HEAD
        $result = null;

        if (isset($annotations['class'][$settingName])) {
            if ($annotations['class'][$settingName][0] == 'enabled') {
                $result = true;
            } elseif ($annotations['class'][$settingName][0] == 'disabled') {
                $result = false;
            }
        }

        if (isset($annotations['method'][$settingName])) {
            if ($annotations['method'][$settingName][0] == 'enabled') {
                $result = true;
            } elseif ($annotations['method'][$settingName][0] == 'disabled') {
                $result = false;
            }
        }

        return $result;
=======
        if (isset($annotations['method'][$settingName])) {
            if ($annotations['method'][$settingName][0] === 'enabled') {
                return true;
            }

            if ($annotations['method'][$settingName][0] === 'disabled') {
                return false;
            }
        }

        if (isset($annotations['class'][$settingName])) {
            if ($annotations['class'][$settingName][0] === 'enabled') {
                return true;
            }

            if ($annotations['class'][$settingName][0] === 'disabled') {
                return false;
            }
        }
>>>>>>> dev
    }

    /**
     * @param string $element
     *
     * @return array
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_InvalidCoversTargetException
     *
     * @since  Method available since Release 4.0.0
     */
    private static function resolveElementToReflectionObjects($element)
    {
        $codeToCoverList = array();

        if (strpos($element, '\\') !== false && function_exists($element)) {
            $codeToCoverList[] = new ReflectionFunction($element);
        } elseif (strpos($element, '::') !== false) {
            list($className, $methodName) = explode('::', $element);

            if (isset($methodName[0]) && $methodName[0] == '<') {
                $classes = array($className);

                foreach ($classes as $className) {
                    if (!class_exists($className) &&
                        !interface_exists($className)) {
                        throw new PHPUnit_Framework_InvalidCoversTargetException(
                            sprintf(
=======
     * @throws InvalidCoversTargetException
     */
    private static function resolveElementToReflectionObjects($element)
    {
        $codeToCoverList = [];

        if (\strpos($element, '\\') !== false && \function_exists($element)) {
            $codeToCoverList[] = new ReflectionFunction($element);
        } elseif (\strpos($element, '::') !== false) {
            list($className, $methodName) = \explode('::', $element);

            if (isset($methodName[0]) && $methodName[0] == '<') {
                $classes = [$className];

                foreach ($classes as $className) {
                    if (!\class_exists($className) &&
                        !\interface_exists($className) &&
                        !\trait_exists($className)) {
                        throw new InvalidCoversTargetException(
                            \sprintf(
>>>>>>> dev
                                'Trying to @cover or @use not existing class or ' .
                                'interface "%s".',
                                $className
                            )
                        );
                    }

                    $class   = new ReflectionClass($className);
                    $methods = $class->getMethods();
                    $inverse = isset($methodName[1]) && $methodName[1] == '!';

<<<<<<< HEAD
                    if (strpos($methodName, 'protected')) {
                        $visibility = 'isProtected';
                    } elseif (strpos($methodName, 'private')) {
                        $visibility = 'isPrivate';
                    } elseif (strpos($methodName, 'public')) {
=======
                    if (\strpos($methodName, 'protected')) {
                        $visibility = 'isProtected';
                    } elseif (\strpos($methodName, 'private')) {
                        $visibility = 'isPrivate';
                    } elseif (\strpos($methodName, 'public')) {
>>>>>>> dev
                        $visibility = 'isPublic';
                    }

                    foreach ($methods as $method) {
                        if ($inverse && !$method->$visibility()) {
                            $codeToCoverList[] = $method;
                        } elseif (!$inverse && $method->$visibility()) {
                            $codeToCoverList[] = $method;
                        }
                    }
                }
            } else {
<<<<<<< HEAD
                $classes = array($className);

                foreach ($classes as $className) {
                    if ($className == '' && function_exists($methodName)) {
=======
                $classes = [$className];

                foreach ($classes as $className) {
                    if ($className == '' && \function_exists($methodName)) {
>>>>>>> dev
                        $codeToCoverList[] = new ReflectionFunction(
                            $methodName
                        );
                    } else {
<<<<<<< HEAD
                        if (!((class_exists($className) ||
                               interface_exists($className) ||
                               trait_exists($className)) &&
                              method_exists($className, $methodName))) {
                            throw new PHPUnit_Framework_InvalidCoversTargetException(
                                sprintf(
=======
                        if (!((\class_exists($className) || \interface_exists($className) || \trait_exists($className)) &&
                            \method_exists($className, $methodName))) {
                            throw new InvalidCoversTargetException(
                                \sprintf(
>>>>>>> dev
                                    'Trying to @cover or @use not existing method "%s::%s".',
                                    $className,
                                    $methodName
                                )
                            );
                        }

                        $codeToCoverList[] = new ReflectionMethod(
                            $className,
                            $methodName
                        );
                    }
                }
            }
        } else {
            $extended = false;

<<<<<<< HEAD
            if (strpos($element, '<extended>') !== false) {
                $element  = str_replace('<extended>', '', $element);
                $extended = true;
            }

            $classes = array($element);

            if ($extended) {
                $classes = array_merge(
                    $classes,
                    class_implements($element),
                    class_parents($element)
=======
            if (\strpos($element, '<extended>') !== false) {
                $element  = \str_replace('<extended>', '', $element);
                $extended = true;
            }

            $classes = [$element];

            if ($extended) {
                $classes = \array_merge(
                    $classes,
                    \class_implements($element),
                    \class_parents($element)
>>>>>>> dev
                );
            }

            foreach ($classes as $className) {
<<<<<<< HEAD
                if (!class_exists($className) &&
                    !interface_exists($className) &&
                    !trait_exists($className)) {
                    throw new PHPUnit_Framework_InvalidCoversTargetException(
                        sprintf(
=======
                if (!\class_exists($className) &&
                    !\interface_exists($className) &&
                    !\trait_exists($className)) {
                    throw new InvalidCoversTargetException(
                        \sprintf(
>>>>>>> dev
                            'Trying to @cover or @use not existing class or ' .
                            'interface "%s".',
                            $className
                        )
                    );
                }

                $codeToCoverList[] = new ReflectionClass($className);
            }
        }

        return $codeToCoverList;
    }

    /**
     * @param array $reflectors
     *
     * @return array
     */
    private static function resolveReflectionObjectsToLines(array $reflectors)
    {
<<<<<<< HEAD
        $result = array();
=======
        $result = [];
>>>>>>> dev

        foreach ($reflectors as $reflector) {
            $filename = $reflector->getFileName();

            if (!isset($result[$filename])) {
<<<<<<< HEAD
                $result[$filename] = array();
            }

            $result[$filename] = array_unique(
                array_merge(
                    $result[$filename],
                    range($reflector->getStartLine(), $reflector->getEndLine())
                )
            );
        }

=======
                $result[$filename] = [];
            }

            $result[$filename] = \array_merge(
                $result[$filename],
                \range($reflector->getStartLine(), $reflector->getEndLine())
            );
        }

        foreach ($result as $filename => $lineNumbers) {
            $result[$filename] = \array_keys(\array_flip($lineNumbers));
        }

>>>>>>> dev
        return $result;
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.8
     */
    private static function isBeforeClassMethod(ReflectionMethod $method)
    {
        return $method->isStatic() && strpos($method->getDocComment(), '@beforeClass') !== false;
=======
     */
    private static function isBeforeClassMethod(ReflectionMethod $method)
    {
        return $method->isStatic() && \strpos($method->getDocComment(), '@beforeClass') !== false;
>>>>>>> dev
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.8
     */
    private static function isBeforeMethod(ReflectionMethod $method)
    {
        return preg_match('/@before\b/', $method->getDocComment());
=======
     */
    private static function isBeforeMethod(ReflectionMethod $method)
    {
        return \preg_match('/@before\b/', $method->getDocComment()) > 0;
>>>>>>> dev
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.8
     */
    private static function isAfterClassMethod(ReflectionMethod $method)
    {
        return $method->isStatic() && strpos($method->getDocComment(), '@afterClass') !== false;
=======
     */
    private static function isAfterClassMethod(ReflectionMethod $method)
    {
        return $method->isStatic() && \strpos($method->getDocComment(), '@afterClass') !== false;
>>>>>>> dev
    }

    /**
     * @param ReflectionMethod $method
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.8
     */
    private static function isAfterMethod(ReflectionMethod $method)
    {
        return preg_match('/@after\b/', $method->getDocComment());
=======
     */
    private static function isAfterMethod(ReflectionMethod $method)
    {
        return \preg_match('/@after\b/', $method->getDocComment()) > 0;
    }

    /**
     * Trims any extensions from version string that follows after
     * the <major>.<minor>[.<patch>] format
     *
     * @param $version (Optional)
     *
     * @return mixed
     */
    private static function sanitizeVersionNumber($version)
    {
        return \preg_replace(
            '/^(\d+\.\d+(?:.\d+)?).*$/',
            '$1',
            $version
        );
>>>>>>> dev
    }
}
