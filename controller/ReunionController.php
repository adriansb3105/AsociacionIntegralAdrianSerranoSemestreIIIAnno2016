<?php
include_once 'model/ReunionModel.php';

  class ReunionController{
    private $model;

    public function __construct(){
      $this->model = new ReunionModel();
    }

    public function invoke(){
    	if(isset($_GET['reunion']) && isset($_SESSION['Secretaria']) &&  isset($_SESSION['logged'])){
        if($_GET['reunion'] == 'new'){


          $name = $_POST['name'];
          $datepicker= $_POST['datepicker'];
          $description = $_POST['description'];
          $doc = basename($_FILES["doc"]["name"]);
          $doc = strtolower($_FILES['doc']['name']);
          //move_uploaded_file($_FILES['doc']['tmp_name'], '../tmp/'.$doc);

          $fileArray = $this->model->uploadFile($doc);
          $url = $fileArray['secure_url'];

          echo $name;
          echo $datepicker;
          echo $description;
          echo $doc;
          echo $url;

          //$query = $this->model->insertReunion($datepicker, $url, $name, $description);
          //if($query){
          //  echo 'subido';
          //}
        }

         include 'view/reunionView.php';
      }else{
        include 'view/indexView.php';
      }
	}
}
