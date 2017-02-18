<?php
require_once 'core/ConnectionDB.php';

class SeeModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function getPettyCash(){
    $query = mysqli_query($this -> conn, "call sp_petty_cash_select_all()");
    $data = mysqli_fetch_all($query);

    return $data;
  }

}
