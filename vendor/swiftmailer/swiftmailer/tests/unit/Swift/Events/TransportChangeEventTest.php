<?php

<<<<<<< HEAD
class Swift_Events_TransportChangeEventTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTransportReturnsTransport()
    {
        $transport = $this->_createTransport();
        $evt = $this->_createEvent($transport);
=======
class Swift_Events_TransportChangeEventTest extends \PHPUnit\Framework\TestCase
{
    public function testGetTransportReturnsTransport()
    {
        $transport = $this->createTransport();
        $evt = $this->createEvent($transport);
>>>>>>> dev
        $ref = $evt->getTransport();
        $this->assertEquals($transport, $ref);
    }

    public function testSourceIsTransport()
    {
<<<<<<< HEAD
        $transport = $this->_createTransport();
        $evt = $this->_createEvent($transport);
=======
        $transport = $this->createTransport();
        $evt = $this->createEvent($transport);
>>>>>>> dev
        $ref = $evt->getSource();
        $this->assertEquals($transport, $ref);
    }

<<<<<<< HEAD
    private function _createEvent(Swift_Transport $source)
=======
    private function createEvent(Swift_Transport $source)
>>>>>>> dev
    {
        return new Swift_Events_TransportChangeEvent($source);
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
