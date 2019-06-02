<?php

namespace Electra\Utility;

class Arrays
{
  /**
   * @param string $key
   * @param array $array
   * @param null $default
   * @return mixed|null
   */
  public static function getByKey(string $key, array $array, $default = null)
  {
    return isset($array[$key]) ? $array[$key] : $default;
  }

  /**
   * @param array $array
   * @return array
   */
  public static function getKeys(array $array): array
  {
    return array_keys($array);
  }
}