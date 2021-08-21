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
    $formattedValue = number_format($value, 2);
    return "£$formattedValue";
  }
}
