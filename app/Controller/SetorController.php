<?php
namespace App\Controller;

use App\Model\Setor;
use App\DAO\SetorDAO;

class SetorController extends BaseController {
  private $setorDAO;

  public function __construct($pdo) {
    $this->setorDAO = new SetorDAO($pdo);
  }

  public function index() {
    $setors = $this->setorDAO->getAll();
    $this->renderView('setor/index', ['setors' => $setors]);
  }

  public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $setor = new Setor(null, $_POST['descricao']);
      $this->setorDAO->create($setor);

      header('Location: /setor');
      exit;
    }

    $this->renderView('setor/create');
  }

  public function edit($id) {
    $setor = $this->setorDAO->getById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $setor->setDescricao($_POST['descricao']);

      $this->setorDAO->update($setor);
      header('Location: /setor');
      exit;
    }

    $this->renderView('setor/edit', ['setor' => $setor]);
  }

  public function delete($id) {
    $this->setorDAO->delete($id);
    header('Location: /setor');
    exit;
  }
}