<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

/**
<<<<<<< HEAD
 * NullSessionHandler.
 *
=======
>>>>>>> dev
 * Can be used in unit testing or in a situations where persisted sessions are not desired.
 *
 * @author Drak <drak@zikula.org>
 */
<<<<<<< HEAD
class NullSessionHandler implements \SessionHandlerInterface
=======
class NullSessionHandler extends AbstractSessionHandler
>>>>>>> dev
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function open($savePath, $sessionName)
=======
    public function close()
>>>>>>> dev
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function close()
=======
    public function validateId($sessionId)
>>>>>>> dev
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function read($sessionId)
=======
    protected function doRead($sessionId)
>>>>>>> dev
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function write($sessionId, $data)
=======
    public function updateTimestamp($sessionId, $data)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function doWrite($sessionId, $data)
>>>>>>> dev
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function destroy($sessionId)
=======
    protected function doDestroy($sessionId)
>>>>>>> dev
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function gc($maxlifetime)
    {
        return true;
    }
}
