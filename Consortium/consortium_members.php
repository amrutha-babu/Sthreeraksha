<html>
<head>
</head>
<body> 
<form action="" method="post" enctype="multipart/form-data" name="form8" id="form8">
<?php
session_start();
include 'db1.php';
include 'header.html';
$id=$_SESSION['user_id'];
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$cid=$_POST['cid'];
	$mtype=$_POST['mtype'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$photo=$_FILES['pho']['name'];
	$tmp1=$_FILES['pho']['tmp_name'];
	move_uploaded_file($tmp1,"../Members/Photos/".$photo);
	$cph=mysql_query("select * from tb_consortium_members where member_phone='$mobno'",$con);
	$cem=mysql_query("select * from tb_consortium_members where member_email='$email'",$con);
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
		$type='consortium_member';
		$res=mysql_query("insert into tb_login (email_id,password,user_type)values ('$email','$mobno','$type')",$con);
		$var=mysql_query("select max(log_id) as log_id from tb_login",$con);
		while($row=mysql_fetch_assoc($var))
		{
			$a=$row['log_id'];	
			$result=mysql_query("insert into tb_consortium_members (log_id,consortium_id,member_name,member_type,member_phone,member_email,photo) values('$a','$cid','$name','$mtype','$mobno','$email','$photo')",$con);
			echo "<script> alert('Inserted Successfully')</script>";
		}
	}
}
?>
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Consortium Member Registration</li>
	</ol>
</div>
<h2 align="center">Consortium Member Registration Form<br><br></h2>
<table align="Center" cellpadding="7">
	<tr>
<td><label><b> Consortium  Id  </b></label></td>
<td><input type="Text" class="form-control" name="cid" value="<?php echo "$id"; ?>"></td>
</tr>
<tr>
<td><label><b>Member Name       </b></label></td>
<td><input maxlength="20" required type="Text" class="form-control" name="name"></td>
</tr>
<tr>
<td><label><b> Member Type  </b></label></td>
<td><input maxlength="20" required type="Text" class="form-control" name="mtype"></td>
</tr>
<tr>
<td><label><b>Mobile Number        <br></b></label></td>
<td><input required type="Text" maxlength="10" pattern="[7-9]{1}[0-9]{9}" class="form-control" name="mobno"></td>
</tr>
<tr>
<td><label><b>Email ID       <br></b></label></td>
<td><input required type="Text" maxlength="30" class="form-control" name="email"><br></td>
</tr>
<tr>
<td><label><b>Photo   </b></label></td>
<td><input required type="file" class="form-control" name="pho"></td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-2">
	</div>
	<div class="col-md-4">
		<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</a></button>
	</div>
	<div class="col-md-4">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">cancel</a></button>
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