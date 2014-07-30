<?php
 $username=$_POST['username'];
 $password=$_POST['password'];
 
 $mysql_hostname = "localhost";
 $mysql_user="root";
 $mysql_password = "";
 $mysql_database="sponsorship";
 
 $a = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect to the database");
 
 mysql_select_db($mysql_database,$a)or die("Could not connect to database");
 
 $query=mysql_query("select * from login where username='$username' and password='$password'");
 echo $query;
 if($query>0 and $query['status']==0)
 {
  session_start();
  mysql_query("update login set status=1 where username=$username");
  header("location:home.php");
 }
?>