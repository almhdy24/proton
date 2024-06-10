<?php

namespace Proton\Database\Connects;

use Proton\Database\Managers\Contracts\DatabaseManager;

class ConnectsTo 
{
  public static function connect(DatabaseManager $manager)
  {
    return $manager->connect();
  }
}