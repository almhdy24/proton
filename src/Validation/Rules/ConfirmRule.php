<?php

namespace Proton\Validation\Rules;

use Proton\Validation\Rules\Contract\Rule;

class ConfirmRule implements Rule
{
  public function apply($field, $value, $data = [])
  {
    return ($data[$field] === $data[$field . '_confirmation']);
  }
  
  public function __toString()
  {
    return "%s does not match %s confirmation";
  }
}