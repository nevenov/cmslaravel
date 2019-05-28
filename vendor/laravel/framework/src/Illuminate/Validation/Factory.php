<?php

namespace Illuminate\Validation;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Contracts\Container\Container;
<<<<<<< HEAD
use Symfony\Component\Translation\TranslatorInterface;
=======
use Illuminate\Contracts\Translation\Translator;
>>>>>>> dev
use Illuminate\Contracts\Validation\Factory as FactoryContract;

class Factory implements FactoryContract
{
    /**
     * The Translator implementation.
     *
<<<<<<< HEAD
     * @var \Symfony\Component\Translation\TranslatorInterface
=======
     * @var \Illuminate\Contracts\Translation\Translator
>>>>>>> dev
     */
    protected $translator;

    /**
     * The Presence Verifier implementation.
     *
     * @var \Illuminate\Validation\PresenceVerifierInterface
     */
    protected $verifier;

    /**
     * The IoC container instance.
     *
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $container;

    /**
     * All of the custom validator extensions.
     *
     * @var array
     */
    protected $extensions = [];

    /**
     * All of the custom implicit validator extensions.
     *
     * @var array
     */
    protected $implicitExtensions = [];

    /**
<<<<<<< HEAD
=======
     * All of the custom dependent validator extensions.
     *
     * @var array
     */
    protected $dependentExtensions = [];

    /**
>>>>>>> dev
     * All of the custom validator message replacers.
     *
     * @var array
     */
    protected $replacers = [];

    /**
     * All of the fallback messages for custom rules.
     *
     * @var array
     */
    protected $fallbackMessages = [];

    /**
     * The Validator resolver instance.
     *
<<<<<<< HEAD
     * @var Closure
=======
     * @var \Closure
>>>>>>> dev
     */
    protected $resolver;

    /**
     * Create a new Validator factory instance.
     *
<<<<<<< HEAD
     * @param  \Symfony\Component\Translation\TranslatorInterface  $translator
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @return void
     */
    public function __construct(TranslatorInterface $translator, Container $container = null)
=======
     * @param  \Illuminate\Contracts\Translation\Translator  $translator
     * @param  \Illuminate\Contracts\Container\Container|null  $container
     * @return void
     */
    public function __construct(Translator $translator, Container $container = null)
>>>>>>> dev
    {
        $this->container = $container;
        $this->translator = $translator;
    }

    /**
     * Create a new Validator instance.
     *
     * @param  array  $data
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return \Illuminate\Validation\Validator
     */
    public function make(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
<<<<<<< HEAD
        // The presence verifier is responsible for checking the unique and exists data
        // for the validator. It is behind an interface so that multiple versions of
        // it may be written besides database. We'll inject it into the validator.
        $validator = $this->resolve($data, $rules, $messages, $customAttributes);

=======
        $validator = $this->resolve(
            $data, $rules, $messages, $customAttributes
        );

        // The presence verifier is responsible for checking the unique and exists data
        // for the validator. It is behind an interface so that multiple versions of
        // it may be written besides database. We'll inject it into the validator.
>>>>>>> dev
        if (! is_null($this->verifier)) {
            $validator->setPresenceVerifier($this->verifier);
        }

        // Next we'll set the IoC container instance of the validator, which is used to
        // resolve out class based validator extensions. If it is not set then these
        // types of extensions will not be possible on these validation instances.
        if (! is_null($this->container)) {
            $validator->setContainer($this->container);
        }

        $this->addExtensions($validator);

        return $validator;
    }

