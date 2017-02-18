<?php
require_once 'core/ConnectionDB.php';

class NewEventModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function insertInternal($date_day, $start_time, $end_time, $description){
    $id = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0; $i<5; $i++){
      $id .= $pattern{mt_rand(0,$max)};
    }

    $query = mysqli_query($this -> conn, "call sp_internal_activity_insert('$id','$date_day','$start_time','$end_time','$description')");
    if($query) {
      return $id;
    }else{
      return '';
    }
  }

  public function insertPublic($date_day, $start_time, $end_time, $description, $kitchen, $chairs_num, $tables_num, $tablecloths_num, $total){
    $id = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0; $i<5; $i++){
      $id .= $pattern{mt_rand(0,$max)};
    }

    $query = mysqli_query($this -> conn, "call sp_public_activity_insert('$id','$date_day','$start_time','$end_time','$description','$kitchen','$chairs_num','$tables_num','$tablecloths_num','$total')");
    if($query) {
      return $id;
    }else{
      return '';
    }
  }
}
