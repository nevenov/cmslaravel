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
 * Casts SPL related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class SplCaster
{
<<<<<<< HEAD
    private static $splFileObjectFlags = array(
=======
    private static $splFileObjectFlags = [
>>>>>>> dev
        \SplFileObject::DROP_NEW_LINE => 'DROP_NEW_LINE',
        \SplFileObject::READ_AHEAD => 'READ_AHEAD',
        \SplFileObject::SKIP_EMPTY => 'SKIP_EMPTY',
        \SplFileObject::READ_CSV => 'READ_CSV',
<<<<<<< HEAD
    );

    public static function castArrayObject(\ArrayObject $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;
        $class = $stub->class;
        $flags = $c->getFlags();

        $b = array(
            $prefix.'flag::STD_PROP_LIST' => (bool) ($flags & \ArrayObject::STD_PROP_LIST),
            $prefix.'flag::ARRAY_AS_PROPS' => (bool) ($flags & \ArrayObject::ARRAY_AS_PROPS),
            $prefix.'iteratorClass' => $c->getIteratorClass(),
            $prefix.'storage' => $c->getArrayCopy(),
        );

        if ($class === 'ArrayObject') {
            $a = $b;
        } else {
            if (!($flags & \ArrayObject::STD_PROP_LIST)) {
                $c->setFlags(\ArrayObject::STD_PROP_LIST);
                $a = Caster::castObject($c, new \ReflectionClass($class));
                $c->setFlags($flags);
            }

            $a += $b;
        }

        return $a;
=======
    ];

    public static function castArrayObject(\ArrayObject $c, array $a, Stub $stub, $isNested)
    {
        return self::castSplArray($c, $a, $stub, $isNested);
    }

    public static function castArrayIterator(\ArrayIterator $c, array $a, Stub $stub, $isNested)
    {
        return self::castSplArray($c, $a, $stub, $isNested);
>>>>>>> dev
    }

    public static function castHeap(\Iterator $c, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            Caster::PREFIX_VIRTUAL.'heap' => iterator_to_array(clone $c),
        );
=======
        $a += [
            Caster::PREFIX_VIRTUAL.'heap' => iterator_to_array(clone $c),
        ];
>>>>>>> dev

        return $a;
    }

    public static function castDoublyLinkedList(\SplDoublyLinkedList $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;
        $mode = $c->getIteratorMode();
        $c->setIteratorMode(\SplDoublyLinkedList::IT_MODE_KEEP | $mode & ~\SplDoublyLinkedList::IT_MODE_DELETE);

<<<<<<< HEAD
        $a += array(
            $prefix.'mode' => new ConstStub((($mode & \SplDoublyLinkedList::IT_MODE_LIFO) ? 'IT_MODE_LIFO' : 'IT_MODE_FIFO').' | '.(($mode & \SplDoublyLinkedList::IT_MODE_KEEP) ? 'IT_MODE_KEEP' : 'IT_MODE_DELETE'), $mode),
            $prefix.'dllist' => iterator_to_array($c),
        );
=======
        $a += [
            $prefix.'mode' => new ConstStub((($mode & \SplDoublyLinkedList::IT_MODE_LIFO) ? 'IT_MODE_LIFO' : 'IT_MODE_FIFO').' | '.(($mode & \SplDoublyLinkedList::IT_MODE_DELETE) ? 'IT_MODE_DELETE' : 'IT_MODE_KEEP'), $mode),
            $prefix.'dllist' => iterator_to_array($c),
        ];
>>>>>>> dev
        $c->setIteratorMode($mode);

        return $a;
    }

    public static function castFileInfo(\SplFileInfo $c, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        static $map = array(
=======
        static $map = [
>>>>>>> dev
            'path' => 'getPath',
            'filename' => 'getFilename',
            'basename' => 'getBasename',
            'pathname' => 'getPathname',
            'extension' => 'getExtension',
            'realPath' => 'getRealPath',
            'aTime' => 'getATime',
            'mTime' => 'getMTime',
            'cTime' => 'getCTime',
            'inode' => 'getInode',
            'size' => 'getSize',
            'perms' => 'getPerms',
            'owner' => 'getOwner',
            'group' => 'getGroup',
            'type' => 'getType',
            'writable' => 'isWritable',
            'readable' => 'isReadable',
            'executable' => 'isExecutable',
            'file' => 'isFile',
            'dir' => 'isDir',
            'link' => 'isLink',
            'linkTarget' => 'getLinkTarget',
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

        $prefix = Caster::PREFIX_VIRTUAL;

        foreach ($map as $key => $accessor) {
            try {
                $a[$prefix.$key] = $c->$accessor();
            } catch (\Exception $e) {
            }
        }

<<<<<<< HEAD
=======
        if (isset($a[$prefix.'realPath'])) {
            $a[$prefix.'realPath'] = new LinkStub($a[$prefix.'realPath']);
        }

>>>>>>> dev
        if (isset($a[$prefix.'perms'])) {
            $a[$prefix.'perms'] = new ConstStub(sprintf('0%o', $a[$prefix.'perms']), $a[$prefix.'perms']);
        }

<<<<<<< HEAD
        static $mapDate = array('aTime', 'mTime', 'cTime');
=======
        static $mapDate = ['aTime', 'mTime', 'cTime'];
>>>>>>> dev
        foreach ($mapDate as $key) {
            if (isset($a[$prefix.$key])) {
                $a[$prefix.$key] = new ConstStub(date('Y-m-d H:i:s', $a[$prefix.$key]), $a[$prefix.$key]);
            }
        }

        return $a;
    }

    public static function castFileObject(\SplFileObject $c, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        static $map = array(
=======
        static $map = [
>>>>>>> dev
            'csvControl' => 'getCsvControl',
            'flags' => 'getFlags',
            'maxLineLen' => 'getMaxLineLen',
            'fstat' => 'fstat',
            'eof' => 'eof',
            'key' => 'key',
<<<<<<< HEAD
        );
=======
        ];
>>>>>>> dev

        $prefix = Caster::PREFIX_VIRTUAL;

        foreach ($map as $key => $accessor) {
            try {
                $a[$prefix.$key] = $c->$accessor();
            } catch (\Exception $e) {
            }
        }

        if (isset($a[$prefix.'flags'])) {
<<<<<<< HEAD
            $flagsArray = array();
=======
            $flagsArray = [];
>>>>>>> dev
            foreach (self::$splFileObjectFlags as $value => $name) {
                if ($a[$prefix.'flags'] & $value) {
                    $flagsArray[] = $name;
                }
            }
            $a[$prefix.'flags'] = new ConstStub(implode('|', $flagsArray), $a[$prefix.'flags']);
        }

        if (isset($a[$prefix.'fstat'])) {
<<<<<<< HEAD
            $a[$prefix.'fstat'] = new CutArrayStub($a[$prefix.'fstat'], array('dev', 'ino', 'nlink', 'rdev', 'blksize', 'blocks'));
=======
            $a[$prefix.'fstat'] = new CutArrayStub($a[$prefix.'fstat'], ['dev', 'ino', 'nlink', 'rdev', 'blksize', 'blocks']);
>>>>>>> dev
        }

        return $a;
    }

    public static function castFixedArray(\SplFixedArray $c, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $a += array(
            Caster::PREFIX_VIRTUAL.'storage' => $c->toArray(),
        );
=======
        $a += [
            Caster::PREFIX_VIRTUAL.'storage' => $c->toArray(),
        ];
>>>>>>> dev

        return $a;
    }

    public static function castObjectStorage(\SplObjectStorage $c, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        $storage = array();
        unset($a[Caster::PREFIX_DYNAMIC."\0gcdata"]); // Don't hit https://bugs.php.net/65967

        foreach ($c as $obj) {
            $storage[spl_object_hash($obj)] = array(
                'object' => $obj,
                'info' => $c->getInfo(),
             );
        }

        $a += array(
            Caster::PREFIX_VIRTUAL.'storage' => $storage,
        );
=======
        $storage = [];
        unset($a[Caster::PREFIX_DYNAMIC."\0gcdata"]); // Don't hit https://bugs.php.net/65967

        $clone = clone $c;
        foreach ($clone as $obj) {
            $storage[] = [
                'object' => $obj,
                'info' => $clone->getInfo(),
             ];
        }

        $a += [
            Caster::PREFIX_VIRTUAL.'storage' => $storage,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castOuterIterator(\OuterIterator $c, array $a, Stub $stub, $isNested)
    {
        $a[Caster::PREFIX_VIRTUAL.'innerIterator'] = $c->getInnerIterator();

        return $a;
    }
<<<<<<< HEAD
=======

    private static function castSplArray($c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;
        $class = $stub->class;
        $flags = $c->getFlags();

        if (!($flags & \ArrayObject::STD_PROP_LIST)) {
            $c->setFlags(\ArrayObject::STD_PROP_LIST);
            $a = Caster::castObject($c, $class);
            $c->setFlags($flags);
        }
        $a += [
            $prefix.'flag::STD_PROP_LIST' => (bool) ($flags & \ArrayObject::STD_PROP_LIST),
            $prefix.'flag::ARRAY_AS_PROPS' => (bool) ($flags & \ArrayObject::ARRAY_AS_PROPS),
        ];
        if ($c instanceof \ArrayObject) {
            $a[$prefix.'iteratorClass'] = new ClassStub($c->getIteratorClass());
        }
        $a[$prefix.'storage'] = $c->getArrayCopy();

        return $a;
    }
>>>>>>> dev
}
