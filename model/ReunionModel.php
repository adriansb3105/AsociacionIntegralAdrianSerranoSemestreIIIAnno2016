<?php
require_once 'core/ConnectionDB.php';

class ReunionModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

}
