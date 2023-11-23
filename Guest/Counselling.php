<html>
<head>
</head>
<body> 
<form action="" method="post" enctype="multipart/form-data" name="form9" id="form9">
<?php
include 'db1.php';
include 'header.html';
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$district=$_POST['district'];
	$place=$_POST['place'];
	$pin=$_POST['pin'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$que=$_POST['que'];
	$ans=$_POST['ans'];
	$pass=$_POST['password'];
	$repass=$_POST['repassword'];
	$doc=$_FILES['proof']['name'];
	$tmp2=$_FILES['proof']['tmp_name'];
	move_uploaded_file($tmp2,"../Counsellingcenter/Documents/".$doc);
	$cph=mysql_query("select * from tb_ccenter where phone_no='$mobno'",$con);
	$cem=mysql_query("select * from tb_ccenter where email_id='$email'",$con);
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
		$type='center';
		date_default_timezone_set("Asia/Kolkata");
		$date=date("d-m-Y") ;
		$res=mysql_query("insert into tb_login (email_id,password,security_question,security_answer,user_type)values ('$email','$pass','$que','$ans','$type')",$con);
		$v=mysql_query("select max(log_id) as log_id from tb_login",$con);
		while($row=mysql_fetch_assoc($v))
		{
			$a=$row['log_id'];	
			$result=mysql_query("insert into tb_ccenter (log_id,center_name,district,place,pin,phone_no,email_id,doc_upload,date) values('$a','$name','$district','$place','$pin','$mobno','$email','$doc','$date')",$con);
			if(isset($result))
			{
				echo "<script> alert('Inserted Successfully')</script>";
				echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Guest/login.php'</script>";
			}
			else
			{
				echo "<script> alert('Insertion is terminated')</script>";
			}
		}
	}
}
elseif(isset($_POST['cancel']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Guest/index.html'</script>";
}
?>
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="register.php">Signup</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Counselling Center Registration</li>
	</ol>
</div>
<h3 align="center"><br>Registration Form<br><br></h3>
<table align="Center" cellpadding="13">
<tr>
<td><label><b>Councelling Center Name       </b></label></td>
<td><input required class="form-control" type="Text" name="name" maxlength="20"></td>
</tr>
<tr>
<td><label><b>Select Your District      </b></label></td>
<td><select required class="form-control" name="district" size="1">
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
<td><label><b>Enter place     </b></label></td>
<td><input required class="form-control" type="Text" name="place" maxlength="30"></td>
</tr>
<tr>
<td><label><b>Pin Code     </b></label></td>
<td><input required class="form-control" type="Text" name="pin" maxlength="6"></td>
</tr>
<tr>
<td><label><b>Mobile Number        </b></label></td>
<td><input required type="Text" class="form-control" name="mobno" maxlength="10" pattern="[7-9]{1}[0-9]{9}" required></td>
</tr>
<tr>
<td><label><b>Email ID       </b></label></td>
<td><input required class="form-control" type="email" name="email" maxlength="30"></td>
</tr>
<tr>
<td><label><b>Upload Documents</b></label></td>
<td><input required class="form-control" type="file" name="proof"></td>
</tr>
<tr>
<td><label><b>Security Questions      </b></label></td>
<td><select required class="form-control" name="que" size="1">
<option value="selects" Selected>--Select Questions--
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer     </b></label></td>
<td><input required class="form-control" type="Text" name="ans"maxlength="25"></td>
</tr>
<tr>
<td><label><b>Enter Password       </b></label></td>
<td><input required class="form-control" type="password" name="password" maxlength="15"></td>
</tr>
<tr>
<td><label><b>Re-enter Password      </b></label></td>
<td><input required type="password" class="form-control" name="repassword" maxlength="15"></td>
<tr>
<th colspan="2" align="center">
<div class="row mt-3">
<div class="col-md-2">
		
	</div>
	<div class="col-md-4">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</a></button>
	</div>
	<div class="col-md-4">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Guest/index.html'">cancel</a></button>
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