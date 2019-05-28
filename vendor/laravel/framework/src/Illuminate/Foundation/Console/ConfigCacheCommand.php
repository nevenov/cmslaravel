<?php

namespace Illuminate\Foundation\Console;

<<<<<<< HEAD
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
=======
use Throwable;
use LogicException;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Console\Kernel as ConsoleKernelContract;
>>>>>>> dev

class ConfigCacheCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'config:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a cache file for faster configuration loading';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new config cache command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
<<<<<<< HEAD
     */
    public function fire()
=======
     *
     * @throws \LogicException
     */
    public function handle()
>>>>>>> dev
    {
        $this->call('config:clear');

        $config = $this->getFreshConfiguration();

<<<<<<< HEAD
        $this->files->put(
            $this->laravel->getCachedConfigPath(), '<?php return '.var_export($config, true).';'.PHP_EOL
        );

=======
        $configPath = $this->laravel->getCachedConfigPath();

        $this->files->put(
            $configPath, '<?php return '.var_export($config, true).';'.PHP_EOL
        );

        try {
            require $configPath;
        } catch (Throwable $e) {
            $this->files->delete($configPath);

            throw new LogicException('Your configuration files are not serializable.', 0, $e);
        }

>>>>>>> dev
        $this->info('Configuration cached successfully!');
    }

    /**
     * Boot a fresh copy of the application configuration.
     *
     * @return array
     */
    protected function getFreshConfiguration()
    {
        $app = require $this->laravel->bootstrapPath().'/app.php';

<<<<<<< HEAD
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
=======
        $app->useStoragePath($this->laravel->storagePath());

        $app->make(ConsoleKernelContract::class)->bootstrap();
>>>>>>> dev

        return $app['config']->all();
    }
}
