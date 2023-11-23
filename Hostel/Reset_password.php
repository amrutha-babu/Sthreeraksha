<?php
session_start();
include 'db1.php';
include 'header.html';
?>
<html>
<head>
</head>
<body> 

<header>
	<div class="container">
		<div class="header d-lg-flex justify-content-between align-items-center">
			<div class="header-agile">
				<h1>
					<a class="navbar-brand logo" href="index.html">
						Sthreeraksha
					</a>
				</h1>
			</div>
			<div class="nav_w3ls">
				<nav>
					<label for="drop" class="toggle mt-lg-0 mt-2"><span class="fa fa-bars" aria-hidden="true"></span></label>
					<input type="checkbox" id="drop" />
						<ul class="menu">
							<li class="mr-lg-3 mr-2 active"><a href="index.html">Home</a></li>
							<li class="mr-lg-3 mr-2"><a href="profile.php">Profile</a></li>
							<li class="mr-lg-3 mr-2"><a href="Reset_password.php">Change Password</a></li>
						</ul>
				</nav>
			</div>
			<div class="buttons mt-lg-0 mt-2">
				<a href="../Guest/Login.php">Logout </a>
			</div>

		</div>
	</div>
</header>
<!-- //header -->


<!-- inner banner -->
<div class="inner-banner" id="home">
	<div class="container">
	</div>
</div>
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Change Password</li>
	</ol>
</div>
<form id="form2" method="post">
<?php
if(isset($_POST['submit']))
{
	$mail=$_POST['email'];
	$pass=$_POST['pass'];
	$npass=$_POST['npass'];
	$repass=$_POST['repass'];
	$result=mysql_query("select * from tb_login where email_id='$mail' and password='$pass'",$con);   
	if(mysql_num_rows($result) > 0)
	{
		if($npass!=$repass)
		{
			echo "<script> alert('Password doesnot match')</script>";
		}
		else
		{
			while($row=mysql_fetch_assoc($result))
			$res=mysql_query("update tb_login set password='$npass' where email_id='$mail' and password='$pass'",$con);
			echo "<script>alert('Password is Successfully Updated')</script>";
			echo "<script>window.location.href='http://localhost/Sthreeraksha/counsellingcenter/index.html'</script>";		
		}
	}
	else
	{
		echo "<script>alert('Invalid user')</script>";
	}
}
elseif(isset($_POST['cancel']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/counsellingcenter/index.html'</script>";	
}	
?>


<table width="30%" align="Center" cellpadding="15">
<tr>
<th colspan="2">
<h2 align="center">Change Password<br></h2>
</th>
</tr>
</table>
<table width="40%" align="Center" cellpadding="7">
<tr>
<td><label><b>Email ID       <br></b></label></td>
<td><input class="form-control" type="Text" name="email"<br></td>
</tr>
<tr>
<td><label><b>Password       <br></b></label></td>
<td><input class="form-control" type="password" name="pass"<br></td>
</tr>
<tr>
<td><label><b>Enter New Password       <br></b></label></td>
<td><input class="form-control" type="password" name="npass"<br></td>
</tr>
<tr>
<td><label><b>Re-enter Password      <br></b></label></td>
<td><input class="form-control" type="password" name="repass"<br></td>
</tr>
<tr>
<br><th colspan="2">
<div class="row mt-3">
<div class="col-md-4">
<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">SUBMIT</button>
</div>
<div class="col-md-4">
<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">CANCEL</button>
</div>
</div>
</th>
</tr>
</table>
</form>
</body>
<?php
include 'footer.html';
?>
</html>