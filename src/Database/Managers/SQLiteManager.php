<?php

namespace Proton\Database\Managers\Contracts;

use Proton\Database\Managers\Contracts\DatabaseManager;

class SQLiteManager implements DatabaseManager
{
  protected static $instance;
  
  public function connect() :\PDO
  {
    if (!self::$instance) {
      self::$instance = new \PDO(env('DB_DRIVER') . ':' . database_path() . 'database.sqlit');
    }
    
    return self::$instance;
  }
  
  public function raw(string $query)
  {
    throw new \Excepttion('Method raw() is not implemented.');
  }
  
  public function create(mixed $data)
  {
    throw new \Excepttion('Method create() is not implemented.');
  }
  
  public function read($columns = '*', $filter = null)
  {
    throw new \Excepttion('Method read() is not implemented.');
  }
  
  public function update($columns, mixed $data)
  {
    throw new \Excepttion('Method update() is not implemented.');
  }
  
  public function delete($clause)
  {
    throw new \Exception('Method delete() is not implemented.');
  }
}