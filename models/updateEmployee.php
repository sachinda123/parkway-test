<?php
  class registerEmployee {
    
    public static function updateData() {
        
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $nic=$_POST['nic'];
        $contact_no=$_POST['contact_no'];
        $department=$_POST['department'];
        $bday=explode("/",$_POST['datepicker']);
        $day=$bday[0];
        $empId=$_POST['EmployeeId'];
        
        $db = Db::getInstance();
        $result= $db->query("select * from employee where EmployeeId=$empId");
         foreach($result->fetchAll() as $array){
             if($first_name!=$array['FirstName'])
                {   
                    $old_name=$array['FirstName'];
                    $sql="UPDATE employee SET FirstName='$first_name' WHERE EmployeeId=$empId";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    
                    $statement2 =$db->prepare("INSERT INTO audit(Employee_ID,Status,Feild_name,Old_value,New_value,Time)
                        VALUES(:Employee_ID,:Status,:Feild_name,:Old_value,:New_value,NOW())");
         $statement2->execute(array(
                    "Employee_ID" => "$empId",
                    "Status" => "Update Employee",
                    "Feild_name" =>"FirstName",
                    "Old_value" => "$old_name",
                    "New_value" => "$first_name")
                    ); 
                }
              
              
            } 
            
            if($last_name!=$array['LastName'])
                {   
                    $old_name=$array['LastName'];
                    $sql="UPDATE employee SET LastName='$last_name' WHERE EmployeeId=$empId";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    
                    $statement2 =$db->prepare("INSERT INTO audit(Employee_ID,Status,Feild_name,Old_value,New_value,Time)
                        VALUES(:Employee_ID,:Status,:Feild_name,:Old_value,:New_value,NOW())");
         $statement2->execute(array(
                    "Employee_ID" => "$empId",
                    "Status" => "Update Employee",
                    "Feild_name" =>"FirstName",
                    "Old_value" => "$old_name",
                    "New_value" => "$last_name")
                    );
                }
                
                if($day!=$array['BirthDay'])
                {   
                    $old_name=$array['BirthDay'];
                    $sql="UPDATE employee SET BirthDay='$day' WHERE EmployeeId=$empId";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    
                    $statement2 =$db->prepare("INSERT INTO audit(Employee_ID,Status,Feild_name,Old_value,New_value,Time)
                        VALUES(:Employee_ID,:Status,:Feild_name,:Old_value,:New_value,NOW())");
         $statement2->execute(array(
                    "Employee_ID" => "$empId",
                    "Status" => "Update Employee",
                    "Feild_name" =>"BirthDay",
                    "Old_value" => "$old_name",
                    "New_value" => "$day")
                    );  
                }
                
                if($department!=$array['Department'])
                {   
                    $old_name=$array['Department'];
                    $sql="UPDATE employee SET Department='$department' WHERE EmployeeId=$empId";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $result= $db->query("select * from department where Department_id IN($old_name,$department)");
                    foreach($result->fetchAll() as $array2){
                        if($array2['Department_id']==$old_name){
                           $old_name=$array2['Department_name'];   
                        }
                        if($array2['Department_id']==$department){
                           $department=$array2['Department_name'];   
                        }
            
                    }
                   
                    $statement2 =$db->prepare("INSERT INTO audit(Employee_ID,Status,Feild_name,Old_value,New_value,Time)
                        VALUES(:Employee_ID,:Status,:Feild_name,:Old_value,:New_value,NOW())");
         $statement2->execute(array(
                    "Employee_ID" => "$empId",
                    "Status" => "Update Employee",
                    "Feild_name" =>"Department",
                    "Old_value" => "$old_name",
                    "New_value" => "$department")
                    );  
                }
                
                if($nic!=$array['NIC'])
                {   
                   //print_r($_POST);  print_r($array);
                   // die('***');
                    $old_name=$array['NIC'];
                    $sql="UPDATE employee SET NIC='$nic' WHERE EmployeeId=$empId";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    
                    $statement2 =$db->prepare("INSERT INTO audit(Employee_ID,Status,Feild_name,Old_value,New_value,Time)
                        VALUES(:Employee_ID,:Status,:Feild_name,:Old_value,:New_value,NOW())");
         $statement2->execute(array(
                    "Employee_ID" => "$empId",
                    "Status" => "Update Employee",
                    "Feild_name" =>"NIC",
                    "Old_value" => "$old_name",
                    "New_value" => "$nic")
                    );  
                }
                if($contact_no!=$array['Conatct_no'])
                {   
                    $old_name=$array['Conatct_no'];
                    $sql="UPDATE employee SET Conatct_no='$contact_no' WHERE EmployeeId=$empId";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    
                    $statement2 =$db->prepare("INSERT INTO audit(Employee_ID,Status,Feild_name,Old_value,New_value,Time)
                        VALUES(:Employee_ID,:Status,:Feild_name,:Old_value,:New_value,NOW())");
         $statement2->execute(array(
                    "Employee_ID" => "$empId",
                    "Status" => "Update Employee",
                    "Feild_name" =>"Conatct_no",
                    "Old_value" => "$old_name",
                    "New_value" => "$contact_no")
                    );  
                }
                header("Location:./");
            } 
            
                }
  ?>