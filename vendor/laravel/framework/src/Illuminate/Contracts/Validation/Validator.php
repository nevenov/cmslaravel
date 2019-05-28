<?php

namespace Illuminate\Contracts\Validation;

use Illuminate\Contracts\Support\MessageProvider;

interface Validator extends MessageProvider
{
    /**
<<<<<<< HEAD
=======
     * Run the validator's rules against its data.
     *
     * @return array
     */
    public function validate();

    /**
     * Get the attributes and values that were validated.
     *
     * @return array
     */
    public function validated();

    /**
>>>>>>> dev
     * Determine if the data fails the validation rules.
     *
     * @return bool
     */
    public function fails();

    /**
     * Get the failed validation rules.
     *
     * @return array
     */
    public function failed();

    /**
     * Add conditions to a given field based on a Closure.
     *
<<<<<<< HEAD
     * @param  string  $attribute
     * @param  string|array  $rules
     * @param  callable  $callback
     * @return void
=======
     * @param  string|array  $attribute
     * @param  string|array  $rules
     * @param  callable  $callback
     * @return $this
>>>>>>> dev
     */
    public function sometimes($attribute, $rules, callable $callback);

    /**
<<<<<<< HEAD
     * After an after validation callback.
=======
     * Add an after validation callback.
>>>>>>> dev
     *
     * @param  callable|string  $callback
     * @return $this
     */
    public function after($callback);
<<<<<<< HEAD
=======

    /**
     * Get all of the validation error messages.
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function errors();
>>>>>>> dev
}
