<?php
include_once 'model/LoginModel.php';
session_start();

  class LoginController{
    private $model;

    public function __construct(){
      $this->model = new LoginModel();
    }

    //martita@hotmail.com
      //123v23gjy23yjg23
    public function invoke(){
    	if(isset($_GET['dashboard'])){

        if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])){
          $email = $_POST['emailLogin'];
          $password = $_POST['passwordLogin'];

          //id, first_name, last_name, position
          $employee = $this->model->findEmployee($email, $password);

          if(count($employee) !== 0){
            $position = '';

            foreach ($employee as $val) {
              $position = $val[3];
            //  echo 'Codigo: '.$val[0].', Nombre: '.$val[1].', Precio: '.$val[2].', Descripcion: '.$val[3];
            //  echo '<br/>';
            }

            if(!isset($_SESSION['logged'])){
              $_SESSION['logged'] = 'logged';
            }

            if($position === 'Secretaria'){
              if(!isset($_SESSION['Secretaria'])){
                $_SESSION['Secretaria'] = 'Secretaria';
              }
            }

            include 'view/dashboardView.php';
          }else{
            $errorLogin = 'error';
            include 'view/indexView.php';
          }
        }else{
          include 'view/indexView.php';
        }
      }else{
        include 'view/indexView.php';
      }
  }
}
