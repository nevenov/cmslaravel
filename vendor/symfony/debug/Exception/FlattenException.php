<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug\Exception;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

/**
 * FlattenException wraps a PHP Exception to be able to serialize it.
=======
use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

/**
 * FlattenException wraps a PHP Error or Exception to be able to serialize it.
>>>>>>> dev
 *
 * Basically, this class removes all objects from the trace.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FlattenException
{
    private $message;
    private $code;
    private $previous;
    private $trace;
    private $class;
    private $statusCode;
    private $headers;
    private $file;
    private $line;

<<<<<<< HEAD
    public static function create(\Exception $exception, $statusCode = null, array $headers = array())
=======
    public static function create(\Exception $exception, $statusCode = null, array $headers = [])
    {
        return static::createFromThrowable($exception, $statusCode, $headers);
    }

    public static function createFromThrowable(\Throwable $exception, ?int $statusCode = null, array $headers = []): self
>>>>>>> dev
    {
        $e = new static();
        $e->setMessage($exception->getMessage());
        $e->setCode($exception->getCode());

        if ($exception instanceof HttpExceptionInterface) {
            $statusCode = $exception->getStatusCode();
            $headers = array_merge($headers, $exception->getHeaders());
<<<<<<< HEAD
=======
        } elseif ($exception instanceof RequestExceptionInterface) {
            $statusCode = 400;
>>>>>>> dev
        }

        if (null === $statusCode) {
            $statusCode = 500;
        }

        $e->setStatusCode($statusCode);
        $e->setHeaders($headers);
<<<<<<< HEAD
        $e->setTraceFromException($exception);
        $e->setClass(get_class($exception));
=======
        $e->setTraceFromThrowable($exception);
        $e->setClass($exception instanceof FatalThrowableError ? $exception->getOriginalClassName() : \get_class($exception));
>>>>>>> dev
        $e->setFile($exception->getFile());
        $e->setLine($exception->getLine());

        $previous = $exception->getPrevious();

<<<<<<< HEAD
        if ($previous instanceof \Exception) {
            $e->setPrevious(static::create($previous));
        } elseif ($previous instanceof \Throwable) {
            $e->setPrevious(static::create(new FatalThrowableError($previous)));
=======
        if ($previous instanceof \Throwable) {
            $e->setPrevious(static::createFromThrowable($previous));
>>>>>>> dev
        }

        return $e;
    }

    public function toArray()
    {
<<<<<<< HEAD
        $exceptions = array();
        foreach (array_merge(array($this), $this->getAllPrevious()) as $exception) {
            $exceptions[] = array(
                'message' => $exception->getMessage(),
                'class' => $exception->getClass(),
                'trace' => $exception->getTrace(),
            );
=======
        $exceptions = [];
        foreach (array_merge([$this], $this->getAllPrevious()) as $exception) {
            $exceptions[] = [
                'message' => $exception->getMessage(),
                'class' => $exception->getClass(),
                'trace' => $exception->getTrace(),
            ];
>>>>>>> dev
        }

        return $exceptions;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

<<<<<<< HEAD
    public function setStatusCode($code)
    {
        $this->statusCode = $code;
=======
    /**
     * @return $this
     */
    public function setStatusCode($code)
    {
        $this->statusCode = $code;

        return $this;
>>>>>>> dev
    }

    public function getHeaders()
    {
        return $this->headers;
    }

<<<<<<< HEAD
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
=======
    /**
     * @return $this
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
>>>>>>> dev
    }

    public function getClass()
    {
        return $this->class;
    }

<<<<<<< HEAD
    public function setClass($class)
    {
        $this->class = $class;
=======
    /**
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = 'c' === $class[0] && 0 === strpos($class, "class@anonymous\0") ? get_parent_class($class).'@anonymous' : $class;

        return $this;
>>>>>>> dev
    }

    public function getFile()
    {
        return $this->file;
    }

<<<<<<< HEAD
    public function setFile($file)
    {
        $this->file = $file;
=======
    /**
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
>>>>>>> dev
    }

    public function getLine()
    {
        return $this->line;
    }

<<<<<<< HEAD
    public function setLine($line)
    {
        $this->line = $line;
=======
    /**
     * @return $this
     */
    public function setLine($line)
    {
        $this->line = $line;

        return $this;
>>>>>>> dev
    }

    public function getMessage()
    {
        return $this->message;
    }

