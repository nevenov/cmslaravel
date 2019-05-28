<?php

namespace Illuminate\Auth\Passwords;

<<<<<<< HEAD
=======
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

>>>>>>> dev
trait CanResetPassword
{
    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }
<<<<<<< HEAD
=======

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
>>>>>>> dev
}
