<?php

<<<<<<< HEAD
class Swift_Mime_ContentEncoder_NativeQpContentEncoderAcceptanceTest extends \PHPUnit_Framework_TestCase
=======
class Swift_Mime_ContentEncoder_NativeQpContentEncoderAcceptanceTest extends \PHPUnit\Framework\TestCase
>>>>>>> dev
{
    protected $_samplesDir;

    /**
     * @var Swift_Mime_ContentEncoder_NativeQpContentEncoder
     */
<<<<<<< HEAD
    protected $_encoder;

    protected function setUp()
    {
        $this->_samplesDir = realpath(__DIR__.'/../../../../_samples/charsets');
        $this->_encoder = new Swift_Mime_ContentEncoder_NativeQpContentEncoder();
=======
    protected $encoder;

    protected function setUp()
    {
        $this->samplesDir = realpath(__DIR__.'/../../../../_samples/charsets');
        $this->encoder = new Swift_Mime_ContentEncoder_NativeQpContentEncoder();
>>>>>>> dev
    }

    public function testEncodingAndDecodingSamples()
    {
<<<<<<< HEAD
        $sampleFp = opendir($this->_samplesDir);
        while (false !== $encodingDir = readdir($sampleFp)) {
            if (substr($encodingDir, 0, 1) == '.') {
                continue;
            }

            $sampleDir = $this->_samplesDir.'/'.$encodingDir;
=======
        $sampleFp = opendir($this->samplesDir);
        while (false !== $encodingDir = readdir($sampleFp)) {
            if ('.' == substr($encodingDir, 0, 1)) {
                continue;
            }

            $sampleDir = $this->samplesDir.'/'.$encodingDir;
>>>>>>> dev

            if (is_dir($sampleDir)) {
                $fileFp = opendir($sampleDir);
                while (false !== $sampleFile = readdir($fileFp)) {
<<<<<<< HEAD
                    if (substr($sampleFile, 0, 1) == '.') {
=======
                    if ('.' == substr($sampleFile, 0, 1)) {
>>>>>>> dev
                        continue;
                    }

                    $text = file_get_contents($sampleDir.'/'.$sampleFile);

                    $os = new Swift_ByteStream_ArrayByteStream();
                    $os->write($text);

                    $is = new Swift_ByteStream_ArrayByteStream();
<<<<<<< HEAD
                    $this->_encoder->encodeByteStream($os, $is);
=======
                    $this->encoder->encodeByteStream($os, $is);
>>>>>>> dev

                    $encoded = '';
                    while (false !== $bytes = $is->read(8192)) {
                        $encoded .= $bytes;
                    }

                    $this->assertEquals(
                        quoted_printable_decode($encoded),
                        // CR and LF are converted to CRLF
                        preg_replace('~\r(?!\n)|(?<!\r)\n~', "\r\n", $text),
                        '%s: Encoded string should decode back to original string for sample '.$sampleDir.'/'.$sampleFile
                    );
                }
                closedir($fileFp);
            }
        }
        closedir($sampleFp);
    }

    public function testEncodingAndDecodingSamplesFromDiConfiguredInstance()
    {
<<<<<<< HEAD
        $encoder = $this->_createEncoderFromContainer();
=======
        $encoder = $this->createEncoderFromContainer();
>>>>>>> dev
        $this->assertSame('=C3=A4=C3=B6=C3=BC=C3=9F', $encoder->encodeString('äöüß'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCharsetChangeNotImplemented()
    {
<<<<<<< HEAD
        $this->_encoder->charsetChanged('utf-8');
        $this->_encoder->charsetChanged('charset');
        $this->_encoder->encodeString('foo');
=======
        $this->encoder->charsetChanged('utf-8');
        $this->encoder->charsetChanged('charset');
        $this->encoder->encodeString('foo');
>>>>>>> dev
    }

    public function testGetName()
    {
<<<<<<< HEAD
        $this->assertSame('quoted-printable', $this->_encoder->getName());
    }

    private function _createEncoderFromContainer()
=======
        $this->assertSame('quoted-printable', $this->encoder->getName());
    }

    private function createEncoderFromContainer()
>>>>>>> dev
    {
        return Swift_DependencyContainer::getInstance()
            ->lookup('mime.nativeqpcontentencoder')
            ;
    }
}
