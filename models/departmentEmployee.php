<?php
  class departmentEmployee {

    public $Department_id;
    public $Department_name;
    public $First_Name;
    public $LastName;
    public $NIC;
    public $Conatct_no;
    public $EmployeeId;
    public $parent_node;
    public $birth_day;

    public function __construct($Department_id,$Department_name,$First_Name,$LastName,$NIC,$Conatct_no,$EmployeeId,$parent_node,$birth_day) {
      $this->Department_id =$Department_id;
      $this->Department_name =$Department_name;
      $this->First_Name =$First_Name;
      $this->LastName =$LastName;
      $this->NIC =$NIC;
      $this->Conatct_no =$Conatct_no;
      $this->EmployeeId =$EmployeeId;
      $this->parent_node =$parent_node;
      $this->birth_day =$birth_day;
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
                $list[]=new departmentEmployee($array['Department_id'],$array['Department_name'],'','','','','','','');
            }
       return $list;

    }
     public static function getEmployee() {
         
        $dep = [];
        $list = [];
   
         if(isset($_POST)){
         $deparment=$_POST['department'];
        }
       if(isset($deparment)){
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
                 $list[]=new departmentEmployee('','',$array['FirstName'],$array['LastName'],$array['NIC'],$array['Conatct_no'],$array['EmployeeId'],$deparment,$array['BirthDay']);    
                  }    
            }
           return $list;
  
     }
  }
?>