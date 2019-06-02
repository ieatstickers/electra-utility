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
    return array_pop(explode('\\', $fqns));
  }

}