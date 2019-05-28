<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug\Tests\FatalErrorHandler;

<<<<<<< HEAD
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Debug\FatalErrorHandler\UndefinedFunctionFatalErrorHandler;

class UndefinedFunctionFatalErrorHandlerTest extends \PHPUnit_Framework_TestCase
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Debug\FatalErrorHandler\UndefinedFunctionFatalErrorHandler;

class UndefinedFunctionFatalErrorHandlerTest extends TestCase
>>>>>>> dev
{
    /**
     * @dataProvider provideUndefinedFunctionData
     */
    public function testUndefinedFunction($error, $translatedMessage)
    {
        $handler = new UndefinedFunctionFatalErrorHandler();
        $exception = $handler->handleError($error, new FatalErrorException('', 0, $error['type'], $error['file'], $error['line']));

        $this->assertInstanceOf('Symfony\Component\Debug\Exception\UndefinedFunctionException', $exception);
<<<<<<< HEAD
        // class names are case insensitive and PHP/HHVM do not return the same
=======
        // class names are case insensitive and PHP do not return the same
>>>>>>> dev
        $this->assertSame(strtolower($translatedMessage), strtolower($exception->getMessage()));
        $this->assertSame($error['type'], $exception->getSeverity());
        $this->assertSame($error['file'], $exception->getFile());
        $this->assertSame($error['line'], $exception->getLine());
    }

    public function provideUndefinedFunctionData()
    {
<<<<<<< HEAD
        return array(
            array(
                array(
=======
        return [
            [
                [
>>>>>>> dev
                    'type' => 1,
                    'line' => 12,
                    'file' => 'foo.php',
                    'message' => 'Call to undefined function test_namespaced_function()',
<<<<<<< HEAD
                ),
                "Attempted to call function \"test_namespaced_function\" from the global namespace.\nDid you mean to call \"\\symfony\\component\\debug\\tests\\fatalerrorhandler\\test_namespaced_function\"?",
            ),
            array(
                array(
=======
                ],
                "Attempted to call function \"test_namespaced_function\" from the global namespace.\nDid you mean to call \"\\symfony\\component\\debug\\tests\\fatalerrorhandler\\test_namespaced_function\"?",
            ],
            [
                [
>>>>>>> dev
                    'type' => 1,
                    'line' => 12,
                    'file' => 'foo.php',
                    'message' => 'Call to undefined function Foo\\Bar\\Baz\\test_namespaced_function()',
<<<<<<< HEAD
                ),
                "Attempted to call function \"test_namespaced_function\" from namespace \"Foo\\Bar\\Baz\".\nDid you mean to call \"\\symfony\\component\\debug\\tests\\fatalerrorhandler\\test_namespaced_function\"?",
            ),
            array(
                array(
=======
                ],
                "Attempted to call function \"test_namespaced_function\" from namespace \"Foo\\Bar\\Baz\".\nDid you mean to call \"\\symfony\\component\\debug\\tests\\fatalerrorhandler\\test_namespaced_function\"?",
            ],
            [
                [
>>>>>>> dev
                    'type' => 1,
                    'line' => 12,
                    'file' => 'foo.php',
                    'message' => 'Call to undefined function foo()',
<<<<<<< HEAD
                ),
                'Attempted to call function "foo" from the global namespace.',
            ),
            array(
                array(
=======
                ],
                'Attempted to call function "foo" from the global namespace.',
            ],
            [
                [
>>>>>>> dev
                    'type' => 1,
                    'line' => 12,
                    'file' => 'foo.php',
                    'message' => 'Call to undefined function Foo\\Bar\\Baz\\foo()',
<<<<<<< HEAD
                ),
                'Attempted to call function "foo" from namespace "Foo\Bar\Baz".',
            ),
        );
=======
                ],
                'Attempted to call function "foo" from namespace "Foo\Bar\Baz".',
            ],
        ];
>>>>>>> dev
    }
}

function test_namespaced_function()
{
}
