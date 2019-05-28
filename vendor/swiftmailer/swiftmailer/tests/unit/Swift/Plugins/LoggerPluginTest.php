<?php

class Swift_Plugins_LoggerPluginTest extends \SwiftMailerTestCase
{
    public function testLoggerDelegatesAddingEntries()
    {
<<<<<<< HEAD
        $logger = $this->_createLogger();
=======
        $logger = $this->createLogger();
>>>>>>> dev
        $logger->expects($this->once())
               ->method('add')
               ->with('foo');

<<<<<<< HEAD
        $plugin = $this->_createPlugin($logger);
=======
        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $plugin->add('foo');
    }

    public function testLoggerDelegatesDumpingEntries()
    {
<<<<<<< HEAD
        $logger = $this->_createLogger();
=======
        $logger = $this->createLogger();
>>>>>>> dev
        $logger->expects($this->once())
               ->method('dump')
               ->will($this->returnValue('foobar'));

<<<<<<< HEAD
        $plugin = $this->_createPlugin($logger);
=======
        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $this->assertEquals('foobar', $plugin->dump());
    }

    public function testLoggerDelegatesClearingEntries()
    {
<<<<<<< HEAD
        $logger = $this->_createLogger();
        $logger->expects($this->once())
               ->method('clear');

        $plugin = $this->_createPlugin($logger);
=======
        $logger = $this->createLogger();
        $logger->expects($this->once())
               ->method('clear');

        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $plugin->clear();
    }

    public function testCommandIsSentToLogger()
    {
<<<<<<< HEAD
        $evt = $this->_createCommandEvent("foo\r\n");
        $logger = $this->_createLogger();
        $logger->expects($this->once())
               ->method('add')
               ->with($this->regExp('~foo\r\n~'));

        $plugin = $this->_createPlugin($logger);
=======
        $evt = $this->createCommandEvent("foo\r\n");
        $logger = $this->createLogger();
        $logger->expects($this->once())
               ->method('add')
               ->with(static::regExp('~foo\r\n~'));

        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $plugin->commandSent($evt);
    }

    public function testResponseIsSentToLogger()
    {
<<<<<<< HEAD
        $evt = $this->_createResponseEvent("354 Go ahead\r\n");
        $logger = $this->_createLogger();
        $logger->expects($this->once())
               ->method('add')
               ->with($this->regExp('~354 Go ahead\r\n~'));

        $plugin = $this->_createPlugin($logger);
=======
        $evt = $this->createResponseEvent("354 Go ahead\r\n");
        $logger = $this->createLogger();
        $logger->expects($this->once())
               ->method('add')
               ->with(static::regExp('~354 Go ahead\r\n~'));

        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $plugin->responseReceived($evt);
    }

    public function testTransportBeforeStartChangeIsSentToLogger()
    {
<<<<<<< HEAD
        $evt = $this->_createTransportChangeEvent();
        $logger = $this->_createLogger();
=======
        $evt = $this->createTransportChangeEvent();
        $logger = $this->createLogger();
>>>>>>> dev
        $logger->expects($this->once())
               ->method('add')
               ->with($this->anything());

<<<<<<< HEAD
        $plugin = $this->_createPlugin($logger);
=======
        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $plugin->beforeTransportStarted($evt);
    }

    public function testTransportStartChangeIsSentToLogger()
    {
<<<<<<< HEAD
        $evt = $this->_createTransportChangeEvent();
        $logger = $this->_createLogger();
=======
        $evt = $this->createTransportChangeEvent();
        $logger = $this->createLogger();
>>>>>>> dev
        $logger->expects($this->once())
               ->method('add')
               ->with($this->anything());

<<<<<<< HEAD
        $plugin = $this->_createPlugin($logger);
=======
        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $plugin->transportStarted($evt);
    }

    public function testTransportStopChangeIsSentToLogger()
    {
<<<<<<< HEAD
        $evt = $this->_createTransportChangeEvent();
        $logger = $this->_createLogger();
=======
        $evt = $this->createTransportChangeEvent();
        $logger = $this->createLogger();
>>>>>>> dev
        $logger->expects($this->once())
               ->method('add')
               ->with($this->anything());

<<<<<<< HEAD
        $plugin = $this->_createPlugin($logger);
=======
        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $plugin->transportStopped($evt);
    }

    public function testTransportBeforeStopChangeIsSentToLogger()
    {
<<<<<<< HEAD
        $evt = $this->_createTransportChangeEvent();
        $logger = $this->_createLogger();
=======
        $evt = $this->createTransportChangeEvent();
        $logger = $this->createLogger();
>>>>>>> dev
        $logger->expects($this->once())
               ->method('add')
               ->with($this->anything());

<<<<<<< HEAD
        $plugin = $this->_createPlugin($logger);
=======
        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        $plugin->beforeTransportStopped($evt);
    }

    public function testExceptionsArePassedToDelegateAndLeftToBubbleUp()
    {
<<<<<<< HEAD
        $transport = $this->_createTransport();
        $evt = $this->_createTransportExceptionEvent();
        $logger = $this->_createLogger();
=======
        $transport = $this->createTransport();
        $evt = $this->createTransportExceptionEvent();
        $logger = $this->createLogger();
>>>>>>> dev
        $logger->expects($this->once())
               ->method('add')
               ->with($this->anything());

<<<<<<< HEAD
        $plugin = $this->_createPlugin($logger);
=======
        $plugin = $this->createPlugin($logger);
>>>>>>> dev
        try {
            $plugin->exceptionThrown($evt);
            $this->fail('Exception should bubble up.');
        } catch (Swift_TransportException $ex) {
        }
    }

<<<<<<< HEAD
    private function _createLogger()
=======
    private function createLogger()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_Plugins_Logger')->getMock();
    }

<<<<<<< HEAD
    private function _createPlugin($logger)
=======
    private function createPlugin($logger)
>>>>>>> dev
    {
        return new Swift_Plugins_LoggerPlugin($logger);
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
    private function _createTransport()
=======
    private function createTransport()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_Transport')->getMock();
    }

<<<<<<< HEAD
    private function _createTransportChangeEvent()
=======
    private function createTransportChangeEvent()
>>>>>>> dev
    {
        $evt = $this->getMockBuilder('Swift_Events_TransportChangeEvent')
                    ->disableOriginalConstructor()
                    ->getMock();
        $evt->expects($this->any())
            ->method('getSource')
<<<<<<< HEAD
            ->will($this->returnValue($this->_createTransport()));
=======
            ->will($this->returnValue($this->createTransport()));
>>>>>>> dev

        return $evt;
    }

<<<<<<< HEAD
    public function _createTransportExceptionEvent()
=======
    public function createTransportExceptionEvent()
>>>>>>> dev
    {
        $evt = $this->getMockBuilder('Swift_Events_TransportExceptionEvent')
                    ->disableOriginalConstructor()
                    ->getMock();
        $evt->expects($this->any())
            ->method('getException')
            ->will($this->returnValue(new Swift_TransportException('')));

        return $evt;
    }
}
