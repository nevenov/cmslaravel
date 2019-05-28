<?php

namespace Illuminate\Cache;

<<<<<<< HEAD
use Illuminate\Contracts\Cache\Store;

class NullStore extends TaggableStore implements Store
=======
class NullStore extends TaggableStore
>>>>>>> dev
{
    use RetrievesMultipleKeys;

    /**
     * The array of stored values.
     *
     * @var array
     */
    protected $storage = [];

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function get($key)
    {
<<<<<<< HEAD
        //
    }

    /**
     * Store an item in the cache for a given number of minutes.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  int     $minutes
     * @return void
     */
    public function put($key, $value, $minutes)
    {
        //
=======
    }

    /**
     * Store an item in the cache for a given number of seconds.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @param  int  $seconds
     * @return bool
     */
    public function put($key, $value, $seconds)
    {
        return false;
>>>>>>> dev
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
<<<<<<< HEAD
     * @return int
     */
    public function increment($key, $value = 1)
    {
        //
=======
     * @return int|bool
     */
    public function increment($key, $value = 1)
    {
        return false;
>>>>>>> dev
    }

    /**
     * Decrement the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
<<<<<<< HEAD
     * @return int
     */
    public function decrement($key, $value = 1)
    {
        //
=======
     * @return int|bool
     */
    public function decrement($key, $value = 1)
    {
        return false;
>>>>>>> dev
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
<<<<<<< HEAD
     * @return void
     */
    public function forever($key, $value)
    {
        //
=======
     * @return bool
     */
    public function forever($key, $value)
    {
        return false;
>>>>>>> dev
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
<<<<<<< HEAD
     * @return void
     */
    public function forget($key)
    {
        //
=======
     * @return bool
     */
    public function forget($key)
    {
        return true;
>>>>>>> dev
    }

    /**
     * Remove all items from the cache.
     *
<<<<<<< HEAD
     * @return void
     */
    public function flush()
    {
        //
=======
     * @return bool
     */
    public function flush()
    {
        return true;
>>>>>>> dev
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return '';
    }
}
