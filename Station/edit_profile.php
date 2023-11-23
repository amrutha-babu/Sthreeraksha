<html>
<head>
<?php
session_start();
include 'db1.php';
include 'header.html';
?>
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
			<a href="profile.php">Profile</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
	</ol>
</div>
<?php
$id=$_SESSION['user_id'];
$re=mysql_query("select * from tb_police_station where station_id='$id'",$con);
while($row=mysql_fetch_assoc($re))
{
$log=$row['log_id'];
$a=$row['district'];
$b=$row['place'];
$c=$row['station_pin'];
$d=$row['station_no'];
$e=$row['incharge_name'];
$f=$row['incharge_phone'];
$g=$row['incharge_email'];
$h=$row['photo'];
}
$res=mysql_query("select * from tb_login where log_id='$log'",$con);
while ($row=mysql_fetch_assoc($res))
{
	$que=$row['security_question'];
	$ans=$row['security_answer'];
}
?>
<table align="Center" cellpadding="35">
<tr><th colspan="2" align="center"><h2 align="center">Edit Profile</h2></th></tr></table>
<table width="40%" align="Center" cellpadding="10">
	<tr>
<td><label><b>Select Your District      <br></b></label></td>
<td><select disabled name="district" class="form-control" size="1">
<option value="<?php echo "$a"; ?>" Selected><?php echo "$a"; ?>
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
<td><input disabled value="<?php echo "$b"; ?>" type="Text" class="form-control" name="place" maxlength="30" required="" ></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input disabled value="<?php echo "$c"; ?>" type="Text" class="form-control" name="pin" maxlength="6" required="" ></td>
</tr>
<tr>
<td><label><b>Station Phone Number</b></label></td>
<td><input disabled value="<?php echo "$d"; ?>" maxlength="12" type="Text" class="form-control" name="stno" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Name</b></label></td>
<td><input disabled value="<?php echo "$e"; ?>" maxlength="20" type="Text" class="form-control" name="name" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Phone Number</b></label></td>
<td><input disabled value="<?php echo "$f"; ?>" type="Text" maxlength="10" pattern="[7-9]{1}[0-9]{9}" class="form-control" name="phno" required=""></td>
</tr>
<tr>
<td><label><b>Incharge Email ID</b></label></td>
<td><input disabled value="<?php echo "$g"; ?>" type="Text" maxlength="30" class="form-control" name="email" required=""></td>
</tr>
<tr>
<td><label><b>Photo</b></label></td>
<td><input disabled type="Text" value="<?php echo "$h"; ?>" class="form-control" name="pic"></td>
</tr>
<tr>
<td><label><b>Security Questions      <br></b></label></td>
<td><select  class="form-control" name="que" size="1" >
<option value="<?php if(isset($que)){echo "$que";}else{echo "--Select Questions--";} ?>" Selected><?php if(isset($que)){echo "$que";}else{echo "--Select Questions--";} ?>
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      <br></b></label></td>
<td><input  class="form-control" type="Text" name="ans" maxlength="25" value="<?php if(isset($ans)){echo "$ans";}else{echo "No Answers";} ?>"><br></td>
</tr>
<tr>
<th colspan="2" align="center">
<div class="row mt-3">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
		<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Save</a></button>
	</div>
	</div>
	<br>
</div>
</th>
</tr>
</table>
<?php

if(isset($_POST['save']))
{
	$ques=$_POST['que'];
	$answ=$_POST['ans'];
	$result=mysql_query("update tb_login set security_question='$ques',security_answer='$answ' where log_id='$log'",$con);
	echo "<script> alert('Updated Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Station/profile.php'</script>";
}	

?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
