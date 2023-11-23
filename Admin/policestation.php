<html>
<head>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form5" id="form5">
<?php
include 'db1.php';
include 'header.html';
if(isset($_POST['submit']))
{
	$district=$_POST['district'];
	$place=$_POST['place'];
	$stno=$_POST['stno'];
	$pin=$_POST['pin'];
	$name=$_POST['name'];
	$phno=$_POST['phno'];
	$email=$_POST['email'];
    $que=$_POST['que'];
	$ans=$_POST['ans'];
	$pass=$_POST['password'];
	$repass=$_POST['repassword'];
	$photo=$_FILES['pic']['name'];
	$tmp1=$_FILES['pic']['tmp_name'];
	move_uploaded_file($tmp1,"Station/Images/".$photo);
	$doc=$_FILES['proof']['name'];
	$tmp2=$_FILES['proof']['tmp_name'];
	move_uploaded_file($tmp2,"Station/Documents/".$doc);
	$cph=mysql_query("select * from tb_police_station where si_phone='$phno'",$con);
	$cem=mysql_query("select * from tb_police_station where si_email='$email'",$con);
	if(mysql_num_rows($cph) > 0) 
	{
		echo "<script> alert('phone no. already exists')</script>";
	}
	elseif (mysql_num_rows($cem) > 0)
	{
		echo "<script>alert('email id already exists')</script>";
	}
	elseif($pass!=$repass)
	{
		echo "<script> alert('Password doesnot match')</script>";
	}
	else
	{
		$type='station';
		$res=mysql_query("insert into tb_login (email_id,password,security_question,security_answer,user_type)
		values ('$email','$pass','$que','$ans','$type')",$con);
		$v=mysql_query("select max(log_id) as log_id from tb_login",$con);
		while($row=mysql_fetch_assoc($v))
		{
			
			$a=$row['log_id'];	
			$result=mysql_query("insert into tb_police_station(log_id,district,place,station_no,station_pin,si_name,si_phone,si_email,Photo,proof_upload) values('$a','$district','$place','$stno','$pin','$name','$phno','$email','$photo','$doc')",$con);
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
<tr><th align="center"><h2 align="center"><u>Police Station Registration Form</u><br></h2></th></tr>
<tr>
<td><label><b>Select Your District      <br></b></label></td>
<td><select name="district" size="1">
<option value="select" Selected>--Select District--
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
<td><input type="Text" name="place" required="" ></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input type="Text" name="pin" required="" ></td>
</tr>
<tr>
<td><label><b>Station Phone Number</b></label></td>
<td><input type="Text" name="stno" required=""></td>
</tr>
<tr>
<td><label><b>SI Name</b></label></td>
<td><input type="Text" name="name" required=""></td>
</tr>
<tr>
<td><label><b>Phone Number</b></label></td>
<td><input type="Text" name="phno" required=""></td>
</tr>
<tr>
<td><label><b>Email ID</b></label></td>
<td><input type="Text" name="email" required=""></td>
</tr>
<tr>
<td><label><b>Photo</b></label></td>
<td><input type="file" name="pic"></td>
</tr>
<tr>
<td><label><b>Proof Upload</b></label></td>
<td><input type="file" name="proof"></td>
</tr>
<tr>
<td><label><b>Security Questions      <br></b></label></td>
<td><select name="que" size="1">
<option value="selects" Selected>--Select Questions--
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      <br></b></label></td>
<td><input type="Text" name="ans"<br></td>
</tr>
<tr>
<td><label><b>Password       <br></b></label></td>
<td><input type="password" name="password"<br></td>
</tr>
<tr>
<td><label><b>Re-enter Password      <br></b></label></td>
<td><input type="password" name="repassword"<br></td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
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
