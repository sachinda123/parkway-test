<?php
  class DepaddController {  
    public function index() {
      $allDepartments= saveDepartment::saveData();
      require_once('views/register/index.php');
    }
    
   
  }
?>