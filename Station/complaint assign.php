<?php
session_start();
include 'db1.php';
include 'header.html';
?>

<form action="" method="post">
<div class="breadcrumb-agile">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Home</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">Forward Complaint</li>
	</ol>
</div>
	<table align="center" border="2" cellpadding="4" width="100%">

		<tr>
			<th>
				Name
			</th>
			<th>
				Phone Number
			</th>
			<th>
				Address
			</th>
			<th>
				Complaint Type
			</th>
			<th>
				Subject
			</th>
			<th>
				Complaint Details
			</th>
			<th>
				Date
			</th>
			<th>
				Document
			</th>
			<th>
				Assign 
			</th>
		</tr>
		<?php
		$sid=$_SESSION["user_id"];
		$r=mysql_query("select tb_forwardcomplaint.comp_id,comp_type,comp_subject,comp_details,tb_complaint.date,tb_complaint.doc_upload,user_name,mobile_no,place,district,house_name,pin from tb_complaint,tb_user,tb_forwardcomplaint where tb_complaint.user_id=tb_user.user_id and tb_complaint.comp_id=tb_forwardcomplaint.comp_id and tb_forwardcomplaint.station_id='".$_SESSION["user_id"]."' and tb_complaint.status='Forwarded'",$con) or die(mysql_error());
		while ($row=mysql_fetch_assoc($r)) {
			
		
		?>
		<tr>
			<td>
				<?php echo $row["user_name"]; ?>
			</td>
			<td>
				<?php echo $row["mobile_no"]; ?>
			</td>
			<td>
				<?php echo $row["house_name"]." ,".$row["place"]." ,".$row["district"]." ,".$row["pin"]; ?>
			</td>
			<td>
				<?php echo $row["comp_type"] ?>
			</td>
			<td>
				<?php echo $row["comp_subject"];  ?>
			</td>
			<td>
				<?php echo $row["comp_details"]; ?>
			</td>
			<td>
				<?php echo $row["date"]; ?>
			</td>
			<td>
				<a href="../uploads/<?php echo $row["doc_upload"] ?>" target="_blank">View</a>
				
			</td>
			<td>
				<input type="hidden" name="comp_id" value="<?php echo $row["comp_id"] ?>">
				<select name="police">
					<option>--select--</option>
					<?php 
						$r=mysql_query("select police_id,police_name,designation from tb_police where station_id='$sid'") or die(mysql_error());
						while ($row=mysql_fetch_assoc($r)) {
							$pid=$row['police_id'];
					?>
					<option value="<?php echo $row["police_id"] ?>"><?php echo $row["police_name"].",".$row["designation"]; ?></option>
					<?php
				}?>
				</select>
				<input type="submit" name="proceed" value="Proceed">
			</td>
		</tr>
		<?php
}
if (isset($_POST["proceed"])) {
	mysql_query("insert into tb_assign values('".$_POST["comp_id"]."','$pid','','','')") or die(mysql_error());
	mysql_query("update tb_complaint set status='Assign' where comp_id='".$_POST["comp_id"]."'") or die(mysql_error());
	echo "<script> alert('Assign Police Successfully')</script>";
	echo "<script>window.location.href='http://localhost/Sthreeraksha/Sthreeraksha/consortium/complaint assign.php'</script>";
}
		?>
	</table>
	<br>
	<br>
</form>
<?php
include 'footer.html';
?>