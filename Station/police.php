<html>
<head>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form6" id="form6">
<?php
session_start();
include 'db1.php';
include 'header.html';
$uid=$_SESSION["user_id"];
$va=mysql_query("select * from tb_police_station where station_id='$uid'",$con);
while ($row=mysql_fetch_assoc($va)) {
	$p=$row['place'];
	$d=$row['district'];
echo "$p";
}
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$sid=$_POST['sid'];
	$desig=$_POST['desig'];
	$phno=$_POST['phno'];
	$email=$_POST['email'];
	$photo=$_FILES['pho']['name'];
	$tmp1=$_FILES['pho']['tmp_name'];
	move_uploaded_file($tmp1,"../Police/Photos/".$photo);
	$cph=mysql_query("select * from tb_police where phone_no='$phno'",$con);
	$cem=mysql_query("select * from tb_police where email_id='$email'",$con);
	if(mysql_num_rows($cph) > 0) 
	{
		echo "<script> alert('phone no. already exists')</script>";
	}
	elseif (mysql_num_rows($cem) > 0)
	{
		echo "<script>alert('email id already exists')</script>";
	}		
	else
	{
		$type='police';
		$res=mysql_query("insert into tb_login (email_id,password,user_type)values ('$email','$phno','$type')",$con);$v=mysql_query("select max(log_id) as log_id from tb_login",$con);
		$v=mysql_query("select max(log_id) as log_id from tb_login",$con);
		while($row=mysql_fetch_assoc($v))
		{
			$a=$row['log_id'];	
			$result=mysql_query("insert into tb_police (log_id,police_name,police_dob,station_id,designation,phone_no,email_id,photo) values('$a','$name','$dob','$sid','$desig','$phno','$email','$photo')",$con);
			echo "<script> alert('Inserted Successfully')</script>";
		}
	}
}
?>
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Police Registration</li>
	</ol>
</div>
<br>
<h2 align="center"> Police Registration Form</h2><br>
<table align="Center" cellpadding="7">
<tr>
<td><label><b>Police Name</b></label></td>
<td><input maxlength="20" type="Text" class="form-control" name="name"></td>
</tr>
<tr>
<td><label><b>Date Of Birth    <br></b></label></td>
<td><input type="date" class="form-control" name="dob"></td>
</tr>
<tr>
<td><label><b> Station  </b></label></td>
<td><input type="Text" value="<?php echo "$p, $d"; ?>" class="form-control" name="sid"></td>
</tr>
<tr>
<td><label><b>Designation    </b></label></td>
<td><input maxlength="20" type="Text" class="form-control" name="desig"></td>
</tr>
<tr>
<td><label><b> Phone Number</b></label></td>
<td><input maxlength="10" pattern="[7-9]{1}[0-9]{9}" type="Text" class="form-control" name="phno"></td>
</tr>
<tr>
<td><label><b> Email ID</b></label></td>
<td><input maxlength="30" type="Text" class="form-control" name="email"></td>
</tr>
<tr>
<td><label><b>Photo   </b></label></td>
<td><input type="file" class="form-control" name="pho"></td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-6">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</a></button>
	</div>
	<div class="col-md-6">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">cancel</a></button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
</body>
<?php
include 'footer.html';
?>
</html>


	
	