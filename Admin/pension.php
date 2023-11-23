<?php
session_start();
include 'header.html';
include 'db1.php';
?>
<html>
<head>
</head>
<body> 

<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Pension Registration</li>
	</ol>
</div>
<form action="" method="post" enctype="multipart/form-data" name="form7" id="form7">
<?php
if(isset($_POST['submit']))
{
	$type=$_POST['type'];
	$des=$_POST['des'];
	$link=$_POST['link'];
	date_default_timezone_set("Asia/Kolkata");
	$date=date("d-m-Y") ;
	$res=mysql_query("insert into tb_pension (date,description,type_of_pension,link)values ('$date','$des','$type','$link')",$con);
	echo "<script> alert('Inserted Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/pdetails.php'</script>";
}
?>

<br><h2 align="center">Pension Registration</h2>
<br>
<table align="Center" cellpadding="10">
<tr>
<td><label><b>Type of Pension      </b></label></td>
<td><select class="form-control" name="type" size="1" required>
<option value="" Selected>--Select Type--
<option value="Widow">Widow
<option value="Student">Student
<option value="Adult">Adult
<option value="Unmarried Women">Unmarried women
</select></td>
</tr>
<tr>
<td><label><b>Description     </b></label></td>
<td><textarea class="form-control" name="des" maxlength="100" required ></textarea></td>
</tr>
<tr>
<td><label><b>Link     </b></label></td>
<td><input class="form-control" type="Text" name="link" maxlength="30" required></td>
</tr>
<tr>
<th colspan="2" align="center">
<div class="row mt-3">
	<div class="col-md-1">
	</div>
	<div class="col-md-5">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</a></button>
	</div>
	<div class="col-md-5">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/pdetails.php'">cancel</a></button>
	</div>
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