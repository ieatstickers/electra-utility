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
      return Mutate::carbonToDateString($carbon);
    };
  }

  /** @return callable */
  public static function dateStringToCarbon(): callable
  {
    return function($dateString)
    {
      return Mutate::dateStringToCarbon($dateString);
    };
  }

  /** @return callable */
  public static function carbonToDateTimeString(): callable
  {
    return function($carbon)
    {
      return Mutate::carbonToDateTimeString($carbon);
    };
  }

  /** @return callable */
  public static function dateTimeStringToCarbon(): callable
  {
    return function($dateTime)
    {
      return Mutate::dateTimeStringToCarbon($dateTime);
    };
  }

  /**
   * @param string $enumFqns
   * @return callable
   */
  public static function toEnumInstance(string $enumFqns): callable
  {
    return function ($value) use ($enumFqns) {
      return Mutate::toEnumInstance($enumFqns, $value);
    };
  }

  /** @return callable */
  public static function toEnumValue(): callable
  {
    return function($enumInstance)
    {
      return Mutate::toEnumValue($enumInstance);
    };
  }

  /** @return callable */
  public static function arrayToJsonString(): callable
  {
    return function($array)
    {
      return Mutate::arrayToJsonString($array);
    };
  }

  /** @return callable */
  public static function jsonStringToArray(): callable
  {
    return function($jsonString)
    {
      return Mutate::jsonStringToArray($jsonString);
    };
  }

}
