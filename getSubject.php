<?php
	include 'connection.php';
	$sc=$_GET["sc"];
	//$sc1=$_GET["sc1"];
	//$sc="cse";
	$result=$conn->query("select s1,s2,s3,s4,s5,s6 from subject where branch='$sc' ");
	//echo '<option selected="selected" disabled="disabled">Select Subject </option>';
	while($row=$result->fetch_assoc())
	{
		echo '<option value="'.$row["s1"].'">'.$row["s1"].' </option>';
		echo '<option value="'.$row["s2"].'">'.$row["s2"].' </option>';
		echo '<option value="'.$row["s3"].'">'.$row["s3"].' </option>';
		echo '<option value="'.$row["s4"].'">'.$row["s4"].' </option>';
		echo '<option value="'.$row["s5"].'">'.$row["s5"].' </option>';
		echo '<option value="'.$row["s6"].'">'.$row["s6"].' </option>';
	}

?>