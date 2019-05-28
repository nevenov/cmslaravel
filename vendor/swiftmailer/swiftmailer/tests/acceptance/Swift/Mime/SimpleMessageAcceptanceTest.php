<?php

<<<<<<< HEAD
class Swift_Mime_SimpleMessageAcceptanceTest extends \PHPUnit_Framework_TestCase
=======
class Swift_Mime_SimpleMessageAcceptanceTest extends \PHPUnit\Framework\TestCase
>>>>>>> dev
{
    protected function setUp()
    {
        Swift_Preferences::getInstance()->setCharset(null); //TODO: Test with the charset defined
    }

    public function testBasicHeaders()
    {
        /* -- RFC 2822, 3.6.
     */

<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString(),
            '%s: Only required headers, and non-empty headers should be displayed'
            );
    }

    public function testSubjectIsDisplayedIfSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $message->setSubject('just a test subject');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testDateCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $id = $message->getId();
        $message->setDate(1234);
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.date('r', 1234)."\r\n".
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $id = $message->getId();
        $date = new DateTimeImmutable();
        $message->setDate($date);
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testMessageIdCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $message->setSubject('just a test subject');
        $message->setId('foo@bar');
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <foo@bar>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testContentTypeCanBeChanged()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $message->setSubject('just a test subject');
        $message->setContentType('text/html');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/html'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testCharsetCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $message->setSubject('just a test subject');
        $message->setContentType('text/html');
        $message->setCharset('iso-8859-1');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/html; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testFormatCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $message->setSubject('just a test subject');
        $message->setFormat('flowed');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain; format=flowed'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testEncoderCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $message->setSubject('just a test subject');
        $message->setContentType('text/html');
        $message->setEncoder(
            new Swift_Mime_ContentEncoder_PlainContentEncoder('7bit')
            );
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/html'."\r\n".
            'Content-Transfer-Encoding: 7bit'."\r\n",
            $message->toString()
            );
    }

    public function testFromAddressCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $message->setSubject('just a test subject');
        $message->setFrom('chris.corbyn@swiftmailer.org');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: chris.corbyn@swiftmailer.org'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testFromAddressCanBeSetWithName()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris Corbyn'));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris Corbyn']);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testMultipleFromAddressesCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org',
            ));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn',
            'mark@swiftmailer.org',
            ]);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>, mark@swiftmailer.org'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testReturnPathAddressCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testEmptyReturnPathHeaderCanBeUsed()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Return-Path: <>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testSenderCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
=======
        $message = $this->createMessage();
