	<?php
session_start();
include 'admin_session.php';
include 'connection.php';
 //$tablename =$_SESSION["un"];
?>
 <?php
  if(isset($_GET["year"])&&($_GET["branch"]))
  {
$s="delete from subject where year='".$_GET["year"]."' and branch='".$_GET["branch"]."'";
$conn->query($s);	 

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
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar" style=" background: #0F0;"></span>
            <span class="icon-bar" style=" background: #0F0;"></span>
            <span class="icon-bar" style=" background: #0F0;"></span>
          </button>
         <h1  style="color: #FFF;">College ERP</h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li style="color:#FFF; padding:20px;">Welcome</li>
             <li style="color:#FFF; padding:20px;"><?php echo $_SESSION["admin"]; ?></li>
             <li style="color:#FFF; padding:5px;"><a href="logout.php">Logout</a></li>
          </ul>
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
          <h1 class="page-header">Update Subject</h1>

          <div class="row placeholders">
          
           <div class="table-responsive">
           <table class="table" border="2">
           
           
           <tr style="background-color:#FFF;"><td><h3>Year</h3></td><td><h3>Branch</h3></td>
           <td><h3>Subject1</h3></td><td><h3>Subject2</h3></td><td><h3>Subject3</h3></td>
           <td><h3>Subject4</h3></td><td><h3>Subject5</h3></td><td><h3>Subject6</h3></td>
           <td><h3>Edit</h3></td><td><h3>Delete</h3></td></tr>
           <?php
		     $q="select * from subject";
			 $result=$conn->query($q);
			 while($row=$result->fetch_assoc())
			 {
				 echo '<tr>';
				 echo '<td>'.$row["year"].'</td>';
				 $b1=$row["year"];
				 echo '<td>'.$row["branch"].'</td>';
				 echo '<td>'.$row["s1"].'</td>';
				 echo '<td>'.$row["s2"].'</td>';
				 echo '<td>'.$row["s3"].'</td>';
				 echo '<td>'.$row["s4"].'</td>';
				 echo '<td>'.$row["s5"].'</td>';
				 echo '<td>'.$row["s6"].'</td>';
				   echo '<td><a  href="edit_sub1.php?batch='.$row["year"].'&branch='.$row["branch"].'&s1='.$row["s1"].'&s2='.$row["s2"].'&s3='.$row["s3"].'&s4='.$row["s4"].'&s5='.$row["s5"].'&s6='.$row["s6"].'">edit</td>';
				 echo '<td><a href="edit_sub.php?year='.$row["year"].'&branch='.$row["branch"].'">Remove</a></td>';
				// echo '<td>"'.$row["batch"].'"</td>';
				 echo '</tr>';
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
