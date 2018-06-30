
	<?php
session_start();
include 'session.php';
include 'connection.php';
$tablename =$_SESSION["un"];
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
          <h1 class="page-header">Marks</h1>

          <div class="row placeholders">
          
           <div class="table-responsive">
                 <?php
		  
	    
	 
		   $y=$_SESSION["y"];
		   $b=$_SESSION["b"];
		   $yb=$y.$b;
			$q="select * from subject where year='".$_SESSION["y"]."' and branch='".$_SESSION["b"]."';";
			$result = $conn->query($q);
		?>
	<table class="table " border="2">
        <?php
while($row=$result->fetch_assoc())
  {?>
		 <tr style="background-color:#FFF;">
	 	   <?php 
		        echo '<td><h3>Rollno</h3></td>';
			 	echo '<td><h3>'.$row["s1"].'</h3></td>';
				echo '<td><h3>'.$row["s2"].'</h3></td>';
				echo '<td><h3>'.$row["s3"].'</h3></td>';
				echo '<td><h3>'.$row["s4"].'</h3></td>';
				echo '<td><h3>'.$row["s5"].'</h3></td>';
				echo '<td><h3>'.$row["s6"].'</h3></td>';
				echo '<td><h3>TM</h3></td>';
				echo '<td><h3>TMO</h3></td>';
				echo '<td><h3>Percentage</h3></td>';		
			?>	
		 </tr>   
<?php }	
?>
           <?php
			$q="select * from $yb where rno=$tablename;";
			$result = $conn->query($q);
			
			?>
    
	   
           <form method="post" action="">
          
           
           
          <?php
		  
 while($row=$result->fetch_assoc())
  {?>
	
	  <tr>
	 	   <?php echo '<td>'.$row["rno"].'</td>';
			 	echo '<td>'.$row["s1i"].'</td>';
				echo '<td>'.$row["s2i"].'</td>';
				echo '<td>'.$row["s3i"].'</td>';
				echo '<td>'.$row["s4i"].'</td>';
				echo '<td>'.$row["s5i"].'</td>';
				echo '<td>'.$row["s6i"].'</td>';
				echo '<td>300</td>';
				$tmo=$row["s1i"]+$row["s2i"]+$row["s3i"]+$row["s4i"]+$row["s5i"]+$row["s6i"];
				echo '<td>'.$tmo.'</td>';
				$per=($tmo/300)*100;
				echo '<td>'.$per.'</td>';
			?>	
	 </tr>
     
<?php }
	
?>
	
       
    
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
        <h4 class="modal-title">Percentage</h4>
      </div>
      <div class="modal-body">
      
        <?php
		if(isset($_GET["s1"])&&($_GET["s2"]&&$_GET["s3"])&&($_GET["s4"]&&$_GET["s5"])&&($_GET["s6"]))
		{
			$s1 =$_GET["s1"]+$_GET["s2"]+$_GET["s3"]+$_GET["s4"]+$_GET["s5"]+$_GET["s6"];
	        echo "Total Lecture Held=60"; echo '<br>';
   			echo "Total Lecture Attend=".$s1;  echo '<br>';
			echo "Persentage=".($s1/60)*100; echo "%";		
		}
		?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
