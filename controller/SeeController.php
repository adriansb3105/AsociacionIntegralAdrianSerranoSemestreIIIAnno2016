<?php
include_once 'model/SeeModel.php';

  class SeeController{
    private $model;

    public function __construct(){
      $this->model = new SeeModel();
    }

    public function invoke(){
    	if(isset($_GET['see']) &&  isset($_SESSION['logged'])){

        $pettyCash = $this->model->getPettyCash();

         include 'view/SeeView.php';
      }else{
        include 'view/indexView.php';
      }
	}
}
