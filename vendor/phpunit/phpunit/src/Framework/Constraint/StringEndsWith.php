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
 * Constraint that asserts that the string it is evaluated for ends with a given
 * suffix.
<<<<<<< HEAD
 *
 * @since Class available since Release 3.4.0
 */
class PHPUnit_Framework_Constraint_StringEndsWith extends PHPUnit_Framework_Constraint
=======
 */
class StringEndsWith extends Constraint
>>>>>>> dev
{
    /**
     * @var string
     */
    protected $suffix;

    /**
     * @param string $suffix
     */
    public function __construct($suffix)
    {
        parent::__construct();
        $this->suffix = $suffix;
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
        return substr($other, 0 - strlen($this->suffix)) == $this->suffix;
=======
        return \substr($other, 0 - \strlen($this->suffix)) == $this->suffix;
>>>>>>> dev
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'ends with "' . $this->suffix . '"';
    }
}
