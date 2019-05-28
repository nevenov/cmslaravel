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

namespace Carbon;

=======
namespace Carbon;

use BadMethodCallException;
use Carbon\Traits\Options;
>>>>>>> dev
use Closure;
use DateInterval;
use InvalidArgumentException;
use ReflectionClass;
<<<<<<< HEAD
use ReflectionFunction;
use ReflectionMethod;
use Symfony\Component\Translation\TranslatorInterface;
=======
use ReflectionMethod;
>>>>>>> dev

/**
 * A simple API extension for DateInterval.
 * The implementation provides helpers to handle weeks but only days are saved.
 * Weeks are calculated based on the total days of the current instance.
 *
 * @property int $years Total years of the current interval.
 * @property int $months Total months of the current interval.
 * @property int $weeks Total weeks of the current interval calculated from the days.
 * @property int $dayz Total days of the current interval (weeks * 7 + days).
 * @property int $hours Total hours of the current interval.
 * @property int $minutes Total minutes of the current interval.
 * @property int $seconds Total seconds of the current interval.
<<<<<<< HEAD
=======
 * @property int $microseconds Total microseconds of the current interval.
 * @property int $milliseconds Total microseconds of the current interval.
>>>>>>> dev
 * @property-read int $dayzExcludeWeeks Total days remaining in the final week of the current instance (days % 7).
 * @property-read int $daysExcludeWeeks alias of dayzExcludeWeeks
 * @property-read float $totalYears Number of years equivalent to the interval.
 * @property-read float $totalMonths Number of months equivalent to the interval.
 * @property-read float $totalWeeks Number of weeks equivalent to the interval.
 * @property-read float $totalDays Number of days equivalent to the interval.
 * @property-read float $totalDayz Alias for totalDays.
 * @property-read float $totalHours Number of hours equivalent to the interval.
 * @property-read float $totalMinutes Number of minutes equivalent to the interval.
 * @property-read float $totalSeconds Number of seconds equivalent to the interval.
<<<<<<< HEAD
=======
 * @property-read float $totalMilliseconds Number of milliseconds equivalent to the interval.
 * @property-read float $totalMicroseconds Number of microseconds equivalent to the interval.
 * @property-read string $locale locale of the current instance
>>>>>>> dev
 *
 * @method static CarbonInterval years($years = 1) Create instance specifying a number of years.
 * @method static CarbonInterval year($years = 1) Alias for years()
 * @method static CarbonInterval months($months = 1) Create instance specifying a number of months.
 * @method static CarbonInterval month($months = 1) Alias for months()
 * @method static CarbonInterval weeks($weeks = 1) Create instance specifying a number of weeks.
 * @method static CarbonInterval week($weeks = 1) Alias for weeks()
 * @method static CarbonInterval days($days = 1) Create instance specifying a number of days.
 * @method static CarbonInterval dayz($days = 1) Alias for days()
 * @method static CarbonInterval day($days = 1) Alias for days()
 * @method static CarbonInterval hours($hours = 1) Create instance specifying a number of hours.
 * @method static CarbonInterval hour($hours = 1) Alias for hours()
 * @method static CarbonInterval minutes($minutes = 1) Create instance specifying a number of minutes.
 * @method static CarbonInterval minute($minutes = 1) Alias for minutes()
 * @method static CarbonInterval seconds($seconds = 1) Create instance specifying a number of seconds.
 * @method static CarbonInterval second($seconds = 1) Alias for seconds()
<<<<<<< HEAD
=======
 * @method static CarbonInterval milliseconds($milliseconds = 1) Create instance specifying a number of milliseconds.
 * @method static CarbonInterval millisecond($milliseconds = 1) Alias for milliseconds()
 * @method static CarbonInterval microseconds($microseconds = 1) Create instance specifying a number of microseconds.
 * @method static CarbonInterval microsecond($microseconds = 1) Alias for microseconds()
>>>>>>> dev
 * @method CarbonInterval years($years = 1) Set the years portion of the current interval.
 * @method CarbonInterval year($years = 1) Alias for years().
 * @method CarbonInterval months($months = 1) Set the months portion of the current interval.
 * @method CarbonInterval month($months = 1) Alias for months().
 * @method CarbonInterval weeks($weeks = 1) Set the weeks portion of the current interval.  Will overwrite dayz value.
 * @method CarbonInterval week($weeks = 1) Alias for weeks().
 * @method CarbonInterval days($days = 1) Set the days portion of the current interval.
 * @method CarbonInterval dayz($days = 1) Alias for days().
 * @method CarbonInterval day($days = 1) Alias for days().
 * @method CarbonInterval hours($hours = 1) Set the hours portion of the current interval.
 * @method CarbonInterval hour($hours = 1) Alias for hours().
 * @method CarbonInterval minutes($minutes = 1) Set the minutes portion of the current interval.
 * @method CarbonInterval minute($minutes = 1) Alias for minutes().
 * @method CarbonInterval seconds($seconds = 1) Set the seconds portion of the current interval.
 * @method CarbonInterval second($seconds = 1) Alias for seconds().
<<<<<<< HEAD
 */
class CarbonInterval extends DateInterval
{
=======
 * @method CarbonInterval milliseconds($seconds = 1) Set the seconds portion of the current interval.
 * @method CarbonInterval millisecond($seconds = 1) Alias for seconds().
 * @method CarbonInterval microseconds($seconds = 1) Set the seconds portion of the current interval.
 * @method CarbonInterval microsecond($seconds = 1) Alias for seconds().
 */
class CarbonInterval extends DateInterval
{
    use Options;

>>>>>>> dev
    /**
     * Interval spec period designators
     */
    const PERIOD_PREFIX = 'P';
    const PERIOD_YEARS = 'Y';
    const PERIOD_MONTHS = 'M';
    const PERIOD_DAYS = 'D';
    const PERIOD_TIME_PREFIX = 'T';
    const PERIOD_HOURS = 'H';
    const PERIOD_MINUTES = 'M';
    const PERIOD_SECONDS = 'S';

    /**
     * A translator to ... er ... translate stuff
     *
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    protected static $translator;

    /**
     * @var array|null
     */
    protected static $cascadeFactors;

    /**
     * @var array|null
     */
    private static $flipCascadeFactors;

    /**
     * The registered macros.
     *
     * @var array
     */
<<<<<<< HEAD
    protected static $macros = array();

    /**
     * Before PHP 5.4.20/5.5.4 instead of FALSE days will be set to -99999 when the interval instance
     * was created by DateTime::diff().
     */
    const PHP_DAYS_FALSE = -99999;
=======
    protected static $macros = [];

    /**
     * Timezone handler for settings() method.
     *
     * @var mixed
     */
    protected $tzName;

    public function shiftTimezone($tzName)
    {
        $this->tzName = $tzName;

        return $this;
    }
>>>>>>> dev

