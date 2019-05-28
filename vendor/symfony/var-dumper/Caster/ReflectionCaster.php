<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Caster;

use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * Casts Reflector related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ReflectionCaster
{
<<<<<<< HEAD
    private static $extraMap = array(
=======
    private static $extraMap = [
>>>>>>> dev
        'docComment' => 'getDocComment',
        'extension' => 'getExtensionName',
        'isDisabled' => 'isDisabled',
        'isDeprecated' => 'isDeprecated',
        'isInternal' => 'isInternal',
        'isUserDefined' => 'isUserDefined',
        'isGenerator' => 'isGenerator',
        'isVariadic' => 'isVariadic',
<<<<<<< HEAD
    );

    public static function castClosure(\Closure $c, array $a, Stub $stub, $isNested)
=======
    ];

    public static function castClosure(\Closure $c, array $a, Stub $stub, $isNested, $filter = 0)
>>>>>>> dev
    {
        $prefix = Caster::PREFIX_VIRTUAL;
        $c = new \ReflectionFunction($c);

<<<<<<< HEAD
        $stub->class = 'Closure'; // HHVM generates unique class names for closures
        $a = static::castFunctionAbstract($c, $a, $stub, $isNested);
=======
        $a = static::castFunctionAbstract($c, $a, $stub, $isNested, $filter);

        if (false === strpos($c->name, '{closure}')) {
            $stub->class = isset($a[$prefix.'class']) ? $a[$prefix.'class']->value.'::'.$c->name : $c->name;
            unset($a[$prefix.'class']);
        }
        unset($a[$prefix.'extra']);

        $stub->class .= self::getSignature($a);

        if ($filter & Caster::EXCLUDE_VERBOSE) {
            $stub->cut += ($c->getFileName() ? 2 : 0) + \count($a);

            return [];
        }
>>>>>>> dev

        if (isset($a[$prefix.'parameters'])) {
            foreach ($a[$prefix.'parameters']->value as &$v) {
                $param = $v;
<<<<<<< HEAD
                $v = new EnumStub(array());
                foreach (static::castParameter($param, array(), $stub, true) as $k => $param) {
=======
                $v = new EnumStub([]);
                foreach (static::castParameter($param, [], $stub, true) as $k => $param) {
>>>>>>> dev
                    if ("\0" === $k[0]) {
                        $v->value[substr($k, 3)] = $param;
                    }
                }
                unset($v->value['position'], $v->value['isVariadic'], $v->value['byReference'], $v);
            }
        }

        if ($f = $c->getFileName()) {
<<<<<<< HEAD
            $a[$prefix.'file'] = $f;
            $a[$prefix.'line'] = $c->getStartLine().' to '.$c->getEndLine();
        }

        $prefix = Caster::PREFIX_DYNAMIC;
        unset($a['name'], $a[$prefix.'this'], $a[$prefix.'parameter'], $a[Caster::PREFIX_VIRTUAL.'extra']);

=======
            $a[$prefix.'file'] = new LinkStub($f, $c->getStartLine());
            $a[$prefix.'line'] = $c->getStartLine().' to '.$c->getEndLine();
        }

>>>>>>> dev
        return $a;
    }

    public static function castGenerator(\Generator $c, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        return class_exists('ReflectionGenerator', false) ? self::castReflectionGenerator(new \ReflectionGenerator($c), $a, $stub, $isNested) : $a;
=======
        if (!class_exists('ReflectionGenerator', false)) {
            return $a;
        }

        // Cannot create ReflectionGenerator based on a terminated Generator
        try {
            $reflectionGenerator = new \ReflectionGenerator($c);
        } catch (\Exception $e) {
            $a[Caster::PREFIX_VIRTUAL.'closed'] = true;

            return $a;
        }

        return self::castReflectionGenerator($reflectionGenerator, $a, $stub, $isNested);
>>>>>>> dev
    }

    public static function castType(\ReflectionType $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

<<<<<<< HEAD
        $a += array(
            $prefix.'type' => $c->__toString(),
            $prefix.'allowsNull' => $c->allowsNull(),
            $prefix.'isBuiltin' => $c->isBuiltin(),
        );
=======
        $a += [
            $prefix.'name' => $c->getName(),
            $prefix.'allowsNull' => $c->allowsNull(),
            $prefix.'isBuiltin' => $c->isBuiltin(),
        ];
>>>>>>> dev

        return $a;
    }

    public static function castReflectionGenerator(\ReflectionGenerator $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

        if ($c->getThis()) {
            $a[$prefix.'this'] = new CutStub($c->getThis());
        }
<<<<<<< HEAD
        $x = $c->getFunction();
        $frame = array(
            'class' => isset($x->class) ? $x->class : null,
            'type' => isset($x->class) ? ($x->isStatic() ? '::' : '->') : null,
            'function' => $x->name,
            'file' => $c->getExecutingFile(),
            'line' => $c->getExecutingLine(),
        );
        if ($trace = $c->getTrace(DEBUG_BACKTRACE_IGNORE_ARGS)) {
            $x = new \ReflectionGenerator($c->getExecutingGenerator());
            array_unshift($trace, array(
                'function' => 'yield',
                'file' => $x->getExecutingFile(),
                'line' => $x->getExecutingLine() - 1,
            ));
            $trace[] = $frame;
            $a[$prefix.'trace'] = new TraceStub($trace, false, 0, -1, -1);
        } else {
            $x = new FrameStub($frame, false, true);
            $x = ExceptionCaster::castFrameStub($x, array(), $x, true);
            $a[$prefix.'executing'] = new EnumStub(array(
                $frame['class'].$frame['type'].$frame['function'].'()' => $x[$prefix.'src'],
            ));
        }

=======
        $function = $c->getFunction();
        $frame = [
            'class' => isset($function->class) ? $function->class : null,
            'type' => isset($function->class) ? ($function->isStatic() ? '::' : '->') : null,
            'function' => $function->name,
            'file' => $c->getExecutingFile(),
            'line' => $c->getExecutingLine(),
        ];
        if ($trace = $c->getTrace(DEBUG_BACKTRACE_IGNORE_ARGS)) {
            $function = new \ReflectionGenerator($c->getExecutingGenerator());
            array_unshift($trace, [
                'function' => 'yield',
                'file' => $function->getExecutingFile(),
                'line' => $function->getExecutingLine() - 1,
            ]);
            $trace[] = $frame;
            $a[$prefix.'trace'] = new TraceStub($trace, false, 0, -1, -1);
        } else {
            $function = new FrameStub($frame, false, true);
            $function = ExceptionCaster::castFrameStub($function, [], $function, true);
            $a[$prefix.'executing'] = new EnumStub([
                "\0~separator= \0".$frame['class'].$frame['type'].$frame['function'].'()' => $function[$prefix.'src'],
            ]);
        }

        $a[Caster::PREFIX_VIRTUAL.'closed'] = false;

>>>>>>> dev
        return $a;
    }

    public static function castClass(\ReflectionClass $c, array $a, Stub $stub, $isNested, $filter = 0)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

        if ($n = \Reflection::getModifierNames($c->getModifiers())) {
            $a[$prefix.'modifiers'] = implode(' ', $n);
        }

<<<<<<< HEAD
        self::addMap($a, $c, array(
            'extends' => 'getParentClass',
            'implements' => 'getInterfaceNames',
            'constants' => 'getConstants',
        ));
=======
        self::addMap($a, $c, [
            'extends' => 'getParentClass',
            'implements' => 'getInterfaceNames',
            'constants' => 'getConstants',
        ]);
>>>>>>> dev

        foreach ($c->getProperties() as $n) {
            $a[$prefix.'properties'][$n->name] = $n;
        }

        foreach ($c->getMethods() as $n) {
            $a[$prefix.'methods'][$n->name] = $n;
        }

        if (!($filter & Caster::EXCLUDE_VERBOSE) && !$isNested) {
            self::addExtra($a, $c);
        }

        return $a;
    }

    public static function castFunctionAbstract(\ReflectionFunctionAbstract $c, array $a, Stub $stub, $isNested, $filter = 0)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

