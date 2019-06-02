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
   * @param string $keyPath
   * @param array $array
   * @param string $keyPathDelimiter
   * @param mixed|null $default
   * @return mixed|null
   */
  public static function getByKeyPath(
    string $keyPath,
    array $array,
    string $keyPathDelimiter = ':',
    $default = null
  )
  {
    $keyPathArray = explode($keyPathDelimiter, $keyPath);

    foreach ($keyPathArray as $key)
    {
      array_shift($keyPathArray);

      if (isset($array[$key]))
      {
        // Search finished
        if (empty($keyPathArray))
        {
          // Search finished
          if (!isset($array[$key]))
          {
            return $default;
          }

          return $array[$key];
        }
        else
        {
          return self::getByKeyPath(implode($keyPathDelimiter, $keyPathArray), $array[$key]);
        }
      }
      else
      {
        return $default;
      }
    }

    return $default;
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