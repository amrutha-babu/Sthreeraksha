<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/-->
<html lang="en">
<head>
<?php
session_start();
include "header.html";
?>

<title>Sthree Raksha</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Sthree raksha" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
</head>
<body>

<!-- page details -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria_current="page">Login</li>
	</ol>
</div>
<!-- //page details -->
<!-- contact -->
<div class="contact py-sm-5 py-4" id="contact">
<div class="container py-lg-3">
<h3 class="heading mb-4">Contact Us</h3>
<div class="row pt-lg-4">
<div class="col-lg-5">
<div class="w3-contact-left">
<h4 class="about-left-agile mb-4">Contact Information </h4>
<p class="mb-4">To empower women... To secure Women...To make them strong... then the world said 'yes, women can.'</p>
<p><span class="fa fa-map-marker mr-2"></span> Ernakulam, Kerala, India.</p>
<hr>
<p><span class="fa fa-phone mr-2"></span>  +91 898 909 2317</p>
<hr>
<p><span class="fa fa-envelope-open mr-2"></span><a href="mailto:navamibinu98@gmail.com" class="ml-3">sthreeraksha@gmail.com</a></p>
</div>
</div>
<div class="col-lg-7 mt-lg-0 mt-5">
<!-- register form grid -->
<div class="register-top1">
<form  method="post" class="register-wthree">
<div class="form-group">
<div class="row">
<div class="col-md-9">
<input class="form-control" type="text" placeholder="Enter Your Email ID" name="email" required="">
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-md-9">
<input class="form-control" type="password" placeholder="Enter Your Password" name="password" required="">
</div>
</div>
</div>
<div class="row mt-3">
<div class="col-md-9">
<button type="submit" name="login2" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">LOGIN</button>
</div>
</div>
<div class="row">
<div class="col-md-9">
	<a href="Forget_password.php">Forgot Password ?</a><br>
</div>
</div>
<?php

include 'db1.php';
if(isset($_POST['login2']))
{
$mail=$_POST['email'];
$pass=$_POST['password'];
$result=mysql_query("select * from tb_login where email_id='$mail' and password='$pass'",$con);  
if(mysql_num_rows($result) > 0)
{
		while($row=mysql_fetch_assoc($result))
		{
		$type=$row['user_type'];
		$log=$row['log_id'];
		$_SESSION["log_id"]=$log;
				if($type=="center")
				{
						$var=mysql_query("select * from tb_ccenter where log_id='$log'",$con);
						while($row=mysql_fetch_assoc($var))
						{
						$userid=$row['center_id'];
						$_SESSION['user_id']=$userid;
						
						}
						//header('Location: /Counselling center/index.html');
						echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Counsellingcenter/index.html'</script>";
				}
				elseif($type=="hostel")
				{
						$var=mysql_query("select * from tb_hostel where log_id='$log'",$con);
						while($row=mysql_fetch_assoc($var))
						{
						$userid=$row['hostel_id'];
						$_SESSION['user_id']=$userid;
						
						}
						//header('Location: /Counselling center/index.html');
						echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Hostel/index.html'</script>";
				}
				elseif($type=="general")
				{
						$var=mysql_query("select * from tb_user where log_id='$log'",$con);
						while($row=mysql_fetch_assoc($var))
						{
						$userid=$row['user_id'];
						$_SESSION['user_id']=$userid;
						}
						//header('Location:index.html');
						echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Commonuser/index.html'</script>";
				}
				elseif($type=="consortium_head")
				{
						$var=mysql_query("select * from tb_consortium where log_id='$log'",$con);
						while($row=mysql_fetch_assoc($var))
						{
						$userid=$row['consortium_id'];
						$_SESSION['user_id']=$userid;
						}
						//header('Location: /Admin/Consortium/index.html');
						echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Consortium/index.html'</script>";
				}
				elseif($type=="consortium_member")
				{
						$var=mysql_query("select * from tb_consortium_member where log_id='$log'",$con);
						while($row=mysql_fetch_assoc($var))
						{
						$userid=$row['member_id'];
						$_SESSION['user_id']=$userid;
						}
						//header('Location: /Admin/Consortium/Members/index.html');
						echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Members/index.html'</script>";
				}
				elseif($type=="station")
				{
						$var=mysql_query("select * from tb_police_station where log_id='$log'",$con);
						while($row=mysql_fetch_assoc($var))
						{
						$userid=$row['station_id'];
						$_SESSION['user_id']=$userid;
						}
						//header('Location:../Admin/Station/index.html');
						echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Station/index.html'</script>";
				}
				elseif($type=="police")
				{
						$var=mysql_query("select * from tb_police where log_id='$log'",$con);
						while($row=mysql_fetch_assoc($var))
						{
						$userid=$row['police_id'];
						$_SESSION['user_id']=$userid;
						}
						//header('Location: /Admin/Station/Police/index.html');
						echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Police/index.html'</script>";
				}
				elseif($type=="admin")
				{
						//header('Location: /Admin/Station/Police/index.html');
						echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/index.html'</script>";
				}
		}
}
else
{
echo "<script>alert('Invalid User')</script>";
}
}
?>	

</form>
</div>
<!--  //register form grid ends here -->
</div>
</div>
</div>
</div>
<!-- //contact-->
<!-- map -->
<div class="w3l-map p-2">
	<iframe src="D:\Main Project\Sthree raksha\images\banner3.jpg"></iframe>
</div>
<!-- //map -->

<!-- footer -->
<footer class="py-5">
	<div class="container py-md-3">
		<div class="row footer-grids">
			<div class="col-md-4">
				<div class="footer-grid left">
					<h2 class="logo"><a href="index.html">Sthreeraksha</a></h2>
				</div>
			</div>
			<div class="col-md-4 middle">
				<p class="btn call"> <span class="fa fa-phone"></span> Call: +91 898 909 2317</p>
			</div>
			<div class="col-md-4 right">
				<!-- to top -->
				<div class="top-icon">
					<a href="#home" class="move-top text-center"><span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>To Top</a>
				</div>
				<!-- //to top -->
			</div>
		</div>
		<div class="middle mt-3">
			<p>© 2019 Official. All Rights Reserved </p>
			<ul class="social mt-4">
				<li><a href="#"><span class="fa fa-facebook icon_facebook"></span></a></li>
				<li><a href="#"><span class="fa fa-twitter icon_twitter"></span></a></li>
				<li><a href="#"><span class="fa fa-google-plus icon_google-plus"></span></a></li>
				<li><a href="#"><span class="fa fa-linkedin icon_linkedin"></span></a></li>
				<li><a href="#"><span class="fa fa-dribbble icon_dribbble"></span></a></li>
			</ul>
		</div>
	</div>
</footer>
<!-- //footer -->
</body>
</html>