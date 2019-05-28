<?php

class Swift_MailerTest extends \SwiftMailerTestCase
{
    public function testTransportIsStartedWhenSending()
    {
<<<<<<< HEAD
        $transport = $this->_createTransport();
        $message = $this->_createMessage();
=======
        $transport = $this->createTransport();
        $message = $this->createMessage();
>>>>>>> dev

        $started = false;
        $transport->shouldReceive('isStarted')
                  ->zeroOrMoreTimes()
                  ->andReturnUsing(function () use (&$started) {
                      return $started;
                  });
        $transport->shouldReceive('start')
                  ->once()
                  ->andReturnUsing(function () use (&$started) {
                      $started = true;

                      return;
                  });

<<<<<<< HEAD
        $mailer = $this->_createMailer($transport);
=======
        $mailer = $this->createMailer($transport);
>>>>>>> dev
        $mailer->send($message);
    }

    public function testTransportIsOnlyStartedOnce()
    {
<<<<<<< HEAD
        $transport = $this->_createTransport();
        $message = $this->_createMessage();
=======
        $transport = $this->createTransport();
        $message = $this->createMessage();
>>>>>>> dev

        $started = false;
        $transport->shouldReceive('isStarted')
                  ->zeroOrMoreTimes()
                  ->andReturnUsing(function () use (&$started) {
                      return $started;
                  });
        $transport->shouldReceive('start')
                  ->once()
                  ->andReturnUsing(function () use (&$started) {
                      $started = true;

                      return;
                  });

<<<<<<< HEAD
        $mailer = $this->_createMailer($transport);
=======
        $mailer = $this->createMailer($transport);
>>>>>>> dev
        for ($i = 0; $i < 10; ++$i) {
            $mailer->send($message);
        }
    }

    public function testMessageIsPassedToTransport()
    {
<<<<<<< HEAD
        $transport = $this->_createTransport();
        $message = $this->_createMessage();
=======
        $transport = $this->createTransport();
        $message = $this->createMessage();
>>>>>>> dev
        $transport->shouldReceive('send')
                  ->once()
                  ->with($message, \Mockery::any());

<<<<<<< HEAD
        $mailer = $this->_createMailer($transport);
=======
        $mailer = $this->createMailer($transport);
>>>>>>> dev
        $mailer->send($message);
    }

    public function testSendReturnsCountFromTransport()
    {
<<<<<<< HEAD
        $transport = $this->_createTransport();
        $message = $this->_createMessage();
=======
        $transport = $this->createTransport();
        $message = $this->createMessage();
>>>>>>> dev
        $transport->shouldReceive('send')
                  ->once()
                  ->with($message, \Mockery::any())
                  ->andReturn(57);

<<<<<<< HEAD
        $mailer = $this->_createMailer($transport);
=======
        $mailer = $this->createMailer($transport);
>>>>>>> dev
        $this->assertEquals(57, $mailer->send($message));
    }

    public function testFailedRecipientReferenceIsPassedToTransport()
    {
<<<<<<< HEAD
        $failures = array();

        $transport = $this->_createTransport();
        $message = $this->_createMessage();
=======
        $failures = [];

        $transport = $this->createTransport();
        $message = $this->createMessage();
>>>>>>> dev
        $transport->shouldReceive('send')
                  ->once()
                  ->with($message, $failures)
                  ->andReturn(57);

<<<<<<< HEAD
        $mailer = $this->_createMailer($transport);
=======
        $mailer = $this->createMailer($transport);
>>>>>>> dev
        $mailer->send($message, $failures);
    }

    public function testSendRecordsRfcComplianceExceptionAsEntireSendFailure()
    {
<<<<<<< HEAD
        $failures = array();

        $rfcException = new Swift_RfcComplianceException('test');
        $transport = $this->_createTransport();
        $message = $this->_createMessage();
        $message->shouldReceive('getTo')
                  ->once()
                  ->andReturn(array('foo&invalid' => 'Foo', 'bar@valid.tld' => 'Bar'));
=======
        $failures = [];

        $rfcException = new Swift_RfcComplianceException('test');
        $transport = $this->createTransport();
        $message = $this->createMessage();
        $message->shouldReceive('getTo')
                  ->once()
                  ->andReturn(['foo&invalid' => 'Foo', 'bar@valid.tld' => 'Bar']);
>>>>>>> dev
        $transport->shouldReceive('send')
                  ->once()
                  ->with($message, $failures)
                  ->andThrow($rfcException);

<<<<<<< HEAD
        $mailer = $this->_createMailer($transport);
        $this->assertEquals(0, $mailer->send($message, $failures), '%s: Should return 0');
        $this->assertEquals(array('foo&invalid', 'bar@valid.tld'), $failures, '%s: Failures should contain all addresses since the entire message failed to compile');
=======
        $mailer = $this->createMailer($transport);
        $this->assertEquals(0, $mailer->send($message, $failures), '%s: Should return 0');
        $this->assertEquals(['foo&invalid', 'bar@valid.tld'], $failures, '%s: Failures should contain all addresses since the entire message failed to compile');
>>>>>>> dev
    }

    public function testRegisterPluginDelegatesToTransport()
    {
<<<<<<< HEAD
        $plugin = $this->_createPlugin();
        $transport = $this->_createTransport();
        $mailer = $this->_createMailer($transport);
=======
        $plugin = $this->createPlugin();
        $transport = $this->createTransport();
        $mailer = $this->createMailer($transport);
>>>>>>> dev

        $transport->shouldReceive('registerPlugin')
                  ->once()
                  ->with($plugin);

        $mailer->registerPlugin($plugin);
    }

<<<<<<< HEAD
    private function _createPlugin()
=======
    private function createPlugin()
>>>>>>> dev
    {
        return $this->getMockery('Swift_Events_EventListener')->shouldIgnoreMissing();
    }

<<<<<<< HEAD
    private function _createTransport()
=======
    private function createTransport()
>>>>>>> dev
    {
        return $this->getMockery('Swift_Transport')->shouldIgnoreMissing();
    }

<<<<<<< HEAD
    private function _createMessage()
    {
        return $this->getMockery('Swift_Mime_Message')->shouldIgnoreMissing();
    }

    private function _createMailer(Swift_Transport $transport)
=======
    private function createMessage()
    {
        return $this->getMockery('Swift_Mime_SimpleMessage')->shouldIgnoreMissing();
    }

    private function createMailer(Swift_Transport $transport)
>>>>>>> dev
    {
        return new Swift_Mailer($transport);
    }
}
