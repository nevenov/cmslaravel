<?php

<<<<<<< HEAD
class Swift_StreamFilters_StringReplacementFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testBasicReplacementsAreMade()
    {
        $filter = $this->_createFilter('foo', 'bar');
=======
class Swift_StreamFilters_StringReplacementFilterTest extends \PHPUnit\Framework\TestCase
{
    public function testBasicReplacementsAreMade()
    {
        $filter = $this->createFilter('foo', 'bar');
>>>>>>> dev
        $this->assertEquals('XbarYbarZ', $filter->filter('XfooYfooZ'));
    }

    public function testShouldBufferReturnsTrueIfPartialMatchAtEndOfBuffer()
    {
<<<<<<< HEAD
        $filter = $this->_createFilter('foo', 'bar');
=======
        $filter = $this->createFilter('foo', 'bar');
>>>>>>> dev
        $this->assertTrue($filter->shouldBuffer('XfooYf'),
            '%s: Filter should buffer since "foo" is the needle and the ending '.
            '"f" could be from "foo"'
            );
    }

    public function testFilterCanMakeMultipleReplacements()
    {
<<<<<<< HEAD
        $filter = $this->_createFilter(array('a', 'b'), 'foo');
=======
        $filter = $this->createFilter(['a', 'b'], 'foo');
>>>>>>> dev
        $this->assertEquals('XfooYfooZ', $filter->filter('XaYbZ'));
    }

    public function testMultipleReplacementsCanBeDifferent()
    {
<<<<<<< HEAD
        $filter = $this->_createFilter(array('a', 'b'), array('foo', 'zip'));
=======
        $filter = $this->createFilter(['a', 'b'], ['foo', 'zip']);
>>>>>>> dev
        $this->assertEquals('XfooYzipZ', $filter->filter('XaYbZ'));
    }

    public function testShouldBufferReturnsFalseIfPartialMatchNotAtEndOfString()
    {
<<<<<<< HEAD
        $filter = $this->_createFilter("\r\n", "\n");
=======
        $filter = $this->createFilter("\r\n", "\n");
>>>>>>> dev
        $this->assertFalse($filter->shouldBuffer("foo\r\nbar"),
            '%s: Filter should not buffer since x0Dx0A is the needle and is not at EOF'
            );
    }

    public function testShouldBufferReturnsTrueIfAnyOfMultipleMatchesAtEndOfString()
    {
<<<<<<< HEAD
        $filter = $this->_createFilter(array('foo', 'zip'), 'bar');
=======
        $filter = $this->createFilter(['foo', 'zip'], 'bar');
>>>>>>> dev
        $this->assertTrue($filter->shouldBuffer('XfooYzi'),
            '%s: Filter should buffer since "zip" is a needle and the ending '.
            '"zi" could be from "zip"'
            );
    }

    public function testShouldBufferReturnsFalseOnEmptyBuffer()
    {
<<<<<<< HEAD
        $filter = $this->_createFilter("\r\n", "\n");
        $this->assertFalse($filter->shouldBuffer(''));
    }

    private function _createFilter($search, $replace)
=======
        $filter = $this->createFilter("\r\n", "\n");
        $this->assertFalse($filter->shouldBuffer(''));
    }

    private function createFilter($search, $replace)
>>>>>>> dev
    {
        return new Swift_StreamFilters_StringReplacementFilter($search, $replace);
    }
}
