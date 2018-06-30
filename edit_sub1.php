	<?php
session_start();
//include 'session.php';
include 'connection.php';
 //$tablename =$_SESSION["un"];
if(isset($_POST["submit"]))
	{
			$batch=$_GET["batch"];
			$branch=$_GET["branch"];
			$s1=$_POST["s1"];
			$s2=$_POST["s2"];
			$s3=$_POST["s3"];
			$s4=$_POST["s4"];
			$s5=$_POST["s5"];
			$s6=$_POST["s6"];

			$q="update subject set  s1='$s1',s2='$s2',s3='$s3',s4='$s4',s5='$s5',s6='$s6' where year='$batch' and branch='$branch';";
			$result = $conn->query($q);
			if($result)
			{
				echo '<script>alert("Succesfully Update")</script>';
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
            <li><a href="admin_notifdel.php">Delete Notification</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edit Subject</h1>

          <div class="row placeholders">
          
           <div class="table-responsive">
           <table class="table">
           
  <form method="post">
   <tr><td><label>Year</label></td><td>
   <input disabled type="text" name="batch" class="form-control" value="<?php echo $_GET["batch"]; ?>"></td></tr>
   <tr><td><label>Branch</label></td><td><input disabled  type="text" name="batch" class="form-control" value="<?php echo 
   $_GET["branch"]; ?>"></td></tr>
    <tr><td><label>Subject 1</label></td><td><input type="text" name="s1" class="form-control" value="<?php echo $_GET["s1"]; ?>"></td></tr>
    <tr><td><label>Subject 2</label></td><td><input type="text" name="s2" class="form-control" value="<?php echo $_GET["s2"]; ?>"></td></tr>
    <tr><td><label>Subject 3</label></td><td><input type="text" name="s3" class="form-control" value="<?php echo $_GET["s3"]; ?>"></td></tr>
     <tr><td><label>Subject 4</label></td><td><input type="text" name="s4" class="form-control" value="<?php echo $_GET["s4"]; ?>"></td></tr>
     <tr><td><label>Subject 5</label></td><td><input type="text" name="s5" class="form-control" value="<?php echo $_GET["s5"]; ?>"></td></tr>
      <tr><td><label>Subject 6</label></td><td><input type="text" name="s6" class="form-control" value="<?php echo $_GET["s6"]; ?>"></td></tr>   
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
