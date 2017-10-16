<?php
  class DepaddController {  
    public function index() {
      $var= DepAdd::all();
      $name= DepAdd::name();
      $allDepartment= DepAdd::getDepartment();

     function printtree($tree,$name) {
        if(!is_null($tree) && count($tree) > 0) {
            
            echo '<ul>';
            foreach($tree as $b) {
                 echo'<li>'.$name[$b['name']];
                printtree($b['children'],$name);
                 echo '</li>';
            }
             echo '</ul>';
            }
            //$drow;
        }
      
     
      require_once('views/depAdd/index.php');
    }
  }
?>