>>>>>>> dev
        $message->setSubject('just a test subject');
        $message->setSender('chris.corbyn@swiftmailer.org');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Sender: chris.corbyn@swiftmailer.org'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testSenderCanBeSetWithName()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setSender(array('chris.corbyn@swiftmailer.org' => 'Chris'));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setSender(['chris.corbyn@swiftmailer.org' => 'Chris']);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Sender: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: '."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testReplyToCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris'));
        $message->setReplyTo(array('chris@w3style.co.uk' => 'Myself'));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris']);
        $message->setReplyTo(['chris@w3style.co.uk' => 'Myself']);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Reply-To: Myself <chris@w3style.co.uk>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testMultipleReplyAddressCanBeUsed()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris'));
        $message->setReplyTo(array(
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris']);
        $message->setReplyTo([
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ]);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Reply-To: Myself <chris@w3style.co.uk>, Me <my.other@address.com>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testToAddressCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris'));
        $message->setReplyTo(array(
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris']);
        $message->setReplyTo([
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ]);
>>>>>>> dev
        $message->setTo('mark@swiftmailer.org');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Reply-To: Myself <chris@w3style.co.uk>, Me <my.other@address.com>'."\r\n".
            'To: mark@swiftmailer.org'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testMultipleToAddressesCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris'));
        $message->setReplyTo(array(
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ));
        $message->setTo(array(
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris']);
        $message->setReplyTo([
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ]);
        $message->setTo([
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ]);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Reply-To: Myself <chris@w3style.co.uk>, Me <my.other@address.com>'."\r\n".
            'To: mark@swiftmailer.org, Chris Corbyn <chris@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testCcAddressCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris'));
        $message->setReplyTo(array(
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ));
        $message->setTo(array(
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris']);
        $message->setReplyTo([
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ]);
        $message->setTo([
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ]);
>>>>>>> dev
        $message->setCc('john@some-site.com');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Reply-To: Myself <chris@w3style.co.uk>, Me <my.other@address.com>'."\r\n".
            'To: mark@swiftmailer.org, Chris Corbyn <chris@swiftmailer.org>'."\r\n".
            'Cc: john@some-site.com'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testMultipleCcAddressesCanBeSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris'));
        $message->setReplyTo(array(
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ));
        $message->setTo(array(
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ));
        $message->setCc(array(
            'john@some-site.com' => 'John West',
            'fred@another-site.co.uk' => 'Big Fred',
            ));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris']);
        $message->setReplyTo([
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ]);
        $message->setTo([
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ]);
        $message->setCc([
            'john@some-site.com' => 'John West',
            'fred@another-site.co.uk' => 'Big Fred',
            ]);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Reply-To: Myself <chris@w3style.co.uk>, Me <my.other@address.com>'."\r\n".
            'To: mark@swiftmailer.org, Chris Corbyn <chris@swiftmailer.org>'."\r\n".
            'Cc: John West <john@some-site.com>, Big Fred <fred@another-site.co.uk>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testBccAddressCanBeSet()
    {
        //Obviously Transports need to setBcc(array()) and send to each Bcc recipient
        // separately in accordance with RFC 2822/2821
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris'));
        $message->setReplyTo(array(
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ));
        $message->setTo(array(
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ));
        $message->setCc(array(
            'john@some-site.com' => 'John West',
            'fred@another-site.co.uk' => 'Big Fred',
            ));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris']);
        $message->setReplyTo([
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ]);
        $message->setTo([
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ]);
        $message->setCc([
            'john@some-site.com' => 'John West',
            'fred@another-site.co.uk' => 'Big Fred',
            ]);
>>>>>>> dev
        $message->setBcc('x@alphabet.tld');
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Reply-To: Myself <chris@w3style.co.uk>, Me <my.other@address.com>'."\r\n".
            'To: mark@swiftmailer.org, Chris Corbyn <chris@swiftmailer.org>'."\r\n".
            'Cc: John West <john@some-site.com>, Big Fred <fred@another-site.co.uk>'."\r\n".
            'Bcc: x@alphabet.tld'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testMultipleBccAddressesCanBeSet()
    {
        //Obviously Transports need to setBcc(array()) and send to each Bcc recipient
        // separately in accordance with RFC 2822/2821
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(array('chris.corbyn@swiftmailer.org' => 'Chris'));
        $message->setReplyTo(array(
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ));
        $message->setTo(array(
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ));
        $message->setCc(array(
            'john@some-site.com' => 'John West',
            'fred@another-site.co.uk' => 'Big Fred',
            ));
        $message->setBcc(array('x@alphabet.tld', 'a@alphabet.tld' => 'A'));
=======
        $message = $this->createMessage();
        $message->setSubject('just a test subject');
        $message->setFrom(['chris.corbyn@swiftmailer.org' => 'Chris']);
        $message->setReplyTo([
            'chris@w3style.co.uk' => 'Myself',
            'my.other@address.com' => 'Me',
            ]);
        $message->setTo([
            'mark@swiftmailer.org', 'chris@swiftmailer.org' => 'Chris Corbyn',
            ]);
        $message->setCc([
            'john@some-site.com' => 'John West',
            'fred@another-site.co.uk' => 'Big Fred',
            ]);
        $message->setBcc(['x@alphabet.tld', 'a@alphabet.tld' => 'A']);
>>>>>>> dev
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris <chris.corbyn@swiftmailer.org>'."\r\n".
            'Reply-To: Myself <chris@w3style.co.uk>, Me <my.other@address.com>'."\r\n".
            'To: mark@swiftmailer.org, Chris Corbyn <chris@swiftmailer.org>'."\r\n".
            'Cc: John West <john@some-site.com>, Big Fred <fred@another-site.co.uk>'."\r\n".
            'Bcc: x@alphabet.tld, A <a@alphabet.tld>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString()
            );
    }

    public function testStringBodyIsAppended()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev
        $message->setBody(
            'just a test body'."\r\n".
            'with a new line'
            );
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'just a test body'."\r\n".
            'with a new line',
            $message->toString()
            );
    }

    public function testStringBodyIsEncoded()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev
        $message->setBody(
            'Just s'.pack('C*', 0xC2, 0x01, 0x01).'me multi-'."\r\n".
            'line message!'
            );
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'Just s=C2=01=01me multi-'."\r\n".
            'line message!',
            $message->toString()
            );
    }

    public function testChildrenCanBeAttached()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev

        $id = $message->getId();
        $date = $message->getDate();
        $boundary = $message->getBoundary();

<<<<<<< HEAD
        $part1 = $this->_createMimePart();
=======
        $part1 = $this->createMimePart();
>>>>>>> dev
        $part1->setContentType('text/plain');
        $part1->setCharset('iso-8859-1');
        $part1->setBody('foo');

        $message->attach($part1);

<<<<<<< HEAD
        $part2 = $this->_createMimePart();
=======
        $part2 = $this->createMimePart();
>>>>>>> dev
        $part2->setContentType('text/html');
        $part2->setCharset('iso-8859-1');
        $part2->setBody('test <b>foo</b>');

        $message->attach($part2);

        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/alternative;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/plain; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo'.
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/html; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'test <b>foo</b>'.
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n",
            $message->toString()
            );
    }

    public function testAttachmentsBeingAttached()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));

        $id = $message->getId();
        $date = preg_quote(date('r', $message->getDate()), '~');
        $boundary = $message->getBoundary();

        $part = $this->_createMimePart();
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);

        $id = $message->getId();
        $date = preg_quote($message->getDate()->format('r'), '~');
        $boundary = $message->getBoundary();

        $part = $this->createMimePart();
