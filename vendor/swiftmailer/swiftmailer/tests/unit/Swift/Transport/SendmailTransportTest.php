<?php

class Swift_Transport_SendmailTransportTest extends Swift_Transport_AbstractSmtpEventSupportTest
{
<<<<<<< HEAD
    protected function _getTransport($buf, $dispatcher = null, $command = '/usr/sbin/sendmail -bs')
    {
        if (!$dispatcher) {
            $dispatcher = $this->_createEventDispatcher();
        }
        $transport = new Swift_Transport_SendmailTransport($buf, $dispatcher);
=======
    protected function getTransport($buf, $dispatcher = null, $addressEncoder = null, $command = '/usr/sbin/sendmail -bs')
    {
        if (!$dispatcher) {
            $dispatcher = $this->createEventDispatcher();
        }
        $transport = new Swift_Transport_SendmailTransport($buf, $dispatcher, 'example.org', $addressEncoder);
>>>>>>> dev
        $transport->setCommand($command);

        return $transport;
    }

<<<<<<< HEAD
    protected function _getSendmail($buf, $dispatcher = null)
    {
        if (!$dispatcher) {
            $dispatcher = $this->_createEventDispatcher();
        }
        $sendmail = new Swift_Transport_SendmailTransport($buf, $dispatcher);

        return $sendmail;
=======
    protected function getSendmail($buf, $dispatcher = null)
    {
        if (!$dispatcher) {
            $dispatcher = $this->createEventDispatcher();
        }

        return new Swift_Transport_SendmailTransport($buf, $dispatcher);
>>>>>>> dev
    }

    public function testCommandCanBeSetAndFetched()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $sendmail = $this->_getSendmail($buf);
=======
        $buf = $this->getBuffer();
        $sendmail = $this->getSendmail($buf);
>>>>>>> dev

        $sendmail->setCommand('/usr/sbin/sendmail -bs');
        $this->assertEquals('/usr/sbin/sendmail -bs', $sendmail->getCommand());
        $sendmail->setCommand('/usr/sbin/sendmail -oi -t');
        $this->assertEquals('/usr/sbin/sendmail -oi -t', $sendmail->getCommand());
    }

    public function testSendingMessageIn_t_ModeUsesSimplePipe()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $sendmail = $this->_getSendmail($buf);
        $message = $this->_createMessage();

        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('foo@bar' => 'Foobar', 'zip@button' => 'Zippy'));
=======
        $buf = $this->getBuffer();
        $sendmail = $this->getSendmail($buf);
        $message = $this->createMessage();

        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['foo@bar' => 'Foobar', 'zip@button' => 'Zippy']);
>>>>>>> dev
        $message->shouldReceive('toByteStream')
                ->once()
                ->with($buf);
        $buf->shouldReceive('initialize')
            ->once();
        $buf->shouldReceive('terminate')
            ->once();
        $buf->shouldReceive('setWriteTranslations')
            ->once()
<<<<<<< HEAD
            ->with(array("\r\n" => "\n", "\n." => "\n.."));
        $buf->shouldReceive('setWriteTranslations')
            ->once()
            ->with(array());
=======
            ->with(["\r\n" => "\n", "\n." => "\n.."]);
        $buf->shouldReceive('setWriteTranslations')
            ->once()
            ->with([]);
>>>>>>> dev

        $sendmail->setCommand('/usr/sbin/sendmail -t');
        $this->assertEquals(2, $sendmail->send($message));
    }

    public function testSendingIn_t_ModeWith_i_FlagDoesntEscapeDot()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $sendmail = $this->_getSendmail($buf);
        $message = $this->_createMessage();

        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('foo@bar' => 'Foobar', 'zip@button' => 'Zippy'));
=======
        $buf = $this->getBuffer();
        $sendmail = $this->getSendmail($buf);
        $message = $this->createMessage();

        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['foo@bar' => 'Foobar', 'zip@button' => 'Zippy']);
>>>>>>> dev
        $message->shouldReceive('toByteStream')
                ->once()
                ->with($buf);
        $buf->shouldReceive('initialize')
            ->once();
        $buf->shouldReceive('terminate')
            ->once();
        $buf->shouldReceive('setWriteTranslations')
            ->once()
<<<<<<< HEAD
            ->with(array("\r\n" => "\n"));
        $buf->shouldReceive('setWriteTranslations')
            ->once()
            ->with(array());
=======
            ->with(["\r\n" => "\n"]);
        $buf->shouldReceive('setWriteTranslations')
            ->once()
            ->with([]);
>>>>>>> dev

        $sendmail->setCommand('/usr/sbin/sendmail -i -t');
        $this->assertEquals(2, $sendmail->send($message));
    }

    public function testSendingInTModeWith_oi_FlagDoesntEscapeDot()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $sendmail = $this->_getSendmail($buf);
        $message = $this->_createMessage();

        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('foo@bar' => 'Foobar', 'zip@button' => 'Zippy'));
=======
        $buf = $this->getBuffer();
        $sendmail = $this->getSendmail($buf);
        $message = $this->createMessage();

        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['foo@bar' => 'Foobar', 'zip@button' => 'Zippy']);
>>>>>>> dev
        $message->shouldReceive('toByteStream')
                ->once()
                ->with($buf);
        $buf->shouldReceive('initialize')
            ->once();
        $buf->shouldReceive('terminate')
            ->once();
        $buf->shouldReceive('setWriteTranslations')
            ->once()
<<<<<<< HEAD
            ->with(array("\r\n" => "\n"));
        $buf->shouldReceive('setWriteTranslations')
            ->once()
            ->with(array());
=======
            ->with(["\r\n" => "\n"]);
        $buf->shouldReceive('setWriteTranslations')
            ->once()
            ->with([]);
>>>>>>> dev

        $sendmail->setCommand('/usr/sbin/sendmail -oi -t');
        $this->assertEquals(2, $sendmail->send($message));
    }

    public function testSendingMessageRegeneratesId()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $sendmail = $this->_getSendmail($buf);
        $message = $this->_createMessage();

        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('foo@bar' => 'Foobar', 'zip@button' => 'Zippy'));
=======
        $buf = $this->getBuffer();
        $sendmail = $this->getSendmail($buf);
        $message = $this->createMessage();

        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['foo@bar' => 'Foobar', 'zip@button' => 'Zippy']);
>>>>>>> dev
        $message->shouldReceive('generateId');
        $buf->shouldReceive('initialize')
            ->once();
        $buf->shouldReceive('terminate')
            ->once();
        $buf->shouldReceive('setWriteTranslations')
            ->once()
<<<<<<< HEAD
            ->with(array("\r\n" => "\n", "\n." => "\n.."));
        $buf->shouldReceive('setWriteTranslations')
            ->once()
            ->with(array());
=======
            ->with(["\r\n" => "\n", "\n." => "\n.."]);
        $buf->shouldReceive('setWriteTranslations')
            ->once()
            ->with([]);
>>>>>>> dev

        $sendmail->setCommand('/usr/sbin/sendmail -t');
        $this->assertEquals(2, $sendmail->send($message));
    }

    public function testFluidInterface()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $sendmail = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $sendmail = $this->getTransport($buf);
>>>>>>> dev

        $ref = $sendmail->setCommand('/foo');
        $this->assertEquals($ref, $sendmail);
    }
}
