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

use Doctrine\Common\Proxy\Proxy as CommonProxy;
<<<<<<< HEAD
use Doctrine\ORM\Proxy\Proxy as OrmProxy;
use Doctrine\ORM\PersistentCollection;
=======
use Doctrine\ORM\PersistentCollection;
use Doctrine\ORM\Proxy\Proxy as OrmProxy;
>>>>>>> dev
use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * Casts Doctrine related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DoctrineCaster
{
    public static function castCommonProxy(CommonProxy $proxy, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        foreach (array('__cloner__', '__initializer__') as $k) {
            if (array_key_exists($k, $a)) {
=======
        foreach (['__cloner__', '__initializer__'] as $k) {
            if (\array_key_exists($k, $a)) {
>>>>>>> dev
                unset($a[$k]);
                ++$stub->cut;
            }
        }

        return $a;
    }

    public static function castOrmProxy(OrmProxy $proxy, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        foreach (array('_entityPersister', '_identifier') as $k) {
            if (array_key_exists($k = "\0Doctrine\\ORM\\Proxy\\Proxy\0".$k, $a)) {
=======
        foreach (['_entityPersister', '_identifier'] as $k) {
            if (\array_key_exists($k = "\0Doctrine\\ORM\\Proxy\\Proxy\0".$k, $a)) {
>>>>>>> dev
                unset($a[$k]);
                ++$stub->cut;
            }
        }

        return $a;
    }

    public static function castPersistentCollection(PersistentCollection $coll, array $a, Stub $stub, $isNested)
    {
<<<<<<< HEAD
        foreach (array('snapshot', 'association', 'typeClass') as $k) {
            if (array_key_exists($k = "\0Doctrine\\ORM\\PersistentCollection\0".$k, $a)) {
=======
        foreach (['snapshot', 'association', 'typeClass'] as $k) {
            if (\array_key_exists($k = "\0Doctrine\\ORM\\PersistentCollection\0".$k, $a)) {
>>>>>>> dev
                $a[$k] = new CutStub($a[$k]);
            }
        }

        return $a;
    }
}
