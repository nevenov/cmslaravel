<?php

namespace Illuminate\Support\Facades;

<<<<<<< HEAD
/**
=======
use Illuminate\Contracts\Console\Kernel as ConsoleKernelContract;

/**
 * @method static int handle(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output = null)
 * @method static int call(string $command, array $parameters = [], $outputBuffer = null)
 * @method static int queue(string $command, array $parameters = [])
 * @method static array all()
 * @method static string output()
 *
>>>>>>> dev
 * @see \Illuminate\Contracts\Console\Kernel
 */
class Artisan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
<<<<<<< HEAD
        return 'Illuminate\Contracts\Console\Kernel';
=======
        return ConsoleKernelContract::class;
>>>>>>> dev
    }
}
