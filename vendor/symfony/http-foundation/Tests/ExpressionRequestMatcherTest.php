<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Tests;

<<<<<<< HEAD
=======
use PHPUnit\Framework\TestCase;
>>>>>>> dev
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Symfony\Component\HttpFoundation\ExpressionRequestMatcher;
use Symfony\Component\HttpFoundation\Request;

<<<<<<< HEAD
class ExpressionRequestMatcherTest extends \PHPUnit_Framework_TestCase
=======
class ExpressionRequestMatcherTest extends TestCase
>>>>>>> dev
{
    /**
     * @expectedException \LogicException
     */
    public function testWhenNoExpressionIsSet()
    {
        $expressionRequestMatcher = new ExpressionRequestMatcher();
        $expressionRequestMatcher->matches(new Request());
    }

    /**
     * @dataProvider provideExpressions
     */
    public function testMatchesWhenParentMatchesIsTrue($expression, $expected)
    {
        $request = Request::create('/foo');
        $expressionRequestMatcher = new ExpressionRequestMatcher();

        $expressionRequestMatcher->setExpression(new ExpressionLanguage(), $expression);
        $this->assertSame($expected, $expressionRequestMatcher->matches($request));
    }

    /**
     * @dataProvider provideExpressions
     */
    public function testMatchesWhenParentMatchesIsFalse($expression)
    {
        $request = Request::create('/foo');
        $request->attributes->set('foo', 'foo');
        $expressionRequestMatcher = new ExpressionRequestMatcher();
        $expressionRequestMatcher->matchAttribute('foo', 'bar');

        $expressionRequestMatcher->setExpression(new ExpressionLanguage(), $expression);
        $this->assertFalse($expressionRequestMatcher->matches($request));
    }

    public function provideExpressions()
    {
<<<<<<< HEAD
        return array(
            array('request.getMethod() == method', true),
            array('request.getPathInfo() == path', true),
            array('request.getHost() == host', true),
            array('request.getClientIp() == ip', true),
            array('request.attributes.all() == attributes', true),
            array('request.getMethod() == method && request.getPathInfo() == path && request.getHost() == host && request.getClientIp() == ip &&  request.attributes.all() == attributes', true),
            array('request.getMethod() != method', false),
            array('request.getMethod() != method && request.getPathInfo() == path && request.getHost() == host && request.getClientIp() == ip &&  request.attributes.all() == attributes', false),
        );
=======
        return [
            ['request.getMethod() == method', true],
            ['request.getPathInfo() == path', true],
            ['request.getHost() == host', true],
            ['request.getClientIp() == ip', true],
            ['request.attributes.all() == attributes', true],
            ['request.getMethod() == method && request.getPathInfo() == path && request.getHost() == host && request.getClientIp() == ip &&  request.attributes.all() == attributes', true],
            ['request.getMethod() != method', false],
            ['request.getMethod() != method && request.getPathInfo() == path && request.getHost() == host && request.getClientIp() == ip &&  request.attributes.all() == attributes', false],
        ];
>>>>>>> dev
    }
}
