<?php

namespace Illuminate\Container;

<<<<<<< HEAD
=======
use Illuminate\Support\Arr;
use Illuminate\Contracts\Container\Container;
>>>>>>> dev
use Illuminate\Contracts\Container\ContextualBindingBuilder as ContextualBindingBuilderContract;

class ContextualBindingBuilder implements ContextualBindingBuilderContract
{
    /**
     * The underlying container instance.
     *
<<<<<<< HEAD
     * @var \Illuminate\Container\Container
=======
     * @var \Illuminate\Contracts\Container\Container
>>>>>>> dev
     */
    protected $container;

    /**
     * The concrete instance.
     *
<<<<<<< HEAD
     * @var string
=======
     * @var string|array
>>>>>>> dev
     */
    protected $concrete;

    /**
     * The abstract target.
     *
     * @var string
     */
    protected $needs;

    /**
     * Create a new contextual binding builder.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Container\Container  $container
     * @param  string  $concrete
=======
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @param  string|array  $concrete
>>>>>>> dev
     * @return void
     */
    public function __construct(Container $container, $concrete)
    {
        $this->concrete = $concrete;
        $this->container = $container;
    }

    /**
     * Define the abstract target that depends on the context.
     *
     * @param  string  $abstract
     * @return $this
     */
    public function needs($abstract)
    {
        $this->needs = $abstract;

        return $this;
    }

    /**
     * Define the implementation for the contextual binding.
     *
     * @param  \Closure|string  $implementation
     * @return void
     */
    public function give($implementation)
    {
<<<<<<< HEAD
        $this->container->addContextualBinding($this->concrete, $this->needs, $implementation);
=======
        foreach (Arr::wrap($this->concrete) as $concrete) {
            $this->container->addContextualBinding($concrete, $this->needs, $implementation);
        }
>>>>>>> dev
    }
}
