<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Tests\Helper;

<<<<<<< HEAD
use Symfony\Component\Console\Helper\DebugFormatterHelper;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\Console\Helper\ProcessHelper;
use Symfony\Component\Process\Process;

class ProcessHelperTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Helper\DebugFormatterHelper;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Helper\ProcessHelper;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\Process\Process;

class ProcessHelperTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider provideCommandsAndOutput
     */
    public function testVariousProcessRuns($expected, $cmd, $verbosity, $error)
    {
<<<<<<< HEAD
        $helper = new ProcessHelper();
        $helper->setHelperSet(new HelperSet(array(new DebugFormatterHelper())));
=======
        if (\is_string($cmd)) {
            $cmd = \method_exists(Process::class, 'fromShellCommandline') ? Process::fromShellCommandline($cmd) : new Process($cmd);
        }

        $helper = new ProcessHelper();
        $helper->setHelperSet(new HelperSet([new DebugFormatterHelper()]));
>>>>>>> dev
        $output = $this->getOutputStream($verbosity);
        $helper->run($output, $cmd, $error);
        $this->assertEquals($expected, $this->getOutput($output));
    }

    public function testPassedCallbackIsExecuted()
    {
        $helper = new ProcessHelper();
<<<<<<< HEAD
        $helper->setHelperSet(new HelperSet(array(new DebugFormatterHelper())));
=======
        $helper->setHelperSet(new HelperSet([new DebugFormatterHelper()]));
>>>>>>> dev
        $output = $this->getOutputStream(StreamOutput::VERBOSITY_NORMAL);

        $executed = false;
        $callback = function () use (&$executed) { $executed = true; };

<<<<<<< HEAD
        $helper->run($output, 'php -r "echo 42;"', null, $callback);
=======
        $helper->run($output, ['php', '-r', 'echo 42;'], null, $callback);
>>>>>>> dev
        $this->assertTrue($executed);
    }

    public function provideCommandsAndOutput()
    {
<<<<<<< HEAD
        $successOutputVerbose = <<<EOT
=======
        $successOutputVerbose = <<<'EOT'
>>>>>>> dev
  RUN  php -r "echo 42;"
  RES  Command ran successfully

EOT;
<<<<<<< HEAD
        $successOutputDebug = <<<EOT
=======
        $successOutputDebug = <<<'EOT'
>>>>>>> dev
  RUN  php -r "echo 42;"
  OUT  42
  RES  Command ran successfully

EOT;
<<<<<<< HEAD
        $successOutputDebugWithTags = <<<EOT
=======
        $successOutputDebugWithTags = <<<'EOT'
>>>>>>> dev
  RUN  php -r "echo '<info>42</info>';"
  OUT  <info>42</info>
  RES  Command ran successfully

EOT;
<<<<<<< HEAD
        $successOutputProcessDebug = <<<EOT
=======
        $successOutputProcessDebug = <<<'EOT'
>>>>>>> dev
  RUN  'php' '-r' 'echo 42;'
  OUT  42
  RES  Command ran successfully

EOT;
<<<<<<< HEAD
        $syntaxErrorOutputVerbose = <<<EOT
=======
        $syntaxErrorOutputVerbose = <<<'EOT'
>>>>>>> dev
  RUN  php -r "fwrite(STDERR, 'error message');usleep(50000);fwrite(STDOUT, 'out message');exit(252);"
  RES  252 Command did not run successfully

EOT;
<<<<<<< HEAD
        $syntaxErrorOutputDebug = <<<EOT
=======
        $syntaxErrorOutputDebug = <<<'EOT'
>>>>>>> dev
  RUN  php -r "fwrite(STDERR, 'error message');usleep(500000);fwrite(STDOUT, 'out message');exit(252);"
  ERR  error message
  OUT  out message
  RES  252 Command did not run successfully

EOT;

<<<<<<< HEAD
        $errorMessage = 'An error occurred';
        if ('\\' === DIRECTORY_SEPARATOR) {
            $successOutputProcessDebug = str_replace("'", '"', $successOutputProcessDebug);
        }

        return array(
            array('', 'php -r "echo 42;"', StreamOutput::VERBOSITY_VERBOSE, null),
            array($successOutputVerbose, 'php -r "echo 42;"', StreamOutput::VERBOSITY_VERY_VERBOSE, null),
            array($successOutputDebug, 'php -r "echo 42;"', StreamOutput::VERBOSITY_DEBUG, null),
            array($successOutputDebugWithTags, 'php -r "echo \'<info>42</info>\';"', StreamOutput::VERBOSITY_DEBUG, null),
            array('', 'php -r "syntax error"', StreamOutput::VERBOSITY_VERBOSE, null),
            array($syntaxErrorOutputVerbose, 'php -r "fwrite(STDERR, \'error message\');usleep(50000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_VERY_VERBOSE, null),
            array($syntaxErrorOutputDebug, 'php -r "fwrite(STDERR, \'error message\');usleep(500000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_DEBUG, null),
            array($errorMessage.PHP_EOL, 'php -r "fwrite(STDERR, \'error message\');usleep(50000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_VERBOSE, $errorMessage),
            array($syntaxErrorOutputVerbose.$errorMessage.PHP_EOL, 'php -r "fwrite(STDERR, \'error message\');usleep(50000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_VERY_VERBOSE, $errorMessage),
            array($syntaxErrorOutputDebug.$errorMessage.PHP_EOL, 'php -r "fwrite(STDERR, \'error message\');usleep(500000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_DEBUG, $errorMessage),
            array($successOutputProcessDebug, array('php', '-r', 'echo 42;'), StreamOutput::VERBOSITY_DEBUG, null),
            array($successOutputDebug, new Process('php -r "echo 42;"'), StreamOutput::VERBOSITY_DEBUG, null),
        );
=======
        $PHP = '\\' === \DIRECTORY_SEPARATOR ? '"!PHP!"' : '"$PHP"';
        $successOutputPhp = <<<EOT
  RUN  php -r $PHP
  OUT  42
  RES  Command ran successfully

EOT;

        $errorMessage = 'An error occurred';
        $args = new Process(['php', '-r', 'echo 42;']);
        $args = $args->getCommandLine();
        $successOutputProcessDebug = str_replace("'php' '-r' 'echo 42;'", $args, $successOutputProcessDebug);
        $fromShellCommandline = \method_exists(Process::class, 'fromShellCommandline') ? [Process::class, 'fromShellCommandline'] : function ($cmd) { return new Process($cmd); };

        return [
            ['', 'php -r "echo 42;"', StreamOutput::VERBOSITY_VERBOSE, null],
            [$successOutputVerbose, 'php -r "echo 42;"', StreamOutput::VERBOSITY_VERY_VERBOSE, null],
            [$successOutputDebug, 'php -r "echo 42;"', StreamOutput::VERBOSITY_DEBUG, null],
            [$successOutputDebugWithTags, 'php -r "echo \'<info>42</info>\';"', StreamOutput::VERBOSITY_DEBUG, null],
            ['', 'php -r "syntax error"', StreamOutput::VERBOSITY_VERBOSE, null],
            [$syntaxErrorOutputVerbose, 'php -r "fwrite(STDERR, \'error message\');usleep(50000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_VERY_VERBOSE, null],
            [$syntaxErrorOutputDebug, 'php -r "fwrite(STDERR, \'error message\');usleep(500000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_DEBUG, null],
            [$errorMessage.PHP_EOL, 'php -r "fwrite(STDERR, \'error message\');usleep(50000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_VERBOSE, $errorMessage],
            [$syntaxErrorOutputVerbose.$errorMessage.PHP_EOL, 'php -r "fwrite(STDERR, \'error message\');usleep(50000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_VERY_VERBOSE, $errorMessage],
            [$syntaxErrorOutputDebug.$errorMessage.PHP_EOL, 'php -r "fwrite(STDERR, \'error message\');usleep(500000);fwrite(STDOUT, \'out message\');exit(252);"', StreamOutput::VERBOSITY_DEBUG, $errorMessage],
            [$successOutputProcessDebug, ['php', '-r', 'echo 42;'], StreamOutput::VERBOSITY_DEBUG, null],
            [$successOutputDebug, $fromShellCommandline('php -r "echo 42;"'), StreamOutput::VERBOSITY_DEBUG, null],
            [$successOutputProcessDebug, [new Process(['php', '-r', 'echo 42;'])], StreamOutput::VERBOSITY_DEBUG, null],
            [$successOutputPhp, [$fromShellCommandline('php -r '.$PHP), 'PHP' => 'echo 42;'], StreamOutput::VERBOSITY_DEBUG, null],
        ];
>>>>>>> dev
    }

    private function getOutputStream($verbosity)
    {
        return new StreamOutput(fopen('php://memory', 'r+', false), $verbosity, false);
    }

    private function getOutput(StreamOutput $output)
    {
        rewind($output->getStream());

        return stream_get_contents($output->getStream());
    }
}
