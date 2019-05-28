<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class JobMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new job class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Job';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
<<<<<<< HEAD
        if ($this->option('sync')) {
            return __DIR__.'/stubs/job.stub';
        } else {
            return __DIR__.'/stubs/job-queued.stub';
        }
=======
        return $this->option('sync')
                        ? __DIR__.'/stubs/job.stub'
                        : __DIR__.'/stubs/job-queued.stub';
>>>>>>> dev
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Jobs';
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
            ['sync', null, InputOption::VALUE_NONE, 'Indicates that job should be synchronous.'],
=======
            ['sync', null, InputOption::VALUE_NONE, 'Indicates that job should be synchronous'],
>>>>>>> dev
        ];
    }
}
