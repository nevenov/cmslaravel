<?php

<<<<<<< HEAD
class Swift_Events_EventObjectTest extends \PHPUnit_Framework_TestCase
=======
class Swift_Events_EventObjectTest extends \PHPUnit\Framework\TestCase
>>>>>>> dev
{
    public function testEventSourceCanBeReturnedViaGetter()
    {
        $source = new stdClass();
<<<<<<< HEAD
        $evt = $this->_createEvent($source);
=======
        $evt = $this->createEvent($source);
>>>>>>> dev
        $ref = $evt->getSource();
        $this->assertEquals($source, $ref);
    }

    public function testEventDoesNotHaveCancelledBubbleWhenNew()
    {
        $source = new stdClass();
<<<<<<< HEAD
        $evt = $this->_createEvent($source);
=======
        $evt = $this->createEvent($source);
>>>>>>> dev
        $this->assertFalse($evt->bubbleCancelled());
    }

    public function testBubbleCanBeCancelledInEvent()
    {
        $source = new stdClass();
<<<<<<< HEAD
        $evt = $this->_createEvent($source);
=======
        $evt = $this->createEvent($source);
>>>>>>> dev
        $evt->cancelBubble();
        $this->assertTrue($evt->bubbleCancelled());
    }

<<<<<<< HEAD
    private function _createEvent($source)
=======
    private function createEvent($source)
>>>>>>> dev
    {
        return new Swift_Events_EventObject($source);
    }
}
