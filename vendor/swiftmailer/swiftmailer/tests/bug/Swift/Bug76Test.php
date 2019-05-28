<?php

<<<<<<< HEAD
class Swift_Bug76Test extends \PHPUnit_Framework_TestCase
{
    private $_inputFile;
    private $_outputFile;
    private $_encoder;

    protected function setUp()
    {
        $this->_inputFile = sys_get_temp_dir().'/in.bin';
        file_put_contents($this->_inputFile, '');

        $this->_outputFile = sys_get_temp_dir().'/out.bin';
        file_put_contents($this->_outputFile, '');

        $this->_encoder = $this->_createEncoder();
=======
class Swift_Bug76Test extends \PHPUnit\Framework\TestCase
{
    private $inputFile;
    private $outputFile;
    private $encoder;

    protected function setUp()
    {
        $this->inputFile = sys_get_temp_dir().'/in.bin';
        file_put_contents($this->inputFile, '');

        $this->outputFile = sys_get_temp_dir().'/out.bin';
        file_put_contents($this->outputFile, '');

        $this->encoder = $this->createEncoder();
>>>>>>> dev
    }

    protected function tearDown()
    {
<<<<<<< HEAD
        unlink($this->_inputFile);
        unlink($this->_outputFile);
=======
        unlink($this->inputFile);
        unlink($this->outputFile);
>>>>>>> dev
    }

    public function testBase64EncodedLineLengthNeverExceeds76CharactersEvenIfArgsDo()
    {
<<<<<<< HEAD
        $this->_fillFileWithRandomBytes(1000, $this->_inputFile);

        $os = $this->_createStream($this->_inputFile);
        $is = $this->_createStream($this->_outputFile);

        $this->_encoder->encodeByteStream($os, $is, 0, 80); //Exceeds 76

        $this->assertMaxLineLength(76, $this->_outputFile,
=======
        $this->fillFileWithRandomBytes(1000, $this->inputFile);

        $os = $this->createStream($this->inputFile);
        $is = $this->createStream($this->outputFile);

        $this->encoder->encodeByteStream($os, $is, 0, 80); //Exceeds 76

        $this->assertMaxLineLength(76, $this->outputFile,
>>>>>>> dev
            '%s: Line length should not exceed 76 characters'
        );
    }

    public function assertMaxLineLength($length, $filePath, $message = '%s')
    {
        $lines = file($filePath);
        foreach ($lines as $line) {
            $this->assertTrue((strlen(trim($line)) <= 76), $message);
        }
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
    private function _createEncoder()
=======
    private function createEncoder()
>>>>>>> dev
    {
        return new Swift_Mime_ContentEncoder_Base64ContentEncoder();
    }

<<<<<<< HEAD
    private function _createStream($file)
=======
    private function createStream($file)
>>>>>>> dev
    {
        return new Swift_ByteStream_FileByteStream($file, true);
    }
}
