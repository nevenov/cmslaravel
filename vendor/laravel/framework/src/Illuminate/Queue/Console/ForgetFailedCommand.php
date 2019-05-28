<?php

namespace Illuminate\Queue\Console;

use Illuminate\Console\Command;
<<<<<<< HEAD
use Symfony\Component\Console\Input\InputArgument;
=======
>>>>>>> dev

class ForgetFailedCommand extends Command
{
    /**
<<<<<<< HEAD
     * The console command name.
     *
     * @var string
     */
    protected $name = 'queue:forget';
=======
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'queue:forget {id : The ID of the failed job}';
>>>>>>> dev

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a failed queue job';

    /**
     * Execute the console command.
     *
     * @return void
     */
<<<<<<< HEAD
    public function fire()
=======
    public function handle()
>>>>>>> dev
    {
        if ($this->laravel['queue.failer']->forget($this->argument('id'))) {
            $this->info('Failed job deleted successfully!');
        } else {
            $this->error('No failed job matches the given ID.');
        }
    }
<<<<<<< HEAD

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['id', InputArgument::REQUIRED, 'The ID of the failed job'],
        ];
    }
=======
>>>>>>> dev
}
