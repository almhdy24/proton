<?php

namespace Proton;

use Proton\Http\Route;
use Proton\Http\Request;
use Proton\Support\Config;
use Proton\Http\Response;
use Proton\Database\DB;
use Proton\Database\Grammars\MySQLGrammar;
use Proton\Database\Managers\MySQLManager;
use Proton\Database\Managers\SQLiteManager;
use Proton\Support\Session;

class Application 
{
  protected Route $routes;
  protected Request $request;
  protected Response $response;
  protected Session $session;
  protected Config $config;
  protected DB $db;
  
  public function __construct()
  {
    $this->request = new Request;
    $this->response = new Response;
    $this->session = new Session;
    $this->routes = new Route($this->request, $this->response);
    $this->config = new Config($this->loadConfigurations());
    $this->db = new DB($this->getDatabaseDriver());
  }

  protected function getDatabaseDriver()
  {
    return match(env('DB_DRIVER')) {
       'mysql' => new MySQLManager,
       'sqlite' => new SQLiteManager,
       default => new MySQLManager,
    };
  }
  
  protected function loadConfigurations()
{
    foreach (scandir(config_path()) as $file) {
        if ($file == '.' || $file == '..') {
            continue;
        }
        $fileName = explode('.',$file)[0];
        yield $fileName => require config_path() . $file;
    }
}

  public function run()
  {
    $this->db->init();
    $this->routes->resolve();
  }
  
  public function __get($name)
  {
    if(property_exists($this, $name)) {
      return $this->$name;
    }
  }
}