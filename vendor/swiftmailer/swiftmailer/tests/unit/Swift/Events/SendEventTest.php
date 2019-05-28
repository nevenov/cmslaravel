<?php

<<<<<<< HEAD
class Swift_Events_SendEventTest extends \PHPUnit_Framework_TestCase
{
    public function testMessageCanBeFetchedViaGetter()
    {
        $message = $this->_createMessage();
        $transport = $this->_createTransport();

        $evt = $this->_createEvent($transport, $message);
=======
class Swift_Events_SendEventTest extends \PHPUnit\Framework\TestCase
{
    public function testMessageCanBeFetchedViaGetter()
    {
        $message = $this->createMessage();
        $transport = $this->createTransport();

        $evt = $this->createEvent($transport, $message);
>>>>>>> dev

        $ref = $evt->getMessage();
        $this->assertEquals($message, $ref,
            '%s: Message should be returned from getMessage()'
            );
    }

    public function testTransportCanBeFetchViaGetter()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $transport = $this->_createTransport();

        $evt = $this->_createEvent($transport, $message);
=======
        $message = $this->createMessage();
        $transport = $this->createTransport();

        $evt = $this->createEvent($transport, $message);
>>>>>>> dev

        $ref = $evt->getTransport();
        $this->assertEquals($transport, $ref,
            '%s: Transport should be returned from getTransport()'
            );
    }

    public function testTransportCanBeFetchViaGetSource()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $transport = $this->_createTransport();

        $evt = $this->_createEvent($transport, $message);
=======
        $message = $this->createMessage();
        $transport = $this->createTransport();

        $evt = $this->createEvent($transport, $message);
>>>>>>> dev

        $ref = $evt->getSource();
        $this->assertEquals($transport, $ref,
            '%s: Transport should be returned from getSource()'
            );
    }

    public function testResultCanBeSetAndGet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $transport = $this->_createTransport();

        $evt = $this->_createEvent($transport, $message);
=======
        $message = $this->createMessage();
        $transport = $this->createTransport();

        $evt = $this->createEvent($transport, $message);
>>>>>>> dev

        $evt->setResult(
            Swift_Events_SendEvent::RESULT_SUCCESS | Swift_Events_SendEvent::RESULT_TENTATIVE
            );

        $this->assertTrue((bool) ($evt->getResult() & Swift_Events_SendEvent::RESULT_SUCCESS));
        $this->assertTrue((bool) ($evt->getResult() & Swift_Events_SendEvent::RESULT_TENTATIVE));
    }

    public function testFailedRecipientsCanBeSetAndGet()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $transport = $this->_createTransport();

        $evt = $this->_createEvent($transport, $message);

        $evt->setFailedRecipients(array('foo@bar', 'zip@button'));

        $this->assertEquals(array('foo@bar', 'zip@button'), $evt->getFailedRecipients(),
=======
        $message = $this->createMessage();
        $transport = $this->createTransport();

        $evt = $this->createEvent($transport, $message);

        $evt->setFailedRecipients(['foo@bar', 'zip@button']);

        $this->assertEquals(['foo@bar', 'zip@button'], $evt->getFailedRecipients(),
>>>>>>> dev
            '%s: FailedRecipients should be returned from getter'
            );
    }

    public function testFailedRecipientsGetsPickedUpCorrectly()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $transport = $this->_createTransport();

        $evt = $this->_createEvent($transport, $message);
        $this->assertEquals(array(), $evt->getFailedRecipients());
    }

    private function _createEvent(Swift_Transport $source,
        Swift_Mime_Message $message)
=======
        $message = $this->createMessage();
        $transport = $this->createTransport();

        $evt = $this->createEvent($transport, $message);
        $this->assertEquals([], $evt->getFailedRecipients());
    }

    private function createEvent(Swift_Transport $source, Swift_Mime_SimpleMessage $message)
>>>>>>> dev
    {
        return new Swift_Events_SendEvent($source, $message);
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
    private function _createMessage()
    {
        return $this->getMockBuilder('Swift_Mime_Message')->getMock();
=======
    private function createMessage()
    {
        return $this->getMockBuilder('Swift_Mime_SimpleMessage')->disableOriginalConstructor()->getMock();
>>>>>>> dev
    }
}
