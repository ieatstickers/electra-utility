<?php

namespace Electra\Utility;

use Carbon\Carbon;

class Mutate
{
  /**
   * @param $carbon
   *
   * @return string
   */
  public static function carbonToDateString($carbon)
  {
    if ($carbon instanceof Carbon)
    {
      return $carbon->toDateString();
    }

    return $carbon;
  }

  /**
   * @param $dateString
   *
   * @return Carbon
   * @throws \Exception
   */
  public static function dateStringToCarbon($dateString)
  {
    if (!$dateString) return null;
    if ($dateString instanceof Carbon) return $dateString;
    return new Carbon($dateString);
  }

  /**
   * @param $carbon
   *
   * @return string
   */
  public static function carbonToDateTimeString($carbon)
  {
    if ($carbon instanceof Carbon)
    {
      return $carbon->toDateTimeString();
    }

    return $carbon;
  }

  /**
   * @param $dateTime
   *
   * @return Carbon|null
   * @throws \Exception
   */
  public static function dateTimeStringToCarbon($dateTime)
  {
    if (!$dateTime) return null;
    if ($dateTime instanceof Carbon) return $dateTime;
    return new Carbon($dateTime);
  }

  /**
   * @param string $enumFqns
   * @param        $value
   *
   * @return mixed|null
   */
  public static function toEnumInstance(string $enumFqns, $value)
  {
    if (is_a($value, $enumFqns) || is_null($value)) return $value;
    return call_user_func("{$enumFqns}::create()", $value);
  }

  /**
   * @param $enumInstance
   *
   * @return mixed
   */
  public static function toEnumValue($enumInstance)
  {
    if (method_exists($enumInstance, 'getValue'))
    {
      return $enumInstance->getValue();
    }

    return $enumInstance;
  }

}
