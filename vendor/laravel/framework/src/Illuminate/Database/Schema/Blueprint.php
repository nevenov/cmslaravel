<?php

namespace Illuminate\Database\Schema;

use Closure;
<<<<<<< HEAD
use Illuminate\Support\Fluent;
use Illuminate\Database\Connection;
=======
use BadMethodCallException;
use Illuminate\Support\Fluent;
use Illuminate\Database\Connection;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Database\SQLiteConnection;
>>>>>>> dev
use Illuminate\Database\Schema\Grammars\Grammar;

class Blueprint
{
<<<<<<< HEAD
=======
    use Macroable;

>>>>>>> dev
    /**
     * The table the blueprint describes.
     *
     * @var string
     */
    protected $table;

    /**
<<<<<<< HEAD
     * The columns that should be added to the table.
     *
     * @var array
=======
     * The prefix of the table.
     *
     * @var string
     */
    protected $prefix;

    /**
     * The columns that should be added to the table.
     *
     * @var \Illuminate\Database\Schema\ColumnDefinition[]
>>>>>>> dev
     */
    protected $columns = [];

    /**
     * The commands that should be run for the table.
     *
<<<<<<< HEAD
     * @var array
=======
     * @var \Illuminate\Support\Fluent[]
>>>>>>> dev
     */
    protected $commands = [];

    /**
     * The storage engine that should be used for the table.
     *
     * @var string
     */
    public $engine;

    /**
     * The default character set that should be used for the table.
     */
    public $charset;

    /**
     * The collation that should be used for the table.
     */
    public $collation;

    /**
     * Whether to make the table temporary.
     *
     * @var bool
     */
    public $temporary = false;