    /**
<<<<<<< HEAD
     * Add the extensions to a validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    protected function addExtensions(Validator $validator)
    {
        $validator->addExtensions($this->extensions);

        // Next, we will add the implicit extensions, which are similar to the required
        // and accepted rule in that they are run even if the attributes is not in a
        // array of data that is given to a validator instances via instantiation.
        $implicit = $this->implicitExtensions;

        $validator->addImplicitExtensions($implicit);

        $validator->addReplacers($this->replacers);

        $validator->setFallbackMessages($this->fallbackMessages);
=======
     * Validate the given data against the provided rules.
     *
     * @param  array  $data
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return array
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(array $data, array $rules, array $messages = [], array $customAttributes = [])
    {
        return $this->make($data, $rules, $messages, $customAttributes)->validate();
>>>>>>> dev
    }

    /**
     * Resolve a new Validator instance.
     *
     * @param  array  $data
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return \Illuminate\Validation\Validator
     */
    protected function resolve(array $data, array $rules, array $messages, array $customAttributes)
    {
        if (is_null($this->resolver)) {
            return new Validator($this->translator, $data, $rules, $messages, $customAttributes);
        }

        return call_user_func($this->resolver, $this->translator, $data, $rules, $messages, $customAttributes);
    }

    /**
<<<<<<< HEAD
=======
     * Add the extensions to a validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    protected function addExtensions(Validator $validator)
    {
        $validator->addExtensions($this->extensions);

        // Next, we will add the implicit extensions, which are similar to the required
        // and accepted rule in that they are run even if the attributes is not in a
        // array of data that is given to a validator instances via instantiation.
        $validator->addImplicitExtensions($this->implicitExtensions);

        $validator->addDependentExtensions($this->dependentExtensions);

        $validator->addReplacers($this->replacers);

        $validator->setFallbackMessages($this->fallbackMessages);
    }

    /**
>>>>>>> dev
     * Register a custom validator extension.
     *
     * @param  string  $rule
     * @param  \Closure|string  $extension
     * @param  string  $message
     * @return void
     */
    public function extend($rule, $extension, $message = null)
    {
        $this->extensions[$rule] = $extension;

        if ($message) {
            $this->fallbackMessages[Str::snake($rule)] = $message;
        }
    }

    /**
     * Register a custom implicit validator extension.
     *
<<<<<<< HEAD
     * @param  string   $rule
=======
     * @param  string  $rule
>>>>>>> dev
     * @param  \Closure|string  $extension
     * @param  string  $message
     * @return void
     */
    public function extendImplicit($rule, $extension, $message = null)
    {
        $this->implicitExtensions[$rule] = $extension;

        if ($message) {
            $this->fallbackMessages[Str::snake($rule)] = $message;
        }
    }

    /**
<<<<<<< HEAD
     * Register a custom implicit validator message replacer.
     *
     * @param  string   $rule
=======
     * Register a custom dependent validator extension.
     *
     * @param  string  $rule
     * @param  \Closure|string  $extension
     * @param  string  $message
     * @return void
     */
    public function extendDependent($rule, $extension, $message = null)
    {
        $this->dependentExtensions[$rule] = $extension;

        if ($message) {
            $this->fallbackMessages[Str::snake($rule)] = $message;
        }
    }

    /**
     * Register a custom validator message replacer.
     *
     * @param  string  $rule
>>>>>>> dev
     * @param  \Closure|string  $replacer
     * @return void
     */
    public function replacer($rule, $replacer)
    {
        $this->replacers[$rule] = $replacer;
    }

    /**
     * Set the Validator instance resolver.
     *
     * @param  \Closure  $resolver
     * @return void
     */
    public function resolver(Closure $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * Get the Translator implementation.
     *
<<<<<<< HEAD
     * @return \Symfony\Component\Translation\TranslatorInterface
=======
     * @return \Illuminate\Contracts\Translation\Translator
>>>>>>> dev
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Get the Presence Verifier implementation.
     *
     * @return \Illuminate\Validation\PresenceVerifierInterface
     */
    public function getPresenceVerifier()
    {
        return $this->verifier;
    }

    /**
     * Set the Presence Verifier implementation.
     *
     * @param  \Illuminate\Validation\PresenceVerifierInterface  $presenceVerifier
     * @return void
     */
    public function setPresenceVerifier(PresenceVerifierInterface $presenceVerifier)
    {
        $this->verifier = $presenceVerifier;
    }
}
