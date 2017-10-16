<script  src="js/index.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    function valid(){
        //alert('kkk');
        var nic=document.getElementById("nic").value;
        if(isNaN(nic)||nic.indexOf(" ")!=-1)
           { alert("Enter numeric NIC")
              return false; 
           }
           if (nic.length>9)
           {
                alert("enter 9 characters NIC");
                return false;
           }
          var con=document.getElementById("contact_no").value;
          if(isNaN(con)||con.indexOf(" ")!=-1)
           {
              alert("Enter numeric contact mobile num")
              return false; 
           }
           if (con.length!==10)
           {
                alert("enter 10 characters mobile num");
                return false;
           }
        // alert(con.length);
         //return false;
    }
</script>
<div class="container">
    <?php foreach($getDetail as $detail){
        //print_r($detail);
        ?>
	<form class="well form-horizontal" action="?controller=updateEmployee&action=index" method="post"  id="contact_form">
		<fieldset>
			<legend><center>
			<h2><b>Employee Update</b></h2>
				</center>
			</legend>
			<br>
				<div class="form-group">
					<label class="col-md-4 control-label">First Name</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
                                                    <input  name="first_name" placeholder="First Name" class="form-control"  type="text" value="<?php
                                                    echo $detail->First_Name ;?>" required >
							</div>
						</div>
                                        <input type="hidden" name="EmployeeId" id="EmployeeId" value="<?php echo $detail->EmployeeId ;?>"/>
					</div>
                        
					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" >Last Name</label>
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
								<input name="last_name" placeholder="Last Name" class="form-control"  type="text"
                                                                       value="<?php echo $detail->LastName ;?>" required >
								</div>
							</div>
						</div>
                                        <div class="form-group">
						<label class="col-md-4 control-label" >NIC number</label>
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
                                                            <input name="nic" id="nic" placeholder="xxxxxxxxx" class="form-control"  type="text" value="<?php echo $detail->NIC;?>" required >
								</div>
							</div>
						</div>
                                        
                                        <div class="form-group">
						<label class="col-md-4 control-label" >Birth day</label>
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span> 
                                                            <input name="datepicker" placeholder="yyyy-mm-dd"  id="datepicker" class="form-control"  type="text" value="<?php echo $detail->Bday;?>" required >
							
                                                            </div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Department / Office</label>
							<div class="col-md-4 selectContainer">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="glyphicon glyphicon-list"></i>
									</span>
									<select name="department" class="form-control selectpicker" >
                                                                            <?php 
                                                                                foreach($allDepartment as $dep) {?>
                                                                                     <option <?php if($dep->Department_id==$detail->Department){echo ' selected';}?>
                                                                                         value='<?php echo $dep->Department_id?>'><?php echo $dep->Department_name;?></option>
                                                                                <?php
                                                                                } ?>	
									</select>
								</div>
							</div>
						</div>
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-4 control-label">Contact No.</label>
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-earphone"></i>
										</span>
										<input name="contact_no" id="contact_no" placeholder="xxxxxxxxxx" class="form-control" type="text" value="<?php echo $detail->Conatct_no;?>" required >
										</div>
									</div>
                                                        </div>
								<div class="form-group">
									<label class="col-md-4 control-label"></label>
									<div class="col-md-4">
										<br>
											<button type="submit" class="btn btn-warning" onclick="return valid()" >Update 
												<span class="glyphicon glyphicon-send"></span>
											</button>
										</div>
									</div>
								</fieldset>
							</form>
                             <?php }?>
						</div>
					</div>
				<script>
//                                   $(document).ready(function(){
//                                    $( "#datepicker" ).datepicker("setDate", new Date(2008,9,03));
//                                 });
  				</script>
					