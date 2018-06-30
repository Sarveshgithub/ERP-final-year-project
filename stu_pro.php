<?php
session_start();
include 'session.php';
include 'connection.php';
 $tablename =$_SESSION["un"];
 if(isset($_POST["ep"]))
	{
		echo $cpass=$_POST["cpass"];
		$q='update student_info set pass="'.$cpass.'" where rno="'.$tablename.'";';
			$result = $conn->query($q);
			if($result)
			{
				echo '<script>alert("Succesfully Update");</script>';
				
			}
			else{
				echo '<script> $conn->error </script>';
			}
	}
if (isset($_POST["pic"]))
	{
		$name=$_FILES['file']['name'];
		$tmp_name=$_FILES['file']['tmp_name'];
		$type=$_FILES['file']['type'];
		if(!empty($name))
		{
			
			$location='upload/';
			move_uploaded_file($tmp_name,$location.$name);
			date_default_timezone_set('Asia/Calcutta'); 
            $date =date("Y-m-d H:i:s");
			$q="update student_info set pic='upload/$name' where rno=$tablename;";
			$result = $conn->query($q);
			if($result)
			{
				echo '<script>("Succesfully Uploaded")</script>';
			}
			else{
				echo '<script> $conn->error </script>';
			}
			
		}
		else
		{
			echo '<script>alert("Please choose a file")</script>';
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
      <div class="container-fluid"  >
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar" style=" background: #0F0;"></span>
            <span class="icon-bar" style=" background: #0F0;"></span>
            <span class="icon-bar" style=" background: #0F0;"></span>
          </button>
         <h1 style="color: #FFF;">College ERP</h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			 <li style="color:#FFF; padding:20px;">Welcome</li>
             <li style="color:#FFF; padding:20px;"><?php echo $_SESSION["un"]; ?></li>
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
            <li><a href="stu_pro.php">Profile</a></li>
            <li><a href="stu_att.php">Attendence</a></li>
            <li><a href="stu_intarnal.php">Marks</a></li>
            <li><a href="stu_notif.php">Notification</a></li>            
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Profile</h1>
          <div class="row placeholders">
          
           <div class="table-responsive">
           <table class="table">
           <form method="post">
           </form>
           </table>
           <?php
		  
	
		    mysql_connect("localhost","root","");
mysql_select_db("erp");
			
	

			$q1="select rno,name,pass,branch,year,mail,mno,dob,pic from student_info where rno=$tablename ;";
			$resource=mysql_query($q1);
			
			?>
    
	   
           <form method="post" action="">
           <table class="table " style="text-align:left; font-size:20px;">
          <!--  <tr style="color:#428bca;"><td>Roll NO</td><td>Name</td><td>CT1</td><td>CT2</td><td>PUT</td></tr>
  
	-->
	 
	 	   <?php 
		   
		      $row=mysql_fetch_row($resource);
			  ?>
		       <tr> <td>Roll No:</td><td><?php echo $row[0];?></td>
               <td rowspan="4" >
               <img alt="Please upload a profile pic." style="border:5px solid #428BCA;"src="<?php echo $row[8]; ?>" height="150px;" width="150px;">
               <a data-toggle="modal" data-target="#myModal">Upload</a>  
                </td></tr>
				<tr><td>Name:</td><td><?php echo $row[1];?></td></tr>
                <tr> <td>Password:</td><td><?php echo $row[2];?><a data-toggle="modal" data-target="#ep">
                edit</a></td></tr>
				<tr><td>Branch:</td><td><?php echo $row[3]; $_SESSION["b"]=$row[3];?></td></tr>
                  <tr> <td>Year:</td><td><?php echo $row[4];  $_SESSION["y"]=$row[4];?></td></tr>
				<tr><td>Mail-ID:</td><td><?php echo $row[5];?></td></tr>
                <tr> <td>Mobile No:</td><td><?php echo $row[6];?></td></tr>
				<tr><td>DOB:</td><td><?php echo $row[7];?></td></tr>
          </table>
          
 
           </form> 
         </div>
         
           
           

             </div>
        </div>
      </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
      
        <form method="post" action="stu_pro.php" method="post" enctype="multipart/form-data" >
                <input  type="file" class="form-control" name="file" >
                <input type="submit" value="Upload"  class="form-control" name="pic">
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="ep" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Password</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="stu_pro.php" method="post">
                <input  type="password" class="form-control" name="pass" required id="pass" placeholder="New Password" >
                <input  type="password" class="form-control" name="cpass" required id="cpass" onKeyUp="check();" placeholder="Conferm new Password" >
                <span id="msg" style="color:red;"></span>
                <input type="submit" value="Update"  class="form-control" name="ep">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
function check()
{
	var pass=document.getElementById('pass').value;
	var cpass=document.getElementById('cpass').value;
	if(pass!=cpass)
	{
		document.getElementById('msg').innerHTML="Password Do not Match";
	}
	else
	{
		document.getElementById('msg').innerHTML=" ";
	}
}
</script>
    <script>
		$(document).ready(function(e) {
               
				
				$("#batch1").change(function()
				{
						var x=this.value;
						alert(x);
						jQuery.ajax({
							url:'getSubject.php',
							data:'sc='+x,
							method:'GET',
							dataType:"json",
							success: function(response){
								$("#subject").html(response);
							}
						});
				});
            });
	</script>
    

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
