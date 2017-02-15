<?php
include_once 'model/ReunionModel.php';

  class ReunionController{
    private $model;

    public function __construct(){
      $this->model = new ReunionModel();
    }

    public function invoke(){
    	if(isset($_GET['reunion'])){
    		include 'view/reunionView.php';
      	}else{
        	include 'view/indexView.php';
      	}
	}
}