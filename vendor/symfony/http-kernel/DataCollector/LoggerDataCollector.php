<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;
=======
use Symfony\Component\Debug\Exception\SilencedErrorContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
>>>>>>> dev
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

/**
 * LogDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class LoggerDataCollector extends DataCollector implements LateDataCollectorInterface
{
<<<<<<< HEAD
    private $errorNames = array(
        E_DEPRECATED => 'E_DEPRECATED',
        E_USER_DEPRECATED => 'E_USER_DEPRECATED',
        E_NOTICE => 'E_NOTICE',
        E_USER_NOTICE => 'E_USER_NOTICE',
        E_STRICT => 'E_STRICT',
        E_WARNING => 'E_WARNING',
        E_USER_WARNING => 'E_USER_WARNING',
        E_COMPILE_WARNING => 'E_COMPILE_WARNING',
        E_CORE_WARNING => 'E_CORE_WARNING',
        E_USER_ERROR => 'E_USER_ERROR',
        E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR',
        E_COMPILE_ERROR => 'E_COMPILE_ERROR',
        E_PARSE => 'E_PARSE',
        E_ERROR => 'E_ERROR',
        E_CORE_ERROR => 'E_CORE_ERROR',
    );

    private $logger;

    public function __construct($logger = null)
=======
    private $logger;
    private $containerPathPrefix;
    private $currentRequest;
    private $requestStack;

    public function __construct($logger = null, string $containerPathPrefix = null, RequestStack $requestStack = null)
>>>>>>> dev
    {
        if (null !== $logger && $logger instanceof DebugLoggerInterface) {
            $this->logger = $logger;
        }
<<<<<<< HEAD
=======

        $this->containerPathPrefix = $containerPathPrefix;
        $this->requestStack = $requestStack;
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
<<<<<<< HEAD
        // everything is done as late as possible
=======
        $this->currentRequest = $this->requestStack && $this->requestStack->getMasterRequest() !== $request ? $request : null;
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function lateCollect()
    {
        if (null !== $this->logger) {
            $this->data = $this->computeErrorsCount();
            $this->data['logs'] = $this->sanitizeLogs($this->logger->getLogs());
        }
    }

    /**
     * Gets the called events.
     *
     * @return array An array of called events
     *
     * @see TraceableEventDispatcherInterface
     */
    public function countErrors()
    {
        return isset($this->data['error_count']) ? $this->data['error_count'] : 0;
=======
    public function reset()
    {
        if ($this->logger instanceof DebugLoggerInterface) {
            $this->logger->clear();
        }
        $this->data = [];
    }

    /**
     * {@inheritdoc}
     */
    public function lateCollect()
    {
        if (null !== $this->logger) {
            $containerDeprecationLogs = $this->getContainerDeprecationLogs();
            $this->data = $this->computeErrorsCount($containerDeprecationLogs);
            $this->data['compiler_logs'] = $this->getContainerCompilerLogs();
            $this->data['logs'] = $this->sanitizeLogs(array_merge($this->logger->getLogs($this->currentRequest), $containerDeprecationLogs));
            $this->data = $this->cloneVar($this->data);
        }
        $this->currentRequest = null;
>>>>>>> dev
    }

    /**
     * Gets the logs.
     *
     * @return array An array of logs
     */
    public function getLogs()
    {
<<<<<<< HEAD
        return isset($this->data['logs']) ? $this->data['logs'] : array();
=======
        return isset($this->data['logs']) ? $this->data['logs'] : [];
>>>>>>> dev
    }

    public function getPriorities()
    {
<<<<<<< HEAD
        return isset($this->data['priorities']) ? $this->data['priorities'] : array();
=======
        return isset($this->data['priorities']) ? $this->data['priorities'] : [];
    }

    public function countErrors()
    {
        return isset($this->data['error_count']) ? $this->data['error_count'] : 0;
>>>>>>> dev
    }

    public function countDeprecations()
    {
        return isset($this->data['deprecation_count']) ? $this->data['deprecation_count'] : 0;
    }

<<<<<<< HEAD
=======
    public function countWarnings()
    {
        return isset($this->data['warning_count']) ? $this->data['warning_count'] : 0;
    }

>>>>>>> dev
    public function countScreams()
    {
        return isset($this->data['scream_count']) ? $this->data['scream_count'] : 0;
    }

<<<<<<< HEAD
=======
    public function getCompilerLogs()
    {
        return isset($this->data['compiler_logs']) ? $this->data['compiler_logs'] : [];
    }

>>>>>>> dev
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'logger';
    }

