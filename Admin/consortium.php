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
		<li class="breadcrumb-item active" aria-current="page">Consortium Registration</li>
	</ol>
</div>
<form action="" method="post" enctype="multipart/form-data" name="form7" id="form7">
<?php
if(isset($_POST['submit']))
{
	$district=$_POST['district'];
	$hname=$_POST['hname'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$cph=mysql_query("select * from tb_consortium where consortium_head_phone='$mobno'",$con);
	$cem=mysql_query("select * from tb_consortium where consortium_head_email='$email'",$con);
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
		$f=0;
		$r=mysql_query("select consortium_district from tb_consortium where consortium_district='$district'",$con);
		if(mysql_num_rows($r)<=0)
		{
		date_default_timezone_set("Asia/Kolkata");
		$date=date("d-m-Y") ;
		$type='consortium_head';
		$res=mysql_query("insert into tb_login (email_id,password,user_type)values ('$email','$mobno','$type')",$con);
		$v=mysql_query("select max(log_id) as log_id from tb_login",$con);
		while($row=mysql_fetch_assoc($v))
		{	
			$a=$row['log_id'];	
			$result=mysql_query("insert into tb_consortium (log_id,consortium_district,consortium_head,consortium_head_phone,consortium_head_email,date) values('$a','$district','$hname','$mobno','$email','$date')",$con);
			if(isset($result))
			{
				echo "<script> alert('Inserted Successfully')</script>";
				echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/index.html'</script>";
			}
			else
			{
				echo "<script> alert('Insertion Terminated')</script>";
			}
		}
		}
		else
		{
			echo "<script> alert('Already exists')</script>";
		}
	}
}
elseif(isset($_POST['cancel']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/index.html'</script>";
}
?>

<h2 align="center"><br>Consortium Registration Form<br><br></h2>
<table align="Center" cellpadding="7">
<tr>
<td><label><b>Select District      </b></label></td>
<td><select name="district" size="1" class="form-control" required>
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
<td><label><b>Consortium Head Name       </b></label></td>
<td><input type="Text" class="form-control" name="hname" maxlength="20" required></td>
</tr>
<tr>
<td><label><b>Consortium Head Mobile Number        </b></label></td>
<td><input type="Text" class="form-control" name="mobno" maxlength="10" pattern="[7-9]{1}[0-9]{9}" required></td>
</tr>
<tr>
<td><label><b>Consortium Head Email ID       </b></label></td>
<td><input type="email" pattern=".+@+[gmail,yahoo,email,outlook]+.com" class="form-control" name="email" maxlength="30" required></td>
</tr>
<tr>
<th colspan="2" align="center">
<div class="row mt-3">
	<div class="col-md-2">
	</div>
	<div class="col-md-4">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</a></button>
	</div>
	<div class="col-md-4">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/index.html'">cancel</a></button><br>
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