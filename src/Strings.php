<?php

namespace Electra\Utility;

class Strings
{
  /**
   * @param string $string
   * @param string $startsWith
   * @return bool
   */
  public static function startsWith(string $string, string $startsWith): bool
  {
    return (substr($string, 0, strlen($startsWith)) === $startsWith);
  }

  /**
   * @param string $string
   * @param string $endsWith
   * @return bool
   */
  public static function endsWith(string $string, string $endsWith): bool
  {
    $len = strlen($endsWith);

    if ($len == 0)
    {
      return true;
    }
    return (substr($string, -$len) === $endsWith);
  }

  /**
   * @param string $string
   * @param array $replacements
   * @return string
   *
   */
  public static function replace(string $string, array $replacements): string
  {
    foreach ($replacements as $placeholder => $replacement)
    {
      $string = preg_replace("/$placeholder/", $replacement, $string);
    }

    return $string;
  }

}