<?php

namespace Electra\Utility;

use Carbon\Carbon;

class Mutators
{
  /**
   * @param string $dateTime
   * @return Carbon
   * @throws \Exception
   */
  public static function dateTimeToCarbon(string $dateTime): Carbon
  {
    if ($dateTime instanceof Carbon) return $dateTime;
    return new Carbon($dateTime);
  }

  /**
   * @param Carbon $carbon
   * @return Carbon
   * @throws \Exception
   */
  public static function carbonToDateTime(Carbon $carbon): string
  {
    if ($carbon instanceof Carbon) return $carbon;
    return new Carbon($carbon);
  }

}