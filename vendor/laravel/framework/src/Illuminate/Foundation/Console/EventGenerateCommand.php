<?php

namespace Illuminate\Foundation\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
<<<<<<< HEAD
=======
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
>>>>>>> dev

class EventGenerateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'event:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the missing events and listeners based on registration';

    /**
     * Execute the console command.
     *
     * @return void
     */
<<<<<<< HEAD
    public function fire()
    {
        $provider = $this->laravel->getProvider(
            'Illuminate\Foundation\Support\Providers\EventServiceProvider'
        );

        foreach ($provider->listens() as $event => $listeners) {
            if (! Str::contains($event, '\\')) {
                continue;
            }

            $this->callSilent('make:event', ['name' => $event]);

            foreach ($listeners as $listener) {
                $listener = preg_replace('/@.+$/', '', $listener);

                $this->callSilent('make:listener', ['name' => $listener, '--event' => $event]);
            }
        }

        $this->info('Events and listeners generated successfully!');
=======
    public function handle()
    {
        $providers = $this->laravel->getProviders(EventServiceProvider::class);

        foreach ($providers as $provider) {
            foreach ($provider->listens() as $event => $listeners) {
                $this->makeEventAndListeners($event, $listeners);
            }
        }

        $this->info('Events and listeners generated successfully!');
    }

    /**
     * Make the event and listeners for the given event.
     *
     * @param  string  $event
     * @param  array  $listeners
     * @return void
     */
    protected function makeEventAndListeners($event, $listeners)
    {
        if (! Str::contains($event, '\\')) {
            return;
        }

        $this->callSilent('make:event', ['name' => $event]);

        $this->makeListeners($event, $listeners);
    }

    /**
     * Make the listeners for the given event.
     *
     * @param  string  $event
     * @param  array  $listeners
     * @return void
     */
    protected function makeListeners($event, $listeners)
    {
        foreach ($listeners as $listener) {
            $listener = preg_replace('/@.+$/', '', $listener);

            $this->callSilent('make:listener', array_filter(
                ['name' => $listener, '--event' => $event]
            ));
        }
>>>>>>> dev
    }
}
