<?php

namespace Illuminate\Contracts\View;

interface Factory
{
    /**
     * Determine if a given view exists.
     *
     * @param  string  $view
     * @return bool
     */
    public function exists($view);

    /**
     * Get the evaluated view contents for the given path.
     *
     * @param  string  $path
<<<<<<< HEAD
     * @param  array  $data
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
>>>>>>> dev
     * @param  array  $mergeData
     * @return \Illuminate\Contracts\View\View
     */
    public function file($path, $data = [], $mergeData = []);

    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string  $view
<<<<<<< HEAD
     * @param  array  $data
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
>>>>>>> dev
     * @param  array  $mergeData
     * @return \Illuminate\Contracts\View\View
     */
    public function make($view, $data = [], $mergeData = []);

    /**
     * Add a piece of shared data to the environment.
     *
     * @param  array|string  $key
     * @param  mixed  $value
     * @return mixed
     */
    public function share($key, $value = null);

    /**
     * Register a view composer event.
     *
     * @param  array|string  $views
     * @param  \Closure|string  $callback
<<<<<<< HEAD
     * @param  int|null  $priority
     * @return array
     */
    public function composer($views, $callback, $priority = null);
=======
     * @return array
     */
    public function composer($views, $callback);
>>>>>>> dev

    /**
     * Register a view creator event.
     *
     * @param  array|string  $views
     * @param  \Closure|string  $callback
     * @return array
     */
    public function creator($views, $callback);

    /**
     * Add a new namespace to the loader.
     *
     * @param  string  $namespace
     * @param  string|array  $hints
<<<<<<< HEAD
     * @return void
     */
    public function addNamespace($namespace, $hints);
=======
     * @return $this
     */
    public function addNamespace($namespace, $hints);

    /**
     * Replace the namespace hints for the given namespace.
     *
     * @param  string  $namespace
     * @param  string|array  $hints
     * @return $this
     */
    public function replaceNamespace($namespace, $hints);
>>>>>>> dev
}
