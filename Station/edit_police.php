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
			<a href="profile.php">Police</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
	</ol>
</div>
<?php
$id=$_GET['user_id'];
$re=mysql_query("select * from tb_police where police_id='$id'");
while($row=mysql_fetch_assoc($re))
{
	$lid=$row['log_id'];
	$a=$row['police_name'];
	$b=$row['police_dob'];
	$c=$row['designation'];
	$d=$row['phone_no'];
	$f=$row['email_id'];
	
}	
?>
<table align="Center" cellpadding="10">
<tr><th colspan="2"><h2 align="center">Edit Profile</h2></th></tr>
<tr>
<td><label><b>Police Name       </b></label></td>
<td><input  value="<?php echo "$a"; ?>" disabled class="form-control" type="Text" name="name" required></td>
</tr>
<tr>
<td><label><b>Date of Birth      <br></b></label></td>
<td><input class="form-control" disabled value="<?php echo "$b"; ?>"type="date" name="dob"></td>
</tr>
<tr>
<td><label><b>Designation      <br></b></label></td>
<td><input value="<?php echo "$c"; ?>" class="form-control" type="Text" name="designation" required></td>
</tr>

<tr>
<td><label><b>Mobile Number        <br></b></label></td>
<td><input value="<?php echo "$d"; ?>" class="form-control" type="text" name="mobno" maxlength="12" required disabled></td>
</tr>
<tr>
<td><label><b>Email ID       <br></b></label></td>
<td><input  value="<?php echo "$f"; ?>" class="form-control" type="text" name="email" disabled required></td>
</tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-5">
		<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Save</button>
	</div>
	<div class="col-md-5">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Station/view police.php">Cancel</button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
<?php
if(isset($_POST['save']))
{
	$name=$_POST['name'];
	$dob=$_POST['dob'];
	$des=$_POST['designation'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$result=mysql_query("update tb_police set designation='$des' where police_id='$id'",$con);
	$res=mysql_query("update tb_login set email_id='$email',password='$mobno' where log_id='$lid'",$con);
	echo "<script> alert('Updated Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Station/view police.php'</script>";	
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