<?php
 session_start();
if(!isset($_SESSION['user']))
{
 header("location:login.php");
}
else{
 $mysql_hostname = "localhost";
 $mysql_user="root";
 $mysql_password = "";
 $mysql_database="sponsorship";
 $modified_by=$_SESSION['user'];
 $a = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect to the database");
 
 mysql_select_db($mysql_database,$a)or die("Could not connect to database");
 date_default_timezone_set('Asia/Kolkata');
 $date =date('Y-m-d H:i:s');

 $name=strtolower($_POST['name']);
 $primary_contact=$_POST['primary_contact'];
 $secondary_contact=$_POST['secondary_contact'];
 $contact_person=$_POST['contact_person'];
 $email=$_POST['email'];
 $contact_made_by=$_POST['contact_made_by'];
 $status=$_POST['status'];
 $amount=$_POST['amount'];
 $follow_up=$_POST['follow_up'];
 $sector=strtolower($_POST['sector']);
 $query= mysql_query("insert into company values( 0,'$name','$primary_contact','$secondary_contact','$contact_person','$email','$contact_made_by','$status','$amount','$follow_up','$sector','$modified_by')");
  header("location:home.php");
 }
 ?>
