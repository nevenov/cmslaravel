<?php

require_once __DIR__.'/AbstractSmtpTest.php';

abstract class Swift_Transport_AbstractSmtpEventSupportTest extends Swift_Transport_AbstractSmtpTest
{
    public function testRegisterPluginLoadsPluginInEventDispatcher()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $listener = $this->getMockery('Swift_Events_EventListener');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $listener = $this->getMockery('Swift_Events_EventListener');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev
        $dispatcher->shouldReceive('bindEventListener')
                   ->once()
                   ->with($listener);

        $smtp->registerPlugin($listener);
    }

    public function testSendingDispatchesBeforeSendEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $message = $this->_createMessage();
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $message = $this->createMessage();
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
<<<<<<< HEAD
                ->andReturn(array('chris@swiftmailer.org' => null));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('mark@swiftmailer.org' => 'Mark'));
=======
                ->andReturn(['chris@swiftmailer.org' => null]);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['mark@swiftmailer.org' => 'Mark']);
>>>>>>> dev
        $dispatcher->shouldReceive('createSendEvent')
                   ->once()
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'beforeSendPerformed');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->zeroOrMoreTimes()
            ->andReturn(false);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $this->assertEquals(1, $smtp->send($message));
    }

    public function testSendingDispatchesSendEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $message = $this->_createMessage();
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $message = $this->createMessage();
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
<<<<<<< HEAD
                ->andReturn(array('chris@swiftmailer.org' => null));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('mark@swiftmailer.org' => 'Mark'));
=======
                ->andReturn(['chris@swiftmailer.org' => null]);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['mark@swiftmailer.org' => 'Mark']);
>>>>>>> dev
        $dispatcher->shouldReceive('createSendEvent')
                   ->once()
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'sendPerformed');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->zeroOrMoreTimes()
            ->andReturn(false);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $this->assertEquals(1, $smtp->send($message));
    }

    public function testSendEventCapturesFailures()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->_getTransport($buf, $dispatcher);
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('chris@swiftmailer.org' => null));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('mark@swiftmailer.org' => 'Mark'));
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->getTransport($buf, $dispatcher);
        $message = $this->createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(['chris@swiftmailer.org' => null]);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['mark@swiftmailer.org' => 'Mark']);
>>>>>>> dev
        $buf->shouldReceive('write')
            ->once()
            ->with("MAIL FROM:<chris@swiftmailer.org>\r\n")
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 OK\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("RCPT TO:<mark@swiftmailer.org>\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("500 Not now\r\n");
        $dispatcher->shouldReceive('createSendEvent')
                   ->zeroOrMoreTimes()
                   ->with($smtp, \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'sendPerformed');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->zeroOrMoreTimes()
            ->andReturn(false);
        $evt->shouldReceive('setFailedRecipients')
            ->once()
<<<<<<< HEAD
            ->with(array('mark@swiftmailer.org'));

        $this->_finishBuffer($buf);
=======
            ->with(['mark@swiftmailer.org']);

        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $this->assertEquals(0, $smtp->send($message));
    }

    public function testSendEventHasResultFailedIfAllFailures()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->_getTransport($buf, $dispatcher);
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('chris@swiftmailer.org' => null));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('mark@swiftmailer.org' => 'Mark'));
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->getTransport($buf, $dispatcher);
        $message = $this->createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(['chris@swiftmailer.org' => null]);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['mark@swiftmailer.org' => 'Mark']);
>>>>>>> dev
        $buf->shouldReceive('write')
            ->once()
            ->with("MAIL FROM:<chris@swiftmailer.org>\r\n")
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 OK\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("RCPT TO:<mark@swiftmailer.org>\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("500 Not now\r\n");
        $dispatcher->shouldReceive('createSendEvent')
                   ->zeroOrMoreTimes()
                   ->with($smtp, \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'sendPerformed');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->zeroOrMoreTimes()
            ->andReturn(false);
        $evt->shouldReceive('setResult')
            ->once()
            ->with(Swift_Events_SendEvent::RESULT_FAILED);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $this->assertEquals(0, $smtp->send($message));
    }

    public function testSendEventHasResultTentativeIfSomeFailures()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->_getTransport($buf, $dispatcher);
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('chris@swiftmailer.org' => null));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array(
                    'mark@swiftmailer.org' => 'Mark',
                    'chris@site.tld' => 'Chris',
                ));
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->getTransport($buf, $dispatcher);
        $message = $this->createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(['chris@swiftmailer.org' => null]);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn([
                    'mark@swiftmailer.org' => 'Mark',
                    'chris@site.tld' => 'Chris',
                ]);