>>>>>>> dev
        $part->setContentType('text/plain');
        $part->setCharset('iso-8859-1');
        $part->setBody('foo');

        $message->attach($part);

<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setFilename('foo.pdf');
        $attachment->setBody('<pdf data>');

        $message->attach($attachment);

        $this->assertRegExp(
            '~^'.
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.$date."\r\n".
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/mixed;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: multipart/alternative;'."\r\n".
            ' boundary="(.*?)"'."\r\n".
            "\r\n\r\n".
            '--\\1'."\r\n".
            'Content-Type: text/plain; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo'.
            "\r\n\r\n".
            '--\\1--'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: application/pdf; name=foo.pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.pdf'."\r\n".
            "\r\n".
            preg_quote(base64_encode('<pdf data>'), '~').
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n".
            '$~D',
            $message->toString()
            );
    }

    public function testAttachmentsAndEmbeddedFilesBeingAttached()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));

        $id = $message->getId();
        $date = preg_quote(date('r', $message->getDate()), '~');
        $boundary = $message->getBoundary();

        $part = $this->_createMimePart();
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);

        $id = $message->getId();
        $date = preg_quote($message->getDate()->format('r'), '~');
        $boundary = $message->getBoundary();

        $part = $this->createMimePart();
>>>>>>> dev
        $part->setContentType('text/plain');
        $part->setCharset('iso-8859-1');
        $part->setBody('foo');

        $message->attach($part);

<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setFilename('foo.pdf');
        $attachment->setBody('<pdf data>');

        $message->attach($attachment);

<<<<<<< HEAD
        $file = $this->_createEmbeddedFile();
