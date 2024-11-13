<?php
namespace App\Model;

class Setor {
  private $id;
  private $descricao;

  public function __construct($id = null, $descricao = null) {
    $this->id = $id;
    $this->descricao = $descricao;
  }

  // ========================== ID
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  // ========================== Descricao
  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }
}