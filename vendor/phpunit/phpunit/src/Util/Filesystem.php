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
 * Filesystem helpers.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Util_Filesystem
=======
namespace PHPUnit\Util;

/**
 * Filesystem helpers.
 */
class Filesystem
>>>>>>> dev
{
    /**
     * @var array
     */
<<<<<<< HEAD
    protected static $buffer = array();
=======
    protected static $buffer = [];
>>>>>>> dev

    /**
     * Maps class names to source file names:
     *   - PEAR CS:   Foo_Bar_Baz -> Foo/Bar/Baz.php
     *   - Namespace: Foo\Bar\Baz -> Foo/Bar/Baz.php
     *
     * @param string $className
     *
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.4.0
     */
    public static function classNameToFilename($className)
    {
        return str_replace(
            array('_', '\\'),
=======
     */
    public static function classNameToFilename($className)
    {
        return \str_replace(
            ['_', '\\'],
>>>>>>> dev
            DIRECTORY_SEPARATOR,
            $className
        ) . '.php';
    }
}
