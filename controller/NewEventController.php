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
          $datepicker = $_POST['datepicker'];
          $start_hour = $_POST['start_hour'];
          $end_hour = $_POST['end_hour'];
          $description = $_POST['description'];
          $kind = $_POST['kind'];
          $id = '';

          $month = substr($datepicker, 0, 2);
          $day = substr($datepicker, 3, 2);
          $year = substr($datepicker, 6, 4);
          $newDate = $year.'-'.$month.'-'.$day;

          if($kind === 'interna'){
            $id = $this->model->insertInternal($newDate, $start_hour, $start_hour, $description);
          }else{
            $kitchen = $_POST['kitchen'];
            $chairs_num = $_POST['chair'];
            $tables_num = $_POST['table'];
            $tablecloths_num = $_POST['tablecloths'];
            $total = $_POST[''];
            $id = $this->model->insertPublic($newDate, $start_hour, $start_hour, $description, $kitchen, $chairs_num, $tables_num, $tablecloths_num, $total);
        }

          if($id !== ''){
            $insertCorrect = 'insertCorrect';
          }

        include 'view/newEventView.php';
      }else{
        include 'view/newEventView.php';
      }
    }
  }
}