>>>>>>> dev
        $buf->shouldReceive('write')
            ->once()
            ->with("MAIL FROM:<chris@swiftmailer.org>\r\n")
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 OK\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("RCPT TO:<mark@swiftmailer.org>\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("500 Not now\r\n");
        $dispatcher->shouldReceive('createSendEvent')
                   ->zeroOrMoreTimes()
                   ->with($smtp, \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'sendPerformed');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->zeroOrMoreTimes()
            ->andReturn(false);
        $evt->shouldReceive('setResult')
            ->once()
            ->with(Swift_Events_SendEvent::RESULT_TENTATIVE);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $this->assertEquals(1, $smtp->send($message));
    }

    public function testSendEventHasResultSuccessIfNoFailures()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->_getTransport($buf, $dispatcher);
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('chris@swiftmailer.org' => null));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array(
                    'mark@swiftmailer.org' => 'Mark',
                    'chris@site.tld' => 'Chris',
                ));
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->getTransport($buf, $dispatcher);
        $message = $this->createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(['chris@swiftmailer.org' => null]);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn([
                    'mark@swiftmailer.org' => 'Mark',
                    'chris@site.tld' => 'Chris',
                ]);
>>>>>>> dev
        $dispatcher->shouldReceive('createSendEvent')
                   ->zeroOrMoreTimes()
                   ->with($smtp, \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'sendPerformed');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->zeroOrMoreTimes()
            ->andReturn(false);
        $evt->shouldReceive('setResult')
            ->once()
            ->with(Swift_Events_SendEvent::RESULT_SUCCESS);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $this->assertEquals(2, $smtp->send($message));
    }

    public function testCancellingEventBubbleBeforeSendStopsEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->_getTransport($buf, $dispatcher);
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('chris@swiftmailer.org' => null));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('mark@swiftmailer.org' => 'Mark'));
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
        $smtp = $this->getTransport($buf, $dispatcher);
        $message = $this->createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(['chris@swiftmailer.org' => null]);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['mark@swiftmailer.org' => 'Mark']);
