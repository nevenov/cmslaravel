<?php

namespace Illuminate\Contracts\Console;

interface Application
{
    /**
<<<<<<< HEAD
     * Call a console application command.
     *
     * @param  string  $command
     * @param  array  $parameters
     * @return int
     */
    public function call($command, array $parameters = []);
=======
     * Run an Artisan console command by name.
     *
     * @param  string  $command
     * @param  array  $parameters
     * @param  \Symfony\Component\Console\Output\OutputInterface|null  $outputBuffer
     * @return int
     */
    public function call($command, array $parameters = [], $outputBuffer = null);
>>>>>>> dev

    /**
     * Get the output from the last command.
     *
     * @return string
     */
    public function output();
}
