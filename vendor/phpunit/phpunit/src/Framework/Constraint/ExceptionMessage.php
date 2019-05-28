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
 * @since Class available since Release 3.6.6
 */
class PHPUnit_Framework_Constraint_ExceptionMessage extends PHPUnit_Framework_Constraint
=======
namespace PHPUnit\Framework\Constraint;

class ExceptionMessage extends Constraint
>>>>>>> dev
{
    /**
     * @var int
     */
    protected $expectedMessage;

    /**
     * @param string $expected
     */
    public function __construct($expected)
    {
        parent::__construct();
<<<<<<< HEAD
=======

>>>>>>> dev
        $this->expectedMessage = $expected;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param Exception $other
=======
     * @param \Throwable $other
>>>>>>> dev
     *
     * @return bool
     */
    protected function matches($other)
    {
<<<<<<< HEAD
        return strpos($other->getMessage(), $this->expectedMessage) !== false;
=======
        if ($this->expectedMessage === '') {
            return $other->getMessage() === '';
        }

        return \strpos($other->getMessage(), $this->expectedMessage) !== false;
>>>>>>> dev
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
<<<<<<< HEAD
        return sprintf(
=======
        if ($this->expectedMessage === '') {
            return \sprintf(
                "exception message is empty but is '%s'",
                $other->getMessage()
            );
        }

        return \sprintf(
>>>>>>> dev
            "exception message '%s' contains '%s'",
            $other->getMessage(),
            $this->expectedMessage
        );
    }

    /**
     * @return string
     */
    public function toString()
    {
<<<<<<< HEAD
=======
        if ($this->expectedMessage === '') {
            return 'exception message is empty';
        }

>>>>>>> dev
        return 'exception message contains ';
    }
}
