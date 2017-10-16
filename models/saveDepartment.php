<?php
  class saveDepartment {
    
    public static function saveData() {
        $child=$_POST['new_department'];
        $parent=$_POST['department'];
        $db = Db::getInstance();
        $statement =$db->prepare("INSERT INTO department(Department_name,Departmet_main_id)
                        VALUES(:Department_name,:Departmet_main_id)");
        $statement->execute(array(
                    "Department_name" => "$child",
                     "Departmet_main_id" => "$parent"
                ));
       
         header("Location:?controller=depAdd&action=index");
    }
  }
?>