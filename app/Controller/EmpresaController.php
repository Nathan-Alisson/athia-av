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
      $empresa->razao_social = $_POST['razao_social'];
      $empresa->nome_fantasia = $_POST['nome_fantasia'];
      $empresa->cnpj = $_POST['cnpj'];

      $this->empresaDAO->createCompany($empresa);
      header('Location: /empresa');
      exit;
    }

    $this->renderView('empresa/create');
  }

  public function edit($id) {
    $empresa = $this->empresaDAO->searchCompanyById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $empresa->razao_social = $_POST['razao_social'];
      $empresa->nome_fantasia = $_POST['nome_fantasia'];
      $empresa->cnpj = $_POST['cnpj'];

      $this->empresaDAO->updateCompany($empresa);
      header('Location: /empresa');
      exit;
    }

    $this->renderView('empresa/edit', ['empresa' => $empresa]);
  }

  public function delete($id) {
    $this->empresaDAO->deleteCompany($id);
    header('Location: /empresa');
    exit;
  }
}