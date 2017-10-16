<?php
  class registerEmployee {
    
    public static function saveData() {
        
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $nic=$_POST['nic'];
        $contact_no=$_POST['contact_no'];
        $department=$_POST['department'];
        $bday=explode("/",$_POST['datepicker']);
        $day=$bday[2].'-'.$bday[1].'-'.$bday[0];
        
        $db = Db::getInstance();
        $statement =$db->prepare("INSERT INTO employee(FirstName,LastName,BirthDay,NIC,Department,Conatct_no)
                        VALUES(:FirstName,:LastName,:BirthDay,:NIC,:Department,:Conatct_no)");
        $statement->execute(array(
                    "FirstName" => "$first_name",
                     "LastName" => "$last_name",
                     "BirthDay" => $day,
                    "NIC" => "$nic",
                    "Department" => "$department",
                    "Conatct_no" => "$contact_no"
                ));
         $empId= $db->lastInsertId();
 
         $statement2 =$db->prepare("INSERT INTO audit(Employee_ID,Status,Feild_name,Old_value,New_value,Time)
                        VALUES(:Employee_ID,:Status,:Feild_name,:Old_value,:New_value,NOW())");
         $statement2->execute(array(
                    "Employee_ID" => "$empId",
                    "Status" => "new employee add",
                    "Feild_name" => "",
                    "Old_value" => "",
                    "New_value" => ""
                    
                ));
         //die('***');
         header("Location:./");
    }
  }
?>