<<<<<<< HEAD
    private function sanitizeLogs($logs)
    {
        $errorContextById = array();
        $sanitizedLogs = array();

        foreach ($logs as $log) {
            $context = $this->sanitizeContext($log['context']);

            if (isset($context['type'], $context['file'], $context['line'], $context['level'])) {
                $errorId = md5("{$context['type']}/{$context['line']}/{$context['file']}\x00{$log['message']}", true);
                $silenced = !($context['type'] & $context['level']);
                if (isset($this->errorNames[$context['type']])) {
                    $context = array_merge(array('name' => $this->errorNames[$context['type']]), $context);
                }

                if (isset($errorContextById[$errorId])) {
                    if (isset($errorContextById[$errorId]['errorCount'])) {
                        ++$errorContextById[$errorId]['errorCount'];
                    } else {
                        $errorContextById[$errorId]['errorCount'] = 2;
                    }

                    if (!$silenced && isset($errorContextById[$errorId]['scream'])) {
                        unset($errorContextById[$errorId]['scream']);
                        $errorContextById[$errorId]['level'] = $context['level'];
                    }

                    continue;
                }

                $errorContextById[$errorId] = &$context;
                if ($silenced) {
                    $context['scream'] = true;
                }

                $log['context'] = &$context;
                unset($context);
            } else {
                $log['context'] = $context;
            }

            $sanitizedLogs[] = $log;
        }

        return $sanitizedLogs;
    }

    private function sanitizeContext($context)
    {
        if (is_array($context)) {
            foreach ($context as $key => $value) {
                $context[$key] = $this->sanitizeContext($value);
            }

            return $context;
        }

        if (is_resource($context)) {
            return sprintf('Resource(%s)', get_resource_type($context));
        }

        if (is_object($context)) {
            return sprintf('Object(%s)', get_class($context));
        }

        return $context;
    }

    private function computeErrorsCount()
    {
        $count = array(
            'error_count' => $this->logger->countErrors(),
            'deprecation_count' => 0,
            'scream_count' => 0,
            'priorities' => array(),
        );

        foreach ($this->logger->getLogs() as $log) {
            if (isset($count['priorities'][$log['priority']])) {
                ++$count['priorities'][$log['priority']]['count'];
            } else {
                $count['priorities'][$log['priority']] = array(
                    'count' => 1,
                    'name' => $log['priorityName'],
                );
            }

            if (isset($log['context']['type'], $log['context']['level'])) {
                if (E_DEPRECATED === $log['context']['type'] || E_USER_DEPRECATED === $log['context']['type']) {
                    ++$count['deprecation_count'];
                } elseif (!($log['context']['type'] & $log['context']['level'])) {
                    ++$count['scream_count'];
=======
    private function getContainerDeprecationLogs()
    {
        if (null === $this->containerPathPrefix || !file_exists($file = $this->containerPathPrefix.'Deprecations.log')) {
            return [];
        }

        if ('' === $logContent = trim(file_get_contents($file))) {
            return [];
        }

        $bootTime = filemtime($file);
        $logs = [];
        foreach (unserialize($logContent) as $log) {
            $log['context'] = ['exception' => new SilencedErrorContext($log['type'], $log['file'], $log['line'], $log['trace'], $log['count'])];
            $log['timestamp'] = $bootTime;
            $log['priority'] = 100;
            $log['priorityName'] = 'DEBUG';
            $log['channel'] = null;
            $log['scream'] = false;
            unset($log['type'], $log['file'], $log['line'], $log['trace'], $log['trace'], $log['count']);
            $logs[] = $log;
        }

        return $logs;
    }

    private function getContainerCompilerLogs()
    {
        if (null === $this->containerPathPrefix || !file_exists($file = $this->containerPathPrefix.'Compiler.log')) {
            return [];
        }

        $logs = [];
        foreach (file($file, FILE_IGNORE_NEW_LINES) as $log) {
            $log = explode(': ', $log, 2);
            if (!isset($log[1]) || !preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*+(?:\\\\[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*+)++$/', $log[0])) {
                $log = ['Unknown Compiler Pass', implode(': ', $log)];
            }

            $logs[$log[0]][] = ['message' => $log[1]];
        }

        return $logs;
    }

    private function sanitizeLogs($logs)
    {
        $sanitizedLogs = [];
        $silencedLogs = [];

        foreach ($logs as $log) {
            if (!$this->isSilencedOrDeprecationErrorLog($log)) {
                $sanitizedLogs[] = $log;

                continue;
            }

            $message = $log['message'];
            $exception = $log['context']['exception'];

            if ($exception instanceof SilencedErrorContext) {
                if (isset($silencedLogs[$h = spl_object_hash($exception)])) {
                    continue;
                }
                $silencedLogs[$h] = true;

                if (!isset($sanitizedLogs[$message])) {
                    $sanitizedLogs[$message] = $log + [
                        'errorCount' => 0,
                        'scream' => true,
                    ];
                }
                $sanitizedLogs[$message]['errorCount'] += $exception->count;

                continue;
            }

            $errorId = md5("{$exception->getSeverity()}/{$exception->getLine()}/{$exception->getFile()}\0{$message}", true);

            if (isset($sanitizedLogs[$errorId])) {
                ++$sanitizedLogs[$errorId]['errorCount'];
            } else {
                $log += [
                    'errorCount' => 1,
                    'scream' => false,
                ];

                $sanitizedLogs[$errorId] = $log;
            }
        }

        return array_values($sanitizedLogs);
    }

    private function isSilencedOrDeprecationErrorLog(array $log)
    {
        if (!isset($log['context']['exception'])) {
            return false;
        }

        $exception = $log['context']['exception'];

        if ($exception instanceof SilencedErrorContext) {
            return true;
        }

        if ($exception instanceof \ErrorException && \in_array($exception->getSeverity(), [E_DEPRECATED, E_USER_DEPRECATED], true)) {
            return true;
        }

        return false;
    }

    private function computeErrorsCount(array $containerDeprecationLogs)
    {
        $silencedLogs = [];
        $count = [
            'error_count' => $this->logger->countErrors($this->currentRequest),
            'deprecation_count' => 0,
            'warning_count' => 0,
            'scream_count' => 0,
            'priorities' => [],
        ];

        foreach ($this->logger->getLogs($this->currentRequest) as $log) {
            if (isset($count['priorities'][$log['priority']])) {
                ++$count['priorities'][$log['priority']]['count'];
            } else {
                $count['priorities'][$log['priority']] = [
                    'count' => 1,
                    'name' => $log['priorityName'],
                ];
            }
            if ('WARNING' === $log['priorityName']) {
                ++$count['warning_count'];
            }

            if ($this->isSilencedOrDeprecationErrorLog($log)) {
                $exception = $log['context']['exception'];
                if ($exception instanceof SilencedErrorContext) {
                    if (isset($silencedLogs[$h = spl_object_hash($exception)])) {
                        continue;
                    }
                    $silencedLogs[$h] = true;
                    $count['scream_count'] += $exception->count;
                } else {
                    ++$count['deprecation_count'];
>>>>>>> dev
                }
            }
        }

<<<<<<< HEAD
=======
        foreach ($containerDeprecationLogs as $deprecationLog) {
            $count['deprecation_count'] += $deprecationLog['context']['exception']->count;
        }

>>>>>>> dev
        ksort($count['priorities']);

        return $count;
    }
}
