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
 * Extension to PHPUnit_Framework_AssertionFailedError to mark the special
 * case of an incomplete test.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Framework_IncompleteTestError extends PHPUnit_Framework_AssertionFailedError implements PHPUnit_Framework_IncompleteTest
=======
namespace PHPUnit\Framework;

class IncompleteTestError extends AssertionFailedError implements IncompleteTest
>>>>>>> dev
{
}
