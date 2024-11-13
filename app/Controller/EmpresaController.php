<?php
namespace App\Controller;

use App\Model\Empresa;
use App\DAO\EmpresaDAO;
use App\DAO\SetorDAO;

class EmpresaController extends BaseController {
  private $empresaDAO;
  private $setorDAO;

  public function __construct($pdo) {
    $this->empresaDAO = new EmpresaDAO($pdo);
    $this->setorDAO = new SetorDAO($pdo);
  }

  public function index() {
    $empresas = $this->empresaDAO->getAll();
    $this->renderView('empresa/index', ['empresas' => $empresas]);
  }

  public function create() {
    $setores = $this->setorDAO->getAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $empresa = new Empresa(null, $_POST['razao_social'], $_POST['nome_fantasia'], $_POST['cnpj']);
      $this->empresaDAO->create($empresa);

      $setores = $_POST['setores'] ?? [];
      foreach ($setores as $setor_id) {
        $this->empresaDAO->addSetor($empresa, $setor_id);
      }

      header('Location: /empresa');
      exit;
    }

    $this->renderView('empresa/create', [
      'setores' => $setores
    ]);
  }

  public function edit($id) {
    $empresa = $this->empresaDAO->getById($id);
    $setores = $this->setorDAO->getAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $setores = $_POST['setores'] ?? [];
      foreach ($setores as $setor_id) {
        $this->empresaDAO->addSetor($empresa, $setor_id);
      }

      $this->empresaDAO->update($empresa);
      header('Location: /empresa');
      exit;
    }

    $this->renderView('empresa/edit', [
      'empresa' => $empresa,
      'setores' => $setores,
    ]);
  }

  public function delete($id) {
    $this->empresaDAO->delete($id);
    header('Location: /empresa');
    exit;
  }

  public function report() {
    $setores = $this->setorDAO->getAll();

    $setorId = isset($_GET['setor']) ? $_GET['setor'] : null;

    if ($setorId) {
      $empresas = $this->empresaDAO->getBySetor($setorId);
    } else {
      $empresas = $this->empresaDAO->getAllWithSetores();
    }

    $this->renderView('empresa/report', [
      'empresas' => $empresas,
      'setores' => $setores,
      'selectedSetor' => $setorId
    ]);
  }
}