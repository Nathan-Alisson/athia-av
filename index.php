<?php
require 'vendor/autoload.php';

use App\Controller\EmpresaController;

try {
  $pdo = new PDO("mysql:host=localhost;dbname=athia", "user", "user123");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  
}

$controller = new EmpresaController($pdo);

$path = isset($_GET['path']) ? $_GET['path'] : '/';

switch ($path) {
  case 'empresas':
    $controller->index();
    break;
  case 'empresas/create':
    $controller->create();
    break;
  case (preg_match('/\/empresas\/edit\/(\d+)/', $path, $matches) ? true : false):
    $controller->edit($matches[1]);
    break;
  case (preg_match('/\/empresas\/delete\/(\d+)/', $path, $matches) ? true : false):
    $controller->delete($matches[1]);
    break;
  default:
    echo "Página não encontrada";
    break;
}
