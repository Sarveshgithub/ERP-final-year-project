	<?php
session_start();
//include 'session.php';
include 'connection.php';
 //$tablename =$_SESSION["un"];
if(isset($_POST["submit"]))
	{
			 $rno=$_GET["rno"];
			$name=$_POST["name"];
		  $branch=$_POST["branch"];
			$mail=$_POST["mail"];
		     $mno=$_POST["mno"];
			 $add=$_POST["add"];
			
			$q="update fac_info set  name='$name',dept='$branch',mail='$mail'
			,mno='$mno',add='$add' where f_id='$rno';";
			$result = $conn->query($q);
			if($result)
			{
				echo '<script>alert("Succesfully Update");</script>';
			}
			else{
				echo '<script> $conn->error </script>';
			}
	}
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
 <script src="js/jquery-1.12.1.min.js"></script>
    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background: #EAEAEA;">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid" style="background: #FFF;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar" style=" background: #0F0;"></span>
            <span class="icon-bar" style=" background: #0F0;"></span>
            <span class="icon-bar" style=" background: #0F0;"></span>
          </button>
         <h1>College ERP</h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
             <li> <?php

           //    echo $_SESSION["un"];
              ?></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
           <li class="active"><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>
              <li><a href="admin_stu.php">Add New Student</a></li>
             <li><a href="admin_fac.php">Add New Faculty</a></li>
            <li><a href="admin.php">Add Subjects</a></li>
            <li><a href="edit_sub.php">Edit Subjects</a></li>
             <li><a href="admin_stuinfo.php">Student Record</a></li>
              <li><a href="admin_facinfo.php">Faculty Record</a></li>
              <li><a href="admin_att.php">Attendence Record</a></li>
              <li><a href="admin_intarnal.php">Intarnal Marks Record</a></li>
            <li><a href="admin_notif.php">Generate Notification</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edit Faculty Info</h1>

          <div class="row placeholders">
          
           <div class="table-responsive">
           <table class="table">
           
  <form method="post">
   <tr><td><label>F_ID</label></td><td>
   <input disabled type="text" name="rno" class="form-control" value="<?php echo $_GET["rno"]; ?>"></td></tr>
   <tr><td><label>Name</label></td><td><input type="text" name="name" class="form-control" value="<?php echo 
   $_GET["name"]; ?>"></td></tr>
    <tr><td><label>Department</label></td>
    <td>
    <select class="form-control " name="branch">
    <option><?php echo $_GET["dept"]; ?></option>
    <option>ME</option>
    <option>EN</option>
    <option>EC</option>
    </select>
    </td></tr>
     <tr><td><label>Mail ID</label></td><td><input type="text" name="mail" class="form-control" value="<?php echo $_GET["mail"]; ?>"></td></tr>
     <tr><td><label>Mobile No</label></td><td><input type="text" name="mno" class="form-control" value="<?php echo $_GET["mno"]; ?>"></td></tr>
      <tr><td><label>Add</label></td><td>
      <textarea class="form-control" rows="3" name="add"><?php echo $_GET["add"]; ?> </textarea></td></tr>   
           <tr><td colspan="2"> <input type="submit" value="Edit"  class="form-control" name="submit"> </td> </tr>
           </form>
           </table> 
         </div>
         </div>
        </div>
      </div>
    </div>
 
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
   
  </body>
</html>
