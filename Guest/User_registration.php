<html>
<head>
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
<form action="" method="post"enctype="multipart/form-data" name="form4" id="form4">
<?php
include 'db1.php';
include 'header.html';
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$district=$_POST['district'];
	$place=$_POST['place'];
	$house=$_POST['hname'];
	$pin=$_POST['pin'];
	$adno=$_POST['adno'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$caste=$_POST['caste'];
	$religion=$_POST['religion'];
	$cat=$_POST['category'];
	$status=$_POST['status'];
	$qual=$_POST['qual'];
	$mar=$_POST['optm'];
	$que=$_POST['que'];
	$ans=$_POST['ans'];
	$pass=$_POST['password'];
	$repass=$_POST['repassword'];
	$photo=$_FILES['photo']['name'];
	$tmp1=$_FILES['photo']['tmp_name'];
	move_uploaded_file($tmp1,"../Commonuser/Photos/".$photo);
	$cph=mysql_query("select * from tb_user where mobile_no='$mobno'",$con);
	$cem=mysql_query("select * from tb_user where email_id='$email'",$con);
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
		$type='general';
		$res=mysql_query("insert into tb_login (email_id,password,security_question,security_answer,user_type)values ('$email','$pass','$que','$ans','$type')",$con);
		$v=mysql_query("select max(log_id) as log_id from tb_login",$con);
		while($row=mysql_fetch_assoc($v))
		{
			
			$a=$row['log_id'];	
			$result=mysql_query("insert into tb_user (log_id,user_name,date_of_birth,district,place,house_name,pin,aadhar_no,mobile_no,email_id,caste,religion,category,poverty_status,education_qualification,marital_status,picture) values('$a','$name','$dob','$district','$place','$house','$pin','$adno','$mobno','$email','$caste','$religion','$cat','$status','$qual','$mar','$photo')",$con);
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
		<li class="breadcrumb-item active" aria-current="page">User Registration</li>
	</ol>
</div>

<table align="Center" cellpadding="35">
<tr><th colspan="2" align="center"><h2 align="center">Registration Form</h2></th></tr></table>
<table align="Center" cellpadding="10">
<tr>
<td><label><b>Name       </b></label></td>
<td><input class="form-control" type="Text" name="name" required maxlength="20"></td>
</tr>
<tr>
<td><label><b>Date of Birth      <br></b></label></td>
<td><input class="form-control" type="date" name="dob"></td>
</tr>
<tr>
<td><label><b>Select Your District      <br></b></label></td>
<td><select class="form-control" name="district" size="1" required>
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
<td><label><b>Enter Your place      <br></b></label></td>
<td><input class="form-control" type="Text" name="place" required maxlength="30"></td>
</tr>
<tr>
<td><label><b>House Name        <br></b></label></td>
<td><input class="form-control" type="Text" name="hname" required maxlength="30"></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input class="form-control" type="text" name="pin" maxlength="6" onkeypress="return isNumberKey(evt)" required></td>
</tr>
<tr>
<td><label><b>Aadhar Number        <br></b></label></td>
<td><input class="form-control" type="text" name="adno" maxlength="12" required></td>
</tr>
<tr>
<td><label><b>Mobile Number        <br></b></label></td>
<td><input class="form-control" type="text" name="mobno" maxlength="12" required></td>
</tr>
<tr>
<td><label><b>Email ID       <br></b></label></td>
<td><input pclass="form-control" type="text" name="email" required maxlength="30"> <br></td>
</tr>
<tr>
<td><label><b>Select Your caste     <br></b></label></td>
<td><select class="form-control" name="caste" size="1" required>
<option value="selects" Selected>--Select Caste--
<option value="Hindu">Hindu
<option value="Christian">Christian
<option value="Muslim">Muslim
</select></td>
</tr>
<tr>
<td><label><b>Religion       <br></b></label></td>
<td><input class="form-control" type="Text" name="religion" required maxlength="30"></td>
</tr>
<tr>
<tr>
<td><label><b>Category       <br></b></label></td>
<td><select class="form-control" name="category" size="1">
<option value="selects" Selected>--Select Category--
<option value="General">General
<option value="OBC/OEC">OBC/OEC
<option value="SC/ST">SC/ST
<option value="Others">Others
</select></td>
</tr>
<tr>
<td><label><b>Poverty Status      <br></b></label></td>
<td><select class="form-control" name="status" size="1">
<option value="selects" Selected>--Select Status--
<option value="APL">APL
<option value="BPL">BPL</select></td>
</tr>
<tr>
<td><label><b>Education Qualification      <br></b></label></td>
<td><select class="form-control" name="qual" size="1">
<option value="selects" Selected>--Select Qualification--
<option value="Post Graduation">Post Graduation
<option value="Graduation">Graduation
<option value="Plus Two">Plus Two
<option value="SSLC">SSLC</select></td>
</tr>
<tr>
<td><label><b>Marital Status           <br></b></label></td>
<td><select class="form-control" name="optm" size="1" required>
<option value="selects" Selected>--Select Marital Status--
<option value="Single">Single
<option value="Married">Married
<option value="Widow">Widow
<option value="Divorcee">Divorcee
</select></td>
<tr>
<td><label><b>Photo   </b></label></td>
<td><input class="form-control" type="file" name="photo" id="photo"></td>
</tr>
<tr>
<td><label><b>Security Questions      <br></b></label></td>
<td><select class="form-control" name="que" size="1">
<option value="selects" Selected>--Select Questions--
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      <br></b></label></td>
<td><input class="form-control" type="Text" name="ans" maxlength="25"><br></td>
</tr>
<tr>
<td><label><b>Enter Password       <br></b></label></td>
<td><input class="form-control" type="password" name="password"maxlength="15"><br></td>
</tr>
<tr>
<td><label><b>Re-enter Password      <br></b></label></td>
<td><input class="form-control" type="password" name="repassword"maxlength="15"><br></td>
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
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Guest/index.html'">cancel</a></button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
