<?php
session_start();
include 'fac_session.php';
include 'connection.php';
$tablename =$_SESSION["fac"];
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
      <div class="container-fluid" >
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
             <li style="color:#FFF; padding:20px;"><?php echo $_SESSION["fac"]; ?></li>
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
            <li><a href="fac_pro.php">Profile</a></li>
            <li><a href="faculty.php">Upload Attandence</a></li>
            <li><a href="internal.php">Upload Marks</a></li>
            <li><a href="f_notif.php">Notification</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Upload Attendence</h1>

          <div class="row placeholders">
          
           <div class="table-responsive">
             <table class="table">
           <form method="post">
           <tr>
           <td><select class="form-control" name="year" id="year">
           <option selected disabled>Select Year</option>
<option value="1">1st</option>
<option value="2">2nd</option>
<option value="3">3rd</option>
<option value="4">4th</option>
           </select></td>
           <td><select class="form-control" name="branch" id="branch">
           <option selected disabled>Select Branch</option>
<option value="CSE">CSE</option>
<option value="EC">EC</option>
<option value="EN">EN</option>
<option value="ME">ME</option>
           </select></td>
          
           
         <td>  <select id="subject" class="form-control">
     
         </select>
         </td>
         
            <td><input class="form-control" type="submit" name="record" class="btn btn-default"></td>
           </tr>
           </form>
           </table>
           <?php
		   if(isset($_POST["record"]))
	{
		    
			$branch=$_POST["branch"];
			$batch=$_POST["year"];
			//$subject=$_POST["subject"];
		     date_default_timezone_set('Asia/Calcutta'); 
$date= date("Y-m-d H:i:s");
	

			$q="select rno,name from student_info where branch='$branch' and year='$batch' ;";
			$result = $conn->query($q);
			
			?>
         <form method="post" action="?">
           <table class="table " style="text-align:left;">
            <tr>
  <td></td><td></td><td><input name="RemoveAll" id="RemoveAll" type="radio" class="a" value="Y">All Present</td>
  <td><input name="RemoveAll" id="RemoveAll" type="radio" class="b" value="Y">All Present</td>
  </tr>
          <?php
 while($row=$result->fetch_assoc())
  {?>
  
	  <tr>
	 	   <?php 
		   		 echo '<td>'.$row["rno"].'</td>';
			 	 echo '<td>'.$row["name"].'</td>';
			     echo '<td><input type="radio"  name="'.$row["rno"].'" class="radioR" value="1" >A</td>';
				 echo '<td><input type="radio"  name="'.$row["rno"].'" class="allp"  value="0" >P</td>';
				 echo '<td><a href="faculty.php?rno='.$row["rno"].'">Atten</a></td>';
			?>	
	 </tr>
<?php }
	}
?>
    </table>
          <input class="form-control" type="submit" name="atten"  class="btn btn-default">
 
           </form> 
         </div>
         </div>
        </div>
      </div>
    </div>
 <script>
$("#RemoveAll").change(function() {
    if ($("input:radio.a").is(':checked'))
            $("input:radio.radioR").attr("checked","checked"); 
    });
	$("#RemoveAll").change(function() {
   if ($("input:radio.b").is(':checked'))
            $("input:radio.allp").attr("checked","checked");

   // else
     //       $("input:radio.allp").attr("checked","checked"); 
    });

	
		$(document).ready(function(e) {
			   $("#branch").change(function()
				    {
						    var x=this.value;
						    jQuery.ajax({
							url:'getSubject.php',
							data:'sc='+x,
							method:'GET',
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
