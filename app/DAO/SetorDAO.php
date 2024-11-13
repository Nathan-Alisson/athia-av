<?php

namespace App\DAO;

use App\Model\Setor;
use PDO;

class SetorDAO
{
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function getAll() {
    $stmt = $this->pdo->prepare("SELECT * FROM setor");
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_map(function ($setor) {
      return new Setor($setor['id'], $setor['descricao']);
    }, $data);
  }

  public function getById($id)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM setor WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data ? new Setor($data['id'], $data['descricao']) : null;
  }

  public function create(Setor $setor)
  {
    $stmt = $this->pdo->prepare("INSERT INTO setor (descricao) VALUES (:descricao)");
    $stmt->bindParam(':descricao', $setor->getDescricao());
    $stmt->execute();

    $setor->setId($this->pdo->lastInsertId());
    return $setor;
  }

  public function update(Setor $setor) {
    $stmt = $this->pdo->prepare("UPDATE setor SET descricao = ? WHERE id = ?");
    $stmt->execute([$setor->getDescricao(), $setor->getId()]);
  }

  public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM setor WHERE id = ?");
    $stmt->execute([$id]);
  }

  public function getSetors(Setor $setor)
  {
    $sql = "SELECT setors.* FROM setor
                INNER JOIN setor_setor ON setors.id = setor_setor.setor_id
                WHERE setor_setor.setor_id = :setor_id";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':setor_id', $setor->getId(), PDO::PARAM_INT);
    $stmt->execute();

    $setors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return array_map(function ($setor) {
      return new Setor($setor['id'], $setor['nome'], $setor['cnpj']);
    }, $setors);
  }
}
