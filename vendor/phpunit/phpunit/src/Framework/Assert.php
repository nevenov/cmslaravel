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
 * A set of assertion methods.
 *
 * @since Class available since Release 2.0.0
 */
abstract class PHPUnit_Framework_Assert
=======
namespace PHPUnit\Framework;

use ArrayAccess;
use Countable;
use DOMDocument;
use DOMElement;
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\Constraint\ArraySubset;
use PHPUnit\Framework\Constraint\Attribute;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\Constraint\ClassHasAttribute;
use PHPUnit\Framework\Constraint\ClassHasStaticAttribute;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\Constraint\DirectoryExists;
use PHPUnit\Framework\Constraint\FileExists;
use PHPUnit\Framework\Constraint\GreaterThan;
use PHPUnit\Framework\Constraint\IsAnything;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsFinite;
use PHPUnit\Framework\Constraint\IsIdentical;
use PHPUnit\Framework\Constraint\IsInfinite;
use PHPUnit\Framework\Constraint\IsInstanceOf;
use PHPUnit\Framework\Constraint\IsJson;
use PHPUnit\Framework\Constraint\IsNan;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\Constraint\IsReadable;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\Constraint\IsWritable;
use PHPUnit\Framework\Constraint\JsonMatches;
use PHPUnit\Framework\Constraint\LessThan;
use PHPUnit\Framework\Constraint\LogicalAnd;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\LogicalOr;
use PHPUnit\Framework\Constraint\LogicalXor;
use PHPUnit\Framework\Constraint\ObjectHasAttribute;
use PHPUnit\Framework\Constraint\RegularExpression;
use PHPUnit\Framework\Constraint\SameSize;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Framework\Constraint\StringEndsWith;
use PHPUnit\Framework\Constraint\StringMatchesFormatDescription;
use PHPUnit\Framework\Constraint\StringStartsWith;
use PHPUnit\Framework\Constraint\TraversableContains;
use PHPUnit\Framework\Constraint\TraversableContainsOnly;
use PHPUnit\Util\InvalidArgumentHelper;
use PHPUnit\Util\Type;
use PHPUnit\Util\Xml;
use ReflectionClass;
use ReflectionException;
use ReflectionObject;
use ReflectionProperty;
use Traversable;

/**
 * A set of assertion methods.
 */
abstract class Assert
>>>>>>> dev
{
    /**
     * @var int
     */
    private static $count = 0;

    /**
     * Asserts that an array has a specified key.
     *
     * @param mixed             $key
     * @param array|ArrayAccess $array
     * @param string            $message
<<<<<<< HEAD
     *
     * @since Method available since Release 3.0.0
     */
    public static function assertArrayHasKey($key, $array, $message = '')
    {
        if (!(is_integer($key) || is_string($key))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     */
    public static function assertArrayHasKey($key, $array, $message = '')
    {
        if (!(\is_int($key) || \is_string($key))) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                1,
                'integer or string'
            );
        }

<<<<<<< HEAD
        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
        if (!(\is_array($array) || $array instanceof ArrayAccess)) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                2,
                'array or ArrayAccess'
            );
        }

<<<<<<< HEAD
        $constraint = new PHPUnit_Framework_Constraint_ArrayHasKey($key);

        self::assertThat($array, $constraint, $message);
