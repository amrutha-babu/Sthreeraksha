<?php
include 'db1.php';
if (isset($_POST["save"])) {
	echo "insert into tb_forumanswer(que_id,answer_date,answer) values ('".$_GET["id"]."','".date("Y-m-d h:i:sa")."','".$_POST["answer"]."')";
		mysql_query("insert into tb_forumanswer(que_id,answer_date,answer) values ('".$_GET["id"]."','".date("Y-m-d h:i:sa")."','".$_POST["answer"]."')") or die(mysql_error());

		echo "<script>window.location.href='openforum.php'</script>";
}
?>
<form method="post">
	<!DOCTYPE html>
<html lang="en">
<head>
<title>Sthree Raksha</title>
	
	<!-- Meta tag Keywords -->
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
	<!--// Meta tag Keywords -->
	
	<!-- css files -->
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<!-- //css files -->
	
	<!--web font-->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<!--//web font-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>

<!-- header -->
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
							<li class="mr-lg-3 mr-2"><a href="index.html">Home</a></li>
							<li class="mr-lg-3 mr-2"><a href="about.html">About</a></li>
							<li class="mr-lg-3 mr-2"><a href="services.html">Services</a></li>
							
							<li class="mr-lg-3 mr-2"><a href="register.php">Registration</a></li>
							<li class="mr-lg-3 mr-2"><a href="contact.html">Contact Us</a></li>
							<li class="mr-lg-3 mr-2 active"><a href="openforum.php">Forum</a></li>
						</ul>
				</nav>
			</div>
			<div class="buttons mt-lg-0 mt-2">
				<a href="Login.php">Login </a>
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
		<li class="breadcrumb-item active" aria-current="page">Forum Answer</li>
	</ol>
</div>
<?php 
$r=mysql_query("select * from tb_openforum where que_id='".$_GET["id"]."'") or die(mysql_error());
while($row=mysql_fetch_assoc($r))
{
?>
<table align="center" cellpadding="15">
	<tr>
		<th>
	Question:
	</th>
	<td>
	<?php echo $row["question"] ?></td>
	</tr>
	<tr>
		<th>
			Answer
		</th>
		<td>
			<textarea class="form-control" name="answer" required></textarea>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="row mt-3">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Post</button>
				</div>
			</div>
		</td>
	</tr>
	</table>
  		<?php
  	}
  	 ?>

</form>
<?php

include 'footer.html';
?>