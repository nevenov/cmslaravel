<?php

namespace Illuminate\Cache;

class RedisTaggedCache extends TaggedCache
{
    /**
     * Forever reference key.
     *
     * @var string
     */
    const REFERENCE_KEY_FOREVER = 'forever_ref';
    /**
     * Standard reference key.
     *
     * @var string
     */
    const REFERENCE_KEY_STANDARD = 'standard_ref';

    /**
     * Store an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
<<<<<<< HEAD
     * @param  \DateTime|int  $minutes
     * @return void
     */
    public function put($key, $value, $minutes = null)
    {
        $this->pushStandardKeys($this->tags->getNamespace(), $key);

        parent::put($key, $value, $minutes);
    }

    /**
     * Store an item in the cache indefinitely.
=======
     * @param  \DateTimeInterface|\DateInterval|int|null  $ttl
     * @return bool
     */
    public function put($key, $value, $ttl = null)
    {
        if ($ttl === null) {
            return $this->forever($key, $value);
        }

        $this->pushStandardKeys($this->tags->getNamespace(), $key);

        return parent::put($key, $value, $ttl);
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
        $this->pushStandardKeys($this->tags->getNamespace(), $key);

        parent::increment($key, $value);
    }

    /**
     * Decrement the value of an item in the cache.
>>>>>>> dev
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
<<<<<<< HEAD
=======
    public function decrement($key, $value = 1)
    {
        $this->pushStandardKeys($this->tags->getNamespace(), $key);

        parent::decrement($key, $value);
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return bool
     */
>>>>>>> dev
    public function forever($key, $value)
    {
        $this->pushForeverKeys($this->tags->getNamespace(), $key);

<<<<<<< HEAD
        parent::forever($key, $value);
=======
        return parent::forever($key, $value);
>>>>>>> dev
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
        $this->deleteForeverKeys();
        $this->deleteStandardKeys();

<<<<<<< HEAD
        parent::flush();
=======
        return parent::flush();
>>>>>>> dev
    }

    /**
     * Store standard key references into store.
     *
     * @param  string  $namespace
     * @param  string  $key
     * @return void
     */
    protected function pushStandardKeys($namespace, $key)
    {
        $this->pushKeys($namespace, $key, self::REFERENCE_KEY_STANDARD);
    }

    /**
     * Store forever key references into store.
     *
     * @param  string  $namespace
     * @param  string  $key
     * @return void
     */
    protected function pushForeverKeys($namespace, $key)
    {
        $this->pushKeys($namespace, $key, self::REFERENCE_KEY_FOREVER);
    }

    /**
     * Store a reference to the cache key against the reference key.
     *
     * @param  string  $namespace
     * @param  string  $key
     * @param  string  $reference
     * @return void
     */
    protected function pushKeys($namespace, $key, $reference)
    {
<<<<<<< HEAD
        $fullKey = $this->getPrefix().sha1($namespace).':'.$key;
=======
        $fullKey = $this->store->getPrefix().sha1($namespace).':'.$key;
>>>>>>> dev

        foreach (explode('|', $namespace) as $segment) {
            $this->store->connection()->sadd($this->referenceKey($segment, $reference), $fullKey);
        }
    }

    /**
     * Delete all of the items that were stored forever.
     *
     * @return void
     */
    protected function deleteForeverKeys()
    {
        $this->deleteKeysByReference(self::REFERENCE_KEY_FOREVER);
    }

    /**
     * Delete all standard items.
     *
     * @return void
     */
    protected function deleteStandardKeys()
    {
        $this->deleteKeysByReference(self::REFERENCE_KEY_STANDARD);
    }

    /**
     * Find and delete all of the items that were stored against a reference.
     *
     * @param  string  $reference
     * @return void
     */
    protected function deleteKeysByReference($reference)
    {
        foreach (explode('|', $this->tags->getNamespace()) as $segment) {
            $this->deleteValues($segment = $this->referenceKey($segment, $reference));

            $this->store->connection()->del($segment);
        }
    }

    /**
     * Delete item keys that have been stored against a reference.
     *
     * @param  string  $referenceKey
     * @return void
     */
    protected function deleteValues($referenceKey)
    {
        $values = array_unique($this->store->connection()->smembers($referenceKey));

        if (count($values) > 0) {
<<<<<<< HEAD
            call_user_func_array([$this->store->connection(), 'del'], $values);
=======
            foreach (array_chunk($values, 1000) as $valuesChunk) {
                call_user_func_array([$this->store->connection(), 'del'], $valuesChunk);
            }
>>>>>>> dev
        }
    }

    /**
     * Get the reference key for the segment.
     *
     * @param  string  $segment
     * @param  string  $suffix
     * @return string
     */
    protected function referenceKey($segment, $suffix)
    {
<<<<<<< HEAD
        return $this->getPrefix().$segment.':'.$suffix;
=======
        return $this->store->getPrefix().$segment.':'.$suffix;
>>>>>>> dev
    }
}
