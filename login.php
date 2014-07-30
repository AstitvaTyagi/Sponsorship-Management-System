<?php
session_start();
	$mysql_hostname = "localhost";
 $mysql_user="root";
 $mysql_password = "";
 $mysql_database="sponsorship";
 
 $a = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect to the database");
 
 mysql_select_db($mysql_database,$a)or die("Could not connect to database");
 if(isset($_POST['submit'])){
	$uname=$_POST['username'];
	$pass=$_POST['password'];
	$query=mysql_query("select id from login where username='$uname' and password='$pass' and status=0");
	$num=mysql_num_rows($query);
	if($num==1){
		$_SESSION['user']=$uname;
		$query1=mysql_query("update login set status=1 where username='$uname'");
		header('Location:home.php');
	}
	else{
		echo 'username/password incorrect or already logged in';
	}
 }
 
 
?>

<html>
<link rel="stylesheet" href="css/main1.css">
<style type="text/css">
#login{
	margin-top:100px;
}
</style>
<body>
<div id="top">
<img src="img/riviera14.png" width="775px" height="120px">
<div id="top_middle">
<h2>Sponsorship Registration</h2>
</div>
<div id="top_left">
Data maintainence software for Riviera'14 Sponsorship team
</div>
</div>
<div id="middle">
<center>
<form action="login.php" method="post" id="login">
Username <input type="text" name="username"><br><br>
Password <input type="password" name="password"><br><br>
<input type="submit" name="submit" value="Login">
<input type="reset">
<!--</form>
<form id="reset" method="post" action="reset.php"><input type="submit" value="Reset Status" >
</form>-->
</center>
</div>
<div id="bottom"><center>&copy Sponsorship Committee, Riviera 2014</center></div>
</body> 
</html>