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
$re=mysql_query("select * from tb_consortium where consortium_id='$id'",$con);
while($row=mysql_fetch_assoc($re))
{
	$log=$row['log_id'];
$b=$row['consortium_district'];
$c=$row['consortium_head'];
$d=$row['consortium_head_phone'];
$e=$row['consortium_head_email'];
$f=$row['photo'];
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
<td><label><b>Select Your District      </b></label></td>
<td><select disabled name="district" size="1" class="form-control" value ="<?php echo "$b"; ?>" required>
<option value="<?php echo "$b"; ?>" Selected><?php echo "$b"; ?>
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
<td><input disabled type="Text" class="form-control" name="hname" maxlength="20" value="<?php echo "$c"; ?>" required></td>
</tr>
<tr>
<td><label><b>Consortium Head Mobile Number        </b></label></td>
<td><input type="Text" disabled class="form-control" name="mobno" maxlength="10" pattern="[7-9]{1}[0-9]{9}" value="<?php echo "$d"; ?>" required></td>
</tr>
<tr>
<td><label><b>Consortium Head Email ID       </b></label></td>
<td><input type="Text" disabled class="form-control" name="email" maxlength="30" value="<?php echo "$e"; ?>" required></td>
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
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
		<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Save</a></button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
<?php

if(isset($_POST['save']))
{
	$ques=$_POST['que'];
	$answ=$_POST['ans'];
	$result=mysql_query("update tb_login set security_question='$ques',security_answer='$answ'",$con);
	echo "<script> alert('Updated Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Consortium/profile.php'</script>";
}	

?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
