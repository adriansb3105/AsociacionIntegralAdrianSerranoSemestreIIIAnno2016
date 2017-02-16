<?php

  class DefaultController{

    public function __construct(){
    }

    public function invoke(){
      include 'view/indexView.php';
    }
  }
