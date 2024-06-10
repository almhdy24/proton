<?php

namespace Proton\Http;

use Proton\Support\Arr;

class Request 
{
  public function method()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }
  
  public function path()
  {
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $position = strpos($path, '?');
    if ($position === false) {
      return $path;
    }
    
    return substr($path, 0,$position);
  }

  public function all()
  {
    return $_REQUEST;
  }

  public function only($keys)
  {
    return Arr::only($this->all(),$keys);
  }

  public function get($key)
  {
    return Arr::get($this->all(),$key);
  }
}