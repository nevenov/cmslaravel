<?php

<<<<<<< HEAD
=======

>>>>>>> dev
class Swift_Mime_SimpleMessageTest extends Swift_Mime_MimePartTest
{
    public function testNestingLevelIsSubpart()
    {
<<<<<<< HEAD
        //Overridden
=======
        // not relevant
        $this->addToAssertionCount(1);
>>>>>>> dev
    }

    public function testNestingLevelIsTop()
    {
<<<<<<< HEAD
        $message = $this->_createMessage($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(
            Swift_Mime_MimeEntity::LEVEL_TOP, $message->getNestingLevel()
=======
        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(
            Swift_Mime_SimpleMimeEntity::LEVEL_TOP, $message->getNestingLevel()
>>>>>>> dev
            );
    }

    public function testDateIsReturnedFromHeader()
    {
<<<<<<< HEAD
        $date = $this->_createHeader('Date', 123);
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Date' => $date)),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(123, $message->getDate());
=======
        $dateTime = new DateTimeImmutable();

        $date = $this->createHeader('Date', $dateTime);
        $message = $this->createMessage(
            $this->createHeaderSet(['Date' => $date]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals($dateTime, $message->getDate());
>>>>>>> dev
    }

    public function testDateIsSetInHeader()
    {
<<<<<<< HEAD
        $date = $this->_createHeader('Date', 123, array(), false);
        $date->shouldReceive('setFieldBodyModel')
             ->once()
             ->with(1234);
        $date->shouldReceive('setFieldBodyModel')
             ->zeroOrMoreTimes();

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Date' => $date)),
            $this->_createEncoder(), $this->_createCache()
            );
        $message->setDate(1234);
=======
        $dateTime = new DateTimeImmutable();

        $date = $this->createHeader('Date', new DateTimeImmutable(), [], false);
        $date->shouldReceive('setFieldBodyModel')
             ->once()
             ->with($dateTime);
        $date->shouldReceive('setFieldBodyModel')
             ->zeroOrMoreTimes();

        $message = $this->createMessage(
            $this->createHeaderSet(['Date' => $date]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setDate($dateTime);
>>>>>>> dev
    }

    public function testDateHeaderIsCreatedIfNonePresent()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $headers->shouldReceive('addDateHeader')
                ->once()
                ->with('Date', 1234);
        $headers->shouldReceive('addDateHeader')
                ->zeroOrMoreTimes();

        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
            );
        $message->setDate(1234);
=======
        $dateTime = new DateTimeImmutable();

        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addDateHeader')
                ->once()
                ->with('Date', $dateTime);
        $headers->shouldReceive('addDateHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
            );
        $message->setDate($dateTime);
>>>>>>> dev
    }

    public function testDateHeaderIsAddedDuringConstruction()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $headers->shouldReceive('addDateHeader')
                ->once()
                ->with('Date', '/^[0-9]+$/D');

        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addDateHeader')
                ->once()
                ->with('Date', Mockery::type('DateTimeImmutable'));

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
    }

    public function testIdIsReturnedFromHeader()
    {
        /* -- RFC 2045, 7.
        In constructing a high-level user agent, it may be desirable to allow
        one body to make reference to another.  Accordingly, bodies may be
        labelled using the "Content-ID" header field, which is syntactically
        identical to the "Message-ID" header field
        */

<<<<<<< HEAD
        $messageId = $this->_createHeader('Message-ID', 'a@b');
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Message-ID' => $messageId)),
            $this->_createEncoder(), $this->_createCache()
=======
        $messageId = $this->createHeader('Message-ID', 'a@b');
        $message = $this->createMessage(
            $this->createHeaderSet(['Message-ID' => $messageId]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('a@b', $message->getId());
    }

    public function testIdIsSetInHeader()
    {
<<<<<<< HEAD
        $messageId = $this->_createHeader('Message-ID', 'a@b', array(), false);
=======
        $messageId = $this->createHeader('Message-ID', 'a@b', [], false);
>>>>>>> dev
        $messageId->shouldReceive('setFieldBodyModel')
                  ->once()
                  ->with('x@y');
        $messageId->shouldReceive('setFieldBodyModel')
                  ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Message-ID' => $messageId)),
            $this->_createEncoder(), $this->_createCache()
=======
        $message = $this->createMessage(
            $this->createHeaderSet(['Message-ID' => $messageId]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->setId('x@y');
    }

    public function testIdIsAutoGenerated()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addIdHeader')
                ->once()
                ->with('Message-ID', '/^.*?@.*?$/D');

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
    }

    public function testSubjectIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.5.
     */

<<<<<<< HEAD
        $subject = $this->_createHeader('Subject', 'example subject');
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Subject' => $subject)),
            $this->_createEncoder(), $this->_createCache()
=======
        $subject = $this->createHeader('Subject', 'example subject');
        $message = $this->createMessage(
            $this->createHeaderSet(['Subject' => $subject]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('example subject', $message->getSubject());
    }

    public function testSubjectIsSetInHeader()
    {
<<<<<<< HEAD
        $subject = $this->_createHeader('Subject', '', array(), false);
=======
        $subject = $this->createHeader('Subject', '', [], false);
>>>>>>> dev
        $subject->shouldReceive('setFieldBodyModel')
                ->once()
                ->with('foo');

<<<<<<< HEAD
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Subject' => $subject)),
            $this->_createEncoder(), $this->_createCache()
=======
        $message = $this->createMessage(
            $this->createHeaderSet(['Subject' => $subject]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->setSubject('foo');
    }

    public function testSubjectHeaderIsCreatedIfNotPresent()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addTextHeader')
                ->once()
                ->with('Subject', 'example subject');
        $headers->shouldReceive('addTextHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setSubject('example subject');
    }

    public function testReturnPathIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.7.
     */

<<<<<<< HEAD
        $path = $this->_createHeader('Return-Path', 'bounces@domain');
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Return-Path' => $path)),
            $this->_createEncoder(), $this->_createCache()
=======
        $path = $this->createHeader('Return-Path', 'bounces@domain');
        $message = $this->createMessage(
            $this->createHeaderSet(['Return-Path' => $path]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals('bounces@domain', $message->getReturnPath());
    }

    public function testReturnPathIsSetInHeader()
    {
<<<<<<< HEAD
        $path = $this->_createHeader('Return-Path', '', array(), false);
=======
        $path = $this->createHeader('Return-Path', '', [], false);
>>>>>>> dev
        $path->shouldReceive('setFieldBodyModel')
             ->once()
             ->with('bounces@domain');

<<<<<<< HEAD
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Return-Path' => $path)),
            $this->_createEncoder(), $this->_createCache()
=======
        $message = $this->createMessage(
            $this->createHeaderSet(['Return-Path' => $path]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->setReturnPath('bounces@domain');
    }

    public function testReturnPathHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addPathHeader')
                ->once()
                ->with('Return-Path', 'bounces@domain');

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setReturnPath('bounces@domain');
    }

    public function testSenderIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.2.
     */

<<<<<<< HEAD
        $sender = $this->_createHeader('Sender', array('sender@domain' => 'Name'));
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Sender' => $sender)),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(array('sender@domain' => 'Name'), $message->getSender());
=======
        $sender = $this->createHeader('Sender', ['sender@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['Sender' => $sender]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['sender@domain' => 'Name'], $message->getSender());
>>>>>>> dev
    }

    public function testSenderIsSetInHeader()
    {
<<<<<<< HEAD
        $sender = $this->_createHeader('Sender', array('sender@domain' => 'Name'),
            array(), false
            );
        $sender->shouldReceive('setFieldBodyModel')
               ->once()
               ->with(array('other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Sender' => $sender)),
            $this->_createEncoder(), $this->_createCache()
            );
        $message->setSender(array('other@domain' => 'Other'));
=======
        $sender = $this->createHeader('Sender', ['sender@domain' => 'Name'],
            [], false
            );
        $sender->shouldReceive('setFieldBodyModel')
               ->once()
               ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Sender' => $sender]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setSender(['other@domain' => 'Other']);
>>>>>>> dev
    }

    public function testSenderHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Sender', (array) 'sender@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setSender('sender@domain');
    }

    public function testNameCanBeUsedInSenderHeader()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Sender', array('sender@domain' => 'Name'));
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Sender', ['sender@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setSender('sender@domain', 'Name');
    }

    public function testFromIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.2.
     */

<<<<<<< HEAD
        $from = $this->_createHeader('From', array('from@domain' => 'Name'));
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('From' => $from)),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(array('from@domain' => 'Name'), $message->getFrom());
=======
        $from = $this->createHeader('From', ['from@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['From' => $from]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['from@domain' => 'Name'], $message->getFrom());
>>>>>>> dev
    }

    public function testFromIsSetInHeader()
    {
<<<<<<< HEAD
        $from = $this->_createHeader('From', array('from@domain' => 'Name'),
            array(), false
            );
        $from->shouldReceive('setFieldBodyModel')
             ->once()
             ->with(array('other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('From' => $from)),
            $this->_createEncoder(), $this->_createCache()
            );
        $message->setFrom(array('other@domain' => 'Other'));
=======
        $from = $this->createHeader('From', ['from@domain' => 'Name'],
            [], false
            );
        $from->shouldReceive('setFieldBodyModel')
             ->once()
             ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['From' => $from]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setFrom(['other@domain' => 'Other']);
>>>>>>> dev
    }

    public function testFromIsAddedToHeadersDuringAddFrom()
    {
<<<<<<< HEAD
        $from = $this->_createHeader('From', array('from@domain' => 'Name'),
            array(), false
            );
        $from->shouldReceive('setFieldBodyModel')
             ->once()
             ->with(array('from@domain' => 'Name', 'other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('From' => $from)),
            $this->_createEncoder(), $this->_createCache()
=======
        $from = $this->createHeader('From', ['from@domain' => 'Name'],
            [], false
            );
        $from->shouldReceive('setFieldBodyModel')
             ->once()
             ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['From' => $from]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->addFrom('other@domain', 'Other');
    }

    public function testFromHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('From', (array) 'from@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setFrom('from@domain');
    }

    public function testPersonalNameCanBeUsedInFromAddress()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('From', array('from@domain' => 'Name'));
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('From', ['from@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setFrom('from@domain', 'Name');
    }

    public function testReplyToIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.2.
     */

<<<<<<< HEAD
        $reply = $this->_createHeader('Reply-To', array('reply@domain' => 'Name'));
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Reply-To' => $reply)),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(array('reply@domain' => 'Name'), $message->getReplyTo());
=======
        $reply = $this->createHeader('Reply-To', ['reply@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['Reply-To' => $reply]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['reply@domain' => 'Name'], $message->getReplyTo());
>>>>>>> dev
    }

    public function testReplyToIsSetInHeader()
    {
<<<<<<< HEAD
        $reply = $this->_createHeader('Reply-To', array('reply@domain' => 'Name'),
            array(), false
            );
        $reply->shouldReceive('setFieldBodyModel')
              ->once()
              ->with(array('other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Reply-To' => $reply)),
            $this->_createEncoder(), $this->_createCache()
            );
        $message->setReplyTo(array('other@domain' => 'Other'));
=======
        $reply = $this->createHeader('Reply-To', ['reply@domain' => 'Name'],
            [], false
            );
        $reply->shouldReceive('setFieldBodyModel')
              ->once()
              ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Reply-To' => $reply]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setReplyTo(['other@domain' => 'Other']);
>>>>>>> dev
    }

    public function testReplyToIsAddedToHeadersDuringAddReplyTo()
    {
<<<<<<< HEAD
        $replyTo = $this->_createHeader('Reply-To', array('from@domain' => 'Name'),
            array(), false
            );
        $replyTo->shouldReceive('setFieldBodyModel')
                ->once()
                ->with(array('from@domain' => 'Name', 'other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Reply-To' => $replyTo)),
            $this->_createEncoder(), $this->_createCache()
=======
        $replyTo = $this->createHeader('Reply-To', ['from@domain' => 'Name'],
            [], false
            );
        $replyTo->shouldReceive('setFieldBodyModel')
                ->once()
                ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Reply-To' => $replyTo]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->addReplyTo('other@domain', 'Other');
    }

    public function testReplyToHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Reply-To', (array) 'reply@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setReplyTo('reply@domain');
    }

    public function testNameCanBeUsedInReplyTo()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Reply-To', array('reply@domain' => 'Name'));
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Reply-To', ['reply@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setReplyTo('reply@domain', 'Name');
    }

    public function testToIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.3.
     */

<<<<<<< HEAD
        $to = $this->_createHeader('To', array('to@domain' => 'Name'));
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('To' => $to)),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(array('to@domain' => 'Name'), $message->getTo());
=======
        $to = $this->createHeader('To', ['to@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['To' => $to]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['to@domain' => 'Name'], $message->getTo());
>>>>>>> dev
    }

    public function testToIsSetInHeader()
    {
<<<<<<< HEAD
        $to = $this->_createHeader('To', array('to@domain' => 'Name'),
            array(), false
            );
        $to->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(array('other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('To' => $to)),
            $this->_createEncoder(), $this->_createCache()
            );
        $message->setTo(array('other@domain' => 'Other'));
=======
        $to = $this->createHeader('To', ['to@domain' => 'Name'],
            [], false
            );
        $to->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['To' => $to]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setTo(['other@domain' => 'Other']);
>>>>>>> dev
    }

    public function testToIsAddedToHeadersDuringAddTo()
    {
<<<<<<< HEAD
        $to = $this->_createHeader('To', array('from@domain' => 'Name'),
            array(), false
            );
        $to->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(array('from@domain' => 'Name', 'other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('To' => $to)),
            $this->_createEncoder(), $this->_createCache()
=======
        $to = $this->createHeader('To', ['from@domain' => 'Name'],
            [], false
            );
        $to->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['To' => $to]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->addTo('other@domain', 'Other');
    }

    public function testToHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('To', (array) 'to@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setTo('to@domain');
    }

    public function testNameCanBeUsedInToHeader()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('To', array('to@domain' => 'Name'));
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('To', ['to@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setTo('to@domain', 'Name');
    }

    public function testCcIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.3.
     */

<<<<<<< HEAD
        $cc = $this->_createHeader('Cc', array('cc@domain' => 'Name'));
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Cc' => $cc)),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(array('cc@domain' => 'Name'), $message->getCc());
=======
        $cc = $this->createHeader('Cc', ['cc@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['Cc' => $cc]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['cc@domain' => 'Name'], $message->getCc());
>>>>>>> dev
    }

    public function testCcIsSetInHeader()
    {
<<<<<<< HEAD
        $cc = $this->_createHeader('Cc', array('cc@domain' => 'Name'),
            array(), false
            );
        $cc->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(array('other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Cc' => $cc)),
            $this->_createEncoder(), $this->_createCache()
            );
        $message->setCc(array('other@domain' => 'Other'));
=======
        $cc = $this->createHeader('Cc', ['cc@domain' => 'Name'],
            [], false
            );
        $cc->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Cc' => $cc]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setCc(['other@domain' => 'Other']);
>>>>>>> dev
    }

    public function testCcIsAddedToHeadersDuringAddCc()
    {
<<<<<<< HEAD
        $cc = $this->_createHeader('Cc', array('from@domain' => 'Name'),
            array(), false
            );
        $cc->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(array('from@domain' => 'Name', 'other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Cc' => $cc)),
            $this->_createEncoder(), $this->_createCache()
=======
        $cc = $this->createHeader('Cc', ['from@domain' => 'Name'],
            [], false
            );
        $cc->shouldReceive('setFieldBodyModel')
           ->once()
           ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Cc' => $cc]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->addCc('other@domain', 'Other');
    }

    public function testCcHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Cc', (array) 'cc@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setCc('cc@domain');
    }

    public function testNameCanBeUsedInCcHeader()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Cc', array('cc@domain' => 'Name'));
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Cc', ['cc@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setCc('cc@domain', 'Name');
    }

    public function testBccIsReturnedFromHeader()
    {
        /* -- RFC 2822, 3.6.3.
     */

<<<<<<< HEAD
        $bcc = $this->_createHeader('Bcc', array('bcc@domain' => 'Name'));
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Bcc' => $bcc)),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(array('bcc@domain' => 'Name'), $message->getBcc());
=======
        $bcc = $this->createHeader('Bcc', ['bcc@domain' => 'Name']);
        $message = $this->createMessage(
            $this->createHeaderSet(['Bcc' => $bcc]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['bcc@domain' => 'Name'], $message->getBcc());
>>>>>>> dev
    }

    public function testBccIsSetInHeader()
    {
<<<<<<< HEAD
        $bcc = $this->_createHeader('Bcc', array('bcc@domain' => 'Name'),
            array(), false
            );
        $bcc->shouldReceive('setFieldBodyModel')
            ->once()
            ->with(array('other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Bcc' => $bcc)),
            $this->_createEncoder(), $this->_createCache()
            );
        $message->setBcc(array('other@domain' => 'Other'));
=======
        $bcc = $this->createHeader('Bcc', ['bcc@domain' => 'Name'],
            [], false
            );
        $bcc->shouldReceive('setFieldBodyModel')
            ->once()
            ->with(['other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Bcc' => $bcc]),
            $this->createEncoder(), $this->createCache()
            );
        $message->setBcc(['other@domain' => 'Other']);
>>>>>>> dev
    }

    public function testBccIsAddedToHeadersDuringAddBcc()
    {
<<<<<<< HEAD
        $bcc = $this->_createHeader('Bcc', array('from@domain' => 'Name'),
            array(), false
            );
        $bcc->shouldReceive('setFieldBodyModel')
            ->once()
            ->with(array('from@domain' => 'Name', 'other@domain' => 'Other'));

        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Bcc' => $bcc)),
            $this->_createEncoder(), $this->_createCache()
=======
        $bcc = $this->createHeader('Bcc', ['from@domain' => 'Name'],
            [], false
            );
        $bcc->shouldReceive('setFieldBodyModel')
            ->once()
            ->with(['from@domain' => 'Name', 'other@domain' => 'Other']);

        $message = $this->createMessage(
            $this->createHeaderSet(['Bcc' => $bcc]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->addBcc('other@domain', 'Other');
    }

    public function testBccHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Bcc', (array) 'bcc@domain');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setBcc('bcc@domain');
    }

    public function testNameCanBeUsedInBcc()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Bcc', array('bcc@domain' => 'Name'));
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $headers = $this->createHeaderSet([], false);
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Bcc', ['bcc@domain' => 'Name']);
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setBcc('bcc@domain', 'Name');
    }

    public function testPriorityIsReadFromHeader()
    {
<<<<<<< HEAD
        $prio = $this->_createHeader('X-Priority', '2 (High)');
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('X-Priority' => $prio)),
            $this->_createEncoder(), $this->_createCache()
=======
        $prio = $this->createHeader('X-Priority', '2 (High)');
        $message = $this->createMessage(
            $this->createHeaderSet(['X-Priority' => $prio]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertEquals(2, $message->getPriority());
    }

    public function testPriorityIsSetInHeader()
    {
<<<<<<< HEAD
        $prio = $this->_createHeader('X-Priority', '2 (High)', array(), false);
=======
        $prio = $this->createHeader('X-Priority', '2 (High)', [], false);
>>>>>>> dev
        $prio->shouldReceive('setFieldBodyModel')
             ->once()
             ->with('5 (Lowest)');

<<<<<<< HEAD
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('X-Priority' => $prio)),
            $this->_createEncoder(), $this->_createCache()
=======
        $message = $this->createMessage(
            $this->createHeaderSet(['X-Priority' => $prio]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->setPriority($message::PRIORITY_LOWEST);
    }

    public function testPriorityHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addTextHeader')
                ->once()
                ->with('X-Priority', '4 (Low)');
        $headers->shouldReceive('addTextHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setPriority($message::PRIORITY_LOW);
    }

    public function testReadReceiptAddressReadFromHeader()
    {
<<<<<<< HEAD
        $rcpt = $this->_createHeader('Disposition-Notification-To',
            array('chris@swiftmailer.org' => 'Chris')
            );
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Disposition-Notification-To' => $rcpt)),
            $this->_createEncoder(), $this->_createCache()
            );
        $this->assertEquals(array('chris@swiftmailer.org' => 'Chris'),
=======
        $rcpt = $this->createHeader('Disposition-Notification-To',
            ['chris@swiftmailer.org' => 'Chris']
            );
        $message = $this->createMessage(
            $this->createHeaderSet(['Disposition-Notification-To' => $rcpt]),
            $this->createEncoder(), $this->createCache()
            );
        $this->assertEquals(['chris@swiftmailer.org' => 'Chris'],
>>>>>>> dev
            $message->getReadReceiptTo()
            );
    }

    public function testReadReceiptIsSetInHeader()
    {
<<<<<<< HEAD
        $rcpt = $this->_createHeader('Disposition-Notification-To', array(), array(), false);
=======
        $rcpt = $this->createHeader('Disposition-Notification-To', [], [], false);
>>>>>>> dev
        $rcpt->shouldReceive('setFieldBodyModel')
             ->once()
             ->with('mark@swiftmailer.org');

<<<<<<< HEAD
        $message = $this->_createMessage(
            $this->_createHeaderSet(array('Disposition-Notification-To' => $rcpt)),
            $this->_createEncoder(), $this->_createCache()
=======
        $message = $this->createMessage(
            $this->createHeaderSet(['Disposition-Notification-To' => $rcpt]),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $message->setReadReceiptTo('mark@swiftmailer.org');
    }

    public function testReadReceiptHeaderIsAddedIfNoneSet()
    {
<<<<<<< HEAD
        $headers = $this->_createHeaderSet(array(), false);
=======
        $headers = $this->createHeaderSet([], false);
>>>>>>> dev
        $headers->shouldReceive('addMailboxHeader')
                ->once()
                ->with('Disposition-Notification-To', 'mark@swiftmailer.org');
        $headers->shouldReceive('addMailboxHeader')
                ->zeroOrMoreTimes();

<<<<<<< HEAD
        $message = $this->_createMessage($headers, $this->_createEncoder(),
            $this->_createCache()
=======
        $message = $this->createMessage($headers, $this->createEncoder(),
            $this->createCache()
>>>>>>> dev
            );
        $message->setReadReceiptTo('mark@swiftmailer.org');
    }

    public function testChildrenCanBeAttached()
    {
<<<<<<< HEAD
        $child1 = $this->_createChild();
        $child2 = $this->_createChild();

        $message = $this->_createMessage($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $child1 = $this->createChild();
        $child2 = $this->createChild();

        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );

        $message->attach($child1);
        $message->attach($child2);

<<<<<<< HEAD
        $this->assertEquals(array($child1, $child2), $message->getChildren());
=======
        $this->assertEquals([$child1, $child2], $message->getChildren());
>>>>>>> dev
    }

    public function testChildrenCanBeDetached()
    {
<<<<<<< HEAD
        $child1 = $this->_createChild();
        $child2 = $this->_createChild();

        $message = $this->_createMessage($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $child1 = $this->createChild();
        $child2 = $this->createChild();

        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );

        $message->attach($child1);
        $message->attach($child2);

        $message->detach($child1);

<<<<<<< HEAD
        $this->assertEquals(array($child2), $message->getChildren());
=======
        $this->assertEquals([$child2], $message->getChildren());
>>>>>>> dev
    }

    public function testEmbedAttachesChild()
    {
<<<<<<< HEAD
        $child = $this->_createChild();

        $message = $this->_createMessage($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $child = $this->createChild();

        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );

        $message->embed($child);

<<<<<<< HEAD
        $this->assertEquals(array($child), $message->getChildren());
=======
        $this->assertEquals([$child], $message->getChildren());
>>>>>>> dev
    }

    public function testEmbedReturnsValidCid()
    {
<<<<<<< HEAD
        $child = $this->_createChild(Swift_Mime_MimeEntity::LEVEL_RELATED, '',
=======
        $child = $this->createChild(Swift_Mime_SimpleMimeEntity::LEVEL_RELATED, '',
>>>>>>> dev
            false
            );
        $child->shouldReceive('getId')
              ->zeroOrMoreTimes()
              ->andReturn('foo@bar');

<<<<<<< HEAD
        $message = $this->_createMessage($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );

        $this->assertEquals('cid:foo@bar', $message->embed($child));
    }

    public function testFluidInterface()
    {
<<<<<<< HEAD
        $child = $this->_createChild();
        $message = $this->_createMessage($this->_createHeaderSet(),
            $this->_createEncoder(), $this->_createCache()
=======
        $child = $this->createChild();
        $message = $this->createMessage($this->createHeaderSet(),
            $this->createEncoder(), $this->createCache()
>>>>>>> dev
            );
        $this->assertSame($message,
            $message
            ->setContentType('text/plain')
<<<<<<< HEAD
            ->setEncoder($this->_createEncoder())
=======
            ->setEncoder($this->createEncoder())
>>>>>>> dev
            ->setId('foo@bar')
            ->setDescription('my description')
            ->setMaxLineLength(998)
            ->setBody('xx')
            ->setBoundary('xyz')
<<<<<<< HEAD
            ->setChildren(array())
=======
            ->setChildren([])
>>>>>>> dev
            ->setCharset('iso-8859-1')
            ->setFormat('flowed')
            ->setDelSp(false)
            ->setSubject('subj')
<<<<<<< HEAD
            ->setDate(123)
            ->setReturnPath('foo@bar')
            ->setSender('foo@bar')
            ->setFrom(array('x@y' => 'XY'))
            ->setReplyTo(array('ab@cd' => 'ABCD'))
            ->setTo(array('chris@site.tld', 'mark@site.tld'))
            ->setCc('john@somewhere.tld')
            ->setBcc(array('one@site', 'two@site' => 'Two'))
=======
            ->setDate(new DateTimeImmutable())
            ->setReturnPath('foo@bar')
            ->setSender('foo@bar')
            ->setFrom(['x@y' => 'XY'])
            ->setReplyTo(['ab@cd' => 'ABCD'])
            ->setTo(['chris@site.tld', 'mark@site.tld'])
            ->setCc('john@somewhere.tld')
            ->setBcc(['one@site', 'two@site' => 'Two'])
>>>>>>> dev
            ->setPriority($message::PRIORITY_LOW)
            ->setReadReceiptTo('a@b')
            ->attach($child)
            ->detach($child)
            );
    }

    //abstract
<<<<<<< HEAD
    protected function _createEntity($headers, $encoder, $cache)
    {
        return $this->_createMessage($headers, $encoder, $cache);
    }

    protected function _createMimePart($headers, $encoder, $cache)
    {
        return $this->_createMessage($headers, $encoder, $cache);
    }

    private function _createMessage($headers, $encoder, $cache)
    {
        return new Swift_Mime_SimpleMessage($headers, $encoder, $cache, new Swift_Mime_Grammar());
=======
    protected function createEntity($headers, $encoder, $cache)
    {
        return $this->createMessage($headers, $encoder, $cache);
    }

    protected function createMimePart($headers, $encoder, $cache)
    {
        return $this->createMessage($headers, $encoder, $cache);
    }

    private function createMessage($headers, $encoder, $cache)
    {
        $idGenerator = new Swift_Mime_IdGenerator('example.com');

        return new Swift_Mime_SimpleMessage($headers, $encoder, $cache, $idGenerator);
>>>>>>> dev
    }
}
