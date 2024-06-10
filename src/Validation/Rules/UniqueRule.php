<?php

namespace Proton\Validation\Rules;

use Proton\Validation\Rules\Contract\Rule;


class UniqueRule implements Rule
{
  protected $table;
  protected $column;
  
  public function __construct($table, $column)
  {
    $this->table = $table;
    $this->column = $column;
  }
  
  public function apply($field, $value, $data)
  {
    return (app()->db->raw("SELECTE * from {$this->table} WHER {$this->column} = ? "), [$value]);
  }
  
  public function __toString()
  {
    return "this %s already taken";
  }
}