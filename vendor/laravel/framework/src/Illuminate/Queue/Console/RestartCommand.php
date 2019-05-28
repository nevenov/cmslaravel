<?php

namespace Illuminate\Queue\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD

class RestartCommand extends Command
{
=======
use Illuminate\Support\InteractsWithTime;

class RestartCommand extends Command
{
    use InteractsWithTime;

>>>>>>> dev
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'queue:restart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restart queue worker daemons after their current job';

    /**
     * Execute the console command.
     *
     * @return void
     */
<<<<<<< HEAD
    public function fire()
    {
        $this->laravel['cache']->forever('illuminate:queue:restart', time());
=======
    public function handle()
    {
        $this->laravel['cache']->forever('illuminate:queue:restart', $this->currentTime());
>>>>>>> dev

        $this->info('Broadcasting queue restart signal.');
    }
}