    /**
     * Mapping of units and factors for cascading.
     *
     * Should only be modified by changing the factors or referenced constants.
     *
     * @return array
     */
    public static function getCascadeFactors()
    {
<<<<<<< HEAD
        return static::$cascadeFactors ?: array(
            'minutes' => array(Carbon::SECONDS_PER_MINUTE, 'seconds'),
            'hours' => array(Carbon::MINUTES_PER_HOUR, 'minutes'),
            'dayz' => array(Carbon::HOURS_PER_DAY, 'hours'),
            'months' => array(Carbon::DAYS_PER_WEEK * Carbon::WEEKS_PER_MONTH, 'dayz'),
            'years' => array(Carbon::MONTHS_PER_YEAR, 'months'),
        );
=======
        return static::$cascadeFactors ?: [
            'milliseconds' => [Carbon::MICROSECONDS_PER_MILLISECOND, 'microseconds'],
            'seconds' => [Carbon::MILLISECONDS_PER_SECOND, 'milliseconds'],
            'minutes' => [Carbon::SECONDS_PER_MINUTE, 'seconds'],
            'hours' => [Carbon::MINUTES_PER_HOUR, 'minutes'],
            'dayz' => [Carbon::HOURS_PER_DAY, 'hours'],
            'months' => [Carbon::DAYS_PER_WEEK * Carbon::WEEKS_PER_MONTH, 'dayz'],
            'years' => [Carbon::MONTHS_PER_YEAR, 'months'],
        ];
>>>>>>> dev
    }

    private static function standardizeUnit($unit)
    {
        $unit = rtrim($unit, 'sz').'s';

        return $unit === 'days' ? 'dayz' : $unit;
    }

