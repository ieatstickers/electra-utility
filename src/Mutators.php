<?php

namespace Electra\Utility;

use Carbon\Carbon;

class Mutators
{
  /** @return callable */
  public static function carbonToDateString(): callable
  {
    return function($carbon)
    {
      if ($carbon instanceof Carbon)
      {
        return $carbon->toDateString();
      }

      return $carbon;
    };
  }

  /** @return callable */
  public static function dateStringToCarbon(): callable
  {
    return function($dateString)
    {
      if ($dateString instanceof Carbon || is_null($dateString)) return $dateString;
      return new Carbon($dateString);
    };
  }

  /** @return callable */
  public static function carbonToDateTimeString(): callable
  {
    return function($carbon)
    {
      if ($carbon instanceof Carbon)
      {
        return $carbon->toDateTimeString();
      }

      return $carbon;
    };
  }

  /** @return callable */
  public static function dateTimeStringToCarbon(): callable
  {
    return function($dateTime)
    {
      if (!$dateTime) return null;
      if ($dateTime instanceof Carbon) return $dateTime;
      return new Carbon($dateTime);
    };
  }

  /**
   * @param string $enumFqns
   * @return callable
   */
  public static function toEnumInstance(string $enumFqns): callable
  {
    return function ($value) use ($enumFqns) {
      if (is_a($value, $enumFqns) || is_null($value)) return $value;
      return call_user_func("{$enumFqns}::create()", $value);
    };
  }

  /** @return callable */
  public static function toEnumValue(): callable
  {
    return function($enumInstance)
    {
      if (method_exists($enumInstance, 'getValue'))
      {
        return $enumInstance->getValue();
      }

      return $enumInstance;
    };
  }

}