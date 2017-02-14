<?php 
require_once 'core/ConnectionDB.php';

class LoginModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function verifyLogin(){

  }
}