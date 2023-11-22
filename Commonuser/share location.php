<?php 
session_start();
include 'db1.php';
include 'header.html';
if (isset($_POST["save"])) {
	mysql_query("insert into tb_location values('','".$_SESSION["user_id"]."','".$_POST['station']."','".$_POST["location"]."','".$_POST["message"]."','". date("Y-m-d h:i:sa") ."','Submitted')",$con) or die(mysql_error());
	echo "<script>alert('Saved Successfully')</script>";
	echo "<script>window.location.href='share location.php'</script>";
}
?>
<form method="post" enctype="multipart/form-data">
	<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Location</li>
	</ol>
</div>


	<table align="center" cellpadding="10" width="40%" >
		<tr><th colspan="2"><h2> Share Location<br></h2></th></tr>
		<tr>
			<th>Police Station</th>
			<td>
			<select required class="form-control" name="station">
				<option>--select--</option>
				<?php 
				$r=mysql_query("select station_id,district,place from tb_police_station") or die(mysql_error());
				while ($row=mysql_fetch_assoc($r)) {
					?>

					<option value="<?php echo $row["station_id"] ?>"><?php echo $row["place"].",".$row["district"]; ?></option>
			<?php
				}
				?>
				</select>
			</td>
			</tr>
			<tr>
			<th>Location</th>
			<td>
				<input required class="form-control" maxlength="50" type="text" name="location">
			</td>
			</tr>
		<tr>
			<th>Message</th>
			<td>
				<textarea required class="form-control" name="message" maxlength="50"></textarea>
			</td>
		</tr>
			<th colspan="2" align="center">
				<div class="row mt-3">
				<div class="col-md-3">
				</div>
					<div class="col-md-6">
						<button align="center" type="submit" name="save" class="btn btn-aasana-w3 btn-block w-100 text-uppercase">Submit</button>
					</div>
					</div>
				</div>
			</tr>
	</table>
	</form>

<?php
include 'footer.html';
?>