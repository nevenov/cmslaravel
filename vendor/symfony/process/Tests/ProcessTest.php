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
use Symfony\Component\Process\Exception\LogicException;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Exception\RuntimeException;
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Process\Exception\LogicException;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\InputStream;
>>>>>>> dev
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Pipes\PipesInterface;
use Symfony\Component\Process\Process;

/**
 * @author Robert Schönthal <seroscho@googlemail.com>
 */
<<<<<<< HEAD
class ProcessTest extends \PHPUnit_Framework_TestCase
=======
class ProcessTest extends TestCase
>>>>>>> dev
{
    private static $phpBin;
    private static $process;
    private static $sigchild;
<<<<<<< HEAD
    private static $notEnhancedSigchild = false;
=======
>>>>>>> dev

    public static function setUpBeforeClass()
    {
        $phpBin = new PhpExecutableFinder();
<<<<<<< HEAD
        self::$phpBin = getenv('SYMFONY_PROCESS_PHP_TEST_BINARY') ?: ('phpdbg' === PHP_SAPI ? 'php' : $phpBin->find());
        if ('\\' !== DIRECTORY_SEPARATOR) {
            // exec is mandatory to deal with sending a signal to the process
            // see https://github.com/symfony/symfony/issues/5030 about prepending
            // command with exec
            self::$phpBin = 'exec '.self::$phpBin;
        }
=======
        self::$phpBin = getenv('SYMFONY_PROCESS_PHP_TEST_BINARY') ?: ('phpdbg' === \PHP_SAPI ? 'php' : $phpBin->find());
>>>>>>> dev

        ob_start();
        phpinfo(INFO_GENERAL);
        self::$sigchild = false !== strpos(ob_get_clean(), '--enable-sigchild');
    }

    protected function tearDown()
    {
        if (self::$process) {
            self::$process->stop(0);
            self::$process = null;
        }
    }

<<<<<<< HEAD
    public function testThatProcessDoesNotThrowWarningDuringRun()
    {
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('This test is transient on Windows');
        }
        @trigger_error('Test Error', E_USER_NOTICE);
        $process = $this->getProcess(self::$phpBin." -r 'sleep(3)'");
=======
    /**
     * @expectedException \Symfony\Component\Process\Exception\RuntimeException
     * @expectedExceptionMessage The provided cwd does not exist.
     */
    public function testInvalidCwd()
    {
        try {
            // Check that it works fine if the CWD exists
            $cmd = new Process(['echo', 'test'], __DIR__);
            $cmd->run();
        } catch (\Exception $e) {
            $this->fail($e);
        }

        $cmd = new Process(['echo', 'test'], __DIR__.'/notfound/');
        $cmd->run();
    }

    public function testThatProcessDoesNotThrowWarningDuringRun()
    {
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('This test is transient on Windows');
        }
        @trigger_error('Test Error', E_USER_NOTICE);
        $process = $this->getProcessForCode('sleep(3)');
>>>>>>> dev
        $process->run();
        $actualError = error_get_last();
        $this->assertEquals('Test Error', $actualError['message']);
        $this->assertEquals(E_USER_NOTICE, $actualError['type']);
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\InvalidArgumentException
     */
    public function testNegativeTimeoutFromConstructor()
    {
        $this->getProcess('', null, null, null, -1);
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\InvalidArgumentException
     */
    public function testNegativeTimeoutFromSetter()
    {
        $p = $this->getProcess('');
        $p->setTimeout(-1);
    }

    public function testFloatAndNullTimeout()
    {
        $p = $this->getProcess('');

        $p->setTimeout(10);
        $this->assertSame(10.0, $p->getTimeout());

        $p->setTimeout(null);
        $this->assertNull($p->getTimeout());

        $p->setTimeout(0.0);
        $this->assertNull($p->getTimeout());
    }

    /**
     * @requires extension pcntl
     */
    public function testStopWithTimeoutIsActuallyWorking()
    {
<<<<<<< HEAD
        $p = $this->getProcess(self::$phpBin.' '.__DIR__.'/NonStopableProcess.php 30');
        $p->start();

        while (false === strpos($p->getOutput(), 'received')) {
            usleep(1000);
        }
=======
        $p = $this->getProcess([self::$phpBin, __DIR__.'/NonStopableProcess.php', 30]);
        $p->start();

        while ($p->isRunning() && false === strpos($p->getOutput(), 'received')) {
            usleep(1000);
        }

        if (!$p->isRunning()) {
            throw new \LogicException('Process is not running: '.$p->getErrorOutput());
        }

>>>>>>> dev
        $start = microtime(true);
        $p->stop(0.1);

        $p->wait();

        $this->assertLessThan(15, microtime(true) - $start);
    }

<<<<<<< HEAD
=======
    public function testWaitUntilSpecificOutput()
    {
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestIncomplete('This test is too transient on Windows, help wanted to improve it');
        }

        $p = $this->getProcess([self::$phpBin, __DIR__.'/KillableProcessWithOutput.php']);
        $p->start();

        $start = microtime(true);

        $completeOutput = '';
        $result = $p->waitUntil(function ($type, $output) use (&$completeOutput) {
            return false !== strpos($completeOutput .= $output, 'One more');
        });
        $this->assertTrue($result);
        $this->assertLessThan(20, microtime(true) - $start);
        $this->assertStringStartsWith("First iteration output\nSecond iteration output\nOne more", $completeOutput);
        $p->stop();
    }

    public function testWaitUntilCanReturnFalse()
    {
        $p = $this->getProcess('echo foo');
        $p->start();
        $this->assertFalse($p->waitUntil(function () { return false; }));
    }

>>>>>>> dev
    public function testAllOutputIsActuallyReadOnTermination()
    {
        // this code will result in a maximum of 2 reads of 8192 bytes by calling
        // start() and isRunning().  by the time getOutput() is called the process
        // has terminated so the internal pipes array is already empty. normally
        // the call to start() will not read any data as the process will not have
        // generated output, but this is non-deterministic so we must count it as
        // a possibility.  therefore we need 2 * PipesInterface::CHUNK_SIZE plus
        // another byte which will never be read.
        $expectedOutputSize = PipesInterface::CHUNK_SIZE * 2 + 2;

        $code = sprintf('echo str_repeat(\'*\', %d);', $expectedOutputSize);
<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg($code)));
=======
        $p = $this->getProcessForCode($code);
>>>>>>> dev

        $p->start();

        // Don't call Process::run nor Process::wait to avoid any read of pipes
        $h = new \ReflectionProperty($p, 'process');
        $h->setAccessible(true);
        $h = $h->getValue($p);
        $s = @proc_get_status($h);

        while (!empty($s['running'])) {
            usleep(1000);
            $s = proc_get_status($h);
        }

        $o = $p->getOutput();

<<<<<<< HEAD
        $this->assertEquals($expectedOutputSize, strlen($o));
=======
        $this->assertEquals($expectedOutputSize, \strlen($o));
