<?php
include_once 'model/LoginModel.php';

  class LoginController{
    private $model;

    public function __construct(){
      $this->model = new LoginModel();
    }

    public function invoke(){
    	
    }
}