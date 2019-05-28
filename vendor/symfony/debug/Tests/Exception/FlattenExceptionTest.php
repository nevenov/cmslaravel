<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug\Tests\Exception;

<<<<<<< HEAD
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\GoneHttpException;
use Symfony\Component\HttpKernel\Exception\LengthRequiredHttpException;
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\GoneHttpException;
use Symfony\Component\HttpKernel\Exception\LengthRequiredHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
>>>>>>> dev
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;
use Symfony\Component\HttpKernel\Exception\PreconditionRequiredHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
<<<<<<< HEAD
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

class FlattenExceptionTest extends \PHPUnit_Framework_TestCase
=======
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

class FlattenExceptionTest extends TestCase
>>>>>>> dev
{
    public function testStatusCode()
    {
        $flattened = FlattenException::create(new \RuntimeException(), 403);
        $this->assertEquals('403', $flattened->getStatusCode());

        $flattened = FlattenException::create(new \RuntimeException());
        $this->assertEquals('500', $flattened->getStatusCode());

<<<<<<< HEAD
=======
        $flattened = FlattenException::createFromThrowable(new \DivisionByZeroError(), 403);
        $this->assertEquals('403', $flattened->getStatusCode());

        $flattened = FlattenException::createFromThrowable(new \DivisionByZeroError());
        $this->assertEquals('500', $flattened->getStatusCode());

>>>>>>> dev
        $flattened = FlattenException::create(new NotFoundHttpException());
        $this->assertEquals('404', $flattened->getStatusCode());

        $flattened = FlattenException::create(new UnauthorizedHttpException('Basic realm="My Realm"'));
        $this->assertEquals('401', $flattened->getStatusCode());

        $flattened = FlattenException::create(new BadRequestHttpException());
        $this->assertEquals('400', $flattened->getStatusCode());

        $flattened = FlattenException::create(new NotAcceptableHttpException());
        $this->assertEquals('406', $flattened->getStatusCode());

        $flattened = FlattenException::create(new ConflictHttpException());
        $this->assertEquals('409', $flattened->getStatusCode());

<<<<<<< HEAD
        $flattened = FlattenException::create(new MethodNotAllowedHttpException(array('POST')));
=======
        $flattened = FlattenException::create(new MethodNotAllowedHttpException(['POST']));
>>>>>>> dev
        $this->assertEquals('405', $flattened->getStatusCode());

        $flattened = FlattenException::create(new AccessDeniedHttpException());
        $this->assertEquals('403', $flattened->getStatusCode());

        $flattened = FlattenException::create(new GoneHttpException());
        $this->assertEquals('410', $flattened->getStatusCode());

        $flattened = FlattenException::create(new LengthRequiredHttpException());
        $this->assertEquals('411', $flattened->getStatusCode());

        $flattened = FlattenException::create(new PreconditionFailedHttpException());
        $this->assertEquals('412', $flattened->getStatusCode());

        $flattened = FlattenException::create(new PreconditionRequiredHttpException());
        $this->assertEquals('428', $flattened->getStatusCode());

        $flattened = FlattenException::create(new ServiceUnavailableHttpException());
        $this->assertEquals('503', $flattened->getStatusCode());

        $flattened = FlattenException::create(new TooManyRequestsHttpException());
        $this->assertEquals('429', $flattened->getStatusCode());

        $flattened = FlattenException::create(new UnsupportedMediaTypeHttpException());
        $this->assertEquals('415', $flattened->getStatusCode());
<<<<<<< HEAD
=======

        if (class_exists(SuspiciousOperationException::class)) {
            $flattened = FlattenException::create(new SuspiciousOperationException());
            $this->assertEquals('400', $flattened->getStatusCode());
        }
>>>>>>> dev
    }

    public function testHeadersForHttpException()
    {
<<<<<<< HEAD
        $flattened = FlattenException::create(new MethodNotAllowedHttpException(array('POST')));
        $this->assertEquals(array('Allow' => 'POST'), $flattened->getHeaders());

        $flattened = FlattenException::create(new UnauthorizedHttpException('Basic realm="My Realm"'));
        $this->assertEquals(array('WWW-Authenticate' => 'Basic realm="My Realm"'), $flattened->getHeaders());

        $flattened = FlattenException::create(new ServiceUnavailableHttpException('Fri, 31 Dec 1999 23:59:59 GMT'));
        $this->assertEquals(array('Retry-After' => 'Fri, 31 Dec 1999 23:59:59 GMT'), $flattened->getHeaders());

        $flattened = FlattenException::create(new ServiceUnavailableHttpException(120));
        $this->assertEquals(array('Retry-After' => 120), $flattened->getHeaders());

        $flattened = FlattenException::create(new TooManyRequestsHttpException('Fri, 31 Dec 1999 23:59:59 GMT'));
        $this->assertEquals(array('Retry-After' => 'Fri, 31 Dec 1999 23:59:59 GMT'), $flattened->getHeaders());

        $flattened = FlattenException::create(new TooManyRequestsHttpException(120));
        $this->assertEquals(array('Retry-After' => 120), $flattened->getHeaders());
=======
        $flattened = FlattenException::create(new MethodNotAllowedHttpException(['POST']));
        $this->assertEquals(['Allow' => 'POST'], $flattened->getHeaders());

        $flattened = FlattenException::create(new UnauthorizedHttpException('Basic realm="My Realm"'));
        $this->assertEquals(['WWW-Authenticate' => 'Basic realm="My Realm"'], $flattened->getHeaders());

        $flattened = FlattenException::create(new ServiceUnavailableHttpException('Fri, 31 Dec 1999 23:59:59 GMT'));
        $this->assertEquals(['Retry-After' => 'Fri, 31 Dec 1999 23:59:59 GMT'], $flattened->getHeaders());

        $flattened = FlattenException::create(new ServiceUnavailableHttpException(120));
        $this->assertEquals(['Retry-After' => 120], $flattened->getHeaders());

        $flattened = FlattenException::create(new TooManyRequestsHttpException('Fri, 31 Dec 1999 23:59:59 GMT'));
        $this->assertEquals(['Retry-After' => 'Fri, 31 Dec 1999 23:59:59 GMT'], $flattened->getHeaders());

        $flattened = FlattenException::create(new TooManyRequestsHttpException(120));
        $this->assertEquals(['Retry-After' => 120], $flattened->getHeaders());
>>>>>>> dev
    }

    /**
     * @dataProvider flattenDataProvider
     */
<<<<<<< HEAD
    public function testFlattenHttpException(\Exception $exception, $statusCode)
    {
        $flattened = FlattenException::create($exception);
        $flattened2 = FlattenException::create($exception);
=======
    public function testFlattenHttpException(\Throwable $exception)
    {
        $flattened = FlattenException::createFromThrowable($exception);
        $flattened2 = FlattenException::createFromThrowable($exception);
>>>>>>> dev

        $flattened->setPrevious($flattened2);

        $this->assertEquals($exception->getMessage(), $flattened->getMessage(), 'The message is copied from the original exception.');
        $this->assertEquals($exception->getCode(), $flattened->getCode(), 'The code is copied from the original exception.');
        $this->assertInstanceOf($flattened->getClass(), $exception, 'The class is set to the class of the original exception');
    }

<<<<<<< HEAD
    /**
     * @dataProvider flattenDataProvider
     */
    public function testPrevious(\Exception $exception, $statusCode)
    {
        $flattened = FlattenException::create($exception);
        $flattened2 = FlattenException::create($exception);
=======
    public function testWrappedThrowable()
    {
        $exception = new FatalThrowableError(new \DivisionByZeroError('Ouch', 42));
        $flattened = FlattenException::create($exception);

        $this->assertSame('Ouch', $flattened->getMessage(), 'The message is copied from the original error.');
        $this->assertSame(42, $flattened->getCode(), 'The code is copied from the original error.');
        $this->assertSame('DivisionByZeroError', $flattened->getClass(), 'The class is set to the class of the original error');
    }

    public function testThrowable()
    {
        $error = new \DivisionByZeroError('Ouch', 42);
        $flattened = FlattenException::createFromThrowable($error);

        $this->assertSame('Ouch', $flattened->getMessage(), 'The message is copied from the original error.');
        $this->assertSame(42, $flattened->getCode(), 'The code is copied from the original error.');
        $this->assertSame('DivisionByZeroError', $flattened->getClass(), 'The class is set to the class of the original error');
    }

    /**
     * @dataProvider flattenDataProvider
     */
    public function testPrevious(\Throwable $exception)
    {
        $flattened = FlattenException::createFromThrowable($exception);
        $flattened2 = FlattenException::createFromThrowable($exception);
>>>>>>> dev

        $flattened->setPrevious($flattened2);

        $this->assertSame($flattened2, $flattened->getPrevious());

<<<<<<< HEAD
        $this->assertSame(array($flattened2), $flattened->getAllPrevious());
    }

    /**
     * @requires PHP 7.0
     */
=======
        $this->assertSame([$flattened2], $flattened->getAllPrevious());
    }

>>>>>>> dev
    public function testPreviousError()
    {
        $exception = new \Exception('test', 123, new \ParseError('Oh noes!', 42));

        $flattened = FlattenException::create($exception)->getPrevious();

<<<<<<< HEAD
        $this->assertEquals($flattened->getMessage(), 'Parse error: Oh noes!', 'The message is copied from the original exception.');
        $this->assertEquals($flattened->getCode(), 42, 'The code is copied from the original exception.');
        $this->assertEquals($flattened->getClass(), 'Symfony\Component\Debug\Exception\FatalThrowableError', 'The class is set to the class of the original exception');
=======
        $this->assertEquals($flattened->getMessage(), 'Oh noes!', 'The message is copied from the original exception.');
        $this->assertEquals($flattened->getCode(), 42, 'The code is copied from the original exception.');
        $this->assertEquals($flattened->getClass(), 'ParseError', 'The class is set to the class of the original exception');
>>>>>>> dev
    }

    /**
     * @dataProvider flattenDataProvider
     */
<<<<<<< HEAD
    public function testLine(\Exception $exception)
    {
        $flattened = FlattenException::create($exception);
=======
    public function testLine(\Throwable $exception)
    {
        $flattened = FlattenException::createFromThrowable($exception);
>>>>>>> dev
        $this->assertSame($exception->getLine(), $flattened->getLine());
    }

    /**
     * @dataProvider flattenDataProvider
     */
<<<<<<< HEAD
    public function testFile(\Exception $exception)
    {
        $flattened = FlattenException::create($exception);
=======
    public function testFile(\Throwable $exception)
    {
        $flattened = FlattenException::createFromThrowable($exception);
>>>>>>> dev
        $this->assertSame($exception->getFile(), $flattened->getFile());
    }

    /**
     * @dataProvider flattenDataProvider
     */
<<<<<<< HEAD
    public function testToArray(\Exception $exception, $statusCode)
    {
        $flattened = FlattenException::create($exception);
        $flattened->setTrace(array(), 'foo.php', 123);

        $this->assertEquals(array(
            array(
                'message' => 'test',
                'class' => 'Exception',
                'trace' => array(array(
                    'namespace' => '', 'short_class' => '', 'class' => '', 'type' => '', 'function' => '', 'file' => 'foo.php', 'line' => 123,
                    'args' => array(),
                )),
            ),
        ), $flattened->toArray());
    }

    public function flattenDataProvider()
    {
        return array(
            array(new \Exception('test', 123), 500),
        );
=======
    public function testToArray(\Throwable $exception, string $expectedClass)
    {
        $flattened = FlattenException::createFromThrowable($exception);
        $flattened->setTrace([], 'foo.php', 123);

        $this->assertEquals([
            [
                'message' => 'test',
                'class' => $expectedClass,
                'trace' => [[
                    'namespace' => '', 'short_class' => '', 'class' => '', 'type' => '', 'function' => '', 'file' => 'foo.php', 'line' => 123,
                    'args' => [],
                ]],
            ],
        ], $flattened->toArray());
    }

    public function testCreate()
    {
        $exception = new NotFoundHttpException(
            'test',
            new \RuntimeException('previous', 123)
        );

        $this->assertSame(
            FlattenException::createFromThrowable($exception)->toArray(),
            FlattenException::create($exception)->toArray()
        );
    }

    public function flattenDataProvider()
    {
        return [
            [new \Exception('test', 123), 'Exception'],
            [new \Error('test', 123), 'Error'],
        ];
    }

    public function testArguments()
    {
        $dh = opendir(__DIR__);
        $fh = tmpfile();

        $incomplete = unserialize('O:14:"BogusTestClass":0:{}');

        $exception = $this->createException([
            (object) ['foo' => 1],
            new NotFoundHttpException(),
            $incomplete,
            $dh,
            $fh,
            function () {},
            [1, 2],
            ['foo' => 123],
            null,
            true,
            false,
            0,
            0.0,
            '0',
            '',
            INF,
            NAN,
        ]);

        $flattened = FlattenException::create($exception);
        $trace = $flattened->getTrace();
        $args = $trace[1]['args'];
        $array = $args[0][1];

        closedir($dh);
        fclose($fh);

        $i = 0;
        $this->assertSame(['object', 'stdClass'], $array[$i++]);
        $this->assertSame(['object', 'Symfony\Component\HttpKernel\Exception\NotFoundHttpException'], $array[$i++]);
        $this->assertSame(['incomplete-object', 'BogusTestClass'], $array[$i++]);
        $this->assertSame(['resource', 'stream'], $array[$i++]);
        $this->assertSame(['resource', 'stream'], $array[$i++]);

        $args = $array[$i++];
        $this->assertSame($args[0], 'object');
        $this->assertTrue('Closure' === $args[1] || is_subclass_of($args[1], '\Closure'), 'Expect object class name to be Closure or a subclass of Closure.');

        $this->assertSame(['array', [['integer', 1], ['integer', 2]]], $array[$i++]);
        $this->assertSame(['array', ['foo' => ['integer', 123]]], $array[$i++]);
        $this->assertSame(['null', null], $array[$i++]);
        $this->assertSame(['boolean', true], $array[$i++]);
        $this->assertSame(['boolean', false], $array[$i++]);
        $this->assertSame(['integer', 0], $array[$i++]);
        $this->assertSame(['float', 0.0], $array[$i++]);
        $this->assertSame(['string', '0'], $array[$i++]);
        $this->assertSame(['string', ''], $array[$i++]);
        $this->assertSame(['float', INF], $array[$i++]);

        // assertEquals() does not like NAN values.
        $this->assertEquals($array[$i][0], 'float');
        $this->assertTrue(is_nan($array[$i++][1]));
>>>>>>> dev
    }

    public function testRecursionInArguments()
    {
<<<<<<< HEAD
        $a = array('foo', array(2, &$a));
=======
        $a = null;
        $a = ['foo', [2, &$a]];
>>>>>>> dev
        $exception = $this->createException($a);

        $flattened = FlattenException::create($exception);
        $trace = $flattened->getTrace();
        $this->assertContains('*DEEP NESTED ARRAY*', serialize($trace));
    }

    public function testTooBigArray()
    {
<<<<<<< HEAD
        $a = array();
=======
        $a = [];
>>>>>>> dev
        for ($i = 0; $i < 20; ++$i) {
            for ($j = 0; $j < 50; ++$j) {
                for ($k = 0; $k < 10; ++$k) {
                    $a[$i][$j][$k] = 'value';
                }
            }
        }
        $a[20] = 'value';
        $a[21] = 'value1';
        $exception = $this->createException($a);

        $flattened = FlattenException::create($exception);
        $trace = $flattened->getTrace();
<<<<<<< HEAD
=======

        $this->assertSame($trace[1]['args'][0], ['array', ['array', '*SKIPPED over 10000 entries*']]);

>>>>>>> dev
        $serializeTrace = serialize($trace);

        $this->assertContains('*SKIPPED over 10000 entries*', $serializeTrace);
        $this->assertNotContains('*value1*', $serializeTrace);
    }

<<<<<<< HEAD
    private function createException($foo)
    {
        return new \Exception();
    }

    public function testSetTraceIncompleteClass()
    {
        $flattened = FlattenException::create(new \Exception('test', 123));
        $flattened->setTrace(
            array(
                array(
                    'file' => __FILE__,
                    'line' => 123,
                    'function' => 'test',
                    'args' => array(
                        unserialize('O:14:"BogusTestClass":0:{}'),
                    ),
                ),
            ),
            'foo.php', 123
        );

        $this->assertEquals(array(
            array(
                'message' => 'test',
                'class' => 'Exception',
                'trace' => array(
                    array(
                        'namespace' => '', 'short_class' => '', 'class' => '', 'type' => '', 'function' => '',
                        'file' => 'foo.php', 'line' => 123,
                        'args' => array(),
                    ),
                    array(
                        'namespace' => '', 'short_class' => '', 'class' => '', 'type' => '', 'function' => 'test',
                        'file' => __FILE__, 'line' => 123,
                        'args' => array(
                            array(
                                'incomplete-object', 'BogusTestClass',
                            ),
                        ),
                    ),
                ),
            ),
        ), $flattened->toArray());
=======
    public function testAnonymousClass()
    {
        $flattened = FlattenException::create(new class() extends \RuntimeException {
        });

        $this->assertSame('RuntimeException@anonymous', $flattened->getClass());

        $flattened = FlattenException::create(new \Exception(sprintf('Class "%s" blah.', \get_class(new class() extends \RuntimeException {
        }))));

        $this->assertSame('Class "RuntimeException@anonymous" blah.', $flattened->getMessage());
    }

    private function createException($foo)
    {
        return new \Exception();
>>>>>>> dev
    }
}
