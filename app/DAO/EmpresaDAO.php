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
    $stmt = $this->pdo->query("SELECT * FROM empresas");
    return $stmt->fetchAll(PDO::FETCH_CLASS, Empresa::class);
  }

  public function createCompany(Empresa $empresa) {
    $stmt = $this->pdo->prepare("INSERT INTO empresas (nome, cnpj, endereco, telefone) VALUES (?, ?, ?, ?)");
    $stmt->execute([$empresa->nome, $empresa->cnpj, $empresa->endereco, $empresa->telefone]);
  }

  public function searchCompanyById($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM empresas WHERE id_empresa = ?");
    $stmt->execute([$id]);
    return $stmt->fetchObject(Empresa::class);
  }

  public function updateCompany(Empresa $empresa) {
    $stmt = $this->pdo->prepare("UPDATE empresas SET nome = ?, cnpj = ?, endereco = ?, telefone = ? WHERE id_empresa = ?");
    $stmt->execute([$empresa->nome, $empresa->cnpj, $empresa->endereco, $empresa->telefone, $empresa->id]);
  }

  public function deleteCompany($id) {
    $stmt = $this->pdo->prepare("DELETE FROM empresas WHERE id_empresa = ?");
    $stmt->execute([$id]);
  }
}