>>>>>>> dev
    }

    public function testCallbacksAreExecutedWithStart()
    {
        $process = $this->getProcess('echo foo');
        $process->start(function ($type, $buffer) use (&$data) {
            $data .= $buffer;
        });

        $process->wait();

        $this->assertSame('foo'.PHP_EOL, $data);
    }

    /**
     * tests results from sub processes.
     *
     * @dataProvider responsesCodeProvider
     */
    public function testProcessResponses($expected, $getter, $code)
    {
<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg($code)));
=======
        $p = $this->getProcessForCode($code);
>>>>>>> dev
        $p->run();

        $this->assertSame($expected, $p->$getter());
    }

    /**
     * tests results from sub processes.
     *
     * @dataProvider pipesCodeProvider
     */
    public function testProcessPipes($code, $size)
    {
        $expected = str_repeat(str_repeat('*', 1024), $size).'!';
        $expectedLength = (1024 * $size) + 1;

<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg($code)));
        $p->setInput($expected);
        $p->run();

        $this->assertEquals($expectedLength, strlen($p->getOutput()));
        $this->assertEquals($expectedLength, strlen($p->getErrorOutput()));
=======
        $p = $this->getProcessForCode($code);
        $p->setInput($expected);
        $p->run();

        $this->assertEquals($expectedLength, \strlen($p->getOutput()));
        $this->assertEquals($expectedLength, \strlen($p->getErrorOutput()));
>>>>>>> dev
    }

    /**
     * @dataProvider pipesCodeProvider
     */
    public function testSetStreamAsInput($code, $size)
    {
        $expected = str_repeat(str_repeat('*', 1024), $size).'!';
        $expectedLength = (1024 * $size) + 1;

        $stream = fopen('php://temporary', 'w+');
        fwrite($stream, $expected);
        rewind($stream);

<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg($code)));
=======
        $p = $this->getProcessForCode($code);
>>>>>>> dev
        $p->setInput($stream);
        $p->run();

        fclose($stream);

<<<<<<< HEAD
        $this->assertEquals($expectedLength, strlen($p->getOutput()));
        $this->assertEquals($expectedLength, strlen($p->getErrorOutput()));
=======
        $this->assertEquals($expectedLength, \strlen($p->getOutput()));
        $this->assertEquals($expectedLength, \strlen($p->getErrorOutput()));
>>>>>>> dev
    }

    public function testLiveStreamAsInput()
    {
        $stream = fopen('php://memory', 'r+');
        fwrite($stream, 'hello');
        rewind($stream);

<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg('stream_copy_to_stream(STDIN, STDOUT);')));
=======
        $p = $this->getProcessForCode('stream_copy_to_stream(STDIN, STDOUT);');
>>>>>>> dev
        $p->setInput($stream);
        $p->start(function ($type, $data) use ($stream) {
            if ('hello' === $data) {
                fclose($stream);
            }
        });
        $p->wait();

        $this->assertSame('hello', $p->getOutput());
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\LogicException
     * @expectedExceptionMessage Input can not be set while the process is running.
     */
    public function testSetInputWhileRunningThrowsAnException()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "sleep(30);"');
=======
        $process = $this->getProcessForCode('sleep(30);');
>>>>>>> dev
        $process->start();
        try {
            $process->setInput('foobar');
            $process->stop();
            $this->fail('A LogicException should have been raised.');
        } catch (LogicException $e) {
        }
        $process->stop();

        throw $e;
    }

    /**
     * @dataProvider provideInvalidInputValues
     * @expectedException \Symfony\Component\Process\Exception\InvalidArgumentException
<<<<<<< HEAD
     * @expectedExceptionMessage Symfony\Component\Process\Process::setInput only accepts strings or stream resources.
=======
     * @expectedExceptionMessage Symfony\Component\Process\Process::setInput only accepts strings, Traversable objects or stream resources.
>>>>>>> dev
     */
    public function testInvalidInput($value)
    {
        $process = $this->getProcess('foo');
        $process->setInput($value);
    }

    public function provideInvalidInputValues()
    {
<<<<<<< HEAD
        return array(
            array(array()),
            array(new NonStringifiable()),
        );
=======
        return [
            [[]],
            [new NonStringifiable()],
        ];
>>>>>>> dev
    }

    /**
     * @dataProvider provideInputValues
     */
    public function testValidInput($expected, $value)
    {
        $process = $this->getProcess('foo');
        $process->setInput($value);
        $this->assertSame($expected, $process->getInput());
    }

    public function provideInputValues()
    {
<<<<<<< HEAD
        return array(
            array(null, null),
            array('24.5', 24.5),
            array('input data', 'input data'),
        );
=======
        return [
            [null, null],
            ['24.5', 24.5],
            ['input data', 'input data'],
        ];
>>>>>>> dev
    }

    public function chainedCommandsOutputProvider()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
            return array(
                array("2 \r\n2\r\n", '&&', '2'),
            );
        }

        return array(
            array("1\n1\n", ';', '1'),
            array("2\n2\n", '&&', '2'),
        );
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
            return [
                ["2 \r\n2\r\n", '&&', '2'],
            ];
        }

        return [
            ["1\n1\n", ';', '1'],
            ["2\n2\n", '&&', '2'],
        ];
>>>>>>> dev
    }

    /**
     * @dataProvider chainedCommandsOutputProvider
     */
    public function testChainedCommandsOutput($expected, $operator, $input)
    {
        $process = $this->getProcess(sprintf('echo %s %s echo %s', $input, $operator, $input));
        $process->run();
        $this->assertEquals($expected, $process->getOutput());
    }

    public function testCallbackIsExecutedForOutput()
    {
<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg('echo \'foo\';')));

        $called = false;
        $p->run(function ($type, $buffer) use (&$called) {
            $called = $buffer === 'foo';
=======
        $p = $this->getProcessForCode('echo \'foo\';');

        $called = false;
        $p->run(function ($type, $buffer) use (&$called) {
            $called = 'foo' === $buffer;
        });

        $this->assertTrue($called, 'The callback should be executed with the output');
    }

    public function testCallbackIsExecutedForOutputWheneverOutputIsDisabled()
    {
        $p = $this->getProcessForCode('echo \'foo\';');
        $p->disableOutput();

        $called = false;
        $p->run(function ($type, $buffer) use (&$called) {
            $called = 'foo' === $buffer;
>>>>>>> dev
        });

        $this->assertTrue($called, 'The callback should be executed with the output');
    }

    public function testGetErrorOutput()
    {
<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg('$n = 0; while ($n < 3) { file_put_contents(\'php://stderr\', \'ERROR\'); $n++; }')));
=======
        $p = $this->getProcessForCode('$n = 0; while ($n < 3) { file_put_contents(\'php://stderr\', \'ERROR\'); $n++; }');
>>>>>>> dev

        $p->run();
        $this->assertEquals(3, preg_match_all('/ERROR/', $p->getErrorOutput(), $matches));
    }

    public function testFlushErrorOutput()
    {
<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg('$n = 0; while ($n < 3) { file_put_contents(\'php://stderr\', \'ERROR\'); $n++; }')));
=======
        $p = $this->getProcessForCode('$n = 0; while ($n < 3) { file_put_contents(\'php://stderr\', \'ERROR\'); $n++; }');
