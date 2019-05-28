<?php

<<<<<<< HEAD
class Swift_Events_CommandEventTest extends \PHPUnit_Framework_TestCase
{
    public function testCommandCanBeFetchedByGetter()
    {
        $evt = $this->_createEvent($this->_createTransport(), "FOO\r\n");
=======
class Swift_Events_CommandEventTest extends \PHPUnit\Framework\TestCase
{
    public function testCommandCanBeFetchedByGetter()
    {
        $evt = $this->createEvent($this->createTransport(), "FOO\r\n");
>>>>>>> dev
        $this->assertEquals("FOO\r\n", $evt->getCommand());
    }

    public function testSuccessCodesCanBeFetchedViaGetter()
    {
<<<<<<< HEAD
        $evt = $this->_createEvent($this->_createTransport(), "FOO\r\n", array(250));
        $this->assertEquals(array(250), $evt->getSuccessCodes());
=======
        $evt = $this->createEvent($this->createTransport(), "FOO\r\n", [250]);
        $this->assertEquals([250], $evt->getSuccessCodes());
>>>>>>> dev
    }

    public function testSourceIsBuffer()
    {
<<<<<<< HEAD
        $transport = $this->_createTransport();
        $evt = $this->_createEvent($transport, "FOO\r\n");
=======
        $transport = $this->createTransport();
        $evt = $this->createEvent($transport, "FOO\r\n");
>>>>>>> dev
        $ref = $evt->getSource();
        $this->assertEquals($transport, $ref);
    }

<<<<<<< HEAD
    private function _createEvent(Swift_Transport $source, $command, $successCodes = array())
=======
    private function createEvent(Swift_Transport $source, $command, $successCodes = [])
>>>>>>> dev
    {
        return new Swift_Events_CommandEvent($source, $command, $successCodes);
    }

<<<<<<< HEAD
    private function _createTransport()
=======
    private function createTransport()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_Transport')->getMock();
    }
}
