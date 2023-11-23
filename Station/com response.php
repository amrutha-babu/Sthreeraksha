<?php 
include 'db1.php';
include 'header.html';
if (isset($_POST["submit"])) 
{
	$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
	mysql_query("update tb_forwardcomplaint set response='".$_POST["response"]."',response_datetime='". date("Y-m-d h:i:sa")."',doc_upload='".basename($_FILES["file"]["name"])."' where for_id='".$_POST["for_id"]."'") or die(mysql_error());
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
		<input type="hidden" name="for_id" value="<?php echo $_GET["for_id"] ?>">
		<th>
			Response
		</th>
		<td>
			<textarea name="response"></textarea> 
		</td>
	</tr>
	<tr>
		<th>
			Document
		</th>
		<td>
			<input type="file" name="file">
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" name="submit" value="Submit">
		</td>
	</tr>
</table>
</form>

<?php 
include 'footer.html'
?>