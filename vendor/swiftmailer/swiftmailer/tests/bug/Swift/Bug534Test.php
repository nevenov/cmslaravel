<?php

use Mockery as m;

<<<<<<< HEAD
class Swift_Bug534Test extends \PHPUnit_Framework_TestCase
{
    public function testEmbeddedImagesAreEmbedded()
    {
        $message = Swift_Message::newInstance()
=======
class Swift_Bug534Test extends \SwiftMailerTestCase
{
    public function testEmbeddedImagesAreEmbedded()
    {
        $message = (new Swift_Message())
>>>>>>> dev
            ->setFrom('from@example.com')
            ->setTo('to@example.com')
            ->setSubject('test')
        ;
        $cid = $message->embed(Swift_Image::fromPath(__DIR__.'/../../_samples/files/swiftmailer.png'));
        $message->setBody('<img src="'.$cid.'" />', 'text/html');

        $that = $this;
<<<<<<< HEAD
        $messageValidation = function (Swift_Mime_Message $message) use ($that) {
=======
        $messageValidation = function (Swift_Mime_SimpleMessage $message) use ($that) {
>>>>>>> dev
            preg_match('/cid:(.*)"/', $message->toString(), $matches);
            $cid = $matches[1];
            preg_match('/Content-ID: <(.*)>/', $message->toString(), $matches);
            $contentId = $matches[1];
            $that->assertEquals($cid, $contentId, 'cid in body and mime part Content-ID differ');

            return true;
        };

<<<<<<< HEAD
        $failedRecipients = array();
=======
        $failedRecipients = [];
>>>>>>> dev

        $transport = m::mock('Swift_Transport');
        $transport->shouldReceive('isStarted')->andReturn(true);
        $transport->shouldReceive('send')->with(m::on($messageValidation), $failedRecipients)->andReturn(1);

        $memorySpool = new Swift_MemorySpool();
        $memorySpool->queueMessage($message);
        $memorySpool->flushQueue($transport, $failedRecipients);
    }
}