>>>>>>> dev

        $p->run();
        $p->clearErrorOutput();
        $this->assertEmpty($p->getErrorOutput());
    }

    /**
     * @dataProvider provideIncrementalOutput
     */
    public function testIncrementalOutput($getOutput, $getIncrementalOutput, $uri)
    {
        $lock = tempnam(sys_get_temp_dir(), __FUNCTION__);

<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg('file_put_contents($s = \''.$uri.'\', \'foo\'); flock(fopen('.var_export($lock, true).', \'r\'), LOCK_EX); file_put_contents($s, \'bar\');')));
=======
        $p = $this->getProcessForCode('file_put_contents($s = \''.$uri.'\', \'foo\'); flock(fopen('.var_export($lock, true).', \'r\'), LOCK_EX); file_put_contents($s, \'bar\');');
>>>>>>> dev

        $h = fopen($lock, 'w');
        flock($h, LOCK_EX);

        $p->start();

<<<<<<< HEAD
        foreach (array('foo', 'bar') as $s) {
=======
        foreach (['foo', 'bar'] as $s) {
>>>>>>> dev
            while (false === strpos($p->$getOutput(), $s)) {
                usleep(1000);
            }

            $this->assertSame($s, $p->$getIncrementalOutput());
            $this->assertSame('', $p->$getIncrementalOutput());

            flock($h, LOCK_UN);
        }

        fclose($h);
    }

    public function provideIncrementalOutput()
    {
<<<<<<< HEAD
        return array(
            array('getOutput', 'getIncrementalOutput', 'php://stdout'),
            array('getErrorOutput', 'getIncrementalErrorOutput', 'php://stderr'),
        );
=======
        return [
            ['getOutput', 'getIncrementalOutput', 'php://stdout'],
            ['getErrorOutput', 'getIncrementalErrorOutput', 'php://stderr'],
        ];
>>>>>>> dev
    }

    public function testGetOutput()
    {
<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg('$n = 0; while ($n < 3) { echo \' foo \'; $n++; }')));
=======
        $p = $this->getProcessForCode('$n = 0; while ($n < 3) { echo \' foo \'; $n++; }');
>>>>>>> dev

        $p->run();
        $this->assertEquals(3, preg_match_all('/foo/', $p->getOutput(), $matches));
    }

    public function testFlushOutput()
    {
<<<<<<< HEAD
        $p = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg('$n=0;while ($n<3) {echo \' foo \';$n++;}')));
=======
        $p = $this->getProcessForCode('$n=0;while ($n<3) {echo \' foo \';$n++;}');
>>>>>>> dev

        $p->run();
        $p->clearOutput();
        $this->assertEmpty($p->getOutput());
    }

    public function testZeroAsOutput()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
>>>>>>> dev
            // see http://stackoverflow.com/questions/7105433/windows-batch-echo-without-new-line
            $p = $this->getProcess('echo | set /p dummyName=0');
        } else {
            $p = $this->getProcess('printf 0');
        }

        $p->run();
        $this->assertSame('0', $p->getOutput());
    }

    public function testExitCodeCommandFailed()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not support POSIX exit code');
        }
        $this->skipIfNotEnhancedSigchild();
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not support POSIX exit code');
        }
>>>>>>> dev

        // such command run in bash return an exitcode 127
        $process = $this->getProcess('nonexistingcommandIhopeneversomeonewouldnameacommandlikethis');
        $process->run();

        $this->assertGreaterThan(0, $process->getExitCode());
    }

    public function testTTYCommand()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not have /dev/tty support');
        }

        $process = $this->getProcess('echo "foo" >> /dev/null && '.self::$phpBin.' -r "usleep(100000);"');
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not have /dev/tty support');
        }

        $process = $this->getProcess('echo "foo" >> /dev/null && '.$this->getProcessForCode('usleep(100000);')->getCommandLine());
>>>>>>> dev
        $process->setTty(true);
        $process->start();
        $this->assertTrue($process->isRunning());
        $process->wait();

        $this->assertSame(Process::STATUS_TERMINATED, $process->getStatus());
    }

    public function testTTYCommandExitCode()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does have /dev/tty support');
        }
        $this->skipIfNotEnhancedSigchild();
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does have /dev/tty support');
        }
>>>>>>> dev

        $process = $this->getProcess('echo "foo" >> /dev/null');
        $process->setTty(true);
        $process->run();

        $this->assertTrue($process->isSuccessful());
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\RuntimeException
     * @expectedExceptionMessage TTY mode is not supported on Windows platform.
     */
    public function testTTYInWindowsEnvironment()
    {
<<<<<<< HEAD
        if ('\\' !== DIRECTORY_SEPARATOR) {
=======
        if ('\\' !== \DIRECTORY_SEPARATOR) {
>>>>>>> dev
            $this->markTestSkipped('This test is for Windows platform only');
        }

        $process = $this->getProcess('echo "foo" >> /dev/null');
        $process->setTty(false);
        $process->setTty(true);
    }

    public function testExitCodeTextIsNullWhenExitCodeIsNull()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

=======
>>>>>>> dev
        $process = $this->getProcess('');
        $this->assertNull($process->getExitCodeText());
    }

    public function testPTYCommand()
    {
        if (!Process::isPtySupported()) {
            $this->markTestSkipped('PTY is not supported on this operating system.');
        }

        $process = $this->getProcess('echo "foo"');
        $process->setPty(true);
        $process->run();

        $this->assertSame(Process::STATUS_TERMINATED, $process->getStatus());
        $this->assertEquals("foo\r\n", $process->getOutput());
    }

    public function testMustRun()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

=======
>>>>>>> dev
        $process = $this->getProcess('echo foo');

        $this->assertSame($process, $process->mustRun());
        $this->assertEquals('foo'.PHP_EOL, $process->getOutput());
    }

    public function testSuccessfulMustRunHasCorrectExitCode()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

=======
>>>>>>> dev
        $process = $this->getProcess('echo foo')->mustRun();
        $this->assertEquals(0, $process->getExitCode());
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\ProcessFailedException
     */
    public function testMustRunThrowsException()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

=======
>>>>>>> dev
        $process = $this->getProcess('exit 1');
        $process->mustRun();
    }

    public function testExitCodeText()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

=======
>>>>>>> dev
        $process = $this->getProcess('');
        $r = new \ReflectionObject($process);
        $p = $r->getProperty('exitcode');
        $p->setAccessible(true);

        $p->setValue($process, 2);
        $this->assertEquals('Misuse of shell builtins', $process->getExitCodeText());
    }

    public function testStartIsNonBlocking()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "usleep(500000);"');
=======
        $process = $this->getProcessForCode('usleep(500000);');
>>>>>>> dev
        $start = microtime(true);
        $process->start();
        $end = microtime(true);
        $this->assertLessThan(0.4, $end - $start);
        $process->stop();
    }

    public function testUpdateStatus()
    {
        $process = $this->getProcess('echo foo');
        $process->run();
<<<<<<< HEAD
        $this->assertTrue(strlen($process->getOutput()) > 0);
=======
        $this->assertGreaterThan(0, \strlen($process->getOutput()));
>>>>>>> dev
    }

    public function testGetExitCodeIsNullOnStart()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

        $process = $this->getProcess(self::$phpBin.' -r "usleep(100000);"');
