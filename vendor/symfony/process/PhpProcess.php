<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Process;

use Symfony\Component\Process\Exception\RuntimeException;

/**
 * PhpProcess runs a PHP script in an independent process.
 *
<<<<<<< HEAD
 * $p = new PhpProcess('<?php echo "foo"; ?>');
 * $p->run();
 * print $p->getOutput()."\n";
=======
 *     $p = new PhpProcess('<?php echo "foo"; ?>');
 *     $p->run();
 *     print $p->getOutput()."\n";
>>>>>>> dev
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class PhpProcess extends Process
{
    /**
<<<<<<< HEAD
     * Constructor.
     *
=======
>>>>>>> dev
     * @param string      $script  The PHP script to run (as a string)
     * @param string|null $cwd     The working directory or null to use the working dir of the current PHP process
     * @param array|null  $env     The environment variables or null to use the same environment as the current PHP process
     * @param int         $timeout The timeout in seconds
<<<<<<< HEAD
     * @param array       $options An array of options for proc_open
     */
    public function __construct($script, $cwd = null, array $env = null, $timeout = 60, array $options = array())
    {
        $executableFinder = new PhpExecutableFinder();
        if (false === $php = $executableFinder->find()) {
            $php = null;
        }
        if ('phpdbg' === PHP_SAPI) {
            $file = tempnam(sys_get_temp_dir(), 'dbg');
            file_put_contents($file, $script);
            register_shutdown_function('unlink', $file);
            $php .= ' '.ProcessUtils::escapeArgument($file);
            $script = null;
        }
        if ('\\' !== DIRECTORY_SEPARATOR && null !== $php) {
            // exec is mandatory to deal with sending a signal to the process
            // see https://github.com/symfony/symfony/issues/5030 about prepending
            // command with exec
            $php = 'exec '.$php;
        }

        parent::__construct($php, $cwd, $env, $script, $timeout, $options);
=======
     * @param array|null  $php     Path to the PHP binary to use with any additional arguments
     */
    public function __construct(string $script, string $cwd = null, array $env = null, int $timeout = 60, array $php = null)
    {
        if (null === $php) {
            $executableFinder = new PhpExecutableFinder();
            $php = $executableFinder->find(false);
            $php = false === $php ? null : array_merge([$php], $executableFinder->findArguments());
        }
        if ('phpdbg' === \PHP_SAPI) {
            $file = tempnam(sys_get_temp_dir(), 'dbg');
            file_put_contents($file, $script);
            register_shutdown_function('unlink', $file);
            $php[] = $file;
            $script = null;
        }

        parent::__construct($php, $cwd, $env, $script, $timeout);
>>>>>>> dev
    }

    /**
     * Sets the path to the PHP binary to use.
<<<<<<< HEAD
     */
    public function setPhpBinary($php)
    {
=======
     *
     * @deprecated since Symfony 4.2, use the $php argument of the constructor instead.
     */
    public function setPhpBinary($php)
    {
        @trigger_error(sprintf('The "%s()" method is deprecated since Symfony 4.2, use the $php argument of the constructor instead.', __METHOD__), E_USER_DEPRECATED);

>>>>>>> dev
        $this->setCommandLine($php);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function start(callable $callback = null)
=======
    public function start(callable $callback = null, array $env = [])
>>>>>>> dev
    {
        if (null === $this->getCommandLine()) {
            throw new RuntimeException('Unable to find the PHP executable.');
        }

<<<<<<< HEAD
        parent::start($callback);
=======
        parent::start($callback, $env);
>>>>>>> dev
    }
}
