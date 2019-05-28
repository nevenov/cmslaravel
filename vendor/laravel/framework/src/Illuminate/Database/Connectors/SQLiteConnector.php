<?php

namespace Illuminate\Database\Connectors;

use InvalidArgumentException;

class SQLiteConnector extends Connector implements ConnectorInterface
{
    /**
     * Establish a database connection.
     *
     * @param  array  $config
     * @return \PDO
     *
     * @throws \InvalidArgumentException
     */
    public function connect(array $config)
    {
        $options = $this->getOptions($config);

        // SQLite supports "in-memory" databases that only last as long as the owning
        // connection does. These are useful for tests or for short lifetime store
        // querying. In-memory databases may only have a single open connection.
<<<<<<< HEAD
        if ($config['database'] == ':memory:') {
=======
        if ($config['database'] === ':memory:') {
>>>>>>> dev
            return $this->createConnection('sqlite::memory:', $config, $options);
        }

        $path = realpath($config['database']);

        // Here we'll verify that the SQLite database exists before going any further
        // as the developer probably wants to know if the database exists and this
        // SQLite driver will not throw any exception if it does not by default.
        if ($path === false) {
<<<<<<< HEAD
            throw new InvalidArgumentException("Database (${config['database']}) does not exist.");
=======
            throw new InvalidArgumentException("Database ({$config['database']}) does not exist.");
>>>>>>> dev
        }

        return $this->createConnection("sqlite:{$path}", $config, $options);
    }
}
