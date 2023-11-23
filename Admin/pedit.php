<?php
session_start();
include 'header.html';
include 'db1.php';
?>
<html>
<head>
</head>
<body> 

<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="pdetails.php">Pension Details</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Edit Pension Details</li>
	</ol>
</div>
<?php
$id=$_SESSION['pid'];
$re=mysql_query("select * from tb_pension where pid='$id'");
while($row=mysql_fetch_assoc($re))
{
$a=$row['type_of_pension'];
$b=$row['description'];
$c=$row['link'];
}	
?>
<form action="" method="post"enctype="multipart/form-data" name="form4" id="form4">
<br><h2 align="center">Edit Details</h2><br>
<table align="Center" cellpadding="7">
<tr>
<td><label><b>Type of Pension      </b></label></td>
<td><select class="form-control" name="type" size="1" required>
<option value="<?php echo "$a"; ?>" Selected><?php echo "$a"; ?>
<option value="Widow">Widow
<option value="Student">Student
<option value="Adult">Adult
<option value="Unmarried Women">Unmarried women
</select></td>
</tr>
<tr>
<td><label><b>Description  </b></label></td>
<td><textarea  class="form-control" name="des" maxlength="100" value="<?php echo "$b"; ?>" required><?php echo "$b"; ?></textarea></td>
</tr>
<tr>
<td><label><b>Link     </b></label></td>
<td><input class="form-control" type="Text" name="link" maxlength="30" required value="<?php echo "$c"; ?>"></td>
</tr>
<tr>
<th colspan="2" align="center"><br>
<div class="row mt-3">
	<div class="col-md-6">
		<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Save</a></button>
	</div>
	<div class="col-md-6">
		<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Cancel</a></button>
	</div>
</div>
</div>
</th>
</tr>
</table>
<?php
if(isset($_POST['save']))
{
	$type=$_POST['type'];
	$des=$_POST['des'];
	$link=$_POST['link'];
	$result=mysql_query("update tb_pension set type_of_pension='$type',description='$des',link='$link' where pid='$id'",$con);
	echo "<script> alert('Updated Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/pdetails.php'</script>";	
}	
elseif(isset($_POST['cancel']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/pdetails.php'</script>";
}
?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
