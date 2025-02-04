<?php
namespace app\Core;

class Router {
  private $routes = [];

  public function addRoute($method, $path, $controllerAction) {
    $path = "#^/?{$path}$#";
    $this->routes[] = ['method' => $method, 'path' => $path, 'controllerAction' => $controllerAction];
  }

  public function handleRequest($path, $method = 'GET') {
    foreach ($this->routes as $route) {
      if ($route['method'] === $method && preg_match($route['path'], $path, $matches)) {
        array_shift($matches); 
        call_user_func_array($route['controllerAction'], $matches);
        return;
      }
    }

    $this->render404();
  }

  private function render404() {
    require VIEW_PATH . '404.php';  // Exibe a página 404
  }
}
