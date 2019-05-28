<?php

<<<<<<< HEAD
class Swift_Encoder_Base64EncoderAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    private $_samplesDir;
    private $_encoder;

    protected function setUp()
    {
        $this->_samplesDir = realpath(__DIR__.'/../../../_samples/charsets');
        $this->_encoder = new Swift_Encoder_Base64Encoder();
=======
class Swift_Encoder_Base64EncoderAcceptanceTest extends \PHPUnit\Framework\TestCase
{
    private $samplesDir;
    private $encoder;

    protected function setUp()
    {
        $this->samplesDir = realpath(__DIR__.'/../../../_samples/charsets');
        $this->encoder = new Swift_Encoder_Base64Encoder();
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
<<<<<<< HEAD
                    $encodedText = $this->_encoder->encodeString($text);
=======
                    $encodedText = $this->encoder->encodeString($text);
>>>>>>> dev

                    $this->assertEquals(
                        base64_decode($encodedText), $text,
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
