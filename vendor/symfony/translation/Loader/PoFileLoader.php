<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

/**
 * @copyright Copyright (c) 2010, Union of RAD http://union-of-rad.org (http://lithify.me/)
 * @copyright Copyright (c) 2012, Clemens Tolboom
 */
class PoFileLoader extends FileLoader
{
    /**
     * Parses portable object (PO) format.
     *
     * From http://www.gnu.org/software/gettext/manual/gettext.html#PO-Files
     * we should be able to parse files having:
     *
     * white-space
     * #  translator-comments
     * #. extracted-comments
     * #: reference...
     * #, flag...
     * #| msgid previous-untranslated-string
     * msgid untranslated-string
     * msgstr translated-string
     *
     * extra or different lines are:
     *
     * #| msgctxt previous-context
     * #| msgid previous-untranslated-string
     * msgctxt context
     *
     * #| msgid previous-untranslated-string-singular
     * #| msgid_plural previous-untranslated-string-plural
     * msgid untranslated-string-singular
     * msgid_plural untranslated-string-plural
     * msgstr[0] translated-string-case-0
     * ...
     * msgstr[N] translated-string-case-n
     *
     * The definition states:
     * - white-space and comments are optional.
     * - msgid "" that an empty singleline defines a header.
     *
     * This parser sacrifices some features of the reference implementation the
     * differences to that implementation are as follows.
     * - No support for comments spanning multiple lines.
     * - Translator and extracted comments are treated as being the same type.
     * - Message IDs are allowed to have other encodings as just US-ASCII.
     *
     * Items with an empty id are ignored.
     *
     * {@inheritdoc}
     */
    protected function loadResource($resource)
    {
        $stream = fopen($resource, 'r');

<<<<<<< HEAD
        $defaults = array(
            'ids' => array(),
            'translated' => null,
        );

        $messages = array();
        $item = $defaults;
        $flags = array();
=======
        $defaults = [
            'ids' => [],
            'translated' => null,
        ];

        $messages = [];
        $item = $defaults;
        $flags = [];
>>>>>>> dev

        while ($line = fgets($stream)) {
            $line = trim($line);

<<<<<<< HEAD
            if ($line === '') {
                // Whitespace indicated current item is done
                if (!in_array('fuzzy', $flags)) {
                    $this->addMessage($messages, $item);
                }
                $item = $defaults;
                $flags = array();
            } elseif (substr($line, 0, 2) === '#,') {
                $flags = array_map('trim', explode(',', substr($line, 2)));
            } elseif (substr($line, 0, 7) === 'msgid "') {
=======
            if ('' === $line) {
                // Whitespace indicated current item is done
                if (!\in_array('fuzzy', $flags)) {
                    $this->addMessage($messages, $item);
                }
                $item = $defaults;
                $flags = [];
            } elseif ('#,' === substr($line, 0, 2)) {
                $flags = array_map('trim', explode(',', substr($line, 2)));
            } elseif ('msgid "' === substr($line, 0, 7)) {
>>>>>>> dev
                // We start a new msg so save previous
                // TODO: this fails when comments or contexts are added
                $this->addMessage($messages, $item);
                $item = $defaults;
                $item['ids']['singular'] = substr($line, 7, -1);
<<<<<<< HEAD
            } elseif (substr($line, 0, 8) === 'msgstr "') {
                $item['translated'] = substr($line, 8, -1);
            } elseif ($line[0] === '"') {
                $continues = isset($item['translated']) ? 'translated' : 'ids';

                if (is_array($item[$continues])) {
=======
            } elseif ('msgstr "' === substr($line, 0, 8)) {
                $item['translated'] = substr($line, 8, -1);
            } elseif ('"' === $line[0]) {
                $continues = isset($item['translated']) ? 'translated' : 'ids';

                if (\is_array($item[$continues])) {
>>>>>>> dev
                    end($item[$continues]);
                    $item[$continues][key($item[$continues])] .= substr($line, 1, -1);
                } else {
                    $item[$continues] .= substr($line, 1, -1);
                }
<<<<<<< HEAD
            } elseif (substr($line, 0, 14) === 'msgid_plural "') {
                $item['ids']['plural'] = substr($line, 14, -1);
            } elseif (substr($line, 0, 7) === 'msgstr[') {
=======
            } elseif ('msgid_plural "' === substr($line, 0, 14)) {
                $item['ids']['plural'] = substr($line, 14, -1);
            } elseif ('msgstr[' === substr($line, 0, 7)) {
>>>>>>> dev
                $size = strpos($line, ']');
                $item['translated'][(int) substr($line, 7, 1)] = substr($line, $size + 3, -1);
            }
        }
        // save last item
<<<<<<< HEAD
        if (!in_array('fuzzy', $flags)) {
=======
        if (!\in_array('fuzzy', $flags)) {
>>>>>>> dev
            $this->addMessage($messages, $item);
        }
        fclose($stream);

        return $messages;
    }

    /**
     * Save a translation item to the messages.
     *
     * A .po file could contain by error missing plural indexes. We need to
     * fix these before saving them.
<<<<<<< HEAD
     *
     * @param array $messages
     * @param array $item
     */
    private function addMessage(array &$messages, array $item)
    {
        if (is_array($item['translated'])) {
=======
     */
    private function addMessage(array &$messages, array $item)
    {
        if (\is_array($item['translated'])) {
>>>>>>> dev
            $messages[stripcslashes($item['ids']['singular'])] = stripcslashes($item['translated'][0]);
            if (isset($item['ids']['plural'])) {
                $plurals = $item['translated'];
                // PO are by definition indexed so sort by index.
                ksort($plurals);
                // Make sure every index is filled.
                end($plurals);
                $count = key($plurals);
                // Fill missing spots with '-'.
                $empties = array_fill(0, $count + 1, '-');
                $plurals += $empties;
                ksort($plurals);
                $messages[stripcslashes($item['ids']['plural'])] = stripcslashes(implode('|', $plurals));
            }
        } elseif (!empty($item['ids']['singular'])) {
            $messages[stripcslashes($item['ids']['singular'])] = stripcslashes($item['translated']);
        }
    }
}
