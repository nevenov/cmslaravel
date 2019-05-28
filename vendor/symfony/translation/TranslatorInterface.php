<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

<<<<<<< HEAD
=======
use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Contracts\Translation\LocaleAwareInterface;

>>>>>>> dev
/**
 * TranslatorInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 */
interface TranslatorInterface
=======
 *
 * @deprecated since Symfony 4.2, use Symfony\Contracts\Translation\TranslatorInterface instead
 */
interface TranslatorInterface extends LocaleAwareInterface
>>>>>>> dev
{
    /**
     * Translates the given message.
     *
     * @param string      $id         The message id (may also be an object that can be cast to string)
     * @param array       $parameters An array of parameters for the message
     * @param string|null $domain     The domain for the message or null to use the default
     * @param string|null $locale     The locale or null to use the default
     *
     * @return string The translated string
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException If the locale contains invalid characters
     */
    public function trans($id, array $parameters = array(), $domain = null, $locale = null);
=======
     * @throws InvalidArgumentException If the locale contains invalid characters
     */
    public function trans($id, array $parameters = [], $domain = null, $locale = null);
>>>>>>> dev

    /**
     * Translates the given choice message by choosing a translation according to a number.
     *
     * @param string      $id         The message id (may also be an object that can be cast to string)
<<<<<<< HEAD
     * @param int         $number     The number to use to find the indice of the message
=======
     * @param int         $number     The number to use to find the index of the message
>>>>>>> dev
     * @param array       $parameters An array of parameters for the message
     * @param string|null $domain     The domain for the message or null to use the default
     * @param string|null $locale     The locale or null to use the default
     *
     * @return string The translated string
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException If the locale contains invalid characters
     */
    public function transChoice($id, $number, array $parameters = array(), $domain = null, $locale = null);
=======
     * @throws InvalidArgumentException If the locale contains invalid characters
     */
    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null);
>>>>>>> dev

    /**
     * Sets the current locale.
     *
     * @param string $locale The locale
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException If the locale contains invalid characters
=======
     * @throws InvalidArgumentException If the locale contains invalid characters
>>>>>>> dev
     */
    public function setLocale($locale);

    /**
     * Returns the current locale.
     *
     * @return string The locale
     */
    public function getLocale();
}
