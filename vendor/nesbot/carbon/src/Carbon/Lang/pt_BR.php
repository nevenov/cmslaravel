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
    'year' => ':count ano|:count anos',
    'y' => ':counta|:counta',
    'month' => ':count mês|:count meses',
    'm' => ':countm|:countm',
    'week' => ':count semana|:count semanas',
    'w' => ':countsem|:countsem',
    'day' => ':count dia|:count dias',
    'd' => ':countd|:countd',
    'hour' => ':count hora|:count horas',
    'h' => ':counth|:counth',
    'minute' => ':count minuto|:count minutos',
    'min' => ':countmin|:countmin',
    'second' => ':count segundo|:count segundos',
    's' => ':counts|:counts',
    'ago' => 'há :time',
    'from_now' => 'em :time',
    'after' => 'após :time',
    'before' => ':time atrás',
    'diff_now' => 'agora',
    'diff_yesterday' => 'ontem',
    'diff_tomorrow' => 'amanhã',
    'diff_before_yesterday' => 'anteontem',
    'diff_after_tomorrow' => 'depois de amanhã',
    'period_recurrences' => 'uma|:count vez',
    'period_interval' => 'toda :interval',
    'period_start_date' => 'de :date',
    'period_end_date' => 'até :date',
);
=======
/*
 * Authors:
 * - Cassiano Montanari
 * - Eduardo Dalla Vecchia
 * - David Rodrigues
 * - Matt Pope
 * - François B
 * - Prodis
 * - Marlon Maxwel
 * - JD Isaacks
 * - Raphael Amorim
 * - Rafael Raupp
 * - felipeleite1
 * - swalker
 * - Lucas Macedo
 * - Paulo Freitas
 * - Sebastian Thierer
 */
return array_replace_recursive(require __DIR__.'/pt.php', [
    'period_recurrences' => 'uma|:count vez',
    'period_interval' => 'toda :interval',
    'formats' => [
        'LLL' => 'D [de] MMMM [de] YYYY [às] HH:mm',
        'LLLL' => 'dddd, D [de] MMMM [de] YYYY [às] HH:mm',
    ],
    'first_day_of_week' => 0,
    'day_of_first_week_of_year' => 1,
]);
>>>>>>> dev
