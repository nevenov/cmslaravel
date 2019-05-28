<?php

class Swift_Plugins_ReporterPluginTest extends \SwiftMailerTestCase
{
    public function testReportingPasses()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $evt = $this->_createSendEvent();
        $reporter = $this->_createReporter();

        $message->shouldReceive('getTo')->zeroOrMoreTimes()->andReturn(array('foo@bar.tld' => 'Foo'));
        $evt->shouldReceive('getMessage')->zeroOrMoreTimes()->andReturn($message);
        $evt->shouldReceive('getFailedRecipients')->zeroOrMoreTimes()->andReturn(array());
=======
        $message = $this->createMessage();
        $evt = $this->createSendEvent();
        $reporter = $this->createReporter();

        $message->shouldReceive('getTo')->zeroOrMoreTimes()->andReturn(['foo@bar.tld' => 'Foo']);
        $evt->shouldReceive('getMessage')->zeroOrMoreTimes()->andReturn($message);
        $evt->shouldReceive('getFailedRecipients')->zeroOrMoreTimes()->andReturn([]);
>>>>>>> dev
        $reporter->shouldReceive('notify')->once()->with($message, 'foo@bar.tld', Swift_Plugins_Reporter::RESULT_PASS);

        $plugin = new Swift_Plugins_ReporterPlugin($reporter);
        $plugin->sendPerformed($evt);
    }

    public function testReportingFailedTo()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $evt = $this->_createSendEvent();
        $reporter = $this->_createReporter();

        $message->shouldReceive('getTo')->zeroOrMoreTimes()->andReturn(array('foo@bar.tld' => 'Foo', 'zip@button' => 'Zip'));
        $evt->shouldReceive('getMessage')->zeroOrMoreTimes()->andReturn($message);
        $evt->shouldReceive('getFailedRecipients')->zeroOrMoreTimes()->andReturn(array('zip@button'));
=======
        $message = $this->createMessage();
        $evt = $this->createSendEvent();
        $reporter = $this->createReporter();

        $message->shouldReceive('getTo')->zeroOrMoreTimes()->andReturn(['foo@bar.tld' => 'Foo', 'zip@button' => 'Zip']);
        $evt->shouldReceive('getMessage')->zeroOrMoreTimes()->andReturn($message);
        $evt->shouldReceive('getFailedRecipients')->zeroOrMoreTimes()->andReturn(['zip@button']);
>>>>>>> dev
        $reporter->shouldReceive('notify')->once()->with($message, 'foo@bar.tld', Swift_Plugins_Reporter::RESULT_PASS);
        $reporter->shouldReceive('notify')->once()->with($message, 'zip@button', Swift_Plugins_Reporter::RESULT_FAIL);

        $plugin = new Swift_Plugins_ReporterPlugin($reporter);
        $plugin->sendPerformed($evt);
    }

    public function testReportingFailedCc()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $evt = $this->_createSendEvent();
        $reporter = $this->_createReporter();

        $message->shouldReceive('getTo')->zeroOrMoreTimes()->andReturn(array('foo@bar.tld' => 'Foo'));
        $message->shouldReceive('getCc')->zeroOrMoreTimes()->andReturn(array('zip@button' => 'Zip', 'test@test.com' => 'Test'));
        $evt->shouldReceive('getMessage')->zeroOrMoreTimes()->andReturn($message);
        $evt->shouldReceive('getFailedRecipients')->zeroOrMoreTimes()->andReturn(array('zip@button'));
=======
        $message = $this->createMessage();
        $evt = $this->createSendEvent();
        $reporter = $this->createReporter();

        $message->shouldReceive('getTo')->zeroOrMoreTimes()->andReturn(['foo@bar.tld' => 'Foo']);
        $message->shouldReceive('getCc')->zeroOrMoreTimes()->andReturn(['zip@button' => 'Zip', 'test@test.com' => 'Test']);
        $evt->shouldReceive('getMessage')->zeroOrMoreTimes()->andReturn($message);
        $evt->shouldReceive('getFailedRecipients')->zeroOrMoreTimes()->andReturn(['zip@button']);
>>>>>>> dev
        $reporter->shouldReceive('notify')->once()->with($message, 'foo@bar.tld', Swift_Plugins_Reporter::RESULT_PASS);
        $reporter->shouldReceive('notify')->once()->with($message, 'zip@button', Swift_Plugins_Reporter::RESULT_FAIL);
        $reporter->shouldReceive('notify')->once()->with($message, 'test@test.com', Swift_Plugins_Reporter::RESULT_PASS);

        $plugin = new Swift_Plugins_ReporterPlugin($reporter);
        $plugin->sendPerformed($evt);
    }

    public function testReportingFailedBcc()
    {
<<<<<<< HEAD
        $message = $this->_createMessage();
        $evt = $this->_createSendEvent();
        $reporter = $this->_createReporter();

        $message->shouldReceive('getTo')->zeroOrMoreTimes()->andReturn(array('foo@bar.tld' => 'Foo'));
        $message->shouldReceive('getBcc')->zeroOrMoreTimes()->andReturn(array('zip@button' => 'Zip', 'test@test.com' => 'Test'));
        $evt->shouldReceive('getMessage')->zeroOrMoreTimes()->andReturn($message);
        $evt->shouldReceive('getFailedRecipients')->zeroOrMoreTimes()->andReturn(array('zip@button'));
=======
        $message = $this->createMessage();
        $evt = $this->createSendEvent();
        $reporter = $this->createReporter();

        $message->shouldReceive('getTo')->zeroOrMoreTimes()->andReturn(['foo@bar.tld' => 'Foo']);
        $message->shouldReceive('getBcc')->zeroOrMoreTimes()->andReturn(['zip@button' => 'Zip', 'test@test.com' => 'Test']);
        $evt->shouldReceive('getMessage')->zeroOrMoreTimes()->andReturn($message);
        $evt->shouldReceive('getFailedRecipients')->zeroOrMoreTimes()->andReturn(['zip@button']);
>>>>>>> dev
        $reporter->shouldReceive('notify')->once()->with($message, 'foo@bar.tld', Swift_Plugins_Reporter::RESULT_PASS);
        $reporter->shouldReceive('notify')->once()->with($message, 'zip@button', Swift_Plugins_Reporter::RESULT_FAIL);
        $reporter->shouldReceive('notify')->once()->with($message, 'test@test.com', Swift_Plugins_Reporter::RESULT_PASS);

        $plugin = new Swift_Plugins_ReporterPlugin($reporter);
        $plugin->sendPerformed($evt);
    }

<<<<<<< HEAD
    private function _createMessage()
    {
        return $this->getMockery('Swift_Mime_Message')->shouldIgnoreMissing();
    }

    private function _createSendEvent()
=======
    private function createMessage()
    {
        return $this->getMockery('Swift_Mime_SimpleMessage')->shouldIgnoreMissing();
    }

    private function createSendEvent()
>>>>>>> dev
    {
        return $this->getMockery('Swift_Events_SendEvent')->shouldIgnoreMissing();
    }

<<<<<<< HEAD
    private function _createReporter()
=======
    private function createReporter()
>>>>>>> dev
    {
        return $this->getMockery('Swift_Plugins_Reporter')->shouldIgnoreMissing();
    }
}
