<?php
session_start();
include 'header.html';
include 'db1.php';
?>
<html>
<body> 

<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="consdetails.php">Consortium Details</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Edit Consortium</li>
	</ol>
</div>
<?php
	$id=$_GET['id'];
	$res=mysql_query("select * from tb_consortium where consortium_id='$id'",$con);
	while($row=mysql_fetch_assoc($res))
	{
		$id=$row['consortium_id'];
		$lid=$row['log_id'];
		$c=$row['consortium_district'];
		$d=$row['consortium_head'];
		$e=$row['consortium_head_phone'];
		$f=$row['consortium_head_email'];
	}	
?>
<form action="" method="post"enctype="multipart/form-data" name="form4" id="form4">
<h2 align="center">Edit Consortium Details</h2><br>
<table align="Center" cellpadding="10">
	<tr>
		<td><label><b>Select Your District      </b></label></td>
		<td><input type="Text" class="form-control" value="<?php echo "$c"; ?>" name="dist" disabled></td>
	</tr>
	<tr>
		<td><label><b>Consortium Head Name       </b></label></td>
		<td><input type="Text" class="form-control" value="<?php echo "$d"; ?>" name="hname" maxlength="20" required></td>
	</tr>
	<tr>
		<td><label><b>Consortium Head Mobile Number        </b></label></td>
		<td><input type="Text" class="form-control" name="mobno" maxlength="10" pattern="[7-9]{1}[0-9]{9}" required value="<?php echo "$e"; ?>"></td>
	</tr>
	<tr>
		<td><label><b>Consortium Head Email ID       </b></label></td>
		<td><input type="email" class="form-control" name="email" maxlength="30" required value="<?php echo "$f"; ?>"></td>
	</tr>
	<tr>
		<th colspan="2" align="center">
			<div class="row mt-3">
				<div class="col-md-6">
					<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Save</a></button>
				</div>
				<div class="col-md-6">
					<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase" onclick="window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/consdetails.php'">Cancel</a></button>
				</div>
			</div>
		</th>
	</tr>
</table>
<?php
	if(isset($_POST['save']))
	{
		$hname=$_POST['hname'];
		$mobno=$_POST['mobno'];
		$email=$_POST['email'];
		$result=mysql_query("update tb_consortium set consortium_head='$hname',consortium_head_phone='$mobno',consortium_head_email='$email'where consortium_id='$id'",$con);
		if(isset($email) and isset($mobno))
		{
			$result=mysql_query("update tb_login set email_id='$email', password='$mobno' where log_id='$lid'",$con);
		}
		echo "<script> alert('Updated Successfully')</script>";
		echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/consdetails.php'</script>";
	}	
?>
</form>
<?php 
	include 'footer.html';
?>
</body>
</html>
