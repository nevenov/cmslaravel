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
 * Utility methods to load PHP sourcefiles.
 *
 * @since Class available since Release 2.3.0
 */
class PHPUnit_Util_Fileloader
=======
namespace PHPUnit\Util;

use PHPUnit\Framework\Exception;

/**
 * Utility methods to load PHP sourcefiles.
 */
class Fileloader
>>>>>>> dev
{
    /**
     * Checks if a PHP sourcefile is readable.
     * The sourcefile is loaded through the load() method.
     *
     * @param string $filename
     *
     * @return string
     *
<<<<<<< HEAD
     * @throws PHPUnit_Framework_Exception
     */
    public static function checkAndLoad($filename)
    {
        $includePathFilename = stream_resolve_include_path($filename);

        if (!$includePathFilename || !is_readable($includePathFilename)) {
            throw new PHPUnit_Framework_Exception(
                sprintf('Cannot open file "%s".' . "\n", $filename)
=======
     * @throws Exception
     */
    public static function checkAndLoad($filename)
    {
        $includePathFilename = \stream_resolve_include_path($filename);

        // As a fallback, PHP looks in the directory of the file executing the stream_resolve_include_path function.
        // We don't want to load the Test.php file here, so skip it if it found that.
        // PHP prioritizes the include_path setting, so if the current directory is in there, it will first look in the
        // current working directory.
        $localFile = __DIR__ . DIRECTORY_SEPARATOR . $filename;

        // @see https://github.com/sebastianbergmann/phpunit/pull/2751
        $isReadable = @\fopen($includePathFilename, 'r') !== false;

        if (!$includePathFilename || !$isReadable || $includePathFilename === $localFile) {
            throw new Exception(
                \sprintf('Cannot open file "%s".' . "\n", $filename)
>>>>>>> dev
            );
        }

        self::load($includePathFilename);

        return $includePathFilename;
    }

    /**
     * Loads a PHP sourcefile.
     *
     * @param string $filename
     *
     * @return mixed
<<<<<<< HEAD
     *
     * @since  Method available since Release 3.0.0
     */
    public static function load($filename)
    {
        $oldVariableNames = array_keys(get_defined_vars());

        include_once $filename;

        $newVariables     = get_defined_vars();
        $newVariableNames = array_diff(
            array_keys($newVariables),
=======
     */
    public static function load($filename)
    {
        $oldVariableNames = \array_keys(\get_defined_vars());

        include_once $filename;

        $newVariables     = \get_defined_vars();
        $newVariableNames = \array_diff(
            \array_keys($newVariables),
>>>>>>> dev
            $oldVariableNames
        );

        foreach ($newVariableNames as $variableName) {
            if ($variableName != 'oldVariableNames') {
                $GLOBALS[$variableName] = $newVariables[$variableName];
            }
        }

        return $filename;
    }
}
