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
 * Wrapper for PHP deprecated errors.
 * You can disable deprecated-to-exception conversion by setting
 *
 * <code>
 * PHPUnit_Framework_Error_Deprecated::$enabled = false;
 * </code>
 *
 * @since Class available since Release 3.3.0
 */
class PHPUnit_Framework_Error_Deprecated extends PHPUnit_Framework_Error
=======
namespace PHPUnit\Framework\Error;

class Deprecated extends Error
>>>>>>> dev
{
    public static $enabled = true;
}
