<?php

namespace Illuminate\Cache;

use Closure;
use Exception;
<<<<<<< HEAD
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;

class DatabaseStore implements Store
{
    use RetrievesMultipleKeys;
=======
use Illuminate\Support\Str;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\InteractsWithTime;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\ConnectionInterface;

class DatabaseStore implements Store
{
    use InteractsWithTime, RetrievesMultipleKeys;
>>>>>>> dev

    /**
     * The database connection instance.
     *
     * @var \Illuminate\Database\ConnectionInterface
     */
    protected $connection;

    /**
<<<<<<< HEAD
     * The encrypter instance.
     *
     * @var \Illuminate\Contracts\Encryption\Encrypter
     */
    protected $encrypter;

    /**
=======
>>>>>>> dev
     * The name of the cache table.
     *
     * @var string
     */
    protected $table;

    /**
     * A string that should be prepended to keys.
     *
     * @var string
     */
    protected $prefix;

    /**
     * Create a new database store.
     *
     * @param  \Illuminate\Database\ConnectionInterface  $connection
<<<<<<< HEAD
     * @param  \Illuminate\Contracts\Encryption\Encrypter  $encrypter
=======
>>>>>>> dev
     * @param  string  $table
     * @param  string  $prefix
     * @return void
     */
<<<<<<< HEAD
    public function __construct(ConnectionInterface $connection, EncrypterContract $encrypter, $table, $prefix = '')
    {
        $this->table = $table;
        $this->prefix = $prefix;
        $this->encrypter = $encrypter;
=======
    public function __construct(ConnectionInterface $connection, $table, $prefix = '')
    {
        $this->table = $table;
        $this->prefix = $prefix;
>>>>>>> dev
        $this->connection = $connection;
    }

    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string|array  $key
     * @return mixed
     */
    public function get($key)
    {
        $prefixed = $this->prefix.$key;

        $cache = $this->table()->where('key', '=', $prefixed)->first();

        // If we have a cache record we will check the expiration time against current
        // time on the system and see if the record has expired. If it has, we will
        // remove the records from the database table so it isn't returned again.
<<<<<<< HEAD
        if (! is_null($cache)) {
            if (is_array($cache)) {
                $cache = (object) $cache;
            }

            if (time() >= $cache->expiration) {
                $this->forget($key);

                return;
            }

            return $this->encrypter->decrypt($cache->value);
        }
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
        $key = $this->prefix.$key;

        // All of the cached values in the database are encrypted in case this is used
        // as a session data store by the consumer. We'll also calculate the expire
        // time and place that on the table so we will check it on our retrieval.
        $value = $this->encrypter->encrypt($value);

        $expiration = $this->getTime() + ($minutes * 60);

        try {
            $this->table()->insert(compact('key', 'value', 'expiration'));
        } catch (Exception $e) {
            $this->table()->where('key', '=', $key)->update(compact('value', 'expiration'));
=======
        if (is_null($cache)) {
            return;
        }

        $cache = is_array($cache) ? (object) $cache : $cache;

        // If this cache expiration date is past the current time, we will remove this
        // item from the cache. Then we will return a null value since the cache is
        // expired. We will use "Carbon" to make this comparison with the column.
        if ($this->currentTime() >= $cache->expiration) {
            $this->forget($key);

            return;
        }

        return $this->unserialize($cache->value);
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
        $key = $this->prefix.$key;

        $value = $this->serialize($value);

        $expiration = $this->getTime() + $seconds;

        try {
            return $this->table()->insert(compact('key', 'value', 'expiration'));
        } catch (Exception $e) {
            $result = $this->table()->where('key', $key)->update(compact('value', 'expiration'));

            return $result > 0;
>>>>>>> dev
        }
    }

    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return int|bool
     */
    public function increment($key, $value = 1)
    {
        return $this->incrementOrDecrement($key, $value, function ($current, $value) {
            return $current + $value;
        });
    }

    /**
     * Decrement the value of an item in the cache.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return int|bool
     */
    public function decrement($key, $value = 1)
    {
        return $this->incrementOrDecrement($key, $value, function ($current, $value) {
            return $current - $value;
        });
    }

    /**
     * Increment or decrement an item in the cache.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @param  \Closure  $callback
     * @return int|bool
     */
    protected function incrementOrDecrement($key, $value, Closure $callback)
    {
        return $this->connection->transaction(function () use ($key, $value, $callback) {
            $prefixed = $this->prefix.$key;

<<<<<<< HEAD
            $cache = $this->table()->where('key', $prefixed)->lockForUpdate()->first();

=======
            $cache = $this->table()->where('key', $prefixed)
                        ->lockForUpdate()->first();

            // If there is no value in the cache, we will return false here. Otherwise the
            // value will be decrypted and we will proceed with this function to either
            // increment or decrement this value based on the given action callbacks.
>>>>>>> dev
            if (is_null($cache)) {
                return false;
            }

<<<<<<< HEAD
            if (is_array($cache)) {
                $cache = (object) $cache;
            }

            $current = $this->encrypter->decrypt($cache->value);
=======
            $cache = is_array($cache) ? (object) $cache : $cache;

            $current = $this->unserialize($cache->value);

            // Here we'll call this callback function that was given to the function which
            // is used to either increment or decrement the function. We use a callback
            // so we do not have to recreate all this logic in each of the functions.
>>>>>>> dev
            $new = $callback((int) $current, $value);

            if (! is_numeric($current)) {
                return false;
            }

<<<<<<< HEAD
            $this->table()->where('key', $prefixed)->update([
                'value' => $this->encrypter->encrypt($new),
=======
            // Here we will update the values in the table. We will also encrypt the value
            // since database cache values are encrypted by default with secure storage
            // that can't be easily read. We will return the new value after storing.
            $this->table()->where('key', $prefixed)->update([
                'value' => $this->serialize($new),
>>>>>>> dev
            ]);

            return $new;
        });
    }

    /**
     * Get the current system time.
     *
     * @return int
     */
    protected function getTime()
    {
<<<<<<< HEAD
        return time();
=======
        return $this->currentTime();
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
        $this->put($key, $value, 5256000);
=======
     * @return bool
     */
    public function forever($key, $value)
    {
        return $this->put($key, $value, 315360000);
>>>>>>> dev
    }

    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return bool
     */
    public function forget($key)
    {
        $this->table()->where('key', '=', $this->prefix.$key)->delete();

        return true;
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
        $this->table()->delete();
<<<<<<< HEAD
=======

        return true;
>>>>>>> dev
    }

    /**
     * Get a query builder for the cache table.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function table()
    {
        return $this->connection->table($this->table);
    }

    /**
     * Get the underlying database connection.
     *
     * @return \Illuminate\Database\ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
<<<<<<< HEAD
     * Get the encrypter instance.
     *
     * @return \Illuminate\Contracts\Encryption\Encrypter
     */
    public function getEncrypter()
    {
        return $this->encrypter;
    }

    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
=======
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Serialize the given value.
     *
     * @param  mixed  $value
     * @return string
     */
    protected function serialize($value)
    {
        $result = serialize($value);

        if ($this->connection instanceof PostgresConnection && Str::contains($result, "\0")) {
            $result = base64_encode($result);
        }

        return $result;
    }

    /**
     * Unserialize the given value.
     *
     * @param  string  $value
     * @return mixed
     */
    protected function unserialize($value)
    {
        if ($this->connection instanceof PostgresConnection && ! Str::contains($value, [':', ';'])) {
            $value = base64_decode($value);
        }

        return unserialize($value);
>>>>>>> dev
    }
}
