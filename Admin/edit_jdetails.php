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
			<a href="jdetails.php">Job details</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">View Job Details</li>
	</ol>
</div>
<?php
$id=$_GET['id'];
$_SESSION["jid"]=$id;
$re=mysql_query("select * from tb_joboffer where job_id='$id'");
while($row=mysql_fetch_assoc($re))
{
$a=$row['job_title'];
$b=$row['no_of_post'];
$c=$row['qualification'];
$d=$row['experience'];
$e=$row['salary'];
$f=$row['application_sdate'];
$g=$row['application_edate'];
$h=$row['age_limit'];
$i=$row['link'];
}	
?>
<form action="" method="post"enctype="multipart/form-data" name="form4" id="form4">
<br><h2 align="center">View Details</h2><br>
<table align="Center" cellpadding="7">
<tr>
<td><label><b>Job Title       </b></label></td>
<td><input disabled class="form-control" type="Text" name="title" value="<?php echo "$a"; ?>" required></td>
</tr>
<tr>
<td><label><b>Number of post      </b></label></td>
<td><input disabled class="form-control" type="Text" name="post" value="<?php echo "$b"; ?>" required></td>
</tr>
<tr>
<td><label><b>Qualification       </b></label></td>
<td><input disabled class="form-control" type="Text" name="qual" value="<?php echo "$c"; ?>" required></td>
</tr>
<tr>
<td><label><b>Experiance     <br></b></label></td>
<td><input disabled class="form-control" type="Text" name="exp" value="<?php echo "$d"; ?>" required></td>
</tr>
<tr>
<td><label><b>Salary     <br></b></label></td>
<td><input disabled class="form-control" type="Text" name="sal" value="<?php echo "$e"; ?>" required></td>
</tr>
<tr>
<td><label><b>Application Starting Date     </b></label></td>
<td><input disabled class="form-control" type="date" name="sdate" value="<?php echo "$f"; ?>" required></td>
</tr>
<tr>
<td><label><b>Application Ending Date</b></label></td>
<td><input disabled class="form-control" type="date" name="edate" value="<?php echo "$g"; ?>" required></td>
</tr>
<tr>
<td><label><b>Age Limit     <br></b></label></td>
<td><input disabled class="form-control" type="Text" name="age" value="<?php echo "$h"; ?>" required></td>
</tr>
<tr>
<td><label><b>Link     <br></b></label></td>
<td><input disabled class="form-control" type="Text" name="link" required value="<?php echo "$i"; ?>"></td>
</tr>
<tr>
<th colspan="2" align="center">
<div class="row mt-3">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
		<button type="submit" name="edit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Edit</a></button><br>
	</div>
</div>
</th>
</tr>
</table>
<?php
if(isset($_POST['edit']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/jedit.php'</script>";		
}
?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
