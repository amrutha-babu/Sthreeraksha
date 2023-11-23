<?php 
include 'db1.php';
include 'header.html';
if (isset($_POST["submit"])) 
{
	$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
	mysql_query("update tb_assign set progress='".$_POST["progress"]."',datetime='". date("Y-m-d h:i:sa")."',doc_upload='".basename($_FILES["file"]["name"])."' where complaint_id='".$_GET["comp_id"]."'") or die(mysql_error());
}
?>

<form action="" method="post"  enctype="multipart/form-data">
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Complaint Response</li>
	</ol>
</div>
<table cellpadding="20" align="center">
	<tr>
		<input type="hidden" name="comp" value="<?php echo $_GET["comp_id"] ?>">
		
		<th>
			Progress
		</th>
		<td>
			<textarea class="form-control" name="progress"></textarea> 
		</td>
	</tr>
	<tr>
		<th>
			Document
		</th>
		<td>
			<input class="form-control" type="file" name="file">
		</td>
	</tr>
	<tr>
<th colspan="2" align="center">
<div class="row mt-3">
<div class="col-md-3">
</div>
	<div class="col-md-6">
		<button align="center" type="submit" name="submit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">submit</button>
	</div>
	</div>
	<br>
</div>
</th>
</tr>
</table>
</form>

<?php 
include 'footer.html'
?>