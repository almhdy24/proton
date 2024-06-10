<?php

namespace Proton\Support;


class Hash
{
  public static function password($value)
  {
    return password_hash($value, PASSWORD_BCRYPT);
  }
  
  public static function make($value)
  {
    return sha1($value . time()); 
  }
  
  public static function verify($value, $hashValue)
  {
    return password_verify($value, $hashValue);
  }
}


