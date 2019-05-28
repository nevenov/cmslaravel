<?php

<<<<<<< HEAD
class Swift_Events_SimpleEventDispatcherTest extends \PHPUnit_Framework_TestCase
{
    private $_dispatcher;

    protected function setUp()
    {
        $this->_dispatcher = new Swift_Events_SimpleEventDispatcher();
=======
class Swift_Events_SimpleEventDispatcherTest extends \PHPUnit\Framework\TestCase
{
    private $dispatcher;

    protected function setUp()
    {
        $this->dispatcher = new Swift_Events_SimpleEventDispatcher();
>>>>>>> dev
    }

    public function testSendEventCanBeCreated()
    {
        $transport = $this->getMockBuilder('Swift_Transport')->getMock();
<<<<<<< HEAD
        $message = $this->getMockBuilder('Swift_Mime_Message')->getMock();
        $evt = $this->_dispatcher->createSendEvent($transport, $message);
=======
        $message = $this->getMockBuilder('Swift_Mime_SimpleMessage')->disableOriginalConstructor()->getMock();
        $evt = $this->dispatcher->createSendEvent($transport, $message);
>>>>>>> dev
        $this->assertInstanceOf('Swift_Events_SendEvent', $evt);
        $this->assertSame($message, $evt->getMessage());
        $this->assertSame($transport, $evt->getTransport());
    }

    public function testCommandEventCanBeCreated()
    {
        $buf = $this->getMockBuilder('Swift_Transport')->getMock();
<<<<<<< HEAD
        $evt = $this->_dispatcher->createCommandEvent($buf, "FOO\r\n", array(250));
        $this->assertInstanceOf('Swift_Events_CommandEvent', $evt);
        $this->assertSame($buf, $evt->getSource());
        $this->assertEquals("FOO\r\n", $evt->getCommand());
        $this->assertEquals(array(250), $evt->getSuccessCodes());
=======
        $evt = $this->dispatcher->createCommandEvent($buf, "FOO\r\n", [250]);
        $this->assertInstanceOf('Swift_Events_CommandEvent', $evt);
        $this->assertSame($buf, $evt->getSource());
        $this->assertEquals("FOO\r\n", $evt->getCommand());
        $this->assertEquals([250], $evt->getSuccessCodes());
>>>>>>> dev
    }

    public function testResponseEventCanBeCreated()
    {
        $buf = $this->getMockBuilder('Swift_Transport')->getMock();
<<<<<<< HEAD
        $evt = $this->_dispatcher->createResponseEvent($buf, "250 Ok\r\n", true);
=======
        $evt = $this->dispatcher->createResponseEvent($buf, "250 Ok\r\n", true);
>>>>>>> dev
        $this->assertInstanceOf('Swift_Events_ResponseEvent', $evt);
        $this->assertSame($buf, $evt->getSource());
        $this->assertEquals("250 Ok\r\n", $evt->getResponse());
        $this->assertTrue($evt->isValid());
    }

    public function testTransportChangeEventCanBeCreated()
    {
        $transport = $this->getMockBuilder('Swift_Transport')->getMock();
<<<<<<< HEAD
        $evt = $this->_dispatcher->createTransportChangeEvent($transport);
=======
        $evt = $this->dispatcher->createTransportChangeEvent($transport);
>>>>>>> dev
        $this->assertInstanceOf('Swift_Events_TransportChangeEvent', $evt);
        $this->assertSame($transport, $evt->getSource());
    }

    public function testTransportExceptionEventCanBeCreated()
    {
        $transport = $this->getMockBuilder('Swift_Transport')->getMock();
        $ex = new Swift_TransportException('');
<<<<<<< HEAD
        $evt = $this->_dispatcher->createTransportExceptionEvent($transport, $ex);
=======
        $evt = $this->dispatcher->createTransportExceptionEvent($transport, $ex);
>>>>>>> dev
        $this->assertInstanceOf('Swift_Events_TransportExceptionEvent', $evt);
        $this->assertSame($transport, $evt->getSource());
        $this->assertSame($ex, $evt->getException());
    }

    public function testListenersAreNotifiedOfDispatchedEvent()
    {
        $transport = $this->getMockBuilder('Swift_Transport')->getMock();

<<<<<<< HEAD
        $evt = $this->_dispatcher->createTransportChangeEvent($transport);
=======
        $evt = $this->dispatcher->createTransportChangeEvent($transport);
>>>>>>> dev

        $listenerA = $this->getMockBuilder('Swift_Events_TransportChangeListener')->getMock();
        $listenerB = $this->getMockBuilder('Swift_Events_TransportChangeListener')->getMock();

<<<<<<< HEAD
        $this->_dispatcher->bindEventListener($listenerA);
        $this->_dispatcher->bindEventListener($listenerB);
=======
        $this->dispatcher->bindEventListener($listenerA);
        $this->dispatcher->bindEventListener($listenerB);
>>>>>>> dev

        $listenerA->expects($this->once())
                  ->method('transportStarted')
                  ->with($evt);
        $listenerB->expects($this->once())
                  ->method('transportStarted')
                  ->with($evt);

<<<<<<< HEAD
        $this->_dispatcher->dispatchEvent($evt, 'transportStarted');
=======
        $this->dispatcher->dispatchEvent($evt, 'transportStarted');
>>>>>>> dev
    }

    public function testListenersAreOnlyCalledIfImplementingCorrectInterface()
    {
        $transport = $this->getMockBuilder('Swift_Transport')->getMock();
<<<<<<< HEAD
        $message = $this->getMockBuilder('Swift_Mime_Message')->getMock();

        $evt = $this->_dispatcher->createSendEvent($transport, $message);
=======
        $message = $this->getMockBuilder('Swift_Mime_SimpleMessage')->disableOriginalConstructor()->getMock();

        $evt = $this->dispatcher->createSendEvent($transport, $message);
>>>>>>> dev

        $targetListener = $this->getMockBuilder('Swift_Events_SendListener')->getMock();
        $otherListener = $this->getMockBuilder('DummyListener')->getMock();

<<<<<<< HEAD
        $this->_dispatcher->bindEventListener($targetListener);
        $this->_dispatcher->bindEventListener($otherListener);
=======
        $this->dispatcher->bindEventListener($targetListener);
        $this->dispatcher->bindEventListener($otherListener);
>>>>>>> dev

        $targetListener->expects($this->once())
                       ->method('sendPerformed')
                       ->with($evt);
        $otherListener->expects($this->never())
                    ->method('sendPerformed');

<<<<<<< HEAD
        $this->_dispatcher->dispatchEvent($evt, 'sendPerformed');
=======
        $this->dispatcher->dispatchEvent($evt, 'sendPerformed');
>>>>>>> dev
    }

    public function testListenersCanCancelBubblingOfEvent()
    {
        $transport = $this->getMockBuilder('Swift_Transport')->getMock();
<<<<<<< HEAD
        $message = $this->getMockBuilder('Swift_Mime_Message')->getMock();

        $evt = $this->_dispatcher->createSendEvent($transport, $message);
=======
        $message = $this->getMockBuilder('Swift_Mime_SimpleMessage')->disableOriginalConstructor()->getMock();

        $evt = $this->dispatcher->createSendEvent($transport, $message);
>>>>>>> dev

        $listenerA = $this->getMockBuilder('Swift_Events_SendListener')->getMock();
        $listenerB = $this->getMockBuilder('Swift_Events_SendListener')->getMock();

<<<<<<< HEAD
        $this->_dispatcher->bindEventListener($listenerA);
        $this->_dispatcher->bindEventListener($listenerB);
=======
        $this->dispatcher->bindEventListener($listenerA);
        $this->dispatcher->bindEventListener($listenerB);
>>>>>>> dev

        $listenerA->expects($this->once())
                  ->method('sendPerformed')
                  ->with($evt)
                  ->will($this->returnCallback(function ($object) {
                      $object->cancelBubble(true);
                  }));
        $listenerB->expects($this->never())
                  ->method('sendPerformed');

<<<<<<< HEAD
        $this->_dispatcher->dispatchEvent($evt, 'sendPerformed');
=======
        $this->dispatcher->dispatchEvent($evt, 'sendPerformed');
>>>>>>> dev

        $this->assertTrue($evt->bubbleCancelled());
    }

<<<<<<< HEAD
    private function _createDispatcher(array $map)
=======
    private function createDispatcher(array $map)
>>>>>>> dev
    {
        return new Swift_Events_SimpleEventDispatcher($map);
    }
}

class DummyListener implements Swift_Events_EventListener
{
    public function sendPerformed(Swift_Events_SendEvent $evt)
    {
    }
}