    /**
     * Create a new schema blueprint.
     *
     * @param  string  $table
     * @param  \Closure|null  $callback
<<<<<<< HEAD
     * @return void
     */
    public function __construct($table, Closure $callback = null)
    {
        $this->table = $table;
=======
     * @param  string  $prefix
     * @return void
     */
    public function __construct($table, Closure $callback = null, $prefix = '')
    {
        $this->table = $table;
        $this->prefix = $prefix;
>>>>>>> dev

        if (! is_null($callback)) {
            $callback($this);
        }
    }

    /**
     * Execute the blueprint against the database.
     *
     * @param  \Illuminate\Database\Connection  $connection
<<<<<<< HEAD
     * @param  \Illuminate\Database\Schema\Grammars\Grammar $grammar
=======
     * @param  \Illuminate\Database\Schema\Grammars\Grammar  $grammar
>>>>>>> dev
     * @return void
     */
    public function build(Connection $connection, Grammar $grammar)
    {
        foreach ($this->toSql($connection, $grammar) as $statement) {
            $connection->statement($statement);
        }
    }

    /**
     * Get the raw SQL statements for the blueprint.
     *
     * @param  \Illuminate\Database\Connection  $connection
     * @param  \Illuminate\Database\Schema\Grammars\Grammar  $grammar
     * @return array
     */
    public function toSql(Connection $connection, Grammar $grammar)
    {
<<<<<<< HEAD
        $this->addImpliedCommands();
=======
        $this->addImpliedCommands($grammar);
>>>>>>> dev

        $statements = [];

        // Each type of command has a corresponding compiler function on the schema
        // grammar which is used to build the necessary SQL statements to build
        // the blueprint element, so we'll just call that compilers function.
<<<<<<< HEAD
=======
        $this->ensureCommandsAreValid($connection);

>>>>>>> dev
        foreach ($this->commands as $command) {
            $method = 'compile'.ucfirst($command->name);

            if (method_exists($grammar, $method)) {
                if (! is_null($sql = $grammar->$method($this, $command, $connection))) {
                    $statements = array_merge($statements, (array) $sql);
                }
            }
        }

        return $statements;
    }

    /**
<<<<<<< HEAD
     * Add the commands that are implied by the blueprint.
     *
     * @return void
     */
    protected function addImpliedCommands()
=======
     * Ensure the commands on the blueprint are valid for the connection type.
     *
     * @param  \Illuminate\Database\Connection  $connection
     * @return void
     *
     * @throws \BadMethodCallException
     */
    protected function ensureCommandsAreValid(Connection $connection)
    {
        if ($connection instanceof SQLiteConnection) {
            if ($this->commandsNamed(['dropColumn', 'renameColumn'])->count() > 1) {
                throw new BadMethodCallException(
                    "SQLite doesn't support multiple calls to dropColumn / renameColumn in a single modification."
                );
            }

            if ($this->commandsNamed(['dropForeign'])->count() > 0) {
                throw new BadMethodCallException(
                    "SQLite doesn't support dropping foreign keys (you would need to re-create the table)."
                );
            }
        }
    }

    /**
     * Get all of the commands matching the given names.
     *
     * @param  array  $names
     * @return \Illuminate\Support\Collection
     */
    protected function commandsNamed(array $names)
    {
        return collect($this->commands)->filter(function ($command) use ($names) {
            return in_array($command->name, $names);
        });
    }

    /**
     * Add the commands that are implied by the blueprint's state.
     *
     * @param  \Illuminate\Database\Schema\Grammars\Grammar  $grammar
     * @return void
     */
    protected function addImpliedCommands(Grammar $grammar)
>>>>>>> dev
    {
        if (count($this->getAddedColumns()) > 0 && ! $this->creating()) {
            array_unshift($this->commands, $this->createCommand('add'));
        }

        if (count($this->getChangedColumns()) > 0 && ! $this->creating()) {
            array_unshift($this->commands, $this->createCommand('change'));
        }

        $this->addFluentIndexes();
<<<<<<< HEAD
=======

        $this->addFluentCommands($grammar);
>>>>>>> dev
    }

    /**
     * Add the index commands fluently specified on columns.
     *
     * @return void
     */
    protected function addFluentIndexes()
    {
        foreach ($this->columns as $column) {
<<<<<<< HEAD
            foreach (['primary', 'unique', 'index'] as $index) {
                // If the index has been specified on the given column, but is simply
                // equal to "true" (boolean), no name has been specified for this
                // index, so we will simply call the index methods without one.
                if ($column->$index === true) {
                    $this->$index($column->name);
=======
            foreach (['primary', 'unique', 'index', 'spatialIndex'] as $index) {
                // If the index has been specified on the given column, but is simply equal
                // to "true" (boolean), no name has been specified for this index so the
                // index method can be called without a name and it will generate one.
                if ($column->{$index} === true) {
                    $this->{$index}($column->name);
>>>>>>> dev

                    continue 2;
                }

<<<<<<< HEAD
                // If the index has been specified on the column and it is something
                // other than boolean true, we will assume a name was provided on
                // the index specification, and pass in the name to the method.
                elseif (isset($column->$index)) {
                    $this->$index($column->name, $column->$index);
=======
                // If the index has been specified on the given column, and it has a string
                // value, we'll go ahead and call the index method and pass the name for
                // the index since the developer specified the explicit name for this.
                elseif (isset($column->{$index})) {
                    $this->{$index}($column->name, $column->{$index});
>>>>>>> dev

                    continue 2;
                }
            }
        }
    }

    /**
<<<<<<< HEAD
     * Determine if the blueprint has a create command.
     *
     * @return bool
     */
    protected function creating()
    {
        foreach ($this->commands as $command) {
            if ($command->name == 'create') {
                return true;
            }
        }

        return false;
=======
     * Add the fluent commands specified on any columns.
     *
     * @param  \Illuminate\Database\Schema\Grammars\Grammar  $grammar
     * @return void
     */
    public function addFluentCommands(Grammar $grammar)
    {
        foreach ($this->columns as $column) {
            foreach ($grammar->getFluentCommands() as $commandName) {
                $attributeName = lcfirst($commandName);

                if (! isset($column->{$attributeName})) {
                    continue;
                }

                $value = $column->{$attributeName};

                $this->addCommand(
                    $commandName, compact('value', 'column')
                );
            }
        }
    }

    /**
     * Determine if the blueprint has a create command.
     *
     * @return bool
     */
    protected function creating()
    {
        return collect($this->commands)->contains(function ($command) {
            return $command->name === 'create';
        });
>>>>>>> dev
    }

    /**
     * Indicate that the table needs to be created.
     *
     * @return \Illuminate\Support\Fluent
     */
    public function create()
    {
        return $this->addCommand('create');
    }

    /**
     * Indicate that the table needs to be temporary.
     *
     * @return void
     */
    public function temporary()
    {
        $this->temporary = true;
    }

    /**
     * Indicate that the table should be dropped.
     *
     * @return \Illuminate\Support\Fluent
     */
    public function drop()
    {
        return $this->addCommand('drop');
    }

    /**
     * Indicate that the table should be dropped if it exists.
     *
     * @return \Illuminate\Support\Fluent
     */
    public function dropIfExists()
    {
        return $this->addCommand('dropIfExists');
    }

    /**
     * Indicate that the given columns should be dropped.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Support\Fluent
     */
    public function dropColumn($columns)
    {
<<<<<<< HEAD
        $columns = is_array($columns) ? $columns : (array) func_get_args();
=======
        $columns = is_array($columns) ? $columns : func_get_args();
>>>>>>> dev

        return $this->addCommand('dropColumn', compact('columns'));
    }

    /**
     * Indicate that the given columns should be renamed.
     *
     * @param  string  $from
     * @param  string  $to
     * @return \Illuminate\Support\Fluent
     */
    public function renameColumn($from, $to)
    {
        return $this->addCommand('renameColumn', compact('from', 'to'));
    }

    /**
     * Indicate that the given primary key should be dropped.
     *
     * @param  string|array  $index
     * @return \Illuminate\Support\Fluent
     */
    public function dropPrimary($index = null)
    {
        return $this->dropIndexCommand('dropPrimary', 'primary', $index);
    }

    /**
     * Indicate that the given unique key should be dropped.
     *
     * @param  string|array  $index
     * @return \Illuminate\Support\Fluent
     */
    public function dropUnique($index)
    {
        return $this->dropIndexCommand('dropUnique', 'unique', $index);
    }

    /**
     * Indicate that the given index should be dropped.
     *
     * @param  string|array  $index
     * @return \Illuminate\Support\Fluent
     */
    public function dropIndex($index)
    {
        return $this->dropIndexCommand('dropIndex', 'index', $index);
    }

    /**
<<<<<<< HEAD
=======
     * Indicate that the given spatial index should be dropped.
     *
     * @param  string|array  $index
     * @return \Illuminate\Support\Fluent
     */
    public function dropSpatialIndex($index)
    {
        return $this->dropIndexCommand('dropSpatialIndex', 'spatialIndex', $index);
    }

    /**
>>>>>>> dev
     * Indicate that the given foreign key should be dropped.
     *
     * @param  string|array  $index
     * @return \Illuminate\Support\Fluent
     */
    public function dropForeign($index)
    {
        return $this->dropIndexCommand('dropForeign', 'foreign', $index);
    }

    /**
<<<<<<< HEAD
=======
     * Indicate that the given indexes should be renamed.
     *
     * @param  string  $from
     * @param  string  $to
     * @return \Illuminate\Support\Fluent
     */
    public function renameIndex($from, $to)
    {
        return $this->addCommand('renameIndex', compact('from', 'to'));
    }

    /**
>>>>>>> dev
     * Indicate that the timestamp columns should be dropped.
     *
     * @return void
     */
    public function dropTimestamps()
    {
        $this->dropColumn('created_at', 'updated_at');
    }

    /**
     * Indicate that the timestamp columns should be dropped.
     *
     * @return void
     */
    public function dropTimestampsTz()
    {
        $this->dropTimestamps();
    }

    /**
     * Indicate that the soft delete column should be dropped.
     *
<<<<<<< HEAD
     * @return void
     */
    public function dropSoftDeletes()
    {
        $this->dropColumn('deleted_at');
=======
     * @param  string  $column
     * @return void
     */
    public function dropSoftDeletes($column = 'deleted_at')
    {
        $this->dropColumn($column);
    }

    /**
     * Indicate that the soft delete column should be dropped.
     *
     * @param  string  $column
     * @return void
     */
    public function dropSoftDeletesTz($column = 'deleted_at')
    {
        $this->dropSoftDeletes($column);
>>>>>>> dev
    }

    /**
     * Indicate that the remember token column should be dropped.
     *
     * @return void
     */
    public function dropRememberToken()
    {
        $this->dropColumn('remember_token');
    }

    /**
<<<<<<< HEAD
=======
     * Indicate that the polymorphic columns should be dropped.
     *
     * @param  string  $name
     * @param  string|null  $indexName
     * @return void
     */
    public function dropMorphs($name, $indexName = null)
    {
        $this->dropIndex($indexName ?: $this->createIndexName('index', ["{$name}_type", "{$name}_id"]));

        $this->dropColumn("{$name}_type", "{$name}_id");
    }

    /**
>>>>>>> dev
     * Rename the table to a given name.
     *
     * @param  string  $to
     * @return \Illuminate\Support\Fluent
     */
    public function rename($to)
    {
        return $this->addCommand('rename', compact('to'));
    }

    /**
     * Specify the primary key(s) for the table.
     *
     * @param  string|array  $columns
     * @param  string  $name
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function primary($columns, $name = null)
    {
        return $this->indexCommand('primary', $columns, $name);
=======
     * @param  string|null  $algorithm
     * @return \Illuminate\Support\Fluent
     */
    public function primary($columns, $name = null, $algorithm = null)
    {
        return $this->indexCommand('primary', $columns, $name, $algorithm);
>>>>>>> dev
    }

    /**
     * Specify a unique index for the table.
     *
     * @param  string|array  $columns
     * @param  string  $name
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function unique($columns, $name = null)
    {
        return $this->indexCommand('unique', $columns, $name);
=======
     * @param  string|null  $algorithm
     * @return \Illuminate\Support\Fluent
     */
    public function unique($columns, $name = null, $algorithm = null)
    {
        return $this->indexCommand('unique', $columns, $name, $algorithm);
>>>>>>> dev
    }

    /**
     * Specify an index for the table.
     *
     * @param  string|array  $columns
     * @param  string  $name
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function index($columns, $name = null)
    {
        return $this->indexCommand('index', $columns, $name);
    }

    /**
     * Specify a foreign key for the table.
=======
     * @param  string|null  $algorithm
     * @return \Illuminate\Support\Fluent
     */
    public function index($columns, $name = null, $algorithm = null)
    {
        return $this->indexCommand('index', $columns, $name, $algorithm);
    }

    /**
     * Specify a spatial index for the table.
>>>>>>> dev
     *
     * @param  string|array  $columns
     * @param  string  $name
     * @return \Illuminate\Support\Fluent
     */
<<<<<<< HEAD
=======
    public function spatialIndex($columns, $name = null)
    {
        return $this->indexCommand('spatialIndex', $columns, $name);
    }

    /**
     * Specify a foreign key for the table.
     *
     * @param  string|array  $columns
     * @param  string  $name
     * @return \Illuminate\Support\Fluent|\Illuminate\Database\Schema\ForeignKeyDefinition
     */
>>>>>>> dev
    public function foreign($columns, $name = null)
    {
        return $this->indexCommand('foreign', $columns, $name);
    }

    /**
     * Create a new auto-incrementing integer (4-byte) column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function increments($column)
    {
        return $this->unsignedInteger($column, true);
    }

    /**
<<<<<<< HEAD
     * Create a new auto-incrementing small integer (2-byte) column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Support\Fluent
=======
     * Create a new auto-incrementing integer (4-byte) column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function integerIncrements($column)
    {
        return $this->unsignedInteger($column, true);
    }

    /**
     * Create a new auto-incrementing tiny integer (1-byte) column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function tinyIncrements($column)
    {
        return $this->unsignedTinyInteger($column, true);
    }

    /**
     * Create a new auto-incrementing small integer (2-byte) column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function smallIncrements($column)
    {
        return $this->unsignedSmallInteger($column, true);
    }

    /**
     * Create a new auto-incrementing medium integer (3-byte) column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function mediumIncrements($column)
    {
        return $this->unsignedMediumInteger($column, true);
    }

    /**
     * Create a new auto-incrementing big integer (8-byte) column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function bigIncrements($column)
    {
        return $this->unsignedBigInteger($column, true);
    }

    /**
     * Create a new char column on the table.
     *
     * @param  string  $column
     * @param  int  $length
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function char($column, $length = 255)
    {
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function char($column, $length = null)
    {
        $length = $length ?: Builder::$defaultStringLength;

>>>>>>> dev
        return $this->addColumn('char', $column, compact('length'));
    }

    /**
     * Create a new string column on the table.
     *
     * @param  string  $column
     * @param  int  $length
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function string($column, $length = 255)
    {
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function string($column, $length = null)
    {
        $length = $length ?: Builder::$defaultStringLength;

>>>>>>> dev
        return $this->addColumn('string', $column, compact('length'));
    }

    /**
     * Create a new text column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function text($column)
    {
        return $this->addColumn('text', $column);
    }

    /**
     * Create a new medium text column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function mediumText($column)
    {
        return $this->addColumn('mediumText', $column);
    }

    /**
     * Create a new long text column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function longText($column)
    {
        return $this->addColumn('longText', $column);
    }

    /**
     * Create a new integer (4-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
     * @param  bool  $unsigned
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function integer($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('integer', $column, compact('autoIncrement', 'unsigned'));
    }

    /**
     * Create a new tiny integer (1-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
     * @param  bool  $unsigned
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function tinyInteger($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('tinyInteger', $column, compact('autoIncrement', 'unsigned'));
    }

    /**
     * Create a new small integer (2-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
     * @param  bool  $unsigned
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function smallInteger($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('smallInteger', $column, compact('autoIncrement', 'unsigned'));
    }

    /**
     * Create a new medium integer (3-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
     * @param  bool  $unsigned
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function mediumInteger($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('mediumInteger', $column, compact('autoIncrement', 'unsigned'));
    }

    /**
     * Create a new big integer (8-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
     * @param  bool  $unsigned
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function bigInteger($column, $autoIncrement = false, $unsigned = false)
    {
        return $this->addColumn('bigInteger', $column, compact('autoIncrement', 'unsigned'));
    }

    /**
<<<<<<< HEAD
=======
     * Create a new unsigned integer (4-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function unsignedInteger($column, $autoIncrement = false)
    {
        return $this->integer($column, $autoIncrement, true);
    }

    /**
>>>>>>> dev
     * Create a new unsigned tiny integer (1-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function unsignedTinyInteger($column, $autoIncrement = false)
    {
        return $this->tinyInteger($column, $autoIncrement, true);
    }

    /**
     * Create a new unsigned small integer (2-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function unsignedSmallInteger($column, $autoIncrement = false)
    {
        return $this->smallInteger($column, $autoIncrement, true);
    }

    /**
     * Create a new unsigned medium integer (3-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function unsignedMediumInteger($column, $autoIncrement = false)
    {
        return $this->mediumInteger($column, $autoIncrement, true);
    }

    /**
<<<<<<< HEAD
     * Create a new unsigned integer (4-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
     * @return \Illuminate\Support\Fluent
     */
    public function unsignedInteger($column, $autoIncrement = false)
    {
        return $this->integer($column, $autoIncrement, true);
    }

    /**
=======
>>>>>>> dev
     * Create a new unsigned big integer (8-byte) column on the table.
     *
     * @param  string  $column
     * @param  bool  $autoIncrement
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function unsignedBigInteger($column, $autoIncrement = false)
    {
        return $this->bigInteger($column, $autoIncrement, true);
    }

    /**
     * Create a new float column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @param  int     $total
     * @param  int     $places
     * @return \Illuminate\Support\Fluent
=======
     * @param  int  $total
     * @param  int  $places
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function float($column, $total = 8, $places = 2)
    {
        return $this->addColumn('float', $column, compact('total', 'places'));
    }

    /**
     * Create a new double column on the table.
     *
<<<<<<< HEAD
     * @param  string   $column
     * @param  int|null    $total
     * @param  int|null $places
     * @return \Illuminate\Support\Fluent
=======
     * @param  string  $column
     * @param  int|null  $total
     * @param  int|null  $places
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function double($column, $total = null, $places = null)
    {
        return $this->addColumn('double', $column, compact('total', 'places'));
    }

    /**
     * Create a new decimal column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @param  int     $total
     * @param  int     $places
     * @return \Illuminate\Support\Fluent
=======
     * @param  int  $total
     * @param  int  $places
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function decimal($column, $total = 8, $places = 2)
    {
        return $this->addColumn('decimal', $column, compact('total', 'places'));
    }

    /**
<<<<<<< HEAD
     * Create a new boolean column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Support\Fluent
=======
     * Create a new unsigned decimal column on the table.
     *
     * @param  string  $column
     * @param  int  $total
     * @param  int  $places
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function unsignedDecimal($column, $total = 8, $places = 2)
    {
        return $this->addColumn('decimal', $column, [
            'total' => $total, 'places' => $places, 'unsigned' => true,
        ]);
    }

    /**
     * Create a new boolean column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function boolean($column)
    {
        return $this->addColumn('boolean', $column);
    }

    /**
     * Create a new enum column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @param  array   $allowed
     * @return \Illuminate\Support\Fluent
=======
     * @param  array  $allowed
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function enum($column, array $allowed)
    {
        return $this->addColumn('enum', $column, compact('allowed'));
    }

    /**
<<<<<<< HEAD
     * Create a new json column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Support\Fluent
=======
     * Create a new set column on the table.
     *
     * @param  string  $column
     * @param  array  $allowed
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function set($column, array $allowed)
    {
        return $this->addColumn('set', $column, compact('allowed'));
    }

    /**
     * Create a new json column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function json($column)
    {
        return $this->addColumn('json', $column);
    }

    /**
     * Create a new jsonb column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function jsonb($column)
    {
        return $this->addColumn('jsonb', $column);
    }

    /**
     * Create a new date column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function date($column)
    {
        return $this->addColumn('date', $column);
    }

    /**
     * Create a new date-time column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function dateTime($column)
    {
        return $this->addColumn('dateTime', $column);
=======
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function dateTime($column, $precision = 0)
    {
        return $this->addColumn('dateTime', $column, compact('precision'));
>>>>>>> dev
    }

    /**
     * Create a new date-time column (with time zone) on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function dateTimeTz($column)
    {
        return $this->addColumn('dateTimeTz', $column);
=======
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function dateTimeTz($column, $precision = 0)
    {
        return $this->addColumn('dateTimeTz', $column, compact('precision'));
>>>>>>> dev
    }

    /**
     * Create a new time column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function time($column)
    {
        return $this->addColumn('time', $column);
=======
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function time($column, $precision = 0)
    {
        return $this->addColumn('time', $column, compact('precision'));
>>>>>>> dev
    }

    /**
     * Create a new time column (with time zone) on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function timeTz($column)
    {
        return $this->addColumn('timeTz', $column);
=======
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function timeTz($column, $precision = 0)
    {
        return $this->addColumn('timeTz', $column, compact('precision'));
>>>>>>> dev
    }

    /**
     * Create a new timestamp column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function timestamp($column)
    {
        return $this->addColumn('timestamp', $column);
=======
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function timestamp($column, $precision = 0)
    {
        return $this->addColumn('timestamp', $column, compact('precision'));
>>>>>>> dev
    }

    /**
     * Create a new timestamp (with time zone) column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function timestampTz($column)
    {
        return $this->addColumn('timestampTz', $column);
=======
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function timestampTz($column, $precision = 0)
    {
        return $this->addColumn('timestampTz', $column, compact('precision'));
>>>>>>> dev
    }

    /**
     * Add nullable creation and update timestamps to the table.
     *
<<<<<<< HEAD
     * Alias for self::timestamps().
     *
     * @return void
     */
    public function nullableTimestamps()
    {
        $this->timestamps();
=======
     * @param  int  $precision
     * @return void
     */
    public function timestamps($precision = 0)
    {
        $this->timestamp('created_at', $precision)->nullable();

        $this->timestamp('updated_at', $precision)->nullable();
>>>>>>> dev
    }

    /**
     * Add nullable creation and update timestamps to the table.
     *
<<<<<<< HEAD
     * @return void
     */
    public function timestamps()
    {
        $this->timestamp('created_at')->nullable();

        $this->timestamp('updated_at')->nullable();
=======
     * Alias for self::timestamps().
     *
     * @param  int  $precision
     * @return void
     */
    public function nullableTimestamps($precision = 0)
    {
        $this->timestamps($precision);
>>>>>>> dev
    }

    /**
     * Add creation and update timestampTz columns to the table.
     *
<<<<<<< HEAD
     * @return void
     */
    public function timestampsTz()
    {
        $this->timestampTz('created_at')->nullable();

        $this->timestampTz('updated_at')->nullable();
=======
     * @param  int  $precision
     * @return void
     */
    public function timestampsTz($precision = 0)
    {
        $this->timestampTz('created_at', $precision)->nullable();

        $this->timestampTz('updated_at', $precision)->nullable();
>>>>>>> dev
    }

    /**
     * Add a "deleted at" timestamp for the table.
     *
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
     */
    public function softDeletes()
    {
        return $this->timestamp('deleted_at')->nullable();
=======
     * @param  string  $column
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function softDeletes($column = 'deleted_at', $precision = 0)
    {
        return $this->timestamp($column, $precision)->nullable();
    }

    /**
     * Add a "deleted at" timestampTz for the table.
     *
     * @param  string  $column
     * @param  int  $precision
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function softDeletesTz($column = 'deleted_at', $precision = 0)
    {
        return $this->timestampTz($column, $precision)->nullable();
    }

    /**
     * Create a new year column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function year($column)
    {
        return $this->addColumn('year', $column);
>>>>>>> dev
    }

    /**
     * Create a new binary column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function binary($column)
    {
        return $this->addColumn('binary', $column);
    }

    /**
     * Create a new uuid column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function uuid($column)
    {
        return $this->addColumn('uuid', $column);
    }

    /**
     * Create a new IP address column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function ipAddress($column)
    {
        return $this->addColumn('ipAddress', $column);
    }

    /**
     * Create a new MAC address column on the table.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function macAddress($column)
    {
        return $this->addColumn('macAddress', $column);
    }

    /**
<<<<<<< HEAD
=======
     * Create a new geometry column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function geometry($column)
    {
        return $this->addColumn('geometry', $column);
    }

    /**
     * Create a new point column on the table.
     *
     * @param  string  $column
     * @param  int|null  $srid
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function point($column, $srid = null)
    {
        return $this->addColumn('point', $column, compact('srid'));
    }

    /**
     * Create a new linestring column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function lineString($column)
    {
        return $this->addColumn('linestring', $column);
    }

    /**
     * Create a new polygon column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function polygon($column)
    {
        return $this->addColumn('polygon', $column);
    }

    /**
     * Create a new geometrycollection column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function geometryCollection($column)
    {
        return $this->addColumn('geometrycollection', $column);
    }

    /**
     * Create a new multipoint column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function multiPoint($column)
    {
        return $this->addColumn('multipoint', $column);
    }

    /**
     * Create a new multilinestring column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function multiLineString($column)
    {
        return $this->addColumn('multilinestring', $column);
    }

    /**
     * Create a new multipolygon column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function multiPolygon($column)
    {
        return $this->addColumn('multipolygon', $column);
    }

    /**
     * Create a new generated, computed column on the table.
     *
     * @param  string  $column
     * @param  string  $expression
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function computed($column, $expression)
    {
        return $this->addColumn('computed', $column, compact('expression'));
    }

    /**
>>>>>>> dev
     * Add the proper columns for a polymorphic table.
     *
     * @param  string  $name
     * @param  string|null  $indexName
     * @return void
     */
    public function morphs($name, $indexName = null)
    {
<<<<<<< HEAD
        $this->unsignedInteger("{$name}_id");

        $this->string("{$name}_type");

        $this->index(["{$name}_id", "{$name}_type"], $indexName);
=======
        $this->string("{$name}_type");

        $this->unsignedBigInteger("{$name}_id");

        $this->index(["{$name}_type", "{$name}_id"], $indexName);
    }

    /**
     * Add nullable columns for a polymorphic table.
     *
     * @param  string  $name
     * @param  string|null  $indexName
     * @return void
     */
    public function nullableMorphs($name, $indexName = null)
    {
        $this->string("{$name}_type")->nullable();

        $this->unsignedBigInteger("{$name}_id")->nullable();

        $this->index(["{$name}_type", "{$name}_id"], $indexName);
>>>>>>> dev
    }

    /**
     * Adds the `remember_token` column to the table.
     *
<<<<<<< HEAD
     * @return \Illuminate\Support\Fluent
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition
>>>>>>> dev
     */
    public function rememberToken()
    {
        return $this->string('remember_token', 100)->nullable();
    }

    /**
<<<<<<< HEAD
=======
     * Add a new index command to the blueprint.
     *
     * @param  string  $type
     * @param  string|array  $columns
     * @param  string  $index
     * @param  string|null  $algorithm
     * @return \Illuminate\Support\Fluent
     */
    protected function indexCommand($type, $columns, $index, $algorithm = null)
    {
        $columns = (array) $columns;

        // If no name was specified for this index, we will create one using a basic
        // convention of the table name, followed by the columns, followed by an
        // index type, such as primary or index, which makes the index unique.
        $index = $index ?: $this->createIndexName($type, $columns);

        return $this->addCommand(
            $type, compact('index', 'columns', 'algorithm')
        );
    }

    /**
>>>>>>> dev
     * Create a new drop index command on the blueprint.
     *
     * @param  string  $command
     * @param  string  $type
     * @param  string|array  $index
     * @return \Illuminate\Support\Fluent
     */
    protected function dropIndexCommand($command, $type, $index)
    {
        $columns = [];

        // If the given "index" is actually an array of columns, the developer means
        // to drop an index merely by specifying the columns involved without the
        // conventional name, so we will build the index name from the columns.
        if (is_array($index)) {
<<<<<<< HEAD
            $columns = $index;

            $index = $this->createIndexName($type, $columns);
=======
            $index = $this->createIndexName($type, $columns = $index);
>>>>>>> dev
        }

        return $this->indexCommand($command, $columns, $index);
    }

    /**
<<<<<<< HEAD
     * Add a new index command to the blueprint.
     *
     * @param  string        $type
     * @param  string|array  $columns
     * @param  string        $index
     * @return \Illuminate\Support\Fluent
     */
    protected function indexCommand($type, $columns, $index)
    {
        $columns = (array) $columns;

        // If no name was specified for this index, we will create one using a basic
        // convention of the table name, followed by the columns, followed by an
        // index type, such as primary or index, which makes the index unique.
        if (is_null($index)) {
            $index = $this->createIndexName($type, $columns);
        }

        return $this->addCommand($type, compact('index', 'columns'));
    }

    /**
     * Create a default index name for the table.
     *
     * @param  string  $type
     * @param  array   $columns
=======
     * Create a default index name for the table.
     *
     * @param  string  $type
     * @param  array  $columns
>>>>>>> dev
     * @return string
     */
    protected function createIndexName($type, array $columns)
    {
<<<<<<< HEAD
        $index = strtolower($this->table.'_'.implode('_', $columns).'_'.$type);
=======
        $index = strtolower($this->prefix.$this->table.'_'.implode('_', $columns).'_'.$type);
>>>>>>> dev

        return str_replace(['-', '.'], '_', $index);
    }

    /**
     * Add a new column to the blueprint.
     *
     * @param  string  $type
     * @param  string  $name
<<<<<<< HEAD
     * @param  array   $parameters
     * @return \Illuminate\Support\Fluent
     */
    public function addColumn($type, $name, array $parameters = [])
    {
        $attributes = array_merge(compact('type', 'name'), $parameters);

        $this->columns[] = $column = new Fluent($attributes);
=======
     * @param  array  $parameters
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function addColumn($type, $name, array $parameters = [])
    {
        $this->columns[] = $column = new ColumnDefinition(
            array_merge(compact('type', 'name'), $parameters)
        );
>>>>>>> dev

        return $column;
    }

    /**
     * Remove a column from the schema blueprint.
     *
     * @param  string  $name
     * @return $this
     */
    public function removeColumn($name)
    {
        $this->columns = array_values(array_filter($this->columns, function ($c) use ($name) {
<<<<<<< HEAD
            return $c['attributes']['name'] != $name;
=======
            return $c['name'] != $name;
>>>>>>> dev
        }));

        return $this;
    }

    /**
     * Add a new command to the blueprint.
     *
     * @param  string  $name
     * @param  array  $parameters
     * @return \Illuminate\Support\Fluent
     */
    protected function addCommand($name, array $parameters = [])
    {
        $this->commands[] = $command = $this->createCommand($name, $parameters);

        return $command;
    }

    /**
     * Create a new Fluent command.
     *
     * @param  string  $name
<<<<<<< HEAD
     * @param  array   $parameters
=======
     * @param  array  $parameters
>>>>>>> dev
     * @return \Illuminate\Support\Fluent
     */
    protected function createCommand($name, array $parameters = [])
    {
        return new Fluent(array_merge(compact('name'), $parameters));
    }

    /**
     * Get the table the blueprint describes.
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Get the columns on the blueprint.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition[]
>>>>>>> dev
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Get the commands on the blueprint.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return \Illuminate\Support\Fluent[]
>>>>>>> dev
     */
    public function getCommands()
    {
        return $this->commands;
    }

    /**
     * Get the columns on the blueprint that should be added.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition[]
>>>>>>> dev
     */
    public function getAddedColumns()
    {
        return array_filter($this->columns, function ($column) {
            return ! $column->change;
        });
    }

    /**
     * Get the columns on the blueprint that should be changed.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return \Illuminate\Database\Schema\ColumnDefinition[]
>>>>>>> dev
     */
    public function getChangedColumns()
    {
        return array_filter($this->columns, function ($column) {
            return (bool) $column->change;
        });
    }
}
