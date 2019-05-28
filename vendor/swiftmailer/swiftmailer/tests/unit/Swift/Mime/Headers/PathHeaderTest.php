<?php

<<<<<<< HEAD
class Swift_Mime_Headers_PathHeaderTest extends \PHPUnit_Framework_TestCase
{
    public function testTypeIsPathHeader()
    {
        $header = $this->_getHeader('Return-Path');
=======
use Egulias\EmailValidator\EmailValidator;

class Swift_Mime_Headers_PathHeaderTest extends \PHPUnit\Framework\TestCase
{
    public function testTypeIsPathHeader()
    {
        $header = $this->getHeader('Return-Path');
>>>>>>> dev
        $this->assertEquals(Swift_Mime_Header::TYPE_PATH, $header->getFieldType());
    }

    public function testSingleAddressCanBeSetAndFetched()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('Return-Path');
=======
        $header = $this->getHeader('Return-Path');
>>>>>>> dev
        $header->setAddress('chris@swiftmailer.org');
        $this->assertEquals('chris@swiftmailer.org', $header->getAddress());
    }

<<<<<<< HEAD
    public function testAddressMustComplyWithRfc2822()
    {
        try {
            $header = $this->_getHeader('Return-Path');
            $header->setAddress('chr is@swiftmailer.org');
            $this->fail('Addresses not valid according to RFC 2822 addr-spec grammar must be rejected.');
        } catch (Exception $e) {
        }
=======
    /**
     * @expectedException \Exception
     */
    public function testAddressMustComplyWithRfc2822()
    {
        $header = $this->getHeader('Return-Path');
        $header->setAddress('chr is@swiftmailer.org');
>>>>>>> dev
    }

    public function testValueIsAngleAddrWithValidAddress()
    {
        /* -- RFC 2822, 3.6.7.

            return          =       "Return-Path:" path CRLF

            path            =       ([CFWS] "<" ([CFWS] / addr-spec) ">" [CFWS]) /
                                                            obs-path
     */

<<<<<<< HEAD
        $header = $this->_getHeader('Return-Path');
=======
        $header = $this->getHeader('Return-Path');
>>>>>>> dev
        $header->setAddress('chris@swiftmailer.org');
        $this->assertEquals('<chris@swiftmailer.org>', $header->getFieldBody());
    }

<<<<<<< HEAD
    public function testValueIsEmptyAngleBracketsIfEmptyAddressSet()
    {
        $header = $this->_getHeader('Return-Path');
=======
    public function testAddressIsIdnEncoded()
    {
        $header = $this->getHeader('Return-Path');
        $header->setAddress('chris@swïftmailer.org');
        $this->assertEquals('<chris@xn--swftmailer-78a.org>', $header->getFieldBody());
    }

    /**
     * @expectedException \Swift_AddressEncoderException
     */
    public function testAddressMustBeEncodable()
    {
        $header = $this->getHeader('Return-Path');
        $header->setAddress('chrïs@swiftmailer.org');
        $header->getFieldBody();
    }

    public function testValueIsEmptyAngleBracketsIfEmptyAddressSet()
    {
        $header = $this->getHeader('Return-Path');
>>>>>>> dev
        $header->setAddress('');
        $this->assertEquals('<>', $header->getFieldBody());
    }

    public function testSetBodyModel()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('Return-Path');
=======
        $header = $this->getHeader('Return-Path');
>>>>>>> dev
        $header->setFieldBodyModel('foo@bar.tld');
        $this->assertEquals('foo@bar.tld', $header->getAddress());
    }

    public function testGetBodyModel()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('Return-Path');
=======
        $header = $this->getHeader('Return-Path');
>>>>>>> dev
        $header->setAddress('foo@bar.tld');
        $this->assertEquals('foo@bar.tld', $header->getFieldBodyModel());
    }

    public function testToString()
    {
<<<<<<< HEAD
        $header = $this->_getHeader('Return-Path');
=======
        $header = $this->getHeader('Return-Path');
>>>>>>> dev
        $header->setAddress('chris@swiftmailer.org');
        $this->assertEquals('Return-Path: <chris@swiftmailer.org>'."\r\n",
            $header->toString()
            );
    }

<<<<<<< HEAD
    private function _getHeader($name)
    {
        return new Swift_Mime_Headers_PathHeader($name, new Swift_Mime_Grammar());
=======
    private function getHeader($name)
    {
        return new Swift_Mime_Headers_PathHeader($name, new EmailValidator(), new Swift_AddressEncoder_IdnAddressEncoder());
>>>>>>> dev
    }
}
