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
 * Casts Amqp related classes to array representation.
 *
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
class AmqpCaster
{
<<<<<<< HEAD
    private static $flags = array(
=======
    private static $flags = [
>>>>>>> dev
        AMQP_DURABLE => 'AMQP_DURABLE',
        AMQP_PASSIVE => 'AMQP_PASSIVE',
        AMQP_EXCLUSIVE => 'AMQP_EXCLUSIVE',
        AMQP_AUTODELETE => 'AMQP_AUTODELETE',
        AMQP_INTERNAL => 'AMQP_INTERNAL',
        AMQP_NOLOCAL => 'AMQP_NOLOCAL',
        AMQP_AUTOACK => 'AMQP_AUTOACK',
        AMQP_IFEMPTY => 'AMQP_IFEMPTY',
        AMQP_IFUNUSED => 'AMQP_IFUNUSED',
        AMQP_MANDATORY => 'AMQP_MANDATORY',
        AMQP_IMMEDIATE => 'AMQP_IMMEDIATE',
        AMQP_MULTIPLE => 'AMQP_MULTIPLE',
        AMQP_NOWAIT => 'AMQP_NOWAIT',
        AMQP_REQUEUE => 'AMQP_REQUEUE',
<<<<<<< HEAD
    );

    private static $exchangeTypes = array(
=======
    ];

    private static $exchangeTypes = [
>>>>>>> dev
        AMQP_EX_TYPE_DIRECT => 'AMQP_EX_TYPE_DIRECT',
        AMQP_EX_TYPE_FANOUT => 'AMQP_EX_TYPE_FANOUT',
        AMQP_EX_TYPE_TOPIC => 'AMQP_EX_TYPE_TOPIC',
        AMQP_EX_TYPE_HEADERS => 'AMQP_EX_TYPE_HEADERS',
<<<<<<< HEAD
    );
=======
    ];
>>>>>>> dev

    public static function castConnection(\AMQPConnection $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

<<<<<<< HEAD
=======
        $a += [
            $prefix.'is_connected' => $c->isConnected(),
        ];

        // Recent version of the extension already expose private properties
        if (isset($a["\x00AMQPConnection\x00login"])) {
            return $a;
        }

>>>>>>> dev
        // BC layer in the amqp lib
        if (method_exists($c, 'getReadTimeout')) {
            $timeout = $c->getReadTimeout();
        } else {
            $timeout = $c->getTimeout();
        }

<<<<<<< HEAD
        $a += array(
            $prefix.'isConnected' => $c->isConnected(),
            $prefix.'login' => $c->getLogin(),
            $prefix.'password' => $c->getPassword(),
            $prefix.'host' => $c->getHost(),
            $prefix.'port' => $c->getPort(),
            $prefix.'vhost' => $c->getVhost(),
            $prefix.'readTimeout' => $timeout,
        );
=======
        $a += [
            $prefix.'is_connected' => $c->isConnected(),
            $prefix.'login' => $c->getLogin(),
            $prefix.'password' => $c->getPassword(),
            $prefix.'host' => $c->getHost(),
            $prefix.'vhost' => $c->getVhost(),
            $prefix.'port' => $c->getPort(),
            $prefix.'read_timeout' => $timeout,
        ];
>>>>>>> dev

        return $a;
    }

    public static function castChannel(\AMQPChannel $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

<<<<<<< HEAD
        $a += array(
            $prefix.'isConnected' => $c->isConnected(),
            $prefix.'channelId' => $c->getChannelId(),
            $prefix.'prefetchSize' => $c->getPrefetchSize(),
            $prefix.'prefetchCount' => $c->getPrefetchCount(),
            $prefix.'connection' => $c->getConnection(),
        );
=======
        $a += [
            $prefix.'is_connected' => $c->isConnected(),
            $prefix.'channel_id' => $c->getChannelId(),
        ];

        // Recent version of the extension already expose private properties
        if (isset($a["\x00AMQPChannel\x00connection"])) {
            return $a;
        }

        $a += [
            $prefix.'connection' => $c->getConnection(),
            $prefix.'prefetch_size' => $c->getPrefetchSize(),
            $prefix.'prefetch_count' => $c->getPrefetchCount(),
        ];
>>>>>>> dev

        return $a;
    }

    public static function castQueue(\AMQPQueue $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

<<<<<<< HEAD
        $a += array(
            $prefix.'name' => $c->getName(),
            $prefix.'flags' => self::extractFlags($c->getFlags()),
            $prefix.'arguments' => $c->getArguments(),
            $prefix.'connection' => $c->getConnection(),
            $prefix.'channel' => $c->getChannel(),
        );
=======
        $a += [
            $prefix.'flags' => self::extractFlags($c->getFlags()),
        ];

        // Recent version of the extension already expose private properties
        if (isset($a["\x00AMQPQueue\x00name"])) {
            return $a;
        }

        $a += [
            $prefix.'connection' => $c->getConnection(),
            $prefix.'channel' => $c->getChannel(),
            $prefix.'name' => $c->getName(),
            $prefix.'arguments' => $c->getArguments(),
        ];
>>>>>>> dev

        return $a;
    }

