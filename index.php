<?php
require 'vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/app/View/');

use App\Controller\EmpresaController;

try {
  $pdo = new PDO("mysql:host=localhost;dbname=athia", "user", "user123");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erro na conexão com o banco de dados: " . $e->getMessage();
  exit; // Finaliza o script caso a conexão falhe
}


$controller = new EmpresaController($pdo);

$path = isset($_GET['path']) ? $_GET['path'] : '/';

switch ($path) {
  case '/':
    echo "Bem-vindo à página inicial!";
    break;
  case 'empresa':
    $controller->index();
    break;
  case 'empresa/create':
    $controller->create();
    break;
  case (preg_match('/^empresa\/edit\/(\d+)$/', $path, $matches) ? true : false):
    $id = $matches[1] ?? null;
    if ($id !== null) {
      $controller->edit($id);
    } else {
      echo "ID inválido para edição";
    }
    break;
  case (preg_match('/^empresa\/delete\/(\d+)$/', $path, $matches) ? true : false):
    $id = $matches[1] ?? null;
    if ($id !== null) {
      $controller->delete($id);
    } else {
      echo "ID inválido para exclusão";
    }
    break;
  default:
    echo "Página não encontrada";
    break;
}
