<?php 
session_start();
include 'db1.php';
include 'header.html';
if (isset($_POST["save"])) {
	$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

	mysql_query("insert into tb_complaint( `user_id`,`comp_subject`, `comp_type`,  `comp_details`, `date`, `status`, `doc_upload`) values('".$_SESSION['user_id']."','".$_POST["subject"]."','".$_POST["complaint_type"]."','".$_POST["comp_details"]."','". date("Y-m-d") ."','Submitted','".$_FILES["file"]["name"]."')",$con) or die(mysql_error());
	echo "<script>alert('Saved Successfully')</script>";
	echo "<script>window.location.href='complaint.php'</script>";
}
?>
<form method="post" enctype="multipart/form-data">
	<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Complaint</li>
	</ol>
</div>


	<table width="35%"align="center" cellpadding="10"  >
		<tr><th colspan="2"><h2> Complaint Registration</h2></th></tr>
		<tr>
			<th>Subject</th>
			<td>
				<input type="text" class="form-control" name="subject" required>
			</td>
		</tr>
		<tr>
			<th>Complaint Type</th>
			<td>
				<select name="complaint_type" class="form-control" required>
					<option value="option 1">---Select Type---</option>
					<option value="Acid Attack">Acid Attack</option>
					<option value="Cyber crime against women">Cyber crime against women</option>
					<option value="Dowry death">Dowry death</option>
					<option value="Denial of maternity benefits">Denial of maternity benefits</option>
					<option value="Free legal aids for women">Free legal aids for women</option>
					<option value="Gender discrimination">Gender discrimination</option>
					<option value="Dowry harrassment">Dowry harrassment</option>
					<option value="Indecent representation of women">Indecent representation of women</option>
					<option value="Rape/attempt to rape">Rape/attempt to rape</option>
					<option value="Right to live with dignity">Right to live with dignity</option>
					<option value="Sex selective abortion">Sex selective abortion</option>
					<option value="Sexual assault">Sexual assault</option>
					<option value="Sexual harrassment">Sexual harrassment</option>
					<option value="Stalking">Stalking</option>
					<option value="Traditional practices">Traditional practices(sati, devdasi)</option>
					<option value="Prostitution of women">Prostitution of women</option>
					<option value="Police apathy against women">Police apathy against women</option>
					<option value="Right to exercise choice in marriage">Right to exercise choice in marriage</option>
					<option value="Womens right of custody of children">Womens right of custody of children</option>
					<option value="other">Others</option></select></th>
				</select>
			</td>
		</tr>
		<tr>
			<th>Complaint Details</th>
			<td>
				<textarea name="comp_details" class="form-control" required></textarea>
			</td>
		</tr>
		<tr>
			<th>Document</th>
			<td>
				<input type="file" name="file">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div class="row mt-3">
					<div class="col-md-6">
					<button type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Register</a></button>
					</div>
					<div class="col-md-6">
						<button type="submit" name="cancel" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Cancel</a></button>
					</div>
				</div>
			</td>
		</tr>
	</table>
	</form>

<?php
include 'footer.html';
?>