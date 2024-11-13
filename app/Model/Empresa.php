<?php
namespace App\Model;

class Empresa
{
  private $id;
  private $razao_social;
  private $nome_fantasia;
  private $cnpj;

  public function __construct($id = null, $razao_social = null, $nome_fantasia = null, $cnpj = null)
  {
    $this->id = $id;
    $this->razao_social = $razao_social;
    $this->nome_fantasia = $nome_fantasia;
    $this->cnpj = $cnpj;
  }
  
  // ========================== ID
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  // ========================== Razao
  public function getRazaoSocial() {
    return $this->razao_social;
  }

  public function setRazaoSocial($razao_social) {
    $this->razao_social = $razao_social;
  }

  // ========================== Fantasia
  public function getNomeFantasia() {
    return $this->nome_fantasia;
  }

  public function setNomeFantasia($nome_fantasia) {
    $this->nome_fantasia = $nome_fantasia;
  }

  // ========================== CNPJ
  public function getCnpj() {
    return $this->cnpj;
  }

  public function setCnpj($cnpj) {
    $this->cnpj = $cnpj;
  }
}
