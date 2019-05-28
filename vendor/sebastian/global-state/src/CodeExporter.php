<?php
/*
<<<<<<< HEAD
 * This file is part of the GlobalState package.
=======
 * This file is part of sebastian/global-state.
>>>>>>> dev
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> dev
namespace SebastianBergmann\GlobalState;

/**
 * Exports parts of a Snapshot as PHP code.
 */
class CodeExporter
{
<<<<<<< HEAD
    /**
     * @param  Snapshot $snapshot
     * @return string
     */
    public function constants(Snapshot $snapshot)
=======
    public function constants(Snapshot $snapshot): string
>>>>>>> dev
    {
        $result = '';

        foreach ($snapshot->constants() as $name => $value) {
<<<<<<< HEAD
            $result .= sprintf(
=======
            $result .= \sprintf(
>>>>>>> dev
                'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                $name,
                $name,
                $this->exportVariable($value)
            );
        }

        return $result;
    }

<<<<<<< HEAD
    /**
     * @param  Snapshot $snapshot
     * @return string
     */
    public function iniSettings(Snapshot $snapshot)
=======
    public function globalVariables(Snapshot $snapshot): string
    {
        $result = '$GLOBALS = [];' . PHP_EOL;

        foreach ($snapshot->globalVariables() as $name => $value) {
            $result .= \sprintf(
                '$GLOBALS[%s] = %s;' . PHP_EOL,
                $this->exportVariable($name),
                $this->exportVariable($value)
            );
        }

        return $result;
    }

    public function iniSettings(Snapshot $snapshot): string
>>>>>>> dev
    {
        $result = '';

        foreach ($snapshot->iniSettings() as $key => $value) {
<<<<<<< HEAD
            $result .= sprintf(
=======
            $result .= \sprintf(
>>>>>>> dev
                '@ini_set(%s, %s);' . "\n",
                $this->exportVariable($key),
                $this->exportVariable($value)
            );
        }

        return $result;
    }

<<<<<<< HEAD
    /**
     * @param  mixed  $variable
     * @return string
     */
    private function exportVariable($variable)
    {
        if (is_scalar($variable) || is_null($variable) ||
            (is_array($variable) && $this->arrayOnlyContainsScalars($variable))) {
            return var_export($variable, true);
        }

        return 'unserialize(' . var_export(serialize($variable), true) . ')';
    }

    /**
     * @param  array $array
     * @return bool
     */
    private function arrayOnlyContainsScalars(array $array)
=======
    private function exportVariable($variable): string
    {
        if (\is_scalar($variable) || \is_null($variable) ||
            (\is_array($variable) && $this->arrayOnlyContainsScalars($variable))) {
            return \var_export($variable, true);
        }

        return 'unserialize(' . \var_export(\serialize($variable), true) . ')';
    }

    private function arrayOnlyContainsScalars(array $array): bool
>>>>>>> dev
    {
        $result = true;

        foreach ($array as $element) {
<<<<<<< HEAD
            if (is_array($element)) {
                $result = self::arrayOnlyContainsScalars($element);
            } elseif (!is_scalar($element) && !is_null($element)) {
=======
            if (\is_array($element)) {
                $result = self::arrayOnlyContainsScalars($element);
            } elseif (!\is_scalar($element) && !\is_null($element)) {
>>>>>>> dev
                $result = false;
            }

            if ($result === false) {
                break;
            }
        }

        return $result;
    }
}
