<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/jquery-1.12.1.min.js"></script>
</head>

<body>
<select id="batch1">
<option value="2013">2013</option>
<option value="2014">2013</option>
<option value="2015">2013</option>
</select>
<select id="subject">
</select>
<script>
		$(document).ready(function(e) {
               
				
				$("#batch1").change(function()
				{
						var x=this.value;
						//alert(x);
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
</body>
</html>