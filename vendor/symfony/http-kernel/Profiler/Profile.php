<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Profiler;

use Symfony\Component\HttpKernel\DataCollector\DataCollectorInterface;

/**
 * Profile.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Profile
{
    private $token;

    /**
     * @var DataCollectorInterface[]
     */
<<<<<<< HEAD
    private $collectors = array();
=======
    private $collectors = [];
>>>>>>> dev

    private $ip;
    private $method;
    private $url;
    private $time;
    private $statusCode;

    /**
     * @var Profile
     */
    private $parent;

    /**
     * @var Profile[]
     */
<<<<<<< HEAD
    private $children = array();

    /**
     * Constructor.
     *
     * @param string $token The token
     */
    public function __construct($token)
=======
    private $children = [];

    public function __construct(string $token)
>>>>>>> dev
    {
        $this->token = $token;
    }

    /**
     * Sets the token.
     *
     * @param string $token The token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Gets the token.
     *
     * @return string The token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Sets the parent token.
<<<<<<< HEAD
     *
     * @param Profile $parent The parent Profile
     */
    public function setParent(Profile $parent)
=======
     */
    public function setParent(self $parent)
>>>>>>> dev
    {
        $this->parent = $parent;
    }

    /**
     * Returns the parent profile.
     *
<<<<<<< HEAD
     * @return Profile The parent profile
=======
     * @return self
>>>>>>> dev
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Returns the parent token.
     *
<<<<<<< HEAD
     * @return null|string The parent token
=======
     * @return string|null The parent token
>>>>>>> dev
     */
    public function getParentToken()
    {
        return $this->parent ? $this->parent->getToken() : null;
    }

    /**
     * Returns the IP.
     *
     * @return string The IP
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Sets the IP.
     *
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Returns the request method.
     *
     * @return string The request method
     */
    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * Returns the URL.
     *
     * @return string The URL
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Returns the time.
     *
<<<<<<< HEAD
     * @return string The time
=======
     * @return int The time
>>>>>>> dev
     */
    public function getTime()
    {
        if (null === $this->time) {
            return 0;
        }

        return $this->time;
    }

<<<<<<< HEAD
=======
    /**
     * @param int $time The time
     */
>>>>>>> dev
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Finds children profilers.
     *
<<<<<<< HEAD
     * @return Profile[] An array of Profile
=======
     * @return self[]
>>>>>>> dev
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Sets children profiler.
     *
<<<<<<< HEAD
     * @param Profile[] $children An array of Profile
     */
    public function setChildren(array $children)
    {
        $this->children = array();
=======
     * @param Profile[] $children
     */
    public function setChildren(array $children)
    {
        $this->children = [];
>>>>>>> dev
        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * Adds the child token.
<<<<<<< HEAD
     *
     * @param Profile $child The child Profile
     */
    public function addChild(Profile $child)
=======
     */
    public function addChild(self $child)
>>>>>>> dev
    {
        $this->children[] = $child;
        $child->setParent($this);
    }

<<<<<<< HEAD
=======
    public function getChildByToken(string $token): ?self
    {
        foreach ($this->children as $child) {
            if ($token === $child->getToken()) {
                return $child;
            }
        }

        return null;
    }

>>>>>>> dev
    /**
     * Gets a Collector by name.
     *
     * @param string $name A collector name
     *
     * @return DataCollectorInterface A DataCollectorInterface instance
     *
     * @throws \InvalidArgumentException if the collector does not exist
     */
    public function getCollector($name)
    {
        if (!isset($this->collectors[$name])) {
            throw new \InvalidArgumentException(sprintf('Collector "%s" does not exist.', $name));
        }

        return $this->collectors[$name];
    }

    /**
     * Gets the Collectors associated with this profile.
     *
     * @return DataCollectorInterface[]
     */
    public function getCollectors()
    {
        return $this->collectors;
    }

    /**
     * Sets the Collectors associated with this profile.
     *
     * @param DataCollectorInterface[] $collectors
     */
    public function setCollectors(array $collectors)
    {
<<<<<<< HEAD
        $this->collectors = array();
=======
        $this->collectors = [];
>>>>>>> dev
        foreach ($collectors as $collector) {
            $this->addCollector($collector);
        }
    }

    /**
     * Adds a Collector.
<<<<<<< HEAD
     *
     * @param DataCollectorInterface $collector A DataCollectorInterface instance
=======
>>>>>>> dev
     */
    public function addCollector(DataCollectorInterface $collector)
    {
        $this->collectors[$collector->getName()] = $collector;
    }

    /**
     * Returns true if a Collector for the given name exists.
     *
     * @param string $name A collector name
     *
     * @return bool
     */
    public function hasCollector($name)
    {
        return isset($this->collectors[$name]);
    }

    public function __sleep()
    {
<<<<<<< HEAD
        return array('token', 'parent', 'children', 'collectors', 'ip', 'method', 'url', 'time');
=======
        return ['token', 'parent', 'children', 'collectors', 'ip', 'method', 'url', 'time', 'statusCode'];
>>>>>>> dev
    }
}
