<?php

namespace App\DAO;

use App\Model\Empresa;
use App\Model\Setor;
use PDO;

class EmpresaDAO {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function getAll() {
    $stmt = $this->pdo->prepare("SELECT * FROM empresa");
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_map(function ($empresa) {
      return new Empresa($empresa['id'], $empresa['razao_social'], $empresa['nome_fantasia'], $empresa['cnpj']);
    }, $data);
  }

  public function getById($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM empresa WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data ? new Empresa($data['id'], $data['razao_social'], $data['nome_fantasia'], $data['cnpj']) : null;
  }

  public function create(Empresa $empresa) {
    $stmt = $this->pdo->prepare("INSERT INTO empresa (razao_social, nome_fantasia, cnpj) VALUES (:razao_social, :nome_fantasia, :cnpj)");
    $stmt->bindParam(':razao_social', $empresa->getRazaoSocial());
    $stmt->bindParam(':nome_fantasia', $empresa->getNomeFantasia());
    $stmt->bindParam(':cnpj', $empresa->getCnpj());
    $stmt->execute();

    $empresa->setId($this->pdo->lastInsertId());
    return $empresa;
  }

  public function update(Empresa $empresa) {
    $stmt = $this->pdo->prepare("UPDATE empresa SET razao_social = ?, nome_fantasia = ?, cnpj = ? WHERE id = ?");
    $stmt->execute([$empresa->getRazaoSocial(), $empresa->getNomeFantasia(), $empresa->getCnpj(), $empresa->getId()]);
  }

  public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM empresa WHERE id = ?");
    $stmt->execute([$id]);
  }

  public function addSetor(Empresa $empresa, $setor_id) {
    $stmt = $this->pdo->prepare("INSERT INTO empresa_setor (empresa_id, setor_id) VALUES (:empresa_id, :setor_id)");
    $stmt->bindParam(':empresa_id', $empresa->getId(), PDO::PARAM_INT);
    $stmt->bindParam(':setor_id', $setor_id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function getSetores(Empresa $empresa) {
    $sql = "SELECT setores.* FROM setores 
                INNER JOIN empresa_setor ON setores.id = empresa_setor.setor_id
                WHERE empresa_setor.empresa_id = :empresa_id";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':empresa_id', $empresa->getId(), PDO::PARAM_INT);
    $stmt->execute();

    $setores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return array_map(function ($setor) {
      return new Setor($setor['id'], $setor['nome']);
    }, $setores);
  }

  public function getAllWithSetores() {
    $stmt = $this->pdo->query("
    SELECT e.id, e.razao_social, e.nome_fantasia, e.cnpj, s.descricao AS setor_descricao
    FROM empresa e
    LEFT JOIN empresa_setor es ON e.id = es.empresa_id
    LEFT JOIN setor s ON es.setor_id = s.id
  ");

    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function getBySetor($setorId) {
    $stmt = $this->pdo->prepare("
    SELECT e.id, e.razao_social, e.nome_fantasia, e.cnpj, s.descricao AS setor_descricao
    FROM empresa e
    LEFT JOIN empresa_setor es ON e.id = es.empresa_id
    LEFT JOIN setor s ON es.setor_id = s.id
    WHERE s.id = :setorId
  ");

    $stmt->bindValue(':setorId', $setorId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}
