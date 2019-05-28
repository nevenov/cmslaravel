<?php

namespace Illuminate\Validation;

<<<<<<< HEAD
use Illuminate\Contracts\Validation\UnauthorizedException;
use Illuminate\Contracts\Validation\ValidationException as ValidationExceptionContract;

=======
>>>>>>> dev
/**
 * Provides default implementation of ValidatesWhenResolved contract.
 */
trait ValidatesWhenResolvedTrait
{
    /**
     * Validate the class instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function validate()
    {
        $instance = $this->getValidatorInstance();

        if (! $this->passesAuthorization()) {
            $this->failedAuthorization();
        } elseif (! $instance->passes()) {
=======
    public function validateResolved()
    {
        $this->prepareForValidation();

        if (! $this->passesAuthorization()) {
            $this->failedAuthorization();
        }

        $instance = $this->getValidatorInstance();

        if ($instance->fails()) {
>>>>>>> dev
            $this->failedValidation($instance);
        }
    }

    /**
<<<<<<< HEAD
=======
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // no default action
    }

    /**
>>>>>>> dev
     * Get the validator instance for the request.
     *
     * @return \Illuminate\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        return $this->validator();
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     *
<<<<<<< HEAD
     * @throws \Illuminate\Contracts\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationExceptionContract($validator);
=======
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator);
>>>>>>> dev
    }

    /**
     * Determine if the request passes the authorization check.
     *
     * @return bool
     */
    protected function passesAuthorization()
    {
        if (method_exists($this, 'authorize')) {
            return $this->authorize();
        }

        return true;
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
<<<<<<< HEAD
     * @throws \Illuminate\Contracts\Validation\UnauthorizedException
=======
     * @throws \Illuminate\Validation\UnauthorizedException
>>>>>>> dev
     */
    protected function failedAuthorization()
    {
        throw new UnauthorizedException;
    }
}
