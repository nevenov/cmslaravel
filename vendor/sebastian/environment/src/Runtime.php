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
=======
declare(strict_types=1);

>>>>>>> dev
namespace SebastianBergmann\Environment;

/**
 * Utility class for HHVM/PHP environment handling.
 */
<<<<<<< HEAD
class Runtime
=======
final class Runtime
>>>>>>> dev
{
    /**
     * @var string
     */
    private static $binary;

    /**
     * Returns true when Xdebug is supported or
<<<<<<< HEAD
     * the runtime used is PHPDBG (PHP >= 7.0).
     *
     * @return bool
     */
    public function canCollectCodeCoverage()
=======
     * the runtime used is PHPDBG.
     */
    public function canCollectCodeCoverage(): bool
>>>>>>> dev
    {
        return $this->hasXdebug() || $this->hasPHPDBGCodeCoverage();
    }

    /**
<<<<<<< HEAD
     * Returns the path to the binary of the current runtime.
     * Appends ' --php' to the path when the runtime is HHVM.
     *
     * @return string
     */
    public function getBinary()
    {
        // HHVM
        if (self::$binary === null && $this->isHHVM()) {
            if ((self::$binary = getenv('PHP_BINARY')) === false) {
                self::$binary = PHP_BINARY;
            }

            self::$binary = escapeshellarg(self::$binary) . ' --php';
        }

        // PHP >= 5.4.0
        if (self::$binary === null && defined('PHP_BINARY')) {
            if (PHP_BINARY !== '') {
                self::$binary = escapeshellarg(PHP_BINARY);
            }
        }

        // PHP < 5.4.0
        if (self::$binary === null) {
            if (PHP_SAPI == 'cli' && isset($_SERVER['_'])) {
                if (strpos($_SERVER['_'], 'phpunit') !== false) {
                    $file = file($_SERVER['_']);

                    if (strpos($file[0], ' ') !== false) {
                        $tmp          = explode(' ', $file[0]);
                        self::$binary = escapeshellarg(trim($tmp[1]));
                    } else {
                        self::$binary = escapeshellarg(ltrim(trim($file[0]), '#!'));
                    }
                } elseif (strpos(basename($_SERVER['_']), 'php') !== false) {
                    self::$binary = escapeshellarg($_SERVER['_']);
                }
            }
        }

        if (self::$binary === null) {
            $possibleBinaryLocations = array(
                PHP_BINDIR . '/php',
                PHP_BINDIR . '/php-cli.exe',
                PHP_BINDIR . '/php.exe'
            );

            foreach ($possibleBinaryLocations as $binary) {
                if (is_readable($binary)) {
                    self::$binary = escapeshellarg($binary);
                    break;
                }
            }
        }

        if (self::$binary === null) {
            self::$binary = 'php';
=======
     * Returns true when OPcache is loaded and opcache.save_comments=0 is set.
     *
     * Code taken from Doctrine\Common\Annotations\AnnotationReader::__construct().
     */
    public function discardsComments(): bool
    {
        if (\extension_loaded('Zend Optimizer+') && (\ini_get('zend_optimizerplus.save_comments') === '0' || \ini_get('opcache.save_comments') === '0')) {
            return true;
        }

        if (\extension_loaded('Zend OPcache') && \ini_get('opcache.save_comments') == 0) {
            return true;
        }

        return false;
    }

    /**
     * Returns the path to the binary of the current runtime.
     * Appends ' --php' to the path when the runtime is HHVM.
     */
    public function getBinary(): string
    {
        // HHVM
        if (self::$binary === null && $this->isHHVM()) {
            // @codeCoverageIgnoreStart
            if ((self::$binary = \getenv('PHP_BINARY')) === false) {
                self::$binary = PHP_BINARY;
            }

            self::$binary = \escapeshellarg(self::$binary) . ' --php' .
                ' -d hhvm.php7.all=1';
            // @codeCoverageIgnoreEnd
        }

        if (self::$binary === null && PHP_BINARY !== '') {
            self::$binary = \escapeshellarg(PHP_BINARY);
        }

        if (self::$binary === null) {
            // @codeCoverageIgnoreStart
            $possibleBinaryLocations = [
                PHP_BINDIR . '/php',
                PHP_BINDIR . '/php-cli.exe',
                PHP_BINDIR . '/php.exe'
            ];

            foreach ($possibleBinaryLocations as $binary) {
                if (\is_readable($binary)) {
                    self::$binary = \escapeshellarg($binary);
                    break;
                }
            }
            // @codeCoverageIgnoreEnd
        }

        if (self::$binary === null) {
            // @codeCoverageIgnoreStart
            self::$binary = 'php';
            // @codeCoverageIgnoreEnd
>>>>>>> dev
        }

        return self::$binary;
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getNameWithVersion()
=======
    public function getNameWithVersion(): string
>>>>>>> dev
    {
        return $this->getName() . ' ' . $this->getVersion();
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getName()
    {
        if ($this->isHHVM()) {
            return 'HHVM';
        } elseif ($this->isPHPDBG()) {
            return 'PHPDBG';
        } else {
            return 'PHP';
        }
    }

    /**
     * @return string
     */
    public function getVendorUrl()
    {
        if ($this->isHHVM()) {
            return 'http://hhvm.com/';
        } else {
            return 'https://secure.php.net/';
        }
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        if ($this->isHHVM()) {
            return HHVM_VERSION;
        } else {
            return PHP_VERSION;
        }
=======
    public function getName(): string
    {
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return 'HHVM';
            // @codeCoverageIgnoreEnd
        }

        if ($this->isPHPDBG()) {
            // @codeCoverageIgnoreStart
            return 'PHPDBG';
            // @codeCoverageIgnoreEnd
        }

        return 'PHP';
    }

    public function getVendorUrl(): string
    {
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return 'http://hhvm.com/';
            // @codeCoverageIgnoreEnd
        }

        return 'https://secure.php.net/';
    }

    public function getVersion(): string
    {
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return HHVM_VERSION;
            // @codeCoverageIgnoreEnd
        }

        return PHP_VERSION;
>>>>>>> dev
    }

    /**
     * Returns true when the runtime used is PHP and Xdebug is loaded.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function hasXdebug()
    {
        return ($this->isPHP() || $this->isHHVM()) && extension_loaded('xdebug');
=======
     */
    public function hasXdebug(): bool
    {
        return ($this->isPHP() || $this->isHHVM()) && \extension_loaded('xdebug');
>>>>>>> dev
    }

    /**
     * Returns true when the runtime used is HHVM.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isHHVM()
    {
        return defined('HHVM_VERSION');
=======
     */
    public function isHHVM(): bool
    {
        return \defined('HHVM_VERSION');
>>>>>>> dev
    }

    /**
     * Returns true when the runtime used is PHP without the PHPDBG SAPI.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isPHP()
=======
     */
    public function isPHP(): bool
>>>>>>> dev
    {
        return !$this->isHHVM() && !$this->isPHPDBG();
    }

    /**
     * Returns true when the runtime used is PHP with the PHPDBG SAPI.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isPHPDBG()
=======
     */
    public function isPHPDBG(): bool
>>>>>>> dev
    {
        return PHP_SAPI === 'phpdbg' && !$this->isHHVM();
    }

    /**
     * Returns true when the runtime used is PHP with the PHPDBG SAPI
     * and the phpdbg_*_oplog() functions are available (PHP >= 7.0).
     *
<<<<<<< HEAD
     * @return bool
     */
    public function hasPHPDBGCodeCoverage()
    {
        return $this->isPHPDBG() && function_exists('phpdbg_start_oplog');
=======
     * @codeCoverageIgnore
     */
    public function hasPHPDBGCodeCoverage(): bool
    {
        return $this->isPHPDBG();
>>>>>>> dev
    }
}
