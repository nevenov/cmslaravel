<?php

namespace Illuminate\Support\Facades;

<<<<<<< HEAD
/**
=======
use Illuminate\Support\Testing\Fakes\BusFake;
use Illuminate\Contracts\Bus\Dispatcher as BusDispatcherContract;

/**
 * @method static mixed dispatch($command)
 * @method static mixed dispatchNow($command, $handler = null)
 * @method static bool hasCommandHandler($command)
 * @method static bool|mixed getCommandHandler($command)
 * @method static \Illuminate\Contracts\Bus\Dispatcher pipeThrough(array $pipes)
 * @method static \Illuminate\Contracts\Bus\Dispatcher map(array $map)
 *
>>>>>>> dev
 * @see \Illuminate\Contracts\Bus\Dispatcher
 */
class Bus extends Facade
{
    /**
<<<<<<< HEAD
=======
     * Replace the bound instance with a fake.
     *
     * @return \Illuminate\Support\Testing\Fakes\BusFake
     */
    public static function fake()
    {
        static::swap($fake = new BusFake);

        return $fake;
    }

    /**
>>>>>>> dev
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
<<<<<<< HEAD
        return 'Illuminate\Contracts\Bus\Dispatcher';
=======
        return BusDispatcherContract::class;
>>>>>>> dev
    }
}
