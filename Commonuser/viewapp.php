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
<form action="" method="post"enctype="multipart/form-data" name="form6" id="form6">
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
		<li class="breadcrumb-item active" aria-current="page">My Complaints</li>
	</ol>
</div>
<br>
<h2 align="center"> My Complaints</h2><br><br>
<table align="center" class="table-style-three" width="75%" cellpadding="5" border="1">
	<tr>
<th>Date</th><th>Center Name</th><th>Appointment Type</th><th>Appointment Date</th>
</tr>
<?php
$uid= $_SESSION['user_id'];
$result = mysql_query("select * from tb_appointment where user_id = '$uid'",$con);
 while($row=mysql_fetch_assoc($result))
 {
 	$id=$row['app_id'];
	$cid=$row['center_id'];
	$b=$row['date'];
	$c=$row['app_type'];
	$d=$row['status'];
	$e=$row['app_date'];
	$resu=mysql_query("select center_name from tb_ccenter where center_id=$cid");
	while($row=mysql_fetch_assoc($resu))
	{
		$a=$row['center_name'];
	}
	
	if($d==0)
	{
		echo "<tr><td>".$b."</td><td>".$a."</td><td>".$c."</td><td>".$e."</td><td><a href=viewuapp.php?app_id=".$id.">View</a></td></tr>";
	}
	elseif($d==1)
	{
		echo "<tr><td>".$b."</td><td>".$a."</td><td>".$c."</td><td>".$e."</td><td><a href=viewaapp.php?app_id=".$id.">View</a></td></tr>";
	}
	else
	{
		echo "<tr><td>".$b."</td><td>".$a."</td><td>".$c."</td><td>".$e."</td><td><a href=viewrapp.php?app_id=".$id.">View</a><td>
				<a href='app_delete.php?app_id=<?php echo $row["app_id"] ?>Delete</a>
			</td></td></tr>";
	}
 }
?>
</table>
</div>
</div>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
