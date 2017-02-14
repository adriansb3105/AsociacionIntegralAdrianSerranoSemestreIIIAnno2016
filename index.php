<?php

include_once 'controller/DefaultController.php';
include_once 'controller/CalendarController.php';


if(isset($_GET['calendar'])){
  $controller = new CalendarController();
  $controller->invoke();
}else{
  $controller = new DefaultController();
  $controller->invoke();
}
