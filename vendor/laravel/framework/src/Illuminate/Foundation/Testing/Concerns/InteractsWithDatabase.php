<?php

namespace Illuminate\Foundation\Testing\Concerns;

<<<<<<< HEAD
=======
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\Constraints\HasInDatabase;
use PHPUnit\Framework\Constraint\LogicalNot as ReverseConstraint;
use Illuminate\Foundation\Testing\Constraints\SoftDeletedInDatabase;

>>>>>>> dev
trait InteractsWithDatabase
{
    /**
     * Assert that a given where condition exists in the database.
     *
     * @param  string  $table
     * @param  array  $data
     * @param  string  $connection
     * @return $this
     */
<<<<<<< HEAD
    protected function seeInDatabase($table, array $data, $connection = null)
    {
        $database = $this->app->make('db');

        $connection = $connection ?: $database->getDefaultConnection();

        $count = $database->connection($connection)->table($table)->where($data)->count();

        $this->assertGreaterThan(0, $count, sprintf(
            'Unable to find row in database table [%s] that matched attributes [%s].', $table, json_encode($data)
        ));
=======
    protected function assertDatabaseHas($table, array $data, $connection = null)
    {
        $this->assertThat(
            $table, new HasInDatabase($this->getConnection($connection), $data)
        );
>>>>>>> dev

        return $this;
    }

    /**
     * Assert that a given where condition does not exist in the database.
     *
     * @param  string  $table
     * @param  array  $data
     * @param  string  $connection
     * @return $this
     */
<<<<<<< HEAD
    protected function missingFromDatabase($table, array $data, $connection = null)
    {
        return $this->notSeeInDatabase($table, $data, $connection);
    }

    /**
     * Assert that a given where condition does not exist in the database.
     *
     * @param  string  $table
=======
    protected function assertDatabaseMissing($table, array $data, $connection = null)
    {
        $constraint = new ReverseConstraint(
            new HasInDatabase($this->getConnection($connection), $data)
        );

        $this->assertThat($table, $constraint);

        return $this;
    }

    /**
     * Assert the given record has been deleted.
     *
     * @param  string|\Illuminate\Database\Eloquent\Model  $table
>>>>>>> dev
     * @param  array  $data
     * @param  string  $connection
     * @return $this
     */
<<<<<<< HEAD
    protected function dontSeeInDatabase($table, array $data, $connection = null)
    {
        return $this->notSeeInDatabase($table, $data, $connection);
    }

    /**
     * Assert that a given where condition does not exist in the database.
     *
     * @param  string  $table
     * @param  array  $data
     * @param  string  $connection
     * @return $this
     */
    protected function notSeeInDatabase($table, array $data, $connection = null)
=======
    protected function assertSoftDeleted($table, array $data = [], $connection = null)
    {
        if ($table instanceof Model) {
            return $this->assertSoftDeleted($table->getTable(), [$table->getKeyName() => $table->getKey()], $table->getConnectionName());
        }

        $this->assertThat(
            $table, new SoftDeletedInDatabase($this->getConnection($connection), $data)
        );

        return $this;
    }

    /**
     * Get the database connection.
     *
     * @param  string|null  $connection
     * @return \Illuminate\Database\Connection
     */
    protected function getConnection($connection = null)
>>>>>>> dev
    {
        $database = $this->app->make('db');

        $connection = $connection ?: $database->getDefaultConnection();

<<<<<<< HEAD
        $count = $database->connection($connection)->table($table)->where($data)->count();

        $this->assertEquals(0, $count, sprintf(
            'Found unexpected records in database table [%s] that matched attributes [%s].', $table, json_encode($data)
        ));

        return $this;
=======
        return $database->connection($connection);
>>>>>>> dev
    }

    /**
     * Seed a given database connection.
     *
<<<<<<< HEAD
     * @param  string  $class
     * @return void
     */
    public function seed($class = 'DatabaseSeeder')
    {
        $this->artisan('db:seed', ['--class' => $class]);
=======
     * @param  array|string  $class
     * @return $this
     */
    public function seed($class = 'DatabaseSeeder')
    {
        foreach (Arr::wrap($class) as $class) {
            $this->artisan('db:seed', ['--class' => $class, '--no-interaction' => true]);
        }

        return $this;
>>>>>>> dev
    }
}
