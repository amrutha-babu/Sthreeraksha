<html>
<head>
<?php
session_start();
include 'db1.php';
include 'header.html';
?>
<script type="application/javascript">

  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>
</head>
<body> 
<form action="" method="post" enctype="multipart/form-data" name="form5" id="form5">
<header>
	<div class="container">
		<div class="header d-lg-flex justify-content-between align-items-center">
			<div class="header-agile">
				<h1>
					<a class="navbar-brand logo" href="index.html">
						<span class="fa fa-folder-open-o"></span>Official
					</a>
				</h1>
			</div>
			<div class="nav_w3ls">
				<nav>
					<label for="drop" class="toggle mt-lg-0 mt-2"><span class="fa fa-bars" aria-hidden="true"></span></label>
					<input type="checkbox" id="drop" />
						<ul class="menu">
							<li class="mr-lg-3 mr-2"><a href="index.html">Home</a></li>
							<li class="mr-lg-3 mr-2"><a href="profile.php">Profile</a></li>
							<li class="mr-lg-3 mr-2 p-0">
							<!-- First Tier Drop Down -->
							<label for="drop-2" class="toggle">Dropdown<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
							<a href="#">Complaint <span class="fa fa-angle-down" aria-hidden="true"></span></a>
							<input type="checkbox" id="drop-2"/>
							<ul class="inner-dropdown">
								<li><a href="complaint.php">Register Complaint</a></li>
								<li><a href="viewcomp.php">View Complaints</a></li>
								<li><a href="followup.php">Complaint Follow Ups</a></li>
							</ul>
							</li>
							<li class="mr-lg-3 mr-2 p-0">
							<!-- First Tier Drop Down -->
							<label for="drop-2" class="toggle">Dropdown<span class="fa fa-angle-down" aria-hidden="true"></span> </label>
							<a href="#">Appointment <span class="fa fa-angle-down" aria-hidden="true"></span></a>
							<input type="checkbox" id="drop-2"/>
							<ul class="inner-dropdown">
								<li><a href="appointment.php">Request</a></li>
								<li><a href="viewapp.php">View Appointment</a></li>
							</ul>
							</li>
							<li class="mr-lg-3 mr-2"><a href="Reset_password.php">Change Password</a></li>
						</ul>
				</nav>
			</div>
			<div class="buttons mt-lg-0 mt-2">
				<a href="../Guests/index.html">Logout </a>
			</div>
		</div>
	</div>
</header>
<div class="inner-banner" id="home">
	<div class="container">
	</div>
</div>
<!-- //header -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Complaint Registration</li>
	</ol>
</div>
<?php
$aid= $_GET['app_id'];
$result = mysql_query("select * from tb_appointment where app_id = '$aid'",$con);
 while($row=mysql_fetch_assoc($result))
 {

	$id=$row['app_id'];
	$cid=$row['center_id'];
	$b=$row['district'];
	$c=$row['app_type'];
	$d=$row['status'];
	$e=$row['app_date'];
	$uid=$_SESSION['user_id'];
	$var=mysql_query("select * from tb_user where user_id='$uid'",$con);
	while($row=mysql_fetch_assoc($var))
	{
		$uname=$row['user_name'];
	}
	$resu=mysql_query("select center_name from tb_ccenter where center_id=$cid");
	while($row=mysql_fetch_assoc($resu))
	{
		$a=$row['center_name'];
	}
 }
?>
<br>
<table align="center" cellpadding="10">
	<tr><th colspan="2"><h2 align="center">Appointment Details</h2></th></tr>
<tr>
	<th> Appointment ID </th>
	<th><input disabled class="form-control" type="text" name="appid" required="required" placeholder="Appointment ID" value="<?php echo "$id" ?>" /></th>
</tr>
<tr>
	<th> District </th>
	<th><select disabled name="dist" id="dist" required class="form-control">
        <option value="<?php echo "$b" ?>"><?php echo "$b" ?></option>
		<option value="trivandrum">Trivandrum</option>
		<option value="kollam">Kollam</option>
		<option value="pathanamthitta">Pathanamthitta</option>
		<option value="alappuzha">Alappuzha</option>
		<option value="kottayam">Kottayam</option>
		<option value="idukki">Idukki</option>
		<option value="ernakulam">Ernakulam</option>
		<option value="thrissur">Thrissur</option>
		<option value="palakkad">Palakkad</option>
		<option value="malappuram">Malappuram</option>
		<option value="kozhikode">Kozhikode</option>
		<option value="vayanad">Vayanad</option>
		<option value="kannur">Kannur</option>
		<option value="kasargode">Kasargode</option></select>
	</th>
</tr>
<tr>
	<th> Centre Name</th>
	<th><input disabled class="form-control" type="text" name="cname" placeholder="Date of Incident" value="<?php echo "$a" ?>"/></th>
</tr>
<tr>
	<th> Type </th>
	<th> <input type="text" class="form-control" name="type1" value="" maxlength="20" placeholder="Appointment Type" disabled value="<?php echo "$c" ?>"/></th>
</tr>
<tr>
	<th> Appointment Date </th>
	<th><input disabled class="form-control" type="date" name="adate" placeholder="Appointment Date" value="<?php echo "$e" ?>"/></th>
</tr>
<tr>
	<th> Status </th>
	<td><input disabled class="form-control" value="<?php echo "Rejected";?>" type="text" name="status" ></td>
</tr>
<tr>
</th>
</tr>
</table>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
