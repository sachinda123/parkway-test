<?php
  class deleteEmployee {
    public static function deleteData() {
        $empId=$_POST['del_empId'];
        $db = Db::getInstance();
        $result= $db->query("DELETE FROM employee WHERE EmployeeId=$empId"); 
                 $db->query("DELETE FROM audit WHERE Employee_ID=$empId");
                header("Location:./");
            } 
            
    }
  ?>