=======
        $file = $this->createEmbeddedFile();
>>>>>>> dev
        $file->setContentType('image/jpeg');
        $file->setFilename('myimage.jpg');
        $file->setBody('<image data>');

        $message->attach($file);

        $cid = $file->getId();

        $this->assertRegExp(
            '~^'.
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.$date."\r\n".
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/mixed;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: multipart/alternative;'."\r\n".
            ' boundary="(.*?)"'."\r\n".
            "\r\n\r\n".
            '--\\1'."\r\n".
            'Content-Type: text/plain; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo'.

            "\r\n\r\n".
            '--\\1'."\r\n".
            'Content-Type: multipart/related;'."\r\n".
            ' boundary="(.*?)"'."\r\n".
            "\r\n\r\n".
            '--\\2'."\r\n".
            'Content-Type: image/jpeg; name=myimage.jpg'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-ID: <'.$cid.'>'."\r\n".
            'Content-Disposition: inline; filename=myimage.jpg'."\r\n".
            "\r\n".
            preg_quote(base64_encode('<image data>'), '~').
            "\r\n\r\n".
            '--\\2--'."\r\n".
            "\r\n\r\n".
            '--\\1--'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: application/pdf; name=foo.pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.pdf'."\r\n".
            "\r\n".
            preg_quote(base64_encode('<pdf data>'), '~').
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n".
            '$~D',
            $message->toString()
            );
    }

    public function testComplexEmbeddingOfContent()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));

        $id = $message->getId();
        $date = preg_quote(date('r', $message->getDate()), '~');
        $boundary = $message->getBoundary();

        $attachment = $this->_createAttachment();
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);

        $id = $message->getId();
        $date = preg_quote($message->getDate()->format('r'), '~');
        $boundary = $message->getBoundary();

        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setFilename('foo.pdf');
        $attachment->setBody('<pdf data>');

        $message->attach($attachment);

<<<<<<< HEAD
        $file = $this->_createEmbeddedFile();
=======
        $file = $this->createEmbeddedFile();
>>>>>>> dev
        $file->setContentType('image/jpeg');
        $file->setFilename('myimage.jpg');
        $file->setBody('<image data>');

<<<<<<< HEAD
        $part = $this->_createMimePart();
=======
        $part = $this->createMimePart();
>>>>>>> dev
        $part->setContentType('text/html');
        $part->setCharset('iso-8859-1');
        $part->setBody('foo <img src="'.$message->embed($file).'" />');

        $message->attach($part);

        $cid = $file->getId();

        $this->assertRegExp(
            '~^'.
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.$date."\r\n".
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/mixed;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: multipart/related;'."\r\n".
            ' boundary="(.*?)"'."\r\n".
            "\r\n\r\n".
            '--\\1'."\r\n".
            'Content-Type: text/html; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo <img src=3D"cid:'.$cid.'" />'.//=3D is just = in QP
            "\r\n\r\n".
            '--\\1'."\r\n".
            'Content-Type: image/jpeg; name=myimage.jpg'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-ID: <'.$cid.'>'."\r\n".
            'Content-Disposition: inline; filename=myimage.jpg'."\r\n".
            "\r\n".
            preg_quote(base64_encode('<image data>'), '~').
            "\r\n\r\n".
            '--\\1--'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: application/pdf; name=foo.pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.pdf'."\r\n".
            "\r\n".
            preg_quote(base64_encode('<pdf data>'), '~').
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n".
            '$~D',
            $message->toString()
            );
    }

    public function testAttachingAndDetachingContent()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));

        $id = $message->getId();
        $date = preg_quote(date('r', $message->getDate()), '~');
        $boundary = $message->getBoundary();

        $part = $this->_createMimePart();
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);

        $id = $message->getId();
        $date = preg_quote($message->getDate()->format('r'), '~');
        $boundary = $message->getBoundary();

        $part = $this->createMimePart();
>>>>>>> dev
        $part->setContentType('text/plain');
        $part->setCharset('iso-8859-1');
        $part->setBody('foo');

        $message->attach($part);

