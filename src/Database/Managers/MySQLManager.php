<?php

namespace Proton\Database\Managers;

use App\Models\Model;
use Proton\Database\Grammars\MySQLGrammar;
use Proton\Database\Managers\Contracts\DatabaseManager;

class MySQLManager implements DatabaseManager
{
  protected static $instance;
  
  public function connect(): \PDO 
  {
    if (!self::$instance) {
      self::$instance = new \PDO(env('DB_DRIVER') . ':host=' . env('DB_HOST') . ';dbname=' . env('DB_DATABASE'), env('DB_USERNAME'), env('DB_PASSWORD'));
    }
    
    return self::$instance;
  }
  
  public function create($data) 
  {
    if (self::$instance === null) {
      self::$instance = $this->connect();
     }

    $query = MySQLGrammar::buildInsertQuery(array_keys($data));
    $stm = self::$instance->prepare($query);
    
    for ($i=1; $i <= count($values = array_values($data)) ; $i++) { 
      $stm->bindValue($i, $values[$i - 1]);
    }

    return $stm->execute();
  }
  
  public function query(string $query, $values = [])
  {
    if (self::$instance === null) {
      self::$instance = $this->connect();
     }
      $stm = self::$instance->prepare($query);
      
      for ($i=1; $i <= count($values); $i++) {
        $stm->bindValue($i,$values[$i - 1]);
      }
  
      $stm->execute();
  
      return $stm->fetchAll(\PDO::FETCH_ASSOC);
   
  }
  
  public function read($columns = '*', $filter = null)
  {
    if (self::$instance === null) {
      self::$instance = $this->connect();
     }

     $query = MySQLGrammar::buildSelectQuery($columns, $filter);
    
     $stm = self::$instance->prepare($query);

     if ($filter) {
       $stm->bindValue(1,$filter[2]);
     }
     $stm->execute();

     return $stm->fetchAll(\PDO::FETCH_CLASS,Model::getModel());
 }
  
  public function update($id, $data)
  {
    if (self::$instance === null) {
      self::$instance = $this->connect();
     }
    
     $query = MySQLGrammar::buildUpdateQuery(array_keys($data));
     $stm = self::$instance->prepare($query);

     for ($i=1; $i <= count($values = array_values($data)); $i++) {
      $stm->bindValue($i,$values[$i - 1]);
      if ($i == count($values)) {
        $stm->bindValue($i+1, $id);
      }
    }

    return $stm->execute();
  }
  
  public function delete($id)
  {
    if (self::$instance === null) {
      self::$instance = $this->connect();
     }

    $query = MySQLGrammar::buildDeleteQuery();

    $stm = self::$instance->prepare($query);

    $stm->bindValue(1,$id);
     
    return $stm->execute();
  }
  
  public function disconnect(): void
	{
		$this->connect = null;
	}
}