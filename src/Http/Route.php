<?php

namespace Proton\Http;

use Proton\Http\Response;
use Proton\Http\Request;
use Proton\View\View;

class Route 
{
  
  protected Request $request;
  protected Response $response;
  
  public function __construct(Request $request,Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }
  
  
  protected static array $routes = [];
  
  public static function get($path,$action)
  {
    self::$routes['get'][$path] = $action;
  }
  
  public static function post($path,$action)
  {
    self::$routes['post'][$path] = $action;
  }
  
  public static function put($path, $action)
 {
   self::$routes['put'][$path] = $action;
 }
 
 public static function delete($path, $action)
 {
   self::$routes['delete'][$path] = $action;
 }
  
public function resolve()
{
    $path = $this->request->path();
    $method = $this->request->method();

    // Check if the route exists for the given method and path
    if (array_key_exists($method, self::$routes) && array_key_exists($path, self::$routes[$method])) {
        $action = self::$routes[$method][$path];

        if (is_string($action)) {
            return call_user_func_array ($action);
        }

        if (is_callable($action)) {
            return call_user_func_array($action, []);
        }

        if (is_array($action)) {
            return call_user_func_array([new $action[0], $action[1]], []);
        }
    } else {
        // Route not found, set the response status code to 404 and render the '_404' view
        $this->response->setStautsCode(404);
         View::makeError('_404');
        return $this->response;
    }
}
  
}