<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setFilename('foo.pdf');
        $attachment->setBody('<pdf data>');

        $message->attach($attachment);

<<<<<<< HEAD
        $file = $this->_createEmbeddedFile();
=======
        $file = $this->createEmbeddedFile();
>>>>>>> dev
        $file->setContentType('image/jpeg');
        $file->setFilename('myimage.jpg');
        $file->setBody('<image data>');

        $message->attach($file);

        $cid = $file->getId();

        $message->detach($attachment);

        $this->assertRegExp(
            '~^'.
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.$date."\r\n".
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/alternative;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/plain; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo'.
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: multipart/related;'."\r\n".
            ' boundary="(.*?)"'."\r\n".
            "\r\n\r\n".
            '--\\1'."\r\n".
            'Content-Type: image/jpeg; name=myimage.jpg'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-ID: <'.$cid.'>'."\r\n".
            'Content-Disposition: inline; filename=myimage.jpg'."\r\n".
            "\r\n".
            preg_quote(base64_encode('<image data>'), '~').
            "\r\n\r\n".
            '--\\1--'."\r\n".
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n".
            '$~D',
            $message->toString(),
            '%s: Attachment should have been detached'
            );
    }

    public function testBoundaryDoesNotAppearAfterAllPartsAreDetached()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev

        $id = $message->getId();
        $date = $message->getDate();
        $boundary = $message->getBoundary();

<<<<<<< HEAD
        $part1 = $this->_createMimePart();
=======
        $part1 = $this->createMimePart();
>>>>>>> dev
        $part1->setContentType('text/plain');
        $part1->setCharset('iso-8859-1');
        $part1->setBody('foo');

        $message->attach($part1);

<<<<<<< HEAD
        $part2 = $this->_createMimePart();
=======
        $part2 = $this->createMimePart();
>>>>>>> dev
        $part2->setContentType('text/html');
        $part2->setCharset('iso-8859-1');
        $part2->setBody('test <b>foo</b>');

        $message->attach($part2);

        $message->detach($part1);
        $message->detach($part2);

        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n",
            $message->toString(),
            '%s: Message should be restored to orignal state after parts are detached'
            );
    }

    public function testCharsetFormatOrDelSpAreNotShownWhenBoundaryIsSet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev
        $message->setCharset('utf-8');
        $message->setFormat('flowed');
        $message->setDelSp(true);

        $id = $message->getId();
        $date = $message->getDate();
        $boundary = $message->getBoundary();

<<<<<<< HEAD
        $part1 = $this->_createMimePart();
=======
        $part1 = $this->createMimePart();
>>>>>>> dev
        $part1->setContentType('text/plain');
        $part1->setCharset('iso-8859-1');
        $part1->setBody('foo');

        $message->attach($part1);

<<<<<<< HEAD
        $part2 = $this->_createMimePart();
=======
        $part2 = $this->createMimePart();
>>>>>>> dev
        $part2->setContentType('text/html');
        $part2->setCharset('iso-8859-1');
        $part2->setBody('test <b>foo</b>');

        $message->attach($part2);

        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/alternative;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/plain; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo'.
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/html; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'test <b>foo</b>'.
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n",
            $message->toString()
            );
    }

    public function testBodyCanBeSetWithAttachments()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev
        $message->setContentType('text/html');
        $message->setCharset('iso-8859-1');
        $message->setBody('foo');

        $id = $message->getId();
<<<<<<< HEAD
        $date = date('r', $message->getDate());
        $boundary = $message->getBoundary();

        $attachment = $this->_createAttachment();
