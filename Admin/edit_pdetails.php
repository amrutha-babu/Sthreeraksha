<?php
session_start();
include 'db1.php';
include 'header.html';
?>
<html>
<head>
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
		<li class="breadcrumb-item">
			<a href="pdetails.php">Pension Details</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">View Pension Details</li>
	</ol>
</div>
<?php
$id=$_GET['id'];
$_SESSION["pid"]=$id;
$re=mysql_query("select * from tb_pension where pid='$id'");
while($row=mysql_fetch_assoc($re))
{
$a=$row['type_of_pension'];
$b=$row['description'];
$c=$row['link'];
}	
?>
<br>
<h2 align="center">Job Details</h2><br>
<table disabled align="Center" cellpadding="7">
<tr>
<td><label><b>Type of Pension      </b></label></td>
<td><select disabled class="form-control" name="type" size="1" required>
<option value="<?php echo "$a"; ?>" Selected><?php echo "$a"; ?>
<option value="Widow">Widow
<option value="Student">Student
<option value="Adult">Adult
<option value="Unmarried Women">Unmarried women
</select></td>
</tr>
<tr>
<td><label><b>Description    </b></label></td>
<td><textarea disabled class="form-control" type="Textarea" name="des" maxlength="100" value="<?php echo "$b"; ?>"" required><?php echo "$b"; ?></textarea></td>
</tr>
<tr>
<td><label><b>Link     </b></label></td>
<td><input disabled class="form-control" type="Text" name="link" maxlength="30" required value="<?php echo "$c"; ?>"></td>
</tr>
<tr>
<th colspan="2" align="center">
<div class="row mt-3">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
		<button type="submit" name="edit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Edit</a></button>
	</div>
</div>
</th>
</tr>
</table>
<?php
if(isset($_POST['edit']))
{
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/Admin/pedit.php'</script>";		
}
?>
</form>
<?php 
include 'footer.html';
?>
</body>
</html>
