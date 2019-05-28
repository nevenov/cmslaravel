<?php

namespace Illuminate\Contracts\Encryption;

interface Encrypter
{
    /**
     * Encrypt the given value.
     *
<<<<<<< HEAD
     * @param  string  $value
     * @return string
     */
    public function encrypt($value);
=======
     * @param  mixed  $value
     * @param  bool  $serialize
     * @return mixed
     *
     * @throws \Illuminate\Contracts\Encryption\EncryptException
     */
    public function encrypt($value, $serialize = true);
>>>>>>> dev

    /**
     * Decrypt the given value.
     *
<<<<<<< HEAD
     * @param  string  $payload
     * @return string
     */
    public function decrypt($payload);
=======
     * @param  mixed  $payload
     * @param  bool  $unserialize
     * @return mixed
     *
     * @throws \Illuminate\Contracts\Encryption\DecryptException
     */
    public function decrypt($payload, $unserialize = true);
>>>>>>> dev
}
