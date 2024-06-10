<?php

namespace Proton\Validation\Rules;

use Proton\Validation\Rules\Contract\Rule;

class AlphaNumeircalRule implements Rule
{
  public function apply($field, $value, $data)
  {
    return preg_match('/^[a-zA-Z0-9_ -]+$/', $value); 
  }
    
  public function __toString()
  {
    return '%s must be charcters and number only';
  }
}