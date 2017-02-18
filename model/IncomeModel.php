<?php
require_once 'core/ConnectionDB.php';

class IncomeModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function income($date_day, $id_concept, $id_activity, $income){//date_day Date, id_concept int, id_activity varchar(5), income float)
    $query = mysqli_query($this -> conn, "call sp_petty_cash_income('$date_day','$id_concept','$id_activity','$income')");
    return $query;
  }

  public function outcome($date_day, $id_concept, $id_activity, $outcome){
    $query = mysqli_query($this -> conn, "call sp_petty_cash_outcome('$date_day','$id_concept','$id_activity','$outcome')");
    return $query;
  }
}
