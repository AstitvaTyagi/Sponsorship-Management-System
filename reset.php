<?php
 $mysql_hostname = "localhost";
 $mysql_user="root";
 $mysql_password = "";
 $mysql_database="sponsorship";
 
 $a = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect to the database");
 
 mysql_select_db($mysql_database,$a)or die("Could not connect to database");
 
 $query=mysql_query("update login set status=0");
 header("location:login.php");
?>