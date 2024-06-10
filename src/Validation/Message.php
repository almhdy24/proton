<?php

namespace Proton\Validation;

class Message 
{
  public static function generaet($rule, $field)
  {
    return str_replace('%s', $field, $rule);
  } 
}