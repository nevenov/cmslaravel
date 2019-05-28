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
 * Thrown when an assertion failed.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Framework_AssertionFailedError extends PHPUnit_Framework_Exception implements PHPUnit_Framework_SelfDescribing
=======
namespace PHPUnit\Framework;

/**
 * Thrown when an assertion failed.
 */
class AssertionFailedError extends Exception implements SelfDescribing
>>>>>>> dev
{
    /**
     * Wrapper for getMessage() which is declared as final.
     *
     * @return string
     */
    public function toString()
    {
        return $this->getMessage();
    }
}
