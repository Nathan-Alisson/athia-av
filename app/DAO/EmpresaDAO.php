<?php

namespace App\DAO;

use App\Model\Empresa;
use PDO;

class EmpresaDAO {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function listCompanies() {
    $stmt = $this->pdo->query("SELECT * FROM empresa");
    return $stmt->fetchAll(PDO::FETCH_CLASS, Empresa::class);
  }

  public function createCompany(Empresa $empresa) {
    $stmt = $this->pdo->prepare("INSERT INTO empresa (razao_social, nome_fantasia, cnpj) VALUES (?, ?, ?)");
    $stmt->execute([$empresa->razao_social, $empresa->nome_fantasia, $empresa->cnpj]);
  }

  public function searchCompanyById($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM empresa WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetchObject(Empresa::class);
  }

  public function updateCompany(Empresa $empresa) {
    $stmt = $this->pdo->prepare("UPDATE empresa SET razao_social = ?, nome_fantasia = ?, cnpj = ? WHERE id = ?");
    $stmt->execute([$empresa->razao_social, $empresa->nome_fantasia, $empresa->cnpj]);
  }

  public function deleteCompany($id) {
    $stmt = $this->pdo->prepare("DELETE FROM empresa WHERE id = ?");
    $stmt->execute([$id]);
  }
}
