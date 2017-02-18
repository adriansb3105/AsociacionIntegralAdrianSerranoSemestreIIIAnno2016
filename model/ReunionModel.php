<?php

require_once 'core/ConnectionDB.php';
require 'Cloudinary.php';
require 'Uploader.php';
require 'Api.php';

\Cloudinary::config(array(
  "cloud_name" => "adriansb3105",
  "api_key" => "314278813578557",
  "api_secret" => "TZJQ4zvPzyOh_VKQr4RZOFH8bEs"
));

class ReunionModel{
  private $conn;

  public function __construct(){
    $connection = new ConnectionDB();
    $this->conn = $connection->connect();
  }

  public function uploadFile($urlFile){
    $fileUploaded = \Cloudinary\Uploader::upload('../model/tmp/t1.txt');
    return $fileUploaded;
  }

  public function insertReunion($reunion_date, $doc_url, $doc_name, $description){
      $query = mysqli_query($this -> conn, "call sp_reunion_insert('$reunion_date','$doc_url','$doc_name','$description')");
      if($query) {
        return true;
      }else{
        return false;
      }
    }
}
