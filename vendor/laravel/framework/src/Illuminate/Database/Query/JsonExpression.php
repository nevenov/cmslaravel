<?php

namespace Illuminate\Database\Query;

use InvalidArgumentException;

class JsonExpression extends Expression
{
    /**
<<<<<<< HEAD
     * The value of the expression.
     *
     * @var mixed
     */
    protected $value;

    /**
=======
>>>>>>> dev
     * Create a new raw query expression.
     *
     * @param  mixed  $value
     * @return void
     */
    public function __construct($value)
    {
<<<<<<< HEAD
        $this->value = $this->getJsonBindingParameter($value);
=======
        parent::__construct(
            $this->getJsonBindingParameter($value)
        );
>>>>>>> dev
    }

    /**
     * Translate the given value into the appropriate JSON binding parameter.
     *
     * @param  mixed  $value
     * @return string
<<<<<<< HEAD
     */
    protected function getJsonBindingParameter($value)
    {
        switch ($type = gettype($value)) {
            case 'boolean':
                return $value ? 'true' : 'false';
            case 'integer':
            case 'double':
                return $value;
=======
     *
     * @throws \InvalidArgumentException
     */
    protected function getJsonBindingParameter($value)
    {
        if ($value instanceof Expression) {
            return $value->getValue();
        }

        switch ($type = gettype($value)) {
            case 'boolean':
                return $value ? 'true' : 'false';
            case 'NULL':
            case 'integer':
            case 'double':
>>>>>>> dev
            case 'string':
                return '?';
            case 'object':
            case 'array':
                return '?';
        }

<<<<<<< HEAD
        throw new InvalidArgumentException('JSON value is of illegal type: '.$type);
    }

    /**
     * Get the value of the expression.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the value of the expression.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getValue();
=======
        throw new InvalidArgumentException("JSON value is of illegal type: {$type}");
>>>>>>> dev
    }
}
