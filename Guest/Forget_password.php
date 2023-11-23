<?php
include 'header.html';
?>
<html>
<head>
</head>
<body> 
<form id="form4" method="post">
<?php
include 'db1.php';
if(isset($_POST['submit']))
{
	$mail=$_POST['email'];
	$que=$_POST['que'];
	$ans=$_POST['ans'];
	$result=mysql_query("select * from tb_login where email_id='$mail' and security_question='$que' and security_answer='$ans'",$con);
	while ($row=mysql_fetch_assoc($result)) 
		{
			$p=$row['password'];
		}  
	if(mysql_num_rows($result) > 0)
	{
		
		echo "<script>alert('Your Password is : ".$p."')</script>";
		echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Guest/login.php'</script>";
	}
	else
	{
		echo "<script>alert('Invalid user')</script>";
	}
}
elseif (isset($_POST['cancel']))
 {
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Guest/login.php'</script>";
}
?>
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
	</ol>
</div>
<table width="30%" align="Center" cellpadding="20">
<tr>
<th colspan="2">
<h2 align="center">Forgot Password<br></h2>
</th>
</tr>
</table>
<table align="Center" cellpadding="10">
<tr>
<td><label><b>Email ID       </b></label></td>
<td><input class="form-control" type="Text" name="email"maxlength="30"></td>
</tr>
<tr>
<td><label><b>Security Questions      </b></label></td>
<td><select name="que" class="form-control" size="1">
<option value="selects" Selected>Select Questions....
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      </b></label></td>
<td><input type="Text" class="form-control" name="ans"maxlength="25"></td>
</tr>
<tr>
<th colspan="2" align="center">
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
</html>
<?php
include 'footer.html';
?>