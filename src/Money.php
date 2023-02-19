<?php

namespace Electra\Utility;

class Money
{
  /**
   * @param float $value
   * @return string
   */
  public static function getFormattedPrice(float $value): string
  {
    if ($value < 0)
    {
      $formattedValue = number_format($value * -1, 2);
      return "-£$formattedValue";
    }

    $formattedValue = number_format($value, 2);
    return "£$formattedValue";
  }
}
