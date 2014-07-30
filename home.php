<?php
	session_start();

if(!isset($_SESSION['user']))
{
 header("location:login.php");
}

?>
<html>
<script type="text/javascript">
window.onclose = closing;

function closing(){
  $.ajax({
     url: 'logout.php',
     data: yourdata,
     success: function(content){
          // empty
     }
  })
}
</script>
<link rel="stylesheet" href="css/main1.css">
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
<?php
	$mysql_hostname = "localhost";
	 $mysql_user="root";
	 $mysql_password = "";
	 $mysql_database="sponsorship";
	$uname = $_SESSION['user'];
	$query = "select * from login where username='$uname'";
	$a = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect to the database");
	mysql_select_db($mysql_database,$a)or die("Could not connect to database");
	
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	if($row['role'] == 0) {
?>
<div id="left">
<center><h3>Enter Record</h3></center>
<form id="entry" action="entry.php" method="post">
<table>
<tr><td>Name of Company</td><td> <input type="text" name="name" required></td></tr>
<tr><td>Primary Contact No </td><td><input type="text" name="primary_contact_no" ></td>
<td>Secondary Contact No </td><td><input type="text" name="secondary_contact_no"></td></tr>
<tr><td>Person of Contact</td><td><input type="text" name="contact_person"></td><td>Email</td><td><input type="text" name="email"></td></tr>
<tr><td>Initial Contact Made By</td><td><input type="text" name="contact_made_by" required/></td></tr>
<tr><td>Status</td><td><input type="text" name="status" required/></td><td>Amount</td><td><input type="text" name="amount" required/></td></tr>
<tr><td>Follow Up</td><td><input type="text" name="follow_up" required/></td><td>Sector</td><td><input type="text" name="sector" required/></td></tr>
<tr><td><input type="submit"></td></tr>
</table>
</form>
</div>
<?php
	}
?>
<div id="right">
<center><h3>View/Edit Records</h3></center>
<form id="search_by_sector" action="view_sector.php" method="post">
<center><h4>Search by Sector Name</h4>
<input type="text" name="sector" required>
<input type="submit">
</center>
</form>
<br><br>
<center>
<form id="search_all" action="view_company.php" method="post">
<input type="submit" value="View All">
</form>
</center>
<br><br>
<form id="search_by_company" action="view_company.php" method="post">
<center>
<h4>Search by Company Name</h4>
<input type="text" name="name" required>
<input type="submit">
</form>
</center>
</div>
</div>
<div id="bottom"><center>&copy Sponsorship Committee, Riviera 2014</center></div>
</body> 
</hmtl>