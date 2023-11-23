<!DOCTYPE html>
<html>
<head>
<?php
session_start();
include 'header.html';
include 'db1.php';
$com = $_GET["comp_id"];
$res= mysql_query("select * from tb_complaint where comp_id = '$com'",$con);
while($row=mysql_fetch_assoc($res))
{
	$sub=$row['comp_subject'];
	$type=$row['comp_type'];
	$det=$row['comp_details'];
}  
?>
</div>
</head>
<body>
	<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Add Follow Up</li>
	</ol>
<?php
  if(isset($_POST['submit']))
  {
	  $com=$com;
	  $status=$_POST['status'];
	  $det=$_POST['det'];
	  $verdict=$_POST['verdict'];
	  $date=Date("d-m-y");
	$result=mysql_query("insert into tb_followup values('','$com','$status','$det','$verdict','$date')",$con);	
	echo "insert into tb_followup values('','$com','$status','$det','$verdict','$date')";
	echo "<script> alert('Data Entered successfully')</script>"; 
 }
 if(isset($_POST['complete']))
  {
	  $com=$com;
	  $status="Closed";
	$result=mysql_query("update complaint set currstate='$status' where comp_id='$com')",$con);	
	echo "<script> alert('Complaint updated successfully')</script>";
	 echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Station/view complaint.php'</script>";
 }
?>	
<form action="" method="post"  enctype="multipart/form-data">
<table width="40%" align="Center" cellpadding="7">
<tr><th colspan="2" align="center"><h2 align="center">Add Follow Ups<br></h2></th></tr>
<tr>
<td><label><b>Complaint ID   <br></b></label></td>
<td><input class="form-control" type="text" name="conid" disabled value=<?php echo $com; ?> required="required" placeholder="Complaint ID"/></td>
</tr>
<tr>
<td><label><b>Status</b></label></td>
<td><input class="form-control"  type="text" name="status"  required="required" placeholder="Status"/></td>
</tr>
<tr>
<td><label><b>Description</b></label></td>
<td><textarea class="form-control"  name="det" cols="20" rows="5" required="required" placeholder="Description"></textarea></td>
</tr>
<tr>
<td><label><b>Verdict</b></label></td>
<td><textarea class="form-control"  name="verdict" cols="20" rows="5" required="required" placeholder="Verdict"></textarea></td>
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
		<button type="submit" name="complete" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">complete</a></button>
	</div>
	</div>
</div>
</th>
</tr>
</table>
</form>
</body>
</html>
