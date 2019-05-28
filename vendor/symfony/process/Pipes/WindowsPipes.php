<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Process\Pipes;

<<<<<<< HEAD
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\RuntimeException;
=======
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\Process;
>>>>>>> dev

/**
 * WindowsPipes implementation uses temporary files as handles.
 *
 * @see https://bugs.php.net/bug.php?id=51800
 * @see https://bugs.php.net/bug.php?id=65650
 *
 * @author Romain Neutron <imprec@gmail.com>
 *
 * @internal
 */
class WindowsPipes extends AbstractPipes
{
<<<<<<< HEAD
    /** @var array */
    private $files = array();
    /** @var array */
    private $fileHandles = array();
    /** @var array */
    private $readBytes = array(
        Process::STDOUT => 0,
        Process::STDERR => 0,
    );
    /** @var bool */
    private $disableOutput;

    public function __construct($disableOutput, $input)
    {
        $this->disableOutput = (bool) $disableOutput;

        if (!$this->disableOutput) {
=======
    private $files = [];
    private $fileHandles = [];
    private $lockHandles = [];
    private $readBytes = [
        Process::STDOUT => 0,
        Process::STDERR => 0,
    ];
    private $haveReadSupport;

    public function __construct($input, bool $haveReadSupport)
    {
        $this->haveReadSupport = $haveReadSupport;

        if ($this->haveReadSupport) {
>>>>>>> dev
            // Fix for PHP bug #51800: reading from STDOUT pipe hangs forever on Windows if the output is too big.
            // Workaround for this problem is to use temporary files instead of pipes on Windows platform.
            //
            // @see https://bugs.php.net/bug.php?id=51800
<<<<<<< HEAD
            $pipes = array(
                Process::STDOUT => Process::OUT,
                Process::STDERR => Process::ERR,
            );
            $tmpDir = sys_get_temp_dir();
            $error = 'unknown reason';
            set_error_handler(function ($type, $msg) use (&$error) { $error = $msg; });
            for ($i = 0;; ++$i) {
                foreach ($pipes as $pipe => $name) {
                    $file = sprintf('%s\\sf_proc_%02X.%s', $tmpDir, $i, $name);
                    if (file_exists($file) && !unlink($file)) {
                        continue 2;
                    }
                    $h = fopen($file, 'xb');
                    if (!$h && false === strpos($error, 'File exists')) {
                        restore_error_handler();
                        throw new RuntimeException(sprintf('A temporary file could not be opened to write the process output: %s', $error));
                    }
                    if (!$h || !$this->fileHandles[$pipe] = fopen($file, 'rb')) {
                        continue 2;
                    }
                    if (isset($this->files[$pipe])) {
                        unlink($this->files[$pipe]);
                    }
=======
            $pipes = [
                Process::STDOUT => Process::OUT,
                Process::STDERR => Process::ERR,
            ];
            $tmpDir = sys_get_temp_dir();
            $lastError = 'unknown reason';
            set_error_handler(function ($type, $msg) use (&$lastError) { $lastError = $msg; });
            for ($i = 0;; ++$i) {
                foreach ($pipes as $pipe => $name) {
                    $file = sprintf('%s\\sf_proc_%02X.%s', $tmpDir, $i, $name);

                    if (!$h = fopen($file.'.lock', 'w')) {
                        restore_error_handler();
                        throw new RuntimeException(sprintf('A temporary file could not be opened to write the process output: %s', $lastError));
                    }
                    if (!flock($h, LOCK_EX | LOCK_NB)) {
                        continue 2;
                    }
                    if (isset($this->lockHandles[$pipe])) {
                        flock($this->lockHandles[$pipe], LOCK_UN);
                        fclose($this->lockHandles[$pipe]);
                    }
                    $this->lockHandles[$pipe] = $h;

                    if (!fclose(fopen($file, 'w')) || !$h = fopen($file, 'r')) {
                        flock($this->lockHandles[$pipe], LOCK_UN);
                        fclose($this->lockHandles[$pipe]);
                        unset($this->lockHandles[$pipe]);
                        continue 2;
                    }
                    $this->fileHandles[$pipe] = $h;
>>>>>>> dev
                    $this->files[$pipe] = $file;
                }
                break;
            }
            restore_error_handler();
        }

        parent::__construct($input);
    }

    public function __destruct()
    {
        $this->close();
<<<<<<< HEAD
        $this->removeFiles();
=======
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    public function getDescriptors()
    {
<<<<<<< HEAD
        if ($this->disableOutput) {
            $nullstream = fopen('NUL', 'c');

            return array(
                array('pipe', 'r'),
                $nullstream,
                $nullstream,
            );
=======
        if (!$this->haveReadSupport) {
            $nullstream = fopen('NUL', 'c');

            return [
                ['pipe', 'r'],
                $nullstream,
                $nullstream,
            ];
>>>>>>> dev
        }

        // We're not using pipe on Windows platform as it hangs (https://bugs.php.net/bug.php?id=51800)
        // We're not using file handles as it can produce corrupted output https://bugs.php.net/bug.php?id=65650
        // So we redirect output within the commandline and pass the nul device to the process
<<<<<<< HEAD
        return array(
            array('pipe', 'r'),
            array('file', 'NUL', 'w'),
            array('file', 'NUL', 'w'),
        );
=======
        return [
            ['pipe', 'r'],
            ['file', 'NUL', 'w'],
            ['file', 'NUL', 'w'],
        ];
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * {@inheritdoc}
     */
    public function readAndWrite($blocking, $close = false)
    {
        $this->unblock();
        $w = $this->write();
<<<<<<< HEAD
        $read = $r = $e = array();
=======
        $read = $r = $e = [];
>>>>>>> dev

        if ($blocking) {
            if ($w) {
                @stream_select($r, $w, $e, 0, Process::TIMEOUT_PRECISION * 1E6);
            } elseif ($this->fileHandles) {
                usleep(Process::TIMEOUT_PRECISION * 1E6);
            }
        }
        foreach ($this->fileHandles as $type => $fileHandle) {
            $data = stream_get_contents($fileHandle, -1, $this->readBytes[$type]);

            if (isset($data[0])) {
<<<<<<< HEAD
                $this->readBytes[$type] += strlen($data);
                $read[$type] = $data;
            }
            if ($close) {
                fclose($fileHandle);
                unset($this->fileHandles[$type]);
=======
                $this->readBytes[$type] += \strlen($data);
                $read[$type] = $data;
            }
            if ($close) {
                ftruncate($fileHandle, 0);
                fclose($fileHandle);
                flock($this->lockHandles[$type], LOCK_UN);
                fclose($this->lockHandles[$type]);
                unset($this->fileHandles[$type], $this->lockHandles[$type]);
>>>>>>> dev
            }
        }

        return $read;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function areOpen()
    {
        return $this->pipes && $this->fileHandles;
=======
    public function haveReadSupport()
    {
        return $this->haveReadSupport;
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function close()
    {
        parent::close();
        foreach ($this->fileHandles as $handle) {
            fclose($handle);
        }
        $this->fileHandles = array();
    }

    /**
     * Creates a new WindowsPipes instance.
     *
     * @param Process $process The process
     * @param $input
     *
     * @return WindowsPipes
     */
    public static function create(Process $process, $input)
    {
        return new static($process->isOutputDisabled(), $input);
    }

    /**
     * Removes temporary files.
     */
    private function removeFiles()
    {
        foreach ($this->files as $filename) {
            if (file_exists($filename)) {
                @unlink($filename);
            }
        }
        $this->files = array();
=======
    public function areOpen()
    {
        return $this->pipes && $this->fileHandles;
    }

    /**
     * {@inheritdoc}
     */
    public function close()
    {
        parent::close();
        foreach ($this->fileHandles as $type => $handle) {
            ftruncate($handle, 0);
            fclose($handle);
            flock($this->lockHandles[$type], LOCK_UN);
            fclose($this->lockHandles[$type]);
        }
        $this->fileHandles = $this->lockHandles = [];
>>>>>>> dev
    }
}
