<?php

class Swift_Bug51Test extends \SwiftMailerTestCase
{
<<<<<<< HEAD
    private $_attachmentFile;
    private $_outputFile;

    protected function setUp()
    {
        $this->_attachmentFile = sys_get_temp_dir().'/attach.rand.bin';
        file_put_contents($this->_attachmentFile, '');

        $this->_outputFile = sys_get_temp_dir().'/attach.out.bin';
        file_put_contents($this->_outputFile, '');
=======
    private $attachmentFile;
    private $outputFile;

    protected function setUp()
    {
        $this->attachmentFile = sys_get_temp_dir().'/attach.rand.bin';
        file_put_contents($this->attachmentFile, '');

        $this->outputFile = sys_get_temp_dir().'/attach.out.bin';
        file_put_contents($this->outputFile, '');
>>>>>>> dev
    }

    protected function tearDown()
    {
<<<<<<< HEAD
        unlink($this->_attachmentFile);
        unlink($this->_outputFile);
=======
        unlink($this->attachmentFile);
        unlink($this->outputFile);
>>>>>>> dev
    }

    public function testAttachmentsDoNotGetTruncatedUsingToByteStream()
    {
        //Run 100 times with 10KB attachments
        for ($i = 0; $i < 10; ++$i) {
<<<<<<< HEAD
            $message = $this->_createMessageWithRandomAttachment(
                10000, $this->_attachmentFile
            );

            file_put_contents($this->_outputFile, '');
            $message->toByteStream(
                new Swift_ByteStream_FileByteStream($this->_outputFile, true)
            );

            $emailSource = file_get_contents($this->_outputFile);

            $this->assertAttachmentFromSourceMatches(
                file_get_contents($this->_attachmentFile),
=======
            $message = $this->createMessageWithRandomAttachment(
                10000, $this->attachmentFile
            );

            file_put_contents($this->outputFile, '');
            $message->toByteStream(
                new Swift_ByteStream_FileByteStream($this->outputFile, true)
            );

            $emailSource = file_get_contents($this->outputFile);

            $this->assertAttachmentFromSourceMatches(
                file_get_contents($this->attachmentFile),
>>>>>>> dev
                $emailSource
            );
        }
    }

    public function testAttachmentsDoNotGetTruncatedUsingToString()
    {
        //Run 100 times with 10KB attachments
        for ($i = 0; $i < 10; ++$i) {
<<<<<<< HEAD
            $message = $this->_createMessageWithRandomAttachment(
                10000, $this->_attachmentFile
=======
            $message = $this->createMessageWithRandomAttachment(
                10000, $this->attachmentFile
>>>>>>> dev
            );

            $emailSource = $message->toString();

            $this->assertAttachmentFromSourceMatches(
<<<<<<< HEAD
                file_get_contents($this->_attachmentFile),
=======
                file_get_contents($this->attachmentFile),
>>>>>>> dev
                $emailSource
            );
        }
    }

    public function assertAttachmentFromSourceMatches($attachmentData, $source)
    {
        $encHeader = 'Content-Transfer-Encoding: base64';
        $base64declaration = strpos($source, $encHeader);

        $attachmentDataStart = strpos($source, "\r\n\r\n", $base64declaration);
        $attachmentDataEnd = strpos($source, "\r\n--", $attachmentDataStart);

        if (false === $attachmentDataEnd) {
            $attachmentBase64 = trim(substr($source, $attachmentDataStart));
        } else {
            $attachmentBase64 = trim(substr(
                $source, $attachmentDataStart,
                $attachmentDataEnd - $attachmentDataStart
            ));
        }

        $this->assertIdenticalBinary($attachmentData, base64_decode($attachmentBase64));
    }

<<<<<<< HEAD
    private function _fillFileWithRandomBytes($byteCount, $file)
=======
    private function fillFileWithRandomBytes($byteCount, $file)
>>>>>>> dev
    {
        // I was going to use dd with if=/dev/random but this way seems more
        // cross platform even if a hella expensive!!

        file_put_contents($file, '');
        $fp = fopen($file, 'wb');
        for ($i = 0; $i < $byteCount; ++$i) {
<<<<<<< HEAD
            $byteVal = rand(0, 255);
=======
            $byteVal = random_int(0, 255);
>>>>>>> dev
            fwrite($fp, pack('i', $byteVal));
        }
        fclose($fp);
    }

<<<<<<< HEAD
    private function _createMessageWithRandomAttachment($size, $attachmentPath)
    {
        $this->_fillFileWithRandomBytes($size, $attachmentPath);

        $message = Swift_Message::newInstance()
=======
    private function createMessageWithRandomAttachment($size, $attachmentPath)
    {
        $this->fillFileWithRandomBytes($size, $attachmentPath);

        $message = (new Swift_Message())
>>>>>>> dev
            ->setSubject('test')
            ->setBody('test')
            ->setFrom('a@b.c')
            ->setTo('d@e.f')
            ->attach(Swift_Attachment::fromPath($attachmentPath))
            ;

        return $message;
    }
}
