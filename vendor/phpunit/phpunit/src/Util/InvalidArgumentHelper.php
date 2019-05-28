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
 * Factory for PHPUnit_Framework_Exception objects that are used to describe
 * invalid arguments passed to a function or method.
 *
 * @since Class available since Release 3.4.0
 */
class PHPUnit_Util_InvalidArgumentHelper
=======
namespace PHPUnit\Util;

use PHPUnit\Framework\Exception;

/**
 * Factory for PHPUnit\Framework\Exception objects that are used to describe
 * invalid arguments passed to a function or method.
 */
class InvalidArgumentHelper
>>>>>>> dev
{
    /**
     * @param int    $argument
     * @param string $type
     * @param mixed  $value
     *
<<<<<<< HEAD
     * @return PHPUnit_Framework_Exception
     */
    public static function factory($argument, $type, $value = null)
    {
        $stack = debug_backtrace(false);

        return new PHPUnit_Framework_Exception(
            sprintf(
                'Argument #%d%sof %s::%s() must be a %s',
                $argument,
                $value !== null ? ' (' . gettype($value) . '#' . $value . ')' : ' (No Value) ',
=======
     * @return Exception
     */
    public static function factory($argument, $type, $value = null)
    {
        $stack = \debug_backtrace();

        return new Exception(
            \sprintf(
                'Argument #%d%sof %s::%s() must be a %s',
                $argument,
                $value !== null ? ' (' . \gettype($value) . '#' . $value . ')' : ' (No Value) ',
>>>>>>> dev
                $stack[1]['class'],
                $stack[1]['function'],
                $type
            )
        );
    }
}
