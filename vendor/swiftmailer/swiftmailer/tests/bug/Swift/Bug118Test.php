<?php

<<<<<<< HEAD
class Swift_Bug118Test extends \PHPUnit_Framework_TestCase
{
    private $_message;

    protected function setUp()
    {
        $this->_message = new Swift_Message();
=======
class Swift_Bug118Test extends \PHPUnit\Framework\TestCase
{
    private $message;

    protected function setUp()
    {
        $this->message = new Swift_Message();
>>>>>>> dev
    }

    public function testCallingGenerateIdChangesTheMessageId()
    {
<<<<<<< HEAD
        $currentId = $this->_message->getId();
        $this->_message->generateId();
        $newId = $this->_message->getId();
=======
        $currentId = $this->message->getId();
        $this->message->generateId();
        $newId = $this->message->getId();
>>>>>>> dev

        $this->assertNotEquals($currentId, $newId);
    }
}