    public static function castExchange(\AMQPExchange $c, array $a, Stub $stub, $isNested)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

<<<<<<< HEAD
        $a += array(
            $prefix.'name' => $c->getName(),
            $prefix.'flags' => self::extractFlags($c->getFlags()),
            $prefix.'type' => isset(self::$exchangeTypes[$c->getType()]) ? new ConstStub(self::$exchangeTypes[$c->getType()], $c->getType()) : $c->getType(),
            $prefix.'arguments' => $c->getArguments(),
            $prefix.'channel' => $c->getChannel(),
            $prefix.'connection' => $c->getConnection(),
        );
=======
        $a += [
            $prefix.'flags' => self::extractFlags($c->getFlags()),
        ];

        $type = isset(self::$exchangeTypes[$c->getType()]) ? new ConstStub(self::$exchangeTypes[$c->getType()], $c->getType()) : $c->getType();

        // Recent version of the extension already expose private properties
        if (isset($a["\x00AMQPExchange\x00name"])) {
            $a["\x00AMQPExchange\x00type"] = $type;

            return $a;
        }

        $a += [
            $prefix.'connection' => $c->getConnection(),
            $prefix.'channel' => $c->getChannel(),
            $prefix.'name' => $c->getName(),
            $prefix.'type' => $type,
            $prefix.'arguments' => $c->getArguments(),
        ];
>>>>>>> dev

        return $a;
    }

    public static function castEnvelope(\AMQPEnvelope $c, array $a, Stub $stub, $isNested, $filter = 0)
    {
        $prefix = Caster::PREFIX_VIRTUAL;

<<<<<<< HEAD
        if (!($filter & Caster::EXCLUDE_VERBOSE)) {
            $a += array($prefix.'body' => $c->getBody());
        }

        $a += array(
            $prefix.'routingKey' => $c->getRoutingKey(),
            $prefix.'deliveryTag' => $c->getDeliveryTag(),
            $prefix.'deliveryMode' => new ConstStub($c->getDeliveryMode().(2 === $c->getDeliveryMode() ? ' (persistent)' : ' (non-persistent)'), $c->getDeliveryMode()),
            $prefix.'exchangeName' => $c->getExchangeName(),
            $prefix.'isRedelivery' => $c->isRedelivery(),
            $prefix.'contentType' => $c->getContentType(),
            $prefix.'contentEncoding' => $c->getContentEncoding(),
            $prefix.'type' => $c->getType(),
            $prefix.'timestamp' => $c->getTimeStamp(),
            $prefix.'priority' => $c->getPriority(),
            $prefix.'expiration' => $c->getExpiration(),
            $prefix.'userId' => $c->getUserId(),
            $prefix.'appId' => $c->getAppId(),
            $prefix.'messageId' => $c->getMessageId(),
            $prefix.'replyTo' => $c->getReplyTo(),
            $prefix.'correlationId' => $c->getCorrelationId(),
            $prefix.'headers' => $c->getHeaders(),
        );
=======
        $deliveryMode = new ConstStub($c->getDeliveryMode().(2 === $c->getDeliveryMode() ? ' (persistent)' : ' (non-persistent)'), $c->getDeliveryMode());

        // Recent version of the extension already expose private properties
        if (isset($a["\x00AMQPEnvelope\x00body"])) {
            $a["\0AMQPEnvelope\0delivery_mode"] = $deliveryMode;

            return $a;
        }

        if (!($filter & Caster::EXCLUDE_VERBOSE)) {
            $a += [$prefix.'body' => $c->getBody()];
        }

        $a += [
            $prefix.'delivery_tag' => $c->getDeliveryTag(),
            $prefix.'is_redelivery' => $c->isRedelivery(),
            $prefix.'exchange_name' => $c->getExchangeName(),
            $prefix.'routing_key' => $c->getRoutingKey(),
            $prefix.'content_type' => $c->getContentType(),
            $prefix.'content_encoding' => $c->getContentEncoding(),
            $prefix.'headers' => $c->getHeaders(),
            $prefix.'delivery_mode' => $deliveryMode,
            $prefix.'priority' => $c->getPriority(),
            $prefix.'correlation_id' => $c->getCorrelationId(),
            $prefix.'reply_to' => $c->getReplyTo(),
            $prefix.'expiration' => $c->getExpiration(),
            $prefix.'message_id' => $c->getMessageId(),
            $prefix.'timestamp' => $c->getTimeStamp(),
            $prefix.'type' => $c->getType(),
            $prefix.'user_id' => $c->getUserId(),
            $prefix.'app_id' => $c->getAppId(),
        ];
>>>>>>> dev

        return $a;
    }

    private static function extractFlags($flags)
    {
<<<<<<< HEAD
        $flagsArray = array();
=======
        $flagsArray = [];
>>>>>>> dev

        foreach (self::$flags as $value => $name) {
            if ($flags & $value) {
                $flagsArray[] = $name;
            }
        }

        if (!$flagsArray) {
<<<<<<< HEAD
            $flagsArray = array('AMQP_NOPARAM');
=======
            $flagsArray = ['AMQP_NOPARAM'];
>>>>>>> dev
        }

        return new ConstStub(implode('|', $flagsArray), $flags);
    }
}
