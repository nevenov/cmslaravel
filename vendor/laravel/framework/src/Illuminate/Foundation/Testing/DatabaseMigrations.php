<?php

namespace Illuminate\Foundation\Testing;

<<<<<<< HEAD
=======
use Illuminate\Contracts\Console\Kernel;

>>>>>>> dev
trait DatabaseMigrations
{
    /**
     * Define hooks to migrate the database before and after each test.
     *
     * @return void
     */
    public function runDatabaseMigrations()
    {
<<<<<<< HEAD
        $this->artisan('migrate');

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
=======
        $this->artisan('migrate:fresh');

        $this->app[Kernel::class]->setArtisan(null);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');

            RefreshDatabaseState::$migrated = false;
>>>>>>> dev
        });
    }
}
