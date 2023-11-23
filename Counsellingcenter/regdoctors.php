<?php
session_start();
include 'db1.php';
include 'header.html';
$id=$_SESSION['user_id'];
$var=mysql_query("select * from tb_ccenter where center_id='$id'",$con);
while($row=mysql_fetch_assoc($var))
{
	$cname=$row['center_name'];
	$di=$row['district'];
}
?>
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

<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Doctor Registration</li>
	</ol>
</div>
<form action="" method="post" enctype="multipart/form-data" name="form10" id="form10">
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$place=$_POST['place'];
	$house=$_POST['hname'];
	$pin=$_POST['pin'];
	$adno=$_POST['adno'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$qual=$_POST['qual'];
	$spec=$_POST['spec'];
	$photo=$_FILES['pic']['name'];
	$tmp1=$_FILES['pic']['tmp_name'];
	move_uploaded_file($tmp1,"../Doctors/Images/".$photo);
	$cph=mysql_query("select * from tb_cdoctors where doc_phone='$mobno'",$con);
	$cem=mysql_query("select * from tb_cdoctors where doc_email='$email'",$con);
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
		date_default_timezone_set("Asia/Kolkata");
		$date=date("d-m-Y") ;
		$result=mysql_query("insert into tb_cdoctors (doc_name,doc_dob,doc_district,doc_place,doc_house,pin,doc_aadhar,doc_phone,doc_email,center_id,doc_qualification,doc_specialization,photo_upload,date) values('$name','$dob','$di','$place','$house','$pin','$adno','$mobno','$email','$id','$qual','$spec','$photo','$date')",$con);
		if(isset($result))
			{
				echo "<script> alert('Inserted Successfully')</script>";
				echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Counsellingcenter/index.html'</script>";
			}
	}
}
elseif(isset($_POST['cancel']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Counsellingcenter/index.html'</script>";	
}	
?>

<h2 align="center"><br>Doctor Registration Form<br><br></h2>
<table align="Center" cellpadding="7">
<tr>
<td><label><b>Councelling Center Name      </b></label></td>
<td><input disabled class="form-control" value="<?php echo "$cname"; ?>" type="Text" name="cname"></td>
</tr>
<tr>
<td><label><b>Doctor Name       </b></label></td>
<td><input class="form-control" type="Text" name="name"></td>
</tr>
<tr>
<td><label><b>Date of Birth      </b></label></td>
<td><input  class="form-control" type="date" name="dob"></td>
</tr>
<tr>
<td><label><b>Select Your District      </b></label></td>
<td><select disabled class="form-control" name="district" size="1">
<option value="<?php echo "$di" ?>" Selected><?php echo "$di" ?>
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
<td><label><b>Enter Your place      </b></label></td>
<td><input class="form-control" type="Text" name="place"></td>
</tr>
<tr>
<td><label><b>House Name        </b></label></td>
<td><input class="form-control" type="Text" name="hname"></td>
</tr>
<tr>
<td><label><b>Pin Code      </b></label></td>
<td><input class="form-control" maxlength="6" type="Text" name="pin"></td>
</tr>
<tr>
<td><label><b>Aadhar Number        </b></label></td>
<td><input class="form-control" maxlength="12" type="Text" name="adno"></td>
</tr>
<tr>
<td><label><b>Mobile Number        </b></label></td>
<td><input class="form-control" maxlength="10" pattern="[7-9]{1}[0-9]{9}" type="Text" name="mobno"></td>
</tr>
<tr>
<td><label><b>Email ID       </b></label></td>
<td><input class="form-control" type="Text" name="email"></td>
</tr>
<tr>
<td><label><b>Education Qualification      </b></label></td>
<td><input class="form-control" type="Text" name="qual"></td>
</tr>
<tr>
<td><label><b>Specialization      </b></label></td>
<td><input class="form-control" type="Text" name="spec"></td>
</tr>
<tr>
<td><label><b>Upload Picture </b></label></td>
<td><input type="file" name="pic"></td>
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
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Counsellingcenter/index.html">cancel</a></button>
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