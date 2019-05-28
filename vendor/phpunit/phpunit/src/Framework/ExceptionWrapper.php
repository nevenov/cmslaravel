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
namespace PHPUnit\Framework;

use PHPUnit\Util\Filter;
use Throwable;
>>>>>>> dev

/**
 * Wraps Exceptions thrown by code under test.
 *
 * Re-instantiates Exceptions thrown by user-space code to retain their original
 * class names, properties, and stack traces (but without arguments).
 *
<<<<<<< HEAD
 * Unlike PHPUnit_Framework_Exception, the complete stack of previous Exceptions
 * is processed.
 *
 * @since Class available since Release 4.3.0
 */
class PHPUnit_Framework_ExceptionWrapper extends PHPUnit_Framework_Exception
=======
 * Unlike PHPUnit\Framework_\Exception, the complete stack of previous Exceptions
 * is processed.
 */
class ExceptionWrapper extends Exception
>>>>>>> dev
{
    /**
     * @var string
     */
<<<<<<< HEAD
    protected $classname;

    /**
     * @var PHPUnit_Framework_ExceptionWrapper|null
=======
    protected $className;

    /**
     * @var ExceptionWrapper|null
>>>>>>> dev
     */
    protected $previous;

    /**
<<<<<<< HEAD
     * @param Throwable|Exception $e
     */
    public function __construct($e)
    {
        // PDOException::getCode() is a string.
        // @see http://php.net/manual/en/class.pdoexception.php#95812
        parent::__construct($e->getMessage(), (int) $e->getCode());

        $this->classname = get_class($e);
        $this->file      = $e->getFile();
        $this->line      = $e->getLine();

        $this->serializableTrace = $e->getTrace();
=======
     * @param Throwable $t
     */
    public function __construct(Throwable $t)
    {
        // PDOException::getCode() is a string.
        // @see http://php.net/manual/en/class.pdoexception.php#95812
        parent::__construct($t->getMessage(), (int) $t->getCode());

        $this->className = \get_class($t);
        $this->file      = $t->getFile();
        $this->line      = $t->getLine();

        $this->serializableTrace = $t->getTrace();
>>>>>>> dev

        foreach ($this->serializableTrace as $i => $call) {
            unset($this->serializableTrace[$i]['args']);
        }

<<<<<<< HEAD
        if ($e->getPrevious()) {
            $this->previous = new self($e->getPrevious());
=======
        if ($t->getPrevious()) {
            $this->previous = new self($t->getPrevious());
>>>>>>> dev
        }
    }

    /**
     * @return string
     */
<<<<<<< HEAD
    public function getClassname()
    {
        return $this->classname;
    }

    /**
     * @return PHPUnit_Framework_ExceptionWrapper
=======
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return ExceptionWrapper
>>>>>>> dev
     */
    public function getPreviousWrapped()
    {
        return $this->previous;
    }

    /**
     * @return string
     */
    public function __toString()
    {
<<<<<<< HEAD
        $string = PHPUnit_Framework_TestFailure::exceptionToString($this);

        if ($trace = PHPUnit_Util_Filter::getFilteredStacktrace($this)) {
=======
        $string = TestFailure::exceptionToString($this);

        if ($trace = Filter::getFilteredStacktrace($this)) {
>>>>>>> dev
            $string .= "\n" . $trace;
        }

        if ($this->previous) {
            $string .= "\nCaused by\n" . $this->previous;
        }

        return $string;
    }
}
