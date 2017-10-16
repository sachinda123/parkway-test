<DOCTYPE html>
<html>
   <head> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <body>
    <header>
         <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li <?php if($controller=='pages'){echo 'class="active"';}?> ><a href='./'>Home</a></li>
                <li <?php if($controller=='depAdd'){echo 'class="active"';}?>><a href='?controller=depAdd&action=index'>Department</a></li>
                <li <?php if($controller=='register'){echo 'class="active"';}?>><a href='?controller=register&action=index'>Registration</a></li>
                <li <?php if($controller=='departmentEmployee'){echo 'class="active"';}?>><a href='?controller=departmentEmployee&action=index'>View Employees</a></li>
                <?php if($controller=='editEmployee'){?><li class="active"><a href=''>Update details</a></li><?php }?>
                
            </ul>
        </nav>
    </header>

    <?php require_once('routes.php'); ?>
    <footer>
       <!--<nav class="navbar navbar-default"></nav>-->
    </footer>
  <body>
<html>