>>>>>>> dev
        $dispatcher->shouldReceive('createSendEvent')
                   ->zeroOrMoreTimes()
                   ->with($smtp, \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'beforeSendPerformed');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->atLeast()->once()
            ->andReturn(true);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $this->assertEquals(0, $smtp->send($message));
    }

    public function testStartingTransportDispatchesTransportChangeEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $dispatcher->shouldReceive('createTransportChangeEvent')
                   ->atLeast()->once()
                   ->with($smtp)
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'transportStarted');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->atLeast()->once()
            ->andReturn(false);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
    }

    public function testStartingTransportDispatchesBeforeTransportChangeEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $dispatcher->shouldReceive('createTransportChangeEvent')
                   ->atLeast()->once()
                   ->with($smtp)
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'beforeTransportStarted');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->atLeast()->once()
            ->andReturn(false);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
    }

    public function testCancellingBubbleBeforeTransportStartStopsEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $dispatcher->shouldReceive('createTransportChangeEvent')
                   ->atLeast()->once()
                   ->with($smtp)
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'beforeTransportStarted');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->atLeast()->once()
            ->andReturn(true);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();

        $this->assertFalse($smtp->isStarted(),
            '%s: Transport should not be started since event bubble was cancelled'
        );
    }

    public function testStoppingTransportDispatchesTransportChangeEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent')->shouldIgnoreMissing();
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent')->shouldIgnoreMissing();
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $dispatcher->shouldReceive('createTransportChangeEvent')
                   ->atLeast()->once()
                   ->with($smtp)
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'transportStopped');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $smtp->stop();
    }

    public function testStoppingTransportDispatchesBeforeTransportChangeEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent')->shouldIgnoreMissing();
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent')->shouldIgnoreMissing();
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $dispatcher->shouldReceive('createTransportChangeEvent')
                   ->atLeast()->once()
                   ->with($smtp)
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'beforeTransportStopped');
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $smtp->stop();
    }

    public function testCancellingBubbleBeforeTransportStoppedStopsEvent()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportChangeEvent');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $hasRun = false;
        $dispatcher->shouldReceive('createTransportChangeEvent')
                   ->atLeast()->once()
                   ->with($smtp)
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'beforeTransportStopped')
                   ->andReturnUsing(function () use (&$hasRun) {
                       $hasRun = true;
                   });
        $dispatcher->shouldReceive('dispatchEvent')
                   ->zeroOrMoreTimes();
        $evt->shouldReceive('bubbleCancelled')
            ->zeroOrMoreTimes()
            ->andReturnUsing(function () use (&$hasRun) {
                return $hasRun;
            });

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
        $smtp->stop();

        $this->assertTrue($smtp->isStarted(),
            '%s: Transport should not be stopped since event bubble was cancelled'
        );
    }

    public function testResponseEventsAreGenerated()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_ResponseEvent');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_ResponseEvent');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $dispatcher->shouldReceive('createResponseEvent')
                   ->atLeast()->once()
                   ->with($smtp, \Mockery::any(), \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->atLeast()->once()
                   ->with($evt, 'responseReceived');

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
    }

    public function testCommandEventsAreGenerated()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_CommandEvent');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_CommandEvent');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $dispatcher->shouldReceive('createCommandEvent')
                   ->once()
                   ->with($smtp, \Mockery::any(), \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'commandSent');

<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev
        $smtp->start();
    }

    public function testExceptionsCauseExceptionEvents()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportExceptionEvent');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportExceptionEvent');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $buf->shouldReceive('readLine')
            ->atLeast()->once()
            ->andReturn("503 I'm sleepy, go away!\r\n");
        $dispatcher->shouldReceive('createTransportExceptionEvent')
                   ->zeroOrMoreTimes()
                   ->with($smtp, \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->once()
                   ->with($evt, 'exceptionThrown');
        $evt->shouldReceive('bubbleCancelled')
            ->atLeast()->once()
            ->andReturn(false);

        try {
            $smtp->start();
            $this->fail('TransportException should be thrown on invalid response');
        } catch (Swift_TransportException $e) {
        }
    }

    public function testExceptionBubblesCanBeCancelled()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportExceptionEvent');
        $smtp = $this->_getTransport($buf, $dispatcher);
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher(false);
        $evt = $this->getMockery('Swift_Events_TransportExceptionEvent');
        $smtp = $this->getTransport($buf, $dispatcher);
>>>>>>> dev

        $buf->shouldReceive('readLine')
            ->atLeast()->once()
            ->andReturn("503 I'm sleepy, go away!\r\n");
        $dispatcher->shouldReceive('createTransportExceptionEvent')
                   ->twice()
                   ->with($smtp, \Mockery::any())
                   ->andReturn($evt);
        $dispatcher->shouldReceive('dispatchEvent')
                   ->twice()
                   ->with($evt, 'exceptionThrown');
        $evt->shouldReceive('bubbleCancelled')
            ->atLeast()->once()
            ->andReturn(true);

<<<<<<< HEAD
        $this->_finishBuffer($buf);
        $smtp->start();
    }

    protected function _createEventDispatcher($stub = true)
=======
        $this->finishBuffer($buf);
        $smtp->start();
    }

    protected function createEventDispatcher($stub = true)
>>>>>>> dev
    {
        return $this->getMockery('Swift_Events_EventDispatcher')->shouldIgnoreMissing();
    }
}
