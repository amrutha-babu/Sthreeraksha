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
		<li class="breadcrumb-item">
			<a href="profile.php">Profile</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
<table align="Center" cellpadding="10">
<tr><th colspan="2"><h2 align="center">Edit Profile</h2><br></th></tr>
<tr>
<td><label><b>Hostel Name       </b></label></td>
<td><input class="form-control" type="Text" name="place" value="<?php echo "$a"; ?>" required></td>
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
<td><label><b>Enter Your place      <br></b></label></td>
<td><input value="<?php echo "$c"; ?>" class="form-control" type="Text" name="place" required></td>
</tr>
<tr>
<td><label><b>Pin Code      <br></b></label></td>
<td><input value="<?php echo "$d"; ?>" class="form-control" type="text" name="pin" maxlength="6" onkeypress="return isNumberKey(evt)" required></td>
</tr>
<tr>
<td><label><b>Warden Name    </b></label></td>
<td><input class="form-control" type="Text" name="wname" value="<?php echo "$e"; ?>"></td>
</tr>
<tr>
<td><label><b>Number of rooms </b></label></td>
<td><input class="form-control" type="Text" name="rooms" value="<?php echo "$f"; ?>"></td>
</tr>
<tr>
<td><label><b>Mobile Number        <br></b></label></td>
<td><input value="<?php echo "$g"; ?>" class="form-control" type="text" name="mobno" maxlength="12" required></td>
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
<td><select class="form-control" name="que" size="1">
<option value="<?php if($m!=""){echo "$m";}else{echo "select";}?>" Selected><?php if($m!=""){echo "$m";}else{echo "--Select Questions--";}?>
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      </b></label></td>
<td><input placeholder="security Answer" class="form-control" type="Text" name="ans" value="<?php if($n!=""){echo "$n";}?>"></td>
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
	$wname=$_POST['wname'];
	$district=$_POST['district'];
	$place=$_POST['place'];
	$pin=$_POST['pin'];
	$mobno=$_POST['mobno'];
	$no=$_POST['rooms'];
	$que=$_POST['que'];
	$ans=$_POST['ans'];
	$result=mysql_query("update tb_hostel set district='$district',place='$place',pin='$pin',Warden='$wname',No_of_rooms='$no',mobile_no='$mobno' where hostel_id='$id'",$con);
	$resu=mysql_query("update tb_login set security_question='$que',security_answer='$ans' where log_id='$lid'",$con);
	if(isset($result))
	{
	echo "<script> alert('Updated Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Hostel/profile.php'</script>";	
	}
}	
elseif(isset($_POST['cancel']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Hostel/profile.php'</script>";	
}	
?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
