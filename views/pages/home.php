
<div class="container">
    <div class="well form-horizontal">
        <h4>Total employee's :-<?php echo $empcount; ?></h4>
        <h4>Total Department's :-<?php echo $depcount; ?></h4>
        <script>
             function mainSearch(){
            document.getElementById("contact_form").submit(); 
                }
        </script>
        
    <form  action="?controller=pages&action=home" method="post"  id="contact_form" name="contact_form">
      <fieldset>
         <legend>
            <center>
               <b>Audit Department</b>
            </center>
         </legend>
         <div class="form-group">
            <label class="col-md-4 control-label">Choose Department</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
                  <span class="input-group-addon">
                  <i class="glyphicon glyphicon-list"></i>
                  </span>
                   <select name="department" class="form-control selectpicker" onchange="mainSearch()" >
                      <?php 
                            foreach($auditEmployee as $var){
                              //print_r($var);
                            $dep=$var->deparment;
                              break;
                            }
                          
                            foreach($allDepartments as $parent) {?>
                      <option <?php if($dep==$parent->Department_id){echo 'selected="selected"';} ?> value='<?php echo $parent->Department_id;?>'><?php echo $parent->Department_name; ?></option>    
                            <?php }
                            
                            ?>
                  </select>
               </div>
            </div>
         </div>
       
         <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <!--<div class="col-md-4">
               <br>
               <button type="submit" class="btn btn-warning" >SUBMIT 
               <span class="glyphicon glyphicon-send"></span>
               </button>
            </div>-->
         </div>
      </fieldset>
   </form>
        <div class="table-responsive">          
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Update Feild</th>
                      <th>Old value</th>
                      <th>Update value</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $v=1;
                        foreach($auditEmployee as $audit){
                          //print_r($audit);  
                      ?>
                    <tr>
                      <td><?php echo $v;?></td>
                      <td><?php echo $audit->empfull_name; ?></td>
                      <td><?php echo $audit->Status; ?></td>
                      <td><?php echo $audit->Feild_name; ?></td>
                      <td><?php echo $audit->Old_value; ?></td>
                      <td><?php echo $audit->New_value; ?></td>
                      <td><?php echo $audit->Time; ?></td>
                    </tr>
                        <?php $v++; }?>
                  </tbody>
                </table>
              </div>
    </div>
</div>