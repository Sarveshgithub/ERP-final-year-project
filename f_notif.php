	<?php
session_start();
//include 'session.php';
include 'connection.php';
 //$tablename =$_SESSION["un"];
if(isset($_POST["addproduct"]))
	{   
			$p_id=$_POST["p_id"];
			
			$p_name=$_POST["p_name"];
			$p_price=$_POST["p_price"];
			$p_quantity=$_POST["p_quantity"];

			$q="insert into $tablename values('$p_id','$p_name','$p_price','$p_quantity');";
			$result = $conn->query($q);
			if($result)
			{
				echo '<script>alert("Record Added")</script>';
			}
			else{
				echo '<script> $conn->error </script>';
			}
	}
?>
 <?php
 /* if(isset($_POST["atten"]));
  {
	  $id=implode(",",$_POST["rno"]);

echo $id;  }*/
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
            <li><a href="fac_pro.php">Profile</a></li>
            <li><a href="faculty.php">Upload Attandence</a></li>
            <li><a href="internal.php">Upload Marks</a></li>
            <li><a href="f_notif.php">Notification</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Notification</h1>

          <div class="row placeholders">
          
           <div class="table-responsive">
           <table class="table">
           <tr><td>Title</td>
           <td>Date & Time</td>
           <td>Download</td>
           </tr>
		   <?php
		     $q="select * from notif";
			 $result=$conn->query($q);
			 while($row=$result->fetch_assoc())
			 {
				 echo '<tr>';
				 echo '<td>'.$row["title"].'</td>'; 
				 echo '<td>'.$row["date"].'</td>';
				 echo '<td><a href='.$row["filename"].' download>Download</a></td>';
			
			 }
		   ?>
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
