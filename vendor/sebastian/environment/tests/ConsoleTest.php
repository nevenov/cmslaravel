<?php
/*
<<<<<<< HEAD
 * This file is part of the Environment package.
=======
 * This file is part of sebastian/environment.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
namespace SebastianBergmann\Environment;

use PHPUnit_Framework_TestCase;

class ConsoleTest extends PHPUnit_Framework_TestCase
=======
declare(strict_types=1);

namespace SebastianBergmann\Environment;

use PHPUnit\Framework\TestCase;

/**
 * @covers \SebastianBergmann\Environment\Console
 */
final class ConsoleTest extends TestCase
>>>>>>> dev
{
    /**
     * @var \SebastianBergmann\Environment\Console
     */
    private $console;

<<<<<<< HEAD
    protected function setUp()
=======
    protected function setUp()/*: void*/
>>>>>>> dev
    {
        $this->console = new Console;
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Console::isInteractive
     */
    public function testCanDetectIfStdoutIsInteractiveByDefault()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanDetectIfStdoutIsInteractiveByDefault()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('boolean', $this->console->isInteractive());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Console::isInteractive
     */
    public function testCanDetectIfFileDescriptorIsInteractive()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanDetectIfFileDescriptorIsInteractive()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('boolean', $this->console->isInteractive(STDOUT));
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Console::hasColorSupport
     * @uses   \SebastianBergmann\Environment\Console::isInteractive
     */
    public function testCanDetectColorSupport()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanDetectColorSupport()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('boolean', $this->console->hasColorSupport());
    }

    /**
<<<<<<< HEAD
     * @covers \SebastianBergmann\Environment\Console::getNumberOfColumns
     * @uses   \SebastianBergmann\Environment\Console::isInteractive
     */
    public function testCanDetectNumberOfColumns()
=======
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanDetectNumberOfColumns()/*: void*/
>>>>>>> dev
    {
        $this->assertInternalType('integer', $this->console->getNumberOfColumns());
    }
}
