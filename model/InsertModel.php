<?php
require_once 'core/ConnectionDB.php';

class InsertModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function insertPartner($id, $first_name, $last_name, $phone, $address, $email, $pass){
    $query = mysqli_query($this -> conn, "call sp_partner_insert('$id','$first_name','$last_name','$phone','$address','$email','$pass')");
    if($query) {
      return true;
    }else{
      return false;
    }
  }
}
