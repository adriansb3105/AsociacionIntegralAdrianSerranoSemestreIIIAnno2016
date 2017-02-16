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

        if(isset($_SESSION['Secretaria'])){
          $internalActivities = $this->model->get_internal_activity_all();
          foreach ($internalActivities as $com_ => $val_){
            $arr_ = array('date'=>$val_[1], 'title'=>$val_[2], 'location'=>'vgn', 'person'=>'fgc', 'description'=>$val_[5]);
            $JSON .= json_encode($arr_).',';
          }
        }
        /*
        $publicActivities = $this->model->get_public_activity_all();
        //id, date_day, start_time, end_time, hours, description
        foreach ($publicActivities as $com => $val){
          $arr = array('date'=>$val[1], 'title'=>$val[2], 'location'=>'vgn', 'person'=>'fgc', 'description'=>$val[5]);
          $JSON .= json_encode($arr).',';
        }
        */

        $events_array = $JSON;

        include 'view/calendarView.php';
      }else{
        include 'view/indexView.php';
      }
    }
  }
