<html>
<head>
<?php
session_start();
include 'db1.php';
include 'header.html';
?>

<!-- //header -->

<!-- inner banner -->

<form action="" method="post"enctype="multipart/form-data" name="form4" id="form4">
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Profile</li>
	</ol>
</div>
<?php
$id=$_SESSION['user_id'];
$re=mysql_query("select * from tb_user where user_id='$id'");
while($row=mysql_fetch_assoc($re))
{
$a=$row['user_name'];
$b=$row['date_of_birth'];
$c=$row['district'];
$d=$row['place'];
$e=$row['house_name'];
$f=$row['pin'];
$g=$row['aadhar_no'];
$h=$row['mobile_no'];
$i=$row['email_id'];
$j=$row['caste'];
$k=$row['religion'];
$l=$row['category'];
$m=$row['poverty_status'];
$n=$row['education_qualification'];
$o=$row['marital_status'];
//$p=$row['picture'];
}
?>
<table align="Center" cellpadding="10" width="40%">
<tr><th colspan="2" align="center"><h2 align="center">My Profile</h2><br></th></tr>
<tr>
<td><label><b>Name       </b></label></td>
<td><input disabled class="form-control" value="<?php echo "$a"; ?>" type="Text" name="name" required></td>
</tr>
<tr>
<td><label><b>Date of Birth      <br></b></label></td>
<td><input disabled class="form-control" value="<?php echo "$b"; ?>"type="date" name="dob"></td>
</tr>
<tr>
<td><label><b>Select Your District      <br></b></label></td>
<td><select disabled class="form-control" name="district" size="1" required>
<option value="<?php echo "$c"; ?>"><?php echo "$c"; ?>
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
<td><label><b>Select Your place      <br></b></label></td>
<td><input disabled value="<?php echo "$d"; ?>" class="form-control" type="Text" name="place" required></td>
</tr>
<tr>
<td><label><b>House Name        <br></b></label></td>
<td><input disabled value="<?php echo "$e"; ?>" class="form-control" type="Text" name="hname" required></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input disabled value="<?php echo "$f"; ?>" class="form-control" type="text" name="pin" maxlength="6" onkeypress="return isNumberKey(evt)" required></td>
</tr>
<tr>
<td><label><b>Aadhar Number        <br></b></label></td>
<td><input disabled value="<?php echo "$g"; ?>" class="form-control" type="text" name="adno" maxlength="12" required></td>
</tr>
<tr>
<td><label><b>Mobile Number        <br></b></label></td>
<td><input disabled value="<?php echo "$h"; ?>" class="form-control" type="text" name="mobno" maxlength="12" required></td>
</tr>
<tr>
<td><label><b>Email ID       <br></b></label></td>
<td><input disabled value="<?php echo "$i"; ?>" class="form-control" type="text" name="email" maxlength="30" required></td>
</tr>
<tr>
<td><label><b>Select Your caste     <br></b></label></td>
<td><select disabled class="form-control" name="caste" size="1" required>
<option value="<?php echo "$j"; ?>"><?php echo "$j"; ?>
<option value="Hindu">Hindu
<option value="Christian">Christian
<option value="Muslim">Muslim
</select></td>
</tr>
<tr>
<td><label><b>Religion       <br></b></label></td>
<td><input disabled value="<?php echo "$k"; ?>"class="form-control" type="Text" name="religion" required></td>
</tr>
<tr>
<tr>
<td><label><b>Category       <br></b></label></td>
<td><select disabled class="form-control" name="category" size="1">
<option value="<?php echo "$l"; ?>"><?php echo "$l"; ?>
<option value="General">General
<option value="OBC/OEC">OBC/OEC
<option value="SC/ST">SC/ST
<option value="Others">Others
</select></td>
</tr>
<tr>
<td><label><b>Poverty Status      <br></b></label></td>
<td><select disabled class="form-control" name="status" size="1">
<option value="<?php echo "$m"; ?>"><?php echo "$m"; ?>
<option value="APL">APL
<option value="BPL">BPL</select></td>
</tr>
<tr>
<td><label><b>Education Qualification      <br></b></label></td>
<td><select disabled class="form-control" name="qual" size="1">
<option value="<?php echo "$n"; ?>"><?php echo "$n"; ?>
<option value="Post Graduation">Post Graduation
<option value="Graduation">Graduation
<option value="Plus Two">Plus Two
<option value="SSLC">SSLC</select></td>
</tr>
<tr>
<td><label><b>Marital Status           <br></b></label></td>
<td><select disabled class="form-control" name="optm" size="1" required>
<option value="<?php echo "$o"; ?>"><?php echo "$o"; ?>
<option value="Single">Single
<option value="Married">Married
<option value="Widow">Widow
<option value="Divorcee">Divorcee
</select></td>
</tr>
<th colspan="2" align="center">
<div class="row mt-3">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
		<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase"><a href="edit_profile.php">Edit Profile</a></button>
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
