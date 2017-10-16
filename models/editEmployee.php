<?php
  class editEmployee {
   
    public $EmployeeId;
    public $First_Name;
    public $LastName;
    public $Bday;
    public $Department;
    public $NIC;
    public $Conatct_no;
    public $Department_id;
    public $Department_name;
  
    public function __construct($EmployeeId,$First_Name,$LastName,$Bday,$Department,$NIC,$Conatct_no,$Department_id,$Department_name) {
      $this->EmployeeId =$EmployeeId;
      $this->First_Name =$First_Name;
      $this->LastName=$LastName;
      $this->Bday =$Bday;
      $this->Department =$Department;
      $this->NIC =$NIC;
      $this->Conatct_no =$Conatct_no;
      $this->Department_id =$Department_id;
      $this->Department_name =$Department_name;
      
    }
    
    public static function employeeDetail() {
        
    $empId=$_POST['edit_empId'];
    //print_r($_POST);
    $db = Db::getInstance();
         $list = [];
         $result= $db->query("select * from employee where EmployeeId=$empId");
         foreach($result->fetchAll() as $array){
            
                $list[]=new editEmployee($array['EmployeeId'],$array['FirstName'],$array['LastName']
                        ,$array['BirthDay'],$array['Department'],$array['NIC'],$array['Conatct_no'],'','');
            }
       return $list;

    }
     public static function alldepartment() {
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
                $list[]=new editEmployee('','','','','','','',$array['Department_id'],$array['Department_name']);
            }
       return $list;
  
    }
    
  }
?>