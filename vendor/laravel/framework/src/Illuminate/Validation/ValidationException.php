<?php

namespace Illuminate\Validation;

use Exception;
<<<<<<< HEAD
=======
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
>>>>>>> dev

class ValidationException extends Exception
{
    /**
     * The validator instance.
     *
<<<<<<< HEAD
     * @var \Illuminate\Validation\Validator
=======
     * @var \Illuminate\Contracts\Validation\Validator
>>>>>>> dev
     */
    public $validator;

    /**
     * The recommended response to send to the client.
     *
<<<<<<< HEAD
     * @var \Illuminate\Http\Response|null
=======
     * @var \Symfony\Component\HttpFoundation\Response|null
>>>>>>> dev
     */
    public $response;

    /**
<<<<<<< HEAD
     * Create a new exception instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    public function __construct($validator, $response = null)
    {
        parent::__construct('The given data failed to pass validation.');

        $this->response = $response;
=======
     * The status code to use for the response.
     *
     * @var int
     */
    public $status = 422;

    /**
     * The name of the error bag.
     *
     * @var string
     */
    public $errorBag;

    /**
     * The path the client should be redirected to.
     *
     * @var string
     */
    public $redirectTo;

    /**
     * Create a new exception instance.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @param  string  $errorBag
     * @return void
     */
    public function __construct($validator, $response = null, $errorBag = 'default')
    {
        parent::__construct('The given data was invalid.');

        $this->response = $response;
        $this->errorBag = $errorBag;
>>>>>>> dev
        $this->validator = $validator;
    }

    /**
<<<<<<< HEAD
     * Get the underlying response instance.
     *
     * @return \Symfony\Component\HttpFoundation\Response
=======
     * Create a new validation exception from a plain array of messages.
     *
     * @param  array  $messages
     * @return static
     */
    public static function withMessages(array $messages)
    {
        return new static(tap(ValidatorFacade::make([], []), function ($validator) use ($messages) {
            foreach ($messages as $key => $value) {
                foreach (Arr::wrap($value) as $message) {
                    $validator->errors()->add($key, $message);
                }
            }
        }));
    }

    /**
     * Get all of the validation error messages.
     *
     * @return array
     */
    public function errors()
    {
        return $this->validator->errors()->messages();
    }

    /**
     * Set the HTTP status code to be used for the response.
     *
     * @param  int  $status
     * @return $this
     */
    public function status($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set the error bag on the exception.
     *
     * @param  string  $errorBag
     * @return $this
     */
    public function errorBag($errorBag)
    {
        $this->errorBag = $errorBag;

        return $this;
    }

    /**
     * Set the URL to redirect to on a validation error.
     *
     * @param  string  $url
     * @return $this
     */
    public function redirectTo($url)
    {
        $this->redirectTo = $url;

        return $this;
    }

    /**
     * Get the underlying response instance.
     *
     * @return \Symfony\Component\HttpFoundation\Response|null
>>>>>>> dev
     */
    public function getResponse()
    {
        return $this->response;
    }
}
