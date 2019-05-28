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
 * Prettifies class and method names for use in TestDox documentation.
 *
 * @since Class available since Release 2.1.0
 */
class PHPUnit_Util_TestDox_NamePrettifier
=======
namespace PHPUnit\Util\TestDox;

/**
 * Prettifies class and method names for use in TestDox documentation.
 */
class NamePrettifier
>>>>>>> dev
{
    /**
     * @var string
     */
    protected $prefix = 'Test';

    /**
     * @var string
     */
    protected $suffix = 'Test';

    /**
     * @var array
     */
<<<<<<< HEAD
    protected $strings = array();
=======
    protected $strings = [];
>>>>>>> dev

    /**
     * Prettifies the name of a test class.
     *
     * @param string $name
     *
     * @return string
     */
    public function prettifyTestClass($name)
    {
        $title = $name;

        if ($this->suffix !== null &&
<<<<<<< HEAD
            $this->suffix == substr($name, -1 * strlen($this->suffix))) {
            $title = substr($title, 0, strripos($title, $this->suffix));
        }

        if ($this->prefix !== null &&
            $this->prefix == substr($name, 0, strlen($this->prefix))) {
            $title = substr($title, strlen($this->prefix));
        }

        if (substr($title, 0, 1) == '\\') {
            $title = substr($title, 1);
=======
            $this->suffix == \substr($name, -1 * \strlen($this->suffix))) {
            $title = \substr($title, 0, \strripos($title, $this->suffix));
        }

        if ($this->prefix !== null &&
            $this->prefix == \substr($name, 0, \strlen($this->prefix))) {
            $title = \substr($title, \strlen($this->prefix));
        }

        if (\substr($title, 0, 1) == '\\') {
            $title = \substr($title, 1);
>>>>>>> dev
        }

        return $title;
    }

    /**
     * Prettifies the name of a test method.
     *
     * @param string $name
     *
     * @return string
     */
    public function prettifyTestMethod($name)
    {
        $buffer = '';

<<<<<<< HEAD
        if (!is_string($name) || strlen($name) == 0) {
            return $buffer;
        }

        $string = preg_replace('#\d+$#', '', $name, -1, $count);

        if (in_array($string, $this->strings)) {
=======
        if (!\is_string($name) || \strlen($name) == 0) {
            return $buffer;
        }

        $string = \preg_replace('#\d+$#', '', $name, -1, $count);

        if (\in_array($string, $this->strings)) {
>>>>>>> dev
            $name = $string;
        } elseif ($count == 0) {
            $this->strings[] = $string;
        }

<<<<<<< HEAD
        if (substr($name, 0, 4) == 'test') {
            $name = substr($name, 4);
        }

        $name[0] = strtoupper($name[0]);

        if (strpos($name, '_') !== false) {
            return trim(str_replace('_', ' ', $name));
        }

        $max        = strlen($name);
        $wasNumeric = false;

        for ($i = 0; $i < $max; $i++) {
            if ($i > 0 &&
                ord($name[$i]) >= 65 &&
                ord($name[$i]) <= 90) {
                $buffer .= ' ' . strtolower($name[$i]);
            } else {
                $isNumeric = is_numeric($name[$i]);

                if (!$wasNumeric && $isNumeric) {
                    $buffer    .= ' ';
=======
        if (\substr($name, 0, 4) == 'test') {
            $name = \substr($name, 4);
        }

        if (\strlen($name) == 0) {
            return $buffer;
        }

        $name[0] = \strtoupper($name[0]);

        if (\strpos($name, '_') !== false) {
            return \trim(\str_replace('_', ' ', $name));
        }

        $max        = \strlen($name);
        $wasNumeric = false;

        for ($i = 0; $i < $max; $i++) {
            if ($i > 0 && \ord($name[$i]) >= 65 && \ord($name[$i]) <= 90) {
                $buffer .= ' ' . \strtolower($name[$i]);
            } else {
                $isNumeric = \is_numeric($name[$i]);

                if (!$wasNumeric && $isNumeric) {
                    $buffer .= ' ';
>>>>>>> dev
                    $wasNumeric = true;
                }

                if ($wasNumeric && !$isNumeric) {
                    $wasNumeric = false;
                }

                $buffer .= $name[$i];
            }
        }

        return $buffer;
    }

    /**
     * Sets the prefix of test names.
     *
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Sets the suffix of test names.
     *
     * @param string $suffix
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }
}
