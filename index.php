<?php

include_once 'controller/DefaultController.php';
include_once 'controller/CalendarController.php';
include_once 'controller/LoginController.php';
include_once 'controller/LogoutController.php';
include_once 'controller/ReunionController.php';
include_once 'controller/NewEventController.php';
include_once 'controller/IncomeController.php';
include_once 'controller/SeeController.php';
include_once 'controller/InsertController.php';

if(isset($_GET['calendar'])){
  $controller = new CalendarController();
  $controller->invoke();
}elseif(isset($_GET['dashboard'])){
  $controller = new LoginController();
  $controller->invoke();
}elseif(isset($_GET['logout'])){
  $controller = new LogoutController();
  $controller->invoke();
}elseif(isset($_GET['reunion'])){
  $controller = new ReunionController();
  $controller->invoke();
}elseif(isset($_GET['new_event'])){
  $controller = new NewEventController();
  $controller->invoke();
}elseif(isset($_GET['income'])){
  $controller = new IncomeController();
  $controller->invoke();
}elseif(isset($_GET['see'])){
  $controller = new SeeController();
  $controller->invoke();
}elseif(isset($_GET['insert'])){
  $controller = new InsertController();
  $controller->invoke();
}else{
  $controller = new DefaultController();
  $controller->invoke();
}
