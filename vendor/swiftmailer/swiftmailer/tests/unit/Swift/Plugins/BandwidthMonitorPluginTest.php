<?php

<<<<<<< HEAD
class Swift_Plugins_BandwidthMonitorPluginTest extends \PHPUnit_Framework_TestCase
=======
class Swift_Plugins_BandwidthMonitorPluginTest extends \PHPUnit\Framework\TestCase
>>>>>>> dev
{
    private $_monitor;

    private $_bytes = 0;

    protected function setUp()
    {
<<<<<<< HEAD
        $this->_monitor = new Swift_Plugins_BandwidthMonitorPlugin();
=======
        $this->monitor = new Swift_Plugins_BandwidthMonitorPlugin();
>>>>>>> dev
    }

    public function testBytesOutIncreasesWhenCommandsSent()
    {
<<<<<<< HEAD
        $evt = $this->_createCommandEvent("RCPT TO:<foo@bar.com>\r\n");

        $this->assertEquals(0, $this->_monitor->getBytesOut());
        $this->_monitor->commandSent($evt);
        $this->assertEquals(23, $this->_monitor->getBytesOut());
        $this->_monitor->commandSent($evt);
        $this->assertEquals(46, $this->_monitor->getBytesOut());
=======
        $evt = $this->createCommandEvent("RCPT TO:<foo@bar.com>\r\n");

        $this->assertEquals(0, $this->monitor->getBytesOut());
        $this->monitor->commandSent($evt);
        $this->assertEquals(23, $this->monitor->getBytesOut());
        $this->monitor->commandSent($evt);
        $this->assertEquals(46, $this->monitor->getBytesOut());
>>>>>>> dev
    }

    public function testBytesInIncreasesWhenResponsesReceived()
    {
<<<<<<< HEAD
        $evt = $this->_createResponseEvent("250 Ok\r\n");

        $this->assertEquals(0, $this->_monitor->getBytesIn());
        $this->_monitor->responseReceived($evt);
        $this->assertEquals(8, $this->_monitor->getBytesIn());
        $this->_monitor->responseReceived($evt);
        $this->assertEquals(16, $this->_monitor->getBytesIn());
=======
        $evt = $this->createResponseEvent("250 Ok\r\n");

        $this->assertEquals(0, $this->monitor->getBytesIn());
        $this->monitor->responseReceived($evt);
        $this->assertEquals(8, $this->monitor->getBytesIn());
        $this->monitor->responseReceived($evt);
        $this->assertEquals(16, $this->monitor->getBytesIn());
>>>>>>> dev
    }

    public function testCountersCanBeReset()
    {
<<<<<<< HEAD
        $evt = $this->_createResponseEvent("250 Ok\r\n");

        $this->assertEquals(0, $this->_monitor->getBytesIn());
        $this->_monitor->responseReceived($evt);
        $this->assertEquals(8, $this->_monitor->getBytesIn());
        $this->_monitor->responseReceived($evt);
        $this->assertEquals(16, $this->_monitor->getBytesIn());

        $evt = $this->_createCommandEvent("RCPT TO:<foo@bar.com>\r\n");

        $this->assertEquals(0, $this->_monitor->getBytesOut());
        $this->_monitor->commandSent($evt);
        $this->assertEquals(23, $this->_monitor->getBytesOut());
        $this->_monitor->commandSent($evt);
        $this->assertEquals(46, $this->_monitor->getBytesOut());

        $this->_monitor->reset();

        $this->assertEquals(0, $this->_monitor->getBytesOut());
        $this->assertEquals(0, $this->_monitor->getBytesIn());
=======
        $evt = $this->createResponseEvent("250 Ok\r\n");

        $this->assertEquals(0, $this->monitor->getBytesIn());
        $this->monitor->responseReceived($evt);
        $this->assertEquals(8, $this->monitor->getBytesIn());
        $this->monitor->responseReceived($evt);
        $this->assertEquals(16, $this->monitor->getBytesIn());

        $evt = $this->createCommandEvent("RCPT TO:<foo@bar.com>\r\n");

        $this->assertEquals(0, $this->monitor->getBytesOut());
        $this->monitor->commandSent($evt);
        $this->assertEquals(23, $this->monitor->getBytesOut());
        $this->monitor->commandSent($evt);
        $this->assertEquals(46, $this->monitor->getBytesOut());

        $this->monitor->reset();

        $this->assertEquals(0, $this->monitor->getBytesOut());
        $this->assertEquals(0, $this->monitor->getBytesIn());
>>>>>>> dev
    }

    public function testBytesOutIncreasesAccordingToMessageLength()
    {
<<<<<<< HEAD
        $message = $this->_createMessageWithByteCount(6);
        $evt = $this->_createSendEvent($message);

        $this->assertEquals(0, $this->_monitor->getBytesOut());
        $this->_monitor->sendPerformed($evt);
        $this->assertEquals(6, $this->_monitor->getBytesOut());
        $this->_monitor->sendPerformed($evt);
        $this->assertEquals(12, $this->_monitor->getBytesOut());
    }

    private function _createSendEvent($message)
=======
        $message = $this->createMessageWithByteCount(6);
        $evt = $this->createSendEvent($message);

        $this->assertEquals(0, $this->monitor->getBytesOut());
        $this->monitor->sendPerformed($evt);
        $this->assertEquals(6, $this->monitor->getBytesOut());
        $this->monitor->sendPerformed($evt);
        $this->assertEquals(12, $this->monitor->getBytesOut());
    }

    private function createSendEvent($message)
