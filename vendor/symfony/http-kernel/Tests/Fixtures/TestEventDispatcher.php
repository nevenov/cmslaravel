<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests\Fixtures;

<<<<<<< HEAD
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TestEventDispatcher extends EventDispatcher implements TraceableEventDispatcherInterface
{
    public function getCalledListeners()
    {
        return array('foo');
=======
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher;

class TestEventDispatcher extends TraceableEventDispatcher
{
    public function getCalledListeners()
    {
        return ['foo'];
>>>>>>> dev
    }

    public function getNotCalledListeners()
    {
<<<<<<< HEAD
        return array('bar');
=======
        return ['bar'];
    }

    public function reset()
    {
    }

    public function getOrphanedEvents()
    {
        return [];
>>>>>>> dev
    }
}
