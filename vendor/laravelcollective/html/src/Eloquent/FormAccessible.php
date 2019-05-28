<?php

namespace Collective\Html\Eloquent;

use ReflectionClass;
use ReflectionMethod;
use Illuminate\Support\Str;

trait FormAccessible
{

    /**
     * A cached ReflectionClass instance for $this
     *
     * @var ReflectionClass
     */
    protected $reflection;

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getFormValue($key)
    {
        $value = $this->getAttributeFromArray($key);

        // If the attribute is listed as a date, we will convert it to a DateTime
        // instance on retrieval, which makes it quite convenient to work with
        // date fields without having to create a mutator for each property.
        if (in_array($key, $this->getDates())) {
            if (! is_null($value)) {
                $value = $this->asDateTime($value);
            }
        }

        // If the attribute has a get mutator, we will call that then return what
        // it returns as the value, which is useful for transforming values on
        // retrieval from the model to a form that is more useful for usage.
        if ($this->hasFormMutator($key)) {
            return $this->mutateFormAttribute($key, $value);
        }

<<<<<<< HEAD
=======
        $keys = explode('.', $key);

        if ($this->isNestedModel($keys[0])) {
            $relatedModel = $this->getRelation($keys[0]);

            unset($keys[0]);
            $key = implode('.', $keys);

            if (method_exists($relatedModel, 'hasFormMutator') && $key !== '' && $relatedModel->hasFormMutator($key)) {
                return $relatedModel->getFormValue($key);
            }

            return data_get($relatedModel, empty($key)? null: $key);
        }

>>>>>>> dev
        // No form mutator, let the model resolve this
        return data_get($this, $key);
    }

    /**
<<<<<<< HEAD
=======
     * Check for a nested model.
     *
     * @param  string  $key
     *
     * @return bool
     */
    public function isNestedModel($key)
    {
        return in_array($key, array_keys($this->getRelations()));
    }

    /**
>>>>>>> dev
     * @param $key
     *
     * @return bool
     */
<<<<<<< HEAD
    protected function hasFormMutator($key)
=======
    public function hasFormMutator($key)
>>>>>>> dev
    {
        $methods = $this->getReflection()->getMethods(ReflectionMethod::IS_PUBLIC);

        $mutator = collect($methods)
<<<<<<< HEAD
          ->first(function ($index, ReflectionMethod $method) use ($key) {
              return $method->getName() == 'form' . Str::studly($key) . 'Attribute';
=======
          ->first(function (ReflectionMethod $method) use ($key) {
              return $method->getName() === 'form' . Str::studly($key) . 'Attribute';
>>>>>>> dev
          });

        return (bool) $mutator;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    private function mutateFormAttribute($key, $value)
    {
        return $this->{'form' . Str::studly($key) . 'Attribute'}($value);
    }

    /**
     * Get a ReflectionClass Instance
     * @return ReflectionClass
     */
    protected function getReflection()
    {
        if (! $this->reflection) {
            $this->reflection = new ReflectionClass($this);
        }

        return $this->reflection;
    }
}
