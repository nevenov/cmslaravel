<?php
<<<<<<< HEAD
class TemplateMethodsTest extends PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;

class TemplateMethodsTest extends TestCase
>>>>>>> dev
{
    public static function setUpBeforeClass()
    {
        print __METHOD__ . "\n";
    }

    protected function setUp()
    {
        print __METHOD__ . "\n";
    }

    protected function assertPreConditions()
    {
        print __METHOD__ . "\n";
    }

    public function testOne()
    {
        print __METHOD__ . "\n";
        $this->assertTrue(true);
    }

    public function testTwo()
    {
        print __METHOD__ . "\n";
        $this->assertTrue(false);
    }

    protected function assertPostConditions()
    {
        print __METHOD__ . "\n";
    }

    protected function tearDown()
    {
        print __METHOD__ . "\n";
    }

    public static function tearDownAfterClass()
    {
        print __METHOD__ . "\n";
    }

<<<<<<< HEAD
    protected function onNotSuccessfulTest(Exception $e)
    {
        print __METHOD__ . "\n";
        throw $e;
=======
    protected function onNotSuccessfulTest(Exception $t)
    {
        print __METHOD__ . "\n";
        throw $t;
>>>>>>> dev
    }
}
