<?php
 session_start();
 $uname=$_SESSION['user'];
 if(isset($_SESSION['user']))
 session_destroy();
 
   $mysql_hostname = "localhost";
   $mysql_user="root";
   $mysql_password = "";
   $mysql_database="sponsorship";
   $a = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect to the database");
 
   mysql_select_db($mysql_database,$a)or die("Could not connect to database");
 
   $query=mysql_query("update login set status=0 where username='$uname'");
   if(!$query)
   	echo mysql_error();
   header("Location:login.php");

?>