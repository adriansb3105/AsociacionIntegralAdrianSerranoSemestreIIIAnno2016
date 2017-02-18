<?php
include_once 'model/IncomeModel.php';

  class IncomeController{
    private $model;

    public function __construct(){
      $this->model = new IncomeModel();
    }

    public function invoke(){
    	if(isset($_GET['income']) && isset($_SESSION['Secretaria']) &&  isset($_SESSION['logged'])){
        if($_GET['income'] == 'new'){

          if($_POST['datepicker'] && $_POST['description'] && $_POST['total']){
            $datepicker= $_POST['datepicker'];
            $description= $_POST['description'];
            $total= $_POST['total'];
            $concept = $_POST['concept'];
            $flag = false;

            $month = substr($datepicker, 0, 2);
            $day = substr($datepicker, 3, 2);
            $year = substr($datepicker, 6, 4);
            $newDate = $year.'-'.$month.'-'.$day;


            if ($concept === 1 || $concept === 2 || $concept === 6) {
              $flag = $this->model->income($newDate, $concept, '', $total);
            }elseif($concept === 3 || $concept === 4 || $concept === 5 || $concept === 7){
              $flag = $this->model->outcome($newDate, $concept, '', $total);
            }
          }
          if($flag){
            $incomeInserted = 'incomeInserted';
          }
        }
         include 'view/IncomeView.php';
      }else{
        include 'view/indexView.php';
      }
	}
}
