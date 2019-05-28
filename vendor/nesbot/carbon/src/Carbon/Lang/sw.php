<?php

<<<<<<< HEAD
/*
=======
/**
>>>>>>> dev
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
return array(
    'year' => 'mwaka 1|miaka :count',
    'y' => 'mwaka 1|miaka :count',
    'month' => 'mwezi 1|miezi :count',
    'm' => 'mwezi 1|miezi :count',
    'week' => 'wiki 1|wiki :count',
    'w' => 'wiki 1|wiki :count',
    'day' => 'siku 1|siku :count',
    'd' => 'siku 1|siku :count',
    'hour' => 'saa 1|masaa :count',
    'h' => 'saa 1|masaa :count',
    'minute' => 'dakika 1|dakika :count',
    'min' => 'dakika 1|dakika :count',
    'second' => 'sekunde 1|sekunde :count',
    's' => 'sekunde 1|sekunde :count',
    'ago' => ':time ziliyopita',
    'from_now' => ':time kwanzia sasa',
    'after' => ':time baada',
    'before' => ':time kabla',
);
=======
/**
 * Authors:
 * - leyluj
 * - Josh Soref
 * - ryanhart2
 */
return [
    'year' => 'mwaka :count|miaka :count',
    'a_year' => 'mwaka mmoja|miaka :count',
    'y' => 'mwaka :count|miaka :count',
    'month' => 'mwezi :count|miezi :count',
    'a_month' => 'mwezi mmoja|miezi :count',
    'm' => 'mwezi :count|miezi :count',
    'week' => 'wiki :count',
    'a_week' => 'wiki mmoja|wiki :count',
    'w' => 'w. :count',
    'day' => 'siku :count',
    'a_day' => 'siku moja|masiku :count',
    'd' => 'si. :count',
    'hour' => 'saa :count|masaa :count',
    'a_hour' => 'saa limoja|masaa :count',
    'h' => 'saa :count|masaa :count',
    'minute' => 'dakika :count',
    'a_minute' => 'dakika moja|dakika :count',
    'min' => 'd. :count',
    'second' => 'sekunde :count',
    'a_second' => 'hivi punde|sekunde :count',
    's' => 'se. :count',
    'ago' => 'tokea :time',
    'from_now' => ':time baadaye',
    'after' => ':time baada',
    'before' => ':time kabla',
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'DD.MM.YYYY',
        'LL' => 'D MMMM YYYY',
        'LLL' => 'D MMMM YYYY HH:mm',
        'LLLL' => 'dddd, D MMMM YYYY HH:mm',
    ],
    'calendar' => [
        'sameDay' => '[leo saa] LT',
        'nextDay' => '[kesho saa] LT',
        'nextWeek' => '[wiki ijayo] dddd [saat] LT',
        'lastDay' => '[jana] LT',
        'lastWeek' => '[wiki iliyopita] dddd [saat] LT',
        'sameElse' => 'L',
    ],
    'months' => ['Januari', 'Februari', 'Machi', 'Aprili', 'Mei', 'Juni', 'Julai', 'Agosti', 'Septemba', 'Oktoba', 'Novemba', 'Desemba'],
    'months_short' => ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ago', 'Sep', 'Okt', 'Nov', 'Des'],
    'weekdays' => ['Jumapili', 'Jumatatu', 'Jumanne', 'Jumatano', 'Alhamisi', 'Ijumaa', 'Jumamosi'],
    'weekdays_short' => ['Jpl', 'Jtat', 'Jnne', 'Jtan', 'Alh', 'Ijm', 'Jmos'],
    'weekdays_min' => ['J2', 'J3', 'J4', 'J5', 'Al', 'Ij', 'J1'],
    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 1,
    'list' => [', ', ' na '],
];
>>>>>>> dev
