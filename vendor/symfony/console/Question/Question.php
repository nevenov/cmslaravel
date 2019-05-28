<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Question;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\LogicException;

/**
 * Represents a Question.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Question
{
    private $question;
    private $attempts;
    private $hidden = false;
    private $hiddenFallback = true;
    private $autocompleterValues;
    private $validator;
    private $default;
    private $normalizer;

    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param string $question The question to ask to the user
     * @param mixed  $default  The default answer to return if the user enters nothing
     */
    public function __construct($question, $default = null)
=======
     * @param string $question The question to ask to the user
     * @param mixed  $default  The default answer to return if the user enters nothing
     */
    public function __construct(string $question, $default = null)
>>>>>>> dev
    {
        $this->question = $question;
        $this->default = $default;
    }

    /**
     * Returns the question.
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Returns the default answer.
     *
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Returns whether the user response must be hidden.
     *
     * @return bool
     */
    public function isHidden()
    {
        return $this->hidden;
    }

    /**
     * Sets whether the user response must be hidden or not.
     *
     * @param bool $hidden
     *
<<<<<<< HEAD
     * @return Question The current instance
=======
     * @return $this
>>>>>>> dev
     *
     * @throws LogicException In case the autocompleter is also used
     */
    public function setHidden($hidden)
    {
        if ($this->autocompleterValues) {
            throw new LogicException('A hidden question cannot use the autocompleter.');
        }

        $this->hidden = (bool) $hidden;

        return $this;
    }

    /**
     * In case the response can not be hidden, whether to fallback on non-hidden question or not.
     *
     * @return bool
     */
    public function isHiddenFallback()
    {
        return $this->hiddenFallback;
    }

    /**
     * Sets whether to fallback on non-hidden question if the response can not be hidden.
     *
     * @param bool $fallback
     *
<<<<<<< HEAD
     * @return Question The current instance
=======
     * @return $this
>>>>>>> dev
     */
    public function setHiddenFallback($fallback)
    {
        $this->hiddenFallback = (bool) $fallback;

        return $this;
    }

    /**
     * Gets values for the autocompleter.
     *
<<<<<<< HEAD
     * @return null|array|\Traversable
=======
     * @return iterable|null
>>>>>>> dev
     */
    public function getAutocompleterValues()
    {
        return $this->autocompleterValues;
    }

    /**
     * Sets values for the autocompleter.
     *
<<<<<<< HEAD
     * @param null|array|\Traversable $values
     *
     * @return Question The current instance
=======
     * @param iterable|null $values
     *
     * @return $this
>>>>>>> dev
     *
     * @throws InvalidArgumentException
     * @throws LogicException
     */
    public function setAutocompleterValues($values)
    {
<<<<<<< HEAD
        if (is_array($values)) {
            $values = $this->isAssoc($values) ? array_merge(array_keys($values), array_values($values)) : array_values($values);
        }

        if (null !== $values && !is_array($values)) {
            if (!$values instanceof \Traversable || !$values instanceof \Countable) {
                throw new InvalidArgumentException('Autocompleter values can be either an array, `null` or an object implementing both `Countable` and `Traversable` interfaces.');
            }
=======
        if (\is_array($values)) {
            $values = $this->isAssoc($values) ? array_merge(array_keys($values), array_values($values)) : array_values($values);
        }

        if (null !== $values && !\is_array($values) && !$values instanceof \Traversable) {
            throw new InvalidArgumentException('Autocompleter values can be either an array, "null" or a "Traversable" object.');
>>>>>>> dev
        }

        if ($this->hidden) {
            throw new LogicException('A hidden question cannot use the autocompleter.');
        }

        $this->autocompleterValues = $values;

        return $this;
    }

    /**
     * Sets a validator for the question.
     *
<<<<<<< HEAD
     * @param null|callable $validator
     *
     * @return Question The current instance
=======
     * @param callable|null $validator
     *
     * @return $this
>>>>>>> dev
     */
    public function setValidator(callable $validator = null)
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * Gets the validator for the question.
     *
<<<<<<< HEAD
     * @return null|callable
=======
     * @return callable|null
>>>>>>> dev
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * Sets the maximum number of attempts.
     *
     * Null means an unlimited number of attempts.
     *
<<<<<<< HEAD
     * @param null|int $attempts
     *
     * @return Question The current instance
     *
     * @throws InvalidArgumentException In case the number of attempts is invalid.
=======
     * @param int|null $attempts
     *
     * @return $this
     *
     * @throws InvalidArgumentException in case the number of attempts is invalid
>>>>>>> dev
     */
    public function setMaxAttempts($attempts)
    {
        if (null !== $attempts && $attempts < 1) {
            throw new InvalidArgumentException('Maximum number of attempts must be a positive value.');
        }

        $this->attempts = $attempts;

        return $this;
    }

    /**
     * Gets the maximum number of attempts.
     *
     * Null means an unlimited number of attempts.
     *
<<<<<<< HEAD
     * @return null|int
=======
     * @return int|null
>>>>>>> dev
     */
    public function getMaxAttempts()
    {
        return $this->attempts;
    }

    /**
     * Sets a normalizer for the response.
     *
     * The normalizer can be a callable (a string), a closure or a class implementing __invoke.
     *
     * @param callable $normalizer
     *
<<<<<<< HEAD
     * @return Question The current instance
=======
     * @return $this
>>>>>>> dev
     */
    public function setNormalizer(callable $normalizer)
    {
        $this->normalizer = $normalizer;

        return $this;
    }

    /**
     * Gets the normalizer for the response.
     *
     * The normalizer can ba a callable (a string), a closure or a class implementing __invoke.
     *
     * @return callable
     */
    public function getNormalizer()
    {
        return $this->normalizer;
    }

    protected function isAssoc($array)
    {
<<<<<<< HEAD
        return (bool) count(array_filter(array_keys($array), 'is_string'));
=======
        return (bool) \count(array_filter(array_keys($array), 'is_string'));
>>>>>>> dev
    }
}
