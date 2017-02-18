<?php
include_once 'model/CalendarModel.php';

  class CalendarController{
    private $model;

    public function __construct(){
      $this->model = new CalendarModel();
    }

    public function invoke(){
      if(isset($_GET['calendar'])){
        $JSON = '';
        $activities = $this->model->get_activity();

        if(isset($_SESSION['Secretaria'])){
          foreach ($activities as $com_ => $val_){
            if($val_[5] === 'interna'){
              $arr_ = array('date'=>$val_[1], 'title'=>$val_[2], 'location'=>'vgn', 'person'=>'fgc', 'description'=>$val_[5]);
              $JSON .= json_encode($arr_).',';
            }
          }
        }

        foreach ($activities as $com => $val){
          if($val[5] === 'publica'){
            $arr = array('date'=>$val[1], 'title'=>$val[2], 'location'=>'vgn', 'person'=>'fgc', 'description'=>$val[5]);
            $JSON .= json_encode($arr).',';
          }
        }


        $events_array = $JSON;

        include 'view/calendarView.php';
      }else{
        include 'view/indexView.php';
      }
    }
  }
