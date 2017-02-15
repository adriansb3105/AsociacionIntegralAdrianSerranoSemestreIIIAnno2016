<?php

  class LogoutController{

    public function __construct(){
    }

    public function invoke(){
      if(isset($_GET['logout']) and isset($_SESSION['logged'])){
        unset($_SESSION['logged']);

        if(isset($_SESSION['Secretaria'])){
          unset($_SESSION['Secretaria']);
        }

        include 'view/indexView.php';
      }
    }
  }
