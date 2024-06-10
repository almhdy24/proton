<?php

namespace Proton\Http;

use Symfony\Component\VarDumper\VarDumper;

class Response 
{
  public function setStautsCode(int $code)
  {
    http_response_code($code);
  }
  
  public function back()
  {
    header("location:" . $_SERVER['HTTP_REFERER']);

    return $this;
  }
}