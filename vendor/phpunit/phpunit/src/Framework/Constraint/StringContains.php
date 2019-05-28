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
=======
namespace PHPUnit\Framework\Constraint;
>>>>>>> dev

/**
 * Constraint that asserts that the string it is evaluated for contains
 * a given string.
 *
<<<<<<< HEAD
 * Uses strpos() to find the position of the string in the input, if not found
 * the evaluation fails.
 *
 * The sub-string is passed in the constructor.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_StringContains extends PHPUnit_Framework_Constraint
=======
 * Uses mb_strpos() to find the position of the string in the input, if not
 * found the evaluation fails.
 *
 * The sub-string is passed in the constructor.
 */
class StringContains extends Constraint
>>>>>>> dev
{
    /**
     * @var string
     */
    protected $string;

    /**
     * @var bool
     */
    protected $ignoreCase;

    /**
     * @param string $string
     * @param bool   $ignoreCase
     */
    public function __construct($string, $ignoreCase = false)
    {
        parent::__construct();

        $this->string     = $string;
        $this->ignoreCase = $ignoreCase;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
<<<<<<< HEAD
        if ($this->ignoreCase) {
            return stripos($other, $this->string) !== false;
        } else {
            return strpos($other, $this->string) !== false;
        }
=======
        if ('' === $this->string) {
            return true;
        }

        if ($this->ignoreCase) {
            return \mb_stripos($other, $this->string) !== false;
        }

        return \mb_strpos($other, $this->string) !== false;
>>>>>>> dev
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        if ($this->ignoreCase) {
<<<<<<< HEAD
            $string = strtolower($this->string);
=======
            $string = \mb_strtolower($this->string);
>>>>>>> dev
        } else {
            $string = $this->string;
        }

<<<<<<< HEAD
        return sprintf(
=======
        return \sprintf(
>>>>>>> dev
            'contains "%s"',
            $string
        );
    }
}
