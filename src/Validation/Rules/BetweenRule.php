<?php

namespace Proton\Validation\Rules;

use Proton\Validation\Rules\Contract\Rule;

class BetweenRule implements Rule
{
  protected int $max;
  protected int $min;
  public function __construct(int $max, int $min)
  {
    $this->max = $max;
    $this->min = $min;
  }
  
  public function apply($field, $value, $data = [])
  {
    if (strlen($value) < $this->min) {
      return false;
    }
    if (strlen($value) > $this->max) {
      return false;
    }
    
    return true;
  }
  
  public function __toString()
  {
    return "%s must be between lass then {$this->min} and {$this->max}";
  }
}