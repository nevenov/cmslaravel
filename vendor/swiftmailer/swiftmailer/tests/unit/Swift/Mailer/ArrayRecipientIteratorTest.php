<?php

<<<<<<< HEAD
class Swift_Mailer_ArrayRecipientIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testHasNextReturnsFalseForEmptyArray()
    {
        $it = new Swift_Mailer_ArrayRecipientIterator(array());
=======
class Swift_Mailer_ArrayRecipientIteratorTest extends \PHPUnit\Framework\TestCase
{
    public function testHasNextReturnsFalseForEmptyArray()
    {
        $it = new Swift_Mailer_ArrayRecipientIterator([]);
>>>>>>> dev
        $this->assertFalse($it->hasNext());
    }

    public function testHasNextReturnsTrueIfItemsLeft()
    {
<<<<<<< HEAD
        $it = new Swift_Mailer_ArrayRecipientIterator(array('foo@bar' => 'Foo'));
=======
        $it = new Swift_Mailer_ArrayRecipientIterator(['foo@bar' => 'Foo']);
>>>>>>> dev
        $this->assertTrue($it->hasNext());
    }

    public function testReadingToEndOfListCausesHasNextToReturnFalse()
    {
<<<<<<< HEAD
        $it = new Swift_Mailer_ArrayRecipientIterator(array('foo@bar' => 'Foo'));
=======
        $it = new Swift_Mailer_ArrayRecipientIterator(['foo@bar' => 'Foo']);
>>>>>>> dev
        $this->assertTrue($it->hasNext());
        $it->nextRecipient();
        $this->assertFalse($it->hasNext());
    }

    public function testReturnedValueHasPreservedKeyValuePair()
    {
<<<<<<< HEAD
        $it = new Swift_Mailer_ArrayRecipientIterator(array('foo@bar' => 'Foo'));
        $this->assertEquals(array('foo@bar' => 'Foo'), $it->nextRecipient());
=======
        $it = new Swift_Mailer_ArrayRecipientIterator(['foo@bar' => 'Foo']);
        $this->assertEquals(['foo@bar' => 'Foo'], $it->nextRecipient());
>>>>>>> dev
    }

    public function testIteratorMovesNextAfterEachIteration()
    {
<<<<<<< HEAD
        $it = new Swift_Mailer_ArrayRecipientIterator(array(
            'foo@bar' => 'Foo',
            'zip@button' => 'Zip thing',
            'test@test' => null,
            ));
        $this->assertEquals(array('foo@bar' => 'Foo'), $it->nextRecipient());
        $this->assertEquals(array('zip@button' => 'Zip thing'), $it->nextRecipient());
        $this->assertEquals(array('test@test' => null), $it->nextRecipient());
=======
        $it = new Swift_Mailer_ArrayRecipientIterator([
            'foo@bar' => 'Foo',
            'zip@button' => 'Zip thing',
            'test@test' => null,
            ]);
        $this->assertEquals(['foo@bar' => 'Foo'], $it->nextRecipient());
        $this->assertEquals(['zip@button' => 'Zip thing'], $it->nextRecipient());
        $this->assertEquals(['test@test' => null], $it->nextRecipient());
>>>>>>> dev
    }
}