=======
        $constraint = new ArrayHasKey($key);

        static::assertThat($array, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that an array has a specified subset.
     *
     * @param array|ArrayAccess $subset
     * @param array|ArrayAccess $array
     * @param bool              $strict  Check for object identity
     * @param string            $message
<<<<<<< HEAD
     *
     * @since Method available since Release 4.4.0
     */
    public static function assertArraySubset($subset, $array, $strict = false, $message = '')
    {
        if (!(is_array($subset) || $subset instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     */
    public static function assertArraySubset($subset, $array, $strict = false, $message = '')
    {
        if (!(\is_array($subset) || $subset instanceof ArrayAccess)) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                1,
                'array or ArrayAccess'
            );
        }

<<<<<<< HEAD
        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
        if (!(\is_array($array) || $array instanceof ArrayAccess)) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                2,
                'array or ArrayAccess'
            );
        }

<<<<<<< HEAD
        $constraint = new PHPUnit_Framework_Constraint_ArraySubset($subset, $strict);

        self::assertThat($array, $constraint, $message);
=======
        $constraint = new ArraySubset($subset, $strict);

        static::assertThat($array, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that an array does not have a specified key.
     *
     * @param mixed             $key
     * @param array|ArrayAccess $array
     * @param string            $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertArrayNotHasKey($key, $array, $message = '')
    {
        if (!(is_integer($key) || is_string($key))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     */
    public static function assertArrayNotHasKey($key, $array, $message = '')
    {
        if (!(\is_int($key) || \is_string($key))) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                1,
                'integer or string'
            );
        }

<<<<<<< HEAD
        if (!(is_array($array) || $array instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
        if (!(\is_array($array) || $array instanceof ArrayAccess)) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                2,
                'array or ArrayAccess'
            );
        }

<<<<<<< HEAD
        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ArrayHasKey($key)
        );

        self::assertThat($array, $constraint, $message);
=======
        $constraint = new LogicalNot(
            new ArrayHasKey($key)
        );

        static::assertThat($array, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a haystack contains a needle.
     *
     * @param mixed  $needle
     * @param mixed  $haystack
     * @param string $message
     * @param bool   $ignoreCase
     * @param bool   $checkForObjectIdentity
     * @param bool   $checkForNonObjectIdentity
<<<<<<< HEAD
     *
     * @since  Method available since Release 2.1.0
     */
    public static function assertContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        if (is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable) {
            $constraint = new PHPUnit_Framework_Constraint_TraversableContains(
=======
     */
    public static function assertContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        if (\is_array($haystack) ||
            (\is_object($haystack) && $haystack instanceof Traversable)) {
            $constraint = new TraversableContains(
>>>>>>> dev
                $needle,
                $checkForObjectIdentity,
                $checkForNonObjectIdentity
            );
<<<<<<< HEAD
        } elseif (is_string($haystack)) {
            if (!is_string($needle)) {
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
        } elseif (\is_string($haystack)) {
            if (!\is_string($needle)) {
                throw InvalidArgumentHelper::factory(
>>>>>>> dev
                    1,
                    'string'
                );
            }

<<<<<<< HEAD
            $constraint = new PHPUnit_Framework_Constraint_StringContains(
=======
            $constraint = new StringContains(
>>>>>>> dev
                $needle,
                $ignoreCase
            );
        } else {
<<<<<<< HEAD
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                2,
                'array, traversable or string'
            );
        }

<<<<<<< HEAD
        self::assertThat($haystack, $constraint, $message);
=======
        static::assertThat($haystack, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains a needle.
     *
<<<<<<< HEAD
     * @param mixed  $needle
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     * @param bool   $ignoreCase
     * @param bool   $checkForObjectIdentity
     * @param bool   $checkForNonObjectIdentity
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertAttributeContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        self::assertContains(
            $needle,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param mixed         $needle
     * @param string        $haystackAttributeName
     * @param string|object $haystackClassOrObject
     * @param string        $message
     * @param bool          $ignoreCase
     * @param bool          $checkForObjectIdentity
     * @param bool          $checkForNonObjectIdentity
     */
    public static function assertAttributeContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        static::assertContains(
            $needle,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> dev
            $message,
            $ignoreCase,
            $checkForObjectIdentity,
            $checkForNonObjectIdentity
        );
    }

    /**
     * Asserts that a haystack does not contain a needle.
     *
     * @param mixed  $needle
     * @param mixed  $haystack
     * @param string $message
     * @param bool   $ignoreCase
     * @param bool   $checkForObjectIdentity
     * @param bool   $checkForNonObjectIdentity
<<<<<<< HEAD
     *
     * @since  Method available since Release 2.1.0
     */
    public static function assertNotContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        if (is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable) {
            $constraint = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_TraversableContains(
=======
     */
    public static function assertNotContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        if (\is_array($haystack) ||
            (\is_object($haystack) && $haystack instanceof Traversable)) {
            $constraint = new LogicalNot(
                new TraversableContains(
>>>>>>> dev
                    $needle,
                    $checkForObjectIdentity,
                    $checkForNonObjectIdentity
                )
            );
<<<<<<< HEAD
        } elseif (is_string($haystack)) {
            if (!is_string($needle)) {
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
        } elseif (\is_string($haystack)) {
            if (!\is_string($needle)) {
                throw InvalidArgumentHelper::factory(
>>>>>>> dev
                    1,
                    'string'
                );
            }

<<<<<<< HEAD
            $constraint = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_StringContains(
=======
            $constraint = new LogicalNot(
                new StringContains(
>>>>>>> dev
                    $needle,
                    $ignoreCase
                )
            );
        } else {
<<<<<<< HEAD
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                2,
                'array, traversable or string'
            );
        }

<<<<<<< HEAD
        self::assertThat($haystack, $constraint, $message);
=======
        static::assertThat($haystack, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain a needle.
     *
<<<<<<< HEAD
     * @param mixed  $needle
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     * @param bool   $ignoreCase
     * @param bool   $checkForObjectIdentity
     * @param bool   $checkForNonObjectIdentity
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertAttributeNotContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        self::assertNotContains(
            $needle,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param mixed         $needle
     * @param string        $haystackAttributeName
     * @param string|object $haystackClassOrObject
     * @param string        $message
     * @param bool          $ignoreCase
     * @param bool          $checkForObjectIdentity
     * @param bool          $checkForNonObjectIdentity
     */
    public static function assertAttributeNotContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        static::assertNotContains(
            $needle,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> dev
            $message,
            $ignoreCase,
            $checkForObjectIdentity,
            $checkForNonObjectIdentity
        );
    }

    /**
     * Asserts that a haystack contains only values of a given type.
     *
     * @param string $type
     * @param mixed  $haystack
     * @param bool   $isNativeType
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.4
     */
    public static function assertContainsOnly($type, $haystack, $isNativeType = null, $message = '')
    {
        if (!(is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     */
    public static function assertContainsOnly($type, $haystack, $isNativeType = null, $message = '')
    {
        if (!\is_array($haystack) &&
            !(\is_object($haystack) && $haystack instanceof Traversable)) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                2,
                'array or traversable'
            );
        }

        if ($isNativeType == null) {
<<<<<<< HEAD
            $isNativeType = PHPUnit_Util_Type::isType($type);
        }

        self::assertThat(
            $haystack,
            new PHPUnit_Framework_Constraint_TraversableContainsOnly(
=======
            $isNativeType = Type::isType($type);
        }

        static::assertThat(
            $haystack,
            new TraversableContainsOnly(
>>>>>>> dev
                $type,
                $isNativeType
            ),
            $message
        );
    }

    /**
     * Asserts that a haystack contains only instances of a given classname
     *
<<<<<<< HEAD
     * @param string            $classname
     * @param array|Traversable $haystack
     * @param string            $message
     */
    public static function assertContainsOnlyInstancesOf($classname, $haystack, $message = '')
    {
        if (!(is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     * @param string             $classname
     * @param array|\Traversable $haystack
     * @param string             $message
     */
    public static function assertContainsOnlyInstancesOf($classname, $haystack, $message = '')
    {
        if (!\is_array($haystack) &&
            !(\is_object($haystack) && $haystack instanceof Traversable)) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                2,
                'array or traversable'
            );
        }

<<<<<<< HEAD
        self::assertThat(
            $haystack,
            new PHPUnit_Framework_Constraint_TraversableContainsOnly(
=======
        static::assertThat(
            $haystack,
            new TraversableContainsOnly(
>>>>>>> dev
                $classname,
                false
            ),
            $message
        );
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains only values of a given type.
     *
<<<<<<< HEAD
     * @param string $type
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param bool   $isNativeType
     * @param string $message
     *
     * @since  Method available since Release 3.1.4
     */
    public static function assertAttributeContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
    {
        self::assertContainsOnly(
            $type,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param string        $type
     * @param string        $haystackAttributeName
     * @param string|object $haystackClassOrObject
     * @param bool          $isNativeType
     * @param string        $message
     */
    public static function assertAttributeContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
    {
        static::assertContainsOnly(
            $type,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> dev
            $isNativeType,
            $message
        );
    }

    /**
     * Asserts that a haystack does not contain only values of a given type.
     *
     * @param string $type
     * @param mixed  $haystack
     * @param bool   $isNativeType
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.4
     */
    public static function assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = '')
    {
        if (!(is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     */
    public static function assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = '')
    {
        if (!\is_array($haystack) &&
            !(\is_object($haystack) && $haystack instanceof Traversable)) {
            throw InvalidArgumentHelper::factory(
>>>>>>> dev
                2,
                'array or traversable'
            );
        }

        if ($isNativeType == null) {
<<<<<<< HEAD
            $isNativeType = PHPUnit_Util_Type::isType($type);
        }

        self::assertThat(
            $haystack,
            new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_TraversableContainsOnly(
=======
            $isNativeType = Type::isType($type);
        }

        static::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
>>>>>>> dev
                    $type,
                    $isNativeType
                )
            ),
            $message
        );
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain only values of a given
     * type.
     *
<<<<<<< HEAD
     * @param string $type
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param bool   $isNativeType
     * @param string $message
     *
     * @since  Method available since Release 3.1.4
     */
    public static function assertAttributeNotContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
    {
        self::assertNotContainsOnly(
            $type,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param string        $type
     * @param string        $haystackAttributeName
     * @param string|object $haystackClassOrObject
     * @param bool          $isNativeType
     * @param string        $message
     */
    public static function assertAttributeNotContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
    {
        static::assertNotContainsOnly(
            $type,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> dev
            $isNativeType,
            $message
        );
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param int    $expectedCount
     * @param mixed  $haystack
     * @param string $message
     */
    public static function assertCount($expectedCount, $haystack, $message = '')
    {
<<<<<<< HEAD
        if (!is_int($expectedCount)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
=======
        if (!\is_int($expectedCount)) {
            throw InvalidArgumentHelper::factory(1, 'integer');
>>>>>>> dev
        }

        if (!$haystack instanceof Countable &&
            !$haystack instanceof Traversable &&
<<<<<<< HEAD
            !is_array($haystack)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        self::assertThat(
            $haystack,
            new PHPUnit_Framework_Constraint_Count($expectedCount),
=======
            !\is_array($haystack)) {
            throw InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        static::assertThat(
            $haystack,
            new Count($expectedCount),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
<<<<<<< HEAD
     * @param int    $expectedCount
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     *
     * @since Method available since Release 3.6.0
     */
    public static function assertAttributeCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        self::assertCount(
            $expectedCount,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param int           $expectedCount
     * @param string        $haystackAttributeName
     * @param string|object $haystackClassOrObject
     * @param string        $message
     */
    public static function assertAttributeCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        static::assertCount(
            $expectedCount,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param int    $expectedCount
     * @param mixed  $haystack
     * @param string $message
     */
    public static function assertNotCount($expectedCount, $haystack, $message = '')
    {
<<<<<<< HEAD
        if (!is_int($expectedCount)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
=======
        if (!\is_int($expectedCount)) {
            throw InvalidArgumentHelper::factory(1, 'integer');
>>>>>>> dev
        }

        if (!$haystack instanceof Countable &&
            !$haystack instanceof Traversable &&
<<<<<<< HEAD
            !is_array($haystack)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_Count($expectedCount)
        );

        self::assertThat($haystack, $constraint, $message);
=======
            !\is_array($haystack)) {
            throw InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        $constraint = new LogicalNot(
            new Count($expectedCount)
        );

        static::assertThat($haystack, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
<<<<<<< HEAD
     * @param int    $expectedCount
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     *
     * @since Method available since Release 3.6.0
     */
    public static function assertAttributeNotCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        self::assertNotCount(
            $expectedCount,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param int           $expectedCount
     * @param string        $haystackAttributeName
     * @param string|object $haystackClassOrObject
     * @param string        $message
     */
    public static function assertAttributeNotCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        static::assertNotCount(
            $expectedCount,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that two variables are equal.
     *
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     * @param float  $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     */
    public static function assertEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
<<<<<<< HEAD
        $constraint = new PHPUnit_Framework_Constraint_IsEqual(
=======
        $constraint = new IsEqual(
>>>>>>> dev
            $expected,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
        );

<<<<<<< HEAD
        self::assertThat($actual, $constraint, $message);
=======
        static::assertThat($actual, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a variable is equal to an attribute of an object.
     *
<<<<<<< HEAD
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     * @param float  $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     */
    public static function assertAttributeEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        self::assertEquals(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed         $expected
     * @param string        $actualAttributeName
     * @param string|object $actualClassOrObject
     * @param string        $message
     * @param float         $delta
     * @param int           $maxDepth
     * @param bool          $canonicalize
     * @param bool          $ignoreCase
     */
    public static function assertAttributeEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        static::assertEquals(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> dev
            $message,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
     * Asserts that two variables are not equal.
     *
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     * @param float  $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
<<<<<<< HEAD
     *
     * @since  Method available since Release 2.3.0
     */
    public static function assertNotEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsEqual(
=======
     */
    public static function assertNotEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $constraint = new LogicalNot(
            new IsEqual(
>>>>>>> dev
                $expected,
                $delta,
                $maxDepth,
                $canonicalize,
                $ignoreCase
            )
        );

<<<<<<< HEAD
        self::assertThat($actual, $constraint, $message);
=======
        static::assertThat($actual, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a variable is not equal to an attribute of an object.
     *
<<<<<<< HEAD
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     * @param float  $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     */
    public static function assertAttributeNotEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        self::assertNotEquals(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed         $expected
     * @param string        $actualAttributeName
     * @param string|object $actualClassOrObject
     * @param string        $message
     * @param float         $delta
     * @param int           $maxDepth
     * @param bool          $canonicalize
     * @param bool          $ignoreCase
     */
    public static function assertAttributeNotEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        static::assertNotEquals(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> dev
            $message,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
     * Asserts that a variable is empty.
     *
     * @param mixed  $actual
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertEmpty($actual, $message = '')
    {
        self::assertThat($actual, self::isEmpty(), $message);
=======
     * @throws AssertionFailedError
     */
    public static function assertEmpty($actual, $message = '')
    {
        static::assertThat($actual, static::isEmpty(), $message);
>>>>>>> dev
    }

    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is empty.
     *
<<<<<<< HEAD
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        self::assertEmpty(
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param string        $haystackAttributeName
     * @param string|object $haystackClassOrObject
     * @param string        $message
     */
    public static function assertAttributeEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        static::assertEmpty(
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a variable is not empty.
     *
     * @param mixed  $actual
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertNotEmpty($actual, $message = '')
    {
        self::assertThat($actual, self::logicalNot(self::isEmpty()), $message);
=======
     * @throws AssertionFailedError
     */
    public static function assertNotEmpty($actual, $message = '')
    {
        static::assertThat($actual, static::logicalNot(static::isEmpty()), $message);
>>>>>>> dev
    }

    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is not empty.
     *
<<<<<<< HEAD
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeNotEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        self::assertNotEmpty(
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param string        $haystackAttributeName
     * @param string|object $haystackClassOrObject
     * @param string        $message
     */
    public static function assertAttributeNotEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        static::assertNotEmpty(
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a value is greater than another value.
     *
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertGreaterThan($expected, $actual, $message = '')
    {
        self::assertThat($actual, self::greaterThan($expected), $message);
=======
     */
    public static function assertGreaterThan($expected, $actual, $message = '')
    {
        static::assertThat($actual, static::greaterThan($expected), $message);
>>>>>>> dev
    }

    /**
     * Asserts that an attribute is greater than another value.
     *
<<<<<<< HEAD
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertAttributeGreaterThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertGreaterThan(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed         $expected
     * @param string        $actualAttributeName
     * @param string|object $actualClassOrObject
     * @param string        $message
     */
    public static function assertAttributeGreaterThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        static::assertGreaterThan(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a value is greater than or equal to another value.
     *
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertGreaterThanOrEqual($expected, $actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::greaterThanOrEqual($expected),
=======
     */
    public static function assertGreaterThanOrEqual($expected, $actual, $message = '')
    {
        static::assertThat(
            $actual,
            static::greaterThanOrEqual($expected),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that an attribute is greater than or equal to another value.
     *
<<<<<<< HEAD
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertAttributeGreaterThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertGreaterThanOrEqual(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed         $expected
     * @param string        $actualAttributeName
     * @param string|object $actualClassOrObject
     * @param string        $message
     */
    public static function assertAttributeGreaterThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        static::assertGreaterThanOrEqual(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a value is smaller than another value.
     *
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertLessThan($expected, $actual, $message = '')
    {
        self::assertThat($actual, self::lessThan($expected), $message);
=======
     */
    public static function assertLessThan($expected, $actual, $message = '')
    {
        static::assertThat($actual, static::lessThan($expected), $message);
>>>>>>> dev
    }

    /**
     * Asserts that an attribute is smaller than another value.
     *
<<<<<<< HEAD
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertAttributeLessThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertLessThan(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed         $expected
     * @param string        $actualAttributeName
     * @param string|object $actualClassOrObject
     * @param string        $message
     */
    public static function assertAttributeLessThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        static::assertLessThan(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a value is smaller than or equal to another value.
     *
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertLessThanOrEqual($expected, $actual, $message = '')
    {
        self::assertThat($actual, self::lessThanOrEqual($expected), $message);
=======
     */
    public static function assertLessThanOrEqual($expected, $actual, $message = '')
    {
        static::assertThat($actual, static::lessThanOrEqual($expected), $message);
>>>>>>> dev
    }

    /**
     * Asserts that an attribute is smaller than or equal to another value.
     *
<<<<<<< HEAD
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertAttributeLessThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertLessThanOrEqual(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed         $expected
     * @param string        $actualAttributeName
     * @param string|object $actualClassOrObject
     * @param string        $message
     */
    public static function assertAttributeLessThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        static::assertLessThanOrEqual(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file.
     *
     * @param string $expected
     * @param string $actual
     * @param string $message
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.2.14
     */
    public static function assertFileEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);

        self::assertEquals(
            file_get_contents($expected),
            file_get_contents($actual),
=======
     */
    public static function assertFileEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        static::assertEquals(
            \file_get_contents($expected),
            \file_get_contents($actual),
>>>>>>> dev
            $message,
            0,
            10,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of
     * another file.
     *
     * @param string $expected
     * @param string $actual
     * @param string $message
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.2.14
     */
    public static function assertFileNotEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);

        self::assertNotEquals(
            file_get_contents($expected),
            file_get_contents($actual),
=======
     */
    public static function assertFileNotEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        static::assertNotEquals(
            \file_get_contents($expected),
            \file_get_contents($actual),
>>>>>>> dev
            $message,
            0,
            10,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file.
     *
     * @param string $expectedFile
     * @param string $actualString
     * @param string $message
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
     */
    public static function assertStringEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        self::assertFileExists($expectedFile, $message);

        self::assertEquals(
            file_get_contents($expectedFile),
=======
     */
    public static function assertStringEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        static::assertFileExists($expectedFile, $message);

        static::assertEquals(
            \file_get_contents($expectedFile),
>>>>>>> dev
            $actualString,
            $message,
            0,
            10,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file.
     *
     * @param string $expectedFile
     * @param string $actualString
     * @param string $message
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
     */
    public static function assertStringNotEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        self::assertFileExists($expectedFile, $message);

        self::assertNotEquals(
            file_get_contents($expectedFile),
=======
     */
    public static function assertStringNotEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        static::assertFileExists($expectedFile, $message);

        static::assertNotEquals(
            \file_get_contents($expectedFile),
>>>>>>> dev
            $actualString,
            $message,
            0,
            10,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
<<<<<<< HEAD
     * Asserts that a file exists.
     *
     * @param string $filename
     * @param string $message
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertFileExists($filename, $message = '')
    {
        if (!is_string($filename)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_FileExists;

        self::assertThat($filename, $constraint, $message);
=======
     * Asserts that a file/dir is readable.
     *
     * @param string $filename
     * @param string $message
     */
    public static function assertIsReadable($filename, $message = '')
    {
        if (!\is_string($filename)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new IsReadable;

        static::assertThat($filename, $constraint, $message);
    }

    /**
     * Asserts that a file/dir exists and is not readable.
     *
     * @param string $filename
     * @param string $message
     */
    public static function assertNotIsReadable($filename, $message = '')
    {
        if (!\is_string($filename)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new LogicalNot(
            new IsReadable
        );

        static::assertThat($filename, $constraint, $message);
    }

    /**
     * Asserts that a file/dir exists and is writable.
     *
     * @param string $filename
     * @param string $message
     */
    public static function assertIsWritable($filename, $message = '')
    {
        if (!\is_string($filename)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new IsWritable;

        static::assertThat($filename, $constraint, $message);
    }

    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * @param string $filename
     * @param string $message
     */
    public static function assertNotIsWritable($filename, $message = '')
    {
        if (!\is_string($filename)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new LogicalNot(
            new IsWritable
        );

        static::assertThat($filename, $constraint, $message);
    }

    /**
     * Asserts that a directory exists.
     *
     * @param string $directory
     * @param string $message
     */
    public static function assertDirectoryExists($directory, $message = '')
    {
        if (!\is_string($directory)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new DirectoryExists;

        static::assertThat($directory, $constraint, $message);
    }

    /**
     * Asserts that a directory does not exist.
     *
     * @param string $directory
     * @param string $message
     */
    public static function assertDirectoryNotExists($directory, $message = '')
    {
        if (!\is_string($directory)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new LogicalNot(
            new DirectoryExists
        );

        static::assertThat($directory, $constraint, $message);
    }

    /**
     * Asserts that a directory exists and is readable.
     *
     * @param string $directory
     * @param string $message
     */
    public static function assertDirectoryIsReadable($directory, $message = '')
    {
        self::assertDirectoryExists($directory, $message);
        self::assertIsReadable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is not readable.
     *
     * @param string $directory
     * @param string $message
     */
    public static function assertDirectoryNotIsReadable($directory, $message = '')
    {
        self::assertDirectoryExists($directory, $message);
        self::assertNotIsReadable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is writable.
     *
     * @param string $directory
     * @param string $message
     */
    public static function assertDirectoryIsWritable($directory, $message = '')
    {
        self::assertDirectoryExists($directory, $message);
        self::assertIsWritable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is not writable.
     *
     * @param string $directory
     * @param string $message
     */
    public static function assertDirectoryNotIsWritable($directory, $message = '')
    {
        self::assertDirectoryExists($directory, $message);
        self::assertNotIsWritable($directory, $message);
    }

    /**
     * Asserts that a file exists.
     *
     * @param string $filename
     * @param string $message
     */
    public static function assertFileExists($filename, $message = '')
    {
        if (!\is_string($filename)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new FileExists;

        static::assertThat($filename, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a file does not exist.
     *
     * @param string $filename
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertFileNotExists($filename, $message = '')
    {
        if (!is_string($filename)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_FileExists
        );

        self::assertThat($filename, $constraint, $message);
=======
     */
    public static function assertFileNotExists($filename, $message = '')
    {
        if (!\is_string($filename)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new LogicalNot(
            new FileExists
        );

        static::assertThat($filename, $constraint, $message);
    }

    /**
     * Asserts that a file exists and is readable.
     *
     * @param string $file
     * @param string $message
     */
    public static function assertFileIsReadable($file, $message = '')
    {
        self::assertFileExists($file, $message);
        self::assertIsReadable($file, $message);
    }

    /**
     * Asserts that a file exists and is not readable.
     *
     * @param string $file
     * @param string $message
     */
    public static function assertFileNotIsReadable($file, $message = '')
    {
        self::assertFileExists($file, $message);
        self::assertNotIsReadable($file, $message);
    }

    /**
     * Asserts that a file exists and is writable.
     *
     * @param string $file
     * @param string $message
     */
    public static function assertFileIsWritable($file, $message = '')
    {
        self::assertFileExists($file, $message);
        self::assertIsWritable($file, $message);
    }

    /**
     * Asserts that a file exists and is not writable.
     *
     * @param string $file
     * @param string $message
     */
    public static function assertFileNotIsWritable($file, $message = '')
    {
        self::assertFileExists($file, $message);
        self::assertNotIsWritable($file, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a condition is true.
     *
     * @param bool   $condition
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertTrue($condition, $message = '')
    {
        self::assertThat($condition, self::isTrue(), $message);
=======
     * @throws AssertionFailedError
     */
    public static function assertTrue($condition, $message = '')
    {
        static::assertThat($condition, static::isTrue(), $message);
>>>>>>> dev
    }

    /**
     * Asserts that a condition is not true.
     *
     * @param bool   $condition
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertNotTrue($condition, $message = '')
    {
        self::assertThat($condition, self::logicalNot(self::isTrue()), $message);
=======
     * @throws AssertionFailedError
     */
    public static function assertNotTrue($condition, $message = '')
    {
        static::assertThat($condition, static::logicalNot(static::isTrue()), $message);
>>>>>>> dev
    }

    /**
     * Asserts that a condition is false.
     *
     * @param bool   $condition
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertFalse($condition, $message = '')
    {
        self::assertThat($condition, self::isFalse(), $message);
=======
     * @throws AssertionFailedError
     */
    public static function assertFalse($condition, $message = '')
    {
        static::assertThat($condition, static::isFalse(), $message);
>>>>>>> dev
    }

    /**
     * Asserts that a condition is not false.
     *
     * @param bool   $condition
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertNotFalse($condition, $message = '')
    {
        self::assertThat($condition, self::logicalNot(self::isFalse()), $message);
=======
     * @throws AssertionFailedError
     */
    public static function assertNotFalse($condition, $message = '')
    {
        static::assertThat($condition, static::logicalNot(static::isFalse()), $message);
    }

    /**
     * Asserts that a variable is null.
     *
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertNull($actual, $message = '')
    {
        static::assertThat($actual, static::isNull(), $message);
>>>>>>> dev
    }

    /**
     * Asserts that a variable is not null.
     *
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertNotNull($actual, $message = '')
    {
<<<<<<< HEAD
        self::assertThat($actual, self::logicalNot(self::isNull()), $message);
    }

    /**
     * Asserts that a variable is null.
=======
        static::assertThat($actual, static::logicalNot(static::isNull()), $message);
    }

    /**
     * Asserts that a variable is finite.
>>>>>>> dev
     *
     * @param mixed  $actual
     * @param string $message
     */
<<<<<<< HEAD
    public static function assertNull($actual, $message = '')
    {
        self::assertThat($actual, self::isNull(), $message);
=======
    public static function assertFinite($actual, $message = '')
    {
        static::assertThat($actual, static::isFinite(), $message);
    }

    /**
     * Asserts that a variable is infinite.
     *
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertInfinite($actual, $message = '')
    {
        static::assertThat($actual, static::isInfinite(), $message);
    }

    /**
     * Asserts that a variable is nan.
     *
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertNan($actual, $message = '')
    {
        static::assertThat($actual, static::isNan(), $message);
>>>>>>> dev
    }

    /**
     * Asserts that a class has a specified attribute.
     *
     * @param string $attributeName
     * @param string $className
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertClassHasAttribute($attributeName, $className, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($className) || !class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new PHPUnit_Framework_Constraint_ClassHasAttribute(
            $attributeName
        );

        self::assertThat($className, $constraint, $message);
=======
     */
    public static function assertClassHasAttribute($attributeName, $className, $message = '')
    {
        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!\is_string($className) || !\class_exists($className)) {
            throw InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new ClassHasAttribute(
            $attributeName
        );

        static::assertThat($className, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a class does not have a specified attribute.
     *
     * @param string $attributeName
     * @param string $className
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertClassNotHasAttribute($attributeName, $className, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($className) || !class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ClassHasAttribute($attributeName)
        );

        self::assertThat($className, $constraint, $message);
=======
     */
    public static function assertClassNotHasAttribute($attributeName, $className, $message = '')
    {
        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!\is_string($className) || !\class_exists($className)) {
            throw InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new LogicalNot(
            new ClassHasAttribute($attributeName)
        );

        static::assertThat($className, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a class has a specified static attribute.
     *
     * @param string $attributeName
     * @param string $className
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertClassHasStaticAttribute($attributeName, $className, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($className) || !class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
            $attributeName
        );

        self::assertThat($className, $constraint, $message);
=======
     */
    public static function assertClassHasStaticAttribute($attributeName, $className, $message = '')
    {
        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!\is_string($className) || !\class_exists($className)) {
            throw InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new ClassHasStaticAttribute(
            $attributeName
        );

        static::assertThat($className, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a class does not have a specified static attribute.
     *
     * @param string $attributeName
     * @param string $className
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertClassNotHasStaticAttribute($attributeName, $className, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($className) || !class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
=======
     */
    public static function assertClassNotHasStaticAttribute($attributeName, $className, $message = '')
    {
        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!\is_string($className) || !\class_exists($className)) {
            throw InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new LogicalNot(
            new ClassHasStaticAttribute(
>>>>>>> dev
                $attributeName
            )
        );

<<<<<<< HEAD
        self::assertThat($className, $constraint, $message);
=======
        static::assertThat($className, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that an object has a specified attribute.
     *
     * @param string $attributeName
     * @param object $object
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertObjectHasAttribute($attributeName, $object, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_object($object)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'object');
        }

        $constraint = new PHPUnit_Framework_Constraint_ObjectHasAttribute(
            $attributeName
        );

        self::assertThat($object, $constraint, $message);
=======
     */
    public static function assertObjectHasAttribute($attributeName, $object, $message = '')
    {
        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!\is_object($object)) {
            throw InvalidArgumentHelper::factory(2, 'object');
        }

        $constraint = new ObjectHasAttribute(
            $attributeName
        );

        static::assertThat($object, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that an object does not have a specified attribute.
     *
     * @param string $attributeName
     * @param object $object
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertObjectNotHasAttribute($attributeName, $object, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_object($object)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'object');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ObjectHasAttribute($attributeName)
        );

        self::assertThat($object, $constraint, $message);
=======
     */
    public static function assertObjectNotHasAttribute($attributeName, $object, $message = '')
    {
        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!\is_object($object)) {
            throw InvalidArgumentHelper::factory(2, 'object');
        }

        $constraint = new LogicalNot(
            new ObjectHasAttribute($attributeName)
        );

        static::assertThat($object, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that two variables have the same type and value.
     * Used on objects, it asserts that two variables reference
     * the same object.
     *
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertSame($expected, $actual, $message = '')
    {
<<<<<<< HEAD
        if (is_bool($expected) && is_bool($actual)) {
            self::assertEquals($expected, $actual, $message);
        } else {
            $constraint = new PHPUnit_Framework_Constraint_IsIdentical(
                $expected
            );

            self::assertThat($actual, $constraint, $message);
=======
        if (\is_bool($expected) && \is_bool($actual)) {
            static::assertEquals($expected, $actual, $message);
        } else {
            $constraint = new IsIdentical(
                $expected
            );

            static::assertThat($actual, $constraint, $message);
>>>>>>> dev
        }
    }

    /**
     * Asserts that a variable and an attribute of an object have the same type
     * and value.
     *
<<<<<<< HEAD
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param object $actualClassOrObject
     * @param string $message
     */
    public static function assertAttributeSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertSame(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed         $expected
     * @param string        $actualAttributeName
     * @param string|object $actualClassOrObject
     * @param string        $message
     */
    public static function assertAttributeSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        static::assertSame(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that two variables do not have the same type and value.
     * Used on objects, it asserts that two variables do not reference
     * the same object.
     *
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertNotSame($expected, $actual, $message = '')
    {
<<<<<<< HEAD
        if (is_bool($expected) && is_bool($actual)) {
            self::assertNotEquals($expected, $actual, $message);
        } else {
            $constraint = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_IsIdentical($expected)
            );

            self::assertThat($actual, $constraint, $message);
=======
        if (\is_bool($expected) && \is_bool($actual)) {
            static::assertNotEquals($expected, $actual, $message);
        } else {
            $constraint = new LogicalNot(
                new IsIdentical($expected)
            );

            static::assertThat($actual, $constraint, $message);
>>>>>>> dev
        }
    }

    /**
     * Asserts that a variable and an attribute of an object do not have the
     * same type and value.
     *
<<<<<<< HEAD
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param object $actualClassOrObject
     * @param string $message
     */
    public static function assertAttributeNotSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertNotSame(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed         $expected
     * @param string        $actualAttributeName
     * @param string|object $actualClassOrObject
     * @param string        $message
     */
    public static function assertAttributeNotSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        static::assertNotSame(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a variable is of a given type.
     *
     * @param string $expected
     * @param mixed  $actual
     * @param string $message
<<<<<<< HEAD
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertInstanceOf($expected, $actual, $message = '')
    {
        if (!(is_string($expected) && (class_exists($expected) || interface_exists($expected)))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class or interface name');
        }

        $constraint = new PHPUnit_Framework_Constraint_IsInstanceOf(
            $expected
        );

        self::assertThat($actual, $constraint, $message);
=======
     */
    public static function assertInstanceOf($expected, $actual, $message = '')
    {
        if (!(\is_string($expected) && (\class_exists($expected) || \interface_exists($expected)))) {
            throw InvalidArgumentHelper::factory(1, 'class or interface name');
        }

        $constraint = new IsInstanceOf(
            $expected
        );

        static::assertThat($actual, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that an attribute is of a given type.
     *
<<<<<<< HEAD
     * @param string $expected
     * @param string $attributeName
     * @param mixed  $classOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeInstanceOf($expected, $attributeName, $classOrObject, $message = '')
    {
        self::assertInstanceOf(
            $expected,
            self::readAttribute($classOrObject, $attributeName),
=======
     * @param string        $expected
     * @param string        $attributeName
     * @param string|object $classOrObject
     * @param string        $message
     */
    public static function assertAttributeInstanceOf($expected, $attributeName, $classOrObject, $message = '')
    {
        static::assertInstanceOf(
            $expected,
            static::readAttribute($classOrObject, $attributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a variable is not of a given type.
     *
     * @param string $expected
     * @param mixed  $actual
     * @param string $message
<<<<<<< HEAD
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertNotInstanceOf($expected, $actual, $message = '')
    {
        if (!(is_string($expected) && (class_exists($expected) || interface_exists($expected)))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class or interface name');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsInstanceOf($expected)
        );

        self::assertThat($actual, $constraint, $message);
=======
     */
    public static function assertNotInstanceOf($expected, $actual, $message = '')
    {
        if (!(\is_string($expected) && (\class_exists($expected) || \interface_exists($expected)))) {
            throw InvalidArgumentHelper::factory(1, 'class or interface name');
        }

        $constraint = new LogicalNot(
            new IsInstanceOf($expected)
        );

        static::assertThat($actual, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that an attribute is of a given type.
     *
<<<<<<< HEAD
     * @param string $expected
     * @param string $attributeName
     * @param mixed  $classOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeNotInstanceOf($expected, $attributeName, $classOrObject, $message = '')
    {
        self::assertNotInstanceOf(
            $expected,
            self::readAttribute($classOrObject, $attributeName),
=======
     * @param string        $expected
     * @param string        $attributeName
     * @param string|object $classOrObject
     * @param string        $message
     */
    public static function assertAttributeNotInstanceOf($expected, $attributeName, $classOrObject, $message = '')
    {
        static::assertNotInstanceOf(
            $expected,
            static::readAttribute($classOrObject, $attributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a variable is of a given type.
     *
     * @param string $expected
     * @param mixed  $actual
     * @param string $message
<<<<<<< HEAD
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertInternalType($expected, $actual, $message = '')
    {
        if (!is_string($expected)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_IsType(
            $expected
        );

        self::assertThat($actual, $constraint, $message);
=======
     */
    public static function assertInternalType($expected, $actual, $message = '')
    {
        if (!\is_string($expected)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new IsType(
            $expected
        );

        static::assertThat($actual, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that an attribute is of a given type.
     *
<<<<<<< HEAD
     * @param string $expected
     * @param string $attributeName
     * @param mixed  $classOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeInternalType($expected, $attributeName, $classOrObject, $message = '')
    {
        self::assertInternalType(
            $expected,
            self::readAttribute($classOrObject, $attributeName),
=======
     * @param string        $expected
     * @param string        $attributeName
     * @param string|object $classOrObject
     * @param string        $message
     */
    public static function assertAttributeInternalType($expected, $attributeName, $classOrObject, $message = '')
    {
        static::assertInternalType(
            $expected,
            static::readAttribute($classOrObject, $attributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a variable is not of a given type.
     *
     * @param string $expected
     * @param mixed  $actual
     * @param string $message
<<<<<<< HEAD
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertNotInternalType($expected, $actual, $message = '')
    {
        if (!is_string($expected)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsType($expected)
        );

        self::assertThat($actual, $constraint, $message);
=======
     */
    public static function assertNotInternalType($expected, $actual, $message = '')
    {
        if (!\is_string($expected)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new LogicalNot(
            new IsType($expected)
        );

        static::assertThat($actual, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that an attribute is of a given type.
     *
<<<<<<< HEAD
     * @param string $expected
     * @param string $attributeName
     * @param mixed  $classOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeNotInternalType($expected, $attributeName, $classOrObject, $message = '')
    {
        self::assertNotInternalType(
            $expected,
            self::readAttribute($classOrObject, $attributeName),
=======
     * @param string        $expected
     * @param string        $attributeName
     * @param string|object $classOrObject
     * @param string        $message
     */
    public static function assertAttributeNotInternalType($expected, $attributeName, $classOrObject, $message = '')
    {
        static::assertNotInternalType(
            $expected,
            static::readAttribute($classOrObject, $attributeName),
>>>>>>> dev
            $message
        );
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
     * @param string $pattern
     * @param string $string
     * @param string $message
     */
    public static function assertRegExp($pattern, $string, $message = '')
    {
<<<<<<< HEAD
        if (!is_string($pattern)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_PCREMatch($pattern);

        self::assertThat($string, $constraint, $message);
=======
        if (!\is_string($pattern)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new RegularExpression($pattern);

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
     * @param string $pattern
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 2.1.0
     */
    public static function assertNotRegExp($pattern, $string, $message = '')
    {
        if (!is_string($pattern)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_PCREMatch($pattern)
        );

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertNotRegExp($pattern, $string, $message = '')
    {
        if (!\is_string($pattern)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new LogicalNot(
            new RegularExpression($pattern)
        );

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is the same.
     *
<<<<<<< HEAD
     * @param array|Countable|Traversable $expected
     * @param array|Countable|Traversable $actual
     * @param string                      $message
=======
     * @param array|\Countable|\Traversable $expected
     * @param array|\Countable|\Traversable $actual
     * @param string                        $message
>>>>>>> dev
     */
    public static function assertSameSize($expected, $actual, $message = '')
    {
        if (!$expected instanceof Countable &&
            !$expected instanceof Traversable &&
<<<<<<< HEAD
            !is_array($expected)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'countable or traversable');
=======
            !\is_array($expected)) {
            throw InvalidArgumentHelper::factory(1, 'countable or traversable');
>>>>>>> dev
        }

        if (!$actual instanceof Countable &&
            !$actual instanceof Traversable &&
<<<<<<< HEAD
            !is_array($actual)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        self::assertThat(
            $actual,
            new PHPUnit_Framework_Constraint_SameSize($expected),
=======
            !\is_array($actual)) {
            throw InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        static::assertThat(
            $actual,
            new SameSize($expected),
>>>>>>> dev
            $message
        );
    }

    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is not the same.
     *
<<<<<<< HEAD
     * @param array|Countable|Traversable $expected
     * @param array|Countable|Traversable $actual
     * @param string                      $message
=======
     * @param array|\Countable|\Traversable $expected
     * @param array|\Countable|\Traversable $actual
     * @param string                        $message
>>>>>>> dev
     */
    public static function assertNotSameSize($expected, $actual, $message = '')
    {
        if (!$expected instanceof Countable &&
            !$expected instanceof Traversable &&
<<<<<<< HEAD
            !is_array($expected)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'countable or traversable');
=======
            !\is_array($expected)) {
            throw InvalidArgumentHelper::factory(1, 'countable or traversable');
>>>>>>> dev
        }

        if (!$actual instanceof Countable &&
            !$actual instanceof Traversable &&
<<<<<<< HEAD
            !is_array($actual)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_SameSize($expected)
        );

        self::assertThat($actual, $constraint, $message);
=======
            !\is_array($actual)) {
            throw InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        $constraint = new LogicalNot(
            new SameSize($expected)
        );

        static::assertThat($actual, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string matches a given format string.
     *
     * @param string $format
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.5.0
     */
    public static function assertStringMatchesFormat($format, $string, $message = '')
    {
        if (!is_string($format)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_StringMatches($format);

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertStringMatchesFormat($format, $string, $message = '')
    {
        if (!\is_string($format)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new StringMatchesFormatDescription($format);

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string does not match a given format string.
     *
     * @param string $format
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.5.0
     */
    public static function assertStringNotMatchesFormat($format, $string, $message = '')
    {
        if (!is_string($format)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringMatches($format)
        );

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertStringNotMatchesFormat($format, $string, $message = '')
    {
        if (!\is_string($format)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new LogicalNot(
            new StringMatchesFormatDescription($format)
        );

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string matches a given format file.
     *
     * @param string $formatFile
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.5.0
     */
    public static function assertStringMatchesFormatFile($formatFile, $string, $message = '')
    {
        self::assertFileExists($formatFile, $message);

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_StringMatches(
            file_get_contents($formatFile)
        );

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertStringMatchesFormatFile($formatFile, $string, $message = '')
    {
        static::assertFileExists($formatFile, $message);

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new StringMatchesFormatDescription(
            \file_get_contents($formatFile)
        );

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string does not match a given format string.
     *
     * @param string $formatFile
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.5.0
     */
    public static function assertStringNotMatchesFormatFile($formatFile, $string, $message = '')
    {
        self::assertFileExists($formatFile, $message);

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringMatches(
                file_get_contents($formatFile)
            )
        );

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertStringNotMatchesFormatFile($formatFile, $string, $message = '')
    {
        static::assertFileExists($formatFile, $message);

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new LogicalNot(
            new StringMatchesFormatDescription(
                \file_get_contents($formatFile)
            )
        );

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string starts with a given prefix.
     *
     * @param string $prefix
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
     */
    public static function assertStringStartsWith($prefix, $string, $message = '')
    {
        if (!is_string($prefix)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_StringStartsWith(
            $prefix
        );

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertStringStartsWith($prefix, $string, $message = '')
    {
        if (!\is_string($prefix)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new StringStartsWith(
            $prefix
        );

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string starts not with a given prefix.
     *
     * @param string $prefix
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
     */
    public static function assertStringStartsNotWith($prefix, $string, $message = '')
    {
        if (!is_string($prefix)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringStartsWith($prefix)
        );

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertStringStartsNotWith($prefix, $string, $message = '')
    {
        if (!\is_string($prefix)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new LogicalNot(
            new StringStartsWith($prefix)
        );

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string ends with a given suffix.
     *
     * @param string $suffix
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
     */
    public static function assertStringEndsWith($suffix, $string, $message = '')
    {
        if (!is_string($suffix)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_StringEndsWith($suffix);

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertStringEndsWith($suffix, $string, $message = '')
    {
        if (!\is_string($suffix)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new StringEndsWith($suffix);

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a string ends not with a given suffix.
     *
     * @param string $suffix
     * @param string $string
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
     */
    public static function assertStringEndsNotWith($suffix, $string, $message = '')
    {
        if (!is_string($suffix)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringEndsWith($suffix)
        );

        self::assertThat($string, $constraint, $message);
=======
     */
    public static function assertStringEndsNotWith($suffix, $string, $message = '')
    {
        if (!\is_string($suffix)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\is_string($string)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new LogicalNot(
            new StringEndsWith($suffix)
        );

        static::assertThat($string, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that two XML files are equal.
     *
     * @param string $expectedFile
     * @param string $actualFile
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')
    {
        $expected = PHPUnit_Util_XML::loadFile($expectedFile);
        $actual   = PHPUnit_Util_XML::loadFile($actualFile);

        self::assertEquals($expected, $actual, $message);
=======
     */
    public static function assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')
    {
        $expected = Xml::loadFile($expectedFile);
        $actual   = Xml::loadFile($actualFile);

        static::assertEquals($expected, $actual, $message);
>>>>>>> dev
    }

    /**
     * Asserts that two XML files are not equal.
     *
     * @param string $expectedFile
     * @param string $actualFile
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')
    {
        $expected = PHPUnit_Util_XML::loadFile($expectedFile);
        $actual   = PHPUnit_Util_XML::loadFile($actualFile);

        self::assertNotEquals($expected, $actual, $message);
=======
     */
    public static function assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')
    {
        $expected = Xml::loadFile($expectedFile);
        $actual   = Xml::loadFile($actualFile);

        static::assertNotEquals($expected, $actual, $message);
>>>>>>> dev
    }

    /**
     * Asserts that two XML documents are equal.
     *
<<<<<<< HEAD
     * @param string $expectedFile
     * @param string $actualXml
     * @param string $message
     *
     * @since  Method available since Release 3.3.0
     */
    public static function assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')
    {
        $expected = PHPUnit_Util_XML::loadFile($expectedFile);
        $actual   = PHPUnit_Util_XML::load($actualXml);

        self::assertEquals($expected, $actual, $message);
=======
     * @param string             $expectedFile
     * @param string|DOMDocument $actualXml
     * @param string             $message
     */
    public static function assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')
    {
        $expected = Xml::loadFile($expectedFile);
        $actual   = Xml::load($actualXml);

        static::assertEquals($expected, $actual, $message);
>>>>>>> dev
    }

    /**
     * Asserts that two XML documents are not equal.
     *
<<<<<<< HEAD
     * @param string $expectedFile
     * @param string $actualXml
     * @param string $message
     *
     * @since  Method available since Release 3.3.0
     */
    public static function assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')
    {
        $expected = PHPUnit_Util_XML::loadFile($expectedFile);
        $actual   = PHPUnit_Util_XML::load($actualXml);

        self::assertNotEquals($expected, $actual, $message);
=======
     * @param string             $expectedFile
     * @param string|DOMDocument $actualXml
     * @param string             $message
     */
    public static function assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')
    {
        $expected = Xml::loadFile($expectedFile);
        $actual   = Xml::load($actualXml);

        static::assertNotEquals($expected, $actual, $message);
>>>>>>> dev
    }

    /**
     * Asserts that two XML documents are equal.
     *
<<<<<<< HEAD
     * @param string $expectedXml
     * @param string $actualXml
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')
    {
        $expected = PHPUnit_Util_XML::load($expectedXml);
        $actual   = PHPUnit_Util_XML::load($actualXml);

        self::assertEquals($expected, $actual, $message);
=======
     * @param string|DOMDocument $expectedXml
     * @param string|DOMDocument $actualXml
     * @param string             $message
     */
    public static function assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')
    {
        $expected = Xml::load($expectedXml);
        $actual   = Xml::load($actualXml);

        static::assertEquals($expected, $actual, $message);
>>>>>>> dev
    }

    /**
     * Asserts that two XML documents are not equal.
     *
<<<<<<< HEAD
     * @param string $expectedXml
     * @param string $actualXml
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')
    {
        $expected = PHPUnit_Util_XML::load($expectedXml);
        $actual   = PHPUnit_Util_XML::load($actualXml);

        self::assertNotEquals($expected, $actual, $message);
=======
     * @param string|DOMDocument $expectedXml
     * @param string|DOMDocument $actualXml
     * @param string             $message
     */
    public static function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')
    {
        $expected = Xml::load($expectedXml);
        $actual   = Xml::load($actualXml);

        static::assertNotEquals($expected, $actual, $message);
>>>>>>> dev
    }

    /**
     * Asserts that a hierarchy of DOMElements matches.
     *
     * @param DOMElement $expectedElement
     * @param DOMElement $actualElement
     * @param bool       $checkAttributes
     * @param string     $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
=======
>>>>>>> dev
     */
    public static function assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement, $checkAttributes = false, $message = '')
    {
        $tmp             = new DOMDocument;
        $expectedElement = $tmp->importNode($expectedElement, true);

        $tmp           = new DOMDocument;
        $actualElement = $tmp->importNode($actualElement, true);

        unset($tmp);

<<<<<<< HEAD
        self::assertEquals(
=======
        static::assertEquals(
>>>>>>> dev
            $expectedElement->tagName,
            $actualElement->tagName,
            $message
        );

        if ($checkAttributes) {
<<<<<<< HEAD
            self::assertEquals(
                $expectedElement->attributes->length,
                $actualElement->attributes->length,
                sprintf(
=======
            static::assertEquals(
                $expectedElement->attributes->length,
                $actualElement->attributes->length,
                \sprintf(
>>>>>>> dev
                    '%s%sNumber of attributes on node "%s" does not match',
                    $message,
                    !empty($message) ? "\n" : '',
                    $expectedElement->tagName
                )
            );

            for ($i = 0; $i < $expectedElement->attributes->length; $i++) {
                $expectedAttribute = $expectedElement->attributes->item($i);
                $actualAttribute   = $actualElement->attributes->getNamedItem(
                    $expectedAttribute->name
                );

                if (!$actualAttribute) {
<<<<<<< HEAD
                    self::fail(
                        sprintf(
=======
                    static::fail(
                        \sprintf(
>>>>>>> dev
                            '%s%sCould not find attribute "%s" on node "%s"',
                            $message,
                            !empty($message) ? "\n" : '',
                            $expectedAttribute->name,
                            $expectedElement->tagName
                        )
                    );
                }
            }
        }

<<<<<<< HEAD
        PHPUnit_Util_XML::removeCharacterDataNodes($expectedElement);
        PHPUnit_Util_XML::removeCharacterDataNodes($actualElement);

        self::assertEquals(
            $expectedElement->childNodes->length,
            $actualElement->childNodes->length,
            sprintf(
=======
        Xml::removeCharacterDataNodes($expectedElement);
        Xml::removeCharacterDataNodes($actualElement);

        static::assertEquals(
            $expectedElement->childNodes->length,
            $actualElement->childNodes->length,
            \sprintf(
>>>>>>> dev
                '%s%sNumber of child nodes of "%s" differs',
                $message,
                !empty($message) ? "\n" : '',
                $expectedElement->tagName
            )
        );

        for ($i = 0; $i < $expectedElement->childNodes->length; $i++) {
<<<<<<< HEAD
            self::assertEqualXMLStructure(
=======
            static::assertEqualXMLStructure(
>>>>>>> dev
                $expectedElement->childNodes->item($i),
                $actualElement->childNodes->item($i),
                $checkAttributes,
                $message
            );
        }
    }

    /**
<<<<<<< HEAD
     * Assert the presence, absence, or count of elements in a document matching
     * the CSS $selector, regardless of the contents of those elements.
     *
     * The first argument, $selector, is the CSS selector used to match
     * the elements in the $actual document.
     *
     * The second argument, $count, can be either boolean or numeric.
     * When boolean, it asserts for presence of elements matching the selector
     * (true) or absence of elements (false).
     * When numeric, it asserts the count of elements.
     *
     * assertSelectCount("#binder", true, $xml);  // any?
     * assertSelectCount(".binder", 3, $xml);     // exactly 3?
     *
     * @param array          $selector
     * @param int|bool|array $count
     * @param mixed          $actual
     * @param string         $message
     * @param bool           $isHtml
     *
     * @since  Method available since Release 3.3.0
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertSelectCount($selector, $count, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        self::assertSelectEquals(
            $selector,
            true,
            $count,
            $actual,
            $message,
            $isHtml
        );
    }

    /**
     * assertSelectRegExp("#binder .name", "/Mike|Derek/", true, $xml); // any?
     * assertSelectRegExp("#binder .name", "/Mike|Derek/", 3, $xml);    // 3?
     *
     * @param array          $selector
     * @param string         $pattern
     * @param int|bool|array $count
     * @param mixed          $actual
     * @param string         $message
     * @param bool           $isHtml
     *
     * @since  Method available since Release 3.3.0
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertSelectRegExp($selector, $pattern, $count, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        self::assertSelectEquals(
            $selector,
            "regexp:$pattern",
            $count,
            $actual,
            $message,
            $isHtml
        );
    }

    /**
     * assertSelectEquals("#binder .name", "Chuck", true,  $xml);  // any?
     * assertSelectEquals("#binder .name", "Chuck", false, $xml);  // none?
     *
     * @param array          $selector
     * @param string         $content
     * @param int|bool|array $count
     * @param mixed          $actual
     * @param string         $message
     * @param bool           $isHtml
     *
     * @since  Method available since Release 3.3.0
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertSelectEquals($selector, $content, $count, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $tags = PHPUnit_Util_XML::cssSelect(
            $selector,
            $content,
            $actual,
            $isHtml
        );

        // assert specific number of elements
        if (is_numeric($count)) {
            $counted = $tags ? count($tags) : 0;
            self::assertEquals($count, $counted, $message);
        } // assert any elements exist if true, assert no elements exist if false
        elseif (is_bool($count)) {
            $any = count($tags) > 0 && $tags[0] instanceof DOMNode;

            if ($count) {
                self::assertTrue($any, $message);
            } else {
                self::assertFalse($any, $message);
            }
        } // check for range number of elements
        elseif (is_array($count) &&
                (isset($count['>']) || isset($count['<']) ||
                isset($count['>=']) || isset($count['<=']))) {
            $counted = $tags ? count($tags) : 0;

            if (isset($count['>'])) {
                self::assertTrue($counted > $count['>'], $message);
            }

            if (isset($count['>='])) {
                self::assertTrue($counted >= $count['>='], $message);
            }

            if (isset($count['<'])) {
                self::assertTrue($counted < $count['<'], $message);
            }

            if (isset($count['<='])) {
                self::assertTrue($counted <= $count['<='], $message);
            }
        } else {
            throw new PHPUnit_Framework_Exception;
        }
    }

    /**
     * Evaluate an HTML or XML string and assert its structure and/or contents.
     *
     * The first argument ($matcher) is an associative array that specifies the
     * match criteria for the assertion:
     *
     *  - `id`           : the node with the given id attribute must match the
     *                     corresponding value.
     *  - `tag`          : the node type must match the corresponding value.
     *  - `attributes`   : a hash. The node's attributes must match the
     *                     corresponding values in the hash.
     *  - `content`      : The text content must match the given value.
     *  - `parent`       : a hash. The node's parent must match the
     *                     corresponding hash.
     *  - `child`        : a hash. At least one of the node's immediate children
     *                     must meet the criteria described by the hash.
     *  - `ancestor`     : a hash. At least one of the node's ancestors must
     *                     meet the criteria described by the hash.
     *  - `descendant`   : a hash. At least one of the node's descendants must
     *                     meet the criteria described by the hash.
     *  - `children`     : a hash, for counting children of a node.
     *                     Accepts the keys:
     *    - `count`        : a number which must equal the number of children
     *                       that match
     *    - `less_than`    : the number of matching children must be greater
     *                       than this number
     *    - `greater_than` : the number of matching children must be less than
     *                       this number
     *    - `only`         : another hash consisting of the keys to use to match
     *                       on the children, and only matching children will be
     *                       counted
     *
     * <code>
     * // Matcher that asserts that there is an element with an id="my_id".
     * $matcher = array('id' => 'my_id');
     *
     * // Matcher that asserts that there is a "span" tag.
     * $matcher = array('tag' => 'span');
     *
     * // Matcher that asserts that there is a "span" tag with the content
     * // "Hello World".
     * $matcher = array('tag' => 'span', 'content' => 'Hello World');
     *
     * // Matcher that asserts that there is a "span" tag with content matching
     * // the regular expression pattern.
     * $matcher = array('tag' => 'span', 'content' => 'regexp:/Try P(HP|ython)/');
     *
     * // Matcher that asserts that there is a "span" with an "list" class
     * // attribute.
     * $matcher = array(
     *   'tag'        => 'span',
     *   'attributes' => array('class' => 'list')
     * );
     *
     * // Matcher that asserts that there is a "span" inside of a "div".
     * $matcher = array(
     *   'tag'    => 'span',
     *   'parent' => array('tag' => 'div')
     * );
     *
     * // Matcher that asserts that there is a "span" somewhere inside a
     * // "table".
     * $matcher = array(
     *   'tag'      => 'span',
     *   'ancestor' => array('tag' => 'table')
     * );
     *
     * // Matcher that asserts that there is a "span" with at least one "em"
     * // child.
     * $matcher = array(
     *   'tag'   => 'span',
     *   'child' => array('tag' => 'em')
     * );
     *
     * // Matcher that asserts that there is a "span" containing a (possibly
     * // nested) "strong" tag.
     * $matcher = array(
     *   'tag'        => 'span',
     *   'descendant' => array('tag' => 'strong')
     * );
     *
     * // Matcher that asserts that there is a "span" containing 5-10 "em" tags
     * // as immediate children.
     * $matcher = array(
     *   'tag'      => 'span',
     *   'children' => array(
     *     'less_than'    => 11,
     *     'greater_than' => 4,
     *     'only'         => array('tag' => 'em')
     *   )
     * );
     *
     * // Matcher that asserts that there is a "div", with an "ul" ancestor and
     * // a "li" parent (with class="enum"), and containing a "span" descendant
     * // that contains an element with id="my_test" and the text "Hello World".
     * $matcher = array(
     *   'tag'        => 'div',
     *   'ancestor'   => array('tag' => 'ul'),
     *   'parent'     => array(
     *     'tag'        => 'li',
     *     'attributes' => array('class' => 'enum')
     *   ),
     *   'descendant' => array(
     *     'tag'   => 'span',
     *     'child' => array(
     *       'id'      => 'my_test',
     *       'content' => 'Hello World'
     *     )
     *   )
     * );
     *
     * // Use assertTag() to apply a $matcher to a piece of $html.
     * $this->assertTag($matcher, $html);
     *
     * // Use assertTag() to apply a $matcher to a piece of $xml.
     * $this->assertTag($matcher, $xml, '', false);
     * </code>
     *
     * The second argument ($actual) is a string containing either HTML or
     * XML text to be tested.
     *
     * The third argument ($message) is an optional message that will be
     * used if the assertion fails.
     *
     * The fourth argument ($html) is an optional flag specifying whether
     * to load the $actual string into a DOMDocument using the HTML or
     * XML load strategy.  It is true by default, which assumes the HTML
     * load strategy.  In many cases, this will be acceptable for XML as well.
     *
     * @param array  $matcher
     * @param string $actual
     * @param string $message
     * @param bool   $isHtml
     *
     * @since  Method available since Release 3.3.0
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertTag($matcher, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $dom     = PHPUnit_Util_XML::load($actual, $isHtml);
        $tags    = PHPUnit_Util_XML::findNodes($dom, $matcher, $isHtml);
        $matched = count($tags) > 0 && $tags[0] instanceof DOMNode;

        self::assertTrue($matched, $message);
    }

    /**
     * This assertion is the exact opposite of assertTag().
     *
     * Rather than asserting that $matcher results in a match, it asserts that
     * $matcher does not match.
     *
     * @param array  $matcher
     * @param string $actual
     * @param string $message
     * @param bool   $isHtml
     *
     * @since  Method available since Release 3.3.0
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertNotTag($matcher, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $dom     = PHPUnit_Util_XML::load($actual, $isHtml);
        $tags    = PHPUnit_Util_XML::findNodes($dom, $matcher, $isHtml);
        $matched = count($tags) > 0 && $tags[0] instanceof DOMNode;

        self::assertFalse($matched, $message);
    }

    /**
     * Evaluates a PHPUnit_Framework_Constraint matcher object.
     *
     * @param mixed                        $value
     * @param PHPUnit_Framework_Constraint $constraint
     * @param string                       $message
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertThat($value, PHPUnit_Framework_Constraint $constraint, $message = '')
    {
        self::$count += count($constraint);
=======
     * Evaluates a PHPUnit\Framework\Constraint matcher object.
     *
     * @param mixed      $value
     * @param Constraint $constraint
     * @param string     $message
     */
    public static function assertThat($value, Constraint $constraint, $message = '')
    {
        self::$count += \count($constraint);
>>>>>>> dev

        $constraint->evaluate($value, $message);
    }

    /**
     * Asserts that a string is a valid JSON string.
     *
     * @param string $actualJson
     * @param string $message
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.7.20
     */
    public static function assertJson($actualJson, $message = '')
    {
        if (!is_string($actualJson)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        self::assertThat($actualJson, self::isJson(), $message);
=======
     */
    public static function assertJson($actualJson, $message = '')
    {
        if (!\is_string($actualJson)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        static::assertThat($actualJson, static::isJson(), $message);
>>>>>>> dev
    }

    /**
     * Asserts that two given JSON encoded objects or arrays are equal.
     *
     * @param string $expectedJson
     * @param string $actualJson
     * @param string $message
     */
    public static function assertJsonStringEqualsJsonString($expectedJson, $actualJson, $message = '')
    {
<<<<<<< HEAD
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        $expected = json_decode($expectedJson);
        $actual   = json_decode($actualJson);

        self::assertEquals($expected, $actual, $message);
=======
        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraint = new JsonMatches(
            $expectedJson
        );

        static::assertThat($actualJson, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that two given JSON encoded objects or arrays are not equal.
     *
     * @param string $expectedJson
     * @param string $actualJson
     * @param string $message
     */
    public static function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = '')
    {
<<<<<<< HEAD
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        $expected = json_decode($expectedJson);
        $actual   = json_decode($actualJson);

        self::assertNotEquals($expected, $actual, $message);
=======
        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraint = new JsonMatches(
            $expectedJson
        );

        static::assertThat($actualJson, new LogicalNot($constraint), $message);
>>>>>>> dev
    }

    /**
     * Asserts that the generated JSON encoded object and the content of the given file are equal.
     *
     * @param string $expectedFile
     * @param string $actualJson
     * @param string $message
     */
    public static function assertJsonStringEqualsJsonFile($expectedFile, $actualJson, $message = '')
    {
<<<<<<< HEAD
        self::assertFileExists($expectedFile, $message);
        $expectedJson = file_get_contents($expectedFile);

        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        // call constraint
        $constraint = new PHPUnit_Framework_Constraint_JsonMatches(
            $expectedJson
        );

        self::assertThat($actualJson, $constraint, $message);
=======
        static::assertFileExists($expectedFile, $message);
        $expectedJson = \file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraint = new JsonMatches(
            $expectedJson
        );

        static::assertThat($actualJson, $constraint, $message);
>>>>>>> dev
    }

    /**
     * Asserts that the generated JSON encoded object and the content of the given file are not equal.
     *
     * @param string $expectedFile
     * @param string $actualJson
     * @param string $message
     */
    public static function assertJsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = '')
    {
<<<<<<< HEAD
        self::assertFileExists($expectedFile, $message);
        $expectedJson = file_get_contents($expectedFile);

        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        // call constraint
        $constraint = new PHPUnit_Framework_Constraint_JsonMatches(
            $expectedJson
        );

        self::assertThat($actualJson, new PHPUnit_Framework_Constraint_Not($constraint), $message);
    }

    /**
     * Asserts that two JSON files are not equal.
=======
        static::assertFileExists($expectedFile, $message);
        $expectedJson = \file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraint = new JsonMatches(
            $expectedJson
        );

        static::assertThat($actualJson, new LogicalNot($constraint), $message);
    }

    /**
     * Asserts that two JSON files are equal.
>>>>>>> dev
     *
     * @param string $expectedFile
     * @param string $actualFile
     * @param string $message
     */
<<<<<<< HEAD
    public static function assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')
    {
        self::assertFileExists($expectedFile, $message);
        self::assertFileExists($actualFile, $message);

        $actualJson   = file_get_contents($actualFile);
        $expectedJson = file_get_contents($expectedFile);

        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        // call constraint
        $constraintExpected = new PHPUnit_Framework_Constraint_JsonMatches(
            $expectedJson
        );

        $constraintActual = new PHPUnit_Framework_Constraint_JsonMatches($actualJson);

        self::assertThat($expectedJson, new PHPUnit_Framework_Constraint_Not($constraintActual), $message);
        self::assertThat($actualJson, new PHPUnit_Framework_Constraint_Not($constraintExpected), $message);
    }

    /**
     * Asserts that two JSON files are equal.
=======
    public static function assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')
    {
        static::assertFileExists($expectedFile, $message);
        static::assertFileExists($actualFile, $message);

        $actualJson   = \file_get_contents($actualFile);
        $expectedJson = \file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraintExpected = new JsonMatches(
            $expectedJson
        );

        $constraintActual = new JsonMatches($actualJson);

        static::assertThat($expectedJson, $constraintActual, $message);
        static::assertThat($actualJson, $constraintExpected, $message);
    }

    /**
     * Asserts that two JSON files are not equal.
>>>>>>> dev
     *
     * @param string $expectedFile
     * @param string $actualFile
     * @param string $message
     */
<<<<<<< HEAD
    public static function assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')
    {
        self::assertFileExists($expectedFile, $message);
        self::assertFileExists($actualFile, $message);

        $actualJson   = file_get_contents($actualFile);
        $expectedJson = file_get_contents($expectedFile);

        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        // call constraint
        $constraintExpected = new PHPUnit_Framework_Constraint_JsonMatches(
            $expectedJson
        );

        $constraintActual = new PHPUnit_Framework_Constraint_JsonMatches($actualJson);

        self::assertThat($expectedJson, $constraintActual, $message);
        self::assertThat($actualJson, $constraintExpected, $message);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_And matcher object.
     *
     * @return PHPUnit_Framework_Constraint_And
     *
     * @since  Method available since Release 3.0.0
     */
    public static function logicalAnd()
    {
        $constraints = func_get_args();

        $constraint = new PHPUnit_Framework_Constraint_And;
=======
    public static function assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')
    {
        static::assertFileExists($expectedFile, $message);
        static::assertFileExists($actualFile, $message);

        $actualJson   = \file_get_contents($actualFile);
        $expectedJson = \file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraintExpected = new JsonMatches(
            $expectedJson
        );

        $constraintActual = new JsonMatches($actualJson);

        static::assertThat($expectedJson, new LogicalNot($constraintActual), $message);
        static::assertThat($actualJson, new LogicalNot($constraintExpected), $message);
    }

    /**
     * @return LogicalAnd
     */
    public static function logicalAnd()
    {
        $constraints = \func_get_args();

        $constraint = new LogicalAnd;
>>>>>>> dev
        $constraint->setConstraints($constraints);

        return $constraint;
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_Or matcher object.
     *
     * @return PHPUnit_Framework_Constraint_Or
     *
     * @since  Method available since Release 3.0.0
     */
    public static function logicalOr()
    {
        $constraints = func_get_args();

        $constraint = new PHPUnit_Framework_Constraint_Or;
=======
     * @return LogicalOr
     */
    public static function logicalOr()
    {
        $constraints = \func_get_args();

        $constraint = new LogicalOr;
>>>>>>> dev
        $constraint->setConstraints($constraints);

        return $constraint;
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_Not matcher object.
     *
     * @param PHPUnit_Framework_Constraint $constraint
     *
     * @return PHPUnit_Framework_Constraint_Not
     *
     * @since  Method available since Release 3.0.0
     */
    public static function logicalNot(PHPUnit_Framework_Constraint $constraint)
    {
        return new PHPUnit_Framework_Constraint_Not($constraint);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Xor matcher object.
     *
     * @return PHPUnit_Framework_Constraint_Xor
     *
     * @since  Method available since Release 3.0.0
     */
    public static function logicalXor()
    {
        $constraints = func_get_args();

        $constraint = new PHPUnit_Framework_Constraint_Xor;
=======
     * @param Constraint $constraint
     *
     * @return LogicalNot
     */
    public static function logicalNot(Constraint $constraint)
    {
        return new LogicalNot($constraint);
    }

    /**
     * @return LogicalXor
     */
    public static function logicalXor()
    {
        $constraints = \func_get_args();

        $constraint = new LogicalXor;
>>>>>>> dev
        $constraint->setConstraints($constraints);

        return $constraint;
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_IsAnything matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsAnything
     *
     * @since  Method available since Release 3.0.0
     */
    public static function anything()
    {
        return new PHPUnit_Framework_Constraint_IsAnything;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsTrue matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsTrue
     *
     * @since  Method available since Release 3.3.0
     */
    public static function isTrue()
    {
        return new PHPUnit_Framework_Constraint_IsTrue;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Callback matcher object.
     *
     * @param callable $callback
     *
     * @return PHPUnit_Framework_Constraint_Callback
     */
    public static function callback($callback)
    {
        return new PHPUnit_Framework_Constraint_Callback($callback);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsFalse matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsFalse
     *
     * @since  Method available since Release 3.3.0
     */
    public static function isFalse()
    {
        return new PHPUnit_Framework_Constraint_IsFalse;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsJson matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsJson
     *
     * @since  Method available since Release 3.7.20
     */
    public static function isJson()
    {
        return new PHPUnit_Framework_Constraint_IsJson;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsNull matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsNull
     *
     * @since  Method available since Release 3.3.0
     */
    public static function isNull()
    {
        return new PHPUnit_Framework_Constraint_IsNull;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Attribute matcher object.
     *
     * @param PHPUnit_Framework_Constraint $constraint
     * @param string                       $attributeName
     *
     * @return PHPUnit_Framework_Constraint_Attribute
     *
     * @since  Method available since Release 3.1.0
     */
    public static function attribute(PHPUnit_Framework_Constraint $constraint, $attributeName)
    {
        return new PHPUnit_Framework_Constraint_Attribute(
=======
     * @return IsAnything
     */
    public static function anything()
    {
        return new IsAnything;
    }

    /**
     * @return IsTrue
     */
    public static function isTrue()
    {
        return new IsTrue;
    }

    /**
     * @param callable $callback
     *
     * @return Callback
     */
    public static function callback($callback)
    {
        return new Callback($callback);
    }

    /**
     * @return IsFalse
     */
    public static function isFalse()
    {
        return new IsFalse;
    }

    /**
     * @return IsJson
     */
    public static function isJson()
    {
        return new IsJson;
    }

    /**
     * @return IsNull
     */
    public static function isNull()
    {
        return new IsNull;
    }

    /**
     * @return IsFinite
     */
    public static function isFinite()
    {
        return new IsFinite;
    }

    /**
     * @return IsInfinite
     */
    public static function isInfinite()
    {
        return new IsInfinite;
    }

    /**
     * @return IsNan
     */
    public static function isNan()
    {
        return new IsNan;
    }

    /**
     * @param Constraint $constraint
     * @param string     $attributeName
     *
     * @return Attribute
     */
    public static function attribute(Constraint $constraint, $attributeName)
    {
        return new Attribute(
>>>>>>> dev
            $constraint,
            $attributeName
        );
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_TraversableContains matcher
     * object.
     *
=======
>>>>>>> dev
     * @param mixed $value
     * @param bool  $checkForObjectIdentity
     * @param bool  $checkForNonObjectIdentity
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_Constraint_TraversableContains
     *
     * @since  Method available since Release 3.0.0
     */
    public static function contains($value, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        return new PHPUnit_Framework_Constraint_TraversableContains($value, $checkForObjectIdentity, $checkForNonObjectIdentity);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
     * object.
     *
     * @param string $type
     *
     * @return PHPUnit_Framework_Constraint_TraversableContainsOnly
     *
     * @since  Method available since Release 3.1.4
     */
    public static function containsOnly($type)
    {
        return new PHPUnit_Framework_Constraint_TraversableContainsOnly($type);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
     * object.
     *
     * @param string $classname
     *
     * @return PHPUnit_Framework_Constraint_TraversableContainsOnly
     */
    public static function containsOnlyInstancesOf($classname)
    {
        return new PHPUnit_Framework_Constraint_TraversableContainsOnly($classname, false);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_ArrayHasKey matcher object.
     *
     * @param mixed $key
     *
     * @return PHPUnit_Framework_Constraint_ArrayHasKey
     *
     * @since  Method available since Release 3.0.0
     */
    public static function arrayHasKey($key)
    {
        return new PHPUnit_Framework_Constraint_ArrayHasKey($key);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsEqual matcher object.
     *
=======
     * @return TraversableContains
     */
    public static function contains($value, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        return new TraversableContains($value, $checkForObjectIdentity, $checkForNonObjectIdentity);
    }

    /**
     * @param string $type
     *
     * @return TraversableContainsOnly
     */
    public static function containsOnly($type)
    {
        return new TraversableContainsOnly($type);
    }

    /**
     * @param string $classname
     *
     * @return TraversableContainsOnly
     */
    public static function containsOnlyInstancesOf($classname)
    {
        return new TraversableContainsOnly($classname, false);
    }

    /**
     * @param mixed $key
     *
     * @return ArrayHasKey
     */
    public static function arrayHasKey($key)
    {
        return new ArrayHasKey($key);
    }

    /**
>>>>>>> dev
     * @param mixed $value
     * @param float $delta
     * @param int   $maxDepth
     * @param bool  $canonicalize
     * @param bool  $ignoreCase
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_Constraint_IsEqual
     *
     * @since  Method available since Release 3.0.0
     */
    public static function equalTo($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        return new PHPUnit_Framework_Constraint_IsEqual(
=======
     * @return IsEqual
     */
    public static function equalTo($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        return new IsEqual(
>>>>>>> dev
            $value,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_IsEqual matcher object
     * that is wrapped in a PHPUnit_Framework_Constraint_Attribute matcher
     * object.
     *
=======
>>>>>>> dev
     * @param string $attributeName
     * @param mixed  $value
     * @param float  $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_Constraint_Attribute
     *
     * @since  Method available since Release 3.1.0
     */
    public static function attributeEqualTo($attributeName, $value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        return self::attribute(
            self::equalTo(
=======
     * @return Attribute
     */
    public static function attributeEqualTo($attributeName, $value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        return static::attribute(
            static::equalTo(
>>>>>>> dev
                $value,
                $delta,
                $maxDepth,
                $canonicalize,
                $ignoreCase
            ),
            $attributeName
        );
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_IsEmpty matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsEmpty
     *
     * @since  Method available since Release 3.5.0
     */
    public static function isEmpty()
    {
        return new PHPUnit_Framework_Constraint_IsEmpty;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_FileExists matcher object.
     *
     * @return PHPUnit_Framework_Constraint_FileExists
     *
     * @since  Method available since Release 3.0.0
     */
    public static function fileExists()
    {
        return new PHPUnit_Framework_Constraint_FileExists;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_GreaterThan matcher object.
     *
     * @param mixed $value
     *
     * @return PHPUnit_Framework_Constraint_GreaterThan
     *
     * @since  Method available since Release 3.0.0
     */
    public static function greaterThan($value)
    {
        return new PHPUnit_Framework_Constraint_GreaterThan($value);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Or matcher object that wraps
     * a PHPUnit_Framework_Constraint_IsEqual and a
     * PHPUnit_Framework_Constraint_GreaterThan matcher object.
     *
     * @param mixed $value
     *
     * @return PHPUnit_Framework_Constraint_Or
     *
     * @since  Method available since Release 3.1.0
     */
    public static function greaterThanOrEqual($value)
    {
        return self::logicalOr(
            new PHPUnit_Framework_Constraint_IsEqual($value),
            new PHPUnit_Framework_Constraint_GreaterThan($value)
=======
     * @return IsEmpty
     */
    public static function isEmpty()
    {
        return new IsEmpty;
    }

    /**
     * @return IsWritable
     */
    public static function isWritable()
    {
        return new IsWritable;
    }

    /**
     * @return IsReadable
     */
    public static function isReadable()
    {
        return new IsReadable;
    }

    /**
     * @return DirectoryExists
     */
    public static function directoryExists()
    {
        return new DirectoryExists;
    }

    /**
     * @return FileExists
     */
    public static function fileExists()
    {
        return new FileExists;
    }

    /**
     * @param mixed $value
     *
     * @return GreaterThan
     */
    public static function greaterThan($value)
    {
        return new GreaterThan($value);
    }

    /**
     * @param mixed $value
     *
     * @return LogicalOr
     */
    public static function greaterThanOrEqual($value)
    {
        return static::logicalOr(
            new IsEqual($value),
            new GreaterThan($value)
>>>>>>> dev
        );
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_ClassHasAttribute matcher object.
     *
     * @param string $attributeName
     *
     * @return PHPUnit_Framework_Constraint_ClassHasAttribute
     *
     * @since  Method available since Release 3.1.0
     */
    public static function classHasAttribute($attributeName)
    {
        return new PHPUnit_Framework_Constraint_ClassHasAttribute(
=======
     * @param string $attributeName
     *
     * @return ClassHasAttribute
     */
    public static function classHasAttribute($attributeName)
    {
        return new ClassHasAttribute(
>>>>>>> dev
            $attributeName
        );
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_ClassHasStaticAttribute matcher
     * object.
     *
     * @param string $attributeName
     *
     * @return PHPUnit_Framework_Constraint_ClassHasStaticAttribute
     *
     * @since  Method available since Release 3.1.0
     */
    public static function classHasStaticAttribute($attributeName)
    {
        return new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
=======
     * @param string $attributeName
     *
     * @return ClassHasStaticAttribute
     */
    public static function classHasStaticAttribute($attributeName)
    {
        return new ClassHasStaticAttribute(
>>>>>>> dev
            $attributeName
        );
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_ObjectHasAttribute matcher object.
     *
     * @param string $attributeName
     *
     * @return PHPUnit_Framework_Constraint_ObjectHasAttribute
     *
     * @since  Method available since Release 3.0.0
     */
    public static function objectHasAttribute($attributeName)
    {
        return new PHPUnit_Framework_Constraint_ObjectHasAttribute(
=======
     * @param string $attributeName
     *
     * @return ObjectHasAttribute
     */
    public static function objectHasAttribute($attributeName)
    {
        return new ObjectHasAttribute(
>>>>>>> dev
            $attributeName
        );
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_IsIdentical matcher object.
     *
     * @param mixed $value
     *
     * @return PHPUnit_Framework_Constraint_IsIdentical
     *
     * @since  Method available since Release 3.0.0
     */
    public static function identicalTo($value)
    {
        return new PHPUnit_Framework_Constraint_IsIdentical($value);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsInstanceOf matcher object.
     *
     * @param string $className
     *
     * @return PHPUnit_Framework_Constraint_IsInstanceOf
     *
     * @since  Method available since Release 3.0.0
     */
    public static function isInstanceOf($className)
    {
        return new PHPUnit_Framework_Constraint_IsInstanceOf($className);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsType matcher object.
     *
     * @param string $type
     *
     * @return PHPUnit_Framework_Constraint_IsType
     *
     * @since  Method available since Release 3.0.0
     */
    public static function isType($type)
    {
        return new PHPUnit_Framework_Constraint_IsType($type);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_LessThan matcher object.
     *
     * @param mixed $value
     *
     * @return PHPUnit_Framework_Constraint_LessThan
     *
     * @since  Method available since Release 3.0.0
     */
    public static function lessThan($value)
    {
        return new PHPUnit_Framework_Constraint_LessThan($value);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Or matcher object that wraps
     * a PHPUnit_Framework_Constraint_IsEqual and a
     * PHPUnit_Framework_Constraint_LessThan matcher object.
     *
     * @param mixed $value
     *
     * @return PHPUnit_Framework_Constraint_Or
     *
     * @since  Method available since Release 3.1.0
     */
    public static function lessThanOrEqual($value)
    {
        return self::logicalOr(
            new PHPUnit_Framework_Constraint_IsEqual($value),
            new PHPUnit_Framework_Constraint_LessThan($value)
=======
     * @param mixed $value
     *
     * @return IsIdentical
     */
    public static function identicalTo($value)
    {
        return new IsIdentical($value);
    }

    /**
     * @param string $className
     *
     * @return IsInstanceOf
     */
    public static function isInstanceOf($className)
    {
        return new IsInstanceOf($className);
    }

    /**
     * @param string $type
     *
     * @return IsType
     */
    public static function isType($type)
    {
        return new IsType($type);
    }

    /**
     * @param mixed $value
     *
     * @return LessThan
     */
    public static function lessThan($value)
    {
        return new LessThan($value);
    }

    /**
     * @param mixed $value
     *
     * @return LogicalOr
     */
    public static function lessThanOrEqual($value)
    {
        return static::logicalOr(
            new IsEqual($value),
            new LessThan($value)
>>>>>>> dev
        );
    }

    /**
<<<<<<< HEAD
     * Returns a PHPUnit_Framework_Constraint_PCREMatch matcher object.
     *
     * @param string $pattern
     *
     * @return PHPUnit_Framework_Constraint_PCREMatch
     *
     * @since  Method available since Release 3.0.0
     */
    public static function matchesRegularExpression($pattern)
    {
        return new PHPUnit_Framework_Constraint_PCREMatch($pattern);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_StringMatches matcher object.
     *
     * @param string $string
     *
     * @return PHPUnit_Framework_Constraint_StringMatches
     *
     * @since  Method available since Release 3.5.0
     */
    public static function matches($string)
    {
        return new PHPUnit_Framework_Constraint_StringMatches($string);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_StringStartsWith matcher object.
     *
     * @param mixed $prefix
     *
     * @return PHPUnit_Framework_Constraint_StringStartsWith
     *
     * @since  Method available since Release 3.4.0
     */
    public static function stringStartsWith($prefix)
    {
        return new PHPUnit_Framework_Constraint_StringStartsWith($prefix);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_StringContains matcher object.
     *
     * @param string $string
     * @param bool   $case
     *
     * @return PHPUnit_Framework_Constraint_StringContains
     *
     * @since  Method available since Release 3.0.0
     */
    public static function stringContains($string, $case = true)
    {
        return new PHPUnit_Framework_Constraint_StringContains($string, $case);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_StringEndsWith matcher object.
     *
     * @param mixed $suffix
     *
     * @return PHPUnit_Framework_Constraint_StringEndsWith
     *
     * @since  Method available since Release 3.4.0
     */
    public static function stringEndsWith($suffix)
    {
        return new PHPUnit_Framework_Constraint_StringEndsWith($suffix);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Count matcher object.
     *
     * @param int $count
     *
     * @return PHPUnit_Framework_Constraint_Count
     */
    public static function countOf($count)
    {
        return new PHPUnit_Framework_Constraint_Count($count);
    }
=======
     * @param string $pattern
     *
     * @return RegularExpression
     */
    public static function matchesRegularExpression($pattern)
    {
        return new RegularExpression($pattern);
    }

    /**
     * @param string $string
     *
     * @return StringMatchesFormatDescription
     */
    public static function matches($string)
    {
        return new StringMatchesFormatDescription($string);
    }

    /**
     * @param mixed $prefix
     *
     * @return StringStartsWith
     */
    public static function stringStartsWith($prefix)
    {
        return new StringStartsWith($prefix);
    }

    /**
     * @param string $string
     * @param bool   $case
     *
     * @return StringContains
     */
    public static function stringContains($string, $case = true)
    {
        return new StringContains($string, $case);
    }

    /**
     * @param mixed $suffix
     *
     * @return StringEndsWith
     */
    public static function stringEndsWith($suffix)
    {
        return new StringEndsWith($suffix);
    }

    /**
     * @param int $count
     *
     * @return Count
     */
    public static function countOf($count)
    {
        return new Count($count);
    }

>>>>>>> dev
    /**
     * Fails a test with the given message.
     *
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function fail($message = '')
    {
        throw new PHPUnit_Framework_AssertionFailedError($message);
=======
     * @throws AssertionFailedError
     */
    public static function fail($message = '')
    {
        self::$count++;

        throw new AssertionFailedError($message);
>>>>>>> dev
    }

    /**
     * Returns the value of an attribute of a class or an object.
     * This also works for attributes that are declared protected or private.
     *
<<<<<<< HEAD
     * @param mixed  $classOrObject
     * @param string $attributeName
     *
     * @return mixed
     *
     * @throws PHPUnit_Framework_Exception
     */
    public static function readAttribute($classOrObject, $attributeName)
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
        }

        if (is_string($classOrObject)) {
            if (!class_exists($classOrObject)) {
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
=======
     * @param string|object $classOrObject
     * @param string        $attributeName
     *
     * @return mixed
     *
     * @throws Exception
     */
    public static function readAttribute($classOrObject, $attributeName)
    {
        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(2, 'valid attribute name');
        }

        if (\is_string($classOrObject)) {
            if (!\class_exists($classOrObject)) {
                throw InvalidArgumentHelper::factory(
>>>>>>> dev
                    1,
                    'class name'
                );
            }

<<<<<<< HEAD
            return self::getStaticAttribute(
                $classOrObject,
                $attributeName
            );
        } elseif (is_object($classOrObject)) {
            return self::getObjectAttribute(
                $classOrObject,
                $attributeName
            );
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'class name or object'
            );
        }
=======
            return static::getStaticAttribute(
                $classOrObject,
                $attributeName
            );
        }

        if (\is_object($classOrObject)) {
            return static::getObjectAttribute(
                $classOrObject,
                $attributeName
            );
        }

        throw InvalidArgumentHelper::factory(
            1,
            'class name or object'
        );
>>>>>>> dev
    }

    /**
     * Returns the value of a static attribute.
     * This also works for attributes that are declared protected or private.
     *
     * @param string $className
     * @param string $attributeName
     *
     * @return mixed
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public static function getStaticAttribute($className, $attributeName)
    {
        if (!is_string($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class name');
        }

        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
=======
     * @throws Exception
     */
    public static function getStaticAttribute($className, $attributeName)
    {
        if (!\is_string($className)) {
            throw InvalidArgumentHelper::factory(1, 'string');
        }

        if (!\class_exists($className)) {
            throw InvalidArgumentHelper::factory(1, 'class name');
        }

        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(2, 'valid attribute name');
>>>>>>> dev
        }

        $class = new ReflectionClass($className);

        while ($class) {
            $attributes = $class->getStaticProperties();

<<<<<<< HEAD
            if (array_key_exists($attributeName, $attributes)) {
=======
            if (\array_key_exists($attributeName, $attributes)) {
>>>>>>> dev
                return $attributes[$attributeName];
            }

            $class = $class->getParentClass();
        }

<<<<<<< HEAD
        throw new PHPUnit_Framework_Exception(
            sprintf(
=======
        throw new Exception(
            \sprintf(
>>>>>>> dev
                'Attribute "%s" not found in class.',
                $attributeName
            )
        );
    }

    /**
     * Returns the value of an object's attribute.
     * This also works for attributes that are declared protected or private.
     *
     * @param object $object
     * @param string $attributeName
     *
     * @return mixed
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public static function getObjectAttribute($object, $attributeName)
    {
        if (!is_object($object)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'object');
        }

        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
=======
     * @throws Exception
     */
    public static function getObjectAttribute($object, $attributeName)
    {
        if (!\is_object($object)) {
            throw InvalidArgumentHelper::factory(1, 'object');
        }

        if (!\is_string($attributeName)) {
            throw InvalidArgumentHelper::factory(2, 'string');
        }

        if (!\preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw InvalidArgumentHelper::factory(2, 'valid attribute name');
>>>>>>> dev
        }

        try {
            $attribute = new ReflectionProperty($object, $attributeName);
        } catch (ReflectionException $e) {
            $reflector = new ReflectionObject($object);

            while ($reflector = $reflector->getParentClass()) {
                try {
                    $attribute = $reflector->getProperty($attributeName);
<<<<<<< HEAD
=======

>>>>>>> dev
                    break;
                } catch (ReflectionException $e) {
                }
            }
        }

        if (isset($attribute)) {
            if (!$attribute || $attribute->isPublic()) {
                return $object->$attributeName;
            }

            $attribute->setAccessible(true);
            $value = $attribute->getValue($object);
            $attribute->setAccessible(false);

            return $value;
        }

<<<<<<< HEAD
        throw new PHPUnit_Framework_Exception(
            sprintf(
=======
        throw new Exception(
            \sprintf(
>>>>>>> dev
                'Attribute "%s" not found in object.',
                $attributeName
            )
        );
    }

    /**
     * Mark the test as incomplete.
     *
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_IncompleteTestError
     *
     * @since  Method available since Release 3.0.0
     */
    public static function markTestIncomplete($message = '')
    {
        throw new PHPUnit_Framework_IncompleteTestError($message);
=======
     * @throws IncompleteTestError
     */
    public static function markTestIncomplete($message = '')
    {
        throw new IncompleteTestError($message);
>>>>>>> dev
    }

    /**
     * Mark the test as skipped.
     *
     * @param string $message
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_SkippedTestError
     *
     * @since  Method available since Release 3.0.0
     */
    public static function markTestSkipped($message = '')
    {
        throw new PHPUnit_Framework_SkippedTestError($message);
=======
     * @throws SkippedTestError
     */
    public static function markTestSkipped($message = '')
    {
        throw new SkippedTestError($message);
>>>>>>> dev
    }

    /**
     * Return the current assertion count.
     *
     * @return int
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.3
=======
>>>>>>> dev
     */
    public static function getCount()
    {
        return self::$count;
    }

    /**
     * Reset the assertion counter.
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.3
=======
>>>>>>> dev
     */
    public static function resetCount()
    {
        self::$count = 0;
    }
}
