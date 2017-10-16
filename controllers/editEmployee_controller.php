<?php
  class DepaddController {  
    public function index() {
      $getDetail= editEmployee::employeeDetail();
      $allDepartment= editEmployee::alldepartment();
      //print_r($allDepartment);die('jjjjj');
      require_once('views/edit/index.php');
    }
  }
?>