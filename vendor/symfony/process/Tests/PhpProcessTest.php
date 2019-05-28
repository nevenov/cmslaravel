<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Process\Tests;

<<<<<<< HEAD
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\PhpProcess;

class PhpProcessTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\PhpProcess;

class PhpProcessTest extends TestCase
>>>>>>> dev
{
    public function testNonBlockingWorks()
    {
        $expected = 'hello world!';
        $process = new PhpProcess(<<<PHP
<?php echo '$expected';
PHP
        );
        $process->start();
        $process->wait();
        $this->assertEquals($expected, $process->getOutput());
    }

    public function testCommandLine()
    {
        $process = new PhpProcess(<<<'PHP'
<<<<<<< HEAD
<?php echo 'foobar';
=======
<?php echo phpversion().PHP_SAPI;
>>>>>>> dev
PHP
        );

        $commandLine = $process->getCommandLine();

<<<<<<< HEAD
        $f = new PhpExecutableFinder();
        $this->assertContains($f->find(), $commandLine, '::getCommandLine() returns the command line of PHP before start');

=======
>>>>>>> dev
        $process->start();
        $this->assertContains($commandLine, $process->getCommandLine(), '::getCommandLine() returns the command line of PHP after start');

        $process->wait();
        $this->assertContains($commandLine, $process->getCommandLine(), '::getCommandLine() returns the command line of PHP after wait');
<<<<<<< HEAD
=======

        $this->assertSame(PHP_VERSION.\PHP_SAPI, $process->getOutput());
    }

    public function testPassingPhpExplicitly()
    {
        $finder = new PhpExecutableFinder();
        $php = array_merge([$finder->find(false)], $finder->findArguments());

        $expected = 'hello world!';
        $script = <<<PHP
<?php echo '$expected';
PHP;
        $process = new PhpProcess($script, null, null, 60, $php);
        $process->run();
        $this->assertEquals($expected, $process->getOutput());
>>>>>>> dev
    }
}
