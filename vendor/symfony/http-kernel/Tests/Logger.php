<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Tests;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{
    protected $logs;

    public function __construct()
    {
        $this->clear();
    }

    public function getLogs($level = false)
    {
        return false === $level ? $this->logs : $this->logs[$level];
    }

    public function clear()
    {
<<<<<<< HEAD
        $this->logs = array(
            'emergency' => array(),
            'alert' => array(),
            'critical' => array(),
            'error' => array(),
            'warning' => array(),
            'notice' => array(),
            'info' => array(),
            'debug' => array(),
        );
    }

    public function log($level, $message, array $context = array())
=======
        $this->logs = [
            'emergency' => [],
            'alert' => [],
            'critical' => [],
            'error' => [],
            'warning' => [],
            'notice' => [],
            'info' => [],
            'debug' => [],
        ];
    }

    public function log($level, $message, array $context = [])
>>>>>>> dev
    {
        $this->logs[$level][] = $message;
    }

<<<<<<< HEAD
    public function emergency($message, array $context = array())
=======
    public function emergency($message, array $context = [])
>>>>>>> dev
    {
        $this->log('emergency', $message, $context);
    }

<<<<<<< HEAD
    public function alert($message, array $context = array())
=======
    public function alert($message, array $context = [])
>>>>>>> dev
    {
        $this->log('alert', $message, $context);
    }

<<<<<<< HEAD
    public function critical($message, array $context = array())
=======
    public function critical($message, array $context = [])
>>>>>>> dev
    {
        $this->log('critical', $message, $context);
    }

<<<<<<< HEAD
    public function error($message, array $context = array())
=======
    public function error($message, array $context = [])
>>>>>>> dev
    {
        $this->log('error', $message, $context);
    }

<<<<<<< HEAD
    public function warning($message, array $context = array())
=======
    public function warning($message, array $context = [])
>>>>>>> dev
    {
        $this->log('warning', $message, $context);
    }

<<<<<<< HEAD
    public function notice($message, array $context = array())
=======
    public function notice($message, array $context = [])
>>>>>>> dev
    {
        $this->log('notice', $message, $context);
    }

<<<<<<< HEAD
    public function info($message, array $context = array())
=======
    public function info($message, array $context = [])
>>>>>>> dev
    {
        $this->log('info', $message, $context);
    }

<<<<<<< HEAD
    public function debug($message, array $context = array())
=======
    public function debug($message, array $context = [])
>>>>>>> dev
    {
        $this->log('debug', $message, $context);
    }
}
