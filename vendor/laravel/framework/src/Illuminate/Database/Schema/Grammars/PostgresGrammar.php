<?php

namespace Illuminate\Database\Schema\Grammars;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Blueprint;

class PostgresGrammar extends Grammar
{
    /**
<<<<<<< HEAD
=======
     * If this Grammar supports schema changes wrapped in a transaction.
     *
     * @var bool
     */
    protected $transactions = true;

    /**
>>>>>>> dev
     * The possible column modifiers.
     *
     * @var array
     */
    protected $modifiers = ['Increment', 'Nullable', 'Default'];

    /**
     * The columns available as serials.
     *
     * @var array
     */
    protected $serials = ['bigInteger', 'integer', 'mediumInteger', 'smallInteger', 'tinyInteger'];

    /**
<<<<<<< HEAD
=======
     * The commands to be executed outside of create or alter command.
     *
     * @var array
     */
    protected $fluentCommands = ['Comment'];

    /**
>>>>>>> dev
     * Compile the query to determine if a table exists.
     *
     * @return string
     */
    public function compileTableExists()
    {
<<<<<<< HEAD
        return 'select * from information_schema.tables where table_schema = ? and table_name = ?';
=======
        return "select * from information_schema.tables where table_schema = ? and table_name = ? and table_type = 'BASE TABLE'";
>>>>>>> dev
    }

