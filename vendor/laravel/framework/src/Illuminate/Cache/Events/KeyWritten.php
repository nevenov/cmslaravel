<?php

namespace Illuminate\Cache\Events;

<<<<<<< HEAD
class KeyWritten
{
    /**
     * The key that was written.
     *
     * @var string
     */
    public $key;

    /**
=======
class KeyWritten extends CacheEvent
{
    /**
>>>>>>> dev
     * The value that was written.
     *
     * @var mixed
     */
    public $value;

    /**
<<<<<<< HEAD
     * The number of minutes the key should be valid.
     *
     * @var int
     */
    public $minutes;

    /**
     * The tags that were assigned to the key.
     *
     * @var array
     */
    public $tags;
=======
     * The number of seconds the key should be valid.
     *
     * @var int|null
     */
    public $seconds;
>>>>>>> dev

    /**
     * Create a new event instance.
     *
     * @param  string  $key
     * @param  mixed  $value
<<<<<<< HEAD
     * @param  int  $minutes
     * @param  array  $tags
     * @return void
     */
    public function __construct($key, $value, $minutes, $tags = [])
    {
        $this->key = $key;
        $this->tags = $tags;
        $this->value = $value;
        $this->minutes = $minutes;
=======
     * @param  int|null  $seconds
     * @param  array  $tags
     * @return void
     */
    public function __construct($key, $value, $seconds = null, $tags = [])
    {
        parent::__construct($key, $tags);

        $this->value = $value;
        $this->seconds = $seconds;
>>>>>>> dev
    }
}
