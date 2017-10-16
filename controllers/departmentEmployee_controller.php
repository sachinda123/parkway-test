<?php
  class DepaddController {  
    public function index() {
        $allDepartments= departmentEmployee::getDepartment();
        $allEmployee= departmentEmployee::getEmployee();
        require_once('views/department_employee/index.php');
    }
    
   
  }
?>