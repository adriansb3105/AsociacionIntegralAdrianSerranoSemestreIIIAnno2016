<?php

  class DefaultController{

    public function __construct(){}

    public function invoke(){
      if(isset($_SESSION['logged'])){
        include 'view/dashboardView.php';
      }else{
        include 'view/indexView.php';
      }
    }
  }
