<?php
  class DepaddController {  
    public function index() {
      $allDepartments= registerEmployee::saveData();
      require_once('views/register/index.php');
    }
    
   
  }
?>