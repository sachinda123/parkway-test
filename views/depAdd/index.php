
<div class="well form-horizontal">
    <!--<script src="../../js/easyTree.js"></script>-->
    
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/easyTree.js"></script>
<link rel="stylesheet" href="css/easyTree.css">
    
    
    
   <form  action="?controller=saveDepartment&action=index" method="post"  id="contact_form">
      <fieldset>
         <legend>
            <center>
               <b>Add New Department</b>
            </center>
         </legend>
         <div class="form-group">
            <label class="col-md-4 control-label">Parent Department</label>
            <div class="col-md-4 selectContainer">
               <div class="input-group">
                  <span class="input-group-addon">
                  <i class="glyphicon glyphicon-list"></i>
                  </span>
                  <select name="department" class="form-control selectpicker" >
                      <?php 
                            foreach($allDepartment as $parent) {
                            echo "<option value='$parent->Department_id'>$parent->Department_name</option>";    
                            }?>
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-4 control-label">New Department</label>
            <div class="col-md-4 inputGroupContainer">
               <div class="input-group">
                  <span class="input-group-addon">
                  <i class="glyphicon glyphicon-earphone"></i>
                  </span>
                  <input name="new_department" placeholder="New department" class="form-control" type="text">
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
               <br>
               <button type="submit" class="btn btn-warning" >SUBMIT 
               <span class="glyphicon glyphicon-send"></span>
               </button>
            </div>
         </div>
      </fieldset>
   </form>
   <div class="easy-tree">
      <?php
         printtree($var,$name);
         ?>
   </div>
</div>
</div>
<script type="text/javascript">
   (function ($) {
          function init() {
              $('.easy-tree').EasyTree({
                  addable: false,
                  editable: false,
                  deletable: false
              });
          }
   
          window.onload = init();
      })(jQuery)
</script>
