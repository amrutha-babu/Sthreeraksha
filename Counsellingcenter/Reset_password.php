<html>
<head>
</head>
<body> 
<form id="form2" method="post">
<?php
include 'db1.php';
include 'header.html';
if(isset($_POST['submit']))
{
	$mail=$_POST['email'];
	$pass=$_POST['pass'];
	$npass=$_POST['npass'];
	$repass=$_POST['repass'];
	$result=mysql_query("select * from tb_login where email_id='$mail' and password='$pass'",$con);   
	if(mysql_num_rows($result) > 0)
	{
		if($npass!=$repass)
		{
			echo "<script> alert('Password doesnot match')</script>";
		}
		else
		{
			while($row=mysql_fetch_assoc($result))
			$res=mysql_query("update tb_login set password='$npass' where email_id='$mail' and password='$pass'",$con);
			echo "<script>alert('Password is Successfully Updated')</script>";
		}
	}
	else
	{
		echo "<script>alert('Invalid user')</script>";
	}
}
?>

<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Reset Password</li>
	</ol>
</div>
<table width="40%" align="Center" cellpadding="8">
<tr>
<th colspan="2">
<h2 align="center">Reset Password<br></h2>
</th>
</tr>
<tr>
<td><label class="form-control1"><b>Email ID       <br></b></label></td>
<td><input class="form-control" type="Text" name="email" required><br></td>
</tr>
<tr>
<td><label class="form-control1"><b>Password       <br></b></label></td>
<td><input class="form-control" type="password" name="pass" required><br></td>
</tr>
<tr>
<td><label class="form-control1"><b>Enter New Password       <br></b></label></td>
<td><input class="form-control" type="password" name="npass"required><br></td>
</tr>
<tr>
<td><label class="form-control1"><b>Re-enter Password      <br></b></label></td>
<td><input class="form-control" type="password" name="repass"required><br></td>
</tr>
<tr>
<br><th colspan="2">
<div class="row mt-3">
</div>
<div class="col-md-3">
</div>
<div class="col-md-4">
<button type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">SUBMIT</button>
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