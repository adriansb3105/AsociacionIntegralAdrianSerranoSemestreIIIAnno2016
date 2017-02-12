<?php

class ConnectionDB{
  private $conn;

  function __construct(){
    $this->conn = mysqli_connect('us-cdbr-iron-east-04.cleardb.net', 'b83946cb15195a', 'e1473e89');

    if(!$this -> conn){
      echo 'Problemas de conexion al servidor';
      exit();
    }
    mysqli_select_db($this -> conn, 'heroku_0c63ce6730cdd8f');
  }

  public function connect(){
    return $this -> conn;
  }
}
