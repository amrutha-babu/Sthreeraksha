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
		
		<li class="breadcrumb-item active" aria-current="page">Edit Consortium Members</li>
	</ol>
</div>
<?php
$id=$_GET['id'];
$re=mysql_query("select * from tb_consortium_members where member_id='$id'",$con);

while($row=mysql_fetch_assoc($re))
{
	$lid=$row['log_id'];
$b=$row['member_name'];
$c=$row['member_type'];
$e=$row['member_phone'];
$f=$row['member_email'];
}
?>
<table align="Center" cellpadding="35">
<tr><th colspan="2" align="center"><h2 align="center">Edit Consortium Members Profile</h2></th></tr></table>
<table width="40%" align="Center" cellpadding="10">
<tr>
<td><label><b>Member Name       </b></label></td>
<td><input type="Text" class="form-control" name="mname" maxlength="20" value="<?php echo "$b"; ?>" required></td>
</tr>
<tr>
<td><label><b>Member Type      </b></label></td>
<td><input type="Text" class="form-control" name="mtype" maxlength="20" value="<?php echo "$c"; ?>" required></td>
</tr>
<tr>
<td><label><b>Mobile Number        </b></label></td>
<td><input type="Text" class="form-control" name="mobno" maxlength="10" pattern="[7-9]{1}[0-9]{9}" value="<?php echo "$e"; ?>" required></td>
</tr>
<tr>
<td><label><b>Email ID       </b></label></td>
<td><input type="Text" class="form-control" name="email" maxlength="30" value="<?php echo "$f"; ?>" required></td>
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
	$name=$_POST['mname'];
	$cid=$_POST['cid'];
	$type=$_POST['mtype'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$result=mysql_query("update tb_consortium_members set member_name='$name',member_type='$type',member_phone='$mobno',member_email='$email' where member_id='$id'",$con);
	if(isset($email) and isset($mobno))
		{
			$result=mysql_query("update tb_login set email_id='$email', password='$mobno' where log_id='$lid'",$con);
		}
	echo "<script> alert('Updated Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Consortium/memberdetails.php'</script>";
}	

?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
