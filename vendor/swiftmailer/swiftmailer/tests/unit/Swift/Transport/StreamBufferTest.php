<?php

<<<<<<< HEAD
class Swift_Transport_StreamBufferTest extends \PHPUnit_Framework_TestCase
{
    public function testSettingWriteTranslationsCreatesFilters()
    {
        $factory = $this->_createFactory();
        $factory->expects($this->once())
                ->method('createFilter')
                ->with('a', 'b')
                ->will($this->returnCallback(array($this, '_createFilter')));

        $buffer = $this->_createBuffer($factory);
        $buffer->setWriteTranslations(array('a' => 'b'));
=======
class Swift_Transport_StreamBufferTest extends \PHPUnit\Framework\TestCase
{
    public function testSettingWriteTranslationsCreatesFilters()
    {
        $factory = $this->createFactory();
        $factory->expects($this->once())
                ->method('createFilter')
                ->with('a', 'b')
                ->will($this->returnCallback([$this, 'createFilter']));

        $buffer = $this->createBuffer($factory);
        $buffer->setWriteTranslations(['a' => 'b']);
>>>>>>> dev
    }

    public function testOverridingTranslationsOnlyAddsNeededFilters()
    {
<<<<<<< HEAD
        $factory = $this->_createFactory();
        $factory->expects($this->exactly(2))
                ->method('createFilter')
                ->will($this->returnCallback(array($this, '_createFilter')));

        $buffer = $this->_createBuffer($factory);
        $buffer->setWriteTranslations(array('a' => 'b'));
        $buffer->setWriteTranslations(array('x' => 'y', 'a' => 'b'));
    }

    private function _createBuffer($replacementFactory)
=======
        $factory = $this->createFactory();
        $factory->expects($this->exactly(2))
                ->method('createFilter')
                ->will($this->returnCallback([$this, 'createFilter']));

        $buffer = $this->createBuffer($factory);
        $buffer->setWriteTranslations(['a' => 'b']);
        $buffer->setWriteTranslations(['x' => 'y', 'a' => 'b']);
    }

    private function createBuffer($replacementFactory)
>>>>>>> dev
    {
        return new Swift_Transport_StreamBuffer($replacementFactory);
    }

<<<<<<< HEAD
    private function _createFactory()
=======
    private function createFactory()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_ReplacementFilterFactory')->getMock();
    }

<<<<<<< HEAD
    public function _createFilter()
=======
    public function createFilter()
>>>>>>> dev
    {
        return $this->getMockBuilder('Swift_StreamFilter')->getMock();
    }
}
