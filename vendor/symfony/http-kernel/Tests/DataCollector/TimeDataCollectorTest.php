<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\DataCollector\TimeDataCollector;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
=======
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\TimeDataCollector;
use Symfony\Component\Stopwatch\Stopwatch;
>>>>>>> dev

/**
 * @group time-sensitive
 */
<<<<<<< HEAD
class TimeDataCollectorTest extends \PHPUnit_Framework_TestCase
=======
class TimeDataCollectorTest extends TestCase
>>>>>>> dev
{
    public function testCollect()
    {
        $c = new TimeDataCollector();

        $request = new Request();
        $request->server->set('REQUEST_TIME', 1);

        $c->collect($request, new Response());

<<<<<<< HEAD
        $this->assertEquals(1000, $c->getStartTime());
=======
        $this->assertEquals(0, $c->getStartTime());
>>>>>>> dev

        $request->server->set('REQUEST_TIME_FLOAT', 2);

        $c->collect($request, new Response());

        $this->assertEquals(2000, $c->getStartTime());

        $request = new Request();
        $c->collect($request, new Response());
        $this->assertEquals(0, $c->getStartTime());

<<<<<<< HEAD
        $kernel = $this->getMock('Symfony\Component\HttpKernel\KernelInterface');
=======
        $kernel = $this->getMockBuilder('Symfony\Component\HttpKernel\KernelInterface')->getMock();
>>>>>>> dev
        $kernel->expects($this->once())->method('getStartTime')->will($this->returnValue(123456));

        $c = new TimeDataCollector($kernel);
        $request = new Request();
        $request->server->set('REQUEST_TIME', 1);

        $c->collect($request, new Response());
        $this->assertEquals(123456000, $c->getStartTime());
<<<<<<< HEAD
=======
        $this->assertSame(\class_exists(Stopwatch::class, false), $c->isStopwatchInstalled());
>>>>>>> dev
    }
}
