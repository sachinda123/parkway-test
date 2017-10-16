<?php
  class DepAdd {
    // they are public so that we can access them using $post->author directly
    public $Department_id;
    public $Department_name;

    public function __construct($Department_id, $Department_name) {
      $this->Department_id =$Department_id;
      $this->Department_name =$Department_name;
    }

    public static function all() {
      //$list = [];
      $db = Db::getInstance();
        //$id=$dep['Department_id'];
        $result= $db->query("select  Department_id,
                        Department_name,
                        Departmet_main_id 
                        from (select * from department
                        order by Departmet_main_id,Department_id) products_sorted,
                        (select @parent :=1) initialisation
                        where   find_in_set(Departmet_main_id, @parent) > 0
                        and     @parent := concat(@parent, ',', Department_id)");
        $n=0;
        
        foreach($result->fetchAll() as $array){
           $key=$array['Department_id'];
           if($n==0){
               $val=NULL;
           }else{
           $val=$array['Departmet_main_id'];
           }
           $arr[$key]=$val;
           $name[$key]=$array['Department_name'];
           $n++;
        }

        function parseTree($tree, $root = null) {
         $return = array();
         # Traverse the tree and search for direct children of the root
         foreach($tree as $child => $parent) {
             # A direct child is found
             if($parent == $root) {
                 # Remove item from tree (we don't need to traverse this again)
                 unset($tree[$child]);
                 # Append the child into result array and parse its children
                 $return[] = array(
                     'name' => $child,
                     'children' => parseTree($tree, $child)
                 );
             }
         }
         return empty($return) ? null : $return;    
     }
         return $var=parseTree($arr);
     } 
     
     public static function name() {
         
        $db = Db::getInstance();
        //$id=$dep['Department_id'];
        $result= $db->query("select  Department_id,
                        Department_name,
                        Departmet_main_id 
                        from (select * from department
                        order by Departmet_main_id,Department_id) products_sorted,
                        (select @parent :=1) initialisation
                        where   find_in_set(Departmet_main_id, @parent) > 0
                        and     @parent := concat(@parent, ',', Department_id)");
        $n=0;
        
        foreach($result->fetchAll() as $array){
           $key=$array['Department_id'];
           if($n==0){
               $val=NULL;
           }else{
           $val=$array['Departmet_main_id'];
           }
           $arr[$key]=$val;
           $name[$key]=$array['Department_name'];
           $n++;
        }
        
        return $name;
         
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
                $list[]=new DepAdd($array['Department_id'],$array['Department_name']);
            }
              return $list;
     }
 
  }
?>