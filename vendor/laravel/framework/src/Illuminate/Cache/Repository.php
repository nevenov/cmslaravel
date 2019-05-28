<?php

namespace Illuminate\Cache;

use Closure;
<<<<<<< HEAD
use DateTime;
use ArrayAccess;
use Carbon\Carbon;
use BadMethodCallException;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Cache\Repository as CacheContract;

class Repository implements CacheContract, ArrayAccess
{
=======
use ArrayAccess;
use DateTimeInterface;
use BadMethodCallException;
use Illuminate\Support\Carbon;
use Illuminate\Cache\Events\CacheHit;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Cache\Events\KeyForgotten;
use Illuminate\Support\InteractsWithTime;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Cache\Repository as CacheContract;

/**
 * @mixin \Illuminate\Contracts\Cache\Store
 */
class Repository implements CacheContract, ArrayAccess
{
    use InteractsWithTime;
>>>>>>> dev
    use Macroable {
        __call as macroCall;
    }

    /**
     * The cache store implementation.
     *
     * @var \Illuminate\Contracts\Cache\Store
     */
    protected $store;

    /**
     * The event dispatcher implementation.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $events;

    /**
<<<<<<< HEAD
     * The default number of minutes to store items.
     *
     * @var int
     */
    protected $default = 60;
=======
     * The default number of seconds to store items.
     *
     * @var int|null
     */
    protected $default = 3600;
>>>>>>> dev

    /**
     * Create a new cache repository instance.
     *
     * @param  \Illuminate\Contracts\Cache\Store  $store
     * @return void
     */
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
<<<<<<< HEAD
     * Set the event dispatcher instance.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function setEventDispatcher(Dispatcher $events)
    {
        $this->events = $events;
    }

    /**
     * Fire an event for this cache instance.
     *
     * @param  string  $event
     * @param  array  $payload
     * @return void
     */
    protected function fireCacheEvent($event, $payload)
    {
        if (! isset($this->events)) {
            return;
        }

        switch ($event) {
            case 'hit':
                if (count($payload) == 2) {
                    $payload[] = [];
                }

                return $this->events->fire(new Events\CacheHit($payload[0], $payload[1], $payload[2]));
            case 'missed':
                if (count($payload) == 1) {
                    $payload[] = [];
                }

                return $this->events->fire(new Events\CacheMissed($payload[0], $payload[1]));
            case 'delete':
                if (count($payload) == 1) {
                    $payload[] = [];
                }

                return $this->events->fire(new Events\KeyForgotten($payload[0], $payload[1]));
            case 'write':
                if (count($payload) == 3) {
                    $payload[] = [];
                }

                return $this->events->fire(new Events\KeyWritten($payload[0], $payload[1], $payload[2], $payload[3]));
        }
    }

    /**
     * Determine if an item exists in the cache.
=======
     * Determine if an item exists in the cache.
     *
     * @param  string  $key
     * @return bool
     */
    public function has($key)
    {
        return ! is_null($this->get($key));
    }

