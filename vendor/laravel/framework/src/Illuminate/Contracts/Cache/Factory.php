<?php

namespace Illuminate\Contracts\Cache;

interface Factory
{
    /**
     * Get a cache store instance by name.
     *
     * @param  string|null  $name
<<<<<<< HEAD
     * @return mixed
=======
     * @return \Illuminate\Contracts\Cache\Repository
>>>>>>> dev
     */
    public function store($name = null);
}
