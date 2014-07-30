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

 $name= '';
 if(isset($_POST['name'])) {
	$name = strtolower($_POST['name']);
 }
 $mysql_hostname = "localhost";
 $mysql_user="root";
 $mysql_password = "";
 $mysql_database="sponsorship";
 
 $a = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect to the database");
 
 mysql_select_db($mysql_database,$a)or die("Could not connect to database");
 $result = $name != null ? mysql_query("SELECT * FROM `company` WHERE name='$name'") : mysql_query("SELECT * FROM company");
 $flag=0;
 if($result==0)
 {
  echo '<p font-size:50px;>No Records</p>';
  $flag=1;
 }
 if($flag==0)
  {

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
  echo "<tr class='company_table'>";
  echo "<td class='company_table' id='sno' ><input type='text' 	name='esno' value='".$sno."' disabled='disabled'></td>";
  echo "<td class='company_table' id='name' ><input type='text' 	name='ename' value='".$name."' disabled='disabled'></td>";
  echo "<td class='company_table' id='primary' ><input type='text' 	name='eprimary_contact' value='".$primary_contact."' disabled='disabled'></td>";
  echo "<td class='company_table' id='secondary' ><input type='text' 	name='esecondary_contact' value='".$secondary_contact."' disabled='disabled'></td>";
  echo "<td class='company_table' id='contact' ><input type='text' 	name='econtact_person' value='".$contact_person."' disabled='disabled'></td>";
  echo "<td class='company_table' id='email' ><input type='text' 	name='eemail' value='".$email."' disabled='disabled'></td>";
  echo "<td class='company_table' id='made_by' ><input type='text' 	name='econtact_made_by' value='".$contact_made_by."' disabled='disabled'></td>";
  echo "<td class='company_table' id='status' ><input type='text' 	name='status' value='".$status."' disabled='disabled'></td>";
  echo "<td class='company_table' id='amount' ><input type='text' 	name='eamount' value='".$amount."' disabled='disabled'></td>";
  echo "<td class='company_table' id='follow_up' ><input type='text' 	name='efollow_up' value='".$follow_up."' disabled='disabled'></td>";
  echo "<td class='company_table' id='sector' ><input type='text' 	name='esector' value='".$sector."' disabled='disabled'></td>";
  echo "<td class='company_table' ><a href='edit.php?sr=$sno'>Edit</a>";
  echo "</tr></form>";
}
 }
  
 ?>

</table>

<br><br>
</div>
</body> 
</html>