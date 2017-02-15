<?php

  class LogoutController{

    public function __construct(){
    }

    public function invoke(){
      if(isset($_GET['logout']) and isset($_SESSION['logged'])){
        unset($_SESSION['logged']);
        include 'view/indexView.php';
      }
    }
  }
