<?php

namespace Illuminate\Cache\Events;

<<<<<<< HEAD
class CacheHit
{
    /**
     * The key that was hit.
     *
     * @var string
     */
    public $key;

    /**
=======
class CacheHit extends CacheEvent
{
    /**
>>>>>>> dev
     * The value that was retrieved.
     *
     * @var mixed
     */
    public $value;

    /**
<<<<<<< HEAD
     * The tags that were assigned to the key.
     *
     * @var array
     */
    public $tags;

    /**
=======
>>>>>>> dev
     * Create a new event instance.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $tags
     * @return void
     */
    public function __construct($key, $value, array $tags = [])
    {
<<<<<<< HEAD
        $this->key = $key;
        $this->tags = $tags;
=======
        parent::__construct($key, $tags);

>>>>>>> dev
        $this->value = $value;
    }
}
