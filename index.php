<?php
include 'connection.php';
if(isset($_POST["login1"]))
	{
		$rno=$_POST["mno"];
		$pass=$_POST["pass"];
		$result=$conn->query("select * from student_info where rno='$rno' and pass='$pass'");
       $nor=$result->num_rows;
	  echo '<script> alert($nor)</script>';
     if($nor==1){
		 session_start();
	 $_SESSION["un"]=$rno;
	// $_SESSION["un1"]=$suserreceipt;
	  header('Location: stu_pro.php');
 }
 else{
	 echo  '<script>
	  alert("wrong username and password");
	
	  </script>';
	 // header('Location: index.php');
 }
	}
	if(isset($_POST["login4"]))
	{
		$suser1=$_POST["aid"];
		$spass1=$_POST["apass"];
		$result=$conn->query("select * from admin where id='$suser1' and pass='$spass1'");
       $nor=$result->num_rows;
	 
     if($nor==1){
		 session_start();
	 $_SESSION["admin"]=$suser1;
	  header('Location:admin_stu.php');
 }
 else{
	 echo  '<script>
	  alert("wrong username and password");
	
	  </script>';
	 // header('Location: index.php');
 }
	}
	if(isset($_POST["login2"]))
	{
		$suser1=$_POST["fid"];
		$spass1=$_POST["fpass"];
		$result=$conn->query("select * from fac_info where f_id='$suser1' and pass='$spass1'");
       $nor=$result->num_rows;
	 
     if($nor==1){
		 session_start();
	 $_SESSION["fac"]=$suser1;
	  header('Location:fac_pro.php');
 }
 else{
	 echo  '<script>
	  alert("wrong username and password");
	
	  </script>';
	 // header('Location: index.php');
 }
	}
	?>
<!DOCTYPE html>
<!--
++++++++++++++++++++++++++++++++++++++++++++++++++++++
AUTHOR : Vijayan PP
PROJECT :NIM
VERSION : 1.1
++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>College ERP</title>
	<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	<!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

	<!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
	<link rel="shortcut icon" type="image/x-icon" href="images/Capture.PNG">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	<!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/color/rose.css">
	<style type="text/css">
	body,td,th {
	font-family: Lato, sans-serif;
	overflow:hidden;
}

    </style>
</head>
<body scroll="no">
<!-- [ LOADERs ]
================================================================================================================================-->	
    <div class="preloader">
    <div class="loader theme_background_color">
        <span></span>
      
    </div>
</div>
<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">
  <!-- [NAV]
 


   <!-- [/NAV]
 ============================================================================================================================--> 
    
   <!-- [/MAIN-HEADING]
 ============================================================================================================================--> 
   <section class="main-heading" id="home">
       <div class="overlay">
           <div class="container">
               <div class="row">
                   <div class="main-heading-content col-md-12 col-sm-12 text-center">
        <h1 class="main-heading-title">Welcome</h1>
        <p class="main-heading-text">You are </p>
        <div class="btn-bar">
          <a href="#" class="btn btn-custom-outline" data-target="#loginModal1" data-toggle="modal">Student</a>
          <a href="#" class="btn btn-custom-outline" data-target="#loginModal2" data-toggle="modal">Faculty</a>
          <a href="#" class="btn btn-custom-outline" data-target="#loginModal3" data-toggle="modal">Staff</a>
          <a href="#" class="btn btn-custom-outline" data-target="#loginModal4" data-toggle="modal">Admin</a>                    
        </div>
      </div>
               </div>
           </div>
       </div>  
      
   </section>
   
<div class="row">
<div class="col-xs-12">
<div class="modal" id="loginModal1" tabindex="-1" >
<div class="modal-dialog" style="background-color:#2D2D2D;" >
 <div class="modal-header" >
 	<button class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Student Login</h4>
 </div>
 <div class="modal-body">
