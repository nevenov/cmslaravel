<?php

require_once dirname(__DIR__).'/EsmtpTransportTest.php';

interface Swift_Transport_EsmtpHandlerMixin extends Swift_Transport_EsmtpHandler
{
    public function setUsername($user);

    public function setPassword($pass);
}

class Swift_Transport_EsmtpTransport_ExtensionSupportTest extends Swift_Transport_EsmtpTransportTest
{
    public function testExtensionHandlersAreSortedAsNeeded()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $smtp = $this->getTransport($buf);
>>>>>>> dev
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('STARTTLS')
             ->andReturn(1);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext2->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('AUTH')
             ->andReturn(-1);
<<<<<<< HEAD
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2));
        $this->assertEquals(array($ext2, $ext1), $smtp->getExtensionHandlers());
=======
        $this->finishBuffer($buf);

        $smtp->setExtensionHandlers([$ext1, $ext2]);
        $this->assertEquals([$ext2, $ext1], $smtp->getExtensionHandlers());
>>>>>>> dev
    }

    public function testHandlersAreNotifiedOfParams()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $smtp = $this->getTransport($buf);
>>>>>>> dev
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .*?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('setKeywordParams')
             ->once()
<<<<<<< HEAD
             ->with(array('PLAIN', 'LOGIN'));
=======
             ->with(['PLAIN', 'LOGIN']);
>>>>>>> dev
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('setKeywordParams')
             ->zeroOrMoreTimes()
<<<<<<< HEAD
             ->with(array('123456'));
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2));
=======
             ->with(['123456']);
        $this->finishBuffer($buf);

        $smtp->setExtensionHandlers([$ext1, $ext2]);
>>>>>>> dev
        $smtp->start();
    }

    public function testSupportedExtensionHandlersAreRunAfterEhlo()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $smtp = $this->getTransport($buf);
>>>>>>> dev
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .*?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('afterEhlo')
             ->once()
             ->with($smtp);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('afterEhlo')
             ->zeroOrMoreTimes()
             ->with($smtp);
        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('afterEhlo')
             ->never()
             ->with($smtp);
<<<<<<< HEAD
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
=======
        $this->finishBuffer($buf);

        $smtp->setExtensionHandlers([$ext1, $ext2, $ext3]);
>>>>>>> dev
        $smtp->start();
    }

    public function testExtensionsCanModifyMailFromParams()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher();
        $smtp = new Swift_Transport_EsmtpTransport($buf, array(), $dispatcher);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('me@domain' => 'Me'));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('foo@bar' => null));
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher();
        $smtp = new Swift_Transport_EsmtpTransport($buf, [], $dispatcher, 'example.org');
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $message = $this->createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(['me@domain' => 'Me']);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['foo@bar' => null]);
>>>>>>> dev

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .*?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("MAIL FROM:<me@domain> FOO ZIP\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("250 OK\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("RCPT TO:<foo@bar>\r\n")
            ->andReturn(3);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(3)
            ->andReturn("250 OK\r\n");
<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('getMailParams')
             ->once()
             ->andReturn('FOO');
        $ext1->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
<<<<<<< HEAD
             ->with('AUTH')
=======
             ->with('STARTTLS')
             ->andReturn(1);
        $ext1->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('SIZE')
>>>>>>> dev
             ->andReturn(-1);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('getMailParams')
             ->once()
             ->andReturn('ZIP');
        $ext2->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('AUTH')
             ->andReturn(1);
<<<<<<< HEAD
=======
        $ext2->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('STARTTLS')
             ->andReturn(1);
>>>>>>> dev
        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('getMailParams')
             ->never();
<<<<<<< HEAD

        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
=======
        $ext3->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('AUTH')
             ->andReturn(-1);
        $ext3->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('SIZE')
             ->andReturn(-1);

        $smtp->setExtensionHandlers([$ext1, $ext2, $ext3]);
>>>>>>> dev
        $smtp->start();
        $smtp->send($message);
    }

    public function testExtensionsCanModifyRcptParams()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $dispatcher = $this->_createEventDispatcher();
        $smtp = new Swift_Transport_EsmtpTransport($buf, array(), $dispatcher);
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $message = $this->_createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(array('me@domain' => 'Me'));
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(array('foo@bar' => null));
=======
        $buf = $this->getBuffer();
        $dispatcher = $this->createEventDispatcher();
        $smtp = new Swift_Transport_EsmtpTransport($buf, [], $dispatcher, 'example.org');
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $message = $this->createMessage();

        $message->shouldReceive('getFrom')
                ->zeroOrMoreTimes()
                ->andReturn(['me@domain' => 'Me']);
        $message->shouldReceive('getTo')
                ->zeroOrMoreTimes()
                ->andReturn(['foo@bar' => null]);
