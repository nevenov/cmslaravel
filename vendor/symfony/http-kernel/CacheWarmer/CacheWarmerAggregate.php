<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\CacheWarmer;

/**
 * Aggregates several cache warmers into a single one.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 */
class CacheWarmerAggregate implements CacheWarmerInterface
{
    protected $warmers = array();
    protected $optionalsEnabled = false;

    public function __construct(array $warmers = array())
    {
        foreach ($warmers as $warmer) {
            $this->add($warmer);
        }
=======
 *
 * @final
 */
class CacheWarmerAggregate implements CacheWarmerInterface
{
    private $warmers;
    private $debug;
    private $deprecationLogsFilepath;
    private $optionalsEnabled = false;
    private $onlyOptionalsEnabled = false;

    public function __construct(iterable $warmers = [], bool $debug = false, string $deprecationLogsFilepath = null)
    {
        $this->warmers = $warmers;
        $this->debug = $debug;
        $this->deprecationLogsFilepath = $deprecationLogsFilepath;
>>>>>>> dev
    }

    public function enableOptionalWarmers()
    {
        $this->optionalsEnabled = true;
    }

<<<<<<< HEAD
=======
    public function enableOnlyOptionalWarmers()
    {
        $this->onlyOptionalsEnabled = $this->optionalsEnabled = true;
    }

>>>>>>> dev
    /**
     * Warms up the cache.
     *
     * @param string $cacheDir The cache directory
     */
    public function warmUp($cacheDir)
    {
<<<<<<< HEAD
        foreach ($this->warmers as $warmer) {
            if (!$this->optionalsEnabled && $warmer->isOptional()) {
                continue;
            }

            $warmer->warmUp($cacheDir);
=======
        if ($this->debug) {
            $collectedLogs = [];
            $previousHandler = \defined('PHPUNIT_COMPOSER_INSTALL');
            $previousHandler = $previousHandler ?: set_error_handler(function ($type, $message, $file, $line) use (&$collectedLogs, &$previousHandler) {
                if (E_USER_DEPRECATED !== $type && E_DEPRECATED !== $type) {
                    return $previousHandler ? $previousHandler($type, $message, $file, $line) : false;
                }

                if (isset($collectedLogs[$message])) {
                    ++$collectedLogs[$message]['count'];

                    return;
                }

                $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);
                // Clean the trace by removing first frames added by the error handler itself.
                for ($i = 0; isset($backtrace[$i]); ++$i) {
                    if (isset($backtrace[$i]['file'], $backtrace[$i]['line']) && $backtrace[$i]['line'] === $line && $backtrace[$i]['file'] === $file) {
                        $backtrace = \array_slice($backtrace, 1 + $i);
                        break;
                    }
                }

                $collectedLogs[$message] = [
                    'type' => $type,
                    'message' => $message,
                    'file' => $file,
                    'line' => $line,
                    'trace' => $backtrace,
                    'count' => 1,
                ];
            });
        }

        try {
            foreach ($this->warmers as $warmer) {
                if (!$this->optionalsEnabled && $warmer->isOptional()) {
                    continue;
                }
                if ($this->onlyOptionalsEnabled && !$warmer->isOptional()) {
                    continue;
                }

                $warmer->warmUp($cacheDir);
            }
        } finally {
            if ($this->debug && true !== $previousHandler) {
                restore_error_handler();

                if (file_exists($this->deprecationLogsFilepath)) {
                    $previousLogs = unserialize(file_get_contents($this->deprecationLogsFilepath));
                    $collectedLogs = array_merge($previousLogs, $collectedLogs);
                }

                file_put_contents($this->deprecationLogsFilepath, serialize(array_values($collectedLogs)));
            }
>>>>>>> dev
        }
    }

    /**
     * Checks whether this warmer is optional or not.
     *
     * @return bool always false
     */
    public function isOptional()
    {
        return false;
    }
<<<<<<< HEAD

    public function setWarmers(array $warmers)
    {
        $this->warmers = array();
        foreach ($warmers as $warmer) {
            $this->add($warmer);
        }
    }

    public function add(CacheWarmerInterface $warmer)
    {
        $this->warmers[] = $warmer;
    }
=======
>>>>>>> dev
}
