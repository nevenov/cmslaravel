<?php

/**
 * @group smoke
 */
class Swift_Smoke_HtmlWithAttachmentSmokeTest extends SwiftMailerSmokeTestCase
{
<<<<<<< HEAD
    private $_attFile;

    protected function setUp()
    {
        $this->_attFile = __DIR__.'/../../../_samples/files/textfile.zip';
=======
    private $attFile;

    protected function setUp()
    {
        parent::setUp();

        $this->attFile = __DIR__.'/../../../_samples/files/textfile.zip';
>>>>>>> dev
    }

    public function testAttachmentSending()
    {
<<<<<<< HEAD
        $mailer = $this->_getMailer();
        $message = Swift_Message::newInstance('[Swift Mailer] HtmlWithAttachmentSmokeTest')
            ->setFrom(array(SWIFT_SMOKE_EMAIL_ADDRESS => 'Swift Mailer'))
            ->setTo(SWIFT_SMOKE_EMAIL_ADDRESS)
            ->attach(Swift_Attachment::fromPath($this->_attFile))
            ->setBody('<p>This HTML-formatted message should contain an attached ZIP file (named "textfile.zip").'.PHP_EOL.
                'When unzipped, the archive should produce a text file which reads:</p>'.PHP_EOL.
                '<p><q>This is part of a Swift Mailer v4 smoke test.</q></p>', 'text/html'
=======
        $mailer = $this->getMailer();
        $message = (new Swift_Message('[Swift Mailer] HtmlWithAttachmentSmokeTest'))
            ->setFrom([SWIFT_SMOKE_EMAIL_ADDRESS => 'Swift Mailer'])
            ->setTo(SWIFT_SMOKE_EMAIL_ADDRESS)
            ->attach(Swift_Attachment::fromPath($this->attFile))
            ->setBody('<p>This HTML-formatted message should contain an attached ZIP file (named "textfile.zip").'.PHP_EOL.
                'When unzipped, the archive should produce a text file which reads:</p>'.PHP_EOL.
                '<p><q>This is part of a Swift Mailer smoke test.</q></p>', 'text/html'
>>>>>>> dev
            )
            ;
        $this->assertEquals(1, $mailer->send($message),
            '%s: The smoke test should send a single message'
            );
    }
}
