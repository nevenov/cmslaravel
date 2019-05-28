<?php

<<<<<<< HEAD
class Swift_Mime_HeaderEncoder_Base64HeaderEncoderTest extends \PHPUnit_Framework_TestCase
=======
class Swift_Mime_HeaderEncoder_Base64HeaderEncoderTest extends \PHPUnit\Framework\TestCase
>>>>>>> dev
{
    //Most tests are already covered in Base64EncoderTest since this subclass only
    // adds a getName() method

    public function testNameIsB()
    {
        $encoder = new Swift_Mime_HeaderEncoder_Base64HeaderEncoder();
        $this->assertEquals('B', $encoder->getName());
    }
}
