<?php

namespace Electra\Utility;

class Classes
{
  /**
   * @param string $fqns
   * @return string
   */
  public static function getClassName(string $fqns): string
  {
    $fqnsParts = explode('\\', $fqns);
    return array_pop($fqnsParts);
  }

}