    /**
     * Compile the query to determine the list of columns.
     *
<<<<<<< HEAD
     * @param  string  $table
     * @return string
     */
    public function compileColumnExists($table)
    {
        return "select column_name from information_schema.columns where table_name = '$table'";
=======
     * @return string
     */
    public function compileColumnListing()
    {
        return 'select column_name from information_schema.columns where table_schema = ? and table_name = ?';
>>>>>>> dev
    }

    /**
     * Compile a create table command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileCreate(Blueprint $blueprint, Fluent $command)
    {
<<<<<<< HEAD
        $columns = implode(', ', $this->getColumns($blueprint));

        $sql = $blueprint->temporary ? 'create temporary' : 'create';

        $sql .= ' table '.$this->wrapTable($blueprint)." ($columns)";

        return $sql;
=======
        return sprintf('%s table %s (%s)',
            $blueprint->temporary ? 'create temporary' : 'create',
            $this->wrapTable($blueprint),
            implode(', ', $this->getColumns($blueprint))
        );
>>>>>>> dev
    }

    /**
     * Compile a column addition command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileAdd(Blueprint $blueprint, Fluent $command)
    {
<<<<<<< HEAD
        $table = $this->wrapTable($blueprint);

        $columns = $this->prefixArray('add column', $this->getColumns($blueprint));

        return 'alter table '.$table.' '.implode(', ', $columns);
=======
        return sprintf('alter table %s %s',
            $this->wrapTable($blueprint),
            implode(', ', $this->prefixArray('add column', $this->getColumns($blueprint)))
        );
>>>>>>> dev
    }

    /**
     * Compile a primary key command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compilePrimary(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->columnize($command->columns);

        return 'alter table '.$this->wrapTable($blueprint)." add primary key ({$columns})";
    }

    /**
     * Compile a unique key command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileUnique(Blueprint $blueprint, Fluent $command)
    {
<<<<<<< HEAD
        $table = $this->wrapTable($blueprint);

        $index = $this->wrap($command->index);

        $columns = $this->columnize($command->columns);

        return "alter table $table add constraint {$index} unique ($columns)";
    }

    /**
     * Compile a plain index key command.
=======
        return sprintf('alter table %s add constraint %s unique (%s)',
            $this->wrapTable($blueprint),
            $this->wrap($command->index),
            $this->columnize($command->columns)
        );
    }

    /**
     * Compile a plain index key command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('create index %s on %s%s (%s)',
            $this->wrap($command->index),
            $this->wrapTable($blueprint),
            $command->algorithm ? ' using '.$command->algorithm : '',
            $this->columnize($command->columns)
        );
    }

    /**
     * Compile a spatial index key command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        $command->algorithm = 'gist';

        return $this->compileIndex($blueprint, $command);
    }

    /**
     * Compile a foreign key command.
>>>>>>> dev
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
<<<<<<< HEAD
    public function compileIndex(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->columnize($command->columns);

        $index = $this->wrap($command->index);

        return "create index {$index} on ".$this->wrapTable($blueprint)." ({$columns})";
=======
    public function compileForeign(Blueprint $blueprint, Fluent $command)
    {
        $sql = parent::compileForeign($blueprint, $command);

        if (! is_null($command->deferrable)) {
            $sql .= $command->deferrable ? ' deferrable' : ' not deferrable';
        }

        if ($command->deferrable && ! is_null($command->initiallyImmediate)) {
            $sql .= $command->initiallyImmediate ? ' initially immediate' : ' initially deferred';
        }

        if (! is_null($command->notValid)) {
            $sql .= ' not valid';
        }

        return $sql;
>>>>>>> dev
    }

    /**
     * Compile a drop table command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDrop(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table '.$this->wrapTable($blueprint);
    }

    /**
     * Compile a drop table (if exists) command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDropIfExists(Blueprint $blueprint, Fluent $command)
    {
        return 'drop table if exists '.$this->wrapTable($blueprint);
    }

    /**
<<<<<<< HEAD
=======
     * Compile the SQL needed to drop all tables.
     *
     * @param  string  $tables
     * @return string
     */
    public function compileDropAllTables($tables)
    {
        return 'drop table "'.implode('","', $tables).'" cascade';
    }

    /**
     * Compile the SQL needed to drop all views.
     *
     * @param  string  $views
     * @return string
     */
    public function compileDropAllViews($views)
    {
        return 'drop view "'.implode('","', $views).'" cascade';
    }

    /**
     * Compile the SQL needed to drop all types.
     *
     * @param array $types
     * @return string
     */
    public function compileDropAllTypes($types)
    {
        return 'drop type "'.implode('","', $types).'" cascade';
    }

    /**
     * Compile the SQL needed to retrieve all table names.
     *
     * @param  string  $schema
     * @return string
     */
    public function compileGetAllTables($schema)
    {
        return "select tablename from pg_catalog.pg_tables where schemaname = '{$schema}'";
    }

    /**
     * Compile the SQL needed to retrieve all view names.
     *
     * @param  string  $schema
     * @return string
     */
    public function compileGetAllViews($schema)
    {
        return "select viewname from pg_catalog.pg_views where schemaname = '{$schema}'";
    }

    /**
     * Compile the SQL needed to retrieve all type names.
     *
     * @return string
     */
    public function compileGetAllTypes()
    {
        return 'select distinct pg_type.typname from pg_type inner join pg_enum on pg_enum.enumtypid = pg_type.oid';
    }

    /**
>>>>>>> dev
     * Compile a drop column command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDropColumn(Blueprint $blueprint, Fluent $command)
    {
        $columns = $this->prefixArray('drop column', $this->wrapArray($command->columns));

<<<<<<< HEAD
        $table = $this->wrapTable($blueprint);

        return 'alter table '.$table.' '.implode(', ', $columns);
=======
        return 'alter table '.$this->wrapTable($blueprint).' '.implode(', ', $columns);
>>>>>>> dev
    }

    /**
     * Compile a drop primary key command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDropPrimary(Blueprint $blueprint, Fluent $command)
    {
<<<<<<< HEAD
        $table = $blueprint->getTable();

        $index = $this->wrap("{$table}_pkey");
=======
        $index = $this->wrap("{$blueprint->getTable()}_pkey");
>>>>>>> dev

        return 'alter table '.$this->wrapTable($blueprint)." drop constraint {$index}";
    }

    /**
     * Compile a drop unique key command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDropUnique(Blueprint $blueprint, Fluent $command)
    {
<<<<<<< HEAD
        $table = $this->wrapTable($blueprint);

        $index = $this->wrap($command->index);

        return "alter table {$table} drop constraint {$index}";
=======
        $index = $this->wrap($command->index);

        return "alter table {$this->wrapTable($blueprint)} drop constraint {$index}";
>>>>>>> dev
    }

    /**
     * Compile a drop index command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDropIndex(Blueprint $blueprint, Fluent $command)
    {
<<<<<<< HEAD
        $index = $this->wrap($command->index);

        return "drop index {$index}";
=======
        return "drop index {$this->wrap($command->index)}";
    }

    /**
     * Compile a drop spatial index command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDropSpatialIndex(Blueprint $blueprint, Fluent $command)
    {
        return $this->compileDropIndex($blueprint, $command);
>>>>>>> dev
    }

    /**
     * Compile a drop foreign key command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileDropForeign(Blueprint $blueprint, Fluent $command)
    {
<<<<<<< HEAD
        $table = $this->wrapTable($blueprint);

        $index = $this->wrap($command->index);

        return "alter table {$table} drop constraint {$index}";
=======
        $index = $this->wrap($command->index);

        return "alter table {$this->wrapTable($blueprint)} drop constraint {$index}";
    }

    /**
     * Compile a rename table command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileRename(Blueprint $blueprint, Fluent $command)
    {
        $from = $this->wrapTable($blueprint);

        return "alter table {$from} rename to ".$this->wrapTable($command->to);
    }

    /**
     * Compile a rename index command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint $blueprint
     * @param  \Illuminate\Support\Fluent $command
     * @return string
     */
    public function compileRenameIndex(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('alter index %s rename to %s',
            $this->wrap($command->from),
            $this->wrap($command->to)
        );
>>>>>>> dev
    }

    /**
     * Compile the command to enable foreign key constraints.
     *
     * @return string
     */
    public function compileEnableForeignKeyConstraints()
    {
        return 'SET CONSTRAINTS ALL IMMEDIATE;';
    }

    /**
     * Compile the command to disable foreign key constraints.
     *
     * @return string
     */
    public function compileDisableForeignKeyConstraints()
    {
        return 'SET CONSTRAINTS ALL DEFERRED;';
    }

    /**
<<<<<<< HEAD
     * Compile a rename table command.
=======
     * Compile a comment command.
>>>>>>> dev
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
<<<<<<< HEAD
    public function compileRename(Blueprint $blueprint, Fluent $command)
    {
        $from = $this->wrapTable($blueprint);

        return "alter table {$from} rename to ".$this->wrapTable($command->to);
=======
    public function compileComment(Blueprint $blueprint, Fluent $command)
    {
        return sprintf('comment on column %s.%s is %s',
            $this->wrapTable($blueprint),
            $this->wrap($command->column->name),
            "'".str_replace("'", "''", $command->value)."'"
        );
>>>>>>> dev
    }

    /**
     * Create the column definition for a char type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeChar(Fluent $column)
    {
        return "char({$column->length})";
    }

    /**
     * Create the column definition for a string type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeString(Fluent $column)
    {
        return "varchar({$column->length})";
    }

    /**
     * Create the column definition for a text type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeText(Fluent $column)
    {
        return 'text';
    }

    /**
     * Create the column definition for a medium text type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeMediumText(Fluent $column)
    {
        return 'text';
    }

    /**
     * Create the column definition for a long text type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeLongText(Fluent $column)
    {
        return 'text';
    }

    /**
<<<<<<< HEAD
     * Create the column definition for a integer type.
=======
     * Create the column definition for an integer type.
>>>>>>> dev
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeInteger(Fluent $column)
    {
<<<<<<< HEAD
        return $column->autoIncrement ? 'serial' : 'integer';
=======
        return $this->generatableColumn('integer', $column);
>>>>>>> dev
    }

    /**
     * Create the column definition for a big integer type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeBigInteger(Fluent $column)
    {
<<<<<<< HEAD
        return $column->autoIncrement ? 'bigserial' : 'bigint';
=======
        return $this->generatableColumn('bigint', $column);
>>>>>>> dev
    }

    /**
     * Create the column definition for a medium integer type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeMediumInteger(Fluent $column)
    {
<<<<<<< HEAD
        return $column->autoIncrement ? 'serial' : 'integer';
=======
        return $this->generatableColumn('integer', $column);
>>>>>>> dev
    }

    /**
     * Create the column definition for a tiny integer type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeTinyInteger(Fluent $column)
    {
<<<<<<< HEAD
        return $column->autoIncrement ? 'smallserial' : 'smallint';
=======
        return $this->generatableColumn('smallint', $column);
>>>>>>> dev
    }

    /**
     * Create the column definition for a small integer type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeSmallInteger(Fluent $column)
    {
<<<<<<< HEAD
        return $column->autoIncrement ? 'smallserial' : 'smallint';
=======
        return $this->generatableColumn('smallint', $column);
    }

    /**
     * Create the column definition for a generatable column.
     *
     * @param  string  $type
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function generatableColumn($type, Fluent $column)
    {
        if (! $column->autoIncrement && is_null($column->generatedAs)) {
            return $type;
        }

        if ($column->autoIncrement && is_null($column->generatedAs)) {
            return with([
                'integer' => 'serial',
                'bigint' => 'bigserial',
                'smallint' => 'smallserial',
            ])[$type];
        }

        $options = '';

        if (! is_bool($column->generatedAs) && ! empty($column->generatedAs)) {
            $options = sprintf(' (%s)', $column->generatedAs);
        }

        return sprintf(
            '%s generated %s as identity%s',
            $type,
            $column->always ? 'always' : 'by default',
            $options
        );
>>>>>>> dev
    }

    /**
     * Create the column definition for a float type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeFloat(Fluent $column)
    {
        return $this->typeDouble($column);
    }

    /**
     * Create the column definition for a double type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeDouble(Fluent $column)
    {
        return 'double precision';
    }

    /**
<<<<<<< HEAD
=======
     * Create the column definition for a real type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeReal(Fluent $column)
    {
        return 'real';
    }

    /**
>>>>>>> dev
     * Create the column definition for a decimal type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeDecimal(Fluent $column)
    {
        return "decimal({$column->total}, {$column->places})";
    }

    /**
     * Create the column definition for a boolean type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeBoolean(Fluent $column)
    {
        return 'boolean';
    }

    /**
<<<<<<< HEAD
     * Create the column definition for an enum type.
=======
     * Create the column definition for an enumeration type.
>>>>>>> dev
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeEnum(Fluent $column)
    {
<<<<<<< HEAD
        $allowed = array_map(function ($a) {
            return "'".$a."'";
        }, $column->allowed);

        return "varchar(255) check (\"{$column->name}\" in (".implode(', ', $allowed).'))';
=======
        return sprintf(
            'varchar(255) check ("%s" in (%s))',
            $column->name,
            $this->quoteString($column->allowed)
        );
>>>>>>> dev
    }

    /**
     * Create the column definition for a json type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeJson(Fluent $column)
    {
        return 'json';
    }

    /**
     * Create the column definition for a jsonb type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeJsonb(Fluent $column)
    {
        return 'jsonb';
    }

    /**
     * Create the column definition for a date type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeDate(Fluent $column)
    {
        return 'date';
    }

    /**
     * Create the column definition for a date-time type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeDateTime(Fluent $column)
    {
<<<<<<< HEAD
        return 'timestamp(0) without time zone';
    }

    /**
     * Create the column definition for a date-time type.
=======
        return $this->typeTimestamp($column);
    }

    /**
     * Create the column definition for a date-time (with time zone) type.
>>>>>>> dev
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeDateTimeTz(Fluent $column)
    {
<<<<<<< HEAD
        return 'timestamp(0) with time zone';
=======
        return $this->typeTimestampTz($column);
>>>>>>> dev
    }

    /**
     * Create the column definition for a time type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeTime(Fluent $column)
    {
<<<<<<< HEAD
        return 'time(0) without time zone';
    }

    /**
     * Create the column definition for a time type.
=======
        return "time($column->precision) without time zone";
    }

    /**
     * Create the column definition for a time (with time zone) type.
>>>>>>> dev
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeTimeTz(Fluent $column)
    {
<<<<<<< HEAD
        return 'time(0) with time zone';
=======
        return "time($column->precision) with time zone";
>>>>>>> dev
    }

    /**
     * Create the column definition for a timestamp type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeTimestamp(Fluent $column)
    {
<<<<<<< HEAD
        if ($column->useCurrent) {
            return 'timestamp(0) without time zone default CURRENT_TIMESTAMP(0)';
        }

        return 'timestamp(0) without time zone';
    }

    /**
     * Create the column definition for a timestamp type.
=======
        $columnType = "timestamp($column->precision) without time zone";

        return $column->useCurrent ? "$columnType default CURRENT_TIMESTAMP" : $columnType;
    }

    /**
     * Create the column definition for a timestamp (with time zone) type.
>>>>>>> dev
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeTimestampTz(Fluent $column)
    {
<<<<<<< HEAD
        if ($column->useCurrent) {
            return 'timestamp(0) with time zone default CURRENT_TIMESTAMP(0)';
        }

        return 'timestamp(0) with time zone';
=======
        $columnType = "timestamp($column->precision) with time zone";

        return $column->useCurrent ? "$columnType default CURRENT_TIMESTAMP" : $columnType;
    }

    /**
     * Create the column definition for a year type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeYear(Fluent $column)
    {
        return $this->typeInteger($column);
>>>>>>> dev
    }

    /**
     * Create the column definition for a binary type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeBinary(Fluent $column)
    {
        return 'bytea';
    }

    /**
     * Create the column definition for a uuid type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeUuid(Fluent $column)
    {
        return 'uuid';
    }

    /**
     * Create the column definition for an IP address type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeIpAddress(Fluent $column)
    {
        return 'inet';
    }

    /**
     * Create the column definition for a MAC address type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeMacAddress(Fluent $column)
    {
        return 'macaddr';
    }

    /**
<<<<<<< HEAD
=======
     * Create the column definition for a spatial Geometry type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeGeometry(Fluent $column)
    {
        return $this->formatPostGisType('geometry');
    }

    /**
     * Create the column definition for a spatial Point type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typePoint(Fluent $column)
    {
        return $this->formatPostGisType('point');
    }

    /**
     * Create the column definition for a spatial LineString type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeLineString(Fluent $column)
    {
        return $this->formatPostGisType('linestring');
    }

    /**
     * Create the column definition for a spatial Polygon type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typePolygon(Fluent $column)
    {
        return $this->formatPostGisType('polygon');
    }

    /**
     * Create the column definition for a spatial GeometryCollection type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeGeometryCollection(Fluent $column)
    {
        return $this->formatPostGisType('geometrycollection');
    }

    /**
     * Create the column definition for a spatial MultiPoint type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeMultiPoint(Fluent $column)
    {
        return $this->formatPostGisType('multipoint');
    }

    /**
     * Create the column definition for a spatial MultiLineString type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    public function typeMultiLineString(Fluent $column)
    {
        return $this->formatPostGisType('multilinestring');
    }

    /**
     * Create the column definition for a spatial MultiPolygon type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    protected function typeMultiPolygon(Fluent $column)
    {
        return $this->formatPostGisType('multipolygon');
    }

    /**
     * Format the column definition for a PostGIS spatial type.
     *
     * @param  string  $type
     * @return string
     */
    private function formatPostGisType(string $type)
    {
        return "geography($type, 4326)";
    }

    /**
>>>>>>> dev
     * Get the SQL for a nullable column modifier.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $column
     * @return string|null
     */
    protected function modifyNullable(Blueprint $blueprint, Fluent $column)
    {
        return $column->nullable ? ' null' : ' not null';
    }

    /**
     * Get the SQL for a default column modifier.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $column
     * @return string|null
     */
    protected function modifyDefault(Blueprint $blueprint, Fluent $column)
    {
        if (! is_null($column->default)) {
            return ' default '.$this->getDefaultValue($column->default);
        }
    }

    /**
     * Get the SQL for an auto-increment column modifier.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $column
     * @return string|null
     */
    protected function modifyIncrement(Blueprint $blueprint, Fluent $column)
    {
<<<<<<< HEAD
        if (in_array($column->type, $this->serials) && $column->autoIncrement) {
=======
        if ((in_array($column->type, $this->serials) || ($column->generatedAs !== null)) && $column->autoIncrement) {
>>>>>>> dev
            return ' primary key';
        }
    }
}
