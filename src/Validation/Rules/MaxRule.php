<?php

namespace Proton\Validation\Rules;

use Proton\Validation\Rules\Contract\Rule;


class MaxRule implements Rule
{
  protected int $max;
  
  public function __construct(int $max)
  {
    $this->max = $max;
  }
  
  public function apply($field, $value, $data = [])
  {
    return (strlen($value) < $this->max);
  }
  
  public function __toString()
  {
    return "%s must be lass then {$this->max}";
  }
  
}