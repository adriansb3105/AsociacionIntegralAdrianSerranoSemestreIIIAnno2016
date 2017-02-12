<?php

require_once 'core/ConnectionDB.php';

class DefaultModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function insertarHerramienta($codigo, $nombre, $precio, $descripcion){
      $query = mysqli_query($this -> conn, "call sp_insertar_herramienta('$codigo','$nombre','$precio','$descripcion')");
      if($query) {
        return true;
      }else{
        return false;
      }
    }

    public function obtenerHerramientaCodigo($codigo){
      $query = mysqli_query($this -> conn, "call sp_obtener_herramienta_codigo('$codigo')");
      $data = mysqli_fetch_all($query);

      return $data;
    }

}
