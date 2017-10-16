<div class="well form-horizontal">
    <script>
        function edit(id,type){
            var id;
            var type;
             if(type=='edit'){
                  document.getElementById("edit_empId").value=id;
                  document.getElementById("edit").submit();
                   }else if(type=='delete'){
                   document.getElementById("del_empId").value=id;
                   document.getElementById("delete").submit();
            } 
        }
        
        function mainSearch(){
            document.getElementById("contact_form").submit(); 
        }
    </script>
   <form  action="?controller=departmentEmployee&action=index" method="post"  id="contact_form" name="contact_form">
      <fieldset>
         <legend>
            <center>
               <b>Department</b>
            </center>
         </legend>
         <div class="form-group">
            <label class="col-md-4 control-label">Choose Department</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
                  <span class="input-group-addon">
                  <i class="glyphicon glyphicon-list"></i>
                  </span>
                   <?php 
                   $parentId=$depName="";
                    foreach($allEmployee as $emp){
                        $parentId=$emp->parent_node;
                        break;
                    }
                   ?>
                   
                   <select name="department" class="form-control selectpicker" onchange="mainSearch()" >
                      <?php
                            foreach($allDepartments as $parent) {?>
                      <option   <?php if($parent->Department_id==$parentId){echo ' selected=""'; $depName=$parent->Department_name; }?> value='<?php echo $parent->Department_id;?>'><?php echo $parent->Department_name; ?></option>    
                            <?php }?>
                  </select>
               </div>
            </div>
         </div>
       
         <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <!--
            <div class="col-md-4">
               <br>
               <button type="submit" class="btn btn-warning" >SUBMIT 
               <span class="glyphicon glyphicon-send"></span>
               </button>
            </div>-->
         </div>
      </fieldset>
   </form>
  <h2>All employee's Department:-<?php echo $depName;?></h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>NIC</th>
        <th>Contact</th>
        <th>Birth Day</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach($allEmployee as $employee) { ?>
      <tr>
        <td><?php echo $x;?></td>
        <td><?php echo $employee->First_Name; ?></td>
        <td><?php echo $employee->LastName; ?></td>
        <td><?php echo $employee->NIC; ?></td>
        <td><?php echo $employee->Conatct_no; ?></td>
        <td><?php echo $employee->birth_day; ?></td>
        <td>
            <div class="btn-group btn-group-sm">
            <button type="submit" class="btn btn-info" onclick="edit(<?php echo $employee->EmployeeId; ?>,'edit')">Edit</button>
            <button type="submit" class="btn btn-danger" onclick="edit(<?php echo $employee->EmployeeId; ?>,'delete')">Delete</button>
            </div>
            
        </td>
      </tr>
        <?php $x++;}?>
    </tbody>
    <form  action="?controller=editEmployee&action=index" method="post"  id="edit" id="edit">
        <input type="hidden" name="edit_empId" id="edit_empId" value=""/>
     </form>
    <form  action="?controller=deleteEmployee&action=index" method="post"  id="delete" id="delete">
        <input type="hidden" name="del_empId" id="del_empId" value=""/>
     </form>
  </table>
</div>
</div>

