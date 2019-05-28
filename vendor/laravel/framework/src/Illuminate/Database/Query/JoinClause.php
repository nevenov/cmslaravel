<?php

namespace Illuminate\Database\Query;

use Closure;
<<<<<<< HEAD
use InvalidArgumentException;

class JoinClause
=======

class JoinClause extends Builder
>>>>>>> dev
{
    /**
     * The type of join being performed.
     *
     * @var string
     */
    public $type;

    /**
     * The table the join clause is joining to.
     *
     * @var string
     */
    public $table;

    /**
<<<<<<< HEAD
     * The "on" clauses for the join.
     *
     * @var array
     */
    public $clauses = [];

    /**
     * The "on" bindings for the join.
     *
     * @var array
     */
    public $bindings = [];
=======
     * The connection of the parent query builder.
     *
     * @var \Illuminate\Database\ConnectionInterface
     */
    protected $parentConnection;

    /**
     * The grammar of the parent query builder.
     *
     * @var \Illuminate\Database\Query\Grammars\Grammar
     */
    protected $parentGrammar;

    /**
     * The processor of the parent query builder.
     *
     * @var \Illuminate\Database\Query\Processors\Processor
     */
    protected $parentProcessor;

    /**
     * The class name of the parent query builder.
     *
     * @var string
     */
    protected $parentClass;
>>>>>>> dev

    /**
     * Create a new join clause instance.
     *
<<<<<<< HEAD
=======
     * @param  \Illuminate\Database\Query\Builder $parentQuery
>>>>>>> dev
     * @param  string  $type
     * @param  string  $table
     * @return void
     */
<<<<<<< HEAD
    public function __construct($type, $table)
    {
        $this->type = $type;
        $this->table = $table;
=======
    public function __construct(Builder $parentQuery, $type, $table)
    {
        $this->type = $type;
        $this->table = $table;
        $this->parentClass = get_class($parentQuery);
        $this->parentGrammar = $parentQuery->getGrammar();
        $this->parentProcessor = $parentQuery->getProcessor();
        $this->parentConnection = $parentQuery->getConnection();

        parent::__construct(
            $this->parentConnection, $this->parentGrammar, $this->parentProcessor
        );
>>>>>>> dev
    }

    /**
     * Add an "on" clause to the join.
     *
     * On clauses can be chained, e.g.
     *
     *  $join->on('contacts.user_id', '=', 'users.id')
     *       ->on('contacts.info_id', '=', 'info.id')
     *
     * will produce the following SQL:
     *
<<<<<<< HEAD
     * on `contacts`.`user_id` = `users`.`id`  and `contacts`.`info_id` = `info`.`id`
=======
     * on `contacts`.`user_id` = `users`.`id` and `contacts`.`info_id` = `info`.`id`
>>>>>>> dev
     *
     * @param  \Closure|string  $first
     * @param  string|null  $operator
     * @param  string|null  $second
     * @param  string  $boolean
<<<<<<< HEAD
     * @param  bool  $where
=======
>>>>>>> dev
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
<<<<<<< HEAD
    public function on($first, $operator = null, $second = null, $boolean = 'and', $where = false)
    {
        if ($first instanceof Closure) {
            return $this->nest($first, $boolean);
        }

        if (func_num_args() < 3) {
            throw new InvalidArgumentException('Not enough arguments for the on clause.');
        }

        if ($where) {
            $this->bindings[] = $second;
        }

        if ($where && ($operator === 'in' || $operator === 'not in') && is_array($second)) {
            $second = count($second);
        }

        $nested = false;

        $this->clauses[] = compact('first', 'operator', 'second', 'boolean', 'where', 'nested');

        return $this;
=======
    public function on($first, $operator = null, $second = null, $boolean = 'and')
    {
        if ($first instanceof Closure) {
            return $this->whereNested($first, $boolean);
        }

        return $this->whereColumn($first, $operator, $second, $boolean);
>>>>>>> dev
    }

    /**
     * Add an "or on" clause to the join.
     *
     * @param  \Closure|string  $first
     * @param  string|null  $operator
     * @param  string|null  $second
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function orOn($first, $operator = null, $second = null)
    {
        return $this->on($first, $operator, $second, 'or');
    }

    /**
<<<<<<< HEAD
     * Add an "on where" clause to the join.
     *
     * @param  \Closure|string  $first
     * @param  string|null  $operator
     * @param  string|null  $second
     * @param  string  $boolean
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function where($first, $operator = null, $second = null, $boolean = 'and')
    {
        return $this->on($first, $operator, $second, $boolean, true);
    }

    /**
     * Add an "or on where" clause to the join.
     *
     * @param  \Closure|string  $first
     * @param  string|null  $operator
     * @param  string|null  $second
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function orWhere($first, $operator = null, $second = null)
    {
        return $this->on($first, $operator, $second, 'or', true);
    }

    /**
     * Add an "on where is null" clause to the join.
     *
     * @param  string  $column
     * @param  string  $boolean
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function whereNull($column, $boolean = 'and')
    {
        return $this->on($column, 'is', new Expression('null'), $boolean, false);
    }

    /**
     * Add an "or on where is null" clause to the join.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function orWhereNull($column)
    {
        return $this->whereNull($column, 'or');
    }

    /**
     * Add an "on where is not null" clause to the join.
     *
     * @param  string  $column
     * @param  string  $boolean
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function whereNotNull($column, $boolean = 'and')
    {
        return $this->on($column, 'is', new Expression('not null'), $boolean, false);
    }

    /**
     * Add an "or on where is not null" clause to the join.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function orWhereNotNull($column)
    {
        return $this->whereNotNull($column, 'or');
    }

    /**
     * Add an "on where in (...)" clause to the join.
     *
     * @param  string  $column
     * @param  array  $values
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function whereIn($column, array $values)
    {
        return $this->on($column, 'in', $values, 'and', true);
    }

    /**
     * Add an "on where not in (...)" clause to the join.
     *
     * @param  string  $column
     * @param  array  $values
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function whereNotIn($column, array $values)
    {
        return $this->on($column, 'not in', $values, 'and', true);
    }

    /**
     * Add an "or on where in (...)" clause to the join.
     *
     * @param  string  $column
     * @param  array  $values
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function orWhereIn($column, array $values)
    {
        return $this->on($column, 'in', $values, 'or', true);
    }

    /**
     * Add an "or on where not in (...)" clause to the join.
     *
     * @param  string  $column
     * @param  array  $values
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function orWhereNotIn($column, array $values)
    {
        return $this->on($column, 'not in', $values, 'or', true);
    }

    /**
     * Add a nested where statement to the query.
     *
     * @param  \Closure  $callback
     * @param  string   $boolean
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function nest(Closure $callback, $boolean = 'and')
    {
        $join = new static($this->type, $this->table);

        $callback($join);

        if (count($join->clauses)) {
            $nested = true;

            $this->clauses[] = compact('nested', 'join', 'boolean');
            $this->bindings = array_merge($this->bindings, $join->bindings);
        }

        return $this;
=======
     * Get a new instance of the join clause builder.
     *
     * @return \Illuminate\Database\Query\JoinClause
     */
    public function newQuery()
    {
        return new static($this->newParentQuery(), $this->type, $this->table);
    }

    /**
     * Create a new query instance for sub-query.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function forSubQuery()
    {
        return $this->newParentQuery()->newQuery();
    }

    /**
     * Create a new parent query instance.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function newParentQuery()
    {
        $class = $this->parentClass;

        return new $class($this->parentConnection, $this->parentGrammar, $this->parentProcessor);
>>>>>>> dev
    }
}
