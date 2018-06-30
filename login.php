<?php
 session_start();
 include 'connection.php';
 $un=$_GET["un"];
 $ps=$_GET["pass"];
 $result=$conn->query("select * from buyer_info where mno='$un' and pass='$ps'");
 $nor=$result->num_rows;
 if($nor==1){
	 $_SESSION["u"]=$un;
	 echo '1';
 }
 else{
	 echo '0';
 }
?>