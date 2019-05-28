<?php

namespace Illuminate\Foundation\Bootstrap;

<<<<<<< HEAD
use Illuminate\Support\Facades\Facade;
use Illuminate\Foundation\AliasLoader;
=======
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Facade;
use Illuminate\Foundation\PackageManifest;
>>>>>>> dev
use Illuminate\Contracts\Foundation\Application;

class RegisterFacades
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        Facade::clearResolvedInstances();

        Facade::setFacadeApplication($app);

<<<<<<< HEAD
        AliasLoader::getInstance($app->make('config')->get('app.aliases'))->register();
=======
        AliasLoader::getInstance(array_merge(
            $app->make('config')->get('app.aliases', []),
            $app->make(PackageManifest::class)->aliases()
        ))->register();
>>>>>>> dev
    }
}
