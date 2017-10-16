<?php
  class register {
    // they are public so that we can access them using $post->author directly
    public $Department_id;
    public $Department_name;

    public function __construct($Department_id, $Department_name) {
      $this->Department_id =$Department_id;
      $this->Department_name =$Department_name;
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
                $list[]=new register($array['Department_id'],$array['Department_name']);
            }
       return $list;
  
    }
     
  }
?>