=======
        $process = $this->getProcessForCode('usleep(100000);');
>>>>>>> dev
        $this->assertNull($process->getExitCode());
        $process->start();
        $this->assertNull($process->getExitCode());
        $process->wait();
        $this->assertEquals(0, $process->getExitCode());
    }

    public function testGetExitCodeIsNullOnWhenStartingAgain()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

        $process = $this->getProcess(self::$phpBin.' -r "usleep(100000);"');
=======
        $process = $this->getProcessForCode('usleep(100000);');
>>>>>>> dev
        $process->run();
        $this->assertEquals(0, $process->getExitCode());
        $process->start();
        $this->assertNull($process->getExitCode());
        $process->wait();
        $this->assertEquals(0, $process->getExitCode());
    }

    public function testGetExitCode()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

=======
>>>>>>> dev
        $process = $this->getProcess('echo foo');
        $process->run();
        $this->assertSame(0, $process->getExitCode());
    }

    public function testStatus()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "usleep(100000);"');
=======
        $process = $this->getProcessForCode('usleep(100000);');
>>>>>>> dev
        $this->assertFalse($process->isRunning());
        $this->assertFalse($process->isStarted());
        $this->assertFalse($process->isTerminated());
        $this->assertSame(Process::STATUS_READY, $process->getStatus());
        $process->start();
        $this->assertTrue($process->isRunning());
        $this->assertTrue($process->isStarted());
        $this->assertFalse($process->isTerminated());
        $this->assertSame(Process::STATUS_STARTED, $process->getStatus());
        $process->wait();
        $this->assertFalse($process->isRunning());
        $this->assertTrue($process->isStarted());
        $this->assertTrue($process->isTerminated());
        $this->assertSame(Process::STATUS_TERMINATED, $process->getStatus());
    }

    public function testStop()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "sleep(31);"');
=======
        $process = $this->getProcessForCode('sleep(31);');
>>>>>>> dev
        $process->start();
        $this->assertTrue($process->isRunning());
        $process->stop();
        $this->assertFalse($process->isRunning());
    }

    public function testIsSuccessful()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

=======
>>>>>>> dev
        $process = $this->getProcess('echo foo');
        $process->run();
        $this->assertTrue($process->isSuccessful());
    }

    public function testIsSuccessfulOnlyAfterTerminated()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

        $process = $this->getProcess(self::$phpBin.' -r "usleep(100000);"');
=======
        $process = $this->getProcessForCode('usleep(100000);');
>>>>>>> dev
        $process->start();

        $this->assertFalse($process->isSuccessful());

        $process->wait();

        $this->assertTrue($process->isSuccessful());
    }

    public function testIsNotSuccessful()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

        $process = $this->getProcess(self::$phpBin.' -r "throw new \Exception(\'BOUM\');"');
=======
        $process = $this->getProcessForCode('throw new \Exception(\'BOUM\');');
>>>>>>> dev
        $process->run();
        $this->assertFalse($process->isSuccessful());
    }

    public function testProcessIsNotSignaled()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not support POSIX signals');
        }
        $this->skipIfNotEnhancedSigchild();
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not support POSIX signals');
        }
>>>>>>> dev

        $process = $this->getProcess('echo foo');
        $process->run();
        $this->assertFalse($process->hasBeenSignaled());
    }

    public function testProcessWithoutTermSignal()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not support POSIX signals');
        }
        $this->skipIfNotEnhancedSigchild();
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not support POSIX signals');
        }
>>>>>>> dev

        $process = $this->getProcess('echo foo');
        $process->run();
        $this->assertEquals(0, $process->getTermSignal());
    }

    public function testProcessIsSignaledIfStopped()
    {
<<<<<<< HEAD
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not support POSIX signals');
        }
        $this->skipIfNotEnhancedSigchild();

        $process = $this->getProcess(self::$phpBin.' -r "sleep(32);"');
=======
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('Windows does not support POSIX signals');
        }

        $process = $this->getProcessForCode('sleep(32);');
