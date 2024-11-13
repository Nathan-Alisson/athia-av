<?php
require 'vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/app/View/');

use App\Controller\EmpresaController;
use App\Controller\HomeController;

try {
  $pdo = new PDO("mysql:host=localhost;dbname=athia", "user", "user123");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erro na conexão com o banco de dados: " . $e->getMessage();
  exit;
}

$homeController = new HomeController();
$empresaController = new EmpresaController($pdo);

$path = isset($_GET['path']) ? $_GET['path'] : '/';

switch ($path) {
  case '/':
    $homeController->index();
    break;
  case 'empresa':
    $empresaController->index();
    break;
  case 'empresa/create':
    $empresaController->create();
    break;
  case (preg_match('/^empresa\/edit\/(\d+)$/', $path, $matches) ? true : false):
    $id = $matches[1] ?? null;
    if ($id !== null) {
      $empresaController->edit($id);
    } else {
      echo "ID inválido para edição";
    }
    break;
  case (preg_match('/^empresa\/delete\/(\d+)$/', $path, $matches) ? true : false):
    $id = $matches[1] ?? null;
    if ($id !== null) {
      $empresaController->delete($id);
    } else {
      echo "ID inválido para exclusão";
    }
    break;
  default:
    echo "Página não encontrada";
    break;
}
