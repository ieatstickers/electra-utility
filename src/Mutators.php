<?php

namespace Electra\Utility;

use Carbon\Carbon;

class Mutators
{
  /** @return callable */
  public static function dateToCarbon(): callable
  {
    return function($date)
    {
      if ($date instanceof Carbon || is_null($date)) return $date;
      return new Carbon($date);
    };
  }

  /** @return callable */
  public static function dateTimeToCarbon(): callable
  {
    return function($dateTime)
    {
      if ($dateTime instanceof Carbon || is_null($dateTime)) return $dateTime;
      return new Carbon($dateTime);
    };
  }

  /** @return callable */
  public static function carbonToDateTime(): callable
  {
    return function($carbon) {
      if ($carbon instanceof Carbon || is_null($carbon)) return $carbon;
      return new Carbon($carbon);
    };

  }

}