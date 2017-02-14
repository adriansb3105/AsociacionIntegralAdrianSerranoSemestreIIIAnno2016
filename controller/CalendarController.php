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

        $activities = $this->model->get_public_activity_all();

        //id, date_day, start_time, end_time, hours, description
        foreach ($activities as $com => $val){
          $arr = array('date'=>$val[1], 'title'=>$val[2], 'location'=>'vgn', 'person'=>'fgc', 'description'=>$val[5]);
          $JSON .= json_encode($arr).',';
        }

        $events_array = $JSON;

        include 'view/calendarView.php';
      }else{
        include 'view/indexView.php';
      }
    }
  }
