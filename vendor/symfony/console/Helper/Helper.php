<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

use Symfony\Component\Console\Formatter\OutputFormatterInterface;

/**
 * Helper is the base class for all helper classes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class Helper implements HelperInterface
{
    protected $helperSet = null;

    /**
<<<<<<< HEAD
     * Sets the helper set associated with this helper.
     *
     * @param HelperSet $helperSet A HelperSet instance
=======
     * {@inheritdoc}
>>>>>>> dev
     */
    public function setHelperSet(HelperSet $helperSet = null)
    {
        $this->helperSet = $helperSet;
    }

    /**
<<<<<<< HEAD
     * Gets the helper set associated with this helper.
     *
     * @return HelperSet A HelperSet instance
=======
     * {@inheritdoc}
>>>>>>> dev
     */
    public function getHelperSet()
    {
        return $this->helperSet;
    }

    /**
     * Returns the length of a string, using mb_strwidth if it is available.
     *
     * @param string $string The string to check its length
     *
     * @return int The length of the string
     */
    public static function strlen($string)
    {
        if (false === $encoding = mb_detect_encoding($string, null, true)) {
<<<<<<< HEAD
            return strlen($string);
=======
            return \strlen($string);
>>>>>>> dev
        }

        return mb_strwidth($string, $encoding);
    }

<<<<<<< HEAD
    public static function formatTime($secs)
    {
        static $timeFormats = array(
            array(0, '< 1 sec'),
            array(1, '1 sec'),
            array(2, 'secs', 1),
            array(60, '1 min'),
            array(120, 'mins', 60),
            array(3600, '1 hr'),
            array(7200, 'hrs', 3600),
            array(86400, '1 day'),
            array(172800, 'days', 86400),
        );
=======
    /**
     * Returns the subset of a string, using mb_substr if it is available.
     *
     * @param string   $string String to subset
     * @param int      $from   Start offset
     * @param int|null $length Length to read
     *
     * @return string The string subset
     */
    public static function substr($string, $from, $length = null)
    {
        if (false === $encoding = mb_detect_encoding($string, null, true)) {
            return substr($string, $from, $length);
        }

        return mb_substr($string, $from, $length, $encoding);
    }

    public static function formatTime($secs)
    {
        static $timeFormats = [
            [0, '< 1 sec'],
            [1, '1 sec'],
            [2, 'secs', 1],
            [60, '1 min'],
            [120, 'mins', 60],
            [3600, '1 hr'],
            [7200, 'hrs', 3600],
            [86400, '1 day'],
            [172800, 'days', 86400],
        ];
>>>>>>> dev

        foreach ($timeFormats as $index => $format) {
            if ($secs >= $format[0]) {
                if ((isset($timeFormats[$index + 1]) && $secs < $timeFormats[$index + 1][0])
<<<<<<< HEAD
                    || $index == count($timeFormats) - 1
                ) {
                    if (2 == count($format)) {
=======
                    || $index == \count($timeFormats) - 1
                ) {
                    if (2 == \count($format)) {
>>>>>>> dev
                        return $format[1];
                    }

                    return floor($secs / $format[2]).' '.$format[1];
                }
            }
        }
    }

    public static function formatMemory($memory)
    {
        if ($memory >= 1024 * 1024 * 1024) {
            return sprintf('%.1f GiB', $memory / 1024 / 1024 / 1024);
        }

        if ($memory >= 1024 * 1024) {
            return sprintf('%.1f MiB', $memory / 1024 / 1024);
        }

        if ($memory >= 1024) {
            return sprintf('%d KiB', $memory / 1024);
        }

        return sprintf('%d B', $memory);
    }

    public static function strlenWithoutDecoration(OutputFormatterInterface $formatter, $string)
    {
<<<<<<< HEAD
=======
        return self::strlen(self::removeDecoration($formatter, $string));
    }

    public static function removeDecoration(OutputFormatterInterface $formatter, $string)
    {
>>>>>>> dev
        $isDecorated = $formatter->isDecorated();
        $formatter->setDecorated(false);
        // remove <...> formatting
        $string = $formatter->format($string);
        // remove already formatted characters
        $string = preg_replace("/\033\[[^m]*m/", '', $string);
        $formatter->setDecorated($isDecorated);

<<<<<<< HEAD
        return self::strlen($string);
=======
        return $string;
>>>>>>> dev
    }
}
