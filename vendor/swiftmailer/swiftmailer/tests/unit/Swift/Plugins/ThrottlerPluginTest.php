<?php

class Swift_Plugins_ThrottlerPluginTest extends \SwiftMailerTestCase
{
    public function testBytesPerMinuteThrottling()
    {
<<<<<<< HEAD
        $sleeper = $this->_createSleeper();
        $timer = $this->_createTimer();
=======
        $sleeper = $this->createSleeper();
        $timer = $this->createTimer();
>>>>>>> dev

        //10MB/min
        $plugin = new Swift_Plugins_ThrottlerPlugin(
            10000000, Swift_Plugins_ThrottlerPlugin::BYTES_PER_MINUTE,
            $sleeper, $timer
            );

        $timer->shouldReceive('getTimestamp')->once()->andReturn(0);
        $timer->shouldReceive('getTimestamp')->once()->andReturn(1); //expected 0.6
        $timer->shouldReceive('getTimestamp')->once()->andReturn(1); //expected 1.2 (sleep 1)
        $timer->shouldReceive('getTimestamp')->once()->andReturn(2); //expected 1.8
        $timer->shouldReceive('getTimestamp')->once()->andReturn(2); //expected 2.4 (sleep 1)
        $sleeper->shouldReceive('sleep')->twice()->with(1);

        //10,000,000 bytes per minute
        //100,000 bytes per email

        // .: (10,000,000/100,000)/60 emails per second = 1.667 emais/sec

<<<<<<< HEAD
        $message = $this->_createMessageWithByteCount(100000); //100KB

        $evt = $this->_createSendEvent($message);
=======
        $message = $this->createMessageWithByteCount(100000); //100KB

        $evt = $this->createSendEvent($message);
>>>>>>> dev

        for ($i = 0; $i < 5; ++$i) {
            $plugin->beforeSendPerformed($evt);
            $plugin->sendPerformed($evt);
        }
    }

    public function testMessagesPerMinuteThrottling()
    {
<<<<<<< HEAD
        $sleeper = $this->_createSleeper();
        $timer = $this->_createTimer();
=======
        $sleeper = $this->createSleeper();
        $timer = $this->createTimer();
>>>>>>> dev

        //60/min
        $plugin = new Swift_Plugins_ThrottlerPlugin(
            60, Swift_Plugins_ThrottlerPlugin::MESSAGES_PER_MINUTE,
            $sleeper, $timer
            );

        $timer->shouldReceive('getTimestamp')->once()->andReturn(0);
        $timer->shouldReceive('getTimestamp')->once()->andReturn(0); //expected 1 (sleep 1)
        $timer->shouldReceive('getTimestamp')->once()->andReturn(2); //expected 2
        $timer->shouldReceive('getTimestamp')->once()->andReturn(2); //expected 3 (sleep 1)
        $timer->shouldReceive('getTimestamp')->once()->andReturn(4); //expected 4
        $sleeper->shouldReceive('sleep')->twice()->with(1);

        //60 messages per minute
        //1 message per second

<<<<<<< HEAD
        $message = $this->_createMessageWithByteCount(10);

        $evt = $this->_createSendEvent($message);
=======
        $message = $this->createMessageWithByteCount(10);

        $evt = $this->createSendEvent($message);
>>>>>>> dev

        for ($i = 0; $i < 5; ++$i) {
            $plugin->beforeSendPerformed($evt);
            $plugin->sendPerformed($evt);
        }
    }

<<<<<<< HEAD
    private function _createSleeper()
=======
    private function createSleeper()
>>>>>>> dev
    {
        return $this->getMockery('Swift_Plugins_Sleeper');
    }

<<<<<<< HEAD
    private function _createTimer()
=======
    private function createTimer()
>>>>>>> dev
    {
        return $this->getMockery('Swift_Plugins_Timer');
    }

<<<<<<< HEAD
    private function _createMessageWithByteCount($bytes)
    {
        $msg = $this->getMockery('Swift_Mime_Message');
=======
    private function createMessageWithByteCount($bytes)
    {
        $msg = $this->getMockery('Swift_Mime_SimpleMessage');
>>>>>>> dev
        $msg->shouldReceive('toByteStream')
            ->zeroOrMoreTimes()
            ->andReturnUsing(function ($is) use ($bytes) {
                for ($i = 0; $i < $bytes; ++$i) {
                    $is->write('x');
                }
            });

        return $msg;
    }

<<<<<<< HEAD
    private function _createSendEvent($message)
=======
    private function createSendEvent($message)
>>>>>>> dev
    {
        $evt = $this->getMockery('Swift_Events_SendEvent');
        $evt->shouldReceive('getMessage')
            ->zeroOrMoreTimes()
            ->andReturn($message);

        return $evt;
    }
}
