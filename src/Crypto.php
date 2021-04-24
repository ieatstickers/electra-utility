<?php

namespace Electra\Utility;

class Crypto
{
  /**
   * @param string $string
   *
   * @return string
   */
  public static function sha1(string $string): string
  {
    return sha1($string);
  }
}
