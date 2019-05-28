<?php

<<<<<<< HEAD
class Swift_Bug71Test extends \PHPUnit_Framework_TestCase
{
    private $_message;

    protected function setUp()
    {
        $this->_message = new Swift_Message('test');
=======
class Swift_Bug71Test extends \PHPUnit\Framework\TestCase
{
    private $message;

    protected function setUp()
    {
        $this->message = new Swift_Message('test');
>>>>>>> dev
    }

    public function testCallingToStringAfterSettingNewBodyReflectsChanges()
    {
<<<<<<< HEAD
        $this->_message->setBody('BODY1');
        $this->assertRegExp('/BODY1/', $this->_message->toString());

        $this->_message->setBody('BODY2');
        $this->assertRegExp('/BODY2/', $this->_message->toString());
=======
        $this->message->setBody('BODY1');
        $this->assertRegExp('/BODY1/', $this->message->toString());

        $this->message->setBody('BODY2');
        $this->assertRegExp('/BODY2/', $this->message->toString());
>>>>>>> dev
    }
}
