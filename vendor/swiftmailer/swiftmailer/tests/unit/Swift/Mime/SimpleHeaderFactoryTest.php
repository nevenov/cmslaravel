<?php

<<<<<<< HEAD
class Swift_Mime_SimpleHeaderFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $_factory;

    protected function setUp()
    {
        $this->_factory = $this->_createFactory();
=======
use Egulias\EmailValidator\EmailValidator;

class Swift_Mime_SimpleHeaderFactoryTest extends \PHPUnit\Framework\TestCase
{
    private $factory;

    protected function setUp()
    {
        $this->factory = $this->createFactory();
>>>>>>> dev
    }

    public function testMailboxHeaderIsCorrectType()
    {
<<<<<<< HEAD
        $header = $this->_factory->createMailboxHeader('X-Foo');
=======
        $header = $this->factory->createMailboxHeader('X-Foo');
>>>>>>> dev
        $this->assertInstanceOf('Swift_Mime_Headers_MailboxHeader', $header);
    }

    public function testMailboxHeaderHasCorrectName()
    {
<<<<<<< HEAD
        $header = $this->_factory->createMailboxHeader('X-Foo');
=======
        $header = $this->factory->createMailboxHeader('X-Foo');
>>>>>>> dev
        $this->assertEquals('X-Foo', $header->getFieldName());
    }

    public function testMailboxHeaderHasCorrectModel()
    {
<<<<<<< HEAD
        $header = $this->_factory->createMailboxHeader('X-Foo',
            array('foo@bar' => 'FooBar')
            );
        $this->assertEquals(array('foo@bar' => 'FooBar'), $header->getFieldBodyModel());
=======
        $header = $this->factory->createMailboxHeader('X-Foo',
            ['foo@bar' => 'FooBar']
            );
        $this->assertEquals(['foo@bar' => 'FooBar'], $header->getFieldBodyModel());
>>>>>>> dev
    }

    public function testDateHeaderHasCorrectType()
    {
<<<<<<< HEAD
        $header = $this->_factory->createDateHeader('X-Date');
=======
        $header = $this->factory->createDateHeader('X-Date');
>>>>>>> dev
        $this->assertInstanceOf('Swift_Mime_Headers_DateHeader', $header);
    }

    public function testDateHeaderHasCorrectName()
    {
<<<<<<< HEAD
        $header = $this->_factory->createDateHeader('X-Date');
=======
        $header = $this->factory->createDateHeader('X-Date');
>>>>>>> dev
        $this->assertEquals('X-Date', $header->getFieldName());
    }

    public function testDateHeaderHasCorrectModel()
    {
<<<<<<< HEAD
        $header = $this->_factory->createDateHeader('X-Date', 123);
        $this->assertEquals(123, $header->getFieldBodyModel());
=======
        $dateTime = new \DateTimeImmutable();
        $header = $this->factory->createDateHeader('X-Date', $dateTime);
        $this->assertEquals($dateTime, $header->getFieldBodyModel());
>>>>>>> dev
    }

    public function testTextHeaderHasCorrectType()
    {
<<<<<<< HEAD
        $header = $this->_factory->createTextHeader('X-Foo');
=======
        $header = $this->factory->createTextHeader('X-Foo');
>>>>>>> dev
        $this->assertInstanceOf('Swift_Mime_Headers_UnstructuredHeader', $header);
    }

    public function testTextHeaderHasCorrectName()
    {
<<<<<<< HEAD
        $header = $this->_factory->createTextHeader('X-Foo');
=======
        $header = $this->factory->createTextHeader('X-Foo');
>>>>>>> dev
        $this->assertEquals('X-Foo', $header->getFieldName());
    }

    public function testTextHeaderHasCorrectModel()
    {
<<<<<<< HEAD
        $header = $this->_factory->createTextHeader('X-Foo', 'bar');
=======
        $header = $this->factory->createTextHeader('X-Foo', 'bar');
>>>>>>> dev
        $this->assertEquals('bar', $header->getFieldBodyModel());
    }

    public function testParameterizedHeaderHasCorrectType()
    {
<<<<<<< HEAD
        $header = $this->_factory->createParameterizedHeader('X-Foo');
=======
        $header = $this->factory->createParameterizedHeader('X-Foo');
>>>>>>> dev
        $this->assertInstanceOf('Swift_Mime_Headers_ParameterizedHeader', $header);
    }

    public function testParameterizedHeaderHasCorrectName()
    {
<<<<<<< HEAD
        $header = $this->_factory->createParameterizedHeader('X-Foo');
=======
        $header = $this->factory->createParameterizedHeader('X-Foo');
>>>>>>> dev
        $this->assertEquals('X-Foo', $header->getFieldName());
    }

    public function testParameterizedHeaderHasCorrectModel()
    {
<<<<<<< HEAD
        $header = $this->_factory->createParameterizedHeader('X-Foo', 'bar');
=======
        $header = $this->factory->createParameterizedHeader('X-Foo', 'bar');
>>>>>>> dev
        $this->assertEquals('bar', $header->getFieldBodyModel());
    }

    public function testParameterizedHeaderHasCorrectParams()
    {
<<<<<<< HEAD
        $header = $this->_factory->createParameterizedHeader('X-Foo', 'bar',
            array('zip' => 'button')
            );
        $this->assertEquals(array('zip' => 'button'), $header->getParameters());
=======
        $header = $this->factory->createParameterizedHeader('X-Foo', 'bar',
            ['zip' => 'button']
            );
        $this->assertEquals(['zip' => 'button'], $header->getParameters());
>>>>>>> dev
    }

    public function testIdHeaderHasCorrectType()
    {
<<<<<<< HEAD
        $header = $this->_factory->createIdHeader('X-ID');
=======
        $header = $this->factory->createIdHeader('X-ID');
>>>>>>> dev
        $this->assertInstanceOf('Swift_Mime_Headers_IdentificationHeader', $header);
    }

    public function testIdHeaderHasCorrectName()
    {
<<<<<<< HEAD
        $header = $this->_factory->createIdHeader('X-ID');
=======
        $header = $this->factory->createIdHeader('X-ID');
>>>>>>> dev
        $this->assertEquals('X-ID', $header->getFieldName());
    }

    public function testIdHeaderHasCorrectModel()
    {
<<<<<<< HEAD
        $header = $this->_factory->createIdHeader('X-ID', 'xyz@abc');
        $this->assertEquals(array('xyz@abc'), $header->getFieldBodyModel());
=======
        $header = $this->factory->createIdHeader('X-ID', 'xyz@abc');
        $this->assertEquals(['xyz@abc'], $header->getFieldBodyModel());
>>>>>>> dev
    }

    public function testPathHeaderHasCorrectType()
    {
<<<<<<< HEAD
        $header = $this->_factory->createPathHeader('X-Path');
=======
        $header = $this->factory->createPathHeader('X-Path');
>>>>>>> dev
        $this->assertInstanceOf('Swift_Mime_Headers_PathHeader', $header);
    }

    public function testPathHeaderHasCorrectName()
    {
<<<<<<< HEAD
        $header = $this->_factory->createPathHeader('X-Path');
=======
        $header = $this->factory->createPathHeader('X-Path');
>>>>>>> dev
        $this->assertEquals('X-Path', $header->getFieldName());
    }

    public function testPathHeaderHasCorrectModel()
    {
<<<<<<< HEAD
        $header = $this->_factory->createPathHeader('X-Path', 'foo@bar');
=======
        $header = $this->factory->createPathHeader('X-Path', 'foo@bar');
>>>>>>> dev
        $this->assertEquals('foo@bar', $header->getFieldBodyModel());
    }

    public function testCharsetChangeNotificationNotifiesEncoders()
    {
<<<<<<< HEAD
        $encoder = $this->_createHeaderEncoder();
        $encoder->expects($this->once())
                ->method('charsetChanged')
                ->with('utf-8');
        $paramEncoder = $this->_createParamEncoder();
=======
        $encoder = $this->createHeaderEncoder();
        $encoder->expects($this->once())
                ->method('charsetChanged')
                ->with('utf-8');
        $paramEncoder = $this->createParamEncoder();
>>>>>>> dev
        $paramEncoder->expects($this->once())
                     ->method('charsetChanged')
                     ->with('utf-8');

<<<<<<< HEAD
        $factory = $this->_createFactory($encoder, $paramEncoder);
=======
        $factory = $this->createFactory($encoder, $paramEncoder);
>>>>>>> dev

        $factory->charsetChanged('utf-8');
    }

<<<<<<< HEAD
    private function _createFactory($encoder = null, $paramEncoder = null)
    {
        return new Swift_Mime_SimpleHeaderFactory(
            $encoder
                ? $encoder : $this->_createHeaderEncoder(),
            $paramEncoder
                ? $paramEncoder : $this->_createParamEncoder(),
            new Swift_Mime_Grammar()
            );
    }

    private function _createHeaderEncoder()
=======
    private function createFactory($encoder = null, $paramEncoder = null)
    {
        return new Swift_Mime_SimpleHeaderFactory(
            $encoder
                ? $encoder : $this->createHeaderEncoder(),
            $paramEncoder
                ? $paramEncoder : $this->createParamEncoder(),
            new EmailValidator()
            );
    }

    private function createHeaderEncoder()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_Mime_HeaderEncoder')->getMock();
    }

<<<<<<< HEAD
    private function _createParamEncoder()
=======
    private function createParamEncoder()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_Encoder')->getMock();
    }
}
