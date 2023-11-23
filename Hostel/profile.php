<?php
session_start();
include 'db1.php';
include 'header.html';
?>
<html>
<head>
</head>
<body> 
<!-- //header -->

<!-- inner banner -->
<div class="inner-banner" id="home">
	<div class="container">
	</div>
</div>
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
$re=mysql_query("select * from tb_hostel where hostel_id='$id'");
while($row=mysql_fetch_assoc($re))
{
	$lid=$row['log_id']; 
	$a=$row['hostel_name'];
	$b=$row['district'];
	$c=$row['place'];
	$d=$row['pin'];
	$e=$row['warden'];
	$f=$row['no_of_rooms'];
	$g=$row['mobile_no'];
	$h=$row['email_id'];
	$i=$row['status'];
	if($i=="0")
	{
		$j="Processing";
	}
	elseif($i=="1")
	{
		$j="Varified";
	}
	else
	{
		$j="Rejected";
	}
	$k=$row['doc_upload'];
	$l=$row['picture'];
}
$resu=mysql_query("select * from tb_login where log_id='$lid'");
while($row=mysql_fetch_assoc($resu))
{	
	$m=$row['security_question'];
	$n=$row['security_answer'];
}
?>
<table align="Center" width="40%" cellpadding="10">

<tr><th colspan="2"><h2 align="center">My Profile</h2><br></th></tr>
<tr>
<td><label><b>Hostel Name       </b></label></td>
<td><input disabled class="form-control" type="Text" name="place" value="<?php echo "$a"; ?>" required></td>
</tr>
<tr>
<td><label><b>Select Your District      <br></b></label></td>
<td><select disabled class="form-control" name="district" size="1" required>
<option value="<?php echo "$b"; ?>"><?php echo "$b"; ?>
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
<td><input disabled value="<?php echo "$c"; ?>" class="form-control" type="Text" name="place" required></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input disabled value="<?php echo "$d"; ?>" class="form-control" type="text" name="pin" maxlength="6" onkeypress="return isNumberKey(evt)" required></td>
</tr>
<tr>
<td><label><b>Warden Name    </b></label></td>
<td><input disabled class="form-control" type="Text" name="wname" value="<?php echo "$e"; ?>"></td>
</tr>
<tr>
<td><label><b>Number of rooms </b></label></td>
<td><input disabled class="form-control" type="Text" name="rooms" value="<?php echo "$f"; ?>"></td>
</tr>
<tr>
<td><label><b>Mobile Number        <br></b></label></td>
<td><input value="<?php echo "$g"; ?>" class="form-control" type="text" name="mobno" maxlength="12" disabled required></td>
</tr>
<tr>
<td><label><b>Email ID       <br></b></label></td>
<td><input value="<?php echo "$h"; ?>" class="form-control" type="text"disabled></td>
</tr>
<tr>
<td><label><b>Current Status       <br></b></label></td>
<td><input value="<?php echo "$j"; ?>" class="form-control" type="text"disabled></td>
</tr>
<tr>
<td><label><b>Upload Documents</b></label></td>
<td><input value="<?php echo "$k"; ?>" class="form-control" type="text"disabled></td>
</tr>
<tr>
<td><label><b>Upload Pictures</b></label></td>
<td><input value="<?php echo "$l"; ?>" class="form-control" type="text"disabled></td>
</tr>
<tr>
<td><label><b>Security Questions      </b></label></td>
<td><select disabled class="form-control" name="que" size="1">
<option value="<?php if($m!=""){echo "$m";}else{echo "select";}?>" Selected><?php if($m!=""){echo "$m";}else{echo "--Select Questions--";}?>
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      </b></label></td>
<td><input placeholder="security Answer" disabled class="form-control" type="Text" name="ans" value="<?php if($n!=""){echo "$n";}?>"></td>
</tr>
<tr>
<th colspan="2" align="center">
<div class="row mt-3">
<div class="col-md-4">
</div>
	<div class="col-md-5">
		<button align="center" type="submit" name="edit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase"><a href="edit_profile.php">Edit Profile</a></button>
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
