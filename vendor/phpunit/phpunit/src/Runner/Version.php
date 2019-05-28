<<<<<<< HEAD
<?php
=======
<?php declare(strict_types=1);
>>>>>>> dev
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
use SebastianBergmann\Version;

/**
 * This class defines the current version of PHPUnit.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Runner_Version
=======
namespace PHPUnit\Runner;

use SebastianBergmann\Version as VersionId;

/**
 * This class defines the current version of PHPUnit.
 */
class Version
>>>>>>> dev
{
    private static $pharVersion;
    private static $version;

    /**
     * Returns the current version of PHPUnit.
     *
     * @return string
     */
    public static function id()
    {
        if (self::$pharVersion !== null) {
            return self::$pharVersion;
        }

        if (self::$version === null) {
<<<<<<< HEAD
            $version       = new Version('4.8.36', dirname(dirname(__DIR__)));
=======
            $version       = new VersionId('6.5.14', \dirname(\dirname(__DIR__)));
>>>>>>> dev
            self::$version = $version->getVersion();
        }

        return self::$version;
    }

    /**
     * @return string
<<<<<<< HEAD
     *
     * @since Method available since Release 4.8.13
     */
    public static function series()
    {
        if (strpos(self::id(), '-')) {
            $tmp     = explode('-', self::id());
            $version = $tmp[0];
=======
     */
    public static function series()
    {
        if (\strpos(self::id(), '-')) {
            $version = \explode('-', self::id())[0];
>>>>>>> dev
        } else {
            $version = self::id();
        }

<<<<<<< HEAD
        return implode('.', array_slice(explode('.', $version), 0, 2));
=======
        return \implode('.', \array_slice(\explode('.', $version), 0, 2));
>>>>>>> dev
    }

    /**
     * @return string
     */
    public static function getVersionString()
    {
        return 'PHPUnit ' . self::id() . ' by Sebastian Bergmann and contributors.';
    }

    /**
     * @return string
<<<<<<< HEAD
     *
     * @since  Method available since Release 4.0.0
     */
    public static function getReleaseChannel()
    {
        if (strpos(self::$pharVersion, '-') !== false) {
=======
     */
    public static function getReleaseChannel()
    {
        if (\strpos(self::$pharVersion, '-') !== false) {
>>>>>>> dev
            return '-nightly';
        }

        return '';
    }
}