<<<<<<< HEAD
    public function setMessage($message)
    {
        $this->message = $message;
=======
    /**
     * @return $this
     */
    public function setMessage($message)
    {
        if (false !== strpos($message, "class@anonymous\0")) {
            $message = preg_replace_callback('/class@anonymous\x00.*?\.php0x?[0-9a-fA-F]++/', function ($m) {
                return \class_exists($m[0], false) ? get_parent_class($m[0]).'@anonymous' : $m[0];
            }, $message);
        }

        $this->message = $message;

        return $this;
>>>>>>> dev
    }

    public function getCode()
    {
        return $this->code;
    }

<<<<<<< HEAD
    public function setCode($code)
    {
        $this->code = $code;
=======
    /**
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
>>>>>>> dev
    }

    public function getPrevious()
    {
        return $this->previous;
    }

<<<<<<< HEAD
    public function setPrevious(FlattenException $previous)
    {
        $this->previous = $previous;
=======
    /**
     * @return $this
     */
    public function setPrevious(self $previous)
    {
        $this->previous = $previous;

        return $this;
>>>>>>> dev
    }

    public function getAllPrevious()
    {
<<<<<<< HEAD
        $exceptions = array();
=======
        $exceptions = [];
>>>>>>> dev
        $e = $this;
        while ($e = $e->getPrevious()) {
            $exceptions[] = $e;
        }

        return $exceptions;
    }

    public function getTrace()
    {
        return $this->trace;
    }

<<<<<<< HEAD
    public function setTraceFromException(\Exception $exception)
    {
        $this->setTrace($exception->getTrace(), $exception->getFile(), $exception->getLine());
    }

    public function setTrace($trace, $file, $line)
    {
        $this->trace = array();
        $this->trace[] = array(
=======
    /**
     * @deprecated since 4.1, use {@see setTraceFromThrowable()} instead.
     */
    public function setTraceFromException(\Exception $exception)
    {
        @trigger_error(sprintf('The "%s()" method is deprecated since Symfony 4.1, use "setTraceFromThrowable()" instead.', __METHOD__), E_USER_DEPRECATED);

        $this->setTraceFromThrowable($exception);
    }

    public function setTraceFromThrowable(\Throwable $throwable)
    {
        return $this->setTrace($throwable->getTrace(), $throwable->getFile(), $throwable->getLine());
    }

    /**
     * @return $this
     */
    public function setTrace($trace, $file, $line)
    {
        $this->trace = [];
        $this->trace[] = [
>>>>>>> dev
            'namespace' => '',
            'short_class' => '',
            'class' => '',
            'type' => '',
            'function' => '',
            'file' => $file,
            'line' => $line,
<<<<<<< HEAD
            'args' => array(),
        );
=======
            'args' => [],
        ];
>>>>>>> dev
        foreach ($trace as $entry) {
            $class = '';
            $namespace = '';
            if (isset($entry['class'])) {
                $parts = explode('\\', $entry['class']);
                $class = array_pop($parts);
                $namespace = implode('\\', $parts);
            }

<<<<<<< HEAD
            $this->trace[] = array(
=======
            $this->trace[] = [
>>>>>>> dev
                'namespace' => $namespace,
                'short_class' => $class,
                'class' => isset($entry['class']) ? $entry['class'] : '',
                'type' => isset($entry['type']) ? $entry['type'] : '',
                'function' => isset($entry['function']) ? $entry['function'] : null,
                'file' => isset($entry['file']) ? $entry['file'] : null,
                'line' => isset($entry['line']) ? $entry['line'] : null,
<<<<<<< HEAD
                'args' => isset($entry['args']) ? $this->flattenArgs($entry['args']) : array(),
            );
        }
=======
                'args' => isset($entry['args']) ? $this->flattenArgs($entry['args']) : [],
            ];
        }

        return $this;
>>>>>>> dev
    }

    private function flattenArgs($args, $level = 0, &$count = 0)
    {
<<<<<<< HEAD
        $result = array();
        foreach ($args as $key => $value) {
            if (++$count > 1e4) {
                return array('array', '*SKIPPED over 10000 entries*');
            }
            if (is_object($value)) {
                $result[$key] = array('object', get_class($value));
            } elseif (is_array($value)) {
                if ($level > 10) {
                    $result[$key] = array('array', '*DEEP NESTED ARRAY*');
                } else {
                    $result[$key] = array('array', $this->flattenArgs($value, $level + 1, $count));
                }
            } elseif (null === $value) {
                $result[$key] = array('null', null);
            } elseif (is_bool($value)) {
                $result[$key] = array('boolean', $value);
            } elseif (is_resource($value)) {
                $result[$key] = array('resource', get_resource_type($value));
            } elseif ($value instanceof \__PHP_Incomplete_Class) {
                // Special case of object, is_object will return false
                $result[$key] = array('incomplete-object', $this->getClassNameFromIncomplete($value));
            } else {
                $result[$key] = array('string', (string) $value);
=======
        $result = [];
        foreach ($args as $key => $value) {
            if (++$count > 1e4) {
                return ['array', '*SKIPPED over 10000 entries*'];
            }
            if ($value instanceof \__PHP_Incomplete_Class) {
                // is_object() returns false on PHP<=7.1
                $result[$key] = ['incomplete-object', $this->getClassNameFromIncomplete($value)];
            } elseif (\is_object($value)) {
                $result[$key] = ['object', \get_class($value)];
            } elseif (\is_array($value)) {
                if ($level > 10) {
                    $result[$key] = ['array', '*DEEP NESTED ARRAY*'];
                } else {
                    $result[$key] = ['array', $this->flattenArgs($value, $level + 1, $count)];
                }
            } elseif (null === $value) {
                $result[$key] = ['null', null];
            } elseif (\is_bool($value)) {
                $result[$key] = ['boolean', $value];
            } elseif (\is_int($value)) {
                $result[$key] = ['integer', $value];
            } elseif (\is_float($value)) {
                $result[$key] = ['float', $value];
            } elseif (\is_resource($value)) {
                $result[$key] = ['resource', get_resource_type($value)];
            } else {
                $result[$key] = ['string', (string) $value];
>>>>>>> dev
            }
        }

        return $result;
    }

    private function getClassNameFromIncomplete(\__PHP_Incomplete_Class $value)
    {
        $array = new \ArrayObject($value);

        return $array['__PHP_Incomplete_Class_Name'];
    }
}
