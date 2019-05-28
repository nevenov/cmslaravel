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
 * @since Class available since Release 3.4.0
 */
class PHPUnit_Util_GlobalState
{
    /**
     * @var array
     */
    protected static $superGlobalArrays = array(
      '_ENV',
      '_POST',
      '_GET',
      '_COOKIE',
      '_SERVER',
      '_FILES',
      '_REQUEST'
    );

    /**
     * @var array
     */
    protected static $superGlobalArraysLong = array(
      'HTTP_ENV_VARS',
      'HTTP_POST_VARS',
      'HTTP_GET_VARS',
      'HTTP_COOKIE_VARS',
      'HTTP_SERVER_VARS',
      'HTTP_POST_FILES'
    );

    public static function getIncludedFilesAsString()
    {
        return static::processIncludedFilesAsString(get_included_files());
    }

    public static function processIncludedFilesAsString(array $files)
    {
        $blacklist = new PHPUnit_Util_Blacklist;
        $prefix    = false;
        $result    = '';

        if (defined('__PHPUNIT_PHAR__')) {
            $prefix = 'phar://' . __PHPUNIT_PHAR__ . '/';
        }

        for ($i = count($files) - 1; $i > 0; $i--) {
            $file = $files[$i];

            if ($prefix !== false && strpos($file, $prefix) === 0) {
=======
namespace PHPUnit\Util;

use Closure;

class GlobalState
{
    /**
     * @var string[]
     */
    protected static $superGlobalArrays = [
        '_ENV',
        '_POST',
        '_GET',
        '_COOKIE',
        '_SERVER',
        '_FILES',
        '_REQUEST'
    ];

    /**
     * @return string
     */
    public static function getIncludedFilesAsString()
    {
        return static::processIncludedFilesAsString(\get_included_files());
    }

    /**
     * @param array $files
     *
     * @return string
     */
    public static function processIncludedFilesAsString(array $files)
    {
        $blacklist = new Blacklist;
        $prefix    = false;
        $result    = '';

        if (\defined('__PHPUNIT_PHAR__')) {
            $prefix = 'phar://' . __PHPUNIT_PHAR__ . '/';
        }

        for ($i = \count($files) - 1; $i > 0; $i--) {
            $file = $files[$i];

            if (!empty($GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST']) &&
                \in_array($file, $GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST'])) {
                continue;
            }

            if ($prefix !== false && \strpos($file, $prefix) === 0) {
>>>>>>> dev
                continue;
            }

            // Skip virtual file system protocols
<<<<<<< HEAD
            if (preg_match('/^(vfs|phpvfs[a-z0-9]+):/', $file)) {
                continue;
            }

            if (!$blacklist->isBlacklisted($file) && is_file($file)) {
=======
            if (\preg_match('/^(vfs|phpvfs[a-z0-9]+):/', $file)) {
                continue;
            }

            if (!$blacklist->isBlacklisted($file) && \is_file($file)) {
>>>>>>> dev
                $result = 'require_once \'' . $file . "';\n" . $result;
            }
        }

        return $result;
    }

<<<<<<< HEAD
    public static function getIniSettingsAsString()
    {
        $result      = '';
        $iniSettings = ini_get_all(null, false);

        foreach ($iniSettings as $key => $value) {
            $result .= sprintf(
=======
    /**
     * @return string
     */
    public static function getIniSettingsAsString()
    {
        $result      = '';
        $iniSettings = \ini_get_all(null, false);

        foreach ($iniSettings as $key => $value) {
            $result .= \sprintf(
>>>>>>> dev
                '@ini_set(%s, %s);' . "\n",
                self::exportVariable($key),
                self::exportVariable($value)
            );
        }

        return $result;
    }

<<<<<<< HEAD
    public static function getConstantsAsString()
    {
        $constants = get_defined_constants(true);
=======
    /**
     * @return string
     */
    public static function getConstantsAsString()
    {
        $constants = \get_defined_constants(true);
>>>>>>> dev
        $result    = '';

        if (isset($constants['user'])) {
            foreach ($constants['user'] as $name => $value) {
<<<<<<< HEAD
                $result .= sprintf(
=======
                $result .= \sprintf(
>>>>>>> dev
                    'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                    $name,
                    $name,
                    self::exportVariable($value)
                );
            }
        }

        return $result;
    }

<<<<<<< HEAD
=======
    /**
     * @return string
     */
>>>>>>> dev
    public static function getGlobalsAsString()
    {
        $result            = '';
        $superGlobalArrays = self::getSuperGlobalArrays();

        foreach ($superGlobalArrays as $superGlobalArray) {
<<<<<<< HEAD
            if (isset($GLOBALS[$superGlobalArray]) &&
                is_array($GLOBALS[$superGlobalArray])) {
                foreach (array_keys($GLOBALS[$superGlobalArray]) as $key) {
=======
            if (isset($GLOBALS[$superGlobalArray]) && \is_array($GLOBALS[$superGlobalArray])) {
                foreach (\array_keys($GLOBALS[$superGlobalArray]) as $key) {
>>>>>>> dev
                    if ($GLOBALS[$superGlobalArray][$key] instanceof Closure) {
                        continue;
                    }

<<<<<<< HEAD
                    $result .= sprintf(
=======
                    $result .= \sprintf(
>>>>>>> dev
                        '$GLOBALS[\'%s\'][\'%s\'] = %s;' . "\n",
                        $superGlobalArray,
                        $key,
                        self::exportVariable($GLOBALS[$superGlobalArray][$key])
                    );
                }
            }
        }

        $blacklist   = $superGlobalArrays;
        $blacklist[] = 'GLOBALS';

<<<<<<< HEAD
        foreach (array_keys($GLOBALS) as $key) {
            if (!in_array($key, $blacklist) && !$GLOBALS[$key] instanceof Closure) {
                $result .= sprintf(
=======
        foreach (\array_keys($GLOBALS) as $key) {
            if (!\in_array($key, $blacklist) && !$GLOBALS[$key] instanceof Closure) {
                $result .= \sprintf(
>>>>>>> dev
                    '$GLOBALS[\'%s\'] = %s;' . "\n",
                    $key,
                    self::exportVariable($GLOBALS[$key])
                );
            }
        }

        return $result;
    }

<<<<<<< HEAD
    protected static function getSuperGlobalArrays()
    {
        if (ini_get('register_long_arrays') == '1') {
            return array_merge(
                self::$superGlobalArrays,
                self::$superGlobalArraysLong
            );
        } else {
            return self::$superGlobalArrays;
        }
=======
    /**
     * @return string[]
     */
    protected static function getSuperGlobalArrays()
    {
        return self::$superGlobalArrays;
>>>>>>> dev
    }

    protected static function exportVariable($variable)
    {
<<<<<<< HEAD
        if (is_scalar($variable) || is_null($variable) ||
           (is_array($variable) && self::arrayOnlyContainsScalars($variable))) {
            return var_export($variable, true);
        }

        return 'unserialize(' .
                var_export(serialize($variable), true) .
                ')';
    }

=======
        if (\is_scalar($variable) || null === $variable ||
            (\is_array($variable) && self::arrayOnlyContainsScalars($variable))) {
            return \var_export($variable, true);
        }

        return 'unserialize(' .
            \var_export(\serialize($variable), true) .
            ')';
    }

    /**
     * @param array $array
     *
     * @return bool
     */
>>>>>>> dev
    protected static function arrayOnlyContainsScalars(array $array)
    {
        $result = true;

        foreach ($array as $element) {
<<<<<<< HEAD
            if (is_array($element)) {
                $result = self::arrayOnlyContainsScalars($element);
            } elseif (!is_scalar($element) && !is_null($element)) {
=======
            if (\is_array($element)) {
                $result = self::arrayOnlyContainsScalars($element);
            } elseif (!\is_scalar($element) && null !== $element) {
>>>>>>> dev
                $result = false;
            }

            if ($result === false) {
                break;
            }
        }

        return $result;
    }
}