    /**
     * Determine if an item doesn't exist in the cache.
>>>>>>> dev
     *
     * @param  string  $key
     * @return bool
     */
<<<<<<< HEAD
    public function has($key)
    {
        return ! is_null($this->get($key));
=======
    public function missing($key)
    {
        return ! $this->has($key);
>>>>>>> dev
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (is_array($key)) {
            return $this->many($key);
        }

        $value = $this->store->get($this->itemKey($key));

<<<<<<< HEAD
        if (is_null($value)) {
            $this->fireCacheEvent('missed', [$key]);

            $value = value($default);
        } else {
            $this->fireCacheEvent('hit', [$key, $value]);
=======
        // If we could not find the cache value, we will fire the missed event and get
        // the default value for this cache value. This default could be a callback
        // so we will execute the value function which will resolve it if needed.
        if (is_null($value)) {
            $this->event(new CacheMissed($key));

            $value = value($default);
        } else {
            $this->event(new CacheHit($key, $value));
>>>>>>> dev
        }

        return $value;
    }

    /**
     * Retrieve multiple items from the cache by key.
     *
     * Items not found in the cache will have a null value.
     *
     * @param  array  $keys
     * @return array
     */
    public function many(array $keys)
    {
<<<<<<< HEAD
        $normalizedKeys = [];

        foreach ($keys as $key => $value) {
            $normalizedKeys[] = is_string($key) ? $key : $value;
        }

        $values = $this->store->many($normalizedKeys);

        foreach ($values as $key => &$value) {
            if (is_null($value)) {
                $this->fireCacheEvent('missed', [$key]);

                $value = isset($keys[$key]) ? value($keys[$key]) : null;
            } else {
                $this->fireCacheEvent('hit', [$key, $value]);
            }
        }

        return $values;
=======
        $values = $this->store->many(collect($keys)->map(function ($value, $key) {
            return is_string($key) ? $key : $value;
        })->values()->all());

        return collect($values)->map(function ($value, $key) use ($keys) {
            return $this->handleManyResult($keys, $key, $value);
        })->all();
    }

    /**
     * {@inheritdoc}
     */
    public function getMultiple($keys, $default = null)
    {
        if (is_null($default)) {
            return $this->many($keys);
        }

        foreach ($keys as $key) {
            if (! isset($default[$key])) {
                $default[$key] = null;
            }
        }

        return $this->many($default);
    }

    /**
     * Handle a result for the "many" method.
     *
     * @param  array  $keys
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function handleManyResult($keys, $key, $value)
    {
        // If we could not find the cache value, we will fire the missed event and get
        // the default value for this cache value. This default could be a callback
        // so we will execute the value function which will resolve it if needed.
        if (is_null($value)) {
            $this->event(new CacheMissed($key));

            return isset($keys[$key]) ? value($keys[$key]) : null;
        }

        // If we found a valid value we will fire the "hit" event and return the value
        // back from this function. The "hit" event gives developers an opportunity
        // to listen for every possible cache "hit" throughout this applications.
        $this->event(new CacheHit($key, $value));

        return $value;
>>>>>>> dev
    }

    /**
     * Retrieve an item from the cache and delete it.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function pull($key, $default = null)
    {
<<<<<<< HEAD
        $value = $this->get($key, $default);

        $this->forget($key);

        return $value;
=======
        return tap($this->get($key, $default), function () use ($key) {
            $this->forget($key);
        });
>>>>>>> dev
    }

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
        if (is_array($key) && filter_var($value, FILTER_VALIDATE_INT) !== false) {
            return $this->putMany($key, $value);
        }

        $minutes = $this->getMinutes($minutes);

        if (! is_null($minutes)) {
            $this->store->put($this->itemKey($key), $value, $minutes);

            $this->fireCacheEvent('write', [$key, $value, $minutes]);
        }
    }

    /**
     * Store multiple items in the cache for a given number of minutes.
     *
     * @param  array  $values
     * @param  int  $minutes
     * @return void
     */
    public function putMany(array $values, $minutes)
    {
        $minutes = $this->getMinutes($minutes);

        if (! is_null($minutes)) {
            $this->store->putMany($values, $minutes);

            foreach ($values as $key => $value) {
                $this->fireCacheEvent('write', [$key, $value, $minutes]);
            }
        }
=======
     * @param  \DateTimeInterface|\DateInterval|int|null  $ttl
     * @return bool
     */
    public function put($key, $value, $ttl = null)
    {
        if (is_array($key)) {
            return $this->putMany($key, $value);
        }

        if ($ttl === null) {
            return $this->forever($key, $value);
        }

        $seconds = $this->getSeconds($ttl);

        if ($seconds <= 0) {
            return $this->delete($key);
        }

        $result = $this->store->put($this->itemKey($key), $value, $seconds);

        if ($result) {
            $this->event(new KeyWritten($key, $value, $seconds));
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function set($key, $value, $ttl = null)
    {
        return $this->put($key, $value, $ttl);
    }

    /**
     * Store multiple items in the cache for a given number of seconds.
     *
     * @param  array  $values
     * @param  \DateTimeInterface|\DateInterval|int|null  $ttl
     * @return bool
     */
    public function putMany(array $values, $ttl = null)
    {
        if ($ttl === null) {
            return $this->putManyForever($values);
        }

        $seconds = $this->getSeconds($ttl);

        if ($seconds <= 0) {
            return $this->deleteMultiple(array_keys($values));
        }

        $result = $this->store->putMany($values, $seconds);

        if ($result) {
            foreach ($values as $key => $value) {
                $this->event(new KeyWritten($key, $value, $seconds));
            }
        }

        return $result;
    }

    /**
     * Store multiple items in the cache indefinitely.
     *
     * @param  array  $values
     * @return bool
     */
    protected function putManyForever(array $values)
    {
        $result = true;

        foreach ($values as $key => $value) {
            if (! $this->forever($key, $value)) {
                $result = false;
            }
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function setMultiple($values, $ttl = null)
    {
        return $this->putMany($values, $ttl);
>>>>>>> dev
    }

    /**
     * Store an item in the cache if the key does not exist.
     *
     * @param  string  $key
     * @param  mixed   $value
<<<<<<< HEAD
     * @param  \DateTime|int  $minutes
     * @return bool
     */
    public function add($key, $value, $minutes)
    {
        $minutes = $this->getMinutes($minutes);

        if (is_null($minutes)) {
            return false;
        }

        if (method_exists($this->store, 'add')) {
            return $this->store->add($this->itemKey($key), $value, $minutes);
        }

        if (is_null($this->get($key))) {
            $this->put($key, $value, $minutes);

            return true;
=======
     * @param  \DateTimeInterface|\DateInterval|int|null  $ttl
     * @return bool
     */
    public function add($key, $value, $ttl = null)
    {
        if ($ttl !== null) {
            if ($this->getSeconds($ttl) <= 0) {
                return false;
            }

            // If the store has an "add" method we will call the method on the store so it
            // has a chance to override this logic. Some drivers better support the way
            // this operation should work with a total "atomic" implementation of it.
            if (method_exists($this->store, 'add')) {
                $seconds = $this->getSeconds($ttl);

                return $this->store->add(
                    $this->itemKey($key), $value, $seconds
                );
            }
        }

        // If the value did not exist in the cache, we will put the value in the cache
        // so it exists for subsequent requests. Then, we will return true so it is
        // easy to know if the value gets added. Otherwise, we will return false.
        if (is_null($this->get($key))) {
            return $this->put($key, $value, $ttl);
>>>>>>> dev
        }

        return false;
    }

    /**
<<<<<<< HEAD
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function forever($key, $value)
    {
        $this->store->forever($this->itemKey($key), $value);

        $this->fireCacheEvent('write', [$key, $value, 0]);
    }

    /**
     * Get an item from the cache, or store the default value.
     *
     * @param  string  $key
     * @param  \DateTime|int  $minutes
     * @param  \Closure  $callback
     * @return mixed
     */
    public function remember($key, $minutes, Closure $callback)
    {
        // If the item exists in the cache we will just return this immediately
        // otherwise we will execute the given Closure and cache the result
        // of that execution for the given number of minutes in storage.
        if (! is_null($value = $this->get($key))) {
            return $value;
        }

        $this->put($key, $value = $callback(), $minutes);
=======
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return int|bool
     */
    public function increment($key, $value = 1)
    {
        return $this->store->increment($key, $value);
    }

    /**
     * Decrement the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return int|bool
     */
    public function decrement($key, $value = 1)
    {
        return $this->store->decrement($key, $value);
    }

    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return bool
     */
    public function forever($key, $value)
    {
        $result = $this->store->forever($this->itemKey($key), $value);

        if ($result) {
            $this->event(new KeyWritten($key, $value));
        }

        return $result;
    }

    /**
     * Get an item from the cache, or execute the given Closure and store the result.
     *
     * @param  string  $key
     * @param  \DateTimeInterface|\DateInterval|int|null  $ttl
     * @param  \Closure  $callback
     * @return mixed
     */
    public function remember($key, $ttl, Closure $callback)
    {
        $value = $this->get($key);

        // If the item exists in the cache we will just return this immediately and if
        // not we will execute the given Closure and cache the result of that for a
        // given number of seconds so it's available for all subsequent requests.
        if (! is_null($value)) {
            return $value;
        }

        $this->put($key, $value = $callback(), $ttl);
>>>>>>> dev

        return $value;
    }

    /**
<<<<<<< HEAD
     * Get an item from the cache, or store the default value forever.
     *
     * @param  string   $key
=======
     * Get an item from the cache, or execute the given Closure and store the result forever.
     *
     * @param  string  $key
>>>>>>> dev
     * @param  \Closure  $callback
     * @return mixed
     */
    public function sear($key, Closure $callback)
    {
        return $this->rememberForever($key, $callback);
    }

    /**
<<<<<<< HEAD
     * Get an item from the cache, or store the default value forever.
     *
     * @param  string   $key
=======
     * Get an item from the cache, or execute the given Closure and store the result forever.
     *
     * @param  string  $key
>>>>>>> dev
     * @param  \Closure  $callback
     * @return mixed
     */
    public function rememberForever($key, Closure $callback)
    {
<<<<<<< HEAD
        // If the item exists in the cache we will just return this immediately
        // otherwise we will execute the given Closure and cache the result
        // of that execution for the given number of minutes. It's easy.
        if (! is_null($value = $this->get($key))) {
=======
        $value = $this->get($key);

        // If the item exists in the cache we will just return this immediately
        // and if not we will execute the given Closure and cache the result
        // of that forever so it is available for all subsequent requests.
        if (! is_null($value)) {
>>>>>>> dev
            return $value;
        }

        $this->forever($key, $value = $callback());

        return $value;
    }

    /**
     * Remove an item from the cache.
     *
<<<<<<< HEAD
     * @param  string $key
=======
     * @param  string  $key
>>>>>>> dev
     * @return bool
     */
    public function forget($key)
    {
<<<<<<< HEAD
        $success = $this->store->forget($this->itemKey($key));

        $this->fireCacheEvent('delete', [$key]);

        return $success;
=======
        return tap($this->store->forget($this->itemKey($key)), function ($result) use ($key) {
            if ($result) {
                $this->event(new KeyForgotten($key));
            }
        });
    }

    /**
     * {@inheritdoc}
     */
    public function delete($key)
    {
        return $this->forget($key);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteMultiple($keys)
    {
        $result = true;

        foreach ($keys as $key) {
            if (! $this->forget($key)) {
                $result = false;
            }
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        return $this->store->flush();
>>>>>>> dev
    }

    /**
     * Begin executing a new tags operation if the store supports it.
     *
     * @param  array|mixed  $names
     * @return \Illuminate\Cache\TaggedCache
     *
     * @throws \BadMethodCallException
     */
    public function tags($names)
    {
<<<<<<< HEAD
        if (method_exists($this->store, 'tags')) {
            $taggedCache = $this->store->tags($names);

            if (! is_null($this->events)) {
                $taggedCache->setEventDispatcher($this->events);
            }

            $taggedCache->setDefaultCacheTime($this->default);

            return $taggedCache;
        }

        throw new BadMethodCallException('This cache store does not support tagging.');
=======
        if (! method_exists($this->store, 'tags')) {
            throw new BadMethodCallException('This cache store does not support tagging.');
        }

        $cache = $this->store->tags(is_array($names) ? $names : func_get_args());

        if (! is_null($this->events)) {
            $cache->setEventDispatcher($this->events);
        }

        return $cache->setDefaultCacheTime($this->default);
>>>>>>> dev
    }

    /**
     * Format the key for a cache item.
     *
     * @param  string  $key
     * @return string
     */
    protected function itemKey($key)
    {
        return $key;
    }

    /**
     * Get the default cache time.
     *
     * @return int
     */
    public function getDefaultCacheTime()
    {
        return $this->default;
    }

    /**
<<<<<<< HEAD
     * Set the default cache time in minutes.
     *
     * @param  int   $minutes
     * @return void
     */
    public function setDefaultCacheTime($minutes)
    {
        $this->default = $minutes;
=======
     * Set the default cache time in seconds.
     *
     * @param  int|null  $seconds
     * @return $this
     */
    public function setDefaultCacheTime($seconds)
    {
        $this->default = $seconds;

        return $this;
>>>>>>> dev
    }

    /**
     * Get the cache store implementation.
     *
     * @return \Illuminate\Contracts\Cache\Store
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
<<<<<<< HEAD
=======
     * Fire an event for this cache instance.
     *
     * @param  string  $event
     * @return void
     */
    protected function event($event)
    {
        if (isset($this->events)) {
            $this->events->dispatch($event);
        }
    }

    /**
     * Set the event dispatcher instance.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function setEventDispatcher(Dispatcher $events)
    {
        $this->events = $events;
    }

    /**
>>>>>>> dev
     * Determine if a cached value exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->has($key);
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->get($key);
    }

    /**
     * Store an item in the cache for the default time.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function offsetSet($key, $value)
    {
        $this->put($key, $value, $this->default);
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return void
     */
    public function offsetUnset($key)
    {
        $this->forget($key);
    }

    /**
<<<<<<< HEAD
     * Calculate the number of minutes with the given duration.
     *
     * @param  \DateTime|int  $duration
     * @return int|null
     */
    protected function getMinutes($duration)
    {
        if ($duration instanceof DateTime) {
            $fromNow = Carbon::now()->diffInMinutes(Carbon::instance($duration), false);

            return $fromNow > 0 ? $fromNow : null;
        }

        return is_string($duration) ? (int) $duration : $duration;
=======
     * Calculate the number of seconds for the given TTL.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $ttl
     * @return int
     */
    protected function getSeconds($ttl)
    {
        $duration = $this->parseDateInterval($ttl);

        if ($duration instanceof DateTimeInterface) {
            $duration = Carbon::now()->diffInRealSeconds($duration, false);
        }

        return (int) $duration > 0 ? $duration : 0;
>>>>>>> dev
    }

    /**
     * Handle dynamic calls into macros or pass missing methods to the store.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

<<<<<<< HEAD
        return call_user_func_array([$this->store, $method], $parameters);
=======
        return $this->store->$method(...$parameters);
>>>>>>> dev
    }

    /**
     * Clone cache repository instance.
     *
     * @return void
     */
    public function __clone()
    {
        $this->store = clone $this->store;
    }
}