    private static function getFlipCascadeFactors()
    {
        if (!self::$flipCascadeFactors) {
<<<<<<< HEAD
            self::$flipCascadeFactors = array();
            foreach (static::getCascadeFactors() as $to => $tuple) {
                list($factor, $from) = $tuple;

                self::$flipCascadeFactors[self::standardizeUnit($from)] = array(self::standardizeUnit($to), $factor);
=======
            self::$flipCascadeFactors = [];
            foreach (static::getCascadeFactors() as $to => [$factor, $from]) {
                self::$flipCascadeFactors[self::standardizeUnit($from)] = [self::standardizeUnit($to), $factor];
>>>>>>> dev
            }
        }

        return self::$flipCascadeFactors;
    }

    /**
<<<<<<< HEAD
=======
     * Set default cascading factors for ->cascade() method.
     *
>>>>>>> dev
     * @param array $cascadeFactors
     */
    public static function setCascadeFactors(array $cascadeFactors)
    {
        self::$flipCascadeFactors = null;
        static::$cascadeFactors = $cascadeFactors;
    }

<<<<<<< HEAD
    /**
     * Determine if the interval was created via DateTime:diff() or not.
     *
     * @param DateInterval $interval
     *
     * @return bool
     */
    private static function wasCreatedFromDiff(DateInterval $interval)
    {
        return $interval->days !== false && $interval->days !== static::PHP_DAYS_FALSE;
    }

=======
>>>>>>> dev
    ///////////////////////////////////////////////////////////////////
    //////////////////////////// CONSTRUCTORS /////////////////////////
    ///////////////////////////////////////////////////////////////////

    /**
     * Create a new CarbonInterval instance.
     *
     * @param int $years
     * @param int $months
     * @param int $weeks
     * @param int $days
     * @param int $hours
     * @param int $minutes
     * @param int $seconds
<<<<<<< HEAD
     */
    public function __construct($years = 1, $months = null, $weeks = null, $days = null, $hours = null, $minutes = null, $seconds = null)
=======
     * @param int $microseconds
     *
     * @throws \Exception
     */
    public function __construct($years = 1, $months = null, $weeks = null, $days = null, $hours = null, $minutes = null, $seconds = null, $microseconds = null)
>>>>>>> dev
    {
        $spec = $years;

        if (!is_string($spec) || floatval($years) || preg_match('/^[0-9.]/', $years)) {
            $spec = static::PERIOD_PREFIX;

            $spec .= $years > 0 ? $years.static::PERIOD_YEARS : '';
            $spec .= $months > 0 ? $months.static::PERIOD_MONTHS : '';

            $specDays = 0;
            $specDays += $weeks > 0 ? $weeks * static::getDaysPerWeek() : 0;
            $specDays += $days > 0 ? $days : 0;

            $spec .= $specDays > 0 ? $specDays.static::PERIOD_DAYS : '';

            if ($hours > 0 || $minutes > 0 || $seconds > 0) {
                $spec .= static::PERIOD_TIME_PREFIX;
                $spec .= $hours > 0 ? $hours.static::PERIOD_HOURS : '';
                $spec .= $minutes > 0 ? $minutes.static::PERIOD_MINUTES : '';
                $spec .= $seconds > 0 ? $seconds.static::PERIOD_SECONDS : '';
            }

            if ($spec === static::PERIOD_PREFIX) {
                // Allow the zero interval.
                $spec .= '0'.static::PERIOD_YEARS;
            }
        }

        parent::__construct($spec);
<<<<<<< HEAD
=======

        if (!is_null($microseconds)) {
            $this->f = $microseconds / Carbon::MICROSECONDS_PER_SECOND;
        }
>>>>>>> dev
    }

    /**
     * Returns the factor for a given source-to-target couple.
     *
     * @param string $source
     * @param string $target
     *
     * @return int|null
     */
    public static function getFactor($source, $target)
    {
        $source = self::standardizeUnit($source);
        $target = self::standardizeUnit($target);
        $factors = static::getFlipCascadeFactors();
        if (isset($factors[$source])) {
<<<<<<< HEAD
            list($to, $factor) = $factors[$source];
=======
            [$to, $factor] = $factors[$source];
>>>>>>> dev
            if ($to === $target) {
                return $factor;
            }
        }

        return null;
    }

    /**
     * Returns current config for days per week.
     *
     * @return int
     */
    public static function getDaysPerWeek()
    {
        return static::getFactor('dayz', 'weeks') ?: Carbon::DAYS_PER_WEEK;
    }

    /**
     * Returns current config for hours per day.
     *
     * @return int
     */
    public static function getHoursPerDay()
    {
        return static::getFactor('hours', 'dayz') ?: Carbon::HOURS_PER_DAY;
    }

    /**
     * Returns current config for minutes per hour.
     *
     * @return int
     */
<<<<<<< HEAD
    public static function getMinutesPerHours()
=======
    public static function getMinutesPerHour()
>>>>>>> dev
    {
        return static::getFactor('minutes', 'hours') ?: Carbon::MINUTES_PER_HOUR;
    }

    /**
     * Returns current config for seconds per minute.
     *
     * @return int
     */
<<<<<<< HEAD
    public static function getSecondsPerMinutes()
=======
    public static function getSecondsPerMinute()
>>>>>>> dev
    {
        return static::getFactor('seconds', 'minutes') ?: Carbon::SECONDS_PER_MINUTE;
    }

    /**
<<<<<<< HEAD
=======
     * Returns current config for microseconds per second.
     *
     * @return int
     */
    public static function getMillisecondsPerSecond()
    {
        return static::getFactor('milliseconds', 'seconds') ?: Carbon::MILLISECONDS_PER_SECOND;
    }

    /**
     * Returns current config for microseconds per second.
     *
     * @return int
     */
    public static function getMicrosecondsPerMillisecond()
    {
        return static::getFactor('microseconds', 'milliseconds') ?: Carbon::MICROSECONDS_PER_MILLISECOND;
    }

    /**
>>>>>>> dev
     * Create a new CarbonInterval instance from specific values.
     * This is an alias for the constructor that allows better fluent
     * syntax as it allows you to do CarbonInterval::create(1)->fn() rather than
     * (new CarbonInterval(1))->fn().
     *
     * @param int $years
     * @param int $months
     * @param int $weeks
     * @param int $days
     * @param int $hours
     * @param int $minutes
     * @param int $seconds
<<<<<<< HEAD
     *
     * @return static
     */
    public static function create($years = 1, $months = null, $weeks = null, $days = null, $hours = null, $minutes = null, $seconds = null)
    {
        return new static($years, $months, $weeks, $days, $hours, $minutes, $seconds);
=======
     * @param int $microseconds
     *
     * @return static
     */
    public static function create($years = 1, $months = null, $weeks = null, $days = null, $hours = null, $minutes = null, $seconds = null, $microseconds = null)
    {
        return new static($years, $months, $weeks, $days, $hours, $minutes, $seconds, $microseconds);
>>>>>>> dev
    }

    /**
     * Get a copy of the instance.
     *
     * @return static
     */
    public function copy()
    {
        $date = new static($this->spec());
        $date->invert = $this->invert;

        return $date;
    }

    /**
     * Provide static helpers to create instances.  Allows CarbonInterval::years(3).
     *
     * Note: This is done using the magic method to allow static and instance methods to
     *       have the same names.
     *
<<<<<<< HEAD
     * @param string $name
     * @param array  $args
     *
     * @return static
     */
    public static function __callStatic($name, $args)
    {
        $arg = count($args) === 0 ? 1 : $args[0];

        switch ($name) {
            case 'years':
            case 'year':
                return new static($arg);

            case 'months':
            case 'month':
                return new static(null, $arg);

            case 'weeks':
            case 'week':
                return new static(null, null, $arg);

            case 'days':
            case 'dayz':
            case 'day':
                return new static(null, null, null, $arg);

            case 'hours':
            case 'hour':
                return new static(null, null, null, null, $arg);

            case 'minutes':
            case 'minute':
                return new static(null, null, null, null, null, $arg);

            case 'seconds':
            case 'second':
                return new static(null, null, null, null, null, null, $arg);
        }

        if (static::hasMacro($name)) {
            return call_user_func_array(
                array(new static(0), $name), $args
            );
        }
=======
     * @param string $method     magic method name called
     * @param array  $parameters parameters list
     *
     * @return static|null
     */
    public static function __callStatic($method, $parameters)
    {
        $arg = count($parameters) === 0 ? 1 : $parameters[0];

        switch (Carbon::singularUnit(rtrim($method, 'z'))) {
            case 'year':
                return new static($arg);

            case 'month':
                return new static(null, $arg);

            case 'week':
                return new static(null, null, $arg);

            case 'day':
                return new static(null, null, null, $arg);

            case 'hour':
                return new static(null, null, null, null, $arg);

            case 'minute':
                return new static(null, null, null, null, null, $arg);

            case 'second':
                return new static(null, null, null, null, null, null, $arg);

            case 'millisecond':
            case 'milli':
                return new static(null, null, null, null, null, null, null, $arg * Carbon::MICROSECONDS_PER_MILLISECOND);

            case 'microsecond':
            case 'micro':
                return new static(null, null, null, null, null, null, null, $arg);
        }

        if (static::hasMacro($method)) {
            return (new static(0))->$method(...$parameters);
        }

        if (Carbon::isStrictModeEnabled()) {
            throw new BadMethodCallException(sprintf("Unknown fluent constructor '%s'.", $method));
        }

        return null;
>>>>>>> dev
    }

    /**
     * Creates a CarbonInterval from string.
     *
     * Format:
     *
     * Suffix | Unit    | Example | DateInterval expression
     * -------|---------|---------|------------------------
     * y      | years   |   1y    | P1Y
     * mo     | months  |   3mo   | P3M
     * w      | weeks   |   2w    | P2W
     * d      | days    |  28d    | P28D
     * h      | hours   |   4h    | PT4H
     * m      | minutes |  12m    | PT12M
     * s      | seconds |  59s    | PT59S
     *
     * e. g. `1w 3d 4h 32m 23s` is converted to 10 days 4 hours 32 minutes and 23 seconds.
     *
     * Special cases:
     *  - An empty string will return a zero interval
     *  - Fractions are allowed for weeks, days, hours and minutes and will be converted
     *    and rounded to the next smaller value (caution: 0.5w = 4d)
     *
     * @param string $intervalDefinition
     *
     * @return static
     */
    public static function fromString($intervalDefinition)
    {
        if (empty($intervalDefinition)) {
            return new static(0);
        }

        $years = 0;
        $months = 0;
        $weeks = 0;
        $days = 0;
        $hours = 0;
        $minutes = 0;
        $seconds = 0;
<<<<<<< HEAD

        $pattern = '/(\d+(?:\.\d+)?)\h*([^\d\h]*)/i';
        preg_match_all($pattern, $intervalDefinition, $parts, PREG_SET_ORDER);
        while ($match = array_shift($parts)) {
            list($part, $value, $unit) = $match;
            $intValue = intval($value);
            $fraction = floatval($value) - $intValue;
            switch (strtolower($unit)) {
=======
        $milliseconds = 0;
        $microseconds = 0;

        $pattern = '/(\d+(?:\.\d+)?)\h*([^\d\h]*)/i';
        preg_match_all($pattern, $intervalDefinition, $parts, PREG_SET_ORDER);
        while ([$part, $value, $unit] = array_shift($parts)) {
            $intValue = intval($value);
            $fraction = floatval($value) - $intValue;
            // Fix calculation precision
            switch (round($fraction, 6)) {
                case 1:
                    $fraction = 0;
                    $intValue++;
                    break;
                case 0:
                    $fraction = 0;
                    break;
            }
            switch ($unit === 'µs' ? 'µs' : strtolower($unit)) {
>>>>>>> dev
                case 'year':
                case 'years':
                case 'y':
                    $years += $intValue;
                    break;

                case 'month':
                case 'months':
                case 'mo':
                    $months += $intValue;
                    break;

                case 'week':
                case 'weeks':
                case 'w':
                    $weeks += $intValue;
                    if ($fraction) {
<<<<<<< HEAD
                        $parts[] = array(null, $fraction * static::getDaysPerWeek(), 'd');
=======
                        $parts[] = [null, $fraction * static::getDaysPerWeek(), 'd'];
>>>>>>> dev
                    }
                    break;

                case 'day':
                case 'days':
                case 'd':
                    $days += $intValue;
                    if ($fraction) {
<<<<<<< HEAD
                        $parts[] = array(null, $fraction * static::getHoursPerDay(), 'h');
=======
                        $parts[] = [null, $fraction * static::getHoursPerDay(), 'h'];
>>>>>>> dev
                    }
                    break;

                case 'hour':
                case 'hours':
                case 'h':
                    $hours += $intValue;
                    if ($fraction) {
<<<<<<< HEAD
                        $parts[] = array(null, $fraction * static::getMinutesPerHours(), 'm');
=======
                        $parts[] = [null, $fraction * static::getMinutesPerHour(), 'm'];
>>>>>>> dev
                    }
                    break;

                case 'minute':
                case 'minutes':
                case 'm':
                    $minutes += $intValue;
                    if ($fraction) {
<<<<<<< HEAD
                        $seconds += round($fraction * static::getSecondsPerMinutes());
=======
                        $parts[] = [null, $fraction * static::getSecondsPerMinute(), 's'];
>>>>>>> dev
                    }
                    break;

                case 'second':
                case 'seconds':
                case 's':
                    $seconds += $intValue;
<<<<<<< HEAD
=======
                    if ($fraction) {
                        $parts[] = [null, $fraction * static::getMillisecondsPerSecond(), 'ms'];
                    }
                    break;

                case 'millisecond':
                case 'milliseconds':
                case 'milli':
                case 'ms':
                    $milliseconds += $intValue;
                    if ($fraction) {
                        $microseconds += round($fraction * static::getMicrosecondsPerMillisecond());
                    }
                    break;

                case 'microsecond':
                case 'microseconds':
                case 'micro':
                case 'µs':
                    $microseconds += $intValue;
>>>>>>> dev
                    break;

                default:
                    throw new InvalidArgumentException(
                        sprintf('Invalid part %s in definition %s', $part, $intervalDefinition)
                    );
            }
        }

<<<<<<< HEAD
        return new static($years, $months, $weeks, $days, $hours, $minutes, $seconds);
=======
        return new static($years, $months, $weeks, $days, $hours, $minutes, $seconds, $milliseconds * Carbon::MICROSECONDS_PER_MILLISECOND + $microseconds);
>>>>>>> dev
    }

    /**
     * Create a CarbonInterval instance from a DateInterval one.  Can not instance
     * DateInterval objects created from DateTime::diff() as you can't externally
     * set the $days field.
     *
<<<<<<< HEAD
     * Pass false as second argument to get a microseconds-precise interval. Else
     * microseconds in the original interval will not be kept.
     *
     * @param DateInterval $di
     * @param bool         $trimMicroseconds (true by default)
     *
     * @return static
     */
    public static function instance(DateInterval $di, $trimMicroseconds = true)
    {
        $microseconds = $trimMicroseconds || version_compare(PHP_VERSION, '7.1.0-dev', '<') ? 0 : $di->f;
=======
     * @param DateInterval $di
     *
     * @return static
     */
    public static function instance(DateInterval $di)
    {
        $microseconds = $di->f;
>>>>>>> dev
        $instance = new static(static::getDateIntervalSpec($di));
        if ($microseconds) {
            $instance->f = $microseconds;
        }
        $instance->invert = $di->invert;
<<<<<<< HEAD
        foreach (array('y', 'm', 'd', 'h', 'i', 's') as $unit) {
=======
        foreach (['y', 'm', 'd', 'h', 'i', 's'] as $unit) {
>>>>>>> dev
            if ($di->$unit < 0) {
                $instance->$unit *= -1;
            }
        }

        return $instance;
    }

    /**
     * Make a CarbonInterval instance from given variable if possible.
     *
     * Always return a new instance. Parse only strings and only these likely to be intervals (skip dates
     * and recurrences). Throw an exception for invalid format, but otherwise return null.
     *
     * @param mixed $var
     *
     * @return static|null
     */
    public static function make($var)
    {
        if ($var instanceof DateInterval) {
            return static::instance($var);
        }

<<<<<<< HEAD
        if (is_string($var)) {
            $var = trim($var);

            if (substr($var, 0, 1) === 'P') {
                return new static($var);
            }

            if (preg_match('/^(?:\h*\d+(?:\.\d+)?\h*[a-z]+)+$/i', $var)) {
                return static::fromString($var);
            }
        }
    }

    ///////////////////////////////////////////////////////////////////
    /////////////////////// LOCALIZATION //////////////////////////////
    ///////////////////////////////////////////////////////////////////

    /**
     * Initialize the translator instance if necessary.
     *
     * @return \Symfony\Component\Translation\TranslatorInterface
     */
    protected static function translator()
    {
        if (static::$translator === null) {
            static::$translator = Translator::get();
        }

        return static::$translator;
    }

    /**
     * Get the translator instance in use.
     *
     * @return \Symfony\Component\Translation\TranslatorInterface
     */
    public static function getTranslator()
    {
        return static::translator();
    }

    /**
     * Set the translator instance to use.
     *
     * @param TranslatorInterface $translator
     */
    public static function setTranslator(TranslatorInterface $translator)
    {
        static::$translator = $translator;
    }

    /**
     * Get the current translator locale.
     *
     * @return string
     */
    public static function getLocale()
    {
        return static::translator()->getLocale();
    }

    /**
     * Set the current translator locale.
     *
     * @param string $locale
     */
    public static function setLocale($locale)
    {
        return static::translator()->setLocale($locale) !== false;
=======
        if (!is_string($var)) {
            return null;
        }

        $var = trim($var);

        if (preg_match('/^P[T0-9]/', $var)) {
            return new static($var);
        }

        if (preg_match('/^(?:\h*\d+(?:\.\d+)?\h*[a-z]+)+$/i', $var)) {
            return static::fromString($var);
        }

        /** @var static $interval */
        $interval = static::createFromDateString($var);

        return $interval->isEmpty() ? null : $interval;
    }

    /**
     * Sets up a DateInterval from the relative parts of the string.
     *
     * @param string $time
     *
     * @return static
     *
     * @link http://php.net/manual/en/dateinterval.createfromdatestring.php
     */
    public static function createFromDateString($time)
    {
        $interval = parent::createFromDateString($time);
        if ($interval instanceof DateInterval && !($interval instanceof static)) {
            $interval = static::instance($interval);
        }

        return static::instance($interval);
>>>>>>> dev
    }

    ///////////////////////////////////////////////////////////////////
    ///////////////////////// GETTERS AND SETTERS /////////////////////
    ///////////////////////////////////////////////////////////////////

    /**
     * Get a part of the CarbonInterval object.
     *
     * @param string $name
     *
     * @throws \InvalidArgumentException
     *
<<<<<<< HEAD
     * @return int|float
=======
     * @return int|float|string
>>>>>>> dev
     */
    public function __get($name)
    {
        if (substr($name, 0, 5) === 'total') {
            return $this->total(substr($name, 5));
        }

        switch ($name) {
            case 'years':
                return $this->y;

            case 'months':
                return $this->m;

            case 'dayz':
                return $this->d;

            case 'hours':
                return $this->h;

            case 'minutes':
                return $this->i;

            case 'seconds':
                return $this->s;

<<<<<<< HEAD
=======
            case 'milli':
            case 'milliseconds':
                return (int) floor(round($this->f * Carbon::MICROSECONDS_PER_SECOND) / Carbon::MICROSECONDS_PER_MILLISECOND);

            case 'micro':
            case 'microseconds':
                return (int) round($this->f * Carbon::MICROSECONDS_PER_SECOND);

>>>>>>> dev
            case 'weeks':
                return (int) floor($this->d / static::getDaysPerWeek());

            case 'daysExcludeWeeks':
            case 'dayzExcludeWeeks':
                return $this->d % static::getDaysPerWeek();

<<<<<<< HEAD
=======
            case 'locale':
                return $this->getLocalTranslator()->getLocale();

>>>>>>> dev
            default:
                throw new InvalidArgumentException(sprintf("Unknown getter '%s'", $name));
        }
    }

    /**
     * Set a part of the CarbonInterval object.
     *
     * @param string $name
<<<<<<< HEAD
     * @param int    $val
     *
     * @throws \InvalidArgumentException
     */
    public function __set($name, $val)
    {
        switch ($name) {
            case 'years':
                $this->y = $val;
                break;

            case 'months':
                $this->m = $val;
                break;

            case 'weeks':
                $this->d = $val * static::getDaysPerWeek();
                break;

            case 'dayz':
                $this->d = $val;
                break;

            case 'hours':
                $this->h = $val;
                break;

            case 'minutes':
                $this->i = $val;
                break;

            case 'seconds':
                $this->s = $val;
                break;
=======
     * @param int    $value
     *
     * @throws \InvalidArgumentException
     */
    public function __set($name, $value)
    {
        switch (Carbon::singularUnit(rtrim($name, 'z'))) {
            case 'year':
                $this->y = $value;
                break;

            case 'month':
                $this->m = $value;
                break;

            case 'week':
                $this->d = $value * static::getDaysPerWeek();
                break;

            case 'day':
                $this->d = $value;
                break;

            case 'hour':
                $this->h = $value;
                break;

            case 'minute':
                $this->i = $value;
                break;

            case 'second':
                $this->s = $value;
                break;

            case 'milli':
            case 'millisecond':
                $this->microseconds = $value * Carbon::MICROSECONDS_PER_MILLISECOND + $this->microseconds % Carbon::MICROSECONDS_PER_MILLISECOND;
                break;

            case 'micro':
            case 'microsecond':
                $this->f = $value / Carbon::MICROSECONDS_PER_SECOND;
                break;

            default:
                if ($this->localStrictModeEnabled ?? Carbon::isStrictModeEnabled()) {
                    throw new InvalidArgumentException(sprintf("Unknown setter '%s'", $name));
                }

                $this->$name = $value;
>>>>>>> dev
        }
    }

    /**
     * Allow setting of weeks and days to be cumulative.
     *
     * @param int $weeks Number of weeks to set
     * @param int $days  Number of days to set
     *
     * @return static
     */
    public function weeksAndDays($weeks, $days)
    {
        $this->dayz = ($weeks * static::getDaysPerWeek()) + $days;

        return $this;
    }

    /**
<<<<<<< HEAD
     * Register a custom macro.
     *
=======
     * Returns true if the interval is empty for each unit.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->years === 0 &&
            $this->months === 0 &&
            $this->dayz === 0 &&
            !$this->days &&
            $this->hours === 0 &&
            $this->minutes === 0 &&
            $this->seconds === 0 &&
            $this->microseconds === 0;
    }

    /**
     * Register a custom macro.
     *
     * @example
     * ```
     * CarbonInterval::macro('twice', function () {
     *   return $this->times(2);
     * });
     * echo CarbonInterval::hours(2)->twice();
     * ```
     *
>>>>>>> dev
     * @param string          $name
     * @param object|callable $macro
     *
     * @return void
     */
    public static function macro($name, $macro)
    {
        static::$macros[$name] = $macro;
    }

    /**
     * Register macros from a mixin object.
     *
<<<<<<< HEAD
=======
     * @example
     * ```
     * CarbonInterval::mixin(new class {
     *   public function daysToHours() {
     *     return function () {
     *       $this->hours += $this->days;
     *       $this->days = 0;
     *
     *       return $this;
     *     };
     *   }
     *   public function hoursToDays() {
     *     return function () {
     *       $this->days += $this->hours;
     *       $this->hours = 0;
     *
     *       return $this;
     *     };
     *   }
     * });
     * echo CarbonInterval::hours(5)->hoursToDays() . "\n";
     * echo CarbonInterval::days(5)->daysToHours() . "\n";
     * ```
     *
>>>>>>> dev
     * @param object $mixin
     *
     * @throws \ReflectionException
     *
     * @return void
     */
    public static function mixin($mixin)
    {
        $reflection = new ReflectionClass($mixin);

        $methods = $reflection->getMethods(
            ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED
        );

        foreach ($methods as $method) {
            $method->setAccessible(true);

            static::macro($method->name, $method->invoke($mixin));
        }
    }

    /**
     * Check if macro is registered.
     *
     * @param string $name
     *
     * @return bool
     */
    public static function hasMacro($name)
    {
        return isset(static::$macros[$name]);
    }

    /**
     * Call given macro.
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function callMacro($name, $parameters)
    {
        $macro = static::$macros[$name];

<<<<<<< HEAD
        $reflection = new ReflectionFunction($macro);

        $reflectionParameters = $reflection->getParameters();

        $expectedCount = count($reflectionParameters);
        $actualCount = count($parameters);

        if ($expectedCount > $actualCount && $reflectionParameters[$expectedCount - 1]->name === 'self') {
            for ($i = $actualCount; $i < $expectedCount - 1; $i++) {
                $parameters[] = $reflectionParameters[$i]->getDefaultValue();
            }

            $parameters[] = $this;
        }

        if ($macro instanceof Closure && method_exists($macro, 'bindTo')) {
            $macro = $macro->bindTo($this, get_class($this));
=======
        if ($macro instanceof Closure) {
            return call_user_func_array($macro->bindTo($this, static::class), $parameters);
>>>>>>> dev
        }

        return call_user_func_array($macro, $parameters);
    }

    /**
     * Allow fluent calls on the setters... CarbonInterval::years(3)->months(5)->day().
     *
     * Note: This is done using the magic method to allow static and instance methods to
     *       have the same names.
     *
<<<<<<< HEAD
     * @param string $name
     * @param array  $args
     *
     * @return static
     */
    public function __call($name, $args)
    {
        if (static::hasMacro($name)) {
            return $this->callMacro($name, $args);
        }

        $arg = count($args) === 0 ? 1 : $args[0];

        switch ($name) {
            case 'years':
=======
     * @param string $method     magic method name called
     * @param array  $parameters parameters list
     *
     * @return static
     */
    public function __call($method, $parameters)
    {
        if (static::hasMacro($method)) {
            return $this->callMacro($method, $parameters);
        }

        $arg = count($parameters) === 0 ? 1 : $parameters[0];

        switch (Carbon::singularUnit(rtrim($method, 'z'))) {
>>>>>>> dev
            case 'year':
                $this->years = $arg;
                break;

<<<<<<< HEAD
            case 'months':
=======
>>>>>>> dev
            case 'month':
                $this->months = $arg;
                break;

<<<<<<< HEAD
            case 'weeks':
=======
>>>>>>> dev
            case 'week':
                $this->dayz = $arg * static::getDaysPerWeek();
                break;

<<<<<<< HEAD
            case 'days':
            case 'dayz':
=======
>>>>>>> dev
            case 'day':
                $this->dayz = $arg;
                break;

<<<<<<< HEAD
            case 'hours':
=======
>>>>>>> dev
            case 'hour':
                $this->hours = $arg;
                break;

<<<<<<< HEAD
            case 'minutes':
=======
>>>>>>> dev
            case 'minute':
                $this->minutes = $arg;
                break;

<<<<<<< HEAD
            case 'seconds':
            case 'second':
                $this->seconds = $arg;
                break;
=======
            case 'second':
                $this->seconds = $arg;
                break;

            case 'milli':
            case 'millisecond':
                $this->milliseconds = $arg;
                break;

            case 'micro':
            case 'microsecond':
                $this->microseconds = $arg;
                break;

            default:
                if ($this->localStrictModeEnabled ?? Carbon::isStrictModeEnabled()) {
                    throw new BadMethodCallException(sprintf("Unknown fluent setter '%s'", $method));
                }
>>>>>>> dev
        }

        return $this;
    }

<<<<<<< HEAD
    /**
     * Get the current interval in a human readable format in the current locale.
     *
     * @param bool $short (false by default), returns short units if true
     *
     * @return string
     */
    public function forHumans($short = false)
    {
        $periods = array(
            'year' => array('y', $this->years),
            'month' => array('m', $this->months),
            'week' => array('w', $this->weeks),
            'day' => array('d', $this->daysExcludeWeeks),
            'hour' => array('h', $this->hours),
            'minute' => array('min', $this->minutes),
            'second' => array('s', $this->seconds),
        );

        $parts = array();
        foreach ($periods as $unit => $options) {
            list($shortUnit, $count) = $options;
            if ($count > 0) {
                $parts[] = static::translator()->transChoice($short ? $shortUnit : $unit, $count, array(':count' => $count));
            }
        }

        return implode(' ', $parts);
=======
    protected function getForHumansParameters($syntax = null, $short = false, $parts = -1, $options = null)
    {
        $join = ' ';
        $aUnit = false;
        if (is_array($syntax)) {
            extract($syntax);
        } else {
            if (is_int($short)) {
                $parts = $short;
                $short = false;
            }
            if (is_bool($syntax)) {
                $short = $syntax;
                $syntax = CarbonInterface::DIFF_ABSOLUTE;
            }
        }
        if (is_null($syntax)) {
            $syntax = CarbonInterface::DIFF_ABSOLUTE;
        }
        if ($parts === -1) {
            $parts = INF;
        }
        if (is_null($options)) {
            $options = static::getHumanDiffOptions();
        }
        if ($join === true) {
            $default = $this->getTranslationMessage('list.0') ?? $this->getTranslationMessage('list') ?? ' ';
            $join = [
                $default,
                $this->getTranslationMessage('list.1') ?? $default,
            ];
        }
        if (is_array($join)) {
            [$default, $last] = $join;

            $join = function ($list) use ($default, $last) {
                if (count($list) < 2) {
                    return implode('', $list);
                }

                $end = array_pop($list);

                return implode($default, $list).$last.$end;
            };
        }
        if (is_string($join)) {
            $glue = $join;
            $join = function ($list) use ($glue) {
                return implode($glue, $list);
            };
        }

        return [$syntax, $short, $parts, $options, $join, $aUnit];
    }

    /**
     * Get the current interval in a human readable format in the current locale.
     *
     * @example
     * ```
     * echo CarbonInterval::fromString('4d 3h 40m')->forHumans() . "\n";
     * echo CarbonInterval::fromString('4d 3h 40m')->forHumans(['parts' => 2]) . "\n";
     * echo CarbonInterval::fromString('4d 3h 40m')->forHumans(['parts' => 3, 'join' => true]) . "\n";
     * echo CarbonInterval::fromString('4d 3h 40m')->forHumans(['short' => true]) . "\n";
     * echo CarbonInterval::fromString('1d 24h')->forHumans(['join' => ' or ']) . "\n";
     * ```
     *
     * @param int|array $syntax  if array passed, parameters will be extracted from it, the array may contains:
     *                           - 'syntax' entry (see below)
     *                           - 'short' entry (see below)
     *                           - 'parts' entry (see below)
     *                           - 'options' entry (see below)
     *                           - 'aUnit' entry, prefer "an hour" over "1 hour" if true
     *                           - 'join' entry determines how to join multiple parts of the string
     *                           `  - if $join is a string, it's used as a joiner glue
     *                           `  - if $join is a callable/closure, it get the list of string and should return a string
     *                           `  - if $join is an array, the first item will be the default glue, and the second item
     *                           `    will be used instead of the glue for the last item
     *                           `  - if $join is true, it will be guessed from the locale ('list' translation file entry)
     *                           `  - if $join is missing, a space will be used as glue
     *                           if int passed, it add modifiers:
     *                           Possible values:
     *                           - CarbonInterface::DIFF_ABSOLUTE          no modifiers
     *                           - CarbonInterface::DIFF_RELATIVE_TO_NOW   add ago/from now modifier
     *                           - CarbonInterface::DIFF_RELATIVE_TO_OTHER add before/after modifier
     *                           Default value: CarbonInterface::DIFF_ABSOLUTE
     * @param bool      $short   displays short format of time units
     * @param int       $parts   maximum number of parts to display (default value: -1: no limits)
     * @param int       $options human diff options
     *
     * @return string
     */
    public function forHumans($syntax = null, $short = false, $parts = -1, $options = null)
    {
        [$syntax, $short, $parts, $options, $join, $aUnit] = $this->getForHumansParameters($syntax, $short, $parts, $options);

        $interval = [];
        $syntax = (int) ($syntax === null ? CarbonInterface::DIFF_ABSOLUTE : $syntax);
        $absolute = $syntax === CarbonInterface::DIFF_ABSOLUTE;
        $relativeToNow = $syntax === CarbonInterface::DIFF_RELATIVE_TO_NOW;
        $count = 1;
        $unit = $short ? 's' : 'second';

        /** @var \Symfony\Component\Translation\Translator $translator */
        $translator = $this->getLocalTranslator();

        $diffIntervalArray = [
            ['value' => $this->years,            'unit' => 'year',   'unitShort' => 'y'],
            ['value' => $this->months,           'unit' => 'month',  'unitShort' => 'm'],
            ['value' => $this->weeks,            'unit' => 'week',   'unitShort' => 'w'],
            ['value' => $this->daysExcludeWeeks, 'unit' => 'day',    'unitShort' => 'd'],
            ['value' => $this->hours,            'unit' => 'hour',   'unitShort' => 'h'],
            ['value' => $this->minutes,          'unit' => 'minute', 'unitShort' => 'min'],
            ['value' => $this->seconds,          'unit' => 'second', 'unitShort' => 's'],
        ];

        $transChoice = function ($short, $unitData) use ($translator, $aUnit) {
            $count = $unitData['value'];

            if ($short) {
                $result = $this->translate($unitData['unitShort'], [], $count, $translator);

                if ($result !== $unitData['unitShort']) {
                    return $result;
                }
            } elseif ($aUnit) {
                $key = 'a_'.$unitData['unit'];
                $result = $this->translate($key, [], $count, $translator);

                if ($result !== $key) {
                    return $result;
                }
            }

            return $this->translate($unitData['unit'], [], $count, $translator);
        };

        foreach ($diffIntervalArray as $diffIntervalData) {
            if ($diffIntervalData['value'] > 0) {
                $unit = $short ? $diffIntervalData['unitShort'] : $diffIntervalData['unit'];
                $count = $diffIntervalData['value'];
                $interval[] = $transChoice($short, $diffIntervalData);
            } elseif ($options & CarbonInterface::SEQUENTIAL_PARTS_ONLY && count($interval) > 0) {
                break;
            }

            // break the loop after we get the required number of parts in array
            if (count($interval) >= $parts) {
                break;
            }
        }

        if (count($interval) === 0) {
            if ($relativeToNow && $options & CarbonInterface::JUST_NOW) {
                $key = 'diff_now';
                $translation = $this->translate($key, [], null, $translator);
                if ($translation !== $key) {
                    return $translation;
                }
            }
            $count = $options & CarbonInterface::NO_ZERO_DIFF ? 1 : 0;
            $unit = $short ? 's' : 'second';
            $interval[] = $this->translate($unit, [], $count, $translator);
        }

        // join the interval parts by a space
        $time = $join($interval);

        unset($diffIntervalArray, $interval);

        if ($absolute) {
            return $time;
        }

        $isFuture = $this->invert === 1;

        $transId = $relativeToNow ? ($isFuture ? 'from_now' : 'ago') : ($isFuture ? 'after' : 'before');

        if ($parts === 1) {
            if ($relativeToNow && $unit === 'day') {
                if ($count === 1 && $options & CarbonInterface::ONE_DAY_WORDS) {
                    $key = $isFuture ? 'diff_tomorrow' : 'diff_yesterday';
                    $translation = $this->translate($key, [], null, $translator);
                    if ($translation !== $key) {
                        return $translation;
                    }
                }
                if ($count === 2 && $options & CarbonInterface::TWO_DAY_WORDS) {
                    $key = $isFuture ? 'diff_after_tomorrow' : 'diff_before_yesterday';
                    $translation = $this->translate($key, [], null, $translator);
                    if ($translation !== $key) {
                        return $translation;
                    }
                }
            }
            // Some languages have special pluralization for past and future tense.
            $key = $unit.'_'.$transId;
            if ($key !== $this->translate($key, [], null, $translator)) {
                $time = $this->translate($key, [], $count, $translator);
            }
        }

        return $this->translate($transId, [':time' => $time], null, $translator);
>>>>>>> dev
    }

    /**
     * Format the instance as a string using the forHumans() function.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->forHumans();
    }

    /**
     * Convert the interval to a CarbonPeriod.
     *
     * @return CarbonPeriod
     */
<<<<<<< HEAD
    public function toPeriod()
    {
        return CarbonPeriod::createFromArray(
            array_merge(array($this), func_get_args())
        );
=======
    public function toPeriod(...$params)
    {
        return CarbonPeriod::create($this, ...$params);
>>>>>>> dev
    }

    /**
     * Invert the interval.
     *
     * @return $this
     */
    public function invert()
    {
        $this->invert = $this->invert ? 0 : 1;

        return $this;
    }

<<<<<<< HEAD
    /**
     * Add the passed interval to the current instance.
     *
     * @param DateInterval $interval
     *
     * @return static
     */
    public function add(DateInterval $interval)
    {
        $sign = ($this->invert === 1) !== ($interval->invert === 1) ? -1 : 1;

        if (static::wasCreatedFromDiff($interval)) {
            $this->dayz += $interval->days * $sign;
        } else {
            $this->years += $interval->y * $sign;
            $this->months += $interval->m * $sign;
            $this->dayz += $interval->d * $sign;
            $this->hours += $interval->h * $sign;
            $this->minutes += $interval->i * $sign;
            $this->seconds += $interval->s * $sign;
        }

        if (($this->years || $this->months || $this->dayz || $this->hours || $this->minutes || $this->seconds) &&
            $this->years <= 0 && $this->months <= 0 && $this->dayz <= 0 && $this->hours <= 0 && $this->minutes <= 0 && $this->seconds <= 0
        ) {
            $this->years *= -1;
            $this->months *= -1;
            $this->dayz *= -1;
            $this->hours *= -1;
            $this->minutes *= -1;
            $this->seconds *= -1;
            $this->invert();
        }

=======
    protected function solveNegativeInterval()
    {
        if (!$this->isEmpty() && $this->years <= 0 && $this->months <= 0 && $this->dayz <= 0 && $this->hours <= 0 && $this->minutes <= 0 && $this->seconds <= 0 && $this->microseconds <= 0) {
            $this->years *= -1;
            $this->months *= -1;
            $this->dayz *= -1;
            $this->hours *= -1;
            $this->minutes *= -1;
            $this->seconds *= -1;
            $this->microseconds *= -1;
            $this->invert();
        }

        return $this;
    }

    /**
     * Add the passed interval to the current instance.
     *
     * @param string|DateInterval $unit
     * @param int                 $value
     *
     * @return static
     */
    public function add($unit, $value = 1)
    {
        if (is_numeric($unit)) {
            $_unit = $value;
            $value = $unit;
            $unit = $_unit;
            unset($_unit);
        }

        if (is_string($unit) && !preg_match('/^\s*\d/', $unit)) {
            $unit = "$value $unit";
            $value = 1;
        }

        $interval = static::make($unit);

        if (!$interval) {
            throw new InvalidArgumentException('This type of data cannot be added/subtracted.');
        }

        if ($value !== 1) {
            $interval->times($value);
        }
        $sign = ($this->invert === 1) !== ($interval->invert === 1) ? -1 : 1;
        $this->years += $interval->y * $sign;
        $this->months += $interval->m * $sign;
        $this->dayz += ($interval->days === false ? $interval->d : $interval->days) * $sign;
        $this->hours += $interval->h * $sign;
        $this->minutes += $interval->i * $sign;
        $this->seconds += $interval->s * $sign;
        $this->microseconds += $interval->microseconds * $sign;

        $this->solveNegativeInterval();

>>>>>>> dev
        return $this;
    }

    /**
<<<<<<< HEAD
     * Multiply current instance given number of times
     *
     * @param float $factor
=======
     * Subtract the passed interval to the current instance.
     *
     * @param string|DateInterval $unit
     * @param int                 $value
     *
     * @return static
     */
    public function sub($unit, $value = 1)
    {
        if (is_numeric($unit)) {
            $_unit = $value;
            $value = $unit;
            $unit = $_unit;
            unset($_unit);
        }

        return $this->add($unit, -floatval($value));
    }

    /**
     * Subtract the passed interval to the current instance.
     *
     * @param string|DateInterval $unit
     * @param int                 $value
     *
     * @return static
     */
    public function subtract($unit, $value = 1)
    {
        return $this->sub($unit, $value);
    }

    /**
     * Multiply current instance given number of times
     *
     * @param float|int $factor
>>>>>>> dev
     *
     * @return $this
     */
    public function times($factor)
    {
        if ($factor < 0) {
            $this->invert = $this->invert ? 0 : 1;
            $factor = -$factor;
        }

        $this->years = (int) round($this->years * $factor);
        $this->months = (int) round($this->months * $factor);
        $this->dayz = (int) round($this->dayz * $factor);
        $this->hours = (int) round($this->hours * $factor);
        $this->minutes = (int) round($this->minutes * $factor);
        $this->seconds = (int) round($this->seconds * $factor);
<<<<<<< HEAD
=======
        $this->microseconds = (int) round($this->microseconds * $factor);
>>>>>>> dev

        return $this;
    }

    /**
     * Get the interval_spec string of a date interval.
     *
     * @param DateInterval $interval
     *
     * @return string
     */
    public static function getDateIntervalSpec(DateInterval $interval)
    {
<<<<<<< HEAD
        $date = array_filter(array(
            static::PERIOD_YEARS => abs($interval->y),
            static::PERIOD_MONTHS => abs($interval->m),
            static::PERIOD_DAYS => abs($interval->d),
        ));

        $time = array_filter(array(
            static::PERIOD_HOURS => abs($interval->h),
            static::PERIOD_MINUTES => abs($interval->i),
            static::PERIOD_SECONDS => abs($interval->s),
        ));
=======
        $date = array_filter([
            static::PERIOD_YEARS => abs($interval->y),
            static::PERIOD_MONTHS => abs($interval->m),
            static::PERIOD_DAYS => abs($interval->d),
        ]);

        $time = array_filter([
            static::PERIOD_HOURS => abs($interval->h),
            static::PERIOD_MINUTES => abs($interval->i),
            static::PERIOD_SECONDS => abs($interval->s),
        ]);
>>>>>>> dev

        $specString = static::PERIOD_PREFIX;

        foreach ($date as $key => $value) {
            $specString .= $value.$key;
        }

        if (count($time) > 0) {
            $specString .= static::PERIOD_TIME_PREFIX;
            foreach ($time as $key => $value) {
                $specString .= $value.$key;
            }
        }

        return $specString === static::PERIOD_PREFIX ? 'PT0S' : $specString;
    }

    /**
     * Get the interval_spec string.
     *
     * @return string
     */
    public function spec()
    {
        return static::getDateIntervalSpec($this);
    }

    /**
     * Comparing 2 date intervals.
     *
     * @param DateInterval $a
     * @param DateInterval $b
     *
     * @return int
     */
    public static function compareDateIntervals(DateInterval $a, DateInterval $b)
    {
        $current = Carbon::now();
        $passed = $current->copy()->add($b);
        $current->add($a);

        if ($current < $passed) {
            return -1;
        }
        if ($current > $passed) {
            return 1;
        }

        return 0;
    }

    /**
     * Comparing with passed interval.
     *
     * @param DateInterval $interval
     *
     * @return int
     */
    public function compare(DateInterval $interval)
    {
        return static::compareDateIntervals($this, $interval);
    }

    /**
     * Convert overflowed values into bigger units.
     *
     * @return $this
     */
    public function cascade()
    {
<<<<<<< HEAD
        foreach (static::getFlipCascadeFactors() as $source => $cascade) {
            list($target, $factor) = $cascade;

=======
        foreach (static::getFlipCascadeFactors() as $source => [$target, $factor]) {
>>>>>>> dev
            if ($source === 'dayz' && $target === 'weeks') {
                continue;
            }

            $value = $this->$source;
<<<<<<< HEAD
            $this->$source = $modulo = $value % $factor;
            $this->$target += ($value - $modulo) / $factor;
        }

        return $this;
=======
            $this->$source = $modulo = ($factor + ($value % $factor)) % $factor;
            $this->$target += ($value - $modulo) / $factor;
            if ($this->$source > 0 && $this->$target < 0) {
                $this->$source -= $factor;
                $this->$target++;
            }
        }

        return $this->solveNegativeInterval();
>>>>>>> dev
    }

    /**
     * Get amount of given unit equivalent to the interval.
     *
     * @param string $unit
     *
     * @throws \InvalidArgumentException
     *
     * @return float
     */
    public function total($unit)
    {
        $realUnit = $unit = strtolower($unit);

<<<<<<< HEAD
        if (in_array($unit, array('days', 'weeks'))) {
            $realUnit = 'dayz';
        } elseif (!in_array($unit, array('seconds', 'minutes', 'hours', 'dayz', 'months', 'years'))) {
=======
        if (in_array($unit, ['days', 'weeks'])) {
            $realUnit = 'dayz';
        } elseif (!in_array($unit, ['microseconds', 'milliseconds', 'seconds', 'minutes', 'hours', 'dayz', 'months', 'years'])) {
>>>>>>> dev
            throw new InvalidArgumentException("Unknown unit '$unit'.");
        }

        $result = 0;
        $cumulativeFactor = 0;
        $unitFound = false;
<<<<<<< HEAD

        foreach (static::getFlipCascadeFactors() as $source => $cascade) {
            list($target, $factor) = $cascade;

            if ($source === $realUnit) {
                $unitFound = true;
                $result += $this->$source;
=======
        $factors = static::getFlipCascadeFactors();

        foreach ($factors as $source => [$target, $factor]) {
            if ($source === $realUnit) {
                $unitFound = true;
                $value = $this->$source;
                if ($source === 'microseconds' && isset($factors['milliseconds'])) {
                    $value %= Carbon::MICROSECONDS_PER_MILLISECOND;
                }
                $result += $value;
>>>>>>> dev
                $cumulativeFactor = 1;
            }

            if ($factor === false) {
                if ($unitFound) {
                    break;
                }

                $result = 0;
                $cumulativeFactor = 0;

                continue;
            }

            if ($target === $realUnit) {
                $unitFound = true;
            }

            if ($cumulativeFactor) {
                $cumulativeFactor *= $factor;
                $result += $this->$target * $cumulativeFactor;

                continue;
            }

<<<<<<< HEAD
            $result = ($result + $this->$source) / $factor;
=======
            $value = $this->$source;

            if ($source === 'microseconds' && isset($factors['milliseconds'])) {
                $value %= Carbon::MICROSECONDS_PER_MILLISECOND;
            }

            $result = ($result + $value) / $factor;
>>>>>>> dev
        }

        if (isset($target) && !$cumulativeFactor) {
            $result += $this->$target;
        }

        if (!$unitFound) {
            throw new \InvalidArgumentException("Unit $unit have no configuration to get total from other units.");
        }

        if ($unit === 'weeks') {
            return $result / static::getDaysPerWeek();
        }

        return $result;
    }
}
