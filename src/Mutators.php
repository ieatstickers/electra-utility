<?php

namespace Electra\Utility;

use Carbon\Carbon;

class Mutators
{
  /** @return callable */
  public static function carbonToDateString(): callable
  {
    return function($carbon) {
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
      if ($dateTime instanceof Carbon || is_null($dateTime)) return $dateTime;
      return new Carbon($dateTime);
    };
  }

}