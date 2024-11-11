<?php
namespace App\DAO;

use PDO;

class Database {
  private $pdo;

  public function __construct() {
    $this->pdo = new PDO('mysql:host=localhost;dbname=nome_do_banco', 'usuario', 'senha');
  }

  public function getConnection() {
    return $this->pdo;
  }
}