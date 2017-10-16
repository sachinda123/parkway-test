<?php
  class DepaddController {  
    public function index() {
      $allDepartments= register::alldepartment();
      require_once('views/register/index.php');
    }
  }
?>