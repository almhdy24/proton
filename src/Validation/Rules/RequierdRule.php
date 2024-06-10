<?php

namespace Proton\Validation\Rules;

use Proton\Validation\Rules\Contract\Rule;

class RequierdRule implements Rule
{
  public function apply($field, $value, $data = [])
  {
    return !empty($value);
  }
  
  public function __toString()
  {
    return '%s is requier and canoot be empty';
  }
}