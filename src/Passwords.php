<?php

namespace Electra\Utility;

class Passwords
{
  /**
   * @param string $password
   * @return string
   */
  public static function hashPassword(string $password): string
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  /**
   * @param string $password
   * @param string $hash
   * @return bool
   */
  public static function verifyPassword(string $password, string $hash): bool
  {
    return password_verify($password, $hash);
  }
}