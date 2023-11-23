<html>
<head>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form5" id="form5">
<?php
session_start();
include 'db1.php';
include 'header.html';
$id=$_SESSION['user_id'];
$resu=mysql_query("select * from tb_consortium where consortium_id='$id'",$con);
while ($row=mysql_fetch_assoc($resu)) {
	$dis=$row['consortium_district'];
}
if(isset($_POST['submit']))
{
	$district=$_POST['district'];
	$place=$_POST['place'];
	$stno=$_POST['stno'];
	$pin=$_POST['pin'];
	$name=$_POST['name'];
	$phno=$_POST['phno'];
	$email=$_POST['email'];
	$photo=$_FILES['pic']['name'];
	$tmp1=$_FILES['pic']['tmp_name'];
	move_uploaded_file($tmp1,"../Station/Photos/".$photo);
	$cph=mysql_query("select * from tb_police_station where incharge_phone='$phno'",$con);
	$cem=mysql_query("select * from tb_police_station where incharge_email='$email'",$con);
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
		$type='station';
		$res=mysql_query("insert into tb_login (email_id,password,user_type)
		values ('$email','$phno','$type')",$con);
		$v=mysql_query("select max(log_id) as log_id from tb_login",$con);
		while($row=mysql_fetch_assoc($v))
		{
			
			$a=$row['log_id'];	
			$result=mysql_query("insert into tb_police_station(log_id,district,place,station_no,station_pin,incharge_name,incharge_phone,incharge_email,Photo) values('$a','$district','$place','$stno','$pin','$name','$phno','$email','$photo')",$con);
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
		<li class="breadcrumb-item active" aria-current="page">Police Station Registration</li>
	</ol>
</div>
<table align="Center" cellpadding="7">
<tr><th colspan="2" align="center"><h2 align="center">Police Station Registration Form<br></h2></th></tr>
<tr>
<td><label><b>Select Your District      <br></b></label></td>
<td><select disabled name="district" class="form-control" size="1">
<option value="<?php echo "$dis"?>" Selected><?php echo "$dis"?>
<option value="Thiruvananthapuram">Thiruvananthapuram
<option value="Ernakulam">Ernakulam
<option value="Kottayam">Kottayam
<option value="Kozhikode">Kozhikode
<option value="Idukki">Idukki
<option value="Alappuzha">Alappuzha
<option value="Thrissur">Thrissur
<option value="Kasargod">Kasargod
<option value="Palakkad">Palakkad
<option value="Kannur">Kannur
<option value="Vayanad">Vayanad
<option value="Kollam">Kollam
<option value="Pathanamthitta">Pathanamthitta
<option value="Malappuram">Malappuram
</select></td>
</tr>
<tr>
<td><label><b>Enter place      <br></b></label></td>
<td><input type="Text" class="form-control" name="place" maxlength="30" required="" ></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input type="Text" class="form-control" name="pin" maxlength="6" required="" ></td>
</tr>
<tr>
<td><label><b>Station Phone Number</b></label></td>
<td><input maxlength="12" type="Text" class="form-control" name="stno" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Name</b></label></td>
<td><input maxlength="20" type="Text" class="form-control" name="name" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Phone Number</b></label></td>
<td><input type="Text" maxlength="10" pattern="[7-9]{1}[0-9]{9}" class="form-control" name="phno" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Email ID</b></label></td>
<td><input type="Text" maxlength="30" class="form-control" name="email" required=""></td>
</tr>
<tr>
<td><label><b>Photo</b></label></td>
<td><input type="file" class="form-control" name="pic"></td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-2">
	</div>
	<div class="col-md-4">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</a></button>
	</div>
	<div class="col-md-4">
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
