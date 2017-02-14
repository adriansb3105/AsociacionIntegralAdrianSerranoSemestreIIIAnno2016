<?php
  //include_once 'model/CalendarModel.php';
  //$model = new CalendarModel();
  //$res = $this -> model -> get_public_activity_all();

  if($_REQUEST["activities"] == "getActivities"){
    setActivities();
  }

  function setActivities(){
    $myArr = array("John", "Mary", "Peter", "Sally");
    $myJSON = json_encode($myArr);
    echo $myJSON;
  }
