<?php
require_once 'core/ConnectionDB.php';

class CalendarModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function get_activity(){
    $query = mysqli_query($this -> conn, "call sp_activity_select_all()");
    $data = mysqli_fetch_all($query);

    return $data;
  }

}
