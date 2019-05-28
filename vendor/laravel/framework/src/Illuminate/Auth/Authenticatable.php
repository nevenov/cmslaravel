<?php

namespace Illuminate\Auth;

trait Authenticatable
{
    /**
<<<<<<< HEAD
=======
     * The column name of the "remember me" token.
     *
     * @var string
     */
    protected $rememberTokenName = 'remember_token';

    /**
>>>>>>> dev
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
<<<<<<< HEAD
        return $this->getKey();
=======
        return $this->{$this->getAuthIdentifierName()};
>>>>>>> dev
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
<<<<<<< HEAD
     * @return string
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
=======
     * @return string|null
     */
    public function getRememberToken()
    {
        if (! empty($this->getRememberTokenName())) {
            return (string) $this->{$this->getRememberTokenName()};
        }
>>>>>>> dev
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
<<<<<<< HEAD
        $this->{$this->getRememberTokenName()} = $value;
=======
        if (! empty($this->getRememberTokenName())) {
            $this->{$this->getRememberTokenName()} = $value;
        }
>>>>>>> dev
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
<<<<<<< HEAD
        return 'remember_token';
=======
        return $this->rememberTokenName;
>>>>>>> dev
    }
}
