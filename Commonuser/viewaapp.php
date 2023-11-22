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
<form action="" method="post" enctype="multipart/form-data" name="form5" id="form5">

<!-- //header -->
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Complaint Registration</li>
	</ol>
</div>
<?php
$aid= $_GET['app_id'];
$result = mysql_query("select * from tb_appointment where app_id = '$aid'",$con);
 while($row=mysql_fetch_assoc($result))
 {

	$id=$row['app_id'];
	$cid=$row['center_id'];
	$b=$row['district'];
	$c=$row['app_type'];
	$d=$row['status'];
	$e=$row['app_date'];
	$f=$row['app_time'];
	$doc=$row['doc_id'];
	echo "$doc";
	$h=$row['token_no'];
	$uid=$_SESSION['user_id'];
	$var=mysql_query("select * from tb_user where user_id='$uid'",$con);
	while($row=mysql_fetch_assoc($var))
	{
		$uname=$row['user_name'];
	}
	$resu=mysql_query("select center_name from tb_ccenter where center_id=$cid",$con);
	while($row=mysql_fetch_assoc($resu))
	{
		$a=$row['center_name'];
	}
	$resu1=mysql_query("select doc_name from tb_cdoctors where doc_id='$doc'",$con);
	while($row=mysql_fetch_assoc($resu1))
	{
		$g=$row['doc_name'];
	}
 }
?>
<br>
<table align="center" cellpadding="10">
	<tr><th colspan="2"><h2 align="center">Appointment Details</h2></th></tr>
<tr>
	<th> Appointment ID </th>
	<th><input disabled class="form-control" type="text" name="appid" required="required" placeholder="Appointment ID" value="<?php echo "$id" ?>" /></th>
</tr>
<tr>
	<th> District </th>
	<th><select disabled name="dist" id="dist" required class="form-control">
        <option value="<?php echo "$b" ?>"><?php echo "$b" ?></option>
		<option value="trivandrum">Trivandrum</option>
		<option value="kollam">Kollam</option>
		<option value="pathanamthitta">Pathanamthitta</option>
		<option value="alappuzha">Alappuzha</option>
		<option value="kottayam">Kottayam</option>
		<option value="idukki">Idukki</option>
		<option value="ernakulam">Ernakulam</option>
		<option value="thrissur">Thrissur</option>
		<option value="palakkad">Palakkad</option>
		<option value="malappuram">Malappuram</option>
		<option value="kozhikode">Kozhikode</option>
		<option value="vayanad">Vayanad</option>
		<option value="kannur">Kannur</option>
		<option value="kasargode">Kasargode</option></select>
	</th>
</tr>
<tr>
	<th> Centre Name</th>
	<th><input disabled class="form-control" type="text" name="cname" placeholder="Date of Incident" value="<?php echo "$a" ?>"/></th>
</tr>
<tr>
	<th> Type </th>
	<th> <input type="text" class="form-control" name="type1" maxlength="20" placeholder="Appointment Type" disabled value="<?php echo "$c" ?>"/></th>
</tr>
<tr>
	<th> Appointment Date </th>
	<th><input disabled class="form-control" type="date" name="adate" placeholder="Appointment Date" value="<?php echo "$e" ?>"/></th>
</tr>
<tr>
	<th> Appointment Time</th>
	<th><input disabled class="form-control" type="text" name="adate" placeholder="Appointment Time" value="<?php echo "$f" ?>"/></th>
</tr>
<tr>
	<th> Doctor Name </th>
	<td><input disabled class="form-control" value="<?php echo "$g";?>" type="text" name="doctor" ></td>
</tr>
<tr>
	<th> Token Number </th>
	<td><input disabled class="form-control" value="<?php echo "$h";?>" type="text" name="token" ></td>
</tr>
</table>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
