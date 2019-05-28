<?php

<<<<<<< HEAD
class Swift_StreamFilters_StringReplacementFilterFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testInstancesOfStringReplacementFilterAreCreated()
    {
        $factory = $this->_createFactory();
=======
class Swift_StreamFilters_StringReplacementFilterFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testInstancesOfStringReplacementFilterAreCreated()
    {
        $factory = $this->createFactory();
>>>>>>> dev
        $this->assertInstanceOf(
            'Swift_StreamFilters_StringReplacementFilter',
            $factory->createFilter('a', 'b')
        );
    }

    public function testSameInstancesAreCached()
    {
<<<<<<< HEAD
        $factory = $this->_createFactory();
=======
        $factory = $this->createFactory();
>>>>>>> dev
        $filter1 = $factory->createFilter('a', 'b');
        $filter2 = $factory->createFilter('a', 'b');
        $this->assertSame($filter1, $filter2, '%s: Instances should be cached');
    }

    public function testDifferingInstancesAreNotCached()
    {
<<<<<<< HEAD
        $factory = $this->_createFactory();
=======
        $factory = $this->createFactory();
>>>>>>> dev
        $filter1 = $factory->createFilter('a', 'b');
        $filter2 = $factory->createFilter('a', 'c');
        $this->assertNotEquals($filter1, $filter2,
            '%s: Differing instances should not be cached'
            );
    }

<<<<<<< HEAD
    private function _createFactory()
=======
    private function createFactory()
>>>>>>> dev
    {
        return new Swift_StreamFilters_StringReplacementFilterFactory();
    }
}