>>>>>>> dev

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .+?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("MAIL FROM:<me@domain>\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("250 OK\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("RCPT TO:<foo@bar> FOO ZIP\r\n")
            ->andReturn(3);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(3)
            ->andReturn("250 OK\r\n");
<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('getRcptParams')
             ->once()
             ->andReturn('FOO');
        $ext1->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
<<<<<<< HEAD
             ->with('AUTH')
=======
             ->with('STARTTLS')
             ->andReturn(1);
        $ext1->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('SIZE')
>>>>>>> dev
             ->andReturn(-1);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('getRcptParams')
             ->once()
             ->andReturn('ZIP');
        $ext2->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
<<<<<<< HEAD
=======
             ->with('STARTTLS')
             ->andReturn(1);
        $ext2->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
>>>>>>> dev
             ->with('AUTH')
             ->andReturn(1);
        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('getRcptParams')
             ->never();
<<<<<<< HEAD

        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
=======
        $ext3->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('AUTH')
             ->andReturn(-1);
        $ext3->shouldReceive('getPriorityOver')
             ->zeroOrMoreTimes()
             ->with('SIZE')
             ->andReturn(-1);

        $smtp->setExtensionHandlers([$ext1, $ext2, $ext3]);
>>>>>>> dev
        $smtp->start();
        $smtp->send($message);
    }

    public function testExtensionsAreNotifiedOnCommand()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $smtp = $this->getTransport($buf);
>>>>>>> dev
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .+?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with("FOO\r\n")
            ->andReturn(2);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(2)
            ->andReturn("250 Cool\r\n");
<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('onCommand')
             ->once()
<<<<<<< HEAD
             ->with($smtp, "FOO\r\n", array(250, 251), \Mockery::any(), \Mockery::any());
=======
             ->with($smtp, "FOO\r\n", [250, 251], \Mockery::any(), \Mockery::any());
>>>>>>> dev
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('onCommand')
             ->once()
<<<<<<< HEAD
             ->with($smtp, "FOO\r\n", array(250, 251), \Mockery::any(), \Mockery::any());
=======
             ->with($smtp, "FOO\r\n", [250, 251], \Mockery::any(), \Mockery::any());
>>>>>>> dev
        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('onCommand')
             ->never()
             ->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

<<<<<<< HEAD
        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
        $smtp->start();
        $smtp->executeCommand("FOO\r\n", array(250, 251));
=======
        $smtp->setExtensionHandlers([$ext1, $ext2, $ext3]);
        $smtp->start();
        $smtp->executeCommand("FOO\r\n", [250, 251]);
>>>>>>> dev
    }

    public function testChainOfCommandAlgorithmWhenNotifyingExtensions()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $smtp = $this->getTransport($buf);
>>>>>>> dev
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();
        $ext3 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $buf->shouldReceive('readLine')
            ->once()
            ->with(0)
            ->andReturn("220 server.com foo\r\n");
        $buf->shouldReceive('write')
            ->once()
            ->with('~^EHLO .+?\r\n$~D')
            ->andReturn(1);
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-ServerName.tld\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250-AUTH PLAIN LOGIN\r\n");
        $buf->shouldReceive('readLine')
            ->once()
            ->with(1)
            ->andReturn("250 SIZE=123456\r\n");
        $buf->shouldReceive('write')
            ->never()
            ->with("FOO\r\n");
<<<<<<< HEAD
        $this->_finishBuffer($buf);
=======
        $this->finishBuffer($buf);
>>>>>>> dev

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('onCommand')
             ->once()
<<<<<<< HEAD
             ->with($smtp, "FOO\r\n", array(250, 251), \Mockery::any(), \Mockery::any())
=======
             ->with($smtp, "FOO\r\n", [250, 251], \Mockery::any(), \Mockery::any())
