<?php

namespace Proton\Validation;

use Proton\Validation\ErrorBag;
use Proton\Validation\Message;
use Proton\Validation\RulesMap;
use Proton\Validation\Resolver;
use Proton\Validation\Rules\Contract\Rule;


class Validator 
{
  protected array $data = [];
  protected array $rules = [];
  protected array $aliases = [];
  protected ErrorBag $errorBag;
  
  
  public function make($data)
  {
    $this->data = $data;
    $this->errorBag = new ErrorBag();
    $this->validate();
  }
  
  protected function validate()
  {
    foreach ($this->rules as $field => $rules)
    {
      foreach (Resolver::make($rules) as $rule) {
       return $this->applyRule($field, $rule);
      }
    }
  }
  
  public function applyRule($field, Rule $rule)
  {
     if (!$rule->apply($field, $this->getFieldValue($field), $this->data)){
         $this->errorBag->add($field, Message::generaet($rule, $this->alias($field)));
        }
  }
  
  public function getFieldValue($field)
  {
    return $this->data[$field] ?? null;
  }
  
  public function setRules($rules)
  {
    $this->rules = $rules;
  } 
  
  public function passes()
  {
    return empty($this->errors());
  }
  
  public function errors($key = null)
  {
    return $key ? $this->errorBag->errors[$key] : $this->errorBag->errors;
  }
  
  public function alias($field)
  {
    return $this->aliases[$field] ?? $field;
  }
  
  public function setAliases(array $aliases)
  {
    $this->aliases = $aliases;
  }
}