<?php
<<<<<<< HEAD
class DoubleTestCase implements PHPUnit_Framework_Test
{
    protected $testCase;

    public function __construct(PHPUnit_Framework_TestCase $testCase)
=======
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Test;

class DoubleTestCase implements Test
{
    protected $testCase;

    public function __construct(TestCase $testCase)
>>>>>>> dev
    {
        $this->testCase = $testCase;
    }

    public function count()
    {
        return 2;
    }

<<<<<<< HEAD
    public function run(PHPUnit_Framework_TestResult $result = null)
=======
    public function run(TestResult $result = null)
>>>>>>> dev
    {
        $result->startTest($this);

        $this->testCase->runBare();
        $this->testCase->runBare();

        $result->endTest($this, 0);
    }
}
