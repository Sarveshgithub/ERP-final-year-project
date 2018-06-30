 <html>
 <head>
  <script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
  
 
 </head>
 <body>
 <form>
 <input type="text" id="t1" onKeyUp="mul();">
 <input type="text" id="t2" value="20">
 <input type="text" id="t3">
 </form>
  <script>
  function mul()
  {
	  var a=document.getElementById('t1').value;
	  var b=document.getElementById('t2').value;
	  //alert(b);	  
      var c=a*b;
    document.getElementById("t3").setAttribute("value",c);
  }
  </script>
  </body>
 </html>
 <?php

date_default_timezone_set('asia/kolkata'); 
echo  $date = date('d-m-Y H:i:s');
 ?>

 