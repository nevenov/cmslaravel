<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\EventListener;

<<<<<<< HEAD
use Psr\Log\LogLevel;
use Symfony\Component\Console\Event\ConsoleEvent;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\ConsoleEvents;
=======
use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleEvent;
>>>>>>> dev
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\EventListener\DebugHandlersListener;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
<<<<<<< HEAD
 * DebugHandlersListenerTest.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DebugHandlersListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testConfigure()
    {
        $logger = $this->getMock('Psr\Log\LoggerInterface');
=======
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DebugHandlersListenerTest extends TestCase
{
    public function testConfigure()
    {
        $logger = $this->getMockBuilder('Psr\Log\LoggerInterface')->getMock();
>>>>>>> dev
        $userHandler = function () {};
        $listener = new DebugHandlersListener($userHandler, $logger);
        $xHandler = new ExceptionHandler();
        $eHandler = new ErrorHandler();
<<<<<<< HEAD
        $eHandler->setExceptionHandler(array($xHandler, 'handle'));

        $exception = null;
        set_error_handler(array($eHandler, 'handleError'));
        set_exception_handler(array($eHandler, 'handleException'));
=======
        $eHandler->setExceptionHandler([$xHandler, 'handle']);

        $exception = null;
        set_error_handler([$eHandler, 'handleError']);
        set_exception_handler([$eHandler, 'handleException']);
>>>>>>> dev
        try {
            $listener->configure();
        } catch (\Exception $exception) {
        }
        restore_exception_handler();
        restore_error_handler();

        if (null !== $exception) {
            throw $exception;
        }

        $this->assertSame($userHandler, $xHandler->setHandler('var_dump'));

<<<<<<< HEAD
        $loggers = $eHandler->setLoggers(array());

        $this->assertArrayHasKey(E_DEPRECATED, $loggers);
        $this->assertSame(array($logger, LogLevel::INFO), $loggers[E_DEPRECATED]);
=======
        $loggers = $eHandler->setLoggers([]);

        $this->assertArrayHasKey(E_DEPRECATED, $loggers);
        $this->assertSame([$logger, LogLevel::INFO], $loggers[E_DEPRECATED]);
>>>>>>> dev
    }

    public function testConfigureForHttpKernelWithNoTerminateWithException()
    {
        $listener = new DebugHandlersListener(null);
        $eHandler = new ErrorHandler();
        $event = new KernelEvent(
<<<<<<< HEAD
            $this->getMock('Symfony\Component\HttpKernel\HttpKernelInterface'),
=======
            $this->getMockBuilder('Symfony\Component\HttpKernel\HttpKernelInterface')->getMock(),
>>>>>>> dev
            Request::create('/'),
            HttpKernelInterface::MASTER_REQUEST
        );

        $exception = null;
<<<<<<< HEAD
        $h = set_exception_handler(array($eHandler, 'handleException'));
=======
        $h = set_exception_handler([$eHandler, 'handleException']);
>>>>>>> dev
        try {
            $listener->configure($event);
        } catch (\Exception $exception) {
        }
        restore_exception_handler();

        if (null !== $exception) {
            throw $exception;
        }

        $this->assertNull($h);
    }

    public function testConsoleEvent()
    {
        $dispatcher = new EventDispatcher();
        $listener = new DebugHandlersListener(null);
<<<<<<< HEAD
        $app = $this->getMock('Symfony\Component\Console\Application');
=======
        $app = $this->getMockBuilder('Symfony\Component\Console\Application')->getMock();
>>>>>>> dev
        $app->expects($this->once())->method('getHelperSet')->will($this->returnValue(new HelperSet()));
        $command = new Command(__FUNCTION__);
        $command->setApplication($app);
        $event = new ConsoleEvent($command, new ArgvInput(), new ConsoleOutput());

        $dispatcher->addSubscriber($listener);

<<<<<<< HEAD
        $xListeners = array(
            KernelEvents::REQUEST => array(array($listener, 'configure')),
            ConsoleEvents::COMMAND => array(array($listener, 'configure')),
        );
=======
        $xListeners = [
            KernelEvents::REQUEST => [[$listener, 'configure']],
            ConsoleEvents::COMMAND => [[$listener, 'configure']],
        ];
>>>>>>> dev
        $this->assertSame($xListeners, $dispatcher->getListeners());

        $exception = null;
        $eHandler = new ErrorHandler();
<<<<<<< HEAD
        set_error_handler(array($eHandler, 'handleError'));
        set_exception_handler(array($eHandler, 'handleException'));
=======
        set_error_handler([$eHandler, 'handleError']);
        set_exception_handler([$eHandler, 'handleException']);
>>>>>>> dev
        try {
            $dispatcher->dispatch(ConsoleEvents::COMMAND, $event);
        } catch (\Exception $exception) {
        }
        restore_exception_handler();
        restore_error_handler();

        if (null !== $exception) {
            throw $exception;
        }

        $xHandler = $eHandler->setExceptionHandler('var_dump');
        $this->assertInstanceOf('Closure', $xHandler);

        $app->expects($this->once())
            ->method('renderException');

        $xHandler(new \Exception());
    }
<<<<<<< HEAD
=======

    public function testReplaceExistingExceptionHandler()
    {
        $userHandler = function () {};
        $listener = new DebugHandlersListener($userHandler);
        $eHandler = new ErrorHandler();
        $eHandler->setExceptionHandler('var_dump');

        $exception = null;
        set_exception_handler([$eHandler, 'handleException']);
        try {
            $listener->configure();
        } catch (\Exception $exception) {
        }
        restore_exception_handler();

        if (null !== $exception) {
            throw $exception;
        }

        $this->assertSame($userHandler, $eHandler->setExceptionHandler('var_dump'));
    }
>>>>>>> dev
}
