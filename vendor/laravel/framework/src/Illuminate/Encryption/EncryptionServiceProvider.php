<?php

namespace Illuminate\Encryption;

use RuntimeException;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class EncryptionServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('encrypter', function ($app) {
            $config = $app->make('config')->get('app');

<<<<<<< HEAD
            if (Str::startsWith($key = $config['key'], 'base64:')) {
                $key = base64_decode(substr($key, 7));
            }

            return $this->getEncrypterForKeyAndCipher($key, $config['cipher']);
=======
            // If the key starts with "base64:", we will need to decode the key before handing
            // it off to the encrypter. Keys may be base-64 encoded for presentation and we
            // want to make sure to convert them back to the raw bytes before encrypting.
            if (Str::startsWith($key = $this->key($config), 'base64:')) {
                $key = base64_decode(substr($key, 7));
            }

            return new Encrypter($key, $config['cipher']);
>>>>>>> dev
        });
    }

    /**
<<<<<<< HEAD
     * Get the proper encrypter instance for the given key and cipher.
     *
     * @param  string  $key
     * @param  string  $cipher
     * @return mixed
     *
     * @throws \RuntimeException
     */
    protected function getEncrypterForKeyAndCipher($key, $cipher)
    {
        if (Encrypter::supported($key, $cipher)) {
            return new Encrypter($key, $cipher);
        } elseif (McryptEncrypter::supported($key, $cipher)) {
            return new McryptEncrypter($key, $cipher);
        } else {
            throw new RuntimeException('No supported encrypter found. The cipher and / or key length are invalid.');
        }
=======
     * Extract the encryption key from the given configuration.
     *
     * @param  array  $config
     * @return string
     *
     * @throws \RuntimeException
     */
    protected function key(array $config)
    {
        return tap($config['key'], function ($key) {
            if (empty($key)) {
                throw new RuntimeException(
                    'No application encryption key has been specified.'
                );
            }
        });
>>>>>>> dev
    }
}
