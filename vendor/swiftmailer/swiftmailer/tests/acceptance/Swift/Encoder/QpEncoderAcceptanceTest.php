<?php

<<<<<<< HEAD
class Swift_Encoder_QpEncoderAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    private $_samplesDir;
    private $_factory;

    protected function setUp()
    {
        $this->_samplesDir = realpath(__DIR__.'/../../../_samples/charsets');
        $this->_factory = new Swift_CharacterReaderFactory_SimpleCharacterReaderFactory();
=======
class Swift_Encoder_QpEncoderAcceptanceTest extends \PHPUnit\Framework\TestCase
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
            $encoder = new Swift_Encoder_QpEncoder($charStream);

            $sampleDir = $this->_samplesDir.'/'.$encodingDir;
=======
                $this->factory, $encoding);
            $encoder = new Swift_Encoder_QpEncoder($charStream);

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

                    foreach (explode("\r\n", $encodedText) as $line) {
                        $this->assertLessThanOrEqual(76, strlen($line));
                    }

                    $this->assertEquals(
                        quoted_printable_decode($encodedText), $text,
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
