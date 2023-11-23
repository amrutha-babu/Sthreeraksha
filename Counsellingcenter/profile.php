<html>
<head>
<?php
session_start();
include 'db1.php';
include "header.html";
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
		<li class="breadcrumb-item active" aria-current="page">Profile</li>
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
if($s=="S")
{
	$g="Submitted";
}
elseif($s=="P")
{
	$g="Processing";
}
else
{
	$g="Verified";
}
$h=$row['doc_upload'];
//$p=$row['picture'];
}
$resu=mysql_query("select * from tb_login where log_id='$lid'");
while($row=mysql_fetch_assoc($resu))
{	
	$q=$row['security_question'];
	$r=$row['security_answer'];
}
?>
<table align="Center" width="40%" cellpadding="10">
<tr><th colspan="2"><h2 align="center">My Profile</h2></th></tr><br>
<tr>
<td><label ><b>Center Name       </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$a"; ?>"></td>
</tr>
<tr>
<td><label><b>District      </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$b"; ?>"></td>
</tr>
<tr>
<td><label><b>place      </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$c"; ?>"></td>
</tr>
<tr>
<td><label><b>Pin Code      </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$d"; ?>"></td>
</tr>
<tr>
<td><label><b>Phone Number        </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$e"; ?>"></td>
</tr>
<tr>
<td><label><b>Email ID       </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$f"; ?>"></td>
</tr>
<tr>
<td><label><b>Current Status       </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$g"; ?>"></td>
</tr>
<tr>
<td><label><b>Document Upload     </b></label></td>
<td><input disabled  class="form-control" type="Text" value="<?php echo "$h"; ?>"></td>
</tr>
<tr>
<td><label><b>Security Questions      </b></label></td>
<td><select disabled class="form-control" name="que" size="1">
<option value="<?php if($q!=""){echo "$q";}else{echo "select";}?>" Selected><?php if($q!=""){echo "$q";}else{echo "--Select Questions--";}?>
<option value="which is your favourite book ?">Which is your favourite book ?
<option value="who is your favourite musician ?">Who is your favourite musician ?
<option value="which is your favourite place ?">which is your favourite place ?
<option value="which is your lucky number ?">which is your lucky number ?
<option value="who is your favourite singer ?">who is your favourite singer ?
</tr>
<tr>
<td><label><b>Security Answer      </b></label></td>
<td><input placeholder="security Answer" disabled class="form-control" type="Text" name="ans" value="<?php if($r!=""){echo "$r";}?>"></td>
</tr>
<tr>
<th colspan="2" align="center">
<div class="row mt-3">
<div class="col-md-3">
</div>
	<div class="col-md-6">
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
