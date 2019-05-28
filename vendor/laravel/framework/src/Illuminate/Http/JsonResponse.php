<?php

namespace Illuminate\Http;

use JsonSerializable;
use InvalidArgumentException;
<<<<<<< HEAD
=======
use Illuminate\Support\Traits\Macroable;
>>>>>>> dev
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;
use Symfony\Component\HttpFoundation\JsonResponse as BaseJsonResponse;

class JsonResponse extends BaseJsonResponse
{
<<<<<<< HEAD
    use ResponseTrait;
=======
    use ResponseTrait, Macroable {
        Macroable::__call as macroCall;
    }
>>>>>>> dev

    /**
     * Constructor.
     *
     * @param  mixed  $data
     * @param  int    $status
     * @param  array  $headers
     * @param  int    $options
<<<<<<< HEAD
=======
     * @return void
>>>>>>> dev
     */
    public function __construct($data = null, $status = 200, $headers = [], $options = 0)
    {
        $this->encodingOptions = $options;

        parent::__construct($data, $status, $headers);
    }

    /**
<<<<<<< HEAD
     * Get the json_decoded data from the response.
     *
     * @param  bool  $assoc
     * @param  int   $depth
=======
     * Sets the JSONP callback.
     *
     * @param  string|null  $callback
     * @return $this
     */
    public function withCallback($callback = null)
    {
        return $this->setCallback($callback);
    }

    /**
     * Get the json_decoded data from the response.
     *
     * @param  bool  $assoc
     * @param  int  $depth
>>>>>>> dev
     * @return mixed
     */
    public function getData($assoc = false, $depth = 512)
    {
        return json_decode($this->data, $assoc, $depth);
    }

    /**
     * {@inheritdoc}
     */
    public function setData($data = [])
    {
<<<<<<< HEAD
        if ($data instanceof Arrayable) {
            $this->data = json_encode($data->toArray(), $this->encodingOptions);
        } elseif ($data instanceof Jsonable) {
            $this->data = $data->toJson($this->encodingOptions);
        } elseif ($data instanceof JsonSerializable) {
            $this->data = json_encode($data->jsonSerialize(), $this->encodingOptions);
=======
        $this->original = $data;

        if ($data instanceof Jsonable) {
            $this->data = $data->toJson($this->encodingOptions);
        } elseif ($data instanceof JsonSerializable) {
            $this->data = json_encode($data->jsonSerialize(), $this->encodingOptions);
        } elseif ($data instanceof Arrayable) {
            $this->data = json_encode($data->toArray(), $this->encodingOptions);
>>>>>>> dev
        } else {
            $this->data = json_encode($data, $this->encodingOptions);
        }

<<<<<<< HEAD
        if (JSON_ERROR_NONE !== json_last_error()) {
=======
        if (! $this->hasValidJson(json_last_error())) {
>>>>>>> dev
            throw new InvalidArgumentException(json_last_error_msg());
        }

        return $this->update();
    }

    /**
<<<<<<< HEAD
     * Get the JSON encoding options.
     *
     * @return int
     */
    public function getJsonOptions()
    {
        return $this->getEncodingOptions();
=======
     * Determine if an error occurred during JSON encoding.
     *
     * @param  int  $jsonError
     * @return bool
     */
    protected function hasValidJson($jsonError)
    {
        if ($jsonError === JSON_ERROR_NONE) {
            return true;
        }

        return $this->hasEncodingOption(JSON_PARTIAL_OUTPUT_ON_ERROR) &&
                    in_array($jsonError, [
                        JSON_ERROR_RECURSION,
                        JSON_ERROR_INF_OR_NAN,
                        JSON_ERROR_UNSUPPORTED_TYPE,
                    ]);
>>>>>>> dev
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setEncodingOptions($encodingOptions)
    {
        return $this->setJsonOptions($encodingOptions);
    }

    /**
     * Set the JSON encoding options.
     *
     * @param  int  $options
     * @return mixed
     */
    public function setJsonOptions($options)
    {
        $this->encodingOptions = (int) $options;

        return $this->setData($this->getData());
=======
    public function setEncodingOptions($options)
    {
        $this->encodingOptions = (int) $options;

        return $this->setData($this->getData());
    }

    /**
     * Determine if a JSON encoding option is set.
     *
     * @param  int  $option
     * @return bool
     */
    public function hasEncodingOption($option)
    {
        return (bool) ($this->encodingOptions & $option);
>>>>>>> dev
    }
}
