<?php
session_start();
include 'db1.php';
include 'header.html';
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
			<a href="profile.php">Profile</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
	</ol>
</div>
<?php
$id=$_SESSION['user_id'];
$re=mysql_query("select * from tb_ccenter where center_id='$id'");
while($row=mysql_fetch_assoc($re))
{
	$lid=$row['log_id'];
	$a=$row['center_name'];
	$b=$row['district'];
	$c=$row['place'];
	$d=$row['pin'];
	$e=$row['phone_no'];
	$f=$row['email_id'];
	$s=$row['status'];
	if($s=="0")
	{
		$g="Processing";
	}
	elseif($s=="1")
	{
		$g="Varified";
	}
	else
	{
		$g="Rejected";
	}
	$h=$row['doc_upload'];
	
}	
$resu=mysql_query("select * from tb_login where log_id='$lid'");
while($row=mysql_fetch_assoc($resu))
{	
	$q=$row['security_question'];
	$r=$row['security_answer'];
}
?>
<table align="Center" cellpadding="10">
<tr><th colspan="2"><h2 align="center">Edit Profile<br></h2></th></tr>
<tr>
<td><label><b>Center Name       </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$a"; ?>"name="cname" required></td>
</tr>
<tr>
<td><label><b>Select Your District      <br></b></label></td>
<td><select class="form-control" name="district" size="1" required>
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
<td><label><b>Select Your place      <br></b></label></td>
<td><input value="<?php echo "$c"; ?>" class="form-control" type="Text" name="place" required></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input value="<?php echo "$d"; ?>" class="form-control" type="text" name="pin" maxlength="6" onkeypress="return isNumberKey(evt)" required></td>
</tr>
<tr>
<td><label><b>Mobile Number        <br></b></label></td>
<td><input value="<?php echo "$e"; ?>" class="form-control" type="text" name="mobno" maxlength="12" required></td>
</tr>
<tr>
<td><label><b>Email ID       <br></b></label></td>
<td><input disabled value="<?php echo "$f"; ?>" class="form-control" type="text" name="email" required></td>
</tr>
<tr>
<td><label><b>Current Status       <br></b></label></td>
<td><input disabled value="<?php echo "$g"; ?>" class="form-control" type="text" name="status" required></td>
</tr>
<tr>
<td><label><b>Upload Documents</b></label></td>
<td><input disabled value="<?php echo "$h"; ?>" class="form-control" type="Text" name="doc" required></td>
</tr>
<tr>
<td><label><b>Security Questions      </b></label></td>
<td><select class="form-control" name="que" size="1">
<option value="<?php if($q!=""){echo "$q";}else{echo "select";}?>" Selected><?php if($q!=""){echo "$q";}else{echo "--Select Questions--";}?>
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      </b></label></td>
<td><input class="form-control" placeholder="security Answer" type="Text" name="ans" value="<?php if($r!=""){echo "$r";}?>"></td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-1">
	</div>
	<div class="col-md-5">
		<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Save</button>
	</div>
	<div class="col-md-5">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Cancel</button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
<?php
if(isset($_POST['save']))
{
	$district=$_POST['district'];
	$place=$_POST['place'];
	$pin=$_POST['pin'];
	$mobno=$_POST['mobno'];
	$que=$_POST['que'];
	$ans=$_POST['ans'];
	$result=mysql_query("update tb_ccenter set district='$district',place='$place',pin='$pin',phone_no='$mobno' where center_id='$id'",$con);
	$result=mysql_query("update tb_login set security_question='$que',security_answer='$ans' where log_id='$lid'",$con);
	echo "<script> alert('Updated Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/counsellingcenter/profile.php'</script>";	
}	
elseif(isset($_POST['cancel']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/counsellingcenter/profile.php'</script>";	
}	
?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
