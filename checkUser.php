<?php
include 'connection.php';
$mno=$_GET["mno"];
$result =$conn->query("select * from buyer_info where mno='$mno'");
$nor=$result->num_rows;
if($nor==1){
	echo '1';
}
else
{
	echo '0';
}
?>
