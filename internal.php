
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
      <div class="container-fluid" style="background: #999;">
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
            <li><a href="fac_pro.php">Profile</a></li> m
            <li><a href="faculty.php">Upload Attandence</a></li>
            <li><a href="internal.php">Upload Marks</a></li>
            <li><a href="f_notif.php">Notification</a></li>            
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Upload Marks</h1>

          <div class="row placeholders">
          
           <div class="table-responsive">
           <table class="table">
           <form method="post">
           <tr>
           <td><select class="form-control" name="branch">
           <option selected disabled>Select Branch</option>
<option>CSE</option>
<option>EC</option>
<option>EN</option>
<option>ME</option>
           </select></td>
           <td>
           <select id="batch1" class="form-control" name="batch">
<option selected disabled>Select Batch</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
           </select>
         <td>  <select id="subject" class="form-control">
         <option>DBMS</option>
	     <option>CA</option>
         <option>COMPILER</option>
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
			$batch=$_POST["batch"];
	

			$q="select rno,name from student_info where branch='$branch' and batch='$batch' ;";
			$result = $conn->query($q);
			
			?>
    
	   
           <form method="post" action="">
           <table class="table " style="text-align:left;">
            <tr style="color:#428bca;"><td>Roll NO</td><td>Name</td><td>CT1</td><td>CT2</td><td>PUT</td></tr>
          <?php
		  
 while($row=$result->fetch_assoc())
  {?>
	
	  <tr>
	 	   <?php echo '<td>'.$row["rno"].'</td>';
			 	echo '<td>'.$row["name"].'</td>';
				$ct1=$row["rno"]+"a";
				$ct2=$row["rno"]+"b";
				$put=$row["rno"]+"c";
				echo '<td><input type="text" class="form-control" name="$ct1" ></td>';
				echo '<td><input type="text" class="form-control" name="$ct2" ></td>';
				echo '<td><input type="text" class="form-control" name="$put" ></td>';
			?>	
	 </tr>
     
<?php }
	}
?>
	<tr><td><input type="submit" name="marks"  class="form-control"></td></tr>
        
    
          </table>
          
 
           </form> 
         </div>
         
           
           

             </div>
        </div>
      </div>
    </div>
    <?php
	if(isset($_POST["marks"]))
	{
		echo $ct1;
	}
	?>
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
