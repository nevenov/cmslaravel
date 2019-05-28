<?php

namespace Illuminate\Database\Eloquent\Relations;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;

class MorphOne extends MorphOneOrMany
{
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Concerns\SupportsDefaultModels;

class MorphOne extends MorphOneOrMany
{
    use SupportsDefaultModels;

>>>>>>> dev
    /**
     * Get the results of the relationship.
     *
     * @return mixed
     */
    public function getResults()
    {
<<<<<<< HEAD
        return $this->query->first();
=======
        if (is_null($this->getParentKey())) {
            return $this->getDefaultFor($this->parent);
        }

        return $this->query->first() ?: $this->getDefaultFor($this->parent);
>>>>>>> dev
    }

    /**
     * Initialize the relation on a set of models.
     *
     * @param  array   $models
     * @param  string  $relation
     * @return array
     */
    public function initRelation(array $models, $relation)
    {
        foreach ($models as $model) {
<<<<<<< HEAD
            $model->setRelation($relation, null);
=======
            $model->setRelation($relation, $this->getDefaultFor($model));
>>>>>>> dev
        }

        return $models;
    }

    /**
     * Match the eagerly loaded results to their parents.
     *
     * @param  array   $models
     * @param  \Illuminate\Database\Eloquent\Collection  $results
     * @param  string  $relation
     * @return array
     */
    public function match(array $models, Collection $results, $relation)
    {
        return $this->matchOne($models, $results, $relation);
    }
<<<<<<< HEAD
=======

    /**
     * Make a new related instance for the given model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $parent
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function newRelatedInstanceFor(Model $parent)
    {
        return $this->related->newInstance()
                    ->setAttribute($this->getForeignKeyName(), $parent->{$this->localKey})
                    ->setAttribute($this->getMorphType(), $this->morphClass);
    }
>>>>>>> dev
}
