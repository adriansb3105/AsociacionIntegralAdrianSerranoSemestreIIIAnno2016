<?php
include_once 'model/InsertModel.php';

  class InsertController{
    private $model;

    public function __construct(){
      $this->model = new InsertModel();
    }

    public function invoke(){
      if(isset($_GET['insert']) && isset($_SESSION['Secretaria']) &&  isset($_SESSION['logged'])){
        if($_GET['insert'] == 'new'){
          if(isset($_POST['id']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone']) &&
            isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['address'])){
          
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $address = $_POST['address'];

            $flag = $this->model->insertPartner($id, $first_name, $last_name, $phone, $address, $email, md5($pass));

            if($flag){
              $insertCorrect = 'insertCorrect';
            }
          }
        include 'view/InsertView.php';
      }else{
        include 'view/InsertView.php';
      }
    }
  }
}
