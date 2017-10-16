<?php
  class PagesController {
    public function home() {
      $empcount= home_page::employeeCount();
      $depcount= home_page::departmentCount();
      $allDepartments= home_page::getDepartment();
      $auditEmployee= home_page::audit();   
//print_r($auditEmployee);die('****');
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>