<?php

<<<<<<< HEAD
class Swift_Encoder_Rfc2231EncoderAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    private $_samplesDir;
    private $_factory;

    protected function setUp()
    {
        $this->_samplesDir = realpath(__DIR__.'/../../../_samples/charsets');
        $this->_factory = new Swift_CharacterReaderFactory_SimpleCharacterReaderFactory();
=======
class Swift_Encoder_Rfc2231EncoderAcceptanceTest extends \PHPUnit\Framework\TestCase
{
    private $samplesDir;
    private $factory;

    protected function setUp()
    {
        $this->samplesDir = realpath(__DIR__.'/../../../_samples/charsets');
        $this->factory = new Swift_CharacterReaderFactory_SimpleCharacterReaderFactory();
>>>>>>> dev
    }

    public function testEncodingAndDecodingSamples()
    {
<<<<<<< HEAD
        $sampleFp = opendir($this->_samplesDir);
        while (false !== $encodingDir = readdir($sampleFp)) {
            if (substr($encodingDir, 0, 1) == '.') {
=======
        $sampleFp = opendir($this->samplesDir);
        while (false !== $encodingDir = readdir($sampleFp)) {
            if ('.' == substr($encodingDir, 0, 1)) {
>>>>>>> dev
                continue;
            }

            $encoding = $encodingDir;
            $charStream = new Swift_CharacterStream_ArrayCharacterStream(
<<<<<<< HEAD
                $this->_factory, $encoding);
            $encoder = new Swift_Encoder_Rfc2231Encoder($charStream);

            $sampleDir = $this->_samplesDir.'/'.$encodingDir;
=======
                $this->factory, $encoding);
            $encoder = new Swift_Encoder_Rfc2231Encoder($charStream);

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
                    $encodedText = $encoder->encodeString($text);

                    $this->assertEquals(
                        urldecode(implode('', explode("\r\n", $encodedText))), $text,
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
