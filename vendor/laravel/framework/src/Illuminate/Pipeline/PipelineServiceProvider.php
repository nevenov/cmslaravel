<?php

namespace Illuminate\Pipeline;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD

class PipelineServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
=======
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Contracts\Pipeline\Hub as PipelineHubContract;

class PipelineServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
>>>>>>> dev
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
<<<<<<< HEAD
            'Illuminate\Contracts\Pipeline\Hub', 'Illuminate\Pipeline\Hub'
=======
            PipelineHubContract::class, Hub::class
>>>>>>> dev
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
<<<<<<< HEAD
            'Illuminate\Contracts\Pipeline\Hub',
=======
            PipelineHubContract::class,
>>>>>>> dev
        ];
    }
}
