<?php

<<<<<<< HEAD
class Swift_Transport_StreamBuffer_SocketTimeoutTest extends \PHPUnit_Framework_TestCase
{
    protected $_buffer;

    protected $_randomHighPort;

    protected $_server;
=======
class Swift_Transport_StreamBuffer_SocketTimeoutTest extends \PHPUnit\Framework\TestCase
{
    protected $buffer;
    protected $server;
    protected $randomHighPort;
>>>>>>> dev

    protected function setUp()
    {
        if (!defined('SWIFT_SMTP_HOST')) {
            $this->markTestSkipped(
                'Cannot run test without an SMTP host to connect to (define '.
                'SWIFT_SMTP_HOST in tests/acceptance.conf.php if you wish to run this test)'
             );
        }

        $serverStarted = false;
        for ($i = 0; $i < 5; ++$i) {
<<<<<<< HEAD
            $this->_randomHighPort = rand(50000, 65000);
            $this->_server = stream_socket_server('tcp://127.0.0.1:'.$this->_randomHighPort);
            if ($this->_server) {
=======
            $this->randomHighPort = random_int(50000, 65000);
            $this->server = stream_socket_server('tcp://127.0.0.1:'.$this->randomHighPort);
            if ($this->server) {
>>>>>>> dev
                $serverStarted = true;
            }
        }

<<<<<<< HEAD
        $this->_buffer = new Swift_Transport_StreamBuffer(
=======
        $this->buffer = new Swift_Transport_StreamBuffer(
>>>>>>> dev
            $this->getMockBuilder('Swift_ReplacementFilterFactory')->getMock()
        );
    }

<<<<<<< HEAD
    protected function _initializeBuffer()
    {
        $host = '127.0.0.1';
        $port = $this->_randomHighPort;

        $this->_buffer->initialize(array(
=======
    protected function initializeBuffer()
    {
        $host = '127.0.0.1';
        $port = $this->randomHighPort;

        $this->buffer->initialize([
>>>>>>> dev
            'type' => Swift_Transport_IoBuffer::TYPE_SOCKET,
            'host' => $host,
            'port' => $port,
            'protocol' => 'tcp',
            'blocking' => 1,
            'timeout' => 1,
<<<<<<< HEAD
        ));
=======
        ]);
>>>>>>> dev
    }

    public function testTimeoutException()
    {
<<<<<<< HEAD
        $this->_initializeBuffer();
        $e = null;
        try {
            $line = $this->_buffer->readLine(0);
=======
        $this->initializeBuffer();
        $e = null;
        try {
            $line = $this->buffer->readLine(0);
>>>>>>> dev
        } catch (Exception $e) {
        }
        $this->assertInstanceOf('Swift_IoException', $e, 'IO Exception Not Thrown On Connection Timeout');
        $this->assertRegExp('/Connection to .* Timed Out/', $e->getMessage());
    }

    protected function tearDown()
    {
<<<<<<< HEAD
        if ($this->_server) {
            stream_socket_shutdown($this->_server, STREAM_SHUT_RDWR);
=======
        if ($this->server) {
            stream_socket_shutdown($this->server, STREAM_SHUT_RDWR);
>>>>>>> dev
        }
    }
}
