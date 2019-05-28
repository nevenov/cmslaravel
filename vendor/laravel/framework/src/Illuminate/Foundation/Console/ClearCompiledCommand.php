<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\Command;

class ClearCompiledCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'clear-compiled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove the compiled class file';

    /**
     * Execute the console command.
     *
     * @return void
     */
<<<<<<< HEAD
    public function fire()
    {
        $compiledPath = $this->laravel->getCachedCompilePath();
        $servicesPath = $this->laravel->getCachedServicesPath();

        if (file_exists($compiledPath)) {
            @unlink($compiledPath);
        }

        if (file_exists($servicesPath)) {
            @unlink($servicesPath);
        }
=======
    public function handle()
    {
        if (file_exists($servicesPath = $this->laravel->getCachedServicesPath())) {
            @unlink($servicesPath);
        }

        if (file_exists($packagesPath = $this->laravel->getCachedPackagesPath())) {
            @unlink($packagesPath);
        }

        $this->info('Compiled services and packages files removed!');
>>>>>>> dev
    }
}
