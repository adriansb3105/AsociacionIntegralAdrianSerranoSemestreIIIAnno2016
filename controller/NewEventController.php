<?php
include_once 'model/NewEventModel.php';

  class NewEventController{
    private $model;

    public function __construct(){
      $this->model = new NewEventModel();
    }

    public function invoke(){
      if(isset($_GET['new_event'])){
        if($_GET['new_event'] == 'new'){
          $flag = false;
          if(isset($_POST['datepicker']) && isset($_POST['start_hour']) && isset($_POST['end_hour']) && isset($_POST['description']) && isset($_POST['email'])){
            $flag = true;
          }

          if($flag){
            $kind = 'publica';
            if(isset($_POST['kind'])){
              $kind = $_POST['kind'];
            }
            $email = $_POST['email'];
            $datepicker = $_POST['datepicker'];
            $start_hour = $_POST['start_hour'];
            $end_hour = $_POST['end_hour'];
            $description = $_POST['description'];
            $id = '';
            $total = 0;

            $month = substr($datepicker, 0, 2);
            $day = substr($datepicker, 3, 2);
            $year = substr($datepicker, 6, 4);
            $newDate = $year.'-'.$month.'-'.$day;

            if($kind === 'interna'){
              $id = $this->model->insertInternal($newDate, $start_hour, $end_hour, $description);
            }else{
              if(isset($_POST['kitchen']) && isset($_POST['chair']) && isset($_POST['table']) && isset($_POST['tablecloths'])){
                $kitchen = $_POST['kitchen'];
                $chairs_num = $_POST['chair'];
                $tables_num = $_POST['table'];
                $tablecloths_num = $_POST['tablecloths'];
                $total = $_POST['totalMoney'];
                $id = $this->model->insertPublic($newDate, $start_hour, $end_hour, $description, $kitchen, $chairs_num, $tables_num, $tablecloths_num, $total);
                $this->model->insertIncome($newDate, 1, $id, $total);
              }
            }

            if($id !== ''){
              $insertCorrect = 'insertCorrect';

              $message = "mensaje aqui";
              $title = "Evento Creado";
              $headers = "MIME-Version: 1.0\r\n";
              $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
              $headers .= "From: Guadalupe Community\r\n";
              $bool = mail($email, $title, $message, $headers);

            }
          }

        include 'view/newEventView.php';
      }else{
        include 'view/newEventView.php';
      }
    }
  }
}
