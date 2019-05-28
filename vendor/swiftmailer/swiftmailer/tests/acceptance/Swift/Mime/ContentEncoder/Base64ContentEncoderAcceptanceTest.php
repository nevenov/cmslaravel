<?php

<<<<<<< HEAD
class Swift_Mime_ContentEncoder_Base64ContentEncoderAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    private $_samplesDir;
    private $_encoder;

    protected function setUp()
    {
        $this->_samplesDir = realpath(__DIR__.'/../../../../_samples/charsets');
        $this->_encoder = new Swift_Mime_ContentEncoder_Base64ContentEncoder();
=======
class Swift_Mime_ContentEncoder_Base64ContentEncoderAcceptanceTest extends \PHPUnit\Framework\TestCase
{
    private $samplesDir;
    private $encoder;

    protected function setUp()
    {
        $this->samplesDir = realpath(__DIR__.'/../../../../_samples/charsets');
        $this->encoder = new Swift_Mime_ContentEncoder_Base64ContentEncoder();
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
                        base64_decode($encoded), $text,
                        '%s: Encoded string should decode back to original string for sample '.
                        $sampleDir.'/'.$sampleFile
                        );
                }
                closedir($fileFp);
            }
        }
        closedir($sampleFp);
    }
}
