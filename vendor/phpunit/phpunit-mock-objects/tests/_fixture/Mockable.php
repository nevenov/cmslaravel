<?php
class Mockable
{
    public $constructorArgs;
    public $cloned;

    public function __construct($arg1 = null, $arg2 = null)
    {
<<<<<<< HEAD
        $this->constructorArgs = array($arg1, $arg2);
=======
        $this->constructorArgs = [$arg1, $arg2];
>>>>>>> dev
    }

    public function mockableMethod()
    {
        // something different from NULL
        return true;
    }

    public function anotherMockableMethod()
    {
        // something different from NULL
        return true;
    }

    public function __clone()
    {
        $this->cloned = true;
    }
}
