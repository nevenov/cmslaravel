<?php

namespace Illuminate\Cache;

use Illuminate\Contracts\Cache\Store;

class TaggedCache extends Repository
{
<<<<<<< HEAD
    use RetrievesMultipleKeys;
=======
    use RetrievesMultipleKeys {
        putMany as putManyAlias;
    }
>>>>>>> dev

    /**
     * The tag set instance.
     *
     * @var \Illuminate\Cache\TagSet
     */
    protected $tags;

    /**
     * Create a new tagged cache instance.
     *
     * @param  \Illuminate\Contracts\Cache\Store  $store
     * @param  \Illuminate\Cache\TagSet  $tags
     * @return void
     */
    public function __construct(Store $store, TagSet $tags)
    {
        parent::__construct($store);

        $this->tags = $tags;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    protected function fireCacheEvent($event, $payload)
    {
        $payload[] = $this->tags->getNames();

        parent::fireCacheEvent($event, $payload);
=======
     * Store multiple items in the cache for a given number of seconds.
     *
     * @param  array  $values
     * @param  int|null  $ttl
     * @return bool
     */
    public function putMany(array $values, $ttl = null)
    {
        if ($ttl === null) {
            return $this->putManyForever($values);
        }

        return $this->putManyAlias($values, $ttl);
>>>>>>> dev
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function increment($key, $value = 1)
    {
        $this->store->increment($this->itemKey($key), $value);
    }

    /**
<<<<<<< HEAD
     * Increment the value of an item in the cache.
=======
     * Decrement the value of an item in the cache.
>>>>>>> dev
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function decrement($key, $value = 1)
    {
        $this->store->decrement($this->itemKey($key), $value);
    }

    /**
     * Remove all items from the cache.
     *
<<<<<<< HEAD
     * @return void
=======
     * @return bool
>>>>>>> dev
     */
    public function flush()
    {
        $this->tags->reset();
<<<<<<< HEAD
=======

        return true;
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
    protected function itemKey($key)
    {
        return $this->taggedItemKey($key);
    }

    /**
     * Get a fully qualified key for a tagged item.
     *
     * @param  string  $key
     * @return string
     */
    public function taggedItemKey($key)
    {
        return sha1($this->tags->getNamespace()).':'.$key;
    }
<<<<<<< HEAD
=======

    /**
     * Fire an event for this cache instance.
     *
     * @param  string  $event
     * @return void
     */
    protected function event($event)
    {
        parent::event($event->setTags($this->tags->getNames()));
    }

    /**
     * Get the tag set instance.
     *
     * @return \Illuminate\Cache\TagSet
     */
    public function getTags()
    {
        return $this->tags;
    }
>>>>>>> dev
}