=======
        $date = $message->getDate()->format('r');
        $boundary = $message->getBoundary();

        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setFilename('foo.pdf');
        $attachment->setBody('<pdf data>');

        $message->attach($attachment);

        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.$date."\r\n".
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/mixed;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/html; charset=iso-8859-1'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo'.
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: application/pdf; name=foo.pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.pdf'."\r\n".
            "\r\n".
            base64_encode('<pdf data>').
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n",
            $message->toString()
            );
    }

    public function testHtmlPartAlwaysAppearsLast()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));

        $id = $message->getId();
        $date = date('r', $message->getDate());
        $boundary = $message->getBoundary();

        $part1 = $this->_createMimePart();
        $part1->setContentType('text/html');
        $part1->setBody('foo');

        $part2 = $this->_createMimePart();
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);

        $id = $message->getId();
        $date = $message->getDate()->format('r');
        $boundary = $message->getBoundary();

        $part1 = $this->createMimePart();
        $part1->setContentType('text/html');
        $part1->setBody('foo');

        $part2 = $this->createMimePart();
>>>>>>> dev
        $part2->setContentType('text/plain');
        $part2->setBody('bar');

        $message->attach($part1);
        $message->attach($part2);

        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.$date."\r\n".
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/alternative;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'bar'.
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/html'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo'.
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n",
            $message->toString()
            );
    }

    public function testBodyBecomesPartIfOtherPartsAttached()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev
        $message->setContentType('text/html');
        $message->setBody('foo');

        $id = $message->getId();
<<<<<<< HEAD
        $date = date('r', $message->getDate());
        $boundary = $message->getBoundary();

        $part2 = $this->_createMimePart();
=======
        $date = $message->getDate()->format('r');
        $boundary = $message->getBoundary();

        $part2 = $this->createMimePart();
>>>>>>> dev
        $part2->setContentType('text/plain');
        $part2->setBody('bar');

        $message->attach($part2);

        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
            'Date: '.$date."\r\n".
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: multipart/alternative;'."\r\n".
            ' boundary="'.$boundary.'"'."\r\n".
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'bar'.
            "\r\n\r\n".
            '--'.$boundary."\r\n".
            'Content-Type: text/html'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'foo'.
            "\r\n\r\n".
            '--'.$boundary.'--'."\r\n",
            $message->toString()
            );
    }

    public function testBodyIsCanonicalized()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom(array(
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ));
=======
        $message = $this->createMessage();
        $message->setReturnPath('chris@w3style.co.uk');
        $message->setSubject('just a test subject');
        $message->setFrom([
            'chris.corbyn@swiftmailer.org' => 'Chris Corbyn', ]);
>>>>>>> dev
        $message->setBody(
            'just a test body'."\n".
            'with a new line'
            );
        $id = $message->getId();
        $date = $message->getDate();
        $this->assertEquals(
            'Return-Path: <chris@w3style.co.uk>'."\r\n".
            'Message-ID: <'.$id.'>'."\r\n".
<<<<<<< HEAD
            'Date: '.date('r', $date)."\r\n".
=======
            'Date: '.$date->format('r')."\r\n".
>>>>>>> dev
            'Subject: just a test subject'."\r\n".
            'From: Chris Corbyn <chris.corbyn@swiftmailer.org>'."\r\n".
            'MIME-Version: 1.0'."\r\n".
            'Content-Type: text/plain'."\r\n".
            'Content-Transfer-Encoding: quoted-printable'."\r\n".
            "\r\n".
            'just a test body'."\r\n".
            'with a new line',
            $message->toString()
            );
    }

<<<<<<< HEAD
    protected function _createMessage()
=======
    protected function createMessage()
>>>>>>> dev
    {
        return new Swift_Message();
    }

<<<<<<< HEAD
    protected function _createMimePart()
=======
    protected function createMimePart()
>>>>>>> dev
    {
        return new Swift_MimePart();
    }

<<<<<<< HEAD
    protected function _createAttachment()
=======
    protected function createAttachment()
>>>>>>> dev
    {
        return new Swift_Attachment();
    }

<<<<<<< HEAD
    protected function _createEmbeddedFile()
=======
    protected function createEmbeddedFile()
>>>>>>> dev
    {
        return new Swift_EmbeddedFile();
    }
}
