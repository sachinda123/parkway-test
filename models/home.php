<?php
  class home_page {
     
    public $empfull_name;
    public $Status;
    public $Feild_name;
    public $Old_value;
    public $New_value;
    public $Time;
    public $deparment;
    public $Department_id;
    public $Department_name;

    public function __construct($Department_id,$Department_name,$emp_name,$Status,$Feild_name,$Old_value,$New_value,$Time,$deparment) {
        $this->Department_id =$Department_id;
        $this->Department_name =$Department_name; 
        $this->empfull_name=$emp_name;
        $this->Status =$Status;
        $this->Feild_name =$Feild_name;
        $this->Old_value =$Old_value;
        $this->New_value =$New_value;
        $this->Time =$Time;
        $this->deparment =$deparment;
       }

    public static function employeeCount() {
        $empcount;
        $db = Db::getInstance();
        $result= $db->query("SELECT COUNT(DISTINCT EmployeeId) as empcount FROM employee");
        foreach($result->fetchAll() as $array){
                $empcount=$array['empcount'];
            }
        return $empcount;
    }
    public static function audit(){
        //$department=$_POST['department'];
        $dep = [];
        $list = [];
        if(isset($_POST['department'])){
         $deparment=$_POST['department'];
        }else{
         $deparment=2;
        }
        $db = Db::getInstance();
       $result= $db->query("select  Department_id 
                        from (select * from department
                        order by Departmet_main_id,Department_id) products_sorted,
                        (select @parent :=$deparment) initialisation
                        where   find_in_set(Departmet_main_id, @parent) > 0
                        and     @parent := concat(@parent, ',', Department_id)");
         foreach($result->fetchAll() as $array){
                $dep[]=$array['Department_id'];
            }
        $dep[]=$deparment;
        foreach($dep as $depart){
                $statement =$db->query("SELECT * FROM employee Where Department='$depart'");
                 foreach($statement->fetchAll() as $array){
                      $empId=$array['EmployeeId'];
                      $emp_name=$array['FirstName'].' '.$array['LastName'];
                      $audit_array =$db->query("SELECT * FROM audit Where Employee_ID='$empId' ORDER BY Time DESC");
                    foreach($audit_array->fetchAll() as $auditRecord){
               $list[]=new home_page('','',$emp_name,$auditRecord['Status'],$auditRecord['Feild_name'],$auditRecord['Old_value'],$auditRecord['New_value'],$auditRecord['Time'],$deparment);   
                      
                    }
               
                 }     
            }
            //print_r($list);
           // die('**');
        return $list ;
    }
    public static function departmentCount(){
        $depCount;
        $db = Db::getInstance();
        $result= $db->query("select COUNT(DISTINCT Department_id) as depcount 
                        from (select * from department
                        order by Departmet_main_id,Department_id) products_sorted,
                        (select @parent :=1) initialisation
                        where   find_in_set(Departmet_main_id, @parent) > 0
                        and     @parent := concat(@parent, ',', Department_id)");
        foreach($result->fetchAll() as $array){
                    $depCount=$array['depcount'];
        }
        return $depCount;
    }
     public static function getDepartment() {
        
      $db = Db::getInstance();
         $list = [];
         $result= $db->query("select  Department_id,
                        Department_name,
                        Departmet_main_id 
                        from (select * from department
                        order by Departmet_main_id,Department_id) products_sorted,
                        (select @parent :=1) initialisation
                        where   find_in_set(Departmet_main_id, @parent) > 0
                        and     @parent := concat(@parent, ',', Department_id)");
         foreach($result->fetchAll() as $array){
                $list[]=new home_page($array['Department_id'],$array['Department_name'],'','','','','','','');
            }
       return $list;
    }
    
  }
?>