>>>>>>> dev
        $process->start();
        $process->stop();
        $this->assertTrue($process->hasBeenSignaled());
        $this->assertEquals(15, $process->getTermSignal()); // SIGTERM
    }

    /**
<<<<<<< HEAD
     * @expectedException \Symfony\Component\Process\Exception\RuntimeException
     * @expectedExceptionMessage The process has been signaled
     */
    public function testProcessThrowsExceptionWhenExternallySignaled()
    {
        if (!function_exists('posix_kill')) {
            $this->markTestSkipped('Function posix_kill is required.');
        }
        $this->skipIfNotEnhancedSigchild(false);

        $process = $this->getProcess(self::$phpBin.' -r "sleep(32.1)"');
=======
     * @expectedException \Symfony\Component\Process\Exception\ProcessSignaledException
     * @expectedExceptionMessage The process has been signaled with signal "9".
     */
    public function testProcessThrowsExceptionWhenExternallySignaled()
    {
        if (!\function_exists('posix_kill')) {
            $this->markTestSkipped('Function posix_kill is required.');
        }

        if (self::$sigchild) {
            $this->markTestSkipped('PHP is compiled with --enable-sigchild.');
        }

        $process = $this->getProcessForCode('sleep(32.1);');
>>>>>>> dev
        $process->start();
        posix_kill($process->getPid(), 9); // SIGKILL

        $process->wait();
    }

    public function testRestart()
    {
<<<<<<< HEAD
        $process1 = $this->getProcess(self::$phpBin.' -r "echo getmypid();"');
=======
        $process1 = $this->getProcessForCode('echo getmypid();');
>>>>>>> dev
        $process1->run();
        $process2 = $process1->restart();

        $process2->wait(); // wait for output

        // Ensure that both processed finished and the output is numeric
        $this->assertFalse($process1->isRunning());
        $this->assertFalse($process2->isRunning());
<<<<<<< HEAD
        $this->assertTrue(is_numeric($process1->getOutput()));
        $this->assertTrue(is_numeric($process2->getOutput()));
=======
        $this->assertInternalType('numeric', $process1->getOutput());
        $this->assertInternalType('numeric', $process2->getOutput());
>>>>>>> dev

        // Ensure that restart returned a new process by check that the output is different
        $this->assertNotEquals($process1->getOutput(), $process2->getOutput());
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\ProcessTimedOutException
     * @expectedExceptionMessage exceeded the timeout of 0.1 seconds.
     */
    public function testRunProcessWithTimeout()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "sleep(30);"');
=======
        $process = $this->getProcessForCode('sleep(30);');
>>>>>>> dev
        $process->setTimeout(0.1);
        $start = microtime(true);
        try {
            $process->run();
            $this->fail('A RuntimeException should have been raised');
        } catch (RuntimeException $e) {
        }

        $this->assertLessThan(15, microtime(true) - $start);

        throw $e;
    }

<<<<<<< HEAD
=======
    /**
     * @expectedException \Symfony\Component\Process\Exception\ProcessTimedOutException
     * @expectedExceptionMessage exceeded the timeout of 0.1 seconds.
     */
    public function testIterateOverProcessWithTimeout()
    {
        $process = $this->getProcessForCode('sleep(30);');
        $process->setTimeout(0.1);
        $start = microtime(true);
        try {
            $process->start();
            foreach ($process as $buffer);
            $this->fail('A RuntimeException should have been raised');
        } catch (RuntimeException $e) {
        }

        $this->assertLessThan(15, microtime(true) - $start);

        throw $e;
    }

>>>>>>> dev
    public function testCheckTimeoutOnNonStartedProcess()
    {
        $process = $this->getProcess('echo foo');
        $this->assertNull($process->checkTimeout());
    }

    public function testCheckTimeoutOnTerminatedProcess()
    {
        $process = $this->getProcess('echo foo');
        $process->run();
        $this->assertNull($process->checkTimeout());
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\ProcessTimedOutException
     * @expectedExceptionMessage exceeded the timeout of 0.1 seconds.
     */
    public function testCheckTimeoutOnStartedProcess()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "sleep(33);"');
=======
        $process = $this->getProcessForCode('sleep(33);');
>>>>>>> dev
        $process->setTimeout(0.1);

        $process->start();
        $start = microtime(true);

        try {
            while ($process->isRunning()) {
                $process->checkTimeout();
                usleep(100000);
            }
            $this->fail('A ProcessTimedOutException should have been raised');
        } catch (ProcessTimedOutException $e) {
        }

        $this->assertLessThan(15, microtime(true) - $start);

        throw $e;
    }

    public function testIdleTimeout()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "sleep(34);"');
=======
        $process = $this->getProcessForCode('sleep(34);');
>>>>>>> dev
        $process->setTimeout(60);
        $process->setIdleTimeout(0.1);

        try {
            $process->run();

            $this->fail('A timeout exception was expected.');
        } catch (ProcessTimedOutException $e) {
            $this->assertTrue($e->isIdleTimeout());
            $this->assertFalse($e->isGeneralTimeout());
            $this->assertEquals(0.1, $e->getExceededTimeout());
        }
    }

    public function testIdleTimeoutNotExceededWhenOutputIsSent()
    {
<<<<<<< HEAD
        $process = $this->getProcess(sprintf('%s -r %s', self::$phpBin, escapeshellarg('while (true) {echo \'foo \'; usleep(1000);}')));
=======
        $process = $this->getProcessForCode('while (true) {echo \'foo \'; usleep(1000);}');
>>>>>>> dev
        $process->setTimeout(1);
        $process->start();

        while (false === strpos($process->getOutput(), 'foo')) {
            usleep(1000);
        }

        $process->setIdleTimeout(0.5);

        try {
            $process->wait();
            $this->fail('A timeout exception was expected.');
        } catch (ProcessTimedOutException $e) {
            $this->assertTrue($e->isGeneralTimeout(), 'A general timeout is expected.');
            $this->assertFalse($e->isIdleTimeout(), 'No idle timeout is expected.');
            $this->assertEquals(1, $e->getExceededTimeout());
        }
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\ProcessTimedOutException
     * @expectedExceptionMessage exceeded the timeout of 0.1 seconds.
     */
    public function testStartAfterATimeout()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "sleep(35);"');
=======
        $process = $this->getProcessForCode('sleep(35);');
>>>>>>> dev
        $process->setTimeout(0.1);

        try {
            $process->run();
            $this->fail('A ProcessTimedOutException should have been raised.');
        } catch (ProcessTimedOutException $e) {
        }
        $this->assertFalse($process->isRunning());
        $process->start();
        $this->assertTrue($process->isRunning());
        $process->stop(0);

        throw $e;
    }

    public function testGetPid()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "sleep(36);"');
=======
        $process = $this->getProcessForCode('sleep(36);');
>>>>>>> dev
        $process->start();
        $this->assertGreaterThan(0, $process->getPid());
        $process->stop(0);
    }

    public function testGetPidIsNullBeforeStart()
    {
        $process = $this->getProcess('foo');
        $this->assertNull($process->getPid());
    }

    public function testGetPidIsNullAfterRun()
    {
        $process = $this->getProcess('echo foo');
        $process->run();
        $this->assertNull($process->getPid());
    }

    /**
     * @requires extension pcntl
     */
    public function testSignal()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' '.__DIR__.'/SignalListener.php');
=======
        $process = $this->getProcess([self::$phpBin, __DIR__.'/SignalListener.php']);
