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
 * Utility class that can print to STDOUT or write to a file.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Util_Printer
=======
namespace PHPUnit\Util;

use PHPUnit\Framework\Exception;

/**
 * Utility class that can print to STDOUT or write to a file.
 */
class Printer
>>>>>>> dev
{
    /**
     * If true, flush output after every write.
     *
     * @var bool
     */
    protected $autoFlush = false;

    /**
     * @var resource
     */
    protected $out;

    /**
     * @var string
     */
    protected $outTarget;

    /**
<<<<<<< HEAD
     * @var bool
     */
    protected $printsHTML = false;

    /**
=======
>>>>>>> dev
     * Constructor.
     *
     * @param mixed $out
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
=======
     * @throws Exception
>>>>>>> dev
     */
    public function __construct($out = null)
    {
        if ($out !== null) {
<<<<<<< HEAD
            if (is_string($out)) {
                if (strpos($out, 'socket://') === 0) {
                    $out = explode(':', str_replace('socket://', '', $out));

                    if (sizeof($out) != 2) {
                        throw new PHPUnit_Framework_Exception;
                    }

                    $this->out = fsockopen($out[0], $out[1]);
                } else {
                    if (strpos($out, 'php://') === false &&
                        !is_dir(dirname($out))) {
                        mkdir(dirname($out), 0777, true);
                    }

                    $this->out = fopen($out, 'wt');
=======
            if (\is_string($out)) {
                if (\strpos($out, 'socket://') === 0) {
                    $out = \explode(':', \str_replace('socket://', '', $out));

                    if (\count($out) != 2) {
                        throw new Exception;
                    }

                    $this->out = \fsockopen($out[0], $out[1]);
                } else {
                    if (\strpos($out, 'php://') === false && !\is_dir(\dirname($out))) {
                        $this->createDirectory(\dirname($out));
                    }

                    $this->out = \fopen($out, 'wt');
>>>>>>> dev
                }

                $this->outTarget = $out;
            } else {
                $this->out = $out;
            }
        }
    }

    /**
<<<<<<< HEAD
     * Flush buffer, optionally tidy up HTML, and close output if it's not to a php stream
     */
    public function flush()
    {
        if ($this->out && strncmp($this->outTarget, 'php://', 6) !== 0) {
            fclose($this->out);
        }

        if ($this->printsHTML === true &&
            $this->outTarget !== null &&
            strpos($this->outTarget, 'php://') !== 0 &&
            strpos($this->outTarget, 'socket://') !== 0 &&
            extension_loaded('tidy')) {
            file_put_contents(
                $this->outTarget,
                tidy_repair_file(
                    $this->outTarget,
                    array('indent' => true, 'wrap' => 0),
                    'utf8'
                )
            );
=======
     * Flush buffer and close output if it's not to a PHP stream
     */
    public function flush()
    {
        if ($this->out && \strncmp($this->outTarget, 'php://', 6) !== 0) {
            \fclose($this->out);
>>>>>>> dev
        }
    }

    /**
     * Performs a safe, incremental flush.
     *
     * Do not confuse this function with the flush() function of this class,
     * since the flush() function may close the file being written to, rendering
     * the current object no longer usable.
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
=======
>>>>>>> dev
     */
    public function incrementalFlush()
    {
        if ($this->out) {
<<<<<<< HEAD
            fflush($this->out);
        } else {
            flush();
=======
            \fflush($this->out);
        } else {
            \flush();
>>>>>>> dev
        }
    }

    /**
     * @param string $buffer
     */
    public function write($buffer)
    {
        if ($this->out) {
<<<<<<< HEAD
            fwrite($this->out, $buffer);
=======
            \fwrite($this->out, $buffer);
>>>>>>> dev

            if ($this->autoFlush) {
                $this->incrementalFlush();
            }
        } else {
            if (PHP_SAPI != 'cli' && PHP_SAPI != 'phpdbg') {
<<<<<<< HEAD
                $buffer = htmlspecialchars($buffer, ENT_SUBSTITUTE);
=======
                $buffer = \htmlspecialchars($buffer, ENT_SUBSTITUTE);
>>>>>>> dev
            }

            print $buffer;

            if ($this->autoFlush) {
                $this->incrementalFlush();
            }
        }
    }

    /**
     * Check auto-flush mode.
     *
     * @return bool
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
=======
>>>>>>> dev
     */
    public function getAutoFlush()
    {
        return $this->autoFlush;
    }

    /**
     * Set auto-flushing mode.
     *
     * If set, *incremental* flushes will be done after each write. This should
     * not be confused with the different effects of this class' flush() method.
     *
     * @param bool $autoFlush
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.3.0
     */
    public function setAutoFlush($autoFlush)
    {
        if (is_bool($autoFlush)) {
            $this->autoFlush = $autoFlush;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
    }
=======
     */
    public function setAutoFlush($autoFlush)
    {
        if (\is_bool($autoFlush)) {
            $this->autoFlush = $autoFlush;
        } else {
            throw InvalidArgumentHelper::factory(1, 'boolean');
        }
    }

    private function createDirectory(string $directory): bool
    {
        return !(!\is_dir($directory) && !@\mkdir($directory, 0777, true) && !\is_dir($directory));
    }
>>>>>>> dev
}