>>>>>>> dev
             ->andReturnUsing(function ($a, $b, $c, $d, &$e) {
                 $e = true;

                 return '250 ok';
             });
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('SIZE');
        $ext2->shouldReceive('onCommand')
             ->never()
             ->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

        $ext3->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
        $ext3->shouldReceive('onCommand')
             ->never()
             ->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

<<<<<<< HEAD
        $smtp->setExtensionHandlers(array($ext1, $ext2, $ext3));
        $smtp->start();
        $smtp->executeCommand("FOO\r\n", array(250, 251));
=======
        $smtp->setExtensionHandlers([$ext1, $ext2, $ext3]);
        $smtp->start();
        $smtp->executeCommand("FOO\r\n", [250, 251]);
>>>>>>> dev
    }

    public function testExtensionsCanExposeMixinMethods()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $smtp = $this->getTransport($buf);
>>>>>>> dev
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandlerMixin')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('exposeMixinMethods')
             ->zeroOrMoreTimes()
<<<<<<< HEAD
             ->andReturn(array('setUsername', 'setPassword'));
=======
             ->andReturn(['setUsername', 'setPassword']);
>>>>>>> dev
        $ext1->shouldReceive('setUsername')
             ->once()
             ->with('mick');
        $ext1->shouldReceive('setPassword')
             ->once()
             ->with('pass');
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
<<<<<<< HEAD
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2));
=======
        $this->finishBuffer($buf);

        $smtp->setExtensionHandlers([$ext1, $ext2]);
>>>>>>> dev
        $smtp->setUsername('mick');
        $smtp->setPassword('pass');
    }

    public function testMixinMethodsBeginningWithSetAndNullReturnAreFluid()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $smtp = $this->getTransport($buf);
>>>>>>> dev
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandlerMixin')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('exposeMixinMethods')
             ->zeroOrMoreTimes()
<<<<<<< HEAD
             ->andReturn(array('setUsername', 'setPassword'));
=======
             ->andReturn(['setUsername', 'setPassword']);
>>>>>>> dev
        $ext1->shouldReceive('setUsername')
             ->once()
             ->with('mick')
             ->andReturn(null);
        $ext1->shouldReceive('setPassword')
             ->once()
             ->with('pass')
             ->andReturn(null);
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
<<<<<<< HEAD
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2));
=======
        $this->finishBuffer($buf);

        $smtp->setExtensionHandlers([$ext1, $ext2]);
>>>>>>> dev
        $ret = $smtp->setUsername('mick');
        $this->assertEquals($smtp, $ret);
        $ret = $smtp->setPassword('pass');
        $this->assertEquals($smtp, $ret);
    }

    public function testMixinSetterWhichReturnValuesAreNotFluid()
    {
<<<<<<< HEAD
        $buf = $this->_getBuffer();
        $smtp = $this->_getTransport($buf);
=======
        $buf = $this->getBuffer();
        $smtp = $this->getTransport($buf);
>>>>>>> dev
        $ext1 = $this->getMockery('Swift_Transport_EsmtpHandlerMixin')->shouldIgnoreMissing();
        $ext2 = $this->getMockery('Swift_Transport_EsmtpHandler')->shouldIgnoreMissing();

        $ext1->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('AUTH');
        $ext1->shouldReceive('exposeMixinMethods')
             ->zeroOrMoreTimes()
<<<<<<< HEAD
             ->andReturn(array('setUsername', 'setPassword'));
=======
             ->andReturn(['setUsername', 'setPassword']);
>>>>>>> dev
        $ext1->shouldReceive('setUsername')
             ->once()
             ->with('mick')
             ->andReturn('x');
        $ext1->shouldReceive('setPassword')
             ->once()
             ->with('pass')
             ->andReturn('x');
        $ext2->shouldReceive('getHandledKeyword')
             ->zeroOrMoreTimes()
             ->andReturn('STARTTLS');
<<<<<<< HEAD
        $this->_finishBuffer($buf);

        $smtp->setExtensionHandlers(array($ext1, $ext2));
=======
        $this->finishBuffer($buf);

        $smtp->setExtensionHandlers([$ext1, $ext2]);
>>>>>>> dev
        $this->assertEquals('x', $smtp->setUsername('mick'));
        $this->assertEquals('x', $smtp->setPassword('pass'));
    }
}
