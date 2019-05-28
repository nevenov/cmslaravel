<?php

<<<<<<< HEAD
class Swift_Plugins_Reporters_HitReporterTest extends \PHPUnit_Framework_TestCase
{
    private $_hitReporter;
    private $_message;

    protected function setUp()
    {
        $this->_hitReporter = new Swift_Plugins_Reporters_HitReporter();
        $this->_message = $this->getMockBuilder('Swift_Mime_Message')->getMock();
=======
class Swift_Plugins_Reporters_HitReporterTest extends \PHPUnit\Framework\TestCase
{
    private $hitReporter;
    private $message;

    protected function setUp()
    {
        $this->hitReporter = new Swift_Plugins_Reporters_HitReporter();
        $this->message = $this->getMockBuilder('Swift_Mime_SimpleMessage')->disableOriginalConstructor()->getMock();
>>>>>>> dev
    }

    public function testReportingFail()
    {
<<<<<<< HEAD
        $this->_hitReporter->notify($this->_message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->assertEquals(array('foo@bar.tld'),
            $this->_hitReporter->getFailedRecipients()
=======
        $this->hitReporter->notify($this->message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->assertEquals(['foo@bar.tld'],
            $this->hitReporter->getFailedRecipients()
>>>>>>> dev
            );
    }

    public function testMultipleReports()
    {
<<<<<<< HEAD
        $this->_hitReporter->notify($this->_message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->_hitReporter->notify($this->_message, 'zip@button',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->assertEquals(array('foo@bar.tld', 'zip@button'),
            $this->_hitReporter->getFailedRecipients()
=======
        $this->hitReporter->notify($this->message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->hitReporter->notify($this->message, 'zip@button',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->assertEquals(['foo@bar.tld', 'zip@button'],
            $this->hitReporter->getFailedRecipients()
>>>>>>> dev
            );
    }

    public function testReportingPassIsIgnored()
    {
<<<<<<< HEAD
        $this->_hitReporter->notify($this->_message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->_hitReporter->notify($this->_message, 'zip@button',
            Swift_Plugins_Reporter::RESULT_PASS
            );
        $this->assertEquals(array('foo@bar.tld'),
            $this->_hitReporter->getFailedRecipients()
=======
        $this->hitReporter->notify($this->message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->hitReporter->notify($this->message, 'zip@button',
            Swift_Plugins_Reporter::RESULT_PASS
            );
        $this->assertEquals(['foo@bar.tld'],
            $this->hitReporter->getFailedRecipients()
>>>>>>> dev
            );
    }

    public function testBufferCanBeCleared()
    {
<<<<<<< HEAD
        $this->_hitReporter->notify($this->_message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->_hitReporter->notify($this->_message, 'zip@button',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->assertEquals(array('foo@bar.tld', 'zip@button'),
            $this->_hitReporter->getFailedRecipients()
            );
        $this->_hitReporter->clear();
        $this->assertEquals(array(), $this->_hitReporter->getFailedRecipients());
=======
        $this->hitReporter->notify($this->message, 'foo@bar.tld',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->hitReporter->notify($this->message, 'zip@button',
            Swift_Plugins_Reporter::RESULT_FAIL
            );
        $this->assertEquals(['foo@bar.tld', 'zip@button'],
            $this->hitReporter->getFailedRecipients()
            );
        $this->hitReporter->clear();
        $this->assertEquals([], $this->hitReporter->getFailedRecipients());
>>>>>>> dev
    }
}
