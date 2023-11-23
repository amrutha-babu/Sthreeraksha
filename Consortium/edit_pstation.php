<?php
session_start();
include 'db1.php';
include 'header.html';
$id=$_SESSION['user_id'];
$re=mysql_query("select * from tb_consortium where consortium_id='$id'",$con);
while ($row=mysql_fetch_assoc($re)) 
{
	$dis=$row['consortium_district'];
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

<form action="" method="post"enctype="multipart/form-data" name="form4" id="form4">
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="profile.php">Police</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
	</ol>
</div>
<?php
$res=mysql_query("select * from tb_police_station where district='$dis'",$con);
while($row=mysql_fetch_assoc($res))
{
	$id=$row['station_id'];
	$lid=$row['log_id'];
	$a=$row['place'];
	$b=$row['district'];
	$d=$row['station_no'];
	$c=$row['station_pin'];
	$e=$row['incharge_name'];
	$f=$row['incharge_phone'];
	$g=$row['incharge_email'];
	$h=$row['photo'];
}
?>
<table align="Center" cellpadding="10">
<tr><th colspan="2"><h2 align="center">Edit Profile</h2></th></tr>
<tr>
<td><label><b>Select Your District      <br></b></label></td>
<td><select disabled name="district" class="form-control" size="1">
<option value="<?php echo "$b"?>" Selected><?php echo "$b"?>
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
<td><input disabled value="<?php echo "$a"?>" type="Text" class="form-control" name="place" maxlength="30" required="" ></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input disabled type="Text"value="<?php echo "$c"?>"  class="form-control" name="pin" maxlength="6" required="" ></td>
</tr>
<tr>
<td><label><b>Station Phone Number</b></label></td>
<td><input maxlength="12" type="Text" value="<?php echo "$d"?>" class="form-control" name="stno" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Name</b></label></td>
<td><input maxlength="20" type="Text" value="<?php echo "$e"?>"  class="form-control" name="name" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Phone Number</b></label></td>
<td><input type="Text" maxlength="10" value="<?php echo "$f"?>" pattern="[7-9]{1}[0-9]{9}" class="form-control" name="phno" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Email ID</b></label></td>
<td><input type="Text" maxlength="30" value="<?php echo "$g"?>"  class="form-control" name="email" required=""></td>
</tr>
<tr>
<td><label><b>Photo</b></label></td>
<td><input type="file" class="form-control" enctype="multipart/form-data" value="<?php echo $h ;?>" name="pic"><label><?php echo $h ;?></label></td>
</tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-5">
		<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Save</button>
	</div>
	<div class="col-md-5">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Consortium/view pstation.php">Cancel</button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
<?php
if(isset($_POST['save']))
{
	$stno=$_POST['stno'];
	$name=$_POST['name'];
	$phno=$_POST['phno'];
	$email=$_POST['email'];
	$photo=$_FILES['pic']['name'];
	$tmp1=$_FILES['pic']['tmp_name'];
	move_uploaded_file($tmp1,"../Station/Photos/".$photo);
	$result=mysql_query("update tb_police_station set Station_no='$stno',incharge_name='$name',incharge_phone='$phno',incharge_email='$email',photo='$photo' where station_id='$id'",$con);
	echo "update tb_police_station set Station_no='$stno',incharge_name='$name',incharge_phone='$phno',incharge_email='$email',photo='$photo' where station_id='$id'";
	die();
	$res=mysql_query("update tb_login set email_id='$email',password='$phno' where log_id='$lid'",$con);
	echo "<script> alert('Updated Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Consortium/view pstation.php'</script>";	
}	
elseif(isset($_POST['cancel']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Station/view police.php'</script>";	
}	
?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>