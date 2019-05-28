<?php

namespace Illuminate\Contracts\Console;

interface Kernel
{
    /**
     * Handle an incoming console command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
<<<<<<< HEAD
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
=======
     * @param  \Symfony\Component\Console\Output\OutputInterface|null  $output
>>>>>>> dev
     * @return int
     */
    public function handle($input, $output = null);

    /**
     * Run an Artisan console command by name.
     *
     * @param  string  $command
     * @param  array  $parameters
<<<<<<< HEAD
     * @return int
     */
    public function call($command, array $parameters = []);
=======
     * @param  \Symfony\Component\Console\Output\OutputInterface|null  $outputBuffer
     * @return int
     */
    public function call($command, array $parameters = [], $outputBuffer = null);
>>>>>>> dev

    /**
     * Queue an Artisan console command by name.
     *
     * @param  string  $command
     * @param  array  $parameters
<<<<<<< HEAD
     * @return int
=======
     * @return \Illuminate\Foundation\Bus\PendingDispatch
>>>>>>> dev
     */
    public function queue($command, array $parameters = []);

    /**
     * Get all of the commands registered with the console.
     *
     * @return array
     */
    public function all();

    /**
     * Get the output for the last run command.
     *
     * @return string
     */
    public function output();
<<<<<<< HEAD
=======

    /**
     * Terminate the application.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  int  $status
     * @return void
     */
    public function terminate($input, $status);
>>>>>>> dev
}
