<?php

<<<<<<< HEAD
class BaseTestListenerSample extends PHPUnit_Framework_BaseTestListener
{
    public $endCount = 0;

    public function endTest(PHPUnit_Framework_Test $test, $time)
=======
use PHPUnit\Framework\BaseTestListener;
use PHPUnit\Framework\Test;

class BaseTestListenerSample extends BaseTestListener
{
    public $endCount = 0;

    public function endTest(Test $test, $time)
>>>>>>> dev
    {
        $this->endCount++;
    }
}