<<<<<<< HEAD
        self::addMap($a, $c, array(
=======
        self::addMap($a, $c, [
>>>>>>> dev
            'returnsReference' => 'returnsReference',
            'returnType' => 'getReturnType',
            'class' => 'getClosureScopeClass',
            'this' => 'getClosureThis',
<<<<<<< HEAD
        ));

        if (isset($a[$prefix.'returnType'])) {
            $a[$prefix.'returnType'] = (string) $a[$prefix.'returnType'];
=======
        ]);

        if (isset($a[$prefix.'returnType'])) {
            $v = $a[$prefix.'returnType'];
            $v = $v->getName();
            $a[$prefix.'returnType'] = new ClassStub($a[$prefix.'returnType']->allowsNull() ? '?'.$v : $v, [class_exists($v, false) || interface_exists($v, false) || trait_exists($v, false) ? $v : '', '']);
        }
        if (isset($a[$prefix.'class'])) {
            $a[$prefix.'class'] = new ClassStub($a[$prefix.'class']);
>>>>>>> dev
        }
        if (isset($a[$prefix.'this'])) {
            $a[$prefix.'this'] = new CutStub($a[$prefix.'this']);
        }

        foreach ($c->getParameters() as $v) {
            $k = '$'.$v->name;
<<<<<<< HEAD
            if ($v->isPassedByReference()) {
                $k = '&'.$k;
            }
            if (method_exists($v, 'isVariadic') && $v->isVariadic()) {
                $k = '...'.$k;
            }
=======
            if ($v->isVariadic()) {
                $k = '...'.$k;
            }
            if ($v->isPassedByReference()) {
                $k = '&'.$k;
            }
>>>>>>> dev
            $a[$prefix.'parameters'][$k] = $v;
        }
        if (isset($a[$prefix.'parameters'])) {
            $a[$prefix.'parameters'] = new EnumStub($a[$prefix.'parameters']);
        }

        if ($v = $c->getStaticVariables()) {
            foreach ($v as $k => &$v) {
<<<<<<< HEAD
                $a[$prefix.'use']['$'.$k] = &$v;
=======
                if (\is_object($v)) {
                    $a[$prefix.'use']['$'.$k] = new CutStub($v);
                } else {
                    $a[$prefix.'use']['$'.$k] = &$v;
                }
>>>>>>> dev
            }
            unset($v);
            $a[$prefix.'use'] = new EnumStub($a[$prefix.'use']);
        }

        if (!($filter & Caster::EXCLUDE_VERBOSE) && !$isNested) {
            self::addExtra($a, $c);
        }

<<<<<<< HEAD
        // Added by HHVM
        unset($a[Caster::PREFIX_DYNAMIC.'static']);

=======
>>>>>>> dev
        return $a;
    }

    public static function castMethod(\ReflectionMethod $c, array $a, Stub $stub, $isNested)
    {
        $a[Caster::PREFIX_VIRTUAL.'modifiers'] = implode(' ', \Reflection::getModifierNames($c->getModifiers()));

        return $a;
    }

    public static function castParameter(\ReflectionParameter $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

<<<<<<< HEAD
        // Added by HHVM
        unset($a['info']);

        self::addMap($a, $c, array(
            'position' => 'getPosition',
            'isVariadic' => 'isVariadic',
            'byReference' => 'isPassedByReference',
        ));

        try {
            if (method_exists($c, 'hasType')) {
                if ($c->hasType()) {
                    $a[$prefix.'typeHint'] = $c->getType()->__toString();
                }
            } else {
                $v = explode(' ', $c->__toString(), 6);
                if (isset($v[5]) && 0 === strspn($v[4], '.&$')) {
                    $a[$prefix.'typeHint'] = $v[4];
                }
            }
        } catch (\ReflectionException $e) {
            if (preg_match('/^Class ([^ ]++) does not exist$/', $e->getMessage(), $m)) {
                $a[$prefix.'typeHint'] = $m[1];
            }
=======
        self::addMap($a, $c, [
            'position' => 'getPosition',
            'isVariadic' => 'isVariadic',
            'byReference' => 'isPassedByReference',
            'allowsNull' => 'allowsNull',
        ]);

        if ($v = $c->getType()) {
            $a[$prefix.'typeHint'] = $v->getName();
        }

        if (isset($a[$prefix.'typeHint'])) {
            $v = $a[$prefix.'typeHint'];
            $a[$prefix.'typeHint'] = new ClassStub($v, [class_exists($v, false) || interface_exists($v, false) || trait_exists($v, false) ? $v : '', '']);
        } else {
            unset($a[$prefix.'allowsNull']);
>>>>>>> dev
        }

        try {
            $a[$prefix.'default'] = $v = $c->getDefaultValue();
<<<<<<< HEAD
            if (method_exists($c, 'isDefaultValueConstant') && $c->isDefaultValueConstant()) {
                $a[$prefix.'default'] = new ConstStub($c->getDefaultValueConstantName(), $v);
            }
        } catch (\ReflectionException $e) {
            if (isset($a[$prefix.'typeHint']) && $c->allowsNull()) {
                $a[$prefix.'default'] = null;
            }
=======
            if ($c->isDefaultValueConstant()) {
                $a[$prefix.'default'] = new ConstStub($c->getDefaultValueConstantName(), $v);
            }
            if (null === $v) {
                unset($a[$prefix.'allowsNull']);
            }
        } catch (\ReflectionException $e) {
>>>>>>> dev
        }

        return $a;
    }

    public static function castProperty(\ReflectionProperty $c, array $a, Stub $stub, $isNested)
    {
        $a[Caster::PREFIX_VIRTUAL.'modifiers'] = implode(' ', \Reflection::getModifierNames($c->getModifiers()));
        self::addExtra($a, $c);

        return $a;
    }

    public static function castExtension(\ReflectionExtension $c, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        self::addMap($a, $c, array(
=======
        self::addMap($a, $c, [
>>>>>>> dev
            'version' => 'getVersion',
            'dependencies' => 'getDependencies',
            'iniEntries' => 'getIniEntries',
            'isPersistent' => 'isPersistent',
            'isTemporary' => 'isTemporary',
            'constants' => 'getConstants',
            'functions' => 'getFunctions',
            'classes' => 'getClasses',
<<<<<<< HEAD
        ));
=======
        ]);
>>>>>>> dev

        return $a;
    }

    public static function castZendExtension(\ReflectionZendExtension $c, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        self::addMap($a, $c, array(
=======
        self::addMap($a, $c, [
>>>>>>> dev
            'version' => 'getVersion',
            'author' => 'getAuthor',
            'copyright' => 'getCopyright',
            'url' => 'getURL',
<<<<<<< HEAD
        ));
=======
        ]);
>>>>>>> dev

        return $a;
    }

<<<<<<< HEAD
    private static function addExtra(&$a, \Reflector $c)
    {
        $x = isset($a[Caster::PREFIX_VIRTUAL.'extra']) ? $a[Caster::PREFIX_VIRTUAL.'extra']->value : array();

        if (method_exists($c, 'getFileName') && $m = $c->getFileName()) {
            $x['file'] = $m;
=======
    public static function getSignature(array $a)
    {
        $prefix = Caster::PREFIX_VIRTUAL;
        $signature = '';

        if (isset($a[$prefix.'parameters'])) {
            foreach ($a[$prefix.'parameters']->value as $k => $param) {
                $signature .= ', ';
                if ($type = $param->getType()) {
                    if (!$param->isOptional() && $param->allowsNull()) {
                        $signature .= '?';
                    }
                    $signature .= substr(strrchr('\\'.$type->getName(), '\\'), 1).' ';
                }
                $signature .= $k;

                if (!$param->isDefaultValueAvailable()) {
                    continue;
                }
                $v = $param->getDefaultValue();
                $signature .= ' = ';

                if ($param->isDefaultValueConstant()) {
                    $signature .= substr(strrchr('\\'.$param->getDefaultValueConstantName(), '\\'), 1);
                } elseif (null === $v) {
                    $signature .= 'null';
                } elseif (\is_array($v)) {
                    $signature .= $v ? '[…'.\count($v).']' : '[]';
                } elseif (\is_string($v)) {
                    $signature .= 10 > \strlen($v) && false === strpos($v, '\\') ? "'{$v}'" : "'…".\strlen($v)."'";
                } elseif (\is_bool($v)) {
                    $signature .= $v ? 'true' : 'false';
                } else {
                    $signature .= $v;
                }
            }
        }
        $signature = (empty($a[$prefix.'returnsReference']) ? '' : '&').'('.substr($signature, 2).')';

        if (isset($a[$prefix.'returnType'])) {
            $signature .= ': '.substr(strrchr('\\'.$a[$prefix.'returnType'], '\\'), 1);
        }

        return $signature;
    }

    private static function addExtra(&$a, \Reflector $c)
    {
        $x = isset($a[Caster::PREFIX_VIRTUAL.'extra']) ? $a[Caster::PREFIX_VIRTUAL.'extra']->value : [];

        if (method_exists($c, 'getFileName') && $m = $c->getFileName()) {
            $x['file'] = new LinkStub($m, $c->getStartLine());
>>>>>>> dev
            $x['line'] = $c->getStartLine().' to '.$c->getEndLine();
        }

        self::addMap($x, $c, self::$extraMap, '');

        if ($x) {
            $a[Caster::PREFIX_VIRTUAL.'extra'] = new EnumStub($x);
        }
    }

    private static function addMap(&$a, \Reflector $c, $map, $prefix = Caster::PREFIX_VIRTUAL)
    {
        foreach ($map as $k => $m) {
            if (method_exists($c, $m) && false !== ($m = $c->$m()) && null !== $m) {
                $a[$prefix.$k] = $m instanceof \Reflector ? $m->name : $m;
            }
        }
    }
}
