<?php

include_once 'model/DefaultModel.php';

  class DefaultController{
    private $model;

    public function __construct(){
      $this->model = new DefaultModel();
    }

    public function invoke(){


      include 'view/indexView.php';

      /*
      if(isset($_GET['herramienta'])){

        if ($_GET['herramienta'] == 'insertar'){
          $respuesta = $this -> model -> insertarHerramienta($_POST['codigo'], $_POST['nombre'], $_POST['precio'], $_POST['descripcion']);
        }elseif ($_GET['herramienta'] == 'obtenerCodigo') {
          $herramientas = $this -> model -> obtenerHerramientaCodigo($_POST['obtenerCodigo']);
        }

        include 'view/herramienta.php';
      }else{
        include 'view/indexView.php';
      }
      */
    }
  }
