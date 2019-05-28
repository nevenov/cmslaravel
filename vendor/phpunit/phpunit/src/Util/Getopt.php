<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

/**
 * Command-line options parsing class.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Util_Getopt
=======
namespace PHPUnit\Util;

use PHPUnit\Framework\Exception;

/**
 * Command-line options parsing class.
 */
class Getopt
>>>>>>> dev
{
    public static function getopt(array $args, $short_options, $long_options = null)
    {
        if (empty($args)) {
<<<<<<< HEAD
            return array(array(), array());
        }

        $opts     = array();
        $non_opts = array();

        if ($long_options) {
            sort($long_options);
        }

        if (isset($args[0][0]) && $args[0][0] != '-') {
            array_shift($args);
        }

        reset($args);
        array_map('trim', $args);

        while (list($i, $arg) = each($args)) {
=======
            return [[], []];
        }

        $opts     = [];
        $non_opts = [];

        if ($long_options) {
            \sort($long_options);
        }

        if (isset($args[0][0]) && $args[0][0] != '-') {
            \array_shift($args);
        }

        \reset($args);

        $args = \array_map('trim', $args);

        while (false !== $arg = \current($args)) {
            $i = \key($args);
            \next($args);
>>>>>>> dev
            if ($arg == '') {
                continue;
            }

            if ($arg == '--') {
<<<<<<< HEAD
                $non_opts = array_merge($non_opts, array_slice($args, $i + 1));
                break;
            }

            if ($arg[0] != '-' ||
                (strlen($arg) > 1 && $arg[1] == '-' && !$long_options)) {
                $non_opts[] = $args[$i];
                continue;
            } elseif (strlen($arg) > 1 && $arg[1] == '-') {
                self::parseLongOption(
                    substr($arg, 2),
=======
                $non_opts = \array_merge($non_opts, \array_slice($args, $i + 1));

                break;
            }

            if ($arg[0] != '-' || (\strlen($arg) > 1 && $arg[1] == '-' && !$long_options)) {
                $non_opts[] = $args[$i];

                continue;
            } elseif (\strlen($arg) > 1 && $arg[1] == '-') {
                self::parseLongOption(
                    \substr($arg, 2),
>>>>>>> dev
                    $long_options,
                    $opts,
                    $args
                );
            } else {
                self::parseShortOption(
<<<<<<< HEAD
                    substr($arg, 1),
=======
                    \substr($arg, 1),
>>>>>>> dev
                    $short_options,
                    $opts,
                    $args
                );
            }
        }

<<<<<<< HEAD
        return array($opts, $non_opts);
=======
        return [$opts, $non_opts];
>>>>>>> dev
    }

    protected static function parseShortOption($arg, $short_options, &$opts, &$args)
    {
<<<<<<< HEAD
        $argLen = strlen($arg);
=======
        $argLen = \strlen($arg);
>>>>>>> dev

        for ($i = 0; $i < $argLen; $i++) {
            $opt     = $arg[$i];
            $opt_arg = null;

<<<<<<< HEAD
            if (($spec = strstr($short_options, $opt)) === false ||
                $arg[$i] == ':') {
                throw new PHPUnit_Framework_Exception(
=======
            if (($spec = \strstr($short_options, $opt)) === false || $arg[$i] == ':') {
                throw new Exception(
>>>>>>> dev
                    "unrecognized option -- $opt"
                );
            }

<<<<<<< HEAD
            if (strlen($spec) > 1 && $spec[1] == ':') {
                if (strlen($spec) > 2 && $spec[2] == ':') {
                    if ($i + 1 < $argLen) {
                        $opts[] = array($opt, substr($arg, $i + 1));
                        break;
                    }
                } else {
                    if ($i + 1 < $argLen) {
                        $opts[] = array($opt, substr($arg, $i + 1));
                        break;
                    } elseif (list(, $opt_arg) = each($args)) {
                    } else {
                        throw new PHPUnit_Framework_Exception(
                            "option requires an argument -- $opt"
                        );
                    }
                }
            }

            $opts[] = array($opt, $opt_arg);
=======
            if (\strlen($spec) > 1 && $spec[1] == ':') {
                if ($i + 1 < $argLen) {
                    $opts[] = [$opt, \substr($arg, $i + 1)];

                    break;
                }
                if (!(\strlen($spec) > 2 && $spec[2] == ':')) {
                    if (false === $opt_arg = \current($args)) {
                        throw new Exception(
                            "option requires an argument -- $opt"
                        );
                    }
                    \next($args);
                }
            }

            $opts[] = [$opt, $opt_arg];
>>>>>>> dev
        }
    }

    protected static function parseLongOption($arg, $long_options, &$opts, &$args)
    {
<<<<<<< HEAD
        $count   = count($long_options);
        $list    = explode('=', $arg);
        $opt     = $list[0];
        $opt_arg = null;

        if (count($list) > 1) {
            $opt_arg = $list[1];
        }

        $opt_len = strlen($opt);

        for ($i = 0; $i < $count; $i++) {
            $long_opt  = $long_options[$i];
            $opt_start = substr($long_opt, 0, $opt_len);
=======
        $count   = \count($long_options);
        $list    = \explode('=', $arg);
        $opt     = $list[0];
        $opt_arg = null;

        if (\count($list) > 1) {
            $opt_arg = $list[1];
        }

        $opt_len = \strlen($opt);

        for ($i = 0; $i < $count; $i++) {
            $long_opt  = $long_options[$i];
            $opt_start = \substr($long_opt, 0, $opt_len);
>>>>>>> dev

            if ($opt_start != $opt) {
                continue;
            }

<<<<<<< HEAD
            $opt_rest = substr($long_opt, $opt_len);

            if ($opt_rest != '' && $opt[0] != '=' && $i + 1 < $count &&
                $opt == substr($long_options[$i+1], 0, $opt_len)) {
                throw new PHPUnit_Framework_Exception(
=======
            $opt_rest = \substr($long_opt, $opt_len);

            if ($opt_rest != '' && $opt[0] != '=' && $i + 1 < $count &&
                $opt == \substr($long_options[$i + 1], 0, $opt_len)) {
                throw new Exception(
>>>>>>> dev
                    "option --$opt is ambiguous"
                );
            }

<<<<<<< HEAD
            if (substr($long_opt, -1) == '=') {
                if (substr($long_opt, -2) != '==') {
                    if (!strlen($opt_arg) &&
                        !(list(, $opt_arg) = each($args))) {
                        throw new PHPUnit_Framework_Exception(
                            "option --$opt requires an argument"
                        );
                    }
                }
            } elseif ($opt_arg) {
                throw new PHPUnit_Framework_Exception(
=======
            if (\substr($long_opt, -1) == '=') {
                if (\substr($long_opt, -2) != '==') {
                    if (!\strlen($opt_arg)) {
                        if (false === $opt_arg = \current($args)) {
                            throw new Exception(
                                "option --$opt requires an argument"
                            );
                        }
                        \next($args);
                    }
                }
            } elseif ($opt_arg) {
                throw new Exception(
>>>>>>> dev
                    "option --$opt doesn't allow an argument"
                );
            }

<<<<<<< HEAD
            $full_option = '--' . preg_replace('/={1,2}$/', '', $long_opt);
            $opts[]      = array($full_option, $opt_arg);
=======
            $full_option = '--' . \preg_replace('/={1,2}$/', '', $long_opt);
            $opts[]      = [$full_option, $opt_arg];
>>>>>>> dev

            return;
        }

<<<<<<< HEAD
        throw new PHPUnit_Framework_Exception("unrecognized option --$opt");
=======
        throw new Exception("unrecognized option --$opt");
>>>>>>> dev
    }
}
