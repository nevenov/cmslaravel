<?php

<<<<<<< HEAD
class Swift_Mime_AttachmentAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    private $_contentEncoder;
    private $_cache;
    private $_grammar;
    private $_headers;

    protected function setUp()
    {
        $this->_cache = new Swift_KeyCache_ArrayKeyCache(
            new Swift_KeyCache_SimpleKeyCacheInputStream()
            );
        $factory = new Swift_CharacterReaderFactory_SimpleCharacterReaderFactory();
        $this->_contentEncoder = new Swift_Mime_ContentEncoder_Base64ContentEncoder();
=======
use Egulias\EmailValidator\EmailValidator;

class Swift_Mime_AttachmentAcceptanceTest extends \PHPUnit\Framework\TestCase
{
    private $contentEncoder;
    private $cache;
    private $headers;
    private $emailValidator;

    protected function setUp()
    {
        $this->cache = new Swift_KeyCache_ArrayKeyCache(
            new Swift_KeyCache_SimpleKeyCacheInputStream()
            );
        $factory = new Swift_CharacterReaderFactory_SimpleCharacterReaderFactory();
        $this->contentEncoder = new Swift_Mime_ContentEncoder_Base64ContentEncoder();
>>>>>>> dev

        $headerEncoder = new Swift_Mime_HeaderEncoder_QpHeaderEncoder(
            new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8')
            );
        $paramEncoder = new Swift_Encoder_Rfc2231Encoder(
            new Swift_CharacterStream_ArrayCharacterStream($factory, 'utf-8')
            );
<<<<<<< HEAD
        $this->_grammar = new Swift_Mime_Grammar();
        $this->_headers = new Swift_Mime_SimpleHeaderSet(
            new Swift_Mime_SimpleHeaderFactory($headerEncoder, $paramEncoder, $this->_grammar)
=======
        $this->emailValidator = new EmailValidator();
        $this->idGenerator = new Swift_Mime_IdGenerator('example.com');
        $this->headers = new Swift_Mime_SimpleHeaderSet(
            new Swift_Mime_SimpleHeaderFactory($headerEncoder, $paramEncoder, $this->emailValidator)
>>>>>>> dev
            );
    }

    public function testDispositionIsSetInHeader()
    {
<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setDisposition('inline');
        $this->assertEquals(
            'Content-Type: application/pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: inline'."\r\n",
            $attachment->toString()
            );
    }

    public function testDispositionIsAttachmentByDefault()
    {
<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $this->assertEquals(
            'Content-Type: application/pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment'."\r\n",
            $attachment->toString()
            );
    }

    public function testFilenameIsSetInHeader()
    {
<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setFilename('foo.pdf');
        $this->assertEquals(
            'Content-Type: application/pdf; name=foo.pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.pdf'."\r\n",
            $attachment->toString()
            );
    }

    public function testSizeIsSetInHeader()
    {
<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setSize(12340);
        $this->assertEquals(
            'Content-Type: application/pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; size=12340'."\r\n",
            $attachment->toString()
            );
    }

    public function testMultipleParametersInHeader()
    {
<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setFilename('foo.pdf');
        $attachment->setSize(12340);
        $this->assertEquals(
            'Content-Type: application/pdf; name=foo.pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.pdf; size=12340'."\r\n",
            $attachment->toString()
            );
    }

    public function testEndToEnd()
    {
<<<<<<< HEAD
        $attachment = $this->_createAttachment();
=======
        $attachment = $this->createAttachment();
>>>>>>> dev
        $attachment->setContentType('application/pdf');
        $attachment->setFilename('foo.pdf');
        $attachment->setSize(12340);
        $attachment->setBody('abcd');
        $this->assertEquals(
            'Content-Type: application/pdf; name=foo.pdf'."\r\n".
            'Content-Transfer-Encoding: base64'."\r\n".
            'Content-Disposition: attachment; filename=foo.pdf; size=12340'."\r\n".
            "\r\n".
            base64_encode('abcd'),
            $attachment->toString()
            );
    }

<<<<<<< HEAD
    protected function _createAttachment()
    {
        $entity = new Swift_Mime_Attachment(
            $this->_headers,
            $this->_contentEncoder,
            $this->_cache,
            $this->_grammar
=======
    protected function createAttachment()
    {
        $entity = new Swift_Mime_Attachment(
            $this->headers,
            $this->contentEncoder,
            $this->cache,
            $this->idGenerator
>>>>>>> dev
            );

        return $entity;
    }
}
