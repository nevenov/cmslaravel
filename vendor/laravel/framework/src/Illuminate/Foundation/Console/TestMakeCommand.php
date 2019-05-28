<?php

namespace Illuminate\Foundation\Console;

<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> dev
use Illuminate\Console\GeneratorCommand;

class TestMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $name = 'make:test';
=======
    protected $signature = 'make:test {name : The name of the class} {--unit : Create a unit test}';
>>>>>>> dev

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new test class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Test';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
<<<<<<< HEAD
=======
        if ($this->option('unit')) {
            return __DIR__.'/stubs/unit-test.stub';
        }

>>>>>>> dev
        return __DIR__.'/stubs/test.stub';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
<<<<<<< HEAD
        $name = str_replace($this->laravel->getNamespace(), '', $name);

        return $this->laravel['path.base'].'/tests/'.str_replace('\\', '/', $name).'.php';
=======
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return base_path('tests').str_replace('\\', '/', $name).'.php';
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
<<<<<<< HEAD
        return $rootNamespace;
=======
        if ($this->option('unit')) {
            return $rootNamespace.'\Unit';
        } else {
            return $rootNamespace.'\Feature';
        }
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return 'Tests';
>>>>>>> dev
    }
}
