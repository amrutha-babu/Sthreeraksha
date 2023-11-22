<?php
session_start();
include 'db1.php';
include 'header.html';
if (isset($_POST["save"])) {
	mysql_query("insert into tb_appointment values('','".$_SESSION["user_id"]."','".$_POST["center"]."','".$_POST["date"]."','".$_POST["time"]."','".$_POST["app_type"]."','Requested')") or die(mysql_error());
	echo "<script>alert('Appointment Saved')</script>";
}
?>

<form action="" method="post">
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Request Appointment</li>
	</ol>
</div>
	<table align="center" width="40%" cellpadding="10" cellspacing="30">
		<tr><th colspan="2"><h2><br>Appointment Registration</h2></th></tr>
		<tr>
			<th>
				Councelling Center
			</th>
			<td>
				
				<select class="form-control" required name="center">
					<option >--select--</option>
					<?php
					$r=mysql_query("select center_name,center_id from tb_ccenter",$con) or die(mysql_error());
					while ($row=mysql_fetch_assoc($r)) {
					
					
					 ?>
					<option class="form-control" required value="<?php echo $row["center_id"] ?>"><?php echo $row["center_name"] ?></option>
					<?php
				}
					?>
				</select>
			</td>

		</tr>
		<tr>
			<th>
				Date 
			</th>
			<td>
				<input required class="form-control" type="Date" name="date">
			</td>
		</tr>
		<tr>
			<th>
				Time
			</th>
			<td>
				<input required class="form-control" type="time" name="time">
			</td>
		</tr>
		<tr>
			<th>
				Appointment Type
			</th>
			<td>
				<select required class="form-control" name="app_type">
					<option>--select--</option>
					<option value="Personal">Personal</option>
				</select>
			</td>

		</tr>
		<tr>
			<td colspan="2">
			<div class="row mt-3">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6">
					<button align="center" type="submit" name="edit" class="btn btn-aasana-w3 btn-block w-100 text-uppercase"><a href="edit_profile.php">Edit Profile</a></button>
				</div>
			</div>
			</td>
		</tr>
	</table>
</form>
<?php

include 'footer.html';
?>