>>>>>>> dev
    {
        $evt = $this->getMockBuilder('Swift_Events_SendEvent')
                    ->disableOriginalConstructor()
                    ->getMock();
        $evt->expects($this->any())
            ->method('getMessage')
            ->will($this->returnValue($message));

        return $evt;
    }

<<<<<<< HEAD
    private function _createCommandEvent($command)
=======
    private function createCommandEvent($command)
>>>>>>> dev
    {
        $evt = $this->getMockBuilder('Swift_Events_CommandEvent')
                    ->disableOriginalConstructor()
                    ->getMock();
        $evt->expects($this->any())
            ->method('getCommand')
            ->will($this->returnValue($command));

        return $evt;
    }

<<<<<<< HEAD
    private function _createResponseEvent($response)
=======
    private function createResponseEvent($response)
>>>>>>> dev
    {
        $evt = $this->getMockBuilder('Swift_Events_ResponseEvent')
                    ->disableOriginalConstructor()
                    ->getMock();
        $evt->expects($this->any())
            ->method('getResponse')
            ->will($this->returnValue($response));

        return $evt;
    }

<<<<<<< HEAD
    private function _createMessageWithByteCount($bytes)
    {
        $this->_bytes = $bytes;
        $msg = $this->getMockBuilder('Swift_Mime_Message')->getMock();
        $msg->expects($this->any())
            ->method('toByteStream')
            ->will($this->returnCallback(array($this, '_write')));
      /*  $this->_checking(Expectations::create()
            -> ignoring($msg)->toByteStream(any()) -> calls(array($this, '_write'))
        ); */
=======
    private function createMessageWithByteCount($bytes)
    {
        $this->bytes = $bytes;
        $msg = $this->getMockBuilder('Swift_Mime_SimpleMessage')->disableOriginalConstructor()->getMock();
        $msg->expects($this->any())
            ->method('toByteStream')
            ->will($this->returnCallback([$this, 'write']));
        /*  $this->checking(Expectations::create()
              -> ignoring($msg)->toByteStream(any()) -> calls(array($this, 'write'))
          ); */
>>>>>>> dev

        return $msg;
    }

<<<<<<< HEAD
    public function _write($is)
    {
        for ($i = 0; $i < $this->_bytes; ++$i) {
=======
    public function write($is)
    {
        for ($i = 0; $i < $this->bytes; ++$i) {
>>>>>>> dev
            $is->write('x');
        }
    }
}
