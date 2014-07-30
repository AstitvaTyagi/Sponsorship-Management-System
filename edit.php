<?php
session_start();

if(!isset($_SESSION['user']))
{
 header("location:login.php");
}

?>
<html>

<link rel="stylesheet" href="css/main1.css">
<style>
#middle{
	height:100%;
	background:white;
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
<div id="top_right">
Welcome, <?php if(isset($_SESSION['user'])) echo $_SESSION['user'];
else echo 'Guest';
 ?>
&nbsp; | &nbsp; 
 <a href="logout.php">Logout</a>

</div>
</div>
<div id="middle">
<a href="home.php">Home</a>

<table class="company_table" >
<tr>
<th class="col" >Sno</th>
<th class="col" >Name</th>
<th class="col" >Primary Contact No</th>
<th class="col" >Secondary Contact No</th>
<th class="col" >Contact Person</th>
<th class="col" >Email</th>
<th class="col" >Contact Made by</th>
<th class="col" >Status</th>
<th class="col" >Amount</th>
<th class="col" >Follow Up</th>
<th class="col" >Sector</th>
</tr>

<?php
 $sno=$_GET['sr'];
 $mysql_hostname = "localhost";
 $mysql_user="root";
 $mysql_password = "";
 $mysql_database="sponsorship";
 $a = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect to the database");
 
 mysql_select_db($mysql_database,$a)or die("Could not connect to database");
 $modified_by=$_SESSION['user'];
 if(isset($_POST['submit']))
 {
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
 $query=mysql_query("update `company` set name='$name',primary_contact='$primary_contact',secondary_contact='$secondary_contact',contact_person='$contact_person',email='$email',contact_made_by='$contact_made_by',status='$status',amount='$amount',follow_up='$follow_up',sector='$sector',modified_by='$modified_by' where sno=$sno");
  if(!$query)
  {
   echo mysql_error();
  }
  header("location:home.php");
 }
 
 $result = mysql_query("SELECT * FROM `company` WHERE sno=$sno");
 if(!$result)
 {
  echo mysql_error();
 }
 
 while($row = mysql_fetch_array($result))
 {
 	$sno = $row['sno'];
 	$name = $row['name'];
 	$primary_contact=$row['primary_contact'];
 	$secondary_contact=$row['secondary_contact'];
 	$contact_person=$row['contact_person'];
 	$email=$row['email'];
 	$contact_made_by=$row['contact_made_by'];
 	$status=$row['status'];
 	$amount=$row['amount'];
 	$follow_up=$row['follow_up'];
 	$sector=$row['sector'];
 
  echo "<form method='post' action='edit.php?sr=$sno'>";
  echo "<tr class='company_table'>";
  echo "<td class='company_table' id='sno' ><input type='text' 	name='sno' value='".$sno."' disabled='disabled'></td>";
  echo "<td class='company_table' id='name' ><input type='text' 	name='name' value='".$name."' ></td>";
  echo "<td class='company_table' id='primary' ><input type='text' 	name='primary_contact' value='".$primary_contact."'></td>";
  echo "<td class='company_table' id='secondary' ><input type='text' 	name='secondary_contact' value='".$secondary_contact."' ></td>";
  echo "<td class='company_table' id='contact' ><input type='text' 	name='contact_person' value='".$contact_person."'></td>";
  echo "<td class='company_table' id='email' ><input type='text' 	name='email' value='".$email."'></td>";
  echo "<td class='company_table' id='made_by' ><input type='text' 	name='contact_made_by' value='".$contact_made_by."'></td>";
  echo "<td class='company_table' id='status' ><input type='text' 	name='status' value='".$status."'></td>";
  echo "<td class='company_table' id='amount' ><input type='text' 	name='amount' value='".$amount."' ></td>";
  echo "<td class='company_table' id='follow_up' ><input type='text' 	name='follow_up' value='".$follow_up."' ></td>";
  echo "<td class='company_table' id='sector' ><input type='text' 	name='sector' value='".$sector."'></td>";
  echo "<td class='company_table' ><input type='submit' name='submit'>";
  echo "</tr></form>";
 }
  
 ?>
</table>
<div id="bottom"><center>&copy Sopnsorship Committee, Riviera 2014</center></div>

</body>
</html>