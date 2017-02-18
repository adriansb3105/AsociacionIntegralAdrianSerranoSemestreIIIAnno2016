<?php
require_once 'core/ConnectionDB.php';

class LoginModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function findEmployee($email, $password){
      $query = mysqli_query($this -> conn, "call sp_find_employee('$email', '$password')");
      $data = mysqli_fetch_all($query);
      return $data;
  }

  public function findPartner($email, $password){
      $query = mysqli_query($this -> conn, "call sp_find_partner('$email', '$password')");
      $data = mysqli_fetch_all($query);
      return $data;
  }
}