>>>>>>> dev
        $process->start();

        while (false === strpos($process->getOutput(), 'Caught')) {
            usleep(1000);
        }
        $process->signal(SIGUSR1);
        $process->wait();

        $this->assertEquals('Caught SIGUSR1', $process->getOutput());
    }

    /**
     * @requires extension pcntl
     */
    public function testExitCodeIsAvailableAfterSignal()
    {
<<<<<<< HEAD
        $this->skipIfNotEnhancedSigchild();

=======
>>>>>>> dev
        $process = $this->getProcess('sleep 4');
        $process->start();
        $process->signal(SIGKILL);

        while ($process->isRunning()) {
            usleep(10000);
        }

        $this->assertFalse($process->isRunning());
        $this->assertTrue($process->hasBeenSignaled());
        $this->assertFalse($process->isSuccessful());
        $this->assertEquals(137, $process->getExitCode());
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\LogicException
     * @expectedExceptionMessage Can not send signal on a non running process.
     */
    public function testSignalProcessNotRunning()
    {
        $process = $this->getProcess('foo');
        $process->signal(1); // SIGHUP
    }

    /**
     * @dataProvider provideMethodsThatNeedARunningProcess
     */
    public function testMethodsThatNeedARunningProcess($method)
    {
        $process = $this->getProcess('foo');
<<<<<<< HEAD
        $this->setExpectedException('Symfony\Component\Process\Exception\LogicException', sprintf('Process must be started before calling %s.', $method));
=======

        if (method_exists($this, 'expectException')) {
            $this->expectException('Symfony\Component\Process\Exception\LogicException');
            $this->expectExceptionMessage(sprintf('Process must be started before calling %s.', $method));
        } else {
            $this->setExpectedException('Symfony\Component\Process\Exception\LogicException', sprintf('Process must be started before calling %s.', $method));
        }

>>>>>>> dev
        $process->{$method}();
    }

    public function provideMethodsThatNeedARunningProcess()
    {
<<<<<<< HEAD
        return array(
            array('getOutput'),
            array('getIncrementalOutput'),
            array('getErrorOutput'),
            array('getIncrementalErrorOutput'),
            array('wait'),
        );
=======
        return [
            ['getOutput'],
            ['getIncrementalOutput'],
            ['getErrorOutput'],
            ['getIncrementalErrorOutput'],
            ['wait'],
        ];
>>>>>>> dev
    }

    /**
     * @dataProvider provideMethodsThatNeedATerminatedProcess
<<<<<<< HEAD
     * @expectedException Symfony\Component\Process\Exception\LogicException
=======
     * @expectedException \Symfony\Component\Process\Exception\LogicException
>>>>>>> dev
     * @expectedExceptionMessage Process must be terminated before calling
     */
    public function testMethodsThatNeedATerminatedProcess($method)
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "sleep(37);"');
=======
        $process = $this->getProcessForCode('sleep(37);');
>>>>>>> dev
        $process->start();
        try {
            $process->{$method}();
            $process->stop(0);
            $this->fail('A LogicException must have been thrown');
        } catch (\Exception $e) {
        }
        $process->stop(0);

        throw $e;
    }

    public function provideMethodsThatNeedATerminatedProcess()
    {
<<<<<<< HEAD
        return array(
            array('hasBeenSignaled'),
            array('getTermSignal'),
            array('hasBeenStopped'),
            array('getStopSignal'),
        );
    }

    /**
     * @dataProvider provideWrongSignal
     * @expectedException \Symfony\Component\Process\Exception\RuntimeException
     */
    public function testWrongSignal($signal)
    {
        if ('\\' === DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('POSIX signals do not work on Windows');
        }

        $process = $this->getProcess(self::$phpBin.' -r "sleep(38);"');
        $process->start();
        try {
            $process->signal($signal);
=======
        return [
            ['hasBeenSignaled'],
            ['getTermSignal'],
            ['hasBeenStopped'],
            ['getStopSignal'],
        ];
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\RuntimeException
     */
    public function testWrongSignal()
    {
        if ('\\' === \DIRECTORY_SEPARATOR) {
            $this->markTestSkipped('POSIX signals do not work on Windows');
        }

        $process = $this->getProcessForCode('sleep(38);');
        $process->start();
        try {
            $process->signal(-4);
>>>>>>> dev
            $this->fail('A RuntimeException must have been thrown');
        } catch (RuntimeException $e) {
            $process->stop(0);
        }

        throw $e;
    }

<<<<<<< HEAD
    public function provideWrongSignal()
    {
        return array(
            array(-4),
            array('Céphalopodes'),
        );
    }

=======
>>>>>>> dev
    public function testDisableOutputDisablesTheOutput()
    {
        $p = $this->getProcess('foo');
        $this->assertFalse($p->isOutputDisabled());
        $p->disableOutput();
        $this->assertTrue($p->isOutputDisabled());
        $p->enableOutput();
        $this->assertFalse($p->isOutputDisabled());
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\RuntimeException
     * @expectedExceptionMessage Disabling output while the process is running is not possible.
     */
    public function testDisableOutputWhileRunningThrowsException()
    {
<<<<<<< HEAD
        $p = $this->getProcess(self::$phpBin.' -r "sleep(39);"');
=======
        $p = $this->getProcessForCode('sleep(39);');
>>>>>>> dev
        $p->start();
        $p->disableOutput();
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\RuntimeException
     * @expectedExceptionMessage Enabling output while the process is running is not possible.
     */
    public function testEnableOutputWhileRunningThrowsException()
    {
<<<<<<< HEAD
        $p = $this->getProcess(self::$phpBin.' -r "sleep(40);"');
=======
        $p = $this->getProcessForCode('sleep(40);');
>>>>>>> dev
        $p->disableOutput();
        $p->start();
        $p->enableOutput();
    }

    public function testEnableOrDisableOutputAfterRunDoesNotThrowException()
    {
        $p = $this->getProcess('echo foo');
        $p->disableOutput();
        $p->run();
        $p->enableOutput();
        $p->disableOutput();
        $this->assertTrue($p->isOutputDisabled());
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\LogicException
     * @expectedExceptionMessage Output can not be disabled while an idle timeout is set.
     */
    public function testDisableOutputWhileIdleTimeoutIsSet()
    {
        $process = $this->getProcess('foo');
        $process->setIdleTimeout(1);
        $process->disableOutput();
    }

    /**
     * @expectedException \Symfony\Component\Process\Exception\LogicException
     * @expectedExceptionMessage timeout can not be set while the output is disabled.
     */
    public function testSetIdleTimeoutWhileOutputIsDisabled()
    {
        $process = $this->getProcess('foo');
        $process->disableOutput();
        $process->setIdleTimeout(1);
    }

    public function testSetNullIdleTimeoutWhileOutputIsDisabled()
    {
        $process = $this->getProcess('foo');
        $process->disableOutput();
        $this->assertSame($process, $process->setIdleTimeout(null));
    }

    /**
<<<<<<< HEAD
     * @dataProvider provideStartMethods
     */
    public function testStartWithACallbackAndDisabledOutput($startMethod, $exception, $exceptionMessage)
    {
        $p = $this->getProcess('foo');
        $p->disableOutput();
        $this->setExpectedException($exception, $exceptionMessage);
        if ('mustRun' === $startMethod) {
            $this->skipIfNotEnhancedSigchild();
        }
        $p->{$startMethod}(function () {});
    }

    public function provideStartMethods()
    {
        return array(
            array('start', 'Symfony\Component\Process\Exception\LogicException', 'Output has been disabled, enable it to allow the use of a callback.'),
            array('run', 'Symfony\Component\Process\Exception\LogicException', 'Output has been disabled, enable it to allow the use of a callback.'),
            array('mustRun', 'Symfony\Component\Process\Exception\LogicException', 'Output has been disabled, enable it to allow the use of a callback.'),
        );
    }

    /**
=======
>>>>>>> dev
     * @dataProvider provideOutputFetchingMethods
     * @expectedException \Symfony\Component\Process\Exception\LogicException
     * @expectedExceptionMessage Output has been disabled.
     */
    public function testGetOutputWhileDisabled($fetchMethod)
    {
<<<<<<< HEAD
        $p = $this->getProcess(self::$phpBin.' -r "sleep(41);"');
=======
        $p = $this->getProcessForCode('sleep(41);');
>>>>>>> dev
        $p->disableOutput();
        $p->start();
        $p->{$fetchMethod}();
    }

    public function provideOutputFetchingMethods()
    {
<<<<<<< HEAD
        return array(
            array('getOutput'),
            array('getIncrementalOutput'),
            array('getErrorOutput'),
            array('getIncrementalErrorOutput'),
        );
=======
        return [
            ['getOutput'],
            ['getIncrementalOutput'],
            ['getErrorOutput'],
            ['getIncrementalErrorOutput'],
        ];
>>>>>>> dev
    }

    public function testStopTerminatesProcessCleanly()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "echo 123; sleep(42);"');
=======
        $process = $this->getProcessForCode('echo 123; sleep(42);');
>>>>>>> dev
        $process->run(function () use ($process) {
            $process->stop();
        });
        $this->assertTrue(true, 'A call to stop() is not expected to cause wait() to throw a RuntimeException');
    }

    public function testKillSignalTerminatesProcessCleanly()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "echo 123; sleep(43);"');
=======
        $process = $this->getProcessForCode('echo 123; sleep(43);');
>>>>>>> dev
        $process->run(function () use ($process) {
            $process->signal(9); // SIGKILL
        });
        $this->assertTrue(true, 'A call to signal() is not expected to cause wait() to throw a RuntimeException');
    }

    public function testTermSignalTerminatesProcessCleanly()
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r "echo 123; sleep(44);"');
=======
        $process = $this->getProcessForCode('echo 123; sleep(44);');
>>>>>>> dev
        $process->run(function () use ($process) {
            $process->signal(15); // SIGTERM
        });
        $this->assertTrue(true, 'A call to signal() is not expected to cause wait() to throw a RuntimeException');
    }

    public function responsesCodeProvider()
    {
<<<<<<< HEAD
        return array(
            //expected output / getter / code to execute
            //array(1,'getExitCode','exit(1);'),
            //array(true,'isSuccessful','exit();'),
            array('output', 'getOutput', 'echo \'output\';'),
        );
=======
        return [
            //expected output / getter / code to execute
            // [1,'getExitCode','exit(1);'],
            // [true,'isSuccessful','exit();'],
            ['output', 'getOutput', 'echo \'output\';'],
        ];
>>>>>>> dev
    }

    public function pipesCodeProvider()
    {
<<<<<<< HEAD
        $variations = array(
            'fwrite(STDOUT, $in = file_get_contents(\'php://stdin\')); fwrite(STDERR, $in);',
            'include \''.__DIR__.'/PipeStdinInStdoutStdErrStreamSelect.php\';',
        );

        if ('\\' === DIRECTORY_SEPARATOR) {
            // Avoid XL buffers on Windows because of https://bugs.php.net/bug.php?id=65650
            $sizes = array(1, 2, 4, 8);
        } else {
            $sizes = array(1, 16, 64, 1024, 4096);
        }

        $codes = array();
        foreach ($sizes as $size) {
            foreach ($variations as $code) {
                $codes[] = array($code, $size);
=======
        $variations = [
            'fwrite(STDOUT, $in = file_get_contents(\'php://stdin\')); fwrite(STDERR, $in);',
            'include \''.__DIR__.'/PipeStdinInStdoutStdErrStreamSelect.php\';',
        ];

        if ('\\' === \DIRECTORY_SEPARATOR) {
            // Avoid XL buffers on Windows because of https://bugs.php.net/bug.php?id=65650
            $sizes = [1, 2, 4, 8];
        } else {
            $sizes = [1, 16, 64, 1024, 4096];
        }

        $codes = [];
        foreach ($sizes as $size) {
            foreach ($variations as $code) {
                $codes[] = [$code, $size];
>>>>>>> dev
            }
        }

        return $codes;
    }

    /**
     * @dataProvider provideVariousIncrementals
     */
    public function testIncrementalOutputDoesNotRequireAnotherCall($stream, $method)
    {
<<<<<<< HEAD
        $process = $this->getProcess(self::$phpBin.' -r '.escapeshellarg('$n = 0; while ($n < 3) { file_put_contents(\''.$stream.'\', $n, 1); $n++; usleep(1000); }'), null, null, null, null);
=======
        $process = $this->getProcessForCode('$n = 0; while ($n < 3) { file_put_contents(\''.$stream.'\', $n, 1); $n++; usleep(1000); }', null, null, null, null);
>>>>>>> dev
        $process->start();
        $result = '';
        $limit = microtime(true) + 3;
        $expected = '012';

        while ($result !== $expected && microtime(true) < $limit) {
            $result .= $process->$method();
        }

        $this->assertSame($expected, $result);
        $process->stop();
    }

    public function provideVariousIncrementals()
    {
<<<<<<< HEAD
        return array(
            array('php://stdout', 'getIncrementalOutput'),
            array('php://stderr', 'getIncrementalErrorOutput'),
        );
    }

    /**
     * @param string      $commandline
     * @param null|string $cwd
     * @param null|array  $env
     * @param null|string $input
     * @param int         $timeout
     * @param array       $options
     *
     * @return Process
     */
    private function getProcess($commandline, $cwd = null, array $env = null, $input = null, $timeout = 60, array $options = array())
    {
        $process = new Process($commandline, $cwd, $env, $input, $timeout, $options);

        if (false !== $enhance = getenv('ENHANCE_SIGCHLD')) {
            try {
                $process->setEnhanceSigchildCompatibility(false);
                $process->getExitCode();
                $this->fail('ENHANCE_SIGCHLD must be used together with a sigchild-enabled PHP.');
            } catch (RuntimeException $e) {
                $this->assertSame('This PHP has been compiled with --enable-sigchild. You must use setEnhanceSigchildCompatibility() to use this method.', $e->getMessage());
                if ($enhance) {
                    $process->setEnhanceSigchildCompatibility(true);
                } else {
                    self::$notEnhancedSigchild = true;
                }
            }
        }
=======
        return [
            ['php://stdout', 'getIncrementalOutput'],
            ['php://stderr', 'getIncrementalErrorOutput'],
        ];
    }

    public function testIteratorInput()
    {
        $input = function () {
            yield 'ping';
            yield 'pong';
        };

        $process = $this->getProcessForCode('stream_copy_to_stream(STDIN, STDOUT);', null, null, $input());
        $process->run();
        $this->assertSame('pingpong', $process->getOutput());
    }

    public function testSimpleInputStream()
    {
        $input = new InputStream();

        $process = $this->getProcessForCode('echo \'ping\'; echo fread(STDIN, 4); echo fread(STDIN, 4);');
        $process->setInput($input);

        $process->start(function ($type, $data) use ($input) {
            if ('ping' === $data) {
                $input->write('pang');
            } elseif (!$input->isClosed()) {
                $input->write('pong');
                $input->close();
            }
        });

        $process->wait();
        $this->assertSame('pingpangpong', $process->getOutput());
    }

    public function testInputStreamWithCallable()
    {
        $i = 0;
        $stream = fopen('php://memory', 'w+');
        $stream = function () use ($stream, &$i) {
            if ($i < 3) {
                rewind($stream);
                fwrite($stream, ++$i);
                rewind($stream);

                return $stream;
            }
        };

        $input = new InputStream();
        $input->onEmpty($stream);
        $input->write($stream());

        $process = $this->getProcessForCode('echo fread(STDIN, 3);');
        $process->setInput($input);
        $process->start(function ($type, $data) use ($input) {
            $input->close();
        });

        $process->wait();
        $this->assertSame('123', $process->getOutput());
    }

    public function testInputStreamWithGenerator()
    {
        $input = new InputStream();
        $input->onEmpty(function ($input) {
            yield 'pong';
            $input->close();
        });

        $process = $this->getProcessForCode('stream_copy_to_stream(STDIN, STDOUT);');
        $process->setInput($input);
        $process->start();
        $input->write('ping');
        $process->wait();
        $this->assertSame('pingpong', $process->getOutput());
    }

    public function testInputStreamOnEmpty()
    {
        $i = 0;
        $input = new InputStream();
        $input->onEmpty(function () use (&$i) { ++$i; });

        $process = $this->getProcessForCode('echo 123; echo fread(STDIN, 1); echo 456;');
        $process->setInput($input);
        $process->start(function ($type, $data) use ($input) {
            if ('123' === $data) {
                $input->close();
            }
        });
        $process->wait();

        $this->assertSame(0, $i, 'InputStream->onEmpty callback should be called only when the input *becomes* empty');
        $this->assertSame('123456', $process->getOutput());
    }

    public function testIteratorOutput()
    {
        $input = new InputStream();

        $process = $this->getProcessForCode('fwrite(STDOUT, 123); fwrite(STDERR, 234); flush(); usleep(10000); fwrite(STDOUT, fread(STDIN, 3)); fwrite(STDERR, 456);');
        $process->setInput($input);
        $process->start();
        $output = [];

        foreach ($process as $type => $data) {
            $output[] = [$type, $data];
            break;
        }
        $expectedOutput = [
            [$process::OUT, '123'],
        ];
        $this->assertSame($expectedOutput, $output);

        $input->write(345);

        foreach ($process as $type => $data) {
            $output[] = [$type, $data];
        }

        $this->assertSame('', $process->getOutput());
        $this->assertFalse($process->isRunning());

        $expectedOutput = [
            [$process::OUT, '123'],
            [$process::ERR, '234'],
            [$process::OUT, '345'],
            [$process::ERR, '456'],
        ];
        $this->assertSame($expectedOutput, $output);
    }

    public function testNonBlockingNorClearingIteratorOutput()
    {
        $input = new InputStream();

        $process = $this->getProcessForCode('fwrite(STDOUT, fread(STDIN, 3));');
        $process->setInput($input);
        $process->start();
        $output = [];

        foreach ($process->getIterator($process::ITER_NON_BLOCKING | $process::ITER_KEEP_OUTPUT) as $type => $data) {
            $output[] = [$type, $data];
            break;
        }
        $expectedOutput = [
            [$process::OUT, ''],
        ];
        $this->assertSame($expectedOutput, $output);

        $input->write(123);

        foreach ($process->getIterator($process::ITER_NON_BLOCKING | $process::ITER_KEEP_OUTPUT) as $type => $data) {
            if ('' !== $data) {
                $output[] = [$type, $data];
            }
        }

        $this->assertSame('123', $process->getOutput());
        $this->assertFalse($process->isRunning());

        $expectedOutput = [
            [$process::OUT, ''],
            [$process::OUT, '123'],
        ];
        $this->assertSame($expectedOutput, $output);
    }

    public function testChainedProcesses()
    {
        $p1 = $this->getProcessForCode('fwrite(STDERR, 123); fwrite(STDOUT, 456);');
        $p2 = $this->getProcessForCode('stream_copy_to_stream(STDIN, STDOUT);');
        $p2->setInput($p1);

        $p1->start();
        $p2->run();

        $this->assertSame('123', $p1->getErrorOutput());
        $this->assertSame('', $p1->getOutput());
        $this->assertSame('', $p2->getErrorOutput());
        $this->assertSame('456', $p2->getOutput());
    }

    public function testSetBadEnv()
    {
        $process = $this->getProcess('echo hello');
        $process->setEnv(['bad%%' => '123']);
        $process->inheritEnvironmentVariables(true);

        $process->run();

        $this->assertSame('hello'.PHP_EOL, $process->getOutput());
        $this->assertSame('', $process->getErrorOutput());
    }

    public function testEnvBackupDoesNotDeleteExistingVars()
    {
        putenv('existing_var=foo');
        $_ENV['existing_var'] = 'foo';
        $process = $this->getProcess('php -r "echo getenv(\'new_test_var\');"');
        $process->setEnv(['existing_var' => 'bar', 'new_test_var' => 'foo']);
        $process->inheritEnvironmentVariables();

        $process->run();

        $this->assertSame('foo', $process->getOutput());
        $this->assertSame('foo', getenv('existing_var'));
        $this->assertFalse(getenv('new_test_var'));

        putenv('existing_var');
        unset($_ENV['existing_var']);
    }

    public function testEnvIsInherited()
    {
        $process = $this->getProcessForCode('echo serialize($_SERVER);', null, ['BAR' => 'BAZ', 'EMPTY' => '']);

        putenv('FOO=BAR');
        $_ENV['FOO'] = 'BAR';

        $process->run();

        $expected = ['BAR' => 'BAZ', 'EMPTY' => '', 'FOO' => 'BAR'];
        $env = array_intersect_key(unserialize($process->getOutput()), $expected);

        $this->assertEquals($expected, $env);

        putenv('FOO');
        unset($_ENV['FOO']);
    }

    public function testGetCommandLine()
    {
        $p = new Process(['/usr/bin/php']);

        $expected = '\\' === \DIRECTORY_SEPARATOR ? '"/usr/bin/php"' : "'/usr/bin/php'";
        $this->assertSame($expected, $p->getCommandLine());
    }

    /**
     * @dataProvider provideEscapeArgument
     */
    public function testEscapeArgument($arg)
    {
        $p = new Process([self::$phpBin, '-r', 'echo $argv[1];', $arg]);
        $p->run();

        $this->assertSame((string) $arg, $p->getOutput());
    }

    public function testRawCommandLine()
    {
        $p = Process::fromShellCommandline(sprintf('"%s" -r %s "a" "" "b"', self::$phpBin, escapeshellarg('print_r($argv);')));
        $p->run();

        $expected = <<<EOTXT
Array
(
    [0] => -
    [1] => a
    [2] => 
    [3] => b
)

EOTXT;
        $this->assertSame($expected, str_replace('Standard input code', '-', $p->getOutput()));
    }

    public function provideEscapeArgument()
    {
        yield ['a"b%c%'];
        yield ['a"b^c^'];
        yield ["a\nb'c"];
        yield ['a^b c!'];
        yield ["a!b\tc"];
        yield ['a\\\\"\\"'];
        yield ['éÉèÈàÀöä'];
        yield [null];
        yield [1];
        yield [1.1];
    }

    public function testEnvArgument()
    {
        $env = ['FOO' => 'Foo', 'BAR' => 'Bar'];
        $cmd = '\\' === \DIRECTORY_SEPARATOR ? 'echo !FOO! !BAR! !BAZ!' : 'echo $FOO $BAR $BAZ';
        $p = Process::fromShellCommandline($cmd, null, $env);
        $p->run(null, ['BAR' => 'baR', 'BAZ' => 'baZ']);

        $this->assertSame('Foo baR baZ', rtrim($p->getOutput()));
        $this->assertSame($env, $p->getEnv());
    }

    private function getProcess($commandline, string $cwd = null, array $env = null, $input = null, ?int $timeout = 60): Process
    {
        if (\is_string($commandline)) {
            $process = Process::fromShellCommandline($commandline, $cwd, $env, $input, $timeout);
        } else {
            $process = new Process($commandline, $cwd, $env, $input, $timeout);
        }
        $process->inheritEnvironmentVariables();
>>>>>>> dev

        if (self::$process) {
            self::$process->stop(0);
        }

        return self::$process = $process;
    }

<<<<<<< HEAD
    private function skipIfNotEnhancedSigchild($expectException = true)
    {
        if (self::$sigchild) {
            if (!$expectException) {
                $this->markTestSkipped('PHP is compiled with --enable-sigchild.');
            } elseif (self::$notEnhancedSigchild) {
                $this->setExpectedException('Symfony\Component\Process\Exception\RuntimeException', 'This PHP has been compiled with --enable-sigchild.');
            }
        }
=======
    private function getProcessForCode(string $code, string $cwd = null, array $env = null, $input = null, ?int $timeout = 60): Process
    {
        return $this->getProcess([self::$phpBin, '-r', $code], $cwd, $env, $input, $timeout);
>>>>>>> dev
    }
}

class NonStringifiable
{
}
