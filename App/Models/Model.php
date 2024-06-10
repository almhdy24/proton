<?php

namespace App\Models;

use SetTheater\Support\Str; 

abstract class Model 
{
  protected static $instance;
  
  public static function create(array $data)
  {
    self::$instance = static::class;
    
    return app()->db->create($data);
  }
  
  public static function all()
  {
    self::$instance = static::class;
    
    return app()->db->read();
  }
  
  public static function update($id,$data) 
  {
    self::$instance = static::class;

    return app()->db->update($id,$data);
  }

  public static function delete($id)
  {
    self::$instance = static::class;

    return app()->db->delete($id);
  }
  
  public static function whare($filter, $columns = '*')
  {
    self::$instance = static::class;
    
    return app()->db->read($columns, $filter);
  }
  
  public static function getModel()
  {
    return self::$instance;
  }
  
  public static function getTableName()
  {
    return Str::lower(Str::plural(class_basename(self::$instance)));
  }
}