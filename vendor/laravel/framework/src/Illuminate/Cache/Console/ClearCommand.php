<?php

namespace Illuminate\Cache\Console;

use Illuminate\Console\Command;
use Illuminate\Cache\CacheManager;
<<<<<<< HEAD
=======
use Illuminate\Filesystem\Filesystem;
>>>>>>> dev
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ClearCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cache:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush the application cache';

    /**
     * The cache manager instance.
     *
     * @var \Illuminate\Cache\CacheManager
     */
    protected $cache;

    /**
<<<<<<< HEAD
     * Create a new cache clear command instance.
     *
     * @param  \Illuminate\Cache\CacheManager  $cache
     * @return void
     */
    public function __construct(CacheManager $cache)
=======
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new cache clear command instance.
     *
     * @param  \Illuminate\Cache\CacheManager  $cache
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(CacheManager $cache, Filesystem $files)
>>>>>>> dev
    {
        parent::__construct();

        $this->cache = $cache;
<<<<<<< HEAD
=======
        $this->files = $files;
>>>>>>> dev
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
<<<<<<< HEAD
        $tags = array_filter(explode(',', $this->option('tags')));

        $cache = $this->cache->store($store = $this->argument('store'));

        $this->laravel['events']->fire('cache:clearing', [$store, $tags]);

        if (! empty($tags)) {
            $cache->tags($tags)->flush();
        } else {
            $cache->flush();
        }

        $this->info('Cache cleared successfully.');

        $this->laravel['events']->fire('cache:cleared', [$store, $tags]);
=======
        $this->laravel['events']->dispatch(
            'cache:clearing', [$this->argument('store'), $this->tags()]
        );

        $successful = $this->cache()->flush();

        $this->flushFacades();

        if (! $successful) {
            return $this->error('Failed to clear cache. Make sure you have the appropriate permissions.');
        }

        $this->laravel['events']->dispatch(
            'cache:cleared', [$this->argument('store'), $this->tags()]
        );

        $this->info('Application cache cleared!');
    }

    /**
     * Flush the real-time facades stored in the cache directory.
     *
     * @return void
     */
    public function flushFacades()
    {
        if (! $this->files->exists($storagePath = storage_path('framework/cache'))) {
            return;
        }

        foreach ($this->files->files($storagePath) as $file) {
            if (preg_match('/facade-.*\.php$/', $file)) {
                $this->files->delete($file);
            }
        }
    }

    /**
     * Get the cache instance for the command.
     *
     * @return \Illuminate\Cache\Repository
     */
    protected function cache()
    {
        $cache = $this->cache->store($this->argument('store'));

        return empty($this->tags()) ? $cache : $cache->tags($this->tags());
    }

    /**
     * Get the tags passed to the command.
     *
     * @return array
     */
    protected function tags()
    {
        return array_filter(explode(',', $this->option('tags')));
>>>>>>> dev
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
<<<<<<< HEAD
            ['store', InputArgument::OPTIONAL, 'The name of the store you would like to clear.'],
=======
            ['store', InputArgument::OPTIONAL, 'The name of the store you would like to clear'],
>>>>>>> dev
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
<<<<<<< HEAD
            ['tags', null, InputOption::VALUE_OPTIONAL, 'The cache tags you would like to clear.', null],
=======
            ['tags', null, InputOption::VALUE_OPTIONAL, 'The cache tags you would like to clear', null],
>>>>>>> dev
        ];
    }
}