<form class="form-horizontal" method="post">
<span id="spanErr" style="font-size:10pt;color:red;"></span>
  <label for="Login">Rollno</label>
  <input style="color:#FFF; height:40px; width:500px;" class="form-control" type="text" name="mno" id="mno" placeholder="Enter only 10 digit">
  
  <label for="Login">Password</label>
  <input style="color:#FFF; height:40px; width:500px;" class="form-control" id="pass" name="pass" type="password" placeholder="Password">
  <br>
  <input class="form-control"  style="color: #FFF; background-color:#00F; height:40px; width:500px; " type="submit" name="login1" value="Login">
  
 </form>
 <br>
 
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="modal" id="loginModal2" tabindex="-1" >
<div class="modal-dialog" style="background-color:#666;" >
 <div class="modal-header" >
 	<button class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Faculty Login</h4>

   
 </div>
 <div class="modal-body">
 <form class="form-horizontal" method="post">
  <label for="Login">Username</label>
  <input style="color:#FFF; height:40px; width:500px;" name="fid" class="form-control" type="text">
  <label for="Login">Password</label>
  <input style="color:#FFF; height:40px; width:500px;" name="fpass" class="form-control" type="password">
  <br>
  <input class="form-control"  style="color:#000; background-color:#03C; height:40px; width:500px;" name="login2" type="submit" value="Login">
  
 </form>

</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-12">
<div class="modal" id="loginModal3" tabindex="-1" >
<div class="modal-dialog" style="background-color:#666;" >
 <div class="modal-header" >
 	<button class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Staff Login</h4>

   
 </div>
 <div class="modal-body">
 <form class="form-horizontal" method="post">
  <label for="Login">Username</label>
  <input style="color:#FFF; height:40px; width:500px;" name="sid" class="form-control" type="text">
  <label for="Login">Password</label>
  <input style="color:#FFF; height:40px; width:500px;" name="spass" class="form-control" type="password">
  <br>
  <input class="form-control"  style="color:#000; background-color:#03C; height:40px; width:500px;" name="login3" type="submit" value="Login">
  
 </form>

</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="modal" id="loginModal4" tabindex="-1" >
<div class="modal-dialog" style="background-color:#666;" >
 <div class="modal-header" >
 	<button class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Admin Login</h4>

   
 </div>
 <div class="modal-body">
 <form class="form-horizontal" method="post">
  <label for="Login">Username</label>
  <input style="color:#FFF; height:40px; width:500px;" name="aid" class="form-control" type="text">
  <label for="Login">Password</label>
  <input style="color:#FFF; height:40px; width:500px;" name="apass" class="form-control" type="password">
  <br>
  <input class="form-control"  style="color:#000; background-color:#03C; height:40px; width:500px;" name="login4" type="submit" value="Login">
  
 </form>

</div>
</div>
</div>
</div>
</div>
</div>
 <!-- [/MAIN-HEADING]
 ============================================================================================================================-->
 
 
 <!-- [ABOUT US]
 ============================================================================================================================-->
 
 
 
 <!-- [/ABOUTUS]
 ============================================================================================================================-->
 
 
 
 <!-- [RECENT-WORKS]
 ============================================================================================================================-->
    
    <!-- / Portfolio -->
 
 
 <!-- [/OUR-RECENT WORKS]
 ============================================================================================================================-->
 
  <!-- [OUR TEAM]

 
 <!-- [/OUR TEAM]
 ============================================================================================================================-->
 
 
 
 

 
 <!-- [/INSPIRATION]
 ============================================================================================================================--> 

 
 
 
 <!-- [/STATS]
 ============================================================================================================================-->
 
 
 
 
 <!-- [/TESTIMONIAL]
 ============================================================================================================================-->
 
 <!-- [/SERVICES]
 ============================================================================================================================-->
 
 
 
 
 <!-- [/SERVICES]
 ============================================================================================================================-->
 
 
 <!-- [CONTACT]
 ============================================================================================================================-->
 <!--sub-form-->

<!--sub-form end--> 


 
 <!-- [/CONTACT]
 ============================================================================================================================-->
 
 
 <!-- [FOOTER]
 ============================================================================================================================-->
 


 
 
 <!-- [/FOOTER]
 ============================================================================================================================-->
 
 
 

 

<!-- [ /WRAPPER ]
=============================================================================================================================-->

	<!-- [ DEFAULT SCRIPT ] -->
	<script src="library/modernizr.custom.97074.js"></script>
	<script src="library/jquery-1.11.3.min.js"></script>
        <script src="library/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>	
	<!-- [ PLUGIN SCRIPT ] -->
        <script src="library/vegas/vegas.min.js"></script>
	<script src="js/plugins.js"></script>
        <!-- [ TYPING SCRIPT ] -->
         <script src="js/typed.js"></script>
         <!-- [ COUNT SCRIPT ] -->
         <script src="js/fappear.js"></script>
       <script src="js/jquery.countTo.js"></script>
	<!-- [ SLIDER SCRIPT ] -->  
        <script src="js/owl.carousel.js"></script>
         <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        
        <!-- [ COMMON SCRIPT ] -->
	<script src="js/common.js"></script>
  
</body>


</html>