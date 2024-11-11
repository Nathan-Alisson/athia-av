<?php
namespace App\Controller;

use App\Model\Empresa;
use App\DAO\EmpresaDAO;

class EmpresaController extends BaseController {
  private $empresaDAO;

  public function __construct($pdo) {
    $this->empresaDAO = new EmpresaDAO($pdo);
  }

  public function index() {
    $empresas = $this->empresaDAO->listCompanies();
    $this->renderView('empresa/index', ['empresas' => $empresas]);
  }

  public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $empresa = new Empresa();
      $empresa->nome = $_POST['nome'];
      $empresa->cnpj = $_POST['cnpj'];
      $empresa->endereco = $_POST['endereco'];
      $empresa->telefone = $_POST['telefone'];

      $this->empresaDAO->createCompany($empresa);
      header('Location: /empresas');
      exit;
    }

    $this->renderView('empresa/create');
  }

  public function edit($id) {
    $empresa = $this->empresaDAO->searchCompanyById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $empresa->nome = $_POST['nome'];
      $empresa->cnpj = $_POST['cnpj'];
      $empresa->endereco = $_POST['endereco'];
      $empresa->telefone = $_POST['telefone'];

      $this->empresaDAO->updateCompany($empresa);
      header('Location: /empresas');
      exit;
    }

    $this->renderView('empresa/edit', ['empresa' => $empresa]);
  }

  public function delete($id) {
    $this->empresaDAO->deleteCompany($id);
    header('Location: /empresas');
    exit;
  }
}