<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Tests\Iterator;

<<<<<<< HEAD
use Symfony\Component\Finder\Iterator\MultiplePcreFilterIterator;

class MultiplePcreFilterIteratorTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Iterator\MultiplePcreFilterIterator;

class MultiplePcreFilterIteratorTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider getIsRegexFixtures
     */
    public function testIsRegex($string, $isRegex, $message)
    {
        $testIterator = new TestMultiplePcreFilterIterator();
        $this->assertEquals($isRegex, $testIterator->isRegex($string), $message);
    }

    public function getIsRegexFixtures()
    {
<<<<<<< HEAD
        return array(
            array('foo', false, 'string'),
            array(' foo ', false, '" " is not a valid delimiter'),
            array('\\foo\\', false, '"\\" is not a valid delimiter'),
            array('afooa', false, '"a" is not a valid delimiter'),
            array('//', false, 'the pattern should contain at least 1 character'),
            array('/a/', true, 'valid regex'),
            array('/foo/', true, 'valid regex'),
            array('/foo/i', true, 'valid regex with a single modifier'),
            array('/foo/imsxu', true, 'valid regex with multiple modifiers'),
            array('#foo#', true, '"#" is a valid delimiter'),
            array('{foo}', true, '"{,}" is a valid delimiter pair'),
            array('[foo]', true, '"[,]" is a valid delimiter pair'),
            array('(foo)', true, '"(,)" is a valid delimiter pair'),
            array('<foo>', true, '"<,>" is a valid delimiter pair'),
            array('*foo.*', false, '"*" is not considered as a valid delimiter'),
            array('?foo.?', false, '"?" is not considered as a valid delimiter'),
        );
=======
        return [
            ['foo', false, 'string'],
            [' foo ', false, '" " is not a valid delimiter'],
            ['\\foo\\', false, '"\\" is not a valid delimiter'],
            ['afooa', false, '"a" is not a valid delimiter'],
            ['//', false, 'the pattern should contain at least 1 character'],
            ['/a/', true, 'valid regex'],
            ['/foo/', true, 'valid regex'],
            ['/foo/i', true, 'valid regex with a single modifier'],
            ['/foo/imsxu', true, 'valid regex with multiple modifiers'],
            ['#foo#', true, '"#" is a valid delimiter'],
            ['{foo}', true, '"{,}" is a valid delimiter pair'],
            ['[foo]', true, '"[,]" is a valid delimiter pair'],
            ['(foo)', true, '"(,)" is a valid delimiter pair'],
            ['<foo>', true, '"<,>" is a valid delimiter pair'],
            ['*foo.*', false, '"*" is not considered as a valid delimiter'],
            ['?foo.?', false, '"?" is not considered as a valid delimiter'],
        ];
>>>>>>> dev
    }
}

class TestMultiplePcreFilterIterator extends MultiplePcreFilterIterator
{
    public function __construct()
    {
    }

    public function accept()
    {
        throw new \BadFunctionCallException('Not implemented');
    }

    public function isRegex($str)
    {
        return parent::isRegex($str);
    }

    public function toRegex($str)
    {
        throw new \BadFunctionCallException('Not implemented');
    }
}
