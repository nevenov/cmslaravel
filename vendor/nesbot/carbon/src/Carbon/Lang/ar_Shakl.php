<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
return array(
    'year' => '[0,1] سَنَة|{2} سَنَتَيْن|[3,10]:count سَنَوَات|[11,Inf]:count سَنَة',
    'y' => '[0,1] سَنَة|{2} سَنَتَيْن|[3,10]:count سَنَوَات|[11,Inf]:count سَنَة',
    'month' => '[0,1] شَهْرَ|{2} شَهْرَيْن|[3,10]:count أَشْهُر|[11,Inf]:count شَهْرَ',
    'm' => '[0,1] شَهْرَ|{2} شَهْرَيْن|[3,10]:count أَشْهُر|[11,Inf]:count شَهْرَ',
    'week' => '[0,1] أُسْبُوع|{2} أُسْبُوعَيْن|[3,10]:count أَسَابِيع|[11,Inf]:count أُسْبُوع',
    'w' => '[0,1] أُسْبُوع|{2} أُسْبُوعَيْن|[3,10]:count أَسَابِيع|[11,Inf]:count أُسْبُوع',
    'day' => '[0,1] يَوْم|{2} يَوْمَيْن|[3,10]:count أَيَّام|[11,Inf] يَوْم',
    'd' => '[0,1] يَوْم|{2} يَوْمَيْن|[3,10]:count أَيَّام|[11,Inf] يَوْم',
    'hour' => '[0,1] سَاعَة|{2} سَاعَتَيْن|[3,10]:count سَاعَات|[11,Inf]:count سَاعَة',
    'h' => '[0,1] سَاعَة|{2} سَاعَتَيْن|[3,10]:count سَاعَات|[11,Inf]:count سَاعَة',
    'minute' => '[0,1] دَقِيقَة|{2} دَقِيقَتَيْن|[3,10]:count دَقَائِق|[11,Inf]:count دَقِيقَة',
    'min' => '[0,1] دَقِيقَة|{2} دَقِيقَتَيْن|[3,10]:count دَقَائِق|[11,Inf]:count دَقِيقَة',
    'second' => '[0,1] ثَانِيَة|{2} ثَانِيَتَيْن|[3,10]:count ثَوَان|[11,Inf]:count ثَانِيَة',
    's' => '[0,1] ثَانِيَة|{2} ثَانِيَتَيْن|[3,10]:count ثَوَان|[11,Inf]:count ثَانِيَة',
=======
/*
 * Authors:
 * - Abdellah Chadidi
 * - Atef Ben Ali (atefBB)
 */
// Same for long and short
$months = [
    // @TODO add shakl to months
    'يناير',
    'فبراير',
    'مارس',
    'أبريل',
    'مايو',
    'يونيو',
    'يوليو',
    'أغسطس',
    'سبتمبر',
    'أكتوبر',
    'نوفمبر',
    'ديسمبر',
];

return [
    'year' => implode('|', ['سَنَة', 'سَنَة', 'سَنَتَيْن', 'سَنَوَات'.' :count', 'سَنَة'.' :count']),
    'month' => implode('|', ['شَهْرَ', 'شَهْرَ', 'شَهْرَيْن', 'أَشْهُر'.' :count', 'شَهْرَ'.' :count']),
    'week' => implode('|', ['أُسْبُوع', 'أُسْبُوع', 'أُسْبُوعَيْن', 'أَسَابِيع'.' :count', 'أُسْبُوع'.' :count']),
    'day' => implode('|', ['يَوْم', 'يَوْم', 'يَوْمَيْن', 'أَيَّام'.' :count', 'يَوْم'.' :count']),
    'hour' => implode('|', ['سَاعَة', 'سَاعَة', 'سَاعَتَيْن', 'سَاعَات'.' :count', 'سَاعَة'.' :count']),
    'minute' => implode('|', ['دَقِيقَة', 'دَقِيقَة', 'دَقِيقَتَيْن', 'دَقَائِق'.' :count', 'دَقِيقَة'.' :count']),
    'second' => implode('|', ['ثَانِيَة', 'ثَانِيَة', 'ثَانِيَتَيْن', 'ثَوَان'.' :count', 'ثَانِيَة'.' :count']),
>>>>>>> dev
    'ago' => 'مُنْذُ :time',
    'from_now' => 'مِنَ الْآن :time',
    'after' => 'بَعْدَ :time',
    'before' => 'قَبْلَ :time',
<<<<<<< HEAD
);
=======

    // @TODO add shakl to translations below
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'D/M/YYYY',
        'LL' => 'D MMMM YYYY',
        'LLL' => 'D MMMM YYYY HH:mm',
        'LLLL' => 'dddd D MMMM YYYY HH:mm',
    ],
    'calendar' => [
        'sameDay' => '[اليوم عند الساعة] LT',
        'nextDay' => '[غدًا عند الساعة] LT',
        'nextWeek' => 'dddd [عند الساعة] LT',
        'lastDay' => '[أمس عند الساعة] LT',
        'lastWeek' => 'dddd [عند الساعة] LT',
        'sameElse' => 'L',
    ],
    'meridiem' => ['ص', 'م'],
    'weekdays' => ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
    'weekdays_short' => ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
    'weekdays_min' => ['ح', 'ن', 'ث', 'ر', 'خ', 'ج', 'س'],
    'months' => $months,
    'months_short' => $months,
    'first_day_of_week' => 6,
    'day_of_first_week_of_year' => 1,
    'list' => ['، ', ' و '],
];
>>>>>>> dev
