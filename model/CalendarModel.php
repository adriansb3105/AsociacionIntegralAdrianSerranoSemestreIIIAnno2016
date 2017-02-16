<?php
require_once 'core/ConnectionDB.php';

class CalendarModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function get_public_activity_all(){
    $query = mysqli_query($this -> conn, "call sp_public_activity_select_all()");
    $data = mysqli_fetch_all($query);

    return $data;
  }

  public function get_internal_activity_all(){
    $query = mysqli_query($this -> conn, "call sp_internal_activity_select_all()");
    $data = mysqli_fetch_all($query);

    return $data;
  }
}
