<?php

namespace Proton\Validation;

use Proton\Validation\Rules\Contract\Rule;
use Proton\Validation\RulesMap;


class Resolver 
{
  public static function make($rules)
  {
    $rules = (array) (str_contains($rules, '|') ? explode('|', $rules) : $rules); 
     if (is_string($rules)) {
       return static::getRuleFromString($rules);
     }
    
    return array_map(function ($rule) {
      if (is_string($rule)) {
         return static::getRuleFromString($rule);
        } 
        return $rule;
    }, $rules);
  }
  
  public static function getRuleFromString(string $rule)
  {
    
    $exploded = explode(':', $rule);
    $rule = $exploded[0];
    $options = explode(',', end($exploded));
    
    return RulesMap::resolve($rule, $options);
  }
}