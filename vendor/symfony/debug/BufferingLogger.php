<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug;

use Psr\Log\AbstractLogger;

/**
 * A buffering logger that stacks logs for later.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class BufferingLogger extends AbstractLogger
{
<<<<<<< HEAD
    private $logs = array();

    public function log($level, $message, array $context = array())
    {
        $this->logs[] = array($level, $message, $context);
=======
    private $logs = [];

    public function log($level, $message, array $context = [])
    {
        $this->logs[] = [$level, $message, $context];
>>>>>>> dev
    }

    public function cleanLogs()
    {
        $logs = $this->logs;
<<<<<<< HEAD
        $this->logs = array();
=======
        $this->logs = [];
>>>>>>> dev

        return $logs;
    }
}
