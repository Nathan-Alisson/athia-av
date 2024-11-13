<?php
require 'vendor/autoload.php';

use App\Core\Router;
use App\Controller\HomeController;
use App\Controller\EmpresaController;
use App\Controller\SetorController;

define('VIEW_PATH', __DIR__ . '/app/View/');

try {
  $pdo = new PDO("mysql:host=localhost;dbname=athia", "user", "user123");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erro na conexão com o banco de dados: " . $e->getMessage();
  exit;
}

$router = new Router();

$router->addRoute('GET', '/', [new HomeController(), 'index']);
$router->addRoute('GET', '/empresa', [new EmpresaController($pdo), 'index']);
$router->addRoute('GET', '/empresa/create', [new EmpresaController($pdo), 'create']);
$router->addRoute('POST', '/empresa/create', [new EmpresaController($pdo), 'create']);
$router->addRoute('GET', '/empresa/edit/(\d+)', [new EmpresaController($pdo), 'edit']);
$router->addRoute('POST', '/empresa/edit/(\d+)', [new EmpresaController($pdo), 'edit']);
$router->addRoute('GET', '/empresa/delete/(\d+)', [new EmpresaController($pdo), 'delete']);
$router->addRoute('GET', '/relatorio', [new EmpresaController($pdo), 'report']);

$router->addRoute('GET', '/setor', [new SetorController($pdo), 'index']);
$router->addRoute('GET', '/setor/create', [new SetorController($pdo), 'create']);
$router->addRoute('POST', '/setor/create', [new SetorController($pdo), 'create']);
$router->addRoute('GET', '/setor/delete/(\d+)', [new SetorController($pdo), 'delete']);

$path = isset($_GET['path']) ? '/' . ltrim($_GET['path'], '/') : '/';
$method = $_SERVER['REQUEST_METHOD'];

$router->handleRequest($path, $method);