<?php

<<<<<<< HEAD
class Swift_Events_TransportExceptionEventTest extends \PHPUnit_Framework_TestCase
{
    public function testExceptionCanBeFetchViaGetter()
    {
        $ex = $this->_createException();
        $transport = $this->_createTransport();
        $evt = $this->_createEvent($transport, $ex);
=======
class Swift_Events_TransportExceptionEventTest extends \PHPUnit\Framework\TestCase
{
    public function testExceptionCanBeFetchViaGetter()
    {
        $ex = $this->createException();
        $transport = $this->createTransport();
        $evt = $this->createEvent($transport, $ex);
>>>>>>> dev
        $ref = $evt->getException();
        $this->assertEquals($ex, $ref,
            '%s: Exception should be available via getException()'
            );
    }

    public function testSourceIsTransport()
    {
<<<<<<< HEAD
        $ex = $this->_createException();
        $transport = $this->_createTransport();
        $evt = $this->_createEvent($transport, $ex);
=======
        $ex = $this->createException();
        $transport = $this->createTransport();
        $evt = $this->createEvent($transport, $ex);
>>>>>>> dev
        $ref = $evt->getSource();
        $this->assertEquals($transport, $ref,
            '%s: Transport should be available via getSource()'
            );
    }

<<<<<<< HEAD
    private function _createEvent(Swift_Transport $transport, Swift_TransportException $ex)
=======
    private function createEvent(Swift_Transport $transport, Swift_TransportException $ex)
>>>>>>> dev
    {
        return new Swift_Events_TransportExceptionEvent($transport, $ex);
    }

<<<<<<< HEAD
    private function _createTransport()
=======
    private function createTransport()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_Transport')->getMock();
    }

<<<<<<< HEAD
    private function _createException()
=======
    private function createException()
>>>>>>> dev
    {
        return new Swift_TransportException('');
    }
}
