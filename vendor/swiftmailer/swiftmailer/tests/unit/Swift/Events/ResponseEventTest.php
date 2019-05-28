<?php

<<<<<<< HEAD
class Swift_Events_ResponseEventTest extends \PHPUnit_Framework_TestCase
{
    public function testResponseCanBeFetchViaGetter()
    {
        $evt = $this->_createEvent($this->_createTransport(), "250 Ok\r\n", true);
=======
class Swift_Events_ResponseEventTest extends \PHPUnit\Framework\TestCase
{
    public function testResponseCanBeFetchViaGetter()
    {
        $evt = $this->createEvent($this->createTransport(), "250 Ok\r\n", true);
>>>>>>> dev
        $this->assertEquals("250 Ok\r\n", $evt->getResponse(),
            '%s: Response should be available via getResponse()'
            );
    }

    public function testResultCanBeFetchedViaGetter()
    {
<<<<<<< HEAD
        $evt = $this->_createEvent($this->_createTransport(), "250 Ok\r\n", false);
=======
        $evt = $this->createEvent($this->createTransport(), "250 Ok\r\n", false);
>>>>>>> dev
        $this->assertFalse($evt->isValid(),
            '%s: Result should be checkable via isValid()'
            );
    }

    public function testSourceIsBuffer()
    {
<<<<<<< HEAD
        $transport = $this->_createTransport();
        $evt = $this->_createEvent($transport, "250 Ok\r\n", true);
=======
        $transport = $this->createTransport();
        $evt = $this->createEvent($transport, "250 Ok\r\n", true);
>>>>>>> dev
        $ref = $evt->getSource();
        $this->assertEquals($transport, $ref);
    }

<<<<<<< HEAD
    private function _createEvent(Swift_Transport $source, $response, $result)
=======
    private function createEvent(Swift_Transport $source, $response, $result)
>>>>>>> dev
    {
        return new Swift_Events_ResponseEvent($source, $response, $result);
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
