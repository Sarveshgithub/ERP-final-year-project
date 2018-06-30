<?php
session_start();
unset($_SESSION['un']);
unset($_SESSION["admin"]);
unset($_SESSION["fac"]);
session_destroy();
header("location:index.php");
?>